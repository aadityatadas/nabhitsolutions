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
      	   $tbl = $_POST['tbl'];
      	   $tbl2 = $_POST['tbl2'];
      	  
      	    $audit_name = $_POST['audit_name'];
           
		 
		  
		   $query = "SELECT * FROM $tbl where id=".$_POST["testn"];



		   $query = $connection->prepare($query);

		   $query->execute();

		   $result = $query->fetch(PDO::FETCH_ASSOC);
		   
		   $output['id']=$result['id'];
		   $output['from_a']=$result['from_a'];
		   $output['to_a']=$result['to_a'];
		    $output['audit_name']=$audit_name;
		    $output['quater_name']=$result['quater_name'];
		     $output['audit_year']=$result['audit_year'];

      }
      echo json_encode($output);
 }
?>