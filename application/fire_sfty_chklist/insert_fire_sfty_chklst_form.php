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
		


$info['fire_noc_updted_yn'] = $_POST['fire_noc_updted_yn'];
$info['fire_noc_updted_loc'] = $_POST['fire_noc_updted_loc'];
$info['fire_noc_updted_rmrk'] = $_POST['fire_noc_updted_rmrk'];
$info['fire_extg_rifled_yn'] = $_POST['fire_extg_rifled_yn'];
$info['fire_extg_rifled_loc'] = $_POST['fire_extg_rifled_loc'];
$info['fire_extg_rifled_rmrk'] = $_POST['fire_extg_rifled_rmrk'];
$info['fire_hose_wrking_yn'] = $_POST['fire_hose_wrking_yn'];
$info['fire_hose_wrking_loc'] = $_POST['fire_hose_wrking_loc'];
$info['fire_hose_wrking_rmrk'] = $_POST['fire_hose_wrking_rmrk'];
$info['fire_exit_deptrmnt_yn'] = $_POST['fire_exit_deptrmnt_yn'];
$info['fire_exit_deptrmnt_loc'] = $_POST['fire_exit_deptrmnt_loc'];
$info['fire_exit_deptrmnt_rmrk'] = $_POST['fire_exit_deptrmnt_rmrk'];
$info['chemcl_comb_matrl_yn'] = $_POST['chemcl_comb_matrl_yn'];
$info['chemcl_comb_matrl_loc'] = $_POST['chemcl_comb_matrl_loc'];
$info['chemcl_comb_matrl_rmrk'] = $_POST['chemcl_comb_matrl_rmrk'];
$info['pa_system_wrking_yn'] = $_POST['pa_system_wrking_yn'];
$info['pa_system_wrking_loc'] = $_POST['pa_system_wrking_loc'];
$info['pa_system_wrking_rmrk'] = $_POST['pa_system_wrking_rmrk'];
$info['smoke_condtin_yn'] = $_POST['smoke_condtin_yn'];
$info['smoke_condtin_loc'] = $_POST['smoke_condtin_loc'];
$info['smoke_condtin_rmrk'] = $_POST['smoke_condtin_rmrk'];
$info['fire_safty_rounds_yn'] = $_POST['fire_safty_rounds_yn'];
$info['fire_safty_rounds_loc'] = $_POST['fire_safty_rounds_loc'];
$info['fire_safty_rounds_rmrk'] = $_POST['fire_safty_rounds_rmrk'];
$info['fire_preventin_abc_yn'] = $_POST['fire_preventin_abc_yn'];
$info['fire_preventin_abc_loc'] = $_POST['fire_preventin_abc_loc'];
$info['fire_preventin_abc_rmrk'] = $_POST['fire_preventin_abc_rmrk'];






			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT fire_sfty_chklst_id FROM tbl_fire_sfty_chklst ORDER BY fire_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['fire_sfty_chklst_id'];
		$cid = $id+1;
		$info['fire_sfty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_fire_sfty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Fire Safety Checklist Submitted Successfully';
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
		
			$statement = $connection->prepare("UPDATE tbl_fire_sfty_chklst SET $set_string WHERE fire_sfty_chklst_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Fire Safety Checklist Updated Successfully';
		}
		}
		
	}

?>