<?php
//including the database connection file

include_once("includes/config.php");
 
if(isset($_POST['Save']))
{    
			$name = $_POST['name'];
			//$output = $_POST['output'];

			
			require_once 'signature-to-image.php';
			
			$json = $_POST['output']; // From Signature Pad
			$img = sigJsonToImage($json);

			$imgname = 'sign'.time().'.png';

			
			//imagepng($img);

			
			$save = "images/".$imgname;
			imagepng($img, $save);
			imagedestroy($img);

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
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Require a Drawn Signature ยท Signature Pad</title>
  <style>
    body { font: normal 100.01%/1.375 "Helvetica Neue",Helvetica,Arial,sans-serif; }
  </style>
  <link href="../testsign/assets/jquery.signaturepad.css" rel="stylesheet">
  <script src="../testsign/assets/flashcanvas.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>
<body>
	<a href="displaysignature.php">Display Data</a>
  <form method="post" action="" class="sigPad" enctype="multipart/form-data">
    <label for="name">Print your name</label>
    <input type="text" name="name" id="name" class="name" />
    <p class="drawItDesc">Draw your signature</p>
    <ul class="sigNav">
      <li class="drawIt"><a href="#draw-it" >Draw It</a></li>
      <li class="clearButton"><a href="#clear">Clear</a></li>
    </ul>
    <div class="sig sigWrapper">
      <div class="typed"></div>
      <canvas class="pad" width="198" height="75"></canvas>
      <input type="hidden" name="output" class="output">
    </div>
    <button type="submit" name="Save" value="submit">Submit</button>
  </form>

  <script src="../testsign/js/jquery.signaturepad.js"></script>
  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad({drawOnly:true});
    });
  </script>
  <script src="../testsign/assets/json2.min.js"></script>
</body>
</html>