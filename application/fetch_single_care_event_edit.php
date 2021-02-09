<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["care_extra_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_care_evt_extra WHERE care_extra_id = '".$_POST["care_extra_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
       
		$output["mo1Edit"] = $row["care_dtpli"];
		$output["mo2Edit"] = $row["care_tmpli"];
		$output["mo3Edit"] = $row["care_vipsc"];
		$output["mo4Edit"] = $row["care_signsymp"];
		$output["mo5Edit"] = $row["care_signsymp_det"];
		$output["mo6Edit"] = $row["care_signsymp_th"];
		$output["mo7Edit"] = $row["care_signsymp_th_det"];
		$output["mo8Edit"] = $row["care_bradsc"];
		$output["mo9Edit"] = $row["care_signsyp_bed"];
		$output["mo10Edit"] = $row["care_signsyp_bed_det"];
		$output["mo11Edit"] = $row["care_mor_sc"];
		$output["mo12Edit"] = $row["care_incd_ptfall"];
		$output["mo13Edit"] = $row["care_incd_ptfall_det"];
		$output["mo14Edit"] = $row["care_iardl"];
		$output["mo15Edit"] = $row["care_iardl_det"];
		$output["mo16Edit"] = $row["care_injtpt"];
		$output["mo17Edit"] = $row["care_injtpt_det"];
		$output["care_extra_id"] = $row["care_extra_id"];
		$output["care_id"] = $row["care_id"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["user_idEdit"])){
      if($_POST["actionEdit"]=="update"){

      	$user_id = $_POST["user_idEdit"];
      	$care_extra_id = $_POST["care_extra_id"];         

      	
		
		$statement = $connection->prepare(
			"UPDATE tbl_care_evt_extra 
			SET 
				care_dtpli = :mo1Edit,
				care_tmpli = :mo2Edit,
				care_vipsc = :mo3Edit,
				care_signsymp = :mo4Edit,
				care_signsymp_det = :mo5Edit,
				care_signsymp_th = :mo6Edit,
				care_signsymp_th_det = :mo7Edit,
				care_bradsc = :mo8Edit,
				care_signsyp_bed = :mo9Edit,
				care_signsyp_bed_det = '$ht_mi',
				care_mor_sc = :mo11Edit,
				care_incd_ptfall = :mo12Edit,
				care_incd_ptfall_det = :mo13Edit,
				care_iardl = :mo14Edit,
				care_iardl_det = :mo15Edit,
				care_injtpt = :mo16Edit,
				care_injtpt_det = :mo17Edit,
				care_recd = '$ses'

  
			WHERE care_id = '$user_id' AND care_extra_id= '$care_extra_id'
			"
		);
		$result = $statement->execute(
			array(

				':mo1Edit'   =>       $_POST['mo1Edit'],
				':mo2Edit'   =>       $_POST['mo2Edit'],
				':mo3Edit'   =>       $_POST['mo3Edit'],
				':mo4Edit'   =>       $_POST['mo4Edit'],
				':mo5Edit'   =>       $_POST['mo5Edit'],
				':mo6Edit'   =>       $_POST['mo6Edit'],
				':mo7Edit'   =>       $_POST['mo7Edit'],
				':mo8Edit'   =>       $_POST['mo8Edit'],
				':mo9Edit'   =>       $_POST['mo9Edit'],
				':mo11Edit'   =>       $_POST['mo11Edit'],
				':mo12Edit'   =>       $_POST['mo12Edit'],
				':mo13Edit'   =>       $_POST['mo13Edit'],
				':mo14Edit'   =>       $_POST['mo14Edit'],
				':mo15Edit'   =>       $_POST['mo15Edit'],
				':mo16Edit'   =>       $_POST['mo16Edit'],
				':mo17Edit'   =>       $_POST['mo17Edit']


			)
		);
		if(!empty($result))
		{
			echo 'Care related events Form Updated Successfully';
		}else{
			echo 'Error in updating Data';
		}

         
	

      }
  }
    

	

	

?>