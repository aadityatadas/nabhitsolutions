<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_senti1.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		// First Document
		if($_FILES["rpt_rpt3"]["name"] != '' AND $_POST['rpt_doc3'] != '')
		{
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			
			$qry=mysqli_query($connect,"SELECT senti_upld2_doc FROM tbl_senti_upld WHERE senti_id = '$cid' AND senti_upld2_id = '$vid1'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["senti_upld2_doc"];
			unlink( "./upload_senti/".$dname1 );
			$image3 = upload_rpt3();
			$qry2 = "UPDATE tbl_senti_upld SET senti_upld2_doc = '$image3' WHERE senti_id = '$cid' AND senti_upld2_id = '$vid1'";
			mysqli_query($connect, $qry2);				
		}		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>