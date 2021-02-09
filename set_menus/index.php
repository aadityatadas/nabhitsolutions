<?php
include('../application/dbinfo.php');



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>menus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Types</h2>
  <p></p>   

<div align="right">
  <a href="add_menus.php" class="btn btn-success">Add Menus to Type</a>
</div>   




  <table class="table table-bordered">
    <thead>
      <tr>
        <th>sr</th>
        <th width="80%">User Types</th>
        <th>Action</th>

      
      </tr>
    </thead>

    <?php  
    $sql = "SELECT * FROM tbl_user_types";

						
    $result = mysqli_query($connect, $sql);

    ?>

   
    <tbody>

    	<?php if (mysqli_num_rows($result) > 0) { 

    		while($row = mysqli_fetch_assoc($result)) {
    		?>
      <tr>
        <td><?=$row["id"]?></td>
       <td width="60%"><label>&nbsp;&nbsp;<?=$row["name"]?></label></td>

         <td width="20%"><a href="menus_by_types.php?id=<?=$row["id"]?>" class="btn btn-danger">View Menus</a></td>
      
        
      </tr>

  <?php } } else { ?>

  		<tr>
        <td colspan="3">No data found</td>
        
        
      </tr>

  <?php } ?>
      
    </tbody>




  </table>

  

				
</div>

</body>


</html>
