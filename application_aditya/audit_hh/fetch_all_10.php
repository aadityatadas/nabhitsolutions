<?php
//error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
$ses = $_SESSION['login'];

include('../dbinfo.php');
include('../function.php');
$query = '';

$output = array();
$tbl = $_POST['tbl'];
if($typ == 'Admin')
{
	$query = "SELECT * FROM $tbl order by id DESC";
}
else
{
	$query = "SELECT * FROM $tbl where ses = '$ses' and typ = '$typ' order by id DESC";
}



$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


//die();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$sub_array = array();
	if($typ == 'Admin')
	{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a id="myModel" data-whatever="'.$row['id'].' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row['id'].' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>';	
	}
	//$sub_array[] = $row["month_id"];
	//echo $mtt = strtotime($row['crdate']);
	
  $sub_array[] = $row['sTime'];
  $sub_array[] = $row['dateVal'];//date('F');
  $sub_array[] = $row['day'];
  $sub_array[] = $row['timeVal'];
  $sub_array[] = $row['prof'];
  $sub_array[] = $row['nameVal'];
  $sub_array[] = $row['sex'];//date('F');
  $sub_array[] = $row['hh'];
  $sub_array[] = $row['tech'];
  $sub_array[] = $row['usedProduct'];
  $sub_array[] = $row['towel'];
  $sub_array[] = $row['noninvasive'];//date('F');
  $sub_array[] = $row['invasive'];
  $sub_array[] = $row['fluid'];
  $sub_array[] = $row['contact'];
  $sub_array[] = $row['surroundings'];
  


 
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