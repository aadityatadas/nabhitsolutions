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
 
<div class="container">
        <table class="custom-table" style="font-size: 15px;" >
            <thead>
                <tr >
                    <th rowspan="7" style="background-color: #ccccff;">SR.NO.</th>
                    <th style="background-color: #ccccff;"> <center>FORMS</center></th>
                    <th style="background-color: #ccccff;"><center>INDICATOR</center></th>
		
                    <th style="background-color: #ccccff;"><center>JAN</center></th>
                    <th style="background-color: #ccccff;"><center>FEB</center></th>
                    <th style="background-color: #ccccff;"><center>MAR</center></th>
                    <th style="background-color: #ccccff;"><center>APR</center></th>
                    <th style="background-color: #ccccff;"><center>MAY</center></th>
                    <th style="background-color: #ccccff;"><center>JUN</center></th>
                    <th style="background-color: #ccccff;"><center>JUL</center></th>
                    <th style="background-color: #ccccff;"><center>AUG</center></th>
                    <th style="background-color: #ccccff;"><center>SEP</center></th>
                    <th style="background-color: #ccccff;"><center>OCT</center></th>
                    <th style="background-color: #ccccff;"><center>NOV</center></th>
                    <th style="background-color: #ccccff;"><center>DEC</center></th>

                   <!-- <th>Frst Contntful Paint</th>
                    <th>Frst Meaningful Paint</th>
                    <th>TTI</th>
                    <th>Speed Index</th>
                    <th>Frst CPU Idle</th>
                    <th>Estimated Input Latency</th>-->
                </tr>
            </thead>
