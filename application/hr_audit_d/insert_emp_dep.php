<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];




if(isset($_POST["operation1"]))
{



  if(isset($_POST['item_User'])){
         
      $hrdt= ($_POST['hrdt']);

      $statement = $connection->prepare("INSERT INTO tbl_hr_audit_date (audit_date,created_by) VALUES ('$hrdt','$ses')");


       $result = $statement->execute();
       if($result){
         $id = $connection->lastInsertId();
        foreach ($_POST['item_User'] as $key => $value) {

          $query = "SELECT hr_dept,hr_staff,hr_empcode FROM tbl_hr_mast WHERE hrid = :id LIMIT 1";
         $statement = $connection->prepare($query);
         $params = array(
           'id' => $value
       );
          $statement->execute($params);
          $user_data = $statement->fetch();

        $user_dep = $user_data['hr_dept'];
          $hr_staff= $user_data['hr_staff'];
            $hr_empcode=$user_data['hr_empcode'];

            $sql= "INSERT INTO tbl_hr_audit (hrid_id,tbl_hr_audit_date_id,emp_department,emp_name,emp_code,audit_date,created_by) VALUES ('$value',' $id','$user_dep','$hr_staff','$hr_empcode','$hrdt','$ses')";

           
            
            $statement1 = $connection->prepare($sql);


            $result = $statement1->execute();
          
        }
      
          echo "Hr audit Form Saved!";
       

     } else{
        echo "Fail to Save Hr audit";
     }


  } else {

    echo 13;

  }
    //  sort($_POST['PatientList']);
    //  $patienList=$_POST['PatientList'];
   
    // $monthyear = $_POST['monthyear'];

    //  foreach ($patienList as $id) {
       
    //       $statement = $connection->prepare("INSERT INTO tbl_prescription_audit (huf_id,monthyear,created_by) VALUES ($id,'$monthyear','$ses')");


    //     $result = $statement->execute();

    
        
    
     

      //  }
      //   if(!empty($result))
      // {
      //   echo 'Patient Selected  Successfully';
      // }

   


}











?>