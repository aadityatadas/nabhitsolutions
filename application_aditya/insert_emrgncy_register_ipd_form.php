<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
include('fun_rpt_vent.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{

	

	$user_id = $_POST['user_id'];
    $p_name = $_POST['p_name'];
    $uhid_no = $_POST['uhid_no'];
    $ipd_no = $_POST['ipd_no'];
    // $d_adm = $_POST['d_adm'];


  $date_of_patient_arrvl_at_emrgncy= $_POST['date_of_patient_arrvl_at_emrgncy'];
  $time_of_patient_arrvl_at_emrgncy= $_POST['time_of_patient_arrvl_at_emrgncy'];
  $time_of_intl_ass_is_cmpltd_by_doc= $_POST['time_of_intl_ass_is_cmpltd_by_doc'];
  $date_of_intl_ass_is_cmpltd_by_doc= $_POST['date_of_intl_ass_is_cmpltd_by_doc'];

   		$dt3 = $date_of_patient_arrvl_at_emrgncy.' '.$time_of_patient_arrvl_at_emrgncy;
		$dt4 = $date_of_intl_ass_is_cmpltd_by_doc.' '.$time_of_intl_ass_is_cmpltd_by_doc;
		
          if($dt4 != '') {
  

        	 $datetime1 = strtotime($dt3);
             $datetime2 = strtotime($dt4);
			 $diff =  $datetime2 - $datetime1;
			
			//$timeMinTotal =  floor(($diff/60));
			
			// $timeInMin= $timeMinTotal%60;
			
			// $timeInhr= floor($timeMinTotal/60);
		 //    $diffrenceInHr =$timeInhr." hr ". $timeInMin ." min";

        	

           
         } else {

         			$diff = "";
         	
         }
  $patient_cmplnt= $_POST['patient_cmplnt'];
  $m_l_c= $_POST['m_l_c'];
  $brought_dead= $_POST['brought_dead'];
  $return_to_emergency= $_POST['return_to_emergency'];
  $date_of_retrn_to_emrgncy_dept_if_any= $_POST['date_of_retrn_to_emrgncy_dept_if_any'];
  $time_of_retrn_to_emrgncy_dept_if_any= $_POST['time_of_retrn_to_emrgncy_dept_if_any'];
  $patients_comp_on_rtn_of_emrgncy= $_POST['patients_comp_on_rtn_of_emrgncy'];
  $retn_of_emrgncy= $_POST['retn_of_emrgncy'];
  $retn_of_emrgncy_reson= $_POST['retn_of_emrgncy_reson'];
  $sign= $ses;

   $statement = $connection->prepare(
			"INSERT INTO tbl_emrgncy_register_ipd (`tbl_huf_id`,
				  `date_of_patient_arrvl_at_emrgncy` ,
				  `time_of_patient_arrvl_at_emrgncy` ,
				  `time_of_intl_ass_is_cmpltd_by_doc` ,
				  `time_taken_for_initl_assmnt`,
				  `patient_cmplnt` ,
				  `m_l_c`,
				  `brought_dead`,
				  'return_to_emergency',
				  `date_of_retrn_to_emrgncy_dept_if_any` ,
				  `time_of_retrn_to_emrgncy_dept_if_any` ,
				  `patients_comp_on_rtn_of_emrgncy`,
				  `retn_of_emrgncy`,
					`retn_of_emrgncy_reson`,
				  `sign` ,`date_of_intl_ass_is_cmpltd_by_doc` ) VALUES ('$user_id', 
                      
					  '$date_of_patient_arrvl_at_emrgncy' ,
					  '$time_of_patient_arrvl_at_emrgncy' ,
					  '$time_of_intl_ass_is_cmpltd_by_doc' ,
					  '$diff',
					  '$patient_cmplnt' ,
					  '$m_l_c',
					  '$brought_dead',
					  '$return_to_emergency',
					  '$date_of_retrn_to_emrgncy_dept_if_any' ,
					  '$time_of_retrn_to_emrgncy_dept_if_any' ,
					  '$patients_comp_on_rtn_of_emrgncy',
					  '$retn_of_emrgncy',
					  '$retn_of_emrgncy_reson',
					  '$sign' ,'$date_of_intl_ass_is_cmpltd_by_doc' );"
		);

		
		$result = $statement->execute(
			
		);

	//	print_r($result);
		/*if(!empty($result))
		{
			echo 'Emergency Registration Form Inserted Successfully';
		} else {
			  echo ' Error in Emergency Registration Form Form ';
		}
*/	}

	      elseif(($_POST["operation"] == "Update")) {

	      
    // $d_adm = $_POST['d_adm'];

     
  $date_of_patient_arrvl_at_emrgncy= $_POST['date_of_patient_arrvl_at_emrgncy'];
  $time_of_patient_arrvl_at_emrgncy= $_POST['time_of_patient_arrvl_at_emrgncy'];
  $time_of_intl_ass_is_cmpltd_by_doc= $_POST['time_of_intl_ass_is_cmpltd_by_doc'];
  $date_of_intl_ass_is_cmpltd_by_doc= $_POST['date_of_intl_ass_is_cmpltd_by_doc'];

   		$dt3 = $date_of_patient_arrvl_at_emrgncy.' '.$time_of_patient_arrvl_at_emrgncy;
		$dt4 = $date_of_intl_ass_is_cmpltd_by_doc.' '.$time_of_intl_ass_is_cmpltd_by_doc;
		
          if($dt4 != '') {
  

        	 $datetime1 = strtotime($dt3);
             $datetime2 = strtotime($dt4);
			 $diff =  $datetime2 - $datetime1;
			
			//$timeMinTotal =  floor(($diff/60));
			
			// $timeInMin= $timeMinTotal%60;
			
			// $timeInhr= floor($timeMinTotal/60);
		 //    $diffrenceInHr =$timeInhr." hr ". $timeInMin ." min";

        	

           
         } else {

         			$diff = "";
         	
         }






  $time_taken_for_initl_assmnt= $diff;
  $patient_cmplnt= $_POST['patient_cmplnt'];
  $m_l_c= $_POST['m_l_c'];
  $brought_dead= $_POST['brought_dead'];
  $return_to_emergency= $_POST['return_to_emergency'];
  $date_of_retrn_to_emrgncy_dept_if_any= $_POST['date_of_retrn_to_emrgncy_dept_if_any'];
  $time_of_retrn_to_emrgncy_dept_if_any= $_POST['time_of_retrn_to_emrgncy_dept_if_any'];
  $patients_comp_on_rtn_of_emrgncy= $_POST['patients_comp_on_rtn_of_emrgncy'];
  $retn_of_emrgncy= $_POST['retn_of_emrgncy'];
   $retn_of_emrgncy_reson= $_POST['retn_of_emrgncy_reson'];

  
  $sign= $ses;

		$statement = $connection->prepare(
			"UPDATE tbl_emrgncy_register_ipd 
			SET 
				  date_of_patient_arrvl_at_emrgncy= '$date_of_patient_arrvl_at_emrgncy',
				  time_of_patient_arrvl_at_emrgncy= '$time_of_patient_arrvl_at_emrgncy',
				  time_of_intl_ass_is_cmpltd_by_doc= '$time_of_intl_ass_is_cmpltd_by_doc',
				  time_taken_for_initl_assmnt= '$diff',
				  patient_cmplnt= '$patient_cmplnt',
				  m_l_c= '$m_l_c',
				  brought_dead= '$brought_dead',
				  return_to_emergency= '$return_to_emergency', 
				  date_of_retrn_to_emrgncy_dept_if_any= '$date_of_retrn_to_emrgncy_dept_if_any',
				  time_of_retrn_to_emrgncy_dept_if_any= '$time_of_retrn_to_emrgncy_dept_if_any',
				  patients_comp_on_rtn_of_emrgncy= '$patients_comp_on_rtn_of_emrgncy',
				  retn_of_emrgncy= '$retn_of_emrgncy',
				  retn_of_emrgncy_reson = '$retn_of_emrgncy_reson',
				  sign= '$sign',
				  date_of_intl_ass_is_cmpltd_by_doc = '$date_of_intl_ass_is_cmpltd_by_doc'

			WHERE tbl_huf_id = :user_id "
		   );
		

		$result = $statement->execute(
			array(
				':user_id'		=>	$_POST["user_id"]
			)
		);
		
		

	//	print_r($result);
		

                         
	      }

	      if(isset($_POST["t_admnew"])){


	      	$statement1 = $connection->prepare(
		"SELECT  * FROM tbl_emrgncy_register_ipd WHERE `tbl_huf_id` = '".$_POST["user_id"]."' 
		LIMIT 1");
	      		$statement1->execute();
				$result1 = $statement1->fetchAll();
				//print_r($result1);

	      	$user_id = $result1[0]['emrgncy_register_ipd_id'];
	      	/*echo $user_id;
	      	die();*/

	for($count = 0; $count < count($_POST["t_admnew"]); $count++)
    { 
		
		$date_of_patient_arrvl_at_emrgncy= $_POST['t_admnew'][$count];
		  $time_of_patient_arrvl_at_emrgncy= $_POST['t_adm1new'][$count];
		  $time_of_intl_ass_is_cmpltd_by_doc= $_POST['ddd1new'][$count];

		  $date_of_intl_ass_is_cmpltd_by_doc= $_POST['ddd1dnew'][$count];

   		$dt3 = $date_of_patient_arrvl_at_emrgncy.' '.$time_of_patient_arrvl_at_emrgncy;
		$dt4 = $date_of_intl_ass_is_cmpltd_by_doc.' '.$time_of_intl_ass_is_cmpltd_by_doc;
		
          if($dt4 != '') {
  

        	 $datetime1 = strtotime($dt3);
             $datetime2 = strtotime($dt4);
			 $diff =  $datetime2 - $datetime1;
			
           
         } else {

         			$diff = "";
         	
         }






		  $time_taken_for_initl_assmnt= $diff;
		  $patient_cmplnt= $_POST['patient_cmplnt1'][$count];
		  $m_l_c= $_POST['m_l_c1'][$count];
		  $brought_dead= $_POST['brought_dead1'][$count];
		  $return_to_emergency= $_POST['return_to_emergency1'][$count];
		  $date_of_retrn_to_emrgncy_dept_if_any= $_POST['date_of_retrn_to_emrgncy_dept_if_any1'][$count];
		  $time_of_retrn_to_emrgncy_dept_if_any= $_POST['time_of_retrn_to_emrgncy_dept_if_any1'][$count];
		  $patients_comp_on_rtn_of_emrgncy= $_POST['patients_comp_on_rtn_of_emrgncy1'][$count];

		  $retn_of_emrgncy= $_POST['retn_of_emrgncy1'][$count];
		  
		  $retn_of_emrgncy_reson= $_POST['retn_of_emrgncy_reson1'][$count];
		 
		  $sign= $ses;
		$statement = $connection->prepare(
			"INSERT INTO tbl_emrgncy_reg_ipd2 (`emrgncy_register_ipd_id`,
				  `date_of_patient_arrvl_at_emrgncy` ,
				  `time_of_patient_arrvl_at_emrgncy` ,
				  `time_of_intl_ass_is_cmpltd_by_doc` ,
				  `time_taken_for_initl_assmnt`,
				  `patient_cmplnt` ,
				  `m_l_c`,
				  `brought_dead`,
				  'return_to_emergency',
				  `date_of_retrn_to_emrgncy_dept_if_any` ,
				  `time_of_retrn_to_emrgncy_dept_if_any` ,
				  `patients_comp_on_rtn_of_emrgncy`,
				  `retn_of_emrgncy`,
				  `retn_of_emrgncy_reson`,
				  `sign`,`date_of_intl_ass_is_cmpltd_by_doc` ) VALUES ('$user_id', 
                      
					  '$date_of_patient_arrvl_at_emrgncy' ,
					  '$time_of_patient_arrvl_at_emrgncy' ,
					  '$time_of_intl_ass_is_cmpltd_by_doc' ,
					  '$time_taken_for_initl_assmnt',
					  '$patient_cmplnt' ,
					  '$m_l_c',
					  '$brought_dead',
					  '$return_to_emergency',
					  '$date_of_retrn_to_emrgncy_dept_if_any' ,
					  '$time_of_retrn_to_emrgncy_dept_if_any' ,
					  '$patients_comp_on_rtn_of_emrgncy',
					  '$retn_of_emrgncy',
					  '$retn_of_emrgncy_reson',
					  '$sign' ,'$date_of_intl_ass_is_cmpltd_by_doc');"
		);

		
		$result = $statement->execute(
			
		);
        
	
		if(empty($result))
		{
			 echo ' Error in Submission of  Form ';
			 die();
		} 
	}
		
		

		 
}

if(!empty($result))
		{
			echo 'Emergency Registration Form Updated Successfully';
		} else {
			  echo ' Error in Emergency Registration Form ';
		}
}
?>