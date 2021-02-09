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

  $d1=array('Sr.No', 'Name of the patient', 'UHID','IPD' , 'DATE OF DISCHARGE', 'Type of admission Emg/ Non EMG','KNOWN CASE/NEWLY DETECTED','SENT ON ','Informed by RMo to consultant  about raised BG','Monitoring done by trained nurse','Technique of BG Monitoring','Frequency of BG Monitoring','Calibration of glucometer','Diet Plan we properly charted','Patient education was given on importance of controlling BG','FBS/RBS ON DISCHARGE','done by');


  $count = count($d1);
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
              <th colspan="<?=$count?>" >
               
                <h1 style="text-align: center; text-decoration: underline;"><?=HOSPITAL_NAME?></h1> 
                 <h3 style="text-align: center; text-decoration: underline;">Clinical Audit </h3>
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
                  
                 ?> 
                  
                 
           </tr>

          
<?php

$query = "SELECT tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd,tbl_huf.huf_tddd,tbl_clinical_audit.* FROM tbl_clinical_audit
LEFT JOIN tbl_huf On tbl_clinical_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id = ?";
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
  
  $sub_array[$index]['case_details'] = $row['case_details'];
$sub_array[$index]['sent_on'] =  $row['sent_on'];
$sub_array[$index]['consulatnt'] =  $row['consulatnt'];
$sub_array[$index]['monitoring'] =  $row['monitoring'];
$sub_array[$index]['technique'] =  $row['technique'];
$sub_array[$index]['frequency'] =  $row['frequency'];
$sub_array[$index]['calibration'] =  $row['calibration'];
$sub_array[$index]['diet_plan'] =  $row['diet_plan'];
$sub_array[$index]['education'] =  $row['education'];
$sub_array[$index]['fbs_rbs'] =  $row['fbs_rbs'];





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

 
  $name = 'clinical_audit'.time().'.xls';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$name);
  echo $output;

?>
