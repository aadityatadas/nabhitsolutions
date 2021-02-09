<option value="">Select Employee Name</option>
<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$sq = mysqli_query($connect,"SELECT hr_staff FROM tbl_hr_mast")or die(mysqli_error($connect));
	while($q = mysqli_fetch_array($sq))
	{
		$stfnm = $q["hr_staff"];
?>
<option value="<?php echo $stfnm;?>"><?php echo $stfnm;?></option>
<?php
	}
?>