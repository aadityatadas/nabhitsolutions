<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$qry = "SELECT surg_safty_chklst_id FROM tbl_surg_safty_chklst ORDER BY surg_safty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['surg_safty_chklst_id'];
		$cid = $id+1;
		
		// $surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		// $d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		// $d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
			
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);

		
				
		$statement = $connection->prepare("
			INSERT INTO tbl_surg_safty_chklst (surg_safty_chklst_id ,
									  name,
								sign,
								date1,
								time1,
								surg_check_imp_ya,
								
								surg_check_imp_loc,
								surg_check_imp_rmrk,
								pre_op_ot_ya,
								
								pre_op_ot_loc,
								pre_op_ot_rmrk,
								all_sfty_ensurd_ya,
							
								all_sfty_ensurd_loc,
								all_sfty_ensurd_rmrk,
								surf_clen_day_ya,
								
								surf_clen_day_loc,
								surf_clen_day_rmrk,
								check_eto_ya,
								
								check_eto_loc,
								check_eto_rmrk,
								all_inctr_cycle_ya,
								
								all_inctr_cycle_loc,
								all_inctr_cycle_rmrk,
								intra_surgy_ya,
								
								intra_surgy_loc,
								intra_surgy_rmrk,
								any_event_recrd_ya,
							
								any_event_recrd_loc,
								any_event_recrd_rmrk,
								post_sur_drn_lin_ya,
							
								post_sur_drn_lin_loc,
								post_sur_drn_lin_rmrk,
								surgry_notes_by_surgn_ya,
							
								surgry_notes_by_surgn_loc,
								surgry_notes_by_surgn_rmrk,
								constn_taken_risk_ya,
							
								constn_taken_risk_loc,
								constn_taken_risk_rmrk

								
                    ) 
			VALUES ('$cid', 
				    '$name',
					'$sign',
					'$date',
					'$time',
					:surg_check_imp_ya,
					
					:surg_check_imp_loc,
					:surg_check_imp_rmrk,
					:pre_op_ot_ya,
					
					:pre_op_ot_loc,
					:pre_op_ot_rmrk,
					:all_sfty_ensurd_ya,
					
					:all_sfty_ensurd_loc,
					:all_sfty_ensurd_rmrk,
					:surf_clen_day_ya,

					:surf_clen_day_loc,
					:surf_clen_day_rmrk,
					:check_eto_ya,
					
					:check_eto_loc,
					:check_eto_rmrk,
					:all_inctr_cycle_ya,
					
					:all_inctr_cycle_loc,
					:all_inctr_cycle_rmrk,
					:intra_surgy_ya,
					
					:intra_surgy_loc,
					:intra_surgy_rmrk,
					:any_event_recrd_ya,
					
					:any_event_recrd_loc,
					:any_event_recrd_rmrk,
					:post_sur_drn_lin_ya,
					
					:post_sur_drn_lin_loc,
					:post_sur_drn_lin_rmrk,
					:surgry_notes_by_surgn_ya,
					
					:surgry_notes_by_surgn_loc,
					:surgry_notes_by_surgn_rmrk,
					:constn_taken_risk_ya,
					
					:constn_taken_risk_loc,
					:constn_taken_risk_rmrk
               )
		");


		$result = $statement->execute(
			array(
			

':surg_check_imp_ya'  => $_POST['surg_check_imp_ya'],

':surg_check_imp_loc'  => $_POST['surg_check_imp_loc'],
':surg_check_imp_rmrk'  => $_POST['surg_check_imp_rmrk'],
':pre_op_ot_ya'  => $_POST['pre_op_ot_ya'],

':pre_op_ot_loc'  => $_POST['pre_op_ot_loc'],
':pre_op_ot_rmrk'  => $_POST['pre_op_ot_rmrk'],
':all_sfty_ensurd_ya'  => $_POST['all_sfty_ensurd_ya'],

':all_sfty_ensurd_loc'  => $_POST['all_sfty_ensurd_loc'],
':all_sfty_ensurd_rmrk'  => $_POST['all_sfty_ensurd_rmrk'],
':surf_clen_day_ya'  => $_POST['surf_clen_day_ya'],

':surf_clen_day_loc'  => $_POST['surf_clen_day_loc'],
':surf_clen_day_rmrk'  => $_POST['surf_clen_day_rmrk'],
':check_eto_ya'  => $_POST['check_eto_ya'],

':check_eto_loc'  => $_POST['check_eto_loc'],
':check_eto_rmrk'  => $_POST['check_eto_rmrk'],
':all_inctr_cycle_ya'  => $_POST['all_inctr_cycle_ya'],

':all_inctr_cycle_loc'  => $_POST['all_inctr_cycle_loc'],
':all_inctr_cycle_rmrk'  => $_POST['all_inctr_cycle_rmrk'],
':intra_surgy_ya'  => $_POST['intra_surgy_ya'],
':intra_surgy_loc'  => $_POST['intra_surgy_loc'],
':intra_surgy_rmrk'  => $_POST['intra_surgy_rmrk'],
':any_event_recrd_ya'  => $_POST['any_event_recrd_ya'],
':any_event_recrd_loc'  => $_POST['any_event_recrd_loc'],
':any_event_recrd_rmrk'  => $_POST['any_event_recrd_rmrk'],
':post_sur_drn_lin_ya'  => $_POST['post_sur_drn_lin_ya'],
':post_sur_drn_lin_loc'  => $_POST['post_sur_drn_lin_loc'],
':post_sur_drn_lin_rmrk'  => $_POST['post_sur_drn_lin_rmrk'],
':surgry_notes_by_surgn_ya'  => $_POST['surgry_notes_by_surgn_ya'],
':surgry_notes_by_surgn_loc'  => $_POST['surgry_notes_by_surgn_loc'],
':surgry_notes_by_surgn_rmrk'  => $_POST['surgry_notes_by_surgn_rmrk'],
':constn_taken_risk_ya'  => $_POST['constn_taken_risk_ya'],
':constn_taken_risk_loc'  => $_POST['constn_taken_risk_loc'],
':constn_taken_risk_rmrk'  => $_POST['constn_taken_risk_rmrk']


			)
		);
				
				
		
		if(!empty($result))
		{
			echo 'Infection Control Checklist Submitted Successfully';
		}
		else
		{
             echo "string";
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);
		
				
			$statement = $connection->prepare("UPDATE tbl_surg_safty_chklst 
			SET name = :name,
               sign = :sign,
               date1 = :date,
                time1 = :time,
surg_check_imp_ya = :surg_check_imp_ya,

surg_check_imp_loc = :surg_check_imp_loc,
surg_check_imp_rmrk = :surg_check_imp_rmrk,
pre_op_ot_ya = :pre_op_ot_ya,

pre_op_ot_loc = :pre_op_ot_loc,
pre_op_ot_rmrk = :pre_op_ot_rmrk,
all_sfty_ensurd_ya = :all_sfty_ensurd_ya,

all_sfty_ensurd_loc = :all_sfty_ensurd_loc,
all_sfty_ensurd_rmrk = :all_sfty_ensurd_rmrk,
surf_clen_day_ya = :surf_clen_day_ya,

surf_clen_day_loc = :surf_clen_day_loc,
surf_clen_day_rmrk = :surf_clen_day_rmrk,
check_eto_ya = :check_eto_ya,

check_eto_loc = :check_eto_loc,
check_eto_rmrk = :check_eto_rmrk,
all_inctr_cycle_ya = :all_inctr_cycle_ya,

all_inctr_cycle_loc = :all_inctr_cycle_loc,
all_inctr_cycle_rmrk = :all_inctr_cycle_rmrk,
intra_surgy_ya = :intra_surgy_ya,

intra_surgy_loc = :intra_surgy_loc,
intra_surgy_rmrk = :intra_surgy_rmrk,
any_event_recrd_ya = :any_event_recrd_ya,

any_event_recrd_loc = :any_event_recrd_loc,
any_event_recrd_rmrk = :any_event_recrd_rmrk,
post_sur_drn_lin_ya = :post_sur_drn_lin_ya,

post_sur_drn_lin_loc = :post_sur_drn_lin_loc,
post_sur_drn_lin_rmrk = :post_sur_drn_lin_rmrk,
surgry_notes_by_surgn_ya = :surgry_notes_by_surgn_ya,

surgry_notes_by_surgn_loc = :surgry_notes_by_surgn_loc,
surgry_notes_by_surgn_rmrk = :surgry_notes_by_surgn_rmrk,
constn_taken_risk_ya = :constn_taken_risk_ya,

constn_taken_risk_loc = :constn_taken_risk_loc,
constn_taken_risk_rmrk = :constn_taken_risk_rmrk
 

			WHERE surg_safty_chklst_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no' => $_POST['sr_no'],
				':name'		=>	$name,
				':sign'		=>	$sign,
				':date'		=>	$date,
				 ':time'=>	$time,
				

			':surg_check_imp_ya'  => $_POST['surg_check_imp_ya'],

':surg_check_imp_loc'  => $_POST['surg_check_imp_loc'],
':surg_check_imp_rmrk'  => $_POST['surg_check_imp_rmrk'],
':pre_op_ot_ya'  => $_POST['pre_op_ot_ya'],

':pre_op_ot_loc'  => $_POST['pre_op_ot_loc'],
':pre_op_ot_rmrk'  => $_POST['pre_op_ot_rmrk'],
':all_sfty_ensurd_ya'  => $_POST['all_sfty_ensurd_ya'],

':all_sfty_ensurd_loc'  => $_POST['all_sfty_ensurd_loc'],
':all_sfty_ensurd_rmrk'  => $_POST['all_sfty_ensurd_rmrk'],
':surf_clen_day_ya'  => $_POST['surf_clen_day_ya'],

':surf_clen_day_loc'  => $_POST['surf_clen_day_loc'],
':surf_clen_day_rmrk'  => $_POST['surf_clen_day_rmrk'],
':check_eto_ya'  => $_POST['check_eto_ya'],
':check_eto_loc'  => $_POST['check_eto_loc'],
':check_eto_rmrk'  => $_POST['check_eto_rmrk'],
':all_inctr_cycle_ya'  => $_POST['all_inctr_cycle_ya'],
':all_inctr_cycle_loc'  => $_POST['all_inctr_cycle_loc'],
':all_inctr_cycle_rmrk'  => $_POST['all_inctr_cycle_rmrk'],
':intra_surgy_ya'  => $_POST['intra_surgy_ya'],

':intra_surgy_loc'  => $_POST['intra_surgy_loc'],
':intra_surgy_rmrk'  => $_POST['intra_surgy_rmrk'],
':any_event_recrd_ya'  => $_POST['any_event_recrd_ya'],

':any_event_recrd_loc'  => $_POST['any_event_recrd_loc'],
':any_event_recrd_rmrk'  => $_POST['any_event_recrd_rmrk'],
':post_sur_drn_lin_ya'  => $_POST['post_sur_drn_lin_ya'],

':post_sur_drn_lin_loc'  => $_POST['post_sur_drn_lin_loc'],
':post_sur_drn_lin_rmrk'  => $_POST['post_sur_drn_lin_rmrk'],
':surgry_notes_by_surgn_ya'  => $_POST['surgry_notes_by_surgn_ya'],

':surgry_notes_by_surgn_loc'  => $_POST['surgry_notes_by_surgn_loc'],
':surgry_notes_by_surgn_rmrk'  => $_POST['surgry_notes_by_surgn_rmrk'],
':constn_taken_risk_ya'  => $_POST['constn_taken_risk_ya'],

':constn_taken_risk_loc'  => $_POST['constn_taken_risk_loc'],
':constn_taken_risk_rmrk'  => $_POST['constn_taken_risk_rmrk'],



			)
		);
		 
		 if(!empty($result))
		{
			echo 'Infection Control Checklist Updated Successfully';
		}
		}
		
	}

?>