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
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["senti_det_id"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["senti_det_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$filtered_rows1 = 0;
	 if($row["senti_det_id"] != '')
    {
    	$num = '1) ';
    	$query1 = "SELECT * FROM tbl_senti_det_addon WHERE tbl_senti_det_id = '".$row["senti_det_id"]."'";
		$statement1 = $connection->prepare($query1);
		$statement1->execute();
		$result1 = $statement1->fetchAll();
		$data1 = array();
		$filtered_rows1 = $statement1->rowCount();
    }
    else
    {
    	$num = '';
    }
	$senti_nm_surg_pl 		= $num.$row["senti_nm_surg_pl"];
	$senti_nm_surg_dn 		= $num.$row["senti_nm_surg_dn"];
	$senti_dt_surg_pl     	= $num.$row["senti_dt_surg_pl"];
	$senti_dt_surg_dn 	  	= $num.$row["senti_dt_surg_dn"];
	$senti_tp_ans_pl      	= $num.$row["senti_tp_ans_pl"];
	$senti_tp_ans_gv      	= $num.$row["senti_tp_ans_gv"];
	if($row["senti_resch_surg_dn"] == 'Yes'){
			$senti_resch_surg_dn = $num.$row["senti_resch_surg_dn"].' - '.$row["senti_resch_surg_dn_det"];
		}else{
			$senti_resch_surg_dn = $num.$row["senti_resch_surg_dn"];
		}
	if($row["senti_unpl_ret_ot"] == 'Yes'){
				$senti_unpl_ret_ot = $num.$row["senti_unpl_ret_ot"].' - '.$row["senti_unpl_ret_ot_det"];
			}else{
				$senti_unpl_ret_ot = $num.$row["senti_unpl_ret_ot"];
			}
	$senti_prf_topvev 		= $num.$row["senti_prf_topvev"];
	$senti_appr_propantb 	= $num.$row["senti_appr_propantb"];
	$senti_chng_surg_pl_int = $num.$row["senti_chng_surg_pl_int"];

	if($row["senti_rexpl"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld WHERE senti_id = '$centid' AND senti_srno = '1'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$senti_rexpl =  $num.'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["senti_rexpl"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$senti_rexpl =  $num.'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["senti_rexpl"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$senti_rexpl = $num.$row["senti_rexpl"];
	}
	$senti_pacdn     = $num.$row["senti_pacdn"];
	
	if($row["senti_mod_anspl"] == 'Yes'){
		$senti_mod_anspl = $num.$row["senti_mod_anspl"].' - '.$row["senti_mod_anspl_det"];
	}else{
		$senti_mod_anspl = $num.$row["senti_mod_anspl"];
	}
	$senti_unp_vent_aft_ans = $num.$row["senti_unp_vent_aft_ans"];
	if($row["senti_dth_rel_ans"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld WHERE senti_id = '$centid' AND senti_srno = '2'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$senti_dth_rel_ans = $num.'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt2.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row["senti_dth_rel_ans"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$senti_dth_rel_ans = $num.'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt2.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row["senti_dth_rel_ans"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$senti_dth_rel_ans = $num.$row["senti_dth_rel_ans"];
	}
	if($row["senti_any_adv_ans_evt"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld WHERE senti_id = '$centid' AND senti_srno = '3'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$senti_any_adv_ans_evt = $num.'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt3.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row["senti_any_adv_ans_evt"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$senti_any_adv_ans_evt = $num.'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt3.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row["senti_any_adv_ans_evt"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$senti_any_adv_ans_evt = $num.$row["senti_any_adv_ans_evt"];
	}

	if($row["senti_any_adv_surg_evt"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld WHERE senti_id = '$centid' AND senti_srno = '4'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$senti_any_adv_surg_evt = $num.'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt4.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row["senti_any_adv_surg_evt"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$senti_any_adv_surg_evt = $num.'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt4.php?rd='.$row["senti_det_id"].'" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row["senti_any_adv_surg_evt"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$senti_any_adv_surg_evt = $num.$row["senti_any_adv_surg_evt"];
	}
	$senti_recd = $num.$row["senti_recd"];


	 $rcount = 2;
	if($filtered_rows1 > 0)
	{
		foreach($result1 as $row1)
		{
			$num = ',<br>'.$rcount.') ';
			$sentid = $row1["senti_det_addon_id"];
			$senti_nm_surg_pl     .= $num.$row1["senti_nm_surg_pl"];
			$senti_nm_surg_dn     .= $num.$row1["senti_nm_surg_dn"];
			$senti_dt_surg_pl     .= $num.$row1["senti_dt_surg_pl"];
			$senti_dt_surg_dn 	  .= $num.$row1["senti_dt_surg_dn"];
			$senti_tp_ans_pl      .= $num.$row1["senti_tp_ans_pl"];
			$senti_tp_ans_gv      .= $num.$row1["senti_tp_ans_gv"];
			if($row1["senti_resch_surg_dn"] == 'Yes'){
				$senti_resch_surg_dn .= $num.$row1["senti_resch_surg_dn"].' - '.$row1["senti_resch_surg_dn_det"];
			}else{
				$senti_resch_surg_dn .= $num.$row1["senti_resch_surg_dn"];
			}
			if($row1["senti_unpl_ret_ot"] == 'Yes'){
				$senti_unpl_ret_ot .= $num.$row1["senti_unpl_ret_ot"].' - '.$row1["senti_unpl_ret_ot_det"];
			}else{
				$senti_unpl_ret_ot .= $num.$row1["senti_unpl_ret_ot"];
			}
			$senti_prf_topvev 		.= $num.$row1["senti_prf_topvev"];
			$senti_appr_propantb 	.= $num.$row1["senti_appr_propantb"];
			$senti_chng_surg_pl_int .= $num.$row1["senti_chng_surg_pl_int"];
			if($row1["senti_rexpl"] == 'Yes'){
				$qry2 = mysqli_query($connect,"SELECT * FROM tbl_senti_upld2 WHERE senti_det_addon_id = '$sentid' AND senti_srno = '1'")or die(mysqli_error($connect));
				$rs2 = mysqli_num_rows($qry2);
				if($rs2 > 0)
				{
					$senti_rexpl .=  $num.'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt11.php?rd='.$row1["senti_det_addon_id"].'&&senti_srno=1" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row1["senti_rexpl"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
				}else{
					$senti_rexpl .=  $num.'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt11.php?rd='.$row1["senti_det_addon_id"].'&&senti_srno=1" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row1["senti_rexpl"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
				}
			}else{
				$senti_rexpl .= $num.$row1["senti_rexpl"];
			}
			$senti_pacdn     .= $num.$row1["senti_pacdn"];
			if($row1["senti_mod_anspl"] == 'Yes'){
				$senti_mod_anspl .= $num.$row1["senti_mod_anspl"].' - '.$row1["senti_mod_anspl_det"];
			}else{
				$senti_mod_anspl .= $num.$row1["senti_mod_anspl"];
			}
			$senti_unp_vent_aft_ans .= $num.$row1["senti_unp_vent_aft_ans"];
			if($row1["senti_dth_rel_ans"] == 'Yes'){
				$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld2 WHERE senti_det_addon_id = '$sentid' AND senti_srno = '2'")or die(mysqli_error($connect));
				$rs = mysqli_num_rows($qry);
				if($rs > 0)
				{
					$senti_dth_rel_ans .= $num.'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt11.php?rd='.$row1["senti_det_addon_id"].'&&senti_srno=2" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row1["senti_dth_rel_ans"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
				}else{
					$senti_dth_rel_ans .= $num.'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt11.php?rd='.$row1["senti_det_addon_id"].'&&senti_srno=2" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row1["senti_dth_rel_ans"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
				}
			}else{
				$senti_dth_rel_ans .= $num.$row1["senti_dth_rel_ans"];
			}
			if($row1["senti_any_adv_ans_evt"] == 'Yes'){
				$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld2 WHERE senti_det_addon_id = '$sentid' AND senti_srno = '3'")or die(mysqli_error($connect));
				$rs = mysqli_num_rows($qry);
				if($rs > 0)
				{
					$senti_any_adv_ans_evt .= $num.'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt11.php?rd='.$row1["senti_det_addon_id"].'&&senti_srno=3" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row1["senti_any_adv_ans_evt"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
				}else{
					$senti_any_adv_ans_evt .= $num.'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt11.php?rd='.$row1["senti_det_addon_id"].'&&senti_srno=3" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row1["senti_any_adv_ans_evt"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
				}
			}else{
				$senti_any_adv_ans_evt .= $num.$row1["senti_any_adv_ans_evt"];
			}
			if($row1["senti_any_adv_surg_evt"] == 'Yes'){
				$qry = mysqli_query($connect,"SELECT * FROM tbl_senti_upld2 WHERE senti_det_addon_id = '$sentid' AND senti_srno = '4'")or die(mysqli_error($connect));
				$rs = mysqli_num_rows($qry);
				if($rs > 0)
				{
					$senti_any_adv_surg_evt .= $num.'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_senti_rpt11.php?rd='.$row1["senti_det_addon_id"].'&&senti_srno=4" data-target="_blank" class="edit_rpt3"><b style="color:green;">'.$row1["senti_any_adv_surg_evt"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
				}else{
					$senti_any_adv_surg_evt .= $num.'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_senti_rpt11.php?rd='.$row1["senti_det_addon_id"].'&&senti_srno=4" data-target="_blank" class="edit_rpt4"><b style="color:blue;">'.$row1["senti_any_adv_surg_evt"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
				}
			}else{
				$senti_any_adv_surg_evt .= $num.$row1["senti_any_adv_surg_evt"];
			}
			$senti_recd .= $num.$row1["senti_recd"];
			
			$rcount++;
		}
	}
	$sub_array[] = $senti_nm_surg_pl;
	$sub_array[] = $senti_nm_surg_dn;
	$sub_array[] = $senti_dt_surg_pl;
	$sub_array[] = $senti_dt_surg_dn;
	$sub_array[] = $senti_tp_ans_pl;
	$sub_array[] = $senti_tp_ans_gv;
	$sub_array[] = $senti_resch_surg_dn;
	$sub_array[] = $senti_unpl_ret_ot;
	$sub_array[] = $senti_prf_topvev;
	$sub_array[] = $senti_appr_propantb;
	$sub_array[] = $senti_chng_surg_pl_int;
	$sub_array[] = $senti_rexpl;
	$sub_array[] = $senti_pacdn;
	$sub_array[] = $senti_mod_anspl;
	// Other Reports
	$sub_array[] = $senti_unp_vent_aft_ans;
	$sub_array[] = $senti_dth_rel_ans;
	$sub_array[] = $senti_any_adv_ans_evt;
	$sub_array[] = $senti_any_adv_surg_evt;
	
	$sub_array[] = $senti_recd;
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