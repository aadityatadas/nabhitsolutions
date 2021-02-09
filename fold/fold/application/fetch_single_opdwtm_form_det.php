<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_opdwttm 
		WHERE opdwttm_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["opdwttm_id"];
		$output["p_name"] = $row["opdwttm_pname"];
		$output["uhid_no"] = $row["opdwttm_uhid"];
		$output["opd_no"] = $row["opdwttm_opd"];
		$output["drsp"] = $row["opdwttm_drsp"];
		
		$dd_dt = $row["opdwttm_dttmr"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["dttm_reg"] = $get_date;
		$output["dttm_reg3"] = $get_time;		
		
		$dd_dt1 = $row["opdwttm_dttmds"];
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["dttm_reg2"] = $get_date1;
		$output["dttm_reg4"] = $get_time1;
		
		$output["opdwtm"] = $row["opdwttm_opdwttm"];
	}	
	echo json_encode($output);
}
?>