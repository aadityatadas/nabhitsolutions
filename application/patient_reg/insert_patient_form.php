<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');

    

$info['p_name']=mysqli_real_escape_string($connect, $_POST["p_name"]);
$info['date_of_reg'] = mysqli_real_escape_string($connect, $_POST["date_of_reg"]);
$info['dob']=mysqli_real_escape_string($connect, $_POST["dddd"]);
		


		$info['uhid_no'] = $_POST['uhid_no'];
		$info['gender'] = $_POST['gender'];
		$info['mobile'] = $_POST['mobile'];
		$info['marital'] = $_POST['marital'];
		$info['address'] = $_POST['address'];
		$info['city'] = $_POST['city'];
		$info['satate'] = $_POST['satate'];
		$info['zipcode'] = $_POST['zipcode'];
		
		

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT patient_id FROM tbl_patient_reg ORDER BY patient_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['patient_id'];
		$cid = $id+1;
		//$info['patient_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_patient_reg ($field_string) VALUES ($value_string)");



		$result = $statement->execute();
	
				
		
		if(!empty($result))
		{
			echo 'Patient Registerd  Successfully';
		}
	}


	if($_POST["operation"] == "Edit")
	{
		
			foreach(array_keys($info) as $field_name) { 
				//$data[$field_name] = sc_mysql_escape($data[$field_name]);

				// if set string isn't set, set it....else append with a comma in between
				if (!isset($set_string)) {
					$set_string = "`".strtolower($field_name)."` = '$info[$field_name]'";
				} else {
					$set_string = "$set_string, `".strtolower($field_name)."` = '$info[$field_name]'";
				}
			}
			
           $id = $_POST['sr_no'];
		
			$statement = $connection->prepare("UPDATE tbl_patient_reg SET $set_string WHERE patient_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Patient Updated Successfully';
		}
		}
		
	}

?>