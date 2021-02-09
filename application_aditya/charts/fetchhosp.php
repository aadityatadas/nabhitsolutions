<?php

	include"../dbinfo.php";
	
	$year = date('Y'); //2018
	$prev = $year - 1;

	//$fdate = date('2018-01-01');
	//$tdate = date('2018-03-31');
	
	$out = array();

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT huf_pname, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND year(huf_dadm)='$year'";
		$query=$connect->query($sql);
		$row=$query->fetch_array();

		$out['year'][]=$row['total']/100;
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT huf_surg, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (year(huf_dadm)='$year' AND huf_surg = 'Surgery')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['surg'][]=$prow['total']/100;
	}
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT wttm_opdno, COUNT(*) AS total FROM tbl_huf WHERE month(huf_dadm)='$month' AND (year(huf_dadm)='$year' AND wttm_opdno > '0')";
		$pquery=$connect->query($sql);
		$prow=$pquery->fetch_array();

		$out['opd'][]=$prow['total']/100;
	}

	echo json_encode($out);

?>