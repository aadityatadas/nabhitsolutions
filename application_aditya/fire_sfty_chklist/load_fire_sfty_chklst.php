<?php
	include"../dbinfo.php";
	$qry = "SELECT fire_sfty_chklst_id FROM tbl_fire_sfty_chklst ORDER BY fire_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['fire_sfty_chklst_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />