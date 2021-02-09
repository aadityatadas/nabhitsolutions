<?php
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_senti_det LEFT JOIN tbl_huf ON tbl_senti_det.huf_id = tbl_huf.huf_id ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_nm_surg_pl LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_nm_surg_dn LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_dt_surg_pl LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_dt_surg_dn LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_tp_ans_pl LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_tp_ans_gv LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_resch_surg_dn LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_resch_surg_dn_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_unpl_ret_ot LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_unpl_ret_ot_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_prf_topvev LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_appr_propantb LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_chng_surg_pl_int LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_rexpl LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_pacdn LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_mod_anspl LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_mod_anspl_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_unp_vent_aft_ans LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_dth_rel_ans LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_any_adv_ans_evt LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR senti_any_adv_surg_evt LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY senti_det_id DESC ';
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
	$centid = $row["senti_det_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["senti_det_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["senti_det_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$sub_array[] = $row["senti_nm_surg_pl"];
	$sub_array[] = $row["senti_nm_surg_dn"];
	$sub_array[] = $row["senti_dt_surg_pl"];
	$sub_array[] = $row["senti_dt_surg_dn"];
	$sub_array[] = $row["senti_tp_ans_pl"];
	$sub_array[] = $row["senti_tp_ans_gv"];
	if($row["senti_resch_surg_dn"] == 'Yes'){
		$sub_array[] = $row["senti_resch_surg_dn"].' - '.$row["senti_resch_surg_dn_det"];
	}else{
		$sub_array[] = $row["senti_resch_surg_dn"];
	}
	//
	if($row["senti_unpl_ret_ot"] == 'Yes'){
		$sub_array[] = $row["senti_unpl_ret_ot"].' - '.$row["senti_unpl_ret_ot_det"];
	}else{
		$sub_array[] = $row["senti_unpl_ret_ot"];
	}
	$sub_array[] = $row["senti_prf_topvev"];
	$sub_array[] = $row["senti_appr_propantb"];
	$sub_array[] = $row["senti_chng_surg_pl_int"];
	if($row["senti_rexpl"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld WHERE senti_id = '$centid' AND senti_srno = '1'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["senti_rexpl"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["senti_rexpl"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["senti_rexpl"];
	}
	$sub_array[] = $row["senti_pacdn"];
	if($row["senti_mod_anspl"] == 'Yes'){
		$sub_array[] = $row["senti_mod_anspl"].' - '.$row["senti_mod_anspl_det"];
	}else{
		$sub_array[] = $row["senti_mod_anspl"];
	}
	// Other Reports
	$sub_array[] = $row["senti_unp_vent_aft_ans"];
	if($row["senti_dth_rel_ans"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld WHERE senti_id = '$centid' AND senti_srno = '2'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt2.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row["senti_dth_rel_ans"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt2.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row["senti_dth_rel_ans"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["senti_dth_rel_ans"];
	}
	if($row["senti_any_adv_ans_evt"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld WHERE senti_id = '$centid' AND senti_srno = '3'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt3.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row["senti_any_adv_ans_evt"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt3.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row["senti_any_adv_ans_evt"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["senti_any_adv_ans_evt"];
	}
	if($row["senti_any_adv_surg_evt"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld WHERE senti_id = '$centid' AND senti_srno = '4'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt4.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row["senti_any_adv_surg_evt"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt4.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row["senti_any_adv_surg_evt"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["senti_any_adv_surg_evt"];
	}
	$sub_array[] = $row["senti_recd"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records7(),
	"data"				=>	$data
);
echo json_encode($output);
?>