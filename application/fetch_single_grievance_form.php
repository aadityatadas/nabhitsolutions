<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_grievance_from
		WHERE gid = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] 		= $row["gid"];
		$output["mo1"] 			= $row["emp_name"];
		$output["mo2reg"] 		= $row["hrid"];
		$output["mo2"] 			= $row["emp_no"];
		$output["conno"] 		= $row["con_no"];
		$output["mo4"] 			= $row["department"];
		$output["mo3"] 			= $row["designation"];
		$output["mo6_emp"] 		= $row["issue"];
		$output["describe"] 	= $row["describe_gre"];
		$output["factors"] 		= $row["factors"];
		$output["suggestion"] 	= $row["suggestion"];
		$output["immediate"] 	= $row["immediate"];
		$output["next"] 		= $row["next"];
		$output["hrname"] 		= $row["hrname"];
		$output["hrsign"] 		= $row["hrsign"];
		$output["hrdate"] 		= $hrdt[0];
		$output["hrtime"] 		= $hrdt[1];
		$output["mdname"] 		= $row["mdname"];
		$output["mdsign"] 		= $row["mdsign"];
		$output["mddate"] 		= $mddt[0];
		$output["mdtime"] 		= $mddt[1];

		
		echo json_encode($output);
	}
}
?>