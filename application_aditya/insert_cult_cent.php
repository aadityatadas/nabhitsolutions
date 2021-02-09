<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_cent.php');
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
				$qry1 = "SELECT cent_bs_upld2_id FROM tbl_cent_bs_upld2 ORDER BY cent_bs_upld2_id DESC";
				$result1 = mysqli_query($connect, $qry1);
				$row1=mysqli_fetch_array($result1);
				$id = $row1['cent_bs_upld2_id'];
				$did = $id+1;
				
				$sql1 = "INSERT INTO tbl_cent_bs_upld2(cent_bs_upld2_id, cent_bs_id, cent_bs_upld2_doc_det, cent_bs_upld2_doc) 
				VALUES('$did','$cid','$clt_det','$image')";  
				mysqli_query($connect, $sql1);				
			}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>