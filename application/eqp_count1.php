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
				<td style="text-align:left;" width="50%">Equipement Breakdown Time: (Critical/Non critical) - sum of all breakdown (Repair Time-Breakdown Time)</td>
				<?php
					$sql = mysqli_query($connect,"SELECT eqp_dtbr, eqp_tmbr, eqp_dtrp, eqp_tmrp FROM tbl_eqp_indic WHERE eqp_dtbr BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					while($rw = mysqli_fetch_array($sql))
					{
						$dtbr = $rw["eqp_dtbr"].' '.$rw["eqp_tmbr"];
						$dtrp = $rw["eqp_dtrp"].' '.$rw["eqp_tmrp"];
						$req = strtotime($dtbr);
						$treq = $treq + $req;
						$rec = strtotime($dtrp);
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
					if($min > 0)
					{
						$mineqp = $min;
					}else{
						$mineqp = 0;
					}
				?>
				<td width="50%"><?php echo number_format($mineqp,2);?>&nbsp;Hrs.</td>				
			</tr>
		
		</table>
	</div>  
</div>  