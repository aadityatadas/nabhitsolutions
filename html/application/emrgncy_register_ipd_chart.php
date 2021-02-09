<?php
error_reporting(0);
session_start();
include('dbinfo.php');
 

 function find_data($table,$hufdt){

		$data = array();
		$qryEm1 = mysqli_query($connect,"SELECT COUNT(*) as no_of_emer FROM $table  WHERE date_of_patient_arrvl_at_emrgncy = '$hufdt' ")or die(mysqli_error($connect));

   
		$resEm1 = mysqli_fetch_assoc($qryEm1);

		$no_of_emer = $resEm1["no_of_emer"];
		$data['no_of_emer'] = $no_of_emer;

		$qryEm3 = mysqli_query($connect,"SELECT COUNT(*) as brought_dead FROM $table WHERE (date_of_patient_arrvl_at_emrgncy = '$hufdt') AND brought_dead='yes'")or die(mysqli_error($connect));
		$resEm3 = mysqli_fetch_assoc($qryEm3);

	    	$brought_dead   = $resEm3['brought_dead'];
	    	$data['brought_dead'] = $brought_dead;

	   $qryEm4 = mysqli_query($connect,"SELECT COUNT(*) as back_to_emrgncy FROM $table WHERE (date_of_patient_arrvl_at_emrgncy = '$hufdt') AND date_of_retrn_to_emrgncy_dept_if_any !=''")or die(mysqli_error($connect));
	   $resEm4 = mysqli_fetch_assoc($qryEm4);

	    $back_to_emrgncy   = $resEm4['back_to_emrgncy'];
	    $data['back_to_emrgncy'] = $back_to_emrgncy;

	    return "adi";
	}

if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','
	Total No of Emergencies','No of Brought Dead','Total No of Return to Emergency Dep');

	
	// main table
	$sq = "SELECT DISTINCT date_of_patient_arrvl_at_emrgncy FROM tbl_emrgncy_register_ipd WHERE (date_of_patient_arrvl_at_emrgncy BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND patient_cmplnt != '' ORDER BY date_of_patient_arrvl_at_emrgncy ASC";
	$rs = mysqli_query($connect, $sq);
	$date1 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date1[] = $res["date_of_patient_arrvl_at_emrgncy"];
		
	}


	
	// add on table
	$sq = "SELECT DISTINCT date_of_patient_arrvl_at_emrgncy FROM tbl_emrgncy_reg_ipd2 WHERE (date_of_patient_arrvl_at_emrgncy BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND patient_cmplnt != '' ORDER BY date_of_patient_arrvl_at_emrgncy ASC";
	$rs = mysqli_query($connect, $sq);
	$date2 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date2[] = $res["date_of_patient_arrvl_at_emrgncy"];
		
	}
	//	$data = array($data);
	
	$datearray = array_unique(array_merge($date2,$date1));			
	
  	
	    
	function date_sort($a, $b) {
    	return strtotime($a) - strtotime($b);
	}
	usort($datearray, "date_sort");
	

	foreach ($datearray as $hufdt) 
	{
		
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$table = 'tbl_emrgncy_register_ipd';

		// $data_array = find_data($table,$hufdt);
		
		// $no_of_emer = $data_array['no_of_emer'];
		// $brought_dead=$data_array['brought_dead'];
		// $back_to_emrgncy=$data_array['back_to_emrgncy'];
		$qryEm1 = mysqli_query($connect,"SELECT COUNT(*) as no_of_emer FROM $table  WHERE date_of_patient_arrvl_at_emrgncy = '$hufdt' ")or die(mysqli_error($connect));

   
		$resEm1 = mysqli_fetch_assoc($qryEm1);

		$no_of_emer = $resEm1["no_of_emer"];
		

		$qryEm3 = mysqli_query($connect,"SELECT COUNT(*) as brought_dead FROM $table WHERE (date_of_patient_arrvl_at_emrgncy = '$hufdt') AND brought_dead='yes'")or die(mysqli_error($connect));
		$resEm3 = mysqli_fetch_assoc($qryEm3);

	    	$brought_dead   = $resEm3['brought_dead'];
	    	

	   $qryEm4 = mysqli_query($connect,"SELECT COUNT(*) as back_to_emrgncy FROM $table WHERE (date_of_patient_arrvl_at_emrgncy = '$hufdt') AND date_of_retrn_to_emrgncy_dept_if_any !=''")or die(mysqli_error($connect));
	   $resEm4 = mysqli_fetch_assoc($qryEm4);

	    $back_to_emrgncy   = $resEm4['back_to_emrgncy'];
	    $table2 = 'tbl_emrgncy_reg_ipd2';
  /// for add on
	    $qryEm1 = mysqli_query($connect,"SELECT COUNT(*) as no_of_emer FROM $table2  WHERE date_of_patient_arrvl_at_emrgncy = '$hufdt' ")or die(mysqli_error($connect));

   
		$resEm1 = mysqli_fetch_assoc($qryEm1);

		$no_of_emer += $resEm1["no_of_emer"];
		

		$qryEm3 = mysqli_query($connect,"SELECT COUNT(*) as brought_dead FROM $table2 WHERE (date_of_patient_arrvl_at_emrgncy = '$hufdt') AND brought_dead='yes'")or die(mysqli_error($connect));
		$resEm3 = mysqli_fetch_assoc($qryEm3);

	    	$brought_dead   += $resEm3['brought_dead'];
	    	

	   $qryEm4 = mysqli_query($connect,"SELECT COUNT(*) as back_to_emrgncy FROM $table2 WHERE (date_of_patient_arrvl_at_emrgncy = '$hufdt') AND date_of_retrn_to_emrgncy_dept_if_any !=''")or die(mysqli_error($connect));
	   $resEm4 = mysqli_fetch_assoc($qryEm4);

	    $back_to_emrgncy   += $resEm4['back_to_emrgncy'];
	   
		
		
		$data[] = array($admdt,(float)$no_of_emer,(int)$brought_dead,(int)$back_to_emrgncy);		  
		
	}

	echo json_encode($data);
}	
?>
