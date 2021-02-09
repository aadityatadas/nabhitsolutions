<?php
   include"../dbinfo.php";
   
   $tbl = $_POST['tbl'];
   $output = array();

   $dm = $_POST['user_id'];
   $statement = $connection->prepare(
   "SELECT * FROM $tbl 
   WHERE audit_date = '".$dm."'"
   );
   $statement->execute();
   $result = $statement->fetchAll(PDO::FETCH_ASSOC);
   //count($result);
  // print_r($result[62]['pos_id']);
  //  die();
   
   $date = explode('-', $dm);
      

     

       $data[0]=array('label'=>'' ,'alpha'=>'A', 'result'=>array('The organization has comprehensive policy for the disposal of waste',
'There is a dedicated compound for the safe storage of clinical waste, which is under cover from the elements and free from pests and vermin',
'The compound including waste containers are locked and inaccessible to the public',
'The compound has appropriate sign in the area',
'The waste storage area is clean and tidy',
'Clinical waste sacks are labeled and secured',
'There is no storage of waste in corridors or in other inappropriate areas inside/outside the facility whilst waste is awaiting collection',
'Hazardous and offensive waste is segregated from other waste for transportation',
'All plastic waste sacks are fully enclosed within bins to minimize the risk of exposure',
'There is no storage of inappropriate items in the waste compound',
'There is no emptying of clinical waste from one bag to another',
'Spill kit and heavy duty gloves or alternative are readily available',
'Clinical waste posters and/or a waste policy identifying waste segregation are available in all areas',
'HCW are aware of waste segregation procedures - Medical staff',
'HCW are aware of waste segregation procedures - Allied Health care professional',
'HCW are aware of waste segregation procedures - Nursing staff',
'HCW are aware of waste segregation procedures - Ancillary staff',
'BMW storage area is clearly labeled',
'The area is clean and tidy',
'Waste storage area/bins are kept locked or closed',
'There are color coded bags for categories of wastes',
'Wastes are segregated as per category into respective receptacles',
'All bags are tied, labeled with department name, date, and biohazard label and also secured before leaving the place of generation',
'Central waste collection area',
'Departmental waste handling and disposal',
'Page 1',
'HH2',
'Disposable wates such as gloves, caps, mask, IV sets, syringe, suction catheters are mutialed prior to disposal',
'Biological agents are made safe by autoclaving before leaving the laboratory for final disposal',
'Wast bags are removed at least daily',
'There is no transfer of clinical waste from one bag to another',
'There are no overfilled bags. Bags are no more than 3/4th full',
'Waste bags are not tied onto containers / trolleys',
'Sharp boxes are safely stored',
'There are no inappropriate items in the household or recycling bins',
'Spill kit and heavy duty gloves or alternative are readily available if mercury based devices are used.',
'There is no storage of wast in corridors',
'There is a system for transporting the waste through the hospital (i.e. which avoids manual handling of waste)',
'All waste containers used for transport are clean and in a good state of repair',
'There are provisions for disposal of difference type of sharps',
'Sharp bin labeled with departmetn name, date, and biohazard label',
'NaOCI in sharps container, wheter freshly prepared',
'Once 3/4th full the bin aperture is locked Sealed and locked bins are stored in a locked room, cupboard or container, away from public access',
'An empty sharp bin / hub cutter is available on the cardiac arrest trolley',
'Are the needles used on patient are recapped',
'To find out situations in which recapping is still carried out E.g ABG collection'));
       






     
   
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
               <th colspan="6" align="center" >Bio-Medical Waste Management Checklist</th>
               
            </tr>
            <tr>
               <th colspan="6"></th>
               
            </tr>
             <tr>
               <th colspan="2"></th>
                <th colspan="2">Audit Date</th>
                 <th colspan="2"><?php echo $date[2]."-".$date[1]."-".$date[0] ;?></th>
               
            </tr>

            </thead>
        
           
             <?php 
              
               $k=0;
               $ye = 0;
               $no = 0;
               $na = 0;
               foreach ($data as $value) {  ?>


            <thead>
            <tr style="background-color: #001c8047;">
               <th>sr.no/<?=$value['alpha']?></th>
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
      <br>

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