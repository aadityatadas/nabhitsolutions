<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_radtin_sfty_chklst 
		WHERE radtin_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		    $output["sr_no"] = $row["radtin_sfty_chklst_id"];
			$output['name'] = $row['name'];
			$output['sign'] = $row['sign'];
			$output['date1'] = $row['date1'];
			$output['time1'] = $row['time1'];
			$output['radtin_signag_x_ray_yn'] =  $row['radtin_signag_x_ray_yn'];
			$output['radtin_signag_x_ray_loc'] =  $row['radtin_signag_x_ray_loc'];
			$output['radtin_signag_x_ray_rmrk'] =  $row['radtin_signag_x_ray_rmrk'];
			$output['pregant_ladies_areas_yn'] =  $row['pregant_ladies_areas_yn'];
			$output['pregant_ladies_areas_loc'] =  $row['pregant_ladies_areas_loc'];
			$output['pregant_ladies_areas_rmrk'] =  $row['pregant_ladies_areas_rmrk'];
			$output['inch_wall_wndw_yn'] =  $row['9_inch_wall_wndw_yn'];
			$output['inch_wall_wndw_loc'] =  $row['9_inch_wall_wndw_loc'];
			$output['inch_wall_wndw_rmrk'] =  $row['9_inch_wall_wndw_rmrk'];
			$output['no_gap_doors_yn'] =  $row['no_gap_doors_yn'];
			$output['no_gap_doors_loc'] =  $row['no_gap_doors_loc'];
			$output['no_gap_doors_rmrk'] =  $row['no_gap_doors_rmrk'];
			$output['qa_assrnce_maintnce_yn'] =  $row['qa_assrnce_maintnce_yn'];
			$output['qa_assrnce_maintnce_loc'] =  $row['qa_assrnce_maintnce_loc'];
			$output['qa_assrnce_maintnce_rmrk'] =  $row['qa_assrnce_maintnce_rmrk'];
			$output['aerb_apprvl_machin_yn'] =  $row['aerb_apprvl_machin_yn'];
			$output['aerb_apprvl_machin_loc'] =  $row['aerb_apprvl_machin_loc'];
			$output['aerb_apprvl_machin_rmrk'] =  $row['aerb_apprvl_machin_rmrk'];
			$output['all_staff_cracks_yn'] =  $row['all_staff_cracks_yn'];
			$output['all_staff_cracks_loc'] =  $row['all_staff_cracks_loc'];
			$output['all_staff_cracks_rmrk'] =  $row['all_staff_cracks_rmrk'];
			$output['all_staff_working_yn'] =  $row['all_staff_working_yn'];
			$output['all_staff_working_loc'] =  $row['all_staff_working_loc'];
			$output['all_staff_working_rmrk'] =  $row['all_staff_working_rmrk'];
			$output['all_radtin_worker_yn'] =  $row['all_radtin_worker_yn'];
			$output['all_radtin_worker_loc'] =  $row['all_radtin_worker_loc'];
			$output['all_radtin_worker_rmrk'] =  $row['all_radtin_worker_rmrk'];
			$output['rso_desgntd_hosptl_yn'] =  $row['rso_desgntd_hosptl_yn'];
			$output['rso_desgntd_hosptl_loc'] =  $row['rso_desgntd_hosptl_loc'];
			$output['rso_desgntd_hosptl_rmrk'] =  $row['rso_desgntd_hosptl_rmrk'];
			$output['radtin_safty_traning_worker_yn'] =  $row['radtin_safty_traning_worker_yn'];
			$output['radtin_safty_traning_worker_loc'] =  $row['radtin_safty_traning_worker_loc'];
			$output['radtin_safty_traning_worker_rmrk'] =  $row['radtin_safty_traning_worker_rmrk'];



		
		echo json_encode($output);
	}
}
?>