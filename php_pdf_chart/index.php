
<?php  

//index.php

$connect = new PDO("mysql:host=localhost;dbname=db_googlemap", "root", "");

$query = "SELECT gender, count(*) as number FROM tbl_employee GROUP BY gender";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query1 = "SELECT name, age FROM tbl_employee ";

$statement = $connect->prepare($query1);

$statement->execute();

$result1 = $statement->fetchAll();

?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <title>Export Google Chart to PDF using PHP with DomPDF</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
    //     var data = google.visualization.arrayToDataTable([
    //  ['Gender', 'Number','Number'],
    //  <?php
    //  foreach($result as $row)
    //  {
    //   echo "['".$row["gender"]."', ".$row["number"].",".($row["number"]*2)."],";
    //  }
    //  ?>
    // ]);

      var data = 1;
    // chart one
        var jsonData = $.ajax({
        url: 'data.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{data:data},
        success: function(jsonData)
          {
             var options = {
          title : 'Percentage of Male and Female Employee',
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: true,
          chartArea:{'backgroundColor': {
                  'fill': '#F4F4F4',
                  'opacity': 100
                 } },
          backgroundColor: 'transparent',
              
        };
            
            var data1 = new google.visualization.arrayToDataTable(jsonData); 

            

            var chart_area = document.getElementById('curve_chart');

          var chart = new google.visualization.LineChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;


  //     var data = google.visualization.arrayToDataTable([
  //        ['Gender', 'Number', { role: 'annotation' } ],
  //        <?php
  //    foreach($result1 as $row)
  //    {
  //     echo "['".$row["name"]."', ".$row["age"].",".($row["age"])."],";
  //    }
  //    ?>
  //     ]);

  //       var options = {
  //    title : 'Percentage of Male and Female Employee',
  //  curveType: 'function',
  //             dataOpacity: 0.5,
  //             is3D: true,
  //    chartArea:{'backgroundColor': {
  //                 'fill': '#F4F4F4',
  //                 'opacity': 100
  //                } },
  //    backgroundColor: 'transparent',
              
  // };

  // var chart_area = document.getElementById('curve_chart');

  // var chart = new google.visualization.LineChart(chart_area);

        
  // google.visualization.events.addListener(chart, 'ready', function(){
  //    chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
  //   });

  //       chart.draw(data, options);
      }
        </script>  
    </head>  
    <body>  
       


        <div class="container" id="testing">  
            
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Export Google Chart to PDF using PHP with DomPDF</h3>
    </div>

    <h3 align="center">Export Google Chart to PDF using PHP with DomPDF</h3>  
            <br />
    <div class="panel-body" align="center">
     <div id="curve_chart" style="width: 100%; max-width:900px; height: 300px; "></div>
    

   </div>

   <img src="smiley.gif" alt="Smiley face" width="42" height="42">
   <h2>Circle</h2>
  <p>The .img-circle class shapes the image to a circle (not available in IE8):</p>            
  <img src="cinqueterre.jpg" class="img-circle" alt="Cinque Terre" width="304" height="236"> 
 <div class="panel-body" align="center">
     <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
    </div>
   </div>
        </div>
  <br />
  <div align="center">
   <form method="post" id="make_pdf" action="create_pdf.php">
    <input type="hidden" name="hidden_html" id="hidden_html" />
    <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Make PDF</button>
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


    
