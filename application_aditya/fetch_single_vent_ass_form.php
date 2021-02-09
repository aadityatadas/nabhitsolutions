<?php
error_reporting(0);
session_start();
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
		
		$dd_dt = $row["vent_dt_iuc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["t_adm"] = $get_date;
		$output["t_adm1"] = $get_time;		
		
		$dd_dt1 = $row["vent_dt_ruc"];	
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["ddd"] = $get_date1;
		$output["ddd1"] = $get_time1;
		
		$output["dddd"] = $row["vent_tcd"];
		$output["psympt"] = $row["vent_sympt"];
		$output["tddd"] = $row["vent_sympt_det"];
		$output["mlc"] = $row["vent_ssc"];
		$output["surg"] = $row["vent_spc"];
		
		
	}

	
	$statement = $connection->prepare(
		"SELECT * FROM tbl_vent_ass_phmn
		WHERE tbl_huf_id = '".$_POST["user_id"]."' 
		"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	

    $count = 0;
      $output["oldDataCount"] =count($result);
    if(count($result)>0){
    	
     foreach ($result as $as => $row) {
     	 
     	  $count++;
       

     	$dd_dt = $row["vent_dt_iuc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["one"][$as] = $get_date;
		$output["two"][$as] = $get_time;
				
		
		$dd_dt1 = $row["vent_dt_ruc"];
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["three"][$as] = $get_date1;
		$output["four"][$as] = $get_time1;
		
		$output["five"][$as] = $row["vent_tcd"];
		$output["six"][$as] = $row["vent_sympt"];
		$output["seven"][$as] = $row["vent_sympt_det"];
		$output["eight"][$as] = $row["vent_ssc"];
		$output["nine"][$as] = $row["vent_spc"];
		$output["vent_ass_pn_id"][$as] = $row["vent_ass_phmn_id"];
		$output["tbl_huf_id"][$as] = $row["tbl_huf_id"];


     }
 }
    
    
    

	echo json_encode($output);

	
}
?>