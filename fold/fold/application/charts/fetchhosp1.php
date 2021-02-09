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
		$sql="SELECT huf_pname, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (year(huf_dadm)='$year' AND huf_ddd = 'Discharge' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$query=$connect->query($sql);
		$row=$query->fetch_array();

		$out['dis'][]=$row['total'];
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT huf_pname, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (year(huf_dadm)='$year' AND huf_ddd = 'Dama' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['dama'][]=$prow['total']/100;
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT huf_pname, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (year(huf_dadm)='$year' AND huf_ddd = 'Death' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['death'][]=$prow['total']/100;
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
		$sql="SELECT huf_pname, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (year(huf_dadm)='$year' AND huf_ddd = 'Discharge' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$query=$connect->query($sql);
		$row=$query->fetch_array();

		$out['dis'][]=$row['total']/100;
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT huf_pname, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (year(huf_dadm)='$year' AND huf_ddd = 'Dama' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['dama'][]=$prow['total']/100;
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT huf_pname, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (year(huf_dadm)='$year' AND huf_ddd = 'Death' AND huf_dadm BETWEEN '$fdate' AND '$tdate')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['death'][]=$prow['total']/100;
	}

	echo json_encode($out);
}
?>