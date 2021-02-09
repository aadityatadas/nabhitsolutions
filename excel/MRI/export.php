<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="19" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">MEDICAL RECORD INDICATOR</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="15" ></th>

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
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id;";
 
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" style="width:100%" border="1">  
                    <tr>  
                        
                        <th width="35%">Sr. No.</th>
											  <th width="20%">Name of the Patient</th>
												<th width="20%">UHID No</th>
												<th width="20%">IPD No</th>
												<th width="20%">Date of Admission</th>
												<th width="20%">Date of Discharge/DAMA/Dealth</th>
												<th width="20%">MLC</th>
												<th width="20%">MRD Available</th>
												<th width="20%">MRD File In order as per MRD checklist</th>
												<th width="20%">MRD has Discharge Summary</th>
												<th width="20%">MRD has codification as per ICD</th>
												<th width="20%">MRD has incomplete or Improper Consent</th>
												<th width="20%">Medication orders are properly written</th>
												<th width="20%">Handover Sheet of Doctors are properly filled</th>
												<th width="20%">Handover Sheet of Nurses are properly filled</th>
												<th width="20%">The Plan of care is documented with desired outcome and countersigned by clinicians</th>
												<th width="20%">MRD includes screening for nutritional needs (Nutritional Assessment)</th>
												<th width="20%">MRD Includes Nursing care plan is documented with outcome at the time of admission</th>
												<th width="20%">Recorded By</th>
											</tr>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
                    <tr>  
                        <td align="center">'.$row["huf_id"].'</td>  
                        <td>'.$row["huf_pname"].'</td>  
                        <td align="center">'.$row["huf_uhid"].'</td>  
                        <td align="center">'.$row["huf_ipd"].'</td>  
                        <td align="center">'.$row["huf_dadm"].'</td>
                        <td align="center">'.$row["huf_ddd"].'</td>  
                        <td align="center">'.$row["huf_mlc"].'</td>  
                        <td align="center">'.$row["medi_mrdav"].'</td>  
                        <td align="center">'.$row["medi_mrdfile"].'</td>  
                        <td align="center">'.$row["medi_mrddissum"].'</td>
                        <td align="center">'.$row["medi_mrdicd"].'</td>  
                        <td align="center">'.$row["medi_mrdimpcons"].'</td>  
                        <td align="center">'.$row["medi_mediord"].'</td>  
                        <td align="center">'.$row["medi_handsheet_dr"].'</td>  
                        <td align="center">'.$row["medi_handsheet_nur"].'</td>
                        <td align="center">'.$row["medi_planofcare"].'</td>
                        <td align="center">'.$row["medi_mrd_screen"].'</td>
                        <td align="center">'.$row["medi_mrd_nur_careplan"].'</td>
                        <td align="center">'.$row["medi_recd"].'</td>
                    </tr>';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
