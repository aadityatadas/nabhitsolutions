<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_sedatin_sfty_chklst 
		WHERE sedatin_sfty_chklst_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
$output["sr_no"] = $row["sedatin_sfty_chklst_id"];
 $output['name'] = $row['name'];
$output['sign'] = $row['sign'];
$output['date1'] = $row['date1'];
$output['time1'] = $row['time1'];
$output['sedtin_cnstnt_tkn_yn']  =  $row['sedtin_cnstnt_tkn_yn'];
$output['sedtin_score_filld_yn']  =  $row['sedtin_score_filld_yn'];
$output['sedtin_gvn_only_yn']  =  $row['sedtin_gvn_only_yn'];
$output['if_sedtive_restnt_only_yn']  =  $row['if_sedtive_restnt_only_yn'];
$output['sedtive_drug_prtcl_yn']  =  $row['sedtive_drug_prtcl_yn'];
$output['sedtin_cnstnt_tkn_loc']  =  $row['sedtin_cnstnt_tkn_loc'];
$output['sedtin_score_filld_loc']  =  $row['sedtin_score_filld_loc'];
$output['sedtin_gvn_only_loc']  =  $row['sedtin_gvn_only_loc'];
$output['if_sedtive_restnt_only_loc']  =  $row['if_sedtive_restnt_only_loc'];
$output['sedtive_drug_prtcl_loc']  =  $row['sedtive_drug_prtcl_loc'];
$output['sedtin_cnstnt_tkn_rmrk']  =  $row['sedtin_cnstnt_tkn_rmrk'];
$output['sedtin_score_filld_rmrk']  =  $row['sedtin_score_filld_rmrk'];
$output['sedtin_gvn_only_rmrk']  =  $row['sedtin_gvn_only_rmrk'];
$output['if_sedtive_restnt_only_rmrk']  =  $row['if_sedtive_restnt_only_rmrk'];
$output['sedtive_drug_prtcl_rmrk']  =  $row['sedtive_drug_prtcl_rmrk'];



		
		echo json_encode($output);
	}
}
?>