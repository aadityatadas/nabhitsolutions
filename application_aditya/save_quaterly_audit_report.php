<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
 $data = [];


if(isset($_POST['report_name']) && isset($_POST['report_name_id'])){
$data['audit_name']=$_POST['report_name'];
$data['tbl_quaterly_audit_details_id']=$_POST['report_name_id'];

$a=array('Every prescription should be written in capital letters.','abc','xyz');

$a[100]='';
$data['corrective_action']=	json_encode($a);

$b=array(0=>"abc",1=>'kljkjkjk',2=>'kkljklj');
$b[100]='';
$data['preventive_action']=	json_encode($b);

$tbl='tbl_quaterly_audit_reports';


$report_name_d=$_POST['report_name_d'];


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
			echo $report_name_d .'C orrective & Preventive Action Submitted Successfully';
		}
		
	}	
	 //$data = json_decode(($data));
?>

