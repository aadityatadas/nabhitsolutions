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
 $query = "SELECT * FROM tbl_need_pif";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of The Person Injured/Exposed</th>
                    <th width="25%">Department</th>
                    <th width="20%">Date & Time of Injury</th>
                    <th width="20%">Type of Injury</th>
                    <th width="20%">Mode of Injury</th>
                    <th width="20%">Injury with used/unused sharp</th>
                    <th width="20%">Reason/Details of Injury</th>
                    <th width="20%">Whether Investigated</th>
                    <th width="20%">Whether Prophylaxix given (Yes/No)</th>
                    <th width="20%">Reported to</th>
                    <th width="20%">Reported by</th>
                    <th width="20%">Total No of Staff</th>
                  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td>'.$row["needp_id"].'</td>  
    <td>'.$row["needp_sname"].'</td>  
    <td>'.$row["needp_dept"].'</td>  
    <td>'.$row["needp_dttm"].'</td>  
    <td>'.$row["needp_typ_inj"].'</td>
    <td>'.$row["needp_mod_inj"].'</td>  
    <td>'.$row["needp_usinj"].'</td>  
    <td>'.$row["needp_sharp"].'</td>  
    <td>'.$row["needp_inj_det"].'</td>  
    <td>'.$row["needp_wh_inv"].'</td>
    <td>'.$row["needp_wh_prop"].'</td>
    <td>'.$row["needp_rep_to"].'</td>
    <td>'.$row["needp_rep_by"].'</td>
    <td>'.$row["needp_tot_stf"].'</td>
       
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
