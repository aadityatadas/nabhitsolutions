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

<?php

  $d1=array('Sr.No', 'Name of the patient', 'UHID','IPD' ,'DATE OF Admission', 'DATE OF DISCHARGE', 'Type of admission Emg/ Non EMG','Length of Stay','Diagnosis','Primary Consultant','Secondary Consultant','Infection if Any on admission/ On antibiotics on admission',
);

  $d2=array('Category/Name',  'Single/Mix', 'Dose', 'Maximum Daily Dose', 'Route ', 'Frequency ', 'Duration', 'Indication for Use', 'Any Justification Given'

);

  $d3=array('Indicated or non indicated',  'Adherence to Choice /Non Adherence to choice', 'Fully Adhrence/Non Agerence to one or More factor',  'Compliant/ Non Compliant/Non assesable', '% Compliant/ Non Compliant/Non assesable');


  $count = count($d1) +count($d2) + count($d3)+1;
?>
 
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
                 <h3 style="text-align: center; text-decoration: underline;">Antibiotics Audit </h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;";
                ?></h4>

                </th>

                  <th colspan="2" >
                
                <h4><?php
                echo "<b>". $_POST['selected_quater_name']."(".$_POST['selected_audit_year'].")&nbsp;&nbsp;".$_POST['frmDate']."  to ".$_POST['toDate']."</b>";
                ?></h4>

                </th>

               




          <!--     <th colspan="<?=$count-2?>" ></th> -->

              <th colspan="2" >
               
               <h4><?php
                date_default_timezone_set("Asia/Calcutta");
                echo "<b>"."Time: " . strtoupper(date("h:i:sa"))."<br><br>";?></h4>
               </th>
                    
            </tr>

  </table>

  
  
   <table class="table" style="" border="1" >  
                    <tr>  
                 <?php foreach ($d1 as $key => $d) {
                  echo '<th width="30%">'.$d.'</th>';
                 } 

                  echo '<th width="30%" colspan='.count($d2).'><b>Criteria of Antibiotics Use</b></th>';

                  echo '<th width="30%" colspan='.count($d3).'><b>Review of use as per policy</b></th>';


                  echo '<th width="30%" ><b></b></th>';
                  
                 ?> 
                  
                 
    </tr>


           <tr>  
                 <?php foreach ($d1 as $key => $d) {
                  echo '<th width="30%"></th>';
                 } 
                  foreach ($d2 as $key => $d) {
                  echo '<th width="30%">'.$d.'</th>';
                 } 

                 foreach ($d3 as $key => $d) {
                  echo '<th width="30%">'.$d.'</th>';
                 } 
                  echo '<th width="30%">done by</th>';
                 ?> 
                  
                 
           </tr>

          
<?php


$query = "SELECT tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd,tbl_huf.huf_dadm,tbl_huf.huf_dddd,tbl_huf.huf_ddd,tbl_huf.huf_tddd,tbl_huf.huf_lens,tbl_antibiotic_audit.* FROM tbl_antibiotic_audit
LEFT JOIN tbl_huf On tbl_antibiotic_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id = ?";
$sth = $connection->prepare($query);

$sth->execute(array($_POST['selectedquater_id']));
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
$sub_array=array();
$index = 0;
foreach ($result as $key => $row) {
 $sub_array[$index]['sr_no'] = $key+1;
  $sub_array[$index]['huf_pname'] = $row["huf_pname"];
  $sub_array[$index]['uhid'] = $row["huf_uhid"]; 
  $sub_array[$index]['huf_ipd'] = $row["huf_ipd"]; 
  $sub_array[$index]['huf_dadm'] = $row["huf_dadm"]; 
  
  $sub_array[$index]['disctime'] = $row["huf_dddd"]." ".$row["huf_tddd"];
  $sub_array[$index]['huf_ddd'] = $row["huf_ddd"];
  $sub_array[$index]['huf_lens'] = $row["huf_lens"];
  
  $sub_array[$index]['diagnosis'] = $row['diagnosis'];
$sub_array[$index]['prim_consultatnt']= $row['prim_consultatnt'];
$sub_array[$index]['sec_consultant'] = $row['sec_consultant'];
$sub_array[$index]['infection_if_any'] = $row['infection_if_any'];
$sub_array[$index]['cat_name'] = $row['cat_name'];
$sub_array[$index]['single_mix'] = $row['single_mix'];
$sub_array[$index]['dose'] = $row['dose'];
$sub_array[$index]['max_dose_daily'] = $row['max_dose_daily'];
$sub_array[$index]['route'] = $row['route'];
$sub_array[$index]['freq'] = $row['freq'];
$sub_array[$index]['duration'] = $row['duration'];
$sub_array[$index]['indic_use'] = $row['indic_use'];
$sub_array[$index]['any_justfctin'] = $row['any_justfctin'];
$sub_array[$index]['indicated_nonin'] = $row['indicated_nonin'];
$sub_array[$index]['adherence_non'] = $row['adherence_non'];
$sub_array[$index]['full_adhrence'] = $row['full_adhrence'];
$sub_array[$index]['complinat_non_comp_ass'] = $row['complinat_non_comp_ass'];
$sub_array[$index]['per_complinat_non_comp_ass']= $row['per_complinat_non_comp_ass'];





  $sub_array[$index]['created_by'] = $row["created_by"];
  // $sub_array[$index]['updated_by'] = $row["updated_by"];
  
  // $sub_array[$index]['created'] = $row["created"];
  $index++;
}

foreach ($sub_array as $key => $sub) {
  echo "<tr>";

  foreach ($sub as $key => $value) {
  echo "<td>".$value."</td>";
  }
  echo "</tr>";
}



$output ='';

    $output .= '';

  ?>
</table>




<?php  


//print_r($_POST);
//die();

 
  $name = 'antibiotic_audit'.time().'.xls';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$name);
  echo $output;

?>
