
<?php  

//index.php
include("../dbinfo.php");

 $dArry[1] = array(0=>'Does your facility have a policy that requires prescribes to document in the medical record or during order entry a dose, Duration and indication for all antibiotic prescriptions?');
  $dArry[2] = array(0=>'Does your facility have specific treatment recommendations, based on national guidelines and local susceptibility, To assist with antibiotic selection for common clinical condition?');
  $dArry[3] = array(0=>'Specific interventions to improve antibiotics use :');
  $dArry[4] = array(0=>'Is there a formal procedure for all clinicians to review the appropriateness of all antibiotics 48 hours after the initial Order (e.g. antibiotic time out)?');
  $dArry[5] = array(0=>'Do specified antibiotic agents need to be approved by a physician or pharmacist prior to  dispensing (ie pre authorization) at your Facility?');
  $dArry[6] = array(0=>'Does a physician or pharmacist review courses of therapy for specified antibiotic agents (i.e., prospective audit with feedback) At your facility?');
  $dArry[7] = array(0=>'Automatic changes inform intravenous to oral antibiotic therapy in appropriate situations?');
  $dArry[8] = array(0=>'Dose optimization (Pharmacokinetics/ pharmacodynamics) to Optimize the treatment of organism with reduced susceptibility?');
  $dArry[9] = array(0=>'Automatic alerts in situation where therapy might be Unnecessarily duplicative ?');

  $dArry1[10] = array(0=>'Doses your facility have specific  interventions in place to ensure optimal use of antibiotics to treat the following common infections?');
  $dArry1[11] = array(0=>'Community acquired pneumonia');
  $dArry1[12] = array(0=>'Urinary tract infection');
  $dArry1[13] = array(0=>'Skin and soft tissue infection');
  $dArry1[14] = array(0=>'Surgical prophylaxis');
  $dArry1[15] = array(0=>'Empiric treatment of Methicillin – resistant Staphylococcus Aureus (MRSA)');
  $dArry1[16] = array(0=>'Culture – proven invasive (e.g. blood stream) infection');


  $dArry2[17] = array(0=>'Dose your stewardship program monitor adherence to a Documentation policy (dose, duration and indication)?');
  $dArry2[18] = array(0=>'Does your stewardship program monitor adherence to facility Specific treatment recommendations?');
  $dArry2[19] = array(0=>'Does your sterwardship program monitor adherence compliance With one of more of the specific interventions in place ?');

  $dArry3[20] = array(0=>'Does your facility  track rates of C. difficile infection?');
  $dArry3[21] = array(0=>'Does your facility produce an antibiogram (cumulative antibiotic) susceptibility report?');
  $dArry3[23] = array(0=>'Does your facility monitor antibiotic use (consumption) at the unit and / or facility wide level by one of the following metrics :');
  $dArry3[24] = array(0=>'By counts of antibiotics (s) administered to patients  Per day (Days of Therapy DOT)?');
  $dArry3[25] = array(0=>'By numbers of grams of antibiotics used (Defined daily dose, DDD)?');
  $dArry3[26] = array(0=>'By direct expenditure for antibiotics (purchasing costs) ?');

  $dArry4[27] = array(0=>'Dose your stewardship program share facility – specific reports On antibiotics use with prescribes?');
  $dArry4[28] = array(0=>'Has a current antibiogram been distributed to prescribes At your facility?');
  $dArry4[29] = array(0=>'Do prescribes ever receive direct, personalized communication about how they can improve their antibiotic prescribing?');

  $dArry5[30] = array(0=>'Does your sterwardship program education to clinicians and other relevant staff on improving antibiotic prescribing ?');



if(isset($_POST['quater']) ){


$quater_id = $_POST['quater'];

$tblname = $_POST['tblname'];
$audit_name = $_POST['audit_name'];
$output = array();

  $statement = $connection->prepare(
    "SELECT * FROM $tblname 
    WHERE quarter = '".$quater_id."'"
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
 <h2 align="center"><u>AUDIT ON ANTIMICROBIAL STEWARDSHIP – FACILITY AUDIT</u></h2>  



 <?php

          $output = '';
  $output .= '
  <table class="table" border="1">
  <thead>
  

  <tr>
  <th width="10%">sr.no</th>
  <th width="25%"><strong>AUDIT ON ANTIMICROBIAL STEWARDSHIP – FACILITY AUDIT</strong></th>
  <th width="20%">Yes</th>
  <th width="20%">No</th>
  <th width="20%">NA</th>
  <th width="35%">Comment</th>
  </tr>
  </thead>

   <tbody>
            <tr>
              <th colspan="6"><strong>ACTIONS TO SUPPORT OPTIMAL ANTIBIOTIC USE</strong></th>
            </tr>
            <tr>
              <th colspan="6"><strong>Polices :</strong></th>
                              
            </tr>
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
                              
                              <th colspan="6"><strong>Diagnosis & Infection Specific Interventions:</strong></th>
                              
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
              <th colspan="6"><strong>TRACKING: MONITORING ANTIBIOTIC PRESCRIBING, USE, AND RESISTANCE :</strong></th>
            </tr>
            <tr>
              <th colspan="6"><strong>PROCESS MEASURES</strong></th>
            </tr>';

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

            $output .='<tr>
            <th colspan="6"><strong>ANTIBIOTIC USE AND OUTCOME MEASURES</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry3 as $value) { 

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
            <th colspan="6"><strong>REPORTING INFORMATION TO STAFF ON IMPROVING ANTIBIOTIC USE AND RESISTANCE</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry4 as $value) { 

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
            <th colspan="6"><strong>EDUCATION</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry5 as $value) { 

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
        data:{qut:'<?=$quater_id?>',tbl:'<?=$tblname?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'AUDIT ON ANTIMICROBIAL STEWARDSHIP – FACILITY AUDIT',
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