<?php
//including the database connection file
header("Content-type : image/png");
include_once("config.php");
 
if(isset($_POST['Save']))
{    
			$name = $_POST['name'];
			//$output = $_POST['output'];

			
			require_once 'signature-to-image.php';
			
			$json = $_POST['output']; // From Signature Pad
			$img = sigJsonToImage($json);

			$imgname = 'sign'.time().'.png';

			
			imagepng($img);


			$save = "images/".$imgname;
			imagepng($img, $save);
			imagedestroy($img);

			// $folder="/..examples/images/";
   			// move_uploaded_file($imgname,$folder.$imgname);

			//move_uploaded_file($imgname ,$imgname);
			
			//insert data to database        
			$sql = "INSERT INTO sign(name,output,image_name) VALUES(:name,:output,:image_name)";
			$query = $dbConn->prepare($sql);
			
				
			
			$query->bindparam(':name', $name);
			$query->bindparam(':output', $img);
			$query->bindparam(':image_name', $imgname);
		   
			$query->execute();
			
			echo "<font color='green'>Data added successfully.";
		
		
		
}
?>