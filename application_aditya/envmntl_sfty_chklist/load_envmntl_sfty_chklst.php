<?php
	include"../dbinfo.php";
	$qry = "SELECT envmntl_sfty_chklst_id FROM tbl_envmntl_sfty_chklst ORDER BY envmntl_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['envmntl_sfty_chklst_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />