<?php
include('../dbinfo.php');
include('../function.php');
$query = '';
$output = array();
$query .= "SELECT tbl_huf.* , tbl_pharmcy_round_chcklst.* FROM tbl_huf LEFT JOIN tbl_pharmcy_round_chcklst ON tbl_huf.huf_id = tbl_pharmcy_round_chcklst.tbl_huf_id ";


// SELECT *
// FROM tbl_opdwttm
// LEFT JOIN tbl_lab_ipd ON tbl_opdwttm.opdwttm_id = tbl_lab_ipd.tbl_uhf_id
//  ORDER BY `opdwttm_id` DESC

// SELECT *
// FROM tbl_opdwttm
// LEFT JOIN tbl_lab_ipd ON     tbl_opdwttm.opdwttm_id = tbl_lab_ipd.tbl_uhf_id
//  ORDER BY `opdwttm_id` DESC
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR dep_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR date1 LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_dt_iuc LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_dt_ruc LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_tcd LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_sympt LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_sympt_det LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_ssc LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_spc LIKE "%'.$_POST["search"]["value"].'%" ';
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
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["huf_id"];
	// $sub_array[] = $row["lab_ipd_id"];

	
	$sub_array[] = $row["huf_pname"];
	//$sub_array[] = $row["huf_uhid"];
	
	

/*
		$dd_dt = $row["opdwttm_dttmr"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$sub_array[] = $get_date;*/
	// $sub_array[] = $row["vent_dt_iuc"];
	// $sub_array[] = $row["vent_dt_ruc"];

	// data from tbl_lab_ipd


// 	$sub_array[] = $row["lab_ipd_id"];

// $sub_array[] = $row["tbl_uhf_id"];

$sub_array[] =  $row['date1'];
$sub_array[] =  $row['time'];
$sub_array[] =  $row['dep_name'];
$sub_array[] =  $row['incidenc_of_medctin_err_yn'];
$sub_array[] =  $row['incidenc_of_medctin_err_rmrk'];
$sub_array[] =  $row['admsn_with_advrse_drug_rectn_yn'];
$sub_array[] =  $row['admsn_with_advrse_drug_rectn_rmrk'];
$sub_array[] =  $row['med_err_abbrvtn_yn'];
$sub_array[] =  $row['med_err_abbrvtn_rmrk'];
$sub_array[] =  $row['patnt_drug_evnt_yn'];
$sub_array[] =  $row['patnt_drug_evnt_rmrk'];
$sub_array[] =  $row['action_taken_yn'];
$sub_array[] =  $row['action_taken_rmrk'];
$sub_array[] =  $row['sign'];



	
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