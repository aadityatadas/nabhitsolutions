
<?php
error_reporting(0);
session_start();
include('dbinfo.php');
function cal_date($diff){
 	

 	if (strpos($diff,':') !== false) {
			return $diff;
	}
	// if (strpos($diff,'-') !== false) {
	// 		return $diff;
	// }
	if(!$diff){
		return $diff;
	}
	$timeMinTotal =  floor(($diff/60));
			
	$timeInMin= $timeMinTotal%60;
			
	$timeInhr= floor($timeMinTotal/60);
	$diffrenceInHr =$timeInhr.":".$timeInMin;

	return $diffrenceInHr;
}
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT  tbl_huf.huf_id,tbl_huf.huf_pname,tbl_huf.huf_uhid,tbl_huf.huf_ipd , tbl_huf.huf_dadm , tbl_emrgncy_register_ipd.*, tbl_emrgncy_register_ipd.* FROM tbl_huf
		LEFT JOIN tbl_emrgncy_register_ipd ON tbl_huf.huf_id = tbl_emrgncy_register_ipd.tbl_huf_id
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

		 
		   $output["emrgncy_register_ipd_id"]= $row["emrgncy_register_ipd_id"];
		   $output["tbl_huf_id"]= $row["tbl_huf_id"];
		   $output["date_of_patient_arrvl_at_emrgncy"]= $row["date_of_patient_arrvl_at_emrgncy"];
		   $output["time_of_patient_arrvl_at_emrgncy"]= $row["time_of_patient_arrvl_at_emrgncy"];
		   $output["time_of_intl_ass_is_cmpltd_by_doc"]= $row["time_of_intl_ass_is_cmpltd_by_doc"];
		    $output["date_of_intl_ass_is_cmpltd_by_doc"]= $row["date_of_intl_ass_is_cmpltd_by_doc"];
		   $output["time_taken_for_initl_assmnt"]= cal_date($row["time_taken_for_initl_assmnt"]);
		   ;
		   $output["patient_cmplnt"]= $row["patient_cmplnt"];
		   $output["m_l_c"]= $row["m_l_c"];
		   $output["brought_dead"]= $row["brought_dead"];
		   $output["return_to_emergency"]= $row["return_to_emergency"];
		   $output["date_of_retrn_to_emrgncy_dept_if_any"]= $row["date_of_retrn_to_emrgncy_dept_if_any"];
		   $output["time_of_retrn_to_emrgncy_dept_if_any"]= $row["time_of_retrn_to_emrgncy_dept_if_any"];
		   $output["patients_comp_on_rtn_of_emrgncy"]= $row["patients_comp_on_rtn_of_emrgncy"];
		   $output["retn_of_emrgncy"]= $row["retn_of_emrgncy"];
		   $output["retn_of_emrgncy_reson"]= $row["retn_of_emrgncy_reson"];
		   $output["sign"]= $row["sign"];



		 

		
		//echo json_encode($output);
	}

	$statement = $connection->prepare(
		"SELECT * FROM tbl_emrgncy_reg_ipd2
		WHERE emrgncy_register_ipd_id = '".$output["emrgncy_register_ipd_id"]."' 
		"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	

    $count = 0;
      $output["oldDataCount"] =count($result);
    if(count($result)>0){
    	
     foreach ($result as $as => $row) {
     	 
     	  $count++;
       

     	
		$output["one"][$as] = $row["date_of_patient_arrvl_at_emrgncy"];
		$output["two"][$as] = $row["time_of_patient_arrvl_at_emrgncy"];
		$output["three"][$as] = $row["time_of_intl_ass_is_cmpltd_by_doc"];
		$output["four"][$as] = cal_date($row["time_taken_for_initl_assmnt"]);

		$output["five"][$as] = $row["patient_cmplnt"];
		$output["six"][$as] = $row["m_l_c"];
		$output["seven"][$as] = $row["brought_dead"];
		$output["eight"][$as] = $row["return_to_emergency"];
		$output["nine"][$as] = $row["date_of_retrn_to_emrgncy_dept_if_any"];
		$output["ten"][$as] = $row["time_of_retrn_to_emrgncy_dept_if_any"];
		$output["eleven"][$as] = $row["patients_comp_on_rtn_of_emrgncy"];
		$output["twelve"][$as] = $row["retn_of_emrgncy"];
		$output["thirteen"][$as] = $row["sign"];
		$output["fourteen"][$as] = $row["retn_of_emrgncy_reson"];
		$output["emrgncy_reg_ipd2_id"][$as] = $row["emrgncy_reg_ipd2_id"];
		$output["three1"][$as] = $row["date_of_intl_ass_is_cmpltd_by_doc"];

     }
 }

 echo json_encode($output);
}
?>