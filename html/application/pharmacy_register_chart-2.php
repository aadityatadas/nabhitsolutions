<?php
error_reporting();
session_start();
include('dbinfo.php');
// $_POST["frdate"]='2019-06-01';
// $_POST["todate"]='2019-06-31';

if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','No. Of Drugs/Items Purchased By Local Purchase ','% Of Drugs/Items Purchased By Local Purchase','No. Of Stock outs','% Of Stock outs',
'No. Of Drugs And Consumables Rejected Before Preparation Of GRN','% Of Drugs And Consumables Rejected Before Preparation Of GRN',
'No. Of Variations From The  Procurement Process','% Of Variations From The  Procurement Process');
	
	

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

	$qrySold = mysqli_query($connect,"SELECT sum(quantity) as Sold_no1 FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resSold = mysqli_fetch_assoc($qrySold);
	$total_sold = $resSold["Sold_no1"];

	

	$qryformulary = mysqli_query($connect,"SELECT sum(no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary) as formulary FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resformulary = mysqli_fetch_assoc($qryformulary);
	$total_formulary = $resformulary["formulary"];


	$qrystock_out = mysqli_query($connect,"SELECT sum(no_of_stock_out) as stock_out FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resstock_out = mysqli_fetch_assoc($qrystock_out);
	$total_no_of_stock_out = $resstock_out["stock_out"];

	$qryrejected = mysqli_query($connect,"SELECT sum(total_quantity_rejected) as rejected FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resrejected = mysqli_fetch_assoc($qryrejected);
	$total_rejected = $resrejected["rejected"];

	$qryProcurement = mysqli_query($connect,"SELECT sum(totl_num_of_variation_frm_the_defend_procument_procs) as Procurement FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$resProcurement = mysqli_fetch_assoc($qryProcurement);
	$total_Procurement = $resProcurement["Procurement"];



	$data1 = array('total_item'=> $total_item , 'total_sold'=> $total_sold, 'total_formulary'=> $total_formulary ,
	'total_no_of_stock_out'=> $total_no_of_stock_out ,
	'total_rejected'=> $total_rejected , 'total_Procurement'=> $total_Procurement );
	

	    return $data1;
	}
	
	
	foreach ($datearray as $hufdt) 
	{
		
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$table1 = 'tbl_pharmcy_register';
		
		$tabledata = cal_data($table1,$hufdt , $connect);
		
		
	
	
	
	$total_item = $tabledata['total_item'];
	$total_sold = $tabledata['total_sold'];
	
	$total_formulary = $tabledata['total_formulary'];
	if($total_item>0 && $total_formulary>0){
		$per1 = ($total_formulary/$total_item)*100;
	}else{
		$per1=0;
	}
		
	$total_no_of_stock_out = $tabledata['total_no_of_stock_out'];
	if($total_no_of_stock_out>0 && $total_sold>0){
		$per2 = ($total_no_of_stock_out/$total_sold)*100;
	}else{
		$per2=0;
	}
	$total_rejected = $tabledata['total_rejected'];
	if($total_item>0 && $total_rejected>0){
		$per3 = ($total_rejected/$total_item)*100;
	}else{
		$per3=0;
	}
	$total_Procurement = $tabledata['total_Procurement'];
	if($total_item>0 && $total_Procurement>0){
		$per4 = ($total_Procurement/$total_item)*100;
	}else{
		$per4=0;
	}	

		
	
	$data[] = array($admdt,(int)$total_formulary,(float)$per1, (int)$total_no_of_stock_out,(float)$per2,(int)$total_rejected,(float)$per3,(int)$total_Procurement,(float)$per4 );		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
