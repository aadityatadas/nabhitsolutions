<?php  
error_reporting(1);
session_start();
 //load_data.php  
 include "../dbinfo.php";  
 $output = array();  
 if(isset($_POST["deps_id"]))  
 {  
      if($_POST["deps_id"] != '')  
      {  
      	   
		  

      		$a_id=$_POST["deps_id"];
		   
		  
		   

		    
		 

$data_dep=array();
$query1="SELECT DISTINCT tbl_hr_audit.emp_department from tbl_hr_audit LEFT JOIN tbl_hr_mast on tbl_hr_mast.hrid = tbl_hr_audit.hrid_id where tbl_hr_audit.tbl_hr_audit_date_id= '$a_id' ";
$result1 = mysqli_query($connect, $query1);

while($row = mysqli_fetch_assoc($result1))
  {

    $output[]=($row['emp_department']);

    
    
}



		    
      }
      echo json_encode($output);
 }
?>