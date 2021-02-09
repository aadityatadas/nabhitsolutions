<?php
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT tbl_opdwttm.* , tbl_lab_opd.* FROM tbl_opdwttm LEFT JOIN tbl_lab_opd ON tbl_opdwttm.opdwttm_id = tbl_lab_opd.tbl_opdwttm_id ";


// SELECT *
// FROM tbl_opdwttm
// LEFT JOIN tbl_lab_ipd ON tbl_opdwttm.opdwttm_id = tbl_lab_ipd.tbl_uhf_id
//  ORDER BY `opdwttm_id` DESC

// SELECT *
// FROM tbl_opdwttm
// LEFT JOIN tbl_lab_ipd ON     tbl_opdwttm.opdwttm_id = tbl_lab_ipd.tbl_uhf_id
//  ORDER BY `opdwttm_id` DESC
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE opdwttm_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_opd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR opdwttm_dttmr LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_dt_iuc LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_dt_ruc LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_tcd LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_sympt LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_sympt_det LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_ssc LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR vent_spc LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY `opdwttm_id` DESC ';
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
	$centid = $row["opdwttm_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["opdwttm_id"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["opdwttm_id"];
	// $sub_array[] = $row["lab_ipd_id"];

	
	$sub_array[] = $row["opdwttm_pname"];
	$sub_array[] = $row["opdwttm_uhid"];
	$sub_array[] = $row["opdwttm_opd"];
	


		$dd_dt = $row["opdwttm_dttmr"];	
		if($dd_dt){	
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$sub_array[] = $get_date;
	} else {
		$sub_array[] = '';
	}
	// $sub_array[] = $row["vent_dt_iuc"];
	// $sub_array[] = $row["vent_dt_ruc"];

	// data from tbl_lab_ipd


// 	$sub_array[] = $row["lab_ipd_id"];

// $sub_array[] = $row["tbl_uhf_id"];

	$query1 = "SELECT * FROM tbl_lab_opd_extra WHERE tbl_lab_opd_id = '".$row["lab_opd_id"]."'";  
      $result1 = mysqli_query($connect, $query1);

if($result1->num_rows >0){
      
      $c = 2;

 $prov_finl_daig = '';
$nam_of_test = '';
$sample_rec_time_date = '';
$time_date_of_rep_gen = '';
$total_time = '';
$inv_result = '';
$cri_res_if_any = '';
$cri_alrt_details = '';
$result_time = '';
$info_time = '';
$info_to = '';
$info_by = '';
$resp_err = '';
$res_err_rsn = '';
$redos = '';
$redos_rsn = '';
$rep_cor_clin_diag = '';
$clinical_correlation = '';
$remarks = '';


	while ($row1 = mysqli_fetch_assoc($result1)) {
      	
        
         
  $prov_finl_daig.= $c.') '.$row1['prov_finl_daig'].'<br>';
$nam_of_test.= $c.') '.$row1['nam_of_test'].'<br>';
$sample_rec_time_date.= $c.') '.$row1['sample_rec_time_date'].'<br>';
$time_date_of_rep_gen.= $c.') '.$row1['time_date_of_rep_gen'].'<br>';
$total_time.= $c.') '.$row1['total_time'].'<br>';
$inv_result.= $c.') '.$row1['inv_result'].'<br>';
$cri_res_if_any.= $c.') '.$row1['cri_res_if_any'].'<br>';
$cri_alrt_details.= $c.') '.$row1['cri_alrt_details'].'<br>';
$result_time.= $c.') '.$row1['result_time'].'<br>';
$info_time.= $c.') '.$row1['info_time'].'<br>';
$info_to.= $c.') '.$row1['info_to'].'<br>';
$info_by.= $c.') '.$row1['info_by'].'<br>';
$resp_err.= $c.') '.$row1['resp_err'].'<br>';
$res_err_rsn.= $c.') '.$row1['res_err_rsn'].'<br>';
$redos.= $c.') '.$row1['redos'].'<br>';
$redos_rsn.= $c.') '.$row1['redos_rsn'].'<br>';
$rep_cor_clin_diag.= $c.') '.$row1['rep_cor_clin_diag'].'<br>';
$clinical_correlation.= $c.') '.$row1['clinical_correlation'].'<br>';
$remarks.= $c.') '.$row1['remarks'].'<br>';

   
         
         $c++;
      }

   $sub_array[] = '1) '.$row['prov_finl_daig'].'<br>'.$prov_finl_daig;
$sub_array[] = '1) '.$row['nam_of_test'].'<br>'.$nam_of_test;
$sub_array[] = '1) '.$row['sample_rec_time_date'].'<br>'.$sample_rec_time_date;
$sub_array[] = '1) '.$row['time_date_of_rep_gen'].'<br>'.$time_date_of_rep_gen;
$sub_array[] = '1) '.$row['total_time'].'<br>'.$total_time;
$sub_array[] = '1) '.$row['inv_result'].'<br>'.$inv_result;
$sub_array[] = '1) '.$row['cri_res_if_any'].'<br>'.$cri_res_if_any;
$sub_array[] = '1) '.$row['cri_alrt_details'].'<br>'.$cri_alrt_details;
$sub_array[] = '1) '.$row['result_time'].'<br>'.$result_time;
$sub_array[] = '1) '.$row['info_time'].'<br>'.$info_time;
$sub_array[] = '1) '.$row['info_to'].'<br>'.$info_to;
$sub_array[] = '1) '.$row['info_by'].'<br>'.$info_by;
$sub_array[] = '1) '.$row['resp_err'].'<br>'.$resp_err;
$sub_array[] = '1) '.$row['res_err_rsn'].'<br>'.$res_err_rsn;
$sub_array[] = '1) '.$row['redos'].'<br>'.$redos;
$sub_array[] = '1) '.$row['redos_rsn'].'<br>'.$redos_rsn;
$sub_array[] = '1) '.$row['rep_cor_clin_diag'].'<br>'.$rep_cor_clin_diag;
$sub_array[] = '1) '.$row['clinical_correlation'].'<br>'.$clinical_correlation;
$sub_array[] = '1) '.$row['remarks'].'<br>'.$remarks;

     
     } else {
	
	
	

$sub_array[] = $row["prov_finl_daig"];
$sub_array[] = $row["nam_of_test"];
$sub_array[] = $row["sample_rec_time_date"];




$sub_array[] = $row["time_date_of_rep_gen"];

$sub_array[] = $row["total_time"];

$sub_array[] = $row["inv_result"];

$sub_array[] = $row["cri_res_if_any"];

$sub_array[] = $row["cri_alrt_details"];

$sub_array[] = $row["result_time"];

$sub_array[] = $row["info_time"];

$sub_array[] = $row["info_to"];

$sub_array[] = $row["info_by"];

$sub_array[] = $row["resp_err"];

$sub_array[] = $row["res_err_rsn"];

$sub_array[] = $row["redos"];
$sub_array[] = $row["redos_rsn"];	

$sub_array[] = $row["rep_cor_clin_diag"];

$sub_array[] = $row["clinical_correlation"];

$sub_array[] = $row["remarks"];

}


	
	//$tcd = $row["vent_tcd"];
	//$tcd1 = $tcd / 24;
	
	
	
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