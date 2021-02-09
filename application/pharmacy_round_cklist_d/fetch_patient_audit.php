<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$tbl=$_POST['tbl'];
	$output = array();
	$query =  "SELECT * FROM $tbl
           
            WHERE id = '".$_POST["user_id"]."' 
		    LIMIT 1";
		   
	$statement = $connection->prepare(

		$query
		
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["id"];
		
$output['audit_date'] = $row['audit_date'];

				
		$output['da']['physcl_app_shop'] = $row['physcl_app_shop'];
$output['da']['storage'] = $row['storage'];
$output['da']['cleanliness'] = $row['cleanliness'];
$output['da']['temp_frdg_extrnl'] = $row['temp_frdg_extrnl'];
$output['da']['stock_out'] = $row['stock_out'];
$output['da']['inv_control'] = $row['inv_control'];
$output['da']['medicine_presc'] = $row['medicine_presc'];
$output['da']['emere_med_stock'] = $row['emere_med_stock'];
$output['da']['lasa_storage'] = $row['lasa_storage'];
$output['da']['expr_if'] = $row['expr_if'];




$output['name_sign'] = $row['name_sign'];


		
		echo json_encode($output);
	}
}
?>