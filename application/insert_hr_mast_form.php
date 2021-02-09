<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$qry = "SELECT hrid FROM tbl_hr_mast ORDER BY hrid DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['hrid'];
		$cid = $id+1;


		if($_FILES["imgsign"]["size"]>0){

			$targetDir = "user_upload/hr_images/";
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
                 $statusMsg = "Sorry, there was an error uploading your file.";
                }
             }else{
                  $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
              }
              //echo $statusMsg;
		}


		


		$statement = $connection->prepare(
			"INSERT INTO tbl_hr_mast(hrid, hr_staff, hr_empcode, hr_desig, hr_dept, hr_datej, hr_ctstat, hr_ctstat_det, hr_recd,hr_reg_no , hr_emp_type,hr_emp_sign)
			VALUES('$cid',:mo1,:mo2,:mo3,:mo4,:mo5,:mo6,:mo7,'$ses',:mo2reg,:mo6_emp,:hr_emp_sign )
			"
		);
		

		$result = $statement->execute(
			array(
				':mo1'		=>	$_POST["mo1"],
				':mo2'		=>	$_POST["mo2"],
				':mo3'		=>	$_POST["mo3"],
				':mo4'		=>	$_POST["mo4"],
				':mo5'		=>	$_POST["mo5"],
				':mo6'		=>	$_POST["mo6"],
				':mo7'		=>	$_POST["mo7"],
				':mo2reg'    =>  $_POST['mo2reg'],
				':mo6_emp'   =>  $_POST['mo6_emp'],
				':hr_emp_sign' => $newfilename
				)
		);
		if(!empty($result))
		{

			echo nl2br("HR Master Details Submitted Successfully.\n".$statusMsg);

			
		}
	}
	if($_POST["operation"] == "Edit")
	{


		


		if($_FILES["imgsign"]["size"]>0){

			$targetDir = "user_upload/hr_images/";
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



		$statement = $connection->prepare(
			"UPDATE tbl_hr_mast 
			SET hr_staff = :mo1, hr_empcode = :mo2, hr_desig = :mo3, hr_dept = :mo4, hr_datej = :mo5, hr_ctstat = :mo6, hr_ctstat_det = :mo7, hr_recd = '$ses'  , hr_reg_no = :mo2reg, hr_emp_type = :mo6_emp , hr_emp_sign = :hr_emp_sign  
			WHERE hrid = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],
				':mo1'		=>	$_POST["mo1"],
				':mo2'		=>	$_POST["mo2"],
				':mo3'		=>	$_POST["mo3"],
				':mo4'		=>	$_POST["mo4"],
				':mo5'		=>	$_POST["mo5"],
				':mo6'		=>	$_POST["mo6"],
				':mo7'		=>	$_POST["mo7"],
				':mo2reg'    =>  $_POST['mo2reg'],
				':mo6_emp'    =>  $_POST['mo6_emp'],
				':hr_emp_sign'=>   $newfilename
			)
		);
		if(!empty($result))
		{
			

			echo nl2br("HR Master Details Updated Successfully.\n".$statusMsg);
		}
	}
}
?>