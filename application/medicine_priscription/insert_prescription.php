<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
include('../function.php');

      


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add_Prisciption")
	{
		
		$info['doctor_name'] = $_POST['doctor_name'];
        $info['other_advices'] = $_POST['other_advices'];
        $info['diet_orders'] = $_POST['diet_orders'];
        $info['dis_tras_advices'] = $_POST['dis_tras_advices'];
        $info['date_done'] = $_POST['date_done'];
        $info['time_done'] = $_POST['time_done'];
        
        $qry = "SELECT prescriptions_id FROM tbl_prescriptions ORDER BY prescriptions_id DESC";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_array($res);
	$id = $row['prescriptions_id'];
	$cid = $id+1;
	$info['prescriptions_id'] = $cid;

       
        foreach(array_keys($info) as $field_name) {
                $info[$field_name] = mysqli_escape_string($connect,$info[$field_name]);
				if (!isset($field_string)) {
					$field_string = "`".strtolower($field_name)."`"; 
					$value_string = "'$info[$field_name]'";
				} else {
					$field_string .= ",`".strtolower($field_name)."`";
					$value_string .= ",'$info[$field_name]'";
				}
				
			}
		$statement = $connection->prepare("INSERT INTO tbl_prescriptions ($field_string) VALUES ($value_string)");


		$result = $statement->execute();

		if(!empty($result)) {
      $data= array();
      foreach ($_POST['name_drug'] as $key=>$drug) {
      	if(($drug != "") OR ($_POST['other_drug'][$key]!="") ){

      	 $data[] = array( 
      	 	'tbl_prescriptions_id'=> $_POST['sr_no'],
              'name_drug'=>$_POST['name_drug'][$key],
              'other_drug'=>$_POST['other_drug'][$key],
	          'dose' =>$_POST['dose'][$key],
	           'other_dose' =>$_POST['other_dose'][$key],
	          'route'=>$_POST['route'][$key],
	        'sign_dmo' =>$_POST['sign_dmo'][$key],
	       'nurse_sign_1' =>$_POST['nurse_sign_1'][$key],
	       'nurse_time_1' =>$_POST['nurse_time_1'][$key],
	       'nurse_sign_2' =>$_POST['nurse_sign_2'][$key],
	        'nurse_time_2' =>$_POST['nurse_time_2'][$key],
	       'nurse_sign_3' =>$_POST['nurse_sign_3'][$key],
	       'nurse_time_3' =>$_POST['nurse_time_3'][$key],
	       'nurse_sign_4' =>$_POST['nurse_sign_4'][$key],
	       'nurse_time_4' =>$_POST['nurse_time_4'][$key],
	       'vefied_by' =>$_POST['vefied_by'][$key],

      	 );
      	}
      }


        foreach ($data as $dat) {
       
        unset($field_string);
        		unset($value_string);
        	foreach(array_keys($dat) as $field_name) {
        		
                $info[$field_name] = mysqli_escape_string($connect,$dat[$field_name]);
				if (!isset($field_string)) {
					$field_string = "`".strtolower($field_name)."`"; 
					$value_string = "'$info[$field_name]'";
				} else {
					$field_string .= ",`".strtolower($field_name)."`";
					$value_string .= ",'$info[$field_name]'";
				}
				
			}
			
		$statement = $connection->prepare("INSERT INTO tbl_prescription_details ($field_string) VALUES ($value_string)");


		$result = $statement->execute();
		
        }
      
		
				
		
		if(!empty($result))
		{
			echo 'Priscription Submitted Successfully';
		}
	} else {
		echo 'Priscription Faild to Submitted ';
	}

}


	if($_POST["operation"] == "Edit_Prisciption")
	{

          
		$info['doctor_name'] = $_POST['doctor_name'];
        $info['other_advices'] = $_POST['other_advices'];
        $info['diet_orders'] = $_POST['diet_orders'];
        $info['dis_tras_advices'] = $_POST['dis_tras_advices'];
        $info['date_done'] = $_POST['date_done'];
        $info['time_done'] = $_POST['time_done'];
		
			foreach(array_keys($info) as $field_name) { 
				//$data[$field_name] = sc_mysql_escape($data[$field_name]);

				// if set string isn't set, set it....else append with a comma in between
				if (!isset($set_string)) {
					$set_string = "`".strtolower($field_name)."` = '$info[$field_name]'";
				} else {
					$set_string = "$set_string, `".strtolower($field_name)."` = '$info[$field_name]'";
				}
			}
			
           $id = $_POST['prescriptions_id'];
		
			$statement = $connection->prepare("UPDATE tbl_prescriptions SET $set_string WHERE prescriptions_id = $id ");

		$result = $statement->execute();
		   
		 if(!empty($result))
		{
			$data= array();
      foreach ($_POST['name_drug'] as $key=>$drug) {
      	if(($drug != "") OR ($_POST['other_drug'][$key]!="") ){

      	 $data[] = array( 
      	 	
              'name_drug'=>$_POST['name_drug'][$key],
	        
	           'other_drug'=>$_POST['other_drug'][$key],
	          'dose' =>$_POST['dose'][$key],
	           'other_dose' =>$_POST['other_dose'][$key],
	          'route'=>$_POST['route'][$key],
	        'sign_dmo' =>$_POST['sign_dmo'][$key],
	       'nurse_sign_1' =>$_POST['nurse_sign_1'][$key],
	       'nurse_time_1' =>$_POST['nurse_time_1'][$key],
	       'nurse_sign_2' =>$_POST['nurse_sign_2'][$key],
	        'nurse_time_2' =>$_POST['nurse_time_2'][$key],
	       'nurse_sign_3' =>$_POST['nurse_sign_3'][$key],
	       'nurse_time_3' =>$_POST['nurse_time_3'][$key],
	       'nurse_sign_4' =>$_POST['nurse_sign_4'][$key],
	       'nurse_time_4' =>$_POST['nurse_time_4'][$key],
	       'vefied_by' =>$_POST['vefied_by'][$key],
            'prescription_details_id'=>$_POST['prescription_details_id'][$key]
      	 );
      	}
      }


        foreach ($data as $dat) {
        $id = $dat['prescription_details_id'];
          unset($dat['prescription_details_id']);
            
        
        		unset($set_string);
        	foreach(array_keys($dat) as $field_name) { 
				//$data[$field_name] = sc_mysql_escape($data[$field_name]);

				// if set string isn't set, set it....else append with a comma in between
				if (!isset($set_string)) {
					$set_string = "`".strtolower($field_name)."` = '$dat[$field_name]'";
				} else {
					$set_string = "$set_string, `".strtolower($field_name)."` = '$dat[$field_name]'";
				}
			}
			
		  
		
			$statement = $connection->prepare("UPDATE tbl_prescription_details SET $set_string WHERE prescription_details_id = $id ");

		$result = $statement->execute();
		
        }
      
		
				
		
		if(!empty($result))
		{
			echo 'Priscription Updated Successfully';
		}
		} 
		  else{
		  	echo 'Error in  Update Form';
		  }
		}
		
	}

?>