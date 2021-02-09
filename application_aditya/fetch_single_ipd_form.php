<?php
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid 
		WHERE ipd_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["ipd_id"];
		$output["dt"] = $row["wttm_dttmr"];
		$output["mo1"] = $row["huf_pname"];
		$output["mo2"] = $row["ipd_age"];
		$output["mo3"] = $row["ipd_sex"];
		$output["em"] = $row["ipd_email"];
		
		$output["mo4"] = $row["ipd_addr"];
		$output["mo5"] = $row["ipd_trdr"];
		
		$output["chkk1"] = $row["ipd_hrd1"];
		$output["chkk2"] = $row["ipd_hrd2"];
		$output["chkk3"] = $row["ipd_hrd3"];
		$output["mo7"] = $row["ipd_oth"];
		
		$output["chk1"] = $row["ipd_chk1"];
		$output["chk2"] = $row["ipd_chk2"];
		$output["chk3"] = $row["ipd_chk3"];		
		$output["chk4"] = $row["ipd_chk4"];
		$output["chk5"] = $row["ipd_chk5"];
		$output["chk6"] = $row["ipd_chk6"];
		$output["chk7"] = $row["ipd_chk7"];
		$output["chk8"] = $row["ipd_chk8"];
		$output["chk9"] = $row["ipd_chk9"];
		$output["chk10"] = $row["ipd_chk10"];
		$output["chk11"] = $row["ipd_chk11"];
		$output["chk12"] = $row["ipd_chk12"];
		$output["chk13"] = $row["ipd_chk13"];		
		$output["chk14"] = $row["ipd_chk14"];
		$output["chk15"] = $row["ipd_chk15"];
		$output["chk16"] = $row["ipd_chk16"];
		$output["chk17"] = $row["ipd_chk17"];
		$output["chk18"] = $row["ipd_chk18"];
		$output["chk19"] = $row["ipd_chk19"];
		$output["chk20"] = $row["ipd_chk20"];
		$output["chk21"] = $row["ipd_chk21"];		
		$output["chk22"] = $row["ipd_chk22"];
		$output["chk23"] = $row["ipd_chk23"];
		$output["chk24"] = $row["ipd_chk24"];
		
		$output["mo8"] = $row["ipd_fac"];
		$output["mo9"] = $row["ipd_sug"];

		$output["user_sign"] = $row["user_sign"];		
		
	echo json_encode($output);
	}
}
?>