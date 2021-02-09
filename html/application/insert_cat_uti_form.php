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
		$date2 = mysqli_real_escape_string($connect, $_POST["dddnew"][$count]);
		$time2 = mysqli_real_escape_string($connect, $_POST["ddd1new"][$count]);
		$dt3 = $date1.' '.$time1;
		$dt4 = $date2.' '.$time2;
		if($date2 != '')
		{
			$diff = abs(strtotime($date2) - strtotime($date1)); 
			$days = $diff/(60 * 60 * 24);
		}else{
			$days = '';
		}

       	$cath_sympt= $_POST["psymptnew"][$count];
		$cath_sympt_det =$_POST["tdddnew"][$count];
		$cath_ssc  =  $_POST["mlcnew"][$count];
		$cath_spc  =   $_POST["surg"][$count];
		$cath_rcd  = $ses;
			$statement = $connection->prepare(
			"INSERT INTO tbl_cath_assoc_uti ( `tbl_huf_id`,
			               `cath_uti_iuc`,
							`cath_uti_ruc`,
							`cath_uti_tcd`,
							`cath_uti_symp`,
							`cath_uti_symp_det`,
							`cath_uti_ssc`,
							`cath_uti_spc`,
							`cath_uti_recd`
                            ) VALUES (  $user_huf_id,
                                      '$dt3',
										'$dt4',
										'$days',
										'$cath_sympt',
										'$cath_sympt_det',
										'$cath_ssc',
										'$cath_spc',
										'$cath_rcd');"
					);

		
		$result = $statement->execute();
        
	
		if(empty($result))
		{
			 echo ' Error in Submission of  Form ';
			 die();
		} 
	}
		
		

		 echo 'Record Added Successfully';
		 die();
}

		$dt1 = mysqli_real_escape_string($connect, $_POST["t_adm"]);
		$dtt1 = mysqli_real_escape_string($connect, $_POST["t_adm1"]);
		$dt2 = mysqli_real_escape_string($connect, $_POST["ddd"]);
		$dtt2 = mysqli_real_escape_string($connect, $_POST["ddd1"]);
		$d1 = $dt1.' '.$dtt1;
		$d2 = $dt2.' '.$dtt2;
		if($dt2 != '')
		{
			$diff = abs(strtotime($dt2) - strtotime($dt1)); 
			$days = $diff/(60 * 60 * 24);
		}else{
			$days = '';
		}
			
		
		$statement = $connection->prepare(
			"UPDATE tbl_huf 
			SET cath_uti_iuc = '$d1', cath_uti_ruc = '$d2', cath_uti_tcd = '$days', cath_uti_symp = :psympt, cath_uti_symp_det = :tddd, cath_uti_ssc = :mlc, cath_uti_spc = :surg, cath_uti_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				//':t_adm'		=>	$_POST["t_adm"],
				//':ddd'		=>	$_POST["ddd"],
				':psympt'		=>	$_POST["psympt"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
			)
		);
		if(!empty($result))
		{
			echo 'Cather Associated Unrinary Tract Infection Form Updated Successfully';
		}
	}
}
?>