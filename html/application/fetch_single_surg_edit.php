<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["surg_form_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_surg_site_infec WHERE surg_site_infec_id = '".$_POST["surg_form_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
        $dd_dt = $row["surg_dtos"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["t_adm"] = $get_date;
		$output["t_adm1"] = $get_time;		
		
		$output["dddd"] = $row["surg_nsurg"];
		$output["psympt"] = $row["surg_symp"];
		$output["tddd"] = $row["surg_symp_det"];
		$output["mlc"] = $row["surg_dtssc"];
		$output["surg"] = $row["surg_sp_ssi"];
		$output["surg_site_infec_id"] = $row["surg_site_infec_id"];
		$output["tbl_huf_id"] = $row["tbl_huf_id"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["user_idEdit"])){
    	
      if($_POST["actionEdit"]=="update"){

      	$user_id = $_POST["user_idEdit"];
      	$tbl_surg_site_infec_id = $_POST["tbl_surg_site_infec_id"];         

      	$dt1 = mysqli_real_escape_string($connect, $_POST["t_admEdit"]);
		$dtt1 = mysqli_real_escape_string($connect, $_POST["t_adm1Edit"]);
		
		
		$dt3 = $dt1.' '.$dtt1;
	
		
		$statement = $connection->prepare(
			"UPDATE tbl_surg_site_infec 
			SET surg_dtos = '$dt3', surg_symp = :psympt, surg_symp_det = :psymptDet, surg_nsurg = :tddd, surg_dtssc = :mlc, surg_sp_ssi = :surg, surg_recd = '$ses'  
			WHERE tbl_huf_id = '$user_id' AND surg_site_infec_id= '$tbl_surg_site_infec_id'
			"
		);
		$result = $statement->execute(
			array(

				//':t_adm'		=>	$_POST["t_adm"],
				//':ddd'		=>	$_POST["ddd"],
				':psympt'		=>	$_POST["psymptEdit"],
				':psymptDet'    => $_POST['tdddEdit'],
				':tddd'			=>	$_POST["ddddEdit"],
				':mlc'			=>	$_POST["mlcEdit"],
				':surg'			=>	$_POST["surgEdit"]
			)
		);
		if(!empty($result))
		{
			echo 'Surgical Site Infection Form Updated Successfully';
		}

         
	

      }
  }
    

	

	

?>