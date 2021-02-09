<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$tbl = $_POST['tbl'];
	$id = $_POST["user_id"];
	

	


    
	
	

	$sq="DELETE FROM  $tbl WHERE monthyear_name = '$id' ";

	
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>