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
  <h2>Menus</h2>
  <p></p>   
   <form method="post" id="user_form" enctype="multipart/form-data">  

<div class="col-lg-12">
											<label class="col-lg-4">Type of User</label>
											<div class="col-lg-4">
												<select type="text" name="tyofuser" id="tyofuser" class="form-control" required="true">
													<option value="">Select</option>

						<?php 	 $sql = "SELECT * FROM tbl_user_types";

						
                                 $result = mysqli_query($connect, $sql);

                          

    	 if (mysqli_num_rows($result) > 0) { 

    		while($row = mysqli_fetch_assoc($result)) {	 ?>					
				<option value="<?=$row['id']?>"><?=$row['name']?></option>
													

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
        <th><input type="checkbox" class="shelly" id="selectAll" /> Menus</th>

        <th>Url</th>
       
      </tr>
    </thead>

    <?php  
    $sql = "SELECT id, name,url, parent_id,is_parent FROM tbl_menus";
    $result = mysqli_query($connect, $sql);

    ?>

   
    <tbody>

    	<?php if (mysqli_num_rows($result) > 0) { 

    		while($row = mysqli_fetch_assoc($result)) {
    		?>
      <tr>
        <td><?=$row["id"]?></td>
       <td><label><input type="checkbox" value="<?=$row["id"]?>" name="menus[]" class="shelly">&nbsp;&nbsp;<?=$row["name"]?></label></td>
       <td><?=$row["url"]?></td>
        
      </tr>

  <?php } } else { ?>

  		<tr>
        <td colspan="2">No data found</td>
        
        
      </tr>

  <?php } ?>
      
    </tbody>




  </table>

  <div class="col-lg-12">
							<div class="col-lg-6">	
									<input type="hidden" name="user_id" id="user_id" />
								<input type="hidden" name="operation" value="add" id="operation" />
							<button accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" style="color:white;font-weight:bold;" >Submit ( Alt + s )</button>
					</div>
				</div>

				</form>

					<div style="display: none">
				<form  method="post" action="menus_by_types.php" id="user_typefrm">
					<input type="hidden" name="type" id="type">
					<input type="submit" name="submit" id="user_typeBtn">
				</form>
				</div>
</div>

</body>

<script type="text/javascript">
	$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"save_types_menus.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);

							$('#type').val(data);
							$('#user_form')[0].reset();

							$('#user_typefrm').submit();	

							window.location.replace("menus_by_types.php?id="+data);		
							
							
						}
					});
				}
			
		});
</script>

<script type="text/javascript" charset="utf-8" async defer>
  
  $("#selectAll").each(function(){
  $(this).click(function(){

  
    var c = $(this).attr("class");
    if($(this).is(":checked")){
     $("."+c).prop("checked",true);
    }else{
       $("."+c).prop("checked",false);
    }
  })
});
</script>
</html>
