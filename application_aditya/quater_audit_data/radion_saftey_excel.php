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
   
   
      

     

       $data[0]=array('label'=>'Right-to-Know' ,'alpha'=>'A', 'result'=>array('Are appropriate radiation warning signs posted at entrance(s)?',
'Are emergency procedures and phone numbers clearly posted?',
'Are radioactive material and radiation producing devices secured to prevent unauthorized access?',
'Is the “State Regulations for Protection Against Radiation” policy available?',
'Is the “Radiation Safety Manual” available?',
'Do all personnel have documented training of the appropriate type?',
'Are the appropriate personnel supplied with dosimeters?'));
        $data[1]=array('label'=>'Radioisotope Safety' ,'alpha'=>'A', 'result'=>array('Is the work area orderly and free of clutter?',
'Is food, drink, applying cosmetics, etc., prohibited?',
'Is mouth pipetting prohibited?',
'Is personal protective equipment available and worn appropriately?',
'Are hands washed before exiting work area?',
'Are refrigerators, hoods, storage cabinets, and waste receptacles clearly and appropriately labeled?',
'Is waste properly labeled and stored prior to disposal?'));
         $data[2]=array('label'=>'Electrophoresis/Sequencing Devices' ,'alpha'=>'A', 'result'=>array('Are written operating procedures readily available?',
'Is the power supply clearly marked “DANGER – HIGH VOLTAGE?”',
'Is the power “ON” switch readily accessible?',
'Are all electrical contacts guarded against operator contact?',
'Are all power leads insulated and undamaged?',
'Is the AC power cord a grounded type and undamaged?',
'Are unit and power supply located away from sink?',
'Are appropriate personnel trained in CPR?' ));
          $data[3]=array('label'=>'Radiation Producing Devices' ,'alpha'=>'A', 'result'=>array('Is a copy of Registration posted?',
'Are quarterly safety device tests performed and documented in a log?',
'Are annual inspections performed and documented?',
'Is the control panel marked with appropriate warnings?'));
         
        


     
   
   ?>
<div class="col-lg-12" id="tableWrap">
   <div class="col-lg-12">
      <table class="table table-bordered" border="1">


         <thead>
            <tr>
               <th colspan="6" align="center" >Radiation Safety Checklist</th>
               
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
            <tr style="background-color: #001c8047;">
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
   </div>
</div>