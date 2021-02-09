<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');



		$tbl = $_POST['tbl'];
		$date=mysqli_real_escape_string($connect, $_POST["audit_date"]);
		



		
		
		
		$info['name_sign'] = $ses;
		

		$info['physcl_app_shop'] = $_POST['physcl_app_shop'];
$info['storage'] = $_POST['storage'];
$info['cleanliness'] = $_POST['cleanliness'];
$info['temp_frdg_extrnl'] = $_POST['temp_frdg_extrnl'];
$info['stock_out'] = $_POST['stock_out'];
$info['inv_control'] = $_POST['inv_control'];
$info['medicine_presc'] = $_POST['medicine_presc'];
$info['emere_med_stock'] = $_POST['emere_med_stock'];
$info['lasa_storage'] = $_POST['lasa_storage'];
$info['expr_if'] = $_POST['expr_if'];












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
			echo 'Pharmacy Round checklist Submitted Successfully';
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
			echo 'Pharmacy Round checklist Updated Successfully';
		}
		}
		
	}

?>