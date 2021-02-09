<?php
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT tbl_huf.* , tbl_emrgncy_register_ipd.* FROM tbl_huf LEFT JOIN tbl_emrgncy_register_ipd ON tbl_huf.huf_id = tbl_emrgncy_register_ipd.tbl_huf_id  WHERE tbl_huf.tyofadmison != 'Planned' ";

function cal_date($diff){
 	

 	if (strpos($diff,':') !== false) {
			return $diff;
	}elseif(!$diff){
		return $diff;
	}else {

	$timeMinTotal =  floor(($diff/60));
			
	$timeInMin= $timeMinTotal%60;
			
	$timeInhr= floor($timeMinTotal/60);
	$diffrenceInHr =$timeInhr.":".$timeInMin;

	return $diffrenceInHr;
}
}




// SELECT *
// FROM tbl_huf
// LEFT JOIN tbl_lab_ipd ON tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id
//  ORDER BY `huf_id` DESC

// SELECT *
// FROM tbl_huf
// LEFT JOIN tbl_lab_ipd ON     tbl_huf.huf_id = tbl_lab_ipd.tbl_uhf_id
//  ORDER BY `huf_id` DESC
if(isset($_POST["search"]["value"]))
{
	$query .= 'AND (huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%") ';
	
	
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY `huf_id` DESC ';
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
	$centid = $row["huf_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["huf_id"];
	// $sub_array[] = $row["lab_ipd_id"];

	
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$filtered_rows1 = 0;
    if($row["emrgncy_register_ipd_id"] != '')
    {
    	$num = '1) ';
    	$query1 = "SELECT * FROM tbl_emrgncy_reg_ipd2 WHERE emrgncy_register_ipd_id = '".$row["emrgncy_register_ipd_id"]."'";
		$statement1 = $connection->prepare($query1);
		$statement1->execute();
		$result1 = $statement1->fetchAll();
		$data1 = array();
		$filtered_rows1 = $statement1->rowCount();
    }
    else
    {
    	$num = '';
    }

	$date_of_patient_arrvl_at_emrgncy     = $num.$row["date_of_patient_arrvl_at_emrgncy"];
	$time_of_patient_arrvl_at_emrgncy     = $num.$row["time_of_patient_arrvl_at_emrgncy"];
	$date_of_intl_ass_is_cmpltd_by_doc    = $num.$row["date_of_intl_ass_is_cmpltd_by_doc"];
	$time_of_intl_ass_is_cmpltd_by_doc    = $num.$row["time_of_intl_ass_is_cmpltd_by_doc"];
	
	$time_taken_for_initl_assmnt 		  = $num.cal_date($row["time_taken_for_initl_assmnt"]);

	
	$patient_cmplnt                       = $num.$row["patient_cmplnt"];
	$m_l_c                                = $num.$row["m_l_c"];
	$brought_dead                         = $num.$row["brought_dead"];
	$return_to_emergency                  = $num.$row["return_to_emergency"];
	$date_of_retrn_to_emrgncy_dept_if_any = $num.$row["date_of_retrn_to_emrgncy_dept_if_any"];
	$time_of_retrn_to_emrgncy_dept_if_any = $num.$row["time_of_retrn_to_emrgncy_dept_if_any"];
	$patients_comp_on_rtn_of_emrgncy      = $num.$row["patients_comp_on_rtn_of_emrgncy"];
	$retn_of_emrgncy                      = $num.$row["retn_of_emrgncy"];
	$sign                                 = $num.$row["sign"];
     
     $rcount = 2;
	if($filtered_rows1 > 0)
	{
		foreach($result1 as $row1)
		{
			$num = ',<br>'.$rcount.') ';
			$date_of_patient_arrvl_at_emrgncy     .= $num.$row1["date_of_patient_arrvl_at_emrgncy"];
			$time_of_patient_arrvl_at_emrgncy     .= $num.$row1["time_of_patient_arrvl_at_emrgncy"];
			$date_of_intl_ass_is_cmpltd_by_doc    .= $num.$row1["date_of_intl_ass_is_cmpltd_by_doc"];
			$time_of_intl_ass_is_cmpltd_by_doc    .= $num.$row1["time_of_intl_ass_is_cmpltd_by_doc"];
			
	


			$time_taken_for_initl_assmnt 		  .= $num.cal_date($row1["time_taken_for_initl_assmnt"]);


		
			$patient_cmplnt                       .= $num.$row1["patient_cmplnt"];
			$m_l_c                                .= $num.$row1["m_l_c"];
			$brought_dead                         .= $num.$row1["brought_dead"];
			$return_to_emergency                  .= $num.$row1["return_to_emergency"];
			$date_of_retrn_to_emrgncy_dept_if_any .= $num.$row1["date_of_retrn_to_emrgncy_dept_if_any"];
			$time_of_retrn_to_emrgncy_dept_if_any .= $num.$row1["time_of_retrn_to_emrgncy_dept_if_any"];
			$patients_comp_on_rtn_of_emrgncy      .= $num.$row1["patients_comp_on_rtn_of_emrgncy"];
			$retn_of_emrgncy                      .= $num.$row1["retn_of_emrgncy"];
			$sign                                 .= $num.$row1["sign"];
			$rcount++;
		}
	}



	  $sub_array[]= $date_of_patient_arrvl_at_emrgncy;
	  $sub_array[]= $time_of_patient_arrvl_at_emrgncy;
	   $sub_array[]= $date_of_intl_ass_is_cmpltd_by_doc;
	  $sub_array[]= $time_of_intl_ass_is_cmpltd_by_doc;
	 
	  $sub_array[]= $time_taken_for_initl_assmnt;
	  $sub_array[]= $patient_cmplnt;
	  $sub_array[]= $m_l_c;
	  $sub_array[]= $brought_dead;
	  $sub_array[]= $return_to_emergency;
	  $sub_array[]= $date_of_retrn_to_emrgncy_dept_if_any;
	  $sub_array[]= $time_of_retrn_to_emrgncy_dept_if_any;
	  $sub_array[]= $patients_comp_on_rtn_of_emrgncy;
	  $sub_array[]= $retn_of_emrgncy;
	  $sub_array[]= $sign;            



	
	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>