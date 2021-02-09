<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
	include('dbinfo.php');

	$dat = date('Y-m-d');
	$mnthNo = date('m');
	$mth = '';
	
	$mVal = 0;
	$m1 = array(1,2,3);
	$m2 = array(4,5,6);  
	$m3 = array(7,8,9);
	$m4 = array(10,11,12);

	switch (true) {
		case in_array($mnthNo, $m1):
			$mVal = 1;
			$mth = 'January';
			break;

		case in_array($mnthNo, $m2):
			$mVal = 2;
			$mth = 'April';
			break;

		case in_array($mnthNo, $m3):
			$mVal = 3;
			$mth = 'July';
			break;

		case in_array($mnthNo, $m4):
			$mVal = 4;
			$mth = 'October';
			break;
		
		
	}



	$qry = "SELECT DISTINCT month_id FROM tbl_audit_hh8";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_assoc($res);
	$cid = count($row)+1;
	
  
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');
	
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	







/*print_r($dArry);
die();
foreach ($dArry as $key => $value) {
	
}
*/

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('blod_trans_sfty_chklst/blod_trans_sfty_chklst_count.php').fadeIn("slow");
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
<script>
function myFunction() {
  window.print();
}

 
function goBack() {
  window.history.back();
}
 
</script>
<body>
<?php include"QM-nav-bar.php";?>
<section class="content home" >
	<div class="container-fluid">
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
                        <div class="panel-heading" style="padding-left:0;height: 140px;">
                           
                             HIC Audit&nbsp;
							<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px; " onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
							
                            	
							<div>
		                    	 <table class="custom-table"  cellspacing="10" cellpadding="10" border="1" width="650px" align="center" style="border-color: #9DA2E2; text-align: center;" >
		                            		<tr style="background-color: #9DA2E2;">
		                            			<td style="font-weight: bold;color: white;">Total</td>
		                            			<td style="font-weight: bold;color: white;">Completed</td>
		                            			<td style="font-weight: bold;color: white;">Not-Completed</td>

		                            			
		                            		
		                            		</tr>
		                            		<tr style="background-color: white;">
		                            			<?php
													include('dbinfo.php');

													$tot= "SELECT COUNT(*) as total FROM tbl_audit_hh23 WHERE year(created) = '$yr'";
														$totres = mysqli_query($connect, $tot);
														$totrow=mysqli_fetch_assoc($totres);
														// echo $totrow['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrycomp = "SELECT COUNT(*) as comp FROM tbl_audit_hh23 WHERE sign!='' AND year(created) = '$yr' ";
																$rescomp = mysqli_query($connect, $qrycomp);
																$rowcomp=mysqli_fetch_assoc($rescomp);
																// echo $rowcomp['comp'];
																											

														$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_audit_hh23 WHERE sign='' AND year(created) = '$yr' ";
																	$resnotcomp= mysqli_query($connect, $qrynotcomp);
																	$rownotcomp=mysqli_fetch_assoc($resnotcomp);
																	// echo $rownotcomp['notcomp'];
																	// echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
																	// die();

													   

													?>


		                            			<td style="font-weight: bold;color: black;" ><?php echo $totrow['total'];?></td>
		                            			<td style="font-weight: bold;color: green;"><?php echo $rowcomp['comp'];?></td>
		                            			<td style="font-weight: bold;color: red;"><?php echo $rownotcomp['notcomp'];?></td>
		                            			
		                            		</tr>
		                            		
		                            	</table>
		                            </div>
							<?php if ($filtered_rows1 == 0) { ?>
                            	<!-- <button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New HIC Audit</b></button> -->
                            	
                            <?php } ?>
                        </div>
						<div class="box" id="">
							<div id="">
								<form method="post" action="audit_hh/hic23Excel.php" enctype="multipart/form-data">
									<div class="form-group">
										
									<div class="col-lg-12">
										<label class="col-md-2">Quarter</label>
										
											<div class="col-lg-4">
												<select name="qut1" id="qut1" onchange="getAllAudit();" class="form-control">
													<option value="">---Select Quarter---</option>
													<option value="1">1 (January)</option>
													<option value="2">2 (April)</option>
													<option value="3">3 (July)</option>
													<option value="4">4 (October)</option>
												</select>
											</div>

											<label class="col-lg-1">Year</label>
										<div class="col-lg-3">
											<select name="yr1" id="yr1" class="form-control" onchange="getAllAudit();">
												
												<?php
													 $currentYear = date('Y');
													 for($i = date('Y') ; $i > 2010; $i--) {
													 	?>
													 	<option value='<?= $i ?>' <?= ($i == $currentYear)? 'selected': '' ?>> <?= $i ?></option > 
													 	<?php
													 }
												 ?>
											</select>
										</div>
										
										
								</div>
							
						
						<div style="height: 100px;"></div>
								<div class="col-lg-12">
									<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> All Hic Audit</label>
									<div class="col-lg-12" id="tblRepalce">
										<div id="order-table" class="table-responsive">
											<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
												<thead style="font-size:12px;color:darkblue;">
													<tr>
														<th>Sr n</th>
														<th>Audits</th>
														<th>No Of Yes (a)</th>
														<th>No Of No (b)</th>
														<th>No Of N/A (c)</th>
														<th>Possible Score (d)</th>
														<th>Max score e=d-c</th>
														<th> %score=a/e*100 </th>
														<th>Sign</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
											
											
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>


										<div class="col-lg-12" style="text-align:center">
											<div class="col-lg-4"></div>
											<div class="col-lg-2">
											    <button  style="color: white;font-weight: bold;" name="excel" id="excel" class="btn btn-success">Export</button>
											</div>
											<!-- <div class="col-lg-1">
											    <button  style="color: white;font-weight: bold;" name="pdf" id="pdf" class="btn btn-danger">PDF</button>
											</div> -->
												
												
										
										</div>

										

										
											
											
										<!-- <div class="col-lg-12">
											<label class="col-lg-3">Name</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="name" id="name" 
												 placeholder="Name" class="form-control" />
											</div>
											<label class="col-lg-3">Sign</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="sign" id="sign" 
												 placeholder="Sign" class="form-control" />
												 <input type="hidden" name="tbl" value="tbl_audit_hh8">
											</div>
											
										</div> -->
										<!-- <div class="col-lg-12">
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
										</div> -->
									</div>	
								</form>

								
								
							</div>
						</div>

						<div class="col-lg-12" style="text-align:center">
								<form method="post" action="audit_hh/hic23Pdf.php"  target="print_popup"  onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
									<div class="panel-heading">
										<div class="col-lg-2" style="color: black;">
											Audit Details(Report)
										</div>
										<div class="col-lg-3">
											<select name="quater" id="quater"  class="form-control">
													<option value="">---Select Quarter---</option>
													<option value="1">1 (January)</option>
													<option value="2">2 (April)</option>
													<option value="3">3 (July)</option>
													<option value="4">4 (October)</option>
											</select>
										</div>
										<label class="col-lg-1">Year</label>
										<div class="col-lg-3">
											<select name="yr" id="yr" class="form-control">
												
												<?php
													 $currentYear = date('Y');
													 for($i = date('Y') ; $i > 2010; $i--) {
													 	?>
													 	<option value='<?= $i ?>' <?= ($i == $currentYear)? 'selected': '' ?>> <?= $i ?></option > 
													 	<?php
													 }
												 ?>
											</select>
										</div>
										<input type="hidden" name="tblname" value="tbl_audit_hh23">
										
										<div class="col-lg-1">
											<input type="submit" style="color: white;"  name="export" class="btn btn-danger" value="Report(PDF)" />
										</div>
									</div>
								</form>
							</div>
                        <!-- <div class="box" id="bx2">
							<div class="panel-body">
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:darkblue;">
											<tr>
												<th>Action</th>
											    <th>Quarter</th> 
												<th>Month</th>	
												<th>Date</th>
												<th>Name</th>	
												<th>Sign</th>	
												
												
											</tr>
										</thead>
									</table>
								</div>
							</div>
							
                        </div> -->
                    </div>
                </div>
				<!-- <div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1">Quarter</label>
							<div class="col-lg-4">
								<select name="qut" id="qut" class="form-control">
									<option value="1">1(January)</option>
									<option value="2">2(April)</option>
									<option value="3">3(July)</option>
									<option value="4">4(October)</option>
								</select>
							</div>
							<div class="col-lg-4">
								<button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>  -->
				 <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart1" style="height:400px;"></div>
					</div>
				</div>


				<!-- <div class="form-group">
					<div class="col-sm-12">
						<div id="hChart" style="width: 800px; height: 400px; margin: 0 auto"></div>
					</div>
				</div>  -->

				
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>

    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style="text-align: center;"><b><font color="#000000">Transportation & Handling of Specimens</font></b></p>
                
        			<div class="dash"></div>
            </div>
            
        </div>
    </div>
