<?php
   include"../dbinfo.php";
   
   $tbl = $_POST['tbl'];
   $output = array();

   $dm = explode('-', $_POST['user_id']);
   $statement = $connection->prepare(
   "SELECT * FROM $tbl 
   WHERE audit_month = '".$dm[0]."' AND audit_year = '".$dm[1]."'"
   );
   $statement->execute();
   $result = $statement->fetchAll(PDO::FETCH_ASSOC);
   //count($result);
  // print_r($result[62]['pos_id']);
  //  die();
   
   
      $data[0]=array('label'=>'FIRE AND SECURITY ' , 'result'=>array('Are Fire exits and fire equipment free from obstruction?',  'Properly signposted?', 'In good working condition?', 'Are staff aware of the security procedures in the workplace?',   'Is Emergency  exit signage is clearly visible',   'Staff are aware of fire safety procedures and know the emergency personnel', 'Staff are inducted in fire safety and Disaster management',   'Extinguisher of appropriate type is close by; i.e., within 20 m',   'Extinguisher is checked once in Three months?',   'Extinguisher is mounted within 1.7m from the floor', 'Fire Alarm can be heard in the area', 'Staff aware about Non fire emergencies', 'Staff aware about evacuation plan during fire and non fire emergencies'
   ));

      $data[1]=array('label'=>'WORK AREAS AND PHYSICAL HAZARDS ' , 'result'=>array('Slippery or unsafe floor/corridors? ',  'Is the lighting adequate for the work required?', 'Is protective equipment available and used ',  'For exposure to dust and fumes?',  'In high noise areas?', 'For exposure to extremes of temperature?',  'For protection from blood or body fluids',  'Are ALL safety signs displayed appropriately? e.g. universal precautions  or  fire',  'Adequate personnel available to handle '       

   ));

       $data[2]=array('label'=>'ELECTRICAL HAZARDS' , 'result'=>array('Are cords/plugs safe, not frayed or broken?', 'Do any cords present a tripping hazard by running across floors?',  'Has defective electrical equipment been not in use ?',  'Are all hand-operated electric tools/equipment used with a Residual Current Device? ',   'Backup available in case of electricity failure'));
      $data[3]=array('label'=>'CHEMICAL, DRUG AND SUBSTANCE HAZARDS' , 'result'=>array('Are all chemical containers clearly labelled?',   'Are Material Safety Data Sheets available at the point of use of the chemical?',   'Are dangerous or harmful substances stored appropriately ',   'Is the necessary protective equipment available and used?',   'Are emergency spill kits available and procedures displayed?',   'Is oxygen stored securely and safety signs displayed?', 'Staff are aware of procedures relating to Hazardous materials?', 'Staff trained in chemical handling and are aware of chemical hazards Current chemical MSDS available?', 'Spill kits are available and regularly maintained?', 'Gas cylinders are stored properly and appropriately labelled ',  'Written procedures for chemical handling, storage and spillage in place?'));
      $data[4]=array('label'=>'EQUIPMENT AND MANUAL HANDLING' , 'result'=>array('Are all equipment, tools, and furniture in good repair and labelled with equipment ID',  'Have broken items been tagged and removed from use?',   'Are special precautions clearly displayed for using dangerous equipment?',   'Is all appropriate guarding in place and operational',  'Are safety signs displayed regarding the use of equipment?',  'Are heavy items or frequently used items stored properly - between hip and shoulder height ',  'Are lifting aids available, in good repair, and stored properly in Back Care Stations?', 'There is proper documented operational and maintenance plan for the equipments. ', 'Copy of proper license/registration certificates available (indicate deficiency)', 'Proper maintenance  and inspection done for all equipments and PM and calibration stickers are pasted'));
      $data[5]=array('label'=>'BIOLOGICAL HAZARDS AND WASTE' , 'result'=>array('Are known infection risks identified and proper notices in place?',
'Is protective equipment available and used?  i.e. gloves, mask, goggles, gown etc',
'Are there sufficient number of waste collection bins containers available?',
'Are the sharps containers overfilled?',
'Is waste segregated properly?',
'Potable water available round the clock',
'Regular waste disposal is done to minimise waste on site',
'Records of waste are kept',
'Transport of Biomedical waste across the hospital done properly?',
'Are all the staff aware of the biomedical waste practices?'));
      
      $data[6]=array('label'=>'OTHER FINDINGS/HAZARDS IF ANY? (Please include)' , 'result'=>array('Staff trained on fire safety and Fire license safety  available for the Hospital', 'Lift maintenance records and license available for all lifts',   'DG maintenance records and license available', 'Electrical safety inspection by EB done and records available ', 'Water quality check done and records available including records for water tank cleaning.'));
      






     
   
   ?>
<div class="col-lg-12" id="tableWrap">
   <div class="col-lg-12">
      <table class="table table-bordered" border="1">


         <thead>
            <tr> 
           
           <th colspan="4">
             <img src="<?=HOSPITAL_NAME_IMAGE?>"  alt="" width="200" height="150" >
           </th>

           <th colspan="2">  
           </th>

             
         </tr>
            <tr>
              <th colspan="6" >
               
                <h1 style="text-align: center; text-decoration: underline;"><?=HOSPITAL_NAME?></h1> 
                 
              </th>
                    
            </tr>
            <tr>
               <th colspan="6" align="center" >FACILITY INSPECTION AUDIT</th>
               
            </tr>
            <tr>
               <th colspan="6"></th>
               
            </tr>
             <tr>
               <th colspan="2"></th>
                <th colspan="2"><?=$dm[0]?></th>
                 <th colspan="2"><?=$dm[1]?></th>
               
            </tr>

            </thead>
        
           
             <?php 
              
               $k=0;
               $ye = 0;
               $no = 0;
               $na = 0;
               foreach ($data as $value) {  ?>


            <thead>
            <tr>
               <th>sr.no</th>
               <th width="30%"><strong><?=$value['label']?></strong></th>
               <th>Yes</th>
               <th>No</th>
               <th>NA</th>
               <th>Comment</th>
            </tr>

            </thead>
         
         
            

            <tbody>
            <?php  $sr=1; foreach ($value['result'] as $d) {  

              
               ?> 

            <tr>
               <td><?= $sr++; ?></td>
               <td><?=$d?></td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$k]['yn_val'] == 'Yes')
                     {
                      echo $result[$k]['yn_val'];
                      $ye++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$k]['yn_val'] == 'No')
                     {
                      echo $result[$k]['yn_val'];
                      $no++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$k]['yn_val'] == 'Na')
                     {
                      echo $result[$k]['yn_val'];
                      $na++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <?=  $result[$k]['cmmnt']; ?>
               </td>
            </tr>
            <?php $k++; } ?>


            <tr><td colspan="6"></td></tr>
             <tbody> 

               <?php   } ?>
            <tr>
              <td colspan="2" style="text-align: center;">Total</td>
              <td><?= $ye ?></td>
              <td><?= $no ?></td>
              <td><?= $na ?></td>
              <td></td>
            </tr>
         
      </table>


      <table class="table table-bordered" border="1">


<tr><th colspan="6"><h4 align="left"><u>1)Corrective Action</u></h4></th></tr>
      
 
  <?php 
$output=[];
$c=0;
    $query = "SELECT corrective_action  FROM `tbl_monthly_audit_reports`
          
            WHERE audit_date_month_year = '".$_POST['user_id']."' 
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
          
            WHERE audit_date_month_year = '".$_POST['user_id']."' 
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