<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="10" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">HR MASTER DETAILS</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="6" ></th>

              <th colspan="2" >
               
               <h4><?php
                date_default_timezone_set("Asia/Calcutta");
                echo "<b>"."Time: " . strtoupper(date("h:i:sa"))."<br><br>";?></h4>
               </th>
                    
            </tr>

  </table>

<?php  
//export.php  
include("../config/config.php");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tbl_hr_mast";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" style="width:100%" border="1">  
                    <tr>  
        
                  
												<th width="35%">Sr No</th>
												<th width="20%">Name of the staff</th>
												<th width="20%">Employee Code</th>
                        <th width="20%">Registration No.</th>
												<th width="20%">Designation</th>
												<th width="20%">Department</th>
												<th width="20%">Date of Joining</th>
                        <th width="20%">Emp. Type</th>
												<th width="20%">Current status</th>
												<th width="20%">Recorded By</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td align="center">'.$row["hrid"].'</td>  
                         <td align="center">'.$row["hr_staff"].'</td>  
                         <td align="center">'.$row["hr_empcode"].'</td>  
                         <td align="center">'.$row["hr_reg_no"].'</td>
                         <td align="center">'.$row["hr_desig"].'</td>  
                         <td align="center">'.$row["hr_dept"].'</td>
                         <td align="center">'.$row["hr_datej"].'</td>
       	                 <td align="center">'.$row["hr_emp_type"].'</td>
                         <td align="center">'.$row["hr_ctstat"].'</td>  
                          
                         <td>'.$row["hr_recd"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
