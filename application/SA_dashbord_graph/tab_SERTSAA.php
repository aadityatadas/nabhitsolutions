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
		<!-- <td style="text-align:center; background-color:#e6eeff; font-size: 14px; font-weight: bold;">11</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff;"> SENTINEL EVENT RELATED TO SURGERY AND ANESTHETIA </td>
		 --><td valign="top">
			<table width="800px" style="font-size:14px;"  cellpadding="0" cellspacing="0" border="1">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>1. Total Number of surgeries in the month</td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>2. Total No of anesthetia given in the month</td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>3. % of Unplanned return to OT</td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>4. % of resceduling of surgeries</td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>5. % of cases where procedure followed to prevent adverse events like (WP/WS/WS)</td></tr>
				<!-- <tr style="background-color:#f7f7ff; font-size: 15.5px;"><td>6. % of cases where patient given with appropriate prophylactic antibiotics within specified time frame</td></tr> -->
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>6. % of cases where planned surgery changed intraoperatively</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>7. Reexploration Rate</td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>8. % of adverse events related to surgery</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>9. Total % of PAC done</td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>10. % of modification in anesthetia plan</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>11. % of unplanned ventilation following anesthetia</td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>12. % of anesthetia related mortality rate</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>13. % of adverse anesthetia related event</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="600px" style="font-size:14px;"  cellpadding="0" cellspacing="0" border="1" >
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
							$sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_senti=mysqli_fetch_assoc($sql_senti);
							$rs_surg = $qry_senti["surg_dn"];
					?>
					<td style="font-size: 16px; background-color: #e6eeff;" id="ajj"><center><?php echo $rs_surg;?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_ans=mysqli_query($connect,"SELECT senti_tp_ans_gv, COUNT(*) AS ans_gv FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_ans=mysqli_fetch_assoc($sql_ans);
							$rs_ans = $qry_ans["ans_gv"];
					?>
					<td style="background-color:#f7f7ff; font-size: 16px;" id="ajj"><center><?php echo $rs_ans;?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_ret_ot=mysqli_query($connect,"SELECT senti_unpl_ret_ot FROM tbl_senti_det WHERE senti_unpl_ret_ot='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
							$query_ret_ot=mysqli_num_rows($sql_ret_ot);
							
							$sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_senti=mysqli_fetch_assoc($sql_senti);
							$rs_surg = $qry_senti["surg_dn"];
							$otr = ($query_ret_ot / $rs_surg) * 100;
							if($otr > 0)
							{
								$otr1 = $otr;
							}else{
								$otr1 = 0;
							}
					?>
					<td style="font-size: 16px; background-color: #e6eeff;" id="ajj"><center><?php echo number_format($otr1,2);?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_senti=mysqli_fetch_assoc($sql_senti);
							$rs_surg = $qry_senti["surg_dn"];
							$sql_resch=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_resch_surg_dn='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$query_resch=mysqli_num_rows($sql_resch);
							$otf = ($query_resch / $rs_surg) * 100;
							if($otf > 0)
							{
								$otf1 = $otf;
							}else{
								$otf1 = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size: 16px; "id="ajj"><center><?php echo number_format($otf1,2);?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_senti=mysqli_fetch_assoc($sql_senti);
							$rs_surg = $qry_senti["surg_dn"];
							$sql_resch=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_prf_topvev='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$query_resch=mysqli_num_rows($sql_resch);
							$pnf = ($query_resch / $rs_surg) * 100;
							if($pnf > 0)
							{
								$pnf1 = $pnf;
							}else{
								$pnf1 = 0;
							}
					?>
					<td style="font-size: 16px; background-color: #e6eeff;" id="ajj"><center><?php echo number_format($pnf1,2);?></center></td>
					<?php
						}
					?>
				</tr>

				<!-- <tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_senti=mysqli_fetch_assoc($sql_senti);
							$rs_surg = $qry_senti["surg_dn"];
							$sql_antb=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_appr_propantb='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$query_antb=mysqli_num_rows($sql_antb);
							$anti = ($query_antb / $rs_surg) * 100;
							if($anti > 0)
							{
								$anti1 = $anti;
							}else{
								$anti1 = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size: 15px;" id="ajj"><center><?php echo number_format($anti1,2);?></center></td>
					<?php
						}
					?>
				</tr> -->
				
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_senti=mysqli_fetch_assoc($sql_senti);
							$rs_surg = $qry_senti["surg_dn"];
							$sql_pl_int=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_chng_surg_pl_int='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$query_pl_int=mysqli_num_rows($sql_pl_int);
							$pl_int = ($query_pl_int / $rs_surg) * 100;
							if($pl_int > 0)
							{
								$pl_int1 = $pl_int;
							}else{
								$pl_int1 = 0;
							}
					?>
					<td style="font-size: 16px; background-color: #e6eeff;" id="ajj"><center><?php echo number_format($pl_int1,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_senti=mysqli_fetch_assoc($sql_senti);
							$rs_surg = $qry_senti["surg_dn"];
							$sql_rexpl=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_rexpl='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$query_rexpl=mysqli_num_rows($sql_rexpl);
							$rexpl = ($query_rexpl / $rs_surg) * 100;
							if($rexpl > 0)
							{
								$rexpl1 = $rexpl;
							}else{
								$rexpl1 = 0;
							}
					?>
					<td  style="background-color:#f7f7ff; font-size: 16px;" id="ajj"><center><?php echo number_format($rexpl1,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$qry_senti=mysqli_fetch_assoc($sql_senti);
							$rs_surg = $qry_senti["surg_dn"];
							$sql_evt=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_any_adv_surg_evt='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$query_evt=mysqli_num_rows($sql_evt);
							$surg_evt = ($query_evt / $rs_surg) * 100;
							if($surg_evt > 0)
							{
								$surg_evt1 = $surg_evt;
							}else{
								$surg_evt1 = 0;
							}
					?>
					<td style="font-size: 16px; background-color: #e6eeff;" id="ajj"><center><?php echo number_format($surg_evt1,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_pacdn=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_pacdn='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$pacdn = mysqli_num_rows($sql_pacdn);
							$sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$ans_gv = mysqli_num_rows($sql_ans_gv);
							$pac = ($pacdn / $ans_gv) * 100;
							if($pac > 0)
							{
								$pac1 = $pac;
							}else{
								$pac1 = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size: 16px;" id="ajj"><center><?php echo number_format($pac1,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_anspl=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_mod_anspl='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$anspl = mysqli_num_rows($sql_anspl);
							$sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$ans_gv = mysqli_num_rows($sql_ans_gv);
							$tp_ans = ($anspl / $ans_gv) * 100;
							if($tp_ans > 0)
							{
								$tp_ans1 = $tp_ans;
							}else{
								$tp_ans1 = 0;
							}
					?>
					<td style="font-size: 16px; background-color: #e6eeff; " id="ajj"><center><?php echo number_format($tp_ans1,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_aft_ans=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_unp_vent_aft_ans='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$aft_ans = mysqli_num_rows($sql_aft_ans);
							$sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$ans_gv = mysqli_num_rows($sql_ans_gv);
							$tp_anss1 = ($aft_ans / $ans_gv) * 100;
							if($tp_ans > 0)
							{
								$tp_anss1 = $tp_anss;
							}else{
								$tp_anss1 = 0;
							}
					?>
					<td  style="background-color:#f7f7ff; font-size: 16px;" id="ajj"><center><?php echo number_format($tp_ans1,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_rel_ans=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_dth_rel_ans='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$rel_ans = mysqli_num_rows($sql_rel_ans);
							$sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$ans_gv = mysqli_num_rows($sql_ans_gv);
							$tp_anns = ($rel_ans / $ans_gv) * 100;
							if($tp_anns > 0)
							{
								$tp_anns1 = $tp_anns;
							}else{
								$tp_anns1 = 0;
							}
					?>
					<td style="font-size: 16px; background-color: #e6eeff;" id="ajj"><center><?php echo number_format($tp_anns1,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_ans_evt=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_any_adv_ans_evt='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$ans_evt = mysqli_num_rows($sql_ans_evt);
							$sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
							$ans_gv = mysqli_num_rows($sql_ans_gv);
							$tp_aans = ($ans_evt / $ans_gv) * 100;
							if($tp_aans > 0)
							{
								$tp_aans1 = $tp_aans;
							}else{
								$tp_aans1 = 0;
							}
					?>
					<td style="background-color:#f7f7ff; font-size: 16px;" id="ajj"><center><?php echo number_format($tp_aans1,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>

</table>