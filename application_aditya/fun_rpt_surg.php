<?php
function upload_cult_rpt()
{
	if(isset($_FILES["cult_rpt"]))
	{
		$extension = explode('.', $_FILES['cult_rpt']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_surg2/' . $new_name;
		move_uploaded_file($_FILES['cult_rpt']['tmp_name'], $destination);
		return $new_name;
	}
}
function upload_rpt1()
{
	if(isset($_FILES["rpt_rpt1"]))
	{
		$extension = explode('.', $_FILES['rpt_rpt1']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_surg/' . $new_name;
		move_uploaded_file($_FILES['rpt_rpt1']['tmp_name'], $destination);
		return $new_name;
	}
}
function upload_rpt2()
{
	if(isset($_FILES["rpt_rpt2"]))
	{
		$extension = explode('.', $_FILES['rpt_rpt2']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_surg/' . $new_name;
		move_uploaded_file($_FILES['rpt_rpt2']['tmp_name'], $destination);
		return $new_name;
	}
}
function upload_rpt3()
{
	if(isset($_FILES["rpt_rpt3"]))
	{
		$extension = explode('.', $_FILES['rpt_rpt3']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_surg/' . $new_name;
		move_uploaded_file($_FILES['rpt_rpt3']['tmp_name'], $destination);
		return $new_name;
	}
}
?>