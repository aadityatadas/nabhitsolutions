<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry = mysqli_query($connect,"SELECT SUM(opdwttm_opdwttm) as std FROM tbl_opdwttm WHERE DATE(opdwttm_dttmr) BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	$res = mysqli_fetch_array($qry);
	$i_count = $res["std"];
	
	$qry5 = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (DATE(opdwttm_dttmr) BETWEEN '$frdt' AND '$todt') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
	$s_count = mysqli_num_rows($qry5);
	
	$tot_count = $i_count / $s_count;
	
?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">Averarge OPD waiting Time</td>
				<td width="50%;"><?php echo number_format($tot_count,2);?>&nbsp;Hrs.</td>
			</tr>
		</table>
	</div>
</div>