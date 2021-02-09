<?php

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id)
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT err_img FROM error_mast WHERE id = '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["err_img"];
	}
}
function get_total_all_records_surg()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_huf WHERE huf_surg = 'Surgery'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_huf");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records2()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_bof");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records3()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_need_pif");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records4()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_cath_uti");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records5()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_vent");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records6()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_int_ass");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records7()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_senti_det");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records8()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_blood_fusion");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records9()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_care_evt");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records10()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_medi_indi");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records11()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hr_id = tbl_hr_indic.hrid");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records12()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_eqp_indic");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records13()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_opd");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records14()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_ipd");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records_opd()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_opdwttm");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records_hr()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_hr_mast");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records_eqp()
{
	include('dbinfo.php');
	$statement = $connection->prepare("SELECT * FROM tbl_eqp_mast");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
?>