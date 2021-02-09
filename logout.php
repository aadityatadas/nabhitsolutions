<?php 
	error_reporting(0);
	session_start(); 
	include("application/dbinfo.php");
	$_SESSION['login']=="";
	date_default_timezone_set('Asia/Kolkata');
	$ldate=date( 'Y-m-d h:i:s A', time () );
	mysqli_query($connect,"UPDATE userlog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
	session_unset();
	//session_destroy();
	$_SESSION['msg']="You have successfully logged out";
?>
<script language="javascript">
document.location="./index.php";
</script>