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
      	   $tbl3 = $_POST['tbl3'];
      	    $audit_name = $_POST['audit_name'];
           
		 
		  
		   $query = "SELECT * FROM $tbl where id=".$_POST["testn"];



		   $query = $connection->prepare($query);

		   $query->execute();

		   $result = $query->fetch(PDO::FETCH_ASSOC);
		   
		   $output['id']=$result['id'];
		   $output['from_a']=$result['from_a'];
		   $output['to_a']=$result['to_a'];
		    $output['audit_name']=$result[$audit_name];

		  $query = "SELECT  count(*) as total FROM $tbl2
							WHERE huf_dddd BETWEEN '".$result['from_a']."' AND '".$result['to_a']."'
							AND huf_id NOT IN (SELECT huf_id FROM $tbl3 WHERE tbl_quaterly_audit_details_id='".$result['id']."')";

		 $query = $connection->prepare($query);

		   $query->execute();

		   $result = $query->fetch(PDO::FETCH_ASSOC);

		   $output['total']=$result['total'];
      }
      echo json_encode($output);
 }
?>