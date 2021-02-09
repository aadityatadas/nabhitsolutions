<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$dt1 = mysqli_real_escape_string($connect, $_POST["t_adm"]);
		$dt2 = mysqli_real_escape_string($connect, $_POST["ddd"]);
		$dt3 = mysqli_real_escape_string($connect, $_POST["ddd1"]);
		$dt4 = $dt2.' '.$dt3;
		
		$diff = abs(strtotime($dt4) - strtotime($dt1)); 

		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
		
		$hour   = floor(($diff) / (60*60)); 

		$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
		
		$ht_mi = $hour.'.'.$minuts;
		
		$statement = $connection->prepare(
			"UPDATE tbl_huf
			SET int_ddd = '$dt4', int_tottm = '$ht_mi', int_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"]
			)
		);
		if(!empty($result))
		{
			echo 'Intial Assessment Time Form Updated Successfully';
		}
	}
}
?>