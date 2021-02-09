<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];




if(isset($_POST["auditsearch"]))
{


    $tbl2=$_POST['tbl1'];
    
     
      $qry = "SELECT  huf_id,huf_pname FROM tbl_huf
              WHERE huf_dddd BETWEEN '".$_POST['frdate1']."' AND '".$_POST['todate1']."'
              AND huf_id NOT IN (SELECT huf_id FROM $tbl2 WHERE tbl_quaterly_audit_details_id='".$_POST['quater_id']."') ORDER BY RAND()
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