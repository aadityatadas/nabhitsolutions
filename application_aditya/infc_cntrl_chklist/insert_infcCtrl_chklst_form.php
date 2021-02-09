<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$qry = "SELECT inf_cntrl_checklist_id FROM tbl_inf_cntrl_checklist ORDER BY inf_cntrl_checklist_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['inf_cntrl_checklist_id'];
		$cid = $id+1;
		// $surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		// $d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		// $d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
			
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);

		
				
		$statement = $connection->prepare("
			INSERT INTO tbl_inf_cntrl_checklist (inf_cntrl_checklist_id ,
									  name,
								sign,
								date1,
								time1,
								hand_hygn_yn,
								
								hand_hygn_loc,
								hand_hygn_rmrk,
								stndrd_precation_yn,
								
								stndrd_precation_loc,
								stndrd_precation_rmrk,
								bmw_yn,
							
								bmw_loc,
								bmw_rmrk,
								immunization_yn,
								
								immunization_loc,
								immunization_rmrk,
								needle_stick_occ_expose_yn,
								
								needle_stick_occ_expose_loc,
								needle_stick_occ_expose_rmrk,
								cssd_recall_yn,
								
								cssd_recall_loc,
								cssd_recall_rmrk,
								clng_deis_strl_process_yn,
							
								clng_deis_strl_process_loc,
								clng_deis_strl_process_rmrk,
								iso_protcl_trmsn_precation_yn,
							
								iso_protcl_trmsn_precation_loc,
								iso_protcl_trmsn_precation_rmrk,
								linen_discfcn_protocol_yn,
								linen_discfcn_protocol_loc,
								linen_discfcn_protocol_rmrk,
								hyg_reltd_to_food_yn,
								hyg_reltd_to_food_loc,
								hyg_reltd_to_food_rmrk,
								envmtl_control_yn,
								envmtl_control_loc,
								envmtl_control_rmrk,
								care_of_device_yn,
								care_of_device_loc,
								care_of_device_rmrk
                    ) 
			VALUES ('$cid', 
				    '$name',
					'$sign',
					'$date',
					'$time',
					:hand_hygn_yn,
					
					:hand_hygn_loc,
					:hand_hygn_rmrk,
					:stndrd_precation_yn,
					
					:stndrd_precation_loc,
					:stndrd_precation_rmrk,
					:bmw_yn,
					
					:bmw_loc,
					:bmw_rmrk,
					:immunization_yn,

					:immunization_loc,
					:immunization_rmrk,
					:needle_stick_occ_expose_yn,
					
					:needle_stick_occ_expose_loc,
					:needle_stick_occ_expose_rmrk,
					:cssd_recall_yn,
					
					:cssd_recall_loc,
					:cssd_recall_rmrk,
					:clng_deis_strl_process_yn,
					
					:clng_deis_strl_process_loc,
					:clng_deis_strl_process_rmrk,
					:iso_protcl_trmsn_precation_yn,
					
					:iso_protcl_trmsn_precation_loc,
					:iso_protcl_trmsn_precation_rmrk,
					:linen_discfcn_protocol_yn,
				
					:linen_discfcn_protocol_loc,
					:linen_discfcn_protocol_rmrk,
					:hyg_reltd_to_food_yn,
					
					:hyg_reltd_to_food_loc,
					:hyg_reltd_to_food_rmrk,
					:envmtl_control_yn,
					
					:envmtl_control_loc,
					:envmtl_control_rmrk,
					:care_of_device_yn,
					
					:care_of_device_loc,
					:care_of_device_rmrk
               )
		");


		$result = $statement->execute(
			array(
			

':hand_hygn_yn'  => $_POST['hand_hygn_yn'],

':hand_hygn_loc'  => $_POST['hand_hygn_loc'],
':hand_hygn_rmrk'  => $_POST['hand_hygn_rmrk'],
':stndrd_precation_yn'  => $_POST['stndrd_precation_yn'],

':stndrd_precation_loc'  => $_POST['stndrd_precation_loc'],
':stndrd_precation_rmrk'  => $_POST['stndrd_precation_rmrk'],
':bmw_yn'  => $_POST['bmw_yn'],

':bmw_loc'  => $_POST['bmw_loc'],
':bmw_rmrk'  => $_POST['bmw_rmrk'],
':immunization_yn'  => $_POST['immunization_yn'],

':immunization_loc'  => $_POST['immunization_loc'],
':immunization_rmrk'  => $_POST['immunization_rmrk'],
':needle_stick_occ_expose_yn'  => $_POST['needle_stick_occ_expose_yn'],

':needle_stick_occ_expose_loc'  => $_POST['needle_stick_occ_expose_loc'],
':needle_stick_occ_expose_rmrk'  => $_POST['needle_stick_occ_expose_rmrk'],
':cssd_recall_yn'  => $_POST['cssd_recall_yn'],

':cssd_recall_loc'  => $_POST['cssd_recall_loc'],
':cssd_recall_rmrk'  => $_POST['cssd_recall_rmrk'],
':clng_deis_strl_process_yn'  => $_POST['clng_deis_strl_process_yn'],
':clng_deis_strl_process_loc'  => $_POST['clng_deis_strl_process_loc'],
':clng_deis_strl_process_rmrk'  => $_POST['clng_deis_strl_process_rmrk'],
':iso_protcl_trmsn_precation_yn'  => $_POST['iso_protcl_trmsn_precation_yn'],
':iso_protcl_trmsn_precation_loc'  => $_POST['iso_protcl_trmsn_precation_loc'],
':iso_protcl_trmsn_precation_rmrk'  => $_POST['iso_protcl_trmsn_precation_rmrk'],
':linen_discfcn_protocol_yn'  => $_POST['linen_discfcn_protocol_yn'],

':linen_discfcn_protocol_loc'  => $_POST['linen_discfcn_protocol_loc'],
':linen_discfcn_protocol_rmrk'  => $_POST['linen_discfcn_protocol_rmrk'],
':hyg_reltd_to_food_yn'  => $_POST['hyg_reltd_to_food_yn'],

':hyg_reltd_to_food_loc'  => $_POST['hyg_reltd_to_food_loc'],
':hyg_reltd_to_food_rmrk'  => $_POST['hyg_reltd_to_food_rmrk'],
':envmtl_control_yn'  => $_POST['envmtl_control_yn'],

':envmtl_control_loc'  => $_POST['envmtl_control_loc'],
':envmtl_control_rmrk'  => $_POST['envmtl_control_rmrk'],
':care_of_device_yn'  => $_POST['care_of_device_yn'],

':care_of_device_loc'  => $_POST['care_of_device_loc'],
':care_of_device_rmrk'  => $_POST['care_of_device_rmrk']


			)
		);
		
				
		
		if(!empty($result))
		{
			echo 'Infection Control Checklist Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);
		
				
			$statement = $connection->prepare("UPDATE tbl_inf_cntrl_checklist 
			SET name = :name,
               sign = :sign,
               date1 = :date,
                time1 = :time,
hand_hygn_yn = :hand_hygn_yn,

hand_hygn_loc = :hand_hygn_loc,
hand_hygn_rmrk = :hand_hygn_rmrk,
stndrd_precation_yn = :stndrd_precation_yn,

stndrd_precation_loc = :stndrd_precation_loc,
stndrd_precation_rmrk = :stndrd_precation_rmrk,
bmw_yn = :bmw_yn,

bmw_loc = :bmw_loc,
bmw_rmrk = :bmw_rmrk,
immunization_yn = :immunization_yn,

immunization_loc = :immunization_loc,
immunization_rmrk = :immunization_rmrk,
needle_stick_occ_expose_yn = :needle_stick_occ_expose_yn,

needle_stick_occ_expose_loc = :needle_stick_occ_expose_loc,
needle_stick_occ_expose_rmrk = :needle_stick_occ_expose_rmrk,
cssd_recall_yn = :cssd_recall_yn,

cssd_recall_loc = :cssd_recall_loc,
cssd_recall_rmrk = :cssd_recall_rmrk,
clng_deis_strl_process_yn = :clng_deis_strl_process_yn,

clng_deis_strl_process_loc = :clng_deis_strl_process_loc,
clng_deis_strl_process_rmrk = :clng_deis_strl_process_rmrk,
iso_protcl_trmsn_precation_yn = :iso_protcl_trmsn_precation_yn,

iso_protcl_trmsn_precation_loc = :iso_protcl_trmsn_precation_loc,
iso_protcl_trmsn_precation_rmrk = :iso_protcl_trmsn_precation_rmrk,
linen_discfcn_protocol_yn = :linen_discfcn_protocol_yn,

linen_discfcn_protocol_loc = :linen_discfcn_protocol_loc,
linen_discfcn_protocol_rmrk = :linen_discfcn_protocol_rmrk,
hyg_reltd_to_food_yn = :hyg_reltd_to_food_yn,

hyg_reltd_to_food_loc = :hyg_reltd_to_food_loc,
hyg_reltd_to_food_rmrk = :hyg_reltd_to_food_rmrk,
envmtl_control_yn = :envmtl_control_yn,

envmtl_control_loc = :envmtl_control_loc,
envmtl_control_rmrk = :envmtl_control_rmrk,
care_of_device_yn = :care_of_device_yn,

care_of_device_loc = :care_of_device_loc,
care_of_device_rmrk = :care_of_device_rmrk
 

			WHERE inf_cntrl_checklist_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no' => $_POST['sr_no'],
				':name'		=>	$name,
				':sign'		=>	$sign,
				':date'		=>	$date,
				 ':time'=>	$time,
				

			':hand_hygn_yn'  => $_POST['hand_hygn_yn'],

':hand_hygn_loc'  => $_POST['hand_hygn_loc'],
':hand_hygn_rmrk'  => $_POST['hand_hygn_rmrk'],
':stndrd_precation_yn'  => $_POST['stndrd_precation_yn'],

':stndrd_precation_loc'  => $_POST['stndrd_precation_loc'],
':stndrd_precation_rmrk'  => $_POST['stndrd_precation_rmrk'],
':bmw_yn'  => $_POST['bmw_yn'],

':bmw_loc'  => $_POST['bmw_loc'],
':bmw_rmrk'  => $_POST['bmw_rmrk'],
':immunization_yn'  => $_POST['immunization_yn'],

':immunization_loc'  => $_POST['immunization_loc'],
':immunization_rmrk'  => $_POST['immunization_rmrk'],
':needle_stick_occ_expose_yn'  => $_POST['needle_stick_occ_expose_yn'],
':needle_stick_occ_expose_loc'  => $_POST['needle_stick_occ_expose_loc'],
':needle_stick_occ_expose_rmrk'  => $_POST['needle_stick_occ_expose_rmrk'],
':cssd_recall_yn'  => $_POST['cssd_recall_yn'],
':cssd_recall_loc'  => $_POST['cssd_recall_loc'],
':cssd_recall_rmrk'  => $_POST['cssd_recall_rmrk'],
':clng_deis_strl_process_yn'  => $_POST['clng_deis_strl_process_yn'],

':clng_deis_strl_process_loc'  => $_POST['clng_deis_strl_process_loc'],
':clng_deis_strl_process_rmrk'  => $_POST['clng_deis_strl_process_rmrk'],
':iso_protcl_trmsn_precation_yn'  => $_POST['iso_protcl_trmsn_precation_yn'],

':iso_protcl_trmsn_precation_loc'  => $_POST['iso_protcl_trmsn_precation_loc'],
':iso_protcl_trmsn_precation_rmrk'  => $_POST['iso_protcl_trmsn_precation_rmrk'],
':linen_discfcn_protocol_yn'  => $_POST['linen_discfcn_protocol_yn'],

':linen_discfcn_protocol_loc'  => $_POST['linen_discfcn_protocol_loc'],
':linen_discfcn_protocol_rmrk'  => $_POST['linen_discfcn_protocol_rmrk'],
':hyg_reltd_to_food_yn'  => $_POST['hyg_reltd_to_food_yn'],

':hyg_reltd_to_food_loc'  => $_POST['hyg_reltd_to_food_loc'],
':hyg_reltd_to_food_rmrk'  => $_POST['hyg_reltd_to_food_rmrk'],
':envmtl_control_yn'  => $_POST['envmtl_control_yn'],

':envmtl_control_loc'  => $_POST['envmtl_control_loc'],
':envmtl_control_rmrk'  => $_POST['envmtl_control_rmrk'],
':care_of_device_yn'  => $_POST['care_of_device_yn'],

':care_of_device_loc'  => $_POST['care_of_device_loc'],
':care_of_device_rmrk'  => $_POST['care_of_device_rmrk'],
			)
		);
		 
		 if(!empty($result))
		{
			echo 'Infection Control Checklist Updated Successfully';
		}
		}
		
	}

?>