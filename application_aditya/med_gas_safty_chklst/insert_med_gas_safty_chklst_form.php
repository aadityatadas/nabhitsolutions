<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$qry = "SELECT med_gas_safty_chklst_id FROM tbl_med_gas_safty_chklst ORDER BY med_gas_safty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['med_gas_safty_chklst_id'];
		$cid = $id+1;
		// $surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		// $d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		// $d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
			
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);

		
				
		$statement = $connection->prepare("
			INSERT INTO tbl_med_gas_safty_chklst (med_gas_safty_chklst_id ,
									  name,
								sign,
								date1,
								time1,
								stock_book_mantan_yn,
								
								stock_book_mantan_loc,
								stock_book_mantan_rmrk,
								log_cynlr_yn,
								
								log_cynlr_loc,
								log_cynlr_rmrk,
								presur_chkd_daily_yn,
							
								presur_chkd_daily_loc,
								presur_chkd_daily_rmrk,
								emply_cylndr_yn,
								
								emply_cylndr_loc,
								emply_cylndr_rmrk,
								labl_full_yn,
								
								labl_full_loc,
								labl_full_rmrk,
								all_cylndr_strchr_yn,
								
								all_cylndr_strchr_loc,
								all_cylndr_strchr_rmrk,
								msds_each_dep_yn,
								
								msds_each_dep_loc,
								msds_each_dep_rmrk,
								safty_condtn_yn,
							
								safty_condtn_loc,
								safty_condtn_rmrk,
								med_gas_pipe_schld_yn,
							
								med_gas_pipe_schld_loc,
								med_gas_pipe_schld_rmrk,
								gas_main_lock_yn,
							
								gas_main_lock_loc,
								gas_main_lock_rmrk
								
                    ) 
			VALUES ('$cid', 
				    '$name',
					'$sign',
					'$date',
					'$time',
					:stock_book_mantan_yn,
					
					:stock_book_mantan_loc,
					:stock_book_mantan_rmrk,
					:log_cynlr_yn,
					
					:log_cynlr_loc,
					:log_cynlr_rmrk,
					:presur_chkd_daily_yn,
					
					:presur_chkd_daily_loc,
					:presur_chkd_daily_rmrk,
					:emply_cylndr_yn,

					:emply_cylndr_loc,
					:emply_cylndr_rmrk,
					:labl_full_yn,
					
					:labl_full_loc,
					:labl_full_rmrk,
					:all_cylndr_strchr_yn,
					
					:all_cylndr_strchr_loc,
					:all_cylndr_strchr_rmrk,
					:msds_each_dep_yn,
					
					:msds_each_dep_loc,
					:msds_each_dep_rmrk,
					:safty_condtn_yn,
					
					:safty_condtn_loc,
					:safty_condtn_rmrk,
					:med_gas_pipe_schld_yn,
					
					:med_gas_pipe_schld_loc,
					:med_gas_pipe_schld_rmrk,
					:gas_main_lock_yn,
					
					:gas_main_lock_loc,
					:gas_main_lock_rmrk
               )
		");


		$result = $statement->execute(
			array(
			

':stock_book_mantan_yn'  => $_POST['stock_book_mantan_yn'],

':stock_book_mantan_loc'  => $_POST['stock_book_mantan_loc'],
':stock_book_mantan_rmrk'  => $_POST['stock_book_mantan_rmrk'],
':log_cynlr_yn'  => $_POST['log_cynlr_yn'],

':log_cynlr_loc'  => $_POST['log_cynlr_loc'],
':log_cynlr_rmrk'  => $_POST['log_cynlr_rmrk'],
':presur_chkd_daily_yn'  => $_POST['presur_chkd_daily_yn'],

':presur_chkd_daily_loc'  => $_POST['presur_chkd_daily_loc'],
':presur_chkd_daily_rmrk'  => $_POST['presur_chkd_daily_rmrk'],
':emply_cylndr_yn'  => $_POST['emply_cylndr_yn'],

':emply_cylndr_loc'  => $_POST['emply_cylndr_loc'],
':emply_cylndr_rmrk'  => $_POST['emply_cylndr_rmrk'],
':labl_full_yn'  => $_POST['labl_full_yn'],

':labl_full_loc'  => $_POST['labl_full_loc'],
':labl_full_rmrk'  => $_POST['labl_full_rmrk'],
':all_cylndr_strchr_yn'  => $_POST['all_cylndr_strchr_yn'],

':all_cylndr_strchr_loc'  => $_POST['all_cylndr_strchr_loc'],
':all_cylndr_strchr_rmrk'  => $_POST['all_cylndr_strchr_rmrk'],
':msds_each_dep_yn'  => $_POST['msds_each_dep_yn'],
':msds_each_dep_loc'  => $_POST['msds_each_dep_loc'],
':msds_each_dep_rmrk'  => $_POST['msds_each_dep_rmrk'],
':safty_condtn_yn'  => $_POST['safty_condtn_yn'],
':safty_condtn_loc'  => $_POST['safty_condtn_loc'],
':safty_condtn_rmrk'  => $_POST['safty_condtn_rmrk'],
':med_gas_pipe_schld_yn'  => $_POST['med_gas_pipe_schld_yn'],
':med_gas_pipe_schld_loc'  => $_POST['med_gas_pipe_schld_loc'],
':med_gas_pipe_schld_rmrk'  => $_POST['med_gas_pipe_schld_rmrk'],
':gas_main_lock_yn'  => $_POST['gas_main_lock_yn'],
':gas_main_lock_loc'  => $_POST['gas_main_lock_loc'],
':gas_main_lock_rmrk'  => $_POST['gas_main_lock_rmrk']


			)
		);
		
				
		
		if(!empty($result))
		{
			echo 'Infection Control Checklist Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);
		
				
			$statement = $connection->prepare("UPDATE tbl_med_gas_safty_chklst 
			SET name = :name,
               sign = :sign,
               date1 = :date,
                time1 = :time,
stock_book_mantan_yn = :stock_book_mantan_yn,

stock_book_mantan_loc = :stock_book_mantan_loc,
stock_book_mantan_rmrk = :stock_book_mantan_rmrk,
log_cynlr_yn = :log_cynlr_yn,

log_cynlr_loc = :log_cynlr_loc,
log_cynlr_rmrk = :log_cynlr_rmrk,
presur_chkd_daily_yn = :presur_chkd_daily_yn,

presur_chkd_daily_loc = :presur_chkd_daily_loc,
presur_chkd_daily_rmrk = :presur_chkd_daily_rmrk,
emply_cylndr_yn = :emply_cylndr_yn,

emply_cylndr_loc = :emply_cylndr_loc,
emply_cylndr_rmrk = :emply_cylndr_rmrk,
labl_full_yn = :labl_full_yn,

labl_full_loc = :labl_full_loc,
labl_full_rmrk = :labl_full_rmrk,
all_cylndr_strchr_yn = :all_cylndr_strchr_yn,

all_cylndr_strchr_loc = :all_cylndr_strchr_loc,
all_cylndr_strchr_rmrk = :all_cylndr_strchr_rmrk,
msds_each_dep_yn = :msds_each_dep_yn,

msds_each_dep_loc = :msds_each_dep_loc,
msds_each_dep_rmrk = :msds_each_dep_rmrk,
safty_condtn_yn = :safty_condtn_yn,

safty_condtn_loc = :safty_condtn_loc,
safty_condtn_rmrk = :safty_condtn_rmrk,
med_gas_pipe_schld_yn = :med_gas_pipe_schld_yn,

med_gas_pipe_schld_loc = :med_gas_pipe_schld_loc,
med_gas_pipe_schld_rmrk = :med_gas_pipe_schld_rmrk,
gas_main_lock_yn = :gas_main_lock_yn,

gas_main_lock_loc = :gas_main_lock_loc,
gas_main_lock_rmrk = :gas_main_lock_rmrk
 

			WHERE med_gas_safty_chklst_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no' => $_POST['sr_no'],
				':name'		=>	$name,
				':sign'		=>	$sign,
				':date'		=>	$date,
				 ':time'=>	$time,
				

			':stock_book_mantan_yn'  => $_POST['stock_book_mantan_yn'],

':stock_book_mantan_loc'  => $_POST['stock_book_mantan_loc'],
':stock_book_mantan_rmrk'  => $_POST['stock_book_mantan_rmrk'],
':log_cynlr_yn'  => $_POST['log_cynlr_yn'],

':log_cynlr_loc'  => $_POST['log_cynlr_loc'],
':log_cynlr_rmrk'  => $_POST['log_cynlr_rmrk'],
':presur_chkd_daily_yn'  => $_POST['presur_chkd_daily_yn'],

':presur_chkd_daily_loc'  => $_POST['presur_chkd_daily_loc'],
':presur_chkd_daily_rmrk'  => $_POST['presur_chkd_daily_rmrk'],
':emply_cylndr_yn'  => $_POST['emply_cylndr_yn'],

':emply_cylndr_loc'  => $_POST['emply_cylndr_loc'],
':emply_cylndr_rmrk'  => $_POST['emply_cylndr_rmrk'],
':labl_full_yn'  => $_POST['labl_full_yn'],
':labl_full_loc'  => $_POST['labl_full_loc'],
':labl_full_rmrk'  => $_POST['labl_full_rmrk'],
':all_cylndr_strchr_yn'  => $_POST['all_cylndr_strchr_yn'],
':all_cylndr_strchr_loc'  => $_POST['all_cylndr_strchr_loc'],
':all_cylndr_strchr_rmrk'  => $_POST['all_cylndr_strchr_rmrk'],
':msds_each_dep_yn'  => $_POST['msds_each_dep_yn'],

':msds_each_dep_loc'  => $_POST['msds_each_dep_loc'],
':msds_each_dep_rmrk'  => $_POST['msds_each_dep_rmrk'],
':safty_condtn_yn'  => $_POST['safty_condtn_yn'],

':safty_condtn_loc'  => $_POST['safty_condtn_loc'],
':safty_condtn_rmrk'  => $_POST['safty_condtn_rmrk'],
':med_gas_pipe_schld_yn'  => $_POST['med_gas_pipe_schld_yn'],

':med_gas_pipe_schld_loc'  => $_POST['med_gas_pipe_schld_loc'],
':med_gas_pipe_schld_rmrk'  => $_POST['med_gas_pipe_schld_rmrk'],
':gas_main_lock_yn'  => $_POST['gas_main_lock_yn'],

':gas_main_lock_loc'  => $_POST['gas_main_lock_loc'],
':gas_main_lock_rmrk'  => $_POST['gas_main_lock_rmrk'],

			)
		);
		 
		 if(!empty($result))
		{
			echo 'Infection Control Checklist Updated Successfully';
		}
		}
		
	}

?>