<tbody>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">1</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"><center>HOSPITAL UTILIZATION</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
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
			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered">
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
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $icount;?></td>
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
					<td id="ajj"><?php echo $A_count;?></td>
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
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $dis_count;?></td>
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
					<td id="ajj"><?php echo $dm_count;?></td>
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
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $dh_count;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_4 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'MLC' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$mlc_count = mysqli_num_rows($qry3_4);
					?>
					<td id="ajj"><?php echo $mlc_count;?></td>
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
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo number_format($loscount,1);?></td>
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
					<td id="ajj"><?php echo $s_count;?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size: 14px;font-weight: bold;">2</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; " ><center>INITIAL ASSESSEMENT TIME</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>Averarge Intial Assessment Time in Hrs.</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++)
						{
							$hr_num = 0;
							$min_num = 0;
							$sum_std = 0;
							$tot_count = 0;
							$numb3 = 0;
							$qry = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
							while($res = mysqli_fetch_array($qry))
							{
								$sm_std = $res["int_tottm"];
								list($num1, $num2) = explode('.', $sm_std);
								$hr_num = $hr_num + $num1;
								$min_num = $min_num + $num2;
							}
							$sum_std = ($hr_num * 60) + $min_num;	
						
							$qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != ''")or die(mysqli_error($connect));
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
									$numb3 = $numbr3;
								}		
							}else if($tot_count < 60){
								list($numb1, $numb2) = explode('.', $tot_count);
								$aj = 0;
								$numbr3 = $aj.'.'.$numb1;
								$numb3 = $numbr3;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo number_format($numb3,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center;background-color:#e6eeff;font-size: 14px;font-weight: bold;">3</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff;"><center>VENTILATOR ASSOCIATED PNEMONIA FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr  style="background-color: white; font-size: 16px;"><td>1. VAP Rate</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Total Ventilator Days</td></tr>
				<tr  style="background-color: white; font-size: 16px;"><td>3. Positive VAP</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px; " class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry1_vent = mysqli_query($connect,"SELECT SUM(vent_tcd) as std_vent FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')")or die(mysqli_error($connect));
							$res1_vent = mysqli_fetch_assoc($qry1_vent);
							$i_count_1 = $res1_vent["std_vent"];
							$qry_vent2 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
							$v_count_1 = mysqli_num_rows($qry_vent2);
							$vap_count_1 = $v_count_1*1000/$i_count_1;
							if($vap_count_1 > 0){
								$icount_vent = $vap_count_1;
							}else{
								$icount_vent = 0;
							}
					?>
					<td  style="background-color: white; font-size: 16px;" id="ajj"><?php echo number_format($icount_vent,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_vent = mysqli_query($connect,"SELECT SUM(vent_tcd) as std_vent FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')")or die(mysqli_error($connect));
							$res_vent = mysqli_fetch_assoc($qry_vent);
							$i_count_2 = $res_vent["std_vent"];
							if($i_count_2 > 0){
								$icountv_vent = $i_count_2;
							}else{
								$icountv_vent = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $icountv_vent;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2_vent = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
							$v_count_2 = mysqli_num_rows($qry2_vent);
					?>
					<td style="background-color: white;  font-size: 16px;" id="ajj"><?php echo $v_count_2;?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size: 14px;font-weight: bold;">4</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"><center>CATHER ASSOCIATED UNRINARY TRACT INFECTION</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. CAUTI Rate</td></tr>
				<tr style="font-size: 16px;"><td>2. Total Catheter Days</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Positive CAUTI</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_cath = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as std_cath FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr')")or die(mysqli_error($connect));
							$res_cath = mysqli_fetch_assoc($qry_cath);
							$i_count_cath = $res_cath["std_cath"];
							$qry2_cath = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
							$c_count_cath = mysqli_num_rows($qry2_cath);
							$cauti_count_cath = $c_count_cath*1000/$i_count_cath;
							if($cauti_count_cath > 0){
								$cauti_countcath = $cauti_count_cath;
							}else{
								$cauti_countcath = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo number_format($cauti_countcath,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_cath3 = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as tcd_cath3 FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_tcd != ''")or die(mysqli_error($connect));
							$res_cath3 = mysqli_fetch_assoc($qry_cath3);
							$tcd_cath3 = $res_cath3["tcd_cath3"];
							if($tcd_cath3 > 0){
								$tcdcath3 = $tcd_cath3;
							}else{
								$tcdcath3 = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><?php echo number_format($tcdcath3,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_cath2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
							$c_cathcount = mysqli_num_rows($qry_cath2);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $c_cathcount;?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center; background-color:#e6eeff;font-size: 14px;font-weight: bold;">5</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff;" ><center>CENTRAL LINE ASSOCIATED BLOOD STREAM INFECTION FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr  style="background-color: white; font-size: 16px;"><td>1. CLABSI Rate</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Total Central Line Days</td></tr>
				<tr style="background-color: white; font-size: 16px;"><td>3. Positive CLABSI</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_clabsi = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as std_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr')")or die(mysqli_error($connect));
							$res_clabsi = mysqli_fetch_assoc($qry_clabsi);
							$i_count_clabsi = $res_clabsi["std_clabsi"];
							$qry2_clabsi = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
							$c_count_clabsi = mysqli_num_rows($qry2_clabsi);
							$clabsi_count = $c_count_clabsi*1000/$i_count_clabsi;
							if($clabsi_count > 0){
								$clabsicount = $clabsi_count;
							}else{
								$clabsicount = 0;
							}
					?>
					<td style="background-color: white; font-size: 16px;" id="ajj"><?php echo number_format($clabsicount,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_clabsi = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as tcd_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_tcld != ''")or die(mysqli_error($connect));
							$res3_clabsi = mysqli_fetch_assoc($qry3_clabsi);
							$tcd_clabsi = $res3_clabsi["tcd_clabsi"];
							if($tcd_clabsi > 0){
								$tcdclabsi = $tcd_clabsi;
							}else{
								$tcdclabsi = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $tcdclabsi;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2clabsi = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
							$c_countclabsi = mysqli_num_rows($qry2clabsi);
					?>
					<td style="background-color: white; font-size: 16px;" id="ajj"><?php echo $c_countclabsi;?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size: 14px;font-weight: bold;">6</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"><center>SURGICAL SITE INFECTION FORM</center></td>
		<td valign="top"> 
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. SSI Rate</td></tr>
				<tr style="font-size:16px;"><td>2. Symptoms Of SSI</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Positive SSI</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2_ssi = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
							$i_count_ssi = mysqli_num_rows($qry2_ssi);
							$qry3_ssi = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND huf_surg = 'Surgery' ")or die(mysqli_error($connect));
							$c_count_ssi = mysqli_num_rows($qry3_ssi);
							$ssi_cnt_ssi = ($i_count_ssi/$c_count_ssi)*100; // - 0.13;
							$ssi_count_ssi = (float)$ssi_cnt_ssi;
							if($ssi_count_ssi > 0)
							{
								$ssicount = $ssi_count_ssi;
							}else{
								$ssicount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo number_format($ssicount,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry4_ssi = mysqli_query($connect,"SELECT surg_symp FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_symp = 'Yes'")or die(mysqli_error($connect));
							$s_ssicount = mysqli_num_rows($qry4_ssi);
							
					?>
					<td id="ajj"><?php echo $s_ssicount;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2_ssi = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
							$i_ssicount = mysqli_num_rows($qry2_ssi);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $i_ssicount;?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center; background-color:#e6eeff;font-size: 14px; font-weight: bold;">7</td>
		<td  style="font-weight: bold;font-size: 14px;background-color:#e6eeff; font-family: sans-serif;"><center>BED OCCUPANCY FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: white; font-size:16px;"><td>1. Total No. of Patient</td></tr>
				<tr style="background-color:#e6eeff; font-size:16px;"><td>2. Total No. of Discharge/Dama/Death</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$s_bed = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$cnt2_bed = mysqli_num_rows($s_bed);
					?>
					<td style="background-color: white; font-size:16px;" id="ajj"><?php echo $cnt2_bed;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$s3_bed = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE huf_ddd != '' AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$cnt3_bed = mysqli_num_rows($s3_bed);
					?>
					<td style="background-color:#e6eeff; font-size:16px;" id="ajj"><?php echo $cnt3_bed;?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size: 14px;font-weight: bold; ">8</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; "><center>IPD WAITING TIME FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: white; font-size:16px;"><td>Average IPD Waiting Time</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_ipd = mysqli_query($connect,"SELECT SUM(wttm_opdwttm) as std_ipd FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$res_ipd = mysqli_fetch_assoc($qry_ipd);
							$i_count_ipd = $res_ipd["std_ipd"];
							
							$qry5_ipd = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE wttm_opdwttm != '' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$s_count_ipd = mysqli_num_rows($qry5_ipd);
							$tot_count_ipd = $i_count_ipd / $s_count_ipd;
							if($tot_count_ipd > 0)
							{
								$totcount_ipd = $tot_count_ipd;
							}else{
								$totcount_ipd = 0;
							}
					?>
					<td style="background-color: white; font-size:16px;" id="ajj"><?php echo number_format($totcount_ipd,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center; background-color:#e6eeff;font-size: 14px;font-weight: bold; ">9</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff;"><center>OPD WAITING TIME FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>1. Total No. of OPD's</td></tr>
				<tr style="background-color: white; font-size: 16px;"><td>2. Average OPD Waiting Time in Hrs.</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry5_opd = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
							$s_count_opd = mysqli_num_rows($qry5_opd);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $s_count_opd;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$hr_num_opd = 0;
							$min_num_opd = 0;
							$sum_std_opd = 0;
							$tot_count_opd = 0;
							$numb3_opd = 0;
							$qry_opd = mysqli_query($connect,"SELECT opdwttm_opdwttm FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != '' ORDER BY opdwttm_id ASC")or die(mysqli_error($connect));
							while($res_opd = mysqli_fetch_array($qry_opd))
							{
								$sm_std_opd = $res_opd["opdwttm_opdwttm"];
								list($num1_opd, $num2_opd) = explode('.', $sm_std_opd);
								$hr_num_opd = $hr_num_opd + $num1_opd;
								$min_num_opd = $min_num_opd + $num2_opd;
							}
							$sum_std_opd = ($hr_num_opd * 60) + $min_num_opd;	
							
							$qry5_opd = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
							$s_count_opd = mysqli_num_rows($qry5_opd);
							
							$tot_count_opd = $sum_std_opd / $s_count_opd;
							if($tot_count_opd >= 60)
							{
								$tt_count_opd = $tot_count_opd / 60;
								list($number1_opd, $number2_opd) = explode('.', $tt_count_opd);
								
								$tot_min_opd = $tot_count_opd - ($number1_opd * 60);
								if($tot_min_opd >= 10)
								{
									$numb3_opd = $number1_opd.'.'.$tot_min_opd;
								}else if($tot_min_opd < 10){
									$a_opd = 0;
									$numbr3_opd = $number1_opd.'.'.$a_opd.''.$tot_min_opd;
									$numb3_opd = number_format($numbr3_opd,2);
								}		
							}else if($tot_count_opd < 60){
								list($numb1_opd, $numb2_opd) = explode('.', $tot_count_opd);
								$aj_opd = 0;
								$numbr3_opd = $aj_opd.'.'.$numb1_opd;
								$numb3_opd = number_format($numbr3_opd,2);
							}
					?>
					<td style="background-color: white; font-size: 16px;" id="ajj"><?php echo number_format($numb3_opd,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size: 14px;font-weight: bold;">10</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"><center>NEEDLE PRICK INJURY FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. No. of Operational Exposure / Needle Prick Injury Incidences</td></tr>
				<tr style="font-size: 16px;"><td>2. Occupational Exposure Rate / Needle Prick Injury Rate</td></tr>
			</table>
		</td>
		<td colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_needl = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
							$res_needl = mysqli_num_rows($qry_needl);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><?php echo $res_needl;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qryneedl = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
							$resneedl = mysqli_num_rows($qryneedl);
							
							$qrneedl = mysqli_query($connect,"SELECT SUM(huf_lens) as stdneedl FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rsneedl = mysqli_fetch_assoc($qrneedl);
							$i_countneedl = $rsneedl["stdneedl"];
							
							$rateneedl = ($resneedl / $i_countneedl) * 1000;
							if($rateneedl > 0)
							{
								$rateneedl2 = $rateneedl;
							}else{
								$rateneedl2 = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><?php echo number_format($rateneedl2,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center; background-color:#e6eeff; font-size: 14px; font-weight: bold;">11</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff;"><center>SENTINEL EVENT RELATED TO SURGERY AND ANESTHETIA</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>1. Total Number of surgeries in the month</td></tr>
				<tr style="background-color: white; font-size: 16px;"><td>2. Total No of anesthetia given in the month</td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>3. % of Unplanned return to OT</td></tr>
				<tr style="background-color: white; font-size: 16px;"><td>4. % of resceduling of surgeries</td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>5. % of cases where procedure followed to prevent adverse events like (WP/WS/WS)</td></tr>
				<tr style="background-color: white;font-size: 16px;"><td>6. % of cases where patient given with appropriate prophylactic antibiotics within specified time frame</td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>7. % of cases where planned surgery changed intraoperatively</td></tr>
				<tr style="background-color: white; font-size: 16px;"><td>8. Reexploration Rate</td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>9. % of adverse events related to surgery</td></tr>
				<tr style="background-color: white; font-size: 16px;"><td>10. Total % of PAC done</td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>11. % of modification in anesthetia plan</td></tr>
				<tr style="background-color: white; font-size: 16px;"><td>12. % of unplanned ventilation following anesthetia</td></tr>
				<tr style="background-color: #e6eeff; font-size: 16px;"><td>13. % of anesthetia related mortality rate</td></tr>
				<tr style="background-color: white; font-size: 16px;"><td>14. % of adverse anesthetia related event</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
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
					<td style="background-color: white; font-size: 16px;" id="ajj"><center><?php echo $rs_ans;?></center></td>
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
					<td style="background-color: white; font-size: 16px; "id="ajj"><center><?php echo number_format($otf1,2);?></center></td>
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
				<tr>
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
					<td style="background-color: white; font-size: 16px;" id="ajj"><?php echo number_format($anti1,2);?></td>
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
					<td  style="background-color: white; font-size: 16px;" id="ajj"><center><?php echo number_format($rexpl1,2);?></center></td>
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
					<td style="background-color: white; font-size: 16px;" id="ajj"><center><?php echo number_format($pac1,2);?></center></td>
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
					<td  style="background-color: white; font-size: 16px;" id="ajj"><center><?php echo number_format($tp_ans1,2);?></center></td>
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
					<td style="background-color: white; font-size: 16px;" id="ajj"><center><?php echo number_format($tp_aans1,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>	
	<tr>
		<td style="text-align:center; font-size: 14px; font-weight: bold;">12</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"><center>BLOOD TRANSFUSION RELATED EVENTS</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Average Turn around time for Blood</td></tr>
				<tr style="font-size: 16px;"><td>2. % of blood transfusion reaction</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. % of Blood Product Wastage</td></tr>
				<tr  style="font-size: 16px;"><td>4. % of Blood Component Usage</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$treq_bld = 0;
							$trec_bld = 0;
							$sql_bld = mysqli_query($connect,"SELECT bld_dtrec, bld_tmreq, bld_dtreq, bld_tmrec FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							while($rw_bld = mysqli_fetch_array($sql_bld))
							{
								$req_bld = strtotime($rw_bld["bld_dtreq"].' '.$rw_bld["bld_tmreq"]);
								$treq_bld = $treq_bld + $req_bld;
								$rec_bld = strtotime($rw_bld["bld_dtrec"].' '.$rw_bld["bld_tmrec"]);
								$trec_bld = $trec_bld + $rec_bld;
							}
							$diff_bld = abs($trec_bld - $treq_bld);
							$years_bld   = floor($diff_bld / (365*60*60*24)); 
							$months_bld  = floor(($diff_bld - $years_bld * 365*60*60*24) / (30*60*60*24)); 
							$days_bld    = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24)/ (60*60*24));
							$hours_bld   = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24 - $days_bld*60*60*24)/ (60*60)); 
							
							$hour_bld   = floor(($diff_bld) / (60*60)); 

							$minuts_bld  = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24 - $days_bld*60*60*24 - $hours_bld*60*60)/ 60); 
							
							$ht_mi_bld = $hour_bld.'.'.$minuts_bld;
							$sql1_bld = mysqli_query($connect,"SELECT * FROM tbl_blood_fusion WHERE bld_dtrec <> ''")or die(mysqli_error($connect));
							$rs_bld = mysqli_num_rows($sql1_bld);
							$min_bld = $ht_mi_bld / $rs_bld;
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($min_bld,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_bld = mysqli_query($connect,"SELECT bld_trfusreact FROM tbl_blood_fusion WHERE bld_trfusreact = 'Yes' AND (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rs_bld = mysqli_num_rows($sql_bld);
							$sql1_bld = mysqli_query($connect,"SELECT SUM(bld_notrfus) as tot_bld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rs1_bld = mysqli_fetch_array($sql1_bld);
							$tot_bld = $rs1_bld["tot_bld"];
							$tots_bld = ($rs_bld / $tot_bld) * 100;
							if($tots_bld > 0)
							{
								$totsbld = $tots_bld;
							}else{
								$totsbld = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><?php echo number_format($totsbld,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql1bld = mysqli_query($connect,"SELECT SUM(bld_waste_det) as totbld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rs1bld = mysqli_fetch_array($sql1bld);
							$totbld = $rs1bld["totbld"];
							$sqlbld = mysqli_query($connect,"SELECT SUM(bld_norec) as ttbld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rsbld = mysqli_fetch_array($sqlbld);
							$ttbld = $rsbld["ttbld"];
							$ttsbld = ($totbld / $ttbld) * 100;
							if($ttsbld > 0)
							{
								$tts = $ttsbld;
							}else{
								$tts = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($tts,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sqlbld2 = mysqli_query($connect,"SELECT SUM(bld_norec) as ttsbld2 FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rsbld2 = mysqli_fetch_array($sqlbld2);
							$ttsbld2 = $rsbld2["ttsbld2"];
							$sqlsbld2 = mysqli_query($connect,"SELECT SUM(bld_notrfus) as tttsbld2 FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$rssbld2 = mysqli_fetch_array($sqlsbld2);
							$tttsbld2 = $rssbld2["tttsbld2"];
							$ttssbld2 = ($tttsbld2 / $ttsbld2) * 100;
							if($ttsbld2 > 0)
							{
								$ttss = $ttsbld2;
							}else{
								$ttss = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><?php echo number_format($ttss,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>	
	<tr>
		<td style="text-align:center; background-color: #e6eeff;font-size: 14px;font-weight: bold; ">13</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color: #e6eeff;"><center>CARE RELATED EVENTS</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Thromboplebitis Rate</td></tr>
				<tr style="background-color: white;  font-size:16px;"><td>2. Hematoma Rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. Bed Score Rate</td></tr>
				<tr style="background-color: white;  font-size:16px;"><td>4. Patient Fall Rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>5. Accidental Removal of Drains and Lines Rate</td></tr>
				<tr style="background-color: white;  font-size:16px;"><td>6. Injury to Patient Rate</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car = mysqli_fetch_assoc($qry_car);
							$i_count_car = $res_car["std_car"];
							
							$qry2_car1 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsymp_th = 'Yes'")or die(mysqli_error($connect));
							$thromb_car1 = mysqli_num_rows($qry2_car1);
							$res_thromb_car1 = ($thromb_car1 / $i_count_car) * 1000;
							if($res_thromb_car1 > 0)
							{
								$res_thromb1 = $res_thromb_car1;
							}else{
								$res_thromb1 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($res_thromb1,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car2 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car2 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car2 = mysqli_fetch_assoc($qry_car2);
							$i_count_car2 = $res_car2["std_car2"];
							
							$qry2_car2 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsymp = 'Yes'")or die(mysqli_error($connect));
							$thromb_car2 = mysqli_num_rows($qry2_car2);
							$res_thromb_car2 = ($thromb_car2 / $i_count_car2) * 1000;
							if($res_thromb_car2 > 0)
							{
								$res_thromb2 = $res_thromb_car2;
							}else{
								$res_thromb2 = 0;
							}
							
					?>
					<td  style="background-color: white; font-size:16px;" id="ajj"><?php echo number_format($res_thromb2,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car3 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car3 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car3 = mysqli_fetch_assoc($qry_car3);
							$i_count_car3 = $res_car3["std_car3"];
							
							$qry2_car3 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsyp_bed = 'Yes'")or die(mysqli_error($connect));
							$thromb_car3 = mysqli_num_rows($qry2_car3);
							$res_thromb_car3 = ($thromb_car3 / $i_count_car3) * 1000;
							if($res_thromb_car3 > 0)
							{
								$res_thromb3 = $res_thromb_car3;
							}else{
								$res_thromb3 = 0;
							}
					?>
					<td  style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($res_thromb3,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car4 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car4 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car4 = mysqli_fetch_assoc($qry_car4);
							$i_count_car4 = $res_car4["std_car4"];
							
							$qry2_car4 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_incd_ptfall = 'Yes'")or die(mysqli_error($connect));
							$thromb_car4 = mysqli_num_rows($qry2_car4);
							$res_thromb_car4 = ($thromb_car4 / $i_count_car4) * 1000;
							if($res_thromb_car4 > 0)
							{
								$res_thromb4 = $res_thromb_car4;
							}else{
								$res_thromb4 = 0;
							}
					?>
					<td style="background-color: white;font-size:16px;" id="ajj"><?php echo number_format($res_thromb4,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car5 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car5 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car5 = mysqli_fetch_assoc($qry_car5);
							$i_count_car5 = $res_car5["std_car5"];
							
							$qry2_car5 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_iardl = 'Yes'")or die(mysqli_error($connect));
							$thromb_car5 = mysqli_num_rows($qry2_car5);
							$res_thromb_car5 = ($thromb_car5 / $i_count_car5) * 1000;
							if($res_thromb_car5 > 0)
							{
								$res_thromb5 = $res_thromb_car5;
							}else{
								$res_thromb5 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($res_thromb5,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_car6 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car6 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res_car6 = mysqli_fetch_assoc($qry_car6);
							$i_count_car6 = $res_car6["std_car6"];
							
							$qry2_car6 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_injtpt = 'Yes'")or die(mysqli_error($connect));
							$thromb_car6 = mysqli_num_rows($qry2_car6);
							$res_thromb_car6 = ($thromb_car6 / $i_count_car6) * 1000;
							if($res_thromb_car6 > 0)
							{
								$res_thromb6 = $res_thromb_car6;
							}else{
								$res_thromb6 = 0;
							}
					?>
					<td style="background-color: white;font-size:16px;" id="ajj"><?php echo number_format($res_thromb6,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>	
	<tr>
		<td style="text-align:center; font-size: 14px; font-weight: bold;">14</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"><center>MEDICAL RECORDS INDICATOR FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. % of Missing Records</td></tr>
				<tr style="font-size: 16px;"><td>2. MRD File In order as per MRD checklist</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. MRD has Discharge Summary</td></tr>
				<tr style="font-size: 16px;"><td>4. MRD has codification as per ICD</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>5. MRD has incomplete or Improper Consent</td></tr>
				<tr style="font-size: 16px;"><td>6. Medication orders are properly written</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>7. Handover Sheet of Doctors are properly filled</td></tr>
				<tr style="font-size: 16px;"><td>8. Handover Sheet of Nurses are properly filled</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>9. The Plan of care is documented with desired outcome and countersigned by clinicians</td></tr>
				<tr style="font-size: 16px;"><td>10. MRD includes screening for nutritional needs (Nutritional Assessment)</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>11. MRD Includes Nursing care plan is documented with outcome at the time of admission</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi = mysqli_num_rows($sq_medi);
							$sql_medi=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdav='Missing' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl_medi = mysqli_num_rows($sql_medi);
							$rexpl_medi = ($rsl_medi / $rs_medi) * 100;
							if($rexpl_medi > 0)
							{
								$rexpls_medi = $rexpl_medi;
							}else{
								$rexpls_medi = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($rexpls_medi,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi2 = mysqli_num_rows($sq_medi2);
							$sql2_medi2=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdfile='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl2_medi2 = mysqli_num_rows($sql2_medi2);
							$rexpl2_medi2 = ($rsl2_medi2 / $rs_medi2) * 100;
							if($rexpl2_medi2 > 0)
							{
								$rexpls2_medi2 = $rexpl2_medi2;
							}else{
								$rexpls2_medi2 = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><?php echo number_format($rexpls2_medi2,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi3 = mysqli_num_rows($sq_medi3);
							$sql3_medi3=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrddissum='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl3_medi3 = mysqli_num_rows($sql3_medi3);
							$rexpl3_medi3 = ($rsl3_medi3 / $rs_medi3) * 100;
							if($rexpl3_medi3 > 0)
							{
								$rexpls3_medi3 = $rexpl3_medi3;
							}else{
								$rexpls3_medi3 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($rexpls3_medi3,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi4 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi4 = mysqli_num_rows($sq_medi4);
							$sql4_medi4=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdicd='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl4_medi4 = mysqli_num_rows($sql4_medi4);
							$rexpl4_medi4 = ($rsl4_medi4 / $rs_medi4) * 100;
							if($rexpl4_medi4 > 0)
							{
								$rexpls4_medi4 = $rexpl4_medi4;
							}else{
								$rexpls4_medi4 = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><?php echo number_format($rexpls4_medi4,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi5 = mysqli_num_rows($sq_medi5);
							$sql5_medi5=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdimpcons='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl5_medi5 = mysqli_num_rows($sql5_medi5);
							$rexpl5_medi5 = ($rsl5_medi5 / $rs_medi5) * 100;
							if($rexpl5_medi5 > 0)
							{
								$rexpls5_medi5 = $rexpl5_medi5;
							}else{
								$rexpls5_medi5 = 0;
							}
					?>
					<td  style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($rexpls5_medi5,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi6 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi6 = mysqli_num_rows($sq_medi6);
							$sql6_medi6=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mediord='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medi6 = mysqli_num_rows($sql6_medi6);
							$rexpl6_medi6 = ($rsl6_medi6 / $rs_medi6) * 100;
							if($rexpl6_medi6 > 0)
							{
								$rexpls6_medi6 = $rexpl6_medi6;
							}else{
								$rexpls6_medi6 = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><?php echo number_format($rexpls6_medi6,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi7 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi7 = mysqli_num_rows($sq_medi7);
							$sql6_medi7=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_dr='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medi7 = mysqli_num_rows($sql6_medi7);
							$rexpl6_medi7 = ($rsl6_medi7 / $rs_medi7) * 100;
							if($rexpl6_medi7 > 0)
							{
								$rexpls6_medi7 = $rexpl6_medi7;
							}else{
								$rexpls6_medi7 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($rexpls6_medi7,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi8 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi8 = mysqli_num_rows($sq_medi8);
							$sql6_medi8=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_nur='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medi8 = mysqli_num_rows($sql6_medi8);
							$rexpl6_medi8 = ($rsl6_medi8 / $rs_medi8) * 100;
							if($rexpl6_medi8 > 0)
							{
								$rexpls6_medi8 = $rexpl6_medi8;
							}else{
								$rexpls6_medi8 = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><?php echo number_format($rexpls6_medi8,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi9 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi9 = mysqli_num_rows($sq_medi9);
							$sql6_medi9=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_planofcare='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medi9 = mysqli_num_rows($sql6_medi9);
							$rexpl6_medi9 = ($rsl6_medi9 / $rs_medi9) * 100;
							if($rexpl6_medi9 > 0)
							{
								$rexpls6_medi9 = $rexpl6_medi9;
							}else{
								$rexpls6_medi9 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($rexpls6_medi9,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_media = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_media = mysqli_num_rows($sq_media);
							$sql6_media=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_screen='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_media = mysqli_num_rows($sql6_media);
							$rexpl6_media = ($rsl6_media / $rs_media) * 100;
							if($rexpl6_media > 0)
							{
								$rexpls6_media = $rexpl6_media;
							}else{
								$rexpls6_media = 0;
							}
					?>
					<td  style="font-size: 16px;" id="ajj"><?php echo number_format($rexpls6_media,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medib = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medib = mysqli_num_rows($sq_medib);
							$sql6_medib=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_nur_careplan='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medib = mysqli_num_rows($sql6_medib);
							$rexpl6_medib = ($rsl6_medib / $rs_medib) * 100;
							if($rexpl6_medib > 0)
							{
								$rexpls6_medib = $rexpl6_medib;
							}else{
								$rexpls6_medib = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($rexpls6_medib,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-size: 14px; background-color: #e6eeff; font-weight: bold;">15</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color: #e6eeff;"><center>HR INDICATOR</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: white; font-size:16px;"><td>1. Employee Absentism Rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>2. Employee Satisfaction Rate</td></tr>
				<tr style="background-color: white; font-size:16px;"><td>3. Employee Griviences rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>4. Needle Prick Injury Rate</td></tr>
				<tr style="background-color: white; font-size:16px;"><td>5. Occupational Exposure rate</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>6. % of complete HR files</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql_hr = mysqli_query($connect,"SELECT SUM(hr_absent) as abs_hr FROM tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs_hr = mysqli_fetch_array($sql_hr);
							$abs_hr = $rs_hr["abs_hr"];
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$tabss1_hr = ($abs_hr/$rq_hr/30) * 100;
							if($tabss1_hr > 0)
							{
								$tabs1_hr = number_format($tabss1_hr,2);
							}else{
								$tabs1_hr = 0;
							}
					?>
					<td  style="background-color: white; font-size:16px;" id="ajj"><?php echo number_format($tabs1_hr,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql2_hr = mysqli_query($connect,"SELECT SUM(hr_satis_score) as abs2_hr FROM tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs2_hr = mysqli_fetch_assoc($sql2_hr);
							$abs2_hr = $rs2_hr["abs2_hr"];
							$tabss2_hr = ($abs2_hr/$rq_hr);
							if($tabss2_hr > 0)
							{
								$tabs2_hr = $tabss2_hr;
							}else{
								$tabs2_hr = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($tabs2_hr,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql3_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_griv = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs3_hr = mysqli_num_rows($sql3_hr);
							$tabss3_hr = ($rs3_hr/$rq_hr) * 100;
							if($tabss3_hr > 0)
							{
								$tabs3_hr = $tabss3_hr;
							}else{
								$tabs3_hr = 0;
							}
					?>
					<td style="background-color: white; font-size:16px;" id="ajj"><?php echo number_format($tabs3_hr,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql4_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_need_inj = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs4_hr = mysqli_num_rows($sql4_hr);
							$tabss4_hr = ($rs4_hr/$rq_hr) * 100;
							if($tabss4_hr > 0)
							{
								$tabs4_hr = $tabss4_hr;
							}else{
								$tabs4_hr = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($tabs4_hr,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql5_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_occpany = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs5_hr = mysqli_num_rows($sql5_hr);
							$tabss5_hr = ($rs5_hr/$rq_hr) * 100;
							if($tabss5_hr > 0)
							{
								$tabs5_hr = $tabss5_hr;
							}else{
								$tabs5_hr = 0;
							}
					?>
					<td style="background-color: white; font-size:16px;" id="ajj"><?php echo number_format($tabs5_hr,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rq_hr = mysqli_num_rows($sq_hr);
							$sql6_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_per_file = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$rs6_hr = mysqli_num_rows($sql6_hr);
							$tabss6_hr = ($rs6_hr/$rq_hr) * 100;
							if($tabss6_hr > 0)
							{
								$tabs6_hr = $tabss6_hr;
							}else{
								$tabs6_hr = 0;
							}
					?>
					<td  style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($tabs6_hr,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center; font-size: 14px; font-weight: bold;">16</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;" ><center>EQUIPMENT INDICATOR</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Equipement Breakdown Time</td></tr>
				<tr style="font-size: 16px;"><td>2. No. of Equipement under Warranty</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. No. of Equipement under AMC</td></tr>
				<tr style="font-size: 16px;"><td>4. % of AMC</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$treq_eqp = 0;
							$trec_eqp = 0;
							$sql_eqp = mysqli_query($connect,"SELECT eqp_dtbr, eqp_dtrp FROM tbl_eqp_indic WHERE (month(eqp_dtbr) = '$month' AND year(eqp_dtbr) = '$yr')")or die(mysqli_error($connect));
							while($rw_eqp = mysqli_fetch_array($sql_eqp))
							{
								$req_eqp = strtotime($rw_eqp["eqp_dtbr"]);
								$treq_eqp = $treq_eqp + $req_eqp;
								$rec_eqp = strtotime($rw_eqp["eqp_dtrp"]);
								$trec_eqp = $trec_eqp + $rec_eqp;
							}
							$diff_eqp = abs($trec_eqp - $treq_eqp);
							$years_eqp   = floor($diff_eqp / (365*60*60*24)); 
							$months_eqp  = floor(($diff_eqp - $years_eqp * 365*60*60*24) / (30*60*60*24)); 
							$days_eqp    = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24)/ (60*60*24));
							$hours_eqp   = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24 - $days_eqp*60*60*24)/ (60*60)); 
							
							$hour_eqp   = floor(($diff_eqp) / (60*60)); 

							$minuts_eqp  = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24 - $days_eqp*60*60*24 - $hours_eqp*60*60)/ 60); 
							
							$ht_mi_eqp = $hour_eqp.'.'.$minuts_eqp;
							$sql1_eqp = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic")or die(mysqli_error($connect));
							$rs_eqp = mysqli_num_rows($sql1_eqp);
							$min_eqp = $ht_mi_eqp / $rs_eqp;
							if($min_eqp > 0)
							{
								$mineqp = $min_eqp;
							}else{
								$mineqp = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($mineqp,2);?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq2_eqp = mysqli_query($connect,"SELECT eqpid FROM tbl_eqp_mast WHERE (month(eqp_wty1) = '$month' OR month(eqp_wty1) < '$month' AND year(eqp_wty1) = '$yr' OR year(eqp_wty1) < '$yr') AND (month(eqp_wty2) > '$month' AND year(eqp_wty2) = '$yr' OR year(eqp_wty2) > '$yr')")or die(mysqli_error($connect));
							$rs2_eqp = mysqli_num_rows($sq2_eqp);
					?>
					<td style="font-size: 16px;" id="ajj"><?php echo $rs2_eqp;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq3_eqp = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic WHERE (month(eqp_amc1) = '$month' OR month(eqp_amc1) < '$month' AND year(eqp_amc1) = '$yr' OR year(eqp_amc1) < '$yr') AND (month(eqp_amc2) > '$month' AND year(eqp_amc2) = '$yr' OR year(eqp_amc2) > '$yr')")or die(mysqli_error($connect));
							$rs3_eqp = mysqli_num_rows($sq3_eqp);
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo $rs3_eqp;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sql4_eqp = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast")or die(mysqli_error($connect));
							$rs4_eqp = mysqli_num_rows($sql4_eqp);					
							
							$sql5_eqp = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast LEFT JOIN tbl_eqp_indic ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE (month(eqp_amc1) = '$month' OR month(eqp_amc1) < '$month' AND year(eqp_amc1) = '$yr' OR year(eqp_amc1) < '$yr') AND (month(eqp_amc2) > '$month' AND year(eqp_amc2) = '$yr' OR year(eqp_amc2) > '$yr')")or die(mysqli_error($connect));
							$rs5_eqp = mysqli_num_rows($sql5_eqp);
							
							$tt5_eqp = ($rs5_eqp / $rs4_eqp) * 100;
							if($tt5_eqp > 0)
							{
								$tt5eqp = $tt5_eqp; 
							}else{
								$tt5eqp = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><?php echo number_format($tt5eqp,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; background-color: #e6eeff; font-weight: bold;font-size: 14px;">17</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color: #e6eeff;"><center>IPD FEEDBACK FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Total No. of IPD Patient</td></tr>
				<tr style="background-color: white; font-size:16px;"><td>2. Total No. of Patient Who Has Given Feedback</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. IPD Satisfaction Index</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry4_ipdf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr')")or die(mysqli_error($connect));
							$res4_ipdf = mysqli_num_rows($qry4_ipdf);
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo $res4_ipdf;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2_ipdf = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr') AND ipd_user != ''")or die(mysqli_error($connect));
							$res2_ipdf = mysqli_num_rows($qry2_ipdf);
					?>
					<td style="background-color: white;  font-size:16px;" id="ajj"><?php echo $res2_ipdf;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_ipdf = mysqli_query($connect,"SELECT SUM(ipd_score) as score_ipdf FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr') AND ipd_user != ''")or die(mysqli_error($connect));
							$res3_ipdf = mysqli_fetch_assoc($qry3_ipdf);
							$res_ipdf = $res3_ipdf["score_ipdf"];
							
							$qry4_ipdf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr')")or die(mysqli_error($connect));
							$res4_ipdf = mysqli_num_rows($qry4_ipdf);
							
							$tot_scor_ipdf = ($res_ipdf / 120 / $res4_ipdf) * 100;
							$resul_ipdf = $tot_scor_ipdf;
							if($resul_ipdf > 0)
							{
								$resulipdf = $resul_ipdf; 
							}else{
								$resulipdf = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($resulipdf,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center;  font-weight: bold;font-size: 14px;">18</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"><center>OPD FEEDBACK FORM</center></td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. Total No. of OPD Patient</td></tr>
				<tr style="font-size: 16px;"><td>2. Total No. of Patient Who Has Given Feedback</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. OPD Satisfaction Index</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry4_opdf = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr')")or die(mysqli_error($connect));
							$res4_opdf = mysqli_num_rows($qry4_opdf);
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo $res4_opdf;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry2_opdf = mysqli_query($connect,"SELECT opd_id FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opd_user != ''")or die(mysqli_error($connect));
							$res2_opdf = mysqli_num_rows($qry2_opdf);
					?>
					<td style="font-size: 16px;" id="ajj"><?php echo $res2_opdf;?></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_opdf = mysqli_query($connect,"SELECT SUM(opd_score) as score_opdf FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opd_user != ''")or die(mysqli_error($connect));
							$res3_opdf = mysqli_fetch_assoc($qry3_opdf);
							$res_opdf = $res3_opdf["score_opdf"];
							
							$qry4_opdf = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr')")or die(mysqli_error($connect));
							$res4_opdf = mysqli_num_rows($qry4_opdf);
							
							$tot_scor_opdf = ($res_opdf / 120 / $res4_opdf) * 100;
							$resul_opdf = number_format($tot_scor_opdf,2);
							if($resul_opdf > 0)
							{
								$resulopdf = $resul_opdf; 
							}else{
								$resulopdf = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><?php echo number_format($resulopdf,2);?></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>		
</tbody>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
   .custom-table{border-collapse:collapse;width:100%;border:solid 1px #c0c0c0;font-family:open sans;font-size:11px}
            .custom-table th,.custom-table td{text-align:left;padding:8px;border:solid 1px #c0c0c0}
            .custom-table th{color:#000080}
            .custom-table tr:nth-child(odd){background-color:#f7f7ff}
            .custom-table>thead>tr{background-color:#dde8f7!important}
            .tbtn{border:0;outline:0;background-color:transparent;font-size:13px;cursor:pointer}
            .toggler{display:none}
            .toggler1{display:table-row;}
            .custom-table a{color: #0033cc;}
            .custom-table a:hover{color: #f00;}
            .page-header{background-color: #eee;}
</style>
 
            
            
        </table>
        
</div>
<script>
	 $(document).ready(function () {
                $(".tbtn").click(function () {
                    $(this).parents(".custom-table").find(".toggler1").removeClass("toggler1");
                    $(this).parents("tbody").find(".toggler").addClass("toggler1");
                    $(this).parents(".custom-table").find(".fa-minus-circle").removeClass("fa-minus-circle");
                    $(this).parents("tbody").find(".fa-plus-circle").addClass("fa-minus-circle");
                });
            });
</script>