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
	<table cellpadding="0" cellspacing="0" border="1"  border="1" align="center">
		<tr>
		<!-- <td style="text-align:center; background-color:#e6eeff;font-size: 14px;font-weight: bold; ">9</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff;"> OPD WAITING TIME FORM </td> -->
		<td valign="top">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>1. Total No. of OPD's</td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>2. Average OPD Waiting Time in Hrs.</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1" >

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
							$qry5_opd = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
							$s_count_opd = mysqli_num_rows($qry5_opd);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $s_count_opd;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$hr_num_opd = 0;
							$min_num_opd = 0;
							$sum_std_opd = 0;
							$tot_count_opd = 0;
							$numb3_opd = 0;
							$qry_opd = mysqli_query($connect,"SELECT opdwttm_opdwttm FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != '' ORDER BY opdwttm_id ASC")or die(mysqli_error($connect));
							while($res_opd = mysqli_fetch_array($qry_opd))
							{
								$sm_std_opd = $res_opd["opdwttm_opdwttm"];
								list($num1_opd, $num2_opd) = explode('.', $sm_std_opd);
								$hr_num_opd = $hr_num_opd + $num1_opd;
								$min_num_opd = $min_num_opd + $num2_opd;
							}
							$sum_std_opd = ($hr_num_opd * 60) + $min_num_opd;	
							
							$qry5_opd = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
							$s_count_opd = mysqli_num_rows($qry5_opd);
							
							$tot_count_opd = $sum_std_opd / $s_count_opd;
							if($tot_count_opd >= 60)
							{
								$tt_count_opd = $tot_count_opd / 60;
								list($number1_opd, $number2_opd) = explode('.', $tt_count_opd);
								
								$tot_min_opd = $tot_count_opd - ($number1_opd * 60);
								if($tot_min_opd >= 10)
								{
									$numb3_opd = $number1_opd.'.'.$tot_min_opd;
								}else if($tot_min_opd < 10){
									$a_opd = 0;
									$numbr3_opd = $number1_opd.'.'.$a_opd.''.$tot_min_opd;
									$numb3_opd = number_format($numbr3_opd,2);
								}		
							}else if($tot_count_opd < 60){
								list($numb1_opd, $numb2_opd) = explode('.', $tot_count_opd);
								$aj_opd = 0;
								$numbr3_opd = $aj_opd.'.'.$numb1_opd;
								$numb3_opd = number_format($numbr3_opd,2);
							}
					?>
					<td style="background-color:#f7f7ff; font-size: 16px;" id="ajj"><center><?php echo number_format($numb3_opd,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	</table>
