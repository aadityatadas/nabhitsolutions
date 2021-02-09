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
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#cre').load('cre_count.php').fadeIn("slow");
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
<body>
	<?php include"nav-bar-nurses.php";?>
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
                            Care related events
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
											<label class="col-lg-4">Date of Peripheral Line insertion</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo1" id="mo1" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Time of Insertion</label>
											<div class="col-lg-2">
												<input type="time" name="mo2" id="mo2" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">VIP Score</label>
											<div class="col-lg-5">	
												<input type="text" name="mo3" id="mo3" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Signs and Symptoms of Hematoma</label>
											<div class="col-lg-2">	
												<select type="text" name="mo4" id="mo4" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo5" id="mo5" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Signs and symptoms of Thromboplebitis</label>
											<div class="col-lg-2">	
												<select type="text" name="mo6" id="mo6" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo7" id="mo7" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Braden Score</label>
											<div class="col-lg-6">
												<input type="text" name="mo8" id="mo8" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Signs and Symptoms of Bed Scores</label>
											<div class="col-lg-2">	
												<select type="text" name="mo9" id="mo9" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo10" id="mo10" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Morse Score</label>
											<div class="col-lg-4">
												<input type="text" name="mo11" id="mo11" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Incidence of Patient Fall</label>
											<div class="col-lg-2">	
												<select type="text" name="mo12" id="mo12" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo13" id="mo13" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Incidence of Accidental Removal of Drains and lines</label>
											<div class="col-lg-2">	
												<select type="text" name="mo14" id="mo14" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo15" id="mo15" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Injury To Patient</label>
											<div class="col-lg-2">	
												<select type="text" name="mo16" id="mo16" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo17" id="mo17" placeholder="Enter Corrective Action" class="form-control" />
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
												<th>Sr No</th>
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>IPD No</th>
												<th>Date of Peripheral Line insertion</th>
												<th>Time of Insertion</th>
												<th>VIP Score</th>
												<th>Signs and Symptoms of Hematoma</th>
												<th>Signs and symptoms of Thromboplebitis</th>
												<th>Braden Score</th>
												<th>Signs and Symptoms of Bed Scores</th>
												<th>Morse Score</th>
												<th>Incidence of Patient Fall</th>
												<th>Incidence of Accidental Removal of Drains and lines</th>
												<th>InjurytTo Patient </th>					
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<form method="post" action="../excel/CRE/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										
										
     <input type="submit" name="export" class="btn btn-danger" value="Excel" />
    
									</div>
									</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="cre">
					
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
						<div id="line_chart_care" style="height:400px;"></div>
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
		$("#mo1").datepicker({
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
		
		$(function(){  
			$("#mo1").datepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
		});
		
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_care_event_form.php",
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
					url:"insert_care_event_form.php",
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
				url:"fetch_single_care_event_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#bx2').hide('fast');
					$('#p_name').focus();
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					$('#uhid_no').val(data.uhid_no);
					$('#ipd_no').val(data.ipd_no);
					$('#mo1').val(data.mo1);
					$('#mo2').val(data.mo2);
					$('#mo3').val(data.mo3);
					$('#mo4').val(data.mo4);
					$('#mo5').val(data.mo5);
					$('#mo6').val(data.mo6);
					$('#mo7').val(data.mo7);
					$('#mo8').val(data.mo8);
					$('#mo9').val(data.mo9);
					$('#mo10').val(data.mo10);
					$('#mo11').val(data.mo11);
					$('#mo12').val(data.mo12);
					$('#mo13').val(data.mo13);
					$('#mo14').val(data.mo14);
					$('#mo15').val(data.mo15);
					$('#mo16').val(data.mo16);
					$('#mo17').val(data.mo17);
					$('#user_id').val(data.sr_no);
					$('#action').val("Update Details ( Alt + s )");
					$('#operation').val("Edit");					
					$("#action").attr("disabled", false);
				}
			})
		});
	});
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#mo1').mask('9999-99-99');// for Date
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
				// Chart Six
					var jsonData = $.ajax({
					url: 'care_evt_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Care Related Events',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_care'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
			}	
		}	
</script>