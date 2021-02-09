<?php
	error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	
	$yr = date('Y');

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" type="text/css" href="../popup/pop_up.css">
<script type="text/javascript" src="../popup/pop_up.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#opdwt').load('opdwt_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	
</script>

<script>
function myFunction() {
  window.print();
}

 
function goBack() {
  window.history.back();
}
 
</script>

<style>
.preload{
	margin:0;
	position:absolute;
	top:50%;
	left:60%;
	margin-right: -50%;
	transform:translate(-50%, -50%);
}
#bx1,
#bx2,
#adm,
#order-table{
	display:none;
}
.form-control{
	margin-bottom:10px;
}
</style>
<style type="text/css">
	#wrapper {
  width: 100%;
}
#page-wrapper {
  padding: 0 15px;
  min-height: 568px;
  background-color: white;
  border-color:#D9EDF7; 
}
@media (min-width: 768px) {
  #page-wrapper {
    position: inherit;
    margin: 0 0 0 0px;
    padding: 0 30px;
    border-left: 1px solid #e7e7e7;
  }

}
.box {
    height: 100%;
    overflow: hidden;
    width: 100%;
    margin: 0px auto 15px;
    border: 1px solid black;
	
}

.form-group label {
    font-size: 14px;
    line-height: 1.42857;
    color: #121212 !important;
    font-weight: 400;
	
}
</style>
<body>
	<?php include"new-nav-bar.php";?>
<section class="content home" >
<div class="container-fluid" >
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"   style="padding:7px;height: 140px;">
                            OPD Waiting Time Form
                            <div>
		                    	 <table class="custom-table"  cellspacing="10" cellpadding="10" border="1" width="650px" align="center" style="border-color: #9DA2E2; text-align: center;" >
		                            		<tr style="background-color: #9DA2E2;">
		                            			<td style="font-weight: bold;color: white;">Total</td>
		                            			<td style="font-weight: bold;color: white;">Completed</td>
		                            			<td style="font-weight: bold;color: white;">Not-Completed</td>
		                            			<td>
		                            				&nbsp;
		                            			</td>
		                            		</tr>
		                            		<tr style="background-color: white;">
		                            			<?php
													include('dbinfo.php');

													$qry ="SELECT COUNT(*) as total FROM tbl_opdwttm WHERE year(opdwttm_dttmds) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();
														//$opdt=$_POST['opdwtm'];


														$qrydis = "SELECT COUNT(*) as comp FROM tbl_opdwttm WHERE (opdwttm_opdwttm!=''AND opdwttm_opdwttm!='0') AND year(opdwttm_dttmds) = '$yr'";
																$rescomp= mysqli_query($connect, $qrydis);
																$rowcomp=mysqli_fetch_assoc($rescomp);
																//echo $rowdis['discharge'];
														                               
																// echo "SELECT COUNT(*) as comp FROM tbl_opdwttm WHERE opdwttm_opdwttm='".$row["opdwtm"]."'";								die();
																						

														$qrynotdis ="SELECT COUNT(*) as notcomp FROM tbl_opdwttm  WHERE (opdwttm_opdwttm='0' OR opdwttm_opdwttm=' ' )  AND year(opdwttm_dttmds) = '$yr'";
																	$resnotcomp = mysqli_query($connect, $qrynotdis);
																	$rownotcomp=mysqli_fetch_assoc($resnotcomp);
																	// echo $rownotdis['notdischarge'];
																	// echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
																	// die();

													   

													?>


		                            			<td style="font-weight: bold;color: black;" ><?php echo $row['total'];?></td>
		                            			<td style="font-weight: bold;color: green;"><?php echo $rowcomp['comp'];?></td>
		                            			<td style="font-weight: bold;color: red;"><?php echo $rownotcomp['notcomp'];?></td>
		                            			<td>
		                            				<a href="performence.php">Click here for Details</a>
		                            			</td>
		                            		
		                            		</tr>
		                            	</table>
                            </div>
							<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px;" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

						 
						 <button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New</b></button>

						 <a href="https://nabhbuddy.com/nabhslsh/hms/test6/csv/"><button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Import</b></button></a>
						</div>
						
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-2" id="bofid">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly  />
											</div>
										</div>
								
										<div class="col-lg-12">
											<label class="col-lg-4">Name Of The Patient</label>
											<div class="col-lg-7">
												<input type="text" name="p_name" id="p_name" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">UHID No.</label>
											<div class="col-lg-4">
												<input type="text" name="uhid_no" id="uhid_no" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">OPD No.</label>
											<div class="col-lg-4">
												<input type="text" name="opd_no" id="opd_no" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Specialty / Doctor</label>
											<div class="col-lg-6">
												<input type="text" name="drsp" id="drsp" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Registration  of OPD</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="dttm_reg" id="dttm_reg" placeholder="yyyy-mm-dd" class="form-control" required />
											</div>
											<div class="col-lg-2">
												<input type="time" name="dttm_reg3" id="dttm_reg3" placeholder="hh:mm" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time by which Doctor has seen the Patient</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="dttm_reg2" id="dttm_reg2" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="dttm_reg4" id="dttm_reg4" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">OPD waitingTime in Min.</label>
											<div class="col-lg-3">
												<input type="text" name="opdwtm" id="opdwtm" class="form-control" readonly />
											</div>
										</div>
