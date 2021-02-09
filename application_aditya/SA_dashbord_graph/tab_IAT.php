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
       <table  style="font-size: 15px;" border="1" cellpadding="0" cellspacing="0" align="center" >
<tr>
		<!-- <td style="text-align:center;font-size: 14px;font-weight: bold;">2</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; "> INITIAL ASSESSEMENT TIME </td> -->
		<td valign="top">
			<table width="600px" style="font-size:14px;" border="1" cellpadding="0" cellspacing="0" >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>Averarge Intial Assessment Time in Hrs.</td></tr>
			</table>
		</td>

		<td valign="top" colspan="12">
			<table width="700px" style="font-size:14px;" border="1" cellpadding="0" cellspacing="0" >


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
						for($month = 1; $month <= 12; $month ++)
						{
							$hr_num = 0;
							$min_num = 0;
							$sum_std = 0;
							$tot_count = 0;
							$numb3 = 0;
							$qry = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
							while($res = mysqli_fetch_array($qry))
							{
								$sm_std = $res["int_tottm"];
								list($num1, $num2) = explode('.', $sm_std);
								$hr_num = $hr_num + $num1;
								$min_num = $min_num + $num2;
							}
							$sum_std = ($hr_num * 60) + $min_num;	
						
							$qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != ''")or die(mysqli_error($connect));
							$s_count = mysqli_num_rows($qry5);
							
							$tot_count = $sum_std / $s_count;
							if($tot_count >= 60)
							{
								$tt_count = $tot_count / 60;
								list($number1, $number2) = explode('.', $tt_count);
								
								$tot_min = $tot_count - ($number1 * 60);
								if($tot_min >= 10)
								{
									$numb3 = $number1.'.'.$tot_min;
								}else if($tot_min < 10){
									$a = 0;
									$numbr3 = $number1.'.'.$a.''.$tot_min;
									$numb3 = $numbr3;
								}		
							}else if($tot_count < 60){
								list($numb1, $numb2) = explode('.', $tot_count);
								$aj = 0;
								$numbr3 = $aj.'.'.$numb1;
								$numb3 = $numbr3;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center>&nbsp;&nbsp;&nbsp;<?php echo number_format($numb3,2);?>&nbsp;&nbsp;&nbsp;</center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>