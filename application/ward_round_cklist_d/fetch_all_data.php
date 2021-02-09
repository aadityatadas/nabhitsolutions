<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
$tbl = $_POST['tbl'];
function get_total_all_data($connection , $tbl)
{
	
	$statement = $connection->prepare("SELECT * FROM $tbl");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query .= "SELECT  DISTINCT * FROM $tbl
";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE id LIKE "%'.$_POST["search"]["value"].'%" ';
	
	$query .= 'OR audit_date LIKE "%'.$_POST["search"]["value"].'%" ';
	
	
	$query .= 'OR name_sign LIKE "%'.$_POST["search"]["value"].'%" ';
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$audit_name1="'".$tbl."'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$aud_id= "'".$row['audit_date']."'";
	if($typ == 'Admin')
	{
		// $sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["huf_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row['huf_id'].' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>';


		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a id="myModel" data-whatever="'.$row["id"].' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to Add Repost" id="'.$row["id"].'" class="saveCPReport" onclick="saveCPReport('.$aud_id.','.($audit_name1).')" ><i style="color:blue;" class="fa fa-pencil fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a id="myModel" data-whatever="'.$row["id"].' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to Add Repost" id="'.$row["id"].'" class="saveCPReport" onclick="saveCPReport('.$aud_id.','.($audit_name1).')" ><i style="color:blue;" class="fa fa-pencil fa-fw"></i></a>';	
	}
	$sub_array[] = $row["id"];
	$sub_array[] = $row["audit_date"];
	$sub_array[] = $row["audit_time"];
	$sub_array[] = $row["name_sign"];
	
	
	
	

	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_data($connection,$tbl),
	"data"				=>	$data
);
echo json_encode($output);
?>