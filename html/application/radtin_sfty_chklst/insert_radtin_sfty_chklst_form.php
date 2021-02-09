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
		


$info['radtin_signag_x_ray_yn'] = $_POST['radtin_signag_x_ray_yn'];
$info['radtin_signag_x_ray_loc'] = $_POST['radtin_signag_x_ray_loc'];
$info['radtin_signag_x_ray_rmrk'] = $_POST['radtin_signag_x_ray_rmrk'];
$info['pregant_ladies_areas_yn'] = $_POST['pregant_ladies_areas_yn'];
$info['pregant_ladies_areas_loc'] = $_POST['pregant_ladies_areas_loc'];
$info['pregant_ladies_areas_rmrk'] = $_POST['pregant_ladies_areas_rmrk'];
$info['9_inch_wall_wndw_yn'] = $_POST['9_inch_wall_wndw_yn'];
$info['9_inch_wall_wndw_loc'] = $_POST['9_inch_wall_wndw_loc'];
$info['9_inch_wall_wndw_rmrk'] = $_POST['9_inch_wall_wndw_rmrk'];
$info['no_gap_doors_yn'] = $_POST['no_gap_doors_yn'];
$info['no_gap_doors_loc'] = $_POST['no_gap_doors_loc'];
$info['no_gap_doors_rmrk'] = $_POST['no_gap_doors_rmrk'];
$info['qa_assrnce_maintnce_yn'] = $_POST['qa_assrnce_maintnce_yn'];
$info['qa_assrnce_maintnce_loc'] = $_POST['qa_assrnce_maintnce_loc'];
$info['qa_assrnce_maintnce_rmrk'] = $_POST['qa_assrnce_maintnce_rmrk'];
$info['aerb_apprvl_machin_yn'] = $_POST['aerb_apprvl_machin_yn'];
$info['aerb_apprvl_machin_loc'] = $_POST['aerb_apprvl_machin_loc'];
$info['aerb_apprvl_machin_rmrk'] = $_POST['aerb_apprvl_machin_rmrk'];
$info['all_staff_cracks_yn'] = $_POST['all_staff_cracks_yn'];
$info['all_staff_cracks_loc'] = $_POST['all_staff_cracks_loc'];
$info['all_staff_cracks_rmrk'] = $_POST['all_staff_cracks_rmrk'];
$info['all_staff_working_yn'] = $_POST['all_staff_working_yn'];
$info['all_staff_working_loc'] = $_POST['all_staff_working_loc'];
$info['all_staff_working_rmrk'] = $_POST['all_staff_working_rmrk'];
$info['all_radtin_worker_yn'] = $_POST['all_radtin_worker_yn'];
$info['all_radtin_worker_loc'] = $_POST['all_radtin_worker_loc'];
$info['all_radtin_worker_rmrk'] = $_POST['all_radtin_worker_rmrk'];
$info['rso_desgntd_hosptl_yn'] = $_POST['rso_desgntd_hosptl_yn'];
$info['rso_desgntd_hosptl_loc'] = $_POST['rso_desgntd_hosptl_loc'];
$info['rso_desgntd_hosptl_rmrk'] = $_POST['rso_desgntd_hosptl_rmrk'];
$info['radtin_safty_traning_worker_yn'] = $_POST['radtin_safty_traning_worker_yn'];
$info['radtin_safty_traning_worker_loc'] = $_POST['radtin_safty_traning_worker_loc'];
$info['radtin_safty_traning_worker_rmrk'] = $_POST['radtin_safty_traning_worker_rmrk'];




			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT radtin_sfty_chklst_id FROM tbl_radtin_sfty_chklst ORDER BY radtin_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['radtin_sfty_chklst_id'];
		$cid = $id+1;
		$info['radtin_sfty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_radtin_sfty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Radiation safety checklist   Submitted Successfully';
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
				
			$statement = $connection->prepare("UPDATE tbl_radtin_sfty_chklst SET $set_string WHERE radtin_sfty_chklst_id = $id ");
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Radiation safety checklist   Updated Successfully';
		}
		}
		
	}

?>