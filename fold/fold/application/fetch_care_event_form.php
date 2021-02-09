<?php
error_reporting(0);
session_start();
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_care_evt LEFT JOIN tbl_huf ON tbl_care_evt.huf_id = tbl_huf.huf_id ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_dtpli LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_tmpli LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_vipsc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsymp LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsymp_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsymp_th LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsymp_th_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_bradsc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsyp_bed LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsyp_bed_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_mor_sc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_incd_ptfall LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_incd_ptfall_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_iardl LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_iardl_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_injtpt LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_injtpt_det LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY care_id DESC ';
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
	$centid = $row["care_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["care_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["care_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$sub_array[] = $row["care_dtpli"];
	$sub_array[] = $row["care_tmpli"];
	$sub_array[] = $row["care_vipsc"];
	if($row["care_signsymp"] == 'Yes'){
		$sub_array[] = $row["care_signsymp"].' - '.$row["care_signsymp_det"];
	}else{
		$sub_array[] = $row["care_signsymp"];
	}
	//
	if($row["care_signsymp_th"] == 'Yes'){
		$sub_array[] = $row["care_signsymp_th"].' - '.$row["care_signsymp_th_det"];
	}else{
		$sub_array[] = $row["care_signsymp_th"];
	}
	$sub_array[] = $row["care_bradsc"];
	//
	if($row["care_signsyp_bed"] == 'Yes'){
		$sub_array[] = $row["care_signsyp_bed"].' - '.$row["care_signsyp_bed_det"];
	}else{
		$sub_array[] = $row["care_signsyp_bed"];
	}//
	$sub_array[] = $row["care_mor_sc"];
	if($row["care_incd_ptfall"] == 'Yes'){
		$sub_array[] = $row["care_incd_ptfall"].' - '.$row["care_incd_ptfall_det"];
	}else{
		$sub_array[] = $row["care_incd_ptfall"];
	}
	//
	if($row["care_iardl"] == 'Yes'){
		$sub_array[] = $row["care_iardl"].' - '.$row["care_iardl_det"];
	}else{
		$sub_array[] = $row["care_iardl"];
	}
	//
	if($row["care_injtpt"] == 'Yes'){
		$sub_array[] = $row["care_injtpt"].' - '.$row["care_injtpt_det"];
	}else{
		$sub_array[] = $row["care_injtpt"];
	}
	$sub_array[] = $row["care_recd"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records9(),
	"data"				=>	$data
);
echo json_encode($output);
?>