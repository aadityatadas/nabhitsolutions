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
<table cellpadding="0" cellspacing="0" border="1" align="center">
	<tr>
		<!-- <td style="text-align:center; font-size: 14px; font-weight: bold;">16</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;" > EQUIPMENT INDICATOR </td>
		 --><td valign="top">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Equipement Breakdown Time</td></tr>
				<tr style="font-size: 16px;"><td>2. No. of Equipement under Warranty</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. No. of Equipement under AMC</td></tr>
				<tr style="font-size: 16px;"><td>4. % of AMC</td></tr>
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
							$treq_eqp = 0;
							$trec_eqp = 0;
							$sql_eqp = mysqli_query($connect,"SELECT eqp_dtbr, eqp_dtrp FROM tbl_eqp_indic WHERE (month(eqp_dtbr) = '$month' AND year(eqp_dtbr) = '$yr')")or die(mysqli_error($connect));
							while($rw_eqp = mysqli_fetch_array($sql_eqp))
							{
								$req_eqp = strtotime($rw_eqp["eqp_dtbr"]);
								$treq_eqp = $treq_eqp + $req_eqp;
								$rec_eqp = strtotime($rw_eqp["eqp_dtrp"]);
								$trec_eqp = $trec_eqp + $rec_eqp;
							}
							$diff_eqp = abs($trec_eqp - $treq_eqp);
							$years_eqp   = floor($diff_eqp / (365*60*60*24)); 
							$months_eqp  = floor(($diff_eqp - $years_eqp * 365*60*60*24) / (30*60*60*24)); 
							$days_eqp    = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24)/ (60*60*24));
							$hours_eqp   = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24 - $days_eqp*60*60*24)/ (60*60)); 
							
							$hour_eqp   = floor(($diff_eqp) / (60*60)); 

							$minuts_eqp  = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24 - $days_eqp*60*60*24 - $hours_eqp*60*60)/ 60); 
							
							$ht_mi_eqp = $hour_eqp.'.'.$minuts_eqp;
							$sql1_eqp = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic")or die(mysqli_error($connect));
							$rs_eqp = mysqli_num_rows($sql1_eqp);
							$min_eqp = $ht_mi_eqp / $rs_eqp;
							if($min_eqp > 0)
							{
								$mineqp = $min_eqp;
							}else{
								$mineqp = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($mineqp,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq2_eqp = mysqli_query($connect,"SELECT eqpid FROM tbl_eqp_mast WHERE (month(eqp_wty1) = '$month' OR month(eqp_wty1) < '$month' AND year(eqp_wty1) = '$yr' OR year(eqp_wty1) < '$yr') AND (month(eqp_wty2) > '$month' AND year(eqp_wty2) = '$yr' OR year(eqp_wty2) > '$yr')")or die(mysqli_error($connect));
							$rs2_eqp = mysqli_num_rows($sq2_eqp);
					?>
					<td style="font-size: 16px;" id="ajj"><center><?php echo $rs2_eqp;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq3_eqp = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic WHERE (month(eqp_amc1) = '$month' OR month(eqp_amc1) < '$month' AND year(eqp_amc1) = '$yr' OR year(eqp_amc1) < '$yr') AND (month(eqp_amc2) > '$month' AND year(eqp_amc2) = '$yr' OR year(eqp_amc2) > '$yr')")or die(mysqli_error($connect));
							$rs3_eqp = mysqli_num_rows($sq3_eqp);
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo $rs3_eqp;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql4_eqp = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast")or die(mysqli_error($connect));
							$rs4_eqp = mysqli_num_rows($sql4_eqp);					
							
							$sql5_eqp = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast LEFT JOIN tbl_eqp_indic ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE (month(tbl_eqp_indic.eqp_amc1) = '$month' OR month(tbl_eqp_indic.eqp_amc1) < '$month' AND year(tbl_eqp_indic.eqp_amc1) = '$yr' OR year(tbl_eqp_indic.eqp_amc1) < '$yr') AND (month(tbl_eqp_indic.eqp_amc2) > '$month' AND year(tbl_eqp_indic.eqp_amc2) = '$yr' OR year(tbl_eqp_indic.eqp_amc2) > '$yr')")or die(mysqli_error($connect));
							$rs5_eqp = mysqli_num_rows($sql5_eqp);
							
							$tt5_eqp = ($rs5_eqp / $rs4_eqp) * 100;
							if($tt5_eqp > 0)
							{
								$tt5eqp = $tt5_eqp; 
							}else{
								$tt5eqp = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><center><?php echo number_format($tt5eqp,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>

</table>