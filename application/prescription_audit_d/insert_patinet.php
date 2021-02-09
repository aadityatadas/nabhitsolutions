<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];




if(isset($_POST["operation1"]))
{
     sort($_POST['PatientList']);
     $patienList=$_POST['PatientList'];
   
    $monthyear = $_POST['monthyear'];

    $monthyear_name=date('F-Y', strtotime($_POST['monthyear']));

     foreach ($patienList as $id) {
       
          $statement = $connection->prepare("INSERT INTO tbl_prescription_audit (huf_id,monthyear,monthyear_name,created_by) VALUES ($id,'$monthyear','$monthyear_name','$ses')");


        $result = $statement->execute();

    
        
    
     

       }
        if(!empty($result))
      {
        echo 'Patient Selected  Successfully';
      }

   


}











?>