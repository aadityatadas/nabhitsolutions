<?php
error_reporting(0);
session_start();
include('dbinfo.php');

if(isset($_POST["user_id"]))
{
	$sq="DELETE FROM tbl_opdwttm WHERE opdwttm_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq);

	$sq="DELETE FROM tbl_opd WHERE opdid = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq);
	
	echo 'Details Are Deleted Successfully';	
}
?>