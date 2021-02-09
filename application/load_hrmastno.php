<?php
	include"dbinfo.php";
	$qry = "SELECT hrid FROM tbl_hr_mast ORDER BY hrid DESC";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_array($res);
	$id = $row['hrid'];
	$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />