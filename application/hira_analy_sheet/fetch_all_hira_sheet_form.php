<?php
error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');
include('../function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_hira_analy_sheet ";
if(isset($_POST["search"]["value"]))
{


	
	$query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sign LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR date1 LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR time1 LIKE "%'.$_POST["search"]["value"].'%" ';
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY date1 DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	if($typ == 'Admin')
	{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["hira_analy_sheet_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>&nbsp;&nbsp;<a style="cursor:pointer;" title="Click here to delete" id="'.$row["hira_analy_sheet_id"].'" class="delete" ><i style="color:red;" class="fa fa-trash-o fa-fw"></i></a>';
	}else{
		$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["hira_analy_sheet_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';	
	}
	// $sub_array[] = $row["hira_analy_sheet_id"];
    $sub_array[] = $row['name'];
    
    $sub_array[] =  $row['date1']." ".$row['time1'];
   



    $sub_array[] = $row['place_dept'];
    $sub_array[] = $row['activity_name'];
    $sub_array[] = $row['occup_hzrd_name'];
    $sub_array[] = $row['occup_risk_name'];
      $sub_array[] = $row['engg_cntrl'];
 $sub_array[] = $row['moni_visal_display'];
 $sub_array[] = $row['health_plan'];
 $sub_array[] = $row['l_c'];
 $sub_array[] = $row['e_c'];
 $sub_array[] = $row['m_s_d_s'];
 $sub_array[] = $row['h_b'];
 $sub_array[] = $row['protcl_polcy'];
 $sub_array[] = $row['p_p_e'];
  $sub_array[] = $row['desptn_lgl_reqrmnt'];
 $sub_array[] = $row['severity'];
 $sub_array[] = $row['prob_of_occrance'];
 $sub_array[] = $row['score'];
 $sub_array[] = $row['residual_risk'];
 $sub_array[] = $row['critria_signfcne'];
 $sub_array[] = $row['action_plan'];


   




 
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