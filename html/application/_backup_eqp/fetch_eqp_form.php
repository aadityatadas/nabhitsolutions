<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE eqp_brkdwn_date LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_type LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_idno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_srno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_model LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_make LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_dtpur LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_dtins LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR eqp_brkd LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY tbl_eqp_indic.eqp_id DESC ';
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
	$centid = $row["eqp_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["eqp_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["eqp_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	
	$sub_array[] = $row["eqp_id"];
	$sub_array[] = $row["eqp_brkdwn_date"];
	$sub_array[] = ucwords($row["eqp_name"]);
	$sub_array[] = $row["eqp_type"];
	// First Attachment
	$qry = mysqli_query($connect,"SELECT * FROM tbl_eqp_upld WHERE eqp_id = '$centid' AND eqp_srno = '1'")or die(mysqli_error($connect));
	$rs = mysqli_num_rows($qry);
	if($rs > 0)
	{
		$sub_array[] = '<a title="Click here to view photo" style="cursor:pointer;text-decoration:none;" data-href="view_eqp_rpt.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["eqp_idno"].'</b><br /><button class="btn btn-info btn-xs">View photo</button></a>';
	}else{
		$sub_array[] = '<a title="Click here to upload photo" style="cursor:pointer;text-decoration:none;" data-href="upd_eqp_rpt.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["eqp_idno"].'</b><br /><button class="btn btn-warning btn-xs">Upload photo</button></a>';
	}
	//
	$sub_array[] = $row["eqp_srno"];
	$sub_array[] = $row["eqp_model"];
	$sub_array[] = $row["eqp_make"];
	$sub_array[] = $row["eqp_dtpur"];
	// Second Attachment
	$qry = mysqli_query($connect,"SELECT * FROM tbl_eqp_upld WHERE eqp_id = '$centid' AND eqp_srno = '2'")or die(mysqli_error($connect));
	$rs = mysqli_num_rows($qry);
	if($rs > 0)
	{
		$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_eqp_rpt2.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["eqp_dtins"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
	}else{
		$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_eqp_rpt2.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["eqp_dtins"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
	}
	//
	$sub_array[] = $row["eqp_wty1"].' - '.$row["eqp_wty2"];
	// Attachment
	if($row["eqp_amcs"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_eqp_upld WHERE eqp_id = '$centid' AND eqp_srno = '3'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_eqp_rpt3.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["eqp_amcs"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_eqp_rpt3.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["eqp_amcs"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["eqp_amcs"];
	}
	$sub_array[] = $row["eqp_amc1"].' - '.$row["eqp_amc2"];
	$sub_array[] = $row["eqp_psch1"].' - '.$row["eqp_psch2"].' - '.$row["eqp_psch3"].' - '.$row["eqp_psch4"];
	// Fourth Attachment
	$qry = mysqli_query($connect,"SELECT * FROM tbl_eqp_upld WHERE eqp_id = '$centid' AND eqp_srno = '4'")or die(mysqli_error($connect));
	$rs = mysqli_num_rows($qry);
	if($rs > 0)
	{
		$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_eqp_rpt4.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["eqp_csch1"].' - '.$row["eqp_csch2"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
	}else{
		$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_eqp_rpt4.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["eqp_csch1"].' - '.$row["eqp_csch2"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
	}
	//
	$sub_array[] = $row["eqp_brkd"];
	$sub_array[] = $row["eqp_dtbr"].' '.$row["eqp_tmbr"];
	// Fourth Attachment
	$qry = mysqli_query($connect,"SELECT * FROM tbl_eqp_upld WHERE eqp_id = '$centid' AND eqp_srno = '5'")or die(mysqli_error($connect));
	$rs = mysqli_num_rows($qry);
	if($rs > 0)
	{
		$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_eqp_rpt5.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["eqp_dtrp"].' '.$row["eqp_tmrp"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
	}else{
		$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_eqp_rpt5.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["eqp_dtrp"].' '.$row["eqp_tmrp"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
	}
	//
	$sub_array[] = $row["eqp_cond"];
	// Attachment
	if($row["eqp_lic"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_eqp_upld WHERE eqp_id = '$centid' AND eqp_srno = '6'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_eqp_rpt6.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["eqp_lic"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_eqp_rpt6.php?rd='.$row["eqp_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["eqp_lic"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["eqp_lic"];
	}
	$sub_array[] = $row["eqp_recd"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records12(),
	"data"				=>	$data
);
echo json_encode($output);
?>