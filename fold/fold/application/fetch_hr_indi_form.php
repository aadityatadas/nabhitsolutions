<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hr_id = tbl_hr_indic.hrid ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE tbl_hr_mast.hr_staff LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_mast.hr_empcode LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_mast.hr_desig LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_mast.hr_dept LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_mast.hr_datej LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_mast.hr_ctstat LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_mast.hr_ctstat_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_absent LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_satis_score LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_occpany LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_need_inj LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_tottrain LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_perf_score LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_per_file LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_health_chk LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_griv LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_immune LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tbl_hr_indic.hr_recd LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY tbl_hr_indic.hr_id DESC ';
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
	$centid = $row["hr_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["hr_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["hr_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	
	$sub_array[] = $row["hr_id"];
	$sub_array[] = ucwords($row["hr_staff"]);
	$sub_array[] = $row["hr_empcode"];
	$sub_array[] = ucwords($row["hr_desig"]);
	$sub_array[] = strtoupper($row["hr_dept"]);
	$sub_array[] = $row["hr_datej"];
	if($row["hr_ctstat"] == 'Resigned'){
		$sub_array[] = $row["hr_ctstat"].' - '.$row["hr_ctstat_det"];
	}else{
		$sub_array[] = $row["hr_ctstat"];
	}
	$sub_array[] = $row["hr_absent"];
	$sub_array[] = $row["hr_satis_score"];
	// First Attachment
	if($row["hr_occpany"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_hr_upld WHERE hr_id = '$centid' AND hr_srno = '1'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_hr_rpt.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["hr_occpany"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_hr_rpt.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["hr_occpany"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["hr_occpany"];
	}
	// Second Attachment
	if($row["hr_need_inj"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_hr_upld WHERE hr_id = '$centid' AND hr_srno = '2'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_hr_rpt2.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["hr_need_inj"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_hr_rpt2.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["hr_need_inj"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["hr_need_inj"];
	}
	$sub_array[] = $row["hr_tottrain"];
	$sub_array[] = $row["hr_perf_score"];
	$sub_array[] = $row["hr_per_file"];
	// Third Attachment
	if($row["hr_health_chk"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_hr_upld WHERE hr_id = '$centid' AND hr_srno = '3'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_hr_rpt3.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["hr_health_chk"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_hr_rpt3.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["hr_health_chk"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["hr_health_chk"];
	}
	// Fourth Attachment
	if($row["hr_griv"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_hr_upld WHERE hr_id = '$centid' AND hr_srno = '4'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_hr_rpt4.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["hr_griv"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_hr_rpt4.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["hr_griv"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["hr_griv"];
	}
	// Fifth Attachment
	if($row["hr_immune"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_hr_upld WHERE hr_id = '$centid' AND hr_srno = '5'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_hr_rpt5.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["hr_griv"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_hr_rpt5.php?rd='.$row["hr_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["hr_griv"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["hr_immune"];
	}
	$sub_array[] = $row["hr_recd"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records11(),
	"data"				=>	$data
);
echo json_encode($output);
?>