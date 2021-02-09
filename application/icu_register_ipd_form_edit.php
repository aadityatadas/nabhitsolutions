<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["icu_register_ipd_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_icu_ipd2 WHERE icu_ipd2_id = '".$_POST["icu_register_ipd_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();

         $output["icu_ipd2_id"] 				= $row["icu_ipd2_id"];
		 $output["date_of_admison_in_icu"] 		= $row["date_of_admison_in_icu"];
		 $output["time_of_admison_in_icu"] 		= $row["time_of_admison_in_icu"];
		 $output["date_of_disc_trans_in_icu"] 	= $row["date_of_disc_trans_in_icu"];
		 $output["time_of_disc_trans_in_icu"] 	= $row["time_of_disc_trans_in_icu"];
		 $output["date_of_return_in_icu"] 		= $row["date_of_return_in_icu"];
		 $output["time_of_return_in_icu"] 		= $row["time_of_return_in_icu"];
		 $output["retrn_to_icu_in_48hrs"] 		= $row["retrn_to_icu_in_48hrs"];
		 $output["re_admission"] 				= $row["re_admission"];
		 $output["re_intubation"] 				= $row["re_intubation"];
		 $output["re_admission_reson"] 	= $row["re_admission_reson"];
		 $output["re_intubation_reson"] = $row["re_intubation_reson"];
		 $output["sign"] 						= $row["sign"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["userEdit"])){
      if($_POST["actionEdit"]=="update"){

      	$tbl_icu_register_ipd_id = $_POST["icu_register_ipd_id"];         


		 $statement = $connection->prepare(
			"UPDATE tbl_icu_ipd2 
			SET date_of_admison_in_icu 	 	= :date_of_admison_in_icu, 
				time_of_admison_in_icu 		= :time_of_admison_in_icu, 
				date_of_disc_trans_in_icu 	= :date_of_disc_trans_in_icu, 
				time_of_disc_trans_in_icu 	= :time_of_disc_trans_in_icu, 
				date_of_return_in_icu 		= :date_of_return_in_icu, 
				time_of_return_in_icu 		= :time_of_return_in_icu, 
				retrn_to_icu_in_48hrs 		= :retrn_to_icu_in_48hrs, 
				re_admission 				= :re_admission,
				re_intubation 				= :re_intubation,
				re_admission_reson 				= :re_admission_reson,
				re_intubation_reson 				= :re_intubation_reson,

				
				sign 						= :sign
				  
			WHERE  	icu_ipd2_id = '$tbl_icu_register_ipd_id'"
		);
		$result = $statement->execute(
			array(

				':date_of_admison_in_icu'	=> $_POST['date_of_admison_in_icu_Edit'],
				':time_of_admison_in_icu'	=> $_POST['time_of_admison_in_icu_Edit'],
				':date_of_disc_trans_in_icu'=> $_POST['date_of_disc_trans_in_icu_Edit'],
				':time_of_disc_trans_in_icu'=> $_POST['time_of_disc_trans_in_icu_Edit'],
				':date_of_return_in_icu'	=> $_POST['date_of_return_in_icu_Edit'],
				':time_of_return_in_icu'	=> $_POST['time_of_return_in_icu_Edit'],
				':retrn_to_icu_in_48hrs'	=> $_POST['retrn_to_icu_in_48hrs_Edit'],
				':re_admission'		    	=> $_POST['re_admission_Edit'],
				':re_intubation'			=> $_POST['re_intubation_Edit'],
				':re_admission_reson'=> $_POST['re_admission_reson_Edit'],
				':re_intubation_reson'	=> $_POST['re_intubation_reson_Edit'],

				
				':sign'						=> $_POST['sign_Edit']
			)
		);

		if(!empty($result))
		{
			echo 'Emergency Register Form Updated Successfully';
		}
		else
		{
			echo ' Error in Updation of  Form ';
		}

         
	

      }
  }
    

	

	

?>