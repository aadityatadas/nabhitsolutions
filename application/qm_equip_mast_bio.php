<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');
		
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#eqp').load('eqp_count_bio.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	
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
<?php include"QM-nav-bar.php";?>
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
                        <div class="panel-heading" style="padding:7px;height: 140px;">
                           Bio Equipement Master &nbsp;
                            <div style="padding-left: 350px;">
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

													$qry = "SELECT COUNT(*) as total FROM tbl_eqp_mast_bio WHERE year(eqp_dtpur) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as comp FROM tbl_eqp_mast_bio WHERE eqp_make!='' AND year(eqp_dtpur) = '$yr'";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notcomp FROM tbl_eqp_mast_bio WHERE eqp_make='' AND year(eqp_dtpur) = '$yr'";
																	$resnotdis = mysqli_query($connect, $qrynotdis);
																	$rownotdis=mysqli_fetch_assoc($resnotdis);
																	// echo $rownotdis['notdischarge'];
																	// echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
																	// die();

													   

													?>


		                            			<td style="font-weight: bold;color: black;" ><?php echo $row['total'];?></td>
		                            			<td style="font-weight: bold;color: green;"><?php echo $rowdis['comp'];?></td>
		                            			<td style="font-weight: bold;color: red;"><?php echo $rownotdis['notcomp'];?></td>
		                            			<td>
		                            				<a href="performence.php">Click here for Details</a>
		                            			</td>
		                            		</tr>
		                            	</table>
		                            </div>

                             <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: white;font-weight: bold;" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New</b></button>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-2" id="bofid">
												<input type="text" name="sr_no" id="sr_no" value="" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the Equipement</label>
											<div class="col-lg-7">
												<input autocomplete="off" type="text" name="mo1" id="mo1" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Type of Equipement</label>
											<div class="col-lg-4">
												<select type="text" name="mo2" id="mo2" class="form-control" >
													<option value="">Select Type of Equipement</option>
													<option value="Critical">Critical</option>
													<option value="Non Critical">Non Critical</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Equipement Identification Number</label>
											<div class="col-lg-4">
												<input type="text" name="mo3" id="mo3" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Serial Number</label>
											<div class="col-lg-4">
												<input type="text" name="serial" id="serial" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Model No</label>
											<div class="col-lg-4">
												<input type="text" name="mo4" id="mo4" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Make</label>
											<div class="col-lg-4">
												<input type="text" name="mo5" id="mo5" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Purchase</label>
											<div class="col-lg-3">
												<input type="text" name="mo6" id="mo6" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Installation</label>
											<div class="col-lg-3">
												<input type="text" name="mo7" id="mo7" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>


										

										<div class="col-lg-12">
											<label class="col-lg-4">Warranty Period</label>
											<div class="col-lg-2">
												<input autocomplete="off" type="text" name="mo8" id="mo8" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input autocomplete="off" type="text" name="mo9" id="mo9" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Preventive Schedule</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo13" id="mo13" placeholder="Schedule-1" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo14" id="mo14" placeholder="Schedule-2" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo15" id="mo15" placeholder="Schedule-3" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo16" id="mo16" placeholder="Schedule-4" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Calibration Schedule</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo17" id="mo17" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo18" id="mo18" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">AMC period</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo11" id="mo11" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo12" id="mo12" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">License Required for Operation</label>
											<div class="col-lg-4">
												<select type="text" name="mo23" id="mo23" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">License Valid from</label>
											<div class="col-lg-2">
												<input autocomplete="off" type="text" name="mo24" id="mo24" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">License Valid To</label>
											<div class="col-lg-2">
												<input autocomplete="off" type="text" name="mo25" id="mo25" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />
												<button style="color:white;font-weight: bold;" accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit Details ( Alt + s )</button>
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
												<th>Sr No</th>
												<th>Name of the Equipement</th>
												<th>Type of Equipement</th>
												<th>Equipement Identification Number</th>
												<th>Serial Number</th>
												<th>Model No</th>
												<th>Make</th>
												<th>Date of Purchase</th>
												<th>Date of Installation</th>
												<th>Warranty period</th>
												<th>Preventive Schedule</th>
												<th>Calibration Schedule</th>

												<th>AMC Period</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>								
							</div>
							<form method="post" action="../excel/BEM/export.php" class="panel-heading">
							 
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading" style="color: black;">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										 <input type="submit" name="export" class="btn btn-danger" value="Excel" style="color:white;font-weight:bold;"/>
    
									</div>
									</form>
									</div>
									<div class="panel-body">
										<div id="eqp">
					
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
							<label class="col-lg-1">From</label>
							<div class="col-lg-2">
								<input  type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1">To</label>
							<div class="col-lg-2">
								<input  type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button style="color:white;font-weight:bold;" type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart1" style="height:400px;"></div>
					</div>
				</div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>  
</div>
</section> 
</body>
</html>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#mo6").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo7").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});		
		$("#mo8").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo9").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	

		$("#mo11").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#mo12").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo13").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo14").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo15").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});		
		$("#mo16").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo17").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo18").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo24").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo25").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$(function(){  
			$("#mo6").datepicker();
			$("#mo7").datepicker();
			$("#mo8").datepicker();
			$("#mo9").datepicker();
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
			$('#mo1').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			$('#bofid').load("load_eqpmastno_bio.php");
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_eqp_mast_form_bio.php",
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
				$("#action").attr("disabled", true);
				$.ajax({
					url:"insert_eqp_mast_form_bio.php",
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
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_eqp_mast_form_bio.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#bx2').hide('fast');
					$('#add_btn').hide('fast');
					$('#sr_no').focus();
					$('#sr_no').val(data.sr_no);
					$('#mo1').val(data.mo1);
					$('#mo2').val(data.mo2);
					$('#mo3').val(data.mo3);
					$('#serial').val(data.serial);
					$('#mo4').val(data.mo4);
					$('#mo5').val(data.mo5);
					$('#mo6').val(data.mo6);
					$('#mo7').val(data.mo7);
					$('#mo8').val(data.mo8);
					$('#mo9').val(data.mo9);
					$('#mo11').val(data.mo11);
	$('#mo12').val(data.mo12);
	$('#mo13').val(data.mo13);
	$('#mo14').val(data.mo14);
	$('#mo15').val(data.mo15);
	$('#mo16').val(data.mo16);
	$('#mo17').val(data.mo17);
	
	$('#mo18').val(data.mo18);
	$('#mo23').val(data.mo23);
	$('#mo24').val(data.mo24);
	$('#mo25').val(data.mo25);


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
					url:"delete_eqp_mast_form_bio.php",
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
		$('#mo6').mask('9999-99-99');// for  To Date
		$('#mo7').mask('9999-99-99');// for  To Date
		$('#mo8').mask('9999-99-99');// for  To Date
		$('#mo9').mask('9999-99-99');// for  To Date
	});
</script>
<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});  
		$(function(){  
			$("#frdate").datepicker();
			$("#todate").datepicker();
		});
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
				
				// Chart Twelve
				var jsonData = $.ajax({
				url: 'eqp_chart_bio.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Equipment Indicator',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.3
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.ColumnChart(document.getElementById('line_chart1'));
						chart.draw(data, options);
							
					}	
				}).responseText;
				
			}	
		}	
</script>