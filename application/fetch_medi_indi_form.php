<?php
error_reporting(0);
session_start();
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_medi_indi.huf_id = tbl_huf.huf_id ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dadm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dddd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_mlc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_mrdav LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_mrdfile LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_mrddissum LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_mrdicd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_mrdimpcons LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_mediord LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_handsheet_dr LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_handsheet_nur LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_planofcare LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_mrd_screen LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_mrd_nur_careplan LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR medi_recd LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY medi_id DESC ';
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
	$centid = $row["medi_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["medi_id"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["medi_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$sub_array[] = $row["huf_dadm"];
	$sub_array[] = $row["huf_dddd"];
	$sub_array[] = $row["huf_mlc"];
	$sub_array[] = $row["medi_mrdav"];
	$sub_array[] = $row["medi_mrdfile"];
	$sub_array[] = $row["medi_mrddissum"];
	$sub_array[] = $row["medi_mrdicd"];
	$sub_array[] = $row["medi_mrdimpcons"];
	$sub_array[] = $row["medi_mediord"];
	$sub_array[] = $row["medi_handsheet_dr"];
	$sub_array[] = $row["medi_handsheet_nur"];
	$sub_array[] = $row["medi_planofcare"];
	$sub_array[] = $row["medi_mrd_screen"];
	$sub_array[] = $row["medi_mrd_nur_careplan"];
	$sub_array[] = $row["medi_recd"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records10(),
	"data"				=>	$data
);
echo json_encode($output);
?>