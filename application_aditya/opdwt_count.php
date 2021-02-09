<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry = mysqli_query($connect,"SELECT opdwttm_opdwttm FROM tbl_opdwttm WHERE (DATE(opdwttm_dttmr) BETWEEN '$frdt' AND '$todt') AND opdwttm_dttmr != '' ORDER BY opdwttm_id ASC")or die(mysqli_error($connect));
	while($res = mysqli_fetch_array($qry))
	{
		$sm_std = $res["opdwttm_opdwttm"];
		list($num1, $num2) = explode('.', $sm_std);
		$hr_num = $hr_num + $num1;
		$min_num = $min_num + $num2;
	}
	$sum_std = ($hr_num * 60) + $min_num;	
	
	$qry5 = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (DATE(opdwttm_dttmr) BETWEEN '$frdt' AND '$todt') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
	$s_count = mysqli_num_rows($qry5);
	
	$tot_count = $sum_std / $s_count;
	if($tot_count >= 60)
	{
		$tt_count = $tot_count / 60;
		list($number1, $number2) = explode('.', $tt_count);
		
		$tot_min = $tot_count - ($number1 * 60);
		if($tot_min >= 10)
		{
			$numb3 = $number1.':'.$tot_min;
		}else if($tot_min < 10){
			$a = 0;
			$numbr3 = $number1.':'.$a.''.$tot_min;
			$numb3 = number_format($numbr3,2);
		}		
	}else if($tot_count < 60){
		list($numb1, $numb2) = explode('.', $tot_count);
		$aj = 0;
		$numbr3 = $aj.':'.$numb1;
		$numb3 = number_format($numbr3,2);
	}
	
	list($hr, $min) = explode('.', $numb3);

	$time = gmdate("H:i:s", ($hr*60*60 + $min*60));
//echo "<br>".gmdate("H:i:s", 3700);


?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="50%;">Total No. of OPD's</td>
				<td width="50%;"><?php echo $s_count;?></td>
			</tr>
			<tr>
				<td width="50%;">Averarge OPD waiting Time</td>
				<td width="50%;"><?php echo $time;?>&nbsp;HH:MM:SS</td>
			</tr>
		</table>
	</div>
</div>