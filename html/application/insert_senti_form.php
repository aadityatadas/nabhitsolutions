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
			senti_prf_topvev = :mo11, senti_appr_propantb = :mo12, senti_chng_surg_pl_int = :mo13, senti_rexpl = :mo14, senti_pacdn = :mo15, senti_mod_anspl = :mo16, senti_mod_anspl_det = :mo17, senti_unp_vent_aft_ans = :mo18, senti_dth_rel_ans = :mo19, senti_any_adv_ans_evt = :mo20, senti_any_adv_surg_evt = :mo21, senti_recd = '$ses' ,
					senti_unp_vent_aft_ans_det =:mo18_r, 
				senti_dth_rel_ans_det = :mo19_r,
				senti_any_adv_ans_evt_det = :mo20_r,
				senti_any_adv_surg_evt_det   = :mo21_r
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
				':mo21'		=>	$_POST["mo21"],
				':mo18_r'	=>	$_POST["mo18_r"],
				':mo19_r'	=>	$_POST["mo19_r"],
				':mo20_r'	=>	$_POST["mo20_r"],
				':mo21_r'	=>	$_POST["mo21_r"]
			)
		);

		if(isset($_POST["mo112"])){
			for($count = 0; $count < count($_POST["mo112"]); $count++)
    		{
    			$tbl_senti_det_id 	= 	$_POST["sr_no"];
    			$mo1				=	$_POST["mo112"][$count];
				$mo2				=	$_POST["mo212"][$count];
				$mo3				=	$_POST["mo31"][$count];
				$mo4				=	$_POST["mo41"][$count];
				$mo5				=	$_POST["mo51"][$count];
				$mo6				=	$_POST["mo61"][$count];
				$mo7				=	$_POST["mo71"][$count];
				$mo8				=	$_POST["mo81"][$count];
				$mo9				=	$_POST["mo91"][$count];
				$mo10				=	$_POST["mo101"][$count];
				$mo11				=	$_POST["mo111"][$count];
				$mo12				=	$_POST["mo121"][$count];
				$mo13				=	$_POST["mo131"][$count];
				$mo14				=	$_POST["mo141"][$count];
				$mo15				=	$_POST["mo151"][$count];
				$mo16				=	$_POST["mo161"][$count];
				$mo17				=	$_POST["mo171"][$count];
				$mo18				=	$_POST["mo181"][$count];
				$mo19				=	$_POST["mo191"][$count];
				$mo20				=	$_POST["mo201"][$count];
				$mo21				=	$_POST["mo211"][$count];
				$mo18_r				=	$_POST["mo181_r"][$count];
				$mo19_r				=	$_POST["mo191_r"][$count];
				$mo20_r				=	$_POST["mo201_r"][$count];
				$mo21_r				=	$_POST["mo211_r"][$count];
		    
					$statement = $connection->prepare(
					"INSERT INTO tbl_senti_det_addon (`tbl_senti_det_id`,`senti_nm_surg_pl` , `senti_nm_surg_dn`, `senti_dt_surg_pl`, `senti_dt_surg_dn`, `senti_tp_ans_pl`, `senti_tp_ans_gv`, `senti_resch_surg_dn`, `senti_resch_surg_dn_det`, `senti_unpl_ret_ot`, `senti_unpl_ret_ot_det`,`senti_prf_topvev`, `senti_appr_propantb`, `senti_chng_surg_pl_int`, `senti_rexpl`, `senti_pacdn`, `senti_mod_anspl`, `senti_mod_anspl_det`, `senti_unp_vent_aft_ans`, `senti_dth_rel_ans`, `senti_any_adv_ans_evt`, `senti_any_adv_surg_evt`, `senti_recd`,`senti_unp_vent_aft_ans_det`, `senti_dth_rel_ans_det`, `senti_any_adv_ans_evt_det`, `senti_any_adv_surg_evt_det`
		                            ) VALUES (  $tbl_senti_det_id,
		                                      '$mo1',
		                                      '$mo2','$mo3','$mo4','$mo5','$mo6','$mo7','$mo8','$mo9','$mo10','$mo11','$mo12','$mo13','$mo14','$mo15','$mo16','$mo17','$mo18','$mo19','$mo20','$mo21','$ses' , '$mo18_r','$mo19_r','$mo20_r','$mo21_r');"							);

				
				$result = $statement->execute();
		        
			
				if(empty($result))
				{
					 echo ' Error in Submission of  Form ';
					 die();
				} 
			}
				
    	}
		
		if(!empty($result))
		{
			echo 'Sentinel Event related to surgery and anesthetia Form Updated Successfully';
		}
	}
}
?>