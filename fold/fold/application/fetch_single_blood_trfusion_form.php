<?php
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_blood_fusion LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_blood_fusion.huf_id
		WHERE bld_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["bld_id"];
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["mo1"] = $row["bld_prdreq"];
		$output["mo2"] = $row["bld_nounit"];
		$output["mo3"] = $row["bld_dtreq"];
		$output["mo4"] = $row["bld_tmreq"];
		$output["mo5"] = $row["bld_bankname"];
		$output["mo6"] = $row["bld_ordby"];
		$output["mo7"] = $row["bld_dtrec"];
		$output["mo8"] = $row["bld_norec"];
		$output["mo9"] = $row["bld_tmrec"];
		$output["mo10"] = $row["bld_tat"];
		$output["mo11"] = $row["bld_recby"];
		$output["mo12"] = $row["bld_notrfus"];
		$output["mo13"] = $row["bld_trfusreact"];
		$output["mo14"] = $row["bld_waste"];
		$output["mo15"] = $row["bld_waste_det"];
		
		echo json_encode($output);
	}
}
?>