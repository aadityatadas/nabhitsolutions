<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$cdate = date('Y-m-d');	
	
	$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf")or die(mysqli_error($connect));
	$res = mysqli_fetch_assoc($qry);
	$i_count = $res["std"];
	$qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf")or die(mysqli_error($connect));
	$A_count = mysqli_num_rows($qry2);
	$qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge'")or die(mysqli_error($connect));
	$dis_count = mysqli_num_rows($qry3_1);
	$qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA'")or die(mysqli_error($connect));
	$dm_count = mysqli_num_rows($qry3_2);
	$qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death'")or die(mysqli_error($connect));
	$dh_count = mysqli_num_rows($qry3_3);
	$qry3_4 = mysqli_query($connect,"SELECT huf_mlc FROM tbl_huf WHERE huf_mlc = 'MLC'")or die(mysqli_error($connect));
	$mlc_count = mysqli_num_rows($qry3_4);
	
	$los_count = $i_count / $A_count;
	
	$qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery'")or die(mysqli_error($connect));
	$s_count = mysqli_num_rows($qry5);
		
	$qry6 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm = '$cdate' AND huf_ddd != '$cdate'")or die(mysqli_error($connect));
	$c_count = mysqli_num_rows($qry6);
	
	$qry7 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = ''")or die(mysqli_error($connect));
	$c2_count = mysqli_num_rows($qry7);
	
	$c3_count = $c_count + $c2_count;
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
				<td width="50%;"><?php echo number_format($los_count,2);?></td>
			</tr>
			<tr>
				<td width="50%;">5. Total No. of Surgeries</td>
				<td width="50%;"><?php echo $s_count;?></td>
			</tr>
			<tr>
				<td width="50%;">6. Inpatient Days on Current Date (<?php echo $cdate;?>)</td>
				<td width="50%;"><?php echo $c3_count;?></td>
			</tr>
		</table>
	</div>
</div>