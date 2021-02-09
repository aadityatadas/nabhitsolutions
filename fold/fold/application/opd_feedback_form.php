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
	$('#opd').load('opd_count.php').fadeIn("slow");
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
                            OPD FEEDBACK FORM
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-2" id="bofid">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date</label>
											<div class="col-lg-3">
												<input type="text" name="dt" id="dt" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name (Optional)</label>
											<div class="col-lg-7">
												<input type="text" name="mo1" id="mo1" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Age</label>
											<div class="col-lg-2">
												<input type="text" name="mo2" id="mo2" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Sex</label>
											<div class="col-lg-2">
												<select type="text" name="mo3" id="mo3" class="form-control" >
													<option value="">Select</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">E-mail ID</label>
											<div class="col-lg-7">
												<input type="email" name="em" id="em" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Address</label>
											<div class="col-lg-7">
												<textarea type="text" name="mo4" id="mo4" class="form-control" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Treating Doctor</label>
											<div class="col-lg-7">
												<input type="text" name="mo5" id="mo5" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">You Heard/Read about Hospital From</label>
											<div class="col-lg-8">
												TV/Radio&nbsp;&nbsp;<input type="checkbox" value="TV/Radio" name="chkk1" id="chkk1" />
												&nbsp;Print Media/Hoarding&nbsp;&nbsp;<input type="checkbox" value="Print Media/Hoarding" name="chkk2" id="chkk2" />
												&nbsp;Friend/Relatives&nbsp;&nbsp;<input type="checkbox" value="Friend/Relatives" name="chkk3" id="chkk3" />
											</div>
										</div>
										<div class="col-lg-12">
											<br />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Other (Please Specify)</label>
											<div class="col-lg-7">
												<textarea type="text" name="mo7" id="mo7" class="form-control" ></textarea>
											</div>
										</div>										
										<div class="col-lg-12">
											<hr style="margin-bottom:0px;border:1px solid #900;"/>
										</div>
										<div class="col-lg-12">
											<div id="ord" class="table-responsive">
												<table class="table table-bordered table-hover">
													<thead>
														<tr>
															<th>Facilities / Services</th>
															<th>Extremely Dissatisfied</th>
															<th>Dissatisfied</th>
															<th>Neither Satisfied / Nor dissatisfied</th>
															<th>Satisfied</th>
															<th>Extremely Satisfied</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1) Reception Staff</td>
															<td><input type="radio" value="1" name="chk1" id="chk1" /></td>
															<td><input type="radio" value="2" name="chk1" id="chk2" /></td>
															<td><input type="radio" value="3" name="chk1" id="chk3" /></td>
															<td><input type="radio" value="4" name="chk1" id="chk4" /></td>
															<td><input type="radio" value="5" name="chk1" id="chk5" /></td>
														</tr>
														<tr>
															<td>2) Registration Process</td>
															<td><input type="radio" value="1" name="chk2" id="chk6" /></td>
															<td><input type="radio" value="2" name="chk2" id="chk7" /></td>
															<td><input type="radio" value="3" name="chk2" id="chk8" /></td>
															<td><input type="radio" value="4" name="chk2" id="chk9" /></td>
															<td><input type="radio" value="5" name="chk2" id="chk10" /></td>
														</tr>
														<tr>
															<td>3) O.P.D. Billing</td>
															<td><input type="radio" value="1" name="chk3" id="chk11" /></td>
															<td><input type="radio" value="2" name="chk3" id="chk12" /></td>
															<td><input type="radio" value="3" name="chk3" id="chk13" /></td>
															<td><input type="radio" value="4" name="chk3" id="chk14" /></td>
															<td><input type="radio" value="5" name="chk3" id="chk15" /></td>
														</tr>
														<tr>
															<td>4) Waiting Area</td>
															<td><input type="radio" value="1" name="chk4" id="chk16" /></td>
															<td><input type="radio" value="2" name="chk4" id="chk17" /></td>
															<td><input type="radio" value="3" name="chk4" id="chk18" /></td>
															<td><input type="radio" value="4" name="chk4" id="chk19" /></td>
															<td><input type="radio" value="5" name="chk4" id="chk20" /></td>
														</tr>
														<tr>
															<td>5) Nursing Staff</td>
															<td><input type="radio" value="1" name="chk5" id="chk21" /></td>
															<td><input type="radio" value="2" name="chk5" id="chk22" /></td>
															<td><input type="radio" value="3" name="chk5" id="chk23" /></td>
															<td><input type="radio" value="4" name="chk5" id="chk24" /></td>
															<td><input type="radio" value="5" name="chk5" id="chk25" /></td>
														</tr>
														<tr>
															<td>6) Consultant/Treating Doctor</td>
															<td><input type="radio" value="1" name="chk6" id="chk26" /></td>
															<td><input type="radio" value="2" name="chk6" id="chk27" /></td>
															<td><input type="radio" value="3" name="chk6" id="chk28" /></td>
															<td><input type="radio" value="4" name="chk6" id="chk29" /></td>
															<td><input type="radio" value="5" name="chk6" id="chk30" /></td>
														</tr>
														<tr>
															<td>7) Waiting Time to see the Doctor</td>
															<td><input type="radio" value="1" name="chk7" id="chk31" /></td>
															<td><input type="radio" value="2" name="chk7" id="chk32" /></td>
															<td><input type="radio" value="3" name="chk7" id="chk33" /></td>
															<td><input type="radio" value="4" name="chk7" id="chk34" /></td>
															<td><input type="radio" value="5" name="chk7" id="chk35" /></td>
														</tr>
														<tr>
															<td>8) Pharmacy</td>
															<td><input type="radio" value="1" name="chk8" id="chk36" /></td>
															<td><input type="radio" value="2" name="chk8" id="chk37" /></td>
															<td><input type="radio" value="3" name="chk8" id="chk38" /></td>
															<td><input type="radio" value="4" name="chk8" id="chk39" /></td>
															<td><input type="radio" value="5" name="chk8" id="chk40" /></td>
														</tr>
														<tr>
															<td>9) Diagnostic</td>
															<td><input type="radio" value="1" name="chk9" id="chk41" /></td>
															<td><input type="radio" value="2" name="chk9" id="chk42" /></td>
															<td><input type="radio" value="3" name="chk9" id="chk43" /></td>
															<td><input type="radio" value="4" name="chk9" id="chk44" /></td>
															<td><input type="radio" value="5" name="chk9" id="chk45" /></td>
														</tr>
														<tr>
															<td>a) Pathology</td>
															<td><input type="radio" value="1" name="chk10" id="chk46" /></td>
															<td><input type="radio" value="2" name="chk10" id="chk47" /></td>
															<td><input type="radio" value="3" name="chk10" id="chk48" /></td>
															<td><input type="radio" value="4" name="chk10" id="chk49" /></td>
															<td><input type="radio" value="5" name="chk10" id="chk50" /></td>
														</tr>
														<tr>
															<td>b) Sonography</td>
															<td><input type="radio" value="1" name="chk11" id="chk51" /></td>
															<td><input type="radio" value="2" name="chk11" id="chk52" /></td>
															<td><input type="radio" value="3" name="chk11" id="chk53" /></td>
															<td><input type="radio" value="4" name="chk11" id="chk54" /></td>
															<td><input type="radio" value="5" name="chk11" id="chk55" /></td>
														</tr>
														<tr>
															<td>c) 2D Echo</td>
															<td><input type="radio" value="1" name="chk12" id="chk56" /></td>
															<td><input type="radio" value="2" name="chk12" id="chk57" /></td>
															<td><input type="radio" value="3" name="chk12" id="chk58" /></td>
															<td><input type="radio" value="4" name="chk12" id="chk59" /></td>
															<td><input type="radio" value="5" name="chk12" id="chk60" /></td>
														</tr>
														<tr>
															<td>d) Stress Test</td>
															<td><input type="radio" value="1" name="chk13" id="chk61" /></td>
															<td><input type="radio" value="2" name="chk13" id="chk62" /></td>
															<td><input type="radio" value="3" name="chk13" id="chk63" /></td>
															<td><input type="radio" value="4" name="chk13" id="chk64" /></td>
															<td><input type="radio" value="5" name="chk13" id="chk65" /></td>
														</tr>
														<tr>
															<td>e) ECG</td>
															<td><input type="radio" value="1" name="chk14" id="chk66" /></td>
															<td><input type="radio" value="2" name="chk14" id="chk67" /></td>
															<td><input type="radio" value="3" name="chk14" id="chk68" /></td>
															<td><input type="radio" value="4" name="chk14" id="chk69" /></td>
															<td><input type="radio" value="5" name="chk14" id="chk70" /></td>
														</tr>
														<tr>
															<td>f) C.T. Scan</td>
															<td><input type="radio" value="1" name="chk15" id="chk71" /></td>
															<td><input type="radio" value="2" name="chk15" id="chk72" /></td>
															<td><input type="radio" value="3" name="chk15" id="chk73" /></td>
															<td><input type="radio" value="4" name="chk15" id="chk74" /></td>
															<td><input type="radio" value="5" name="chk15" id="chk75" /></td>
														</tr>
														<tr>
															<td>g) M.R.I</td>
															<td><input type="radio" value="1" name="chk16" id="chk76" /></td>
															<td><input type="radio" value="2" name="chk16" id="chk77" /></td>
															<td><input type="radio" value="3" name="chk16" id="chk78" /></td>
															<td><input type="radio" value="4" name="chk16" id="chk79" /></td>
															<td><input type="radio" value="5" name="chk16" id="chk80" /></td>
														</tr>
														<tr>
															<td>10) Physiotherapy</td>
															<td><input type="radio" value="1" name="chk17" id="chk81" /></td>
															<td><input type="radio" value="2" name="chk17" id="chk82" /></td>
															<td><input type="radio" value="3" name="chk17" id="chk83" /></td>
															<td><input type="radio" value="4" name="chk17" id="chk84" /></td>
															<td><input type="radio" value="5" name="chk17" id="chk85" /></td>
														</tr>
														<tr>
															<td>11) Cleanliness & Hygeine</td>
															<td><input type="radio" value="1" name="chk18" id="chk86" /></td>
															<td><input type="radio" value="2" name="chk18" id="chk87" /></td>
															<td><input type="radio" value="3" name="chk18" id="chk88" /></td>
															<td><input type="radio" value="4" name="chk18" id="chk89" /></td>
															<td><input type="radio" value="5" name="chk18" id="chk90" /></td>
														</tr>
														<tr>
															<td>12) Drinking Water Facilities</td>
															<td><input type="radio" value="1" name="chk19" id="chk91" /></td>
															<td><input type="radio" value="2" name="chk19" id="chk92" /></td>
															<td><input type="radio" value="3" name="chk19" id="chk93" /></td>
															<td><input type="radio" value="4" name="chk19" id="chk94" /></td>
															<td><input type="radio" value="5" name="chk19" id="chk95" /></td>
														</tr>
														<tr>
															<td>13) Toilet Facility</td>
															<td><input type="radio" value="1" name="chk20" id="chk96" /></td>
															<td><input type="radio" value="2" name="chk20" id="chk97" /></td>
															<td><input type="radio" value="3" name="chk20" id="chk98" /></td>
															<td><input type="radio" value="4" name="chk20" id="chk99" /></td>
															<td><input type="radio" value="5" name="chk20" id="chk100" /></td>
														</tr>
														<tr>
															<td>14) Cafeteria</td>
															<td><input type="radio" value="1" name="chk21" id="chk101" /></td>
															<td><input type="radio" value="2" name="chk21" id="chk102" /></td>
															<td><input type="radio" value="3" name="chk21" id="chk103" /></td>
															<td><input type="radio" value="4" name="chk21" id="chk104" /></td>
															<td><input type="radio" value="5" name="chk21" id="chk105" /></td>
														</tr>
														<tr>
															<td>15) Information & Sign Board</td>
															<td><input type="radio" value="1" name="chk22" id="chk106" /></td>
															<td><input type="radio" value="2" name="chk22" id="chk107" /></td>
															<td><input type="radio" value="3" name="chk22" id="chk108" /></td>
															<td><input type="radio" value="4" name="chk22" id="chk109" /></td>
															<td><input type="radio" value="5" name="chk22" id="chk110" /></td>
														</tr>
														<tr>
															<td>16) Parking Facility</td>
															<td><input type="radio" value="1" name="chk23" id="chk111" /></td>
															<td><input type="radio" value="2" name="chk23" id="chk112" /></td>
															<td><input type="radio" value="3" name="chk23" id="chk113" /></td>
															<td><input type="radio" value="4" name="chk23" id="chk114" /></td>
															<td><input type="radio" value="5" name="chk23" id="chk115" /></td>
														</tr>
														<tr>
															<td>17) Security Staff</td>
															<td><input type="radio" value="1" name="chk24" id="chk116" /></td>
															<td><input type="radio" value="2" name="chk24" id="chk117" /></td>
															<td><input type="radio" value="3" name="chk24" id="chk118" /></td>
															<td><input type="radio" value="4" name="chk24" id="chk119" /></td>
															<td><input type="radio" value="5" name="chk24" id="chk120" /></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-lg-12">
											<hr style="margin-top:0px;border:1px solid #900;"/>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Reason for Dissatisfaction with above services / Facilities</label>
											<div class="col-lg-7">
												<textarea type="text" col="3" name="mo8" id="mo8" class="form-control" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Any other Suggestion / Complaints</label>
											<div class="col-lg-7">
												<textarea type="text" col="3" name="mo9" id="mo9" class="form-control" ></textarea>
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
												<th>Date</th>
												<th>Name (Optional)</th>
												<th>Age</th>
												<th>Sex</th>
												<th>Email</th>
												<th>Address</th>
												<th>Treating Doctor</th>
												<th>Heard about hospital from</th>
												<th>Other</th>
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
										<div id="eqp">
					
										</div>
										<br />
										<div id="eqp_chart">
											
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
		$("#mo6").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$(function(){  
			$("#dt").datepicker();
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
			$('#bofid').load("load_opdno.php");
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
				url:"fetch_opd_form.php",
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
					url:"insert_opd_form.php",
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
				url:"fetch_single_opd_form.php",
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
					$('#dt').val(data.dt);
					$('#mo1').val(data.mo1);
					$('#mo2').val(data.mo2);
					$('#mo3').val(data.mo3);
					$('#em').val(data.em);
					$('#mo4').val(data.mo4);
					$('#mo5').val(data.mo5);
					$('#chkk1').val(data.chkk1);
					$('#chkk2').val(data.chkk2);
					$('#chkk3').val(data.chkk3);
					$('#mo7').val(data.mo7);
					$('#chk1').val(data.chk1);
					$('#chk2').val(data.chk2);
					$('#chk3').val(data.chk3);
					$('#chk4').val(data.chk4);
					$('#chk5').val(data.chk5);
					$('#chk6').val(data.chk6);
					$('#chk7').val(data.chk7);
					$('#chk8').val(data.chk8);
					$('#chk9').val(data.chk9);
					$('#chk10').val(data.chk10);
					$('#chk11').val(data.chk11);
					$('#chk12').val(data.chk12);
					$('#chk13').val(data.chk13);
					$('#chk14').val(data.chk14);
					$('#chk15').val(data.chk15);
					$('#chk16').val(data.chk16);
					$('#chk17').val(data.chk17);
					$('#chk18').val(data.chk18);
					$('#chk19').val(data.chk19);
					$('#chk20').val(data.chk20);
					$('#chk21').val(data.chk21);
					$('#chk22').val(data.chk22);
					$('#chk23').val(data.chk23);
					$('#chk24').val(data.chk24);					
					$('#mo8').val(data.mo8);
					$('#mo9').val(data.mo9);
					
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
					url:"delete_opd_form.php",
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
	});
</script>