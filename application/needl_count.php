<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$fdt = date('Y-m-01');
	$tdt = date('Y-m-31');
	
	$qry = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE DATE(needp_dttm) BETWEEN '$fdt' AND '$tdt'")or die(mysqli_error($connect));
	$res = mysqli_num_rows($qry);
	
	$qr = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (huf_dadm BETWEEN '$fdt' AND '$tdt') AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
	$rs = mysqli_fetch_assoc($qr);
	$i_count = $rs["std"];
	if(!$i_count){
       $i_count =1;
	}
	$rate = ($res / $i_count) * 100;
	
?>
<div class="col-lg-12">
	<div style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">1. No. of Operational Exposure / Needle Prick Injury Incidences</td>
				<td width="50%;"><?php echo $res;?></td>
			</tr>
			<tr>
				<td width="50%;">2. Occupational Exposure Rate / Needle Prick Injury Rate</td>
				<td width="50%;"><?php echo number_format($rate,2); ?>&nbsp;%</td>
			</tr>
		</table>
	</div>
</div>