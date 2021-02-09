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
      

     

       $data[0]=array('label'=>'' ,'alpha'=>'A', 'result'=>array('Department ',
' List of updated biomedical equipment shall be there with Equipment Identification tag. (EIT)',
'Preventive maintenance shall be planned (PMS schedule). With proper PMS reports.',
'Calibration shall be done as per schedule with proper calibration reports. Calibration tags shall be displayed on machine.',
'Breakdown shall be recorded in complaint book and down time shall be recored. It shall be as minimum as possible for critical equipements.',
'Dos and don’t shall be displayed on equipement with proper sop to use including safety precaution.',
'All wires and cables shall be properly insulated to avoid any shocks to patient. Machine shall be checked daily by tester before patient use.'
));
       






     
   
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
               <th colspan="6" align="center" >Biomedical Equipment Safety monthly Checklist</th>
               
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