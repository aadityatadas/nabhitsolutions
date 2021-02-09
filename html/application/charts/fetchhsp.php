<?php
	session_start(); 
	//set timezone
	//date_default_timezone_set('Asia/Calcutta');
	include"../dbinfo.php";
	$fdate = $_SESSION['fdate'];
	$tdate = $_SESSION['tdate'];
	
	$year = date('Y'); //2018
	$prev = $year - 1;
	
	$out = array();

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT huf_pname, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$query=$connect->query($sql);
		$row=$query->fetch_array();

		$out['year'][]=$row['total']/100;
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT huf_surg, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (huf_surg = 'Surgery' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['surg'][]=$prow['total']/100;
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT wttm_opdno, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (wttm_opdno > '0' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['opd'][]=$prow['total']/100;
	}

	echo json_encode($out);

?>