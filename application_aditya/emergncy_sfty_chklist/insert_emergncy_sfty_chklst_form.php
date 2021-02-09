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
		


$info['emergncy_codes_numbers_yn'] = $_POST['emergncy_codes_numbers_yn'];
$info['emergncy_codes_numbers_loc'] = $_POST['emergncy_codes_numbers_loc'];
$info['emergncy_codes_numbers_rmrk'] = $_POST['emergncy_codes_numbers_rmrk'];
$info['roles_emrgy_cards_yn'] = $_POST['roles_emrgy_cards_yn'];
$info['roles_emrgy_cards_loc'] = $_POST['roles_emrgy_cards_loc'];
$info['roles_emrgy_cards_rmrk'] = $_POST['roles_emrgy_cards_rmrk'];
$info['emergncy_code_alarm_yn'] = $_POST['emergncy_code_alarm_yn'];
$info['emergncy_code_alarm_loc'] = $_POST['emergncy_code_alarm_loc'];
$info['emergncy_code_alarm_rmrk'] = $_POST['emergncy_code_alarm_rmrk'];
$info['mock_drills_check_yn'] = $_POST['mock_drills_check_yn'];
$info['mock_drills_check_loc'] = $_POST['mock_drills_check_loc'];
$info['mock_drills_check_rmrk'] = $_POST['mock_drills_check_rmrk'];
$info['emergncy_equipment_chklst_yn'] = $_POST['emergncy_equipment_chklst_yn'];
$info['emergncy_equipment_chklst_loc'] = $_POST['emergncy_equipment_chklst_loc'];
$info['emergncy_equipment_chklst_rmrk'] = 
$_POST['emergncy_equipment_chklst_rmrk'];






			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT emergncy_sfty_chklst_id FROM tbl_emergncy_sfty_chklst ORDER BY emergncy_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['emergncy_sfty_chklst_id'];
		$cid = $id+1;
		$info['emergncy_sfty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_emergncy_sfty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Emergency Prepareness Checklist Submitted Successfully';
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
		
			$statement = $connection->prepare("UPDATE tbl_emergncy_sfty_chklst SET $set_string WHERE emergncy_sfty_chklst_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Emergency Prepareness Checklist Updated Successfully';
		}
		}
		
	}

?>