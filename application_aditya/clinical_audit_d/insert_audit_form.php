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
     $info['case_details'] = $_POST['case_details'];
     $info['sent_on'] = $_POST['sent_on'];
     $info['consulatnt'] = $_POST['consulatnt'];
     $info['monitoring'] = $_POST['monitoring'];
     $info['technique'] = $_POST['technique'];
     $info['frequency'] = $_POST['frequency'];
     $info['calibration'] = $_POST['calibration'];
     $info['diet_plan'] = $_POST['diet_plan'];
     $info['education'] = $_POST['education'];
     $info['fbs_rbs'] = $_POST['fbs_rbs'];
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
			
          $query = "UPDATE tbl_clinical_audit SET $set_string WHERE id = $user_id ";

          


				
			$statement = $connection->prepare($query);
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Data saved';
		}
     

		
	}
}
exit();
?>