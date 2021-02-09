<?php
	//session_start();
	include('dbinfo.php');
	include('fun_phar_reg_upld.php');
	if(!empty($_POST))  
	{	
		if($_FILES["cult_rpt"]["name"] != '' AND $_POST['rpt_doc1'] != '')
		{
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			$rpt_det1 = mysqli_real_escape_string($connect, $_POST["rpt_det1"]);
			
			$qry=mysqli_query($connect,"SELECT phar_reg_upld_doc FROM tbl_phar_reg_upld1 WHERE phar_reg_upld1_id = '$vid1'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["phar_reg_upld_doc"];
			unlink( "./upload_mad_error/".$dname1 );
			$image1 = upload_cult_rpt();
			$qry2 = "UPDATE tbl_phar_reg_upld1 SET phar_reg_upld_doc_det = '$rpt_det1', phar_reg_upld_doc = '$image1' WHERE phar_reg_upld1_id = '$vid1'";
			mysqli_query($connect, $qry2);				
		}
		elseif($_FILES["cult_rpt"]["name"] == '' AND $_POST['rpt_doc1'] != '')
		{
			$rpt_det1 = mysqli_real_escape_string($connect, $_POST["rpt_det1"]);
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			$qry5 = "UPDATE tbl_phar_reg_upld1 SET phar_reg_upld_doc_det = '$rpt_det1' WHERE phar_reg_upld1_id = '$vid1'";
			mysqli_query($connect, $qry5);	
		}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>