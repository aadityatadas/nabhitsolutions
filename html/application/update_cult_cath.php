<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_cath.php');
	if(!empty($_POST))  
	{	
		if($_FILES["cult_rpt"]["name"] != '' AND $_POST['rpt_doc1'] != '')
		{
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			$rpt_det1 = mysqli_real_escape_string($connect, $_POST["rpt_det1"]);
			
			$qry=mysqli_query($connect,"SELECT cath_uti_upld2_doc FROM tbl_cath_uti_upld2 WHERE cath_uti_upld2_id = '$vid1'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["cath_uti_upld2_doc"];
			unlink( "./upload_cath2/".$dname1 );
			$image1 = upload_cult_rpt();
			$qry2 = "UPDATE tbl_cath_uti_upld2 SET cath_uti_upld2_doc_det = '$rpt_det1', cath_uti_upld2_doc = '$image1' WHERE cath_uti_upld2_id = '$vid1'";
			mysqli_query($connect, $qry2);				
		}
		elseif($_FILES["cult_rpt"]["name"] == '' AND $_POST['rpt_doc1'] != '')
		{
			$rpt_det1 = mysqli_real_escape_string($connect, $_POST["rpt_det1"]);
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			$qry5 = "UPDATE tbl_cath_uti_upld2 SET cath_uti_upld2_doc_det = '$rpt_det1' WHERE cath_uti_upld2_id = '$vid1'";
			mysqli_query($connect, $qry5);	
		}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>