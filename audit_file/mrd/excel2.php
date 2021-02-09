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
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp; ";
                ?></h4>

                </th>

              <th colspan="2" ></th>

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

$monthR1 = $_POST['auditSelectedMonthDR1'];
$yearR1 = $_POST['auditSelectedYearDR1'];

$monthR2 = $_POST['auditSelectedMonthDR2'];
$yearR2 = $_POST['auditSelectedYearDR2'];





if($monthR1 >= $monthR2){
  $max = $monthR1;
  $min = $monthR2;
} else{
    $max = $monthR2;
    $min = $monthR1;
}

 
$data= array();



for($i= $min;$i<=$max;$i++){

  $mr_without_dis_summary=0;
  $mr_having_incm_imp_const=0;
  $mr_without_sign_init_ass_sheet=0;
  $mr_without_sign_init_medictn_order=0;
  $mr_without_nursing_asst=0;
  $mr_without_nutrition_asst=0;
  $mr_without_physipy_asst=0;
   $post_anaesthesia_scroing_sign_anaesthist=0;

$query = "SELECT * FROM tbl_medical_record_audit WHERE (month(monthyear)='$i' AND  year(monthyear)='$yearR1')";

$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;


 foreach ($result as $key => $row) {
   

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

   // [patient_name_present] => [medic_caps_legible] => [dose] => [quantity] => [date_prescription] => [high_risk_medicn_verified] => [sign_of_doc] =>
   
 }
     //echo count($result);
        if($mlc_count){
         $mr_without_dis_summary_per=($mr_without_dis_summary/$mlc_count)*100;
       $mr_having_incm_imp_const_per=($mr_having_incm_imp_const/$mlc_count)*100;
       $mr_without_sign_init_ass_sheet_per=($mr_without_sign_init_ass_sheet/$mlc_count)*100;
       $mr_without_sign_init_medictn_order_per=($mr_without_sign_init_medictn_order/$mlc_count)*100;
       $mr_without_nursing_asst_per=($mr_without_nursing_asst/$mlc_count)*100;
       $mr_without_nutrition_asst_per=($mr_without_nutrition_asst/$mlc_count)*100;
       $mr_without_physipy_asst_per=($mr_without_physipy_asst/$mlc_count)*100;
        $post_anaesthesia_scroing_sign_anaesthist_per=($post_anaesthesia_scroing_sign_anaesthist/$mlc_count)*100;

       $monthName = date("F", mktime(0, 0, 0, $i, 10))."-".$yearR1;
       $data[] = array(
            'month'=> $monthName,
            'count' => $mlc_count,
            'mr_without_dis_summary_per' => $mr_without_dis_summary_per,
            'mr_having_incm_imp_const_per' => $mr_having_incm_imp_const_per,
            'mr_without_sign_init_ass_sheet_per' => $mr_without_sign_init_ass_sheet_per,
            'mr_without_sign_init_medictn_order_per' => $mr_without_sign_init_medictn_order_per,
            'mr_without_nursing_asst_per' => $mr_without_nursing_asst_per,
            'mr_without_nutrition_asst_per' => $mr_without_nutrition_asst_per,
            'mr_without_physipy_asst_per' => $mr_without_physipy_asst_per,
            'post_anaesthesia_scroing_sign_anaesthist_per' => $post_anaesthesia_scroing_sign_anaesthist_per
            



       );
     }



}





//echo $mlc_count;
$countid = 1;

$output .= '<table class="table" style="" border="1" > '; 
 $output .= '<tr>  
                  <th style="width: 10%">Sr. No.</th>
                  <th width="30%">Audit element in MRD
                  </th> ';

    foreach ($data as $key => $da) {
           
        $output .= ' <th align="center">'.$da['month'].'('.$da['count'].')</th>   ';    
    }

$output .= '</tr>';





$dataA=array();

$dataA[0] = array(0=>'MR without Discharge  Summary' , 1 =>'mr_without_dis_summary_per');
$dataA[1] = array(0=>'MR having Incomplete/ Improper  consent' , 1 =>'mr_having_incm_imp_const_per');
$dataA[2] = array(0=>'MR without  Sign of consultant  on Initial  Assessment sheet' , 1 =>'mr_without_sign_init_ass_sheet_per');
$dataA[3] = array(0=>'MR without  Sign of consultant on Medication Order' , 1 =>'mr_without_sign_init_medictn_order_per');
$dataA[4] = array(0=>'MR without Nursing Asssement' , 1 =>'mr_without_nursing_asst_per');
$dataA[5] = array(0=>'MR without Nutritional Asssement' , 1 =>'mr_without_nutrition_asst_per');
$dataA[6] = array(0=>'MR without Physiotherapy Asssement' , 1 =>'mr_without_physipy_asst_per');
$dataA[7] = array(0=>'Post anaesthesia scoring done & Signed by anaesthtist' , 1 =>'post_anaesthesia_scroing_sign_anaesthist_per');


foreach ($dataA as $key => $val) {
  $output .= '<tr>  
                  <th style="width: 10%">'.++$key.'</th>
                  <th width="30%">'.$val[0].'
                  </th> ';

    foreach ($data as $key => $da) {
           
        $output .= ' <th align="center">'.number_format($da[$val[1]],2).'</th>   ';    
    }

$output .= '</tr>';

}
  


   $output .= '</table>';
  $name = 'mrd'.time().'.xls';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$name);
  echo $output;

?>
