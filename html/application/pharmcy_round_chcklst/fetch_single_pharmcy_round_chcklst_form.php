<?php
error_reporting(0);
session_start();
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT  tbl_huf.huf_id,tbl_huf.huf_pname,tbl_huf.huf_uhid, tbl_pharmcy_round_chcklst.* FROM tbl_huf
		LEFT JOIN tbl_pharmcy_round_chcklst ON tbl_huf.huf_id = tbl_pharmcy_round_chcklst.tbl_huf_id
		WHERE `huf_id` = '".$_POST["user_id"]."' 
		LIMIT 1"
	);

// SELECT *
//  FROM tbl_opdwttm
//  LEFT JOIN tbl_lab_ipd ON tbl_opdwttm.opdwttm_id = tbl_lab_ipd.pharmcy_round_chcklst_id
//  WHERE `opdwttm_id`= 2030
// ORDER BY `opdwttm_id` DESC
// LIMIT 1
	$statement->execute();
	$result = $statement->fetchAll();
	/*print_r($result);
	die;*/
	
	foreach($result as $row)
	{
		$output["sr_no"] = $row["huf_id"];
		$output["p_name"] = $row["huf_pname"];
		/*$output["uhid_no"] = $row["opdwttm_uhid"];
		$output["ipd_no"] = $row["opdwttm_opd"];*/
		//$output["d_adm"] = $row["opdwttm_dttmr"];
		
		/*$dd_dt = $row["opdwttm_dttmr"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["d_adm"] = $get_date;*/
		//$output["t_adm1"] = $get_time;		
		
		// $dd_dt1 = $row["vent_dt_ruc"];	
		// $new_time1 = explode(" ",$dd_dt1);
		// $get_date1 = $new_time1[0];
		// $get_time1 = $new_time1[1];
		// $output["ddd"] = $get_date1;
		// $output["ddd1"] = $get_time1;
		
		// $output["dddd"] = $row["vent_tcd"];
		// $output["psympt"] = $row["vent_sympt"];
		// $output["tddd"] = $row["vent_sympt_det"];
		// $output["mlc"] = $row["vent_ssc"];
		// $output["surg"] = $row["vent_spc"];
              if($row["pharmcy_round_chcklst_id"]) {
                    $output["action_to_perform"]="Update";
              } else {
                     $output["action_to_perform"]="Edit";
              }         
		
         	$output['date1'] =  $row['date1'];
			$output['time'] =  $row['time'];
			$output['dep_name'] =  $row['dep_name'];
			$output['incidenc_of_medctin_err_yn'] =  $row['incidenc_of_medctin_err_yn'];
			$output['incidenc_of_medctin_err_rmrk'] =  $row['incidenc_of_medctin_err_rmrk'];
			$output['admsn_with_advrse_drug_rectn_yn'] =  $row['admsn_with_advrse_drug_rectn_yn'];
			$output['admsn_with_advrse_drug_rectn_rmrk'] =  $row['admsn_with_advrse_drug_rectn_rmrk'];
			$output['med_err_abbrvtn_yn'] =  $row['med_err_abbrvtn_yn'];
			$output['med_err_abbrvtn_rmrk'] =  $row['med_err_abbrvtn_rmrk'];
			$output['patnt_drug_evnt_yn'] =  $row['patnt_drug_evnt_yn'];
			$output['patnt_drug_evnt_rmrk'] =  $row['patnt_drug_evnt_rmrk'];
			$output['action_taken_yn'] =  $row['action_taken_yn'];
			$output['action_taken_rmrk'] =  $row['action_taken_rmrk'];
			$output['sign'] =  $row['sign'];


		
		echo json_encode($output);
	}
}
?>