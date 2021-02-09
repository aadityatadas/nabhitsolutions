<?php
include('../dbinfo.php');

/*print_r($_POST);
die();
*/if(isset($_POST["user_id"]))
{
	$tbl = $_POST['tbl'];
	$output = array();

	$statement1 = $connection->prepare("SELECT * FROM $tbl WHERE id = '".$_POST["user_id"]."'");
	$statement1->execute();
	$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
	$audit_month = $result1[0]['audit_month'];
	$audit_year = $result1[0]['audit_year'];
	$audit_date = $result1[0]['audit_date'];
	
	$statement = $connection->prepare(
		"SELECT * FROM $tbl 
		WHERE audit_date = '$audit_date' "
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$sub_array = array();
		$output['id'] = $row['id'];
		$output['audit_year'] = $row['audit_year'];
		$output['audit_month'] = $row['audit_month'];
		$output['audit_date'] = $row['audit_date'];
		

		$sub_array[] = $row['pos_id'];
		$sub_array[] = $row['yn_val'];
  		$sub_array[] = $row['cmmnt'];

	    $output['data'][] = $sub_array;
			

		
		
	}

	echo json_encode($output);
}
?>