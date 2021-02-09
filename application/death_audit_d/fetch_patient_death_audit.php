<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');


if(isset($_POST["user_id"]))
{
	$output = array();
	$query =  "SELECT tbl_death_audit.*,tbl_huf.huf_pname,tbl_huf.huf_ipd,tbl_huf.huf_dddd,tbl_huf.huf_ddd,tbl_huf.huf_tddd,tbl_huf.huf_dadm FROM `tbl_death_audit`
           LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id
            WHERE tbl_death_audit.id = '".$_POST["user_id"]."' 
		    LIMIT 1";


		   
	$statement = $connection->prepare(

		$query
		
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

			
		$output["sr_no"] = $row["id"];
		$output["p_name"] = $row["huf_pname"];
		
		$output["ipd_no"] = $row["huf_ipd"];
		$output["huf_dadm"] = $row["huf_dadm"];
		
		
		$output["ddd"] = $row["huf_ddd"];
		$output["tddd"] = $row["huf_tddd"];
				
		$output["dddd"] = $row["huf_dddd"];		
		$output['da']['condition_at_admsion'] = $row['condition_at_admsion'];
$output['da']['primary_diagn'] = $row['primary_diagn'];
$output['da']['cause_of_death'] = $row['cause_of_death'];
$output['da']['date_death'] = $row['date_death'];
$output['da']['time_death'] = $row['time_death'];
$output['da']['expected_un_death'] = $row['expected_un_death'];
$output['da']['apache_score'] = $row['apache_score'];
$output['da']['sofa_score'] = $row['sofa_score'];
$output['da']['vent_status'] = $row['vent_status'];
$output['da']['surg_prodr'] = $row['surg_prodr'];
$output['da']['any_event'] = $row['any_event'];
$output['da']['cons_incharge'] = $row['cons_incharge'];
$output['da']['other_con_involve'] = $row['other_con_involve'];
$output['da']['comorbid_condtin'] = $row['comorbid_condtin'];
$output['da']['relavant_lab_invt'] = $row['relavant_lab_invt'];
$output['da']['relavant_radio_invt'] = $row['relavant_radio_invt'];
$output['da']['cpr_status'] = $row['cpr_status'];
$output['da']['condition_of_stay_mangnmt'] = $row['condition_of_stay_mangnmt'];

$output['da1']['team_work'] = $row['team_work'];
$output['da1']['technq_mang_care'] = $row['technq_mang_care'];
$output['da1']['med_error'] = $row['med_error'];
$output['da1']['decisn_making'] = $row['decisn_making'];
$output['da1']['staff_skill_comp'] = $row['staff_skill_comp'];
$output['da1']['comm_error'] = $row['comm_error'];
$output['da1']['eco_fact_patient'] = $row['eco_fact_patient'];



		
		echo json_encode($output);
	}
}
?>