<?php
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT tbl_huf.* , tbl_icu_register_ipd.* FROM tbl_huf LEFT JOIN tbl_icu_register_ipd ON tbl_huf.huf_id = tbl_icu_register_ipd.tbl_huf_id ";





// SELECT *
// FROM tbl_huf
// LEFT JOIN tbl_lab_ipd ON tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id
//  ORDER BY `huf_id` DESC

// SELECT *
// FROM tbl_huf
// LEFT JOIN tbl_lab_ipd ON     tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id
//  ORDER BY `huf_id` DESC
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	
	$query .= 'OR vent_dt_iuc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_dt_ruc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_tcd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_sympt LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_sympt_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_ssc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_spc LIKE "%'.$_POST["search"]["value"].'%" ';
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
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];

	$filtered_rows1 = 0;
    if($row["icu_register_ipd_id"] != '')
    {
    	$num = '1) ';
    	$query1 = "SELECT * FROM tbl_icu_ipd2 WHERE icu_register_ipd_id = '".$row["icu_register_ipd_id"]."'";
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

    $date_of_admison_in_icu		= $num.$row["date_of_admison_in_icu"];
	$time_of_admison_in_icu		= $num.$row["time_of_admison_in_icu"];
	$date_of_disc_trans_in_icu	= $num.$row["date_of_disc_trans_in_icu"];
	$time_of_disc_trans_in_icu	= $num.$row["time_of_disc_trans_in_icu"];
	$date_of_return_in_icu		= $num.$row["date_of_return_in_icu"];
	$time_of_return_in_icu		= $num.$row["time_of_return_in_icu"];
	$retrn_to_icu_in_48hrs		= $num.$row["retrn_to_icu_in_48hrs"];
	$re_admission				= $num.$row["re_admission"];
	$re_intubation				= $num.$row["re_intubation"];
	$sign						= $num.$row["sign"];

	$rcount = 2;
	if($filtered_rows1 > 0)
	{
		foreach($result1 as $row1)
		{
			$num = ',<br>'.$rcount.') ';

			$date_of_admison_in_icu		.= $num.$row1["date_of_admison_in_icu"];
			$time_of_admison_in_icu		.= $num.$row1["time_of_admison_in_icu"];
			$date_of_disc_trans_in_icu	.= $num.$row1["date_of_disc_trans_in_icu"];
			$time_of_disc_trans_in_icu	.= $num.$row1["time_of_disc_trans_in_icu"];
			$date_of_return_in_icu		.= $num.$row1["date_of_return_in_icu"];
			$time_of_return_in_icu		.= $num.$row1["time_of_return_in_icu"];
			$retrn_to_icu_in_48hrs		.= $num.$row1["retrn_to_icu_in_48hrs"];
			$re_admission				.= $num.$row1["re_admission"];
			$re_intubation				.= $num.$row1["re_intubation"];
			$sign						.= $num.$row1["sign"];

			$rcount++;
		}
	}
	
	$sub_array[] = $date_of_admison_in_icu;
    $sub_array[] = $time_of_admison_in_icu;            
    $sub_array[] = $date_of_disc_trans_in_icu;            
    $sub_array[] = $time_of_disc_trans_in_icu;            
    $sub_array[] = $date_of_return_in_icu;            
    $sub_array[] = $time_of_return_in_icu;            
    $sub_array[] = $retrn_to_icu_in_48hrs;           
    $sub_array[] = $re_admission;           
    $sub_array[] = $re_intubation;           
    $sub_array[] = $sign;             



	
	
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