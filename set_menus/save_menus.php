<?php
include('../application/dbinfo.php');
function LoadData($file) {
		// Read file lines
		$lines = file($file);
		$data = array();
		foreach($lines as $line) {
			$data[] = explode(';', chop($line));
		}
		return $data;
	}




	$data = LoadData('demo.txt');


	foreach ($data as $key => $value) {
		print_r($value);

		echo "<br>";

		$name=$value[0];
		$url=$value[1];
		$class_name=$value[2];
		$style=$value[3];
		$category_name=$value[4];
		$parent_id=$value[5];
		$is_parent=$value[6];

		$sq = "INSERT INTO `tbl_menus` (`id`, `name`, `url`, `class_name`, `style`, `category_name`, `parent_id`, `is_parent`, `staus`) VALUES (NULL, '$name', '$url', '$class_name', '$style', '$category_name', '$parent_id', '$is_parent', '1');";
			mysqli_query($connect,$sq);
	}


?>