<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
 
if(isset($_POST["operation"]))
{
	
	if($_POST["operation"] == "Edit")
	{

		
   


		
     $user_id = mysqli_real_escape_string($connect, $_POST["user_id"]);
     $info['diagnosis'] = $_POST['diagnosis'];
$info['prim_consultatnt'] = $_POST['prim_consultatnt'];
$info['sec_consultant'] = $_POST['sec_consultant'];
$info['infection_if_any'] = $_POST['infection_if_any'];
$info['cat_name'] = $_POST['cat_name'];
$info['single_mix'] = $_POST['single_mix'];
$info['dose'] = $_POST['dose'];
$info['max_dose_daily'] = $_POST['max_dose_daily'];
$info['route'] = $_POST['route'];
$info['freq'] = $_POST['freq'];
$info['duration'] = $_POST['duration'];
$info['indic_use'] = $_POST['indic_use'];
$info['any_justfctin'] = $_POST['any_justfctin'];
$info['indicated_nonin'] = $_POST['indicated_nonin'];
$info['adherence_non'] = $_POST['adherence_non'];
$info['full_adhrence'] = $_POST['full_adhrence'];
$info['complinat_non_comp_ass'] = $_POST['complinat_non_comp_ass'];
$info['per_complinat_non_comp_ass'] = $_POST['per_complinat_non_comp_ass'];

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
			
          
				
		$statement = $connection->prepare("UPDATE tbl_antibiotic_audit SET $set_string WHERE id = $user_id ");
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Data saved';
		}
     

		
	}
}
exit();
?>