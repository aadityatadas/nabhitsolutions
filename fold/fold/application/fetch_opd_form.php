<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_opd ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE opd_date LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opd_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opd_email LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opd_trdr LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY opd_id DESC ';
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
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["opd_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["opd_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}
	else{
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["opd_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';	
	}
	$sub_array[] = $row["opd_id"];
	$sub_array[] = $row["opd_date"];
	$sub_array[] = $row["opd_name"];
	$sub_array[] = $row["opd_age"];
	$sub_array[] = $row["opd_sex"];
	$sub_array[] = $row["opd_email"];
	$sub_array[] = $row["opd_addr"];
	$sub_array[] = $row["opd_trdr"];
	$sub_array[] = $row["opd_hrd1"].' , '.$row["opd_hrd2"].' , '.$row["opd_hrd3"];
	$sub_array[] = $row["opd_oth"];
	$sub_array[] = $row["opd_user"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records13(),
	"data"				=>	$data
);
echo json_encode($output);
?>