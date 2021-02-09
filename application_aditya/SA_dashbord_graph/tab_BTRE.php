<?php
	error_reporting(0);
	session_start();
	include"../dbinfo.php";
	$jan = date('Y-01');
	$feb = date('Y-02');
	$mar = date('Y-03');
	$apr = date('Y-04');
	$may = date('Y-05');
	$jun = date('Y-06');
	$jul = date('Y-07');
	$aug = date('Y-08');
	$sep = date('Y-09');
	$oct = date('Y-10');
	$nov = date('Y-11');
	$dec = date('Y-12');
	$yr = date('Y');
	?>
<table cellpadding="0" cellspacing="0" border="1" align="center" >
	<tr>
		<!-- <td style="text-align:center; font-size: 14px; font-weight: bold;">12</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"> BLOOD TRANSFUSION RELATED EVENTS </td>
		 --><td valign="top">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Average Turn around time for Blood</td></tr>
				<tr style="font-size: 16px;"><td>2. % of blood transfusion reaction</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. % of Blood Product Wastage</td></tr>
				<tr  style="font-size: 16px;"><td>4. % of Blood Component Usage</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1">

				 <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td> </tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$treq_bld = 0;
							$trec_bld = 0;
							$sql_bld = mysqli_query($connect,"SELECT bld_dtrec, bld_tmreq, bld_dtreq, bld_tmrec FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							while($rw_bld = mysqli_fetch_array($sql_bld))
							{
								$req_bld = strtotime($rw_bld["bld_dtreq"].' '.$rw_bld["bld_tmreq"]);
								$treq_bld = $treq_bld + $req_bld;
								$rec_bld = strtotime($rw_bld["bld_dtrec"].' '.$rw_bld["bld_tmrec"]);
								$trec_bld = $trec_bld + $rec_bld;
							}
							$diff_bld = abs($trec_bld - $treq_bld);
							$years_bld   = floor($diff_bld / (365*60*60*24)); 
							$months_bld  = floor(($diff_bld - $years_bld * 365*60*60*24) / (30*60*60*24)); 
							$days_bld    = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24)/ (60*60*24));
							$hours_bld   = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24 - $days_bld*60*60*24)/ (60*60)); 
							
							$hour_bld   = floor(($diff_bld) / (60*60)); 

							$minuts_bld  = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24 - $days_bld*60*60*24 - $hours_bld*60*60)/ 60); 
							
							$ht_mi_bld = $hour_bld.'.'.$minuts_bld;
							$sql1_bld = mysqli_query($connect,"SELECT * FROM tbl_blood_fusion WHERE bld_dtrec <> ''")or die(mysqli_error($connect));
							$rs_bld = mysqli_num_rows($sql1_bld);
							$min_bld = $ht_mi_bld / $rs_bld;
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($min_bld,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_bld = mysqli_query($connect,"SELECT bld_trfusreact FROM tbl_blood_fusion WHERE bld_trfusreact = 'Yes' AND (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rs_bld = mysqli_num_rows($sql_bld);
							$sql1_bld = mysqli_query($connect,"SELECT SUM(bld_notrfus) as tot_bld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rs1_bld = mysqli_fetch_array($sql1_bld);
							$tot_bld = $rs1_bld["tot_bld"];
							$tots_bld = ($rs_bld / $tot_bld) * 100;
							if($tots_bld > 0)
							{
								$totsbld = $tots_bld;
							}else{
								$totsbld = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><center><?php echo number_format($totsbld,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql1bld = mysqli_query($connect,"SELECT SUM(bld_waste_det) as totbld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rs1bld = mysqli_fetch_array($sql1bld);
							$totbld = $rs1bld["totbld"];
							$sqlbld = mysqli_query($connect,"SELECT SUM(bld_norec) as ttbld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rsbld = mysqli_fetch_array($sqlbld);
							$ttbld = $rsbld["ttbld"];
							$ttsbld = ($totbld / $ttbld) * 100;
							if($ttsbld > 0)
							{
								$tts = $ttsbld;
							}else{
								$tts = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($tts,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sqlbld2 = mysqli_query($connect,"SELECT SUM(bld_norec) as ttsbld2 FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rsbld2 = mysqli_fetch_array($sqlbld2);
							$ttsbld2 = $rsbld2["ttsbld2"];
							$sqlsbld2 = mysqli_query($connect,"SELECT SUM(bld_notrfus) as tttsbld2 FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rssbld2 = mysqli_fetch_array($sqlsbld2);
							$tttsbld2 = $rssbld2["tttsbld2"];
							$ttssbld2 = ($tttsbld2 / $ttsbld2) * 100;
							if($ttsbld2 > 0)
							{
								$ttss = $ttsbld2;
							}else{
								$ttss = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><center><?php echo number_format($ttss,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>