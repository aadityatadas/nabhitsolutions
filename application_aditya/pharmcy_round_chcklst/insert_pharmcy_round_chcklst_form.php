<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('fun_rpt_vent.php');
/*print_r($_POST);
die;*/
    
    //$info['p_name'] = $_POST['p_name'];
	$info['date1'] = $_POST['date1'];
	$info['time'] = $_POST['time'];
	$info['dep_name'] = $_POST['dep_name'];
	$info['incidenc_of_medctin_err_yn'] = $_POST['incidenc_of_medctin_err_yn'];
	$info['incidenc_of_medctin_err_rmrk'] = $_POST['incidenc_of_medctin_err_rmrk'];
	$info['admsn_with_advrse_drug_rectn_yn'] = $_POST['admsn_with_advrse_drug_rectn_yn'];
	$info['admsn_with_advrse_drug_rectn_rmrk'] = $_POST['admsn_with_advrse_drug_rectn_rmrk'];
	$info['med_err_abbrvtn_yn'] = $_POST['med_err_abbrvtn_yn'];
	$info['med_err_abbrvtn_rmrk'] = $_POST['med_err_abbrvtn_rmrk'];
	$info['patnt_drug_evnt_yn'] = $_POST['patnt_drug_evnt_yn'];
	$info['patnt_drug_evnt_rmrk'] = $_POST['patnt_drug_evnt_rmrk'];
	$info['action_taken_yn'] = $_POST['action_taken_yn'];
	$info['action_taken_rmrk'] = $_POST['action_taken_rmrk'];
	$info['sign'] = $_POST['sign'];

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
        $info['tbl_huf_id'] = $_POST['sr_no'];
		
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
		$statement = $connection->prepare("INSERT INTO tbl_pharmcy_round_chcklst ($field_string) VALUES ($value_string)");


		$result = $statement->execute();

	//	print_r($result);
		if(!empty($result))
		{
			echo 'Pharmacist round Checklist Inserted Successfully';
		} else {
			  echo ' Error in Pharmacist round Checklist ';
		}
	}

	      elseif(($_POST["operation"] == "Update")) {

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
				
			$statement = $connection->prepare("UPDATE tbl_pharmcy_round_chcklst SET $set_string WHERE tbl_huf_id = $id ");
		$result = $statement->execute();
		
		

	//	print_r($result);
		if(!empty($result))
		{
			echo 'Pharmacist round Checklist Updated Successfully';
		} else {
			  echo ' Error in Pharmacist round Checklist ';
		}

                         
	      }
}
?>