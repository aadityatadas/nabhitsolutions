<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
$tbl_quaterly_audit_details_id=$_POST['user_id'];
function get_total_all_data($connection,$tbl_quaterly_audit_details_id)
{
	
	$statement = $connection->prepare("SELECT * FROM tbl_death_audit  WHERE tbl_quaterly_audit_details_id=".$tbl_quaterly_audit_details_id);
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query .= "SELECT tbl_death_audit.*,tbl_huf.huf_pname,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd,tbl_huf.huf_tddd FROM tbl_death_audit
LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$tbl_quaterly_audit_details_id;

if(isset($_POST["search"]["value"]))
{
	$query .= ' AND (huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	
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
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;';	
	}
	$sub_array[] = $row["id"];
	$sub_array[] = $row["huf_pname"];
	
	$sub_array[] = $row["huf_ipd"];	
	
	$sub_array[] = $row["huf_dddd"]." ".$row["huf_tddd"];
	$sub_array[] = $row["huf_ddd"];
	
	$sub_array[] = $row['condition_at_admsion'];
$sub_array[] = $row['primary_diagn'];
$sub_array[] = $row['cause_of_death'];
$sub_array[] = $row['date_death']." ".$row['time_death'];

$sub_array[] = $row['expected_un_death'];
$sub_array[] = $row['apache_score'];
$sub_array[] = $row['sofa_score'];
$sub_array[] = $row['vent_status'];
$sub_array[] = $row['surg_prodr'];
$sub_array[] = $row['any_event'];
$sub_array[] = $row['cons_incharge'];
$sub_array[] = $row['other_con_involve'];
$sub_array[] = $row['comorbid_condtin'];
$sub_array[] = $row['relavant_lab_invt'];
$sub_array[] = $row['relavant_radio_invt'];
$sub_array[] = $row['cpr_status'];
$sub_array[] = $row['condition_of_stay_mangnmt'];

$sub_array[] = $row['team_work'];
$sub_array[] = $row['technq_mang_care'];
$sub_array[] = $row['med_error'];
$sub_array[] = $row['decisn_making'];
$sub_array[] = $row['staff_skill_comp'];
$sub_array[] = $row['comm_error'];
$sub_array[] = $row['eco_fact_patient'];



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