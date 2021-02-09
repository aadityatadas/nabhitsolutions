<?php
error_reporting(0);
session_start();
include('dbinfo.php');

function cal_data($tablename,$hufdt,$connect ){
	$qryICU1 = mysqli_query($connect,"SELECT count(*) as total_icu FROM $tablename WHERE (date_of_admison_in_icu = '$hufdt') AND date_of_admison_in_icu !='' ")or die(mysqli_error($connect));
	$resICU1 = mysqli_fetch_assoc($qryICU1);
	$total_icu = $resICU1["total_icu"];

	$qryICU3 = mysqli_query($connect,"SELECT count(*) as total_icu_return FROM $tablename WHERE (date_of_admison_in_icu = '$hufdt') AND retrn_to_icu_in_48hrs ='Yes' ")or die(mysqli_error($connect));
	$resICU3 = mysqli_fetch_assoc($qryICU3);
	$total_icu_return = $resICU3["total_icu_return"];

	$qryICU4 = mysqli_query($connect,"SELECT count(*) as total FROM $tablename WHERE (date_of_admison_in_icu = '$hufdt') AND re_admission ='Yes' ")or die(mysqli_error($connect));
	$resICU4 = mysqli_fetch_assoc($qryICU4);
	$total_re_admission = $resICU4["total"];

	$qryICU5 = mysqli_query($connect,"SELECT count(*) as total FROM $tablename WHERE (date_of_admison_in_icu = '$hufdt') AND re_intubation ='Yes' ")or die(mysqli_error($connect));
	$resICU5 = mysqli_fetch_assoc($qryICU5);
	$total_re_intubation = $resICU5["total"];

	

	return array('total_icu'=>$total_icu
				,'total_icu_return'=>$total_icu_return,
				'total_re_admission'=>$total_re_admission,
				'total_re_intubation'=>$total_re_intubation);

}
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','No of Patient Return to ICU in 48hrs','% of Patient Return to ICU in 48hrs','No of ReAdmission ','% of ReAdmission ','No of Reintubation ','% of Reintubation ');
	
	$rs = mysqli_query($connect, $sq);

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
	
	foreach ($datearray as $hufdt) 
	{
		
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$table1 = 'tbl_icu_register_ipd';
		$table2 = 'tbl_icu_ipd2';

	   $data_array = cal_data($table1,$hufdt,$connect );




	   	$total_icu= $data_array['total_icu'];
		$total_icu_return=$data_array['total_icu_return'];
		$total_re_admission=$data_array['total_re_admission'];
		$total_re_intubation=$data_array['total_re_intubation'];
		


		 $data_array = cal_data($table2,$hufdt,$connect );




	   	$total_icu+= $data_array['total_icu'];
		$total_icu_return+=$data_array['total_icu_return'];
		$total_re_admission+=$data_array['total_re_admission'];
		$total_re_intubation+=$data_array['total_re_intubation'];
	





	$per1 = $total_icu!=0 ? (($total_icu_return/$total_icu)*100) :   0 ;
	$per2 = $total_icu!=0 ? (($total_re_admission/$total_icu)*100) :   0 ;
	$per3 = $total_icu!=0 ? (($total_re_intubation/$total_icu)*100) :   0 ;

	$data[] = array($admdt,(int)$total_icu_return,(float)$per1,(int)$total_re_admission,(float)$per2,(int)$total_re_intubation,(float)$per3);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
