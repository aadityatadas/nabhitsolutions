<?php
	//session_start();
	include('dbinfo.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		// Second Document
		if($_FILES["rpt_rpt2"]["name"] != '')
		{
			$qry=mysqli_query($connect,"SELECT eqp_dtins_img FROM tbl_eqp_mast_bio WHERE eqpid = '$cid'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["eqp_dtins_img"];
			unlink( "./upload_eqp/".$dname1 );
			function upload_rpt2()
			{
				if(isset($_FILES["rpt_rpt2"]))
				{
					$extension = explode('.', $_FILES['rpt_rpt2']['name']);
					$new_nameon = rand() . '.' . $extension[1];
					$destination = './upload_eqp/' . $new_nameon;
					move_uploaded_file($_FILES['rpt_rpt2']['tmp_name'], $destination);
					return $new_nameon;
				}
			}
			if($_FILES["rpt_rpt2"]["name"] != '')
			{
				$imagetw = upload_rpt2();
			}
			$qry2 = "UPDATE tbl_eqp_mast_bio SET eqp_dtins_img = '$imagetw' WHERE eqpid = '$cid'";
			mysqli_query($connect, $qry2);				
		}		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>