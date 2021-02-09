<?php
	//session_start();
	include('db.php');
	include('fun_rpt_vent.php');
	if(!empty($_POST))  
	{	
		if($_POST['clt_det'] != '')
			{
				$cid = mysqli_real_escape_string($connect, $_POST["ventid"]);
				$pid = mysqli_real_escape_string($connect, $_POST["clt_det"]);
				if($_FILES["cult_rpt"]["name"] != '')
				{
					$image = upload_cult_rpt();
				}
				$qry = "SELECT vent_upld2_id FROM tbl_vent_upld2 ORDER BY vent_upld2_id DESC";
				$result2 = mysqli_query($connect, $qry);
				$row1=mysqli_fetch_array($result2);
				$id = $row1['vent_upld2'];
				$did = $id+1;
				
				$sql = "INSERT INTO tbl_vent_upld2(vent_upld2_id, vent_id, vent_upld2_doc_det, vent_upld2_doc) 
				VALUES('$did','$cid','$pid','$image')";  
				mysqli_query($connect, $sql);
				
				//echo "Document Uploaded Successfully";
			}
		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>