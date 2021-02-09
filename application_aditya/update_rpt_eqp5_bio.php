<?php
	//session_start();
	include('dbinfo.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		// First Document
		if($_FILES["rpt_rpt5"]["name"] != '')
		{
			$qry=mysqli_query($connect,"SELECT eqp_repair_img FROM tbl_eqp_indic_bio WHERE eqp_id = '$cid'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["eqp_repair_img"];
			unlink( "./upload_eqp/".$dname1 );
			function upload_rpt5()
			{
				if(isset($_FILES["rpt_rpt5"]))
				{
					$extension = explode('.', $_FILES['rpt_rpt5']['name']);
					$new_nameon = rand() . '.' . $extension[1];
					$destination = './upload_eqp/' . $new_nameon;
					move_uploaded_file($_FILES['rpt_rpt5']['tmp_name'], $destination);
					return $new_nameon;
				}
			}
			if($_FILES["rpt_rpt5"]["name"] != '')
			{
				$imagefv = upload_rpt5();
			}
			$qry2 = "UPDATE tbl_eqp_indic_bio SET eqp_repair_img = '$imagefv' WHERE eqp_id = '$cid'";
			mysqli_query($connect, $qry2);				
		}		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>