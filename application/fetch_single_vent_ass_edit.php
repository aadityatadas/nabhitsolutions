<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["vent_ass_form_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_vent_ass_phmn WHERE vent_ass_phmn_id = '".$_POST["vent_ass_form_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
        $dd_dt = $row["vent_dt_iuc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["t_adm"] = $get_date;
		$output["t_adm1"] = $get_time;		
		
		$dd_dt1 = $row["vent_dt_ruc"];	
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["ddd"] = $get_date1;
		$output["ddd1"] = $get_time1;
		
		$output["dddd"] = $row["vent_tcd"];
		$output["psympt"] = $row["vent_sympt"];
		$output["tddd"] = $row["vent_sympt_det"];
		$output["mlc"] = $row["vent_ssc"];
		$output["surg"] = $row["vent_spc"];
		$output["vent_ass_phmn_id"] = $row["vent_ass_phmn_id"];
		$output["tbl_huf_id"] = $row["tbl_huf_id"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["user_idEdit"])){
      if($_POST["actionEdit"]=="update"){

      	$user_id = $_POST["user_idEdit"];
      	$tbl_vent_ass_id = $_POST["tbl_vent_ass_id"];         

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
			"UPDATE tbl_vent_ass_phmn 
			SET vent_dt_iuc = '$dt3', vent_dt_ruc = '$dt4', vent_tcd = '$days', vent_sympt = :psympt, vent_sympt_det = :tddd, vent_ssc = :mlc, vent_spc = :surg, vent_rcd = '$ses'  
			WHERE tbl_huf_id = '$user_id' AND vent_ass_phmn_id= '$tbl_vent_ass_id'
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
			echo 'Ventilator Associated Pnemonia Form Updated Successfully';
		}

         
	

      }
  }
    

	

	

?>