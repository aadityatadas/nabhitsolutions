<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	$qryICU1 = mysqli_query($connect,"SELECT count(*) as total_icu FROM tbl_icu_register_ipd WHERE (date_of_admison_in_icu BETWEEN '$frdt' AND '$todt') AND date_of_admison_in_icu !='' ")or die(mysqli_error($connect));
	$resICU1 = mysqli_fetch_assoc($qryICU1);
	$total_icu = $resICU1["total_icu"];

	$qryICU2 = mysqli_query($connect,"SELECT count(*) as total_icu_dis FROM tbl_icu_register_ipd WHERE (date_of_disc_trans_in_icu BETWEEN '$frdt' AND '$todt') AND date_of_disc_trans_in_icu !='' ")or die(mysqli_error($connect));
	$resICU2 = mysqli_fetch_assoc($qryICU2);
	$total_icu_dis = $resICU2["total_icu_dis"];


	$qryICU3 = mysqli_query($connect,"SELECT count(*) as total_icu_return FROM tbl_icu_register_ipd WHERE (date_of_admison_in_icu BETWEEN '$frdt' AND '$todt') AND retrn_to_icu_in_48hrs ='Yes' ")or die(mysqli_error($connect));
	$resICU3 = mysqli_fetch_assoc($qryICU3);
	$total_icu_return = $resICU3["total_icu_return"];

	$s = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$todt' AND huf_ddd ='' ) OR (huf_dadm  BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));

	$cnt2 = mysqli_num_rows($s);

	$icu_occu = (($cnt2-$total_icu)/$cnt2)*100;


	$qryICUre_admi = mysqli_query($connect,"SELECT count(*) as re_admiV FROM tbl_icu_register_ipd WHERE (date_of_admison_in_icu BETWEEN '$frdt' AND '$todt') AND re_admission ='Yes' ")or die(mysqli_error($connect));
	$resICU11 = mysqli_fetch_assoc($qryICUre_admi);
	$re_admi = $resICU11["re_admiV"];

	$qryICUre_intu = mysqli_query($connect,"SELECT count(*) as re_intuV FROM tbl_icu_register_ipd WHERE (date_of_admison_in_icu BETWEEN '$frdt' AND '$todt') AND re_intubation ='Yes' ")or die(mysqli_error($connect));
	$resICU12 = mysqli_fetch_assoc($qryICUre_intu);
	$re_intu = $resICU12["re_intuV"];

// No indicator for ICU
// 1.Icu occupancy rate
// 2. No of ICU returns within 48hrs 
// % of ICU returns within 48hrs
// 3. No of readmissions in ICU
// % of readmissions
// 4. No of reintubations
// % of reintubations

	
?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
		
			<tr>
				<td width="50%;">Total No of Patient Admitted In ICU</td>
				<?php
					if($total_icu > 0)
					{
				?>
				<td width="50%;"><?php echo $total_icu;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr> 
			<tr>
				<td width="50%;">Total No of Patient Transfer/Discharge from ICU</td>
				<?php
					if($total_icu_dis > 0)
					{
				?>
				<td width="50%;"><?php echo $total_icu_dis;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>

			<tr>
				<td width="50%;">Icu occupancy rate</td>
				<?php
					if($icu_occu > 0)
					{
				?>
				<td width="50%;"><?php echo $icu_occu;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>   

			<tr>
				<td width="50%;"> No of Patient Return to ICU in 48hrs</td>
				<?php
					if($total_icu_return > 0)
					{
				?>
				<td width="50%;"><?php echo $total_icu_return;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr> 

			<tr>
				<td width="50%;">% of Patient Return to ICU in 48hrs</td>
				
			<?php 
			         
				       $per = $total_icu!=0 ? (($total_icu_return/$total_icu)*100)."%" :   "0 %"
				 
			?>

				 <td width="50%;"><?php echo round($per,2);?></td>
			</tr> 


			<tr>
				<td width="50%;"> No of readmissions in ICU </td>
				<?php
					if($re_admi > 0)
					{
				?>
				<td width="50%;"><?php echo $re_admi;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr> 

			<tr>
				<td width="50%;">% of Readmissions in Icu</td>
				
			<?php 
			         
				      
				       $per = $total_icu!=0 ? (($re_admi/$total_icu)*100)."%" :   "0 %"  
				 
			?>

				<td width="50%;"><?php echo round($per,2);?></td>
			</tr> 

			<tr>
				<td width="50%;"> No of reintubations</td>
				<?php
					if($re_intu> 0)
					{
				?>
				<td width="50%;"><?php echo $re_intu;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr> 

			<tr>
				<td width="50%;">% of Reintubations in Icu</td>
				
			<?php 
			         
				       $per = $total_icu!=0 ? (($re_admi/$total_icu)*100)."%" :   "0 %"  
				 
			?>

				 <td width="50%;"><?php echo round($per,2);?></td>
			</tr> 
			
		</table>
	</div>
</div>