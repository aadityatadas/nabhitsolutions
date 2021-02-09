<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');

$monthname = $_POST['user_id'];

function get_total_all_data($connection,$user_id)
{
	
	$statement = $connection->prepare("SELECT * FROM tbl_medical_record_audit  WHERE monthyear_name='$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query .= "SELECT tbl_medical_record_audit.*,tbl_huf.huf_pname,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd FROM tbl_medical_record_audit
LEFT JOIN tbl_huf On tbl_medical_record_audit.huf_id= tbl_huf.huf_id WHERE tbl_medical_record_audit.monthyear_name='$monthname'";

if(isset($_POST["search"]["value"]))
{
	$query .= 'AND ( huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	
	
	$query .= 'OR huf_dddd LIKE "%'.$_POST["search"]["value"].'%" )';
	
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
		// $sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["huf_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row['huf_id'].' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>';
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;';	
	}
	$sub_array[] = $row["id"];
	$sub_array[] = $row["huf_pname"];
	
	$sub_array[] = $row["huf_ipd"];	

	$mon = mysqli_real_escape_string($connect,$row["monthyear"]);
    $mon1 = date('M-Y', strtotime($mon));

	$sub_array[] = $mon1;
	$sub_array[] = $row["mr_without_dis_summary"];
	$sub_array[] = $row["mr_having_incm_imp_const"];
$sub_array[] = $row["mr_without_sign_init_ass_sheet"];
$sub_array[] = $row["mr_without_sign_init_medictn_order"];
$sub_array[] = $row["mr_without_nursing_asst"];
$sub_array[] = $row["mr_without_nutrition_asst"];
$sub_array[] = $row["mr_without_physipy_asst"];
$sub_array[] = $row["post_anaesthesia_scroing_sign_anaesthist"];


	
	

	$sub_array[] = $row["created_by"];
	$sub_array[] = $row["updated_by"];
	
	$sub_array[] = $row["created_date"];

	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_data($connection,$monthname),
	"data"				=>	$data
);
echo json_encode($output);
?>