</div> -->
    <!-- /#wrapper -->
    <!-- jQuery -->
    </div>
    </section>    
</body>
</html>
<script >
	
	document.addEventListener('DOMContentLoaded', function () {
        var myChart = Highcharts.chart('hChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Audit Details  For Quarter 1 (January)'
            },
            xAxis: {
                categories: ['Yes', 'No', 'N/A']


            },
            yAxis: {
                title: {
                    text: 'Values'
                }
            },
            series: [{
                name: 'Yes',
                data: [1, 0, 0]
            },
            {
                name: 'No',
                data: [0, 10, 0]
            },
            {
                name: 'N/A',
                data: [0, 0, 8]
            }]
        });
    });
</script>
 <script>
   

  
    	$(document).on('click', '#myModel', function(){
		  var recipient = $(this).data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var uid = recipient;
          //alert(uid);
 
            $.ajax({
                method:"POST",
				url: "audit_hh/hic8Excel.php",
				data:{user_id:uid,tbl:'tbl_audit_hh8',ptbl:'ptbl'},
                cache: false,
                success: function (data) {
                	$('#exampleModal').modal('show');
                	$('.dash').html(data);
                    /*console.log(data);
                    modal.find*/
                },
                error: function(err) {
                    console.log(err);
                }
            });  
		});


		


 </script>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#list-date").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
				
		$(function(){  
			$("#list-date").datepicker();
			$("#dddd").datepicker();
			//$("#t_adm").timepicker();
			//$("#tddd").timepicker();
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
			$('#item_no').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			//$('#sr').load("blod_trans_sfty_chklst/load_blod_trans_sfty_chklst.php");
			$('#nm').text("New Receipt");
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
		
		
		$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			var item_no = $('#item_no').val();
			if(item_no != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"audit_hh/hh1.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);
							//window.location = window.location.href;
							$('#user_form')[0].reset();
							$('#adm').hide('fast');
							$('#bx1').hide('fast');
							$('#bx2').show('fast');
							$('#add_btn').show('fast');
							//$('#myModal').modal('hide');
							dataTable.ajax.reload();
						}
					});
				}
			}else{
				alert('Please enter Remarks');
				$('#item_no').focus();
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"audit_hh/update_audit.php",
				method:"POST",
				data:{user_id:user_id,tbl:'tbl_audit_hh8'},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#cb').show();
					$('#item_no').focus();
					$('#sr_no').val(data.mthId);
					$("#month").val(data.month);
					$("#quarter").val(data.quarter);
					$('#name').val(data.name);
					$('#sign').val(data.sign);
					var lp = data.data;
					for (i = 0; i < lp.length; i++) {
						console.log('#yn'+lp[i][0]+'_'+lp[i][1]);
						$('#yn'+lp[i][0]+'_Yes').attr('checked', false);
						$('#yn'+lp[i][0]+'_'+lp[i][1]).attr('checked', true);
						$('#cmt'+lp[i][0]).val(lp[i][2]);
						
					}
					$('#user_id').val(data.mthId);
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
					url:"audit_hh/delete_form.php",
					method:"POST",
					data:{user_id:user_id,tbl:'tbl_audit_hh8'},
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

	$(document).on('change', '#qut1', function(event){
		
			var qutVal = $(this).val();
			var yrVal = $('#yr1').val();

			$.ajax({
						url:"audit_hh/fetch_all_Audit.php",
						method:"POST",
						data:{qutVal: qutVal,yrVal:yrVal},
						dataType:"json",
						success:function(data)
						{
							//console.log(data.output);
							$('#tblRepalce').empty().append(data.output);

							var yesT = data.totalYes;
							var noT  = data.totalNo;
							var naT  = data.totalNa;


							var jsonData = $.ajax({
							url: 'audit_hh/chart.php',
							dataType:"json",
							method:"POST",
							async: false,
							data:{yesT:yesT,noT:noT,naT:naT,qutVal:qutVal},
							success: function(jsonData)
								{
									var options = 
									{
										title:'Audit Details',
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
					});

			
		});
	$(document).on('change', '#yr1', function(event){
		
			var qutVal = $('#qut1').val();
			var yrVal = $(this).val();

			$.ajax({
						url:"audit_hh/fetch_all_Audit.php",
						method:"POST",
						data:{qutVal: qutVal,yrVal:yrVal},
						dataType:"json",
						success:function(data)
						{
							//console.log(data.output);
							$('#tblRepalce').empty().append(data.output);

							var yesT = data.totalYes;
							var noT  = data.totalNo;
							var naT  = data.totalNa;


							var jsonData = $.ajax({
							url: 'audit_hh/chart.php',
							dataType:"json",
							method:"POST",
							async: false,
							data:{yesT:yesT,noT:noT,naT:naT,qutVal:qutVal},
							success: function(jsonData)
								{
									var options = 
									{
										title:'Audit Details',
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
					});

			
		});
	function NumAndTwoDecimals(e, field) {  
        var val = field.value;  
        var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;  
        var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g;  
        if (re.test(val)) {  

        }  
        else {  
			val = re1.exec(val);  
			if (val) {  
			field.value = val[0];  
			}  
			else {  
			field.value = "";  
			}  
        }  
    }
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
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#d_adm').mask('9999-99-99');// for Birth Date
		$('#dddd').mask('9999-99-99');// for Joining Date
		//$('#t_adm').mask('99:99');// for Birth Date
		//$('#tddd').mask('99:99');// for Joining Date
	});
</script>
<script type="text/javascript">	
		// Load the Visualization API and the piechart package.
		google.charts.load('current', {'packages':['corechart']});
		  
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(line_chart);
		
		function line_chart() 
		{
			var qut = $('#qut').val();
			var yrg = $('#yrg').val();
			var tbl = $('input[name="tbl"]').val();

			
			if(qut != '')
			{
				// chart one
				var jsonData = $.ajax({
				url: 'audit_hh/chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{qut:qut,tbl:tbl,yrg:yrg},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Audit Details',
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
								
			}	
		}	
</script>