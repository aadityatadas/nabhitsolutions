<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
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
	$('#medi').load('medi_count.php').fadeIn("slow");
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
	<?php include"nav-bar-mrd.php";?>
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
                            Medical Records Indicator Form &nbsp;

                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
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

													$qry = "SELECT COUNT(*) as total FROM  tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_medi_indi.medi_id WHERE year(huf_dadm) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as comp FROM  tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_medi_indi.medi_id   WHERE  (medi_mrdav='Available' OR medi_mrdav='Missing') AND year(huf_dadm) = '$yr'";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notcomp FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_medi_indi.medi_id  WHERE  medi_mrdav='' AND year(huf_dadm) = '$yr'";
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
											<div class="col-lg-3">
												<input type="text" name="dadm" id="dadm" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Discharge/DAMA/Dealth</label>
											<div class="col-lg-3">
												<input type="text" name="dddd" id="dddd" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">MLC</label>
											<div class="col-lg-3">
												<input type="text" name="mlc" id="mlc" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">MRD Available</label>
											<div class="col-lg-3">
												<select type="text" name="mo1" id="mo1" class="form-control" >
													<option value="">Select</option>
													<option value="Available">Available</option>
													<option value="Missing">Missing</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">MRD File In order as per MRD checklist</label>
											<div class="col-lg-3">
												<select type="text" name="mo2" id="mo2" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">MRD has Discharge Summary</label>
											<div class="col-lg-3">
												<select type="text" name="mo3" id="mo3" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">MRD has codification as per ICD</label>
											<div class="col-lg-3">
												<select type="text" name="mo4" id="mo4" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">MRD has incomplete or Improper Consent</label>
											<div class="col-lg-3">
												<select type="text" name="mo5" id="mo5" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Medication orders are properly written</label>
											<div class="col-lg-3">
												<select type="text" name="mo6" id="mo6" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Handover Sheet of Doctors are properly filled</label>
											<div class="col-lg-3">
												<select type="text" name="mo7" id="mo7" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Handover Sheet of Nurses are properly filled</label>
											<div class="col-lg-3">
												<select type="text" name="mo8" id="mo8" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">The Plan of care is documented with desired outcome and countersigned by clinicians</label>
											<div class="col-lg-3">	
												<select type="text" name="mo9" id="mo9" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">MRD includes screening for nutritional needs (Nutritional Assessment)</label>
											<div class="col-lg-3">	
												<select type="text" name="mo10" id="mo10" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">MRD Includes Nursing care plan is documented with outcome at the time of admission</label>
											<div class="col-lg-3">	
												<select type="text" name="mo11" id="mo11" class="form-control" >
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
												<button accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" />Submit ( Alt + s )</button>
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
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>IPD No</th>
												<th>Date of Admission</th>
												<th>Date of Discharge/DAMA/Dealth</th>
												<th>MLC</th>
												<th>MRD Available</th>
												<th>MRD File In order as per MRD checklist</th>
												<th>MRD has Discharge Summary</th>
												<th>MRD has codification as per ICD</th>
												<th>MRD has incomplete or Improper Consent</th>
												<th>Medication orders are properly written</th>
												<th>Handover Sheet of Doctors are properly filled</th>
												<th>Handover Sheet of Nurses are properly filled</th>
												<th>The Plan of care is documented with desired outcome and countersigned by clinicians</th>
												<th>MRD includes screening for nutritional needs (Nutritional Assessment)</th>
												<th>MRD Includes Nursing care plan is documented with outcome at the time of admission</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>								
							</div>
								<form method="post" action="../excel/MRI/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										
										
    										 <input style="color: white;font-weight: bold;" type="submit" name="export" class="btn btn-danger" value="Excel" />
    
									</div>
									</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="medi">
					
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
								<button type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart1" style="height:400px;"></div>
					</div>
					<div class="col-sm-12">
						<div id="line_chart2" style="height:400px;"></div>
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
		$("#ddd").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});		
		$(function(){  
			$("#ddd").datepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
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
				url:"fetch_medi_indi_form.php",
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
					url:"insert_medi_indi_form.php",
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
				url:"fetch_single_medi_indi_form.php",
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
					$('#dadm').val(data.d_adm);
					$('#dddd').val(data.dddd);
					$('#mlc').val(data.mlc);
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
		$('#ddd').mask('9999-99-99');// for Date
		//$('#ddd1').mask('99:99');// for Date
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
					url: 'medi_records_chart1.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Medical Records Indicator',
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
				// chart two
					var jsonData = $.ajax({
					url: 'medi_records_chart2.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Medical Records Indicator',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart2'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
			}	
		}	
</script>