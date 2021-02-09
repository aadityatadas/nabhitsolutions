<?php
	error_reporting(0);
	session_start();	
	include"dbinfo.php";	
	$fdt = date('Y-m-01');
	$tdt = date('Y-m-31');
?>
<div class="col-lg-12">
	<div class="col-lg-12" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:left;" width="50%;">Total Number of surgeries in the month</td>
				<?php
					$sql="SELECT senti_nm_surg_dn, COUNT(*) AS total FROM tbl_senti_det WHERE senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt'";
					$query=$connect->query($sql);
					$row=$query->fetch_array();
				?>
				<td width="50%"><?php echo $row['total'];?></td>
			</tr>
			<tr>
				<td style="text-align:left;" width="50%;">Total No of anesthetia given in the month</td>
				<?php
					$sql="SELECT senti_tp_ans_gv, COUNT(*) AS tot FROM tbl_senti_det WHERE senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt'";
					$query=$connect->query($sql);
					$row=$query->fetch_array();
				?>
				<td width="50%"><?php echo $row['tot'];?></td>
			</tr>	


			<tr>
				<td style="text-align:left;" width="50%"> % of Unplanned return to OT (No of times unplanned return/total no of surgeries * 100)</td>
				<?php
					$sql=mysqli_query($connect,"SELECT senti_unpl_ret_ot FROM tbl_senti_det WHERE senti_unpl_ret_ot='Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
					$query=mysqli_num_rows($sql);
					$ot = $query;
					$year = date('Y');
					$sql="SELECT senti_nm_surg_dn, COUNT(*) AS surg FROM tbl_senti_det WHERE senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$surg = $row['surg'];
					$otr = ($ot / $surg) * 100;
					if($otr > 0)
					{
						$otr1 = $otr;
					}else{
						$otr1 = 0;
					}
				?>
				<td width="50%"><?php echo $otr1;?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="50%">% of resceduling of surgeries (No of times surgery resceduled/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_resch_surg_dn, COUNT(*) AS totf FROM tbl_senti_det WHERE senti_resch_surg_dn='Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$otf = ($row['totf'] / $surg) * 100;
					if($otf > 0)
					{
						$otf1 = $otf;
					}else{
						$otf1 = 0;
					}
				?>
				<td width="50%"><?php echo $otf1;?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="50%">% of cases where procedure followed to prevent adverse events like (WP/WS/WS): (No of times  procedure followed/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_prf_topvev, COUNT(*) AS pnf FROM tbl_senti_det WHERE senti_prf_topvev='Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$pnf = ($row['pnf'] / $surg) * 100;
					if($pnf > 0)
					{
						$pnf1 = $pnf;
					}else{
						$pnf1 = 0;
					}
				?>
				<td width="50%"><?php echo round($pnf1,2);?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%">% of cases where patient given with appropriate prophylactic antibiotics within specified time frame (No of times  antibiotics given/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_appr_propantb, COUNT(*) AS anti FROM tbl_senti_det WHERE senti_appr_propantb='Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$anti = ($row['anti'] / $surg) * 100;
					if($anti > 0)
					{
						$anti1 = $anti;
					}else{
						$anti1 = 0;
					}
				?>
				<td width="50%"><?php echo round($anti1,2);?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%">% of cases where planned surgery changed intraoperatively (No of times surgery changed intraoperatively/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_chng_surg_pl_int, COUNT(*) AS pl_int FROM tbl_senti_det WHERE senti_chng_surg_pl_int='Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$pl_int = ($row['pl_int'] / $surg) * 100;
					if($pl_int > 0)
					{
						$pl_int1 = $pl_int;
					}else{
						$pl_int1 = 0;
					}
				?>
				<td width="50%"><?php echo round($pl_int1,2);?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%">Reexploration Rate (No of rexplorations/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_rexpl, COUNT(*) AS rexpl FROM tbl_senti_det WHERE senti_rexpl='Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$rexpl = ($row['rexpl'] / $surg) * 100;
					if($rexpl > 0)
					{
						$rexpl1 = $rexpl;
					}else{
						$rexpl1 = 0;
					}
				?>
				<td width="50%"><?php echo round($rexpl1,2);?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%">% of adverse events related to surgery  (Total no of Adverse Surgery events/Total no of suergry done*100)</td>
				<?php
					$sql="SELECT senti_any_adv_surg_evt, COUNT(*) AS surg_evt FROM tbl_senti_det WHERE senti_any_adv_surg_evt='Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$surg_evt = ($row['surg_evt'] / $surg) * 100;
					if($surg_evt > 0)
					{
						$surg_evt1 = $surg_evt;
					}else{
						$surg_evt1 = 0;
					}
				?>
				<td width="50%"><?php echo round($surg_evt1,2);?>&nbsp;%</td>				
			</tr>		
			<tr>
				<td style="text-align:left;" width="50%">Total % of PAC done (No of PAC done/total no of anesthetia given * 100)</td>
				<?php
					$sql="SELECT senti_pacdn, COUNT(*) AS pacdn FROM tbl_senti_det WHERE senti_pacdn='Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$pacdn = $row['pacdn'];
					$sql="SELECT senti_tp_ans_gv, COUNT(*) AS ans_gv FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$ans_gv = $row['ans_gv'];
					$pac = ($pacdn / $ans_gv) * 100;
					if($pac > 0)
					{
						$pac1 = $pac;
					}else{
						$pac1 = 0;
					}
				?>
				<td width="50%"><?php echo round($pac1,2);?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%">% of modification in anesthetia plan(No of times anesthetia plan modified/total no of anesthetia given * 100)</td>
				<?php
					$sql="SELECT senti_mod_anspl, COUNT(*) AS ans_pl FROM tbl_senti_det WHERE senti_mod_anspl = 'Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$ans_pl = $row['ans_pl'];
					$tp_ans = ($ans_pl / $ans_gv) * 100;
					if($tp_ans > 0)
					{
						$tp_ans1 = $tp_ans;
					}else{
						$tp_ans1 = 0;
					}
				?>
				<td width="50%"><?php echo round($tp_ans1,2);?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%">% of unplanned ventilation following anesthetia (No of times unplanned ventilation/total no of anesthetia given * 100)</td>
				<?php
					$sql="SELECT senti_unp_vent_aft_ans, COUNT(*) AS aft_ans FROM tbl_senti_det WHERE senti_unp_vent_aft_ans = 'Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$aft_ans = $row['aft_ans'];
					$tp_anss = ($aft_ans / $ans_gv) * 100;
					if($tp_ans > 0)
					{
						$tp_anss1 = $tp_anss;
					}else{
						$tp_anss1 = 0;
					}
				?>
				<td width="50%"><?php echo round($tp_anss1,2);?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%">% of anesthetia related mortality rate (No. of death related to anesthetia /Total no of anesthetia given*100)</td>
				<?php
					$sql="SELECT senti_dth_rel_ans, COUNT(*) AS dth_rel FROM tbl_senti_det WHERE senti_dth_rel_ans = 'Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$dth_rel = $row['dth_rel'];
					$tp_anns = ($dth_rel / $ans_gv) * 100;
					if($tp_anns > 0)
					{
						$tp_anns1 = $tp_anns;
					}else{
						$tp_anns1 = 0;
					}
				?>
				<td width="50%"><?php echo round($tp_anns1,2);?>&nbsp;%</td>				
			</tr>
			
			<tr>
				<td style="text-align:left;" width="50%">% of adverse anesthetia related event. (Total no of Adverse anesthtia events/Total no of anesthtia given*100)</td>
				<?php
					$sql="SELECT senti_any_adv_ans_evt, COUNT(*) AS adv_ans FROM tbl_senti_det WHERE senti_any_adv_ans_evt = 'Yes' AND (senti_dt_surg_dn BETWEEN '$fdt' AND '$tdt')";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$adv_ans = $row['adv_ans'];
					$tp_aans = ($adv_ans / $ans_gv) * 100;
					if($tp_aans > 0)
					{
						$tp_aans1 = $tp_aans;
					}else{
						$tp_aans1 = 0;
					}
				?>
				<td width="50%"><?php echo round($tp_aans1,2);?>&nbsp;%</td>				
			</tr>
		</table>
	</div>  
</div>  



