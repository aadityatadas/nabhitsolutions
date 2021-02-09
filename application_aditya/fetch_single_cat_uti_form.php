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
		
		$dd_dt = $row["cath_uti_iuc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["t_adm"] = $get_date;
		$output["t_adm1"] = $get_time;		
		
		$dd_dt1 = $row["cath_uti_ruc"];	
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["ddd"] = $get_date1;
		$output["ddd1"] = $get_time1;
		
		$output["dddd"] = $row["cath_uti_tcd"];
		$output["psympt"] = $row["cath_uti_symp"];
		$output["tddd"] = $row["cath_uti_symp_det"];
		$output["mlc"] = $row["cath_uti_ssc"];
		$output["surg"] = $row["cath_uti_spc"];
		
		
	}

	$statement = $connection->prepare(
		"SELECT * FROM tbl_cath_assoc_uti
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
       

     	$dd_dt = $row["cath_uti_iuc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["one"][$as] = $get_date;
		$output["two"][$as] = $get_time;
				
		
		$dd_dt1 = $row["cath_uti_ruc"];
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["three"][$as] = $get_date1;
		$output["four"][$as] = $get_time1;
		
		$output["five"][$as] = $row["cath_uti_tcd"];
		$output["six"][$as] = $row["cath_uti_symp"];
		$output["seven"][$as] = $row["cath_uti_symp_det"];
		$output["eight"][$as] = $row["cath_uti_ssc"];
		$output["nine"][$as] = $row["cath_uti_spc"];
		$output["cath_assoc_uti_id"][$as] = $row["cath_assoc_uti_id"];
		$output["tbl_huf_id"][$as] = $row["tbl_huf_id"];


     }
 }

	echo json_encode($output);
}
?>