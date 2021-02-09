<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$tbl=$_POST['tbl'];
	$output = array();
	$query =  "SELECT * FROM $tbl
           		INNER JOIN tbl_hr_mast on tbl_hr_mast.hrid = $tbl.hrid_id
              WHERE id = '".$_POST["user_id"]."' 
		      LIMIT 1";
		   
	$statement = $connection->prepare(

		$query
		
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["id"];
		
$output['audit_date'] = $row['audit_date'];

$output['hr_staff'] = $row['hr_staff'];
$output['hr_empcode'] = $row['hr_empcode'];
$output['hr_dept'] = $row['hr_dept'];

$output['tbl_hr_audit_date_id'] = $row['tbl_hr_audit_date_id'];

				
			   
//$output['da']['emp_department'] = $row['emp_department'];
$output['da']['emp_app_form'] = $row['emp_app_form'];
$output['da']['interview_ass_sheet'] = $row['interview_ass_sheet'];
$output['da']['resume_bio_cv'] = $row['resume_bio_cv'];
$output['da']['pre_emp_chkup'] = $row['pre_emp_chkup'];
$output['da']['indetify_proof_documnt'] = $row['indetify_proof_documnt'];
$output['da']['offer_letter'] = $row['offer_letter'];
$output['da']['appoint_letter'] = $row['appoint_letter'];
$output['da']['cpy_of_prof'] = $row['cpy_of_prof'];
$output['da']['exp_reliving_serv_sal_cert'] = $row['exp_reliving_serv_sal_cert'];
$output['da']['job_disc_job_spec'] = $row['job_disc_job_spec'];
$output['da']['cread_report'] = $row['cread_report'];
$output['da']['priv_report'] = $row['priv_report'];
$output['da']['traning_record'] = $row['traning_record'];
$output['da']['vaccination_record'] = $row['vaccination_record'];
$output['da']['annual_checkup'] = $row['annual_checkup'];
$output['da']['perf_appraisal'] = $row['perf_appraisal'];
$output['da']['dis_coun'] = $row['dis_coun'];
$output['da']['bacground_ver'] = $row['bacground_ver'];
$output['da']['exit_interview'] = $row['exit_interview'];
$output['da']['other_record'] = $row['other_record'];





$output['name_sign'] = $row['name_sign'];


		
		echo json_encode($output);
	}
}
?>