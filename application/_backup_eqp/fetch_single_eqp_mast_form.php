<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_eqp_mast 
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
		
	echo json_encode($output);
	}
}
?>