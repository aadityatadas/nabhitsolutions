<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$qry = "SELECT ansthsia_chklst_id FROM tbl_ansthsia_chklst ORDER BY ansthsia_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['ansthsia_chklst_id'];
		$cid = $id+1;
		// $surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		// $d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		// $d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
			
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);

		
				
		$statement = $connection->prepare("
			INSERT INTO tbl_ansthsia_chklst (ansthsia_chklst_id ,
									  name,
								sign,
								date1,
								time1,
						surg_sfty_implnt_yn,
						pre_ope_ans_clfscn_yn,
						pac_done_24_hrs_yn,
						imm_pre_documt_yn,
						peri_ans_evnt_yn,
						anst_machin_equpmnt_yn,
						anst_drug_rectn_yn,
						anst_advrse_ade_yn,
						post_anst_trnsfr_yn,
						anst_const_risk_yn,
						surg_sfty_implnt_loc,
						pre_ope_ans_clfscn_loc,
						pac_done_24_hrs_loc,
						imm_pre_documt_loc,
						peri_ans_evnt_loc,
						anst_machin_equpmnt_loc,
						anst_drug_rectn_loc,
						anst_advrse_ade_loc,
						post_anst_trnsfr_loc,
						anst_const_risk_loc,
						surg_sfty_implnt_rmrk,
						pre_ope_ans_clfscn_rmrk,
						pac_done_24_hrs_rmrk,
						imm_pre_documt_rmrk,
						peri_ans_evnt_rmrk,
						anst_machin_equpmnt_rmrk,
						anst_drug_rectn_rmrk,
						anst_advrse_ade_rmrk,
						post_anst_trnsfr_rmrk,
						anst_const_risk_rmrk

                    ) 
			VALUES ('$cid', 
				    '$name',
					'$sign',
					'$date',
					'$time',
					:surg_sfty_implnt_yn,
						:pre_ope_ans_clfscn_yn,
						:pac_done_24_hrs_yn,
						:imm_pre_documt_yn,
						:peri_ans_evnt_yn,
						:anst_machin_equpmnt_yn,
						:anst_drug_rectn_yn,
						:anst_advrse_ade_yn,
						:post_anst_trnsfr_yn,
						:anst_const_risk_yn,
						:surg_sfty_implnt_loc,
						:pre_ope_ans_clfscn_loc,
						:pac_done_24_hrs_loc,
						:imm_pre_documt_loc,
						:peri_ans_evnt_loc,
						:anst_machin_equpmnt_loc,
						:anst_drug_rectn_loc,
						:anst_advrse_ade_loc,
						:post_anst_trnsfr_loc,
						:anst_const_risk_loc,
						:surg_sfty_implnt_rmrk,
						:pre_ope_ans_clfscn_rmrk,
						:pac_done_24_hrs_rmrk,
						:imm_pre_documt_rmrk,
						:peri_ans_evnt_rmrk,
						:anst_machin_equpmnt_rmrk,
						:anst_drug_rectn_rmrk,
						:anst_advrse_ade_rmrk,
						:post_anst_trnsfr_rmrk,
						:anst_const_risk_rmrk

               )
		");


		$result = $statement->execute(
			array(
			

		':surg_sfty_implnt_yn'  =>  $_POST['surg_sfty_implnt_yn'],
		':pre_ope_ans_clfscn_yn'  =>  $_POST['pre_ope_ans_clfscn_yn'],
		':pac_done_24_hrs_yn'  =>  $_POST['pac_done_24_hrs_yn'],
		':imm_pre_documt_yn'  =>  $_POST['imm_pre_documt_yn'],
		':peri_ans_evnt_yn'  =>  $_POST['peri_ans_evnt_yn'],
		':anst_machin_equpmnt_yn'  =>  $_POST['anst_machin_equpmnt_yn'],
		':anst_drug_rectn_yn'  =>  $_POST['anst_drug_rectn_yn'],
		':anst_advrse_ade_yn'  =>  $_POST['anst_advrse_ade_yn'],
		':post_anst_trnsfr_yn'  =>  $_POST['post_anst_trnsfr_yn'],
		':anst_const_risk_yn'  =>  $_POST['anst_const_risk_yn'],
		':surg_sfty_implnt_loc'  =>  $_POST['surg_sfty_implnt_loc'],
		':pre_ope_ans_clfscn_loc'  =>  $_POST['pre_ope_ans_clfscn_loc'],
		':pac_done_24_hrs_loc'  =>  $_POST['pac_done_24_hrs_loc'],
		':imm_pre_documt_loc'  =>  $_POST['imm_pre_documt_loc'],
		':peri_ans_evnt_loc'  =>  $_POST['peri_ans_evnt_loc'],
		':anst_machin_equpmnt_loc'  =>  $_POST['anst_machin_equpmnt_loc'],
		':anst_drug_rectn_loc'  =>  $_POST['anst_drug_rectn_loc'],
		':anst_advrse_ade_loc'  =>  $_POST['anst_advrse_ade_loc'],
		':post_anst_trnsfr_loc'  =>  $_POST['post_anst_trnsfr_loc'],
		':anst_const_risk_loc'  =>  $_POST['anst_const_risk_loc'],
		':surg_sfty_implnt_rmrk'  =>  $_POST['surg_sfty_implnt_rmrk'],
		':pre_ope_ans_clfscn_rmrk'  =>  $_POST['pre_ope_ans_clfscn_rmrk'],
		':pac_done_24_hrs_rmrk'  =>  $_POST['pac_done_24_hrs_rmrk'],
		':imm_pre_documt_rmrk'  =>  $_POST['imm_pre_documt_rmrk'],
		':peri_ans_evnt_rmrk'  =>  $_POST['peri_ans_evnt_rmrk'],
		':anst_machin_equpmnt_rmrk'  =>  $_POST['anst_machin_equpmnt_rmrk'],
		':anst_drug_rectn_rmrk'  =>  $_POST['anst_drug_rectn_rmrk'],
		':anst_advrse_ade_rmrk'  =>  $_POST['anst_advrse_ade_rmrk'],
		':post_anst_trnsfr_rmrk'  =>  $_POST['post_anst_trnsfr_rmrk'],
		':anst_const_risk_rmrk'  =>  $_POST['anst_const_risk_rmrk']



			)
		);
		
				
		
		if(!empty($result))
		{
			echo 'Anesthesia Safety  Checklist Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);
		
				
			$statement = $connection->prepare("UPDATE tbl_ansthsia_chklst 
			SET name = :name,
               sign = :sign,
               date1 = :date1,
                time1 = :time1,
          surg_sfty_implnt_yn = :surg_sfty_implnt_yn,
			pre_ope_ans_clfscn_yn = :pre_ope_ans_clfscn_yn,
			pac_done_24_hrs_yn = :pac_done_24_hrs_yn,
			imm_pre_documt_yn = :imm_pre_documt_yn,
			peri_ans_evnt_yn = :peri_ans_evnt_yn,
			anst_machin_equpmnt_yn = :anst_machin_equpmnt_yn,
			anst_drug_rectn_yn = :anst_drug_rectn_yn,
			anst_advrse_ade_yn = :anst_advrse_ade_yn,
			post_anst_trnsfr_yn = :post_anst_trnsfr_yn,
			anst_const_risk_yn = :anst_const_risk_yn,
			surg_sfty_implnt_loc = :surg_sfty_implnt_loc,
			pre_ope_ans_clfscn_loc = :pre_ope_ans_clfscn_loc,
			pac_done_24_hrs_loc = :pac_done_24_hrs_loc,
			imm_pre_documt_loc = :imm_pre_documt_loc,
			peri_ans_evnt_loc = :peri_ans_evnt_loc,
			anst_machin_equpmnt_loc = :anst_machin_equpmnt_loc,
			anst_drug_rectn_loc = :anst_drug_rectn_loc,
			anst_advrse_ade_loc = :anst_advrse_ade_loc,
			post_anst_trnsfr_loc = :post_anst_trnsfr_loc,
			anst_const_risk_loc = :anst_const_risk_loc,
			surg_sfty_implnt_rmrk = :surg_sfty_implnt_rmrk,
			pre_ope_ans_clfscn_rmrk = :pre_ope_ans_clfscn_rmrk,
			pac_done_24_hrs_rmrk = :pac_done_24_hrs_rmrk,
			imm_pre_documt_rmrk = :imm_pre_documt_rmrk,
			peri_ans_evnt_rmrk = :peri_ans_evnt_rmrk,
			anst_machin_equpmnt_rmrk = :anst_machin_equpmnt_rmrk,
			anst_drug_rectn_rmrk = :anst_drug_rectn_rmrk,
			anst_advrse_ade_rmrk = :anst_advrse_ade_rmrk,
			post_anst_trnsfr_rmrk = :post_anst_trnsfr_rmrk,
			anst_const_risk_rmrk = :anst_const_risk_rmrk

 

			WHERE ansthsia_chklst_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no' => $_POST['sr_no'],
				':name'		=>	$name,
				':sign'		=>	$sign,
				':date1'		=>	$date,
				 ':time1'=>	$time,
				

	
		':surg_sfty_implnt_yn'  =>  $_POST['surg_sfty_implnt_yn'],
		':pre_ope_ans_clfscn_yn'  =>  $_POST['pre_ope_ans_clfscn_yn'],
		':pac_done_24_hrs_yn'  =>  $_POST['pac_done_24_hrs_yn'],
		':imm_pre_documt_yn'  =>  $_POST['imm_pre_documt_yn'],
		':peri_ans_evnt_yn'  =>  $_POST['peri_ans_evnt_yn'],
		':anst_machin_equpmnt_yn'  =>  $_POST['anst_machin_equpmnt_yn'],
		':anst_drug_rectn_yn'  =>  $_POST['anst_drug_rectn_yn'],
		':anst_advrse_ade_yn'  =>  $_POST['anst_advrse_ade_yn'],
		':post_anst_trnsfr_yn'  =>  $_POST['post_anst_trnsfr_yn'],
		':anst_const_risk_yn'  =>  $_POST['anst_const_risk_yn'],
		':surg_sfty_implnt_loc'  =>  $_POST['surg_sfty_implnt_loc'],
		':pre_ope_ans_clfscn_loc'  =>  $_POST['pre_ope_ans_clfscn_loc'],
		':pac_done_24_hrs_loc'  =>  $_POST['pac_done_24_hrs_loc'],
		':imm_pre_documt_loc'  =>  $_POST['imm_pre_documt_loc'],
		':peri_ans_evnt_loc'  =>  $_POST['peri_ans_evnt_loc'],
		':anst_machin_equpmnt_loc'  =>  $_POST['anst_machin_equpmnt_loc'],
		':anst_drug_rectn_loc'  =>  $_POST['anst_drug_rectn_loc'],
		':anst_advrse_ade_loc'  =>  $_POST['anst_advrse_ade_loc'],
		':post_anst_trnsfr_loc'  =>  $_POST['post_anst_trnsfr_loc'],
		':anst_const_risk_loc'  =>  $_POST['anst_const_risk_loc'],
		':surg_sfty_implnt_rmrk'  =>  $_POST['surg_sfty_implnt_rmrk'],
		':pre_ope_ans_clfscn_rmrk'  =>  $_POST['pre_ope_ans_clfscn_rmrk'],
		':pac_done_24_hrs_rmrk'  =>  $_POST['pac_done_24_hrs_rmrk'],
		':imm_pre_documt_rmrk'  =>  $_POST['imm_pre_documt_rmrk'],
		':peri_ans_evnt_rmrk'  =>  $_POST['peri_ans_evnt_rmrk'],
		':anst_machin_equpmnt_rmrk'  =>  $_POST['anst_machin_equpmnt_rmrk'],
		':anst_drug_rectn_rmrk'  =>  $_POST['anst_drug_rectn_rmrk'],
		':anst_advrse_ade_rmrk'  =>  $_POST['anst_advrse_ade_rmrk'],
		':post_anst_trnsfr_rmrk'  =>  $_POST['post_anst_trnsfr_rmrk'],
		':anst_const_risk_rmrk'  =>  $_POST['anst_const_risk_rmrk']
			)
		);
		 
		 if(!empty($result))
		{
			echo 'Anesthesia Safety  Checklist Updated Successfully';
		}
		}
		
	}

?>