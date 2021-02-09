<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
$tbl = $_POST['tbl'];

function get_total_all_data($connection , $tbl)
{
	
	$statement = $connection->prepare("SELECT  * FROM $tbl  GROUP BY monthyear ORDER BY monthyear ASC");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
// $query .= "SELECT  DISTINCT * FROM $tbl
// ";
$audit_name1="'".$tbl."'";

$query .="SELECT  * FROM $tbl ";

if(isset($_POST["search"]["value"]))
{
	$query .= ' Where ( id LIKE "%'.$_POST["search"]["value"].'%" ';

	$query .= 'OR monthyear LIKE "%'.$_POST["search"]["value"].'%"';
	
	$query .= 'OR monthyear_name LIKE "%'.$_POST["search"]["value"].'%" ) ';
	

	
	
}

$query.=' GROUP BY monthyear_name ';
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY '.$tbl.'.monthyear DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$c=1;
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();

	$month  = date('m', strtotime($row["monthyear"]));
	$year  = date('Y', strtotime($row["monthyear"]));

	$m = $month."-".$year;
 $aud_id= "'".$row['monthyear_name']."'";
	
	if($typ == 'Admin')
	{
		// $sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["huf_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row['huf_id'].' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>';


		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["monthyear_name"].'" class="updateAudit" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["monthyear_name"].'" class="deleteAll" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to Add Repost" id="'.$row["id"].'" class="saveCPReport" onclick="saveCPReport('.$aud_id.','.($audit_name1).')" ><i style="color:blue;" class="fa fa-pencil fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["monthyear_name"].'" class="updateAudit" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to Add Repost" id="'.$row["id"].'" class="saveCPReport" onclick="saveCPReport('.$aud_id.','.($audit_name1).')" ><i style="color:blue;" class="fa fa-pencil fa-fw"></i></a>';	
	}
	$sub_array[] = $c++;
	//$sub_array[]= date('m', strtotime($row["monthyear"]))."-".date('Y', strtotime($row["monthyear"]));


	$sub_array[]=$row["monthyear_name"];


	       
	

	$sub_array[] = $row["monthyear"];
	
	
	// $i = $row["id"];
	 

	 $q = "SELECT * FROM tbl_prescription_audit  WHERE  (month(monthyear) = '$month' AND year(monthyear) = '$year')";
	
	 $statement1 = $connection->prepare($q);
	 $statement1->execute();
	 $count = $statement1->rowCount();
	
	$sub_array[] = $count;
    // $sub_array[] = $row["created_by"];
	
	
	
	
	
	

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