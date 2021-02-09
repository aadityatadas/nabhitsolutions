<?php
//index.php
//include autoloader

//require_once 'dompdf/autoload.inc.php';
//$typ = $_SESSION['typ'];
include('../dbinfo.php');
//include('pdfFile.php');
//include('../function.php');
//print_r($_POST);
 $qut = $_GET['qut1'];

 $data = array();
$query = '';


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

// reference the Dompdf namespace

//use Dompdf\Dompdf;

//initialize dompdf class

//$pdf = new Dompdf();

//use Dompdf\Options;
// Reference the Font Metrics namespace
//use Dompdf\FontMetrics;

// Set options to enable embedded PHP
//$options = new Options();
//$options->set('isPhpEnabled', 'true'); 

?>

 
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<table>
<tr> 
           
           <th colspan='9' style='text-align: center;'>
             <img src='hosp.png'  alt='' width='200' height='150'>
           </th>


             
         </tr>
            <tr>
              <th colspan='9' >
               
                <h1 style='text-align: center; text-decoration: underline;'><?= HOSPITAL_NAME ?></h1> 
                 
              </th>
                    
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
<?php

$n = 1;
				$totalYes = 0;
				$totalNo  = 0;
				$totalNa  = 0;
	foreach ($dArry as $aud) {
		
	$tbl = $aud[1];

    $tbl = $aud[1];


	$sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND yn_val = 'Yes' ORDER BY id ASC";
	$rs = mysqli_query($connect, $sq);
	$resYes = mysqli_fetch_row($rs)[0];

	$sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND yn_val = 'No' ORDER BY id ASC";
	$rs = mysqli_query($connect, $sq);
	$resNo = mysqli_fetch_row($rs)[0];

	$sq = "SELECT count(yn_val) as yCount FROM $tbl WHERE quarter = '".$qut."' AND yn_val = 'NA' ORDER BY id ASC";
	$rs = mysqli_query($connect, $sq);
	$resNa = mysqli_fetch_row($rs)[0];

	$pscore = $resYes + $resNo + $resNa;
	$mScore = $pscore - $resNa;
	$score =  ($mScore == 0)? 0 :($resYes / $mScore) * 100;
    $score = (is_nan($score))? 0 : $score;

	$totalYes = $totalYes + $resYes;
	$totalNo  = $totalNo  + $resNo;
	$totalNa  = $totalNa  + $resNa;
	?>
			<tr>
						<td><?= $n ?></td>
						<td><?= $aud[0] ?></td>
						<td><?= $resYes ?></td>
						<td><?= $resNo ?></td>
						<td><?= $resNa ?></td>
						<td><?= $pscore ?></td>
						<td><?= $mScore ?></td>
						<td><?= $score ?></td>
						<td></td>
					</tr>
	<?php
$n++;

	}

	$pscore = $totalYes + $totalNo + $totalNa;
	$mScore = $pscore - $totalNa;
	$score =  ($totalYes / $mScore) * 100;
	$score = (is_nan($score))? 0 : $score;

?>
					<tr>
						<td colspan="2" style="text-align:center;">Total</td>
						<td><?= $totalYes ?></td>
						<td><?= $totalNo ?></td>
						<td><?= $totalNa  ?></td>
						<td><?= $pscore ?></td>
						<td><?= $mScore ?></td>
						<td><?= $score ?></td>
						<td></td>
					</tr>

</table>



            <style>
		body
		{
			margin:0;
			padding:0;
		}
		.container
		{
			margin:0 auto;
			padding:16px;
			background-color:#f1f1f1;
			margin-top:36px;
			border:1px solid #ccc;
			width:800px;
		}
		h1
		{
			font-size:24px;
			color:#0086b3;
			line-height:36px;
		}
		p
		{
			font-family:san-serif;
			font-size:16px;
			line-height:18px;
			color:#333;
		}
		img
		{
			padding:8px;
			border:1px solid #ccc;
		}
		</style>
		<h1>Graph : </h1>
		<div id="line_chart1" style="height:400px;"></div>
		
<h1>Conclusion : </h1>
			
			<p>Conducting an audit is an essential function of the infection control team. Every hospital had robust practices and policies in place, however,  evidence that these policies are being complied with, is known through conducting audits. Audits not only decrease HCAIs but also improve the  overall quality of patient care. We hope that this CME had helped you to understand the significance of audit in IPC and will motivate you to practice this in your set up. </p>
			<br />
    

<script type='text/javascript'>
      $(document).ready(function() {
      		google.load('visualization',"1", {'packages':['corechart']});
        	var qutVal = '<?php echo $qut; ?>';
            //console.log(qutVal);

			$.ajax({
						url:'fetch_all_Audit.php',
						method:'POST',
						data:{qutVal: qutVal},
						dataType:'json',
						success:function(data)
						{
							//console.log(data.output);
							//$('#tblRepalce').empty().append(data.output);

							var yesT = '<?= $totalYes ?>';
							var noT  = '<?= $totalNo ?>';
							var naT  = '<?= $totalNa  ?>';


							var jsonData = $.ajax({
							url: 'chart.php',
							dataType:'json',
							method:'POST',
							async: false,
							data:{yesT:yesT,noT:noT,naT:naT,qutVal:qutVal},
							success: function(jsonData)
								{
									var options = 
									{
										title:'Audit Details',
										legend: '',
										hAxis: { minValue: 0, maxValue: 10 },
										//curveType: 'function',
										pointSize: 7,
										dataOpacity: 0.3
									};
									var data = new google.visualization.arrayToDataTable(jsonData);	
									var chart = new google.visualization.ColumnChart(document.getElementById('line_chart1'));
									google.visualization.events.addListener(chart, 'ready', function(){
               chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
           });
           /*chart.draw(data, options);*/
									chart.draw(data, options);
									
								}	
							}).responseText;
							
						}
					});
  });
        </script> 