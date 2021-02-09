<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_eqp_mast_bio 
		WHERE eqpid = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["eqpid"];
		$output["mo1"] = $row["eqp_name"];
		$output["mo2"] = $row["eqp_type"];
		$output["mo3"] = $row["eqp_idno"];
		$output["serial"] = $row["eqp_srno"];
		
		$output["mo4"] = $row["eqp_model"];
		$output["mo5"] = $row["eqp_make"];
		$output["mo6"] = $row["eqp_dtpur"];
		
		$output["mo7"] = $row["eqp_dtins"];
		$output["mo8"] = $row["eqp_wty1"];
		$output["mo9"] = $row["eqp_wty2"];
		$output['mo11']  =  $row['eqp_amc1'];
	$output['mo12']  =  $row['eqp_amc2'];
	$output['mo13']  =  $row['eqp_psch1'];
	$output['mo14']  =  $row['eqp_psch2'];
	$output['mo15']  =  $row['eqp_psch3'];
	$output['mo16']  =  $row['eqp_psch4'];
	$output['mo17']  =  $row['eqp_csch1'];
	$output['mo18']  =  $row['eqp_csch2'];
	$output['mo23']  =  $row['eqp_lic'];
	$output['mo24']  =  $row['eqp_lic_frm'];
	$output['mo25']  =  $row['eqp_lic_to'];



		
	echo json_encode($output);
	}
}
?>