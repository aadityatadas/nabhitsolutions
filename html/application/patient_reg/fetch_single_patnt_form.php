<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_patient_reg 
		WHERE patient_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
$output['p_name'] = $row['p_name'];
$output['date_of_reg'] = $row['date_of_reg'];
$output['dob'] = $row['dob'];
$output['uhid_no'] = $row['uhid_no'];
$output['gender'] = $row['gender'];
$output['mobile'] = $row['mobile'];
$output['marital'] = $row['marital'];
$output['address'] = $row['address'];
$output['city'] = $row['city'];
$output['satate'] = $row['satate'];
$output['zipcode'] = $row['zipcode'];
$output['sr_no'] = $row['patient_id'];



		
		echo json_encode($output);
	}
}
?>