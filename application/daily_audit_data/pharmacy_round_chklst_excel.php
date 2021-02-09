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
      

     

    $dArry[1] = array(0=>'Physical appearance of shop',1=>'physcl_app_shop');
$dArry[2] = array(0=>'Storage',1=>'storage');
$dArry[3] = array(0=>'Cleanliness',1=>'cleanliness');
$dArry[4] = array(0=>'Temperature Maintenance Fridge &amp; External (DISPLAY)',1=>'temp_frdg_extrnl');
$dArry[5] = array(0=>'Stock outs (NOT AVAILABLE)',1=>'stock_out');
$dArry[6] = array(0=>'Inventory Control',1=>'inv_control');
$dArry[7] = array(0=>'Medicine Dispensed without prescription (YES/No)',1=>'medicine_presc');
$dArry[8] = array(0=>'Emergency Medicine stock (safety stock)',1=>'emere_med_stock');
$dArry[9] = array(0=>'LASA storage',1=>'lasa_storage');
$dArry[10] = array(0=>'Expiry if any found (Checked/Not checked)',1=>'expr_if');




     
   
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
               <th colspan="5" align="center" >Pharmacy round format (Pharmacist)</th>
               
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
               <th colspan="3"></th>
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