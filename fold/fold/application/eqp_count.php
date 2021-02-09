<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";	
?>
<div class="col-lg-12">
	<div class="col-lg-10" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:left;" width="50%">Equipement Breakdown Time: (Critical/Non critical) -sum of all breakdown (Repair Time-Breakdown Time)</td>
				<?php
					$sql = mysqli_query($connect,"SELECT eqp_dttmbr, eqp_dttmrp FROM tbl_eqp_indic")or die(mysqli_error($connect));
					while($rw = mysqli_fetch_array($sql))
					{
						$req = strtotime($rw["eqp_dttmbr"]);
						$treq = $treq + $req;
						$rec = strtotime($rw["eqp_dttmrp"]);
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
					$sql1 = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic")or die(mysqli_error($connect));
					$rs = mysqli_num_rows($sql1);
					$min = $ht_mi / $rs;
				?>
				<td width="50%"><?php echo $min;?>&nbsp;Hrs.</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="50%"> List of Equipement under warranty including dates</td>
				<td width="50%">Warranty Period</td>				
			</tr>
				<?php
					$sq2 = mysqli_query($connect,"SELECT * FROM tbl_eqp_mast WHERE eqp_wty1 <> ''")or die(mysqli_error($connect));
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
					$sq3 = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqp_id = tbl_eqp_indic.eqpid WHERE eqp_amcs = 'Yes'")or die(mysqli_error($connect));
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
					$sql4 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast LEFT JOIN tbl_eqp_indic ON tbl_eqp_mast.eqp_id = tbl_eqp_indic.eqpid")or die(mysqli_error($connect));
					$rs4 = mysqli_num_rows($sql4);					
					
					$sql5 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast LEFT JOIN tbl_eqp_indic ON tbl_eqp_mast.eqp_id = tbl_eqp_indic.eqpid WHERE eqp_amcs = 'Yes'")or die(mysqli_error($connect));
					$rs5 = mysqli_num_rows($sql5);
					
					$tt5 = ($rs5 / $rs4) * 100;
				?>
				<td width="50%"><?php echo $tt5;?>&nbsp;%</td>				
			</tr>
			<!-- -->
		</table>
	</div>  
</div>  