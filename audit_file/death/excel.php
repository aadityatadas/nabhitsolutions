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

  $d1=array('Sr.No', 'Name of the patient', 'UHID','IPD' , 'DATE OF DISCHARGE', 'Type of admission Emg/ Non EMG','Condition at the time of admission Critical/Non Critical/End of life care','Primary diagnosis', 'Cause of death',  'Date & time of death ', 'Expected /Unexpected death',  'Apache II score', 'Sofa score on 3rd day', 'Ventilation status',  'Surgery/procedure', 'Any Events',  'Consultant Incharge', 'Other consultant involve',  'Comorbid conditions', 'Relavant lab investigtions',  'Relavant Radiology investigtions',  'CPR status', 'Condition of patient during stay/ Relavant medical management'
    );

  $d2=array('Team work',   'Techniques and management of care', 'Medication error',  'Decision making', 'Staffing error/Skill and competency', 'Communication error','Economical factors of the patient','done by');

  $count = count($d1)+count($d2);
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
                 <h3 style="text-align: center; text-decoration: underline;">Death Audit </h3>
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

            <!--   <th colspan="<?=$count-2?>" ></th> -->

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
                  echo '<th width="30%" colspan='.count($d2).'><b>Factors</b></th>';
                 ?> 
                  
                 
           </tr>

           <tr>  
                 <?php foreach ($d1 as $key => $d) {
                  echo '<th width="30%"></th>';
                 } 
                  foreach ($d2 as $key => $d) {
                  echo '<th width="30%">'.$d.'</th>';
                 } 
                  
                 ?> 
                  
                 
           </tr>
<?php

$query = "SELECT tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd,tbl_huf.huf_tddd,tbl_death_audit.* FROM tbl_death_audit
LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id = ?";
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
  
  $sub_array[$index]['disctime'] = $row["huf_dddd"]." ".$row["huf_tddd"];
  $sub_array[$index]['huf_ddd'] = $row["huf_ddd"];
  
  $sub_array[$index]['condition_at_admsion'] = $row['condition_at_admsion'];
$sub_array[$index]['primary_diagn'] =  $row['primary_diagn'];
$sub_array[$index]['cause_of_death'] =  $row['cause_of_death'];
$sub_array[$index]['date_death_time_death'] =  $row['date_death']." ".$row['time_death'];
$sub_array[$index]['expected_un_death'] =  $row['expected_un_death'];
$sub_array[$index]['apache_score'] =  $row['apache_score'];
$sub_array[$index]['sofa_score'] =  $row['sofa_score'];
$sub_array[$index]['vent_status'] =  $row['vent_status'];
$sub_array[$index]['surg_prodr'] =  $row['surg_prodr'];
$sub_array[$index]['any_event'] =  $row['any_event'];
$sub_array[$index]['cons_incharge'] =  $row['cons_incharge'];
$sub_array[$index]['other_con_involve'] =  $row['other_con_involve'];
$sub_array[$index]['comorbid_condtin'] =  $row['comorbid_condtin'];
$sub_array[$index]['relavant_lab_invt'] =  $row['relavant_lab_invt'];
$sub_array[$index]['relavant_radio_invt'] =  $row['relavant_radio_invt'];
$sub_array[$index]['cpr_status'] =  $row['cpr_status'];
$sub_array[$index]['condition_of_stay_mangnmt'] =  $row['condition_of_stay_mangnmt'];

$sub_array[$index]['team_work'] =  $row['team_work'];
$sub_array[$index]['technq_mang_care'] =  $row['technq_mang_care'];
$sub_array[$index]['med_error'] =  $row['med_error'];
$sub_array[$index]['decisn_making'] =  $row['decisn_making'];
$sub_array[$index]['staff_skill_comp'] =  $row[ 'staff_skill_comp'];
$sub_array[$index]['comm_error'] =  $row['comm_error'];
$sub_array[$index]['eco_fact_patient'] =  $row[ 'eco_fact_patient'];




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

 
  $name = 'death_audit'.time().'.xls';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$name);
  echo $output;

?>
