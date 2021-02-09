
<?php  

//index.php
include("../dbinfo.php");

 $dArry[1] = array(0=>'A written comprehensive decontamination policy,
approved by the ICC is available to all staff');
  $dArry[2] = array(0=>'Staffs are aware of the need to contact infection control
for advice when purchasing new equipment where IC may have a role to play');
  $dArry[3] = array(0=>"Manfacturer's instructions are available for the
decontamination of newly purchased equipment");
  $dArry[4] = array(0=>'Staff can state the procedure for decontamination of
  commonly used patient care equipment e.g. commodes, mattresses, IV stands');
  $dArry[5] = array(0=>'Staff can describe the symbol used to indicate single use
  items');
  $dArry[6] = array(0=>'Staff are aware of the needs for decontamination');
  $dArry[7] = array(0=>'Local decontamination of reusable surgical instruments
  is not undertaken in clinical areas');
  $dArry[8] = array(0=>'Used instruments are safely stored in an appropriate
  container prior to collection for decontamination in CSSD.');
  $dArry[9] = array(0=>'There is a cleaning protocol for dedicated patient
  equipments e.g. Bed frame, IV stands , commodes');
  $dArry[10] = array(0=>'The following general equipment is visibly clean, check:');
  $dArry[11] = array(0=>'IV stands');
  $dArry[12] = array(0=>'IV pumps/ syringe drivers');
  $dArry[13] = array(0=>'Cardiac monitors');
  $dArry[14] = array(0=>'Near patient testing equipment e.g blood gas machines');
  $dArry[15] = array(0=>'Dressing trolleys');
  $dArry[16] = array(0=>'Blood pressure cuffs');
  $dArry[17] = array(0=>'Pillows');
  $dArry[18] = array(0=>'Mattresses');
  $dArry[19] = array(0=>'Cot sides');
  $dArry[20] = array(0=>'Wheelchairs and cushions');
  $dArry[21] = array(0=>'Oxygen saturation probes');
  $dArry[22] = array(0=>'Patient wash bowls are dedicated individual patient');
  $dArry[23] = array(0=>'Patient wash bowls are decontaminated appropriately between patients and are stored clean dry and inverted');



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
 <h2 align="center"><u>Spillage and / or Contamination with blood/ body fluids</u></h2>  



 <?php

          $output = '';
  $output .= '
  <table class="table" border="1">
  <thead>
  

<tr>
  <th width="10%">sr.no</th>
  <th width="25%"><strong>Spillage and / or Contamination with blood/ body fluids</strong></th>
  <th width="20%">Yes</th>
  <th width="20%">No</th>
  <th width="20%">NA</th>
  <th width="35%">Comment</th>
  </tr>
  </thead>

   <tbody>
            
  ';
  $n = 1;
  $k = 1;
  $ye = 0;
  $no = 0;
  $na = 0;



  foreach ($dArry as $value) { 

  if($result[$n - 1]['yn_val'] == 'Yes')
    {
      
      $ye++;
    } 
  elseif($result[$n - 1]['yn_val'] == 'No')
    {
      $no++;

    }
  elseif($result[$n - 1]['yn_val'] == 'NA')
  {
    $na++;
  }
            
            $output .= "
            
            <tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 




            $output .= "<tr>

              <td colspan='2' style='text-align: center;''>Total</td>
              <td>".  $ye ."</td>
              <td>".  $no ."</td>
              <td>".  $na ."</td>
              <td></td>
            </tr>";

            $output .= '</tbody></table>';
  

  echo $output;

 ?>
           
    


  

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
          title : 'Spillage and / or Contamination with blood/ body fluids Audit',
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