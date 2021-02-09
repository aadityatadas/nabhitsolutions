<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_restrain_chklst 
		WHERE restrain_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["restrain_chklst_id"];
  $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];

$output['vuln_patnt_only_yn']  =  $row['vuln_patnt_only_yn'];
$output['pink_colr_patnt_yn']  =  $row['pink_colr_patnt_yn'];
$output['restrain_order_only_yn']  =  $row['restrain_order_only_yn'];
$output['restrain_consent_only_yn']  =  $row['restrain_consent_only_yn'];
$output['ties_kont_10min_yn']  =  $row['ties_kont_10min_yn'];
$output['chemical_yn']  =  $row['chemical_yn'];
$output['vuln_patnt_only_loc']  =  $row['vuln_patnt_only_loc'];
$output['pink_colr_patnt_loc']  =  $row['pink_colr_patnt_loc'];
$output['restrain_order_only_loc']  =  $row['restrain_order_only_loc'];
$output['restrain_consent_only_loc']  =  $row['restrain_consent_only_loc'];
$output['ties_kont_10min_loc']  =  $row['ties_kont_10min_loc'];
$output['chemical_loc']  =  $row['chemical_loc'];
$output['vuln_patnt_only_rmrk']  =  $row['vuln_patnt_only_rmrk'];
$output['pink_colr_patnt_rmrk']  =  $row['pink_colr_patnt_rmrk'];
$output['restrain_order_only_rmrk']  =  $row['restrain_order_only_rmrk'];
$output['restrain_consent_only_rmrk']  =  $row['restrain_consent_only_rmrk'];
$output['ties_kont_10min_rmrk']  =  $row['ties_kont_10min_rmrk'];
$output['chemical_rmrk']  =  $row['chemical_rmrk'];



		
		echo json_encode($output);
	}
}
?>