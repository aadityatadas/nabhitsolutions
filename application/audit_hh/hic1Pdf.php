
<?php  

//index.php
include("../dbinfo.php");

  $dArry[1] = array(0=>'The organization has acomprehensive policy for hand hygiene',1=>'h_hygn_1_yn',2=>'h_hygn_1_cmmnt');
    $dArry[2] = array(0=>'Hand hygiene is an integral part of Induction for all staff',1=>'h_hygn_2_yn',2=>'h_hygn_2_cmmnt');
    $dArry[3] = array(0=>'Staff have received training in hand hygiene Procedures',1=>'h_hygn_3_yn',2=>'h_hygn_3_cmmnt');
    $dArry[4] = array(0=>'Clinical staff nails are short, clean and free from nail extensions
    and varnish',1=>'h_hygn_4_yn',2=>'h_hygn_4_cmmnt');
    $dArry[5] = array(0=>'Posters promoting hand hygiene are available and are on display',1=>'h_hygn_5_yn',2=>'h_hygn_5_cmmnt');
    $dArry[6] = array(0=>'There is a hand wash basin in each treatment / clinical area',1=>'h_hygn_6_yn',2=>'h_hygn_6_cmmnt');
    $dArry[7] = array(0=>'Hand washing facilities are clean and intact',1=>'h_hygn_7_yn',2=>'h_hygn_7_cmmnt');
    $dArry[8] = array(0=>'Hand wash basins are dedicated to HH only',1=>'h_hygn_8_yn',2=>'h_hygn_8_cmmnt');
    $dArry[9] = array(0=>'Hand wash basins are free from used equipment and inappropriate
    items',1=>'h_hygn_9_yn',2=>'h_hygn_9_cmmnt');
    $dArry[10] = array(0=>'There is easy access to the hand wash basin',1=>'h_hygn_10_yn',2=>'h_hygn_10_cmmnt');
    $dArry[11] = array(0=>'Elbow operated taps are available at all hand wash basins in
    clinical areas',1=>'h_hygn_11_yn',2=>'h_hygn_11_cmmnt');
    $dArry[12] = array(0=>'Liquid soap is available at each hand wash basin',1=>'h_hygn_12_yn',2=>'h_hygn_12_cmmnt');
    $dArry[13] = array(0=>'The cartridge dispensers are not empty',1=>'h_hygn_13_yn',2=>'h_hygn_13_cmmnt');
    $dArry[14] = array(0=>'Liquid soap is in the form of single use cartridge dispensers',1=>'h_hygn_14_yn',2=>'h_hygn_14_cmmnt');
    $dArry[15] = array(0=>'Dispenser nozzles are visible clean',1=>'h_hygn_15_yn',2=>'h_hygn_15_cmmnt');
    $dArry[16] = array(0=>'There is no bar soap at hand washing basins in treatment / clinical
    ares',1=>'h_hygn_16_yn',2=>'h_hygn_16_cmmnt');
    $dArry[17] = array(0=>'Alcohol rub is available for use at the entrance / exits to clinical
    settings',1=>'h_hygn_17_yn',2=>'h_hygn_17_cmmnt');
    $dArry[18] = array(0=>'Alcohol hand rub is available at the point of care as per local and
    national standard',1=>'h_hygn_18_yn',2=>'h_hygn_18_cmmnt');
    $dArry[19] = array(0=>'Soft absorbent paper towels / small single use towels are available
    at all hand wash sinks',1=>'h_hygn_19_yn',2=>'h_hygn_19_cmmnt');
    $dArry[20] = array(0=>'There are no re-usable cotton towels used to dry hands in clinical
    ares',1=>'h_hygn_20_yn',2=>'h_hygn_20_cmmnt');
    $dArry[21] = array(0=>'Cotton towels used to dry hands in non-clinical areas are changed
    during each shift',1=>'h_hygn_21_yn',2=>'h_hygn_21_cmmnt');
    $dArry[22] = array(0=>'There are no nailbrushes used or present at hand wash sinks',1=>'h_hygn_22_yn',2=>'h_hygn_22_cmmnt');
    $dArry[23] = array(0=>'There is a foot operated bin for waste in close proximity to hand
    wash sinks which are fully operational',1=>'h_hygn_23_yn',2=>'h_hygn_23_cmmnt');



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
 <h2 align="center"><u>Hand Hygiene</u></h2>  



 <?php

          $output = '';
  $output .= '
  <table class="table" border="1">
  <thead>
  

  <tr>
               <th colspan="6" align="center" >Hand Hygiene</th>
               
            </tr>

             <tr>
               <th colspan="6"></th>
               
            </tr>

  <tr>
  <th width="10%">sr.no</th>
  <th width="25%"><strong>Hand Hygiene</strong></th>
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
      
      $cid = '1_'.$quater_id.'_'.$yr;
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
          title : 'Hand Hygiene Audit',
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