<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_emergncy_sfty_chklst 
		WHERE emergncy_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["emergncy_sfty_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];

$output['emergncy_codes_numbers_yn']  =  $row['emergncy_codes_numbers_yn'];
$output['emergncy_codes_numbers_loc']  =  $row['emergncy_codes_numbers_loc'];
$output['emergncy_codes_numbers_rmrk']  =  $row['emergncy_codes_numbers_rmrk'];
$output['roles_emrgy_cards_yn']  =  $row['roles_emrgy_cards_yn'];
$output['roles_emrgy_cards_loc']  =  $row['roles_emrgy_cards_loc'];
$output['roles_emrgy_cards_rmrk']  =  $row['roles_emrgy_cards_rmrk'];
$output['emergncy_code_alarm_yn']  =  $row['emergncy_code_alarm_yn'];
$output['emergncy_code_alarm_loc']  =  $row['emergncy_code_alarm_loc'];
$output['emergncy_code_alarm_rmrk']  =  $row['emergncy_code_alarm_rmrk'];
$output['mock_drills_check_yn']  =  $row['mock_drills_check_yn'];
$output['mock_drills_check_loc']  =  $row['mock_drills_check_loc'];
$output['mock_drills_check_rmrk']  =  $row['mock_drills_check_rmrk'];
$output['emergncy_equipment_chklst_yn']  =  $row['emergncy_equipment_chklst_yn'];
$output['emergncy_equipment_chklst_loc']  =  $row['emergncy_equipment_chklst_loc'];
$output['emergncy_equipment_chklst_rmrk']  =  
$row['emergncy_equipment_chklst_rmrk'];



		
		echo json_encode($output);
	}
}
?>