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
                 <h3 style="text-align: center; text-decoration: underline;">Needle Prick Injury Register</h3>
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
                        <th width="20%">Name of The Person Injured/Exposed</th>
                        <th width="20%">Department</th>
                        <th width="20%">Date & Time of Injury</th>
                        <th width="20%">Type of Injury</th>
                        <th width="20%"> Mode of Injury</th>
                        <th width="20%"> Injury with used/unused sharp</th>
                        <th width="20%">Reason/Details of Injury</th>
                        <th width="20%">Whether Investigated</th>
                        <th width="20%">Whether Prophylaxix given (Yes/No)</th>
                        <th width="20%">Reported to</th>
                        <th width="20%">Reported by</th>
                    </tr>
  ';
  $countid = 1;
foreach ($datearray as $value) {
 $query = "SELECT * FROM tbl_need_pif WHERE DATE(needp_dttm) = '".$value."'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                        <td align="center">'.$countid++.'</td>   
                        <td>'.$row["needp_sname"].'</td>  
                        <td align="center">'.$row["needp_dept"].'</td>  
                        <td align="center">'.$row["needp_dttm"].'</td>  
                        <td align="center">'.$row["needp_typ_inj"].'</td>
                        <td align="center">'.$row["needp_mod_inj"].'</td>  
                        <td align="center">'.$row["needp_usinj"].'</td>  
                          
                        <td align="center">'.$row["needp_inj_det"].'</td>  
                        <td align="center">'.$row["needp_wh_inv"].'</td>
                        <td align="center">'.$row["needp_wh_prop"].'</td>
                        <td align="center">'.$row["needp_rep_to"].'</td>
                        <td align="center">'.$row["needp_rep_by"].'</td>
                         


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
