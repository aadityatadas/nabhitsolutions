<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$qry = "SELECT restrain_chklst_id FROM tbl_restrain_chklst ORDER BY restrain_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['restrain_chklst_id'];
		$cid = $id+1;
		// $surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		// $d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		// $d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
			
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);

		
				
		$statement = $connection->prepare("
			INSERT INTO tbl_restrain_chklst (restrain_chklst_id ,
									  name,
								sign,
								date1,
								time1,
						vuln_patnt_only_yn,
					pink_colr_patnt_yn,
					restrain_order_only_yn,
					restrain_consent_only_yn,
					ties_kont_10min_yn,
					chemical_yn,
					vuln_patnt_only_loc,
					pink_colr_patnt_loc,
					restrain_order_only_loc,
					restrain_consent_only_loc,
					ties_kont_10min_loc,
					chemical_loc,
					vuln_patnt_only_rmrk,
					pink_colr_patnt_rmrk,
					restrain_order_only_rmrk,
					restrain_consent_only_rmrk,
					ties_kont_10min_rmrk,
					chemical_rmrk


                    ) 
			VALUES ('$cid', 
				    '$name',
					'$sign',
					'$date',
					'$time',
					
						:vuln_patnt_only_yn,
					:pink_colr_patnt_yn,
					:restrain_order_only_yn,
					:restrain_consent_only_yn,
					:ties_kont_10min_yn,
					:chemical_yn,
					:vuln_patnt_only_loc,
					:pink_colr_patnt_loc,
					:restrain_order_only_loc,
					:restrain_consent_only_loc,
					:ties_kont_10min_loc,
					:chemical_loc,
					:vuln_patnt_only_rmrk,
					:pink_colr_patnt_rmrk,
					:restrain_order_only_rmrk,
					:restrain_consent_only_rmrk,
					:ties_kont_10min_rmrk,
					:chemical_rmrk


               )
		");


		$result = $statement->execute(
			array(

		':vuln_patnt_only_yn'  =>  $_POST['vuln_patnt_only_yn'],
		':pink_colr_patnt_yn'  =>  $_POST['pink_colr_patnt_yn'],
		':restrain_order_only_yn'  =>  $_POST['restrain_order_only_yn'],
		':restrain_consent_only_yn'  =>  $_POST['restrain_consent_only_yn'],
		':ties_kont_10min_yn'  =>  $_POST['ties_kont_10min_yn'],
		':chemical_yn'  =>  $_POST['chemical_yn'],
		':vuln_patnt_only_loc'  =>  $_POST['vuln_patnt_only_loc'],
		':pink_colr_patnt_loc'  =>  $_POST['pink_colr_patnt_loc'],
		':restrain_order_only_loc'  =>  $_POST['restrain_order_only_loc'],
		':restrain_consent_only_loc'  =>  $_POST['restrain_consent_only_loc'],
		':ties_kont_10min_loc'  =>  $_POST['ties_kont_10min_loc'],
		':chemical_loc'  =>  $_POST['chemical_loc'],
		':vuln_patnt_only_rmrk'  =>  $_POST['vuln_patnt_only_rmrk'],
		':pink_colr_patnt_rmrk'  =>  $_POST['pink_colr_patnt_rmrk'],
		':restrain_order_only_rmrk'  =>  $_POST['restrain_order_only_rmrk'],
		':restrain_consent_only_rmrk'  =>  $_POST['restrain_consent_only_rmrk'],
		':ties_kont_10min_rmrk'  =>  $_POST['ties_kont_10min_rmrk'],
		':chemical_rmrk'  =>  $_POST['chemical_rmrk']

			

		



			)
		);
		
				
		
		if(!empty($result))
		{
			echo 'Restrain Checklist Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);
		
				
			$statement = $connection->prepare("UPDATE tbl_restrain_chklst 
			SET name = :name,
               sign = :sign,
               date1 = :date1,
                time1 = :time1,
			        vuln_patnt_only_yn = :vuln_patnt_only_yn,
			pink_colr_patnt_yn = :pink_colr_patnt_yn,
			restrain_order_only_yn = :restrain_order_only_yn,
			restrain_consent_only_yn = :restrain_consent_only_yn,
			ties_kont_10min_yn = :ties_kont_10min_yn,
			chemical_yn = :chemical_yn,
			vuln_patnt_only_loc = :vuln_patnt_only_loc,
			pink_colr_patnt_loc = :pink_colr_patnt_loc,
			restrain_order_only_loc = :restrain_order_only_loc,
			restrain_consent_only_loc = :restrain_consent_only_loc,
			ties_kont_10min_loc = :ties_kont_10min_loc,
			chemical_loc = :chemical_loc,
			vuln_patnt_only_rmrk = :vuln_patnt_only_rmrk,
			pink_colr_patnt_rmrk = :pink_colr_patnt_rmrk,
			restrain_order_only_rmrk = :restrain_order_only_rmrk,
			restrain_consent_only_rmrk = :restrain_consent_only_rmrk,
			ties_kont_10min_rmrk = :ties_kont_10min_rmrk,
			chemical_rmrk = :chemical_rmrk
	      WHERE restrain_chklst_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no' => $_POST['sr_no'],
				':name'		=>	$name,
				':sign'		=>	$sign,
				':date1'		=>	$date,
				 ':time1'=>	$time,
				

	
		':vuln_patnt_only_yn'  =>  $_POST['vuln_patnt_only_yn'],
		':pink_colr_patnt_yn'  =>  $_POST['pink_colr_patnt_yn'],
		':restrain_order_only_yn'  =>  $_POST['restrain_order_only_yn'],
		':restrain_consent_only_yn'  =>  $_POST['restrain_consent_only_yn'],
		':ties_kont_10min_yn'  =>  $_POST['ties_kont_10min_yn'],
		':chemical_yn'  =>  $_POST['chemical_yn'],
		':vuln_patnt_only_loc'  =>  $_POST['vuln_patnt_only_loc'],
		':pink_colr_patnt_loc'  =>  $_POST['pink_colr_patnt_loc'],
		':restrain_order_only_loc'  =>  $_POST['restrain_order_only_loc'],
		':restrain_consent_only_loc'  =>  $_POST['restrain_consent_only_loc'],
		':ties_kont_10min_loc'  =>  $_POST['ties_kont_10min_loc'],
		':chemical_loc'  =>  $_POST['chemical_loc'],
		':vuln_patnt_only_rmrk'  =>  $_POST['vuln_patnt_only_rmrk'],
		':pink_colr_patnt_rmrk'  =>  $_POST['pink_colr_patnt_rmrk'],
		':restrain_order_only_rmrk'  =>  $_POST['restrain_order_only_rmrk'],
		':restrain_consent_only_rmrk'  =>  $_POST['restrain_consent_only_rmrk'],
		':ties_kont_10min_rmrk'  =>  $_POST['ties_kont_10min_rmrk'],
		':chemical_rmrk'  =>  $_POST['chemical_rmrk']
			)
		);
		 
		 if(!empty($result))
		{
			echo 'Restrain Checklist Updated Successfully';
		}
		}
		
	}

?>