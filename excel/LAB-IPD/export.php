<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="24">
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">Laboratory Indicator (IPD)</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="20" ></th>

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
                    <th width="20%">Provisional/Final Diagnosis</th>
                    <th width="20%">Name of Test </th>
                    <th width="20%">Sample Receiving Date-Time</th>
                    <th width="20%">Date-Time of Report Generation</th>
                    <th width="20%">Total Time</th>
                    <th width="20%">Investigation Result</th>
                    <th width="20%">Critical Result If Any</th>
                    <th width="20%">Critical Alert Details</th> 
                    <th width="20%">Result Time </th>
                    <th width="20%">Informed Time</th>
                    <th width="20%">Informed To</th>
                    <th width="20%">Infromed By</th>
                    <th width="20%">Reporting Error If Any</th>
                    <th width="20%">Reason For Reporting Error</th>
                    <th width="20%"> Redos If Any</th>
                    <th width="20%">Reason For Redos</th>
                    <th width="20%">Reports-Corelating With Clinical Diagnosis </th>
                    <th width="20%">Clinical Correlation</th>
                    <th width="20%">Name of LAB Personnel</th>
                    </tr>
  ';
        $countid = 1;
        foreach ($datearray as $value) { 
$query = "SELECT tbl_huf.* , tbl_lab_ipd.* FROM tbl_huf LEFT JOIN tbl_lab_ipd ON tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id 
WHERE tbl_huf.huf_dadm = '".$value."'";


 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
        <tr>  
        <td align="center">'.$countid++ .'</td>    
        <td>'.$row["huf_pname"].'</td>  
        <td align="center">'.$row["huf_uhid"].'</td>  
        <td align="center">'.$row["huf_ipd"].'</td>  
        <td align="center">'.$row["huf_dadm"].'</td>
        <td align="center">'.$row["prov_finl_daig"].'</td>  
        <td align="center">'.$row["nam_of_test"].'</td>
        <td align="center">'.$row["sample_rec_time_date"].'</td>  
        <td align="center">'.$row["time_date_of_rep_gen"].'</td>  
        <td align="center">'.$row["total_time"].'</td>
        <td align="center">'.$row["inv_result"].'</td>
        <td align="center">'.$row["cri_res_if_any"].'</td>
        <td align="center">'.$row["cri_alrt_details"].'</td> 
        <td align="center">'.$row["result_time"].'</td>
        <td align="center">'.$row["info_time"].'</td>
        <td align="center">'.$row["info_to"].'</td>
        <td align="center">'.$row["info_by"].'</td>
        <td align="center">'.$row["resp_err"].'</td>
        <td align="center">'.$row["res_err_rsn"].'</td>
        <td align="center">'.$row["redos"].'</td>
        <td align="center">'.$row["redos_rsn"].'</td>
        <td align="center">'.$row["rep_cor_clin_diag"].'</td>
        <td align="center">'.$row["clinical_correlation"].'</td>
        <td align="center">'.$row["remarks"].'</td>
        </tr>
   ';
  }

}

$query1 = "SELECT tbl_huf.huf_pname,
tbl_huf.huf_uhid,
tbl_huf.huf_ipd,tbl_huf.huf_dadm,
 a.prov_finl_daig,
a.nam_of_test,
a.sample_rec_time_date,
a.time_date_of_rep_gen,
a.total_time,
a.inv_result,
a.cri_res_if_any,
a.cri_alrt_details,
a.result_time,
a.info_time,
a.info_to,
a.info_by,
a.resp_err,
a.res_err_rsn,
a.redos,
a.redos_rsn,
a.rep_cor_clin_diag,
a.clinical_correlation,
a.remarks

 FROM tbl_lab_ipd_extra as a
LEFT JOIN tbl_lab_ipd ON a.tbl_lab_lpd_id = tbl_lab_ipd.lab_ipd_id
LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id WHERE tbl_huf.huf_dadm = '".$value."' ";  
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
        <td align="center">'.$row1["prov_finl_daig"].'</td>  
        <td align="center">'.$row1["nam_of_test"].'</td>
        <td align="center">'.$row1["sample_rec_time_date"].'</td>  
        <td align="center">'.$row1["time_date_of_rep_gen"].'</td>  
        <td align="center">'.$row1["total_time"].'</td>
        <td align="center">'.$row1["inv_result"].'</td>
        <td align="center">'.$row1["cri_res_if_any"].'</td>
        <td align="center">'.$row1["cri_alrt_details"].'</td>
        <td align="center">'.$row1["result_time"].'</td>
        <td align="center">'.$row1["info_time"].'</td>
        <td align="center">'.$row1["info_to"].'</td>
        <td align="center">'.$row1["info_by"].'</td>
        <td align="center">'.$row1["resp_err"].'</td>
        <td align="center">'.$row1["res_err_rsn"].'</td>
        <td align="center">'.$row1["redos"].'</td>
        <td align="center">'.$row1["redos_rsn"].'</td>
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
