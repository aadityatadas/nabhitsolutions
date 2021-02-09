<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_incident_report ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE p_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR rid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR acon LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR age LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR gender LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR diagnosis LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR ipno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR mrno LIKE "%'.$_POST["search"]["value"].'%" ';

}


if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY rid DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$centid = $row["rid"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["rid"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["rid"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	
				$sub_array[] = $row["rid"];
				$sub_array[] = $row["p_name"];
				$sub_array[] = $row["acon"];
				$sub_array[] = $row["age"];
				$sub_array[] = $row["dadm"];
				$sub_array[] = $row["gender"];
				$sub_array[] = $row["diagnosis"];
				$sub_array[] = $row['ipno'];
				$sub_array[] = $row['operationDone'];
				$sub_array[] = $row['mrno'];
				$sub_array[] = $row['location'];
				$sub_array[] = $row['doi'];
				$sub_array[] = $row['toi'];
				$sub_array[] = $row['dor'];
				$sub_array[] = $row['tor'];
				$sub_array[] = $row['mo1'];
				$sub_array[] = $row['mo2'];
				$sub_array[] = $row['mo3'];
				$sub_array[] = $row["mo4"];
				$sub_array[] = $row["mo5"];
				$sub_array[] = $row["mo6"];
				$sub_array[] = $row["mo7"];
				$sub_array[] = $row["mo8"];
				$sub_array[] = $row["mo9"];
				$sub_array[] = $row["mo10"];
				$sub_array[] = $row["mo11"];
				$sub_array[] = $row["mo12"];
				$sub_array[] = $row['ofact'];
				$sub_array[] = $row['mo13'];
				$sub_array[] = $row['codition'];
				$sub_array[] = $row['mo14'];
				$sub_array[] = $row['person'];
				$sub_array[] = $row['mo15'];
				$sub_array[] = $row['mo16'];
				$sub_array[] = $row['mo17'];
				$sub_array[] = $row['mo18'];
				$sub_array[] = $row['mo19'];
				$sub_array[] = $row['mo20'];
				$sub_array[] = $row["mo21"];
				$sub_array[] = $row["mo22"];
				$sub_array[] = $row['mo23'];
				$sub_array[] = $row['mo24'];
				$sub_array[] = $row['mo25'];
				$sub_array[] = $row['mo26'];
				$sub_array[] = $row['mo27'];
				$sub_array[] = $row['mo28'];
				$sub_array[] = $row['mo29'];
				$sub_array[] = $row['mo30'];
				$sub_array[] = $row['mo31'];
				$sub_array[] = $row['mo32'];
				$sub_array[] = $row['mo33'];
				$sub_array[] = $row['mo34'];
				$sub_array[] = $row['mo35'];
	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$filtered_rows,
	"data"				=>	$data
);
echo json_encode($output);
?>