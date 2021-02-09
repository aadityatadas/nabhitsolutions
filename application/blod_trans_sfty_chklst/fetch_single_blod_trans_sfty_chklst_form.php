<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_blod_trans_safty_chklst 
		WHERE blod_trans_safty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		    $output["sr_no"] = $row["blod_trans_safty_chklst_id"];
			$output['name'] = $row['name'];
			$output['sign'] = $row['sign'];
			$output['date1'] = $row['date1'];
			$output['time1'] = $row['time1'];
			$output['blod_grup_done_yn'] =  $row['blod_grup_done_yn'];
			$output['blod_grup_done_loc'] =  $row['blod_grup_done_loc'];
			$output['blod_grup_done_rmrk'] =  $row['blod_grup_done_rmrk'];
			$output['blod_rqust_reqsion_yn'] =  $row['blod_rqust_reqsion_yn'];
			$output['blod_rqust_reqsion_loc'] =  $row['blod_rqust_reqsion_loc'];
			$output['blod_rqust_reqsion_rmrk'] =  $row['blod_rqust_reqsion_rmrk'];
			$output['trans_obtained_yn'] =  $row['trans_obtained_yn'];
			$output['trans_obtained_loc'] =  $row['trans_obtained_loc'];
			$output['trans_obtained_rmrk'] =  $row['trans_obtained_rmrk'];
			$output['tat_strg_condtn_yn'] =  $row['tat_strg_condtn_yn'];
			$output['tat_strg_condtn_loc'] =  $row['tat_strg_condtn_loc'];
			$output['tat_strg_condtn_rmrk'] =  $row['tat_strg_condtn_rmrk'];
			$output['after_recvg_blod_bag_yn'] =  $row['after_recvg_blod_bag_yn'];
			$output['after_recvg_blod_bag_loc'] =  $row['after_recvg_blod_bag_loc'];
			$output['after_recvg_blod_bag_rmrk'] =  $row['after_recvg_blod_bag_rmrk'];
			$output['blod_trans_monit_form_yn'] =  $row['blod_trans_monit_form_yn'];
			$output['blod_trans_monit_form_loc'] =  $row['blod_trans_monit_form_loc'];
			$output['blod_trans_monit_form_rmrk'] =  $row['blod_trans_monit_form_rmrk'];
			$output['blod_trans_rectn_yn'] =  $row['blod_trans_rectn_yn'];
			$output['blod_trans_rectn_loc'] =  $row['blod_trans_rectn_loc'];
			$output['blod_trans_rectn_rmrk'] =  $row['blod_trans_rectn_rmrk'];
			$output['emtpy_bloodbag_soltn_yn'] =  $row['emtpy_bloodbag_soltn_yn'];
			$output['emtpy_bloodbag_soltn_loc'] =  $row['emtpy_bloodbag_soltn_loc'];
			$output['emtpy_bloodbag_soltn_rmrk'] =  $row['emtpy_bloodbag_soltn_rmrk'];




		
		echo json_encode($output);
	}
}
?>