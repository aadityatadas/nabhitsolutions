<?php
error_reporting();
session_start();
include('dbinfo.php');
// $_POST["frdate"]='2019-06-01';
// $_POST["todate"]='2019-06-31';

if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','No. Of Medication Error','% Of Medication Error',
'No. Of Near miss Error','% Of Near miss Error',
'No. Of adverse drug event','% Of adverse drug event','jk');
	
	

	// main table
	$sq = "SELECT DISTINCT vendor FROM tbl_pharmcy_register WHERE (vendor BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND vendor != '' ORDER BY vendor ASC";
	$rs = mysqli_query($connect, $sq);
	$datearray = array();
	while($res = mysqli_fetch_array($rs))
	{
		$datearray[] = $res["vendor"];
		
	}


	

	function cal_data($table1,$hufdt,$connect){
		

	$qryItem = mysqli_query($connect,"SELECT sum(item_no) as item_no1 FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resItem = mysqli_fetch_assoc($qryItem);
	$total_item = $resItem["item_no1"];

	$qryMedication = mysqli_query($connect,"SELECT sum(medic_error) as Medication FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resMedication = mysqli_fetch_assoc($qryMedication);
	$total_Medication = $resMedication["Medication"];

	$qryNearmiss = mysqli_query($connect,"SELECT sum(near_miss_error) as Nearmiss FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resNearmiss = mysqli_fetch_assoc($qryNearmiss);
	$total_Nearmiss = $resNearmiss["Nearmiss"];


$qryadverse = mysqli_query($connect,"SELECT sum(advrse_drug_event) as adverse FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resadverse = mysqli_fetch_assoc($qryadverse);
	$total_adverse = $resadverse["adverse"];

	$s4 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$hufdt' AND huf_ddd ='' ) OR (huf_dadm <= '$hufdt' AND huf_dddd >= '$hufdt')")or die(mysqli_error($connect));


	

	$inpatient = mysqli_num_rows($s4);

	
	$data1 = array('total_item'=> $total_item ,
                    'total_Medication'=> $total_Medication ,
                    'total_Nearmiss'=> $total_Nearmiss ,
                    'total_adverse'=> $total_adverse ,
                    'inpatient'=> $inpatient    );

	    return $data1;
	}
	
	
	foreach ($datearray as $hufdt) 
	{
		
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$table1 = 'tbl_pharmcy_register';
		
		$tabledata = cal_data($table1,$hufdt , $connect);
		
		
	
	
	
	$total_item = $tabledata['total_item'];
	$total_Medication = $tabledata['total_Medication'];
	$total_Nearmiss = $tabledata['total_Nearmiss'];
	$total_adverse = $tabledata['total_adverse'];
	$inpatient = $tabledata['inpatient'];
	

	if($inpatient>0 && $total_Medication>0){
		$per1 = ($total_Medication/$inpatient)*1000;
	}else{
		$per1=0;
	}
	if($inpatient>0 && $total_Nearmiss>0){
		$per2 = ($total_Nearmiss/$inpatient)*1000;
	}else{
		$per2=0;
	}
	if($inpatient>0 && $total_adverse>0){
		$per3 = ($total_adverse/$inpatient)*1000;
	}else{
		$per3=0;
	}
	


	
	

	

		
	
	$data[] = array($admdt,(int)$total_Medication,(float)$per1,(int)$total_Nearmiss,(float)$per2,(int)$total_adverse,(float)$per3,$inpatient);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
