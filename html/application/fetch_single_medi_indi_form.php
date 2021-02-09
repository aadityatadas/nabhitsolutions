<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id
		WHERE medi_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["medi_id"];
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["d_adm"] = $row["huf_dadm"];
		$output["dddd"] = $row["huf_dddd"];
		$output["mlc"] = $row["huf_mlc"];
		$output["mo1"] = $row["medi_mrdav"];
		$output["mo2"] = $row["medi_mrdfile"];
		$output["mo3"] = $row["medi_mrddissum"];
		$output["mo4"] = $row["medi_mrdicd"];
		$output["mo5"] = $row["medi_mrdimpcons"];
		$output["mo6"] = $row["medi_mediord"];
		$output["mo7"] = $row["medi_handsheet_dr"];
		$output["mo8"] = $row["medi_handsheet_nur"];
		$output["mo9"] = $row["medi_planofcare"];
		$output["mo10"] = $row["medi_mrd_screen"];
		$output["mo11"] = $row["medi_mrd_nur_careplan"];
		
		echo json_encode($output);
	}
}
?>