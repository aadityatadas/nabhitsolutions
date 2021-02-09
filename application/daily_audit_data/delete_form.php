<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$tbl = $_POST['tbl'];

	// $statement1 = $connection->prepare("SELECT * FROM $tbl WHERE audit_date = '".$_POST["user_id"]."'");
	// $statement1->execute();
	// $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
	// $audit_month = $result1[0]['audit_month'];
	// $audit_year = $result1[0]['audit_year'];


     $date= $_POST["user_id"];
	$sq="DELETE FROM  $tbl WHERE audit_date = '$date' ";
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>