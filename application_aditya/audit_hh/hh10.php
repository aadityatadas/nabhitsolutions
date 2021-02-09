<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
$typ = $_SESSION['typ'];
//include('function.php');





		$sr_no			=	mysqli_real_escape_string($connect, $_POST["sr_no"]);
		$sTime			=	mysqli_real_escape_string($connect, $_POST["sTime"]);
		$dateVal 		= 	mysqli_real_escape_string($connect, $_POST["dateVal"]);
		$day			=	mysqli_real_escape_string($connect, $_POST["day"]);
		$timeVal 		=	mysqli_real_escape_string($connect, $_POST["timeVal"]);
		$prof			=	mysqli_real_escape_string($connect, $_POST["prof"]);
		$nameVal 		=	mysqli_real_escape_string($connect, $_POST["nameVal"]);
		$sex			=	mysqli_real_escape_string($connect, $_POST["sex"]);
		$hh 			=	mysqli_real_escape_string($connect, $_POST["hh"]);
		$tech			=	mysqli_real_escape_string($connect, $_POST["tech"]);
		$usedProduct 	=	mysqli_real_escape_string($connect, $_POST["usedProduct"]);
		$towel			=	mysqli_real_escape_string($connect, $_POST["towel"]);
		$noninvasive 	=	mysqli_real_escape_string($connect, $_POST["noninvasive"]);
		$invasive		=	mysqli_real_escape_string($connect, $_POST["invasive"]);
		$fluid 			=	mysqli_real_escape_string($connect, $_POST["fluid"]);
		$contact 		=	mysqli_real_escape_string($connect, $_POST["contact"]);
		$surroundings 	= 	mysqli_real_escape_string($connect, $_POST["surroundings"]);
		$name 			=	mysqli_real_escape_string($connect, $_POST["name"]);
		$sign 			= 	mysqli_real_escape_string($connect, $_POST["sign"]);
		
		
	
		$tbl = $_POST["tbl"];
		if(isset($_POST["operation"]))
		{
			if($_POST["operation"] == "Add")
			{
				
				/*echo "INSERT INTO $tbl (sTime,dateVal,day,timeVal,prof,nameVal,sex,hh,tech,usedProduct,towel,noninvasive,invasive,fluid,contact,surroundings,name,sign,ses) VALUES ('$sTime','$dateVal','$day','$timeVal','$prof','$nameVal','$sex','$hh','$tech','$usedProduct','$towel','$noninvasive','$invasive','$fluid','$contact','$surroundings','$name','$sign','$ses')";
				die();*/
					
					$statement = $connection->prepare("INSERT INTO $tbl (sr_no,sTime,dateVal,day,timeVal,prof,nameVal,sex,hh,tech,usedProduct,towel,noninvasive,invasive,fluid,contact,surroundings,name,sign,ses,typ) VALUES ('$sr_no','$sTime','$dateVal','$day','$timeVal','$prof','$nameVal','$sex','$hh','$tech','$usedProduct','$towel','$noninvasive','$invasive','$fluid','$contact','$surroundings','$name','$sign','$ses','$typ')");
					$result = $statement->execute();
		
				
				if(!empty($result))
				{
					echo 'Audit From Submitted Successfully';
				}

			}

			if($_POST["operation"] == "Edit")
			{

				$id = $_POST['user_id'];

					
					
					$statement = $connection->prepare("UPDATE $tbl SET sTime = '$sTime',dateVal = '$dateVal',day = '$day',timeVal = '$timeVal',prof = '$prof',nameVal = '$nameVal',sex = '$sex',hh = '$hh',tech = '$tech',usedProduct = '$usedProduct',towel = '$towel',noninvasive = '$noninvasive',invasive = '$invasive',fluid = '$fluid',contact = '$contact',surroundings = '$surroundings',name = '$name',sign = '$sign' WHERE id = '$id'");
					$result = $statement->execute();
		
				

				
				 if(!empty($result))
				{
					echo 'Audit From Updated Successfully';
				}

			}
		}

		





			/*echo $field_string;
			die;*/



  ?>