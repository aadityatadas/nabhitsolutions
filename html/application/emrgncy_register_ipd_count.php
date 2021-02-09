<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	// no fo emregencies

   $qryEm1 = mysqli_query($connect,"SELECT COUNT(*) as no_of_emer FROM tbl_emrgncy_register_ipd  WHERE (date_of_patient_arrvl_at_emrgncy BETWEEN '$frdt' AND '$todt') ")or die(mysqli_error($connect));

   
	$resEm1 = mysqli_fetch_assoc($qryEm1);

	$no_of_emer = $resEm1["no_of_emer"];

	$qryEm2 = mysqli_query($connect,"SELECT SUM(TIME_TO_SEC(time_taken_for_initl_assmnt)) as time_diff FROM tbl_emrgncy_register_ipd  WHERE (date_of_patient_arrvl_at_emrgncy BETWEEN '$frdt' AND '$todt') ")or die(mysqli_error($connect));
	$resEm2 = mysqli_fetch_assoc($qryEm2);

	    $time_diff   = $resEm2['time_diff'];

	    $avg_imgncy_arival_time = $time_diff/$no_of_emer;


	    $qryEm3 = mysqli_query($connect,"SELECT COUNT(*) as brought_dead FROM tbl_emrgncy_register_ipd WHERE (date_of_patient_arrvl_at_emrgncy BETWEEN '$frdt' AND '$todt') AND brought_dead='yes'")or die(mysqli_error($connect));
	$resEm3 = mysqli_fetch_assoc($qryEm3);

	    $brought_dead   = $resEm3['brought_dead'];

	     $qryEm4 = mysqli_query($connect,"SELECT COUNT(*) as back_to_emrgncy FROM tbl_emrgncy_register_ipd WHERE (date_of_retrn_to_emrgncy_dept_if_any BETWEEN '$frdt' AND '$todt') AND date_of_retrn_to_emrgncy_dept_if_any !=''")or die(mysqli_error($connect));
	   $resEm4 = mysqli_fetch_assoc($qryEm4);

	    $back_to_emrgncy   = $resEm4['back_to_emrgncy'];


	    $qryEm5 = mysqli_query($connect,"SELECT COUNT(*) as back_to_emrgncy_72 FROM tbl_emrgncy_register_ipd WHERE (date_of_retrn_to_emrgncy_dept_if_any BETWEEN '$frdt' AND '$todt') AND retn_of_emrgncy NOT IN ('','no','No')")or die(mysqli_error($connect));
	     $resEm5 = mysqli_fetch_assoc($qryEm5);

	    $back_to_emrgncy_72  = $resEm5['back_to_emrgncy_72'];
	    
	    $per_back_to_emrgncy_72= (($back_to_emrgncy_72)*100)/$no_of_emer;


	  




//	$no_of_emer = $resEm1["no_of_emer"];



	


	
	//$pos = $res4["pos"];
?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">Total No of Emergencies</td>
				<?php
					if($no_of_emer > 0)
					{
				?>
				<td width="50%;"><?php echo ($no_of_emer);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>

			
			<tr>
				<td width="50%;">Average Emergencies Arival Time</td>
				<?php
					if($avg_imgncy_arival_time > 0)
					{
				?>
				<td width="50%;"><?php echo round($avg_imgncy_arival_time)." sec / ";
				        echo round($avg_imgncy_arival_time/3600)." hrs "
				?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo "0 sec";?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">No of Brought Dead</td>
				<td width="50%;"><?php echo $brought_dead;?></td>
			</tr>
			<tr>
				<td width="50%;">Total No of Return to Emergency Dep</td>
				<td width="50%;"><?php echo $back_to_emrgncy;?></td>
			</tr>

			<tr>
				<td width="50%;">Return to Emergency Dep within 72hrs</td>
				<td width="50%;"><?php echo $back_to_emrgncy_72;?></td>
			</tr>

			

			<tr>
				<td width="50%;">% of Return to Emergency Within 72hrs</td>
				<?php
					if($per_back_to_emrgncy_72 > 0)
					{
				?>
				<td width="50%;"><?php echo round($per_back_to_emrgncy_72)." %  ";
				       
				?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo "0 %";?></td>
				<?php
					}
				?>
			</tr>
		</table>
	</div>
</div>