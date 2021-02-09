<?php
error_reporting(0);
session_start();
include('dbinfo.php');
require_once 'testsign/signature-to-image.php';
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

	$json = $_POST['output']; // From Signature Pad
	$img = sigJsonToImage($json);

	$imgname = 'sign'.time().'.png';

			
			//imagepng($img);

			
	$save = "users_signs/".$imgname;
	imagepng($img, $save);
	imagedestroy($img);

	$user_sign = $imgname;
	
	if($_POST["operation"] == "Edit")
	{
		$qry1 = "UPDATE tbl_ipd SET
		ipd_age='$age',ipd_sex='$sex',ipd_email='$email',ipd_addr='$addr',ipd_trdr='$tdr',ipd_hrd1='$aj1',ipd_hrd2='$aj2',ipd_hrd3='$aj3',
		ipd_oth='$other', ipd_chk1='$chk1', ipd_chk2='$chk2', ipd_chk3='$chk3', ipd_chk4='$chk4', ipd_chk5='$chk5', ipd_chk6='$chk6', ipd_chk7='$chk7', ipd_chk8='$chk8', ipd_chk9='$chk9',
		ipd_chk10='$chk10', ipd_chk11='$chk11', ipd_chk12='$chk12', ipd_chk13='$chk13', ipd_chk14='$chk14', ipd_chk15='$chk15', ipd_chk16='$chk16', ipd_chk17='$chk17', ipd_chk18='$chk18',
		ipd_chk19='$chk19', ipd_chk20='$chk20', ipd_chk21='$chk21', ipd_chk22='$chk22', ipd_chk23='$chk23', ipd_chk24='$chk24', ipd_fac='$rfd', ipd_sug='$aos', ipd_score = '$chk_tot', ipd_user='$ses' , user_sign ='$user_sign'
		WHERE ipd_id = '$user_id'
		";
		if(mysqli_query($connect, $qry1))
		{
			echo 'IPD Feedback Form Updated Successfully';
		}		
	}
}
?>