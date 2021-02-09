<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE DATE(wttm_dttmr) BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	$res = mysqli_num_rows($qry);
	
	$qry2 = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE DATE(wttm_dttmr) BETWEEN '$frdt' AND '$todt' AND ipd_user != ''")or die(mysqli_error($connect));
	$res2 = mysqli_num_rows($qry2);
	
	$qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (DATE(wttm_dttmr) BETWEEN '$frdt' AND '$todt') AND wttm_dttmds != ''")or die(mysqli_error($connect));
	$s_count = mysqli_num_rows($qry5);
	
	$qry3 = mysqli_query($connect,"SELECT SUM(ipd_score) as score FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (DATE(wttm_dttmr) BETWEEN '$frdt' AND '$todt') AND ipd_user != ''")or die(mysqli_error($connect));
	$res3 = mysqli_fetch_assoc($qry3);
	$res = $res3["score"];
	
	$qry4 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE date(wttm_dttmr) BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	$res4 = mysqli_num_rows($qry4);
	
	$tot_scor = ($res / 120 ) * 100;
	$resul = number_format($tot_scor,2);
	
?>
<div class="col-lg-12">
	<div class="col-lg-10" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">Total No. of IPD Patient</td>
				<td width="50%;"><?php echo $res4;?></td>
			</tr>
			<tr>
				<td width="50%;">Total No. of Patient Who Has Given Feedback</td>
				<td width="50%;"><?php echo $res2;?></td>
			</tr>
			<tr>
				<td width="50%;">IPD Satisfaction Index</td>
				<td width="50%;"><?php echo $resul;?></td>
			</tr>
		</table>
	</div>
</div>