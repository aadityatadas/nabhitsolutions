<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_care_evt 
			SET care_dtpli = :mo1, care_tmpli = :mo2, care_vipsc = :mo3, care_signsymp = :mo4, care_signsymp_det = :mo5, care_signsymp_th = :mo6, care_signsymp_th_det = :mo7, care_bradsc = :mo8, care_signsyp_bed = :mo9, care_signsyp_bed_det = :mo10,
			care_mor_sc = :mo11, care_incd_ptfall = :mo12, care_incd_ptfall_det = :mo13, care_iardl = :mo14, care_iardl_det = :mo15, care_injtpt = :mo16, care_injtpt_det = :mo17, care_recd = '$ses'  
			WHERE care_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],
				':mo1'		=>	$_POST["mo1"],
				':mo2'		=>	$_POST["mo2"],
				':mo3'		=>	$_POST["mo3"],
				':mo4'		=>	$_POST["mo4"],
				':mo5'		=>	$_POST["mo5"],
				':mo6'		=>	$_POST["mo6"],
				':mo7'		=>	$_POST["mo7"],
				':mo8'		=>	$_POST["mo8"],
				':mo9'		=>	$_POST["mo9"],
				':mo10'		=>	$_POST["mo10"],
				':mo11'		=>	$_POST["mo11"],
				':mo12'		=>	$_POST["mo12"],
				':mo13'		=>	$_POST["mo13"],
				':mo14'		=>	$_POST["mo14"],
				':mo15'		=>	$_POST["mo15"],
				':mo16'		=>	$_POST["mo16"],
				':mo17'		=>	$_POST["mo17"]
			)
		);
		if(!empty($result))
		{
			echo 'Care related events Form Updated Successfully';
		}
	}
}
?>