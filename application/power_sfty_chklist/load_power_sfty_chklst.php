<?php
	include"../dbinfo.php";
	$qry = "SELECT power_sfty_chklst_id FROM tbl_power_sfty_chklst ORDER BY power_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['power_sfty_chklst_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />