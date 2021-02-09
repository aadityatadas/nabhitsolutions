<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";

ob_start();
session_start();



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
              <th colspan="10" >
               
                 <h1 style="text-align: center; text-decoration: underline;">PIOS HOSPITAL</h1>
                 <h3 style="text-align: center; text-decoration: underline;">Priscription </h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
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
include("../../application/dbinfo.php");
$output = '';
include "../date_calculation.php"; 

$monthR1 = $_POST['auditSelectedMonthDR11'];
$yearR1 = $_POST['auditSelectedYearDR11'];

$monthR2 = $_POST['auditSelectedMonthDR21'];
$yearR2 = $_POST['auditSelectedYearDR21'];



if($monthR1 >= $monthR2){
  $max = $monthR1;
  $min = $monthR2;
} else{
    $max = $monthR2;
    $min = $monthR1;
}



 
 
$data= array();



for($i= $min;$i<=$max;$i++){

  $patient_name_present=0;
  $medic_caps_legible=0;
  $dose=0;
  $quantity=0;
  $date_prescription=0;
  $high_risk_medicn_verified=0;
  $sign_of_doc=0;

$query = "SELECT * FROM tbl_prescription_audit WHERE (month(monthyear)='$i' AND  year(monthyear)='$yearR1')";

$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;


 foreach ($result as $key => $row) {
   

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


   // [patient_name_present] => [medic_caps_legible] => [dose] => [quantity] => [date_prescription] => [high_risk_medicn_verified] => [sign_of_doc] =>
   
 }
     //echo count($result);
        if($mlc_count){
       $patient_name_present_per=($patient_name_present/$mlc_count)*100;
       $medic_caps_legible_per=($medic_caps_legible/$mlc_count)*100;
       $dose_per=($dose/$mlc_count)*100;
       $quantity_per=($quantity/$mlc_count)*100;
       $date_prescription_per=($date_prescription/$mlc_count)*100;
       $high_risk_medicn_verified_per=($high_risk_medicn_verified/$mlc_count)*100;
       $sign_of_doc_per=($sign_of_doc/$mlc_count)*100;

       $monthName = date("F", mktime(0, 0, 0, $i, 10))."-".$yearR1;
       $data[] = array(
            'month'=> $monthName,
            'count' => $mlc_count,
            'patient_name_present' => $patient_name_present_per,
            'medic_caps_legible' => $medic_caps_legible_per,
            'dose' => $dose_per,
            'quantity' => $quantity_per,
            'date_prescription' => $date_prescription_per,
            'high_risk_medicn_verified' => $high_risk_medicn_verified_per,
            'sign_of_doc' => $sign_of_doc_per,






       );
     }



}





//echo $mlc_count;
$countid = 1;

$output .= '<table class="table" style="" border="1" > '; 
 $output .= '<tr>  
                  <th style="width: 10%">Sr. No.</th>
                  <th width="30%">Audit element in prescription
                  </th> ';

    foreach ($data as $key => $da) {
           
        $output .= ' <th align="center">'.$da['month'].'('.$da['count'].')</th>   ';    
    }

$output .= '</tr>';


$dataA[0] = array(0=>'Patient Name' , 1 =>'patient_name_present');
$dataA[1] = array(0=>'Medicatioy written in CAPS & Legible' , 1 =>'medic_caps_legible');
$dataA[2] = array(0=>'Dose' , 1 =>'dose');
$dataA[3] = array(0=>'Quantity' , 1 =>'quantity');
$dataA[4] = array(0=>'Date of prescription ' , 1 =>'date_prescription');
$dataA[5] = array(0=>'High risk medication verified' , 1 =>'high_risk_medicn_verified');
$dataA[6] = array(0=>'Signature of Doctor' , 1 =>'sign_of_doc');


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
  
  
  echo $output;
?>