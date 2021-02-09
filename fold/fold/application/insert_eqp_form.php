<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT eqp_id FROM tbl_eqp_indic ORDER BY eqp_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['eqp_id'];
		$cid = $id+1;
		
		$statement = $connection->prepare("
			INSERT INTO tbl_eqp_indic (eqp_id, eqpid, eqp_amcs, eqp_amc1, eqp_amc2, eqp_psch1, eqp_psch2, eqp_psch3, eqp_psch4, eqp_csch1, eqp_csch2, eqp_brkd, eqp_dttmbr, eqp_dttmrp, eqp_cond, eqp_lic, eqp_recd) 
			VALUES ('$cid', :eqpid, :mo10, :mo11, :mo12, :mo13, :mo14, :mo15, :mo16, :mo17, :mo18, :mo19, :mo20, :mo21, :mo22, :mo23, '$ses')
		");
		$result = $statement->execute(
			array(
				':eqpid'	=>	$_POST["eqpid"],
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
				':mo21'		=>	$_POST["mo21"],
				':mo22'		=>	$_POST["mo22"],
				':mo23'		=>	$_POST["mo23"]
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
			"UPDATE tbl_eqp_indic 
			SET eqpid = :eqpid, eqp_amcs = :mo10, eqp_amc1 = :mo11, eqp_amc2 = :mo12, eqp_psch1 = :mo13, eqp_psch2 = :mo14,	eqp_psch3 = :mo15, eqp_psch4 = :mo16, eqp_csch1 = :mo17, eqp_csch2 = :mo18, eqp_brkd = :mo19, eqp_dttmbr = :mo20, eqp_dttmrp = :mo21, eqp_cond = :mo22, eqp_lic = :mo23, eqp_recd = '$ses'  
			WHERE eqp_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],
				':eqpid'	=>	$_POST["eqpid"],
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
				':mo21'		=>	$_POST["mo21"],
				':mo22'		=>	$_POST["mo22"],
				':mo23'		=>	$_POST["mo23"]
			)
		);
		if(!empty($result))
		{
			echo 'Equipement Indicator Form Updated Successfully';
		}
	}
}
?>