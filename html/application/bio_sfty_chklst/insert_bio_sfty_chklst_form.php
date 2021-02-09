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
		$info['bmw_dus_bins_yn'] = $_POST['bmw_dus_bins_yn'];
		$info['bmw_dus_bins_loc'] = $_POST['bmw_dus_bins_loc'];
		$info['bmw_dus_bins_rmrk'] = $_POST['bmw_dus_bins_rmrk'];
		$info['punctr_prof_contanr_yn'] = $_POST['punctr_prof_contanr_yn'];
		$info['punctr_prof_contanr_loc'] = $_POST['punctr_prof_contanr_loc'];
		$info['punctr_prof_contanr_rmrk'] = $_POST['punctr_prof_contanr_rmrk'];
		$info['bllod_spillgage_yn'] = $_POST['bllod_spillgage_yn'];
		$info['bllod_spillgage_loc'] = $_POST['bllod_spillgage_loc'];
		$info['bllod_spillgage_rmrk'] = $_POST['bllod_spillgage_rmrk'];
		$info['ppe_prctn_yn'] = $_POST['ppe_prctn_yn'];
		$info['ppe_prctn_loc'] = $_POST['ppe_prctn_loc'];
		$info['ppe_prctn_rmrk'] = $_POST['ppe_prctn_rmrk'];
		$info['central_biomtrc_avalbl_yn'] = $_POST['central_biomtrc_avalbl_yn'];
		$info['central_biomtrc_avalbl_loc'] = $_POST['central_biomtrc_avalbl_loc'];
		$info['central_biomtrc_avalbl_rmrk'] = $_POST['central_biomtrc_avalbl_rmrk'];
		$info['needle_prick_gudline_yn'] = $_POST['needle_prick_gudline_yn'];
		$info['needle_prick_gudline_loc'] = $_POST['needle_prick_gudline_loc'];
		$info['needle_prick_gudline_rmrk'] = $_POST['needle_prick_gudline_rmrk'];
		$info['staff_prcution_yn'] = $_POST['staff_prcution_yn'];
		$info['staff_prcution_loc'] = $_POST['staff_prcution_loc'];
		$info['staff_prcution_rmrk'] = $_POST['staff_prcution_rmrk'];
		$info['staff_hepatitis_yn'] = $_POST['staff_hepatitis_yn'];
		$info['staff_hepatitis_loc'] = $_POST['staff_hepatitis_loc'];
		$info['staff_hepatitis_rmrk'] = $_POST['staff_hepatitis_rmrk'];






			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT bio_sfty_chklst_id FROM tbl_bio_sfty_chklst ORDER BY bio_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['bio_sfty_chklst_id'];
		$cid = $id+1;
		$info['bio_sfty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_bio_sfty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Bio Safety Checklist Submitted Successfully';
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
				
			$statement = $connection->prepare("UPDATE tbl_bio_sfty_chklst SET $set_string WHERE bio_sfty_chklst_id = $id ");
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Bio Safety Checklist Updated Successfully';
		}
		}
		
	}

?>