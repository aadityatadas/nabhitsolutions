<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include("function.php");

if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM tbl_hr_mast WHERE hrid = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	$statement = $connection->prepare(
		"DELETE FROM tbl_hr_indic WHERE hrid = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);	
	if(!empty($result))
	{
		echo 'HR Master Details Are Deleted Successfully';
	}
}
?>