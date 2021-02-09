<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$sq="DELETE FROM  tbl_bio_sfty_chklst WHERE bio_sfty_chklst_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>