<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_med_gas_safty_chklst 
		WHERE med_gas_safty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["med_gas_safty_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];
$output['stock_book_mantan_yn'] = $row['stock_book_mantan_yn'];
$output['stock_book_mantan_loc'] = $row['stock_book_mantan_loc'];
$output['stock_book_mantan_rmrk'] = $row['stock_book_mantan_rmrk'];
$output['log_cynlr_yn'] = $row['log_cynlr_yn'];
$output['log_cynlr_loc'] = $row['log_cynlr_loc'];
$output['log_cynlr_rmrk'] = $row['log_cynlr_rmrk'];
$output['presur_chkd_daily_yn'] = $row['presur_chkd_daily_yn'];
$output['presur_chkd_daily_loc'] = $row['presur_chkd_daily_loc'];
$output['presur_chkd_daily_rmrk'] = $row['presur_chkd_daily_rmrk'];
$output['emply_cylndr_yn'] = $row['emply_cylndr_yn'];
$output['emply_cylndr_loc'] = $row['emply_cylndr_loc'];
$output['emply_cylndr_rmrk'] = $row['emply_cylndr_rmrk'];
$output['labl_full_yn'] = $row['labl_full_yn'];
$output['labl_full_loc'] = $row['labl_full_loc'];
$output['labl_full_rmrk'] = $row['labl_full_rmrk'];
$output['all_cylndr_strchr_yn'] = $row['all_cylndr_strchr_yn'];
$output['all_cylndr_strchr_loc'] = $row['all_cylndr_strchr_loc'];
$output['all_cylndr_strchr_rmrk'] = $row['all_cylndr_strchr_rmrk'];
$output['msds_each_dep_yn'] = $row['msds_each_dep_yn'];
$output['msds_each_dep_loc'] = $row['msds_each_dep_loc'];
$output['msds_each_dep_rmrk'] = $row['msds_each_dep_rmrk'];
$output['safty_condtn_yn'] = $row['safty_condtn_yn'];
$output['safty_condtn_loc'] = $row['safty_condtn_loc'];
$output['safty_condtn_rmrk'] = $row['safty_condtn_rmrk'];
$output['med_gas_pipe_schld_yn'] = $row['med_gas_pipe_schld_yn'];
$output['med_gas_pipe_schld_loc'] = $row['med_gas_pipe_schld_loc'];
$output['med_gas_pipe_schld_rmrk'] = $row['med_gas_pipe_schld_rmrk'];
$output['gas_main_lock_yn'] = $row['gas_main_lock_yn'];
$output['gas_main_lock_loc'] = $row['gas_main_lock_loc'];
$output['gas_main_lock_rmrk'] = $row['gas_main_lock_rmrk'];


		
		echo json_encode($output);
	}
}
?>