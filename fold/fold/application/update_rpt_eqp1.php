<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_eqp.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		// First Document
		if($_FILES["rpt_rpt1"]["name"] != '' AND $_POST['rpt_doc1'] != '')
		{
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			
			$qry=mysqli_query($connect,"SELECT eqp_upld_doc FROM tbl_eqp_upld WHERE eqp_id = '$cid' AND eqp_upld_id = '$vid1'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["eqp_upld_doc"];
			unlink( "./upload_eqp/".$dname1 );
			$image1 = upload_rpt1();
			$qry2 = "UPDATE tbl_eqp_upld SET eqp_upld_doc = '$image1' WHERE eqp_id = '$cid' AND eqp_upld_id = '$vid1'";
			mysqli_query($connect, $qry2);				
		}		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>