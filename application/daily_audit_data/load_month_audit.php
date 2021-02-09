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
		  
		   $query = "SELECT count(*) FROM $tbl where (month(huf_dadm) = '".$output['auditSelectedMonth']."' and year(huf_dadm) = '".$output['auditSelectedYear']."') AND huf_id NOT IN (SELECT huf_id FROM $tbl2 WHERE  (month(monthyear)='".$output['auditSelectedMonth']."' AND  year(monthyear)='".$output['auditSelectedYear']."') )
          ORDER BY RAND()";



		   $result = $connection->query($query);
            $Count = $result->fetchColumn();
		   $output['sample_size'] = $Count;
      }
      echo json_encode($output);
 }
?>