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
<table cellpadding="0" cellspacing="0" border="1" align="center" >
	<tr>
		<!-- <td style="text-align:center; background-color: #e6eeff;font-size: 14px;font-weight: bold; ">13</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color: #e6eeff;"> CARE RELATED EVENTS </td>
		 --><td valign="top">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1" >
			    <tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Thromboplebitis Rate</td></tr>
				<tr style="background-color:#f7f7ff;  font-size:16px;"><td>2. Hematoma Rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. Bed Score Rate</td></tr>
				<tr style="background-color:#f7f7ff;  font-size:16px;"><td>4. Patient Fall Rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>5. Accidental Removal of Drains and Lines Rate</td></tr>
				<tr style="background-color:#f7f7ff;  font-size:16px;"><td>6. Injury to Patient Rate</td></tr>
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
							$qry_car = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car = mysqli_fetch_assoc($qry_car);
							$i_count_car = $res_car["std_car"];
							
							$qry2_car1 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsymp_th = 'Yes'")or die(mysqli_error($connect));
							$thromb_car1 = mysqli_num_rows($qry2_car1);
							$res_thromb_car1 = ($thromb_car1 / $i_count_car) * 1000;
							if($res_thromb_car1 > 0)
							{
								$res_thromb1 = $res_thromb_car1;
							}else{
								$res_thromb1 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($res_thromb1,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car2 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car2 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car2 = mysqli_fetch_assoc($qry_car2);
							$i_count_car2 = $res_car2["std_car2"];
							
							$qry2_car2 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsymp = 'Yes'")or die(mysqli_error($connect));
							$thromb_car2 = mysqli_num_rows($qry2_car2);
							$res_thromb_car2 = ($thromb_car2 / $i_count_car2) * 1000;
							if($res_thromb_car2 > 0)
							{
								$res_thromb2 = $res_thromb_car2;
							}else{
								$res_thromb2 = 0;
							}
							
					?>
					<td  style="background-color:#f7f7ff; font-size:16px;" id="ajj"><center><?php echo number_format($res_thromb2,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car3 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car3 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car3 = mysqli_fetch_assoc($qry_car3);
							$i_count_car3 = $res_car3["std_car3"];
							
							$qry2_car3 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsyp_bed = 'Yes'")or die(mysqli_error($connect));
							$thromb_car3 = mysqli_num_rows($qry2_car3);
							$res_thromb_car3 = ($thromb_car3 / $i_count_car3) * 1000;
							if($res_thromb_car3 > 0)
							{
								$res_thromb3 = $res_thromb_car3;
							}else{
								$res_thromb3 = 0;
							}
					?>
					<td  style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($res_thromb3,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car4 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car4 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car4 = mysqli_fetch_assoc($qry_car4);
							$i_count_car4 = $res_car4["std_car4"];
							
							$qry2_car4 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_incd_ptfall = 'Yes'")or die(mysqli_error($connect));
							$thromb_car4 = mysqli_num_rows($qry2_car4);
							$res_thromb_car4 = ($thromb_car4 / $i_count_car4) * 1000;
							if($res_thromb_car4 > 0)
							{
								$res_thromb4 = $res_thromb_car4;
							}else{
								$res_thromb4 = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size:16px;" id="ajj"><center><?php echo number_format($res_thromb4,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car5 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car5 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car5 = mysqli_fetch_assoc($qry_car5);
							$i_count_car5 = $res_car5["std_car5"];
							
							$qry2_car5 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_iardl = 'Yes'")or die(mysqli_error($connect));
							$thromb_car5 = mysqli_num_rows($qry2_car5);
							$res_thromb_car5 = ($thromb_car5 / $i_count_car5) * 1000;
							if($res_thromb_car5 > 0)
							{
								$res_thromb5 = $res_thromb_car5;
							}else{
								$res_thromb5 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($res_thromb5,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car6 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car6 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car6 = mysqli_fetch_assoc($qry_car6);
							$i_count_car6 = $res_car6["std_car6"];
							
							$qry2_car6 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_injtpt = 'Yes'")or die(mysqli_error($connect));
							$thromb_car6 = mysqli_num_rows($qry2_car6);
							$res_thromb_car6 = ($thromb_car6 / $i_count_car6) * 1000;
							if($res_thromb_car6 > 0)
							{
								$res_thromb6 = $res_thromb_car6;
							}else{
								$res_thromb6 = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size:16px;" id="ajj"><center><?php echo number_format($res_thromb6,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>

</table>