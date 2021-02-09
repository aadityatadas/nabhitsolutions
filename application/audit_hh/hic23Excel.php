<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');

$qut = $_POST['qut1'];
$yrg = $_POST['yr1'];
/*print_r($_POST);
die();*/
if(isset($_POST['pdf']));
{
    echo"<script>window.location='pdf.php?qut1=".$qut."'</script>";

}
 

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


	$output ='';


	$output.='
		
			<table border="1" class="table table-bordered table-hover" id="dataTables-example">
				<thead >
				<tr> 
           
           <th colspan="6" style="text-align: center;">
             <img src="'.HOSPITAL_NAME_IMAGE.'"  alt="" width="200" height="150" >
           </th>

           

             
         </tr>
            <tr>
              <th colspan="6" >
               
                <h1 style="text-align: center; text-decoration: underline;">'.HOSPITAL_NAME.'</h1> 
                 
              </th>
                    
            </tr>
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
	$score =  ($resYes / $mScore) * 100;
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
	$score =  ($mScore == 0)? 0 :($totalYes / $mScore) * 100;
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

		
	
 header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
?>