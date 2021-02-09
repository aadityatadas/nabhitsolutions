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
    $info['patient_name_present'] = $_POST['patient_name_present'];
	$info['medic_caps_legible'] = $_POST['medic_caps_legible'];
	$info['dose'] = $_POST['dose'];
	$info['quantity'] = $_POST['quantity'];
	$info['date_prescription'] = $_POST['date_prescription'];
	$info['high_risk_medicn_verified'] = $_POST['high_risk_medicn_verified'];
    $info['sign_of_doc'] = $_POST['sign_of_doc'];

    $info['pre_by_auth_person'] = $_POST['pre_by_auth_person'];
    $info['drug_name_clear'] = $_POST['drug_name_clear'];
    $info['dose_corret'] = $_POST['dose_corret'];
    $info['time_prescription'] = $_POST['time_prescription'];
    $info['sign_of_auth'] = $_POST['sign_of_auth'];

    

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
			
          
				
			$statement = $connection->prepare("UPDATE tbl_prescription_audit SET $set_string WHERE id = $user_id ");
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Data saved';
		}
     

		
	}
}
exit();
?>