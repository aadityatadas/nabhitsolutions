<?php  
	error_reporting(0);
	session_start();
	$ses=$_SESSION['login'];
	include "dbinfo.php";
	if(isset($_POST["new"]))
{
	$upass = $_POST['new'];
	$checker = $_POST['checker'];
	
	$upass1 = md5($upass); 
	
	$query="UPDATE tbl_staff SET stf_pass='$upass1' WHERE stf_uname = '$ses'";
	mysqli_query($connect, $query); 
	
}     
?>
<script language="javascript">
document.location="./index.php";
</script>