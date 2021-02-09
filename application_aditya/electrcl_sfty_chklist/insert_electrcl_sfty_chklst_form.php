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
		


$info['no_uncov_casing_yn'] = $_POST['no_uncov_casing_yn'];
$info['no_uncov_casing_loc'] = $_POST['no_uncov_casing_loc'];
$info['no_uncov_casing_rmrk'] = $_POST['no_uncov_casing_rmrk'];
$info['all_elect_areas_yn'] = $_POST['all_elect_areas_yn'];
$info['all_elect_areas_loc'] = $_POST['all_elect_areas_loc'];
$info['all_elect_areas_rmrk'] = $_POST['all_elect_areas_rmrk'];
$info['electrcl_sfty_signag_yn'] = $_POST['electrcl_sfty_signag_yn'];
$info['electrcl_sfty_signag_loc'] = $_POST['electrcl_sfty_signag_loc'];
$info['electrcl_sfty_signag_rmrk'] = $_POST['electrcl_sfty_signag_rmrk'];
$info['electrcl_mats_gloves_yn'] = $_POST['electrcl_mats_gloves_yn'];
$info['electrcl_mats_gloves_loc'] = $_POST['electrcl_mats_gloves_loc'];
$info['electrcl_mats_gloves_rmrk'] = $_POST['electrcl_mats_gloves_rmrk'];
$info['mccb_quality_yn'] = $_POST['mccb_quality_yn'];
$info['mccb_quality_loc'] = $_POST['mccb_quality_loc'];
$info['mccb_quality_rmrk'] = $_POST['mccb_quality_rmrk'];
$info['earthing_secured_yn'] = $_POST['earthing_secured_yn'];
$info['earthing_secured_loc'] = $_POST['earthing_secured_loc'];
$info['earthing_secured_rmrk'] = $_POST['earthing_secured_rmrk'];
$info['dg_fenced_mat_yn'] = $_POST['dg_fenced_mat_yn'];
$info['dg_fenced_mat_loc'] = $_POST['dg_fenced_mat_loc'];
$info['dg_fenced_mat_rmrk'] = $_POST['dg_fenced_mat_rmrk'];
$info['no_chemical_combtin_yn'] = $_POST['no_chemical_combtin_yn'];
$info['no_chemical_combtin_loc'] = $_POST['no_chemical_combtin_loc'];
$info['no_chemical_combtin_rmrk'] = $_POST['no_chemical_combtin_rmrk'];
$info['regular_elec_crkt_check_yn'] = $_POST['regular_elec_crkt_check_yn'];
$info['regular_elec_crkt_check_loc'] = $_POST['regular_elec_crkt_check_loc'];
$info['regular_elec_crkt_check_rmrk'] = $_POST['regular_elec_crkt_check_rmrk'];
$info['no_smoking_boards_yn'] = $_POST['no_smoking_boards_yn'];
$info['no_smoking_boards_loc'] = $_POST['no_smoking_boards_loc'];
$info['no_smoking_boards_rmrk'] = $_POST['no_smoking_boards_rmrk'];





			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT electrcl_sfty_chklst_id FROM tbl_electrcl_sfty_chklst ORDER BY electrcl_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['electrcl_sfty_chklst_id'];
		$cid = $id+1;
		$info['electrcl_sfty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_electrcl_sfty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Electrical Safety Checklist Submitted Successfully';
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
		
			$statement = $connection->prepare("UPDATE tbl_electrcl_sfty_chklst SET $set_string WHERE electrcl_sfty_chklst_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Electrical Safety Checklist Updated Successfully';
		}
		}
		
	}

?>