<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');	
?>
<div class="col-lg-12">
	<div class="col-lg-8" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:left;" width="80%">Average Turn around time for Blood</td>
				<?php
					$sql = mysqli_query($connect,"SELECT bld_dtrec, bld_tmreq, bld_dtreq, bld_tmrec FROM tbl_blood_fusion WHERE bld_dtreq BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					while($rw = mysqli_fetch_array($sql))
					{
						$req = strtotime($rw["bld_dtreq"].' '.$rw["bld_tmreq"]);
						$treq = $treq + $req;
						$rec = strtotime($rw["bld_dtrec"].' '.$rw["bld_tmrec"]);
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
					$sql1 = mysqli_query($connect,"SELECT * FROM tbl_blood_fusion WHERE bld_dtrec <> ''")or die(mysqli_error($connect));
					$rs = mysqli_num_rows($sql1);
					$min = $ht_mi / $rs;
				?>
				<td width="20%"><?php echo number_format($min,2);?></td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">% of blood transfusion reaction (Total no. of blood transfusion reaction occurred/Total No of blood Transfusions* 100</td>
				<?php
					$sql = mysqli_query($connect,"SELECT bld_trfusreact FROM tbl_blood_fusion WHERE bld_trfusreact = 'Yes' AND (bld_dtreq BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
					$rs = mysqli_num_rows($sql);
					$sql1 = mysqli_query($connect,"SELECT SUM(bld_notrfus) as tot FROM tbl_blood_fusion WHERE bld_dtreq BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					$rs1 = mysqli_fetch_array($sql1);
					$tot = $rs1["tot"];
					$tots = ($rs / $tot) * 100;
					if($tots > 0)
					{
				?>
				<td width="20%"><?php echo number_format($tots,2);?>&nbsp;%</td>	
				<?php
					}else{
				?>
				<td width="20%"><?php echo number_format(0,2);?>&nbsp;%</td>	
				<?php
					}
				?>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">% of Blood Product Wastage (Total No of Blood Products wasted/Total no of Blood product issued/received * 100</td>
				<?php
					$sql1 = mysqli_query($connect,"SELECT SUM(bld_waste_det) as tot FROM tbl_blood_fusion WHERE bld_dtreq BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					$rs1 = mysqli_fetch_array($sql1);
					$tot = $rs1["tot"];
					$sql = mysqli_query($connect,"SELECT SUM(bld_norec) as tt FROM tbl_blood_fusion WHERE bld_dtreq BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$tt = $rs["tt"];
					$tts = ($tot / $tt) * 100;
					if($tts > 0)
					{
				?>
				<td width="20%"><?php echo number_format($tts,2);?>&nbsp;%</td>	
				<?php
					}else{
				?>
				<td width="20%"><?php echo number_format(0,2);?>&nbsp;%</td>	
				<?php
					}
				?>
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">% of Blood Component Usage</td>
				<?php
					$sql = mysqli_query($connect,"SELECT SUM(bld_norec) as tts FROM tbl_blood_fusion WHERE bld_dtreq BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$tts = $rs["tts"];
					$sqls = mysqli_query($connect,"SELECT SUM(bld_notrfus) as ttts FROM tbl_blood_fusion WHERE bld_dtreq BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					$rss = mysqli_fetch_array($sqls);
					$ttts = $rss["ttts"];
					$ttss = ($ttts / $tts) * 100;
					if($ttss > 0)
					{
				?>
				
				<td width="20%"><?php echo number_format($ttss,2);?>&nbsp;%</td>	
				<?php
					}else{
				?>
				<td width="20%"><?php echo number_format(0,2);?>&nbsp;%</td>	
				<?php
					}
				?>
			</tr>
		</table>
	</div>  
</div>  