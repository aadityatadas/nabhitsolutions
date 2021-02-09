<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	
	$output = array();
	$statement = $connection->prepare(
		"SELECT  tbl_opdwttm.opdwttm_id ,tbl_opdwttm.opdwttm_pname,tbl_opdwttm.opdwttm_uhid,tbl_opdwttm.opdwttm_opd , tbl_opdwttm.opdwttm_dttmr , tbl_radio_opd.* FROM tbl_opdwttm
		LEFT JOIN tbl_radio_opd ON tbl_opdwttm.opdwttm_id = tbl_radio_opd.tbl_opdwttm_id
		WHERE `opdwttm_id` = '".$_POST["user_id"]."' 
		LIMIT 1"
	);

// SELECT *
//  FROM tbl_opdwttm
//  LEFT JOIN tbl_radio_ipd ON tbl_opdwttm.opdwttm_id = tbl_radio_ipd.tbl_uhf_id
//  WHERE `opdwttm_id`= 2030
// ORDER BY `opdwttm_id` DESC
// LIMIT 1
	$statement->execute();
	$result = $statement->fetchAll();
	// print_r($result);
	// die();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["opdwttm_id"];
		$output["p_name"] = $row["opdwttm_pname"];
		$output["uhid_no"] = $row["opdwttm_uhid"];
		$output["opd_no"] = $row["opdwttm_opd"];
		$output["d_adm"] = $row["opdwttm_dttmr"];
		
		// $dd_dt = $row["vent_dt_iuc"];		
		// $new_time = explode(" ",$dd_dt);
		// $get_date = $new_time[0];
		// $get_time = $new_time[1];
		// $output["t_adm"] = $get_date;
		// $output["t_adm1"] = $get_time;		
		
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
              if($row["tbl_opdwttm_id"]) {
                    $output["action_to_perform"]="Update";
              } else {
                     $output["action_to_perform"]="Edit";
              }         
		
         $output["radio_opd_id"] = $row["radio_opd_id"];

		 $output["tbl_uhf_id"] = $row["tbl_uhf_id"];
		 $output["age"] = $row["age"];
		 $output["gender"] = $row["gender"];

		 $output["prov_finl_daig"] = $row["prov_finl_daig"];
		  $output["radio_invst"] = $row["radio_invst"];
		 //$output["sample_rec_time"] = $row["sample_rec_time_date"];
		 $dd_dt = $row["invst_stat_date_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_sample_rec_time"] = $get_date;
		 $output["t_sample_rec_time"] = $get_time;

		 //$output["nam_of_test"] = $row["nam_of_test"];


		 //$output["time_of_rep_gen"] = $row["time_date_of_rep_gen"];

		 $dd_dt1 = $row["date_time_of_rep_gen"];		
		 $new_time = explode(" ",$dd_dt1);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_time_date_of_rep_gen"] = $get_date;
		 $output["t_time_date_of_rep_gen"] = $get_time;

		 $output["total_time"] = $row["total_time"];

		 $output["inv_result"] = $row["inv_result"];

		 $output["cri_res_if_any"] = $row["cri_res_if_any"];

		 $output["cri_alrt_details"] = $row["cri_alrt_details"];

		 //$output["result_time"] = $row["result_time"];
		 $dd_dt = $row["result_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_result_time"] = $get_date;
		 $output["t_result_time"] = $get_time;

		 //$output["info_time"] = $row["info_time"];
		 $dd_dt = $row["info_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_info_time"] = $get_date;
		 $output["t_info_time"] = $get_time;

		 $output["info_to"] = $row["info_to"];

		 $output["info_by"] = $row["info_by"];

		 $output["resp_err"] = $row["report_err"];
		 
		 $output["res_err_rsn"] = $row["report_err_rsn"];

		 $output["correct_actn_report"] = $row["correct_actn_report"];

		$output["redos"] = $row["redos"];

		$output["redos_rsn"] = $row["redos_rsn"];

		 $output["rep_cor_clin_diag"] = $row["rep_cor_clin_diag"];

		 $output["correct_actn_redos"] = $row["correct_actn_redos"];

		 $output["clinical_correlation"] = $row["clinical_correlation"];

		   $output["remarks"] = $row["remarks"];
 //for add on
		$statement = $connection->prepare(
		"SELECT * FROM tbl_radio_opd_extra
		WHERE tbl_radio_opd_id = '".$row["radio_opd_id"]."' 
		"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	

    $count = 0;
      $output["oldDataCount"] =count($result);

      if(count($result)>0){
    	
     foreach ($result as $as => $row) {
     	 
     	  $count++;
         	
         
            $output["prov_finl_daig_old"][$as] = $row["prov_finl_daig"];
		 $output["radio_invst_old"][$as] = $row["radio_invst"];
		 
		 //$output["sample_rec_time"] = $row["sample_rec_time_date"];
		 $dd_dt = $row["invst_stat_date_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_sample_rec_time_old"][$as] = $get_date;
		 $output["t_sample_rec_time_old"][$as] = $get_time;

		 //$output["nam_of_test"] = $row["nam_of_test"];


		 //$output["time_of_rep_gen"] = $row["time_date_of_rep_gen"];

		 $dd_dt1 = $row["date_time_of_rep_gen"];		
		 $new_time = explode(" ",$dd_dt1);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_time_date_of_rep_gen_old"][$as] = $get_date;
		 $output["t_time_date_of_rep_gen_old"][$as] = $get_time;

		 $output["total_time_old"][$as]= $row["total_time"];

		 $output["inv_result_old"][$as]= $row["inv_result"];

		 $output["cri_res_if_any_old"][$as] = $row["cri_res_if_any"];

		 $output["cri_alrt_details_old"][$as] = $row["cri_alrt_details"];

		 //$output["result_time"] = $row["result_time"];
		 $dd_dt = $row["result_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_result_time_old"][$as] = $get_date;
		 $output["t_result_time_old"][$as] = $get_time;

		 //$output["info_time"] = $row["info_time"];
		 $dd_dt = $row["info_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_info_time_old"][$as] = $get_date;
		 $output["t_info_time_old"][$as] = $get_time;

		 $output["info_to_old"][$as] = $row["info_to"];

		 $output["info_by_old"][$as] = $row["info_by"];

		 $output["resp_err_old"][$as] = $row["report_err"];
		 
		 $output["res_err_rsn_old"][$as] = $row["report_err_rsn"];

		 $output["correct_actn_report_old"][$as] = $row["correct_actn_report"];

		$output["redos_old"][$as] = $row["redos"];

		$output["redos_rsn_old"][$as] = $row["redos_rsn"];

		 $output["rep_cor_clin_diag_old"][$as] = $row["rep_cor_clin_diag"];

		 $output["correct_actn_redos_old"][$as] = $row["correct_actn_redos"];

		 $output["clinical_correlation_old"][$as]= $row["clinical_correlation"];

		   $output["remarks_old"][$as] = $row["remarks"];

		$output["radio_opd_extra_id"][$as] = $row["radio_opd_extra_id"];
		$output["tbl_radio_opd_id"][$as] = $row["tbl_radio_opd_id"];

     }
 }
		
		echo json_encode($output);
	}
}
?>