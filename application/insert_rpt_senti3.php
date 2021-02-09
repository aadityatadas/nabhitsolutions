<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_senti1.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["sentiid"]);
		if($_POST['srno1'] != '')
			{
				$srno1 = mysqli_real_escape_string($connect, $_POST["srno1"]);
				if($_FILES["rpt_rpt3"]["name"] != '')
				{
					$image3 = upload_rpt3();
				}
				$sql1 = "INSERT INTO tbl_senti_upld(senti_id, senti_srno, senti_upld2_doc) 
				VALUES('$cid','$srno1','$image3')";  
				mysqli_query($connect, $sql1);				
			}
		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>