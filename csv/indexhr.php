<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Import CSV File into OPD Waiting Time Form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Import CSV File into OPD Waiting Time Form</h1>
	<button type="button" class="btn btn-secondary"><a href="https://nabhbuddy.com/hms/test6/application/opd_feedback_form.php"><h4 style="color:#ffffff;">Back</h4></a></button>
	<!--<div class="row">
		<div class="col-sm-3">
			<h3>Import File Form</h3>
			<form method="POST" action="import.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="file">File:</label>
					<input type="file" id="file" name="file">
				</div>
				<button type="submit" name="import" class="btn btn-primary btn-sm">Import</button>
			</form>-->
			<?php
				//session_start();
				//if(isset($_SESSION['message'])){
					?>
					<!--<div class="alert alert-info text-center" style="margin-top:20px;">
						<?php //echo $_SESSION['message']; ?>
					</div>-->
					<?php

					//unset($_SESSION['message']);
			//	}

			?>
	<!--	</div>-->
		
		<!--<div><a href="">Download Demo excel file</a></div>
		<div class="col-sm-9">
			<table class="table table-bordered table-striped">
				<thead>-->
					<!--<th>UserID</th>-->
					<!--<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>UserID</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Address</th>
				</thead>
				<tbody>-->
					<?php
					//connection
					//$conn = new mysqli('localhost', 'nabhbudd_demo', 'nabhdemo@123', 'nabhbudd_nabhdemo');

				//	$sql = "SELECT * FROM tbl_opdwttm";
				//	$query = $conn->query($sql);

				//	while($row = $query->fetch_array()){
						//?>
						<!--<tr>
							<td><?php //echo $row['opdwttm_id']; ?></td>
							<td><?php //echo $row['opdwttm_pname']; ?></td>
							<td><?php //echo $row['opdwttm_uhid']; ?></td>
							<td><?php //echo $row['opdwttm_opd']; ?></td>
							<td><?php //echo $row['opdwttm_drsp']; ?></td>
							<td><?php //echo $row['opdwttm_dttmr']; ?></td>
							<td><?php //echo $row['opdwttm_dttmds']; ?></td>
							<td><?php //echo $row['opdwttm_opdwttm']; ?></td>
							<td><?php //echo $row['opdwttm_recd']; ?></td>
							
						</tr>-->
						<?php
					//}

					//?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Animated Dynamic Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<style>
	html,body{
			height: 100%;
			margin: 0;
			background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(149,199,20,1) 0%, rgba(0,212,255,1) 96%);
		
		}
   
   .myForm{
   	background-color: rgba(0,0,0,0.5) !important;
   	padding: 15px !important;
   border-radius: 15px !important;
   color: white;
   
   }

   input{
   	border-radius:0 15px 15px 0 !important;

   }
   input:focus{
       outline: none;
box-shadow:none !important;
border:1px solid #ccc !important;

   }

   .br-15{
   	border-radius: 15px 0 0 15px !important;
   }

   #add_more{
   	color: white !important;
   	background-color: #fa8231 !important;
   	border-radius: 15px !important;
   	border: 0 !important;

   }
   #remove_more{
   	color: white !important;
   	background-color: #fc5c65 !important;
   	border-radius: 15px !important;
   	border: 0 !important;
   	display: none;

   }
   	
   .submit_btn{
   	border-radius: 15px !important;
    background-color: #95c714 !important;
    border: 0 !important;
   }
</style>

<!-- Coded With Love By Mutiullah Samim-->
<body>
	<dvi class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>OPD Waiting Time</h4>
			</div>
			<div class="card-body">
				<form method="POST" action="importhr.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="file">File:</label>
					<input type="file" id="file" name="file">
				</div>
				<button type="submit" name="import" class="btn btn-primary btn-sm">Import</button>
			</form>
			
			<?php
				session_start();
				if(isset($_SESSION['message'])){
					?>
					<div class="alert alert-info text-center" style="margin-top:20px;">
						<?php echo $_SESSION['message']; ?>
					</div>
					<?php

					unset($_SESSION['message']);
				}

			?>
		</div>
		<a href="https://nabhbuddy.com/hms/csv/tbl_hr_mast.csv" ><h4 style="color:#ffffff;">Demo csv file download Click Here!</h4></a>
			</div>
			
		</div>
	</div>
	</dvi>
</body>
</html>