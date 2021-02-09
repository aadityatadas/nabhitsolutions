<?php 
	error_reporting(0);
	session_start();
	include "dbinfo.php";
	$val=$_POST['val'];
	$rs=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM tbl_hr_mast WHERE hr_staff = '$val'"));
	echo $rs['hr_empcode']."@".$rs['hr_desig']."@".$rs['hr_dept']."@".$rs['hr_datej']."@".$rs['hr_ctstat']."@".$rs['hr_ctstat_det']."@".$rs['hrid'];
?>