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

 <table class="custom-table" style="font-size: 15px;" border="1" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<!-- <td  style="text-align:center;background-color:#e6eeff;font-size: 14px;font-weight: bold;">3</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff;"> VENTILATOR ASSOCIATED PNEMONIA FORM </td>
		 -->
		 <td valign="top">
			<table width="600" style="font-size:14px;" border="1" cellpadding="0" cellspacing="0" align="center">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>1. VAP Rate</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Total Ventilator Days</td></tr>
				<tr style="background-color:#f7f7ff; font-size: 16px;"><td>3. Positive VAP</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="600" style="font-size:14px; " border="1" cellpadding="0" cellspacing="0" align="center">

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
					<td  style="background-color:#f7f7ff;font-size: 16px;" id="ajj"><center><?php echo number_format($icount_vent,2);?></center></td>
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
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icountv_vent;?></center></td>
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
					<td style="background-color:#f7f7ff;  font-size: 16px;" id="ajj"><center><?php echo $v_count_2;?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>