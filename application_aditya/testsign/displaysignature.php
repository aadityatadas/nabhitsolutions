<?php
//including the database connection file
include_once("includes/config.php");
 
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM sign order by name");

?>
 
<html>
<head>    
	<meta charset="utf-8">
	<title>Regenerate a Signature ยท Signature Pad</title>
	<style>
		body { font: normal 100.01%/1.375 "Helvetica Neue",Helvetica,Arial,sans-serif; }
		
	</style>
	<link href="../assets/jquery.signaturepad.css" rel="stylesheet">
	<!--[if lt IE 9]><script src="../assets/flashcanvas.js"></script><![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	
    <title>Homepage</title>
</head>
 
<body>
	
    <table width='80%' border=0 >
 
		<tr bgcolor='#CCCCCC'>
			<td>Sr</td>
			<td>Name</td>
			<td>Sign</td>
			
		</tr>
		<?php $sr=1; while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td><?php echo $sr; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td> <img src="../testsign/images/<?php echo $row['image_name'];?>" width="200" height="100px"/></td>
			</tr>
		
		<?php $sr++; } ?>
		
		<?php     
		/*while($row = $result->fetch(PDO::FETCH_ASSOC)) {    
				
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['name']."</td>";
			
			echo "<td>".$row['<img src="../examples/signature.png" width="200" height="100px"/>']."</td>";
			echo"</tr>"; 
			  
		}*/
		?>
		
		
		<div class="sigPad signed">
			<div class="sigWrapper">
				<div class="typed"></div>
				
				<canvas class="pad" width="198" height="55"></canvas>
			</div>
		</div>
			  
		<script src="../js/jquery.signaturepad.js"></script>
		<script src="../js/sample-signature-output.js"></script>
		
		<script src="../assets/json2.min.js"></script>
	
    </table>
</body>
</html>