<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');



		$tbl = $_POST['tbl'];
		$date=mysqli_real_escape_string($connect, $_POST["audit_date"]);
		



		
		
		
		$info['name_sign'] = $ses;
		

		$info['clealiness'] = $_POST['clealiness'];
$info['em_stock'] = $_POST['em_stock'];
$info['eqp_work'] = $_POST['eqp_work'];
$info['bmw_sep'] = $_POST['bmw_sep'];
$info['pre_labeled'] = $_POST['pre_labeled'];
$info['side_rails'] = $_POST['side_rails'];
$info['bedpans'] = $_POST['bedpans'];
$info['doc_nur_uni_id'] = $_POST['doc_nur_uni_id'];
$info['patnt_toilet'] = $_POST['patnt_toilet'];
$info['patnt_id_brand'] = $_POST['patnt_id_brand'];
$info['medical_record'] = $_POST['medical_record'];
$info['lasa_drugs'] = $_POST['lasa_drugs'];
$info['high_risk_drug'] = $_POST['high_risk_drug'];
$info['temp_humd'] = $_POST['temp_humd'];
$info['vulnerable'] = $_POST['vulnerable'];
$info['line_disc'] = $_POST['line_disc'];
$info['article_instrumnt'] = $_POST['article_instrumnt'];
$info['incident_error'] = $_POST['incident_error'];
$info['patien_resp'] = $_POST['patien_resp'];
$info['remark'] = $_POST['remark'];






			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$info['audit_date'] = $date;
		
		$info['audit_time'] = date("h:i a");
		$info['created_by'] = $ses;
		$qry = "SELECT id FROM $tbl ORDER BY id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['id'];
		$cid = $id+1;
		$info['id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO $tbl ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'Ward Round checklist Submitted Successfully';
		}
	}


	if($_POST["operation"] == "Edit")
	{
		$info['updated_by'] = $ses;
			foreach(array_keys($info) as $field_name) { 
				//$data[$field_name] = sc_mysql_escape($data[$field_name]);

				// if set string isn't set, set it....else append with a comma in between
				if (!isset($set_string)) {
					$set_string = "`".strtolower($field_name)."` = '$info[$field_name]'";
				} else {
					$set_string = "$set_string, `".strtolower($field_name)."` = '$info[$field_name]'";
				}
			}
			
           $id = $_POST['user_id'];
				
			$statement = $connection->prepare("UPDATE $tbl SET $set_string WHERE id = $id ");
		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'Ward Round checklist Updated Successfully';
		}
		}
		
	}

?>