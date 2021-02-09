<?php
error_reporting(0);
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	
	if($_POST["operation"] == "Edit")
	{




		if($_FILES["imgsign"]["size"]>0){

			$targetDir = "sign/";
			$fileName = basename($_FILES["imgsign"]["name"]);
			$targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            
          
            


             

            $allowTypes = array('jpg','png','jpeg','gif');

            $newfilename=null;

            $a=explode(".",$fileName);
                array_pop($a);
                
                foreach ($a as $key => $value) {
            	     $newfilename=$newfilename."".$value;
               }
           		$newfilename=$newfilename."_".time().".".$fileType;

           		$targetFilePath=$targetDir . $newfilename;	


			if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["imgsign"]["tmp_name"], $targetFilePath)){
               // Insert image file name into database

            	
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            
              }else{
              	$newfilename=null;
                 $statusMsg = "Sorry, there was an error uploading your file.";
                }
             }else{
             	$newfilename=null;
                  $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
              }
              //echo $statusMsg;
		}


		if(($newfilename)==null){
		if(isset($_POST['oldimg'])){
				$newfilename=$_POST['oldimg'];
		}
	}





// print_r($_POST);


// Array ( [stf_id] => 1 [stf_name] => Admin [stf_uname] => admin [stf_desig] => Admin [stf_utyp] => Admin [stf_dobq] => 2019-04-22 [stf_gender] => Male [stf_email] => [stf_mob] => 1234567890 [stf_addr] => [oldimg] => Demiimage_1585908552.jpg [user_id] => [operation] => Edit )

// die();





		$statement = $connection->prepare(
			"UPDATE tbl_staff 
			SET stf_name = :stf_name ,
			stf_desig = :stf_desig, 
			stf_utyp = :stf_utyp ,
			stf_dob = :stf_dob, 
			stf_email = :stf_email, 
			     stf_mob = :stf_mob,
			     stf_addr = :stf_addr,
			     stf_gender = :stf_gender,
			    
			   
			     
					stf_emp_sign = :stf_emp_sign
			WHERE stf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["stf_id"],
				':stf_name' =>	$_POST["stf_name"],
				':stf_desig' => $_POST["stf_desig"],
				':stf_utyp'  => $_POST['stf_utyp'],
				':stf_dob'   => $_POST['stf_dobq'],
                ':stf_email'=> $_POST['stf_email'],
                ':stf_mob'=> $_POST['stf_mob'],
                ':stf_addr'=> $_POST['stf_addr'],
                ':stf_gender'=> $_POST['stf_gender'],

				':stf_emp_sign' =>$newfilename


			
				
			
                
			)
		);
		
		if(!empty($result))
		{
			

			echo nl2br("Profile Details Updated Successfully.\n".$statusMsg);
		}
	}
}
?>