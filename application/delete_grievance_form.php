<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include("function.php");

if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM tbl_grievance_from WHERE gid = :gid"
	);
	$result = $statement->execute(
		array(
			':gid'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'GRIEVANCE FORM Details Are Deleted Successfully';
	}
}
?>