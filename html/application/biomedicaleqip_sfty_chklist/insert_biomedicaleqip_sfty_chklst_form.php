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
		


$info['list_upted_tag_yn'] = $_POST['list_upted_tag_yn'];
$info['list_upted_tag_loc'] = $_POST['list_upted_tag_loc'];
$info['list_upted_tag_rmrk'] = $_POST['list_upted_tag_rmrk'];
$info['critical_bio_equmnt_yn'] = $_POST['critical_bio_equmnt_yn'];
$info['critical_bio_equmnt_loc'] = $_POST['critical_bio_equmnt_loc'];
$info['critical_bio_equmnt_rmrk'] = $_POST['critical_bio_equmnt_rmrk'];
$info['prvintv_maintce_reports_yn'] = $_POST['prvintv_maintce_reports_yn'];
$info['prvintv_maintce_reports_loc'] = $_POST['prvintv_maintce_reports_loc'];
$info['prvintv_maintce_reports_rmrk'] = $_POST['prvintv_maintce_reports_rmrk'];
$info['calibratn_reports_yn'] = $_POST['calibratn_reports_yn'];
$info['calibratn_reports_loc'] = $_POST['calibratn_reports_loc'];
$info['calibratn_reports_rmrk'] = $_POST['calibratn_reports_rmrk'];
$info['breakdown_equpment_yn'] = $_POST['breakdown_equpment_yn'];
$info['breakdown_equpment_loc'] = $_POST['breakdown_equpment_loc'];
$info['breakdown_equpment_rmrk'] = $_POST['breakdown_equpment_rmrk'];
$info['dos_dont_precution_yn'] = $_POST['dos_dont_precution_yn'];
$info['dos_dont_precution_loc'] = $_POST['dos_dont_precution_loc'];
$info['dos_dont_precution_rmrk'] = $_POST['dos_dont_precution_rmrk'];
$info['emrgncy_alarm_yn'] = $_POST['emrgncy_alarm_yn'];
$info['emrgncy_alarm_loc'] = $_POST['emrgncy_alarm_loc'];
$info['emrgncy_alarm_rmrk'] = $_POST['emrgncy_alarm_rmrk'];
$info['intrnl_extrnl_repots_yn'] = $_POST['intrnl_extrnl_repots_yn'];
$info['intrnl_extrnl_repots_loc'] = $_POST['intrnl_extrnl_repots_loc'];
$info['intrnl_extrnl_repots_rmrk'] = $_POST['intrnl_extrnl_repots_rmrk'];
$info['all_wires_use_yn'] = $_POST['all_wires_use_yn'];
$info['all_wires_use_loc'] = $_POST['all_wires_use_loc'];
$info['all_wires_use_rmrk'] = $_POST['all_wires_use_rmrk'];
$info['qualified_biomedcl_checks_yn'] = $_POST['qualified_biomedcl_checks_yn'];
$info['qualified_biomedcl_checks_loc'] = $_POST['qualified_biomedcl_checks_loc'];
$info['qualified_biomedcl_checks_rmrk'] = $_POST['qualified_biomedcl_checks_rmrk'];






			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT biomedicaleqip_sfty_chklst_id FROM tbl_biomedicaleqip_sfty_chklst ORDER BY biomedicaleqip_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['biomedicaleqip_sfty_chklst_id'];
		$cid = $id+1;
		$info['biomedicaleqip_sfty_chklst_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_biomedicaleqip_sfty_chklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Bio-Medical Equipment Safety checklist Submitted Successfully';
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
		
			$statement = $connection->prepare("UPDATE tbl_biomedicaleqip_sfty_chklst SET $set_string WHERE biomedicaleqip_sfty_chklst_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Bio-Medical Equipment Safety checklist Updated Successfully';
		}
		}
		
	}

?>