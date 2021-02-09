<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";	
?>
<div class="col-lg-12">
	<div class="col-lg-12" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:center;" width="20%;">Month</td>
				<td>Jan</td>
				<td>Feb</td>
				<td>Mar</td>
				<td>Apr</td>
				<td>May</td>
				<td>Jun</td>
				<td>Jul</td>
				<td>Aug</td>
				<td>Sept</td>
				<td>Oct</td>
				<td>Nov</td>
				<td>Dec</td>
			</tr>
			<tr>
				<td style="text-align:left;" width="20%;">Total Number of surgeries in the month</td>
				<?php
					for ($month = 1; $month <= 12; $month ++){
						$sql="SELECT senti_nm_surg_dn, COUNT(*) AS total FROM tbl_senti_det WHERE month(senti_dt_surg_dn)='$month'";
						$query=$connect->query($sql);
						$row=$query->fetch_array();
				?>
						<td><?php echo $row['total'];?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td style="text-align:left;" width="20%;">Total No of anesthetia given in the month</td>
				<?php
					for ($month = 1; $month <= 12; $month ++){
						$sql="SELECT senti_tp_ans_gv, COUNT(*) AS tot FROM tbl_senti_det WHERE month(senti_dt_surg_dn)='$month'";
						$query=$connect->query($sql);
						$row=$query->fetch_array();
				?>
						<td><?php echo $row['tot'];?></td>
				<?php
					}
				?>
			</tr>	
			<tr>
				<td style="text-align:left;" width="50%" colspan="6"> % of Unplanned return to OT (No of times unplanned return/total no of surgeries * 100)</td>
				<?php
					$sql=mysqli_query($connect,"SELECT senti_unpl_ret_ot FROM tbl_senti_det WHERE senti_unpl_ret_ot='Yes'")or die(mysqli_error($connect));
					$query=mysqli_num_rows($sql);
					$ot = $query;
					$year = date('Y');
					$sql="SELECT senti_nm_surg_dn, COUNT(*) AS surg FROM tbl_senti_det WHERE year(senti_dt_surg_dn)='$year'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$surg = $row['surg'];
					$otr = ($ot / $surg) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $otr;?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of resceduling of surgeries (No of times surgery resceduled/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_resch_surg_dn, COUNT(*) AS totf FROM tbl_senti_det WHERE senti_resch_surg_dn='Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$otf = ($row['totf'] / $surg) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $otf;?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of cases where procedure followed to prevent adverse events like wrong site, wrong patient and wrong surgery. (No of times  procedure not followed/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_prf_topvev, COUNT(*) AS pnf FROM tbl_senti_det WHERE senti_prf_topvev='No'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$pnf = ($row['pnf'] / $surg) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $pnf;?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of cases where patient given with appropriate prophylactic antibiotics within specified time frame (No of times  antibiotics not given/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_appr_propantb, COUNT(*) AS anti FROM tbl_senti_det WHERE senti_appr_propantb='No'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$anti = ($row['anti'] / $surg) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $anti;?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of cases where planned surgery changed intraoperatively (No of times surgery changed intraoperatively/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_chng_surg_pl_int, COUNT(*) AS pl_int FROM tbl_senti_det WHERE senti_chng_surg_pl_int='Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$pl_int = ($row['pl_int'] / $surg) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $pl_int;?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">Reexploration Rate (No of rexplorations/total no of surgeries * 100)</td>
				<?php
					$sql="SELECT senti_rexpl, COUNT(*) AS rexpl FROM tbl_senti_det WHERE senti_rexpl='Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$rexpl = ($row['rexpl'] / $surg) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $rexpl;?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of adverse events related to surgery  (Total no of Adverse Surgery events/Total no of suergry done*100)</td>
				<?php
					$sql="SELECT senti_any_adv_surg_evt, COUNT(*) AS surg_evt FROM tbl_senti_det WHERE senti_any_adv_surg_evt='Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$surg_evt = ($row['surg_evt'] / $surg) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $surg_evt;?>&nbsp;%</td>				
			</tr>		
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">Total % of PAC done (No of PAC done/total no of anesthetia given * 100)</td>
				<?php
					$sql="SELECT senti_pacdn, COUNT(*) AS pacdn FROM tbl_senti_det WHERE senti_pacdn='Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$pacdn = $row['pacdn'];
					$sql="SELECT senti_tp_ans_gv, COUNT(*) AS ans_gv FROM tbl_senti_det WHERE senti_tp_ans_gv <> ''";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$ans_gv = $row['ans_gv'];
					$pac = ($pacdn / $ans_gv) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $pac;?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of modification in anesthetia plan(No of times anesthetia plan modified/total no of anesthetia given * 100)</td>
				<?php
					$sql="SELECT senti_mod_anspl, COUNT(*) AS ans_pl FROM tbl_senti_det WHERE senti_mod_anspl = 'Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$ans_pl = $row['ans_pl'];
					$tp_ans = ($ans_pl / $ans_gv) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $tp_ans;?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of unplanned ventilation following anesthetia (No of times unplanned ventilation/total no of anesthetia given * 100)</td>
				<?php
					$sql="SELECT senti_unp_vent_aft_ans, COUNT(*) AS aft_ans FROM tbl_senti_det WHERE senti_unp_vent_aft_ans = 'Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$aft_ans = $row['aft_ans'];
					$tp_ans = ($aft_ans / $ans_gv) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $tp_ans;?>&nbsp;%</td>				
			</tr>			
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of anesthetia related mortality rate (No. of death related to anesthetia /Total no of anesthetia given*100)</td>
				<?php
					$sql="SELECT senti_dth_rel_ans, COUNT(*) AS dth_rel FROM tbl_senti_det WHERE senti_dth_rel_ans = 'Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$dth_rel = $row['dth_rel'];
					$tp_ans = ($dth_rel / $ans_gv) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $tp_ans;?>&nbsp;%</td>				
			</tr>
			
			<tr>
				<td style="text-align:left;" width="50%" colspan="6">% of adverse anesthetia related event. (Total no of Adverse anesthtia events/Total no of anesthtia given*100)</td>
				<?php
					$sql="SELECT senti_any_adv_ans_evt, COUNT(*) AS adv_ans FROM tbl_senti_det WHERE senti_any_adv_ans_evt = 'Yes'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$adv_ans = $row['adv_ans'];
					$tp_ans = ($adv_ans / $ans_gv) * 100;
				?>
				<td width="50%" colspan="7"><?php echo $tp_ans;?>&nbsp;%</td>				
			</tr>
		</table>
	</div>  
</div>  