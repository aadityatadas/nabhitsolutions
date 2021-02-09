<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT eqp_id FROM tbl_eqp_mast ORDER BY eqp_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['eqp_id'];
		$cid = $id+1;
		
		$statement = $connection->prepare("
			INSERT INTO tbl_eqp_mast (eqp_id, eqp_name, eqp_type, eqp_idno, eqp_srno, eqp_model, eqp_make, eqp_dtpur, eqp_dtins, eqp_wty1, eqp_wty2, eqp_recd) 
			VALUES ('$cid', :mo1, :mo2, :mo3, :serial, :mo4, :mo5, :mo6, :mo7, :mo8, :mo9, '$ses')
		");
		$result = $statement->execute(
			array(
				':mo1'		=>	$_POST["mo1"],
				':mo2'		=>	$_POST["mo2"],
				':mo3'		=>	$_POST["mo3"],
				':serial'	=>	$_POST["serial"],
				':mo4'		=>	$_POST["mo4"],
				':mo5'		=>	$_POST["mo5"],
				':mo6'		=>	$_POST["mo6"],
				':mo7'		=>	$_POST["mo7"],
				':mo8'		=>	$_POST["mo8"],
				':mo9'		=>	$_POST["mo9"]
			)
		);		
		if(!empty($result))
		{
			echo 'Equipement Master Form Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_eqp_mast
			SET eqp_name = :mo1, eqp_type = :mo2, eqp_idno = :mo3, eqp_srno = :serial, eqp_model = :mo4, eqp_make = :mo5, eqp_dtpur = :mo6, eqp_dtins = :mo7, eqp_wty1 = :mo8, eqp_wty2 = :mo9, eqp_recd = '$ses'  
			WHERE eqp_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],
				':mo1'		=>	$_POST["mo1"],
				':mo2'		=>	$_POST["mo2"],
				':mo3'		=>	$_POST["mo3"],
				':serial'	=>	$_POST["serial"],
				':mo4'		=>	$_POST["mo4"],
				':mo5'		=>	$_POST["mo5"],
				':mo6'		=>	$_POST["mo6"],
				':mo7'		=>	$_POST["mo7"],
				':mo8'		=>	$_POST["mo8"],
				':mo9'		=>	$_POST["mo9"]
			)
		);
		if(!empty($result))
		{
			echo 'Equipement Master Form Updated Successfully';
		}
	}
}
?>