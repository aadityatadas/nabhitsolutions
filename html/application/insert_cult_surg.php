<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_surg.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["ventid"]);
		if($_FILES["cult_rpt"]["name"] != '')
			{
				$clt_det = mysqli_real_escape_string($connect, $_POST["clt_det"]);
				if($_FILES["cult_rpt"]["name"] != '')
				{
					$image = upload_cult_rpt();
				}
				$qry1 = "SELECT surg_upld2_id FROM tbl_surg_upld2 ORDER BY surg_upld2_id DESC";
				$result1 = mysqli_query($connect, $qry1);
				$row1=mysqli_fetch_array($result1);
				$id = $row1['surg_upld2_id'];
				$did = $id+1;
				
				$sql1 = "INSERT INTO tbl_surg_upld2(surg_upld2_id, surg_id, surg_upld2_doc_det, surg_upld2_doc) 
				VALUES('$did','$cid','$clt_det','$image')";  
				mysqli_query($connect, $sql1);				
			}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>