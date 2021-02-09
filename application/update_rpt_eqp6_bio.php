<?php
	//session_start();
	include('dbinfo.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		// First Document
		if($_FILES["rpt_rpt6"]["name"] != '')
		{
			$qry=mysqli_query($connect,"SELECT eqp_lic_img_doc FROM tbl_eqp_indic_bio WHERE eqp_id = '$cid'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["eqp_lic_img_doc"];
			unlink( "./upload_eqp/".$dname1 );
			function upload_rpt6()
			{
				if(isset($_FILES["rpt_rpt6"]))
				{
					$extension = explode('.', $_FILES['rpt_rpt6']['name']);
					$new_nameon = rand() . '.' . $extension[1];
					$destination = './upload_eqp/' . $new_nameon;
					move_uploaded_file($_FILES['rpt_rpt6']['tmp_name'], $destination);
					return $new_nameon;
				}
			}
			if($_FILES["rpt_rpt6"]["name"] != '')
			{
				$imagesx = upload_rpt6();
			}
			$qry2 = "UPDATE tbl_eqp_indic_bio SET eqp_lic_img_doc = '$imagesx' WHERE eqp_id = '$cid'";
			mysqli_query($connect, $qry2);				
		}		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>