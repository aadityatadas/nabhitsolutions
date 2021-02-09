
<?php  

//index.php
include("../dbinfo.php");

$dArry[1]=array(0=>'Hand hygiene',1=>'tbl_audit_hh1');
  $dArry[2]=array(0=>'Bio-Medical Waste Management',1=>'tbl_audit_hh2');
  $dArry[3]=array(0=>'Sharp Safety Audit',1=>'tbl_audit_hh3');
  $dArry[4]=array(0=>'HIC 4 Audit',1=>'tbl_audit_hh4');
  $dArry[5]=array(0=>'Environment Audit',1=>'tbl_audit_hh5');
  $dArry[6]=array(0=>'Management of Patient Equipment',1=>'tbl_audit_hh6');
  $dArry[7]=array(0=>' Resuscitation equipment',1=>'tbl_audit_hh7');
  $dArry[8]=array(0=>'Transportation & Handling of Specimens',1=>'tbl_audit_hh8');
  $dArry[9]=array(0=>' Kitchens',1=>'tbl_audit_hh9');
  /*$dArry[10]=array(0=>'HIC 10',1=>'tbl_audit_hh10');*/
  $dArry[10]=array(0=>'Care of Invasive device',1=>'tbl_audit_hh11');
  $dArry[11]=array(0=>'Care of Urinary Catheter',1=>'tbl_audit_hh12');
  $dArry[12]=array(0=>'Care ventilated patient',1=>'tbl_audit_hh13');
  $dArry[13]=array(0=>'Enteral feeding',1=>'tbl_audit_hh14');
  $dArry[14]=array(0=>'Isolation Precautions',1=>'tbl_audit_hh15');
  $dArry[15]=array(0=>'Laundry Audit',1=>'tbl_audit_hh16');
  $dArry[16]=array(0=>'Ward management of linen',1=>'tbl_audit_hh17');
  $dArry[17]=array(0=>'Endoscopy',1=>'tbl_audit_hh18');
  $dArry[18]=array(0=>'Infection Prevention and Control-Management',1=>'tbl_audit_hh19');
  $dArry[19]=array(0=>'Operation Theatre Asepsis',1=>'tbl_audit_hh20');
  $dArry[20]=array(0=>'CSSD',1=>'tbl_audit_hh21');
  $dArry[21]=array(0=>'ANTIMICROBIAL STEWARDSHIP Audit',1=>'tbl_audit_hh22');



if(isset($_POST['quater']) ){


$qut = $_POST['quater'];
$yrg = $_POST['yr'];

switch ($qut) {
    case 1:
      $admdt = 'Quarter 1 (January)';
      break;
    case 2:
      $admdt = 'Quarter 2 (April)';
      break;
    case 3:
      $admdt = 'Quarter 3 (July)';
      break;
    case 4:
      $admdt = 'Quarter 4 (October)';
      break;
    
    default:
      $admdt = $qut;
      break;
  }
  




} else{
  echo "Error In Quater Selection Selection";

  die();
}

?>


<!DOCTYPE html>  
<html>  
    <head>  
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
 <h2 align="center"><u>All Hic Audit Summery</u></h2>  



 <?php

          $output = '';
  $output .= '
  <table class="table" border="1">
  <thead>
  

  <tr>
            <th colspan="4" style="text-align:center; font-size: 15px">'.$admdt.'</th>
            <th colspan="5" style="text-align:center; font-size: 15px">Scoring Summary</th>
            
          </tr>
          <tr>
            <th>Sr n</th>
            <th>Audit</th>
            <th>No Of Yes (a)</th>
            <th>No Of No (b)</th>
            <th>No Of N/A (c)</th>
            <th>Possible Score (d)</th>
            <th>Max score e=d-c</th>
            <th> %score=a/e*100 </th>
            <th>Sign</th>
          </tr>
        </thead>
        <tbody>';
        $n = 1;
        $totalYes = 0;
        $totalNo  = 0;
        $totalNa  = 0;
  foreach ($dArry as $aud) {
    
  $tbl = $aud[1];


  $sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND month_id = '".$yrg."' AND yn_val = 'Yes' ORDER BY id ASC";
  $rs = mysqli_query($connect, $sq);
  $resYes = mysqli_fetch_row($rs)[0];

  $sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND month_id = '".$yrg."' AND yn_val = 'No' ORDER BY id ASC";
  $rs = mysqli_query($connect, $sq);
  $resNo = mysqli_fetch_row($rs)[0];

  $sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND month_id = '".$yrg."' AND yn_val = 'NA' ORDER BY id ASC";
  $rs = mysqli_query($connect, $sq);
  $resNa = mysqli_fetch_row($rs)[0];

  $pscore = $resYes + $resNo + $resNa;
  $mScore = $pscore - $resNa;
  $score =  ($mScore == 0)? 0 : ($resYes / $mScore) * 100;
    $score = (is_nan($score))? 0 : $score;

  $totalYes = $totalYes + $resYes;
  $totalNo  = $totalNo  + $resNo;
  $totalNa  = $totalNa  + $resNa;


  $output.='
    
      
          <tr>
            <td>'.$n.'</td>
            <td>'.$aud[0].'</td>
            <td>'.$resYes.'</td>
            <td>'.$resNo.'</td>
            <td>'.$resNa.'</td>
            <td>'.$pscore.'</td>
            <td>'.$mScore.'</td>
            <td>'.$score.'</td>
            <td></td>
          </tr>
        
    ';

    $n++;

  }

  $pscore = $totalYes + $totalNo + $totalNa;
  $mScore = $pscore - $totalNa;
  $score =  ($totalYes / $mScore) * 100;
  $score = (is_nan($score))? 0 : $score;

  $output .= '
          <tr>
            <td colspan="2" style="text-align:center;">Total</td>
            <td>'.$totalYes.'</td>
            <td>'.$totalNo.'</td>
            <td>'.$totalNa .'</td>
            <td>'.$pscore.'</td>
            <td>'.$mScore.'</td>
            <td>'.$score.'</td>
            <td></td>
          </tr>
        </tbody>
      </table>';
  

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
              var qutVal = '<?= $qut ?>';
              var yesT = '<?= $totalYes ?>';
              var noT  = '<?= $totalNo ?>';
              var naT  = '<?= $totalNa ?>';


       var jsonData = $.ajax({
        url: 'chart.php',
        dataType:"json",
        method:"POST",
        async: false,
       data:{yesT:yesT,noT:noT,naT:naT,qutVal:qutVal},
        success: function(jsonData)
          {
             var options = {
          title : 'All Hic Audit Summery',
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