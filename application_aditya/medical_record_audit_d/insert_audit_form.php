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
     $info['mr_without_dis_summary'] = $_POST['mr_without_dis_summary'];
     
     $info['mr_having_incm_imp_const'] = $_POST['mr_having_incm_imp_const'];
$info['mr_without_sign_init_ass_sheet'] = $_POST['mr_without_sign_init_ass_sheet'];
$info['mr_without_sign_init_medictn_order'] = $_POST['mr_without_sign_init_medictn_order'];
$info['mr_without_nursing_asst'] = $_POST['mr_without_nursing_asst'];
$info['mr_without_nutrition_asst'] = $_POST['mr_without_nutrition_asst'];
$info['mr_without_physipy_asst'] = $_POST['mr_without_physipy_asst'];
$info['post_anaesthesia_scroing_sign_anaesthist'] = $_POST['post_anaesthesia_scroing_sign_anaesthist'];

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
			
          
				
			$statement = $connection->prepare("UPDATE tbl_medical_record_audit SET $set_string WHERE id = $user_id ");
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Data saved';
		}
     

		
	}
}
exit();
?>