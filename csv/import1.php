

<?php

	session_start();
	//connection
	$conn = new mysqli("localhost", "nabhbudd_slsh15", "@{&yUYjmdhMR", "nabhbudd_nabhslsh15");

	if(isset($_POST['import'])){
		//check if input file is empty
		if(!empty($_FILES['file']['name'])){
			$filename = $_FILES['file']['tmp_name'];
			$fileinfo = pathinfo($_FILES['file']['name']);

			//check file extension
			if(strtolower($fileinfo['extension']) == 'csv'){
				//check if file contains data
				if($_FILES['file']['size'] > 0){

					$file = fopen($filename, 'r');

					while(($impData = fgetcsv($file, 1000, ',')) !== FALSE){
					   // $var=$impData[4];
					    
					    //$dat = str_replace('/', '-', $var);
					    //$date1=date('Y-m-d', strtotime($dat));
					    
		//	$date1=	date('Y-m-d H:i:s', strtotime($var));
				//	 $var1 =  $impData[5];
					 
		//	$date2=	date('Y-m-d H:i:s', strtotime($var1));
		
			
						$sql = "INSERT INTO `tbl_opd`( `opdid`, `opd_age`, `opd_sex`, `opd_email`, `opd_addr`, `opd_trdr`, `opd_hrd1`, `opd_hrd2`, `opd_hrd3`, `opd_oth`, `opd_chk1`, `opd_chk2`, `opd_chk3`, `opd_chk4`, `opd_chk5`, `opd_chk6`, `opd_chk7`, `opd_chk8`, `opd_chk9`, `opd_chk10`, `opd_chk11`, `opd_chk12`, `opd_chk13`, `opd_chk14`, `opd_chk15`, `opd_chk16`, `opd_chk17`, `opd_chk18`, `opd_chk19`, `opd_chk20`, `opd_chk21`, `opd_chk22`, `opd_chk23`, `opd_chk24`, `opd_fac`, `opd_sug`, `opd_score`, `opd_user`) VALUES ('".$impData[0]."', '".$impData[1]."', '".$impData[2]."', '".$impData[3]."', '".$impData[4]."', '".$impData[5]."','".$impData[6]."','".$impData[7]."', '".$impData[8]."', '".$impData[9]."', '".$impData[10]."', '".$impData[11]."', '".$impData[12]."', '".$impData[13]."', '".$impData[14]."', '".$impData[15]."', '".$impData[16]."', '".$impData[17]."', '".$impData[18]."', '".$impData[19]."', '".$impData[20]."', '".$impData[21]."', '".$impData[22]."','".$impData[23]."','".$impData[24]."', '".$impData[25]."', '".$impData[26]."','".$impData[27]."','".$impData[28]."', '".$impData[29]."', '".$impData[30]."', '".$impData[31]."', '".$impData[32]."', '".$impData[33]."', '".$impData[34]."', '".$impData[35]."', '".$impData[36]."', '".$impData[37]."')";
						$query = $conn->query($sql);

						if($query){
							$_SESSION['message'] = "Data imported successfully";
						}
						else{
							$_SESSION['message'] = "Cannot import data. Something went wrong";
						}
					}
					header('location: index.php');
					
				}
				else{
					$_SESSION['message'] = "File contains empty data";
					header('location: index.php');
				}
			}
			else{
				$_SESSION['message'] = "Please upload CSV files only";
				header('location: index.php');
			}
		}
		else{
			$_SESSION['message'] = "File empty";
			header('location: index.php');
		}

	}

	else{
		$_SESSION['message'] = "Please import a file first";
		header('location: index.php');
	} 
 
?>