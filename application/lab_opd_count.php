<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry = mysqli_query($connect,"SELECT * FROM tbl_lab_opd WHERE sample_rec_date BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	/*$res = mysqli_fetch_assoc($qry);
	print_r($res);
	die;*/
	$c_count = mysqli_num_rows($qry);
	$avgtot = 0;
	while ($res = mysqli_fetch_array($qry)) {
		$avgtot += strtotime($res['time_date_of_rep_gen']) - strtotime($res['sample_rec_time_date']) ;
		
	}
	
	//$i_count = $res["std"];
	$qry2 = mysqli_query($connect,"SELECT * FROM tbl_lab_opd WHERE (sample_rec_date BETWEEN '$frdt' AND '$todt') AND cri_res_if_any  ='Yes'")or die(mysqli_error($connect));
	$cri_count = mysqli_num_rows($qry2);
	$avgcri = 0;
	while ($res = mysqli_fetch_array($qry2)) {
		$avgcri += strtotime($res['info_time']) - strtotime($res['result_time']) ;
		
	}
	//$cauti_count = $c_count*1000/$i_count;
	
	$qry3 = mysqli_query($connect,"SELECT * FROM tbl_lab_opd WHERE (sample_rec_date BETWEEN '$frdt' AND '$todt') AND redos = 'Yes'")or die(mysqli_error($connect));
	$res3 = mysqli_fetch_assoc($qry3);
	$redos_count = mysqli_num_rows($qry3);
	$perredo = ($redos_count / $c_count) * 100 ;
	$perredo = is_nan($perredo)? 0 : $perredo;
	//$tcd = $res3["tcd"];
	
	$qry4 = mysqli_query($connect,"SELECT * FROM tbl_lab_opd WHERE (sample_rec_date BETWEEN '$frdt' AND '$todt') AND resp_err = 'Yes'")or die(mysqli_error($connect));
	$error = mysqli_num_rows($qry4);
	$pererror = ($error / $c_count) * 100 ;

	$pererror = is_nan($pererror)? 0 : $pererror;

	$qry5 = mysqli_query($connect,"SELECT * FROM tbl_lab_opd WHERE (sample_rec_date BETWEEN '$frdt' AND '$todt') AND clinical_correlation = 'Yes'")or die(mysqli_error($connect));
	$clinical = mysqli_num_rows($qry5);
	$perclinical = ($clinical / $c_count) * 100 ;

	$perclinical = is_nan($perclinical)? 0 : $perclinical;
	//$pos = $res4["pos"];
?>
 <div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">Total No. of Test</td>
				
				<td width="50%;"><?php echo number_format($c_count);?></td>
			</tr>
			 <tr>
				<td width="50%;">Average (TAT Turn around Time)</td>
				<td width="50%;"><?php echo number_format($avgtot / 3600, 2);?>&nbsp;Hrs</td>
			</tr>
			<tr>
				<td width="50%;">No. Critical Alerts</td>
				
				<td width="50%;"><?php echo number_format($cri_count);?></td>
			</tr>
			<tr>
				<td width="50%;">Average Critical Alerts Time</td>
				<td width="50%;"><?php echo number_format($avgcri / 3600, 2);?>&nbsp;Hrs</td>
			</tr> 
			<tr>
				<td width="50%;">% Redos</td>
				<td width="50%;"><?php echo number_format($perredo, 2);?>&nbsp;%</td>
			</tr> 
			<tr>
				<td width="50%;">% Reporting of Error</td>
				<td width="50%;"><?php echo number_format($pererror, 2);?>&nbsp;%</td>
			</tr> 
			<tr>
				<td width="50%;">% Report Corelating with Clinical Diagnosis</td>
				<td width="50%;"><?php echo number_format($perclinical, 2);?>&nbsp;%</td>
			</tr> 
		</table>
	</div>
</div>