<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_need_pif ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE needp_sname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_dept LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_dttm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_typ_inj LIKE "%'.$_POST["search"]["value"].'%" ';	
	$query .= 'OR needp_mod_inj LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_usinj LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_inj_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_wh_inv LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_wh_prop LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_rep_to LIKE "%'.$_POST["search"]["value"].'%" ';	
	$query .= 'OR needp_rep_by LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR needp_tot_stf LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY needp_id DESC ';
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
	$centid = $row["needp_id"];
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["needp_id"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["needp_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	
	$sub_array[] = $row["needp_id"];
	$sub_array[] = $row["needp_sname"];
	$sub_array[] = $row["needp_dept"];
	$sub_array[] = $row["needp_dttm"];
	$sub_array[] = $row["needp_typ_inj"];
	$sub_array[] = $row["needp_mod_inj"];
	
	$sub_array[] = $row["needp_usinj"];
	$sub_array[] = $row["needp_inj_det"];
	if($row["needp_wh_inv"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_need_upld WHERE needp_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_needp_rpt.php?rd='.$row["needp_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["needp_wh_inv"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_needp_rpt.php?rd='.$row["needp_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["needp_wh_inv"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["needp_wh_inv"];
	}
	$sub_array[] = $row["needp_wh_prop"];
	$sub_array[] = $row["needp_rep_to"];
	$sub_array[] = $row["needp_rep_by"];
	// $sub_array[] = $row["needp_tot_stf"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records3(),
	"data"				=>	$data
);
echo json_encode($output);
?>