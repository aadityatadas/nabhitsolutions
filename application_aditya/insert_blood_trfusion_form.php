<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{


		if(isset($_POST["mo1new"])){


	for($count = 0; $count < count($_POST["mo1new"]); $count++)
    { 
		$dt = mysqli_real_escape_string($connect, $_POST["mo3new"][$count]);
		$dtt = mysqli_real_escape_string($connect, $_POST["mo7new"][$count]);
		
		$d1 = mysqli_real_escape_string($connect, $_POST["mo4new"][$count]);
		$d2 = mysqli_real_escape_string($connect, $_POST["mo9new"][$count]);
		
		
		$ds = $dt.' '.$d1;
		$dss = $dtt.' '.$d2;

		$diff = abs(strtotime($ds) - strtotime($dss));

		$tmins = $diff/60;

		$hours = floor($tmins/60);

		$mins = $tmins%60;
		$ht_mi = $hours.':'.$mins;
		
		$bld_id= $_POST["sr_no"];

		$bld_prdreq = $_POST['mo1new'][$count];
			$bld_nounit = $_POST['mo2new'][$count];
			$bld_dtreq = $_POST['mo3new'][$count];
			$bld_tmreq = $_POST['mo4new'][$count];
			$bld_bankname = $_POST['mo5new'][$count];
			$bld_ordby = $_POST['mo6new'][$count];
			$bld_dtrec = $_POST['mo7new'][$count];
			$bld_norec = $_POST['mo8new'][$count];
			$bld_tmrec = $_POST['mo9new'][$count];
			$bld_tat = $ht_mi;
			$bld_recby = $_POST['mo11new'][$count];
			$bld_notrfus = $_POST['mo12new'][$count];
			$bld_trfusreact = $_POST['mo13new'][$count];
			$bld_waste = $_POST['mo14new'][$count];
			$bld_waste_det = $_POST['mo15new'][$count];
			

		$bld_recd = $ses;

			$statement = $connection->prepare(
			"INSERT INTO tbl_blood_fusion_extra ( `bld_id`,
			                        `bld_prdreq`,
                                    `bld_nounit`,
                                    `bld_dtreq`,
                                    `bld_tmreq`,
                                    `bld_bankname`,
                                    `bld_ordby`,
                                    `bld_dtrec`,
                                    `bld_norec`,
                                    `bld_tmrec`,
                                    `bld_tat`,
                                    `bld_recby`,
                                    `bld_notrfus`,
                                    `bld_trfusreact`,
                                    `bld_waste`,
                                    `bld_waste_det`,
                                    `bld_recd`

                            ) VALUES (  '$bld_id',
                                       '$bld_prdreq',
                                      '$bld_nounit',
                                       '$bld_dtreq',
                                      '$bld_tmreq',
                                                 '$bld_bankname',
                                                 '$bld_ordby',
                                                 '$bld_dtrec',
                                                 '$bld_norec',
                                                 '$bld_tmrec',
                                                 '$bld_tat',
                                                 '$bld_recby',
                                                 '$bld_notrfus',
                                                 '$bld_trfusreact',
                                                 '$bld_waste',
                                                 '$bld_waste_det',
                                                 '$bld_recd'

								);"
					);

		
		$result = $statement->execute();
       
        
	
		if(empty($result))
		{
			 echo ' Error in Submission of  Form ';
			 die();
		} 
	}
		
		

		 //echo 'Record Added Successfully';
		 
}

		$dt = mysqli_real_escape_string($connect, $_POST["mo3"]);
		$dtt = mysqli_real_escape_string($connect, $_POST["mo7"]);
		
		$d1 = mysqli_real_escape_string($connect, $_POST["mo4"]);
		$d2 = mysqli_real_escape_string($connect, $_POST["mo9"]);
		
		
		$ds = $dt.' '.$d1;
		$dss = $dtt.' '.$d2;

		$diff = abs(strtotime($ds) - strtotime($dss));

		$tmins = $diff/60;

		$hours = floor($tmins/60);

		$mins = $tmins%60;
		$ht_mi = $hours.':'.$mins;
		
		$statement = $connection->prepare(
			"UPDATE tbl_blood_fusion 
			SET bld_prdreq = :mo1, bld_nounit = :mo2, bld_dtreq = :mo3, bld_tmreq = :mo4, bld_bankname = :mo5, bld_ordby = :mo6, bld_dtrec = :mo7, bld_norec = :mo8, bld_tmrec = :mo9, bld_tat = '$ht_mi',
			bld_recby = :mo11, bld_notrfus = :mo12, bld_trfusreact = :mo13, bld_waste = :mo14, bld_waste_det = :mo15, bld_recd = '$ses'  
			WHERE bld_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'	=>	$_POST["sr_no"],
				':mo1'		=>	$_POST["mo1"],
				':mo2'		=>	$_POST["mo2"],
				':mo3'		=>	$_POST["mo3"],
				':mo4'		=>	$_POST["mo4"],
				':mo5'		=>	$_POST["mo5"],
				':mo6'		=>	$_POST["mo6"],
				':mo7'		=>	$_POST["mo7"],
				':mo8'		=>	$_POST["mo8"],
				':mo9'		=>	$_POST["mo9"],
				//':mo10'		=>	$_POST["mo10"],
				':mo11'		=>	$_POST["mo11"],
				':mo12'		=>	$_POST["mo12"],
				':mo13'		=>	$_POST["mo13"],
				':mo14'		=>	$_POST["mo14"],
				':mo15'		=>	$_POST["mo15"]
			)
		);
		if(!empty($result))
		{
			echo 'Blood Trasfusion related events Form Updated Successfully';
		}
	}
}
?>