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
			"UPDATE tbl_medi_indi 
			SET medi_mrdav = :mo1, medi_mrdfile = :mo2, medi_mrddissum = :mo3, medi_mrdicd = :mo4, medi_mrdimpcons = :mo5, medi_mediord = :mo6, medi_handsheet_dr = :mo7, medi_handsheet_nur = :mo8, medi_planofcare = :mo9, medi_mrd_screen = :mo10,
			medi_mrd_nur_careplan = :mo11, medi_recd = '$ses'  
			WHERE medi_id = :sr_no
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
				':mo11'		=>	$_POST["mo11"]
			)
		);
		if(!empty($result))
		{
			echo 'Medical Records Indicator Form Updated Successfully';
		}
	}
}
?>