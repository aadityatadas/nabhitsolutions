<?php
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_pharmcy_register 
		WHERE pharmcy_register_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["pharmcy_register_id"];
  $output["item_no"] = $row["item_no"];
  $output["quantity"] = $row["quantity"];
  $output["vendor"] = $row["vendor"];
  $output["purchase_ordr"] = $row["purchase_ordr"];
  $output["no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary"] = $row["no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary"];
  $output["per_of_drug_consumble_producd_by_locl_purchase"] = $row["per_of_drug_consumble_producd_by_locl_purchase"];
  $output["no_of_stock_out"] = $row["no_of_stock_out"];
  $output["per_of_stocks_out"] = $row["per_of_stocks_out"];
  $output["total_quantity_rejected"] = $row["total_quantity_rejected"];
  $output["total_qnty_receivd_befor_grn"] = $row["total_qnty_receivd_befor_grn"];
  $output["per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn"] = $row["per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn"];
  $output["totl_num_of_variation_frm_the_defend_procument_procs"] = $row["totl_num_of_variation_frm_the_defend_procument_procs"];
  $output["totl_no_of_itm_procured"] = $row["totl_no_of_itm_procured"];
  $output["per_of_vartion_frm_the_procmnt_process"] = $row["per_of_vartion_frm_the_procmnt_process"];
  $output['medic_error']  = $row['medic_error'];
$output['medic_error_rmrk']  = $row['medic_error_rmrk'];
$output['per_medic_error']  = $row['per_medic_error'];
$output['near_miss_error']  = $row['near_miss_error'];
$output['near_miss_error_rmrk']  = $row['near_miss_error_rmrk'];
$output['per_near_miss_error']  = $row['per_near_miss_error'];
$output['advrse_drug_event']  = $row['advrse_drug_event'];
$output['advrse_drug_event_rmrk']  = $row['advrse_drug_event_rmrk'];
$output['per_advrse_drug_event']  = $row['per_advrse_drug_event'];


		
		echo json_encode($output);
	}
}
?>