<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_hr.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		if($_POST['srno1'] != '')
			{
				$srno1 = mysqli_real_escape_string($connect, $_POST["srno1"]);
				if($_FILES["rpt_rpt3"]["name"] != '')
				{
					$image1 = upload_rpt3();
				}
				$sql1 = "INSERT INTO tbl_hr_upld(hr_id, hr_srno, hr_upld_doc) 
				VALUES('$cid','$srno1','$image1')";  
				mysqli_query($connect, $sql1);				
			}
		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>