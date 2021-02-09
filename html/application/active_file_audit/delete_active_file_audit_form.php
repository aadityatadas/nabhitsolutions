<?php
include('dbinfo.php');

if(isset($_POST["user_id"]))
{
	$sq="DELETE FROM tbl_pharmcy_register WHERE pharmcy_register_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>