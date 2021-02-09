<?php
   include"../dbinfo.php";
   
   $tbl = $_POST['tbl'];
   $output = array();

   $dm = $_POST['user_id'];
   $statement = $connection->prepare(
   "SELECT * FROM $tbl 
   WHERE id = '".$dm."'"
   );
   $statement->execute();
   $result = $statement->fetchAll(PDO::FETCH_ASSOC);
   $result = $result[0];
   //count($result);
   
   
   $date = explode('-', $result['audit_date']);
      

     

       $dArry[1] = array(0=>'Cleanliness and disinfection prope with charts',1=>'clealiness');
$dArry[2] = array(0=>'Emergency Medicine Stock',1=>'em_stock');
$dArry[3] = array(0=>'All Equipments are working',1=>'eqp_work');
$dArry[4] = array(0=>'BMW is seperated as per standards',1=>'bmw_sep');
$dArry[5] = array(0=>'Prefilled Injections labeled ',1=>'pre_labeled');
$dArry[6] = array(0=>'Side rails putted where necessary ',1=>'side_rails');
$dArry[7] = array(0=>'Bedpans are clean and available where necessary ',1=>'bedpans');
$dArry[8] = array(0=>'Doctors and Nurses are in proper Uniform with ID Card',1=>'doc_nur_uni_id');
$dArry[9] = array(0=>'Patient toilets are Clean',1=>'patnt_toilet');
$dArry[10] = array(0=>'Patient are with ID Bands',1=>'patnt_id_brand');
$dArry[11] = array(0=>'Medical Records are kept secure',1=>'medical_record');
$dArry[12] = array(0=>'LASA Drugs are seperated and Emergency Drud checklist checked and stock proper',1=>'lasa_drugs');
$dArry[13] = array(0=>'High risk drugs are kept in lock and Key',1=>'high_risk_drug');
$dArry[14] = array(0=>'Temperature and humidity is recorded if needed (Refrigerator)',1=>'temp_humd');
$dArry[15] = array(0=>'Vulnerable patient are identified and given care',1=>'vulnerable');
$dArry[16] = array(0=>'Linen are sorted Properly with disinfection',1=>'line_disc');
$dArry[17] = array(0=>'Articles and Instuments are sterile before use',1=>'article_instrumnt');
$dArry[18] = array(0=>'Incident reported if any Like Throboplebitis/Bed sores/HAI/Patient sall-Injury/Hematoma/Medication Error',1=>'incident_error');
$dArry[19] = array(0=>'Patients/relatives are known about ights and responsibility',1=>'patien_resp');
$dArry1[20] = array(0=>'Remark',1=>'remark');




     
   
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
              <th colspan="8" >
               
                <h1 style="text-align: center; text-decoration: underline;"><?=HOSPITAL_NAME?></h1> 
                 <h3 style="text-align: center; text-decoration: underline;">Ward Round Daily Checklist (INCHARGE Nurse)Checklist </h3>
              </th>
                    
            </tr>
            
            <tr>
               <th colspan="5"></th>
               
            </tr>
             <tr>
               <th colspan="1"></th>
                <th colspan="2">Audit Date</th>
                 <th colspan="2"><?php echo $date[2]."-".$date[1]."-".$date[0] ;?></th>
               
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
               <th>Yes</th>
               <th>No</th>
               <th>NA</th>
               
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

                     case 'NA':
                        echo '<td></td><td></td><td>NA</td>';
                         $na++;
                        break;
                     
                     default:
                       echo '<td></td><td></td><td></td>';
                        break;
                  }

                   echo'</tr>';
                  

             } 

             ?>
         
         
            

           

               
            <tr>
            	<td colspan="2" style="text-align: center;">Total</td>
            	<td><?= $ye ?></td>
            	<td><?= $no ?></td>
            	<td><?= $na ?></td>
            	
            </tr>

            <tr>
               <td colspan="5" style="text-align: center;"></td>
              
            </tr>

            <tr>
               <td  style="text-align: center;">Remark</td>
                <td colspan="4" style="text-align: center;"><?=$result['remark']?></td>
              
            </tr>
            <tr>
               <td  style="text-align: center;">Done By</td>
                <td colspan="4" style="text-align: center;"><?=$result['name_sign']?></td>
              
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