<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');



		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		$sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);
		$location = mysqli_real_escape_string($connect, $_POST["location"]);



		$info['name'] = $name;
		$info['sign'] = $sign;
		$info['date1'] = $date;
		$info['time1'] = $time;
		$info['location'] = $location;

$info['cleanlns_yn'] = $_POST['cleanlns_yn'];
$info['cleanlns_rmrk'] = $_POST['cleanlns_rmrk'];
$info['emrgncy_med_stck_yn'] = $_POST['emrgncy_med_stck_yn'];
$info['emrgncy_med_stck_rmrk'] = $_POST['emrgncy_med_stck_rmrk'];
$info['all_equmnt_text'] = $_POST['all_equmnt_text'];
$info['all_equmnt_rmrk'] = $_POST['all_equmnt_rmrk'];
$info['bmw_mangmnt_text'] = $_POST['bmw_mangmnt_text'];
$info['bmw_mangmnt_rmrk'] = $_POST['bmw_mangmnt_rmrk'];
$info['prefld_injctn_lbld_yn'] = $_POST['prefld_injctn_lbld_yn'];
$info['prefld_injctn_lbld_rmrk'] = $_POST['prefld_injctn_lbld_rmrk'];
$info['side_rail_ncrsy_yn'] = $_POST['side_rail_ncrsy_yn'];
$info['side_rail_ncrsy_rmrk'] = $_POST['side_rail_ncrsy_rmrk'];
$info['bedpans_nesary_yn'] = $_POST['bedpans_nesary_yn'];
$info['bedpans_nesary_rmrk'] = $_POST['bedpans_nesary_rmrk'];
$info['dctr_nurse_unfrm_crd_yn'] = $_POST['dctr_nurse_unfrm_crd_yn'];
$info['dctr_nurse_unfrm_crd_rmrk'] = $_POST['dctr_nurse_unfrm_crd_rmrk'];
$info['patnt_all_clean_yn'] = $_POST['patnt_all_clean_yn'];
$info['patnt_all_clean_rmrk'] = $_POST['patnt_all_clean_rmrk'];
$info['patnt_tiolt_clean_yn'] = $_POST['patnt_tiolt_clean_yn'];
$info['patnt_tiolt_clean_rmrk'] = $_POST['patnt_tiolt_clean_rmrk'];
		


			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT ward_round_chklst_id FROM tbl_ward_round_chklst ORDER BY ward_round_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['ward_round_chklst_id'];
		$cid = $id+1;
		$info['ward_round_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_ward_round_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Ward Round Checklist Submitted Successfully';
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
		
			$statement = $connection->prepare("UPDATE tbl_ward_round_chklst SET $set_string WHERE ward_round_chklst_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Ward Round Checklist Updated Successfully';
		}
		}
		
	}

?>