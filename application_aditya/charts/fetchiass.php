<?php

	if(isset($_POST["frdate"],$_POST["todate"]))
{
	//set timezone
	//date_default_timezone_set('Asia/Calcutta');
	include"../dbinfo.php";
	
	$year = date('Y'); //2018
	$prev = $year - 1;

	$fdate = mysqli_real_escape_string($connect, $_POST["frdate"]);
	$tdate = mysqli_real_escape_string($connect, $_POST["todate"]);
	
	$out1 = array();

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT AVG(int_tottm) AS total FROM tbl_huf WHERE month(int_ddd)='$month' AND (year(int_ddd)='$year' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$query=$connect->query($sql);
		$row=$query->fetch_array();

		$out1['year'][]=$row['total'];
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT AVG(int_tottm) AS total FROM tbl_huf WHERE month(int_ddd)='$month' AND (year(int_ddd)='$prev' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out1['prev'][]=$prow['total'];
	}

	echo json_encode($out);
}else{
	include"../dbinfo.php";
	
	$year = date('Y'); //2018
	$prev = $year - 1;

	$fdate = date('2018-01-01');
	$tdate = date('2018-03-31');
	
	$out1 = array();

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT AVG(int_tottm) AS total FROM tbl_huf WHERE month(int_ddd)='$month' AND year(int_ddd)='$year'";
		$query=$connect->query($sql);
		$row=$query->fetch_array();

		$out1['year'][]=$row['total'];
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT AVG(int_tottm) AS total FROM tbl_huf WHERE month(int_ddd)='$month' AND year(int_ddd)='$prev'";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out1['prev'][]=$prow['total'];
	}

	echo json_encode($out1);
}
?>