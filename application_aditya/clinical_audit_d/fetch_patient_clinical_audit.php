<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$query =  "SELECT tbl_clinical_audit.*,tbl_huf.huf_pname,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd FROM `tbl_clinical_audit`
           LEFT JOIN tbl_huf On tbl_clinical_audit.huf_id= tbl_huf.huf_id
            WHERE tbl_clinical_audit.id = '".$_POST["user_id"]."' 
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
		$output["case_details"] = $row["case_details"];
		$output["sent_on"] = $row["sent_on"];
		$output["consulatnt"] = $row["consulatnt"];
		$output["monitoring"] = $row["monitoring"];
		$output["technique"] = $row["technique"];
		$output["frequency"] = $row["frequency"];
		$output["calibration"] = $row["calibration"];
		$output["diet_plan"] = $row["diet_plan"];
		$output["education"] = $row["education"];
			$output["fbs_rbs"] = $row["fbs_rbs"];


		
		echo json_encode($output);
	}
}
?>