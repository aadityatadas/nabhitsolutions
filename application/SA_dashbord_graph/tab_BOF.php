
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
<table cellpadding="0" cellspacing="0" border="1" align="0" width="100%" border="1">
<tr>
		<!-- <td style="text-align:center; background-color:#e6eeff;font-size: 14px; font-weight: bold;">7</td>
		<td  style="font-weight: bold;font-size: 14px;background-color:#e6eeff; font-family: sans-serif;"> BED OCCUPANCY FORM </td> -->
		<td valign="top">
			<table width="100%" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1" align="0" width="100%" border="1">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#f7f7ff; font-size:16px;"><td>1. Total No. of Patient</td></tr>
				<tr style="background-color:#e6eeff; font-size:16px;"><td>2. Total No. of Discharge/Dama/Death</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;"  cellpadding="0" cellspacing="0" border="1" align="0" width="100%" border="1">

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
							$s_bed = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$cnt2_bed = mysqli_num_rows($s_bed);
					?>
					<td style="background-color:#f7f7ff; font-size:16px;" id="ajj"><center><?php echo $cnt2_bed;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$s3_bed = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE huf_ddd != '' AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$cnt3_bed = mysqli_num_rows($s3_bed);
					?>
					<td style="background-color:#e6eeff; font-size:16px;" id="ajj"><center><?php echo $cnt3_bed;?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	</table>