<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$d1 = mysqli_real_escape_string($connect, $_POST["dttm_reg"]);
		$d2 = mysqli_real_escape_string($connect, $_POST["dttm_reg2"]);
		$d11 = mysqli_real_escape_string($connect, $_POST["dttm_reg3"]);
		$d21 = mysqli_real_escape_string($connect, $_POST["dttm_reg4"]);
		
		$dt1 = $d1.' '.$d11;
		$dt2 = $d2.' '.$d21;
		
		$diff = abs(strtotime($dt2) - strtotime($dt1)); 

		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$days2 = $days * 24;
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
		
		$hour   = floor(($diff) / (60*60)); 

		$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ 60); 
		$hrs = floor($minuts / 60);
		$hrs2 = $days2 + $hrs;
		$min = $minuts - ($hrs * 60);
		$ht_mi = $hrs2.'.'.$min;
		
		
		$statement = $connection->prepare(
			"UPDATE tbl_huf 
			SET wttm_opdno = :opd_no, wttm_drsp = :drsp, wttm_dttmr = '$dt1', wttm_dttmds = '$dt2', wttm_opdwttm = '$ht_mi', wttm_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],
				':opd_no'	=>	$_POST["opd_no"],
				':drsp'		=>	$_POST["drsp"]
				//':dttm_reg'	=>	$_POST["dttm_reg"],
				//':dttm_reg2'=>	$_POST["dttm_reg2"]
			)
		);
		if(!empty($result))
		{
			echo 'OPD Waiting Time Form Updated Successfully';
		}
	}
}
?>