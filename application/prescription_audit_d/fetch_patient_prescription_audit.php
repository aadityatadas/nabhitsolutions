<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$query =  "SELECT tbl_prescription_audit.*,tbl_huf.huf_pname,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd FROM `tbl_prescription_audit`
           LEFT JOIN tbl_huf On tbl_prescription_audit.huf_id= tbl_huf.huf_id
            WHERE tbl_prescription_audit.id = '".$_POST["user_id"]."' 
		    LIMIT 1";
		   
	$statement = $connection->prepare(

		$query
		
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["id"];
		$output["p_name"] = $row["huf_pname"];
		
		$output["ipd_no"] = $row["huf_ipd"];
		
		
		$output["ddd"] = $row["huf_ddd"];		
		$output["dddd"] = $row["huf_dddd"];

				
		$output['patient_name_present'] = $row['patient_name_present'];
$output['medic_caps_legible'] = $row['medic_caps_legible'];
$output['dose'] = $row['dose'];
$output['quantity'] = $row['quantity'];
$output['date_prescription'] = $row['date_prescription'];
$output['high_risk_medicn_verified'] = $row['high_risk_medicn_verified'];

$output['pre_by_auth_person'] = $row['pre_by_auth_person'];
$output['drug_name_clear'] = $row['drug_name_clear'];
$output['dose_corret'] = $row['dose_corret'];
$output['time_prescription'] = $row['time_prescription'];
$output['sign_of_auth'] = $row['sign_of_auth'];

$output['sign_of_doc'] = $row['sign_of_doc'];



		
		echo json_encode($output);
	}
}
?>