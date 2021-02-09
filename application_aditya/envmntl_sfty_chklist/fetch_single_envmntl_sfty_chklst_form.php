<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_envmntl_sfty_chklst 
		WHERE envmntl_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["envmntl_sfty_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];

$output['object_can_harm_yn']  =  $row['object_can_harm_yn'];
$output['object_can_harm_loc']  =  $row['object_can_harm_loc'];
$output['object_can_harm_rmrk']  =  $row['object_can_harm_rmrk'];
$output['staircase_and_bulding_safe_yn']  =  $row['staircase_and_bulding_safe_yn'];
$output['staircase_and_bulding_safe_loc']  = $row['staircase_and_bulding_safe_loc'];
$output['staircase_and_bulding_safe_rmrk'] = $row['staircase_and_bulding_safe_rmrk'];
$output['terraces_shall_locked_secured_yn']=$row['terraces_shall_locked_secured_yn'];
$output['terraces_shall_locked_secured_loc']=
$row['terraces_shall_locked_secured_loc'];
$output['terraces_shall_locked_secured_rmrk']= 
$row['terraces_shall_locked_secured_rmrk'];
$output['wanter_tanks_secured_looked_yn'] = $row['wanter_tanks_secured_looked_yn'];
$output['wanter_tanks_secured_looked_loc']=$row['wanter_tanks_secured_looked_loc'];
$output['wanter_tanks_secured_looked_rmrk'] =
$row['wanter_tanks_secured_looked_rmrk'];
$output['glasses_securd_head_yn']  =  $row['glasses_securd_head_yn'];
$output['glasses_securd_head_loc']  =  $row['glasses_securd_head_loc'];
$output['glasses_securd_head_rmrk']  =  $row['glasses_securd_head_rmrk'];
$output['bulding_secured_design_yn']  =  $row['bulding_secured_design_yn'];
$output['bulding_secured_design_loc']  =  $row['bulding_secured_design_loc'];
$output['bulding_secured_design_rmrk']  =  $row['bulding_secured_design_rmrk'];
$output['hospital_building_permission_yn'] = $row['hospital_building_permission_yn'];
$output['hospital_building_permission_loc']=
$row['hospital_building_permission_loc'];
$output['hospital_building_permission_rmrk']=
$row['hospital_building_permission_rmrk'];
$output['lift_shall_licensed_mantained_yn']= 
$row['lift_shall_licensed_mantained_yn'];
$output['lift_shall_licensed_mantained_loc']=
$row['lift_shall_licensed_mantained_loc'];
$output['lift_shall_licensed_mantained_rmrk']=
$row['lift_shall_licensed_mantained_rmrk'];



		
		echo json_encode($output);
	}
}
?>