<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_vent.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["ventid"]);
		if($_POST['rpt_det1'] != '')
			{
				$rpt_det1 = mysqli_real_escape_string($connect, $_POST["rpt_det1"]);
				$srno1 = mysqli_real_escape_string($connect, $_POST["srno1"]);
				if($_FILES["rpt_rpt1"]["name"] != '')
				{
					$image1 = upload_rpt1();
				}
				$qry1 = "SELECT vent_upld_id FROM tbl_vent_upld ORDER BY vent_upld_id DESC";
				$result1 = mysqli_query($connect, $qry1);
				$row1=mysqli_fetch_array($result1);
				$id = $row1['vent_upld_id'];
				$did = $id+1;
				
				$sql1 = "INSERT INTO tbl_vent_upld(vent_upld_id, vent_id, vent_srno, vent_upld_doc_det, vent_upld_doc) 
				VALUES('$did','$cid','$srno1','$rpt_det1','$image1')";  
				mysqli_query($connect, $sql1);				
			}
		if($_POST['rpt_det2'] != '')
			{
				$rpt_det2 = mysqli_real_escape_string($connect, $_POST["rpt_det2"]);
				$srno2 = mysqli_real_escape_string($connect, $_POST["srno2"]);
				if($_FILES["rpt_rpt2"]["name"] != '')
				{
					$image2 = upload_rpt2();
				}
				$qry2 = "SELECT vent_upld_id FROM tbl_vent_upld ORDER BY vent_upld_id DESC";
				$result2 = mysqli_query($connect, $qry2);
				$row2=mysqli_fetch_array($result2);
				$id = $row2['vent_upld_id'];
				$did2 = $id+1;
				
				$sql2 = "INSERT INTO tbl_vent_upld(vent_upld_id, vent_id, vent_srno, vent_upld_doc_det, vent_upld_doc) 
				VALUES('$did2','$cid','$srno2','$rpt_det2','$image2')";  
				mysqli_query($connect, $sql2);				
			}
		if($_POST['rpt_det3'] != '')
			{
				$rpt_det3 = mysqli_real_escape_string($connect, $_POST["rpt_det3"]);
				$srno3 = mysqli_real_escape_string($connect, $_POST["srno3"]);
				if($_FILES["rpt_rpt3"]["name"] != '')
				{
					$image3 = upload_rpt3();
				}
				$qry3 = "SELECT vent_upld_id FROM tbl_vent_upld ORDER BY vent_upld_id DESC";
				$result3 = mysqli_query($connect, $qry3);
				$row3=mysqli_fetch_array($result3);
				$id = $row3['vent_upld_id'];
				$did3 = $id+1;
				
				$sql3 = "INSERT INTO tbl_vent_upld(vent_upld_id, vent_id, vent_srno, vent_upld_doc_det, vent_upld_doc) 
				VALUES('$did3','$cid','$srno3','$rpt_det3','$image3')";  
				mysqli_query($connect, $sql3);				
			}
		
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>