<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_blood.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		if($_POST['sentiid'] != '')
			{
				if($_FILES["rpt_rpt1"]["name"] != '')
				{
					$image1 = upload_rpt1();
				}
				$sql1 = "INSERT INTO tbl_blood_upld(blood_id, blood_upld_doc) 
				VALUES('$cid','$image1')";  
				mysqli_query($connect, $sql1);				
			}
		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>