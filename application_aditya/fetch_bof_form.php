<?php
	error_reporting(0);
	session_start();
	$total_bed = 100;
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	$tdt = date('Y-m-d');
	include"dbinfo.php";
	$cn=1;
	$s = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm = '$tdt'")or die(mysqli_error($connect));
	$cnt2 = mysqli_num_rows($s);
	$s3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dddd = '$tdt'")or die(mysqli_error($connect));
	$cnt3 = mysqli_num_rows($s3);

	$s4 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$tdt' AND huf_ddd ='' ) OR (huf_dadm <= '$tdt' AND huf_dddd > '$tdt')")or die(mysqli_error($connect));
	$cnt4 = mysqli_num_rows($s4);
	
	
	if($cnt4){
			$bed_occup = round(($cnt4/$total_bed)*100,2);
	}else{
			$bed_occup = 0;
	}
			
?>
<tr>
	<td style="text-align:center;"><?php echo $cn++;?></td>
	<td style="text-align:center;"><?php echo $tdt;?></td>
	<td style="text-align:center;"><?php echo $cnt2;?></td>
	<td style="text-align:center;"><?php echo $cnt3;?></td>
	<td style="text-align:center;"><?php echo $cnt4;?></td>
	<td style="text-align:center;"><?php echo $total_bed;?></td>
	<td style="text-align:center;"><?php echo $bed_occup;?></td>
	
</tr>
<tr><td colspan="7" style="text-align:right;"> </td></tr>
<tr>
	<td colspan="2" style="text-align:right;">Total No. of Patient Admitted </td>
	<td><?php echo $cnt2;?></td>
	<td colspan="2" style="text-align:right;">Total No. of Discharge/Dama/Death </td>
	<td><?php echo $cnt3;?></td>
	<td></td>

</tr>
<tr><td colspan="7" style="text-align:center;"> Bed Occupany Rate for today : <?=$bed_occup." %"?> </td>
</tr>