<?php
include('../application/dbinfo.php');


if(isset($_REQUEST['id'])){
$userype=($_REQUEST['id']);

} else{

header('location:index.php');
}






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
  <h2>Menus</h2>
  <div align="right">
  <a href="add_menus.php" class="btn btn-success">Add Menus to Type</a>
</div>   

  <p></p>   
   

<div class="col-lg-12">
											<label class="col-lg-4">Type of User</label>
											<div class="col-lg-4">
												<select type="text" name="tyofuser" id="tyofuser" class="form-control" required="true" disabled="true">
												

						<?php 	 $sql = "SELECT * FROM tbl_user_types WHERE id=".$userype;

						
                                 $result = mysqli_query($connect, $sql);

                          

    	 if (mysqli_num_rows($result) > 0) { 

    		while($row = mysqli_fetch_assoc($result)) {	 ?>					
				<option value="<?=$row['id']?>" ><?=$row['name']?></option>
													

		<?php } } ?>
												</select>
											</div>
										</div>

										<br>
										<br>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>sr</th>
        <th>Menus</th>

        <th>Url</th>
       
      </tr>
    </thead>

    <?php  
    $sql = "SELECT tbl_menus.* FROM tbl_menus
						INNER JOIN tbl_menus_types ON tbl_menus.id=tbl_menus_types.menu_id
						WHERE tbl_menus_types.user_type_id=".$userype;

						
    $result = mysqli_query($connect, $sql);

    ?>

   
    <tbody>

    	<?php if (mysqli_num_rows($result) > 0) { 

    		while($row = mysqli_fetch_assoc($result)) {
    		?>
      <tr>
        <td><?=$row["id"]?></td>
       <td><label>&nbsp;&nbsp;<?=$row["name"]?></label></td>
       <td><?=$row["url"]?></td>
        
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
