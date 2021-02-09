<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Discharge','Dama','Death');
	
	$sq = "SELECT DISTINCT huf_dddd FROM tbl_huf WHERE huf_dddd BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY huf_dddd ASC";
	$rs = mysqli_query($connect, $sq);
	while($res = mysqli_fetch_array($rs))
	{
		$hufdt = $res["huf_dddd"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$sql = "select huf_ddd, COUNT(*) as disch from tbl_huf WHERE huf_ddd = 'Discharge' AND huf_dddd = '$hufdt'";
		$query = mysqli_query($connect, $sql);
		$result = mysqli_fetch_array($query);
		
		$disch = $result["disch"];
			
		$sql2 = "select huf_ddd, COUNT(*) as dama from tbl_huf WHERE huf_ddd = 'DAMA' AND huf_dddd = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$dama = $result2["dama"];
		
		$sql3 = "select huf_ddd, COUNT(*) as death from tbl_huf WHERE huf_ddd = 'Death' AND huf_dddd = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$result3 = mysqli_fetch_array($query3);
		
		$death = $result3["death"];
			
		$data[] = array($admdt,(int)$disch,(int)$dama,(int)$death);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
