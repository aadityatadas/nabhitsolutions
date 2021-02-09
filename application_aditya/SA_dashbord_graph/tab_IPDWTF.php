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
		<!-- <td style="text-align:center;font-size: 14px;font-weight: bold; ">8</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; "> IPD WAITING TIME FORM </td> -->
		<td valign="top">
			<table width="600px" style="font-size:14px;" cellspacing="0" cellpadding="0" border="1" align="center" >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#f7f7ff; font-size:16px;"><td>Average IPD Waiting Time</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="600px" style="font-size:14px;"cellspacing="0" cellpadding="0" border="1" align="center">

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
							$qry_ipd = mysqli_query($connect,"SELECT SUM(wttm_opdwttm) as std_ipd FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$res_ipd = mysqli_fetch_assoc($qry_ipd);
							$i_count_ipd = $res_ipd["std_ipd"];
							
							$qry5_ipd = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE wttm_opdwttm != '' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$s_count_ipd = mysqli_num_rows($qry5_ipd);
							$tot_count_ipd = $i_count_ipd / $s_count_ipd;
							if($tot_count_ipd > 0)
							{
								$totcount_ipd = $tot_count_ipd;
							}else{
								$totcount_ipd = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size:16px;" id="ajj"><center><?php echo number_format($totcount_ipd,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>