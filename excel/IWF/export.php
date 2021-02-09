<?php
ob_start();
session_start();
?>

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
   <table class="table" bordered="1">  
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
                         <td>'.$row["huf_id"].'</td>  
                         <td>'.$row["huf_pname"].'</td>  
                         <td>'.$row["huf_uhid"].'</td>  
                         <td>'.$row["huf_ipd"].'</td>  
                         <td>'.$row["wttm_drsp"].'</td>  
                         <td>'.$row["wttm_dttmr"].'</td>  
                         <td>'.$row["wttm_dttmds"].'</td>  
                         <td>'.$row["wttm_opdwttm"].'</td>  
                         <td>'.$row["wttm_recd"].'</td>
       
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
