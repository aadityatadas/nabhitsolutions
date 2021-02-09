<?php
	//session_start();
	include('dbinfo.php');
	include('fun_rpt_cent.php');
	if(!empty($_POST))  
	{	
		$cid = mysqli_real_escape_string($connect, $_POST["ventid"]);
		// First Document
		if($_FILES["rpt_rpt1"]["name"] != '' AND $_POST['rpt_doc1'] != '')
		{
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			$rpt_det1 = mysqli_real_escape_string($connect, $_POST["rpt_det1"]);
			
			$qry=mysqli_query($connect,"SELECT cent_bs_upld_doc FROM tbl_cent_bs_upld WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid1'")or die(mysqli_error($connect));
			$rw=mysqli_fetch_array($qry);
			$dname1 = $rw["cent_bs_upld_doc"];
			unlink( "./upload_cent/".$dname1 );
			$image1 = upload_rpt1();
			$qry2 = "UPDATE tbl_cent_bs_upld SET cent_bs_upld_doc_det = '$rpt_det1', cent_bs_upld_doc = '$image1' WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid1'";
			mysqli_query($connect, $qry2);				
		}
		elseif($_FILES["rpt_rpt1"]["name"] != '' AND $_POST['rpt_doc1'] == '')
		{
			$rpt_det1 = mysqli_real_escape_string($connect, $_POST["rpt_det1"]);
			$srno1 = mysqli_real_escape_string($connect, $_POST["srno1"]);
			$image1 = upload_rpt1();
			$qry3 = "SELECT cent_bs_upld_id FROM tbl_cent_bs_upld ORDER BY cent_bs_upld_id DESC";
			$res = mysqli_query($connect, $qry3);
			$row1=mysqli_fetch_array($res);
			$id = $row1['cent_bs_upld_id'];
			$did = $id+1;
			
			$qry4 = "INSERT INTO tbl_cent_bs_upld(cent_bs_upld_id, cent_bs_id, cent_bs_srno, cent_bs_upld_doc_det, cent_bs_upld_doc) 
			VALUES('$did','$cid','$srno1','$rpt_det1','$image1')";  
			mysqli_query($connect, $qry4);
		}
		elseif($_FILES["rpt_rpt1"]["name"] == '' AND $_POST['rpt_doc1'] != '')
		{
			$rpt_det1 = mysqli_real_escape_string($connect, $_POST["rpt_det1"]);
			$vid1 = mysqli_real_escape_string($connect, $_POST["vid1"]);
			$qry5 = "UPDATE tbl_cent_bs_upld SET cent_bs_upld_doc_det = '$rpt_det1' WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid1'";
			mysqli_query($connect, $qry5);	
		}
		// Second Document
		if($_FILES["rpt_rpt2"]["name"] != '' AND $_POST['rpt_doc2'] != '')
		{
			$vid2 = mysqli_real_escape_string($connect, $_POST["vid2"]);
			$rpt_det2 = mysqli_real_escape_string($connect, $_POST["rpt_det2"]);
			
			$rsp=mysqli_query($connect,"SELECT cent_bs_upld_doc FROM tbl_cent_bs_upld WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid2'")or die(mysqli_error($connect));
			$resp=mysqli_fetch_array($rsp);
			$dname2 = $resp["cent_bs_upld_doc"];
			unlink( "./upload_cent/".$dname2 );
			$image2 = upload_rpt2();
			$sq2 = "UPDATE tbl_cent_bs_upld SET cent_bs_upld_doc_det = '$rpt_det2', cent_bs_upld_doc = '$image2' WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid2'";
			mysqli_query($connect, $sq2);				
		}
		elseif($_FILES["rpt_rpt2"]["name"] != '' AND $_POST['rpt_doc2'] == '')
		{
			$rpt_det2 = mysqli_real_escape_string($connect, $_POST["rpt_det2"]);
			$srno2 = mysqli_real_escape_string($connect, $_POST["srno2"]);
			$image2 = upload_rpt2();
			$sq3 = "SELECT cent_bs_upld_id FROM tbl_cent_bs_upld ORDER BY cent_bs_upld_id DESC";
			$rs2 = mysqli_query($connect, $sq3);
			$row2=mysqli_fetch_array($rs2);
			$id = $row2['cent_bs_upld_id'];
			$did = $id+1;
			
			$sq4 = "INSERT INTO tbl_cent_bs_upld(cent_bs_upld_id, cent_bs_id, cent_bs_srno, cent_bs_upld_doc_det, cent_bs_upld_doc) 
			VALUES('$did','$cid','$srno2','$rpt_det2','$image2')";  
			mysqli_query($connect, $sq4);
		}
		elseif($_FILES["rpt_rpt2"]["name"] == '' AND $_POST['rpt_doc2'] != '')
		{
			$rpt_det2 = mysqli_real_escape_string($connect, $_POST["rpt_det2"]);
			$vid2 = mysqli_real_escape_string($connect, $_POST["vid2"]);
			$sq5 = "UPDATE tbl_cent_bs_upld SET cent_bs_upld_doc_det = '$rpt_det2' WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid2'";
			mysqli_query($connect, $sq5);	
		}		
		// Third Document
		if($_FILES["rpt_rpt3"]["name"] != '' AND $_POST['rpt_doc3'] != '')
		{
			$vid3 = mysqli_real_escape_string($connect, $_POST["vid3"]);
			$rpt_det3 = mysqli_real_escape_string($connect, $_POST["rpt_det3"]);
			
			$sql=mysqli_query($connect,"SELECT cent_bs_upld_doc FROM tbl_cent_bs_upld WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid2'")or die(mysqli_error($connect));
			$rw3=mysqli_fetch_array($sql);
			$dname3 = $rw3["cent_bs_upld_doc"];
			unlink( "./upload_cent/".$dname3 );
			$image3 = upload_rpt3();
			$sql2 = "UPDATE tbl_cent_bs_upld SET cent_bs_upld_doc_det = '$rpt_det3', cent_bs_upld_doc = '$image3' WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid3'";
			mysqli_query($connect, $sql2);				
		}
		elseif($_FILES["rpt_rpt3"]["name"] != '' AND $_POST['rpt_doc3'] == '')
		{
			$rpt_det3 = mysqli_real_escape_string($connect, $_POST["rpt_det3"]);
			$srno3 = mysqli_real_escape_string($connect, $_POST["srno3"]);
			$image3 = upload_rpt3();
			$sql3 = "SELECT cent_bs_upld_id FROM tbl_cent_bs_upld ORDER BY cent_bs_upld_id DESC";
			$res3 = mysqli_query($connect, $sql3);
			$row3=mysqli_fetch_array($res3);
			$id = $row3['cent_bs_upld_id'];
			$did = $id+1;
			
			$sql4 = "INSERT INTO tbl_cent_bs_upld(cent_bs_upld_id, cent_bs_id, cent_bs_srno, cent_bs_upld_doc_det, cent_bs_upld_doc) 
			VALUES('$did','$cid','$srno3','$rpt_det3','$image3')";  
			mysqli_query($connect, $sql4);
		}
		elseif($_FILES["rpt_rpt3"]["name"] == '' AND $_POST['rpt_doc3'] != '')
		{
			$rpt_det3 = mysqli_real_escape_string($connect, $_POST["rpt_det3"]);
			$vid3 = mysqli_real_escape_string($connect, $_POST["vid3"]);
			$sql5 = "UPDATE tbl_cent_bs_upld SET cent_bs_upld_doc_det = '$rpt_det3' WHERE cent_bs_id = '$cid' AND cent_bs_upld_id = '$vid3'";
			mysqli_query($connect, $sql5);	
		}
	}
	else{
		echo "Oops There is Some Problem, Please check?";  
	} 
?>