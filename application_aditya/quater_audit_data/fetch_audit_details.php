<?php
include('../dbinfo.php');

//$query1 = "SELECT * FROM tbl_quaterly_audit_details where audit_year = '".date('Y')."'";
	$query1 = "SELECT * FROM $table ";

	
	$to = date('Y-m-t');

 	$dat = date('Y-m-d');

	
	$statement1 = $connection->prepare($query1);
	$r= $statement1->execute();
	$filtered_rows1 = $statement1->rowCount();
	$quaters = $statement1->fetchAll(PDO::FETCH_ASSOC);

	$query2 = "SELECT * FROM $table 
   WHERE from_a<='".$dat."' AND to_a >='".$dat."'";

	

	
	$statement2 = $connection->prepare($query2);
	$r= $statement2->execute();
	
	$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);


?>