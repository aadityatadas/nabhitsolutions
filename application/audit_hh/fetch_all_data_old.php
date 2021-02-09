<?php
//error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
//$dt = date('Y');
$query = '';

$output = array();
$tbl = $_POST['tbl'];
$dArry['tbl_audit_hh1']='1';
  $dArry['tbl_audit_hh2']='2';
  $dArry['tbl_audit_hh3']='3';
  $dArry['tbl_audit_hh4']='4';
  $dArry['tbl_audit_hh5']='5';
  $dArry['tbl_audit_hh6']='6';
  $dArry['tbl_audit_hh7']='7';
  $dArry['tbl_audit_hh8']='8';
  $dArry['tbl_audit_hh9']='9';
  /*$dArry[10]='HIC 10',1=>'tbl_audit_hh10';*/
  $dArry['tbl_audit_hh11']='11';
  $dArry['tbl_audit_hh12']='12';
  $dArry['tbl_audit_hh13']='13';
  $dArry['tbl_audit_hh14']='14';
  $dArry['tbl_audit_hh15']='15';
  $dArry['tbl_audit_hh16']='16';
  $dArry['tbl_audit_hh17']='17';
  $dArry['tbl_audit_hh18']='18';
  $dArry['tbl_audit_hh19']='19';
  $dArry['tbl_audit_hh20']='20';
  $dArry['tbl_audit_hh21']='21';
  $dArry['tbl_audit_hh22']='22';
  
  
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
	$cid = $dArry[$tbl].'_'.$row["quarter"].'_'.$row["month_id"];
	$sub_array = array();
	if($typ == 'Admin')
	{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$mid.'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$mid.'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>&nbsp;&nbsp;<a id="myModel" data-whatever="'.$mid.' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a><a id="measureModel" data-whatever="'.$cid.' " style="cursor:pointer;" title="Click here to Add Measures" ><i style="color:green;" class="fa fa-sticky-note-o fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$mid.'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#exampleModal" data-whatever="'.$mid.' " style="cursor:pointer;" title="Click here to View" ><i style="color:orange;" class="fa fa-eye fa-fw"></i></a><a id="measureModel" data-whatever="'.$cid.' " style="cursor:pointer;" title="Click here to Add Measures" ><i style="color:green;" class="fa fa-sticky-note-o fa-fw"></i></a>';	
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