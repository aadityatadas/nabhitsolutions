<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="29">
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">GENERAL MAINTENANCE</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="25" ></th>

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
 $query = "SELECT * FROM tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid";
 
  $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
 $output .= '
   <table class="table" style="width:100%" border="1" align="center">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Breakdown Date</th>
                    <th width="25%">Name of the Equipement</th>
                    <th width="20%">Type of Equipement</th>
                    <th width="20%">Equipement Identification Number</th>
                    <th width="20%">Serial Number</th>
                    <th width="20%">Model No</th>
                    <th width="20%">Make</th>
                    <th width="20%">Date of Purchase</th>
                    <th width="20%">Date of Installation</th>
                    <th width="20%">Warranty Period Start</th>
                    <th width="20%">Warranty Period End</th>
                    <th width="20%">Under AMC</th>
                    <th width="20%">AMC Period</th> 
                    <th width="20%">AMC Period</th>
                    <th width="20%">Preventive Schedule</th>
                    <th width="20%">Preventive Schedule1</th>
                    <th width="20%">Preventive Schedule2</th>
                    <th width="20%">Preventive Schedule3</th>
                    <th width="20%">Calibration Schedule</th>
                    <th width="20%">Calibration Schedule</th>
                    <th width="20%">Type of Breakdown</th>
                    <th width="20%">Date & Time of Breakdown</th>
                    <th width="20%">Date & Time of Breakdown</th>
                    <th width="20%">Date & Time of Repair</th>
                    <th width="20%">Date & Time of Repair</th>
                    <th width="20%">Condemnation</th>
                    <th width="20%">License Required for Operation</th>
                    <th width="20%"> Recorded By</th>
                   
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
       <td align="center">'.$row["eqpid"].'</td>  
       <td align="center">'.$row["eqp_brkdwn_date"].'</td>  
       <td>'.$row["eqp_name"].'</td>  
       <td align="center">'.$row["eqp_type"].'</td>  
       <td align="center">'.$row["eqp_idno"].'</td>  
       <td align="center">'.$row["eqp_srno"].'</td> 
       <td align="center">'.$row["eqp_model"].'</td> 
       <td align="center">'.$row["eqp_make"].'</td> 
       <td align="center">'.$row["eqp_dtpur"].'</td>
       <td align="center">'.$row["eqp_dtins"].'</td> 
       <td align="center">'.$row["eqp_wty1"].'</td>
       <td align="center">'.$row["eqp_wty2"].'</td>
       <td align="center">'.$row["eqp_amcs"].'</td>
       <td align="center">'.$row["eqp_amc1"].'</td>  
       <td align="center">'.$row["eqp_amc2"].'</td>  
       <td align="center">'.$row["eqp_psch1"].'</td>  
       <td align="center">'.$row["eqp_psch2"].'</td>  
       <td align="center">'.$row["eqp_psch3"].'</td>
       <td align="center">'.$row["eqp_psch4"].'</td>
       <td align="center">'.$row["eqp_csch1"].'</td>
       <td align="center">'.$row["eqp_csch2"].'</td>
       <td align="center">'.$row["eqp_brkd"].'</td>
       <td align="center">'.$row["eqp_dtrp"].'</td>
       <td align="center">'.$row["eqp_tmbr"].'</td>
       <td align="center">'.$row["eqp_dtrp"].'</td>
       <td align="center">'.$row["eqp_tmrp"].'</td>
       <td align="center">'.$row["eqp_cond"].'</td>
       <td align="center">'.$row["eqp_lic"].'</td>
       <td align="center">'.$row["eqp_recd"].'</td>
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

