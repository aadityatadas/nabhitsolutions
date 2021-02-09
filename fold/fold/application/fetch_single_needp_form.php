<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_need_pif 
		WHERE needp_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["needp_id"];
		$output["s_name"] = $row["needp_sname"];
		$output["dept"] = $row["needp_dept"];
		
		$dd_dt = $row["needp_dttm"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["inj_dttm"] = $get_date;
		$output["inj_dttm2"] = $get_time;
		
		$output["inj_typ"] = $row["needp_typ_inj"];
		$output["inj_mod"] = $row["needp_mod_inj"];
		$output["inj_with"] = $row["needp_usinj"];
		$output["inj_pname"] = $row["needp_sharp"];
		$output["inj_det"] = $row["needp_inj_det"];
		$output["inj_inv"] = $row["needp_wh_inv"];		
		$output["inj_prop"] = $row["needp_wh_prop"];
		$output["inj_rpt"] = $row["needp_rep_to"];
		$output["inj_rptby"] = $row["needp_rep_by"];
		$output["stf_no"] = $row["needp_tot_stf"];
	}	
	echo json_encode($output);
}
?>