<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["centrl_line_assoc_id"]))
{
   
    if($_POST["action"]=="view"){
    	
	 $query = "SELECT * FROM tbl_centrl_line_assoc WHERE centrl_line_assoc_id = '".$_POST["centrl_line_assoc_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
        $dd_dt = $row["cent_bs_dticlc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["t_adm"] = $get_date;
		$output["t_adm1"] = $get_time;		
		
		$dd_dt1 = $row["cent_bs_dtrclc"];	
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["ddd"] = $get_date1;
		$output["ddd1"] = $get_time1;
		
		$output["dddd"] = $row["cent_bs_tcld"];
		$output["psympt"] = $row["cent_bs_symp"];
		$output["tddd"] = $row["cent_bs_symp_det"];
		$output["mlc"] = $row["cent_bs_ssc"];
		$output["surg"] = $row["cent_bs_clabsi"];
		$output["centrl_line_assoc_id"] = $row["centrl_line_assoc_id"];
		$output["tbl_huf_id"] = $row["tbl_huf_id"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["user_idEdit"])){
      if($_POST["actionEdit"]=="update"){
          //print($_POST);
      	$user_id = $_POST["user_idEdit"];
      	$tbl_centrl_line_assoc_id = $_POST["tbl_centrl_line_assoc_id"];         

      	$dt1 = mysqli_real_escape_string($connect, $_POST["t_admEdit"]);
		$dtt1 = mysqli_real_escape_string($connect, $_POST["t_adm1Edit"]);
		$dt2 = mysqli_real_escape_string($connect, $_POST["dddEdit"]);
		$dtt2 = mysqli_real_escape_string($connect, $_POST["ddd1Edit"]);
		
		$dt3 = $dt1.' '.$dtt1;
		$dt4 = $dt2.' '.$dtt2;
		if($dt2 != '')
		{
			$diff = abs(strtotime($dt2) - strtotime($dt1)); 
			$days = $diff/(60 * 60 * 24);
		}else{
			$days = '';
		}
		
		$statement = $connection->prepare(
			"UPDATE tbl_centrl_line_assoc 
			SET cent_bs_dticlc = '$dt3', cent_bs_dtrclc = '$dt4', cent_bs_tcld = '$days', cent_bs_symp = :psympt, cent_bs_symp_det = :tddd, cent_bs_ssc = :mlc, cent_bs_clabsi = :surg, cent_bs_recd = '$ses'  
			WHERE tbl_huf_id = '$user_id' AND 
			      centrl_line_assoc_id= '$tbl_centrl_line_assoc_id'
			"
		);
		$result = $statement->execute(
			array(

				//':t_adm'		=>	$_POST["t_adm"],
				//':ddd'		=>	$_POST["ddd"],
				':psympt'		=>	$_POST["psymptEdit"],
				':tddd'			=>	$_POST["tdddEdit"],
				':mlc'			=>	$_POST["mlcEdit"],
				':surg'			=>	$_POST["surgEdit"]
			)
		);
		if(!empty($result))
		{
			echo 'Central Line Associated Blood Stream Infection Form Updated Successfully';
		}

         
	

      }
  }
    

	

	

?>