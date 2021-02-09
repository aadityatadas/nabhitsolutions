<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_power_sfty_chklst 
		WHERE power_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["power_sfty_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];

$output['hosp_3_srce_powr_yn']  =  $row['hosp_3_srce_powr_yn'];
$output['hosp_3_srce_powr_loc']  =  $row['hosp_3_srce_powr_loc'];
$output['hosp_3_srce_powr_rmrk']  =  $row['hosp_3_srce_powr_rmrk'];
$output['all_powr_wrking_yn']  =  $row['all_powr_wrking_yn'];
$output['all_powr_wrking_loc']  =  $row['all_powr_wrking_loc'];
$output['all_powr_wrking_rmrk']  =  $row['all_powr_wrking_rmrk'];
$output['dg_shall_sufcnt_fuel_yn']  =  $row['dg_shall_sufcnt_fuel_yn'];
$output['dg_shall_sufcnt_fuel_loc']  =  $row['dg_shall_sufcnt_fuel_loc'];
$output['dg_shall_sufcnt_fuel_rmrk']  =  $row['dg_shall_sufcnt_fuel_rmrk'];
$output['all_emergncy_machin_yn']  =  $row['all_emergncy_machin_yn'];
$output['all_emergncy_machin_loc']  =  $row['all_emergncy_machin_loc'];
$output['all_emergncy_machin_rmrk']  =  $row['all_emergncy_machin_rmrk'];
$output['dg_shall_readings_yn']  =  $row['dg_shall_readings_yn'];
$output['dg_shall_readings_loc']  =  $row['dg_shall_readings_loc'];
$output['dg_shall_readings_rmrk']  =  $row['dg_shall_readings_rmrk'];
$output['altrnt_line_safty_yn']  =  $row['altrnt_line_safty_yn'];
$output['altrnt_line_safty_loc']  =  $row['altrnt_line_safty_loc'];
$output['altrnt_line_safty_rmrk']  =  $row['altrnt_line_safty_rmrk'];



		
		echo json_encode($output);
	}
}
?>