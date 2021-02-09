<?php
include('../dbinfo.php');
include('../function.php');
$query = '';
$output = array();
$query .= "SELECT tbl_huf.* , tbl_active_file_audit.* FROM tbl_huf LEFT JOIN tbl_active_file_audit ON tbl_huf.huf_id = tbl_active_file_audit.tbl_huf_id ";


// SELECT *
// FROM tbl_huf
// LEFT JOIN tbl_active_file_audit ON tbl_huf.huf_id = tbl_active_file_audit.tbl_uhf_id
//  ORDER BY `huf_id` DESC

// SELECT *
// FROM tbl_huf
// LEFT JOIN tbl_active_file_audit ON     tbl_huf.huf_id = tbl_active_file_audit.tbl_uhf_id
//  ORDER BY `huf_id` DESC
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dadm LIKE "%'.$_POST["search"]["value"].'%" ';
	
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY `huf_id` DESC ';
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
	$centid = $row["huf_id"];
	$sub_array = array();
	  if($row["tbl_huf_id"]) {
                   $sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>'." " .'<a style="cursor:pointer;" title="Click here to view" id="'.$row["tbl_huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-eye"></i></a>';
              } else {
                    $sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';
              }
	
  

  
	$sub_array[] = $row["huf_id"];
	// $sub_array[] = $row["lab_ipd_id"];

	
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$sub_array[] = $row["huf_dadm"];
	// $sub_array[] = $row["vent_dt_iuc"];
	// $sub_array[] = $row["vent_dt_ruc"];

	// data from tbl_active_file_audit


    // 	$sub_array[] = $row["lab_ipd_id"];

   // $sub_array[] = $row["tbl_uhf_id"];




	
	//$tcd = $row["vent_tcd"];
	//$tcd1 = $tcd / 24;
	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>