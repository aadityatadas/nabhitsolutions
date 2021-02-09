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
		<!-- <td  style="text-align:center;  font-weight: bold;font-size: 14px;">18</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"> OPD FEEDBACK FORM </td>
		 --><td valign="top">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1" >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Total No. of OPD Patient</td></tr>
				<tr style="font-size: 16px;"><td>2. Total No. of Patient Who Has Given Feedback</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. OPD Satisfaction Index</td></tr>
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
							$qry4_opdf = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr')")or die(mysqli_error($connect));
							$res4_opdf = mysqli_num_rows($qry4_opdf);
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo $res4_opdf;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2_opdf = mysqli_query($connect,"SELECT opd_id FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opd_user != ''")or die(mysqli_error($connect));
							$res2_opdf = mysqli_num_rows($qry2_opdf);
					?>
					<td style="font-size: 16px;" id="ajj"><center><?php echo $res2_opdf;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_opdf = mysqli_query($connect,"SELECT SUM(opd_score) as score_opdf FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opd_user != ''")or die(mysqli_error($connect));
							$res3_opdf = mysqli_fetch_assoc($qry3_opdf);
							$res_opdf = $res3_opdf["score_opdf"];
							
							$qry4_opdf = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr')")or die(mysqli_error($connect));
							$res4_opdf = mysqli_num_rows($qry4_opdf);
							
							$tot_scor_opdf = ($res_opdf / 120 / $res4_opdf) * 100;
							$resul_opdf = number_format($tot_scor_opdf,2);
							if($resul_opdf > 0)
							{
								$resulopdf = $resul_opdf; 
							}else{
								$resulopdf = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($resulopdf,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>

</table>