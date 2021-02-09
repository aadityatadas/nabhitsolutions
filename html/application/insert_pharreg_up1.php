<?php
	//session_start();
	include('dbinfo.php');
	include('fun_phar_reg_upld.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["pharregid"]);
		if($_FILES["cult_rpt"]["name"] != '')
			{
				$clt_det = mysqli_real_escape_string($connect, $_POST["phar_reg_upld_doc_det"]);
				//$srno1 = mysqli_real_escape_string($connect, $_POST["srno1"]);
				if($_FILES["cult_rpt"]["name"] != '')
				{
					$image = upload_cult_rpt();
				}
				$qry1 = "SELECT phar_reg_upld1_id FROM tbl_phar_reg_upld1 ORDER BY phar_reg_upld1_id DESC";
				$result1 = mysqli_query($connect, $qry1);
				$row1=mysqli_fetch_array($result1);
				$id = $row1['phar_reg_upld1_id'];
				$did = $id+1;
				
				$sql1 = "INSERT INTO tbl_phar_reg_upld1(phar_reg_upld1_id, pharmcy_register_id, phar_reg_upld_doc_det, phar_reg_upld_doc) 
				VALUES('$did','$cid','$clt_det','$image')";  
				mysqli_query($connect, $sql1);				
			}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>