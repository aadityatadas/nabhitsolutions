<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$sq="DELETE FROM  tbl_surg_safty_chklst WHERE surg_safty_chklst_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>