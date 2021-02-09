<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$d1 = mysqli_real_escape_string($connect, $_POST["inj_dttm"]);
		$d2 = mysqli_real_escape_string($connect, $_POST["inj_dttm2"]);
		$d3 = $d1.' '.$d2;
		
		$qry = "SELECT needp_id FROM tbl_need_pif ORDER BY needp_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['needp_id'];
		$cid = $id+1;
		
		$statement = $connection->prepare("
			INSERT INTO tbl_need_pif (needp_id, needp_sname, needp_dept, needp_dttm, needp_typ_inj, needp_mod_inj, needp_usinj, needp_sharp, needp_inj_det, needp_wh_inv, needp_wh_prop, needp_rep_to, needp_rep_by, needp_tot_stf) 
			VALUES ('$cid', :s_name, :dept, '$d3', :inj_typ, :inj_mod, :inj_with, :inj_pname, :inj_det, :inj_inv, :inj_prop, :inj_rpt, :inj_rptby, :stf_no)
		");
		$result = $statement->execute(
			array(
				':s_name'		=>	$_POST["s_name"],
				':dept'			=>	$_POST["dept"],
				//':inj_dttm'	=>	$_POST["inj_dttm"],
				':inj_typ'		=>	$_POST["inj_typ"],
				':inj_mod'		=>	$_POST["inj_mod"],
				':inj_with'		=>	$_POST["inj_with"],
				':inj_pname'	=>	$_POST["inj_pname"],
				':inj_det'		=>	$_POST["inj_det"],
				':inj_inv'		=>	$_POST["inj_inv"],
				':inj_prop'		=>	$_POST["inj_prop"],
				':inj_rpt'		=>	$_POST["inj_rpt"],
				':inj_rptby'	=>	$_POST["inj_rptby"],
				':stf_no'		=>	$_POST["stf_no"]
			)
		);
		
		if(!empty($result))
		{
			echo 'Neddle Prick Injury Form Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$d1 = mysqli_real_escape_string($connect, $_POST["inj_dttm"]);
		$d2 = mysqli_real_escape_string($connect, $_POST["inj_dttm2"]);
		$d3 = $d1.' '.$d2;
				
		$dddd = mysqli_real_escape_string($connect, $_POST["dddd"]);
				
		$statement = $connection->prepare(
			"UPDATE tbl_need_pif 
			SET needp_sname = :s_name, needp_dept = :dept, needp_dttm = '$d3', needp_typ_inj = :inj_typ, needp_mod_inj = :inj_mod, needp_usinj = :inj_with, needp_sharp = :inj_pname, needp_inj_det = :inj_det, needp_wh_inv = :inj_inv, needp_wh_prop = :inj_prop, needp_rep_to = :inj_rpt, needp_rep_by = :inj_rptby, needp_tot_stf = :stf_no
			WHERE needp_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				':s_name'		=>	$_POST["s_name"],
				':dept'			=>	$_POST["dept"],
				//':inj_dttm'	=>	$_POST["inj_dttm"],
				':inj_typ'		=>	$_POST["inj_typ"],
				':inj_mod'		=>	$_POST["inj_mod"],
				':inj_with'		=>	$_POST["inj_with"],
				':inj_pname'	=>	$_POST["inj_pname"],
				':inj_det'		=>	$_POST["inj_det"],
				':inj_inv'		=>	$_POST["inj_inv"],
				':inj_prop'		=>	$_POST["inj_prop"],
				':inj_rpt'		=>	$_POST["inj_rpt"],
				':inj_rptby'	=>	$_POST["inj_rptby"],
				':stf_no'		=>	$_POST["stf_no"]
			)
		);
		if(!empty($result))
		{
			echo 'Neddle Prick Injury Form Updated Successfully';
		}
	}
}
?>