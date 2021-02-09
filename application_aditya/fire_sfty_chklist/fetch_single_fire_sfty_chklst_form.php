<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_fire_sfty_chklst 
		WHERE fire_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["fire_sfty_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];

$output['fire_noc_updted_yn']  =  $row['fire_noc_updted_yn'];
$output['fire_noc_updted_loc']  =  $row['fire_noc_updted_loc'];
$output['fire_noc_updted_rmrk']  =  $row['fire_noc_updted_rmrk'];
$output['fire_extg_rifled_yn']  =  $row['fire_extg_rifled_yn'];
$output['fire_extg_rifled_loc']  =  $row['fire_extg_rifled_loc'];
$output['fire_extg_rifled_rmrk']  =  $row['fire_extg_rifled_rmrk'];
$output['fire_hose_wrking_yn']  =  $row['fire_hose_wrking_yn'];
$output['fire_hose_wrking_loc']  =  $row['fire_hose_wrking_loc'];
$output['fire_hose_wrking_rmrk']  =  $row['fire_hose_wrking_rmrk'];
$output['fire_exit_deptrmnt_yn']  =  $row['fire_exit_deptrmnt_yn'];
$output['fire_exit_deptrmnt_loc']  =  $row['fire_exit_deptrmnt_loc'];
$output['fire_exit_deptrmnt_rmrk']  =  $row['fire_exit_deptrmnt_rmrk'];
$output['chemcl_comb_matrl_yn']  =  $row['chemcl_comb_matrl_yn'];
$output['chemcl_comb_matrl_loc']  =  $row['chemcl_comb_matrl_loc'];
$output['chemcl_comb_matrl_rmrk']  =  $row['chemcl_comb_matrl_rmrk'];
$output['pa_system_wrking_yn']  =  $row['pa_system_wrking_yn'];
$output['pa_system_wrking_loc']  =  $row['pa_system_wrking_loc'];
$output['pa_system_wrking_rmrk']  =  $row['pa_system_wrking_rmrk'];
$output['smoke_condtin_yn']  =  $row['smoke_condtin_yn'];
$output['smoke_condtin_loc']  =  $row['smoke_condtin_loc'];
$output['smoke_condtin_rmrk']  =  $row['smoke_condtin_rmrk'];
$output['fire_safty_rounds_yn']  =  $row['fire_safty_rounds_yn'];
$output['fire_safty_rounds_loc']  =  $row['fire_safty_rounds_loc'];
$output['fire_safty_rounds_rmrk']  =  $row['fire_safty_rounds_rmrk'];
$output['fire_preventin_abc_yn']  =  $row['fire_preventin_abc_yn'];
$output['fire_preventin_abc_loc']  =  $row['fire_preventin_abc_loc'];
$output['fire_preventin_abc_rmrk']  =  $row['fire_preventin_abc_rmrk'];



		
		echo json_encode($output);
	}
}
?>