<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM tbl_need_pif WHERE needp_id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);	
	if(!empty($result))
	{
		echo 'Details Are Deleted Successfully';
	}
}
?>