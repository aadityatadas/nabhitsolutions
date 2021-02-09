<?php
	include"../dbinfo.php";
	$qry = "SELECT hira_analy_sheet_id FROM tbl_hira_analy_sheet ORDER BY hira_analy_sheet_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['hira_analy_sheet_id'];
		$cid = $id+1;
?>
	<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />