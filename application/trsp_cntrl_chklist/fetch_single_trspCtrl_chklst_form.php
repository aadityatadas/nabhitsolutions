<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_transptn_sfty_chcklst 
		WHERE transptn_sfty_chcklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["transptn_sfty_chcklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];
$output['chair_strchr_wrkng_brk_yn'] = $row['chair_strchr_wrkng_brk_yn'];
$output['chair_strchr_wrkng_brk_loc'] = $row['chair_strchr_wrkng_brk_loc'];
$output['chair_strchr_wrkng_brk_rmrk'] = $row['chair_strchr_wrkng_brk_rmrk'];
$output['saftery_belt_yn'] = $row['saftery_belt_yn'];
$output['saftery_belt_loc'] = $row['saftery_belt_loc'];
$output['saftery_belt_rmrk'] = $row['saftery_belt_rmrk'];
$output['drains_lines_yn'] = $row['drains_lines_yn'];
$output['drains_lines_loc'] = $row['drains_lines_loc'];
$output['drains_lines_rmrk'] = $row['drains_lines_rmrk'];
$output['equip_medgas_ready_yn'] = $row['equip_medgas_ready_yn'];
$output['equip_medgas_ready_loc'] = $row['equip_medgas_ready_loc'];
$output['equip_medgas_ready_rmrk'] = $row['equip_medgas_ready_rmrk'];
$output['transfer_note_yn'] = $row['transfer_note_yn'];
$output['transfer_note_loc'] = $row['transfer_note_loc'];
$output['transfer_note_rmrk'] = $row['transfer_note_rmrk'];
$output['nuts_protocol_yn'] = $row['nuts_protocol_yn'];
$output['nuts_protocol_loc'] = $row['nuts_protocol_loc'];
$output['nuts_protocol_rmrk'] = $row['nuts_protocol_rmrk'];
$output['proper_idenfction_patient_yn'] = $row['proper_idenfction_patient_yn'];
$output['proper_idenfction_patient_loc'] = $row['proper_idenfction_patient_loc'];
$output['proper_idenfction_patient_rmrk'] = $row['proper_idenfction_patient_rmrk'];
$output['criteria_def_mentnd_yn'] = $row['criteria_def_mentnd_yn'];
$output['criteria_def_mentnd_loc'] = $row['criteria_def_mentnd_loc'];
$output['criteria_def_mentnd_rmrk'] = $row['criteria_def_mentnd_rmrk'];


		
		echo json_encode($output);
	}
}
?>