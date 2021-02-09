<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');

if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_incident_report
		WHERE rid = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		
				$output["sr_no"]			=	$_POST["user_id"];
				$output["p_name"]			=	$row["p_name"];
				$output["acon"]				=	$row["acon"];
				$output["age"]				=	$row["age"];
				$output["dadm"]				=	$row["dadm"];
				$output["gender"]			=	$row["gender"];
				$output["diagnosis"]		=	$row["diagnosis"];
				$output["ipno"]     		=  $row['ipno'];
				$output["operationDone"]    =  $row['operationDone'];
				$output["mrno"]       		=  $row['mrno'];
				$output["location"]       	=  $row['location'];
				$output["doi"]         		=  $row['doi'];
				$output["toi"]         		=  $row['toi'];
				$output["dor"]         		=  $row['dor'];
				$output["tor"]      	 	=  $row['tor'];
				$output["mo1"]         		=  $row['mo1'];
				$output["mo2"]         		=  $row['mo2'];
				$output["mo3"]       		= 	$row['mo3'];
				$output["mo4"]         		=  $row["mo4"];
				$output["mo5"]         		=  $row["mo5"];
				$output["mo6"]				=	$row["mo6"];
				$output["mo7"]				=	$row["mo7"];
				$output["mo8"]				=	$row["mo8"];
				$output["mo9"]				=	$row["mo9"];
				$output["mo10"]				=	$row["mo10"];
				$output["mo11"]				=	$row["mo11"];
				$output["mo12"]				=	$row["mo12"];
				$output["ofact"]    		=  $row['ofact'];
				$output["mo13"]         	=  $row['mo13'];
				$output["codition"]       	=  $row['codition'];
				$output["person"]       	=  $row['person'];
				$output["mo14"]         	=  $row['mo14'];
				$output["mo15"]         	=  $row['mo15'];
				$output["mo16"]         	=  $row['mo16'];
				$output["mo17"]       		=  $row['mo17'];
				$output["mo18"]         	=  $row['mo18'];
				$output["mo19"]         	=  $row['mo19'];
				$output["mo20"]       		= 	$row['mo20'];
				$output["mo21"]         	=  $row["mo21"];
				$output["mo22"]         	=  $row["mo22"];
				$output["mo23"]         	=  $row['mo23'];
				$output["mo24"]       		=  $row['mo24'];
				$output["mo25"]       		=  $row['mo25'];
				$output["mo26"]         	=  $row['mo26'];
				$output["mo27"]         	=  $row['mo27'];
				$output["mo28"]         	=  $row['mo28'];
				$output["mo29"]       		=  $row['mo29'];
				$output["mo30"]         	=  $row['mo30'];
				$output["mo31"]         	=  $row['mo31'];
				$output["mo32"]       		= 	$row['mo32'];
				$output["mo33"]       		= 	$row['mo33'];
				$output["mo34"]       		= 	$row['mo34'];
				$output["mo35"]       		= 	$row['mo35'];
		

		
		echo json_encode($output);
	}
}
?>