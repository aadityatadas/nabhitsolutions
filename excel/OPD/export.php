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
                 <h3 style="text-align: center; text-decoration: underline;">OPD WAITING TIME (OPD REGISTER)</h3>
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

 
include "../date_calculation.php"; 

$datearray = date_range_find($_POST['frdt']  , $_POST['todt']);


if(isset($_POST["export"]))
{

  $output .= '
   <table class="table" style="width:100%" border="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">OPD No</th>
                    <th width="20%">Specialty / Doctor</th>
                    <th width="20%">Date & Time of Registration  of OPD</th>
                    <th width="20%">Date & Time by which Doctor has seen the Patient</th>
                    <th width="20%">OPD waitingTime in Min.</th>
                    <th width="20%">Recorded By</th>
                    
                    </tr>
  ';
 $countid = 1;
foreach ($datearray as $value) {
 $query = "SELECT * FROM tbl_opdwttm WHERE DATE(opdwttm_dttmr) = '".$value."' ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                       <td align="center">'.$countid++.'</td>   
                        <td>'.$row["opdwttm_pname"].'</td>  
                        <td align="center">'.$row["opdwttm_uhid"].'</td>  
                        <td align="center">'.$row["opdwttm_opd"].'</td>  
                        <td align="center">'.$row["opdwttm_drsp"].'</td>
                        <td align="center">'.$row["opdwttm_dttmr"].'</td>  
                        <td align="center">'.$row["opdwttm_dttmds"].'</td>  
                        <td align="center">'.$row["opdwttm_opdwttm"].'</td> 
                        <td align="center">'.$row["opdwttm_recd"].'</td> 
       
                    </tr>
   ';
  }
  
 }
}

 $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
}
?>
