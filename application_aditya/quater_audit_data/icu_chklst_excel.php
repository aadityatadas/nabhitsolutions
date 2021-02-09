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
   
   
      

     

       $data[0]=array('label'=>'Physical Facilities Related Requirements:' ,'alpha'=>'A', 'result'=>array('Sufficient space for carrying out patient care activities with adequate circulation space',
'Facility should be safe from any physical injury chances (non-slippery floor, safe electrical fittings, no accidental spots etc.)',
'Inter-bed distance to be maintained at around 6 feet',
'Hand washing area easily accessible to healthcare staff',
'Accessibility of fire-fighting equipment',
'Crash cart placed at a location from where it could be immediately accessed when required',
'Patient’s washroom should have safety arrangements (anti-skid mats, emergency call button, grab bars, disable friendliness, door opening outside, latch type locking which can be opened from outside)',
'Adequate privacy arrangement for patient (especially applicable in multi-bed ICUs)',
'Availability of all necessary patient care equipment',
'Bio-medical waste bins as per BMW rules',
'Separate or segregated storage area for clean and dirty supplies'));
        $data[1]=array('label'=>'Staffing related requirements' ,'alpha'=>'B', 'result'=>array('Categories of nurses required to be identified',
'Nurse: patient ratio to be defined for the ICU in each shift',
'Duty roster to serve as an evidence of nurse patient ratio',
'Duty doctor should be available round the clock (physical or on call)',
'Other support staff as required'));


         $data[2]=array('label'=>'ICU management related requirements' , 'alpha'=>'C','result'=>array('Linen on patients’ beds to be changed daily (or as defined by hospital’s policy)',
'Periodic cleaning of mattresses, pillow and other bed items',
'Temperature of refrigerator in which medicines are stored should be monitored and recorded, at-least once in each shift ',
'Crash cart should have all life- saving drugs and equipment. It should be replenished whenever used',
'All emergency medicines should be available as per defined quantity',
'Mechanism of replenishing emergency medicines to be followed',
'If medicines are stored in ICUs, look alike, sound alike medicines to be stored separately (or as per hospital’s policy)',
'High risk medicines to be identified and stored separately',
'Multi-use open vials to have labels of date of opening and date of expiry',
'If NDPS are temporarily stored, it should be under lock and key. NDPS regulations to be followed',
'Proper identification of patient before carrying out any patient care activity',
'Reporting of adverse patient events',
'List of hazardous materials in the ICU to be identified and MSDS sheet for them should be available',
'Bio-medical waste should be segregated as per regulation ',
'All areas of ICU’s, including washroom should be maintained neat and tidy',
'Clean supplies and dirty used items should be stored separately  ',
'Maintenance of medical records as per hospital’s policy',
'Security and confidentiality of medical records to be maintained as per hospital’s policy',
'Maintenance of necessary registers (admission-discharge, stock, laundry, adverse incident register etc.)'));
          $data[3]=array('label'=>'Staff awareness related requirements: staff of the ICU (nurses and doctors) should receive training and be aware on a large number of topics. The important ones from accreditation point of view are;' , 'alpha'=>'D','result'=>array('Components and time-frame for initial assessment of admitted patients',
'Uniform care policy and patient care process that falls under it ',
'Patients’ rights',
'Dealing with HIV +ve patients and maintaining confidentiality ',
'Provision of basic cardiac life support',
'Code blue policy and procedure',
'Other emergency codes (such as code blue, code red, code orange etc.)',
'Identification and care of vulnerable patients',
'Care of surgical patient/cardiac (as per ICU speciality)',
'Proper identification of patients',
'Safe medication practices (things to check before administration, monitoring, verbal orders, administering high risk medicines etc.)',
'Safe blood transfusion practices',
'Policy and procedure of patient’s restraint',
'Pain management policy and protocol ',
'Standard precautions for infection control (hand hygiene, use of PPE etc.)',
'Safe injection practices',
'Patient safety incidents, its types and reporting (such as near miss, sentinel, adverse drug reaction etc.)',
'Emergency evacuation plan ',
'Their role during any disastrous situation',
'Basic fire safety measures'));
           $data[4]=array('label'=>'Quality indicators for ICUs: These QIs can be calculated in each ICU and then combined for hospital wide QI' , 'alpha'=>'D','result'=>array('Average time for initial assessment of admitted patient and % outliers ',
'Incidence of medication errors ',
'Percentage of admissions with adverse drug reaction',
'Percentage of patients receiving high risk medicines and developing adverse drug reaction',
'Percentage of transfusion reaction',
'Percentage of near miss events ',
'Incidence of patient falls ',
'Incidence of bed sores after admissions ',
'incidence of patient rights violations',
'Incidence of needle stick injuries',
'Incidence of missing medical records ',
'Incidence of non-compliance observed to infection control practices ',
'Patient satisfaction rate of the ICU (checkout a sample form)',
'Time taken for discharge ',
'Average nurse patient ratio in each shift',
'Percentage of current medical records that are incomplete as per hospital’s policy'));
    






     
   
   ?>
<div class="col-lg-12" id="tableWrap">
   <div class="col-lg-12">
      <table class="table table-bordered" border="1">


         <thead>
            <tr>
               <th colspan="6" align="center" >ICU Checklist AUDIT</th>
               
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
   </div>
</div>