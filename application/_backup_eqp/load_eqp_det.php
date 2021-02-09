<?php 
	error_reporting(0);
	session_start();
	include "dbinfo.php";
	$val=$_POST['val'];
	$rs=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM tbl_eqp_mast WHERE eqp_name = '$val'"));
	echo $rs['eqp_type']."@".$rs['eqp_idno']."@".$rs['eqp_srno']."@".$rs['eqp_model']."@".$rs['eqp_make']."@".$rs['eqp_dtpur']."@".$rs['eqp_dtins']."@".$rs['eqp_wty1']."@".$rs['eqp_wty2']."@".$rs['eqpid'];
?>