<!--<div class="col-lg-12">

    	<label class="col-lg-4">
    		
				<a href="#login-box" class="login-window">Add Charges</a>
        	
		
    	</label>
        
        			<div class="col-lg-3">
												<input type="text" name="opd_amount" id="opd_amount" class="form-control" readonly />
											</div>	
        
        <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="../popup/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form method="post" class="signin" action="#" id="save_charges_form">
                <fieldset class="textbox">
                	
            	<label class="username">
                <span><h3>OPD Charges in Rs.</h3></span>
            </label>
               </fieldset>
                <input id="charges" name="charges" value="150" type="text" autocomplete="on" placeholder="OPD charges" >
                
                
               
                
                <button class="submit button" type="button" id="update_amount">Add</button>
                
                
                
               
          </form>
		</div>
    
    </div>-->
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />
												<button accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" style="color:white;font-weight:bold;"/>Submit ( Alt + s )</button>
											</div>
											<div class="col-lg-6">	
												<button type="button" class="btn btn-default pull-left" id="close_btn">Close</button>
											</div>
										</div>
									</div>	
								</form>
							</div>
						</div>
                        <div class="box" id="bx2">
							<div class="panel-body">
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:#2b6a9f;">
											<tr>
												<th>Action</th>
												<th>Sr.No.</th>
												<th>Name of the patient</th>
												<th>UHID No.</th>
												<th>OPD No.</th>
												<th>Specialty / Doctor</th>
												<th>Date & Time of Registration  of OPD</th>
												<th>Date & Time by which Doctor has seen the Patient</th>
												<th>OPD waitingTime in Min.</th>
												<!-- <th>OPD Charges.</th> -->
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								
								<div class="panel panel-default">
									
									<form method="post" action="../excel/OPD/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-3" style="color:black;">	
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
								<div class="col-lg-2" >
										<input type="text" name="frdt" id="frdt" value="<?php echo $frdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-2" >
									<input type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input type="submit" name="export" class="btn btn-danger" value="Excel" style="color:white;font-weight:bold;padding-bottom:15px;" />
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="opdwt">
											
										</div>
									</div>
								</div>
							</div>					
                        </div>
                    </div>
                </div>	
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1" style="color:black;">From</label>
							<div class="col-lg-2" >
								<input type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1" style="color:black;">To</label>
							<div class="col-lg-2" >
								<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button type="button" name="search" id="search" class="btn btn-info	 btn-sm" onclick="line_chart()" style="color:white;font-weight:bold;padding-bottom:15px;">SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_wtm" style="height:400px;"></div>
					</div>
					<div class="col-sm-12">
						<div id="line_chart_wtm1" style="height:400px;"></div>
					</div>
				</div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->    
