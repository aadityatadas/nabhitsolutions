<?php
//error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
/*print_r($_POST);
die();*/
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT rid FROM  tbl_incident_report ORDER BY rid DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['rid'];
		$cid = $id+1;
		$statement = $connection->prepare(
			"INSERT INTO  tbl_incident_report(rid,p_name,acon,age,dadm,gender,diagnosis,ipno,operationDone,mrno,location,doi,toi,dor,tor,mo1,mo2,mo3,mo4,mo5,mo6,mo7,mo8,mo9,mo10,mo11,mo12,ofact,mo13,codition,person,mo14,mo15,mo16,mo17,mo18,mo19,mo20,mo21,mo22,mo23,mo24,mo25,mo26,mo27,mo28,mo29,mo30,mo31,mo32,mo33,mo34,mo35,ses,created)
			VALUES(:rid,:p_name,:acon,:age,:dadm,:gender,:diagnosis,:ipno,:operationDone,:mrno,:location,:doi,:toi,:dor,:tor,:mo1,:mo2,:mo3,:mo4,:mo5,:mo6,:mo7,:mo8,:mo9,:mo10,:mo11,:mo12,:ofact,:mo13,:codition,:person,:mo14,:mo15,:mo16,:mo17,:mo18,:mo19,:mo20,:mo21,:mo22,:mo23,:mo24,:mo25,:mo26,:mo27,:mo28,:mo29,:mo30,:mo31,:mo32,:mo33,:mo34,:mo35,:ses,:created)"
		);
		

		$result = $statement->execute(
			array(
				':rid'				=>	$cid,
				':p_name'			=>	$_POST["p_name"],
				':acon'				=>	$_POST["acon"],
				':age'				=>	$_POST["age"],
				':dadm'				=>	$_POST["dadm"],
				':gender'			=>	$_POST["gender"],
				':diagnosis'		=>	$_POST["diagnosis"],
				':ipno'     		=>  $_POST['ipno'],
				':operationDone'    =>  $_POST['operationDone'],
				':mrno'       		=>  $_POST['mrno'],
				':location'       	=>  $_POST['location'],
				':doi'         		=>  $_POST['doi'],
				':toi'         		=>  $_POST['toi'],
				':dor'         		=>  $_POST['dor'],
				':tor'      	 	=>  $_POST['tor'],
				':mo1'         		=>  $_POST['mo1'],
				':mo2'         		=>  $_POST['mo2'],
				':mo3'       		=> 	$_POST['mo3'],
				':mo4'         		=>  $_POST["mo4"],
				':mo5'         		=>  $_POST["mo5"],
				':mo6'				=>	$_POST["mo6"],
				':mo7'				=>	$_POST["mo7"],
				':mo8'				=>	$_POST["mo8"],
				':mo9'				=>	$_POST["mo9"],
				':mo10'				=>	$_POST["mo10"],
				':mo11'				=>	$_POST["mo11"],
				':mo12'				=>	$_POST["mo12"],
				':ofact'    		=>  $_POST['ofact'],
				':mo13'         	=>  $_POST['mo13'],
				':codition'       	=>  $_POST['codition'],
				':mo14'         	=>  $_POST['mo14'],
				':person'       	=>  $_POST['person'],
				':mo15'         	=>  $_POST['mo15'],
				':mo16'         	=>  $_POST['mo16'],
				':mo17'       		=>  $_POST['mo17'],
				':mo18'         	=>  $_POST['mo18'],
				':mo19'         	=>  $_POST['mo19'],
				':mo20'       		=> 	$_POST['mo20'],
				':mo21'         	=>  $_POST["mo21"],
				':mo22'         	=>  $_POST["mo22"],
				':mo23'         	=>  $_POST['mo23'],
				':mo24'       		=>  $_POST['mo24'],
				':mo25'       		=>  $_POST['mo25'],
				':mo26'         	=>  $_POST['mo26'],
				':mo27'         	=>  $_POST['mo27'],
				':mo28'         	=>  $_POST['mo28'],
				':mo29'       		=>  $_POST['mo29'],
				':mo30'         	=>  $_POST['mo30'],
				':mo31'         	=>  $_POST['mo31'],
				':mo32'       		=> 	$_POST['mo32'],
				':mo33'         	=>  $_POST['mo33'],
				':mo34'         	=>  $_POST['mo34'],
				':mo35'       		=> 	$_POST['mo35'],
				':ses'         		=>  $ses,				
				':created'         	=>  date('Y-m-d H:i')		
			)
		);
		if(!empty($result))
		{
			echo 'Incident Report Details Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{

		$statement = $connection->prepare(
			"UPDATE tbl_incident_report 
			SET   p_name = :p_name , acon = :acon , age = :age , dadm = :dadm , gender = :gender , diagnosis = :diagnosis , ipno = :ipno , operationDone = :operationDone , mrno = :mrno , location = :location , doi = :doi , toi = :toi , dor = :dor , tor = :tor , mo1 = :mo1 , mo2 = :mo2 , mo3 = :mo3 , mo4 = :mo4 , mo5 = :mo5 , mo6 = :mo6 , mo7 = :mo7 , mo8 = :mo8 , mo9 = :mo9 , mo10 = :mo10 , mo11 = :mo11 , mo12 = :mo12 , ofact = :ofact , mo13 = :mo13 , codition = :codition , person = :person , mo14 = :mo14 , mo15 = :mo15 , mo16 = :mo16 , mo17 = :mo17 , mo18 = :mo18 , mo19 = :mo19 , mo20 = :mo20 , mo21 = :mo21 , mo22 = :mo22 , mo23 = :mo23 , mo24 = :mo24 , mo25 = :mo25 , mo26 = :mo26 , mo27 = :mo27 , mo28 = :mo28 , mo29 = :mo29 , mo30 = :mo30 , mo31 = :mo31 , mo32 = :mo32 ,mo33 = :mo33 ,mo34 = :mo34 ,mo35 = :mo35 , ses = :ses   
			WHERE rid = :rid
			"
		);
		$result = $statement->execute(
			array(
				':rid'				=>	$_POST["user_id"],
				':p_name'			=>	$_POST["p_name"],
				':acon'				=>	$_POST["acon"],
				':age'				=>	$_POST["age"],
				':dadm'				=>	$_POST["dadm"],
				':gender'			=>	$_POST["gender"],
				':diagnosis'		=>	$_POST["diagnosis"],
				':ipno'     		=>  $_POST['ipno'],
				':operationDone'    =>  $_POST['operationDone'],
				':mrno'       		=>  $_POST['mrno'],
				':location'       	=>  $_POST['location'],
				':doi'         		=>  $_POST['doi'],
				':toi'         		=>  $_POST['toi'],
				':dor'         		=>  $_POST['dor'],
				':tor'      	 	=>  $_POST['tor'],
				':mo1'         		=>  $_POST['mo1'],
				':mo2'         		=>  $_POST['mo2'],
				':mo3'       		=> 	$_POST['mo3'],
				':mo4'         		=>  $_POST["mo4"],
				':mo5'         		=>  $_POST["mo5"],
				':mo6'				=>	$_POST["mo6"],
				':mo7'				=>	$_POST["mo7"],
				':mo8'				=>	$_POST["mo8"],
				':mo9'				=>	$_POST["mo9"],
				':mo10'				=>	$_POST["mo10"],
				':mo11'				=>	$_POST["mo11"],
				':mo12'				=>	$_POST["mo12"],
				':ofact'    		=>  $_POST['ofact'],
				':mo13'         	=>  $_POST['mo13'],
				':codition'       	=>  $_POST['codition'],
				':person'       	=>  $_POST['person'],
				':mo14'         	=>  $_POST['mo14'],
				':mo15'         	=>  $_POST['mo15'],
				':mo16'         	=>  $_POST['mo16'],
				':mo17'       		=>  $_POST['mo17'],
				':mo18'         	=>  $_POST['mo18'],
				':mo19'         	=>  $_POST['mo19'],
				':mo20'       		=> 	$_POST['mo20'],
				':mo21'         	=>  $_POST["mo21"],
				':mo22'         	=>  $_POST["mo22"],
				':mo23'         	=>  $_POST['mo23'],
				':mo24'       		=>  $_POST['mo24'],
				':mo25'       		=>  $_POST['mo25'],
				':mo26'         	=>  $_POST['mo26'],
				':mo27'         	=>  $_POST['mo27'],
				':mo28'         	=>  $_POST['mo28'],
				':mo29'       		=>  $_POST['mo29'],
				':mo30'         	=>  $_POST['mo30'],
				':mo31'         	=>  $_POST['mo31'],
				':mo32'       		=> 	$_POST['mo32'],
				':mo33'         	=>  $_POST['mo33'],
				':mo34'         	=>  $_POST['mo34'],
				':mo35'       		=> 	$_POST['mo35'],
				':ses'         		=>  $ses,	
			)
		);
		if(!empty($result))
		{
			echo 'Incident Report Details Updated Successfully';
		}
	}
}
?>