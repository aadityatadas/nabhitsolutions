<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
$tbl_quaterly_audit_details_id=$_POST['user_id'];
function get_total_all_data($connection,$tbl_quaterly_audit_details_id)
{
	
	$statement = $connection->prepare("SELECT * FROM tbl_antibiotic_audit WHERE tbl_quaterly_audit_details_id=".$tbl_quaterly_audit_details_id);
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query .= "SELECT tbl_antibiotic_audit.*,tbl_huf.huf_pname,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd,tbl_huf.huf_dadm,tbl_huf.huf_lens FROM tbl_antibiotic_audit
LEFT JOIN tbl_huf On tbl_antibiotic_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$tbl_quaterly_audit_details_id;
if(isset($_POST["search"]["value"]))
{
	$query .= ' AND (huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	
	
	$query .= 'OR huf_dddd LIKE "%'.$_POST["search"]["value"].'%") ';
	
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
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;';	
	}
	$sub_array[] = $row["id"];
	$sub_array[] = $row["huf_pname"];
	
	$sub_array[] = $row["huf_ipd"];	
	$sub_array[] = $row["huf_dadm"];
	$sub_array[] = $row["huf_dddd"];
	
	


	$sub_array[] = $row["huf_lens"];
	$sub_array[] = $row["huf_ddd"];
	
	$sub_array[] = $row['diagnosis'];
$sub_array[] = $row['prim_consultatnt'];
$sub_array[] = $row['sec_consultant'];
$sub_array[] = $row['infection_if_any'];
$sub_array[] = $row['cat_name'];
$sub_array[] = $row['single_mix'];
$sub_array[] = $row['dose'];
$sub_array[] = $row['max_dose_daily'];
$sub_array[] = $row['route'];
$sub_array[] = $row['freq'];
$sub_array[] = $row['duration'];
$sub_array[] = $row['indic_use'];
$sub_array[] = $row['any_justfctin'];
$sub_array[] = $row['indicated_nonin'];
$sub_array[] = $row['adherence_non'];
$sub_array[] = $row['full_adhrence'];
$sub_array[] = $row['complinat_non_comp_ass'];
$sub_array[] = $row['per_complinat_non_comp_ass'];


	$sub_array[] = $row["created_by"];
	$sub_array[] = $row["updated_by"];
	
	$sub_array[] = $row["created"];

	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_data($connection,$tbl_quaterly_audit_details_id),
	"data"				=>	$data
);
echo json_encode($output);
?>