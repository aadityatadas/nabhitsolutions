<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
$user_huf_id = $_POST["sr_no"];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		if(isset($_POST["t_admnew"])){


			for($count = 0; $count < count($_POST["t_admnew"]); $count++)
		    { 
		    		$date1 = mysqli_real_escape_string($connect, $_POST["t_admnew"][$count]);
					$time1 = mysqli_real_escape_string($connect, $_POST["t_adm1new"][$count]);
					$dt3 = $date1.' '.$time1;
					$surg_name= $_POST["surg_name"][$count];
					$surg_sympt =$_POST["surg_sympt"][$count];
					$surg_sympt_det =$_POST["surg_sympt_det"][$count];
					$surg_ssc  =  $_POST["surg_ssc"][$count];
					$surg_spc  =   $_POST["surg_spc"][$count];
					$surg_rcd = $ses;
			$statement = $connection->prepare(
			"INSERT INTO tbl_surg_site_infec ( `tbl_huf_id`,
			               `surg_dtos`,
							`surg_nsurg`,
							`surg_symp`,
							`surg_symp_det`,
							`surg_dtssc`,
							`surg_sp_ssi`,
							 `surg_recd`
                            ) VALUES ( $user_huf_id,
                                      '$dt3',
										'$surg_name',
										'$surg_sympt',
										'$surg_sympt_det',
										'$surg_ssc',
										'$surg_spc',
										'$surg_rcd');"
					);

		
		$result = $statement->execute();
        
	
		if(empty($result))
		{
			//print_r($statement->errorInfo());
			 echo ' Error in Submission of  Form ';
			 die();
		} 
	}
		
		

		 echo 'Record Added Successfully';
		 die();
		}
		$dt1 = mysqli_real_escape_string($connect, $_POST["dddd"]);
		$dtt1 = mysqli_real_escape_string($connect, $_POST["dddd1"]);
		$d1 = $dt1.' '.$dtt1;
		
		$statement = $connection->prepare(
			"UPDATE tbl_huf 
			SET surg_dtos = '$d1', surg_nsurg = :ddd, surg_symp = :psympt, surg_symp_det = :tddd, surg_dtssc = :mlc, surg_sp_ssi = :surg, surg_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				//':dddd'			=>	$_POST["dddd"],
				':ddd'			=>	$_POST["ddd"],
				':psympt'		=>	$_POST["psympt"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
			)
		);
		if(!empty($result))
		{
			echo 'Surgical Site Infection Form Submitted Successfully';
		}
	}
}
?>