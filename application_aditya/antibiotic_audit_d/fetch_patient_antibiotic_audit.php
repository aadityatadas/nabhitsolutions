<?php
include('../dbinfo.php');


if(isset($_POST["user_id"]))
{




	$output = array();
	$query =  "SELECT tbl_antibiotic_audit.*,tbl_huf.huf_pname,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd,tbl_huf.huf_dadm,tbl_huf.huf_lens FROM `tbl_antibiotic_audit`
           LEFT JOIN tbl_huf On tbl_antibiotic_audit.huf_id= tbl_huf.huf_id
            WHERE tbl_antibiotic_audit.id = '".$_POST["user_id"]."' 
		    LIMIT 1";
		
	$statement = $connection->prepare(

		$query
		
	);
	$statement->execute();
	$result = $statement->fetchAll();
	


	foreach($result as $row)
	{
		$output["sr_no"] = $row["id"];
		$output["p_name"] = $row["huf_pname"];
		
		$output["ipd_no"] = $row["huf_ipd"];
		
		
		$output["ddd"] = $row["huf_ddd"];		
		$output["dddd"] = $row["huf_dddd"];	
		$output["huf_dadm"] = $row["huf_dadm"];	
		$output["huf_lens"] = $row["huf_lens"];	
		
		$output['diagnosis'] = $row['diagnosis'];
$output['prim_consultatnt'] = $row['prim_consultatnt'];
$output['sec_consultant'] = $row['sec_consultant'];
$output['infection_if_any'] = $row['infection_if_any'];
$output['cat_name'] = $row['cat_name'];
$output['single_mix'] = $row['single_mix'];
$output['dose'] = $row['dose'];
$output['max_dose_daily'] = $row['max_dose_daily'];
$output['route'] = $row['route'];
$output['freq'] = $row['freq'];
$output['duration'] = $row['duration'];
$output['indic_use'] = $row['indic_use'];
$output['any_justfctin'] = $row['any_justfctin'];
$output['indicated_nonin'] = $row['indicated_nonin'];
$output['adherence_non'] = $row['adherence_non'];
$output['full_adhrence'] = $row['full_adhrence'];
$output['complinat_non_comp_ass'] = $row['complinat_non_comp_ass'];
$output['per_complinat_non_comp_ass'] = $row['per_complinat_non_comp_ass'];


		
		echo json_encode($output);
	}
}
?>