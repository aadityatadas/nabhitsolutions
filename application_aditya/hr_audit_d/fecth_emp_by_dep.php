<?php
include('../dbinfo.php');
if(isset($_POST["utyp"]))
{
	$tbl=$_POST['tbl'];
	$uopt='';

	
	$output = array();
	$query =  "SELECT * FROM $tbl
           
            WHERE hr_dept = '".$_POST["utyp"]."' 
		    ";


		   
	$statement = $connection->prepare(

		$query
		
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
			
		$uopt .= "<option value='".$row["hrid"]."' >".ucfirst($row["hr_staff"])."</option>";

		
	}

	echo $uopt;
    exit();
		
}
?>