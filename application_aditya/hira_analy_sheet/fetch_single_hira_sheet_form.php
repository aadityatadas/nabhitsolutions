<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_hira_analy_sheet 
		WHERE hira_analy_sheet_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sr_no"] = $row["hira_analy_sheet_id"];
		 $output['name'] = $row['name'];
		$output['sign'] = $row['sign'];
		$output['date1'] = $row['date1'];
		$output['time1'] = $row['time1'];
        
		 $qry1 = "SELECT hira_place_dep_id FROM tbl_hira_place_dep WHERE place_name= '".$row['place_dept']."' ";
		
		$res1 = mysqli_query($connect, $qry1);
       
		$row1=mysqli_fetch_assoc($res1);

		
        $output['activity']=adibba($row1['hira_place_dep_id'],"tbl_hira_activity",$connection,'activity_name');
        $output['occp1']=adibba($row1['hira_place_dep_id'],"tbl_hira_occupation",$connection,'occupation_name');
        $output['occp2']=adibba($row1['hira_place_dep_id'],"tbl_hira_occp_risk",$connection,'occp_risk_name');
		
		
       
		$output['place_dept'] = $row1['hira_place_dep_id'];
		$output['activity_name'] = $row['activity_name'];
		$output['occup_hzrd_name'] = $row['occup_hzrd_name'];
		$output['occup_risk_name'] = $row['occup_risk_name'];
		$output['engg_cntrl'] = $row['engg_cntrl'];
		$output['moni_visal_display'] = $row['moni_visal_display'];
		$output['health_plan'] = $row['health_plan'];
		$output['l_c'] = $row['l_c'];
		$output['e_c'] = $row['e_c'];
		$output['m_s_d_s'] = $row['m_s_d_s'];
		$output['h_b'] = $row['h_b'];
		$output['protcl_polcy'] = $row['protcl_polcy'];
		$output['p_p_e'] = $row['p_p_e'];
		$output['desptn_lgl_reqrmnt'] = $row['desptn_lgl_reqrmnt'];
		$output['severity'] = $row['severity'];
		$output['prob_of_occrance'] = $row['prob_of_occrance'];
		$output['score'] = $row['score'];
		$output['residual_risk'] = $row['residual_risk'];
		$output['critria_signfcne'] = $row['critria_signfcne'];
		$output['action_plan'] = $row['action_plan'];



    




		
		echo json_encode($output);
	}
}

      function adibba($id,$table,$connection,$feild){
  

    $query = "SELECT $feild FROM $table WHERE tbl_hira_place_dep_id= '".$id."' ";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
     $data = array();
    foreach($result as $row)
   {
      $data[] = $row[$feild];
   }
    return $data;
		
  }
?>