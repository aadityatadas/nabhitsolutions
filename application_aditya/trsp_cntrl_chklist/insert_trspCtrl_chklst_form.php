<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$qry = "SELECT transptn_sfty_chcklst_id FROM tbl_transptn_sfty_chcklst ORDER BY transptn_sfty_chcklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['transptn_sfty_chcklst_id'];
		$cid = $id+1;
		// $surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		// $d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		// $d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
			
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);

		
				
		$statement = $connection->prepare("
			INSERT INTO tbl_transptn_sfty_chcklst (transptn_sfty_chcklst_id ,
									  name,
								sign,
								date1,
								time1,
								chair_strchr_wrkng_brk_yn,
								
								chair_strchr_wrkng_brk_loc,
								chair_strchr_wrkng_brk_rmrk,
								saftery_belt_yn,
								
								saftery_belt_loc,
								saftery_belt_rmrk,
								drains_lines_yn,
							
								drains_lines_loc,
								drains_lines_rmrk,
								equip_medgas_ready_yn,
								
								equip_medgas_ready_loc,
								equip_medgas_ready_rmrk,
								transfer_note_yn,
								
								transfer_note_loc,
								transfer_note_rmrk,
								nuts_protocol_yn,
								
								nuts_protocol_loc,
								nuts_protocol_rmrk,
								proper_idenfction_patient_yn,
								
								proper_idenfction_patient_loc,
								proper_idenfction_patient_rmrk,
								criteria_def_mentnd_yn,
							
								criteria_def_mentnd_loc,
								criteria_def_mentnd_rmrk
								
                    ) 
			VALUES ('$cid', 
				    '$name',
					'$sign',
					'$date',
					'$time',
					:chair_strchr_wrkng_brk_yn,
					
					:chair_strchr_wrkng_brk_loc,
					:chair_strchr_wrkng_brk_rmrk,
					:saftery_belt_yn,
					
					:saftery_belt_loc,
					:saftery_belt_rmrk,
					:drains_lines_yn,
					
					:drains_lines_loc,
					:drains_lines_rmrk,
					:equip_medgas_ready_yn,

					:equip_medgas_ready_loc,
					:equip_medgas_ready_rmrk,
					:transfer_note_yn,
					
					:transfer_note_loc,
					:transfer_note_rmrk,
					:nuts_protocol_yn,
					
					:nuts_protocol_loc,
					:nuts_protocol_rmrk,
					:proper_idenfction_patient_yn,
					
					:proper_idenfction_patient_loc,
					:proper_idenfction_patient_rmrk,
					:criteria_def_mentnd_yn,
					
					:criteria_def_mentnd_loc,
					:criteria_def_mentnd_rmrk
               )
		");


		$result = $statement->execute(
			array(
			

':chair_strchr_wrkng_brk_yn'  => $_POST['chair_strchr_wrkng_brk_yn'],

':chair_strchr_wrkng_brk_loc'  => $_POST['chair_strchr_wrkng_brk_loc'],
':chair_strchr_wrkng_brk_rmrk'  => $_POST['chair_strchr_wrkng_brk_rmrk'],
':saftery_belt_yn'  => $_POST['saftery_belt_yn'],

':saftery_belt_loc'  => $_POST['saftery_belt_loc'],
':saftery_belt_rmrk'  => $_POST['saftery_belt_rmrk'],
':drains_lines_yn'  => $_POST['drains_lines_yn'],

':drains_lines_loc'  => $_POST['drains_lines_loc'],
':drains_lines_rmrk'  => $_POST['drains_lines_rmrk'],
':equip_medgas_ready_yn'  => $_POST['equip_medgas_ready_yn'],

':equip_medgas_ready_loc'  => $_POST['equip_medgas_ready_loc'],
':equip_medgas_ready_rmrk'  => $_POST['equip_medgas_ready_rmrk'],
':transfer_note_yn'  => $_POST['transfer_note_yn'],

':transfer_note_loc'  => $_POST['transfer_note_loc'],
':transfer_note_rmrk'  => $_POST['transfer_note_rmrk'],
':nuts_protocol_yn'  => $_POST['nuts_protocol_yn'],

':nuts_protocol_loc'  => $_POST['nuts_protocol_loc'],
':nuts_protocol_rmrk'  => $_POST['nuts_protocol_rmrk'],
':proper_idenfction_patient_yn'  => $_POST['proper_idenfction_patient_yn'],
':proper_idenfction_patient_loc'  => $_POST['proper_idenfction_patient_loc'],
':proper_idenfction_patient_rmrk'  => $_POST['proper_idenfction_patient_rmrk'],
':criteria_def_mentnd_yn'  => $_POST['criteria_def_mentnd_yn'],
':criteria_def_mentnd_loc'  => $_POST['criteria_def_mentnd_loc'],
':criteria_def_mentnd_rmrk'  => $_POST['criteria_def_mentnd_rmrk']


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
		
				
			$statement = $connection->prepare("UPDATE tbl_transptn_sfty_chcklst 
			SET name = :name,
               sign = :sign,
               date1 = :date,
                time1 = :time,
chair_strchr_wrkng_brk_yn = :chair_strchr_wrkng_brk_yn,

chair_strchr_wrkng_brk_loc = :chair_strchr_wrkng_brk_loc,
chair_strchr_wrkng_brk_rmrk = :chair_strchr_wrkng_brk_rmrk,
saftery_belt_yn = :saftery_belt_yn,

saftery_belt_loc = :saftery_belt_loc,
saftery_belt_rmrk = :saftery_belt_rmrk,
drains_lines_yn = :drains_lines_yn,

drains_lines_loc = :drains_lines_loc,
drains_lines_rmrk = :drains_lines_rmrk,
equip_medgas_ready_yn = :equip_medgas_ready_yn,

equip_medgas_ready_loc = :equip_medgas_ready_loc,
equip_medgas_ready_rmrk = :equip_medgas_ready_rmrk,
transfer_note_yn = :transfer_note_yn,

transfer_note_loc = :transfer_note_loc,
transfer_note_rmrk = :transfer_note_rmrk,
nuts_protocol_yn = :nuts_protocol_yn,

nuts_protocol_loc = :nuts_protocol_loc,
nuts_protocol_rmrk = :nuts_protocol_rmrk,
proper_idenfction_patient_yn = :proper_idenfction_patient_yn,

proper_idenfction_patient_loc = :proper_idenfction_patient_loc,
proper_idenfction_patient_rmrk = :proper_idenfction_patient_rmrk,
criteria_def_mentnd_yn = :criteria_def_mentnd_yn,

criteria_def_mentnd_loc = :criteria_def_mentnd_loc,
criteria_def_mentnd_rmrk = :criteria_def_mentnd_rmrk
 

			WHERE transptn_sfty_chcklst_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no' => $_POST['sr_no'],
				':name'		=>	$name,
				':sign'		=>	$sign,
				':date'		=>	$date,
				 ':time'=>	$time,
				

			':chair_strchr_wrkng_brk_yn'  => $_POST['chair_strchr_wrkng_brk_yn'],

':chair_strchr_wrkng_brk_loc'  => $_POST['chair_strchr_wrkng_brk_loc'],
':chair_strchr_wrkng_brk_rmrk'  => $_POST['chair_strchr_wrkng_brk_rmrk'],
':saftery_belt_yn'  => $_POST['saftery_belt_yn'],

':saftery_belt_loc'  => $_POST['saftery_belt_loc'],
':saftery_belt_rmrk'  => $_POST['saftery_belt_rmrk'],
':drains_lines_yn'  => $_POST['drains_lines_yn'],

':drains_lines_loc'  => $_POST['drains_lines_loc'],
':drains_lines_rmrk'  => $_POST['drains_lines_rmrk'],
':equip_medgas_ready_yn'  => $_POST['equip_medgas_ready_yn'],

':equip_medgas_ready_loc'  => $_POST['equip_medgas_ready_loc'],
':equip_medgas_ready_rmrk'  => $_POST['equip_medgas_ready_rmrk'],
':transfer_note_yn'  => $_POST['transfer_note_yn'],
':transfer_note_loc'  => $_POST['transfer_note_loc'],
':transfer_note_rmrk'  => $_POST['transfer_note_rmrk'],
':nuts_protocol_yn'  => $_POST['nuts_protocol_yn'],
':nuts_protocol_loc'  => $_POST['nuts_protocol_loc'],
':nuts_protocol_rmrk'  => $_POST['nuts_protocol_rmrk'],
':proper_idenfction_patient_yn'  => $_POST['proper_idenfction_patient_yn'],

':proper_idenfction_patient_loc'  => $_POST['proper_idenfction_patient_loc'],
':proper_idenfction_patient_rmrk'  => $_POST['proper_idenfction_patient_rmrk'],
':criteria_def_mentnd_yn'  => $_POST['criteria_def_mentnd_yn'],

':criteria_def_mentnd_loc'  => $_POST['criteria_def_mentnd_loc'],
':criteria_def_mentnd_rmrk'  => $_POST['criteria_def_mentnd_rmrk'],

			)
		);
		 
		 if(!empty($result))
		{
			echo 'Infection Control Checklist Updated Successfully';
		}
		}
		
	}

?>