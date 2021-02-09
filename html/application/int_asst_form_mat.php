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
	$('#int').load('int_count.php').fadeIn("slow");
	}, 2000); // refresh every 5000 milliseconds
	
</script>


<script>
function myFunction() {
  window.print();
}

function goBack() {
  window.history.back();
}

</script>
<!--
<script type="text/javascript"> 
	$(document).ready(function () {
		$("#bx1").niceScroll({ autohidemode: true })
		$("#bx2").niceScroll({ autohidemode: true })
	});
</script>-->
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
<body>
	<?php include"nav-bar-mat.php";?>
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px;">
                            Intial Assessment Time

                           <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

						</div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
											<div class="col-lg-12">
												<label class="col-lg-4">Sr. No.</label>
												<div class="col-lg-4">
													<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />
												</div>
											</div>
											<div class="col-lg-12">
												<label class="col-lg-4">Name of the Patient</label>
												<div class="col-lg-7">
													<input type="text" name="p_name" id="p_name" class="form-control" readonly />
												</div>
											</div>
											<div class="col-lg-12">
												<label class="col-lg-4">UHID No</label>
												<div class="col-lg-4">
													<input type="text" name="uhid_no" id="uhid_no" class="form-control" readonly />
												</div>
											</div>
											<div class="col-lg-12">
												<label class="col-lg-4">IPD No</label>
												<div class="col-lg-4">
													<input type="text" name="ipd_no" id="ipd_no" class="form-control" readonly />
												</div>
											</div>
											<div class="col-lg-12">
												<label class="col-lg-4">Date of Admission</label>
												<div class="col-lg-4">
													<input type="text" name="d_adm" id="d_adm" class="form-control" readonly />
												</div>
											</div>
											<div class="col-lg-12">
												<label class="col-lg-4">Date & Time of Registration  of Admission</label>
												<div class="col-lg-4">
													<input type="text" name="t_adm" id="t_adm" class="form-control" readonly />
												</div>
											</div>
											<div class="col-lg-12">
												<label class="col-lg-4">Date & Time by which Intial assessment is completed by Consultant</label>
												<div class="col-lg-2">	
													<input type="text" name="ddd" id="ddd" placeholder="yyyy-mm-dd" class="form-control" required />
												</div>
												<div class="col-lg-2">	
													<input type="time" name="ddd1" id="ddd1" placeholder="hh:mm" class="form-control" required />
												</div>
											</div>
											<div class="col-lg-12">
												<label class="col-lg-4">Initial Assessment Time</label>
												<div class="col-lg-2">	
													<input type="text" name="dddd" id="dddd" class="form-control" readonly />
												</div>
											</div>
											<div class="col-lg-12">
												<hr />
											</div>
											<div class="col-lg-12">
												<div class="col-lg-6">	
													<input type="hidden" name="user_id" id="user_id" />
													<input type="hidden" name="operation" id="operation" />
													<button accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit ( Alt + s )</button>
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
										<thead style="font-size:12px;color:darkblue;">
											<tr>
												<th>Action</th>
												<th>Sr.No.</th>
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>IPD No</th>
												<th>Date of Admission</th>
												<th>Date & Time of Registration  of Admission</th>
												<th>Date & Time by which Intial assessment is completed by Consultant</th>
												<th>Initial Assessment Time (In Hr.)</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<form method="post" action="../excel/IAF/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										
										
     <input type="submit" name="export" class="btn btn-danger" value="Excel" />
    
									</div>
									</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="int">
					
										</div>
										<!--<div id="int_chart">
											<?php include "int_chart.php";?>
										</div>-->
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1">From</label>
							<div class="col-lg-3">
								<input type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1">To</label>
							<div class="col-lg-3">
								<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="line_chart()" >SEARCH</button>
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
    <!-- /#wrapper -->
    <!-- jQuery -->    
</body>
</html>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});
		$("#ddd").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$(function(){  
			$("#ddd").datepicker();
			//$("#ddd1").timepicker();
		});		
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
		});
		
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_int_form.php",
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
			if(confirm("Are you sure you want to submit this?"))
			{
				$.ajax({
					url:"insert_int_form.php",
					method:'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert(data);
						$('#user_form')[0].reset();
						$('#bx1').hide('fast');
						$('#bx2').show('fast');
						dataTable.ajax.reload();
					}
				});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_int_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx2').hide('fast');
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					$('#uhid_no').val(data.uhid_no);
					$('#ipd_no').val(data.ipd_no);
					$('#d_adm').val(data.d_adm);
					$('#t_adm').val(data.t_adm);
					$('#ddd').val(data.ddd);
					$('#ddd1').val(data.ddd1);
					$('#dddd').val(data.dddd);
					$('#user_id').val(user_id);
					$('#action').val("Update Details ( Alt + s )");
					$('#operation').val("Edit");
				}
			})
		});	
	});
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';      
		$('#ddd').mask('9999-99-99');// for  To Date
		//$('#ddd1').mask('99:99');// for  To Date
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
				url: 'int_chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Initial Asseessment Time',
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