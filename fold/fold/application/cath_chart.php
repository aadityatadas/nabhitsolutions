<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','CAUTI Rate','Total Catheter Days','Positive Cauti');
	
	$sq = "SELECT DISTINCT huf_dadm FROM tbl_huf WHERE (huf_dadm BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND int_ddd != '' ORDER BY huf_dadm ASC";
	$rs = mysqli_query($connect, $sq);
	while($res = mysqli_fetch_array($rs))
	{
		$hufdt = $res["huf_dadm"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
		
		$qry = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as std FROM tbl_huf WHERE huf_dadm = '$hufdt'")or die(mysqli_error($connect));
		$res = mysqli_fetch_assoc($qry);
		$i_count = $res["std"];
		$qry2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE huf_dadm = '$hufdt' AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
		$c_count = mysqli_num_rows($qry2);
		$cauti_count = $c_count*1000/$i_count;
		$cau_count = number_format($cauti_count,2);
		
		$qry3 = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as tcd FROM tbl_huf WHERE huf_dadm = '$hufdt' AND cath_uti_tcd != ''")or die(mysqli_error($connect));
		$res3 = mysqli_fetch_assoc($qry3);
		$tcd = $res3["tcd"];
		
		$qry4 = mysqli_query($connect,"SELECT COUNT(huf_id) as pos FROM tbl_huf WHERE huf_dadm = '$hufdt' AND cath_uti_symp = 'Yes'")or die(mysqli_error($connect));
		$res4 = mysqli_fetch_assoc($qry4);
		$pos = $res4["pos"];
		
		$data[] = array($admdt,(float)$cau_count,(int)$tcd,(int)$pos);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
