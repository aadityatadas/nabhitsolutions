<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
$tdt = date('Y-m-d');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT eqpid FROM tbl_eqp_mast ORDER BY eqpid DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['eqpid'];
		$cid = $id+1;
		
		$statement = $connection->prepare("
			INSERT INTO tbl_eqp_mast (eqpid, eqp_name, eqp_type, eqp_idno, eqp_srno, eqp_model, eqp_make, eqp_dtpur, eqp_dtins, eqp_wty1, eqp_wty2, eqp_amc1 ,eqp_amc2 ,eqp_psch1 ,eqp_psch2 ,eqp_psch3 ,eqp_psch4 ,eqp_csch1 ,eqp_csch2, eqp_recd , eqp_lic,eqp_lic_frm,eqp_lic_to) 
			VALUES ('$cid', :mo1, :mo2, :mo3, :serial, :mo4, :mo5, :mo6, :mo7, :mo8, :mo9,:mo11, :mo12, :mo13, :mo14, :mo15, :mo16,:mo17 , :mo18,  '$ses',:mo23 , :mo24 , :mo25)
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
				':mo9'		=>	$_POST["mo9"],
				':mo11'		=>	$_POST["mo11"],
				':mo12'		=>	$_POST["mo12"],
				':mo13'		=>	$_POST["mo13"],
				':mo14'		=>	$_POST["mo14"],
				':mo15'		=>	$_POST["mo15"],
				':mo16'		=>	$_POST["mo16"],
				':mo17'		=>	$_POST["mo17"],
				':mo18'		=>	$_POST["mo18"],
				':mo23'		=>	$_POST["mo23"],
				':mo24'		=>	$_POST["mo24"],
				':mo25'		=>	$_POST["mo25"]
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
			SET eqp_name = :mo1, eqp_type = :mo2, eqp_idno = :mo3, eqp_srno = :serial, eqp_model = :mo4, eqp_make = :mo5, eqp_dtpur = :mo6, eqp_dtins = :mo7, eqp_wty1 = :mo8, eqp_wty2 = :mo9, eqp_recd = '$ses' , eqp_amc1 = :mo11 ,eqp_amc2  = :mo12,eqp_psch1 = :mo13,eqp_psch2 = :mo14,eqp_psch3 = :mo15,eqp_psch4 = :mo16,eqp_csch1 = :mo17,eqp_csch2 = :mo18,
				eqp_lic = :mo23 , eqp_lic_frm = :mo24,eqp_lic_to = :mo25

			WHERE eqpid = :sr_no
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
				':mo9'		=>	$_POST["mo9"],
				':mo11'		=>	$_POST["mo11"],
				':mo12'		=>	$_POST["mo12"],
				':mo13'		=>	$_POST["mo13"],
				':mo14'		=>	$_POST["mo14"],
				':mo15'		=>	$_POST["mo15"],
				':mo16'		=>	$_POST["mo16"],
				':mo17'		=>	$_POST["mo17"],
				':mo18'		=>	$_POST["mo18"],
				':mo23'		=>	$_POST["mo23"],
				':mo24'		=>	$_POST["mo24"],
				':mo25'		=>	$_POST["mo25"]
			)
		);
		if(!empty($result))
		{
			echo 'Equipement Master Form Updated Successfully';
		}
	}
}
?>