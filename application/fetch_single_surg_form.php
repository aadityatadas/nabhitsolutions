<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
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
		
		$dd_dt = $row["surg_dtos"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["dddd"] = $get_date;
		$output["dddd1"] = $get_time;
		
		$output["ddd"] = $row["surg_nsurg"];
		$output["psympt"] = $row["surg_symp"];
		$output["tddd"] = $row["surg_symp_det"];
		$output["mlc"] = $row["surg_dtssc"];
		$output["surg"] = $row["surg_sp_ssi"];
		
		//echo json_encode($output);
	}

	$statement = $connection->prepare(
		"SELECT * FROM tbl_surg_site_infec
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
       

     	$dd_dt = $row["surg_dtos"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["one"][$as] = $get_date;
		$output["two"][$as] = $get_time;
				
		
		$output["three"][$as] = $row["surg_nsurg"];
		$output["four"][$as] = $row["surg_symp"];
		$output["five"][$as] = $row["surg_symp_det"];
		$output["six"][$as] = $row["surg_dtssc"];
		$output["seven"][$as] = $row["surg_sp_ssi"];
		$output["surg_pn_id"][$as] = $row["surg_site_infec_id"];
		$output["tbl_huf_id"][$as] = $row["tbl_huf_id"];


     }
 }
    
    
    

	echo json_encode($output);
}
?>