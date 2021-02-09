<?php
error_reporting(0);
session_start();
include('dbinfo.php');

	$data[] = array('Departments','Employee');
	
	$sq = mysqli_query($connect,"SELECT DISTINCT(hr_dept) as hrdept FROM tbl_hr_mast")or die(mysqli_error($connect));
	while($rs = mysqli_fetch_array($sq))
	{
		$hrdept = $rs["hrdept"];
		$sq2 = mysqli_query($connect,"SELECT hrid FROM tbl_hr_mast WHERE hr_dept = '$hrdept' AND hr_ctstat ='Joined'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($sq2);
		
		$data[] = array($hrdept,(int)$rs2);
	}
	//	$data = array($data);			
	echo json_encode($data);
?>
