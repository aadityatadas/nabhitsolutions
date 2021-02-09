<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	
	$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (huf_dadm BETWEEN '$frdt' AND '$todt') AND (huf_dddd BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
	$res = mysqli_fetch_assoc($qry);
	$i_count = $res["std"];
	
	$qry2 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_signsymp_th = 'Yes'")or die(mysqli_error($connect));
	$thromb = mysqli_num_rows($qry2);
	$res_thromb = ($thromb / $i_count) * 1000;
	
	$qry3 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_signsymp = 'Yes'")or die(mysqli_error($connect));
	$hema = mysqli_num_rows($qry3);
	$res_hema = ($hema / $i_count) * 1000;

	$qry4 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_signsyp_bed = 'Yes'")or die(mysqli_error($connect));
	$bed = mysqli_num_rows($qry4);
	$res_bed = ($bed / $i_count) * 1000;
	
	$qry5 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_incd_ptfall = 'Yes'")or die(mysqli_error($connect));
	$ptf = mysqli_num_rows($qry5);
	$res_ptf = ($ptf / $i_count) * 1000;
	
	$qry6 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_iardl = 'Yes'")or die(mysqli_error($connect));
	$rdl = mysqli_num_rows($qry6);
	$res_rdl = ($rdl / $i_count) * 1000;
	
	$qry7 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_injtpt = 'Yes'")or die(mysqli_error($connect));
	$ipt = mysqli_num_rows($qry7);
	$res_ipt = ($ipt / $i_count) * 1000;
	
?>
<div class="col-lg-12">
	<div class="col-lg-10" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">Thromboplebitis Rate</td>
				<td width="50%;"><?php echo number_format($res_thromb, 2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td width="50%;">Hematoma Rate</td>
				<td width="50%;"><?php echo number_format($res_hema, 2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td width="50%;">Bed Score Rate</td>
				<td width="50%;"><?php echo number_format($res_bed, 2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td width="50%;">Patient Fall Rate</td>
				<td width="50%;"><?php echo number_format($res_ptf, 2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td width="50%;">Accidental Removal of Drains and Lines Rate</td>
				<td width="50%;"><?php echo number_format($res_rdl, 2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td width="50%;">Injury to Patient Rate</td>
				<td width="50%;"><?php echo number_format($res_ipt, 2);?>&nbsp;%</td>
			</tr>
		</table>
	</div>
</div>