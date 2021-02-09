<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$sq="DELETE FROM  tbl_transptn_sfty_chcklst WHERE transptn_sfty_chcklst_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>