<?php
	//session_start();
	include('dbinfo.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		if($_FILES["rpt_rpt6"]["name"] != '')
		{
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
			$sql1 = "UPDATE tbl_eqp_indic SET eqp_lic_img = '$imagesx' WHERE eqp_id = '$cid'";  
			mysqli_query($connect, $sql1);				
		}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>