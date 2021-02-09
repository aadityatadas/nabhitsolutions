<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_senti_det LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_senti_det.huf_id
		WHERE senti_det_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["senti_det_id"];
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["mo1"] = $row["senti_nm_surg_pl"];
		$output["mo2"] = $row["senti_nm_surg_dn"];
		$output["mo3"] = $row["senti_dt_surg_pl"];
		$output["mo4"] = $row["senti_dt_surg_dn"];
		$output["mo5"] = $row["senti_tp_ans_pl"];
		$output["mo6"] = $row["senti_tp_ans_gv"];
		$output["mo7"] = $row["senti_resch_surg_dn"];
		$output["mo8"] = $row["senti_resch_surg_dn_det"];
		$output["mo9"] = $row["senti_unpl_ret_ot"];
		$output["mo10"] = $row["senti_unpl_ret_ot_det"];
		$output["mo11"] = $row["senti_prf_topvev"];
		$output["mo12"] = $row["senti_appr_propantb"];
		$output["mo13"] = $row["senti_chng_surg_pl_int"];
		$output["mo14"] = $row["senti_rexpl"];
		$output["mo15"] = $row["senti_pacdn"];
		$output["mo16"] = $row["senti_mod_anspl"];
		$output["mo17"] = $row["senti_mod_anspl_det"];
		$output["mo18"] = $row["senti_unp_vent_aft_ans"];
		$output["mo19"] = $row["senti_dth_rel_ans"];
		$output["mo20"] = $row["senti_any_adv_ans_evt"];
		$output["mo21"] = $row["senti_any_adv_surg_evt"];
		
		echo json_encode($output);
	}
}
?>