<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT opdwttm_id FROM tbl_opdwttm ORDER BY opdwttm_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['opdwttm_id'];
		$cid = $id+1;
		
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
				
		$statement = $connection->prepare("
			INSERT INTO tbl_opdwttm(`opdwttm_id`, `opdwttm_pname`, `opdwttm_uhid`, `opdwttm_opd`, `opdwttm_drsp`, `opdwttm_dttmr`, `opdwttm_dttmds`, `opdwttm_opdwttm`, `opdwttm_recd`) 
			VALUES ('$cid', :p_name, :uhid_no, :opd_no, :drsp, '$dt1', '$dt2', '$ht_mi', '$ses')
		");
		$result = $statement->execute(
			array(
				':p_name'		=>	$_POST["p_name"],
				':uhid_no'		=>	$_POST["uhid_no"],
				':opd_no'		=>	$_POST["opd_no"],
				':drsp'			=>	$_POST["drsp"]
			)
		);
		if(!empty($result))
		{
			echo 'OPD Waiting Time Form Submitted Successfully';
		}
	}
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
			"UPDATE tbl_opdwttm 
			SET opdwttm_pname = :p_name, opdwttm_uhid = :uhid_no, opdwttm_opd = :opd_no, opdwttm_drsp = :drsp, opdwttm_dttmr = '$dt1', opdwttm_dttmds = '$dt2', opdwttm_opdwttm = '$ht_mi', opdwttm_recd = '$ses'  
			WHERE opdwttm_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				':p_name'		=>	$_POST["p_name"],
				':uhid_no'		=>	$_POST["uhid_no"],
				':opd_no'		=>	$_POST["opd_no"],
				':drsp'			=>	$_POST["drsp"]
			)
		);
		if(!empty($result))
		{
			echo 'OPD Waiting Time Form Updated Successfully';
		}
	}
}
?>