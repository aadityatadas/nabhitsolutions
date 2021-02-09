<?php  

//index.php
include("../application/dbinfo.php");





if(isset($_POST['selectedquater_id1']) ){


$quater_id = $_POST['selectedquater_id1'];
$start = $_POST['start1'];


$end = $_POST['end1'];

$quater_name = $_POST['selected_quater_name1'];
$audit_name = $_POST['selected_audit_name1'];

$months= date('F', strtotime($start))."-".date('F', strtotime($end));

$year = date('Y', strtotime($start));



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

    <h1 align="center"><u>DEATH AUDIT REPORT</u></h1>  
           
    <div class="panel-body" align="center" style="padding-top: 0px!important">

    
      <img src="hosp.png"  width="400" height="350" style="margin-top: 50px;margin-left: 50px;margin-right: 50px">
      
     

  <table style="width:100%">
  <tr>
    <th align="left">
      Audit Done By:<br>           Mrs. Shilpi Guryani  <br>        Pharmacist</th>
    <th></th> 
     <th></th> 
    <th align="right">
      Audit Reviewed By:<br> Dr. Deepak Jeswani<br>Medical Director</th>
  </tr>
  
</table>


</div>
</div>
    
<p style="page-break-before: always"></p>
 <h2 align="center"><u>DEATH AUDIT REPORT</u></h2>  
           
    


  <h2 align="left"><u>Topic</u></h2> 

<ul>
  To analyze the factors related to mortality in <?=HOSPITAL_NAME?> hospital during the month of <?=$months?> <?=$year?> against the standard criteria defined by patient safety congress. 
  
</ul> 

<h2 align="left"><u>Aims and guidelines for conducting death audits</u></h2> 

<ul>
  Effectively run clinical audit and peer review processes, incorporating analysis of contribute to improved patient safety. These guidelines aim to provide
practical advice to hospitals on establishing and running Death/clinical review
meetings. 
  
</ul> 

<br>

<div class="border">
  The Aim is to ascertain the proportion of patients who died because of 'problems in care', defined as patient harm resulting from healthcare processes including acts of omission (inactions), such as failure to diagnose and treat, or from acts of commission (affirmative actions) such as incorrect treatment or management. The focus should be on the systems and processes of care and not on individual performance.
Recommendations arising from individual cases should focus on measures that can
prevent similar outcomes or adverse incidents, or that will improve the processes of
care provided to hospital patients. These recommendations should not 
blame individuals but aim at improving the systems.
</div>

<br>


<h2 align="left"><b><u>Death Audit Committee </u></b></h2> 

<ul>
  The committee comprises of individuals from the hospital that represent the key departments – including management, treating doctors and support departments. 
  
</ul>


<h2 align="left">Members of Committee </h2> 

<ol>
 
 <li>Chairman: Dr.</li> 
<li>Secretary : Dr. </li>
 <li>REVIEW MEMBERS
  <ul>
    <li>Dr. </li>
  </ul>
    </li>
  
</ol> 

<br>

<p style="page-break-before: always"></p>
 <h4 align="left"><u>AUDIT Methodology</u></h4>  

<br>
 <h5 align="left"><u>Type of study</u></h5>
<ul>It is the retrospective study carried out through medical records review </ul>

<h4 align="left">Sampling Method</u></h4> 
 <ul>The whole sampling (stratified) method is used for intensive analysis of each case.</ul>
<h4 align="left"> Sample Size</u></h4> 

<?php 
$stmt = $connection->prepare("SELECT count(*) as a FROM tbl_death_audit as a WHERE a.tbl_quaterly_audit_details_id = ?");
$stmt->execute([$quater_id]);
$countP = $stmt->fetchColumn();

?>


<ul><strong>The total sample size is <?=$countP?> cases among </strong> <?=$months?> <?=$year?> (three Months)</ul>
<?php 
$stmt = $connection->prepare("SELECT count(*) as total ,huf_dddd as month FROM tbl_huf as a
WHERE a.huf_id IN (SELECT huf_id FROM tbl_death_audit as a
WHERE a.tbl_quaterly_audit_details_id=?)
GROUP BY month(a.huf_dddd) ASC");
$stmt->execute([$quater_id]);
$allMonths = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<ul><table class="table" border="1" > 
            <tr>  
                  <th style="width: 10%">Month.</th>
                  <th width="30%">Cases
                  </th>
                </tr>
            <tbody>
              <?php foreach ($allMonths as $key => $allMonth) { ?>
                
               <tr style="width: 20%">
                <td><?=date('F', strtotime($allMonth['month']))?></td>
                <td><?=$allMonth['total']?></td>
              </tr>
            <?php } ?>
            </tbody>

    </table></ul>

<?php 
$stmt = $connection->prepare("SELECT DATE(created) as d FROM tbl_death_audit WHERE tbl_quaterly_audit_details_id=? GROUP BY DATE(created)");
$stmt->execute([$quater_id]);
$allDates = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<br>
<h5 align="left"><u><strong>Study sample Period</strong></u></h5>
<ul>The Study was carried out from 
  <?php foreach ($allDates as $key => $allDate) {
    if($key!=0){ echo ",";}
    echo $allDate['d'];
  } ?>
  . 

  The Study sample was selected from <?=$months?> <?=$year?> (three Months) </ul>

  <br>
<ul>
  <h5 align="left"><u><strong>Process of Death Audit: </strong></u></h5>
    <ol>
    <?php
       $d = array('Criteria Development', 'Selection of Cases with Diagnosis',  'Post Mortem report statement regarding the cause of death',  'Worksheet preparation',  'Case evaluation',  'Tabulation of evaluation');

       foreach ($d as $key => $d1) {
            echo "<li>".$d1."</li>";
       }


    ?>
  </ol>
</ul>

<p style="page-break-before: always"></p>
<br>
<ul>
<h5 align="left" style="padding-right: 20px"><u><strong>Criteria of Audit</strong></u></h5>
<ol>

  <?php $p=array('Age specific','Diagnosis ','Type of admission','Condition at the time of admission','Probability of death expected during admission','Apache score during admission','Sofa score within 48 hrs','Surgery/procedure'
);
    foreach ($p as $key => $p1) {
            echo "<li>".$p1."</li>";
       }
?>
<li>Factors contributing to deaths
  <ol type="a">
<?php
$s = array('Team work','Techniques and management of care','Medication error','Decision making','Staffing error/Skill and competency','Communication error','Economical factors of the patient');
 foreach ($s as $key => $s1) {
            echo "<li>".$s1."</li>";
       }
?>
</ol>

  </li>

</ol>

</ul>


<ul><h5 align="left" style="padding-right: 20px"><u><strong>Analysis</strong></u></h5>
</ul>
<?php for($i=0;$i<=5;$i++):?>
           

             <div id="<?=$i?>_chart" style="width: 100%; max-width:730px; height: 300px; "></div>
            <br>

          <?php endfor; ?>

          <div id="All_chart" style="width: 100%; max-width:730px; height: 300px; "></div>


<p style="page-break-before: always"></p>

<h3 align="left"><u>1)Interpretation</u></h2>  
  <ul>
This analysis shows that during 4 months, 42 deaths occurred in our hospital.<br>
Most patients who died belonged to age group of 40 to 60 years (40.5%).<br>
Septic shock (35.7%) was the most common cause associated with death followed by alcoholic cirrhosis and metabolic encephalopathy (~ 12% each). ARDS, acute fulminant hepatitis and disseminated metastasis were seen in ~10% cases. <br>
Most cases were emergency admission and were critical with high probability of death.<br>
AACHE II scores were above 20 in nearly 80% cases. SOFA score above 10 was seen in 62% cases.<br>

This analysis demonstrates that young adults (40-50 years) with emergency admission for septic shock in a critical situation with high probability of deaths as suggested by higher APACHE –II and SOFA scores have more likelihood of deaths in intensive care.<br>
</ul>


          <h3 align="left"><u>2)Corrective Action</u></h2>  
 
