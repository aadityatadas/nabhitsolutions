<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_ward_round_chklst 
		WHERE ward_round_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["ward_round_chklst_id"];
		  $output['name'] = $row['name'];
		$output['sign'] = $row['sign'];
		$output['date1'] = $row['date1'];
		$output['time1'] = $row['time1'];

$output['location'] = $row['location'];

$output['cleanlns_yn'] = $row['cleanlns_yn'];
$output['cleanlns_rmrk'] = $row['cleanlns_rmrk'];
$output['emrgncy_med_stck_yn'] = $row['emrgncy_med_stck_yn'];
$output['emrgncy_med_stck_rmrk'] = $row['emrgncy_med_stck_rmrk'];
$output['all_equmnt_text'] = $row['all_equmnt_text'];
$output['all_equmnt_rmrk'] = $row['all_equmnt_rmrk'];
$output['bmw_mangmnt_text'] = $row['bmw_mangmnt_text'];
$output['bmw_mangmnt_rmrk'] = $row['bmw_mangmnt_rmrk'];
$output['prefld_injctn_lbld_yn'] = $row['prefld_injctn_lbld_yn'];
$output['prefld_injctn_lbld_rmrk'] = $row['prefld_injctn_lbld_rmrk'];
$output['side_rail_ncrsy_yn'] = $row['side_rail_ncrsy_yn'];
$output['side_rail_ncrsy_rmrk'] = $row['side_rail_ncrsy_rmrk'];
$output['bedpans_nesary_yn'] = $row['bedpans_nesary_yn'];
$output['bedpans_nesary_rmrk'] = $row['bedpans_nesary_rmrk'];
$output['dctr_nurse_unfrm_crd_yn'] = $row['dctr_nurse_unfrm_crd_yn'];
$output['dctr_nurse_unfrm_crd_rmrk'] = $row['dctr_nurse_unfrm_crd_rmrk'];
$output['patnt_all_clean_yn'] = $row['patnt_all_clean_yn'];
$output['patnt_all_clean_rmrk'] = $row['patnt_all_clean_rmrk'];
$output['patnt_tiolt_clean_yn'] = $row['patnt_tiolt_clean_yn'];
$output['patnt_tiolt_clean_rmrk'] = $row['patnt_tiolt_clean_rmrk'];




		
		echo json_encode($output);
	}
}
?>