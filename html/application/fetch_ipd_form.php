<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dadm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR ipd_email LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR ipd_trdr LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY tbl_ipd.ipd_id DESC ';
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
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["ipd_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["ipd_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}
	else{
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["ipd_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';	
	}
	$sub_array[] = $row["ipd_id"];
	$sub_array[] = $row["wttm_dttmr"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["ipd_age"];
	$sub_array[] = $row["ipd_sex"];
	$sub_array[] = $row["ipd_email"];
	$sub_array[] = $row["ipd_addr"];
	$sub_array[] = $row["ipd_trdr"];
	$sub_array[] = $row["ipd_hrd1"].' , '.$row["ipd_hrd2"].' , '.$row["ipd_hrd3"];
	$sub_array[] = $row["ipd_oth"];
	$sub_array[] = $row["ipd_score"];
	$sub_array[] = $row["ipd_user"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_ipd(),
	"data"				=>	$data
);
echo json_encode($output);
?>