
<?php  

//index.php
include("../dbinfo.php");

/*print_r($_POST);
die();*/



if(isset($_POST["fdate"],$_POST["tdate"])){



$tblname = $_POST['tblname'];
//$audit_name = $_POST['audit_name'];
$output = array();

  
$sq = "SELECT * FROM $tblname WHERE (dateVal BETWEEN '".$_POST["fdate"]."' AND '".$_POST["tdate"]."') ORDER BY id ASC";
$statement = $connection->prepare($sq);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);



    $output = '';
  $output .= '
  <table class="table" border="1" style="text-align:center">
 <thead>
                      <tr>
                       <th colspan="4" style="text-align:center">Moment</th>
                        <th colspan="3" style="text-align:center">Subject</th>
                        <th colspan="4" style="text-align:center">Process of HH</th>
                        
                      </tr>
                      <tr>
                        <th style="text-align:center">Shift & Time</th>
                        <th style="text-align:center">Date</th>
                          <th style="text-align:center">WD / WE</th> 
                        <th style="text-align:center">Time</th> 
                        <th style="text-align:center">Health Care Professional: MD: Medical doctor/ N: Nurse / AS: Ancillary staff </th>
                        <th style="text-align:center">Name initials </th> 
                        <th style="text-align:center">Gender : F/M</th>
                        <th style="text-align:center">H.H: Y/N</th>
                        <th style="text-align:center">Technique: A / I</th> 
                        <th style="text-align:center">Used product: A/C/I/NM</th>
                        <th style="text-align:center">Used towel</th>
                        
                      </tr>
                      
                    </thead>

   <tbody>
            
  ';
  
        foreach ($result as $row) {
          $output .= '

          <tr>
                       <td>'.$row["sTime"].'</td>
                        <td>'.$row["dateVal"].'</td>
                        <td>'.$row["day"].'</td> 
                        <td>'.$row["timeVal"].'</td> 
                        <td>'.$row["prof"].'</td>
                        <td>'.$row["nameVal"].'</td> 
                        <td>'.$row["sex"].'</td>
                        <td>'.$row["hh"].'</td>
                        <td>'.$row["tech"].'</td> 
                        <td>'.$row["usedProduct"].'</td>
                        <td>'.$row["towel"].'</td>
                      
                      </tr>';

        }


  

            $output .= '</tbody></table>

            <table class="table" border="1">
            <thead>
            <tr>
            <th colspan="5" style="text-align:center">Moment of HH</th>
            </tr>
            <tr>
            <th style="text-align:center">Moment 1</th>
            <th style="text-align:center">Moment 2</th>
            <th style="text-align:center">Moment 3</th>
            <th style="text-align:center">Moment 4</th>
            <th style="text-align:center">Moment 5</th>
            </tr>
            <tr>
            <th style="text-align:center">Before patient contact (Noninvasive procedure) </th>
            <th style="text-align:center">Before aseptic task (Invasive procedure)</th>
            <th style="text-align:center">After body fluid exposition risk </th>
            <th style="text-align:center">After patient contact</th>
            <th style="text-align:center">After touching patient\'s surroundings. </th>
            </tr>
            </thead>
             <tbody>
            
  ';
  
        foreach ($result as $row) {
          $output .= '

          <tr>
                       <td style="text-align:center">'.$row["noninvasive"].'</td>
                        <td style="text-align:center">'.$row["invasive"].'</td>
                        <td style="text-align:center">'.$row["fluid"].'</td> 
                        <td style="text-align:center">'.$row["contact"].'</td> 
                        <td style="text-align:center">'.$row["surroundings"].'</td>
                        
                      
                      </tr>';

        }


  

            $output .= '</tbody></table>';
  




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
 <h2 align="center"><u>Hand Hygiene</u></h2>  



 <?php

          
  

  echo $output;

 ?>
           
    


  

<p style="page-break-before: always"></p>


           

             <div id="hic_chart" style="width: 100%; max-width:730px; height: 300px; "></div>
            <br>
             <div id="hic_chart1" style="width: 100%; max-width:730px; height: 300px; "></div>
            <br> 
            <div id="hic_chart2" style="width: 100%; max-width:730px; height: 300px; "></div>
            <br>
            <div id="hic_chart3" style="width: 100%; max-width:730px; height: 300px; "></div>
            <br>

          

          
</div>

