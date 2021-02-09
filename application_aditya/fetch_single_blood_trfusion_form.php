<?php
include('dbinfo.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_blood_fusion LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_blood_fusion.huf_id
		WHERE bld_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["bld_id"];
		$output["p_name"] = $row["huf_pname"];
		$output["uhid_no"] = $row["huf_uhid"];
		$output["ipd_no"] = $row["huf_ipd"];
		$output["mo1"] = $row["bld_prdreq"];
		$output["mo2"] = $row["bld_nounit"];
		$output["mo3"] = $row["bld_dtreq"];
		$output["mo4"] = $row["bld_tmreq"];
		$output["mo5"] = $row["bld_bankname"];
		$output["mo6"] = $row["bld_ordby"];
		$output["mo7"] = $row["bld_dtrec"];
		$output["mo8"] = $row["bld_norec"];
		$output["mo9"] = $row["bld_tmrec"];
		$output["mo10"] = $row["bld_tat"];
		$output["mo11"] = $row["bld_recby"];
		$output["mo12"] = $row["bld_notrfus"];
		$output["mo13"] = $row["bld_trfusreact"];
		$output["mo14"] = $row["bld_waste"];
		$output["mo15"] = $row["bld_waste_det"];



     //for add on
		$statement = $connection->prepare(
		"SELECT * FROM tbl_blood_fusion_extra
		WHERE bld_id = '".$_POST["user_id"]."' 
		"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	

    $count = 0;
      $output["oldDataCount"] =count($result);
    if(count($result)>0){
    	
     foreach ($result as $as => $row) {
     	 
     	  $count++;
         	
          // print_r($row);
  //  $dd_dt = $row["vent_dt_iuc"];		
		// $new_time = explode(" ",$dd_dt);
		// $get_date = $new_time[0];
		// $get_time = $new_time[1];
		// $output["one"][$as] = $get_date;
		// $output["two"][$as] = $get_time;
				
		
		// $dd_dt1 = $row["vent_dt_ruc"];
		// $new_time1 = explode(" ",$dd_dt1);
		// $get_date1 = $new_time1[0];
		// $get_time1 = $new_time1[1];
		// $output["three"][$as] = $get_date1;
		// $output["four"][$as] = $get_time1;
		
		// $output["five"][$as] = $row["vent_tcd"];
		// $output["six"][$as] = $row["vent_sympt"];
		// $output["seven"][$as] = $row["vent_sympt_det"];
		// $output["eight"][$as] = $row["vent_ssc"];
		// $output["nine"][$as] = $row["vent_spc"];
		// $output["vent_ass_pn_id"][$as] = $row["vent_ass_phmn_id"];
		// $output["tbl_huf_id"][$as] = $row["tbl_huf_id"];
           $output["mo1_old"][$as] = $row["bld_prdreq"];
		$output["mo2_old"][$as] = $row["bld_nounit"];
		$output["mo3_old"][$as] = $row["bld_dtreq"];
		$output["mo4_old"][$as] = $row["bld_tmreq"];
		$output["mo5_old"][$as] = $row["bld_bankname"];
		$output["mo6_old"][$as] = $row["bld_ordby"];
		$output["mo7_old"][$as] = $row["bld_dtrec"];
		$output["mo8_old"][$as] = $row["bld_norec"];
		$output["mo9_old"][$as] = $row["bld_tmrec"];
		$output["mo10_old"][$as] = $row["bld_tat"];
		$output["mo11_old"][$as] = $row["bld_recby"];
		$output["mo12_old"][$as] = $row["bld_notrfus"];
		$output["mo13_old"][$as] = $row["bld_trfusreact"];
		$output["mo14_old"][$as] = $row["bld_waste"];
		$output["mo15_old"][$as] = $row["bld_waste_det"];

		$output["bld_extra_id"][$as] = $row["bld_extra_id"];
		$output["bld_id"][$as] = $row["bld_id"];

     }
 }
    
		
		echo json_encode($output);
	}
}
?>