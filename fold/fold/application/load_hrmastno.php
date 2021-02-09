<?php
	include"dbinfo.php";
	$qry = "SELECT hr_id FROM tbl_hr_mast ORDER BY hr_id DESC";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_array($res);
	$id = $row['hr_id'];
	$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />