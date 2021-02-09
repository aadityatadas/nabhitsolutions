<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];




if(isset($_POST["operation1"]))
{
     sort($_POST['PatientList']);
     $patienList=$_POST['PatientList'];
    

     foreach ($patienList as $id) {
        
          $statement = $connection->prepare("INSERT INTO tbl_antibiotic_audit (huf_id,created_by) VALUES (:huf_id,'$ses')");


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