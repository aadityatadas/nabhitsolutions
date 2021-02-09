<?php
error_reporting();
session_start();
include('dbinfo.php');
// $_POST["frdate"]='2019-06-28';
//  $_POST["todate"]='2019-06-31';
function cal_data($tablename , $hufdt , $connect){
	$qry = mysqli_query($connect,"SELECT * FROM $tablename WHERE invst_stat_date_time = '$hufdt'")or die(mysqli_error($connect));
	/*$res = mysqli_fetch_assoc($qry);
	print_r($res);
	die;*/
	$c_count = mysqli_num_rows($qry);
	
	
	//$i_count = $res["std"];
	$qry2 = mysqli_query($connect,"SELECT * FROM $tablename WHERE (invst_stat_date_time = '$hufdt') ")or die(mysqli_error($connect));
	$cri_count = mysqli_num_rows($qry2);
	$avgcri = 0;
	while ($res = mysqli_fetch_array($qry2)) {
		$avgcri += strtotime($res['date_time_of_rep_gen']) - strtotime($res['invst_stat_date_time']) ;
		
	}



	return array('c_count'=> $c_count , 'avgcri'=> $avgcri );
}
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Average TAT turn around time');
	
	
		
		

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
		$avgcri = $otdata['avgcri'];

		$otdata = cal_data($tablename2 , $hufdt , $connect);
		  
		$c_count+=$otdata['c_count'];
		$avgcri += $otdata['avgcri'];

		$avgcri = number_format($avgcri / 3600, 2);

		if($c_count){
		$wtm_avg = $avgcri / $c_count;
		$wtmavg = number_format($wtm_avg,2);
		
	}  else {
		 $wtmavg =0;
	}

		$data[] = array($admdt,(float)abs($wtmavg));
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