<div align="center">
   <form method="post" id="make_pdf" action="create_pdf10.php">
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
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      function drawChart() {
        var qut = 'Morning (6:00 to 12:00)';
       var jsonData = $.ajax({
        url: 'chart_audit_10.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{qut:qut,tbl:'<?= $tblname ?>',frdate:'<?= $_POST["fdate"] ?>',todate:'<?= $_POST["tdate"] ?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'Morning (6:00 to 12:00) Shift Audit',
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: false,
              bar: {groupWidth: "40%"},
          chartArea:{'backgroundColor': {
                  'fill': '#F4F4F4',
                  'opacity': 50
                 } },
          backgroundColor: 'transparent',
          hAxis: {
                  //title: '%',
                  textStyle: {
                     color: '#01579b',
                     
                  },
                  
                  minValue: 0, maxValue: 100
               },

               vAxis: {
                  //title: '%',
                  textStyle: {
                     color: '#1a237e',
                     fontSize: 15,
                     bold: true
                  },
                  colors: ['green','#ffff99'],
                  legend: { position: 'top' },
                  minValue: 0, maxValue: 10
                  
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

function drawChart1() {
        var qut = 'Afternoon (12:00 to 18:00)';
       var jsonData = $.ajax({
        url: 'chart_audit_10.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{qut:qut,tbl:'<?= $tblname ?>',frdate:'<?= $_POST["fdate"] ?>',todate:'<?= $_POST["tdate"] ?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'Afternoon (12:00 to 18:00) Shift Audit',
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: false,
              bar: {groupWidth: "40%"},
          chartArea:{'backgroundColor': {
                  'fill': '#F4F4F4',
                  'opacity': 50
                 } },
          backgroundColor: 'transparent',
          hAxis: {
                  //title: '%',
                  textStyle: {
                     color: '#01579b',
                     
                  },
                  
                  minValue: 0, maxValue: 100
               },

               vAxis: {
                  //title: '%',
                  textStyle: {
                     color: '#1a237e',
                     fontSize: 15,
                     bold: true
                  },
                  colors: ['green','#ffff99'],
                  legend: { position: 'top' },
                  minValue: 0, maxValue: 10
                  
               }, 
              
        };
            
            var data1 = new google.visualization.arrayToDataTable(jsonData); 

            

          var chart_area = document.getElementById('hic_chart1');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        
   
}

function drawChart2() {
        var qut = 'Night (18:00 to 24:00)';
       var jsonData = $.ajax({
        url: 'chart_audit_10.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{qut:qut,tbl:'<?= $tblname ?>',frdate:'<?= $_POST["fdate"] ?>',todate:'<?= $_POST["tdate"] ?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'Night (18:00 to 24:00) Shift Audit',
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: false,
              bar: {groupWidth: "40%"},
          chartArea:{'backgroundColor': {
                  'fill': '#F4F4F4',
                  'opacity': 50
                 } },
          backgroundColor: 'transparent',
          hAxis: {
                  //title: '%',
                  textStyle: {
                     color: '#01579b',
                     
                  },
                  
                  minValue: 0, maxValue: 100
               },

               vAxis: {
                  //title: '%',
                  textStyle: {
                     color: '#1a237e',
                     fontSize: 15,
                     bold: true
                  },
                  colors: ['green','#ffff99'],
                  legend: { position: 'top' },
                  minValue: 0, maxValue: 10
                  
               }, 
              
        };
            
            var data1 = new google.visualization.arrayToDataTable(jsonData); 

            

          var chart_area = document.getElementById('hic_chart2');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        
   
}

function drawChart3() {
        var qut = 'Night (24:00 to 6:00)';
       var jsonData = $.ajax({
        url: 'chart_audit_10.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{qut:qut,tbl:'<?= $tblname ?>',frdate:'<?= $_POST["fdate"] ?>',todate:'<?= $_POST["tdate"] ?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'Night (24:00 to 6:00) Shift Audit',
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: false,
              bar: {groupWidth: "40%"},
          chartArea:{'backgroundColor': {
                  'fill': '#F4F4F4',
                  'opacity': 50
                 } },
          backgroundColor: 'transparent',
          hAxis: {
                  //title: '%',
                  textStyle: {
                     color: '#01579b',
                     
                  },
                  
                  minValue: 0, maxValue: 100
               },

               vAxis: {
                  //title: '%',
                  textStyle: {
                     color: '#1a237e',
                     fontSize: 15,
                     bold: true
                  },
                  colors: ['green','#ffff99'],
                  legend: { position: 'top' },
                  minValue: 0, maxValue: 10
                  
               }, 
              
        };
            
            var data1 = new google.visualization.arrayToDataTable(jsonData); 

            

          var chart_area = document.getElementById('hic_chart3');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        
   
}
        </script>  