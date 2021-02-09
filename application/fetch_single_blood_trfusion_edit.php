<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["bld_extra_id"]))
{
   
    if($_POST["action"]=="view"){
	 $query = "SELECT * FROM tbl_blood_fusion_extra WHERE bld_extra_id = '".$_POST["bld_extra_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
       $output = array();
        $output["mo1Edit"] = $row["bld_prdreq"];
		$output["mo2Edit"] = $row["bld_nounit"];
		$output["mo3Edit"] = $row["bld_dtreq"];
		$output["mo4Edit"] = $row["bld_tmreq"];
		$output["mo5Edit"] = $row["bld_bankname"];
		$output["mo6Edit"] = $row["bld_ordby"];
		$output["mo7Edit"] = $row["bld_dtrec"];
		$output["mo8Edit"] = $row["bld_norec"];
		$output["mo9Edit"] = $row["bld_tmrec"];
		$output["mo10Edit"] = $row["bld_tat"];
		$output["mo11Edit"] = $row["bld_recby"];
		$output["mo12Edit"] = $row["bld_notrfus"];
		$output["mo13Edit"] = $row["bld_trfusreact"];
		$output["mo14Edit"] = $row["bld_waste"];
		$output["mo15Edit"] = $row["bld_waste_det"];
		$output["bld_extra_id"] = $row["bld_extra_id"];
		$output["bld_id"] = $row["bld_id"];
      echo json_encode($output);
	
      }

   }
     
    if(isset($_POST["user_idEdit"])){
      if($_POST["actionEdit"]=="update"){

      	$user_id = $_POST["user_idEdit"];
      	$bld_extra_id = $_POST["bld_extra_id"];         

      	$dt = mysqli_real_escape_string($connect, $_POST["mo3Edit"]);
		$dtt = mysqli_real_escape_string($connect, $_POST["mo7Edit"]);
		
		$d1 = mysqli_real_escape_string($connect, $_POST["mo4Edit"]);
		$d2 = mysqli_real_escape_string($connect, $_POST["mo9Edit"]);
		
		
		$ds = $dt.' '.$d1;
		$dss = $dtt.' '.$d2;

		$diff = abs(strtotime($ds) - strtotime($dss));

		$tmins = $diff/60;

		$hours = floor($tmins/60);

		$mins = $tmins%60;
		$ht_mi = $hours.':'.$mins;
		
		$statement = $connection->prepare(
			"UPDATE tbl_blood_fusion_extra 
			SET 
				bld_prdreq = :mo1Edit,
				bld_nounit = :mo2Edit,
				bld_dtreq = :mo3Edit,
				bld_tmreq = :mo4Edit,
				bld_bankname = :mo5Edit,
				bld_ordby = :mo6Edit,
				bld_dtrec = :mo7Edit,
				bld_norec = :mo8Edit,
				bld_tmrec = :mo9Edit,
				bld_tat = '$ht_mi',
				bld_recby = :mo11Edit,
				bld_notrfus = :mo12Edit,
				bld_trfusreact = :mo13Edit,
				bld_waste = :mo14Edit,
				bld_waste_det = :mo15Edit,
				bld_recd = '$ses'

  
			WHERE bld_id = '$user_id' AND bld_extra_id= '$bld_extra_id'
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
				':mo15Edit'   =>       $_POST['mo15Edit']


			)
		);
		if(!empty($result))
		{
			echo 'Blood Trasfusion related events Form Updated Successfully';
		}

         
	

      }
  }
    

	

	

?>