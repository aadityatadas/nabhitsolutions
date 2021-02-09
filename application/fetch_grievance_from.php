<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_grievance_from ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE emp_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hrid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR emp_no LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR department LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR issue LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY gid DESC ';
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
	$centid = $row["gid"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["gid"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["gid"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	
	$sub_array[] = $row["gid"];
	$sub_array[] = $row["emp_name"];
	$sub_array[] = $row["hrid"];
	$sub_array[] = $row["emp_no"];
	$sub_array[] = $row["con_no"];
	$sub_array[] = $row["department"];
	$sub_array[] = $row["designation"];
	$sub_array[] = $row["issue"];
	$sub_array[] = $row["hrname"];
	$sub_array[] = $row["mdname"];
	
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