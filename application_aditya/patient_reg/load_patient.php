<?php
	include"../dbinfo.php";
	$qry = "SELECT patient_id FROM tbl_patient_reg ORDER BY patient_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['patient_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />