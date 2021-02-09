<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_cath.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["ventid"]);
		if($_FILES["cult_rpt"]["name"] != '')
			{
				$clt_det = mysqli_real_escape_string($connect, $_POST["clt_det"]);
				//$srno1 = mysqli_real_escape_string($connect, $_POST["srno1"]);
				if($_FILES["cult_rpt"]["name"] != '')
				{
					$image = upload_cult_rpt();
				}
				$qry1 = "SELECT cath_uti_upld2_id FROM tbl_cath_uti_upld2 ORDER BY cath_uti_upld2_id DESC";
				$result1 = mysqli_query($connect, $qry1);
				$row1=mysqli_fetch_array($result1);
				$id = $row1['cath_uti_upld2_id'];
				$did = $id+1;
				
				$sql1 = "INSERT INTO tbl_cath_uti_upld2(cath_uti_upld2_id, cath_uti_id, cath_uti_upld2_doc_det, cath_uti_upld2_doc) 
				VALUES('$did','$cid','$clt_det','$image')";  
				mysqli_query($connect, $sql1);				
			}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>