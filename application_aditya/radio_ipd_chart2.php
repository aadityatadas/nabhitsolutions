<?php
error_reporting();
session_start();
include('dbinfo.php');
// $_POST["frdate"]='2019-06-01';
// $_POST["todate"]='2019-06-31';
function cal_data($tablename , $hufdt , $connect){
	$qry = mysqli_query($connect,"SELECT * FROM $tablename WHERE invst_stat_date_time = '$hufdt'")or die(mysqli_error($connect));
	/*$res = mysqli_fetch_assoc($qry);
	print_r($res);
	die;*/
	$c_count = mysqli_num_rows($qry);
	
	
	//$i_count = $res["std"];
	$qry3 = mysqli_query($connect,"SELECT * FROM $tablename WHERE (invst_stat_date_time  = '$hufdt') AND redos = 'Yes'")or die(mysqli_error($connect));
	$res3 = mysqli_fetch_assoc($qry3);
	$redos_count = mysqli_num_rows($qry3);
	
	
	//$tcd = $res3["tcd"];
	
	$qry4 = mysqli_query($connect,"SELECT * FROM $tablename WHERE (invst_stat_date_time  = '$hufdt') AND report_err = 'Yes'")or die(mysqli_error($connect));
	$error = mysqli_num_rows($qry4);
	

	$qry5 = mysqli_query($connect,"SELECT * FROM $tablename WHERE (invst_stat_date_time  = '$hufdt') AND clinical_correlation = 'Yes'")or die(mysqli_error($connect));
	$clinical = mysqli_num_rows($qry5);
	

	return array('c_count'=> $c_count , 'redos_count'=> $redos_count , 'error'=> $error  , 'clinical'=> $clinical );
}
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','% Redos','% Reporting of Error','% Report Corelating with Clinical Diagnosis');
	
	
		


		

		// main table
	$sq = "SELECT DISTINCT invst_stat_date_time FROM tbl_radio_ipd WHERE (invst_stat_date_time BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') ORDER BY invst_stat_date_time ASC";
	$rs = mysqli_query($connect, $sq);
	$date1 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date1[] = $res["invst_stat_date_time"];
		
	}


	
	// add on table
	$sq = "SELECT DISTINCT invst_stat_date_time FROM tbl_radio_ipd_extra WHERE (invst_stat_date_time BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') ORDER BY invst_stat_date_time ASC";
	$rs = mysqli_query($connect, $sq);
	$date2 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date2[] = $res["invst_stat_date_time"];
		
	}
	//	$data = array($data);
	
	$datearray = array_unique(array_merge($date2,$date1));			
	
  	
	    
	function date_sort($a, $b) {
    	return strtotime($a) - strtotime($b);
	}
	usort($datearray, "date_sort");
	
	

	foreach ($datearray as $hufdt) 
	{	
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$tablename1='tbl_radio_ipd';
		$tablename2 = 'tbl_radio_ipd_extra';
		$otdata = cal_data($tablename1 , $hufdt , $connect);
		  
		$c_count=$otdata['c_count'];
		$redos_count = $otdata['redos_count'];
		$error = $otdata['error'];
		$clinical = $otdata['clinical'];
		
		$otdata = cal_data($tablename2 , $hufdt , $connect);
		  
		$c_count+=$otdata['c_count'];
		$redos_count += $otdata['redos_count'];
		$error += $otdata['error'];
		$clinical += $otdata['clinical'];

		$perredo = ($redos_count / $c_count) * 100 ;
    	$perredo = is_nan($perredo)? 0 : $perredo;
		$pererror = ($error / $c_count) * 100 ;

		$pererror = is_nan($pererror)? 0 : $pererror;
		$perclinical = ($clinical / $c_count) * 100 ;

		$perclinical = is_nan($perclinical)? 0 : $perclinical;

		$data[] = array($admdt,(int)$perredo,(int)$pererror , (float)$perclinical);
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
