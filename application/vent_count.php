<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry = mysqli_query($connect,"SELECT SUM(vent_tcd) as std FROM tbl_huf WHERE vent_dt_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	$res = mysqli_fetch_assoc($qry);
	$i_count0 = $res["std"];
	////
     $qry1 = mysqli_query($connect,"SELECT SUM(vent_tcd) as std FROM tbl_vent_ass_phmn WHERE vent_dt_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	$res1 = mysqli_fetch_assoc($qry1);
	$i_count1 = $res1["std"];

	//// 
	$i_count = $i_count1 + $i_count0;


	$qry2 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (vent_dt_iuc BETWEEN '$frdt' AND '$todt') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
	$v_count2 = mysqli_num_rows($qry2);

	$qry3 = mysqli_query($connect,"SELECT vent_spc FROM tbl_vent_ass_phmn WHERE (vent_dt_iuc BETWEEN '$frdt' AND '$todt') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
	$v_count3 = mysqli_num_rows($qry3);
   
      $v_count = $v_count2 + $v_count3;


	$vap_count = $v_count*1000/$i_count;
	
?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">VAP Rate</td>
				<?php
					if($vap_count > 0)
					{
				?>
				<td width="50%;"><?php echo number_format($vap_count, 2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo number_format(0, 2);?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">Total Ventilator Days</td>
				<td width="50%;"><?php echo $i_count;?></td>
			</tr>
			<tr>
				<td width="50%;">Positive VAP</td>
				<td width="50%;"><?php echo $v_count;?></td>
			</tr>
		</table>
	</div>
</div>