<?php
error_reporting();
session_start();
include('../dbinfo.php');
// $_POST["frdate"]='2019-06-01';
// $_POST["todate"]='2019-06-31';


if(isset($_POST))
{
	$data[] = array('Quarter','No. of Yes','No. of No','No. of Na');
	if(isset($_POST['qutVal']))
	{
		$qut = $_POST['qutVal'];
		$resYes = $_POST['yesT'];
		$resNo 	= $_POST['noT'];
		$resNa 	= $_POST['naT'];
	}
	else
	{
		$tbl = $_POST["tbl"];
		$qut = $_POST['qut'];
		$yrg = $_POST['yrg'];
	// main table
		$sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND month_id = '".$yrg."' AND yn_val = 'Yes' ORDER BY id ASC";
		$rs = mysqli_query($connect, $sq);
		$resYes = mysqli_fetch_row($rs)[0];

		$sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND month_id = '".$yrg."' AND yn_val = 'No' ORDER BY id ASC";
		$rs = mysqli_query($connect, $sq);
		$resNo = mysqli_fetch_row($rs)[0];

		$sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND month_id = '".$yrg."' AND yn_val = 'NA' ORDER BY id ASC";
		$rs = mysqli_query($connect, $sq);
		$resNa = mysqli_fetch_row($rs)[0];
	}
	


	
	
	switch ($qut) {
		case 1:
			$admdt = 'Quarter 1 (January)';
			break;
		case 2:
			$admdt = 'Quarter 2 (April)';
			break;
		case 3:
			$admdt = 'Quarter 3 (July)';
			break;
		case 4:
			$admdt = 'Quarter 4 (October)';
			break;
		
		default:
			$admdt = $qut;
			break;
	}
	
		
		
	
	
	$data[] = array($admdt,(int)$resYes,(int)$resNo,(int)$resNa);		  
		
	
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
