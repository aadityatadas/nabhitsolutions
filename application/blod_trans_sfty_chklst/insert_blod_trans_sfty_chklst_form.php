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
		$info['blod_grup_done_yn'] = $_POST['blod_grup_done_yn'];
		$info['blod_grup_done_loc'] = $_POST['blod_grup_done_loc'];
		$info['blod_grup_done_rmrk'] = $_POST['blod_grup_done_rmrk'];
		$info['blod_rqust_reqsion_yn'] = $_POST['blod_rqust_reqsion_yn'];
		$info['blod_rqust_reqsion_loc'] = $_POST['blod_rqust_reqsion_loc'];
		$info['blod_rqust_reqsion_rmrk'] = $_POST['blod_rqust_reqsion_rmrk'];
		$info['trans_obtained_yn'] = $_POST['trans_obtained_yn'];
		$info['trans_obtained_loc'] = $_POST['trans_obtained_loc'];
		$info['trans_obtained_rmrk'] = $_POST['trans_obtained_rmrk'];
		$info['tat_strg_condtn_yn'] = $_POST['tat_strg_condtn_yn'];
		$info['tat_strg_condtn_loc'] = $_POST['tat_strg_condtn_loc'];
		$info['tat_strg_condtn_rmrk'] = $_POST['tat_strg_condtn_rmrk'];
		$info['after_recvg_blod_bag_yn'] = $_POST['after_recvg_blod_bag_yn'];
		$info['after_recvg_blod_bag_loc'] = $_POST['after_recvg_blod_bag_loc'];
		$info['after_recvg_blod_bag_rmrk'] = $_POST['after_recvg_blod_bag_rmrk'];
		$info['blod_trans_monit_form_yn'] = $_POST['blod_trans_monit_form_yn'];
		$info['blod_trans_monit_form_loc'] = $_POST['blod_trans_monit_form_loc'];
		$info['blod_trans_monit_form_rmrk'] = $_POST['blod_trans_monit_form_rmrk'];
		$info['blod_trans_rectn_yn'] = $_POST['blod_trans_rectn_yn'];
		$info['blod_trans_rectn_loc'] = $_POST['blod_trans_rectn_loc'];
		$info['blod_trans_rectn_rmrk'] = $_POST['blod_trans_rectn_rmrk'];
		$info['emtpy_bloodbag_soltn_yn'] = $_POST['emtpy_bloodbag_soltn_yn'];
		$info['emtpy_bloodbag_soltn_loc'] = $_POST['emtpy_bloodbag_soltn_loc'];
		$info['emtpy_bloodbag_soltn_rmrk'] = $_POST['emtpy_bloodbag_soltn_rmrk'];





			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT blod_trans_safty_chklst_id FROM tbl_blod_trans_safty_chklst ORDER BY blod_trans_safty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['blod_trans_safty_chklst_id'];
		$cid = $id+1;
		$info['blod_trans_safty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_blod_trans_safty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Blood Transfusion safety checklist Submitted Successfully';
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
				
			$statement = $connection->prepare("UPDATE tbl_blod_trans_safty_chklst SET $set_string WHERE blod_trans_safty_chklst_id = $id ");
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Blood Transfusion safety checklist Updated Successfully';
		}
		}
		
	}

?>