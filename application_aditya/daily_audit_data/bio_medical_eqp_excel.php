<?php
   include"../dbinfo.php";
   //bio_medical_eqp_excel.php
   $tbl = $_POST['tbl'];
   $output = array();

   $tid=$_POST['tid'];

   $dm = $_POST['user_id'];
   $statement = $connection->prepare(
   "SELECT * FROM $tbl 
   WHERE $tid = '".$dm."'"
   );
   $statement->execute();
   $result = $statement->fetchAll(PDO::FETCH_ASSOC);
   $result = $result[0];
   //count($result);
   
   
   $date = explode('-', $result['date1']);
      

     

    $dArry[0]= array('List of updated bimedical equipment shall be there with Equipment Identification tag. (EIT)','list_upted_tag_yn','list_upted_tag_loc','list_upted_tag_rmrk');
$dArry[1]= array('Critical Biomedical equipment shall be CE certified. Under maintenance of valid service agency. AMC /CMC shall be available if not under warranty.','critical_bio_equmnt_yn','critical_bio_equmnt_loc','critical_bio_equmnt_rmrk');
$dArry[2]= array('Preventive maintenance shall be planned (PMS schedule). With proper PMS reports.','prvintv_maintce_reports_yn','prvintv_maintce_reports_loc','prvintv_maintce_reports_rmrk');
$dArry[3]= array('Calibration shall be done as per schedule with proper calibration reports. Calibration tags shall be displayed on machine.','calibratn_reports_yn','calibratn_reports_loc','calibratn_reports_rmrk');
$dArry[4]= array('Breakdown shall be recorded in complaint book and down time shall be recored. It shall be as minimum as possible for critical equipements.','breakdown_equpment_yn','breakdown_equpment_loc','breakdown_equpment_rmrk');
$dArry[5]= array(' Dos and don’t shall be displayed on equipement with proper sop to use including safety precaution.','dos_dont_precution_yn','dos_dont_precution_loc','dos_dont_precution_rmrk');
$dArry[6]= array('7. Emergency alarm system shall be available whenever necessary for immediate alertness. (Ventilator alarms/anesthetia machine alarm etc. It shall be properly checked before every use. ','emrgncy_alarm_yn','emrgncy_alarm_loc','emrgncy_alarm_rmrk');
$dArry[7]= array('8. Internal and external quality assurance of the machine specially dignostic machines shall be carried out with proper reports.','intrnl_extrnl_repots_yn','intrnl_extrnl_repots_loc','intrnl_extrnl_repots_rmrk');
$dArry[8]= array(' All wires and cables shall be properly insulated to avoid any shocks to patient. Machine shall be checked daily by tester before patient use.','all_wires_use_yn','all_wires_use_loc','all_wires_use_rmrk');
$dArry[9]= array('Qualified biomedical enginner shall mainatain the equipement with daily safety checks.','qualified_biomedcl_checks_yn','qualified_biomedcl_checks_loc','qualified_biomedcl_checks_rmrk');




     
   
   ?>
<div class="col-lg-12" id="tableWrap">
   <div class="col-lg-12">
      <table class="table table-bordered" border="1">


         <thead>
           <tr> 
           
           <th colspan="6">
             <img src="<?=HOSPITAL_NAME_IMAGE?>"  alt="" width="200" height="150" >
           </th>

           <th colspan="1">  
           </th>

             
         </tr>
            <tr>
              <th colspan="7" >
               
                <h1 style="text-align: center; text-decoration: underline;"><?=HOSPITAL_NAME?></h1> 
                 
              </th>

                    
            </tr>
            <tr>
               <th colspan="6" align="center" >Bio-Medical Equipment Safety checklist</th>
                <th colspan="1"></th>
               
            </tr>
            
             <tr>
               <th colspan="1"></th>
                <th colspan="2">Audit Date</th>
                 <th colspan="4"><?php echo $date[2]."-".$date[1]."-".$date[0] ;?></th>
               
            </tr>

            </thead>
        
           
             <?php 
              
               $k=0;
               $ye = 0;
               $no = 0;
               $na = 0;
                 ?>


            <thead>
            <tr style="background-color: #001c8047;">
               <th>sr.no</th>
               <th width="30%"><strong>Name</strong></th>
               <th colspan="3"></th>
               <th colspan="1">Location</th>
               <th colspan="1">Remark</th>
               </tr>

            </thead>

               <?php $sr=1; foreach ($dArry as $value) { 
                  echo'<tr>';
                  echo '<td>'.$sr++.'</td>';
                  echo '<td>'. $value[0].'</td>';
                  switch ($result[$value[1]]) {
                     case 'Yes':
                         echo '<td>Yes</td><td></td><td></td>';
                         $ye++;
              
                        break;

                     case 'No':
                        echo '<td></td><td>No</td><td></td>';
                         $no++;
              
                        break;

                     case 'N/A':
                        echo '<td></td><td></td><td>NA</td>';
                         $na++;
                        break;
                     
                     default:
                       echo '<td></td><td></td><td></td>';
                        break;
                  }
                  echo '<td>'. $result[$value[2]].'</td>';
                  echo '<td>'. $result[$value[3]].'</td>';

                   echo'</tr>';
                  

             } 

             ?>
         
         
            

           

               
            <tr>
              <td colspan="2" style="text-align: center;">Total</td>
              <td><?= $ye ?></td>
              <td><?= $no ?></td>
              <td><?= $na ?></td>
              <td colspan="2"></td>
              
            </tr>

            <tr>
               <td colspan="7" style="text-align: center;"></td>
              
            </tr>

           
            <tr>
               <td  style="text-align: center;">Done By</td>
                <td colspan="6" style="text-align: center;"><?=$result['name']?></td>
               
            </tr>
         
      </table>

      <table class="table table-bordered" border="1">


<tr><th colspan="6"><h4 align="left"><u>1)Corrective Action</u></h4></th></tr>
      
 
  <?php 
$output=[];
$c=0;
    $query = "SELECT corrective_action  FROM `tbl_monthly_audit_reports`
          
            WHERE audit_date_month_year = '".$dm."' 
        AND audit_name='".$tbl."'";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output = json_decode($row["corrective_action"]);
         
  }
foreach ($output as $key1 => $out) {
  if($key1!=100){
  
 
  echo '<tr><td colspan="6">'.++$c.')'.$out.'</td></tr>';
}
}
?>
    
 
  </table>
  

  <table class="table table-bordered" border="1">

<tr>
<th colspan="6"><h4 align="left"><u>2)Preventive Action</u></h4></th>
 </tr>    

  
 
  <?php 
$output=[];
$c=0;
    $query = "SELECT preventive_action  FROM `tbl_monthly_audit_reports`
          
            WHERE audit_date_month_year = '".$dm."' 
        AND audit_name='".$tbl."'";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output = json_decode($row["preventive_action"]);
         
  }
foreach ($output as $key1 => $out) {
  if($key1!=100){
  
 
   echo '<tr><td colspan="6">'.++$c.')'.$out.'</td></tr>';
}
}
?>
</table>
   </div>
</div>