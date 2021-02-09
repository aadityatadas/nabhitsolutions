<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT bof_id FROM tbl_bof ORDER BY bof_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['bof_id'];
		$cid = $id+1;
		
		$d_adm = mysqli_real_escape_string($connect, $_POST["b_date"]);
		$ddat1 = str_replace('/', '-', $d_adm);
		$d_my = date('Y-m', strtotime($ddat1));
		
		$tid = mysqli_real_escape_string($connect, $_POST["tid_no"]);
		$tob = mysqli_real_escape_string($connect, $_POST["tob_no"]);
		$tidb = $tid * 100;
		$tidbed = $tob * 100;
		$occ = $tidb / $tidbed;
		$occt = number_format($occ,2);
				
		$statement = $connection->prepare("
			INSERT INTO tbl_bof (bof_id, bof_date, bof_tid_day, bof_tob_bed, bof_bo, bof_my, bof_recd) 
			VALUES ('$cid', :b_date, :tid_no, :tob_no, '$occt', '$d_my', '$ses')
		");
		$result = $statement->execute(
			array(
				':b_date'		=>	$_POST["b_date"],
				':tid_no'		=>	$_POST["tid_no"],
				':tob_no'		=>	$_POST["tob_no"]
				//':boccup'		=>	$_POST["boccup"]
			)
		);
		
		if(!empty($result))
		{
			echo 'Bed Occupancy Form Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$d_adm = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		$ddat1 = str_replace('/', '-', $d_adm);
		$d_my = date('Y-m', strtotime($ddat1));
				
		$tid = mysqli_real_escape_string($connect, $_POST["tid_no"]);
		$tob = mysqli_real_escape_string($connect, $_POST["tob_no"]);
		$tidb = $tid * 100;
		$tidbed = $tob * 100;
		$occ = $tidb / $tidbed;
		$occt = number_format($occ,2);
				
		$statement = $connection->prepare(
			"UPDATE tbl_bof 
			SET bof_date = :b_date, bof_tid_day = :tid_no, bof_tob_bed = :tob_no, bof_bo = '$occt', bof_my = '$d_my', bof_recd = '$ses'  
			WHERE bof_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				':b_date'		=>	$_POST["b_date"],
				':tid_no'		=>	$_POST["tid_no"],
				':tob_no'		=>	$_POST["tob_no"]
			)
		);
		if(!empty($result))
		{
			echo 'Bed Occupancy Form Updated Successfully';
		}
	}
}
?>