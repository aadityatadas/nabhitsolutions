<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$qry = mysqli_query($connect,"SELECT SUM(wttm_opdwttm) as std FROM tbl_huf")or die(mysqli_error($connect));
	$res = mysqli_fetch_assoc($qry);
	$i_count = $res["std"];
	
	$qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE wttm_opdwttm != ''")or die(mysqli_error($connect));
	$s_count = mysqli_num_rows($qry5);
	
	$tot_count = $i_count / $s_count;
	
?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">Averarge IPD waiting Time</td>
				<td width="50%;"><?php echo number_format($tot_count,2);?>&nbsp;Hrs.</td>
			</tr>
		</table>
	</div>
</div>