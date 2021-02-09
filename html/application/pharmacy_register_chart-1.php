<?php
error_reporting();
session_start();
include('dbinfo.php');
// $_POST["frdate"]='2019-06-01';
// $_POST["todate"]='2019-06-31';

if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','No. of Item Purchases','No. of Sold Items','No. of Purchase done without Purchase Order');
	
	

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

	$qrypurchase = mysqli_query($connect,"SELECT sum(purchase_ordr) as purchase_ordr1 FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	$respurchase = mysqli_fetch_assoc($qrypurchase);
	$total_purchase = $respurchase["purchase_ordr1"];

	// $qryformulary = mysqli_query($connect,"SELECT sum(no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary) as formulary FROM tbl_pharmcy_register WHERE (vendor = '$hufdt') AND vendor !='' ")or die(mysqli_error($connect));
	// $resformulary = mysqli_fetch_assoc($qryformulary);
	// $total_formulary = $resformulary["formulary"];






	$data1 = array('total_item'=> $total_item , 'total_sold'=> $total_sold,'total_purchase'=> $total_purchase );

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
	$total_purchase = $tabledata['total_purchase'];
	//$total_formulary = $tabledata['total_formulary'];
		
		

		
	
	$data[] = array($admdt,(int)$total_item,(int)$total_sold,(int)$total_purchase);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
