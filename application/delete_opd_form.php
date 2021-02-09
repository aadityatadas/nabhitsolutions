<?php
include('dbinfo.php');

if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM tbl_opd WHERE opd_id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'OPD Details Are Deleted Successfully';
	}
}
?>