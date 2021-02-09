<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_prescriptions ";

if(isset($_POST["search"]["value"]))
{
	
	$query .= 'WHERE prescriptions_id LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR doctor_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR date_done LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR time_done LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR other_advices LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR diet_orders LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR dis_tras_advices LIKE "%'.$_POST["search"]["value"].'%" ';
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY prescriptions_id DESC ';
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
	$sub_array = array();
	if($typ == 'Admin')
	{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["prescriptions_id"].'" class="update1"  href="edit_medecine_prescription.php?id='.$row["prescriptions_id"].'"><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["prescriptions_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["prescriptions_id"].'" class="update1" href="edit_medecine_prescription.php/'.$row["prescriptions_id"].'"><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';	
	}






	$sub_array[] = $row["prescriptions_id"];
	$sub_array[] = $row["date_done"];
	$sub_array[] = $row["time_done"];
	$sub_array[] = $row["other_advices"];
	$sub_array[] = $row["diet_orders"];	
	$sub_array[] = $row["dis_tras_advices"];
	
	
	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_common('tbl_prescriptions'),
	"data"				=>	$data
);
echo json_encode($output);
?>