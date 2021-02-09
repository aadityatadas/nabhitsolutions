<?php
function upload_rpt1()
{
	if(isset($_FILES["rpt_rpt1"]))
	{
		$extension = explode('.', $_FILES['rpt_rpt1']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_eqp/' . $new_name;
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
		$destination = './upload_eqp/' . $new_name;
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
		$destination = './upload_eqp/' . $new_name;
		move_uploaded_file($_FILES['rpt_rpt3']['tmp_name'], $destination);
		return $new_name;
	}
}
function upload_rpt4()
{
	if(isset($_FILES["rpt_rpt4"]))
	{
		$extension = explode('.', $_FILES['rpt_rpt4']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_eqp/' . $new_name;
		move_uploaded_file($_FILES['rpt_rpt4']['tmp_name'], $destination);
		return $new_name;
	}
}
function upload_rpt5()
{
	if(isset($_FILES["rpt_rpt5"]))
	{
		$extension = explode('.', $_FILES['rpt_rpt5']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_eqp/' . $new_name;
		move_uploaded_file($_FILES['rpt_rpt5']['tmp_name'], $destination);
		return $new_name;
	}
}
function upload_rpt6()
{
	if(isset($_FILES["rpt_rpt6"]))
	{
		$extension = explode('.', $_FILES['rpt_rpt6']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_eqp/' . $new_name;
		move_uploaded_file($_FILES['rpt_rpt6']['tmp_name'], $destination);
		return $new_name;
	}
}
?>