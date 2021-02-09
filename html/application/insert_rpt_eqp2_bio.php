<?php
	//session_start();
	include('dbinfo.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		if($_FILES["rpt_rpt2"]["name"] != '')
			{
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

				$qry2 = "SELECT eqp_upld_id FROM tbl_eqp_upld_bio ORDER BY eqp_upld_id DESC";
				$result2 = mysqli_query($connect, $qry2);
				$row2=mysqli_fetch_array($result2);
				$id = $row2['eqp_upld_id'];
				$did2 = $id+1;
				
				$sql2 = "INSERT INTO tbl_eqp_upld_bio(eqp_upld_id ,eqp_id,eqp_srno ,eqp_upld_doc) 
				VALUES('$did2','$cid','2','$imagetw')";  
				
				mysqli_query($connect, $sql2);	
				$sql1 = "UPDATE tbl_eqp_mast_bio SET eqp_dtins_img = '$imagetw' WHERE eqpid = '$cid'";  
				mysqli_query($connect, $sql1);				
			}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>