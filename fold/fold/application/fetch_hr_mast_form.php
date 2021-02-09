<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_hr_mast ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE hr_staff LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hr_empcode LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hr_desig LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hr_dept LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hr_datej LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hr_ctstat LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY hr_id DESC ';
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
	$centid = $row["hr_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["hr_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["hr_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	
	$sub_array[] = $row["hr_id"];
	$sub_array[] = $row["hr_staff"];
	$sub_array[] = $row["hr_empcode"];
	$sub_array[] = $row["hr_desig"];
	$sub_array[] = $row["hr_dept"];
	$sub_array[] = $row["hr_datej"];
	if($row["hr_ctstat"] == 'Resigned'){
		$sub_array[] = $row["hr_ctstat"].' On '.$row["hr_ctstat_det"];
	}else{
		$sub_array[] = $row["hr_ctstat"];
	}
	$sub_array[] = $row["hr_recd"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_hr(),
	"data"				=>	$data
);
echo json_encode($output);
?>