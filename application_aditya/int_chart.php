<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Initial Assessment Time');
	
	$sq = "SELECT DISTINCT huf_dadm FROM tbl_huf WHERE (huf_dadm BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND int_ddd != '' ORDER BY huf_dadm ASC";
	$rs = mysqli_query($connect, $sq);
	while($res = mysqli_fetch_array($rs))
	{
		$hufdt = $res["huf_dadm"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
		$qry = mysqli_query($connect,"SELECT SUM(int_tottm) as std FROM tbl_huf WHERE huf_dadm = '$hufdt' AND int_ddd != ''")or die(mysqli_error($connect));
		$res = mysqli_fetch_assoc($qry);
		$i_count = $res["std"];
	
		$qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm = '$hufdt' AND int_ddd != ''")or die(mysqli_error($connect));
		$s_count = mysqli_num_rows($qry5);
		
		$tot_count = $i_count / $s_count;
		$tot = number_format($tot_count,2);
		
		$data[] = array($admdt,(float)$tot);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