</div>
</section>
</body>
</html>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#dttm_reg").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#dttm_reg2").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#frdate").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#todate").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});

		$("#frdt").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#todt").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$(function(){  
			$("#dttm_reg").datepicker();
			$("#dttm_reg2").datepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
			$("#frdt").datepicker();
			$("#todt").datepicker();

			

		});
		
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});		
		$('#add_btn').click(function(){
			$('#user_form')[0].reset();
			$('#bx1').show('fast');
			$('#adm').show('fast');
			$('#add_btn').hide('fast');
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			$('#p_name').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			$('#bofid').load("load_opdwttmno.php");
		});	
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_opdwtm_form_det.php",
				type:"POST"
			},
			"columnDefs":[
				{
					"targets":[0, 3, 4],
					"orderable":false,
				},
			],
		});
		$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			if(confirm("Are you sure you want to Submit this?"))
			{

				var amount = $('#opd_amount').val();
				if(amount != ''){
				$("#action").attr("disabled", true);
				$.ajax({
					url:"insert_opdwtm_form_det.php",
					method:'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert(data);
						$('#user_form')[0].reset();
						$('#adm').hide('fast');
						$('#bx1').hide('fast');
						$('#bx2').show('fast');
						$('#add_btn').show('fast');
						dataTable.ajax.reload();
					}
				});
			} else{
				alert("Select OPD Charges!");
			}
			
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_opdwtm_form_det.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					$('#uhid_no').val(data.uhid_no);
					$('#opd_no').val(data.opd_no);
					$('#drsp').val(data.drsp);
					$('#dttm_reg').val(data.dttm_reg);
					$('#dttm_reg3').val(data.dttm_reg3);
					$('#dttm_reg2').val(data.dttm_reg2);
					$('#dttm_reg4').val(data.dttm_reg4);
					$('#opdwtm').val(data.opdwtm);
					$('#opd_amount').val(data.opd_charges);
					if(data.opd_charges){
					$('#charges').val(data.opd_charges);
					}

					$('#user_id').val(data.sr_no);
					$('#action').val("Update Details ( Alt + s )");
					$('#operation').val("Edit");					
					$("#action").attr("disabled", false);
				}
			})
		});
		$(document).on('click', '.delete', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"delete_opdwtm_form_det.php",
					method:"POST",
					data:{user_id:user_id},
					success:function(data)
					{
						alert(data);
						dataTable.ajax.reload();
					}
				});
			}
			else
			{
				return false;	
			}
		});
	});
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#dttm_reg').mask('9999-99-99');// for Date
		$('#dttm_reg2').mask('9999-99-99');// for Date
		$('#frdate').mask('9999-99-99');// for Date
		$('#todate').mask('9999-99-99');// for Date
	});
</script>
<script type="text/javascript">	
		// Load the Visualization API and the piechart package.
		google.charts.load('current', {'packages':['corechart']});
		  
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(line_chart);
		
		function line_chart() 
		{
			var frdate = $('#frdate').val();
			var todate = $('#todate').val();
			if(frdate != '' && todate != '')
			{
				// chart one
					var jsonData = $.ajax({
					url: 'opd_wattm_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Total No. of OPDs On Day ',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_wtm'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				// chart two
					var jsonData = $.ajax({
					url: 'opd_wattm_chart1.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'OPD Waiting Time',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_wtm1'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
			}	
		}	
</script>

<script>
	$('#update_amount').click(function() { 
    // $('.insert_formIpd').on("submit", function(event){  
    	var amount =$('#charges').val();
    	$('#opd_amount').val(amount);

    	
         $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	});   
      });
 </script>