<ol>
  <?php 
$output=[];
    $query = "SELECT corrective_action  FROM `tbl_quaterly_audit_reports`
          
            WHERE tbl_quaterly_audit_details_id = '".$quater_id."' 
        AND audit_name='death_audit'";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output = json_decode($row["corrective_action"]);
         
  }
foreach ($output as $key1 => $out) {
  if($key1!=100){
  
 
  echo '<li>'.$out.'</li>';
}
}
?>
    

</ol>
  
  
<br>

<h3 align="left"><u>3)Preventive Action</u></h2>  
     

  
  <ol>
  <?php 
$output=[];
    $query = "SELECT preventive_action  FROM `tbl_quaterly_audit_reports`
          
            WHERE tbl_quaterly_audit_details_id = '".$quater_id."' 
        AND audit_name='death_audit'";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output = json_decode($row["preventive_action"]);
         
  }
foreach ($output as $key1 => $out) {
  if($key1!=100){
  
 
  echo '<li>'.$out.'</li>';
}
}
?>
    

</ol>

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
   var audits = []; 
   var audits1 = []; 


  audits[0] = {name:"Type Of Admission", val1:"Emergency", val2:'Planned' , col:'tyofadmison'}; 
  audits[2] = {name:"Probability of Death Expected During Admission", val1:"Expected", val2:'Non Expected',col:'expected_un_death'}; 
  audits[3] = {name:"Surgery/Procedure", val1:"Surgery", val2:'Procedure',col:'surg_prodr'};


  audits1[4] = {name:"Apache Score during Admission", val1:"1"}; 
  audits1[5] = {name:"Sofascore within 48 hrs", val1:"2"}; 
      function drawChart() {

        

       
        audits.forEach((da,index)=> {
           // console.log(da.name);

            // chart one
        var jsonData = $.ajax({
        url: 'death_audit/data_death.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{selectedquater_id:'<?=$quater_id?>' , frm1Graphh:'<?=$start?>',to1Graphh :'<?=$end?>',dataval:da},
        success: function(jsonData)
          {
             var options = {
          title : da.name,
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

            

            var chart_area = document.getElementById(index+'_chart');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        });

         audits1.forEach((da,index)=> {
           

            // chart one
        var jsonData = $.ajax({
        url: 'death_audit/data_death3.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{selectedquater_id:'<?=$quater_id?>' , frm1Graphh:'<?=$start?>',to1Graphh :'<?=$end?>',dataval:da},
        success: function(jsonData)
          {
             var options = {
          title : da.name,
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

            

            var chart_area = document.getElementById(index+'_chart');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        });

         var jsonData = $.ajax({
        url: 'death_audit/data_death1.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{selectedquater_id:'<?=$quater_id?>' , frm1Graphh:'<?=$start?>',to1Graphh :'<?=$end?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'Condition at the time of admission',
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: false,
              bar: {groupWidth: "30%"},
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

            

            var chart_area = document.getElementById('1_chart');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;


           var jsonData = $.ajax({
        url: 'death_audit/data_death2.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{selectedquater_id:'<?=$quater_id?>' , frm1Graphh:'<?=$start?>',to1Graphh :'<?=$end?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'Condition at the time of admission',
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

            

          var chart_area = document.getElementById('All_chart');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        
   
}
        </script>  