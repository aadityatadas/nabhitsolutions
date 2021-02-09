
<?php  

//index.php
include("../dbinfo.php");

  $dArry1[1] = array(0=>'The organization has comprehensive policy for the disposalof waste');
   
   $dArry2[2] = array(0=>'There is a dedicated compound for the safe storage of clinical waste, which is under cover from the elements and free from pests and vermin');
   $dArry2[3] = array(0=>'The compound including waste containers are locked and inaccessible to the public');
   $dArry2[4] = array(0=>'The compound has appropriate sign in the area');
   $dArry2[5] = array(0=>'The waste storage area is clean and tidy');
   $dArry2[6] = array(0=>'Clinical waste sacks are labeled and secured');
   $dArry2[7] = array(0=>'There is no storage of waste in corridors or in other inappropriate areas inside/outside the facility whilst waste is awaiting collection');
   $dArry2[8] = array(0=>'Hazardous and offensive waste is segregated from other waste for transportation');
   $dArry2[9] = array(0=>'All plastic waste sacks are fully enclosed within bins to minimize the risk of exposure');
   $dArry2[10] = array(0=>'There is no storage of inappropriate items in the waste compound');
   $dArry2[11] = array(0=>'There is no emptying of clinical waste from one bag to another');
   $dArry2[12] = array(0=>'Spill kit and heavy duty gloves or alternative are readily available');
   
   $dArry3[13] = array(0=>'Clinical waste posters and/or a waste policy identifying waste segregation are available in all areas');
   $dArry3[14] = array(0=>'HCW are aware of waste segregation procedures - Medical staff');
   $dArry3[15] = array(0=>'HCW are aware of waste segregation procedures - Allied Health care professional');
   $dArry3[16] = array(0=>'HCW are aware of waste segregation procedures - Nursing staff');
   $dArry3[17] = array(0=>'HCW are aware of waste segregation procedures - Ancillary staff');
   $dArry3[18] = array(0=>'BMW storage area is clearly labeled');
   $dArry3[19] = array(0=>'The area is clean and tidy');
   $dArry3[20] = array(0=>'Waste storage area/bins are kept locked or closed');
   $dArry3[21] = array(0=>'There are color coded bags for categories of wastes');
   $dArry3[22] = array(0=>'Wastes are segregated as per category into respective receptacles');
   $dArry3[23] = array(0=>'All bags are tied, labeled with department name, date, and biohazard label and also secured before leaving the place of generation');
   $dArry3[24] = array(0=>'Disposable wates such as gloves, caps, mask, IV sets, syringe, suction catheters are mutialed prior to disposal');
   $dArry3[25] = array(0=>'Biological agents are made safe by autoclaving before leaving the laboratory for final disposal');
   $dArry3[26] = array(0=>'Wast bags are removed at least daily');
   $dArry3[27] = array(0=>'There is no transfer of clinical waste from one bag to another');
   $dArry3[28] = array(0=>'There are no overfilled bags. Bags are no more than 3/4th full');
   $dArry3[29] = array(0=>'Waste bags  are not tied onto containers / trolleys');
   $dArry3[30] = array(0=>'Sharp boxes are safely stored');
   $dArry3[31] = array(0=>'There are no inappropriate items in the household or recycling bins');
   $dArry3[32] = array(0=>'Spill kit and heavy duty gloves or alternative are readily available if mercury based devices are used.');
   $dArry3[33] = array(0=>'There is no storage of wast in corridors');
   $dArry3[34] = array(0=>'There is a system for transporting the waste through the hospital (i.e. which avoids manual handling of waste)');
   $dArry3[35] = array(0=>'All waste containers used for transport are clean and in a good state of repair');
   
   $dArry4[36] = array(0=>'There are provisions for disposal of difference type of sharps');
   $dArry4[37] = array(0=>'Sharp bin labeled with departmetn name, date, and biohazard label');
   $dArry4[38] = array(0=>'NaOCI in sharps container, wheter freshly prepared');
   $dArry4[39] = array(0=>'Once 3/4th full the bin aperture is locked');
   $dArry4[40] = array(0=>'Sealed and locked bins are stored in a locked room, cupboard or container, away from public access');
   $dArry4[41] = array(0=>'An empty sharp bin / hub cutter is available on the cardiac arrest trolley');
   $dArry4[42] = array(0=>'Are the needles used on patient are recapped');



if(isset($_POST['quater']) &&  $_POST['quater'] != ''){


$quater_id = $_POST['quater'];
$yr = $_POST['yr'];
$tblname = $_POST['tblname'];
//$audit_name = $_POST['audit_name'];
$output = array();

  $statement = $connection->prepare(
    "SELECT * FROM $tblname 
    WHERE quarter = '".$quater_id."' and month_id ='".$yr."'"
  );
  $statement->execute();
  $result = $statement->fetchAll();
  




} else{
  echo "Error In Quater Selection Selection";

  die();
}

?>


<!DOCTYPE html>  
<html>  
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
        <title>NabhBuddy Audit Report</title>
  <script src="jqury.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="custom.css">

  <style>

