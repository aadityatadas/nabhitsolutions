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
	<table cellspacing="0" cellpadding="0" align="center" border="1">
<tr>
		<!-- <td style="text-align:center; background-color:#e6eeff;font-size: 14px;font-weight: bold;">5</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff;" > CENTRAL LINE ASSOCIATED BLOOD STREAM INFECTION FORM</td>-->
		<td valign="top">
			<table  style="font-size:14px;" cellspacing="0" cellpadding="0"  border="1" width="600px">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr  style="background-color:#f7f7ff; font-size: 16px;"><td>1. CLABSI Rate</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Total Central Line Days</td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>3. Positive CLABSI</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table  style="font-size:14px;" cellspacing="0" cellpadding="0" align="center" border="1" width="600px">

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
							$qry_clabsi = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as std_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr')")or die(mysqli_error($connect));
							$res_clabsi = mysqli_fetch_assoc($qry_clabsi);
							$i_count_clabsi = $res_clabsi["std_clabsi"];
							$qry2_clabsi = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
							$c_count_clabsi = mysqli_num_rows($qry2_clabsi);
							$clabsi_count = $c_count_clabsi*1000/$i_count_clabsi;
							if($clabsi_count > 0){
								$clabsicount = $clabsi_count;
							}else{
								$clabsicount = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size: 16px;" id="ajj"><center><?php echo number_format($clabsicount,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_clabsi = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as tcd_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_tcld != ''")or die(mysqli_error($connect));
							$res3_clabsi = mysqli_fetch_assoc($qry3_clabsi);
							$tcd_clabsi = $res3_clabsi["tcd_clabsi"];
							if($tcd_clabsi > 0){
								$tcdclabsi = $tcd_clabsi;
							}else{
								$tcdclabsi = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $tcdclabsi;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2clabsi = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
							$c_countclabsi = mysqli_num_rows($qry2clabsi);
					?>
					<td style="background-color:#f7f7ff; font-size: 16px;" id="ajj"><center><?php echo $c_countclabsi;?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	</table>