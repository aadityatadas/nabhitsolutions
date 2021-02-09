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

include "../date_calculation.php"; 

$datearray = date_range_find($_POST['frdt']  , $_POST['todt']);


if(isset($_POST["export"]))
{

  $countid = 1;

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

foreach ($datearray as $value) {

 $query = "SELECT huf_id,huf_pname,huf_uhid,huf_ipd,huf_dadm,huf_tadm,huf_recd,vent_dt_iuc,vent_dt_ruc,vent_tcd,vent_sympt,vent_sympt_det,vent_ssc,
 vent_spc,vent_rcd FROM tbl_huf WHERE tbl_huf.huf_dadm = '".$value."'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_assoc($result))
  {
   $output .= '
    <tr>  
                        <td align="center">'.$countid++ .'</td>  
                        <td >'.$row["huf_pname"].'</td>  
                        <td align="center">'.$row["huf_uhid"].'</td>  
                        <td align="center">'.$row["huf_ipd"].'</td>  
                        <td align="center">'.$row["huf_dadm"]." " .$row["huf_tadm"].'</td>
                        <td align="center">'.$row["vent_dt_iuc"].'</td>
                        <td align="center">'.$row["vent_dt_ruc"].'</td>
                        <td align="center">'.$row["vent_tcd"].'</td>
                        <td align="center">'.$row["vent_sympt"].'</td>
                        <td align="center">'.$row["vent_sympt_det"].'</td>
                        <td align="center">'.$row["vent_ssc"].'</td>
                        <td align="center">'.$row["vent_spc"].'</td>
                        <td align="center">'.$row["vent_rcd"].'</td>
                        
                    </tr>
   ';
  }
 
 }
  $query1 = "SELECT tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd,tbl_huf.huf_dadm,tbl_huf.huf_tadm,a.*
 FROM tbl_vent_ass_phmn as a
 LEFT JOIN tbl_huf ON tbl_huf.huf_id = a.tbl_huf_id 
 WHERE tbl_huf.huf_dadm = '".$value."' ";
 
  

      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      
         while ($row1 = mysqli_fetch_assoc($result1)) {

            $output .= '
    <tr>  
                        <td align="center">'.$countid++.'</td>  
                        <td>'.$row1["huf_pname"].'</td>  
                        <td align="center">'.$row1["huf_uhid"].'</td>  
                        <td align="center">'.$row1["huf_ipd"].'</td>  
                        <td align="center">'.$row1["huf_dadm"]." " .$row1["huf_tadm"].'</td>
                        <td align="center">'.$row1["vent_dt_iuc"].'</td>
                        <td align="center">'.$row1["vent_dt_ruc"].'</td>
                        <td align="center">'.$row1["vent_tcd"].'</td>
                        <td align="center">'.$row1["vent_sympt"].'</td>
                        <td align="center">'.$row1["vent_sympt_det"].'</td>
                        <td align="center">'.$row1["vent_ssc"].'</td>
                        <td align="center">'.$row1["vent_spc"].'</td>
                        <td align="center">'.$row1["vent_rcd"].'</td>
                        
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