</style>
  <link rel="stylesheet" href="bootstrap.min.css">
        <script type="text/javascript" src="loader.js"></script>  
       
        
    </head>  
    <body>  
       
   

        <div class="container" id="testing"> 

          
            
   <div class="panel panel-default">
    <div class="panel-heading">
    
    </div>

    <!-- <h1 align="center"><u><?=$audit_name?></u></h1>   -->
           
    <div class="panel-body" align="center" style="padding-top: 0px!important">

    
      <img src="hosp.png"  width="400" height="350" style="margin-top: 50px;margin-left: 50px;margin-right: 50px">
      
     

  <!-- <table style="width:100%">
  <tr>
    <th align="left">
      Audit Done By:<br>           Mrs. Shilpi Guryani  <br>        Pharmacist</th>
    <th></th> 
     <th></th> 
    <th align="right">
      Audit Reviewed By:<br> Dr. Deepak Jeswani<br>Medical Director</th>
  </tr>
  
</table> -->


</div>
</div>
    
<p style="page-break-before: always"></p>
 <h2 align="center"><u>Bio-Medical Waste Management</u></h2>  



 <div class="col-lg-12" id="tableWrap">
   <div class="col-lg-12">
      <table class="table table-bordered" border="1">
         <thead>

             
             <tr>
              <th colspan='6'>Bio-Medical Waste Management</th>
             
             </tr>
             <tr>
                 <th colspan='6'></th>
                 </tr>
            <tr>
               <th>sr.no</th>
               <th width="30%"><strong>Bio-Medical Waste Management</strong></th>
               <th>Yes</th>
               <th>No</th>
               <th>NA</th>
               <th>Comment</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               $n = 1;
               $k = 1;
               $ye = 0;
               $no = 0;
               $na = 0;
               foreach ($dArry1 as $value) {  ?>
            <tr>
               <td><?= $k ?></td>
               <td><?=$value[0]?></td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'Yes')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $ye++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'No')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $no++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'NA')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $na++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <?=  $result[$n - 1]['cmmnt']; ?>
               </td>
            </tr>
            <?php  $k++; $n++; } ?>
            <tr>
               <th colspan="6"><strong>Central waste collection area</strong></th>
            </tr>
            <?php
               $k = 1;
               foreach ($dArry2 as $value) {  ?>
            <tr>
               <td><?= $k ?></td>
               <td><?=$value[0]?></td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'Yes')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $ye++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'No')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $no++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'NA')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $na++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <?=  $result[$n - 1]['cmmnt']; ?>
               </td>
            </tr>
            <?php  $k++; $n++; } ?>
            <tr>
               <th colspan="6"><strong>Departmental waste handling and disposal</strong>
               </th>
            </tr>
            <?php
               $k = 1;
               foreach ($dArry3 as $value) {  ?>
            <tr>
               <td><?= $k ?></td>
               <td><?=$value[0]?></td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'Yes')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $ye++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'No')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $no++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'NA')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $na++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <?=  $result[$n - 1]['cmmnt']; ?>
               </td>
            </tr>
            <?php $k++; $n++; } ?>
            <tr>
               <th colspan="6"><strong>All sharps bin</strong></th>
            </tr>
            <?php
               $k = 1;
               foreach ($dArry4 as $value) {  ?>
            <tr>
               <td><?= $k ?></td>
               <td><?=$value[0]?></td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'Yes')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $ye++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'No')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $no++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <label class="radio-inline">
                  <?php
                     if($result[$n - 1]['yn_val'] == 'NA')
                     {
                      echo $result[$n - 1]['yn_val'];
                      $na++;
                     }
                     ?>
                  </label>
               </td>
               <td>
                  <?=  $result[$n - 1]['cmmnt']; ?>
               </td>
            </tr>
            <?php  $k++; $n++; } ?>
            <tr>
              <td colspan="2" style="text-align: center;">Total</td>
              <td><?= $ye ?></td>
              <td><?= $no ?></td>
              <td><?= $na ?></td>
              <td></td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
           
    


  

<p style="page-break-before: always"></p>


           

             <div id="hic_chart" style="width: 100%; max-width:730px; height: 300px; "></div>
            <br>

          

          
</div>

<div align="center">
   <form method="post" id="make_pdf" action="create_pdf.php">
    <input type="hidden" name="hidden_html" id="hidden_html" />
    <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Create PDF</button>
   </form>
  </div>
  <br />
  <br />
  <br />

    </body>  
</html>

<script>
$(document).ready(function(){
 $('#create_pdf').click(function(){
  $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });
});
</script>

 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
  
      function drawChart() {

       var jsonData = $.ajax({
        url: 'chart.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{qut:'<?=$quater_id?>',tbl:'<?=$tblname?>',yrg:'<?=$yr?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'Bio-Medical Waste Management Audit',
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: false,
              bar: {groupWidth: "40%"},
          chartArea:{'backgroundColor': {
                  'fill': '#F4F4F4',
                  'opacity': 100
                 } },
          backgroundColor: 'transparent',
          hAxis: {
                  title: '%',
                  textStyle: {
                     color: '#01579b',
                     
                  },
                  
                  minValue: 0, maxValue: 100
               },

               vAxis: {
                  title: '%',
                  textStyle: {
                     color: '#1a237e',
                     fontSize: 15,
                     bold: true
                  },
                  colors: ['green','#ffff99'],
                  legend: { position: 'top' },
                  minValue: 0, maxValue: 100
                  
               }, 
              
        };
            
            var data1 = new google.visualization.arrayToDataTable(jsonData); 

            

          var chart_area = document.getElementById('hic_chart');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        
   
}
        </script>  