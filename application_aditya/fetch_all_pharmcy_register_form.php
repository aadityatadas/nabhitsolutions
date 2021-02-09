<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_pharmcy_register ";
if(isset($_POST["search"]["value"]))
{


	$query .= 'WHERE item_no LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR quantity LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vendor LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR per_of_drug_consumble_producd_by_locl_purchase LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR no_of_stock_out LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR per_of_stocks_out LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR total_quantity_rejected LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR total_qnty_receivd_befor_grn LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR totl_num_of_variation_frm_the_defend_procument_procs LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR totl_no_of_itm_procured LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR per_of_vartion_frm_the_procmnt_process LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY pharmcy_register_id DESC ';
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
	if($typ == 'Admin')
	{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["pharmcy_register_id"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["pharmcy_register_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["pharmcy_register_id"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>';	
	}
	$sub_array[] = $row["pharmcy_register_id"];
	$pid = $row["pharmcy_register_id"];
	$sub_array[] = $row["vendor"];
  $sub_array[] = $row["item_no"];
  $sub_array[] = $row["quantity"];
  
  $sub_array[] = $row["purchase_ordr"];
  $sub_array[] = $row["no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary"];
  $sub_array[] = $row["per_of_drug_consumble_producd_by_locl_purchase"];
  $sub_array[] = $row["no_of_stock_out"];
  $sub_array[] = $row["per_of_stocks_out"];
  $sub_array[] = $row["total_quantity_rejected"];
  $sub_array[] = $row["total_qnty_receivd_befor_grn"];
  $sub_array[] = $row["per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn"];
  $sub_array[] = $row["totl_num_of_variation_frm_the_defend_procument_procs"];
  // $sub_array[] = $row["totl_no_of_itm_procured"];
   $sub_array[] = $row["per_of_vartion_frm_the_procmnt_process"];
 if($row["medic_error"] !=""){
 	$qry2 = mysqli_query($connect,"SELECT * FROM tbl_phar_reg_upld1 WHERE pharmcy_register_id = '$pid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_phar_reg_up1.php?rd='.$row["pharmcy_register_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["medic_error"]." ".'</b><button class="btn btn-info btn-xs">View</button></a>'."<br>";
		}else{
			$sub_array[]= '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_phar_reg1.php?rd='.$row["pharmcy_register_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["medic_error"]." ".'</b><button class="btn btn-warning btn-xs">Upload</button></a>'."<br>";
		}
	} else {
		$sub_array[] = $row["medic_error"];
	}
  $sub_array[] = $row["per_medic_error"];
  

   if($row["near_miss_error"] !=""){
 	$qry2 = mysqli_query($connect,"SELECT * FROM tbl_phar_reg_upld2 WHERE pharmcy_register_id = '$pid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_phar_reg_up2.php?rd='.$row["pharmcy_register_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["near_miss_error"]." ".'</b><button class="btn btn-info btn-xs">View</button></a>'."<br>";
		}else{
			$sub_array[]= '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_phar_reg2.php?rd='.$row["pharmcy_register_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["near_miss_error"]." ".'</b><button class="btn btn-warning btn-xs">Upload</button></a>'."<br>";
		}
	} else {
		$sub_array[] = $row["near_miss_error"];
	}


  $sub_array[] = $row["per_near_miss_error"];
  
  if($row["advrse_drug_event"] !=""){
 	$qry2 = mysqli_query($connect,"SELECT * FROM tbl_phar_reg_upld3 WHERE pharmcy_register_id = '$pid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_phar_reg_up3.php?rd='.$row["pharmcy_register_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["advrse_drug_event"]." ".'</b><button class="btn btn-info btn-xs">View</button></a>'."<br>";
		}else{
			$sub_array[]= '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_phar_reg3.php?rd='.$row["pharmcy_register_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["advrse_drug_event"]." ".'</b><button class="btn btn-warning btn-xs">Upload</button></a>'."<br>";
		}
	} else {
		$sub_array[] = $row["advrse_drug_event"];
	}

  $sub_array[] = $row["per_advrse_drug_event"];
  


 
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