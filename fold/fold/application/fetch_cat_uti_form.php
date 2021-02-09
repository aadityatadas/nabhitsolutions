<?php
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_huf ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dadm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cath_uti_iuc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cath_uti_ruc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cath_uti_tcd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cath_uti_symp LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cath_uti_symp_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cath_uti_ssc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cath_uti_spc LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY huf_id DESC ';
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
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$sub_array[] = $row["huf_dadm"];
	$sub_array[] = $row["cath_uti_iuc"];
	$sub_array[] = $row["cath_uti_ruc"];
	$sub_array[] = $row["cath_uti_tcd"];
	// Other Reports
	if($row["cath_uti_symp"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_cath_uti_upld WHERE cath_uti_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_cat_uti_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["cath_uti_symp"].'</b><br /><button class="btn btn-info btn-xs">View</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_cat_uti_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["cath_uti_symp"].'</b><br /><button class="btn btn-warning btn-xs">Upload</button></a>';
		}
	}else{
		$sub_array[] = $row["cath_uti_symp"];
	}
	$sub_array[] = $row["cath_uti_symp_det"];
	$sub_array[] = $row["cath_uti_ssc"];
	// Culture Report
	if($row["cath_uti_spc"] == 'Yes'){
		$qry2 = mysqli_query($connect,"SELECT * FROM tbl_cath_uti_upld2 WHERE cath_uti_id = '$centid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_cath_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["cath_uti_spc"].'</b><br /><button class="btn btn-info btn-xs">View</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_cath_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["cath_uti_spc"].'</b><br /><button class="btn btn-warning btn-xs">Upload</button></a>';
		}
	}else{
		$sub_array[] = $row["cath_uti_spc"];
	}
	$sub_array[] = $row["cath_uti_recd"];
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