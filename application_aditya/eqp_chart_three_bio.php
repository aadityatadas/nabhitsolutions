<?php
error_reporting();
session_start();
include('dbinfo.php');
// $_POST["frdate"]='2019-06-01';
// $_POST["todate"]='2019-06-31';
function cal_data($tablename , $hufdt , $connect){
	$qry = mysqli_query($connect,"SELECT * FROM $tablename WHERE eqp_brkdwn_date = '$hufdt'")or die(mysqli_error($connect));
	
	$b_count = mysqli_num_rows($qry);
	
	$qry2 = mysqli_query($connect,"SELECT * FROM $tablename WHERE (eqp_brkdwn_date = '$hufdt')")or die(mysqli_error($connect));
					$cri_count = mysqli_num_rows($qry2);
					$avgcri = 0;
	while ($res = mysqli_fetch_array($qry2)) {
		$avgcri += (strtotime($res['eqp_dtrp']) - strtotime($res['eqp_dtbr']))/60 ;
		$avgcri+=(strtotime($res['eqp_tmrp']) - strtotime($res['eqp_tmbr']))/60;
	}
	$hours = floor($avgcri / 60).'.'.($avgcri -   floor($avgcri / 60) * 60);
	

	return array('b_count'=> $b_count ,'hours'=>$hours );
}
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','No of breakdowns' , 'Breakdown Time');
	
	
		


		

		// main table
	$sq = "SELECT DISTINCT eqp_brkdwn_date FROM tbl_eqp_indic_bio WHERE (eqp_brkdwn_date BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') ORDER BY eqp_brkdwn_date ASC";
	$rs = mysqli_query($connect, $sq);
	$date1 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date1[] = $res["eqp_brkdwn_date"];
		
	}


	
				
	
  	
	    
	function date_sort($a, $b) {
    	return strtotime($a) - strtotime($b);
	}
	usort($date1, "date_sort");
	
	

	foreach ($date1 as $hufdt) 
	{	
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$tablename1='tbl_eqp_indic_bio';
		
		$otdata = cal_data($tablename1 , $hufdt , $connect);
		  
		$breakCount=$otdata['b_count'];
		$btime = $otdata['hours'];
		  
		

	
		$data[] = array($admdt,(int)$breakCount,(float)$btime);
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
