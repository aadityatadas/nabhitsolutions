<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="19" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">HR INDICATOR</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="15" ></th>

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
 $query = "SELECT * FROM tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hrid = tbl_hr_indic.hrid";
 
  $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" style="width:100%" border="1">  
                    <tr>  
                          
												<th width="35%">Sr No</th>
												<th width="20%">Name of the staff</th>
												<th width="20%">Employee Code</th>
												<th width="20%">Designation</th>
												<th width="20%">Department</th>
												<th width="20%">Date of Joining</th>
												<th width="20%">Current status</th>
												<th width="20%">Select Month of Data Entered</th>
												<th width="20%">No of absentees in the month</th>
											 
												<th width="20%">Satisfaction Score</th>
												<th width="20%">Occupational Exposure if any</th>
												<th width="20%">needle prick Injury incidences</th>
												<th width="20%">Total Training Completed</th>
												<th width="20%">Performance Aprissal Score</th>
												<th width="20%">Personnal File Complete</th>
												<th width="20%">Health Check done</th>
												<th width="20%">Griviences staus</th>
												<th width="20%">Immunization Status</th>
												<th width="20%">Recorded By</th>
											 
                    
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                        <td align="center">'.$row["hr_id"].'</td>  
                        <td align="center">'.$row["hr_staff"].'</td>  
                        <td align="center">'.$row["hr_empcode"].'</td> 
                        <td align="center">'.$row["hr_desig"].'</td> 
                        <td align="center">'.$row["hr_dept"].'</td>  
                        <td align="center">'.$row["hr_datej"].'</td>  
                        <td align="center">'.$row["hr_ctstat"].'</td> 
                        <td align="center">'.$row["hr_month"].'</td>  
                        <td align="center">'.$row["hr_absent"].'</td>  
                        <td align="center">'.$row["hr_satis_score"].'</td>
                        <td align="center">'.$row["hr_occpany"].'</td>  
                        <td align="center">'.$row["hr_need_inj"].'</td>  
                        <td align="center">'.$row["hr_tottrain"].'</td>  
                        <td align="center">'.$row["hr_perf_score"].'</td>  
                        <td align="center">'.$row["hr_per_file"].'</td>
                        <td align="center">'.$row["hr_health_chk"].'</td>
                        <td align="center">'.$row["hr_griv"].'</td>
                        <td align="center">'.$row["hr_immune"].'</td>
                        <td align="center">'.$row["hr_recd"].'</td>
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
