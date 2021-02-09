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

    $date_of_admison_in_icu 	= $_POST['date_of_admison_in_icu'];
    $time_of_admison_in_icu 	= $_POST['time_of_admison_in_icu'];
	$date_of_disc_trans_in_icu 	= $_POST['date_of_disc_trans_in_icu'];
    $time_of_disc_trans_in_icu 	= $_POST['time_of_disc_trans_in_icu'];
    $date_of_return_in_icu 		= $_POST['date_of_return_in_icu'];
    $time_of_return_in_icu 		= $_POST['time_of_return_in_icu'];
    $retrn_to_icu_in_48hrs 		= $_POST['retrn_to_icu_in_48hrs'];
    $re_admission 				= $_POST['re_admission'];
    $re_intubation 				= $_POST['re_intubation'];
    $re_admission_reson 		= $_POST['re_admission_reson'];
    $re_intubation_reson 		= $_POST['re_intubation_reson'];
    $sign 						= $_POST['sign'];

   
		


		
		$statement = $connection->prepare(
			"INSERT INTO tbl_icu_register_ipd (`tbl_huf_id`,
                  `date_of_admison_in_icu`,
                  `time_of_admison_in_icu`,
                  `date_of_disc_trans_in_icu`,
                   `time_of_disc_trans_in_icu`,
                    `date_of_return_in_icu`,
                   `time_of_return_in_icu`,
                   `retrn_to_icu_in_48hrs`,
                   `re_admission`,
                    `re_intubation`,
                      `sign`,`re_admission_reson`,
                      `re_intubation_reson`) VALUES ('$user_id', 
                      '$date_of_admison_in_icu',
                  '$time_of_admison_in_icu',
                  '$date_of_disc_trans_in_icu',
                   '$time_of_disc_trans_in_icu',
                    '$date_of_return_in_icu',
                   '$time_of_return_in_icu',
                   '$retrn_to_icu_in_48hrs',
                   '$re_admission',
                    '$re_intubation',
                      '$sign', '$re_admission_reson' , 
						'$re_intubation_reson');
			"
		);

		
		$result = $statement->execute(
			
		);

	//	print_r($result);
		if(!empty($result))
		{
			echo 'ICU Registration Form Inserted Successfully';
		} else {
			  echo ' Error in ICU Registration Form Form ';
		}
	}

	      elseif(($_POST["operation"] == "Update")) {

	      
    // $d_adm = $_POST['d_adm'];

		    $date_of_admison_in_icu 	= $_POST['date_of_admison_in_icu'];
		    $time_of_admison_in_icu 	= $_POST['time_of_admison_in_icu'];
			$date_of_disc_trans_in_icu 	= $_POST['date_of_disc_trans_in_icu'];
		    $time_of_disc_trans_in_icu 	= $_POST['time_of_disc_trans_in_icu'];
		    $date_of_return_in_icu 		= $_POST['date_of_return_in_icu'];
		    $time_of_return_in_icu 		= $_POST['time_of_return_in_icu'];
		    $retrn_to_icu_in_48hrs 		= $_POST['retrn_to_icu_in_48hrs'];
		    $re_admission 				= $_POST['re_admission'];
		    $re_intubation 				= $_POST['re_intubation'];
		    $sign 						= $_POST['sign'];
		     $re_admission_reson 		= $_POST['re_admission_reson'];
    		$re_intubation_reson 		= $_POST['re_intubation_reson'];


		
		

		$statement = $connection->prepare(
			"UPDATE tbl_icu_register_ipd 
			SET date_of_admison_in_icu= '$date_of_admison_in_icu',
                  time_of_admison_in_icu = '$time_of_admison_in_icu',
                  date_of_disc_trans_in_icu='$date_of_disc_trans_in_icu',
                   time_of_disc_trans_in_icu='$time_of_disc_trans_in_icu',
                    date_of_return_in_icu='$date_of_return_in_icu',
                   time_of_return_in_icu='$time_of_return_in_icu',
                   retrn_to_icu_in_48hrs='$retrn_to_icu_in_48hrs',
                   re_admission='$re_admission',
                    re_intubation='$re_intubation',
                     re_admission_reson='$re_admission_reson',
                    re_intubation_reson='$re_intubation_reson',
                      sign='$sign'

			WHERE tbl_huf_id = :user_id "
		   );
		

		$result = $statement->execute(
			array(
				':user_id'		=>	$_POST["user_id"]
			)
		);
		
		

	//	print_r($result);
		/*if(!empty($result))
		{
			echo 'ICU Registration Form Updated Successfully';
		} else {
			  echo ' Error in ICU Registration Form ';
		}*/

          if(isset($_POST["date_of_admison_in_icu_new"])){


	      	$statement1 = $connection->prepare(
		"SELECT  * FROM tbl_icu_register_ipd WHERE `tbl_huf_id` = '".$_POST["user_id"]."' 
		LIMIT 1");
	      		$statement1->execute();
				$result1 = $statement1->fetchAll();
				//print_r($result1);

	      	$user_id = $result1[0]['icu_register_ipd_id'];
	      	/*echo $user_id;
	      	die();*/

	for($count = 0; $count < count($_POST["date_of_admison_in_icu_new"]); $count++)
    { 
			
			$date_of_admison_in_icu 	= $_POST['date_of_admison_in_icu_new'][$count];
		    $time_of_admison_in_icu 	= $_POST['time_of_admison_in_icu_new'][$count];
			$date_of_disc_trans_in_icu 	= $_POST['date_of_disc_trans_in_icu_new'][$count];
		    $time_of_disc_trans_in_icu 	= $_POST['time_of_disc_trans_in_icu_new'][$count];
		    $date_of_return_in_icu 		= $_POST['date_of_return_in_icu_new'][$count];
		    $time_of_return_in_icu 		= $_POST['time_of_return_in_icu_new'][$count];
		    $retrn_to_icu_in_48hrs 		= $_POST['retrn_to_icu_in_48hrs_new'][$count];
		    $re_admission 				= $_POST['re_admission_new'][$count];
		    $re_intubation 				= $_POST['re_intubation_new'][$count];
		    $re_admission_reson = $_POST['re_admission_reson_new'][$count];
		    $re_intubation_reson = $_POST['re_intubation_reson_new'][$count];
		    $sign 						= $_POST['sign_new'][$count];

		$statement = $connection->prepare(
			"INSERT INTO tbl_icu_ipd2 (`icu_register_ipd_id`,
                  `date_of_admison_in_icu`,
                  `time_of_admison_in_icu`,
                  `date_of_disc_trans_in_icu`,
                   `time_of_disc_trans_in_icu`,
                    `date_of_return_in_icu`,
                   `time_of_return_in_icu`,
                   `retrn_to_icu_in_48hrs`,
                   `re_admission`,
                    `re_intubation`,
                    `re_admission_reson`,
                    `re_intubation_reson`,
                    
                      `sign`) VALUES ('$user_id', 
                      '$date_of_admison_in_icu',
                  '$time_of_admison_in_icu',
                  '$date_of_disc_trans_in_icu',
                   '$time_of_disc_trans_in_icu',
                    '$date_of_return_in_icu',
                   '$time_of_return_in_icu',
                   '$retrn_to_icu_in_48hrs',
                   '$re_admission',
                    '$re_intubation',
                    '$re_admission_reson',
                    '$re_intubation_reson',           
                      '$sign');
			"
		);

		
		$result = $statement->execute();
        
	
		if(empty($result))
		{
			 echo ' Error in Submission of  Form ';
			 die();
		} 
	}
		               
	      }		

	      
	if(!empty($result))
		{
			echo 'ICU Registration Form Updated Successfully';
		} else {
			  echo ' Error in ICU Registration Form ';
		}	

		 
}


}
?>