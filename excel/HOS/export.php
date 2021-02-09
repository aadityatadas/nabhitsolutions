<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" border="0" style="border: 1px solid; width:100%; " >  
           <tr>  
              <th colspan="14" style="background-color: #d9edf7;">
               
              <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
              <h3 style="text-align: center; text-decoration: underline;">HOSPITAL UTILIZATION (IPD REGISTER)</h3>
                 
                 
                </th>
                    
            </tr>

             <tr style="background-color: #bce8f1;">  
              <th colspan="2" >
               
               
                 
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>
                     <th colspan="10" ></th>
                 <th colspan="2"  >
               
               
                 
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

 
include "../date_calculation.php"; 

$datearray = date_range_find($_POST['frdt']  , $_POST['todt']);

if(isset($_POST["export"]))
{

  $output .= '
   <table class="table" style="width:100%; background-color:  #ffffff;" border="1" >  
                    <tr>  
                    <th width="35%" align="center">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Date of Admission (D1)</th>
                    <th width="20%">Time of Admission</th>
                    <th width="20%">Type of Admission</th>
                    <th width="20%">Dischage/DAMA/Death</th>
                    <th width="20%">Date of Dischage/DAMA/Death (D2)</th>
                    <th width="20%">Time of Dischage/DAMA/Death</th>
                    <th width="20%">MLC/Non MLC</th>
                    <th width="20%">Surgery/No Surgery</th>
                    <th width="20%">Lenth of Stay /(LOS D2-D1)</th>
                    <th width="20%">Recorded By</th> 
                    </tr>
  ';
  $countid = 1;
foreach ($datearray as $value) {
 $query = "SELECT * FROM tbl_huf WHERE huf_dadm = '".$value."'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                        <td align="center">'.$countid++.'</td>   
                        <td>'.$row["huf_pname"].'</td>  
                        <td align="center">'.$row["huf_uhid"].'</td>  
                        <td align="center">'.$row["huf_ipd"].'</td>  
                        <td align="center">'.$row["huf_dadm"].'</td>
                        <td align="center">'.$row["huf_tadm"].'</td> 
                        <td align="center">'.$row["tyofadmison"].'</td>
                        <td align="center">'.$row["huf_ddd"].'</td>  
                        <td align="center">'.$row["huf_dddd"].'</td>  
                        <td align="center">'.$row["huf_tddd"].'</td>  
                        <td align="center">'.$row["huf_mlc"].'</td>
                        <td align="center">'.$row["huf_surg"].'</td>
                        <td align="center">'.$row["huf_lens"].'</td>
                        <td align="center">'.$row["huf_recd"].'</td>
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
