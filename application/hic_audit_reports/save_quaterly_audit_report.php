<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
 $data = [];
 
$report_name_d=$_POST['report_name_d'];


if(isset($_POST['report_name']) && isset($_POST['report_name_id'])){
	if(!isset($_POST['corrective_action'])){
		$_POST['corrective_action']=array(0=>'');
	}
	if(!isset($_POST['preventive_action'])){
		$_POST['preventive_action']=array(0=>'');
	}

	if(($_POST['corrective_action'][0]!='') || ($_POST['preventive_action'][0]!='')){

$tbl='tbl_quaterly_audit_reports';
$q="DELETE  FROM $tbl  WHERE tbl_quaterly_audit_details_id = '".$_POST["report_name_id"]."' AND audit_name='".$_POST["report_name"]."'";


$statement1 = $connection->prepare($q);


$result1 = $statement1->execute();

$data['audit_name']=$_POST['report_name'];
$data['tbl_quaterly_audit_details_id']=$_POST['report_name_id'];

$a=$_POST['corrective_action'];

$a[100]='';
$data['corrective_action']=	json_encode($a);

$b=$_POST['preventive_action'];
$b[100]='';
$data['preventive_action']=	json_encode($b);

$data['created_by']=	$ses;






		foreach(array_keys($data) as $field_name) {
                $data[$field_name] = mysqli_escape_string($connect,$data[$field_name]);
				if (!isset($field_string)) {
					$field_string = "`".strtolower($field_name)."`"; 
					$value_string = "'$data[$field_name]'";
				} else {
					$field_string .= ",`".strtolower($field_name)."`";
					$value_string .= ",'$data[$field_name]'";
				}
				
			}
		$statement = $connection->prepare("INSERT INTO $tbl ($field_string) VALUES ($value_string)");


		$result = $statement->execute();



		
				
		
		if(!empty($result))
		{
			echo $report_name_d .'"s Corrective & Preventive Action Submitted Successfully';
		}

	} else{
		echo $report_name_d .'"s Corrective & Preventive Action Not Saved ';
	}
		
	}	
	 //$data = json_decode(($data));
?>

