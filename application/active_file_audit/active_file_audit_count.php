<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$cdate = date('Y-m-d');
	$fdt = date('Y-m-01');
	$tdt = date('Y-m-31');
	
	$qry = mysqli_fetch_assoc(mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (huf_dadm BETWEEN '$fdt' AND '$tdt') AND (huf_dddd BETWEEN '$fdt' AND '$tdt')"))or die(mysqli_error($connect));
	$icount = $qry["std"];
	$totdiff = 0;
	$qr = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm < '$fdt' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')");
	while($sr = mysqli_fetch_array($qr))
	{
		$hufid = $sr["huf_id"];
		$rq = mysqli_query($connect,"SELECT huf_dddd FROM tbl_huf WHERE huf_id = '$hufid'");
		$mr = mysqli_fetch_assoc($rq);
		$disdt = $mr["huf_dddd"];
		$date1 = date_create($fdt);
		$date2 = date_create($disdt);
		$diff = date_diff($date1,$date2);
		$dt = $diff->format("%a");
		$totdiff = $totdiff + $dt;		
	}
	$i_count = $icount + $totdiff;
	$qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$fdt' AND '$tdt'")or die(mysqli_error($connect));
	$A_count = mysqli_num_rows($qry2);
	$qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
	$dis_count = mysqli_num_rows($qry3_1);
	$qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
	$dm_count = mysqli_num_rows($qry3_2);
	$qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
	$dh_count = mysqli_num_rows($qry3_3);
	$qry3_4 = mysqli_query($connect,"SELECT huf_mlc FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
	$mlc_count = mysqli_num_rows($qry3_4);
	
	$los_count = $i_count / $dis_count;
	
	$qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (huf_dadm BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
	$s_count = mysqli_num_rows($qry5);
	$qry7 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dddd = ''")or die(mysqli_error($connect));
	$c2_count = mysqli_num_rows($qry7);
?>
<div class="col-lg-12">
	<div style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">1. Total No. of Inpatient Days</td>
				<td width="50%;"><?php echo $i_count;?></td>
			</tr>
			<tr>
				<td width="50%;">2. Total No. of Admissions</td>
				<td width="50%;"><?php echo $A_count;?></td>
			</tr>
			<tr>
				<td width="50%;">3. Total No. of Discharges/DAMA/Death/MLC</td>
				<td width="50%;">
					Discharges =&nbsp;<b><?php echo $dis_count;?></b>,&nbsp;
					DAMA =&nbsp;<b><?php echo $dm_count;?></b>,&nbsp;
					Death =&nbsp;<b><?php echo $dh_count;?></b>,&nbsp;
					MLC =&nbsp;<b><?php echo $mlc_count;?></b>,&nbsp;
				</td>
			</tr>
			<tr>
				<td width="50%;">4. Average Length of stay (in Days)</td>
				<td width="50%;"><?php echo number_format($los_count,2);?> Days</td>
			</tr>
			<tr>
				<td width="50%;">5. Total No. of Surgeries</td>
				<td width="50%;"><?php echo $s_count;?></td>
			</tr>
			<tr>
				<td width="50%;">6. Inpatient Days on Current Date (<?php echo $cdate;?>)</td>
				<td width="50%;"><?php echo $c2_count;?></td>
			</tr>
		</table>
	</div>
</div>