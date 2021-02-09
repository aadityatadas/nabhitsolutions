<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as std FROM tbl_huf WHERE cent_bs_dticlc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	$res = mysqli_fetch_assoc($qry);
	$i_count = $res["std"];
	$qry2 = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (cent_bs_dticlc BETWEEN '$frdt' AND '$todt') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
	$c_count = mysqli_num_rows($qry2);
	$clabsi_count = $c_count*1000/$i_count;
	
	$qry3 = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as tcd FROM tbl_huf WHERE (cent_bs_dticlc BETWEEN '$frdt' AND '$todt') AND cent_bs_tcld != ''")or die(mysqli_error($connect));
	$res3 = mysqli_fetch_assoc($qry3);
	$tcd = $res3["tcd"];
	
	$qry4 = mysqli_query($connect,"SELECT cent_bs_symp FROM tbl_huf WHERE (cent_bs_dticlc BETWEEN '$frdt' AND '$todt') AND cent_bs_symp = 'Yes'")or die(mysqli_error($connect));
	$pos = mysqli_num_rows($qry4);
	
?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">CLABSI Rate</td>
				<td width="50%;"><?php echo number_format($clabsi_count, 2);?></td>
			</tr>
			<tr>
				<td width="50%;">Total Central Line Days</td>
				<td width="50%;"><?php echo $tcd;?></td>
			</tr>
			<tr>
				<td width="50%;">Positive CLABSI</td>
				<td width="50%;"><?php echo $c_count;?></td>
			</tr>
		</table>
	</div>
</div>