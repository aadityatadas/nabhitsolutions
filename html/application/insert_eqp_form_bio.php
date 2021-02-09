<?php
error_reporting(1);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
$tdt = date('Y-m-d');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT eqp_id FROM tbl_eqp_indic_bio ORDER BY eqp_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['eqp_id'];
		$cid = $id+1;
		
		$statement = $connection->prepare("
			INSERT INTO tbl_eqp_indic_bio (eqp_id, eqpid, eqp_brkdwn_date, eqp_amcs, eqp_amc1, eqp_amc2, eqp_psch1, eqp_psch2, eqp_psch3, eqp_psch4, eqp_csch1, eqp_csch2, eqp_brkd, eqp_dtbr, eqp_tmbr, eqp_dtrp, eqp_tmrp, eqp_cond1, eqp_lic1, eqp_recd , eqp_attend_d, eqp_attend_t) 
			VALUES ('$cid', :eqpid, :hrdt, :mo10, :mo11, :mo12, :mo13, :mo14, :mo15, :mo16, :mo17, :mo18, :mo19, :mo20, :tmbr, :mo21, :tmrp, :mo22, :mo23, '$ses' , :mo32 , :mo33)
		");
		$result = $statement->execute(
			array(
				':eqpid'	=>	$_POST["eqpid"],
				':hrdt'		=>	$_POST["hrdt"],
				':mo10'		=>	$_POST["mo10"],
				':mo11'		=>	$_POST["mo11"],
				':mo12'		=>	$_POST["mo12"],
				':mo13'		=>	$_POST["mo13"],
				':mo14'		=>	$_POST["mo14"],
				':mo15'		=>	$_POST["mo15"],
				':mo16'		=>	$_POST["mo16"],
				':mo17'		=>	$_POST["mo17"],
				':mo18'		=>	$_POST["mo18"],
				':mo19'		=>	$_POST["mo19"],
				':mo20'		=>	$_POST["mo20"],
				':tmbr'		=>	$_POST["tmbr"],
				':mo21'		=>	$_POST["mo21"],
				':tmrp'		=>	$_POST["tmrp"],
				':mo22'		=>	$_POST["mo22"],
				':mo23'		=>	$_POST["mo23"],
				':mo32'		=>	$_POST["mo32"],
				':mo33'		=>	$_POST["mo33"]
			)
		);
		if(!empty($result))
		{
			echo 'Equipement Indicator Form Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_eqp_indic_bio 
			SET eqpid = :eqpid, eqp_brkdwn_date = :hrdt, eqp_amcs = :mo10, eqp_amc1 = :mo11, eqp_amc2 = :mo12, eqp_psch1 = :mo13, eqp_psch2 = :mo14,	eqp_psch3 = :mo15, eqp_psch4 = :mo16, eqp_csch1 = :mo17, eqp_csch2 = :mo18, eqp_brkd = :mo19, eqp_dtbr = :mo20, eqp_tmbr = :tmbr, eqp_dtrp = :mo21, eqp_tmrp = :tmrp, eqp_cond1 = :mo22, eqp_lic1 = :mo23, eqp_recd = '$ses' ,eqp_attend_d = :mo32 , eqp_attend_t = :mo33 
			WHERE eqp_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],
				':eqpid'	=>	$_POST["eqpid"],
				':hrdt'		=>	$_POST["hrdt"],
				':mo10'		=>	$_POST["mo10"],
				':mo11'		=>	$_POST["mo11"],
				':mo12'		=>	$_POST["mo12"],
				':mo13'		=>	$_POST["mo13"],
				':mo14'		=>	$_POST["mo14"],
				':mo15'		=>	$_POST["mo15"],
				':mo16'		=>	$_POST["mo16"],
				':mo17'		=>	$_POST["mo17"],
				':mo18'		=>	$_POST["mo18"],
				':mo19'		=>	$_POST["mo19"],
				':mo20'		=>	$_POST["mo20"],
				':tmbr'		=>	$_POST["tmbr"],
				':mo21'		=>	$_POST["mo21"],
				':tmrp'		=>	$_POST["tmrp"],
				':mo22'		=>	$_POST["mo22"],
				':mo23'		=>	$_POST["mo23"],
				':mo32'		=>	$_POST["mo32"],
				':mo33'		=>	$_POST["mo33"]
			)
		);
		if(!empty($result))
		{
			echo 'Equipement Indicator Form Updated Successfully';
		}
	}
}
?>