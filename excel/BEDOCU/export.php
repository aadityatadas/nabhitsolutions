<?php
ob_start();
session_start();
?>


<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="7" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">BED OCCUPANCY REPORT</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4 style="text-align: center;"><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="3" ></th>

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
  
// Display the dates in array format 

// foreach ($datearray as $value) {
//     echo $value."<br>";
// }


if(isset($_POST["export"]))
{
  $present = 0;

  $output .= '
   <table class="table" style="width:100%" border="1" >  
                    <tr>  
                    
                      <th  width="20%">Sr.No.</th>
                        <th style="width: 10%;text-align:center;">Date</th>
                        <th  width="20%">No. of Admitted patient on the day</th>
                        <th  width="20%">No. of patient Discharge on the day</th>
                        <th  width="20%">Inpatient Days on Day</th>
                        <th  width="20%">No. of Available bed Days</th>
                        <th  width="20%">Bed Occupancy Rate on the day(in %)</th>
                    </tr>
  ';

  $frdate = mysqli_real_escape_string($connect, $_POST["frdt"]);
  $todate = mysqli_real_escape_string($connect, $_POST["todt"]);
  $cnt2Total = 0;
  $cnt3Total = 0;
  $bed_occupTotal =0 ;
$total_bed = 100;
  $datearray = date_range_find($frdate  , $todate);
   
  $countid = 1;
foreach ($datearray as $tdt) {

  $s = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm = '$tdt'")or die(mysqli_error($connect));
  $cnt2 = mysqli_num_rows($s);
  $s3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dddd = '$tdt'")or die(mysqli_error($connect));
  $cnt3 = mysqli_num_rows($s3);

// SELECT * FROM tbl_huf WHERE (huf_dadm <= '2019-06-23' AND huf_ddd ='' ) OR (huf_dadm <= '2019-06-23' AND huf_ddd !='' AND huf_dddd = '2019-06-23' )

  $s4 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$tdt' AND huf_ddd ='' ) OR (huf_dadm <= '$tdt' AND huf_dddd > '$tdt')")or die(mysqli_error($connect));
  $cnt4 = mysqli_num_rows($s4);
  
  if($cnt4){
      $bed_occup = round(($cnt4/$total_bed)*100,2);
  }else{
      $bed_occup = 0;
  }

  $cnt2Total += $cnt2;
  $cnt3Total += $cnt3;
  $bed_occupTotal += $bed_occup;
  
  
  
        $output .= '  
          <tr>
  <td style="text-align:center;">'. $countid++ .'</td>
  <td style="text-align:center;">'.$tdt.'</td>
  <td style="text-align:center;">'.$cnt2.'</td>
  <td style="text-align:center;">'.$cnt3.'</td>
  <td style="text-align:center;">'.$cnt4.'</td>
  <td style="text-align:center;">'.$total_bed.'</td>
  <td style="text-align:center;">'.$bed_occup.'</td>
          </tr>
        ';
          

 

  

  }
  
  

 
$output .= ' 
      <tr><td colspan="7" style="text-align:right;"> </td></tr>
      <tr>
      <td colspan="2" style="text-align:right;">Total No. of Patient Admitted </td>
      <td>'.$cnt2Total.'</td>
      <td colspan="2" style="text-align:right;">Total No. of Discharge/Dama/Death </td>
      <td>'.$cnt3Total.'</td>
      <td></td>

      </tr>

      <tr><td colspan="7" style="text-align:center;"> Bed Occupany Rate for Range : '.round(($bed_occupTotal/($countid-1)),2).' % </td>
    </tr> ';









 $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
}
?>
