<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$sq="DELETE FROM  tbl_inf_cntrl_checklist WHERE inf_cntrl_checklist_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>