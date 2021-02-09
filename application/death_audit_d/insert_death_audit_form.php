<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
 function getid($table , $feild,$connect){
	    $msp1 = "SELECT $feild FROM $table ORDER BY $feild DESC";
		$mss1 = mysqli_query($connect, $msp1);
		$rs1=mysqli_fetch_array($mss1);
		$mid1 = $rs1[$feild];
		return  $mid1+1;
}

if(isset($_POST["operation"]))
{
	
	if($_POST["operation"] == "Edit")
	{

		
    
		
     $user_id = mysqli_real_escape_string($connect, $_POST["user_id"]);
     $info['condition_at_admsion'] = $_POST['condition_at_admsion'];
$info['primary_diagn'] = $_POST['primary_diagn'];
$info['cause_of_death'] = $_POST['cause_of_death'];
$info['date_death'] = $_POST['date_death'];
$info['time_death'] = $_POST['time_death'];
$info['expected_un_death'] = $_POST['expected_un_death'];
$info['apache_score'] = $_POST['apache_score'];
$info['sofa_score'] = $_POST['sofa_score'];
$info['vent_status'] = $_POST['vent_status'];
$info['surg_prodr'] = $_POST['surg_prodr'];
$info['any_event'] = $_POST['any_event'];
$info['cons_incharge'] = $_POST['cons_incharge'];
$info['other_con_involve'] = $_POST['other_con_involve'];
$info['comorbid_condtin'] = $_POST['comorbid_condtin'];
$info['relavant_lab_invt'] = $_POST['relavant_lab_invt'];
$info['relavant_radio_invt'] = $_POST['relavant_radio_invt'];
$info['cpr_status'] = $_POST['cpr_status'];
$info['condition_of_stay_mangnmt'] = $_POST['condition_of_stay_mangnmt'];

$info['team_work'] = $_POST['team_work'];
$info['technq_mang_care'] = $_POST['technq_mang_care'];
$info['med_error'] = $_POST['med_error'];
$info['decisn_making'] = $_POST['decisn_making'];
$info['staff_skill_comp'] = $_POST['staff_skill_comp'];
$info['comm_error'] = $_POST['comm_error'];
$info['eco_fact_patient'] = $_POST['eco_fact_patient'];

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
			
          
				
			$statement = $connection->prepare("UPDATE tbl_death_audit SET $set_string WHERE id = $user_id ");
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Data saved';
		}
     

		
	}
}
exit();
?>