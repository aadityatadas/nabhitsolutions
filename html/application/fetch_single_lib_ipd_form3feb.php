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

		 $output["sample_rec_time"] = $row["sample_rec_time_date"];

		 $output["nam_of_test"] = $row["nam_of_test"];


		 $output["time_of_rep_gen"] = $row["time_date_of_rep_gen"];

		 $output["total_time"] = $row["total_time"];

		 $output["inv_result"] = $row["inv_result"];

		 $output["cri_res_if_any"] = $row["cri_res_if_any"];

		 $output["cri_alrt_details"] = $row["cri_alrt_details"];

		 $output["result_time"] = $row["result_time"];

		 $output["info_time"] = $row["info_time"];

		 $output["info_to"] = $row["info_to"];

		 $output["info_by"] = $row["info_by"];

		 $output["resp_err"] = $row["resp_err"];
		 
		 $output["res_err_rsn"] = $row["res_err_rsn"];

		 $output["redos"] = $row["redos"];
			 $output["redos_rsn"] = $row["redos_rsn"];

		 $output["rep_cor_clin_diag"] = $row["rep_cor_clin_diag"];

		 $output["clinical_correlation"] = $row["clinical_correlation"];

		   $output["remarks"] = $row["remarks"];

		
		echo json_encode($output);
	}
}
?>