
<?php  

//index.php
include("../dbinfo.php");

 $dArry[1] = array(0=>'The floor is free of dust, grit, litter, marks, water or other liquids');
  $dArry[2] = array(0=>'Inaccessible areas (edges, corners and around furniture) are free of dust , grit, lint and spots');
  $dArry[3] = array(0=>'There are no inappropriate items or equipment in the kitchen');
  $dArry[4] = array(0=>'There is no evidence of infestation or animals in the kitchen');
  $dArry[5] = array(0=>'Fly screens are in place where required');
  $dArry[6] = array(0=>'There is a policy regarding patient and visitor access to the kitchen');
  $dArry[7] = array(0=>'Cleaning materials used in the kitchen are identifiable (e.g color coded) and are  stored separately to other ward cleaning equipment and away from food.');
  $dArry[8] = array(0=>'Hand wash sink, liquid soap and disposable paper towels are available');
  $dArry[9] = array(0=>'Hand wash  is performed before and after handling food');
  $dArry[10] = array(0=>'Shelves, cupboards and drawers are clean inside and out and are free from damage, dust litter or stains and in a good state of repair');
  $dArry[11] = array(0=>'Kitchen trolleys are clean and in a good state of repair');
  $dArry[12] = array(0=>'Refrigerators / freezers are clean and free of ice build up');
  $dArry[13] = array(0=>'There is evidence that daily temperature are recorded and appropriate temperature must be less than 8  deg C, freezer – 18 deg C');
  $dArry[14] = array(0=>'Patient and staff food in the fridge is labeled with name and date');
  $dArry[15] = array(0=>'There are no drugs / blood for transfusion or pathology specimens in the fridge');


  $dArry1[16] = array(0=>'Microwaves');
  $dArry1[17] = array(0=>'Toasters');
  $dArry1[18] = array(0=>'Milk coolers');
  $dArry1[19] = array(0=>'Ice machines');
  $dArry1[20] = array(0=>'Water coolers');
  $dArry1[21] = array(0=>'Where local policy allows a microwaves to be used to heat patient food a temperature probe is used to ensure correct temperature has been reached');
  $dArry1[22] = array(0=>'Bread is stored in a clean bread bin');
  $dArry1[23] = array(0=>'All food product are within their expiry date');
  $dArry1[24] = array(0=>'All opened food is covered or stored in containers');
  $dArry1[25] = array(0=>'Milk is stored under refrigerator conditions');


  $dArry2[26] = array(0=>'Water coolers');
  $dArry2[27] = array(0=>'Ice machines');
  $dArry2[28] = array(0=>'There is a satisfactory system for cleaning crockery and cutlery such as central wash up or dishwashers, achieving disinfection temperature evidence by a maintenance programme');
  $dArry2[29] = array(0=>'Disposable paper roll is available for drying equipment and surfaces');
  $dArry2[30] = array(0=>'Waste bins are foot operated and in good working order');
  $dArry2[31] = array(0=>'There is a separate bin for general waste and food waste and
  infectious waste');
  $dArry2[32] = array(0=>'All food handlers are vaccinated against typhoid');
  $dArry2[33] = array(0=>'There is no inadvertent use of gloves');




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
 <h2 align="center"><u>Kitchens</u></h2>  



 <?php

          $output = '';
  $output .= '
  <table class="table" border="1">
  <thead>
  

<tr>
  <th width="10%">sr.no</th>
  <th width="25%"><strong>Kitchens</strong></th>
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
            
            $output .= "<tr>
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
            $output .='<tr>
                              
              <th colspan="6"><strong>Following articles are visibly clean</strong></th>
                </tr>';

            $k = 1;
            foreach ($dArry1 as $value) { 

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
            
            $output .= "<tr>
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

            $output .='<tr>
              <th colspan="6"><strong>A pre- planned maintenance programme and cleaning schedule is in place for</strong></th>
            </tr>
            ';

            $k = 1;
            foreach ($dArry2 as $value) { 

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
            
            $output .= "<tr>
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
          title : 'Kitchens Audit',
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