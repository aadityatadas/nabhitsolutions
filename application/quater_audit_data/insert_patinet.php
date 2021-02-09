<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];






if(isset($_POST["operation1"]))
{
     sort($_POST['PatientList']);
     $patienList=$_POST['PatientList'];
     $table_name = $_POST['table_name'];
    $selcted_quater_id=$_POST['selcted_quater_id'];
    $audit_name1=$_POST['audit_name1'];
   


    $sql = "UPDATE tbl_quaterly_audit_details SET $audit_name1=?  WHERE id=?";

    $stmt= $connection->prepare($sql);
   $stmt->execute([1, $selcted_quater_id]);

   

     foreach ($patienList as $id) {
        
          $statement = $connection->prepare("INSERT INTO $table_name (huf_id,tbl_quaterly_audit_details_id,created_by) VALUES (:huf_id,'$selcted_quater_id','$ses')");


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