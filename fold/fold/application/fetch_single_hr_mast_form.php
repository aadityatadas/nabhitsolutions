<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_hr_mast
		WHERE hr_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["hr_id"];
		$output["mo1"] = $row["hr_staff"];
		$output["mo2"] = $row["hr_empcode"];
		$output["mo3"] = $row["hr_desig"];
		$output["mo4"] = $row["hr_dept"];
		$output["mo5"] = $row["hr_datej"];
		$output["mo6"] = $row["hr_ctstat"];
		$output["mo7"] = $row["hr_ctstat_det"];
		
		echo json_encode($output);
	}
}
?>