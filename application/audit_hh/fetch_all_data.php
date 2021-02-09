<?php
//error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
//$dt = date('Y');
$query = '';

$output = array();
$dArry = array();
$tbl = $_POST['tbl'];



  


  $dArry['tbl_audit_hh1']=array(0=>'Hand hygiene',1=>'1');
  $dArry['tbl_audit_hh2']=array(0=>'Bio-Medical Waste Management',1=>'2');
  $dArry['tbl_audit_hh3']=array(0=>'Sharp Safety Audit',1=>'3');
  $dArry['tbl_audit_hh4']=array(0=>'Spillage and / or Contamination with blood/ body fluids',1=>'4');
  $dArry['tbl_audit_hh5']=array(0=>'Environment Audit',1=>'5');
  $dArry['tbl_audit_hh6']=array(0=>'Management of Patient Equipment',1=>'6');
  $dArry['tbl_audit_hh7']=array(0=>' Resuscitation equipment',1=>'7');
  $dArry['tbl_audit_hh8']=array(0=>'Transportation & Handling of Specimens',1=>'8');
  $dArry['tbl_audit_hh9']=array(0=>' Kitchens',1=>'9');
  /*$dArry[10]=array(0=>'HIC 10',1=>'tbl_audit_hh10');*/
  $dArry['tbl_audit_hh11']=array(0=>'Care of Invasive device',1=>'11');
  $dArry['tbl_audit_hh12']=array(0=>'Care of Urinary Catheter',1=>'12');
  $dArry['tbl_audit_hh13']=array(0=>'Care ventilated patient',1=>'13');
  $dArry['tbl_audit_hh14']=array(0=>'Enteral feeding',1=>'14');
  $dArry['tbl_audit_hh15']=array(0=>'Isolation Precautions',1=>'15');
  $dArry['tbl_audit_hh16']=array(0=>'Laundry Audit',1=>'16');
  $dArry['tbl_audit_hh17']=array(0=>'Ward management of linen',1=>'17');
  $dArry['tbl_audit_hh18']=array(0=>'Endoscopy',1=>'18');
  $dArry['tbl_audit_hh19']=array(0=>'Infection Prevention and Control-Management',1=>'19');
  $dArry['tbl_audit_hh20']=array(0=>'Operation Theatre Asepsis',1=>'20');
  $dArry['tbl_audit_hh21']=array(0=>'CSSD',1=>'21');
  $dArry['tbl_audit_hh22']=array(0=>'ANTIMICROBIAL STEWARDSHIP Audit',1=>'22');


$query = "SELECT * FROM $tbl GROUP BY quarter,month_id";


$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


//die();
$data = array();
$filtered_rows = $statement->rowCount();
$mnt = array(1 => 'January', 2 => 'April',3 => 'July',4 => 'October');
foreach($result as $row)
{
	$mid = $row["quarter"].'_'.$row["month_id"];
	$cid = $dArry[$tbl][1].'_'.$row["quarter"].'_'.$row["month_id"];
  $cid = "'".$cid."'";
  $audit_name1="'".$dArry[$tbl][0]."'";
	$sub_array = array();
	if($typ == 'Admin')
	{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$mid.'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$mid.'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a id="myModel" data-whatever="'.$mid.' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to Add Repost" id="'.$row["id"].'" class="saveCPReport" onclick="saveCPReport('.$cid.','.($audit_name1).')" ><i style="color:blue;" class="fa fa-pencil fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$mid.'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#exampleModal" data-whatever="'.$mid.' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to Add Repost" id="'.$row["id"].'" class="saveCPReport" onclick="saveCPReport('.$cid.','.($audit_name1).')" ><i style="color:blue;" class="fa fa-pencil fa-fw"></i></a>';	
	}
	//$sub_array[] = $row["quarter"];
	//echo $mtt = strtotime($row['crdate']);
	
  $sub_array[] = $row['quarter'];
  $sub_array[] = $row['month'];//date('F');
  $sub_array[] = $row['crdate'];
  $sub_array[] = $row['name'];
  $sub_array[] = $row['sign'];
  


 
	$data[] = $sub_array;
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$filtered_rows,
	"data"				=>	$data
);
echo json_encode($output);
?>