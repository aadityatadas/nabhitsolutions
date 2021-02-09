<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_electrcl_sfty_chklst 
		WHERE electrcl_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["electrcl_sfty_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];

$output['no_uncov_casing_yn']  =  $row['no_uncov_casing_yn'];
$output['no_uncov_casing_loc']  =  $row['no_uncov_casing_loc'];
$output['no_uncov_casing_rmrk']  =  $row['no_uncov_casing_rmrk'];
$output['all_elect_areas_yn']  =  $row['all_elect_areas_yn'];
$output['all_elect_areas_loc']  =  $row['all_elect_areas_loc'];
$output['all_elect_areas_rmrk']  =  $row['all_elect_areas_rmrk'];
$output['electrcl_sfty_signag_yn']  =  $row['electrcl_sfty_signag_yn'];
$output['electrcl_sfty_signag_loc']  =  $row['electrcl_sfty_signag_loc'];
$output['electrcl_sfty_signag_rmrk']  =  $row['electrcl_sfty_signag_rmrk'];
$output['electrcl_mats_gloves_yn']  =  $row['electrcl_mats_gloves_yn'];
$output['electrcl_mats_gloves_loc']  =  $row['electrcl_mats_gloves_loc'];
$output['electrcl_mats_gloves_rmrk']  =  $row['electrcl_mats_gloves_rmrk'];
$output['mccb_quality_yn']  =  $row['mccb_quality_yn'];
$output['mccb_quality_loc']  =  $row['mccb_quality_loc'];
$output['mccb_quality_rmrk']  =  $row['mccb_quality_rmrk'];
$output['earthing_secured_yn']  =  $row['earthing_secured_yn'];
$output['earthing_secured_loc']  =  $row['earthing_secured_loc'];
$output['earthing_secured_rmrk']  =  $row['earthing_secured_rmrk'];
$output['dg_fenced_mat_yn']  =  $row['dg_fenced_mat_yn'];
$output['dg_fenced_mat_loc']  =  $row['dg_fenced_mat_loc'];
$output['dg_fenced_mat_rmrk']  =  $row['dg_fenced_mat_rmrk'];
$output['no_chemical_combtin_yn']  =  $row['no_chemical_combtin_yn'];
$output['no_chemical_combtin_loc']  =  $row['no_chemical_combtin_loc'];
$output['no_chemical_combtin_rmrk']  =  $row['no_chemical_combtin_rmrk'];
$output['regular_elec_crkt_check_yn']  =  $row['regular_elec_crkt_check_yn'];
$output['regular_elec_crkt_check_loc']  =  $row['regular_elec_crkt_check_loc'];
$output['regular_elec_crkt_check_rmrk']  =  $row['regular_elec_crkt_check_rmrk'];
$output['no_smoking_boards_yn']  =  $row['no_smoking_boards_yn'];
$output['no_smoking_boards_loc']  =  $row['no_smoking_boards_loc'];
$output['no_smoking_boards_rmrk']  =  $row['no_smoking_boards_rmrk'];


		
		echo json_encode($output);
	}
}
?>