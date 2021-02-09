<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_hr.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		// First Document
		if($_FILES["rpt_rpt2"]["name"] != '' AND $_POST['rpt_doc2'] != '')
		{
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			
			$qry=mysqli_query($connect,"SELECT hr_upld_doc FROM tbl_hr_upld WHERE hr_id = '$cid' AND hr_upld_id = '$vid1'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["hr_upld_doc"];
			unlink( "./upload_hr/".$dname1 );
			$image1 = upload_rpt2();
			$qry2 = "UPDATE tbl_hr_upld SET hr_upld_doc = '$image1' WHERE hr_id = '$cid' AND hr_upld_id = '$vid1'";
			mysqli_query($connect, $qry2);				
		}		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>