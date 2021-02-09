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
	$('#needlp').load('needl_count.php').fadeIn("slow");
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
                            Needle Prick Injury Register &nbsp;
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: white;font-weight: bold;" onclick="myFunction()" class="btn btn-info pull-right"><i class="fa fa-print "></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Back</span>

						 
						 <button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New</b></button>
                             <div class="col-lg-12"	>


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

													$qry = "SELECT COUNT(*) as total FROM tbl_need_pif WHERE year(needp_dttm) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as comp FROM tbl_need_pif WHERE (needp_mod_inj!='' AND needp_mod_inj!='0') AND year(needp_dttm) = '$yr'";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notcomp FROM tbl_need_pif WHERE( needp_mod_inj=' ' OR needp_mod_inj='0') AND year(needp_dttm) = '$yr'";
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
										<div class="col-lg-12" style="display: none">
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
												<button style="color: white;font-weight: bold;" accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" />Submit ( Alt + s )</button>
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
												<th>Name of The Person Injured/Exposed</th>
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
												<!-- <th>Total No of Staff</th> -->
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								
								<div class="panel panel-default">
									
									<form method="post" action="../excel/NEEDLP/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-3" style="color: black;">	
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
								<div class="col-lg-2">
										<input  type="text" name="frdt" id="frdt" value="<?php echo $frdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-2">
									<input  type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input style="color: white;font-weight: bold;" type="submit" name="export" class="btn btn-danger" value="Excel" />
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="needlp">
											
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
								<button style="color: white;font-weight: bold;"  type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
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
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->    
</div>
</section>
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
			$("#inj_dttm").datepicker();
			//$("#inj_dttm2").timepicker();
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