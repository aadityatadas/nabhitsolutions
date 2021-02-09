
<?php  

//index.php
include("../application/dbinfo.php");






if(isset($_POST['auditSelectedMonthDR11_pdf']) && isset($_POST['auditSelectedYearDR21_pdf'])){


$monthR1 = $_POST['auditSelectedMonthDR11_pdf'];
$yearR1 = $_POST['auditSelectedYearDR11_pdf'];

$monthR2 = $_POST['auditSelectedMonthDR21_pdf'];
$yearR2 = $_POST['auditSelectedYearDR21_pdf'];

if($monthR1 >= $monthR2){
  $max = $monthR1;
  $min = $monthR2;
} else{
    $max = $monthR2;
    $min = $monthR1;
}

} else{
  echo "Error In Range Selection";

  die();
}


$dataA=array();

$dataA[0] = array(0=>'Patient Name' , 1 =>'patient_name_present');
$dataA[1] = array(0=>'Medicatioy written in CAPS & Legible' , 1 =>'medic_caps_legible');
$dataA[2] = array(0=>'Dose' , 1 =>'dose');
$dataA[3] = array(0=>'Quantity' , 1 =>'quantity');
$dataA[4] = array(0=>'Date of prescription ' , 1 =>'date_prescription');
$dataA[5] = array(0=>'High risk medication verified' , 1 =>'high_risk_medicn_verified');
$dataA[6] = array(0=>'Signature of Doctor' , 1 =>'sign_of_doc');
$dataA[7] = array(0=>'Prescription written by autorized person' , 1 =>'pre_by_auth_person');
$dataA[8] = array(0=>'Drug name is clear' , 1 =>'drug_name_clear');
$dataA[9] = array(0=>'Dose Route is correct' , 1 =>'dose_corret');
$dataA[10] = array(0=>'Time is written on prescription  ' , 1 =>'time_prescription');
$dataA[11] = array(0=>'Sign of authorized person on prescription' , 1 =>'sign_of_auth');



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
        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var max = <?=$max?>;
        var min = <?=$min?>;
        var yearR1=<?=$yearR1?>;

        var data = <?php echo json_encode($dataA); ?>;
        data.forEach((da,index)=> {
            

            // chart one
        var jsonData = $.ajax({
        url: 'priscption/data_monthly_audit.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{max:max,min:min,year:yearR1,frm:da[1],tbl:'tbl_prescription_audit'},
        success: function(jsonData)
          {
             var options = {
          title : da[0],
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: true,
          chartArea:{'backgroundColor': {
                  'fill': '#F4F4F4',
                  'opacity': 100
                 } },
          backgroundColor: 'transparent',
          hAxis: {
                  title: 'Month',
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
                  minValue: 0, maxValue: 100
                  
               }, 
              
        };
            
            var data1 = new google.visualization.arrayToDataTable(jsonData); 

            

            var chart_area = document.getElementById(da[1]+'_chart');

          var chart = new google.visualization.LineChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        });
   

    
    
       


      }
        </script>  
        
    </head>  
    <body>  
       
   

        <div class="container" id="testing"> 

          
            
   <div class="panel panel-default">
    <div class="panel-heading">
    
    </div>

    <h1 align="center"><u>Prescription Audit</u></h1>  
           
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

<p style="page-break-before: always">
<?php
$data= array();
$monthsAll = array();
$total = 0;
$totalAll = 0;


for($i= $min;$i<=$max;$i++){

  $patient_name_present=0;
  $medic_caps_legible=0;
  $dose=0;
  $quantity=0;
  $date_prescription=0;
  $high_risk_medicn_verified=0;
  $sign_of_doc=0;

  $pre_by_auth_person=0;
  $drug_name_clear=0;
  $dose_corret=0;
  $time_prescription=0;
  $sign_of_auth=0;

  $query1 = "SELECT count(*) as c FROM tbl_huf where month(huf_dadm) = '$i' and year(huf_dadm) = '$yearR1'";



$result1 = mysqli_query($connect, $query1);


$row1 = $result1->fetch_row();

$count1 = $row1[0];

$totalAll = $totalAll + $count1;

$query = "SELECT * FROM tbl_prescription_audit WHERE (month(monthyear)='$i' AND  year(monthyear)='$yearR1')";

$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;
$total = $total + $mlc_count;

 foreach ($result as $key => $row) {
   

   if($row["patient_name_present"]=='Yes'){
      $patient_name_present++;
    }
    if($row["medic_caps_legible"]=='Yes'){
      $medic_caps_legible++;
    }
    if($row["dose"]=='Yes'){
      $dose++;
    }
    if($row["quantity"]=='Yes'){
      $quantity++;
    }
    if($row["date_prescription"]=='Yes'){
      $date_prescription++;
    }
    if($row["high_risk_medicn_verified"]=='Yes'){
      $high_risk_medicn_verified++;
    }
    if($row["sign_of_doc"]=='Yes'){
      $sign_of_doc++;
    }

    if($row["pre_by_auth_person"]=='Yes'){
      $pre_by_auth_person++;
    }
    if($row["drug_name_clear"]=='Yes'){
      $drug_name_clear++;
    }
    if($row["dose_corret"]=='Yes'){
      $dose_corret++;
    }
    if($row["time_prescription"]=='Yes'){
      $time_prescription++;
    }
    if($row["sign_of_auth"]=='Yes'){
      $sign_of_auth++;
    }



   // [patient_name_present] => [medic_caps_legible] => [dose] => [quantity] => [date_prescription] => [high_risk_medicn_verified] => [sign_of_doc] =>
   
 }
     //echo count($result);
        if($mlc_count){
       $patient_name_present_per=($patient_name_present/$mlc_count)*100;
       $medic_caps_legible_per=($medic_caps_legible/$mlc_count)*100;
       $dose_per=($dose/$mlc_count)*100;
       $quantity_per=($quantity/$mlc_count)*100;
       $date_prescription_per=($date_prescription/$mlc_count)*100;
       $high_risk_medicn_verified_per=($high_risk_medicn_verified/$mlc_count)*100;
       $sign_of_doc_per=($sign_of_doc/$mlc_count)*100;

       $pre_by_auth_person_per=($pre_by_auth_person/$mlc_count)*100;
       $drug_name_clear_per=($drug_name_clear/$mlc_count)*100;
       $dose_corret_per=($dose_corret/$mlc_count)*100;
       $time_prescription_per=($time_prescription/$mlc_count)*100;
       $sign_of_auth_per=($sign_of_auth/$mlc_count)*100;

       $monthName = date("F", mktime(0, 0, 0, $i, 10))."-".$yearR1;
        $monthsAll[] = $monthName;
       $data[] = array(
            'month'=> $monthName,
            'count' => $mlc_count,
            'patient_name_present' => $patient_name_present_per,
            'medic_caps_legible' => $medic_caps_legible_per,
            'dose' => $dose_per,
            'quantity' => $quantity_per,
            'date_prescription' => $date_prescription_per,
            'high_risk_medicn_verified' => $high_risk_medicn_verified_per,
            'sign_of_doc' => $sign_of_doc_per,
            'pre_by_auth_person' => $pre_by_auth_person_per,
            'drug_name_clear' => $drug_name_clear_per,
            'dose_corret' => $dose_corret_per,
            'time_prescription' => $time_prescription_per,
            'sign_of_auth' => $sign_of_auth_per,






       );
     }



}


?>

            
   

    <h2 align="center"><u>Prescription Audit</u></h2>  
           
    
 <ul>Title- To check the compliance of  prescription as per NABH Standard. <br>
Type of Audit- Retrospective <br>
Month- <?= $monthsAll[0]  ?>   to   <?=$monthsAll[count($monthsAll)-1]?>  <br>
Number of prescription audited- <?=round($total * 100 / $totalAll)?>% of total prescription (sample size)<br>
<br><br>
</ul>

 <h3 align="left"><u>Methodology</u></h3> 

 <ul>
  The study was conducted  in Criticare Hospital & Reserch Institute. 
  <br><br>The study was carried over a period of <?=count($monthsAll)?> months from <?=$monthsAll[0]?> to <?=$monthsAll[count($monthsAll)-1]?>. . 
  <br><br>A total of <?=$total?> In-patient prescriptions were randomly sampled from the hospital pharmacy.
  <br><br>The details of all the prescriptions were analyzed on the following parameters:
  <ul>
<br>
    <li>Patient Name on prescription</li><br>
<li>Medication written in CAPS & Legible</li><br>
<li>Dose mentioned</li><br>
<li>Quantity mentioned</li><br>
<li>Date of prescription</li><br>
<li>High risk medication verified prior to dispensing</li><br>
<li>Signature of Doctor on prescription</li><br>
  </ul>
 </ul>

           
<p style="page-break-before: always"></p>

  <h2 align="left"><u>Analysis</u></h2> 


<ul>
  <li>The area of adherence and their compliance is shown below</li>
  
</ul> 



<table class="table" border="1" > 
            <tr>  
                  <th style="width: 10%">Sr. No.</th>
                  <th width="30%">Audit element in prescription
                  </th>


      <?php 
               $countid = 1;

                   foreach ($data as $key => $da) {
           
                   echo '<th align="center">'.$da['month'].'('.$da['count'].')</th>';    
          }

          ?>

        </tr>

     <?php   foreach ($dataA as $key => $val) {
       echo '<tr><th style="width: 10%">'.++$key.'</th>
                  <th width="30%">'.$val[0].'
                  </th> ';

         foreach ($data as $key => $da) {
           
           echo '<th align="center">'.number_format($da[$val[1]],2).'</th>';    
      }

      echo '</tr>';


   }
  

?>



</table>


      <?php foreach ($dataA as $key => $value) { ?>
          <div id="<?=$value[1]?>_chart" style="width: 100%; max-width:730px; height: 300px; "></div>
          
    
   <?php   } ?>
    
<h3 align="left"><u>1)Corrective Action</u></h2>  
 <br>   
<ol>
  <?php foreach ($monthsAll as $key => $value) { 
$output=[];
    $query = "SELECT corrective_action  FROM `tbl_monthly_audit_reports`
          
            WHERE audit_date_month_year = '".$value."' 
        AND audit_name='tbl_prescription_audit'";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output = json_decode($row["corrective_action"]);
         
  }
foreach ($output as $key1 => $out) {
  if($key1!=100){
  
 
  echo '<li>'.$out.'</li><br>';
}
}
?>
    
 <?php } ?>
</ol>
  
  
<br>

<h3 align="left"><u>2)Preventive Action</u></h2>  
     

  
  <ol>
  <?php foreach ($monthsAll as $key => $value) { 
$output=[];
    $query = "SELECT preventive_action  FROM `tbl_monthly_audit_reports`
          
            WHERE audit_date_month_year = '".$value."' 
        AND audit_name='tbl_prescription_audit'";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output = json_decode($row["preventive_action"]);
         
  }
foreach ($output as $key1 => $out) {
  if($key1!=100){
  
 
  echo '<li>'.$out.'</li><br>';
}
}
?>
    
 <?php } ?>
</ol>

   



   
  </div> 
 
  <br />
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


    
