<?php
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_bof 
		WHERE bof_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["bof_id"];
		$output["b_date"] = $row["bof_date"];
		$output["tid_no"] = $row["bof_tid_day"];
		$output["tob_no"] = $row["bof_tob_bed"];
		$output["boccup"] = $row["bof_bo"];
		
	}
	echo json_encode($output);
}
?>