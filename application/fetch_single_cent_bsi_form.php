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
		
		$dd_dt = $row["cent_bs_dticlc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["t_adm"] = $get_date;
		$output["t_adm1"] = $get_time;
		
		$dd_dt1 = $row["cent_bs_dtrclc"];
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["ddd"] = $get_date1;
		$output["ddd1"] = $get_time1;
		
		$output["dddd"] = $row["cent_bs_tcld"];
		$output["psympt"] = $row["cent_bs_symp"];
		$output["tddd"] = $row["cent_bs_symp_det"];
		$output["mlc"] = $row["cent_bs_ssc"];
		$output["surg"] = $row["cent_bs_clabsi"];
		
		
	}

	$statement = $connection->prepare(
		"SELECT * FROM tbl_centrl_line_assoc
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
       

     	$dd_dt = $row["cent_bs_dticlc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["one"][$as] = $get_date;
		$output["two"][$as] = $get_time;
				
		
		$dd_dt1 = $row["cent_bs_dtrclc"];
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["three"][$as] = $get_date1;
		$output["four"][$as] = $get_time1;
		
		$output["five"][$as] = $row["cent_bs_tcld"];
		$output["six"][$as] = $row["cent_bs_symp"];
		$output["seven"][$as] = $row["cent_bs_symp_det"];
		$output["eight"][$as] = $row["cent_bs_ssc"];
		$output["nine"][$as] = $row["cent_bs_clabsi"];
		$output["centrl_line_assoc_id"][$as] = $row["centrl_line_assoc_id"];
		$output["tbl_huf_id"][$as] = $row["tbl_huf_id"];


     }
 }
    
    
    

	echo json_encode($output);
}
?>