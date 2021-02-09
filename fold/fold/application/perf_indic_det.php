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
	
?>
<tr>
	<td style="text-align:center;">1</td>
	<td>HOSP UTILIZATION INDEX</td>
	<td></td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>TOTAL NO OF PATIENT DAYS</td></tr>
			<tr><td>BED OCCUPANCY RATE ( IN %)</td></tr>
			<tr><td>TOTAL NO OF ADMISSIONS( IN NO.)</td></tr>
			<tr><td>TOTAL NO OF DISCHARGE ( IN NO.)</td></tr>
			<tr><td>AVERAGE LENGTH OF STAY( IN DAYS)</td></tr>
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
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>		
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr>
				<td>						
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
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
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
				</td>
			</tr>
			<tr>
				<td>
					-
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
	<td style="text-align:center;">4</td>
	<td>INITIAL ASSESSMENT TIME</td>
	<td>24 HOURS</td>
	<td>MONTHLY AVERAGE TIME ( IN HRS )</td>
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
	<td style="text-align:center;">5</td>
	<td>OPD WAITING TIME</td>
	<td>1 hr</td>
	<td>MONTHLY AVERAGE TIME ( IN HR )</td>
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
			<tr><td>BED SORES</td></tr>
		</table>
	</td>
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
	<td style="text-align:center;">8</td>
	<td>BME UPTIME/DOWNTIME</td>
	<td>less than 1%</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>UPTIME (CRITICAL/NON CRITICAL)</td></tr>
			<tr><td>DOWNTIME ((CRITICAL/NON CRITICAL)</td></tr>
		</table>
	</td>
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
	<td style="text-align:center;">9</td>
	<td>HR INDICATOR</td>
	<td>less than 5%</td>
	<td>
		<table width="100%" style="padding:0px;margin:0px;font-size:14px;" class="table-bordered">
			<tr><td>ABSENTEES RATE</td></tr>
			<tr><td>EMPLOYEE ATTRITION RATE</td></tr>
		</table>
	</td>
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