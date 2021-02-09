<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$month = date('m');
	$yr = date('Y');
?>
<div class="col-lg-12">
	<div class="col-lg-10" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:left;" width="50%">Equipement Breakdown Time: (Critical/Non critical) -sum of all breakdown (Repair Time-Breakdown Time)</td>
				<?php
					$sql = mysqli_query($connect,"SELECT eqp_dtbr, eqp_dtrp FROM tbl_eqp_indic_bio WHERE eqp_dtbr BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					while($rw = mysqli_fetch_array($sql))
					{
						$req = strtotime($rw["eqp_dtbr"]);
						$treq = $treq + $req;
						$rec = strtotime($rw["eqp_dtrp"]);
						$trec = $trec + $rec;
					}
					$diff = abs($trec - $treq);
					$years   = floor($diff / (365*60*60*24)); 
					$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
					$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
					
					$hour   = floor(($diff) / (60*60)); 

					$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
					
					$ht_mi = $hour.'.'.$minuts;
					$sql1 = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic_bio")or die(mysqli_error($connect));
					$rs = mysqli_num_rows($sql1);
					$min = $ht_mi / $rs;
					if($min > 0)
					{
						$mineqp = $min;
					}else{
						$mineqp = 0;
					}
				?>
				<td width="50%"><?php echo $mineqp;?>&nbsp;Hrs.</td>				
			</tr>

			
			<tr>
				<td style="text-align:left;" width="50%"> List of Equipement under warranty including dates</td>
				<td width="50%">Warranty Period</td>				
			</tr>
				<?php
					$sq2 = mysqli_query($connect,"SELECT * FROM tbl_eqp_mast_bio WHERE (month(eqp_wty1) = '$month' OR month(eqp_wty1) < '$month' AND year(eqp_wty1) = '$yr' OR year(eqp_wty1) < '$yr') AND (month(eqp_wty2) > '$month' AND year(eqp_wty2) = '$yr' OR year(eqp_wty2) > '$yr')")or die(mysqli_error($connect));
					while($rs2 = mysqli_fetch_array($sq2))
					{
				?>
			<tr>
				<td style="text-align:right;" width="50%"><?php echo ucfirst($rs2["eqp_name"]);?></td>
				<td width="50%"><?php echo $rs2["eqp_wty1"];?>&nbsp;To&nbsp;<?php echo $rs2["eqp_wty2"];?></td>				
			</tr>
				<?php
					}
				?>
			<!-- -->
			<tr>
				<td style="text-align:left;" width="50%"> List of Equipement under AMC including dates</td>
				<td width="50%">AMC Period</td>				
			</tr>
				<?php
					$sq3 = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic_bio LEFT JOIN tbl_eqp_mast_bio ON tbl_eqp_mast_bio.eqpid = tbl_eqp_indic_bio.eqpid WHERE (month(tbl_eqp_indic_bio.eqp_amc1) = '$month' OR month(tbl_eqp_indic_bio.eqp_amc1) < '$month' AND year(tbl_eqp_indic_bio.eqp_amc1) = '$yr' OR year(tbl_eqp_indic_bio.eqp_amc1) < '$yr') AND (month(tbl_eqp_indic_bio.eqp_amc2) > '$month' AND year(tbl_eqp_indic_bio.eqp_amc2) = '$yr' OR year(tbl_eqp_indic_bio.eqp_amc2) > '$yr')")or die(mysqli_error($connect));
					while($rs3 = mysqli_fetch_array($sq3))
					{
				?>
			<tr>
				<td style="text-align:right;" width="50%"><?php echo ucfirst($rs3["eqp_name"]);?></td>
				<td width="50%"><?php echo $rs3["eqp_amc1"];?>&nbsp;To&nbsp;<?php echo $rs3["eqp_amc2"];?></td>				
			</tr>
				<?php
					}
				?>
			<!-- -->
			<tr>
				<td style="text-align:left;" width="50%">% of AMC (No of Equipement under AMC/Total No of Equipement)*100</td>
				<?php
					$sql4 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast_bio")or die(mysqli_error($connect));
					$rs4 = mysqli_num_rows($sql4);					
					
					$sql5 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast_bio LEFT JOIN tbl_eqp_indic_bio ON tbl_eqp_mast_bio.eqpid = tbl_eqp_indic_bio.eqpid WHERE (month(tbl_eqp_indic_bio.eqp_amc1) = '$month' OR month(tbl_eqp_indic_bio.eqp_amc1) < '$month' AND year(tbl_eqp_indic_bio.eqp_amc1) = '$yr' OR year(tbl_eqp_indic_bio.eqp_amc1) < '$yr') AND (month(tbl_eqp_indic_bio.eqp_amc2) > '$month' AND year(tbl_eqp_indic_bio.eqp_amc2) = '$yr' OR year(tbl_eqp_indic_bio.eqp_amc2) > '$yr')")or die(mysqli_error($connect));
					$rs5 = mysqli_num_rows($sql5);
					
					$tt5 = ($rs5 / $rs4) * 100;
				?>
				<td width="50%"><?php echo number_format($tt5,2);?>&nbsp;%</td>				
			</tr>
			<!-- -->
		</table>
	</div>  
</div>  