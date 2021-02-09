<?php
error_reporting(0);
session_start();
include('dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_care_evt LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_care_evt.huf_id
		WHERE care_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["care_id"];
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["mo1"] = $row["care_dtpli"];
		$output["mo2"] = $row["care_tmpli"];
		$output["mo3"] = $row["care_vipsc"];
		$output["mo4"] = $row["care_signsymp"];
		$output["mo5"] = $row["care_signsymp_det"];
		$output["mo6"] = $row["care_signsymp_th"];
		$output["mo7"] = $row["care_signsymp_th_det"];
		$output["mo8"] = $row["care_bradsc"];
		$output["mo9"] = $row["care_signsyp_bed"];
		$output["mo10"] = $row["care_signsyp_bed_det"];
		$output["mo11"] = $row["care_mor_sc"];
		$output["mo12"] = $row["care_incd_ptfall"];
		$output["mo13"] = $row["care_incd_ptfall_det"];
		$output["mo14"] = $row["care_iardl"];
		$output["mo15"] = $row["care_iardl_det"];
		$output["mo16"] = $row["care_injtpt"];
		$output["mo17"] = $row["care_injtpt_det"];

		//for add on
		$statement = $connection->prepare(
		"SELECT * FROM tbl_care_evt_extra
		WHERE care_id = '".$_POST["user_id"]."' 
		"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	

    $count = 0;
      $output["oldDataCount"] =count($result);
    if(count($result)>0){
    	
     foreach ($result as $as => $row) {
     	 
     	  $count++;
         	
          
         $output["mo1_old"][$as] = $row["care_dtpli"];
		$output["mo2_old"][$as] = $row["care_tmpli"];
		$output["mo3_old"][$as] = $row["care_vipsc"];
		$output["mo4_old"][$as] = $row["care_signsymp"];
		$output["mo5_old"][$as] = $row["care_signsymp_det"];
		$output["mo6_old"][$as] = $row["care_signsymp_th"];
		$output["mo7_old"][$as] = $row["care_signsymp_th_det"];
		$output["mo8_old"][$as] = $row["care_bradsc"];
		$output["mo9_old"][$as] = $row["care_signsyp_bed"];
		$output["mo10_old"][$as] = $row["care_signsyp_bed_det"];
		$output["mo11_old"][$as] = $row["care_mor_sc"];
		$output["mo12_old"][$as] = $row["care_incd_ptfall"];
		$output["mo13_old"][$as] = $row["care_incd_ptfall_det"];
		$output["mo14_old"][$as] = $row["care_iardl"];
		$output["mo15_old"][$as] = $row["care_iardl_det"];
		$output["mo16_old"][$as] = $row["care_injtpt"];
		$output["mo17_old"][$as] = $row["care_injtpt_det"];

		$output["care_extra_id"][$as] = $row["care_extra_id"];
		$output["care_id"][$as] = $row["care_id"];

     }
 }
		
		echo json_encode($output);
	}
}
?>