<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');


   
    
		$name=$ses;
		 
		$audit_date = mysqli_real_escape_string($connect, $_POST["audit_date"]);
		$arrVal = $_POST["arrVal"];
		$tbl = $_POST["tbl"];
		if(isset($_POST["operation"]))
		{
			if($_POST["operation"] == "Add")
			{
				$date1 = explode(",",date('F, Y'));
				foreach ($arrVal as $key => $value) {
					//echo $value[0]." ".$value[1]." ".$value[2];
					$arrId = $value[0];
					$yn = $value[1];
					$cmt = $value[2];
					$crd = date('d/m/Y');
					
					$statement = $connection->prepare("INSERT INTO $tbl (pos_id,yn_val,cmmnt,audit_date,name_sign,audit_month,audit_year) VALUES ('$arrId','$yn','$cmt','$audit_date','$name','$date1[0]','$date1[1]')");
					$result = $statement->execute();
		
				}

				if(!empty($result))
				{
					echo 'Audit From Submitted Successfully';
				}

			}

			if($_POST["operation"] == "Edit")
			{

				
				$audit_month = $_POST['audit_mnt'];
				$audit_year = $_POST['audit_yr'];

				$audit_date=$_POST['audit_date'];
				$query = "SELECT id FROM $tbl WHERE audit_date = '$audit_date' ";

 

			$statement = $connection->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			$data = array();

			foreach($result as $key  => $row)
			{
 
 				$id = $row['id'];
 				

 				$yn =  $arrVal[$key+1][1];
 				$cmt = $arrVal[$key+1][2];
 

 				$statement = $connection->prepare("UPDATE $tbl SET yn_val = '$yn',cmmnt = '$cmt' WHERE id = '$id'  ");
					$result = $statement->execute();


				}

				

				

				
				 if(!empty($result))
				{
					echo 'Audit From Updated Successfully';
				}

			}
		}

		





			/*echo $field_string;
			die;*/



  ?>