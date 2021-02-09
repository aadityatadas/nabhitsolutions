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
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#needl').load('needl_count.php').fadeIn("slow");
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
	<?php include"nav-bar.php";?>
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
                            Neddle Prick Injury Form
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-2" id="needl">
												<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of The staff Injured</label>
											<div class="col-lg-7">
												<input style="text-transform:uppercase;" onchange="get_select_val(this.value);" type="text" list="slist" name="s_name" id="s_name" class="form-control" required />
												<datalist id="slist">
													<option value="">Select Staff Name</option>
													<?php
														$qs = mysqli_query($connect,"SELECT hr_staff FROM tbl_hr_mast")or die(mysqli_query($connect));
														while($rs = mysqli_fetch_array($qs))
														{
													?>
													<option value="<?php echo $rs["hr_staff"];?>"><?php echo $rs["hr_staff"];?></option>
													<?php
														}
													?>
												</datalist>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Department</label>
											<div class="col-lg-5">
												<input style="text-transform:uppercase;" type="text" name="dept" id="dept" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Injury</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="inj_dttm" id="inj_dttm" placeholder="yyyy-mm-dd" class="form-control" required />
											</div>
											<div class="col-lg-2">
												<input type="time" name="inj_dttm2" id="inj_dttm2" placeholder="hh:mm" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Type of Injury</label>
											<div class="col-lg-5">
												<select type="text" name="inj_typ" id="inj_typ" class="form-control" required >
													<option value="">Select Type of Injury</option>
													<option value="Prick (Spertificial/Deep)">Prick (Spertificial/Deep)</option>
													<option value="Cut (Spertificial/Deep)">Cut (Spertificial/Deep)</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Mode of Injury</label>
											<div class="col-lg-5">
												<select type="text" name="inj_mod" id="inj_mod" class="form-control" required >
													<option value="">Select Mode of Injury</option>
													<option value="Needle">Needle</option>
													<option value="Broken glass">Broken glass</option>
													<option value="Sharp Instrument">Sharp Instrument</option>
													<option value="Lancet">Lancet</option>
													<option value="Other if any">Other if any</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Injury with used/unused sharp</label>
											<div class="col-lg-2">	
												<select type="text" name="inj_with" id="inj_with" onChange="LoadData();" class="form-control" required >
													<option value="">Select</option>
													<option value="used sharp">used sharp</option>
													<option value="unused sharp">unused sharp</option>
												</select>
											</div>
											<div class="col-lg-5" id="symp">
												<input type="text" name="inj_pname" id="inj_pname" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Reason/Details of Injury</label>
											<div class="col-lg-7">		
												<textarea type="text" name="inj_det" id="inj_det" class="form-control" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Whether Investigated</label>
											<div class="col-lg-2">
												<select type="text" name="inj_inv" id="inj_inv" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>							
										<div class="col-lg-12">
											<label class="col-lg-4">Whether Prophylaxix given (Yes/No)</label>
											<div class="col-lg-2">
												<select type="text" name="inj_prop" id="inj_prop" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Reported to</label>
											<div class="col-lg-5">
												<input type="text" name="inj_rpt" id="inj_rpt" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Reported By</label>
											<div class="col-lg-5">
												<input type="text" name="inj_rptby" id="inj_rptby" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Total No of Staff</label>
											<div class="col-lg-2">
												<input type="text" name="stf_no" id="stf_no" class="form-control" />
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
												<th>Name of The staff Injured</th>
												<th>Department</th>
												<th>Date & Time of Injury</th>
												<th>Type of Injury</th>
												<th>Mode of Injury</th>
												<th>Injury with used/unused sharp</th>
												<th>Reason/Details of Injury</th>
												<th>Whether Investigated</th>
												<th>Whether Prophylaxix given (Yes/No)</th>
												<th>Reported to</th>
												<th>Reported by</th>
												<th>Total No of Staff</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="needl">
					
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
									<div id="line_chart_need" style="height:400px;"></div>
								</div>
							</div>
                        </div>
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
	function get_select_val(val){
		if(val){
			$.ajax({
				url: 'load_hr_det.php',
				type: 'post',
				data: { val: val },
				success: function(result){
					var stk=result.split("@");
					document.getElementById('dept').value=stk[1];
					document.getElementById('inj_dttm').focus();					
				}
			});
		}
	}
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#inj_dttm").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$(function(){  
			$("#inj_dttm").datepicker();
			//$("#inj_dttm2").timepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
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
			$('#s_name').focus();
			$('#add_btn').hide('fast');
			$('#bx2').hide('fast');
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			$('#needl').load("load_needl.php");
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
				url:"fetch_needp_form.php",
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
					url:"insert_needp_form.php",
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
				url:"fetch_single_needp_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#s_name').focus();
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#sr_no').val(data.sr_no);
					$('#s_name').val(data.s_name);
					$('#dept').val(data.dept);
					$('#inj_dttm').val(data.inj_dttm);
					$('#inj_dttm2').val(data.inj_dttm2);
					$('#inj_typ').val(data.inj_typ);
					$('#inj_mod').val(data.inj_mod);
					$('#inj_with').val(data.inj_with);
					$('#inj_pname').val(data.inj_pname);
					$('#inj_det').val(data.inj_det);
					$('#inj_inv').val(data.inj_inv);
					$('#inj_prop').val(data.inj_prop);
					$('#inj_rpt').val(data.inj_rpt);
					$('#inj_rptby').val(data.inj_rptby);
					$('#stf_no').val(data.stf_no);
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
					url:"delete_needp_form.php",
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
		$('#inj_dttm').mask('9999-99-99');// for Date
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
				// chart three
					var jsonData = $.ajax({
					url: 'needp_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Neddle Prick Injury',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_need'));
							chart.draw(data, options);
							
						}	
					}).responseText;
			}	
		}	
</script>