
<?php  

//index.php
include("../dbinfo.php");

   $dArry[1] = array(0=>'The organization has comprehensive procedures/ policy of dealing with body fluid spillages');
  $dArry[2] = array(0=>'Staffs has received training in dealing with body fluid spillages.');
  $dArry[3] = array(0=>'Staff who come in contact with spillages have been successfully
  immunized against Hepatitis B');
  $dArry[4] = array(0=>'Staff are aware of how to contact the Occupational Health
  Department / IC Team in the event of an inoculation accident');
  $dArry[5] = array(0=>'All equipment and the environment is visibly clean with no body
  substances, dust dirt or debris');
  $dArry[6] = array(0=>'Dedicated spillage kits are available for decontaminating and
  cleaning body fluids');
  $dArry[7] = array(0=>'Personal protective r\equipment is available');
  $dArry[8] = array(0=>'Equipment used to clear up body fluid spillages is disposable or able
  to be decontaminated');
  $dArry[9] = array(0=>'Appropriate disinfectants are available for cleaning all body fluid
  spillages');
  $dArry[10] = array(0=>'Sodium hypochlorite solution in the strength 1:10000ppm (1%) OR NaDCC(Sodium Dichloroisocyanurate) is available.');



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
               <th colspan="6" align="center" >Spillage and / or Contamination with blood/ body fluids</th>
               
            </tr>

             <tr>
               <th colspan="6"></th>
               
            </tr>

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
           
    
 <?php
      
      $cid = '4_'.$quater_id.'_'.$yr;
      $statement1 = $connection->prepare(
        "SELECT corrective_action,preventive_action  FROM `tbl_quaterly_audit_reports`
              
                WHERE tbl_quaterly_audit_details_id = '".$cid."'"
      );
      $statement1->execute();
      $result1 = $statement1->fetchAll();
      /*print_r($result1);*/
      $cor = json_decode($result1[0]['preventive_action']);
      $per = json_decode($result1[0]['corrective_action']);

?>

 <div class="xyz">

  <h3>Corrective Actions</h3>
       <?php
              $i = 1;
              foreach ($cor as $cvalue) {
                if($cvalue != '')
                {
                  echo $i.') <b>'.$cvalue.'</b>';
                  echo "<br>";
                  $i++;
                }
                
              }

       ?>

       <br><br>

       <h3>Prventive Actions</h3>
       <?php
              $y = 1;
              foreach ($per as $pvalue) {
                if ($pvalue != '') {
                  echo $y.') <b>'.$pvalue.'</b>';
                  echo "<br>";
                  $y++;
                }
                
              }

       ?>
  
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
          title : 'Spillage and / or Contamination with blood/ body fluids',
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