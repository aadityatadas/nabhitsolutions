<?php
error_reporting();
session_start();
include('../dbinfo.php');

/*print_r($_POST);
die();*/
if(isset($_POST["frdate"],$_POST["todate"]))
{
	
	
		$tbl = $_POST["tbl"];
		$qut = $_POST['qut'];
		
		//$data[] = array('Quarter','No. of Yes','No. of No','No. of Na');
		//WHERE vent_dt_iuc BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."'
	// main table
		$sq = "SELECT * FROM $tbl WHERE (dateVal BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND sTime = '".$qut."' ORDER BY id ASC";
		
		$statement = $connection->prepare($sq);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		$resYes = 0;
		$resNo = 0;
		$resNa = 0;
		foreach ($result as $key) {
			foreach ($key as $v1 => $value) {
				
				($value == 'Yes')? $resYes++ : '';
				($value == 'No')? $resNo++ : '';
				($value == 'N/A')? $resNa++ : '';

			}
		}
		
$data[0] = array('abc','Yes','No','N/A'); 
	
	$data[1] = array($qut,(int)$resYes,(int)$resNo,(int)$resNa); 
		
	//print_r($data);
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
