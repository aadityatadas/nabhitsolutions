<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_senti_det 
			SET senti_nm_surg_pl = :mo1, senti_nm_surg_dn = :mo2, senti_dt_surg_pl = :mo3, senti_dt_surg_dn = :mo4, senti_tp_ans_pl = :mo5, senti_tp_ans_gv = :mo6, senti_resch_surg_dn = :mo7, senti_resch_surg_dn_det = :mo8, senti_unpl_ret_ot = :mo9, senti_unpl_ret_ot_det = :mo10,
			senti_prf_topvev = :mo11, senti_appr_propantb = :mo12, senti_chng_surg_pl_int = :mo13, senti_rexpl = :mo14, senti_pacdn = :mo15, senti_mod_anspl = :mo16, senti_mod_anspl_det = :mo17, senti_unp_vent_aft_ans = :mo18, senti_dth_rel_ans = :mo19, senti_any_adv_ans_evt = :mo20, senti_any_adv_surg_evt = :mo21, senti_recd = '$ses'  
			WHERE senti_det_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],
				':mo1'		=>	$_POST["mo1"],
				':mo2'		=>	$_POST["mo2"],
				':mo3'		=>	$_POST["mo3"],
				':mo4'		=>	$_POST["mo4"],
				':mo5'		=>	$_POST["mo5"],
				':mo6'		=>	$_POST["mo6"],
				':mo7'		=>	$_POST["mo7"],
				':mo8'		=>	$_POST["mo8"],
				':mo9'		=>	$_POST["mo9"],
				':mo10'		=>	$_POST["mo10"],
				':mo11'		=>	$_POST["mo11"],
				':mo12'		=>	$_POST["mo12"],
				':mo13'		=>	$_POST["mo13"],
				':mo14'		=>	$_POST["mo14"],
				':mo15'		=>	$_POST["mo15"],
				':mo16'		=>	$_POST["mo16"],
				':mo17'		=>	$_POST["mo17"],
				':mo18'		=>	$_POST["mo18"],
				':mo19'		=>	$_POST["mo19"],
				':mo20'		=>	$_POST["mo20"],
				':mo21'		=>	$_POST["mo21"]
			)
		);
		if(!empty($result))
		{
			echo 'Sentinel Event related to surgery and anesthetia Form Updated Successfully';
		}
	}
}
?>