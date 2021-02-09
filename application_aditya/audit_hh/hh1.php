<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');



		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		$sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$mnt = date('Y');
		$quarter = mysqli_real_escape_string($connect, $_POST["quarter"]);
		$month = mysqli_real_escape_string($connect, $_POST["month"]);

		$arrVal = $_POST["arrVal"];
		$tbl = $_POST["tbl"];
		if(isset($_POST["operation"]))
		{

			$tbl = $_POST['tbl'];
			

			if($_POST["operation"] == "Add")
			{
				$query = "SELECT * FROM $tbl where quarter = '$quarter' and month_id = '$mnt'";
				$statement = $connection->prepare($query);
				$statement->execute();
				$result = $statement->rowCount();
				
				if ($result == 0) {
					foreach ($arrVal as $key => $value) {
					//echo $value[0]." ".$value[1]." ".$value[2];
					$arrId = $value[0];
					$yn = $value[1];
					$cmt = $value[2];
					$crd = date('d/m/Y');

					$SQL="INSERT INTO $tbl (month_id,month,quarter,arry_id,yn_val,cmmnt,crdate,name,sign,ses) VALUES ('$mnt','$month','$quarter','$arrId','$yn','$cmt','$crd','$name','$sign','$ses')";


					
					$statement = $connection->prepare($SQL);
					$result = $statement->execute();
		
					}

					if(!empty($result))
					{
						echo 'Audit From Submitted Successfully';
					}
				}

				else
				{
					echo 'Already Filed Audit For This Quarter';
				}

			
				
				

			}

			if($_POST["operation"] == "Edit")
			{
				/*print_r($_POST);
				die();*/
				$qut = explode('_', $_POST["user_id"]);
				foreach ($arrVal as $key => $value) {
					//echo $value[0]." ".$value[1]." ".$value[2];
					$arrId = $value[0];
					$yn = $value[1];
					$cmt = $value[2];
					$crd = date('d/m/Y');

					$sq="UPDATE $tbl SET yn_val = '$yn',cmmnt = '$cmt',name='$name',sign='$sign', ses= '$ses' WHERE month_id = '".$qut[1]."' and  arry_id = '$arrId' and quarter = '".$qut[0]."'";

				
					
					$statement = $connection->prepare($sq);
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