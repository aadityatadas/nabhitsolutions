<?php
error_reporting(0);
session_start();
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_opdwttm ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE opdwttm_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_opd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_drsp LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_dttmr LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_dttmds LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_opdwttm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_recd LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY opdwttm_id DESC ';
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
	//$sub_array[] = $image;
	$qry = "SELECT opd_charges FROM tbl_opd_receipt WHERE tbl_opdwttm_id = '".$row["opdwttm_id"]."' ";
		$res = mysqli_query($connect, $qry);
		$row1=mysqli_fetch_array($res);
		
	if($row1["opd_charges"]){
			$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["opdwttm_id"].'" class="update" ><i style="color:2b6a9f;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["opdwttm_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to print receipt" href="receipts/opd_receipt_print.php?opdwttm_id='.md5($row["opdwttm_id"]).'" target="_blank" class="print_btn" ><i style="color:green;" class="fa fa-print fa-fw"></i></a>';

	} else {
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["opdwttm_id"].'" class="update" ><i style="color:2b6a9f;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["opdwttm_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';

	}

	$sub_array[] = $row["opdwttm_id"];
	$sub_array[] = $row["opdwttm_pname"];
	$sub_array[] = $row["opdwttm_uhid"];
	$sub_array[] = $row["opdwttm_opd"];
	$sub_array[] = $row["opdwttm_drsp"];
	$sub_array[] = $row["opdwttm_dttmr"];
	$sub_array[] = $row["opdwttm_dttmds"];
	$sub_array[] = ($row["opdwttm_opdwttm"]);
	
		if($row1["opd_charges"]){ $sub_array[] = "Rs. ".$row1["opd_charges"];}
		else { $sub_array[] = $row1["opd_charges"];}
	$sub_array[] = $row["opdwttm_recd"];
	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_opd(),
	"data"				=>	$data
);
echo json_encode($output);
?>