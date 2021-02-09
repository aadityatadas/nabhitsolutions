<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Staff Name','Employee Absentism Rate','Employee Satisfaction Rate','Employee Griviences rate','Needle Prick Injury Rate','Occupational Exposure rate','% of complete HR files');
	
	$sqq = mysqli_query($connect,"SELECT DISTINCT(hr_date) as dat from tbl_hr_indic WHERE hr_date BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."'")or die(mysqli_error($connect));
	
	while($ress = mysqli_fetch_array($sqq))
	{
		$dat = $ress["dat"];
		$cdat1 = str_replace('-', '/', $dat);
		$admdt = date('d M y', strtotime($cdat1));
		$sq = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE hr_date = '$dat'")or die(mysqli_error($connect));
		$rq = mysqli_num_rows($sq);
		
		$sql = mysqli_query($connect,"SELECT SUM(hr_absent) as abs FROM tbl_hr_indic WHERE hr_date = '$dat'")or die(mysqli_error($connect));
		$rs = mysqli_fetch_array($sql);
		$abs = $rs["abs"];
		$tabss1 = ($abs/$rq/30) * 100;
		$tabs1 = number_format($tabss1,2);
		
		$sql2 = mysqli_query($connect,"SELECT SUM(hr_satis_score) as abs2 FROM tbl_hr_indic WHERE hr_date = '$dat'")or die(mysqli_error($connect));
		$rs2 = mysqli_fetch_assoc($sql2);
		$abs2 = $rs2["abs2"];
		$tabss2 = ($abs2/$rq);
		$tabs2 = number_format($tabss2,2);
		
		$sql3 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_griv = 'Yes' AND hr_date = '$dat'")or die(mysqli_error($connect));
		$rs3 = mysqli_num_rows($sql3);
		$tabss3 = ($rs3/$rq) * 100;
		$tabs3 = number_format($tabss3,2);
		
		$sql4 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_need_inj = 'Yes' AND hr_date = '$dat'")or die(mysqli_error($connect));
		$rs4 = mysqli_num_rows($sql4);
		$tabss4 = ($rs4/$rq) * 100;
		$tabs4 = number_format($tabss4,2);
		
		$sql5 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_occpany = 'Yes' AND hr_date = '$dat'")or die(mysqli_error($connect));
		$rs5 = mysqli_num_rows($sql5);
		$tabss5 = ($rs5/$rq) * 100;
		$tabs5 = number_format($tabss5,2);
		
		$sql6 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_per_file = 'Yes' AND hr_date = '$dat'")or die(mysqli_error($connect));
		$rs6 = mysqli_num_rows($sql6);
		$tabss6 = ($rs6/$rq) * 100;
		$tabs6 = number_format($tabss6,2);
		
			
		$data[] = array($admdt,(float)$tabs1,(float)$tabs2,(float)$tabs3,(float)$tabs4,(float)$tabs5,(float)$tabs6); 
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
