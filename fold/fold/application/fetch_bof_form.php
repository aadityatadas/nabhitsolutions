<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	$tdt = date('Y-m-d');
	include"dbinfo.php";
	$cn=1;
	$s = mysqli_query($connect,"SELECT * FROM tbl_huf ")or die(mysqli_error($connect));
	$cnt2 = mysqli_num_rows($s);
	$s3 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE huf_ddd != ''")or die(mysqli_error($connect));
	$cnt3 = mysqli_num_rows($s3);
	$sq = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE huf_dadm = '$tdt' ORDER BY huf_dadm ASC ")or die(mysqli_error($connect));
	$cnt = mysqli_num_rows($sq);
	
	$tcnt = $cnt2 - $cnt3;
	while($row = mysqli_fetch_array($sq))
	{		
?>
<tr>
	<td style="text-align:center;"><?php echo $cn++;?></td>
	<td><?php echo ucwords($row["huf_pname"]);?></td>
	<td><?php echo $row["huf_uhid"];?></td>
	<td><?php echo $row["huf_ipd"];?></td>
	<td><?php echo $row["huf_dadm"];?></td>
	<td><?php echo $row["huf_ddd"];?></td>
	<td><?php echo $row["huf_dddd"];?></td>
	<td><?php echo $row["huf_lens"];?></td>
</tr>
<?php
	
	
	}
?>
<tr>
	<td colspan="2" style="text-align:right;">Total No. of Patient </td>
	<td><?php echo $cnt2;?></td>
	<td colspan="2" style="text-align:right;">Total No. of Discharge/Dama/Death </td>
	<td><?php echo $cnt3;?></td>
	<td><?php echo $cnt2-$cnt3;?></td>
	<td></td>
</tr>
