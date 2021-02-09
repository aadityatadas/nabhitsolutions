<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_ansthsia_chklst 
		WHERE ansthsia_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["ansthsia_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];
$output['surg_sfty_implnt_yn']  =  $row['surg_sfty_implnt_yn'];
$output['pre_ope_ans_clfscn_yn']  =  $row['pre_ope_ans_clfscn_yn'];
$output['pac_done_24_hrs_yn']  =  $row['pac_done_24_hrs_yn'];
$output['imm_pre_documt_yn']  =  $row['imm_pre_documt_yn'];
$output['peri_ans_evnt_yn']  =  $row['peri_ans_evnt_yn'];
$output['anst_machin_equpmnt_yn']  =  $row['anst_machin_equpmnt_yn'];
$output['anst_drug_rectn_yn']  =  $row['anst_drug_rectn_yn'];
$output['anst_advrse_ade_yn']  =  $row['anst_advrse_ade_yn'];
$output['post_anst_trnsfr_yn']  =  $row['post_anst_trnsfr_yn'];
$output['anst_const_risk_yn']  =  $row['anst_const_risk_yn'];
$output['surg_sfty_implnt_loc']  =  $row['surg_sfty_implnt_loc'];
$output['pre_ope_ans_clfscn_loc']  =  $row['pre_ope_ans_clfscn_loc'];
$output['pac_done_24_hrs_loc']  =  $row['pac_done_24_hrs_loc'];
$output['imm_pre_documt_loc']  =  $row['imm_pre_documt_loc'];
$output['peri_ans_evnt_loc']  =  $row['peri_ans_evnt_loc'];
$output['anst_machin_equpmnt_loc']  =  $row['anst_machin_equpmnt_loc'];
$output['anst_drug_rectn_loc']  =  $row['anst_drug_rectn_loc'];
$output['anst_advrse_ade_loc']  =  $row['anst_advrse_ade_loc'];
$output['post_anst_trnsfr_loc']  =  $row['post_anst_trnsfr_loc'];
$output['anst_const_risk_loc']  =  $row['anst_const_risk_loc'];
$output['surg_sfty_implnt_rmrk']  =  $row['surg_sfty_implnt_rmrk'];
$output['pre_ope_ans_clfscn_rmrk']  =  $row['pre_ope_ans_clfscn_rmrk'];
$output['pac_done_24_hrs_rmrk']  =  $row['pac_done_24_hrs_rmrk'];
$output['imm_pre_documt_rmrk']  =  $row['imm_pre_documt_rmrk'];
$output['peri_ans_evnt_rmrk']  =  $row['peri_ans_evnt_rmrk'];
$output['anst_machin_equpmnt_rmrk']  =  $row['anst_machin_equpmnt_rmrk'];
$output['anst_drug_rectn_rmrk']  =  $row['anst_drug_rectn_rmrk'];
$output['anst_advrse_ade_rmrk']  =  $row['anst_advrse_ade_rmrk'];
$output['post_anst_trnsfr_rmrk']  =  $row['post_anst_trnsfr_rmrk'];
$output['anst_const_risk_rmrk']  =  $row['anst_const_risk_rmrk'];


		
		echo json_encode($output);
	}
}
?>