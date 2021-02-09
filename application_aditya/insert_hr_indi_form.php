<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT hr_id FROM tbl_hr_indic ORDER BY hr_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['hr_id'];
		$cid = $id+1;
		$statement = $connection->prepare(
			"INSERT INTO tbl_hr_indic(hr_id, hrid, hr_date, hr_month, hr_absent, hr_satis_score, hr_occpany, hr_need_inj, hr_tottrain, hr_perf_score, hr_per_file, hr_health_chk, hr_griv, hr_immune, hr_recd)
			VALUES('$cid',:hrid,:hrdt,:hrmon,:mo8,:mo9,:mo10,:mo11,:mo12,:mo13,:mo14,:mo15,:mo16,:mo17,'$ses')
			"
		);
		$result = $statement->execute(
			array(
				':hrid'		=>	$_POST["hrid"],
				':hrdt'		=>	$_POST["hrdt"],
				':hrmon'	=>	$_POST["hrmon"],
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
			echo 'HR Indicator Form Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_hr_indic 
			SET hrid = :hrid, hr_date = :hrdt, hr_month = :hrmon, hr_absent = :mo8, hr_satis_score = :mo9, hr_occpany = :mo10,
			hr_need_inj = :mo11, hr_tottrain = :mo12, hr_perf_score = :mo13, hr_per_file = :mo14, hr_health_chk	 = :mo15, hr_griv = :mo16, hr_immune = :mo17, hr_recd = '$ses'  
			WHERE hr_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],				
				':hrid'		=>	$_POST["hrid"],
				':hrdt'		=>	$_POST["hrdt"],
				':hrmon'	=>	$_POST["hrmon"],
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
			echo 'HR Indicator Form Updated Successfully';
		}
	}
}
?>