<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="12" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">Surgical Site Infection Register</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4 style="text-align: center;"><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="8" ></th>

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
   <table class="table" style:"width=100%" border="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Date of Admission (D1)</th>
                    <th width="20%">Date & Time of Surgery</th>
                    <th width="20%">Name of Surgery</th> 
                    <th width="20%">Whether Patient has symptoms of SSI within 30-90 days</th>
                    <th width="20%">Symptoms Details</th>
                    <th width="20%">Date of Sample sent for culture</th>
                    <th width="20%">Whether Sample Positive for SSI </th>
                    <th width="20%">Recorded By</th>
                      
                    </tr>
  ';
   $countid = 1;
foreach ($datearray as $value) {
 $query = "SELECT * FROM tbl_huf WHERE tbl_huf.huf_dadm = '".$value."'";
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
                         <td align="center">'.$row["surg_dtos"].'</td>  
                         <td align="center">'.$row["surg_nsurg"].'</td>  
                         <td align="center">'.$row["surg_symp"].'</td>  
                         <td align="center">'.$row["surg_symp_det"].'</td>  
                         <td align="center">'.$row["surg_dtssc"].'</td>
                         <td align="center">'.$row["surg_sp_ssi"].'</td>
                         <td align="center">'.$row["surg_recd"].'</td>
                        </tr>
   ';
  }
  }

  $query1 = "SELECT tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd,tbl_huf.huf_dadm,tbl_huf.huf_tadm,a.*
 FROM tbl_surg_site_infec as a
 LEFT JOIN tbl_huf ON tbl_huf.huf_id = a.tbl_huf_id 
 WHERE tbl_huf.huf_dadm = '".$value."' ";
 
  

      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      
         while ($row1 = mysqli_fetch_assoc($result1)) {

           $output .= '
    <tr>  
                         <td align="center">'.$countid++ .'</td>  
                         <td>'.$row1["huf_pname"].'</td>  
                         <td align="center">'.$row1["huf_uhid"].'</td>  
                         <td align="center">'.$row1["huf_ipd"].'</td>  
                         <td align="center">'.$row1["huf_dadm"].'</td>
                         <td align="center">'.$row1["surg_dtos"].'</td>  
                         <td align="center">'.$row1["surg_nsurg"].'</td>  
                         <td align="center">'.$row1["surg_symp"].'</td>  
                         <td align="center">'.$row1["surg_symp_det"].'</td>  
                         <td align="center">'.$row1["surg_dtssc"].'</td>
                         <td align="center">'.$row1["surg_sp_ssi"].'</td>
                         <td align="center">'.$row1["surg_recd"].'</td>
                    </tr>';

        }

      }
 }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
}
?>
