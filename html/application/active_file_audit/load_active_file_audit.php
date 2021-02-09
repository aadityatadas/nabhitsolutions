<?php
	include"dbinfo.php";
	$qry = "SELECT pharmcy_register_id FROM tbl_pharmcy_register ORDER BY pharmcy_register_id DESC";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_array($res);
	$id = $row['pharmcy_register_id'];
	$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />