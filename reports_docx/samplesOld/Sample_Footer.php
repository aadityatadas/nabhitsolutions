<?php
if (CLI) {
    return;
}
?>
</div>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>


<script type="text/javascript">
	$(document).on('click', '.delete', function(){
			var f = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"empty_folder.php",
					method:"POST",
					data:{f:f},
					success:function(data)
					{
						return true;
					}
				});
			}
			else
			{
				return false;	
			}
		});
</script>
</html>

