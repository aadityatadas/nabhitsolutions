<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$sr_no = mysqli_real_escape_string($connect, $_POST["sr_no"]);
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
		$msp = "SELECT ipd_id FROM tbl_ipd ORDER BY ipd_id DESC";
		$mss = mysqli_query($connect, $msp);
		$rs=mysqli_fetch_array($mss);
		$mid = $rs['ipd_id'];
		$ipd = $mid+1;
		$rqs = "INSERT INTO tbl_ipd(ipd_id, ipdid, ipd_age, ipd_sex, ipd_email, ipd_addr, ipd_trdr, ipd_hrd1, ipd_hrd2, ipd_hrd3, ipd_oth, ipd_chk1, ipd_chk2, ipd_chk3, ipd_chk4, ipd_chk5, ipd_chk6, ipd_chk7, ipd_chk8, ipd_chk9, ipd_chk10, ipd_chk11, ipd_chk12, ipd_chk13, ipd_chk14, ipd_chk15, ipd_chk16, ipd_chk17, ipd_chk18, ipd_chk19, ipd_chk20, ipd_chk21, ipd_chk22, ipd_chk23, ipd_chk24, ipd_fac, ipd_sug, ipd_score, ipd_user)
		VALUES('$ipd','$sr_no','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')";
		mysqli_query($connect,$rqs);
		if(!empty($result))
		{
			echo 'IPD Waiting Time Form Updated Successfully';
		}
	}
}
?>