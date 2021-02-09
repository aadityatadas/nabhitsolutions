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
?>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hr').load('hr_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	
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
                            HR Indicator
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the staff</label>
											<div class="col-lg-7">
												<input type="text" name="mo1" id="mo1" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Jan</label>
											<div class="col-lg-4">
												<input type="text" name="mo2" id="mo2" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Feb</label>
											<div class="col-lg-6">
												<input type="text" name="mo3" id="mo3" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">March</label>
											<div class="col-lg-6">
												<input type="text" name="mo4" id="mo4" class="form-control" />
											</div>
										</div>
										<!--<div class="col-lg-12">
											<label class="col-lg-4">Date of Joining</label>
											<div class="col-lg-3">
												<input type="text" name="mo5" id="mo5" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Current status</label>
											<div class="col-lg-3">
												<select type="text" name="mo6" id="mo6" class="form-control" >
													<option value="">Select Status</option>
													<option value="Joined">Joined</option>
													<option value="Resigned">Resigned</option>
												</select>
											</div>
											<div class="col-lg-5">
												<input type="text" name="mo7" id="mo7" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>-->
										<div class="col-lg-12">
											<label class="col-lg-4">April</label>
											<div class="col-lg-3">
												<input type="text" name="mo8" id="mo8" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">May</label>
											<div class="col-lg-3">
												<input type="text" name="mo9" id="mo9" class="form-control" />
											</div>
										</div>
										<!--<div class="col-lg-12">
											<label class="col-lg-4">Occupational Exposure if any</label>
											<div class="col-lg-3">
												<select type="text" name="mo10" id="mo10" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Needle prick Injury incidences</label>
											<div class="col-lg-3">
												<select type="text" name="mo11" id="mo11" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>-->
										<div class="col-lg-12">
											<label class="col-lg-4">June</label>
											<div class="col-lg-7">
												<input type="text" name="mo12" id="mo12" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Jully</label>
											<div class="col-lg-3">
												<input type="text" name="mo13" id="mo13" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Personnal File Complete</label>
											<div class="col-lg-3">
												<select type="text" name="mo14" id="mo14" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Health Check done</label>
											<div class="col-lg-3">
												<select type="text" name="mo15" id="mo15" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Griviences staus</label>
											<div class="col-lg-3">	
												<select type="text" name="mo16" id="mo16" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Immunization Status</label>
											<div class="col-lg-3">	
												<select type="text" name="mo17" id="mo17" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />
												<button accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit Details ( Alt + s )</button>
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
												<th>Name of the staff</th>
												<th>Employee Code</th>
												<th>Designation</th>
												<th>Department</th>
												<th>Date of Joining</th>
												<th>Current status</th>
												<th>No of absentees in the month</th>
												<th>Satisfaction Score</th>
												<th>Occupational Exposure if any</th>
												<th>needle prick Injury incidences</th>
												<th>Total Training Completed</th>
												<th>Performance Aprissal Score</th>
												<th>Personnal File Complete</th>
												<th>Health Check done</th>
												<th>Griviences staus</th>
												<th>Immunization Status</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>								
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="hr">
					
										</div>
										<br />
										<div id="hr_chart">
											
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
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
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#mo5").datepicker({
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
		$(function(){  
			$("#mo5").datepicker();
			$("#mo7").datepicker();
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
			$('#sr').load("load_hrno.php");
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
				url:"fetch_hr_indi_form.php",
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
					url:"insert_hr_indi_form.php",
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
				url:"fetch_single_hr_indi_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#bx2').hide('fast');
					$('#mo1').focus();
					$('#sr_no').val(data.sr_no);
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
		$(document).on('click', '.delete', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"delete_hr_ind.php",
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
		$('#mo5').mask('9999-99-99');// for  To Date
		$('#mo7').mask('9999-99-99');// for  To Date
	});
</script>