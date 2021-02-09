<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_bio_sfty_chklst 
		WHERE bio_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		    $output["sr_no"] = $row["bio_sfty_chklst_id"];
			$output['name'] = $row['name'];
			$output['sign'] = $row['sign'];
			$output['date1'] = $row['date1'];
			$output['time1'] = $row['time1'];
			$output['bmw_dus_bins_yn'] =  $row['bmw_dus_bins_yn'];
			$output['bmw_dus_bins_loc'] =  $row['bmw_dus_bins_loc'];
			$output['bmw_dus_bins_rmrk'] =  $row['bmw_dus_bins_rmrk'];
			$output['punctr_prof_contanr_yn'] =  $row['punctr_prof_contanr_yn'];
			$output['punctr_prof_contanr_loc'] =  $row['punctr_prof_contanr_loc'];
			$output['punctr_prof_contanr_rmrk'] =  $row['punctr_prof_contanr_rmrk'];
			$output['bllod_spillgage_yn'] =  $row['bllod_spillgage_yn'];
			$output['bllod_spillgage_loc'] =  $row['bllod_spillgage_loc'];
			$output['bllod_spillgage_rmrk'] =  $row['bllod_spillgage_rmrk'];
			$output['ppe_prctn_yn'] =  $row['ppe_prctn_yn'];
			$output['ppe_prctn_loc'] =  $row['ppe_prctn_loc'];
			$output['ppe_prctn_rmrk'] =  $row['ppe_prctn_rmrk'];
			$output['central_biomtrc_avalbl_yn'] =  $row['central_biomtrc_avalbl_yn'];
			$output['central_biomtrc_avalbl_loc'] =  $row['central_biomtrc_avalbl_loc'];
			$output['central_biomtrc_avalbl_rmrk'] =  $row['central_biomtrc_avalbl_rmrk'];
			$output['needle_prick_gudline_yn'] =  $row['needle_prick_gudline_yn'];
			$output['needle_prick_gudline_loc'] =  $row['needle_prick_gudline_loc'];
			$output['needle_prick_gudline_rmrk'] =  $row['needle_prick_gudline_rmrk'];
			$output['staff_prcution_yn'] =  $row['staff_prcution_yn'];
			$output['staff_prcution_loc'] =  $row['staff_prcution_loc'];
			$output['staff_prcution_rmrk'] =  $row['staff_prcution_rmrk'];
			$output['staff_hepatitis_yn'] =  $row['staff_hepatitis_yn'];
			$output['staff_hepatitis_loc'] =  $row['staff_hepatitis_loc'];
			$output['staff_hepatitis_rmrk'] =  $row['staff_hepatitis_rmrk'];





		
		echo json_encode($output);
	}
}
?>