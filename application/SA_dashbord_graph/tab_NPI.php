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
<table cellspacing="0" cellpadding="0" border="1" align="center" >
	<tr>
		<!-- <td style="text-align:center;font-size: 14px;font-weight: bold;">10</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"> NEEDLE PRICK INJURY FORM </td> -->
		<td valign="top">
			<table width="600px" style="font-size:14px;" cellspacing="0" cellpadding="0" border="1">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. No. of Operational Exposure / Needle Prick Injury Incidences</td></tr>
				<tr style="font-size: 16px;"><td>2. Occupational Exposure Rate / Needle Prick Injury Rate</td></tr>
			</table>
		</td>
		<td colspan="13">
			<table width="600px" style="font-size:14px;" cellspacing="0" cellpadding="0" border="1">
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
							$qry_needl = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
							$res_needl = mysqli_num_rows($qry_needl);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $res_needl;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qryneedl = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
							$resneedl = mysqli_num_rows($qryneedl);
							
							$qrneedl = mysqli_query($connect,"SELECT SUM(huf_lens) as stdneedl FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rsneedl = mysqli_fetch_assoc($qrneedl);
							$i_countneedl = $rsneedl["stdneedl"];
							
							$rateneedl = ($resneedl / $i_countneedl) * 1000;
							if($rateneedl > 0)
							{
								$rateneedl2 = $rateneedl;
							}else{
								$rateneedl2 = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><center><?php echo number_format($rateneedl2,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>