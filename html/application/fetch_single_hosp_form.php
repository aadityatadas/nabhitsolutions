<?php
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_huf 
		WHERE huf_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["huf_id"];
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["d_adm"] = $row["huf_dadm"];		
		$output["t_adm"] = $row["huf_tadm"];
		$output["tyofadmison"] = $row["tyofadmison"];
		$output["ddd"] = $row["huf_ddd"];		
		$output["dddd"] = $row["huf_dddd"];		
		$output["tddd"] = $row["huf_tddd"];
		$output["mlc"] = $row["huf_mlc"];
		$output["surg"] = $row["huf_surg"];
		$output["los"] = $row["huf_lens"];
		
		echo json_encode($output);
	}
}
?>