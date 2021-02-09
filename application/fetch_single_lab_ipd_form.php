<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT  tbl_huf.huf_id,tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd , tbl_huf.huf_dadm , tbl_lab_ipd.* FROM tbl_huf
		LEFT JOIN tbl_lab_ipd ON tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id
		WHERE `huf_id` = '".$_POST["user_id"]."' 
		LIMIT 1"
	);

// SELECT *
//  FROM tbl_huf
//  LEFT JOIN tbl_lab_ipd ON tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id
//  WHERE `huf_id`= 2030
// ORDER BY `huf_id` DESC
// LIMIT 1
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["huf_id"];
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["d_adm"] = $row["huf_dadm"];
		
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
              if($row["tbl_uhf_id"]) {
                    $output["action_to_perform"]="Update";
              } else {
                     $output["action_to_perform"]="Edit";
              }         
		
         $output["lab_ipd_id"] = $row["lab_ipd_id"];

		 $output["tbl_uhf_id"] = $row["tbl_uhf_id"];

		 $output["prov_finl_daig"] = $row["prov_finl_daig"];

		 //$output["sample_rec_time"] = $row["sample_rec_time_date"];
		 $dd_dt = $row["sample_rec_time_date"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_sample_rec_time"] = $get_date;
		 $output["t_sample_rec_time"] = $get_time;

		 $output["nam_of_test"] = $row["nam_of_test"];


		 //$output["time_of_rep_gen"] = $row["time_date_of_rep_gen"];

		 $dd_dt1 = $row["time_date_of_rep_gen"];		
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

		 $output["resp_err"] = $row["resp_err"];
		 
		 $output["res_err_rsn"] = $row["res_err_rsn"];

		 $output["redos"] = $row["redos"];
			 $output["redos_rsn"] = $row["redos_rsn"];

		 $output["rep_cor_clin_diag"] = $row["rep_cor_clin_diag"];

		 $output["clinical_correlation"] = $row["clinical_correlation"];

		   $output["remarks"] = $row["remarks"];

		   //for add on
		$statement = $connection->prepare(
		"SELECT * FROM tbl_lab_ipd_extra
		WHERE tbl_lab_lpd_id = '".$row["lab_ipd_id"]."' 
		"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	

    $count = 0;
      $output["oldDataCount"] =count($result);
    if(count($result)>0){
    	
     foreach ($result as $as => $row) {
     	 
     	  $count++;
         	
         
            $output["t_dig_old"][$as] = $row["prov_finl_daig"];

		 //$output["sample_rec_time_old"][$as] = $row["sample_rec_time_date"];
		 $dd_dt = $row["sample_rec_time_date"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["srt_old"][$as] = $get_date;
		 $output["srtt_old"][$as] = $get_time;

		 $output["nameofTest_old"][$as] = $row["nam_of_test"];


		 //$output["time_of_rep_gen_old"][$as] = $row["time_date_of_rep_gen"];

		 $dd_dt1 = $row["time_date_of_rep_gen"];		
		 $new_time = explode(" ",$dd_dt1);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["dateofreportgeneration_old"][$as] = $get_date;
		 $output["timeofreportgeneration_old"][$as] = $get_time;

		 $output["TotalTime_old"][$as] = $row["total_time"];

		 $output["InvestigationResult_old"][$as] = $row["inv_result"];

		 $output["CriticalResult_old"][$as] = $row["cri_res_if_any"];

		 $output["CriticalAlert_old"][$as] = $row["cri_alrt_details"];

		 //$output["result_time_old"][$as] = $row["result_time"];
		 $dd_dt = $row["result_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["ResultDate_old"][$as] = $get_date;
		 $output["ResultTime_old"][$as] = $get_time;

		 //$output["info_time_old"][$as] = $row["info_time"];
		 $dd_dt = $row["info_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["InformedDate_old"][$as] = $get_date;
		 $output["InformedTime_old"][$as] = $get_time;

		 $output["InformedTo_old"][$as] = $row["info_to"];

		 $output["InformedBy_old"][$as] = $row["info_by"];

		 $output["ReportingError_old"][$as] = $row["resp_err"];
		 
		 $output["ReasoneForReportingError_old"][$as] = $row["res_err_rsn"];

		 $output["RedosIfAny_old"][$as] = $row["redos"];
			 $output["ReasonForRedos_old"][$as] = $row["redos_rsn"];

		 $output["Reports_Corelating_old"][$as] = $row["rep_cor_clin_diag"];

		 $output["ClinicalCorrelation_old"][$as] = $row["clinical_correlation"];

		   $output["Remarks_old"][$as] = $row["remarks"];

		$output["lab_ipd_extra_id"][$as] = $row["lab_ipd_extra_id"];
		$output["tbl_lab_lpd_id"][$as] = $row["tbl_lab_lpd_id"];

     }
 }

		
		echo json_encode($output);
	}
}
?>