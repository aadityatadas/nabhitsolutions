
<?php  

//index.php
include("../dbinfo.php");

  $dArry[1] = array(0=>'Insertion');
  $dArry[2] = array(0=>'Is surgical hand preparation performed before the procedure');
  $dArry[3] = array(0=>'Type of device used for hair removal Clipper');
  $dArry[4] = array(0=>'Type of device used for hair removal Blade');
  $dArry[5] = array(0=>'Is a sterile gown worn during the procedure ?');
  $dArry[6] = array(0=>'Are sterile  grown worn during the procedure');
  $dArry[7] = array(0=>'Is a mask worn during insertion of the CVC procedure ?');
  $dArry[8] = array(0=>'Is a single use cap worn during the procedure ?');
  $dArry[9] = array(0=>'Is the CVC which issued single lumen unless otherwise Clinically indicated?');
  $dArry[10] = array(0=>'Is the procedure trolley cleaned prior to use ?');
  $dArry[11] = array(0=>'Is the CVC insertion sit either subclavian or jugular (unless another site is clinically indicated)?');
  $dArry[12] = array(0=>'Is skin antisepsis with 4% chlorhexidine followed by alcohol 70% + chlorhexidine 2% w/v applied Totheinsertion  site and allowed to dry before insertion?');
  $dArry[13] = array(0=>'Are disposables sterile drapes used?');
  $dArry[14] = array(0=>'Is a sepsis maintained through out the procedure ?');
  $dArry[15] = array(0=>'Is blood removed from the skin around the insertion site?');
  $dArry[16] = array(0=>'Is a sterile, smeipermeable, transparent Dressing placed over the insertion site ?');
  $dArry[17] = array(0=>'Is date, time, site and insertion  documented and signed By the person inserting the device ?');




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
 <h2 align="center"><u>Care of Central Venous Catheter</u></h2>  



 <?php

          $output = '';
  $output .= '
  <table class="table" border="1">
  <thead>
  

<tr>
  <th width="10%">sr.no</th>
  <th width="25%"><strong>Care of Central Venous Catheter</strong></th>
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
      
      $cid = '11_'.$quater_id.'_'.$yr;
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

       <h3>Prventive Action</h3>
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
          title : 'Care of Central Venous Catheter',
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