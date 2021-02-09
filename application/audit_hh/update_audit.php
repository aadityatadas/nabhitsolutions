<?php
include('../dbinfo.php');

/*print_r($_POST);
die();*/
if(isset($_POST["user_id"]))
{
	$tbl = $_POST['tbl'];
	$output = array();
	if ($tbl == 'tbl_audit_hh10') {
		$statement = $connection->prepare("SELECT * FROM $tbl WHERE id = '".$_POST["user_id"]."'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			  $output['id'] 			= $row['id'];
			  $output['sr_no'] 			= $row['sr_no'];
	   		  $output['sTime'] 			= $row['sTime'];
			  $output['dateVal'] 		= $row['dateVal'];//date('F');
			  $output['day'] 			= $row['day'];
			  $output['timeVal'] 		= $row['timeVal'];
			  $output['prof'] 			= $row['prof'];
			  $output['nameVal'] 		= $row['nameVal'];
			  $output['sex'] 			= $row['sex'];//date('F');
			  $output['hh'] 			= $row['hh'];
			  $output['tech'] 			= $row['tech'];
			  $output['usedProduct'] 	= $row['usedProduct'];
			  $output['towel'] 			= $row['towel'];
			  $output['noninvasive'] 	= $row['noninvasive'];//date('F');
			  $output['invasive'] 		= $row['invasive'];
			  $output['fluid'] 			= $row['fluid'];
			  $output['contact'] 		= $row['contact'];
			  $output['surroundings'] 	= $row['surroundings'];
			  $output['name'] 			= $row['name'];
			  $output['sign'] 			= $row['sign'];
		}
		
	} else {
		$qut = explode('_', $_POST["user_id"]);
		
		$statement = $connection->prepare("SELECT * FROM $tbl WHERE quarter = '".$qut[0]."' and month_id = '".$qut[1]."'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$sub_array = array();
			$output['mthId'] = $_POST["user_id"];
	   		$output['quarter'] = $row['quarter'];
			$output['month'] = $row['month'];
			$output['name'] = $row['name'];
			$output['sign'] = $row['sign'];

			$sub_array[] = $row['arry_id'];
			$sub_array[] = $row['yn_val'];
	  		$sub_array[] = $row['cmmnt'];

		    $output['data'][] = $sub_array;
				




			
			//echo json_encode($output);
		}
	}
	
	

	echo json_encode($output);
}
?>