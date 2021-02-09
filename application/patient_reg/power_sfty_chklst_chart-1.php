<?php
include('../dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Admissions','Average Length of Stay','Surgery','MLC');
	
	$sq = "SELECT DISTINCT huf_dadm FROM tbl_huf WHERE huf_dadm BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY huf_dadm ASC";
	$rs = mysqli_query($connect, $sq);
	while($res = mysqli_fetch_array($rs))
	{
		$hufdt = $res["huf_dadm"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$sql = "select huf_id, COUNT(*) as dt from tbl_huf WHERE huf_dadm = '$hufdt'";
		$query = mysqli_query($connect, $sql);
		$result = mysqli_fetch_array($query);
		
		$cnt = $result["dt"];
			
		$sql2 = "select SUM(huf_lens) as lens from tbl_huf WHERE huf_dadm = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$lens = $result2["lens"];
		$sm = $lens / $cnt;
		$smt = number_format($sm,2);
		
		$sql3 = "select huf_surg, COUNT(*) as surg from tbl_huf WHERE huf_surg = 'Surgery' AND huf_dadm = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$result3 = mysqli_fetch_array($query3);
		
		$surg = $result3["surg"];
		
		$sql4 = "select huf_mlc, COUNT(*) as mlc from tbl_huf WHERE huf_mlc = 'MLC' AND huf_dadm = '$hufdt'";
		$query4 = mysqli_query($connect, $sql4);
		$result4 = mysqli_fetch_array($query4);
		
		$mlc = $result4["mlc"];
			
		$data[] = array($admdt,(int)$cnt,(float)$smt,(int)$surg,(int)$mlc);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
