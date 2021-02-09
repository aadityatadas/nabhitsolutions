<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];




if(isset($_POST["auditsearch"]))
{
    
     $parts = explode('-',$_POST['todate1']);
     $month = $parts[1];

   	 $qry = "SELECT huf_id,huf_pname FROM tbl_huf
          WHERE month(huf_dddd) = '".$month."'
          ORDER BY RAND()
         LIMIT ".$_POST['s_size']."";

        
     $output = array();
	 $statement = $connection->prepare(
		$qry
	);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	header('Content-Type: application/json');
    echo json_encode($result); 
    exit();


}









?>