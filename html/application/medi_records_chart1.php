<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','% of Missing Records','MRD File In order as per MRD checklist','MRD has Discharge Summary','MRD has codification as per ICD','MRD has incomplete or Improper Consent','Medication orders are properly written');
	
	$query = "SELECT DISTINCT date(huf_dddd) as dat FROM tbl_huf WHERE date(huf_dddd) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY huf_dddd ASC";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$dat = $row["dat"];
		$cdat1 = str_replace('-', '/', $dat);
		$admdt = date('d M y', strtotime($cdat1));
		$sq = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dddd = '$dat'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($sq);
		
		$sql=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdav='Missing' AND tbl_huf.huf_dddd = '$dat'");
		$rsl = mysqli_num_rows($sql);
		$rexpl = ($rsl / $rs) * 100;
		if($rexpl > 0)
		{
			$vid = $rexpl;
		}else{
			$vid = 0;
		}
								
		$sql2=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdfile='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsl2 = mysqli_num_rows($sql2);
		$rexpl2 = ($rsl2 / $rs) * 100;
		if($rexpl2 > 0)
		{
			$spc = $rexpl2;
		}else{
			$spc = 0;
		}
								
		$sql3=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrddissum='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsl3 = mysqli_num_rows($sql3);
		$rexpl3 = ($rsl3 / $rs) * 100;
		if($rexpl3 > 0)
		{
			$spc3 = $rexpl3;
		}else{
			$spc3 = 0;
		}
								
		$sql4=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdicd='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsl4 = mysqli_num_rows($sql4);
		$rexpl4 = ($rsl4 / $rs) * 100;
		if($rexpl4 > 0)
		{
			$spc4 = $rexpl4;
		}else{
			$spc4 = 0;
		}
								
		$sql5=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdimpcons='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsl5 = mysqli_num_rows($sql5);
		$rexpl5 = ($rsl5 / $rs) * 100;
		if($rexpl5 > 0)
		{
			$spc5 = $rexpl5;
		}else{
			$spc5 = 0;
		}
		
		$sql6=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mediord='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsl6 = mysqli_num_rows($sql6);
		$rexpl6 = ($rsl6 / $rs) * 100;
		if($rexpl6 > 0)
		{
			$spc6 = $rexpl6;
		}else{
			$spc6 = 0;
		}
			
		$data[] = array($admdt,(int)$vid,(int)$spc,(int)$spc3,(int)$spc4,(int)$spc5,(int)$spc6);	  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
