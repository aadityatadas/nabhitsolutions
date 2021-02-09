<?php
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hrid = tbl_hr_indic.hrid
		WHERE tbl_hr_indic.hr_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["hr_id"];
		$output["mo1"] = $row["hr_staff"];
		$output["hrid"] = $row["hrid"];
		$output["mo2"] = $row["hr_empcode"];
		$output["mo3"] = $row["hr_desig"];
		$output["mo4"] = $row["hr_dept"];
		$output["mo5"] = $row["hr_datej"];
		$output["mo6"] = $row["hr_ctstat"];
		$output["mo7"] = $row["hr_ctstat_det"];
		$output["hrdt"] = $row["hr_date"];
		$output["hrmon"] = $row["hr_month"];
		$output["mo8"] = $row["hr_absent"];
		$output["mo9"] = $row["hr_satis_score"];
		$output["mo10"] = $row["hr_occpany"];
		$output["mo11"] = $row["hr_need_inj"];
		$output["mo12"] = $row["hr_tottrain"];
		$output["mo13"] = $row["hr_perf_score"];
		$output["mo14"] = $row["hr_per_file"];
		$output["mo15"] = $row["hr_health_chk"];
		$output["mo16"] = $row["hr_griv"];
		$output["mo17"] = $row["hr_immune"];
		
		echo json_encode($output);
	}
}
?>