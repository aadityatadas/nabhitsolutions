<?php
	include"../dbinfo.php";
	$qry = "SELECT ward_round_chklst_id FROM tbl_ward_round_chklst ORDER BY ward_round_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['ward_round_chklst_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />