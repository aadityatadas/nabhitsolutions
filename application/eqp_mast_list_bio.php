<option value="">Select Equipment</option>
<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$sq = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast_bio")or die(mysqli_error($connect));
	while($q = mysqli_fetch_array($sq))
	{
		$stfnm = $q["eqp_name"];
?>
<option value="<?php echo $stfnm;?>"><?php echo $stfnm;?></option>
<?php
	}
?>