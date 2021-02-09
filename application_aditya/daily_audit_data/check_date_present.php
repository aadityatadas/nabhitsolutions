<?php  
error_reporting(1);
session_start();
 //load_data.php  
 include "../dbinfo.php";  
 $output = array();  
 if(isset($_POST["testn"]))  
 {  
      if($_POST["testn"] != '')  
      {  
      	   $tbl = isset($_POST['tbl'])? $_POST['tbl'] : 'tbl_huf';
           $mon = mysqli_real_escape_string($connect,$_POST["testn"]);
		   
         $stmt = $connection->query("SELECT count(*) as t,id FROM $tbl where (audit_date) ='".$mon."'");

            
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $output['sample_size'] = $row['t'];
		        $output['id'] = $row['id'];
        }

		 
      }
      echo json_encode($output);
 }
 elseif(isset($_POST["testn1"]))  
 {  
      if($_POST["testn1"] != '')  
      {  
           $tbl = isset($_POST['tbl'])? $_POST['tbl'] : 'tbl_huf';
           $mon = mysqli_real_escape_string($connect,$_POST["testn1"]);

           $tid=$_POST['tid'];

           $q="SELECT count(*) as t,$tid FROM $tbl where (date1) ='".$mon."'";

          
       
         $stmt = $connection->query($q);

            
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $output['sample_size'] = $row['t'];
            $output['id'] = $row[$tid];
        }

     
      }
      echo json_encode($output);
 }
?>