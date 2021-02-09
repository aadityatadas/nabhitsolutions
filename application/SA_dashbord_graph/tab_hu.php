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
	<table cellpadding="0" cellspacing="0" align="center" border="1">
<tr>
		<!-- <td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">1</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> </td> -->
												<td valign="top" >
													<table width="600" style="font-size:14px;"  border="1"  cellspacing="0" cellpadding="0">
														<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
														<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total No. of Inpatient Days</td></tr>
														<tr><td>2. Total No. of Admissions</td></tr>
														<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Total No. of Discharges</td></tr>
														<tr><td>4. Total No. of DAMA</td></tr>
														<tr style="background-color:#e6eeff; font-size: 16px;"><td>5. Total No. of Death</td></tr>
														<tr><td>6. Total No. of MLC</td></tr>
														<tr style="background-color:#e6eeff; font-size: 16px;"><td>7. Average Length of stay (in Days)</td></tr>
														<tr><td>8. Total No. of Surgeries</td></tr>
													</table>
												</td>



												<td valign="top" colspan="13">


													<table width="700" style="font-size:14px; " align="center " border="1"  cellspacing="0" cellpadding="0">

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
																	$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
																	$res = mysqli_fetch_assoc($qry);
																	$i_count = $res["std"];
																	if($i_count > 0){
																		$icount = $i_count;
																	}else{
																		$icount = 0;
																	}
															?>
															<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
															<?php
																}
															?>
														</tr>


														<tr>
															<?php
																for($month = 1; $month <= 12; $month ++){
																	$qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
																	$A_count = mysqli_num_rows($qry2);
															?>
															<td id="ajj"><center><?php echo $A_count;?></center></td>
															<?php
																}
															?>
														</tr>


														<tr>
															<?php
																for($month = 1; $month <= 12; $month ++){
																	$qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
																	$dis_count = mysqli_num_rows($qry3_1);
															?>
															<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $dis_count;?></center></td>
															<?php
																}
															?>
														</tr>


														<tr>
															<?php
																for($month = 1; $month <= 12; $month ++){
																	$qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
																	$dm_count = mysqli_num_rows($qry3_2);
															?>
															<td id="ajj"><center><?php echo $dm_count;?></center></td>
															<?php
																}
															?>
														</tr>


														<tr>
															<?php
																for($month = 1; $month <= 12; $month ++){
																	$qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
																	$dh_count = mysqli_num_rows($qry3_3);
															?>
															<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $dh_count;?></center></td>
															<?php
																}
															?>
														</tr>


														<tr>
															<?php
																for($month = 1; $month <= 12; $month ++){
																	$qry3_4 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_mlc = 'MLC' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
																	$mlc_count = mysqli_num_rows($qry3_4);
															?>
															<td id="ajj"><center><?php echo $mlc_count;?></center></td>
															<?php
																}
															?>
														</tr>

										                   
										                <tr>
															<?php
																for($month = 1; $month <= 12; $month ++){
																	$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
																	$res = mysqli_fetch_assoc($qry);
																	$i_count = $res["std"];
																	$qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
																	$A_count = mysqli_num_rows($qry2);
																	$dy = $i_count * 24;
																	$dys = $dy / $A_count;
																	$hmin = $dys / 24;
																	list($number1, $number2) = explode('.', $hmin);
																	
																	$los_count = $number1.'.'.$number2;
																	if($los_count > 0){
																		$loscount = $los_count;
																	}else{
																		$loscount = 0;
																	}
															?>
															<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo number_format($loscount,1);?></center></td>
															<?php
																}
															?>
														</tr>
														<tr>
															<?php
																for($month = 1; $month <= 12; $month ++){
																	$qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
																	$s_count = mysqli_num_rows($qry5);
															?>
															<td id="ajj"><center><?php echo $s_count;?></center></td>
															<?php
																}
															?>
														</tr>
													</table>
												</td>
											</tr>
											</table>