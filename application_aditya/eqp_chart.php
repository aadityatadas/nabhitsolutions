<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$month = date('m');
$yr = date('Y');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Total No.of Equipment','Under AMC','Under Warranty','Under Calibration');
	
	$admdt = $_POST["frdate"].' - '.$_POST["todate"];
	
	$sql4 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast")or die(mysqli_error($connect));
	$rs4 = mysqli_num_rows($sql4);
	
	$sql5 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast LEFT JOIN tbl_eqp_indic ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE (month(tbl_eqp_indic.eqp_amc1) = '$month' OR month(tbl_eqp_indic.eqp_amc1) < '$month' AND year(tbl_eqp_indic.eqp_amc1) = '$yr' OR year(tbl_eqp_indic.eqp_amc1) < '$yr') AND (month(tbl_eqp_indic.eqp_amc2) > '$month' AND year(tbl_eqp_indic.eqp_amc2) = '$yr' OR year(tbl_eqp_indic.eqp_amc2) > '$yr')")or die(mysqli_error($connect));
	$rs5 = mysqli_num_rows($sql5);
	
	$sql2 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast WHERE (month(eqp_wty1) = '$month' OR month(eqp_wty1) < '$month' AND year(eqp_wty1) = '$yr' OR year(eqp_wty1) < '$yr') AND (month(eqp_wty2) > '$month' AND year(eqp_wty2) = '$yr' OR year(eqp_wty2) > '$yr')")or die(mysqli_error($connect));
	$rs2 = mysqli_num_rows($sql2);	

	$sql3 = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE (tbl_eqp_indic.eqp_csch1 = '".$_POST["frdate"]."' OR tbl_eqp_indic.eqp_csch1 >= '".$_POST["todate"]."') AND (tbl_eqp_indic.eqp_csch2 <= '".$_POST["frdate"]."' OR tbl_eqp_indic.eqp_csch2 > '".$_POST["todate"]."')")or die(mysqli_error($connect));
	$rs3 = mysqli_num_rows($sql3);
	
	$data[] = array($admdt,(int)$rs4,(int)$rs5,(int)$rs2,(int)$rs3);		  
	
	//	$data = array($data);
	
	echo json_encode($data);
}	
?>
