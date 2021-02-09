<?php
include('../application/dbinfo.php');
//tbl_menus_types




if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "add")
	{
     
     if(isset($_POST['menus'])){

     	$user_type_id=$_POST['tyofuser'];

     	$sq = "DELETE FROM `tbl_menus_types` WHERE user_type_id='".$user_type_id."'";

     
		mysqli_query($connect,$sq);

		foreach ($_POST['menus'] as $key => $menu_id) {


			$sq = "INSERT INTO `tbl_menus_types` (`id`, `menu_id`, `user_type_id`) VALUES (NULL, '$menu_id','$user_type_id');";
			mysqli_query($connect,$sq);
			# code...
		}
		
			echo $user_type_id;
     	
     }

	}



}













?>


