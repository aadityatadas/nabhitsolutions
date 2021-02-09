<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
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
<tr>
	<td style="text-align:center;">1</td>
	<td>HOSP UTILIZATION INDEX</td>
	<td></td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>TOTAL NO OF INPATIENT DAYS</td></tr>
			<tr><td>BED OCCUPANCY RATE ( IN %)</td></tr>
			<tr><td>TOTAL NO OF ADMISSIONS( IN NO.)</td></tr>
			<tr><td>TOTAL NO OF DISCHARGE ( IN NO.)</td></tr>
			<tr><td>AVRG. LENGTH OF STAY( IN DAYS)</td></tr>
			<tr><td>TOTAL DAMA ( IN NO.)</td></tr>
			<tr><td>TOTAL DEATH ( IN NO.)</td></tr>
			<tr><td>TOTAL MLC ( IN NO.)</td></tr>
			<tr><td>TOTAL OPD ( IN NO.)</td></tr>
			<tr><td>TOTAL SURGERY ( IN NO.)</td></tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT SUM(huf_lens) as jan FROM tbl_huf WHERE (huf_dadm BETWEEN '$jan-01' AND '$jan-31') AND (huf_dddd BETWEEN '$jan-01' AND '$jan-31')")or die(mysqli_error($connect));
						$resj = mysqli_fetch_assoc($qryj);
						$totp_jan = $resj["jan"];
					if($totp_jan == ''){
					?>
					0
					<?php }else{?>
						<?php echo $totp_jan;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$jan-01' AND '$jan-31'")or die(mysqli_error($connect));
						$totadm_jan = mysqli_num_rows($qryj);
					if($totadm_jan == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_jan;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$jan-01' AND '$jan-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$jan-01' AND '$jan-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$jan-01' AND '$jan-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$jan-01' AND '$jan-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$jan-01' AND '$jan-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$jan-01' AND '$jan-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resj_surg = mysqli_num_rows($qryj_surg);
					if($resj_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT SUM(huf_lens) as feb FROM tbl_huf WHERE (huf_dadm BETWEEN '$feb-01' AND '$feb-31') AND (huf_dddd BETWEEN '$feb-01' AND '$feb-31')")or die(mysqli_error($connect));
						$resf = mysqli_fetch_assoc($qryf);
						$totp_feb = $resf["feb"];
					if($totp_feb == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_feb;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$feb-01' AND '$feb-31'")or die(mysqli_error($connect));
						$totadm_feb = mysqli_num_rows($qryf);
					if($totadm_feb == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_feb;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$feb-01' AND '$feb-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$feb-01' AND '$feb-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$feb-01' AND '$feb-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$feb-01' AND '$feb-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$feb-01' AND '$feb-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$feb-01' AND '$feb-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resf_surg = mysqli_num_rows($qryf_surg);
					if($resf_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resf_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>		
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qrym = mysqli_query($connect,"SELECT SUM(huf_lens) as mar FROM tbl_huf WHERE (huf_dadm BETWEEN '$mar-01' AND '$mar-31') AND (huf_dddd BETWEEN '$mar-01' AND '$mar-31')")or die(mysqli_error($connect));
						$resm = mysqli_fetch_assoc($qrym);
						$totp_mar = $resm["mar"];
					if($totp_mar == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_mar;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$mar-01' AND '$mar-31'")or die(mysqli_error($connect));
						$totadm_mar = mysqli_num_rows($qryf);
					if($totadm_mar == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_mar;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$mar-01' AND '$mar-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$mar-01' AND '$mar-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$mar-01' AND '$mar-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$mar-01' AND '$mar-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$mar-01' AND '$mar-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qrym_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$mar-01' AND '$mar-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resm_surg = mysqli_num_rows($qrym_surg);
					if($resm_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resm_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qrya = mysqli_query($connect,"SELECT SUM(huf_lens) as apr FROM tbl_huf WHERE (huf_dadm BETWEEN '$apr-01' AND '$apr-31') AND (huf_dddd BETWEEN '$apr-01' AND '$apr-31')")or die(mysqli_error($connect));
						$resa = mysqli_fetch_assoc($qrya);
						$totp_apr = $resa["apr"];
					if($totp_apr == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_apr;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$apr-01' AND '$apr-31'")or die(mysqli_error($connect));
						$totadm_apr = mysqli_num_rows($qryf);
					if($totadm_apr == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_apr;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$apr-01' AND '$apr-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$apr-01' AND '$apr-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$apr-01' AND '$apr-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$apr-01' AND '$apr-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$apr-01' AND '$apr-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qrya_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$apr-01' AND '$apr-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resa_surg = mysqli_num_rows($qrya_surg);
					if($resa_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resa_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qrymy = mysqli_query($connect,"SELECT SUM(huf_lens) as may FROM tbl_huf WHERE (huf_dadm BETWEEN '$may-01' AND '$may-31') AND (huf_dddd BETWEEN '$may-01' AND '$may-31')")or die(mysqli_error($connect));
						$resmy = mysqli_fetch_assoc($qrymy);
						$totp_may = $resmy["may"];
					if($totp_may == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_may;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$may-01' AND '$may-31'")or die(mysqli_error($connect));
						$totadm_may = mysqli_num_rows($qryf);
					if($totadm_may == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_may;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$may-01' AND '$may-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$may-01' AND '$may-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$may-01' AND '$may-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$may-01' AND '$may-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$may-01' AND '$may-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qrymy_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$may-01' AND '$may-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resmy_surg = mysqli_num_rows($qrymy_surg);
					if($resmy_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resmy_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qryj = mysqli_query($connect,"SELECT SUM(huf_lens) as jun FROM tbl_huf WHERE (huf_dadm BETWEEN '$jun-01' AND '$jun-31') AND (huf_dddd BETWEEN '$jun-01' AND '$jun-31')")or die(mysqli_error($connect));
						$resj = mysqli_fetch_assoc($qryj);
						$totp_jun = $resj["jun"];
					if($totp_jun == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_jun;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$jun-01' AND '$jun-31'")or die(mysqli_error($connect));
						$totadm_jun = mysqli_num_rows($qryf);
					if($totadm_jun == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_jun;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$jun-01' AND '$jun-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$jun-01' AND '$jun-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$jun-01' AND '$jun-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$jun-01' AND '$jun-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$jun-01' AND '$jun-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryjn_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$jun-01' AND '$jun-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resjn_surg = mysqli_num_rows($qryjn_surg);
					if($resjn_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resjn_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qryjy = mysqli_query($connect,"SELECT SUM(huf_lens) as jul FROM tbl_huf WHERE (huf_dadm BETWEEN '$jul-01' AND '$jul-31') AND (huf_dddd BETWEEN '$jul-01' AND '$jul-31')")or die(mysqli_error($connect));
						$resjy = mysqli_fetch_assoc($qryjy);
						$totp_jul = $resjy["jul"];
					if($totp_jul == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_jul;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$jul-01' AND '$jul-31'")or die(mysqli_error($connect));
						$totadm_jul = mysqli_num_rows($qryf);
					if($totadm_jul == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_jul;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$jul-01' AND '$jul-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$jul-01' AND '$jul-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$jul-01' AND '$jul-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$jul-01' AND '$jul-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$jul-01' AND '$jul-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryjl_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$jul-01' AND '$jul-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resjl_surg = mysqli_num_rows($qryjl_surg);
					if($resjl_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resjl_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qryag = mysqli_query($connect,"SELECT SUM(huf_lens) as aug FROM tbl_huf WHERE (huf_dadm BETWEEN '$aug-01' AND '$aug-31') AND (huf_dddd BETWEEN '$aug-01' AND '$aug-31')")or die(mysqli_error($connect));
						$resag = mysqli_fetch_assoc($qryag);
						$totp_aug = $resag["aug"];
					if($totp_aug == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_aug;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$aug-01' AND '$aug-31'")or die(mysqli_error($connect));
						$totadm_aug = mysqli_num_rows($qryf);
					if($totadm_aug == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_aug;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$aug-01' AND '$aug-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$aug-01' AND '$aug-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$aug-01' AND '$aug-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$aug-01' AND '$aug-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$aug-01' AND '$aug-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryag_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$aug-01' AND '$aug-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resag_surg = mysqli_num_rows($qryag_surg);
					if($resag_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resag_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qrys = mysqli_query($connect,"SELECT SUM(huf_lens) as sep FROM tbl_huf WHERE (huf_dadm BETWEEN '$sep-01' AND '$sep-31') AND (huf_dddd BETWEEN '$sep-01' AND '$sep-31')")or die(mysqli_error($connect));
						$ress = mysqli_fetch_assoc($qrys);
						$totp_sep = $ress["sep"];
					if($totp_sep == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_sep;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$sep-01' AND '$sep-31'")or die(mysqli_error($connect));
						$totadm_sep = mysqli_num_rows($qryf);
					if($totadm_sep == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_sep;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$sep-01' AND '$sep-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$sep-01' AND '$sep-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$sep-01' AND '$sep-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$sep-01' AND '$sep-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$sep-01' AND '$sep-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qrysp_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$sep-01' AND '$sep-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$ressp_surg = mysqli_num_rows($qrysp_surg);
					if($ressp_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $ressp_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qryo = mysqli_query($connect,"SELECT SUM(huf_lens) as oct FROM tbl_huf WHERE (huf_dadm BETWEEN '$oct-01' AND '$oct-31') AND (huf_dddd BETWEEN '$oct-01' AND '$oct-31')")or die(mysqli_error($connect));
						$reso = mysqli_fetch_assoc($qryo);
						$totp_oct = $reso["oct"];
					if($totp_oct == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_oct;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$oct-01' AND '$oct-31'")or die(mysqli_error($connect));
						$totadm_oct = mysqli_num_rows($qryf);
					if($totadm_oct == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_oct;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$oct-01' AND '$oct-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$oct-01' AND '$oct-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$oct-01' AND '$oct-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$oct-01' AND '$oct-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$oct-01' AND '$oct-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryoc_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$oct-01' AND '$oct-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resoc_surg = mysqli_num_rows($qryoc_surg);
					if($resoc_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resoc_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qryn = mysqli_query($connect,"SELECT SUM(huf_lens) as nov FROM tbl_huf WHERE (huf_dadm BETWEEN '$nov-01' AND '$nov-31') AND (huf_dddd BETWEEN '$nov-01' AND '$nov-31')")or die(mysqli_error($connect));
						$resn = mysqli_fetch_assoc($qryn);
						$totp_nov = $resn["nov"];
					if($totp_nov == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_nov;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$nov-01' AND '$nov-31'")or die(mysqli_error($connect));
						$totadm_nov = mysqli_num_rows($qryf);
					if($totadm_nov == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_nov;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$nov-01' AND '$nov-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$nov-01' AND '$nov-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$nov-01' AND '$nov-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$nov-01' AND '$nov-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$nov-01' AND '$nov-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qrynv_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$nov-01' AND '$nov-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resnv_surg = mysqli_num_rows($qrynv_surg);
					if($resnv_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resnv_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">						
					<?php				
						$qryd = mysqli_query($connect,"SELECT SUM(huf_lens) as decm FROM tbl_huf WHERE (huf_dadm BETWEEN '$dec-01' AND '$dec-31') AND (huf_dddd BETWEEN '$dec-01' AND '$dec-31')")or die(mysqli_error($connect));
						$resd = mysqli_fetch_assoc($qryd);
						$totp_dec = $resd["decm"];
					if($totp_dec == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totp_dec;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$dec-01' AND '$dec-31'")or die(mysqli_error($connect));
						$totadm_dec = mysqli_num_rows($qryf);
					if($totadm_dec == ''){
					?>
					0
					<?php }else{?>
					<?php echo $totadm_dec;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$dec-01' AND '$dec-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					-
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$dec-01' AND '$dec-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$dec-01' AND '$dec-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$dec-01' AND '$dec-31')")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qryj = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '$dec-01' AND '$dec-31'")or die(mysqli_error($connect));
						$resj = mysqli_num_rows($qryj);
					if($resj == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resj;?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td id="ajj">
					<?php				
						$qrydc_surg = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$dec-01' AND '$dec-31') AND huf_surg = 'Surgery'")or die(mysqli_error($connect));
						$resdc_surg = mysqli_num_rows($qrydc_surg);
					if($resdc_surg == ''){
					?>
					0
					<?php }else{?>
						<?php echo $resdc_surg;?>
					<?php } ?>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td style="text-align:center;">2</td>
	<td>IPD FEEDBACK INDEX</td>
	<td>More than 80%</td>
	<td>FEEDBACK ANALYSIS ( IN % )</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td style="text-align:center;">3</td>
	<td>OPD FEEDBACK INDEX</td>
	<td>More than 80%</td>
	<td>FEEDBACK ANALYSIS ( IN % )</td>
	<?php 		
		for($month = 1; $month <= 12; $month ++){
			$qry4 = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr'")or die(mysqli_error($connect));
			$res4 = mysqli_num_rows($qry4);
			
			$qry3 = mysqli_query($connect,"SELECT SUM(opd_score) as score FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr'")or die(mysqli_error($connect));
			$res3 = mysqli_fetch_assoc($qry3);
			$res = $res3["score"];
			
			$tot_scor = ($res / 120 / $res4) * 100;
			$resul = number_format($tot_scor,2);
	?>
	<td id="ajj"><?php echo $resul;?></td>
	<?php			
		}					
	?>
</tr>
<tr>
	<td style="text-align:center;">4</td>
	<td>INITIAL ASSESSMENT TIME</td>
	<td>24 HOURS</td>
	<td>MONTHLY AVERAGE TIME ( IN HRS )</td>
	<?php 		
		for($month = 1; $month <= 12; $month ++){
			$qy = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
			while($re = mysqli_fetch_array($qy))
			{
				$smstd = $re["int_tottm"];
				list($nm1, $nm2) = explode('.', $smstd);
				$hrnum = $hrnum + $nm1;
				$minnum = $minnum + $nm2;
			}
			$sumstd = ($hrnum * 60) + $minnum;	
			
			$qy5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != ''")or die(mysqli_error($connect));
			$scount = mysqli_num_rows($qy5);
			
			$totcount = $sumstd / $scount;
			if($totcount >= 60)
			{
				$ttcount = $totcount / 60;
				list($nmber1, $nmber2) = explode('.', $ttcount);
				
				$totmin = $totcount - ($nmber1 * 60);
				if($totmin >= 10)
				{
					$nmb3 = $nmber1.'.'.$totmin;
				}else if($totmin < 10){
					$a = 0;
					$nmbr3 = $nmber1.'.'.$a.''.$tot_min;
					$nmb3 = number_format($nmbr3,2);
				}		
			}else if($totcount < 60){
				list($nmb1, $nmb2) = explode('.', $totcount);
				$ajj = 0;
				$nmbr3 = $ajj.'.'.$nmb1;
				$nmb3 = number_format($nmbr3,2);
			}
	?>
	<td id="ajj"><?php echo number_format($nmb3,2);?></td>
	<?php			
		}					
	?>
</tr>
<tr>
	<td style="text-align:center;">5</td>
	<td>OPD WAITING TIME</td>
	<td>1 hr</td>
	<td>MONTHLY AVERAGE TIME ( IN HRS )</td>
	<?php 		
		for($month = 1; $month <= 12; $month ++){
			$qry = mysqli_query($connect,"SELECT opdwttm_opdwttm FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != '' ORDER BY opdwttm_id ASC")or die(mysqli_error($connect));
			while($res = mysqli_fetch_array($qry))
			{
				$sm_std = $res["opdwttm_opdwttm"];
				list($num1, $num2) = explode('.', $sm_std);
				$hr_num = $hr_num + $num1;
				$min_num = $min_num + $num2;
			}
			$sum_std = ($hr_num * 60) + $min_num;	
			
			$qry5 = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
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
					$numb3 = number_format($numbr3,2);
				}		
			}else if($tot_count < 60){
				list($numb1, $numb2) = explode('.', $tot_count);
				$aj = 0;
				$numbr3 = $aj.'.'.$numb1;
				$numb3 = number_format($numbr3,2);
			}
	?>
	<td id="ajj"><?php echo number_format($numb3,2);?></td>
	<?php			
		}					
	?>
</tr>
<tr>
	<td style="text-align:center;">6</td>
	<td>HIC INDICATOR</td>
	<td></td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>HAP RATE ( < 4 per 100 admissions)</td></tr>
			<tr><td>VAP RATE (< 3 per 1000 Ventilator Days )</td></tr>
			<tr><td>CLABSI RATE (< 1 per 1000 CVP Days)</td></tr>
			<tr><td>CAUTI RATE ( < 3 per 1000 catheter Days )</td></tr>
			<tr><td>SSI RATE ( < 1 per 100 Surgeries)</td></tr>
			<tr><td>NEEDLE STICK INJURY RATE ( < 2% of Total)</td></tr>
		</table>
	</td>
	<td colspan="13">
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
				<td id="ajj">0</td>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$v_qry = mysqli_query($connect,"SELECT SUM(vent_tcd) as std FROM tbl_huf WHERE month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr'")or die(mysqli_error($connect));
						$v_res = mysqli_fetch_assoc($v_qry);
						$i_count = $v_res["std"];
						$v_qry2 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
						$v_count = mysqli_num_rows($v_qry2);
						$vap_count = $v_count*1000/$i_count;						
				?>
				<td id="ajj"><?php echo number_format($vap_count,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$cent_qry = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as cent_std FROM tbl_huf WHERE month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr'")or die(mysqli_error($connect));
						$cent_res = mysqli_fetch_assoc($cent_qry);
						$cent_i_count = $cent_res["cent_std"];
						$cent_qry2 = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
						$cent_c_count = mysqli_num_rows($cent_qry2);
						$clabsi_count = $cent_c_count*1000/$cent_i_count;						
				?>
				<td id="ajj"><?php echo number_format($clabsi_count,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$cath_qry = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as cath_std FROM tbl_huf WHERE month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr'")or die(mysqli_error($connect));
						$cath_res = mysqli_fetch_assoc($cath_qry);
						$cath_i_count = $cath_res["cath_std"];
						$cath_qry2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
						$cath_c_count = mysqli_num_rows($cath_qry2);
						$cauti_count = $cath_c_count*1000/$cath_i_count;						
				?>
				<td id="ajj"><?php echo number_format($cauti_count,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$ssi_qry2 = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
						$ssi_i_count = mysqli_num_rows($ssi_qry2);
						$ssi_qry3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND huf_surg = 'Surgery' ")or die(mysqli_error($connect));
						$ssi_c_count = mysqli_num_rows($ssi_qry3);
						$ssi_cnt = ($ssi_i_count/$ssi_c_count)*100; // - 0.13;
						$ssi_count = (float)$ssi_cnt;						
				?>
				<td id="ajj"><?php echo number_format($ssi_count,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$need_qry = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr'")or die(mysqli_error($connect));
						$need_res = mysqli_num_rows($need_qry);
						
						$need_qr = mysqli_query($connect,"SELECT SUM(huf_lens) as need_std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
						$need_rs = mysqli_fetch_assoc($need_qr);
						$need_i_count = $need_rs["need_std"];
						
						$need_rate = ($need_res / $need_i_count) * 1000;						
				?>
				<td id="ajj"><?php echo number_format($need_rate,2);?></td>
				<?php
					}
				?>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td style="text-align:center;">7</td>
	<td>SENTINEL EVENT RATE</td>
	<td>less than 2%</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>SURGERY RELATED EVENT</td></tr>
			<tr><td>ANAESTHESIA RELATED EVENT</td></tr>
			<tr><td>%PAC NOT DONE</td></tr>
			<tr><td>BLOOD TRANSFUSION REACTION</td></tr>
			<tr><td>ADVERSE DRUG EVENT</td></tr>
			<tr><td>MEDICATION ERROR</td></tr>
			<tr><td>THROMBOPLEBITIS</td></tr>
			<tr><td>BED SCORES</td></tr>
		</table>
	</td>
	<td colspan="13">
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$surg_sql=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr'")or die(mysqli_error($connect));
						$surg_row=mysqli_num_rows($surg_sql);	

						$surg_sql2=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_any_adv_surg_evt='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
						$surg_row2=mysqli_num_rows($surg_sql2);
						$surg_surg_evt = ($surg_row2 / $surg_row) * 100;
				?>
				<td id="ajj"><?php echo number_format($surg_surg_evt,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$anst_sql=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
						$anst_row=mysqli_num_rows($anst_sql);	

						$anst_sql2=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_any_adv_ans_evt='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
						$anst_row2=mysqli_num_rows($anst_sql2);
						$anst_surg_evt = ($anst_row2 / $anst_row) * 100;
				?>
				<td id="ajj"><?php echo number_format($anst_surg_evt,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$pac_sql=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
						$pac_row=mysqli_num_rows($pac_sql);	

						$pac_sql2=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_pacdn='No' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
						$pac_row2=mysqli_num_rows($pac_sql2);
						$pac_surg_evt = ($pac_row2 / $pac_row) * 100;
				?>
				<td id="ajj"><?php echo number_format($pac_surg_evt,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$bld_sql=mysqli_query($connect,"SELECT bld_id FROM tbl_blood_fusion WHERE bld_trfusreact = 'Yes' AND (month(bld_dtrec) = '$month' AND year(bld_dtrec) = '$yr')")or die(mysqli_error($connect));
						$bld_row=mysqli_num_rows($bld_sql);	

						$bld_sql2=mysqli_query($connect,"SELECT SUM(bld_notrfus) as bld_tot FROM tbl_blood_fusion WHERE month(bld_dtrec) = '$month' AND year(bld_dtrec) = '$yr'")or die(mysqli_error($connect));
						$bld_row2=mysqli_fetch_assoc($bld_sql2);
						$bld_tot = $bld_row2["bld_tot"];
						$bld_evt = ($bld_row / $bld_tot) * 100;
				?>
				<td id="ajj"><?php echo number_format($bld_evt,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$drug_sql=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
						$drug_row=mysqli_num_rows($drug_sql);	

						$drug_sql2=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_appr_propantb='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
						$drug_row2=mysqli_num_rows($drug_sql2);
						$drug_anti = ($drug_row2 / $drug_row) * 100;
				?>
				<td id="ajj"><?php echo number_format($drug_anti,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						
				?>
				<td id="ajj">0</td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						
				?>
				<td id="ajj">0</td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						
				?>
				<td id="ajj">0</td>
				<?php
					}
				?>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td style="text-align:center;">8</td>
	<td>BME UPTIME/DOWNTIME</td>
	<td>less than 1%</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>UPTIME (CRITICAL/NON CRITICAL)</td></tr>
			<tr><td>DOWNTIME ((CRITICAL/NON CRITICAL)</td></tr>
		</table>
	</td>
	<td colspan="13">
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						
				?>
				<td id="ajj">0</td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						
				?>
				<td id="ajj">0</td>
				<?php
					}
				?>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td style="text-align:center;">9</td>
	<td>HR INDICATOR</td>
	<td>less than 5%</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>ABSENTEES RATE</td></tr>
			<tr><td>EMPLOYEE ATTRITION RATE</td></tr>
		</table>
	</td>
	<td colspan="13">
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$hr_sql = mysqli_query($connect,"SELECT SUM(hr_absent) as abs FROM tbl_hr_indic WHERE month(hr_date) = '$month' AND year(hr_date) = '$yr'")or die(mysqli_error($connect));
						$hr_rs = mysqli_fetch_array($hr_sql);
						$hr_abs = $hr_rs["abs"];
						$hr_sq=mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE month(hr_date) = '$month' AND year(hr_date) = '$yr'")or die(mysqli_error($connect));
						$hr_rq=mysqli_num_rows($hr_sq);
						$hr_tabs = ($hr_abs/$hr_rq/30) * 100;
				?>
				<td id="ajj"><?php echo number_format($hr_tabs,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						
				?>
				<td id="ajj">0</td>
				<?php
					}
				?>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td style="text-align:center;">10</td>
	<td>MRD INDICATOR</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>less than 1%</td></tr>
			<tr><td>less than 1%</td></tr>
			<tr><td>less than 1%</td></tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>% OF IPD MISSING RECORD</td></tr>
			<tr><td>% OF RECORD WITHOUT DISCHARGE SUMMERY</td></tr>
			<tr><td>% OF RECORD WITHOUT CONSENT</td></tr>
		</table>
	</td>
	<td colspan="13">
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$medi_sql=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE medi_recd != '' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
						$medi_row=mysqli_num_rows($medi_sql);
						
						$medi_sql2=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE medi_mrdav='Missing' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
						$medi_row2=mysqli_num_rows($medi_sql2);
						$medi_rexpl = ($medi_row2 / $medi_row) * 100;
				?>
				<td id="ajj"><?php echo number_format($medi_rexpl,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$medi_sql3=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE medi_recd != '' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
						$medi_row3=mysqli_num_rows($medi_sql3);
						
						$medi_sql4=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE medi_mrddissum='No' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
						$medi_row4=mysqli_num_rows($medi_sql4);
						$medi_rexpl2 = ($medi_row4 / $medi_row3) * 100;
				?>
				<td id="ajj"><?php echo number_format($medi_rexpl2,2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for($month = 1; $month <= 12; $month ++){
						$medi_sql5=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE medi_recd != '' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
						$medi_row5=mysqli_num_rows($medi_sql5);
						
						$medi_sql6=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE medi_mrdimpcons='No' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
						$medi_row6=mysqli_num_rows($medi_sql6);
						$medi_rexpl3 = ($medi_row6 / $medi_row5) * 100;
				?>
				<td id="ajj"><?php echo number_format($medi_rexpl3,2);?></td>
				<?php
					}
				?>
			</tr>
		</table>
	</td>
</tr>