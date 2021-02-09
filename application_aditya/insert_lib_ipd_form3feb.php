<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
include('fun_rpt_vent.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{

		
	$sr_no = $_POST['sr_no'];
    $p_name = $_POST['p_name'];
    $uhid_no = $_POST['uhid_no'];
    $ipd_no = $_POST['ipd_no'];
    $d_adm = $_POST['d_adm'];
    $t_dig = $_POST['t_dig'];
    $nameofTest = $_POST['nameofTest'];
    $srt = $_POST['srt']; 
    $srtt = $_POST['srtt'];
    $dateofreportgeneration = $_POST['dateofreportgeneration'];
    $timeofreportgeneration = $_POST['timeofreportgeneration'];
    $resultTime = $_POST['resultTime'];
    $InvestigationResult = $_POST['InvestigationResult'];
    $CriticalResult = $_POST['CriticalResult'];
    $CriticalAlert = $_POST['CriticalAlert'];
    $ResultDate = $_POST['ResultDate'];
    $ResultTime = $_POST['ResultTime'];
    $InformedDate = $_POST['InformedDate'];
    $InformedTime = $_POST['InformedTime'];
    $InformedTo = $_POST['InformedTo'];
    $InformedBy = $_POST['InformedBy'];
    $ReportingError = $_POST['ReportingError'];
    $ReasoneForReportingError = $_POST['ReasoneForReportingError'];
    $RedosIfAny = $_POST['RedosIfAny'];
    $ReasonForRedos = $_POST['ReasonForRedos'];
    $Reports_Corelating = $_POST['Reports-Corelating'];
    $ClinicalCorrelation = $_POST['ClinicalCorrelation'];
    $Remarks = $_POST['Remarks'];
    $user_id = $_POST['user_id'];
    $operation = $_POST['operation'];
		$dt1 = mysqli_real_escape_string($connect, $srt);
		$dtt1 = mysqli_real_escape_string($connect, $srtt);
		$dt2 = mysqli_real_escape_string($connect, $dateofreportgeneration);
		$dtt2 = mysqli_real_escape_string($connect, $timeofreportgeneration);
		$ResultDate = mysqli_real_escape_string($connect, $ResultDate);
		$ResultTime = mysqli_real_escape_string($connect, $ResultTime);
		$InformedDate = mysqli_real_escape_string($connect, $InformedDate);
		$InformedTime = mysqli_real_escape_string($connect, $InformedTime);
		
		$dt3 = $dt1.' '.$dtt1;
		$dt4 = $dt2.' '.$dtt2;
		$ResultTD = $ResultDate.' '.$ResultTime;
		$InformedTD = $InformedDate.' '.$InformedTime;

        if($dt2 != '') {
        $diff = abs(strtotime($dt2) - strtotime($dt1));

		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
		
		$hour   = floor(($diff) / (60*60)); 

		$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
		
		$diffrenceInHr = $hour.'.'.$minuts;
         } else {

         	$diffrenceInHr = "";
         	
         }
		// if($dt2 != '')
		// {
		// 	$diff = abs(strtotime($dt2) - strtotime($dt1)); 
		// 	$days = $diff/(60 * 60 * 24);
		// }else{
		// 	$days = '';
		// }


		
		$statement = $connection->prepare(
			"INSERT INTO tbl_lab_ipd (`tbl_uhf_id`, `prov_finl_daig`,`sample_rec_time_date`, `nam_of_test`, `time_date_of_rep_gen`, `total_time`, `inv_result`, `cri_res_if_any`, `cri_alrt_details`, `result_time`, `info_time`, `info_to`, `info_by`, `resp_err`, `res_err_rsn`, `redos`, `redos_rsn`, `rep_cor_clin_diag`, `clinical_correlation`, `remarks` , `sample_rec_date`,`date_of_rep_gen`) VALUES ('$user_id', '$t_dig','$dt3', '$nameofTest', '$dt4', '$diffrenceInHr', '$InvestigationResult', '$CriticalResult', '$CriticalAlert', '$ResultTD', '$InformedTD', '$InformedTo', '$InformedBy', '$ReportingError', '$ReasoneForReportingError', '$RedosIfAny', '$ReasonForRedos', '$Reports_Corelating', '$ClinicalCorrelation', '$Remarks' , '$dt1','$dt2');
			"
		);

		
		$result = $statement->execute(
			/*array(
				':sr_no'		=>	$_POST["sr_no"],
				//':t_adm'		=>	$_POST["t_adm"],
				//':ddd'		=>	$_POST["ddd"],
				':psympt'		=>	$_POST["psympt"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
			)*/
		);

	//	print_r($result);
		if(!empty($result))
		{
			echo 'Laboratory Indicator Form Inserted Successfully';
		} else {
			  echo ' Error in Laboratory Indicator Form ';
		}
	}

	      elseif(($_POST["operation"] == "Update")) {

	         $t_dig = $_POST['t_dig'];
    $nameofTest = $_POST['nameofTest'];
    $srt = $_POST['srt']; 
    $srtt = $_POST['srtt'];
    $dateofreportgeneration = $_POST['dateofreportgeneration'];
    $timeofreportgeneration = $_POST['timeofreportgeneration'];
    $resultTime = $_POST['resultTime'];
    $InvestigationResult = $_POST['InvestigationResult'];
    $CriticalResult = $_POST['CriticalResult'];
    $CriticalAlert = $_POST['CriticalAlert'];
    $ResultDate = $_POST['ResultDate'];
    $ResultTime = $_POST['ResultTime'];
    $InformedDate = $_POST['InformedDate'];
    $InformedTime = $_POST['InformedTime'];
    $InformedTo = $_POST['InformedTo'];
    $InformedBy = $_POST['InformedBy'];
    $ReportingError = $_POST['ReportingError'];
    $ReasoneForReportingError = $_POST['ReasoneForReportingError'];
    $RedosIfAny = $_POST['RedosIfAny'];
    $ReasonForRedos = $_POST['ReasonForRedos'];
    $Reports_Corelating = $_POST['Reports-Corelating'];
    $ClinicalCorrelation = $_POST['ClinicalCorrelation'];
    $Remarks = $_POST['Remarks'];
    $user_id = $_POST['user_id'];
    $operation = $_POST['operation'];
		$dt1 = mysqli_real_escape_string($connect, $srt);
		$dtt1 = mysqli_real_escape_string($connect, $srtt);
		$dt2 = mysqli_real_escape_string($connect, $dateofreportgeneration);
		$dtt2 = mysqli_real_escape_string($connect, $timeofreportgeneration);
		$ResultDate = mysqli_real_escape_string($connect, $ResultDate);
		$ResultTime = mysqli_real_escape_string($connect, $ResultTime);
		$InformedDate = mysqli_real_escape_string($connect, $InformedDate);
		$InformedTime = mysqli_real_escape_string($connect, $InformedTime);
		
		$dt3 = $dt1.' '.$dtt1;
		$dt4 = $dt2.' '.$dtt2;
		$ResultTD = $ResultDate.' '.$ResultTime;
		$InformedTD = $InformedDate.' '.$InformedTime;

        if($dt2 != '') {
        $diff = abs(strtotime($dt2) - strtotime($dt1));

		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
		
		$hour   = floor(($diff) / (60*60)); 

		$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
		
		$diffrenceInHr = $hour.'.'.$minuts;
         } else {

         	$diffrenceInHr = "";
         	
         }
		// if($dt2 != '')
		// {
		// 	$diff = abs(strtotime($dt2) - strtotime($dt1)); 
		// 	$days = $diff/(60 * 60 * 24);
		// }else{
		// 	$days = '';
		// }


		
		

		$statement = $connection->prepare(
			"UPDATE tbl_lab_ipd 
			SET prov_finl_daig = '$t_dig',
			sample_rec_time_date = '$dt3' ,
			nam_of_test = '$nameofTest',
			time_date_of_rep_gen = '$dt4',
			total_time = '$diffrenceInHr' ,
			inv_result = '$InvestigationResult',
			cri_res_if_any = '$CriticalResult',
			cri_alrt_details = '$CriticalAlert',
			result_time = '$ResultTD',
			info_time = '$InformedTD',
			info_to = '$InformedTo',
			info_by= '$InformedBy' ,
			resp_err = '$ReportingError', res_err_rsn = '$ReasoneForReportingError'
			 , redos = '$RedosIfAny', redos_rsn = '$ReasonForRedos', rep_cor_clin_diag = '$Reports_Corelating' ,
			clinical_correlation = '$ClinicalCorrelation', 
			remarks = '$Remarks',
			sample_rec_date = '$dt1',
			date_of_rep_gen = '$dt2'

			WHERE tbl_uhf_id = :user_id "
		   );
		

		$result = $statement->execute(
			array(
				':user_id'		=>	$_POST["user_id"]
			)
		);
		
		

	//	print_r($result);
		if(!empty($result))
		{
			echo 'Laboratory Indicator Form Updated Successfully';
		} else {
			  echo ' Error in Laboratory Indicator Form ';
		}

                         
	      }
}
?>