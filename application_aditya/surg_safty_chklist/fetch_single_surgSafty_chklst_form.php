<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_surg_safty_chklst 
		WHERE surg_safty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["surg_safty_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];
$output['surg_check_imp_ya'] = $row['surg_check_imp_ya'];
$output['surg_check_imp_loc'] = $row['surg_check_imp_loc'];
$output['surg_check_imp_rmrk'] = $row['surg_check_imp_rmrk'];
$output['pre_op_ot_ya'] = $row['pre_op_ot_ya'];
$output['pre_op_ot_loc'] = $row['pre_op_ot_loc'];
$output['pre_op_ot_rmrk'] = $row['pre_op_ot_rmrk'];
$output['all_sfty_ensurd_ya'] = $row['all_sfty_ensurd_ya'];
$output['all_sfty_ensurd_loc'] = $row['all_sfty_ensurd_loc'];
$output['all_sfty_ensurd_rmrk'] = $row['all_sfty_ensurd_rmrk'];
$output['surf_clen_day_ya'] = $row['surf_clen_day_ya'];
$output['surf_clen_day_loc'] = $row['surf_clen_day_loc'];
$output['surf_clen_day_rmrk'] = $row['surf_clen_day_rmrk'];
$output['check_eto_ya'] = $row['check_eto_ya'];
$output['check_eto_loc'] = $row['check_eto_loc'];
$output['check_eto_rmrk'] = $row['check_eto_rmrk'];
$output['all_inctr_cycle_ya'] = $row['all_inctr_cycle_ya'];
$output['all_inctr_cycle_loc'] = $row['all_inctr_cycle_loc'];
$output['all_inctr_cycle_rmrk'] = $row['all_inctr_cycle_rmrk'];
$output['intra_surgy_ya'] = $row['intra_surgy_ya'];
$output['intra_surgy_loc'] = $row['intra_surgy_loc'];
$output['intra_surgy_rmrk'] = $row['intra_surgy_rmrk'];
$output['any_event_recrd_ya'] = $row['any_event_recrd_ya'];
$output['any_event_recrd_loc'] = $row['any_event_recrd_loc'];
$output['any_event_recrd_rmrk'] = $row['any_event_recrd_rmrk'];
$output['post_sur_drn_lin_ya'] = $row['post_sur_drn_lin_ya'];
$output['post_sur_drn_lin_loc'] = $row['post_sur_drn_lin_loc'];
$output['post_sur_drn_lin_rmrk'] = $row['post_sur_drn_lin_rmrk'];
$output['surgry_notes_by_surgn_ya'] = $row['surgry_notes_by_surgn_ya'];
$output['surgry_notes_by_surgn_loc'] = $row['surgry_notes_by_surgn_loc'];
$output['surgry_notes_by_surgn_rmrk'] = $row['surgry_notes_by_surgn_rmrk'];
$output['constn_taken_risk_ya'] = $row['constn_taken_risk_ya'];
$output['constn_taken_risk_loc'] = $row['constn_taken_risk_loc'];
$output['constn_taken_risk_rmrk'] = $row['constn_taken_risk_rmrk'];


		
		echo json_encode($output);
	}
}
?>