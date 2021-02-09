<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as std FROM tbl_huf WHERE cath_uti_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	$res = mysqli_fetch_assoc($qry);
	$i_count = $res["std"];
	$qry2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE (cath_uti_iuc BETWEEN '$frdt' AND '$todt') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
	$c_count = mysqli_num_rows($qry2);
	$cauti_count = $c_count*1000/$i_count;
	
	$qry3 = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as tcd FROM tbl_huf WHERE (cath_uti_iuc BETWEEN '$frdt' AND '$todt') AND cath_uti_tcd != ''")or die(mysqli_error($connect));
	$res3 = mysqli_fetch_assoc($qry3);
	$tcd = $res3["tcd"];
	
	$qry4 = mysqli_query($connect,"SELECT cath_uti_symp FROM tbl_huf WHERE (cath_uti_iuc BETWEEN '$frdt' AND '$todt') AND cath_uti_symp = 'Yes'")or die(mysqli_error($connect));
	$pos = mysqli_num_rows($qry4);
	//$pos = $res4["pos"];
?>
<div class="col-lg-12">
 <div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">CAUTI Rate</td>
				<?php
					if($cauti_count > 0)
					{
				?>
				<td width="50%;"><?php echo number_format($cauti_count, 2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo number_format(0, 2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">Total Catheter Days</td>
				<td width="50%;"><?php echo $tcd;?></td>
			</tr>
			<tr>
				<td width="50%;">Positive Cauti</td>
				<td width="50%;"><?php echo $c_count;?></td>
			</tr>
		</table>
	</div>
</div>