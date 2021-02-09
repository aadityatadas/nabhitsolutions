<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Handover Sheet of Doctors are properly filled','Handover Sheet of Nurses are properly filled','The Plan of care is documented with desired outcome and countersigned by clinicians','MRD includes screening for nutritional needs (Nutritional Assessment)','MRD Includes Nursing care plan is documented with outcome at the time of admission');
	
	$query = "SELECT DISTINCT date(huf_dddd) as dat FROM tbl_huf WHERE date(huf_dddd) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY huf_dddd ASC";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$dat = $row["dat"];
		$cdat1 = str_replace('-', '/', $dat);
		$admdt = date('d M y', strtotime($cdat1));
		$sq = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dddd = '$dat'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($sq);
		
		$sql7=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_dr='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsl7 = mysqli_num_rows($sql7);
		$rexpl7 = ($rsl7 / $rs) * 100;
		if($rexpl7 > 0)
		{
			$vid = $rexpl7;
		}else{
			$vid = 0;
		}
								
		$sql8=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_nur='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsl8 = mysqli_num_rows($sql8);
		$rexpl8 = ($rsl8 / $rs) * 100;
		if($rexpl8 > 0)
		{
			$spc = $rexpl8;
		}else{
			$spc = 0;
		}
								
		$sql9=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_planofcare='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsl9 = mysqli_num_rows($sql9);
		$rexpl9 = ($rsl9 / $rs) * 100;
		if($rexpl9 > 0)
		{
			$spc3 = $rexpl9;
		}else{
			$spc3 = 0;
		}
								
		$sqla=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_screen='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rsla = mysqli_num_rows($sqla);
		$rexpla = ($rsla / $rs) * 100;
		if($rexpla > 0)
		{
			$spc4 = $rexpla;
		}else{
			$spc4 = 0;
		}
								
		$sqlb=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_nur_careplan='Yes' AND tbl_huf.huf_dddd = '$dat'");
		$rslb = mysqli_num_rows($sqlb);
		$rexplb = ($rslb / $rs) * 100;
		if($rexplb > 0)
		{
			$spc5 = $rexplb;
		}else{
			$spc5 = 0;
		}
		
		$data[] = array($admdt,(int)$vid,(int)$spc,(int)$spc3,(int)$spc4,(int)$spc5);	  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
