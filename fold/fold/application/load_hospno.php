<?php
	include"dbinfo.php";
	$qry = "SELECT huf_id FROM tbl_huf ORDER BY huf_id DESC";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_array($res);
	$id = $row['huf_id'];
	$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />