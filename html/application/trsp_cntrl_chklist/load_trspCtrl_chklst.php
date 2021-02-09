<?php
	include"../dbinfo.php";
	$qry = "SELECT transptn_sfty_chcklst_id FROM tbl_transptn_sfty_chcklst ORDER BY transptn_sfty_chcklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['transptn_sfty_chcklst_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />