<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$tbl = $_POST['tbl'];
	$id = $_POST["user_id"];

	

	$sq1="DELETE FROM  tbl_hr_audit_date WHERE id = '$id' ";

	
	mysqli_query($connect,$sq1);

	$sq="DELETE FROM  $tbl WHERE tbl_hr_audit_date_id = '$id' ";

	
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>