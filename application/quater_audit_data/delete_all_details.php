<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$tbl = $_POST['tbl'];
	$id = $_POST["user_id"];
	$audit_name1=$_POST["audit_name"];

	


    $sql = "UPDATE tbl_quaterly_audit_details SET $audit_name1=?  WHERE id=?";

    $stmt= $connection->prepare($sql);
   $stmt->execute([0, $id]);
	
	

	$sq="DELETE FROM  $tbl WHERE tbl_quaterly_audit_details_id = '$id' ";

	
	mysqli_query($connect,$sq);
	
	
	echo 'Details Are Deleted Successfully';	
}
?>