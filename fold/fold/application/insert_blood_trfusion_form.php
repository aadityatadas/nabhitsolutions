<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$d1 = mysqli_real_escape_string($connect, $_POST["mo4"]);
		$d2 = mysqli_real_escape_string($connect, $_POST["mo9"]);
		$diff = abs(strtotime($dt2) - strtotime($dt1)); 
		
		$hour   = floor(($diff) / (60*60)); 

		$minuts  = floor(($diff - $hour*60*60)/ 60);
		$ht_mi = $hour.'.'.$minuts;
		
		$statement = $connection->prepare(
			"UPDATE tbl_blood_fusion 
			SET bld_prdreq = :mo1, bld_nounit = :mo2, bld_dtreq = :mo3, bld_tmreq = :mo4, bld_bankname = :mo5, bld_ordby = :mo6, bld_dtrec = :mo7, bld_norec = :mo8, bld_tmrec = :mo9, bld_tat = '$ht_mi',
			bld_recby = :mo11, bld_notrfus = :mo12, bld_trfusreact = :mo13, bld_waste = :mo14, bld_waste_det = :mo15, bld_recd = '$ses'  
			WHERE bld_id = :sr_no
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
				//':mo10'		=>	$_POST["mo10"],
				':mo11'		=>	$_POST["mo11"],
				':mo12'		=>	$_POST["mo12"],
				':mo13'		=>	$_POST["mo13"],
				':mo14'		=>	$_POST["mo14"],
				':mo15'		=>	$_POST["mo15"]
			)
		);
		if(!empty($result))
		{
			echo 'Blood Trasfusion related events Form Updated Successfully';
		}
	}
}
?>