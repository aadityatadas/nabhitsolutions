<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="28">
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">RADIOLOY INDICATOR (IPD)</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="24" ></th>

              <th colspan="2" >
               
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
   <table class="table" style="width:100%" border="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Date of Admission</th>
                    <th width="20%">Age</th>
                    <th width="20%">Gender </th>
                    <th width="20%">Provisional/Final Diagnosis</th>
                    <th width="20%">Radiology Investigation</th>
                    <th width="20%">Sample Receiving Date-Time</th>
                    <th width="20%">Date-Time of Report Generation</th>
                    <th width="20%">Total Time</th>
                    <th width="20%">Investigation Result</th>
                    <th width="20%">Critical Result If Any</th> 
                    <th width="20%">Critical Alert Details</th>
                    <th width="20%">Result Time</th>
                    <th width="20%">Informed Time</th>
                    <th width="20%">Informed To</th>
                    <th width="20%">Infromed By</th>
                    <th width="20%">Reporting Error If Any</th>
                    <th width="20%">Reason For Reporting Error</th>
                    <th width="20%">CORRECTIVE ACTION</th>
                    <th width="20%">Redos If Any</th>
                    <th width="20%">Reason For Redos</th>
                    <th width="20%">CORRECTIVE ACTION</th>
                    <th width="20%">Reports-Corelating With Clinical Diagnosis </th>
                    <th width="20%">Clinical Correlation</th>
                    <th width="20%">Name of Lab Personnel</th>
                    </tr>
  ';
        $countid = 1;
        foreach ($datearray as $value) { 
$query = "SELECT tbl_huf.* , tbl_radio_ipd.* FROM tbl_huf LEFT JOIN tbl_radio_ipd ON tbl_huf.huf_id = tbl_radio_ipd.tbl_huf_id 
WHERE tbl_huf.huf_dadm = '".$value."'";


 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
        <tr>  
        <td align="center" align="center">'.$countid++ .'</td>    
         <td>'.$row["huf_pname"].'</td>  
        <td align="center" align="center">'.$row["huf_uhid"].'</td>  
        <td align="center" align="center">'.$row["huf_ipd"].'</td>  
        <td align="center" align="center">'.$row["huf_dadm"].'</td>
        <td align="center" align="center">'.$row["age"].'</td>  
        <td align="center" align="center">'.$row["gender"].'</td>
        <td align="center" align="center">'.$row["prov_finl_daig"].'</td>  
        <td align="center" align="center">'.$row["radio_invst"].'</td>
        <td align="center" align="center">'.$row["invst_stat_date_time"].'</td>  
        <td align="center" align="center">'.$row["date_time_of_rep_gen"].'</td>
        <td align="center" align="center">'.$row["total_time"].'</td>
        <td align="center" align="center">'.$row["inv_result"].'</td>
        <td align="center" align="center">'.$row["cri_res_if_any"].'</td>
        <td align="center" align="center">'.$row["cri_alrt_details"].'</td>
        <td align="center" align="center">'.$row["result_time"].'</td>
        <td align="center" align="center">'.$row["info_time"].'</td>
        <td align="center" align="center">'.$row["info_to"].'</td>
        <td align="center" align="center">'.$row["info_by"].'</td>
        <td align="center" align="center">'.$row["report_err"].'</td>
        <td align="center" align="center">'.$row["report_err_rsn"].'</td>
        <td align="center" align="center">'.$row["correct_actn_report"].'</td>
        <td align="center" align="center">'.$row["redos"].'</td>
        <td align="center" align="center">'.$row["redos_rsn"].'</td>
        <td align="center" align="center">'.$row["correct_actn_redos"].'</td>
        <td align="center" align="center">'.$row["rep_cor_clin_diag"].'</td>
        <td align="center" align="center">'.$row["clinical_correlation"].'</td>
        <td align="center" align="center">'.$row["remarks"].'</td>
        </tr>
        
   ';
  }

}

$query1 = "SELECT tbl_huf.huf_pname,
tbl_huf.huf_uhid,
tbl_huf.huf_ipd,tbl_huf.huf_dadm,
tbl_radio_ipd.age,tbl_radio_ipd.gender,
a.prov_finl_daig,
a.radio_invst,
a.invst_stat_date_time,
a.date_time_of_rep_gen,
 a.total_time,
a.inv_result,
a.cri_res_if_any,
a.cri_alrt_details,
a.result_time,
a.info_time,
a.info_to,
a.info_by,
a.report_err,
a.report_err_rsn,
a.correct_actn_report,
a.redos,
a.redos_rsn,
a.correct_actn_redos,
a.rep_cor_clin_diag,
a.clinical_correlation,
a.remarks


 FROM tbl_radio_ipd_extra as a
LEFT JOIN tbl_radio_ipd ON a.tbl_radio_ipd_id = tbl_radio_ipd.radio_ipd_id
LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_radio_ipd.tbl_huf_id WHERE tbl_huf.huf_dadm = '".$value."' ";  
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
        <td align="center">'.$row1["age"].'</td>  
        <td align="center">'.$row1["gender"].'</td>
        <td align="center">'.$row1["prov_finl_daig"].'</td>  
        <td align="center">'.$row1["radio_invst"].'</td>
        <td align="center">'.$row1["invst_stat_date_time"].'</td>  
        <td align="center">'.$row1["date_time_of_rep_gen"].'</td>
        <td align="center">'.$row1["total_time"].'</td>
        <td align="center">'.$row1["inv_result"].'</td>
        <td align="center">'.$row1["cri_res_if_any"].'</td>
        <td align="center">'.$row1["cri_alrt_details"].'</td>
        <td align="center">'.$row1["result_time"].'</td>
        <td align="center">'.$row1["info_time"].'</td>
        <td align="center">'.$row1["info_to"].'</td>
        <td align="center">'.$row1["info_by"].'</td>
        <td align="center">'.$row1["report_err"].'</td>
        <td align="center">'.$row1["report_err_rsn"].'</td>
        <td align="center">'.$row1["correct_actn_report"].'</td>
        <td align="center">'.$row1["redos"].'</td>
        <td align="center">'.$row1["redos_rsn"].'</td>
        <td align="center">'.$row1["correct_actn_redos"].'</td>
        <td align="center">'.$row1["rep_cor_clin_diag"].'</td>
        <td align="center">'.$row1["clinical_correlation"].'</td>
        <td align="center">'.$row1["remarks"].'</td>
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
