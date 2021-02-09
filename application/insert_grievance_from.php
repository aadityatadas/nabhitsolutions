<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT gid FROM  tbl_grievance_from ORDER BY hrid DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['gid'];
		$cid = $id+1;
		$statement = $connection->prepare(
			"INSERT INTO  tbl_grievance_from(gid,emp_name,hrid, emp_no, con_no, department, designation, issue, describe_gre, factors,suggestion , immediate,next,hrname,hrsign,hrdatetime,mdname,mdsign,mddatetime,ses,created)
			VALUES('$cid',:emp_name,:hrid,:emp_no,:con_no,:department,:designation,:issue,:describe_gre,:factors,:suggestion,:immediate,:next,:hrname,:hrsign,:hrdatetime,:mdname,:mdsign,:mddatetime,:ses,:created)"
		);
		

		$result = $statement->execute(
			array(
				':emp_name'			=>	$_POST["mo1"],
				':hrid'				=>	$_POST["mo2reg"],
				':emp_no'			=>	$_POST["mo2"],
				':con_no'			=>	$_POST["conno"],
				':department'		=>	$_POST["mo4"],
				':designation'		=>	$_POST["mo3"],
				':issue'			=>	$_POST["mo6_emp"],
				':describe_gre'     =>  $_POST['describe'],
				':factors'         	=>  $_POST['factors'],
				':suggestion'       =>  $_POST['suggestion'],
				':immediate'       	=>  $_POST['immediate'],
				':next'         	=>  $_POST['next'],
				':hrname'         	=>  $_POST['hrname'],
				':hrsign'         	=>  $_POST['hrsign'],
				':hrdatetime'       =>  $_POST['hrdate'].'_'.$_POST['hrtime'],
				':mdname'         	=>  $_POST['mdname'],
				':mdsign'         	=>  $_POST['mdsign'],
				':mddatetime'       => $_POST['mddate'].'_'.$_POST['mdtime'],
				':ses'         		=>  $ses,
				':created'         	=>  date()
			)
		);
		if(!empty($result))
		{
			echo 'GRIEVANCE FORM Details Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{

		$statement = $connection->prepare(
			"UPDATE tbl_grievance_from 
			SET emp_name = :emp_name,hrid = :hrid, emp_no = :emp_no, con_no = :con_no, department = :department, designation = :designation, issue = :issue, describe_gre = :describe_gre, factors = :factors,suggestion = :suggestion , immediate = :immediate,next = :next,hrname = :hrname,hrsign = :hrsign,hrdatetime = :hrdatetime,mdname = :mdname,mdsign = :mdsign,mddatetime = :mddatetime,ses = :ses   
			WHERE gid = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'			=>	$_POST["user_id"],
				':emp_name'			=>	$_POST["mo1"],
				':hrid'				=>	$_POST["mo2reg"],
				':emp_no'			=>	$_POST["mo2"],
				':con_no'			=>	$_POST["conno"],
				':department'		=>	$_POST["mo4"],
				':designation'		=>	$_POST["mo3"],
				':issue'			=>	$_POST["mo6_emp"],
				':describe_gre'     =>  $_POST['describe'],
				':factors'         	=>  $_POST['factors'],
				':suggestion'       =>  $_POST['suggestion'],
				':immediate'       	=>  $_POST['immediate'],
				':next'         	=>  $_POST['next'],
				':hrname'         	=>  $_POST['hrname'],
				':hrsign'         	=>  $_POST['hrsign'],
				':hrdatetime'       =>  $_POST['hrdate'].'_'.$_POST['hrtime'],
				':mdname'         	=>  $_POST['mdname'],
				':mdsign'         	=>  $_POST['mdsign'],
				':mddatetime'       => $_POST['mddate'].'_'.$_POST['mdtime'],
				':ses'         		=>  $ses
			)
		);
		if(!empty($result))
		{
			echo 'GRIEVANCE FORM Details Updated Successfully';
		}
	}
}
?>