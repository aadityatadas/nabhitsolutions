<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_inf_cntrl_checklist 
		WHERE inf_cntrl_checklist_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["inf_cntrl_checklist_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];
$output['hand_hygn_yn'] = $row['hand_hygn_yn'];
$output['hand_hygn_loc'] = $row['hand_hygn_loc'];
$output['hand_hygn_rmrk'] = $row['hand_hygn_rmrk'];
$output['stndrd_precation_yn'] = $row['stndrd_precation_yn'];
$output['stndrd_precation_loc'] = $row['stndrd_precation_loc'];
$output['stndrd_precation_rmrk'] = $row['stndrd_precation_rmrk'];
$output['bmw_yn'] = $row['bmw_yn'];
$output['bmw_loc'] = $row['bmw_loc'];
$output['bmw_rmrk'] = $row['bmw_rmrk'];
$output['immunization_yn'] = $row['immunization_yn'];
$output['immunization_loc'] = $row['immunization_loc'];
$output['immunization_rmrk'] = $row['immunization_rmrk'];
$output['needle_stick_occ_expose_yn'] = $row['needle_stick_occ_expose_yn'];
$output['needle_stick_occ_expose_loc'] = $row['needle_stick_occ_expose_loc'];
$output['needle_stick_occ_expose_rmrk'] = $row['needle_stick_occ_expose_rmrk'];
$output['cssd_recall_yn'] = $row['cssd_recall_yn'];
$output['cssd_recall_loc'] = $row['cssd_recall_loc'];
$output['cssd_recall_rmrk'] = $row['cssd_recall_rmrk'];
$output['clng_deis_strl_process_yn'] = $row['clng_deis_strl_process_yn'];
$output['clng_deis_strl_process_loc'] = $row['clng_deis_strl_process_loc'];
$output['clng_deis_strl_process_rmrk'] = $row['clng_deis_strl_process_rmrk'];
$output['iso_protcl_trmsn_precation_yn'] = $row['iso_protcl_trmsn_precation_yn'];
$output['iso_protcl_trmsn_precation_loc'] = $row['iso_protcl_trmsn_precation_loc'];
$output['iso_protcl_trmsn_precation_rmrk'] = $row['iso_protcl_trmsn_precation_rmrk'];
$output['linen_discfcn_protocol_yn'] = $row['linen_discfcn_protocol_yn'];
$output['linen_discfcn_protocol_loc'] = $row['linen_discfcn_protocol_loc'];
$output['linen_discfcn_protocol_rmrk'] = $row['linen_discfcn_protocol_rmrk'];
$output['hyg_reltd_to_food_yn'] = $row['hyg_reltd_to_food_yn'];
$output['hyg_reltd_to_food_loc'] = $row['hyg_reltd_to_food_loc'];
$output['hyg_reltd_to_food_rmrk'] = $row['hyg_reltd_to_food_rmrk'];
$output['envmtl_control_yn'] = $row['envmtl_control_yn'];
$output['envmtl_control_loc'] = $row['envmtl_control_loc'];
$output['envmtl_control_rmrk'] = $row['envmtl_control_rmrk'];
$output['care_of_device_yn'] = $row['care_of_device_yn'];
$output['care_of_device_loc'] = $row['care_of_device_loc'];
$output['care_of_device_rmrk'] = $row['care_of_device_rmrk'];

		
		echo json_encode($output);
	}
}
?>