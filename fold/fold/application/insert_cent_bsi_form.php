<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
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
			SET cent_bs_dticlc = '$d1', cent_bs_dtrclc = '$d2', cent_bs_tcld = '$days', cent_bs_symp = :psympt, cent_bs_symp_det = :tddd, cent_bs_ssc = :mlc, cent_bs_clabsi = :surg, cent_bs_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				//':t_adm'		=>	$_POST["t_adm"],
				//':ddd'		=>	$_POST["ddd"],
				//':dddd'		=>	$_POST["dddd"],
				':psympt'		=>	$_POST["psympt"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
			)
		);
		if(!empty($result))
		{
			echo 'Central Line Associated Blood Stream Infection Form Updated Successfully';
		}
	}
}
?>