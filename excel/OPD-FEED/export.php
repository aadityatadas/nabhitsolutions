<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="14" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">OPD FEEDBACK</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4 style="text-align: center;"><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="10" ></th>

              <th colspan="2" >
               
               <h4 style="text-align: center;"><?php
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
 $query = "SELECT * FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid";
 
 
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" style="width:100%" border="1">  
                    <tr>  
                          
                    
												<th width="35%">Sr No</th>
												<th width="20%">Date</th>
												<th width="20%">Name (Optional)</th>
												<th width="20%">Age</th>
												<th width="20%">Sex</th>
												<th width="20%">Email</th>
												<th width="20%">Address</th>
												<th width="20%">Treating Doctor</th>
												<th width="20%">Heard about hospital from</th>
												<th width="20%">Heard about hospital from</th>
												<th width="20%">Heard about hospital from</th>
												<th width="20%">Other</th>
												<th width="20%">Score (Out of 85)</th>
												<th width="20%">Recorded By</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td align="center">'.$row["opdwttm_id"].'</td>  
                         <td align="center">'.$row["opdwttm_dttmr"].'</td> 
                         <td>'.$row["opdwttm_pname"].'</td> 
                         <td align="center">'.$row["opd_age"].'</td>
                         <td align="center">'.$row["opd_sex"].'</td> 
                         <td align="center">'.$row["opd_email"].'</td> 
                         <td align="center">'.$row["opd_addr"].'</td> 
                         <td align="center">'.$row["opd_trdr"].'</td> 
                         <td align="center">'.$row["opd_hrd1"].'</td>
                         <td align="center">'.$row["opd_hrd2"].'</td>
                         <td align="center">'.$row["opd_hrd3"].'</td>
                         <td align="center">'.$row["opd_oth"].'</td>
                         <td align="center">'.$row["opd_score"].'</td> 
                          
                         <td align="center">'.$row["opd_user"].'</td>
                         
                         
                         
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
