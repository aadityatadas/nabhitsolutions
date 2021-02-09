<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_patient_reg ";
if(isset($_POST["search"]["value"]))
{






	
	$query .= 'WHERE p_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR uhid_no LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR gender LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR city LIKE "%'.$_POST["search"]["value"].'%" ';
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY p_name DESC ';
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
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["patient_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["patient_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["patient_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';	
	}
	//$sub_array[] = $row["patient_id"];
	$sub_array[] = $row["patient_id"];
	$sub_array[] = $row['uhid_no'];
  $sub_array[] = $row['p_name'];
  $sub_array[] = $row['date_of_reg'];
  $sub_array[] = $row['gender'];
  $sub_array[] = $row['marital'];
  








 
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