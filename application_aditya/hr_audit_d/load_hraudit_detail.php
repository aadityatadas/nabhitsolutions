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
		   $mon1 = date('F-Y', strtotime($mon));
		   $output["hrmon"]	= $mon1;

		  $tbl2=$_POST["tbl2"];


		   $output['auditSelectedMonth'] = date('m', strtotime($mon));
		   $output['auditSelectedYear'] =  date('Y', strtotime($mon));
		  
		   $query = "SELECT count(*) as t FROM $tbl where (audit_date) ='".$mon."'";

		    
		 





		    $result = $connection->query($query);
            $Count = $result->fetchColumn();
            if($Count){
            	$query1 = "SELECT id  FROM tbl_hr_audit_date where (audit_date) ='".$mon."'";
		     $result1 = $connection->query($query1);
		     $id = $result1->fetchColumn();
             $output['id']=$id;
            }
		    $output['sample_size'] = $Count;
      }
      echo json_encode($output);
 }
?>