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
		


$info['hosp_3_srce_powr_yn'] = $_POST['hosp_3_srce_powr_yn'];
$info['hosp_3_srce_powr_loc'] = $_POST['hosp_3_srce_powr_loc'];
$info['hosp_3_srce_powr_rmrk'] = $_POST['hosp_3_srce_powr_rmrk'];
$info['all_powr_wrking_yn'] = $_POST['all_powr_wrking_yn'];
$info['all_powr_wrking_loc'] = $_POST['all_powr_wrking_loc'];
$info['all_powr_wrking_rmrk'] = $_POST['all_powr_wrking_rmrk'];
$info['dg_shall_sufcnt_fuel_yn'] = $_POST['dg_shall_sufcnt_fuel_yn'];
$info['dg_shall_sufcnt_fuel_loc'] = $_POST['dg_shall_sufcnt_fuel_loc'];
$info['dg_shall_sufcnt_fuel_rmrk'] = $_POST['dg_shall_sufcnt_fuel_rmrk'];
$info['all_emergncy_machin_yn'] = $_POST['all_emergncy_machin_yn'];
$info['all_emergncy_machin_loc'] = $_POST['all_emergncy_machin_loc'];
$info['all_emergncy_machin_rmrk'] = $_POST['all_emergncy_machin_rmrk'];
$info['dg_shall_readings_yn'] = $_POST['dg_shall_readings_yn'];
$info['dg_shall_readings_loc'] = $_POST['dg_shall_readings_loc'];
$info['dg_shall_readings_rmrk'] = $_POST['dg_shall_readings_rmrk'];
$info['altrnt_line_safty_yn'] = $_POST['altrnt_line_safty_yn'];
$info['altrnt_line_safty_loc'] = $_POST['altrnt_line_safty_loc'];
$info['altrnt_line_safty_rmrk'] = $_POST['altrnt_line_safty_rmrk'];






			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT power_sfty_chklst_id FROM tbl_power_sfty_chklst ORDER BY power_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['power_sfty_chklst_id'];
		$cid = $id+1;
		$info['power_sfty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_power_sfty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Power safety Checklist Submitted Successfully';
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
		
			$statement = $connection->prepare("UPDATE tbl_power_sfty_chklst SET $set_string WHERE power_sfty_chklst_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Power safety Checklist Updated Successfully';
		}
		}
		
	}

?>