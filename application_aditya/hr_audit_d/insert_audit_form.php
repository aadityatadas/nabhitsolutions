<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');



		$tbl = $_POST['tbl'];
		$date=mysqli_real_escape_string($connect, $_POST["audit_date"]);
		




		

// $info['emp_name'] = $_POST['hr_staff'];
// $info['emp_code'] = $_POST['hr_empcode'];
		
		$info['name_sign'] = $ses;
		

		// $info['emp_department'] = $_POST['emp_department'];
$info['emp_app_form'] = $_POST['emp_app_form'];
$info['interview_ass_sheet'] = $_POST['interview_ass_sheet'];
$info['resume_bio_cv'] = $_POST['resume_bio_cv'];
$info['pre_emp_chkup'] = $_POST['pre_emp_chkup'];
$info['indetify_proof_documnt'] = $_POST['indetify_proof_documnt'];
$info['offer_letter'] = $_POST['offer_letter'];
$info['appoint_letter'] = $_POST['appoint_letter'];
$info['cpy_of_prof'] = $_POST['cpy_of_prof'];
$info['exp_reliving_serv_sal_cert'] = $_POST['exp_reliving_serv_sal_cert'];
$info['job_disc_job_spec'] = $_POST['job_disc_job_spec'];
$info['cread_report'] = $_POST['cread_report'];
$info['priv_report'] = $_POST['priv_report'];
$info['traning_record'] = $_POST['traning_record'];
$info['vaccination_record'] = $_POST['vaccination_record'];
$info['annual_checkup'] = $_POST['annual_checkup'];
$info['perf_appraisal'] = $_POST['perf_appraisal'];
$info['dis_coun'] = $_POST['dis_coun'];
$info['bacground_ver'] = $_POST['bacground_ver'];
$info['exit_interview'] = $_POST['exit_interview'];
$info['other_record'] = $_POST['other_record'];


			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$info['audit_date'] = $date;
		
		$info['audit_time'] = date("h:i a");
		$info['created_by'] = $ses;
		$qry = "SELECT id FROM $tbl ORDER BY id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['id'];
		$cid = $id+1;
		$info['id'] = $cid;
		foreach(array_keys($info) as $field_name) {
                $info[$field_name] = mysqli_escape_string($connect,$info[$field_name]);
				if (!isset($field_string)) {
					$field_string = "`".strtolower($field_name)."`"; 
					$value_string = "'$info[$field_name]'";
				} else {
					$field_string .= ",`".strtolower($field_name)."`";
					$value_string .= ",'$info[$field_name]'";
				}
				
			}
		$statement = $connection->prepare("INSERT INTO $tbl ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'HR Audit Submitted Successfully';
		}
	}


	if($_POST["operation"] == "Edit")
	{
		$info['updated_by'] = $ses;
			foreach(array_keys($info) as $field_name) { 
				//$data[$field_name] = sc_mysql_escape($data[$field_name]);

				// if set string isn't set, set it....else append with a comma in between
				if (!isset($set_string)) {
					$set_string = "`".strtolower($field_name)."` = '$info[$field_name]'";
				} else {
					$set_string = "$set_string, `".strtolower($field_name)."` = '$info[$field_name]'";
				}
			}
			
           $id = $_POST['user_id1'];
			$query = "UPDATE $tbl SET $set_string WHERE id = $id ";	
			
			$statement = $connection->prepare($query);
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'HR Audit Updated Successfully';
		}
		}
		
	}

?>