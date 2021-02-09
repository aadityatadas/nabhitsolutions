<?php
include('../dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$query =  "SELECT tbl_medical_record_audit.*,tbl_huf.huf_pname,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd FROM `tbl_medical_record_audit`
           LEFT JOIN tbl_huf On tbl_medical_record_audit.huf_id= tbl_huf.huf_id
            WHERE tbl_medical_record_audit.id = '".$_POST["user_id"]."' 
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
		$output['mr_without_dis_summary'] = $row['mr_without_dis_summary'];
			
		$output['mr_having_incm_imp_const'] = $row['mr_having_incm_imp_const'];
		$output['mr_without_sign_init_ass_sheet'] = $row['mr_without_sign_init_ass_sheet'];
		$output['mr_without_sign_init_medictn_order'] = $row['mr_without_sign_init_medictn_order'];
		$output['mr_without_nursing_asst'] = $row['mr_without_nursing_asst'];
		$output['mr_without_nutrition_asst'] = $row['mr_without_nutrition_asst'];
		$output['mr_without_physipy_asst'] = $row['mr_without_physipy_asst'];
		$output['post_anaesthesia_scroing_sign_anaesthist'] = $row['post_anaesthesia_scroing_sign_anaesthist'];


		
		echo json_encode($output);
	}
}
?>