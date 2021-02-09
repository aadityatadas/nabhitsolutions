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
				<td style="text-align:left;" width="50%">Total No. of Equipment</td>
				<?php
                  $qry2 = mysqli_query($connect,"SELECT eqpid FROM tbl_eqp_mast_bio")or die(mysqli_error($connect));
	              $A_count = mysqli_num_rows($qry2);
	
	
                ?>
				<td width="50%;"><?php echo $A_count;?></td>
			</tr>	
			
			
		    <tr>
				<td style="text-align:left;" width="50%">Total No.of Equipment Under Warranty</td>
                <?php
					$sq2 = mysqli_query($connect,"SELECT COUNT(*) FROM tbl_eqp_mast_bio WHERE (month(eqp_wty1) = '$month' OR month(eqp_wty1) < '$month' AND year(eqp_wty1) = '$yr' OR year(eqp_wty1) < '$yr') AND (month(eqp_wty2) > '$month' AND year(eqp_wty2) = '$yr' OR year(eqp_wty2) > '$yr')")or die(mysqli_error($connect));
					
					while($rs2 = mysqli_fetch_array($sq2))
					{
				?>
				<!--<td width="50%">Warranty Period</td>-->	
				<td style="text-align:left;" width="50%"><?php echo $rs2["COUNT(*)"];?></td>	
			</tr>
				
		<!--<tr>
				<td style="text-align:right;" width="50%">Total No.of Equipment Under
Warranty</td>
				<!--<td width="50%"><?php //echo $rs2["eqp_wty1"];?>&nbsp;To&nbsp;<?php //echo $rs2["eqp_wty2"];?></td>-->	
				
		                 
		 
			</tr>
				<?php
				} 
				?> 
			<!-- -->
			<!--<tr>
				<td style="text-align:left;" width="50%"> Total No.of Equipment Under AMC</td>
				<td width="50%">AMC Period</td>				
			</tr>-->
				<?php
					//$sq3 = mysqli_query($connect,"SELECT COUNT(*) FROM tbl_eqp_indic_bio LEFT JOIN tbl_eqp_mast_bio ON tbl_eqp_mast_bio.eqpid = tbl_eqp_indic_bio.eqpid WHERE (month(eqp_amc1) = '$month' OR month(eqp_amc1) < '$month' AND year(eqp_amc1) = '$yr' OR year(eqp_amc1) < '$yr') AND (month(eqp_amc2) > '$month' AND year(eqp_amc2) = '$yr' OR year(eqp_amc2) > '$yr')")or die(mysqli_error($connect));
					//while($rs3 = mysqli_fetch_array($sq3))
					//{
				?>
			<tr>
			    <!--<td style="text-align:right;" width="50%">Total No.of Equipment Under AMC</td>-->
				<!--<td style="text-align:right;" width="50%"><?php //echo ucfirst($rs3["eqp_name"]);?></td>
				<td width="50%"><?php //echo $rs3["eqp_amc1"];?>&nbsp;To&nbsp;<?php //echo $rs3["eqp_amc2"];?></td>	-->
				<!--<td width="50%"><?php //echo $rs2["COUNT(*)"];?></td>-->
			</tr>
				<?php
				//}
				?>
			<!-- -->
	
						
			<tr>
				<td style="text-align:left;" width="50%">Total No.of Equipment Under AMC</td>
				<?php


	            $qry3_2 = mysqli_query($connect,"SELECT eqp_amcs FROM tbl_eqp_indic_bio WHERE eqp_amcs = 'YES'")or die(mysqli_error($connect)); $dm_count = mysqli_num_rows($qry3_2);
	             ?>
	
		
				<td width="50%;"><?php echo $dm_count;?></td>
			</tr>				
			
						
					
			
			<tr>
				<td style="text-align:left;" width="50%"> Total No. of Equipment Under Calibration</td>
				<?php


	            $qry3_2 = mysqli_query($connect,"SELECT eqp_amcs FROM tbl_eqp_indic_bio WHERE eqp_amcs = 'YES'")or die(mysqli_error($connect)); $dm_count = mysqli_num_rows($qry3_2);
	            ?>
	
		
				<td width="50%;"><?php echo $dm_count;?></td>
			</tr>


			<tr>
				<td style="text-align:left;" width="50%">% of AMC (No of Equipement under AMC/Total No of Equipement)*100</td>
				<?php
					$sql4 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast_bio")or die(mysqli_error($connect));
					$rs4 = mysqli_num_rows($sql4);					
					
				$sql5 = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast_bio LEFT JOIN tbl_eqp_indic_bio ON tbl_eqp_mast_bio.eqpid = tbl_eqp_indic_bio.eqpid WHERE (month(tbl_eqp_mast_bio.eqp_amc1) = '$month' OR month(tbl_eqp_mast_bio.eqp_amc1) < '$month' AND year(tbl_eqp_mast_bio.eqp_amc1) = '$yr' OR year(tbl_eqp_mast_bio.eqp_amc1) < '$yr') AND (month(tbl_eqp_mast_bio.eqp_amc2) > '$month' AND year(tbl_eqp_mast_bio.eqp_amc2) = '$yr' OR year(tbl_eqp_mast_bio.eqp_amc2) > '$yr')")or die(mysqli_error($connect));
					$rs5 = mysqli_num_rows($sql5);
					
					$tt5 = ($rs5 / $rs4) * 100;
				?>
				<td width="50%"><?php echo number_format($tt5,2);?>&nbsp;%</td>				
			</tr>


			<tr>
				<td style="text-align:left;" width="50%">Total No of breakdowns</td>
				<?php
					$month = date('m');
					$sqlBreak = mysqli_query($connect,"SELECT eqp_id FROM tbl_eqp_indic_bio WHERE MONTH(eqp_brkdwn_date) = '$month'")or die(mysqli_error($connect));
					$rsBreak = mysqli_num_rows($sqlBreak);					
					
				
				?>
				<td width="50%"><?php echo $rsBreak;?>&nbsp;</td>				
			</tr>

			<tr>
				<td style="text-align:left;" width="50%">Breakdowns Time(hr:min)</td>
				<?php
					$month = date('m');

					$qry2 = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic_bio WHERE (eqp_brkdwn_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
					$cri_count = mysqli_num_rows($qry2);
					$avgcri = 0;
	                while ($res = mysqli_fetch_array($qry2)) {
		            $avgcri += (strtotime($res['eqp_dtrp']) - strtotime($res['eqp_dtbr']))/60 ;
		            $avgcri+=(strtotime($res['eqp_tmrp']) - strtotime($res['eqp_tmbr']))/60;
	                }
	                $hours = floor($avgcri / 60).':'.($avgcri -   floor($avgcri / 60) * 60);						
					
	             ?>
				<td width="50%">
				<?php echo ($hours);?>&nbsp;</td>				
			</tr>


			
			
			<!-- -->
		</table>
	</div>  
</div>  