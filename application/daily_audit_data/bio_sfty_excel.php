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
      

     
$dArry[0]= array('BMW Dust Bins shall be available in all patient care areas with labelled Bio- safet sticker/ and covered','bmw_dus_bins_yn','bmw_dus_bins_loc','bmw_dus_bins_rmrk');

$dArry[1]= array('Puncture Proof container shall be used to discard needles','punctr_prof_contanr_yn','punctr_prof_contanr_loc','punctr_prof_contanr_rmrk');

$dArry[2]= array('Bllod spillage kits shall be available for any spillgage.','bllod_spillgage_yn','bllod_spillgage_loc','bllod_spillgage_rmrk');

$dArry[3]= array('PPE shall be available and used for protection','ppe_prctn_yn','ppe_prctn_loc','ppe_prctn_rmrk');


$dArry[4]= array('Central Biomedical area shall have weighing machine. It shall be restricted/fenced/secured with bio safety signage. Rubber hard gloves and gum boot shall be available.','central_biomtrc_avalbl_yn','central_biomtrc_avalbl_loc','central_biomtrc_avalbl_rmrk');

$dArry[5]= array('Needle prick injury prevention and exposure safety guidelines poster shall be displayed including do not recap guidelines.','needle_prick_gudline_yn','needle_prick_gudline_loc','needle_prick_gudline_rmrk');

$dArry[6]= array('Staff shall be trained on biosafety and universal precautions.','staff_prcution_yn','staff_prcution_loc','staff_prcution_rmrk');

$dArry[7]= array('Staff shall be immunized for hepatitis.','staff_hepatitis_yn','staff_hepatitis_loc','staff_hepatitis_rmrk');






     
   
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
               <th colspan="6" align="center" >Bio Safety Checklist</th>
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