<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	$d_t = mysqli_real_escape_string($connect, $_POST["dt"]);
	$name = mysqli_real_escape_string($connect, $_POST["mo1"]);
	$age = mysqli_real_escape_string($connect, $_POST["mo2"]);
	$sex = mysqli_real_escape_string($connect, $_POST["mo3"]);
	$email = mysqli_real_escape_string($connect, $_POST["em"]);
	$addr = mysqli_real_escape_string($connect, $_POST["mo4"]);
	$tdr = mysqli_real_escape_string($connect, $_POST["mo5"]);
	
	$aj1 = mysqli_real_escape_string($connect, $_POST["aj1"]);
	$aj2 = mysqli_real_escape_string($connect, $_POST["aj2"]);
	$aj3 = mysqli_real_escape_string($connect, $_POST["aj3"]);
	
	$other = mysqli_real_escape_string($connect, $_POST["mo7"]);
	
	$chk1 = mysqli_real_escape_string($connect, $_POST["chk1"]);
	$chk2 = mysqli_real_escape_string($connect, $_POST["chk2"]);
	$chk3 = mysqli_real_escape_string($connect, $_POST["chk3"]);
	$chk4 = mysqli_real_escape_string($connect, $_POST["chk4"]);
	$chk5 = mysqli_real_escape_string($connect, $_POST["chk5"]);
	$chk6 = mysqli_real_escape_string($connect, $_POST["chk6"]);
	$chk7 = mysqli_real_escape_string($connect, $_POST["chk7"]);
	$chk8 = mysqli_real_escape_string($connect, $_POST["chk8"]);
	$chk9 = mysqli_real_escape_string($connect, $_POST["chk9"]);
	$chk10 = mysqli_real_escape_string($connect, $_POST["chk10"]);
	$chk11 = mysqli_real_escape_string($connect, $_POST["chk11"]);
	$chk12 = mysqli_real_escape_string($connect, $_POST["chk12"]);
	$chk13 = mysqli_real_escape_string($connect, $_POST["chk13"]);
	$chk14 = mysqli_real_escape_string($connect, $_POST["chk14"]);
	$chk15 = mysqli_real_escape_string($connect, $_POST["chk15"]);
	$chk16 = mysqli_real_escape_string($connect, $_POST["chk16"]);
	$chk17 = mysqli_real_escape_string($connect, $_POST["chk17"]);
	$chk18 = mysqli_real_escape_string($connect, $_POST["chk18"]);
	$chk19 = mysqli_real_escape_string($connect, $_POST["chk19"]);
	$chk20 = mysqli_real_escape_string($connect, $_POST["chk20"]);
	$chk21 = mysqli_real_escape_string($connect, $_POST["chk21"]);
	$chk22 = mysqli_real_escape_string($connect, $_POST["chk22"]);
	$chk23 = mysqli_real_escape_string($connect, $_POST["chk23"]);
	$chk24 = mysqli_real_escape_string($connect, $_POST["chk24"]);
	
	$chk_tot = $chk1 + $chk2 + $chk3 + $chk4 + $chk5 + $chk6 + $chk7 + $chk8 + $chk9 + $chk10 + $chk11 + $chk12 + $chk13 + $chk14 + $chk15 + $chk16 + $chk17 + $chk18 + $chk19 + $chk20 + $chk21 + $chk22 + $chk23 + $chk24;
	$rfd = mysqli_real_escape_string($connect, $_POST["mo8"]);
	$aos = mysqli_real_escape_string($connect, $_POST["mo9"]);
	
	$user_id = mysqli_real_escape_string($connect, $_POST["user_id"]);
	/*	
	if($_POST["operation"] == "Add")
	{		
		$qry = "SELECT opd_id FROM tbl_opd ORDER BY opd_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['opd_id'];
		$cid = $id+1;
				
		$sql = "INSERT INTO tbl_opd(opd_id, opd_date, opd_name, opd_age, opd_sex, opd_email, opd_addr, opd_trdr, opd_hrd1, opd_hrd2, opd_hrd3, opd_oth, opd_chk1, opd_chk2, opd_chk3, opd_chk4, opd_chk5, opd_chk6, opd_chk7, opd_chk8, opd_chk9, opd_chk10, opd_chk11, opd_chk12, opd_chk13, opd_chk14, opd_chk15, opd_chk16, opd_chk17, opd_chk18, opd_chk19, opd_chk20, opd_chk21, opd_chk22, opd_chk23, opd_chk24, opd_fac, opd_sug, opd_user) 
		VALUES('$cid','$d_t','$name','$age','$sex','$email','$addr','$tdr','$chkk1','$chkk2','$chkk3','$other','$chk1','$chk2','$chk3','$chk4','$chk5','$chk6','$chk7','$chk8','$chk9','$chk10','$chk11','$chk12','$chk13','$chk14','$chk15','$chk16','$chk17','$chk18','$chk19','$chk20','$chk21','$chk22','$chk23','$chk24','$rfd','$aos','$ses')
		";
		
		if(mysqli_query($connect, $sql))
		{
			echo 'OPD Feedback Form Submitted Successfully';
		}
	}
	*/
	if($_POST["operation"] == "Edit")
	{
		$qry1 = "UPDATE tbl_opd SET
		opd_age='$age',opd_sex='$sex',opd_email='$email',opd_addr='$addr',opd_trdr='$tdr',opd_hrd1='$aj1',opd_hrd2='$aj2',opd_hrd3='$aj3',
		opd_oth='$other', opd_chk1='$chk1', opd_chk2='$chk2', opd_chk3='$chk3', opd_chk4='$chk4', opd_chk5='$chk5', opd_chk6='$chk6', opd_chk7='$chk7', opd_chk8='$chk8', opd_chk9='$chk9',
		opd_chk10='$chk10', opd_chk11='$chk11', opd_chk12='$chk12', opd_chk13='$chk13', opd_chk14='$chk14', opd_chk15='$chk15', opd_chk16='$chk16', opd_chk17='$chk17', opd_chk18='$chk18',
		opd_chk19='$chk19', opd_chk20='$chk20', opd_chk21='$chk21', opd_chk22='$chk22', opd_chk23='$chk23', opd_chk24='$chk24', opd_fac='$rfd', opd_sug='$aos', opd_score = '$chk_tot', opd_user='$ses'
		WHERE opd_id = '$user_id'
		";
		if(mysqli_query($connect, $qry1))
		{
			echo 'OPD Feedback Form Updated Successfully';
		}		
	}
}
?>