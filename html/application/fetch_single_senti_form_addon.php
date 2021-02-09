<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];

if(isset($_POST["senti_det_addon_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_senti_det_addon WHERE senti_det_addon_id = '".$_POST["senti_det_addon_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
        $output["mo1_edit"] = $row["senti_nm_surg_pl"];
		$output["mo2_edit"] = $row["senti_nm_surg_dn"];
		$output["mo3_edit"] = $row["senti_dt_surg_pl"];
		$output["mo4_edit"] = $row["senti_dt_surg_dn"];
		$output["mo5_edit"] = $row["senti_tp_ans_pl"];
		$output["mo6_edit"] = $row["senti_tp_ans_gv"];
		$output["mo7_edit"] = $row["senti_resch_surg_dn"];
		$output["mo8_edit"] = $row["senti_resch_surg_dn_det"];
		$output["mo9_edit"] = $row["senti_unpl_ret_ot"];
		$output["mo10_edit"] = $row["senti_unpl_ret_ot_det"];
		$output["mo11_edit"] = $row["senti_prf_topvev"];
		$output["mo12_edit"] = $row["senti_appr_propantb"];
		$output["mo13_edit"] = $row["senti_chng_surg_pl_int"];
		$output["mo14_edit"] = $row["senti_rexpl"];
		$output["mo15_edit"] = $row["senti_pacdn"];
		$output["mo16_edit"] = $row["senti_mod_anspl"];
		$output["mo17_edit"] = $row["senti_mod_anspl_det"];
		$output["mo18_edit"] = $row["senti_unp_vent_aft_ans"];
		$output["mo19_edit"] = $row["senti_dth_rel_ans"];
		$output["mo20_edit"] = $row["senti_any_adv_ans_evt"];
		$output["mo21_edit"] = $row["senti_any_adv_surg_evt"];
		$output["mo18_r_edit"] = $row["senti_unp_vent_aft_ans_det"];
		$output["mo19_r_edit"] = $row["senti_dth_rel_ans_det"];
		$output["mo20_r_edit"] = $row["senti_any_adv_ans_evt_det"];
		$output["mo21_r_edit"] = $row["senti_any_adv_surg_evt_det"];
		$output["tbl_senti_det_id"] = $row["tbl_senti_det_id"];
		$output["tbl_senti_det_addon_id"] = $row["senti_det_addon_id"];
      echo json_encode($output);
	
      }

   }
    if(isset($_POST["user_idEdit"])){
    	if($_POST["actionEdit"]=="update"){

      	$user_id = $_POST["user_idEdit"];
      	$tbl_senti_det_id = $_POST["tbl_senti_det_id"];         

      	$statement = $connection->prepare(
			"UPDATE  tbl_senti_det_addon 
			SET senti_nm_surg_pl = :mo1, senti_nm_surg_dn = :mo2, senti_dt_surg_pl = :mo3, senti_dt_surg_dn = :mo4, senti_tp_ans_pl = :mo5, senti_tp_ans_gv = :mo6, senti_resch_surg_dn = :mo7, senti_resch_surg_dn_det = :mo8, senti_unpl_ret_ot = :mo9, senti_unpl_ret_ot_det = :mo10,
			senti_prf_topvev = :mo11, senti_appr_propantb = :mo12, senti_chng_surg_pl_int = :mo13, senti_rexpl = :mo14, senti_pacdn = :mo15, senti_mod_anspl = :mo16, senti_mod_anspl_det = :mo17, senti_unp_vent_aft_ans = :mo18, senti_dth_rel_ans = :mo19, senti_any_adv_ans_evt = :mo20, senti_any_adv_surg_evt = :mo21, senti_recd = '$ses', senti_unp_vent_aft_ans_det = :mo18_r, senti_dth_rel_ans_det = :mo19_r, senti_any_adv_ans_evt_det = :mo20_r, senti_any_adv_surg_evt_det = :mo21_r  
			WHERE senti_det_addon_id = :sr_no AND tbl_senti_det_id = '$tbl_senti_det_id'
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'    => 	$user_id,
				':mo1'		=>	$_POST["mo1_edit"],
				':mo2'		=>	$_POST["mo2_edit"],
				':mo3'		=>	$_POST["mo3_edit"],
				':mo4'		=>	$_POST["mo4_edit"],
				':mo5'		=>	$_POST["mo5_edit"],
				':mo6'		=>	$_POST["mo6_edit"],
				':mo7'		=>	$_POST["mo7_edit"],
				':mo8'		=>	$_POST["mo8_edit"],
				':mo9'		=>	$_POST["mo9_edit"],
				':mo10'		=>	$_POST["mo10_edit"],
				':mo11'		=>	$_POST["mo11_edit"],
				':mo12'		=>	$_POST["mo12_edit"],
				':mo13'		=>	$_POST["mo13_edit"],
				':mo14'		=>	$_POST["mo14_edit"],
				':mo15'		=>	$_POST["mo15_edit"],
				':mo16'		=>	$_POST["mo16_edit"],
				':mo17'		=>	$_POST["mo17_edit"],
				':mo18'		=>	$_POST["mo18_edit"],
				':mo19'		=>	$_POST["mo19_edit"],
				':mo20'		=>	$_POST["mo20_edit"],
				':mo21'		=>	$_POST["mo21_edit"],
				':mo18_r'		=>	$_POST["mo18_r_edit"],
				':mo19_r'		=>	$_POST["mo19_r_edit"],
				':mo20_r'		=>	$_POST["mo20_r_edit"],
				':mo21_r'		=>	$_POST["mo21_r_edit"]
			)
		);
		if(!empty($result))
		{
			echo 'Sentinel Event related to surgery and anesthetia Form Updated Successfully';
		}

         
	

      }
  }
    

	

	

?>