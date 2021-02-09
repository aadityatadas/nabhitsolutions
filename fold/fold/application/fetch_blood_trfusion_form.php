<?php
error_reporting(0);
session_start();
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_blood_fusion LEFT JOIN tbl_huf ON tbl_blood_fusion.huf_id = tbl_huf.huf_id ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_prdreq LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_nounit LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_dtreq LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_tmreq LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_bankname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_ordby LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_dtrec LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_norec LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_tmrec LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_tat LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_recby LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_notrfus LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_trfusreact LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_waste LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_waste_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_recd LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY bld_id DESC ';
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
	$centid = $row["bld_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["bld_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["bld_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$sub_array[] = $row["bld_prdreq"];
	$sub_array[] = $row["bld_nounit"];
	$sub_array[] = $row["bld_dtreq"];
	$sub_array[] = $row["bld_tmreq"];
	$sub_array[] = $row["bld_bankname"];
	$sub_array[] = $row["bld_ordby"];
	$sub_array[] = $row["bld_dtrec"];
	$sub_array[] = $row["bld_norec"];
	$sub_array[] = $row["bld_tmrec"];
	$sub_array[] = $row["bld_tat"];
	$sub_array[] = $row["bld_recby"];
	$sub_array[] = $row["bld_notrfus"];
	// Other Reports
	if($row["bld_trfusreact"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_blood_upld WHERE blood_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_blood_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["bld_trfusreact"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_blood_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["bld_trfusreact"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["bld_trfusreact"];
	}
	//
	if($row["bld_waste"] == 'Yes'){
		$sub_array[] = $row["bld_waste"].' - '.$row["bld_waste_det"];
	}else{
		$sub_array[] = $row["bld_waste"];
	}
	$sub_array[] = $row["bld_recd"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records8(),
	"data"				=>	$data
);
echo json_encode($output);
?>