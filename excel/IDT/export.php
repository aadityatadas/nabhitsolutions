<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="9" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                  <h3 style="text-align: center; text-decoration: underline;">IPD Waiting Time (IPD Discharge Register)</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4 style="text-align: center;"><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="5" ></th>

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
 $query = "SELECT * FROM tbl_huf";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" style="width:100%" border="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Specialty / Doctor</th>
                    <th width="20%">Date and time at which doctor ordered discharge</th>
                    <th width="20%">Date and time at which patient has left hospital</th>
                    <th width="20%">IPD waitingTime in Hrs.</th>
                    <th width="20%">Recorded By</th>
                    
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td align="center">'.$row["huf_id"].'</td>  
                         <td>'.$row["huf_pname"].'</td>  
                         <td align="center">'.$row["huf_uhid"].'</td>  
                         <td align="center">'.$row["huf_ipd"].'</td>  
                         <td align="center">'.$row["wttm_drsp"].'</td>
                         <td align="center">'.$row["wttm_dttmr"].'</td>  
                         <td align="center">'.$row["wttm_dttmds"].'</td>  
                         <td align="center">'.$row["wttm_opdwttm"].'</td>  
                         <td align="center">'.$row["wttm_recd"].'</td>  
       
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
