<?php
	include"../dbinfo.php";
	$qry = "SELECT uhid_no FROM tbl_patient_reg ORDER BY patient_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['uhid_no'];
		$str = $id;

		$c = (explode(" ",$str));
		
		$uid='UHID '.sprintf("%03d", ++$c[1])
		
?>
	<input type="text" name="uhid_no" id="uhid_no" value="<?php echo $uid;?>" class="form-control" readonly />