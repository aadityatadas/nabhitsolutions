<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');



		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		$sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);



		$info['name'] = $name;
		$info['sign'] = $sign;
		$info['date1'] = $date;
		$info['time1'] = $time;
		


$info['object_can_harm_yn'] = $_POST['object_can_harm_yn'];
$info['object_can_harm_loc'] = $_POST['object_can_harm_loc'];
$info['object_can_harm_rmrk'] = $_POST['object_can_harm_rmrk'];
$info['staircase_and_bulding_safe_yn'] =$_POST['staircase_and_bulding_safe_yn'];
$info['staircase_and_bulding_safe_loc'] = $_POST['staircase_and_bulding_safe_loc'];
$info['staircase_and_bulding_safe_rmrk'] = 
$_POST['staircase_and_bulding_safe_rmrk'];
$info['terraces_shall_locked_secured_yn'] = 
$_POST['terraces_shall_locked_secured_yn'];
$info['terraces_shall_locked_secured_loc'] = 
$_POST['terraces_shall_locked_secured_loc'];
$info['terraces_shall_locked_secured_rmrk'] = 
$_POST['terraces_shall_locked_secured_rmrk'];
$info['wanter_tanks_secured_looked_yn'] = 
$_POST['wanter_tanks_secured_looked_yn'];
$info['wanter_tanks_secured_looked_loc'] = 
$_POST['wanter_tanks_secured_looked_loc'];
$info['wanter_tanks_secured_looked_rmrk'] = 
$_POST['wanter_tanks_secured_looked_rmrk'];
$info['glasses_securd_head_yn'] = $_POST['glasses_securd_head_yn'];
$info['glasses_securd_head_loc'] = $_POST['glasses_securd_head_loc'];
$info['glasses_securd_head_rmrk'] = $_POST['glasses_securd_head_rmrk'];
$info['bulding_secured_design_yn'] = $_POST['bulding_secured_design_yn'];
$info['bulding_secured_design_loc'] = $_POST['bulding_secured_design_loc'];
$info['bulding_secured_design_rmrk'] = $_POST['bulding_secured_design_rmrk'];
$info['hospital_building_permission_yn'] = 
$_POST['hospital_building_permission_yn'];
$info['hospital_building_permission_loc'] = 
$_POST['hospital_building_permission_loc'];
$info['hospital_building_permission_rmrk'] = 
$_POST['hospital_building_permission_rmrk'];
$info['lift_shall_licensed_mantained_yn'] = 
$_POST['lift_shall_licensed_mantained_yn'];
$info['lift_shall_licensed_mantained_loc'] = 
$_POST['lift_shall_licensed_mantained_loc'];
$info['lift_shall_licensed_mantained_rmrk'] = 
$_POST['lift_shall_licensed_mantained_rmrk'];






			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT envmntl_sfty_chklst_id FROM tbl_envmntl_sfty_chklst ORDER BY envmntl_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['envmntl_sfty_chklst_id'];
		$cid = $id+1;
		$info['envmntl_sfty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_envmntl_sfty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Environmental Safety Checklist Submitted Successfully';
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
		
			$statement = $connection->prepare("UPDATE tbl_envmntl_sfty_chklst SET $set_string WHERE envmntl_sfty_chklst_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Environmental Safety Checklist Updated Successfully';
		}
		}
		
	}

?>