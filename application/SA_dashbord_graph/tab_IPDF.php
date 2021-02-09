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
		<!-- <td  style="text-align:center; background-color: #e6eeff; font-weight: bold;font-size: 14px;">17</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color: #e6eeff;"> IPD FEEDBACK FORM </td>
		 --><td valign="top">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1" >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Total No. of IPD Patient</td></tr>
				<tr style="background-color:#f7f7ff; font-size:16px;"><td>2. Total No. of Patient Who Has Given Feedback</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. IPD Satisfaction Index</td></tr>
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
							$qry4_ipdf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr')")or die(mysqli_error($connect));
							$res4_ipdf = mysqli_num_rows($qry4_ipdf);
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo $res4_ipdf;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2_ipdf = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr') AND ipd_user != ''")or die(mysqli_error($connect));
							$res2_ipdf = mysqli_num_rows($qry2_ipdf);
					?>
					<td style="background-color:#f7f7ff;  font-size:16px;" id="ajj"><center><?php echo $res2_ipdf;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_ipdf = mysqli_query($connect,"SELECT SUM(ipd_score) as score_ipdf FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr') AND ipd_user != ''")or die(mysqli_error($connect));
							$res3_ipdf = mysqli_fetch_assoc($qry3_ipdf);
							$res_ipdf = $res3_ipdf["score_ipdf"];
							
							$qry4_ipdf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr')")or die(mysqli_error($connect));
							$res4_ipdf = mysqli_num_rows($qry4_ipdf);
							
							$tot_scor_ipdf = ($res_ipdf / 120 / $res4_ipdf) * 100;
							$resul_ipdf = $tot_scor_ipdf;
							if($resul_ipdf > 0)
							{
								$resulipdf = $resul_ipdf; 
							}else{
								$resulipdf = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($resulipdf,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>

</table>