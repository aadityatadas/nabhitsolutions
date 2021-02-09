<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_eqp.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		if($_POST['srno1'] != '')
			{
				$srno1 = mysqli_real_escape_string($connect, $_POST["srno1"]);
				if($_FILES["rpt_rpt2"]["name"] != '')
				{
					$image1 = upload_rpt2();
				}
				$sql1 = "INSERT INTO tbl_eqp_upld(eqp_id, eqp_srno, eqp_upld_doc) 
				VALUES('$cid','$srno1','$image1')";  
				mysqli_query($connect, $sql1);				
			}
		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>