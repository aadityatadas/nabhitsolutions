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

<script>
function myFunction() {
  window.print();
}

function goBack() {
  window.history.back();
}

</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="padding:7px;">
                           GRIEVANCE FORM &nbsp;
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: white;font-weight: bold;" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

						 
						 <button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New</b></button>
						 
							<!-- <button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button> -->
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-2" id="sr">
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the staff</label>
											<div class="col-lg-7">
												<input style="text-transform:uppercase;" type="text" name="mo1" id="mo1" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">ID(To be filled by HR representative) </label>
											<div class="col-lg-4">
												<input style="text-transform:uppercase;" type="text" name="mo2reg" id="mo2reg" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Employee Code</label>
											<div class="col-lg-4">
												<input style="text-transform:uppercase;" type="text" name="mo2" id="mo2" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">CONTACT NO:</label>
											<div class="col-lg-4">
												<input style="text-transform:uppercase;" type="text" name="conno" id="conno" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Designation</label>
											<div class="col-lg-6">
												<input style="text-transform:uppercase;" type="text" name="mo3" id="mo3" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Department</label>
											<div class="col-lg-6">
												<input style="text-transform:uppercase;" type="text" name="mo4" id="mo4" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Issues Related to </label>
											<div class="col-lg-3">
												<select style="text-transform:uppercase;" type="text" name="mo6_emp" id="mo6_emp" class="form-control" >
													<option value="">Select Issues</option>
													<option value="Transfers and Relocation">Transfers and Relocation</option>
													<option value="Allotment of Hostel">Allotment of Hostel</option>
													<option value="Role/ Responsibilities">Role/ Responsibilities</option>
													<option value="Others">Others</option>
												</select>
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-12"><b>Details</b></label>
											<label class="col-lg-1"></label>
											<label class="col-lg-3">Describe the Grievance:</label>
											<div class="col-lg-8">
												<textarea class="form-control" rows="5" name="describe" id="describe"></textarea>
											</div>

											<label class="col-lg-1"></label>
											<label class="col-lg-3">Factors contributing to the grievance:</label>
											<div class="col-lg-8">
												<textarea class="form-control" rows="5" name="factors" id="factors"></textarea>
											</div>

											<label class="col-lg-1"></label>
											<label class="col-lg-3">Your suggestion to resolve the issue:</label>
											<div class="col-lg-8">
												<textarea class="form-control" rows="5" name="suggestion" id="suggestion"></textarea>
											</div>
											
										</div>


										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-12"><b>Comments</b></label>
											<label class="col-lg-1"></label>
											<label class="col-lg-3">(Your Immediate Reporting Head) :</label>
											<div class="col-lg-8">
												<textarea class="form-control" rows="5" name="immediate" id="immediate"></textarea>
											</div>

											<label class="col-lg-1"></label>
											<label class="col-lg-3">(Level – 1) (Your Next Reporting Head) :</label>
											<div class="col-lg-8">
												<textarea class="form-control" rows="5" name="next" id="next"></textarea>
											</div>

											
											
										</div>


										<div class="col-lg-6">
											<label class="col-lg-12"><b>Signature of the Unit HR Head</b></label>
											<label class="col-lg-4">Name</label>
											<div class="col-lg-8">
												<input style="text-transform:uppercase;" type="text" name="hrname" id="hrname" class="form-control" />
											</div>
											<label class="col-lg-4">Sign</label>
											<div class="col-lg-8">
												<input style="text-transform:uppercase;" type="text" name="hrsign" id="hrsign" class="form-control" />
											</div>
											<label class="col-lg-6">Date</label><label class="col-lg-6">Time</label>
											<div class="col-lg-6">
												<input style="text-transform:uppercase;" type="date" name="hrdate" id="hrdate" class="form-control" />
											</div>
											<div class="col-lg-6">
												<input style="text-transform:uppercase;" type="time" name="hrtime" id="hrtime" class="form-control" />
											</div>
										</div>

										<div class="col-lg-6">
											<label class="col-lg-12"><b>Signature of the MD</b></label>
											<label class="col-lg-4">Name</label>
											<div class="col-lg-8">
												<input style="text-transform:uppercase;" type="text" name="mdname" id="mdname" class="form-control" />
											</div>
											<label class="col-lg-4">Sign</label>
											<div class="col-lg-8">
												<input style="text-transform:uppercase;" type="text" name="mdsign" id="mdsign" class="form-control" />
											</div>
											<label class="col-lg-6">Date</label><label class="col-lg-6">Time</label>
											<div class="col-lg-6">
												<input style="text-transform:uppercase;" type="date" name="mddate" id="mddate" class="form-control" />
											</div>
											<div class="col-lg-6">
												<input style="text-transform:uppercase;" type="time" name="mdtime" id="mdtime" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
											<div class="col-lg-12">
												<div class="col-lg-6">	
													<input type="hidden" name="user_id" id="user_id" />
													<input type="hidden" name="operation" id="operation" />
													<button style="color:white;font-weight: bold;" accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" />Submit ( Alt + s )</button>
												</div>
												<div class="col-lg-6">	
													<button type="button" class="btn btn-default pull-left" id="close_btn">Close</button>
												</div>
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
												<th>Name of the staff</th>
												<th>ID</th>
												<th>Employee Code</th>
												<th>Contact</th>
												<th>Designation</th>
												<th>Department</th>
												<th>Issue</th>
												<th>HR Head</th>
												<th>MD</th>
											</tr>
										</thead>
									</table>
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
								<input style="border: 1px solid black;" type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1">To</label>
							<div class="col-lg-2">
								<input style="border: 1px solid black;" type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button style="color:white;font-weight:bold;" type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				
				<form method="post" action="../excel/HR/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading" style="color: black;">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										 <input style="color:white;font-weight:bold;" type="submit" name="export" class="btn btn-danger" value="Excel" />
    
									</div>
			   </form>
			  
            </div>
             <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_mast1" style="height:400px;"></div>
					</div>
				</div>
        </div>        
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
			$('#sr').load("load_grformno.php");
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		/*
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		*/
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_grievance_from.php",
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
					url:"insert_grievance_from.php",
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
				url:"fetch_single_grievance_form.php",
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
					$('#mo2reg').val(data.mo2reg);
					$('#mo2').val(data.mo2);
					$('#conno').val(data.conno);
					$('#mo4').val(data.mo4);
					$('#mo3').val(data.mo3);
					$('#mo6_emp').val(data.mo6_emp).change();
					//$('#mo6_emp option[value="'+data.mo6_emp+'"]').attr("selected", "selected");
					$('textarea#describe').val(data.describe);
					$('textarea#factors').val(data.factors);
					$('textarea#suggestion').val(data.suggestion);
					$('textarea#immediate').val(data.immediate);
					$('textarea#next').val(data.next);
					$('#hrname').val(data.hrname);
					$('#hrsign').val(data.hrsign);
					$('#hrdate').val(data.hrdate);
					$('#hrtime').val(data.hrtime	);
					$('#mdname').val(data.mdname);
					$('#mdsign').val(data.mdsign);
					$('#mddate').val(data.mddate);
					$('#mdtime').val(data.mdtime);
					

					

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
					url:"delete_grievance_form.php",
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
			// Chart Six
				var jsonData = $.ajax({
				url: 'hr_mast_chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				//data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'HR Master',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.3
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_mast'));
						 chart.draw(data, options);
						
					}	
			}).responseText;
		}	
</script>