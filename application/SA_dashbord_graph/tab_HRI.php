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
		<!-- <td  style="text-align:center; font-size: 14px; background-color: #e6eeff; font-weight: bold;">15</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color: #e6eeff;"> HR INDICATOR </td>
		 --><td valign="top">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1" align="center" width="100%">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#f7f7ff; font-size:16px;"><td>1. Employee Absentism Rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>2. Employee Satisfaction Rate</td></tr>
				<tr style="background-color:#f7f7ff; font-size:16px;"><td>3. Employee Griviences rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>4. Needle Prick Injury Rate</td></tr>
				<tr style="background-color:#f7f7ff; font-size:16px;"><td>5. Occupational Exposure rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>6. % of complete HR files</td></tr>
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
							$sql_hr = mysqli_query($connect,"SELECT SUM(hr_absent) as abs_hr FROM tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs_hr = mysqli_fetch_array($sql_hr);
							$abs_hr = $rs_hr["abs_hr"];
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$tabss1_hr = ($abs_hr/$rq_hr/30) * 100;
							if($tabss1_hr > 0)
							{
								$tabs1_hr = number_format($tabss1_hr,2);
							}else{
								$tabs1_hr = 0;
							}
					?>
					<td  style="background-color:#f7f7ff; font-size:16px;" id="ajj"><center><?php echo number_format($tabs1_hr,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql2_hr = mysqli_query($connect,"SELECT SUM(hr_satis_score) as abs2_hr FROM tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs2_hr = mysqli_fetch_assoc($sql2_hr);
							$abs2_hr = $rs2_hr["abs2_hr"];
							$tabss2_hr = ($abs2_hr/$rq_hr);
							if($tabss2_hr > 0)
							{
								$tabs2_hr = $tabss2_hr;
							}else{
								$tabs2_hr = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($tabs2_hr,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql3_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_griv = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs3_hr = mysqli_num_rows($sql3_hr);
							$tabss3_hr = ($rs3_hr/$rq_hr) * 100;
							if($tabss3_hr > 0)
							{
								$tabs3_hr = $tabss3_hr;
							}else{
								$tabs3_hr = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size:16px;" id="ajj"><center><?php echo number_format($tabs3_hr,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql4_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_need_inj = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs4_hr = mysqli_num_rows($sql4_hr);
							$tabss4_hr = ($rs4_hr/$rq_hr) * 100;
							if($tabss4_hr > 0)
							{
								$tabs4_hr = $tabss4_hr;
							}else{
								$tabs4_hr = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($tabs4_hr,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql5_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_occpany = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs5_hr = mysqli_num_rows($sql5_hr);
							$tabss5_hr = ($rs5_hr/$rq_hr) * 100;
							if($tabss5_hr > 0)
							{
								$tabs5_hr = $tabss5_hr;
							}else{
								$tabs5_hr = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size:16px;" id="ajj"><center><?php echo number_format($tabs5_hr,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql6_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_per_file = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs6_hr = mysqli_num_rows($sql6_hr);
							$tabss6_hr = ($rs6_hr/$rq_hr) * 100;
							if($tabss6_hr > 0)
							{
								$tabs6_hr = $tabss6_hr;
							}else{
								$tabs6_hr = 0;
							}
					?>
					<td  style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($tabs6_hr,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>