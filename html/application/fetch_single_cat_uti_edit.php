<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["cath_assoc_uti_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_cath_assoc_uti WHERE cath_assoc_uti_id = '".$_POST["cath_assoc_uti_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
        $dd_dt = $row["cath_uti_iuc"];		
		$new_time = explode(" ",$dd_dt);
		$get_date = $new_time[0];
		$get_time = $new_time[1];
		$output["t_adm"] = $get_date;
		$output["t_adm1"] = $get_time;		
		
		$dd_dt1 = $row["cath_uti_ruc"];	
		$new_time1 = explode(" ",$dd_dt1);
		$get_date1 = $new_time1[0];
		$get_time1 = $new_time1[1];
		$output["ddd"] = $get_date1;
		$output["ddd1"] = $get_time1;
		
		$output["dddd"] = $row["cath_uti_tcd"];
		$output["psympt"] = $row["cath_uti_symp"];
		$output["tddd"] = $row["cath_uti_symp_det"];
		$output["mlc"] = $row["cath_uti_ssc"];
		$output["surg"] = $row["cath_uti_spc"];
		$output["cath_assoc_uti_id"] = $row["cath_assoc_uti_id"];
		$output["tbl_huf_id"] = $row["tbl_huf_id"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["user_idEdit"])){
      if($_POST["actionEdit"]=="update"){
        //print($_POST["tbl_cath_assoc_uti"]);
      	$user_id = $_POST["user_idEdit"];
      	$tbl_cath_assoc_uti_id = $_POST["tbl_cath_assoc_uti"];         

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
			"UPDATE tbl_cath_assoc_uti 
			SET cath_uti_iuc = '$dt3', cath_uti_ruc = '$dt4', cath_uti_tcd = '$days', cath_uti_symp = :psympt, cath_uti_symp_det = :tddd, cath_uti_ssc = :mlc, cath_uti_spc = :surg, cath_uti_recd = '$ses'  
			WHERE tbl_huf_id = '$user_id' AND cath_assoc_uti_id= '$tbl_cath_assoc_uti_id'
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
			echo 'Cather Associated UTI Form Updated Successfully';
		}

         
	

      }
  }
    

	

	

?>