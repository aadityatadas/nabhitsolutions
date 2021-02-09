<?php
	include"dbinfo.php";
	$qry = "SELECT rid FROM tbl_incident_report ORDER BY rid DESC";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_array($res);
	$id = $row['rid'];
	$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />