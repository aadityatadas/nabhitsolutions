<?php
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_opd 
		WHERE opd_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["opd_id"];
		$output["dt"] = $row["opd_date"];
		$output["mo1"] = $row["opd_name"];
		$output["mo2"] = $row["opd_age"];
		$output["mo3"] = $row["opd_sex"];
		$output["em"] = $row["opd_email"];
		
		$output["mo4"] = $row["opd_addr"];
		$output["mo5"] = $row["opd_trdr"];
		
		$output["chkk1"] = $row["opd_hrd1"];
		$output["chkk2"] = $row["opd_hrd2"];
		$output["chkk3"] = $row["opd_hrd3"];
		$output["mo7"] = $row["opd_oth"];
		
		$output["chk1"] = $row["opd_chk1"];
		$output["chk2"] = $row["opd_chk2"];
		$output["chk3"] = $row["opd_chk3"];		
		$output["chk4"] = $row["opd_chk4"];
		$output["chk5"] = $row["opd_chk5"];
		$output["chk6"] = $row["opd_chk6"];
		$output["chk7"] = $row["opd_chk7"];
		$output["chk8"] = $row["opd_chk8"];
		$output["chk9"] = $row["opd_chk9"];
		$output["chk10"] = $row["opd_chk10"];
		$output["chk11"] = $row["opd_chk11"];
		$output["chk12"] = $row["opd_chk12"];
		$output["chk13"] = $row["opd_chk13"];		
		$output["chk14"] = $row["opd_chk14"];
		$output["chk15"] = $row["opd_chk15"];
		$output["chk16"] = $row["opd_chk16"];
		$output["chk17"] = $row["opd_chk17"];
		$output["chk18"] = $row["opd_chk18"];
		$output["chk19"] = $row["opd_chk19"];
		$output["chk20"] = $row["opd_chk20"];
		$output["chk21"] = $row["opd_chk21"];		
		$output["chk22"] = $row["opd_chk22"];
		$output["chk23"] = $row["opd_chk23"];
		$output["chk24"] = $row["opd_chk24"];
		
		$output["mo8"] = $row["opd_fac"];
		$output["mo9"] = $row["opd_sug"];		
		
	echo json_encode($output);
	}
}
?>