<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];
//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$qry = "SELECT sedatin_sfty_chklst_id FROM tbl_sedatin_sfty_chklst 
		ORDER BY sedatin_sfty_chklst_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['sedatin_sfty_chklst_id'];
		$cid = $id+1;
		// $surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		// $d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		// $d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
			
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);

		
				
		$statement = $connection->prepare("
			INSERT INTO tbl_sedatin_sfty_chklst (sedatin_sfty_chklst_id ,
									  name,
								sign,
								date1,
								time1,
						sedtin_cnstnt_tkn_yn,
						sedtin_score_filld_yn,
						sedtin_gvn_only_yn,
						if_sedtive_restnt_only_yn,
						sedtive_drug_prtcl_yn,
						sedtin_cnstnt_tkn_loc,
						sedtin_score_filld_loc,
						sedtin_gvn_only_loc,
						if_sedtive_restnt_only_loc,
						sedtive_drug_prtcl_loc,
						sedtin_cnstnt_tkn_rmrk,
						sedtin_score_filld_rmrk,
						sedtin_gvn_only_rmrk,
						if_sedtive_restnt_only_rmrk,
						sedtive_drug_prtcl_rmrk

                    ) 
			VALUES ('$cid', 
				    '$name',
					'$sign',
					'$date',
					'$time',
					:sedtin_cnstnt_tkn_yn,
					:sedtin_score_filld_yn,
					:sedtin_gvn_only_yn,
					:if_sedtive_restnt_only_yn,
					:sedtive_drug_prtcl_yn,
					:sedtin_cnstnt_tkn_loc,
					:sedtin_score_filld_loc,
					:sedtin_gvn_only_loc,
					:if_sedtive_restnt_only_loc,
					:sedtive_drug_prtcl_loc,
					:sedtin_cnstnt_tkn_rmrk,
					:sedtin_score_filld_rmrk,
					:sedtin_gvn_only_rmrk,
					:if_sedtive_restnt_only_rmrk,
					:sedtive_drug_prtcl_rmrk


               )
		");


		$result = $statement->execute(
			array(
			

		':sedtin_cnstnt_tkn_yn'  =>  $_POST['sedtin_cnstnt_tkn_yn'],
		':sedtin_score_filld_yn'  =>  $_POST['sedtin_score_filld_yn'],
		':sedtin_gvn_only_yn'  =>  $_POST['sedtin_gvn_only_yn'],
		':if_sedtive_restnt_only_yn'  =>  $_POST['if_sedtive_restnt_only_yn'],
		':sedtive_drug_prtcl_yn'  =>  $_POST['sedtive_drug_prtcl_yn'],
		':sedtin_cnstnt_tkn_loc'  =>  $_POST['sedtin_cnstnt_tkn_loc'],
		':sedtin_score_filld_loc'  =>  $_POST['sedtin_score_filld_loc'],
		':sedtin_gvn_only_loc'  =>  $_POST['sedtin_gvn_only_loc'],
		':if_sedtive_restnt_only_loc'  =>  $_POST['if_sedtive_restnt_only_loc'],
		':sedtive_drug_prtcl_loc'  =>  $_POST['sedtive_drug_prtcl_loc'],
		':sedtin_cnstnt_tkn_rmrk'  =>  $_POST['sedtin_cnstnt_tkn_rmrk'],
		':sedtin_score_filld_rmrk'  =>  $_POST['sedtin_score_filld_rmrk'],
		':sedtin_gvn_only_rmrk'  =>  $_POST['sedtin_gvn_only_rmrk'],
		':if_sedtive_restnt_only_rmrk'  =>  $_POST['if_sedtive_restnt_only_rmrk'],
		':sedtive_drug_prtcl_rmrk'  =>  $_POST['sedtive_drug_prtcl_rmrk']



			)
		);
		
				
		
		if(!empty($result))
		{
			echo 'Sedation Safety Checklist Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$name=mysqli_real_escape_string($connect, $_POST["name"]);
		 $sign = mysqli_real_escape_string($connect, $_POST["sign"]);
		$date=mysqli_real_escape_string($connect, $_POST["list-date"]);
		$time = mysqli_real_escape_string($connect, $_POST["list-time"]);
		
				
			$statement = $connection->prepare("UPDATE tbl_sedatin_sfty_chklst 
			SET name = :name,
               sign = :sign,
               date1 = :date1,
                time1 = :time1,
          	sedtin_cnstnt_tkn_yn = :sedtin_cnstnt_tkn_yn,
			sedtin_score_filld_yn = :sedtin_score_filld_yn,
			sedtin_gvn_only_yn = :sedtin_gvn_only_yn,
			if_sedtive_restnt_only_yn = :if_sedtive_restnt_only_yn,
			sedtive_drug_prtcl_yn = :sedtive_drug_prtcl_yn,
			sedtin_cnstnt_tkn_loc = :sedtin_cnstnt_tkn_loc,
			sedtin_score_filld_loc = :sedtin_score_filld_loc,
			sedtin_gvn_only_loc = :sedtin_gvn_only_loc,
			if_sedtive_restnt_only_loc = :if_sedtive_restnt_only_loc,
			sedtive_drug_prtcl_loc = :sedtive_drug_prtcl_loc,
			sedtin_cnstnt_tkn_rmrk = :sedtin_cnstnt_tkn_rmrk,
			sedtin_score_filld_rmrk = :sedtin_score_filld_rmrk,
			sedtin_gvn_only_rmrk = :sedtin_gvn_only_rmrk,
			if_sedtive_restnt_only_rmrk = :if_sedtive_restnt_only_rmrk,
			sedtive_drug_prtcl_rmrk = :sedtive_drug_prtcl_rmrk


			WHERE sedatin_sfty_chklst_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no' => $_POST['sr_no'],
				':name'		=>	$name,
				':sign'		=>	$sign,
				':date1'		=>	$date,
				 ':time1'=>	$time,
				

	
		':sedtin_cnstnt_tkn_yn'  =>  $_POST['sedtin_cnstnt_tkn_yn'],
		':sedtin_score_filld_yn'  =>  $_POST['sedtin_score_filld_yn'],
		':sedtin_gvn_only_yn'  =>  $_POST['sedtin_gvn_only_yn'],
		':if_sedtive_restnt_only_yn'  =>  $_POST['if_sedtive_restnt_only_yn'],
		':sedtive_drug_prtcl_yn'  =>  $_POST['sedtive_drug_prtcl_yn'],
		':sedtin_cnstnt_tkn_loc'  =>  $_POST['sedtin_cnstnt_tkn_loc'],
		':sedtin_score_filld_loc'  =>  $_POST['sedtin_score_filld_loc'],
		':sedtin_gvn_only_loc'  =>  $_POST['sedtin_gvn_only_loc'],
		':if_sedtive_restnt_only_loc'  =>  $_POST['if_sedtive_restnt_only_loc'],
		':sedtive_drug_prtcl_loc'  =>  $_POST['sedtive_drug_prtcl_loc'],
		':sedtin_cnstnt_tkn_rmrk'  =>  $_POST['sedtin_cnstnt_tkn_rmrk'],
		':sedtin_score_filld_rmrk'  =>  $_POST['sedtin_score_filld_rmrk'],
		':sedtin_gvn_only_rmrk'  =>  $_POST['sedtin_gvn_only_rmrk'],
		':if_sedtive_restnt_only_rmrk'  =>  $_POST['if_sedtive_restnt_only_rmrk'],
		':sedtive_drug_prtcl_rmrk'  =>  $_POST['sedtive_drug_prtcl_rmrk']
			)
		);
		 
		 if(!empty($result))
		{
			echo 'Sedation Safety Checklist Updated Successfully';
		}
		}
		
	}

?>