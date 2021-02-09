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
                 <h3 style="text-align: center; text-decoration: underline;">Medical Records Audit </h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;";
                ?></h4>

                </th>

              <th colspan="4" ></th>

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
$query = "SELECT * FROM tbl_medical_record_audit WHERE (month(monthyear)='$month' AND  year(monthyear)='$year')";

$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;
//echo $mlc_count;
$countid = 1;

$output .= '
   <table class="table" style="" border="1" >  
                    <tr>  
                    <th style="width: 100px">Sr. No.</th>
                 <th width="30%">MR without Discharge Summary</th>
              <th width="30%">MR having Incomplete/ Improper consent</th>
            <th width="30%">MR without Sign of consultant on Initial Assessment sheet</th>
              <th width="30%">MR without Sign of consultant on Medication Order</th>
          <th width="30%">MR without Nursing Asssement</th>
          <th width="30%">MR without Nutritional Asssement</th>
          <th width="30%">MR without Physiotherapy Asssement</th>
        <th width="30%">Post anaesthesia scoring done & Signed by anaesthtist</th>

                    </tr>
  ';
  $mr_without_dis_summary=0;
  $mr_having_incm_imp_const=0;
  $mr_without_sign_init_ass_sheet=0;
  $mr_without_sign_init_medictn_order=0;
  $mr_without_nursing_asst=0;
  $mr_without_nutrition_asst=0;
  $mr_without_physipy_asst=0;
   $post_anaesthesia_scroing_sign_anaesthist=0;


  if(mysqli_num_rows($result) > 0)
{
  
while($row = mysqli_fetch_array($result))
  {
    if($row["mr_without_dis_summary"]=='Yes'){
      $mr_without_dis_summary++;
    }
    if($row["mr_having_incm_imp_const"]=='Yes'){
      $mr_having_incm_imp_const++;
    }
    if($row["mr_without_sign_init_ass_sheet"]=='Yes'){
      $mr_without_sign_init_ass_sheet++;
    }
    if($row["mr_without_sign_init_medictn_order"]=='Yes'){
      $mr_without_sign_init_medictn_order++;
    }
    if($row["mr_without_nursing_asst"]=='Yes'){
      $mr_without_nursing_asst++;
    }
    if($row["mr_without_nutrition_asst"]=='Yes'){
      $mr_without_nutrition_asst++;
    }
    if($row["mr_without_physipy_asst"]=='Yes'){
      $mr_without_physipy_asst++;
    }

     if($row["post_anaesthesia_scroing_sign_anaesthist"]=='Yes'){
      $post_anaesthesia_scroing_sign_anaesthist++;
    }
    
    
    $output .= '
    <tr>  
       <td align="center">'.$countid++ .'</td>   
       <td>'.$row["mr_without_dis_summary"].'</td>  
       <td align="center">'.$row["mr_having_incm_imp_const"].'</td>  
       <td align="center">'.$row["mr_without_sign_init_ass_sheet"].'</td>  
       <td align="center">'.$row["mr_without_sign_init_medictn_order"].'</td>
       <td align="center">'.$row["mr_without_nursing_asst"].'</td>  
       <td align="center">'.$row["mr_without_nutrition_asst"].'</td>
       <td align="center">'.$row["mr_without_physipy_asst"].'</td>
       <td align="center">'.$row["post_anaesthesia_scroing_sign_anaesthist"].'</td>
       
       
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
       <td>'.$mr_without_dis_summary.'</td>  
       <td align="center">'.$mr_having_incm_imp_const.'</td>  
       <td align="center">'.$mr_without_sign_init_ass_sheet.'</td>  
       <td align="center">'.$mr_without_sign_init_medictn_order.'</td>
       <td align="center">'.$mr_without_nursing_asst.'</td>  
       <td align="center">'.$mr_without_nutrition_asst.'</td>
       <td align="center">'.$mr_without_physipy_asst.'</td>
       <td align="center">'.$post_anaesthesia_scroing_sign_anaesthist.'</td>
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
        </tr>
   ';
    

       $mr_without_dis_summary_per=($mr_without_dis_summary/$mlc_count)*100;
       $mr_having_incm_imp_const_per=($mr_having_incm_imp_const/$mlc_count)*100;
       $mr_without_sign_init_ass_sheet_per=($mr_without_sign_init_ass_sheet/$mlc_count)*100;
       $mr_without_sign_init_medictn_order_per=($mr_without_sign_init_medictn_order/$mlc_count)*100;
       $mr_without_nursing_asst_per=($mr_without_nursing_asst/$mlc_count)*100;
       $mr_without_nutrition_asst_per=($mr_without_nutrition_asst/$mlc_count)*100;
       $mr_without_physipy_asst_per=($mr_without_physipy_asst/$mlc_count)*100;
        $post_anaesthesia_scroing_sign_anaesthist_per=($post_anaesthesia_scroing_sign_anaesthist/$mlc_count)*100;

       $output .= '<tr><td colspan="8"> </td></tr>
    <tr>  
       <td align="center">% of compliance</td>   
       <td>'.$mr_without_dis_summary_per.'</td>  
       <td align="center">'.number_format($mr_having_incm_imp_const_per,2).'</td>  
       <td align="center">'.number_format($mr_without_sign_init_ass_sheet_per,2).'</td>  
       <td align="center">'.number_format($mr_without_sign_init_medictn_order_per,2).'</td>
       <td align="center">'.number_format($mr_without_nursing_asst_per,2).'</td>  
       <td align="center">'.number_format($mr_without_nutrition_asst_per,2).'</td>
       <td align="center">'.number_format($mr_without_physipy_asst_per,2).'</td>
         <td align="center">'.number_format($post_anaesthesia_scroing_sign_anaesthist,2).'</td>
        </tr>';

       $output .= '</table>';

   $output .='<table class="table" style="" > 
               <tr>  <td colspan="8"></td>   </tr> 
               <tr>  <td colspan="8"></td>   </tr> 
               <tr>  <td colspan="8"></td>   </tr> 
               </table>';

    $output .='<table class="table" style="" border="1" > 
               <tr>  <td colspan="2"></td>
                      <th class="report">MR without Discharge Summary</td>
                      <td class="report">'.number_format($mr_without_dis_summary_per,2).'</td>
               </tr> 
               <tr>  <td colspan="2"></td>
                      <th class="report">MR having Incomplete/Improper consent</td>
                      <td class="report">'.number_format($mr_having_incm_imp_const_per,2).'</td>
               </tr>  
               <tr>  <td colspan="2"></td>
                      <th class="report">MR without Sign of consultanton Initial Assessment sheet</td>
                      <td class="report">'.number_format($mr_without_sign_init_ass_sheet_per,2).'</td>
               </tr> 
               <tr>  <td colspan="2"></td>
                      <th class="report">MR without Sign of consultant on Medication Order</td>
                      <td class="report">'.number_format($mr_without_sign_init_medictn_order_per,2).'</td>
               </tr> 
               <tr>  <td colspan="2"></td>
                      <th class="report">MR without Nursing Asssement</td>
                      <td class="report">'.number_format($mr_without_nursing_asst_per,2).'</td>
               </tr> 
               <tr>  <td colspan="2"></td>
                      <th class="report">MR without Nutritional Asssement</td>
                      <td class="report">'.number_format($mr_without_nutrition_asst_per,2).'</td>
               </tr>
               <tr>  <td colspan="2"></td>
                      <th class="report">MR without Physiotherapy Asssement</td>
                      <td class="report">'.number_format($mr_without_physipy_asst_per,2).'</td>
               </tr>

               <tr>  <td colspan="2"></td>
                      <th class="report">Post anaesthesia scoring done & Signed by anaesthtist</td>
                      <td class="report">'.number_format($post_anaesthesia_scroing_sign_anaesthist,2).'</td>
               </tr>

               </table>';
}
  
 
  $name = 'mrd'.time().'.xls';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$name);
  echo $output;

?>
