<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
include('fun_rpt_vent.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$dt1 = mysqli_real_escape_string($connect, $_POST["t_adm"]);
		$dtt1 = mysqli_real_escape_string($connect, $_POST["t_adm1"]);
		$dt2 = mysqli_real_escape_string($connect, $_POST["ddd"]);
		$dtt2 = mysqli_real_escape_string($connect, $_POST["ddd1"]);
		
		$dt3 = $dt1.' '.$dtt1;
		$dt4 = $dt2.' '.$dtt2;
		
		$diff = abs(strtotime($dt2) - strtotime($dt1));
		$days = $diff/(60 * 60 * 24);		
		
		$statement = $connection->prepare(
			"UPDATE tbl_huf 
			SET vent_dt_iuc = '$dt3', vent_dt_ruc = '$dt4', vent_tcd = '$days', vent_sympt = :psympt, vent_sympt_det = :tddd, vent_ssc = :mlc, vent_spc = :surg, vent_rcd = '$ses'  
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
			echo 'Ventilator Associated Pnemonia Form Updated Successfully';
		}
	}
}
?>