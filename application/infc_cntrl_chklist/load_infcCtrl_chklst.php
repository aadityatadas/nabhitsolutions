<?php
	include"../dbinfo.php";
	$qry = "SELECT inf_cntrl_checklist_id FROM tbl_inf_cntrl_checklist ORDER BY inf_cntrl_checklist_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['inf_cntrl_checklist_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />