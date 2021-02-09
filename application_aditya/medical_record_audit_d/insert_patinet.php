<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];




if(isset($_POST["operation1"]))
{
    $monthyear = ($_POST['monthyear']);

    
     sort($_POST['PatientList']);
     $patienList=$_POST['PatientList'];
    $monthyear_name=date('F-Y', strtotime($_POST['monthyear']));

     foreach ($patienList as $id) {
        
          $statement = $connection->prepare("INSERT INTO tbl_medical_record_audit (huf_id,monthyear,monthyear_name,created_by) VALUES (:huf_id,'$monthyear','$monthyear_name','$ses')");


        $result = $statement->execute(
          array(
            ':huf_id'   =>  $id
            
          )
        );

    
        
    
     

       }
        if(!empty($result))
      {
        echo 'Patient Selected  Successfully';
      }

   


}











?>