<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="13" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">Ventilator Associated Pnemonia</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4 style="text-align: center;"><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="9" ></th>

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
                    <th width="20%">Date of Admission (D1)</th>
                    <th width="20%">Date & Time of Intubation/Ventilation on</th>
                    <th width="20%">Date & Time of Extubation/Ventilation Vein off</th>
                    <th width="20%">Total Ventilator Days</th>
                    <th width="20%">Whether Patient has symptoms of Pnemonia </th>
                    <th width="20%">Symptons Details</th>
                    <th width="20%">Date of Sample sent for culture</th>
                    <th width="20%">Whether Sample Positive for VAP</th>
                    <th width="20%">Recorded By</th> 
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["huf_id"].'</td>  
                         <td>'.$row["huf_pname"].'</td>  
                         <td>'.$row["huf_uhid"].'</td>  
                         <td>'.$row["huf_ipd"].'</td>  
                         <td>'.$row["huf_dadm"].'</td>
                         <td>'.$row["vent_dt_iuc"].'</td>  
                         <td>'.$row["vent_dt_ruc"].'</td>
                         <td>'.$row["vent_tcd"].'</td>  
                         <td>'.$row["vent_sympt"].'</td>
                         <td>'.$row["vent_sympt_det"].'</td>  
                         <td>'.$row["vent_ssc"].'</td>
                         <td>'.$row["vent_spc"].'</td>
                         <td>'.$row["vent_rcd"].'</td>
       
       
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
