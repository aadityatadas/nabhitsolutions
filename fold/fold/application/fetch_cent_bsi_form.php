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
	$query .= 'OR cent_bs_dticlc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cent_bs_dtrclc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cent_bs_tcld LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cent_bs_symp_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cent_bs_ssc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cent_bs_clabsi LIKE "%'.$_POST["search"]["value"].'%" ';
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
	$sub_array[] = $row["cent_bs_dticlc"];
	$sub_array[] = $row["cent_bs_dtrclc"];
	//$tcd = 
	//$tcd1 = $tcd / 24;
	$sub_array[] = $row["cent_bs_tcld"];
	// Other Reports
	if($row["cent_bs_symp"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_cent_bs_upld WHERE cent_bs_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_cent_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["cent_bs_symp"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_cent_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["cent_bs_symp"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["cent_bs_symp"];
	}	
	$sub_array[] = $row["cent_bs_symp_det"];
	$sub_array[] = $row["cent_bs_ssc"];
	// Culture Report
	if($row["cent_bs_clabsi"] == 'Yes'){
		$qry2 = mysqli_query($connect,"SELECT * FROM tbl_cent_bs_upld2 WHERE cent_bs_id = '$centid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_cent_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["cent_bs_clabsi"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_cent_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["cent_bs_clabsi"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["cent_bs_clabsi"];
	}
	$sub_array[] = $row["cent_bs_recd"];
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