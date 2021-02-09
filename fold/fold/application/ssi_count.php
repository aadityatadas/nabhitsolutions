<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry2 = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (surg_dtos BETWEEN '$frdt' AND '$todt') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
	$i_count = mysqli_num_rows($qry2);
	$qry3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (surg_dtos BETWEEN '$frdt' AND '$todt') AND huf_surg = 'Surgery' ")or die(mysqli_error($connect));
	$c_count = mysqli_num_rows($qry3);
	$ssi_cnt = ($i_count/$c_count)*100; // - 0.13;
	$ssi_count = (float)$ssi_cnt;

	$qry4 = mysqli_query($connect,"SELECT surg_symp FROM tbl_huf WHERE (surg_dtos BETWEEN '$frdt' AND '$todt') AND surg_symp = 'Yes'")or die(mysqli_error($connect));
	$s_count = mysqli_num_rows($qry4);
	
	
?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">SSI Rate</td>
				<td width="50%;"><?php echo number_format($ssi_count, 2);?></td>
			</tr>
			<tr>
				<td width="50%;">Symptoms Of SSI</td>
				<td width="50%;"><?php echo $s_count;?></td>
			</tr>
			<tr>
				<td width="50%;">Positive SSI</td>
				<td width="50%;"><?php echo $i_count;?></td>
			</tr>
		</table>
	</div>
</div>