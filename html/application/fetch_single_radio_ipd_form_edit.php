<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];

if(isset($_POST["radio_ipd_extra_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_radio_ipd_extra WHERE radio_ipd_extra_id = '".$_POST["radio_ipd_extra_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
          $output["prov_finl_daigEdit"] = $row["prov_finl_daig"];
		 $output["radio_invstEdit"] = $row["radio_invst"];
		 
		 //$output["sample_rec_time"] = $row["sample_rec_time_date"];
		 $dd_dt = $row["invst_stat_date_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_sample_rec_timeEdit"] = $get_date;
		 $output["t_sample_rec_timeEdit"] = $get_time;

		 //$output["nam_of_test"] = $row["nam_of_test"];


		 //$output["time_of_rep_gen"] = $row["time_date_of_rep_gen"];

		 $dd_dt1 = $row["date_time_of_rep_gen"];		
		 $new_time = explode(" ",$dd_dt1);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_time_date_of_rep_genEdit"] = $get_date;
		 $output["t_time_date_of_rep_genEdit"] = $get_time;

		 $output["total_timeEdit"]= $row["total_time"];

		 $output["inv_resultEdit"]= $row["inv_result"];

		 $output["cri_res_if_anyEdit"] = $row["cri_res_if_any"];

		 $output["cri_alrt_detailsEdit"] = $row["cri_alrt_details"];

		 //$output["result_time"] = $row["result_time"];
		 $dd_dt = $row["result_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_result_timeEdit"] = $get_date;
		 $output["t_result_timeEdit"] = $get_time;

		 //$output["info_time"] = $row["info_time"];
		 $dd_dt = $row["info_time"];		
		 $new_time = explode(" ",$dd_dt);
		 $get_date = $new_time[0];
		 $get_time = $new_time[1];
		 $output["d_info_timeEdit"] = $get_date;
		 $output["t_info_timeEdit"] = $get_time;

		 $output["info_toEdit"] = $row["info_to"];

		 $output["info_byEdit"] = $row["info_by"];

		 $output["resp_errEdit"] = $row["report_err"];
		 
		 $output["res_err_rsnEdit"] = $row["report_err_rsn"];

		 $output["correct_actn_reportEdit"] = $row["correct_actn_report"];

		$output["redosEdit"] = $row["redos"];

		$output["redos_rsnEdit"] = $row["redos_rsn"];

		 $output["rep_cor_clin_diagEdit"] = $row["rep_cor_clin_diag"];

		 $output["correct_actn_redosEdit"] = $row["correct_actn_redos"];

		 $output["clinical_correlationEdit"]= $row["clinical_correlation"];

		   $output["remarksEdit"] = $row["remarks"];

		$output["radio_ipd_extra_id"] = $row["radio_ipd_extra_id"];
		$output["tbl_radio_lpd_id"] = $row["tbl_radio_lpd_id"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["user_idEdit"])){
      if($_POST["actionEdit"]=="update"){

      	$user_id = $_POST["user_idEdit"];
      	$radio_ipd_extra_id = $_POST["radio_ipd_extra_id"];         

      	 $t_dig = $_POST['t_digEdit'];
	      $radio_invst = $_POST['radio_invstEdit'];
	
         
    //$nameofTest = $_POST['nameofTest'];
	
    $ist = $_POST['istEdit'];  
    $istt = $_POST['isttEdit']; 
    $dateofreportgeneration = $_POST['dateofreportgenerationEdit']; 
    $timeofreportgeneration = $_POST['timeofreportgenerationEdit']; 
    $resultTime = $_POST['TotalTimeEdit']; 
    $InvestigationResult = $_POST['InvestigationResultEdit']; 
    $CriticalResult = $_POST['CriticalResultEdit']; 
    $CriticalAlert = $_POST['CriticalAlertEdit']; 
    $ResultDate = $_POST['ResultDateEdit']; 
    $ResultTime = $_POST['ResultTimeEdit']; 
    $InformedDate = $_POST['InformedDateEdit']; 
    $InformedTime = $_POST['InformedTimeEdit']; 
    $InformedTo = $_POST['InformedToEdit']; 
    $InformedBy = $_POST['InformedByEdit']; 
    $ReportingError = $_POST['ReportingErrorEdit']; 
    $ReasoneForReportingError = $_POST['ReasoneForReportingErrorEdit']; 
    $RedosIfAny = $_POST['RedosIfAnyEdit']; 
    $ReasonForRedos = $_POST['ReasonForRedosEdit']; 
     $RedosCorrectiveAction = $_POST['RedosCorrectiveActionEdit']; 
    $ReportCorrectiveAction = $_POST['ReportCorrectiveActionEdit']; 
    $Reports_Corelating = $_POST['Reports-CorelatingEdit']; 
    $ClinicalCorrelation = $_POST['ClinicalCorrelationEdit']; 
    $Remarks = $ses; 
   
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

	
		$statement = $connection->prepare(
			"UPDATE tbl_radio_ipd_extra 
			SET prov_finl_daig = '$t_dig',
			radio_invst = '$radio_invst',
			invst_stat_date_time = '$dt3' ,
			
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

			WHERE radio_ipd_extra_id = :user_id "
		   );
		

		$result = $statement->execute(
			array(
				':user_id'		=>	$radio_ipd_extra_id
			)
		);
		
		if(!empty($result))
		{
			echo 'Radiology Indicator Form Updated Successfully';
		}

         
	

      }
  }
    

	

	

?>