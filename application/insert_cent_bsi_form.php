<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
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

       	$centrl_sympt= $_POST["psymptnew"][$count];
		$centrl_sympt_det =$_POST["tdddnew"][$count];
		$centrl_ssc  =  $_POST["mlcnew"][$count];
		$centrl_spc  =   $_POST["surg"][$count];
		$centrl_rcd = $ses;
			$statement = $connection->prepare(
			"INSERT INTO tbl_centrl_line_assoc ( `tbl_huf_id`,
			               `cent_bs_dticlc`,
							`cent_bs_dtrclc`,
							`cent_bs_tcld`,
							`cent_bs_symp`,
							`cent_bs_symp_det`,
							`cent_bs_ssc`,
							`cent_bs_clabsi`,
							`cent_bs_recd`
                            ) VALUES (  $user_huf_id,
                                      '$dt3',
										'$dt4',
										'$days',
										'$centrl_sympt',
										'$centrl_sympt_det',
										'$centrl_ssc',
										'$centrl_spc',
										'$centrl_rcd');"
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
			SET cent_bs_dticlc = '$d1', cent_bs_dtrclc = '$d2', cent_bs_tcld = '$days', cent_bs_symp = :psympt, cent_bs_symp_det = :tddd, cent_bs_ssc = :mlc, cent_bs_clabsi = :surg, cent_bs_recd = '$ses'  
			WHERE huf_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				//':t_adm'		=>	$_POST["t_adm"],
				//':ddd'		=>	$_POST["ddd"],
				//':dddd'		=>	$_POST["dddd"],
				':psympt'		=>	$_POST["psympt"],
				':tddd'			=>	$_POST["tddd"],
				':mlc'			=>	$_POST["mlc"],
				':surg'			=>	$_POST["surg"]
			)
		);
		if(!empty($result))
		{
			echo 'Central Line Associated Blood Stream Infection Form Updated Successfully';
		}
	}
}
?>