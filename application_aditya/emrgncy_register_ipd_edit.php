<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];

function cal_date($diff){
 	

 	if (strpos($diff,':') !== false) {
			return $diff;
	}elseif(!$diff){
		return $diff;
	}else {

	$timeMinTotal =  floor(($diff/60));
			
	$timeInMin= $timeMinTotal%60;
			
	$timeInhr= floor($timeMinTotal/60);
	$diffrenceInHr =$timeInhr.":".$timeInMin;

	return $diffrenceInHr;
}
}

if(isset($_POST["emrgncy_register_ipd_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_emrgncy_reg_ipd2 WHERE emrgncy_reg_ipd2_id = '".$_POST["emrgncy_register_ipd_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
        
		$output["t_admEdit"] = $row["date_of_patient_arrvl_at_emrgncy"];
		$output["t_adm1Edit"] = $row["time_of_patient_arrvl_at_emrgncy"];		
		$output["ddd1Edit"] = $row["time_of_intl_ass_is_cmpltd_by_doc"];
		$output["ddd1dEdit"] = $row["date_of_intl_ass_is_cmpltd_by_doc"];
		$output["ddddEdit"] = cal_date($row["time_taken_for_initl_assmnt"]);

        $output["patient_cmplntEdit"] = $row["patient_cmplnt"];
		$output["m_l_cEdit"] = $row["m_l_c"];
		$output["brought_deadEdit"] = $row["brought_dead"];
		$output["return_to_emergencyEdit"] = $row["return_to_emergency"];
		$output["date_of_retrn_to_emrgncy_dept_if_anyEdit"] = $row["date_of_retrn_to_emrgncy_dept_if_any"];
		$output["time_of_retrn_to_emrgncy_dept_if_anyEdit"] = $row["time_of_retrn_to_emrgncy_dept_if_any"];
		$output["patients_comp_on_rtn_of_emrgncyEdit"] = $row["patients_comp_on_rtn_of_emrgncy"];
		$output["retn_of_emrgncyEdit"] = $row["retn_of_emrgncy"];
		$output["retn_of_emrgncy_resonEdit"] = $row["retn_of_emrgncy_reson"];
		$output["signEdit"] = $row["sign"];
		$output["emrgncy_register_ipd_id"] = $row["emrgncy_reg_ipd2_id"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["userEdit"])){
      if($_POST["actionEdit"]=="update"){

      	$tbl_emrgncy_register_ipd_id = $_POST["emrgncy_register_ipd_id"];

      	$dt3 = $_POST["t_admEdit"].' '.$_POST["t_adm1Edit"];
		$dt4 = $_POST["ddd1dEdit"].' '.$_POST["ddd1Edit"];
		
          if($dt4 != '') {
  

        	 $datetime1 = strtotime($dt3);
             $datetime2 = strtotime($dt4);
			 $diff =  $datetime2 - $datetime1;
			
           
         } else {

         			$diff = "";
         		}
         	         


		 $statement = $connection->prepare(
			"UPDATE tbl_emrgncy_reg_ipd2 
			SET date_of_patient_arrvl_at_emrgncy 	 = :t_admEdit, time_of_patient_arrvl_at_emrgncy 	= :t_adm1Edit, time_of_intl_ass_is_cmpltd_by_doc 	= :ddd1Edit, 
				date_of_intl_ass_is_cmpltd_by_doc 	 = :ddd1dEdit, time_taken_for_initl_assmnt 		  = :ddddEdit, 
				patient_cmplnt 						 = :patient_cmplntEdit, 
				m_l_c 								 = :m_l_cEdit, 
				brought_dead 						 = :brought_deadEdit,
				return_to_emergency 				 = :return_to_emergency, 
				date_of_retrn_to_emrgncy_dept_if_any = :date_of_retrn_Edit,
				time_of_retrn_to_emrgncy_dept_if_any = :time_of_retrn_Edit,
				patients_comp_on_rtn_of_emrgncy = :patients_comp_on_rtn_of_emrgncyEdit,
				retn_of_emrgncy = :retn_of_emrgncyEdit,
				retn_of_emrgncy_reson = :retn_of_emrgncy_resonEdit,
				sign = :signEdit  
			WHERE  	emrgncy_reg_ipd2_id = '$tbl_emrgncy_register_ipd_id'"
		);
		$result = $statement->execute(
			array(

				':t_admEdit'							=> $_POST["t_admEdit"],
				':t_adm1Edit'							=> $_POST["t_adm1Edit"],
				':ddd1Edit'								=> $_POST["ddd1Edit"],
				':ddd1dEdit'							=> $_POST["ddd1dEdit"],
				':ddddEdit'								=> $diff,
				':patient_cmplntEdit'					=> $_POST["patient_cmplntEdit"],
				':m_l_cEdit'							=> $_POST["m_l_cEdit"],
				':brought_deadEdit'						=> $_POST["brought_deadEdit"],
				':return_to_emergency'					=> $_POST["return_to_emergency"],
				':date_of_retrn_Edit'		    		=> $_POST["date_of_retrn_to_emrgncy_dept_if_anyEdit"],
				':time_of_retrn_Edit'					=> $_POST["time_of_retrn_to_emrgncy_dept_if_anyEdit"],
				':patients_comp_on_rtn_of_emrgncyEdit'	=> $_POST["patients_comp_on_rtn_of_emrgncyEdit"],
				':retn_of_emrgncyEdit'					=> $_POST["retn_of_emrgncyEdit"],
				':retn_of_emrgncy_resonEdit'					=> $_POST["retn_of_emrgncy_resonEdit"],


				
				':signEdit'								=> $ses
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