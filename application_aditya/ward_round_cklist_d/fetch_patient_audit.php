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

				
		$output['da']['clealiness'] = $row['clealiness'];
$output['da']['em_stock'] = $row['em_stock'];
$output['da']['eqp_work'] = $row['eqp_work'];
$output['da']['bmw_sep'] = $row['bmw_sep'];
$output['da']['pre_labeled'] = $row['pre_labeled'];
$output['da']['side_rails'] = $row['side_rails'];
$output['da']['bedpans'] = $row['bedpans'];
$output['da']['doc_nur_uni_id'] = $row['doc_nur_uni_id'];
$output['da']['patnt_toilet'] = $row['patnt_toilet'];
$output['da']['patnt_id_brand'] = $row['patnt_id_brand'];
$output['da']['medical_record'] = $row['medical_record'];
$output['da']['lasa_drugs'] = $row['lasa_drugs'];
$output['da']['high_risk_drug'] = $row['high_risk_drug'];
$output['da']['temp_humd'] = $row['temp_humd'];
$output['da']['vulnerable'] = $row['vulnerable'];
$output['da']['line_disc'] = $row['line_disc'];
$output['da']['article_instrumnt'] = $row['article_instrumnt'];
$output['da']['incident_error'] = $row['incident_error'];
$output['da']['patien_resp'] = $row['patien_resp'];


$output['remark'] = $row['remark'];
$output['name_sign'] = $row['name_sign'];


		
		echo json_encode($output);
	}
}
?>