<?php
	session_start();
	include('../dbinfo.php');
	$ses = $_SESSION['login'];	
		$cor = serialize($_POST['field_name']);
    	$per = serialize($_POST['field_name_pre']);
    	$cid = $_POST['cid'];
    	$SQL="INSERT INTO tbl_messures (cid,cor,per,ses) VALUES ('$cid','$cor','$per','$ses')";


					
					$statement = $connection->prepare($SQL);
					$result = $statement->execute();
		
					

					if(!empty($result))
					{
						echo 'Messures Submitted Successfully';
					}


?>