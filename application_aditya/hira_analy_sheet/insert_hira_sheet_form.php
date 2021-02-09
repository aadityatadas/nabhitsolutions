<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');


        $qry = "SELECT place_name FROM tbl_hira_place_dep WHERE hira_place_dep_id= ".$_POST['place_dept']." ";
		$res = mysqli_query($connect, $qry);
       
		$row=mysqli_fetch_array($res);
		$_POST['place_dept'] = $row['place_name'];
		

		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		$sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);
		



		$info['name'] = $name;
		$info['sign'] = $sign;
		$info['date1'] = $date;
		$info['time1'] = $time;
		$info['place_dept'] = $_POST['place_dept'];
		$info['activity_name'] = $_POST['activity_name'];
		$info['occup_hzrd_name'] = $_POST['occup_hzrd_name'];
		$info['occup_risk_name'] = $_POST['occup_risk_name'];
		$info['engg_cntrl'] = isset($_POST['engg_cntrl'])? 1 : 0;
		$info['moni_visal_display'] = isset($_POST['moni_visal_display'])? 1 : 0;
		$info['health_plan'] = $_POST['health_plan'];
		$info['l_c'] = $_POST['l_c'];
		$info['e_c'] = $_POST['e_c'];
		$info['m_s_d_s'] = $_POST['m_s_d_s'];
		$info['h_b'] = $_POST['h_b'];
		$info['protcl_polcy'] = $_POST['protcl_polcy'];
		$info['p_p_e'] = $_POST['p_p_e'];
		$info['desptn_lgl_reqrmnt'] = $_POST['desptn_lgl_reqrmnt'];
		$info['severity'] = $_POST['severity'];
		$info['prob_of_occrance'] = $_POST['prob_of_occrance'];
		$info['score'] = $_POST['score'];
		$info['residual_risk'] = $_POST['residual_risk'];
		$info['critria_signfcne'] = $_POST['critria_signfcne'];
		$info['action_plan'] = $_POST['action_plan'];



		


			/*echo $field_string;
			die;*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT hira_analy_sheet_id FROM tbl_hira_analy_sheet ORDER BY hira_analy_sheet_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['hira_analy_sheet_id'];
		$cid = $id+1;
		$info['hira_analy_sheet_id'] = $cid;
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
		$statement = $connection->prepare("INSERT INTO tbl_hira_analy_sheet ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
				
		
		if(!empty($result))
		{
			echo 'HAZARD IDENTIFICATION AND RISK ANALYSIS SHEET Submitted Successfully';
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
		
			$statement = $connection->prepare("UPDATE tbl_hira_analy_sheet SET $set_string WHERE hira_analy_sheet_id = $id ");

		$result = $statement->execute();
		 
		 if(!empty($result))
		{
			echo 'HAZARD IDENTIFICATION AND RISK ANALYSIS SHEET Updated Successfully';
		}
		}
		
	}

?>