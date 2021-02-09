<?php
	//session_start();
	include('dbinfo.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		// Third Document
		if($_FILES["rpt_rpt3"]["name"] != '')
		{
			$qry=mysqli_query($connect,"SELECT amcs_img FROM tbl_eqp_mast_bio WHERE eqpid = '$cid'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["amcs_img"];
			unlink( "./upload_eqp/".$dname1 );
			function upload_rpt3()
			{
				if(isset($_FILES["rpt_rpt3"]))
				{
					$extension = explode('.', $_FILES['rpt_rpt3']['name']);
					$new_nameon = rand() . '.' . $extension[1];
					$destination = './upload_eqp/' . $new_nameon;
					move_uploaded_file($_FILES['rpt_rpt3']['tmp_name'], $destination);
					return $new_nameon;
				}
			}
			if($_FILES["rpt_rpt3"]["name"] != '')
			{
				$imageth = upload_rpt3();
			}
			$qry2 = "UPDATE tbl_eqp_mast_bio SET amcs_img = '$imageth' WHERE eqpid = '$cid'";
			mysqli_query($connect, $qry2);				
		}		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>