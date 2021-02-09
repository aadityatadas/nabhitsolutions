<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];




if(isset($_POST["auditsearch"]))
{
    
     //$parts = explode('-',$_POST['todate1']);
     //$month = $parts[1];
     $month =  $_POST['auditSelectedMonth'];
     $year  =  $_POST['auditSelectedYear'];


     $qry = "SELECT huf_id,huf_pname,huf_uhid FROM tbl_huf
          WHERE (month(huf_dadm) = '".$month."' and year(huf_dadm) = '".$year."')
          And huf_id NOT IN (SELECT huf_id FROM tbl_medical_record_audit WHERE  (month(monthyear)='".$month."' AND  year(monthyear)='".$year."'))
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