<?php
	//session_start();
	include('dbinfo.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		// First Document
		if($_FILES["rpt_rpt1"]["name"] != '')
		{
			$qry=mysqli_query($connect,"SELECT eqp_idno_img FROM tbl_eqp_mast WHERE eqpid = '$cid'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["eqp_idno_img"];
			unlink( "./upload_eqp/".$dname1 );
			function upload_rpt1()
			{
				if(isset($_FILES["rpt_rpt1"]))
				{
					$extension = explode('.', $_FILES['rpt_rpt1']['name']);
					$new_nameon = rand() . '.' . $extension[1];
					$destination = './upload_eqp/' . $new_nameon;
					move_uploaded_file($_FILES['rpt_rpt1']['tmp_name'], $destination);
					return $new_nameon;
				}
			}
			if($_FILES["rpt_rpt1"]["name"] != '')
			{
				$imageon = upload_rpt1();
			}
			$qry2 = "UPDATE tbl_eqp_mast SET eqp_idno_img = '$imageon' WHERE eqpid = '$cid'";
			mysqli_query($connect, $qry2);				
		}		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>