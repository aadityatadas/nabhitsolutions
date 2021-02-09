<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_huf ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dadm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_tadm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ddd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dddd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_tddd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_mlc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_surg LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_lens LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY huf_id DESC ';
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
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["huf_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';	
	}
	$sub_array[] = $row["huf_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];	
	$sub_array[] = $row["huf_dadm"];
	$sub_array[] = $row["huf_tadm"];
	$sub_array[] = $row["tyofadmison"];
	
	$sub_array[] = $row["huf_ddd"];
	$sub_array[] = $row["huf_dddd"];
	$sub_array[] = $row["huf_tddd"];
	$sub_array[] = $row["huf_mlc"];
	$sub_array[] = $row["huf_surg"];
	
	$sub_array[] = $row["huf_lens"];
	$sub_array[] = $row["huf_recd"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>