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
	<table cellspacing="0" cellpadding="0" align="center" width="600px" border="1">
<tr>
		<!-- <td style="text-align:center;font-size: 14px;font-weight: bold;">4</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"> CATHETER ASSOCIATED UNRINARY TRACT INFECTION </td> -->
		<td valign="top">
			<table width="600px" style="font-size:14px;"  border="1" cellspacing="0" cellpadding="0" align="center" width="100%">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. CAUTI Rate</td></tr>
				<tr style="font-size: 16px;"><td>2. Total Catheter Days</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Positive CAUTI</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="600px" style="font-size:14px;" border="1" cellspacing="0" cellpadding="0" align="center" width="100%">

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
							$qry_cath = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as std_cath FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr')")or die(mysqli_error($connect));
							$res_cath = mysqli_fetch_assoc($qry_cath);
							$i_count_cath = $res_cath["std_cath"];
							$qry2_cath = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
							$c_count_cath = mysqli_num_rows($qry2_cath);
							$cauti_count_cath = $c_count_cath*1000/$i_count_cath;
							if($cauti_count_cath > 0){
								$cauti_countcath = $cauti_count_cath;
							}else{
								$cauti_countcath = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo number_format($cauti_countcath,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_cath3 = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as tcd_cath3 FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_tcd != ''")or die(mysqli_error($connect));
							$res_cath3 = mysqli_fetch_assoc($qry_cath3);
							$tcd_cath3 = $res_cath3["tcd_cath3"];
							if($tcd_cath3 > 0){
								$tcdcath3 = $tcd_cath3;
							}else{
								$tcdcath3 = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><center><?php echo number_format($tcdcath3,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_cath2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
							$c_cathcount = mysqli_num_rows($qry_cath2);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $c_cathcount;?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	</table>