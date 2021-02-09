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
	$('#opdf').load('ipdf_count.php').fadeIn("slow");
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
                            IPD FEEDBACK FORM
							<!--<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>-->
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
												<input type="text" name="dt" id="dt" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name (Optional)</label>
											<div class="col-lg-7">
												<input type="text" name="mo1" id="mo1" class="form-control" readonly />
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
												TV/Radio&nbsp;&nbsp;<input type="checkbox" value="TV/Radio" name="aj1" id="tvv" />
												&nbsp;Print Media/Hoarding&nbsp;&nbsp;<input type="checkbox" value="Print Media/Hoarding" name="aj2" id="prtt" />
												&nbsp;Friend/Relatives&nbsp;&nbsp;<input type="checkbox" value="Friend/Relatives" name="aj3" id="medd" />
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
															<td><input type="radio" value="1" name="chk1" id="chhk1" /></td>
															<td><input type="radio" value="2" name="chk1" id="chhk2" /></td>
															<td><input type="radio" value="3" name="chk1" id="chhk3" /></td>
															<td><input type="radio" value="4" name="chk1" id="chhk4" /></td>
															<td><input type="radio" value="5" name="chk1" id="chhk5" /></td>
														</tr>
														<tr>
															<td>2) Registration Process</td>
															<td><input type="radio" value="1" name="chk2" id="chhk6" /></td>
															<td><input type="radio" value="2" name="chk2" id="chhk7" /></td>
															<td><input type="radio" value="3" name="chk2" id="chhk8" /></td>
															<td><input type="radio" value="4" name="chk2" id="chhk9" /></td>
															<td><input type="radio" value="5" name="chk2" id="chhk10" /></td>
														</tr>
														<tr>
															<td>3) I.P.D. Billing</td>
															<td><input type="radio" value="1" name="chk3" id="chhk11" /></td>
															<td><input type="radio" value="2" name="chk3" id="chhk12" /></td>
															<td><input type="radio" value="3" name="chk3" id="chhk13" /></td>
															<td><input type="radio" value="4" name="chk3" id="chhk14" /></td>
															<td><input type="radio" value="5" name="chk3" id="chhk15" /></td>
														</tr>
														<tr>
															<td>4) Waiting Area</td>
															<td><input type="radio" value="1" name="chk4" id="chhk16" /></td>
															<td><input type="radio" value="2" name="chk4" id="chhk17" /></td>
															<td><input type="radio" value="3" name="chk4" id="chhk18" /></td>
															<td><input type="radio" value="4" name="chk4" id="chhk19" /></td>
															<td><input type="radio" value="5" name="chk4" id="chhk20" /></td>
														</tr>
														<tr>
															<td>5) Nursing Staff</td>
															<td><input type="radio" value="1" name="chk5" id="chhk21" /></td>
															<td><input type="radio" value="2" name="chk5" id="chhk22" /></td>
															<td><input type="radio" value="3" name="chk5" id="chhk23" /></td>
															<td><input type="radio" value="4" name="chk5" id="chhk24" /></td>
															<td><input type="radio" value="5" name="chk5" id="chhk25" /></td>
														</tr>
														<tr>
															<td>6) Consultant/Treating Doctor</td>
															<td><input type="radio" value="1" name="chk6" id="chhk26" /></td>
															<td><input type="radio" value="2" name="chk6" id="chhk27" /></td>
															<td><input type="radio" value="3" name="chk6" id="chhk28" /></td>
															<td><input type="radio" value="4" name="chk6" id="chhk29" /></td>
															<td><input type="radio" value="5" name="chk6" id="chhk30" /></td>
														</tr>
														<tr>
															<td>7) Waiting Time to see the Doctor</td>
															<td><input type="radio" value="1" name="chk7" id="chhk31" /></td>
															<td><input type="radio" value="2" name="chk7" id="chhk32" /></td>
															<td><input type="radio" value="3" name="chk7" id="chhk33" /></td>
															<td><input type="radio" value="4" name="chk7" id="chhk34" /></td>
															<td><input type="radio" value="5" name="chk7" id="chhk35" /></td>
														</tr>
														<tr>
															<td>8) Pharmacy</td>
															<td><input type="radio" value="1" name="chk8" id="chhk36" /></td>
															<td><input type="radio" value="2" name="chk8" id="chhk37" /></td>
															<td><input type="radio" value="3" name="chk8" id="chhk38" /></td>
															<td><input type="radio" value="4" name="chk8" id="chhk39" /></td>
															<td><input type="radio" value="5" name="chk8" id="chhk40" /></td>
														</tr>
														<tr>
															<td>9) Diagnostic</td>
															<td><input type="radio" value="1" name="chk9" id="chhk41" /></td>
															<td><input type="radio" value="2" name="chk9" id="chhk42" /></td>
															<td><input type="radio" value="3" name="chk9" id="chhk43" /></td>
															<td><input type="radio" value="4" name="chk9" id="chhk44" /></td>
															<td><input type="radio" value="5" name="chk9" id="chk45" /></td>
														</tr>
														<tr>
															<td>a) Pathology</td>
															<td><input type="radio" value="1" name="chk10" id="chhk46" /></td>
															<td><input type="radio" value="2" name="chk10" id="chhk47" /></td>
															<td><input type="radio" value="3" name="chk10" id="chhk48" /></td>
															<td><input type="radio" value="4" name="chk10" id="chhk49" /></td>
															<td><input type="radio" value="5" name="chk10" id="chhk50" /></td>
														</tr>
														<tr>
															<td>b) Sonography</td>
															<td><input type="radio" value="1" name="chk11" id="chhk51" /></td>
															<td><input type="radio" value="2" name="chk11" id="chhk52" /></td>
															<td><input type="radio" value="3" name="chk11" id="chhk53" /></td>
															<td><input type="radio" value="4" name="chk11" id="chhk54" /></td>
															<td><input type="radio" value="5" name="chk11" id="chhk55" /></td>
														</tr>
														<tr>
															<td>c) 2D Echo</td>
															<td><input type="radio" value="1" name="chk12" id="chhk56" /></td>
															<td><input type="radio" value="2" name="chk12" id="chhk57" /></td>
															<td><input type="radio" value="3" name="chk12" id="chhk58" /></td>
															<td><input type="radio" value="4" name="chk12" id="chhk59" /></td>
															<td><input type="radio" value="5" name="chk12" id="chhk60" /></td>
														</tr>
														<tr>
															<td>d) Stress Test</td>
															<td><input type="radio" value="1" name="chk13" id="chhk61" /></td>
															<td><input type="radio" value="2" name="chk13" id="chhk62" /></td>
															<td><input type="radio" value="3" name="chk13" id="chhk63" /></td>
															<td><input type="radio" value="4" name="chk13" id="chhk64" /></td>
															<td><input type="radio" value="5" name="chk13" id="chhk65" /></td>
														</tr>
														<tr>
															<td>e) ECG</td>
															<td><input type="radio" value="1" name="chk14" id="chhk66" /></td>
															<td><input type="radio" value="2" name="chk14" id="chhk67" /></td>
															<td><input type="radio" value="3" name="chk14" id="chhk68" /></td>
															<td><input type="radio" value="4" name="chk14" id="chhk69" /></td>
															<td><input type="radio" value="5" name="chk14" id="chhk70" /></td>
														</tr>
														<tr>
															<td>f) C.T. Scan</td>
															<td><input type="radio" value="1" name="chk15" id="chhk71" /></td>
															<td><input type="radio" value="2" name="chk15" id="chhk72" /></td>
															<td><input type="radio" value="3" name="chk15" id="chhk73" /></td>
															<td><input type="radio" value="4" name="chk15" id="chhk74" /></td>
															<td><input type="radio" value="5" name="chk15" id="chhk75" /></td>
														</tr>
														<tr>
															<td>g) M.R.I</td>
															<td><input type="radio" value="1" name="chk16" id="chhk76" /></td>
															<td><input type="radio" value="2" name="chk16" id="chhk77" /></td>
															<td><input type="radio" value="3" name="chk16" id="chhk78" /></td>
															<td><input type="radio" value="4" name="chk16" id="chhk79" /></td>
															<td><input type="radio" value="5" name="chk16" id="chhk80" /></td>
														</tr>
														<tr>
															<td>10) Physiotherapy</td>
															<td><input type="radio" value="1" name="chk17" id="chhk81" /></td>
															<td><input type="radio" value="2" name="chk17" id="chhk82" /></td>
															<td><input type="radio" value="3" name="chk17" id="chhk83" /></td>
															<td><input type="radio" value="4" name="chk17" id="chhk84" /></td>
															<td><input type="radio" value="5" name="chk17" id="chhk85" /></td>
														</tr>
														<tr>
															<td>11) Cleanliness & Hygeine</td>
															<td><input type="radio" value="1" name="chk18" id="chhk86" /></td>
															<td><input type="radio" value="2" name="chk18" id="chhk87" /></td>
															<td><input type="radio" value="3" name="chk18" id="chhk88" /></td>
															<td><input type="radio" value="4" name="chk18" id="chhk89" /></td>
															<td><input type="radio" value="5" name="chk18" id="chhk90" /></td>
														</tr>
														<tr>
															<td>12) Drinking Water Facilities</td>
															<td><input type="radio" value="1" name="chk19" id="chhk91" /></td>
															<td><input type="radio" value="2" name="chk19" id="chhk92" /></td>
															<td><input type="radio" value="3" name="chk19" id="chhk93" /></td>
															<td><input type="radio" value="4" name="chk19" id="chhk94" /></td>
															<td><input type="radio" value="5" name="chk19" id="chhk95" /></td>
														</tr>
														<tr>
															<td>13) Toilet Facility</td>
															<td><input type="radio" value="1" name="chk20" id="chhk96" /></td>
															<td><input type="radio" value="2" name="chk20" id="chhk97" /></td>
															<td><input type="radio" value="3" name="chk20" id="chhk98" /></td>
															<td><input type="radio" value="4" name="chk20" id="chhk99" /></td>
															<td><input type="radio" value="5" name="chk20" id="chhk100" /></td>
														</tr>
														<tr>
															<td>14) Cafeteria</td>
															<td><input type="radio" value="1" name="chk21" id="chhk101" /></td>
															<td><input type="radio" value="2" name="chk21" id="chhk102" /></td>
															<td><input type="radio" value="3" name="chk21" id="chhk103" /></td>
															<td><input type="radio" value="4" name="chk21" id="chhk104" /></td>
															<td><input type="radio" value="5" name="chk21" id="chhk105" /></td>
														</tr>
														<tr>
															<td>15) Information & Sign Board</td>
															<td><input type="radio" value="1" name="chk22" id="chhk106" /></td>
															<td><input type="radio" value="2" name="chk22" id="chhk107" /></td>
															<td><input type="radio" value="3" name="chk22" id="chhk108" /></td>
															<td><input type="radio" value="4" name="chk22" id="chhk109" /></td>
															<td><input type="radio" value="5" name="chk22" id="chhk110" /></td>
														</tr>
														<tr>
															<td>16) Parking Facility</td>
															<td><input type="radio" value="1" name="chk23" id="chhk111" /></td>
															<td><input type="radio" value="2" name="chk23" id="chhk112" /></td>
															<td><input type="radio" value="3" name="chk23" id="chhk113" /></td>
															<td><input type="radio" value="4" name="chk23" id="chhk114" /></td>
															<td><input type="radio" value="5" name="chk23" id="chhk115" /></td>
														</tr>
														<tr>
															<td>17) Security Staff</td>
															<td><input type="radio" value="1" name="chk24" id="chhk116" /></td>
															<td><input type="radio" value="2" name="chk24" id="chhk117" /></td>
															<td><input type="radio" value="3" name="chk24" id="chhk118" /></td>
															<td><input type="radio" value="4" name="chk24" id="chhk119" /></td>
															<td><input type="radio" value="5" name="chk24" id="chhk120" /></td>
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
												<th>Score (Out of 120)</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>								
							</div>
							<form method="post" action="../excel/IPD-FEED/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										
										
     <input type="submit" name="export" class="btn btn-danger" value="Excel" />
    
									</div>
									</form>
									
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="opdf">
					
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
						<div id="line_chart_ipdf" style="height:400px;"></div>
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
			$('#add_btn').hide('fast');
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			$('#mo1').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			//$('#bofid').load("load_ipdno.php");
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
				url:"fetch_ipd_form.php",
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
					url:"insert_ipd_form.php",
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
				url:"fetch_single_ipd_form.php",
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
					//$('#tvv').val(data.chkk1);
					//$('#prtt').val(data.chkk2);
					//$('#medd').val(data.chkk3);
					$('#mo7').val(data.mo7);
					$('#chhk1').val(data.chk1);
					$('#chhk2').val(data.chk2);
					$('#chhk3').val(data.chk3);
					$('#chhk4').val(data.chk4);
					$('#chhk5').val(data.chk5);
					$('#chhk6').val(data.chk6);
					$('#chhk7').val(data.chk7);
					$('#chhk8').val(data.chk8);
					$('#chhk9').val(data.chk9);
					$('#chhk10').val(data.chk10);
					$('#chhk11').val(data.chk11);
					$('#chhk12').val(data.chk12);
					$('#chhk13').val(data.chk13);
					$('#chhk14').val(data.chk14);
					$('#chhk15').val(data.chk15);
					$('#chhk16').val(data.chk16);
					$('#chhk17').val(data.chk17);
					$('#chhk18').val(data.chk18);
					$('#chhk19').val(data.chk19);
					$('#chhk20').val(data.chk20);
					$('#chhk21').val(data.chk21);
					$('#chhk22').val(data.chk22);
					$('#chhk23').val(data.chk23);
					$('#chhk24').val(data.chk24);					
					$('#mo8').val(data.mo8);
					$('#mo9').val(data.mo9);
					
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
		$('#mo6').mask('9999-99-99');// for  To Date
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
					url: 'ipd_satis_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Overall IPD Satisfaction Rating',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_ipdf'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
			}	
		}	
</script>