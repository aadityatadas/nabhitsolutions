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
// $query .= "SELECT  DISTINCT * FROM $tbl
// ";


$user_id=$_POST['user_id'];


$query .="SELECT * from $tbl LEFT JOIN tbl_hr_mast 
on tbl_hr_mast.hrid = $tbl.hrid_id 
where $tbl.tbl_hr_audit_date_id= '$user_id' ";



if(isset($_POST["search"]["value"]))
{
	$query .= 'AND ( hrid LIKE "%'.$_POST["search"]["value"].'%" ';
	
	$query .= 'OR hr_staff LIKE "%'.$_POST["search"]["value"].'%" ';
	
	
	$query .= 'OR hr_empcode LIKE "%'.$_POST["search"]["value"].'%" ';

	$query .= 'OR hr_dept LIKE "%'.$_POST["search"]["value"].'%" )';

	
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY '.$tbl.'.id DESC ';
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


		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["id"].'" class="delete1" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row['id'].' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>';	
	}
	$sub_array[] = $row["id"];
	$sub_array[] = $row["audit_date"];
	$sub_array[] = $row["hr_staff"];
	$sub_array[] = $row["hr_empcode"];
	$sub_array[] = '<b>'.ucfirst($row["hr_dept"]).'</b>';
	
$sub_array[] = $row['emp_app_form'];
$sub_array[] = $row['interview_ass_sheet'];
$sub_array[] = $row['resume_bio_cv'];
$sub_array[] = $row['pre_emp_chkup'];
$sub_array[] = $row['indetify_proof_documnt'];
$sub_array[] = $row['offer_letter'];
$sub_array[] = $row['appoint_letter'];
$sub_array[] = $row['cpy_of_prof'];
$sub_array[] = $row['exp_reliving_serv_sal_cert'];
$sub_array[] = $row['job_disc_job_spec'];
$sub_array[] = $row['cread_report'];
$sub_array[] = $row['priv_report'];
$sub_array[] = $row['traning_record'];
$sub_array[] = $row['vaccination_record'];
$sub_array[] = $row['annual_checkup'];
$sub_array[] = $row['perf_appraisal'];
$sub_array[] = $row['dis_coun'];
$sub_array[] = $row['bacground_ver'];
$sub_array[] = $row['exit_interview'];
$sub_array[] = $row['other_record'];

	

	
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