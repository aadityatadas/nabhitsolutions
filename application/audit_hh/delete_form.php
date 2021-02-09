<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$tbl = $_POST['tbl'];
	if($tbl == 'tbl_audit_hh10')
	{
		$sq="DELETE FROM  $tbl WHERE id = '".$_POST["user_id"]."'";
		mysqli_query($connect,$sq);

	}
	else
	{
		$qut = explode('_', $_POST["user_id"]);
		$sq="DELETE FROM  $tbl WHERE quarter = '".$qut[0]."' and month_id = '".$qut[1]."'";
		mysqli_query($connect,$sq);
	}
	
	
	
	echo 'Details Are Deleted Successfully';	
}
?>