<?php
include('dbinfo.php');

if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM tbl_bof WHERE bof_id = :id"
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