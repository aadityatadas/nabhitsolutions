<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
include('fun_rpt_vent.php');
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

       	$vent_sympt= $_POST["psymptnew"][$count];
		$vent_sympt_det =$_POST["tdddnew"][$count];
		$vent_ssc  =  $_POST["mlcnew"][$count];
		$vent_spc  =   $_POST["surg"][$count];
		$vent_rcd = $ses;
			$statement = $connection->prepare(
			"INSERT INTO tbl_vent_ass_phmn ( `tbl_huf_id`,
			               `vent_dt_iuc`,
							`vent_dt_ruc`,
							`vent_tcd`,
							`vent_sympt`,
							`vent_sympt_det`,
							`vent_ssc`,
							`vent_spc`,
							`vent_rcd`
                            ) VALUES (  $user_huf_id,
                                      '$dt3',
										'$dt4',
										'$days',
										'$vent_sympt',
										'$vent_sympt_det',
										'$vent_ssc',
										'$vent_spc',
										'$vent_rcd');"
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
			"UPDATE tbl_huf 
			SET vent_dt_iuc = '$dt3', vent_dt_ruc = '$dt4', vent_tcd = '$days', vent_sympt = :psympt, vent_sympt_det = :tddd, vent_ssc = :mlc, vent_spc = :surg, vent_rcd = '$ses'  
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
			echo 'Ventilator Associated Pnemonia Form Updated Successfully';
		}
	}
}
?>