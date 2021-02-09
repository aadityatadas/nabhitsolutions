<?php
	include"../dbinfo.php";
	$qry = "SELECT restrain_chklst_id FROM tbl_restrain_chklst ORDER BY restrain_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['restrain_chklst_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />