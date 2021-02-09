<?php
ob_start();
session_start();

include("../../application/dbinfo.php");

?>

<!DOCTYPE html>
<html>
<style type="text/css">
  .report {
  padding: 10px; 
      border-bottom: 2px solid #8ebf42; 
      text-align: center;
}
</style>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr> 
           <th colspan="2">  
           </th>
           <th colspan="4">
             <img src="<?=HOSPITAL_NAME_IMAGE?>"  alt="" width="400" height="200" >
           </th>

            <th colspan="2">  
           </th>

             
         </tr>
            <tr>
              <th colspan="8" >
               
                <h1 style="text-align: center; text-decoration: underline;"><?=HOSPITAL_NAME?></h1> 
                 <h3 style="text-align: center; text-decoration: underline;">Prescription Audit </h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="9" ></th>

              <th colspan="2" >
               
               <h4><?php
                date_default_timezone_set("Asia/Calcutta");
                echo "<b>"."Time: " . strtoupper(date("h:i:sa"))."<br><br>";?></h4>
               </th>
                    
            </tr>

  </table>


<?php  
//export.php  

$output = '';
include "../date_calculation.php"; 

$month = $_POST['auditSelectedMonthD'];
$year = $_POST['auditSelectedYearD'];
$query = "SELECT * FROM tbl_prescription_audit WHERE (month(monthyear)='$month' AND  year(monthyear)='$year')";

$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;
//echo $mlc_count;
$countid = 1;

$output .= '
   <table class="table" style="" border="1" >  
                    <tr>  
                    <th style="width: 100px">Sr. No.</th>
                  <th width="30%">Patient Name</th>
                  <th width="30%">Medicatioy written in CAPS & Legible</th>
                  <th width="30%">Dose</th>
                  <th width="30%">Quantity</th>
                  <th >Date of prescription </th>
                  <th >High risk medication verified</th>
                  <th >Prescription written by autorized person</th> 
<th >Drug name is clear</th>  
<th >Dose Route is correct</th> 
<th >Time is written on prescription</th> 

<th >Sign of authorized person on prescription</th> 

                  <th>Signature of Doctor</th>

                    </tr>
  ';
  $patient_name_present=0;
  $medic_caps_legible=0;
  $dose=0;
  $quantity=0;
  $date_prescription=0;
  $high_risk_medicn_verified=0;
  $sign_of_doc=0;

  $pre_by_auth_person=0;
  $drug_name_clear=0;
  $dose_corret=0;
  $time_prescription=0;
  $sign_of_auth=0;




  if(mysqli_num_rows($result) > 0)
{
  
while($row = mysqli_fetch_array($result))
  {
    if($row["patient_name_present"]=='Yes'){
      $patient_name_present++;
    }
    if($row["medic_caps_legible"]=='Yes'){
      $medic_caps_legible++;
    }
    if($row["dose"]=='Yes'){
      $dose++;
    }
    if($row["quantity"]=='Yes'){
      $quantity++;
    }
    if($row["date_prescription"]=='Yes'){
      $date_prescription++;
    }
    if($row["high_risk_medicn_verified"]=='Yes'){
      $high_risk_medicn_verified++;
    }
    if($row["sign_of_doc"]=='Yes'){
      $sign_of_doc++;
    }

    if($row["pre_by_auth_person"]=='Yes'){
      $pre_by_auth_person++;
    }
    if($row["drug_name_clear"]=='Yes'){
      $drug_name_clear++;
    }
    if($row["dose_corret"]=='Yes'){
      $dose_corret++;
    }
    if($row["time_prescription"]=='Yes'){
      $time_prescription++;
    }
    if($row["sign_of_auth"]=='Yes'){
      $sign_of_auth++;
    }
    
    $output .= '
    <tr>  
       <td align="center">'.$countid++ .'</td>   
       <td>'.$row["patient_name_present"].'</td>  
       <td align="center">'.$row["medic_caps_legible"].'</td>  
       <td align="center">'.$row["dose"].'</td>  
       <td align="center">'.$row["quantity"].'</td>
       <td align="center">'.$row["date_prescription"].'</td>  
       <td align="center">'.$row["high_risk_medicn_verified"].'</td>

        <td align="center">'.$row["pre_by_auth_person"].'</td>
         <td align="center">'.$row["drug_name_clear"].'</td>
          <td align="center">'.$row["dose_corret"].'</td>
           <td align="center">'.$row["time_prescription"].'</td>
           <td align="center">'.$row["sign_of_auth"].'</td>


       <td align="center">'.$row["sign_of_doc"].'</td>
       
       </tr>
   ';

  }

   $output .= '
    <tr>  
       <td colspan="2"></td> </tr>
   ';

   $output .= '
    <tr>  
       <td align="center">Total  compliance</td>   
       <td>'.$patient_name_present.'</td>  
       <td align="center">'.$medic_caps_legible.'</td>  
       <td align="center">'.$dose.'</td>  
       <td align="center">'.$quantity.'</td>
       <td align="center">'.$date_prescription.'</td>  
       <td align="center">'.$high_risk_medicn_verified.'</td>
       <td align="center">'.$pre_by_auth_person.'</td>
       <td align="center">'.$drug_name_clear.'</td>
       <td align="center">'.$dose_corret.'</td>
       <td align="center">'.$time_prescription.'</td>
       <td align="center">'.$sign_of_auth.'</td>
       <td align="center">'.$sign_of_doc.'</td>
        </tr>
   ';

   $output .= '
    <tr>  
       <td align="center">Maximum score</td>   
       <td>'.$mlc_count.'</td>  
       <td align="center">'.$mlc_count.'</td>  
       <td align="center">'.$mlc_count.'</td>  
       <td align="center">'.$mlc_count.'</td>
       <td align="center">'.$mlc_count.'</td> 
        <td align="center">'.$mlc_count.'</td> 
         <td align="center">'.$mlc_count.'</td>  
          <td align="center">'.$mlc_count.'</td> 
           <td align="center">'.$mlc_count.'</td> 
            <td align="center">'.$mlc_count.'</td> 
       <td align="center">'.$mlc_count.'</td>
       <td align="center">'.$mlc_count.'</td>
        </tr>
   ';
    

       $patient_name_present_per=($patient_name_present/$mlc_count)*100;
       $medic_caps_legible_per=($medic_caps_legible/$mlc_count)*100;
       $dose_per=($dose/$mlc_count)*100;
       $quantity_per=($quantity/$mlc_count)*100;
       $date_prescription_per=($date_prescription/$mlc_count)*100;
       $high_risk_medicn_verified_per=($high_risk_medicn_verified/$mlc_count)*100;

       $pre_by_auth_person_per=($pre_by_auth_person/$mlc_count)*100;
       $drug_name_clear_per=($drug_name_clear/$mlc_count)*100;
       $dose_corret_per=($dose_corret/$mlc_count)*100;
       $time_prescription_per=($time_prescription/$mlc_count)*100;
       $sign_of_auth_per=($sign_of_auth/$mlc_count)*100;

       $sign_of_doc_per=($sign_of_doc/$mlc_count)*100;

       $output .= '<tr><td colspan="8"> </td></tr>
    <tr>  
       <td align="center">% of compliance</td>   
       <td>'.number_format($patient_name_present_per,2).'</td>  
       <td align="center">'.number_format($medic_caps_legible_per,2).'</td>  
       <td align="center">'.number_format($dose_per,2).'</td>  
       <td align="center">'.number_format($quantity_per,2).'</td>
       <td align="center">'.number_format($date_prescription_per,2).'</td>  
       <td align="center">'.number_format($high_risk_medicn_verified_per,2).'</td>

       <td align="center">'.number_format($pre_by_auth_person_per,2).'</td>
       <td align="center">'.number_format($drug_name_clear_per,2).'</td>
       <td align="center">'.number_format($dose_corret_per,2).'</td>
       <td align="center">'.number_format($time_prescription_per,2).'</td>
       <td align="center">'.number_format($sign_of_auth_per,2).'</td>

       <td align="center">'.number_format($sign_of_doc_per,2).'</td>
        </tr>';

       $output .= '</table>';

   $output .='<table class="table" style="" > 
               <tr>  <td colspan="8"></td>   </tr> 
               <tr>  <td colspan="8"></td>   </tr> 
               <tr>  <td colspan="8"></td>   </tr> 
               </table>';

    $output .='<table class="table" style="" border="1" > 
               <tr>  <td colspan="2"></td>
                      <th class="report">Patient Name</td>
                      <td class="report">'.number_format($patient_name_present_per,2).'</td>
               </tr> 
               <tr>  <td colspan="2"></td>
                      <th class="report">Medicatioy written in CAPS & Legible</td>
                      <td class="report">'.number_format($medic_caps_legible_per,2).'</td>
               </tr>  
               <tr>  <td colspan="2"></td>
                      <th class="report">Dose</td>
                      <td class="report">'.number_format($dose_per,2).'</td>
               </tr> 
               <tr>  <td colspan="2"></td>
                      <th class="report">Quantity</td>
                      <td class="report">'.number_format($quantity_per,2).'</td>
               </tr> 
               <tr>  <td colspan="2"></td>
                      <th class="report">Date of prescription</td>
                      <td class="report">'.number_format($date_prescription_per,2).'</td>
               </tr> 
               <tr>  <td colspan="2"></td>
                      <th class="report">High risk medication verified</td>
                      <td class="report">'.number_format($high_risk_medicn_verified_per,2).'</td>
               </tr>
               <tr>  <td colspan="2"></td>
                      <th class="report">Prescription written by autorized person</td>
                      <td class="report">'.number_format($pre_by_auth_person_per,2).'</td>
               </tr>
               <tr>  <td colspan="2"></td>
                      <th class="report">Drug name is clear</td>
                      <td class="report">'.number_format($drug_name_clear_per,2).'</td>
               </tr>
               <tr>  <td colspan="2"></td>
                      <th class="report">Dose Route is correct</td>
                      <td class="report">'.number_format($dose_corret_per,2).'</td>
               </tr>
               <tr>  <td colspan="2"></td>
                      <th class="report">Time is written on prescription</td>
                      <td class="report">'.number_format($time_prescription_per,2).'</td>
               </tr>
               <tr>  <td colspan="2"></td>
                      <th class="report">Sign of authorized person on prescription</td>
                      <td class="report">'.number_format($sign_of_auth_per,2).'</td>
               </tr>
               <tr>  <td colspan="2"></td>
                      <th class="report">Signature of Doctor</td>
                      <td class="report">'.number_format($sign_of_doc_per,2).'</td>
               </tr>

               </table>';
}
  
 
  $name = 'prescription'.time().'.xls';

  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$name);
  echo $output;

?>
