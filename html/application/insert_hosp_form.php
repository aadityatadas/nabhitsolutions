<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT huf_id FROM tbl_huf ORDER BY huf_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['huf_id'];
		$cid = $id+1;
		$surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		$d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		$d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
		if($d2 != '')
		{
			$diff = abs(strtotime($d2) - strtotime($d1));
			$days = $diff/(60 * 60 * 24);
		}else{
			$days = '';
		}		
		
		$d_adm = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		$ddat1 = str_replace('/', '-', $d_adm);
		$d_my = date('Y-m', strtotime($ddat1));
		
		$dddd = mysqli_real_escape_string($connect, $_POST["dddd"]);
				
		$statement = $connection->prepare("
			INSERT INTO tbl_huf (huf_id, huf_pname, huf_uhid, huf_ipd, huf_dadm, huf_tadm,tyofadmison, huf_ddd, huf_dddd, huf_tddd, huf_mlc, huf_surg, huf_lens, int_ddd, int_tottm, int_recd, vent_dt_iuc, vent_dt_ruc, vent_tcd, vent_sympt, vent_sympt_det, vent_ssc, vent_spc, vent_rcd, cath_uti_iuc, cath_uti_ruc, cath_uti_tcd, cath_uti_symp, cath_uti_symp_det, cath_uti_ssc, cath_uti_spc, cath_uti_recd, cent_bs_dticlc, cent_bs_dtrclc, cent_bs_tcld, cent_bs_symp, cent_bs_symp_det, cent_bs_ssc, cent_bs_clabsi, cent_bs_recd, surg_dtos, surg_nsurg, surg_symp, surg_symp_det, surg_dtssc, surg_sp_ssi, surg_recd, ipds_rating, ipds_recd, opds_dr_sp, opds_rating, opds_recd, wttm_opdno, wttm_drsp, wttm_dttmr, wttm_dttmds, wttm_opdwttm, wttm_recd, huf_my, huf_recd) 
			VALUES ('$cid', :p_name, :uhid_no, :ipd_no, '$d1', :t_adm,:tyofadmison, :ddd, '$d2', :tddd, :mlc, :surg, '$days', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$d_my', '$ses')
		");
		$result = $statement->execute(
			array(
				':p_name'		=>	$_POST["p_name"],
				':uhid_no'		=>	$_POST["uhid_no"],
				':ipd_no'		=>	$_POST["ipd_no"],
				':t_adm'		=>	$_POST["t_adm"],
				':tyofadmison'	=>  $_POST["tyofadmison"],
				':ddd'			=>	$_POST["ddd"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
				//':los'			=>	$_POST["los"]
			)
		);
		if($surgy == 'Surgery')
		{
			$sq = "INSERT INTO tbl_senti_det(huf_id, senti_nm_surg_pl, senti_nm_surg_dn, senti_dt_surg_pl, senti_dt_surg_dn, senti_tp_ans_pl, senti_tp_ans_gv, senti_resch_surg_dn, senti_resch_surg_dn_det, senti_unpl_ret_ot, senti_unpl_ret_ot_det, senti_prf_topvev, senti_appr_propantb, senti_chng_surg_pl_int, senti_rexpl, senti_pacdn, senti_mod_anspl, senti_mod_anspl_det, senti_unp_vent_aft_ans, senti_dth_rel_ans, senti_any_adv_ans_evt, senti_any_adv_surg_evt, senti_recd)
			VALUES('$cid','','','','','','','','','','','','','','','','','','','','','','')";
			mysqli_query($connect,$sq);		
		}
		$sq2 = "INSERT INTO tbl_blood_fusion(huf_id, bld_prdreq, bld_nounit, bld_dtreq, bld_tmreq, bld_bankname, bld_ordby, bld_dtrec, bld_norec, bld_tmrec, bld_tat, bld_recby, bld_notrfus, bld_trfusreact, bld_waste, bld_waste_det, bld_recd)
		VALUES('$cid','','','','','','','','','','','','','','','','')";
		mysqli_query($connect,$sq2);
		$sq3 = "INSERT INTO tbl_care_evt(huf_id, care_dtpli, care_tmpli, care_vipsc, care_signsymp, care_signsymp_det, care_signsymp_th, care_signsymp_th_det, care_bradsc, care_signsyp_bed, care_signsyp_bed_det, care_mor_sc, care_incd_ptfall, care_incd_ptfall_det, care_iardl, care_iardl_det, care_injtpt, care_injtpt_det, care_recd)
		VALUES('$cid','','','','','','','','','','','','','','','','','','')";
		mysqli_query($connect,$sq3);
		$sq4 = "INSERT INTO tbl_medi_indi(huf_id, medi_mrdav, medi_mrdfile, medi_mrddissum, medi_mrdicd, medi_mrdimpcons, medi_mediord, medi_handsheet_dr, medi_handsheet_nur, medi_planofcare, medi_mrd_screen, medi_mrd_nur_careplan, medi_recd)
		VALUES('$cid','','','','','','','','','','','','')";
		mysqli_query($connect,$sq4);		
		
		if(!empty($result))
		{
			echo 'Hospital Utilization Form Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		$user_id = mysqli_real_escape_string($connect, $_POST["user_id"]);
		$d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		$d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
		
		if($d2 != '')
		{
			$diff = abs(strtotime($d2) - strtotime($d1));
			$days = $diff/(60 * 60 * 24);
		}else{
			$days = '';
		}
		
		$d_adm = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		$ddat1 = str_replace('/', '-', $d_adm);
		$d_my = date('Y-m', strtotime($ddat1));
				
		$dddd = mysqli_real_escape_string($connect, $_POST["dddd"]);
				
		$statement = $connection->prepare(
			"UPDATE tbl_huf 
			SET huf_pname = :p_name, huf_uhid = :uhid_no, huf_ipd = :ipd_no, huf_dadm = '$d1', huf_tadm = :t_adm, tyofadmison =:tyofadmison, huf_ddd = :ddd, huf_dddd = '$d2', huf_tddd = :tddd, huf_mlc = :mlc, huf_surg = :surg, huf_lens = '$days', huf_my = '$d_my', huf_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				':p_name'		=>	$_POST["p_name"],
				':uhid_no'		=>	$_POST["uhid_no"],
				':ipd_no'		=>	$_POST["ipd_no"],
				':t_adm'		=>	$_POST["t_adm"],
				':tyofadmison'  =>  $_POST['tyofadmison'],
				':ddd'			=>	$_POST["ddd"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
			)
		);
		if($surgy == 'Surgery')
		{
			$qs = mysqli_query($connect,"SELECT huf_id FROM tbl_senti_det WHERE huf_id = '$user_id'");
			$sr = mysqli_num_rows($qs);
			if($sr == '0')
			{
				$qry = "SELECT senti_det_id FROM tbl_senti_det ORDER BY senti_det_id DESC";
				$res = mysqli_query($connect, $qry);
				$row=mysqli_fetch_array($res);
				$id = $row['senti_det_id'];
				$cid = $id+1;
				$sq = "INSERT INTO tbl_senti_det(senti_det_id, huf_id, senti_nm_surg_pl, senti_nm_surg_dn, senti_dt_surg_pl, senti_dt_surg_dn, senti_tp_ans_pl, senti_tp_ans_gv, senti_resch_surg_dn, senti_resch_surg_dn_det, senti_unpl_ret_ot, senti_unpl_ret_ot_det, senti_prf_topvev, senti_appr_propantb, senti_chng_surg_pl_int, senti_rexpl, senti_pacdn, senti_mod_anspl, senti_mod_anspl_det, senti_unp_vent_aft_ans, senti_dth_rel_ans, senti_any_adv_ans_evt, senti_any_adv_surg_evt, senti_recd)
				VALUES('$cid','$user_id','','','','','','','','','','','','','','','','','','','','','','')";
				mysqli_query($connect,$sq);	
			}
		}
		if(!empty($result))
		{
			echo 'Hospital Utilization Form Updated Successfully';
		}
	}
}
?>