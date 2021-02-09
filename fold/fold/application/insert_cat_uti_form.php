<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$dt1 = mysqli_real_escape_string($connect, $_POST["t_adm"]);
		$dtt1 = mysqli_real_escape_string($connect, $_POST["t_adm1"]);
		$dt2 = mysqli_real_escape_string($connect, $_POST["ddd"]);
		$dtt2 = mysqli_real_escape_string($connect, $_POST["ddd1"]);
		$d1 = $dt1.' '.$dtt1;
		$d2 = $dt2.' '.$dtt2;
		
		$diff = abs(strtotime($dt2) - strtotime($dt1)); 
		$days = $diff/(60 * 60 * 24);
		
		$statement = $connection->prepare(
			"UPDATE tbl_huf 
			SET cath_uti_iuc = '$d1', cath_uti_ruc = '$d2', cath_uti_tcd = '$days', cath_uti_symp = :psympt, cath_uti_symp_det = :tddd, cath_uti_ssc = :mlc, cath_uti_spc = :surg, cath_uti_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				//':t_adm'		=>	$_POST["t_adm"],
				//':ddd'		=>	$_POST["ddd"],
				':psympt'		=>	$_POST["psympt"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
			)
		);
		if(!empty($result))
		{
			echo 'Cather Associated Unrinary Tract Infection Form Updated Successfully';
		}
	}
}
?>