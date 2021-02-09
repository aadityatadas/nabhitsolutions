<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT  tbl_huf.huf_id,tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd , tbl_huf.huf_dadm , tbl_icu_register_ipd.* FROM tbl_huf
		LEFT JOIN tbl_icu_register_ipd ON tbl_huf.huf_id = tbl_icu_register_ipd.tbl_huf_id
		WHERE `huf_id` = '".$_POST["user_id"]."' 
		LIMIT 1"
	);

// SELECT *
//  FROM tbl_huf
//  LEFT JOIN tbl_lab_ipd ON tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id
//  WHERE `huf_id`= 2030
// ORDER BY `huf_id` DESC
// LIMIT 1
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["huf_id"];
		$output["user_id"] = $row["huf_id"];
		
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["d_adm"] = $row["huf_dadm"];
		
              if($row["tbl_huf_id"]) {
                    $output["action_to_perform"]="Update";
              } else {
                     $output["action_to_perform"]="Edit";
              }         
		
        
        
		 $output["tbl_huf_id"] = $row["tbl_huf_id"];

		 $output["icu_register_ipd_id"] 		= $row["icu_register_ipd_id"];
		 $output["date_of_admison_in_icu"] 		= $row["date_of_admison_in_icu"];
		 $output["time_of_admison_in_icu"] 		= $row["time_of_admison_in_icu"];
		 $output["date_of_disc_trans_in_icu"] 	= $row["date_of_disc_trans_in_icu"];
		 $output["time_of_disc_trans_in_icu"] 	= $row["time_of_disc_trans_in_icu"];
		 $output["date_of_return_in_icu"] 		= $row["date_of_return_in_icu"];
		 $output["time_of_return_in_icu"] 		= $row["time_of_return_in_icu"];
		 $output["retrn_to_icu_in_48hrs"] 		= $row["retrn_to_icu_in_48hrs"];
		 $output["re_admission"] 				= $row["re_admission"];
		 $output["re_intubation"] 				= $row["re_intubation"];
		 $output["re_admission_reson"] = $row["re_admission_reson"];
		 $output["re_intubation_reson"] = $row["re_intubation_reson"];
		 $output["sign"] 						= $row["sign"];



		 

		
		///echo json_encode($output);
	}

	$statement = $connection->prepare(
		"SELECT * FROM tbl_icu_ipd2
		WHERE icu_register_ipd_id = '".$output["icu_register_ipd_id"]."' 
		"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	
    //$output["ipdid"] = $output["icu_register_ipd_id"];
    $count = 0;
      $output["oldDataCount"] =count($result);
    if(count($result)>0){
    	
     foreach ($result as $as => $row) {
     	 
     	  $count++;
       

     	
		$output["one"][$as] 		= $row["date_of_admison_in_icu"];
		$output["two"][$as] 		= $row["time_of_admison_in_icu"];
		$output["three"][$as] 		= $row["date_of_disc_trans_in_icu"];
		$output["four"][$as] 		= $row["time_of_disc_trans_in_icu"];
		$output["five"][$as] 		= $row["date_of_return_in_icu"];
		$output["six"][$as] 		= $row["time_of_return_in_icu"];
		$output["seven"][$as] 		= $row["retrn_to_icu_in_48hrs"];
		$output["eight"][$as] 		= $row["re_admission"];
		$output["nine"][$as] 		= $row["re_intubation"];
		$output["eightone"][$as] 		= $row["re_admission_reson"];
		$output["nineone"][$as] 		= $row["re_intubation_reson"];
		$output["ten"][$as] 		= $row["sign"];
		$output["icu_ipd2_id"][$as] = $row["icu_ipd2_id"];


     }
 }

 echo json_encode($output);
}
?>