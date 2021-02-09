<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_biomedicaleqip_sfty_chklst 
		WHERE biomedicaleqip_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["biomedicaleqip_sfty_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];

$output['list_upted_tag_yn']  =  $row['list_upted_tag_yn'];
$output['list_upted_tag_loc']  =  $row['list_upted_tag_loc'];
$output['list_upted_tag_rmrk']  =  $row['list_upted_tag_rmrk'];
$output['critical_bio_equmnt_yn']  =  $row['critical_bio_equmnt_yn'];
$output['critical_bio_equmnt_loc']  =  $row['critical_bio_equmnt_loc'];
$output['critical_bio_equmnt_rmrk']  =  $row['critical_bio_equmnt_rmrk'];
$output['prvintv_maintce_reports_yn']  =  $row['prvintv_maintce_reports_yn'];
$output['prvintv_maintce_reports_loc']  =  $row['prvintv_maintce_reports_loc'];
$output['prvintv_maintce_reports_rmrk']  =  $row['prvintv_maintce_reports_rmrk'];
$output['calibratn_reports_yn']  =  $row['calibratn_reports_yn'];
$output['calibratn_reports_loc']  =  $row['calibratn_reports_loc'];
$output['calibratn_reports_rmrk']  =  $row['calibratn_reports_rmrk'];
$output['breakdown_equpment_yn']  =  $row['breakdown_equpment_yn'];
$output['breakdown_equpment_loc']  =  $row['breakdown_equpment_loc'];
$output['breakdown_equpment_rmrk']  =  $row['breakdown_equpment_rmrk'];
$output['dos_dont_precution_yn']  =  $row['dos_dont_precution_yn'];
$output['dos_dont_precution_loc']  =  $row['dos_dont_precution_loc'];
$output['dos_dont_precution_rmrk']  =  $row['dos_dont_precution_rmrk'];
$output['emrgncy_alarm_yn']  =  $row['emrgncy_alarm_yn'];
$output['emrgncy_alarm_loc']  =  $row['emrgncy_alarm_loc'];
$output['emrgncy_alarm_rmrk']  =  $row['emrgncy_alarm_rmrk'];
$output['intrnl_extrnl_repots_yn']  =  $row['intrnl_extrnl_repots_yn'];
$output['intrnl_extrnl_repots_loc']  =  $row['intrnl_extrnl_repots_loc'];
$output['intrnl_extrnl_repots_rmrk']  =  $row['intrnl_extrnl_repots_rmrk'];
$output['all_wires_use_yn']  =  $row['all_wires_use_yn'];
$output['all_wires_use_loc']  =  $row['all_wires_use_loc'];
$output['all_wires_use_rmrk']  =  $row['all_wires_use_rmrk'];
$output['qualified_biomedcl_checks_yn']  =  $row['qualified_biomedcl_checks_yn'];
$output['qualified_biomedcl_checks_loc']  =  $row['qualified_biomedcl_checks_loc'];
$output['qualified_biomedcl_checks_rmrk']  =  $row['qualified_biomedcl_checks_rmrk'];


		
		echo json_encode($output);
	}
}
?>