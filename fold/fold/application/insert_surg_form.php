<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$dt1 = mysqli_real_escape_string($connect, $_POST["dddd"]);
		$dtt1 = mysqli_real_escape_string($connect, $_POST["dddd1"]);
		$d1 = $dt1.' '.$dtt1;
		
		$statement = $connection->prepare(
			"UPDATE tbl_huf 
			SET surg_dtos = '$d1', surg_nsurg = :ddd, surg_symp = :psympt, surg_symp_det = :tddd, surg_dtssc = :mlc, surg_sp_ssi = :surg, surg_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				//':dddd'			=>	$_POST["dddd"],
				':ddd'			=>	$_POST["ddd"],
				':psympt'		=>	$_POST["psympt"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
			)
		);
		if(!empty($result))
		{
			echo 'Surgical Site Infection Form Submitted Successfully';
		}
	}
}
?>