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
    $ipd_no = $_POST['opd_no'];
    $d_adm = $_POST['d_adm'];
    $t_dig = $_POST['t_dig'];
     $radio_invst = $_POST['radio_invst'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
	$ist = $_POST['ist']; 
    $istt = $_POST['istt'];
    $dateofreportgeneration = $_POST['dateofreportgeneration'];
    $timeofreportgeneration = $_POST['timeofreportgeneration'];
    $resultTime = $_POST['TotalTime'];
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
    $RedosCorrectiveAction = $_POST['RedosCorrectiveAction'];
    $ReportCorrectiveAction = $_POST['ReportCorrectiveAction'];
    $RedosIfAny = $_POST['RedosIfAny'];
    $ReasonForRedos = $_POST['ReasonForRedos'];
    $Reports_Corelating = $_POST['Reports-Corelating'];
    $ClinicalCorrelation = $_POST['ClinicalCorrelation'];
    $Remarks = $ses;
    $user_id = $_POST['user_id'];
    $operation = $_POST['operation'];
		$dt1 = mysqli_real_escape_string($connect, $ist);
		$dtt1 = mysqli_real_escape_string($connect, $istt);
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

         if($dt4 != '') {
  

        	 $datetime1 = strtotime($dt3);
             $datetime2 = strtotime($dt4);
			$diff =  $datetime2 - $datetime1;
			
			$timeMinTotal =  floor(($diff/60));
			
			$timeInMin= $timeMinTotal%60;
			
			$timeInhr= floor($timeMinTotal/60);
		    $diffrenceInHr =$timeInhr." hr ". $timeInMin ." min";

        	

           
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

         $qry = "SELECT radio_opd_id FROM tbl_radio_opd ORDER BY radio_opd_id  DESC limit 1";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['radio_opd_id'];
		$cid = $id+1;
		
		$statement = $connection->prepare(
			"INSERT INTO tbl_radio_opd (`radio_opd_id`,`tbl_opdwttm_id`, `prov_finl_daig`,`radio_invst`,`invst_stat_date_time`,`date_time_of_rep_gen`, `total_time`, `inv_result`, `cri_res_if_any`, `cri_alrt_details`, `result_time`, `info_time`, `info_to`, `info_by`, `report_err`, `report_err_rsn`, `redos`, `redos_rsn`, `rep_cor_clin_diag`, `clinical_correlation`, `remarks` , `invst_stat_date`,`date_of_rep_gen`,`age`,`gender`,`correct_actn_report`,`correct_actn_redos`) VALUES ('$cid','$user_id', '$t_dig','$radio_invst','$dt3', '$dt4', '$diffrenceInHr', '$InvestigationResult', '$CriticalResult', '$CriticalAlert', '$ResultTD', '$InformedTD', '$InformedTo', '$InformedBy', '$ReportingError', '$ReasoneForReportingError', '$RedosIfAny', '$ReasonForRedos', '$Reports_Corelating', '$ClinicalCorrelation', '$Remarks' , '$dt1','$dt2','$age','$gender','$ReportCorrectiveAction','$RedosCorrectiveAction');
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

		/*$databaseErrors = $statement->errorInfo();

if( !empty($databaseErrors) ){  
    $errorInfo = print_r($databaseErrors, true); # true flag returns val rather than print
    echo $errorLogMsg = "error info: $errorInfo"; # do what you wish with this var, write to log file 
}*/

	//	print_r($result);
		if(!empty($result))
		{
			echo 'Radiology Indicator Register Form Inserted Successfully';
		} else {
			  echo ' Error in Radiology Indicator Register Form ';
		}
	}

	      elseif(($_POST["operation"] == "Update")) {


	      	    	if(isset($_POST["t_dignew"])){


	for($count = 0; $count < count($_POST["t_dignew"]); $count++)
    { 
	        $t_dig = $_POST['t_dignew'][$count];
     $radio_invst = $_POST['radio_invstnew'][$count];
    
   
	$ist = $_POST['istnew'][$count]; 
    $istt = $_POST['isttnew'][$count];
    $dateofreportgeneration = $_POST['dateofreportgenerationnew'][$count];
    $timeofreportgeneration = $_POST['timeofreportgenerationnew'][$count];
    $resultTime = $_POST['TotalTimenew'][$count];
    $InvestigationResult = $_POST['InvestigationResultnew'][$count];
    $CriticalResult = $_POST['CriticalResultnew'][$count];
    $CriticalAlert = $_POST['CriticalAlertnew'][$count];
    $ResultDate = $_POST['ResultDatenew'][$count];
    $ResultTime = $_POST['ResultTimenew'][$count];
    $InformedDate = $_POST['InformedDatenew'][$count];
    $InformedTime = $_POST['InformedTimenew'][$count];
    $InformedTo = $_POST['InformedTonew'][$count];
    $InformedBy = $_POST['InformedBynew'][$count];
    $ReportingError = $_POST['ReportingErrornew'][$count];
    $ReasoneForReportingError = $_POST['ReasoneForReportingErrornew'][$count];
    $RedosCorrectiveAction = $_POST['RedosCorrectiveActionnew'][$count];
    $ReportCorrectiveAction = $_POST['ReportCorrectiveActionnew'][$count];
    $RedosIfAny = $_POST['RedosIfAnynew'][$count];
    $ReasonForRedos = $_POST['ReasonForRedosnew'][$count];
    $Reports_Corelating = $_POST['Reports-Corelatingnew'][$count];
    $ClinicalCorrelation = $_POST['ClinicalCorrelationnew'][$count];
    $Remarks = $ses;
   
    
		$dt1 = mysqli_real_escape_string($connect, $ist);
		$dtt1 = mysqli_real_escape_string($connect, $istt);
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

         if($dt4 != '') {
  

        	 $datetime1 = strtotime($dt3);
             $datetime2 = strtotime($dt4);
			$diff =  $datetime2 - $datetime1;
			
			$timeMinTotal =  floor(($diff/60));
			
			$timeInMin= $timeMinTotal%60;
			
			$timeInhr= floor($timeMinTotal/60);
		    $diffrenceInHr =$timeInhr." hr ". $timeInMin ." min";

        	

           
         } else {

         	$diffrenceInHr = "";
         	
         }
         	$user_id = $_POST['radio_opd_id_or'] ;
         	$qry = "SELECT radio_opd_extra_id FROM tbl_radio_opd_extra ORDER BY radio_opd_extra_id DESC limit 1";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['radio_opd_extra_id'];
		$cid = $id+1;

			$statement = $connection->prepare(
			"INSERT INTO tbl_radio_opd_extra (`radio_opd_extra_id`,`tbl_radio_opd_id`, `prov_finl_daig`,`radio_invst`,`invst_stat_date_time`,`date_time_of_rep_gen`, `total_time`, `inv_result`, `cri_res_if_any`, `cri_alrt_details`, `result_time`, `info_time`, `info_to`, `info_by`, `report_err`, `report_err_rsn`, `redos`, `redos_rsn`, `rep_cor_clin_diag`, `clinical_correlation`, `remarks` , `invst_stat_date`,`date_of_rep_gen`,`correct_actn_report`,`correct_actn_redos`) VALUES ('$cid','$user_id', '$t_dig','$radio_invst','$dt3', '$dt4', '$diffrenceInHr', '$InvestigationResult', '$CriticalResult', '$CriticalAlert', '$ResultTD', '$InformedTD', '$InformedTo', '$InformedBy', '$ReportingError', '$ReasoneForReportingError', '$RedosIfAny', '$ReasonForRedos', '$Reports_Corelating', '$ClinicalCorrelation', '$Remarks' , '$dt1','$dt2','$ReportCorrectiveAction','$RedosCorrectiveAction');
			"
		);
		
		$result = $statement->execute();
       
        
	
		if(empty($result))
		{
			 echo ' Error in Submission of  Form ';
			 die();
		} 
	}
		
		

		 //echo 'Record Added Successfully';
		 
}

	         $t_dig = $_POST['t_dig'];
     $radio_invst = $_POST['radio_invst'];
	$age = $_POST['age'];
    $gender = $_POST['gender'];
    $ist = $_POST['ist']; 
    $istt = $_POST['istt'];
    $dateofreportgeneration = $_POST['dateofreportgeneration'];
    $timeofreportgeneration = $_POST['timeofreportgeneration'];
    $resultTime = $_POST['TotalTime'];
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
     $RedosCorrectiveAction = $_POST['RedosCorrectiveAction'];
    $ReportCorrectiveAction = $_POST['ReportCorrectiveAction'];
    $Reports_Corelating = $_POST['Reports-Corelating'];
    $ClinicalCorrelation = $_POST['ClinicalCorrelation'];
    $Remarks = $ses;
    $user_id = $_POST['user_id'];
    $operation = $_POST['operation'];
		$dt1 = mysqli_real_escape_string($connect, $ist);
		$dtt1 = mysqli_real_escape_string($connect, $istt);
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

         if($dt4 != '') {
  

        	 $datetime1 = strtotime($dt3);
             $datetime2 = strtotime($dt4);
			$diff =  $datetime2 - $datetime1;
			
			$timeMinTotal =  floor(($diff/60));
			
			$timeInMin= $timeMinTotal%60;
			
			$timeInhr= floor($timeMinTotal/60);
		    $diffrenceInHr =$timeInhr." hr ". $timeInMin ." min";

        	

           
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
			"UPDATE tbl_radio_opd 
			SET prov_finl_daig = '$t_dig',
			radio_invst = '$radio_invst',
			invst_stat_date_time = '$dt3' ,
			age = '$age',
			gender = '$gender',
			date_time_of_rep_gen = '$dt4',
			total_time = '$diffrenceInHr' ,
			inv_result = '$InvestigationResult',
			cri_res_if_any = '$CriticalResult',
			cri_alrt_details = '$CriticalAlert',
			result_time = '$ResultTD',
			info_time = '$InformedTD',
			info_to = '$InformedTo',
			info_by= '$InformedBy' ,
			correct_actn_report = '$RedosCorrectiveAction ',
			report_err = '$ReportingError', report_err_rsn = '$ReasoneForReportingError'
			 , redos = '$RedosIfAny', redos_rsn = '$ReasonForRedos', 
			 correct_actn_redos = '$ReportCorrectiveAction ',
			 rep_cor_clin_diag = '$Reports_Corelating' ,
			clinical_correlation = '$ClinicalCorrelation', 
			remarks = '$Remarks',
			invst_stat_date = '$dt1',
			date_of_rep_gen = '$dt2'

			WHERE tbl_opdwttm_id = :user_id "
		   );
		

		$result = $statement->execute(
			array(
				':user_id'		=>	$_POST["user_id"]
			)
		);
		
		

	//	print_r($result);
		if(!empty($result))
		{
			echo 'Radiology Indicator Register Form Updated Successfully';
		} else {
			  echo ' Error in Radiology Indicator Register Form ';
		}

                         
	      }
}
?>