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
	
	$out = array();

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT AVG(bof_bo) AS total FROM tbl_bof WHERE month(bof_date)='$month' AND (year(bof_date)='$year' AND bof_date BETWEEN '$fdate' AND '$tdate')";
		$query=$connect->query($sql);
		$row=$query->fetch_array();

		$out['year'][]=$row['total'];
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT AVG(bof_bo) AS total FROM tbl_bof WHERE month(bof_date)='$month' AND (year(bof_date)='$prev' AND bof_date BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['prev'][]=$prow['total'];
	}

	echo json_encode($out);
}else{
	include"../dbinfo.php";
	
	$year = date('Y'); //2018
	$prev = $year - 1;

	$fdate = date('2018-01-01');
	$tdate = date('2018-03-31');
	
	$out = array();

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT AVG(bof_bo) AS total FROM tbl_bof WHERE month(bof_date)='$month' AND (year(bof_date)='$year' AND bof_date BETWEEN '$fdate' AND '$tdate')";
		$query=$connect->query($sql);
		$row=$query->fetch_array();

		$out['year'][]=$row['total'];
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT AVG(bof_bo) AS total FROM tbl_bof WHERE month(bof_date)='$month' AND (year(bof_date)='$prev' AND bof_date BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['prev'][]=$prow['total'];
	}

	echo json_encode($out);
}
?>