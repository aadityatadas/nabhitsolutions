<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$qry = "SELECT opdwttm_id FROM tbl_opdwttm ORDER BY opdwttm_id DESC";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_array($res);
	$id = $row['opdwttm_id'];
	$cid = $id+1;
?>
<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />