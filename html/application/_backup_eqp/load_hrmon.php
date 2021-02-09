<?php  
error_reporting(0);
session_start();
 //load_data.php  
 include "dbinfo.php";  
 $output = '';  
 if(isset($_POST["testn"]))  
 {  
      if($_POST["testn"] != '')  
      {  
           $mon = mysqli_real_escape_string($connect,$_POST["testn"]);
		   $mon1 = date('F-Y', strtotime($mon));
		   $output["hrmon"]	= $mon1;
      }
      echo json_encode($output);
 }
?>