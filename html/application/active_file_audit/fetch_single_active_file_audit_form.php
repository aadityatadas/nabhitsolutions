<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
	"SELECT  tbl_huf.huf_id,tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd , tbl_huf.huf_tadm , tbl_huf.huf_dadm , tbl_active_file_audit.* FROM tbl_huf
		LEFT JOIN tbl_active_file_audit ON tbl_huf.huf_id = tbl_active_file_audit.tbl_huf_id
		WHERE `huf_id` = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();


	foreach($result as $row)
	{
		//print_r($row["tbl_huf_id"]);die;

	 $output["sr_no"] = $row["huf_id"];
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["d_adm"] = $row["huf_dadm"];
		$output["t_adm"] = $row["huf_tadm"];
  
   if($row["tbl_huf_id"]) {
                    $output["action_to_perform"]="Update";
              } else {
                     $output["action_to_perform"]="Edit";
              }

  $output["dIEfrm_dt_arvl_patnt_date"] = $row["dIEfrm_dt_arvl_patnt_date"];
$output["dIEfrm_dt_arvl_patnt_time"] = $row["dIEfrm_dt_arvl_patnt_time"];
$output["dIEfrm_dt_ia_cmplt_date"] = $row["dIEfrm_dt_ia_cmplt_date"];
$output["dIEfrm_dt_ia_cmplt_time"] = $row["dIEfrm_dt_ia_cmplt_time"];
$output["dIEfrm_pa_ass_scr"] = $row["dIEfrm_pa_ass_scr"];
$output["dIEfrm_gsc_scr"] = $row["dIEfrm_gsc_scr"];
$output["dIEfrm_histry"] = $row["dIEfrm_histry"];
$output["dIEfrm_vital"] = $row["dIEfrm_vital"];
$output["dIEfrm_vital_remarks"] = $row["dIEfrm_vital_remarks"];
$output["dcp_sign"] = $row["dcp_sign"];
$output["dcp_name"] = $row["dcp_name"];
$output["dcp_date"] = $row["dcp_date"];
$output["dcp_time"] = $row["dcp_time"];
$output["dcp_remarks"] = $row["dcp_remarks"];
$output["dn_sign"] = $row["dn_sign"];
$output["dn_name"] = $row["dn_name"];
$output["dn_date"] = $row["dn_date"];
$output["dn_time"] = $row["dn_time"];
$output["dn_vital"] = $row["dn_vital"];
$output["dn_pa_ass_scr"] = $row["dn_pa_ass_scr"];
$output["dn_remarks"] = $row["dn_remarks"];
$output["nas_sign"] = $row["nas_sign"];
$output["nas_name"] = $row["nas_name"];
$output["nas_date"] = $row["nas_date"];
$output["nas_time"] = $row["nas_time"];
$output["nas_date_arv_ptnt"] = $row["nas_date_arv_ptnt"];
$output["nas_time_arv_ptnt"] = $row["nas_time_arv_ptnt"];
$output["nas_date_ia_cmplt"] = $row["nas_date_ia_cmplt"];
$output["nas_time_ia_cmplt"] = $row["nas_time_ia_cmplt"];
$output["nas_pan_ass_scr"] = $row["nas_pan_ass_scr"];
$output["nas_vital"] = $row["nas_vital"];
$output["nas_morse_fall_scale"] = $row["nas_morse_fall_scale"];
$output["nas_remarks"] = $row["nas_remarks"];
$output["ncp_sign"] = $row["ncp_sign"];
$output["ncp_name"] = $row["ncp_name"];
$output["ncp_date"] = $row["ncp_date"];
$output["ncp_time"] = $row["ncp_time"];
$output["ncp_remarks"] = $row["ncp_remarks"];
$output["nps_sign"] = $row["nps_sign"];
$output["nps_name"] = $row["nps_name"];
$output["nps_date"] = $row["nps_date"];
$output["nps_time"] = $row["nps_time"];
$output["nps_handovr_tkn_by_from"] = $row["nps_handovr_tkn_by_from"];
$output["nps_remarks"] = $row["nps_remarks"];
$output["nuAss_sign"] = $row["nuAss_sign"];
$output["nuAss_name"] = $row["nuAss_name"];
$output["nuAss_date"] = $row["nuAss_date"];
$output["nuAss_time"] = $row["nuAss_time"];
$output["nuAss_remarks"] = $row["nuAss_remarks"];
$output["phys_ass_sign"] = $row["phys_ass_sign"];
$output["phys_ass_name"] = $row["phys_ass_name"];
$output["phys_ass_date"] = $row["phys_ass_date"];
$output["phys_ass_time"] = $row["phys_ass_time"];
$output["phys_ass_remarks"] = $row["phys_ass_remarks"];
$output["medictin_chrt_in_caps"] = $row["medictin_chrt_in_caps"];
$output["medictin_chrt_sign"] = $row["medictin_chrt_sign"];
$output["medictin_chrt_name"] = $row["medictin_chrt_name"];
$output["medictin_chrt_date"] = $row["medictin_chrt_date"];
$output["medictin_chrt_time"] = $row["medictin_chrt_time"];
$output["medictin_chrt_risk_vrfd"] = $row["medictin_chrt_risk_vrfd"];
$output["medictin_chrt_remarks"] = $row["medictin_chrt_remarks"];
$output["invstigation_sheet"] = $row["invstigation_sheet"];
$output["btCsnt_name"] = $row["btCsnt_name"];
$output["btCsnt_sign"] = $row["btCsnt_sign"];
$output["btCsnt_date"] = $row["btCsnt_date"];
$output["btCsnt_time"] = $row["btCsnt_time"];
$output["btCsnt_remarks"] = $row["btCsnt_remarks"];
$output["resCsnt_name"] = $row["resCsnt_name"];
$output["resCsnt_sign"] = $row["resCsnt_sign"];
$output["resCsnt_date"] = $row["resCsnt_date"];
$output["resCsnt_time"] = $row["resCsnt_time"];
$output["resCsnt_remarks"] = $row["resCsnt_remarks"];
$output["pCsnt_name"] = $row["pCsnt_name"];
$output["pCsnt_sign"] = $row["pCsnt_sign"];
$output["pCsnt_date"] = $row["pCsnt_date"];
$output["pCsnt_time"] = $row["pCsnt_time"];
$output["pCsnt_remarks"] = $row["pCsnt_remarks"];
$output["hivCsnt_name"] = $row["hivCsnt_name"];
$output["hivCsnt_sign"] = $row["hivCsnt_sign"];
$output["hivCsnt_date"] = $row["hivCsnt_date"];
$output["hivCsnt_time"] = $row["hivCsnt_time"];
$output["hivCsnt_remarks"] = $row["hivCsnt_remarks"];
$output["bcl_cather_frm"] = $row["bcl_cather_frm"];
$output["bcl_ventr_frm"] = $row["bcl_ventr_frm"];
$output["bcl_line_frn"] = $row["bcl_line_frn"];
$output["bcl_ssl_pvnt_frm"] = $row["bcl_ssl_pvnt_frm"];
$output["btmf_s_e_time"] = $row["btmf_s_e_time"];
$output["btmf_s_e_date"] = $row["btmf_s_e_date"];
$output["btmf_sign"] = $row["btmf_sign"];
$output["btmf_name"] = $row["btmf_name"];
$output["btmf_date"] = $row["btmf_date"];
$output["btmf_time"] = $row["btmf_time"];
$output["btmf_vital"] = $row["btmf_vital"];
$output["btmf_remarks"] = $row["btmf_remarks"];
$output["dmc_vital"] = $row["dmc_vital"];
$output["dmc_ressmnt_scr"] = $row["dmc_ressmnt_scr"];
$output["intak_opt"] = $row["intak_opt"];
$output["movmnt_sheet"] = $row["movmnt_sheet"];
$output["restrn_frm"] = $row["restrn_frm"];
$output["patnt_rigt_res_frm"] = $row["patnt_rigt_res_frm"];
$output["patnt_f_e_chrt"] = $row["patnt_f_e_chrt"];
$output["esti_frm"] = $row["esti_frm"];
$output["s_c_sign"] = $row["s_c_sign"];
$output["s_c_name"] = $row["s_c_name"];
$output["s_c_date"] = $row["s_c_date"];
$output["s_c_time"] = $row["s_c_time"];
$output["s_c_remarks"] = $row["s_c_remarks"];
$output["a_c_sign"] = $row["a_c_sign"];
$output["a_c_name"] = $row["a_c_name"];
$output["a_c_date"] = $row["a_c_date"];
$output["a_c_time"] = $row["a_c_time"];
$output["a_c_remarks"] = $row["a_c_remarks"];
$output["pac"] = $row["pac"];
$output["anasthsia_care_plan"] = $row["anasthsia_care_plan"];
$output["pr_optv_chcklst"] = $row["pr_optv_chcklst"];
$output["anasthsia_sfty_chcklst"] = $row["anasthsia_sfty_chcklst"];
$output["surgn_sign"] = $row["surgn_sign"];
$output["surgn_name"] = $row["surgn_name"];
$output["surgn_date"] = $row["surgn_date"];
$output["surgn_time"] = $row["surgn_time"];
$output["surgn_remarks"] = $row["surgn_remarks"];
$output["anast_sign"] = $row["anast_sign"];
$output["anast_name"] = $row["anast_name"];
$output["anast_date"] = $row["anast_date"];
$output["anast_time"] = $row["anast_time"];
$output["anast_remarks"] = $row["anast_remarks"];
$output["nurse_sign"] = $row["nurse_sign"];
$output["nurse_name"] = $row["nurse_name"];
$output["nurse_date"] = $row["nurse_date"];
$output["nurse_time"] = $row["nurse_time"];
$output["nurse_remarks"] = $row["nurse_remarks"];
$output["anaeshts_chart"] = $row["anaeshts_chart"];
$output["intraptv_mon_rcrd"] = $row["intraptv_mon_rcrd"];
$output["anaeshts_chart1"] = $row["anaeshts_chart1"];
$output["pst_anaeshts_mgmt"] = $row["pst_anaeshts_mgmt"];
$output["opertv_notes"] = $row["opertv_notes"];

		
		echo json_encode($output);
	}
}
?>