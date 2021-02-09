<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT hrid FROM tbl_hr_mast ORDER BY hrid DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['hrid'];
		$cid = $id+1;
		$statement = $connection->prepare(
			"INSERT INTO tbl_hr_mast(hrid, hr_staff, hr_empcode, hr_desig, hr_dept, hr_datej, hr_ctstat, hr_ctstat_det, hr_recd,hr_reg_no , hr_emp_type)
			VALUES('$cid',:mo1,:mo2,:mo3,:mo4,:mo5,:mo6,:mo7,'$ses',:mo2reg,:mo6_emp )
			"
		);
		

		$result = $statement->execute(
			array(
				':mo1'		=>	$_POST["mo1"],
				':mo2'		=>	$_POST["mo2"],
				':mo3'		=>	$_POST["mo3"],
				':mo4'		=>	$_POST["mo4"],
				':mo5'		=>	$_POST["mo5"],
				':mo6'		=>	$_POST["mo6"],
				':mo7'		=>	$_POST["mo7"],
				':mo2reg'         =>  $_POST['mo2reg'],
				':mo6_emp'         =>  $_POST['mo6_emp']
			)
		);
		if(!empty($result))
		{
			echo 'HR Master Details Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_hr_mast 
			SET hr_staff = :mo1, hr_empcode = :mo2, hr_desig = :mo3, hr_dept = :mo4, hr_datej = :mo5, hr_ctstat = :mo6, hr_ctstat_det = :mo7, hr_recd = '$ses'  , hr_reg_no = :mo2reg, hr_emp_type = :mo6_emp   
			WHERE hrid = :sr_no
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
				':mo2reg'         =>  $_POST['mo2reg'],
				':mo6_emp'         =>  $_POST['mo6_emp']
			)
		);
		if(!empty($result))
		{
			echo 'HR Master Details Updated Successfully';
		}
	}
}
?>