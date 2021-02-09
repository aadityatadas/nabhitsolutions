<?php
error_reporting();
session_start();
include('dbinfo.php');
// $_POST["frdate"]='2019-06-01';
// $_POST["todate"]='2019-06-31';
function cal_data($tablename , $hufdt , $connect){
	$qry = mysqli_query($connect,"SELECT * FROM $tablename WHERE sample_rec_date = '$hufdt'")or die(mysqli_error($connect));
	/*$res = mysqli_fetch_assoc($qry);
	print_r($res);
	die;*/
	$c_count = mysqli_num_rows($qry);
	
	
	//$i_count = $res["std"];
	$qry2 = mysqli_query($connect,"SELECT * FROM $tablename WHERE (sample_rec_date = '$hufdt') AND cri_res_if_any ='Yes'")or die(mysqli_error($connect));
	$cri_count = mysqli_num_rows($qry2);

	return array('c_count'=> $c_count , 'cri_count'=> $cri_count );
}
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Total No of Test','No of Critical alert');
	
	
		
		

		// main table
	$sq = "SELECT DISTINCT sample_rec_date FROM tbl_lab_opd WHERE (sample_rec_date BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') ORDER BY sample_rec_date ASC";
	$rs = mysqli_query($connect, $sq);
	$date1 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date1[] = $res["sample_rec_date"];
		
	}


	
	// add on table
	$sq = "SELECT DISTINCT sample_rec_date FROM tbl_lab_opd_extra WHERE (sample_rec_date BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') ORDER BY sample_rec_date ASC";
	$rs = mysqli_query($connect, $sq);
	$date2 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date2[] = $res["sample_rec_date"];
		
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

		$tablename1='tbl_lab_opd';
		$tablename2 = 'tbl_lab_opd_extra';
		$otdata = cal_data($tablename1 , $hufdt , $connect);
		  
		$c_count=$otdata['c_count'];
		$cri_count = $otdata['cri_count'];
		$otdata = cal_data($tablename2 , $hufdt , $connect);
		  
		$c_count+=$otdata['c_count'];
		$cri_count += $otdata['cri_count'];

		$data[] = array($admdt,(int)$c_count,(int)$cri_count);
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
