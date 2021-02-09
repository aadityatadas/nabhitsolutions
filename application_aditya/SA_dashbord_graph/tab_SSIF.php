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
		<!-- <td style="text-align:center;font-size: 14px;font-weight: bold;">6</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"> SURGICAL SITE INFECTION FORM </td> -->
		<td valign="top"> 
			<table width="600px" style="font-size:14px;"  cellpadding="0" cellspacing="0" width="100%" border="1" align="center">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. SSI Rate</td></tr>
				<tr style="font-size:16px;"><td>2. Symptoms Of SSI</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Positive SSI</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="600px" style="font-size:14px;"  cellpadding="0" cellspacing="0" width="100%" border="1" align="center">

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
							$qry2_ssi = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
							$i_count_ssi = mysqli_num_rows($qry2_ssi);
							$qry3_ssi = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND huf_surg = 'Surgery' ")or die(mysqli_error($connect));
							$c_count_ssi = mysqli_num_rows($qry3_ssi);
							$ssi_cnt_ssi = ($i_count_ssi/$c_count_ssi)*100; // - 0.13;
							$ssi_count_ssi = (float)$ssi_cnt_ssi;
							if($ssi_count_ssi > 0)
							{
								$ssicount = $ssi_count_ssi;
							}else{
								$ssicount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo number_format($ssicount,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry4_ssi = mysqli_query($connect,"SELECT surg_symp FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_symp = 'Yes'")or die(mysqli_error($connect));
							$s_ssicount = mysqli_num_rows($qry4_ssi);
							
					?>
					<td id="ajj"><center><?php echo $s_ssicount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2_ssi = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
							$i_ssicount = mysqli_num_rows($qry2_ssi);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $i_ssicount;?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>