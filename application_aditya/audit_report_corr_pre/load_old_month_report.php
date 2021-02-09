<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');

$output = array();

if(isset($_POST["id"]))
{
	
	$query =  "SELECT corrective_action,preventive_action  FROM `tbl_monthly_audit_reports`
          
            WHERE audit_date_month_year = '".$_POST["id"]."' 
		    AND audit_name='".$_POST["name"]."'";



		   
	$statement = $connection->prepare(

		$query
		
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

			
		
		
		
		
		$output["p"] = json_decode($row["preventive_action"]);
				
		$output["c"] = json_decode($row["corrective_action"]);		
		



		
		
	}

	echo json_encode($output);
}
?>