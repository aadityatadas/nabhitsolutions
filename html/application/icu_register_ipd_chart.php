<?php
error_reporting();
session_start();
include('dbinfo.php');
// $_POST["frdate"]='2019-06-01';
// $_POST["todate"]='2019-06-31';

if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','No of Patient Admitted','No of Patient Transfer/Discharge','Icu occupancy rate');
	
	

	// main table
	$sq = "SELECT DISTINCT date_of_admison_in_icu FROM tbl_icu_register_ipd WHERE (date_of_admison_in_icu BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND date_of_admison_in_icu != '' ORDER BY date_of_admison_in_icu ASC";
	$rs = mysqli_query($connect, $sq);
	$date1 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date1[] = $res["date_of_admison_in_icu"];
		
	}


	
	// add on table
	$sq = "SELECT DISTINCT date_of_admison_in_icu FROM tbl_icu_ipd2 WHERE (date_of_admison_in_icu BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND date_of_admison_in_icu != '' ORDER BY date_of_admison_in_icu ASC";
	$rs = mysqli_query($connect, $sq);
	$date2 = array();
	while($res = mysqli_fetch_array($rs))
	{
		$date2[] = $res["date_of_admison_in_icu"];
		
	}
	//	$data = array($data);
	
	$datearray = array_unique(array_merge($date2,$date1));			
	
  	
	    
	function date_sort($a, $b) {
    	return strtotime($a) - strtotime($b);
	}
	usort($datearray, "date_sort");

	function cal_data($table1,$hufdt,$connect){
		$qryICU1 = mysqli_query($connect,"SELECT count(*) as total_icu FROM $table1 WHERE (date_of_admison_in_icu = '$hufdt') AND date_of_admison_in_icu !='' ")or die(mysqli_error($connect));
	$resICU1 = mysqli_fetch_assoc($qryICU1);
	$total_icu = $resICU1["total_icu"];

	$qryICU2 = mysqli_query($connect,"SELECT count(*) as total_icu_dis FROM $table1 WHERE (date_of_disc_trans_in_icu = '$hufdt') AND date_of_disc_trans_in_icu !='' ")or die(mysqli_error($connect));
	$resICU2 = mysqli_fetch_assoc($qryICU2);
	$total_icu_dis = $resICU2["total_icu_dis"];

	$data1 = array('total_icu'=> $total_icu , 'total_icu_dis'=> $total_icu_dis);

	    return $data1;
	}
	
	
	foreach ($datearray as $hufdt) 
	{
		
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$table1 = 'tbl_icu_register_ipd';
		$table2  = 'tbl_icu_ipd2';
		$tabledata = cal_data($table1,$hufdt , $connect);
		
		
		$total_icu = $tabledata['total_icu'];
		$total_icu_dis = $tabledata['total_icu_dis'];

		$tabledata = cal_data($table2,$hufdt , $connect);
		
		
		$total_icu += $tabledata['total_icu'];
		$total_icu_dis += $tabledata['total_icu_dis'];


	$s = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm = '$hufdt' )")or die(mysqli_error($connect));

	$cnt2 = mysqli_num_rows($s);
	if($cnt2){
	$icu_occu = abs((($cnt2-$total_icu)/$cnt2)*100);
	}else{
			$icu_occu =0 ;
	}
	
	$data[] = array($admdt,(int)$total_icu,(int)$total_icu_dis,(int)$icu_occu);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
