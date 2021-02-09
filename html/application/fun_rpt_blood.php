<?php
function upload_rpt1()
{
	if(isset($_FILES["rpt_rpt1"]))
	{
		$extension = explode('.', $_FILES['rpt_rpt1']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload_blood/' . $new_name;
		move_uploaded_file($_FILES['rpt_rpt1']['tmp_name'], $destination);
		return $new_name;
	}
}
?>