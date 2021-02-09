<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','No. of Occupational Exposure/Needle Prick Injuries','Occupational Exposure/Needle Prick Injury Rate');
	
	$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (huf_dadm BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND (huf_dddd BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."')")or die(mysqli_error($connect));
	$rs = mysqli_fetch_assoc($qry);
	$i_count = $rs["std"];		
	
	$sqq = "SELECT DISTINCT DATE(needp_dttm) as dte FROM tbl_need_pif WHERE DATE(needp_dttm) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY needp_dttm ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dte"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$qry = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE DATE(needp_dttm) = '$hufdt'")or die(mysqli_error($connect));
		$res = mysqli_num_rows($qry);		
		
		$rate = ($res / $i_count) * 1000;
		$rate1 = number_format($rate,2);
			
		$data[] = array($admdt,(int)$res,(float)$rate1);	  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
