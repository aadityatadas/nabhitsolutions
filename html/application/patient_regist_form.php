<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
	 include "patient_reg/headings.php";
	include('dbinfo.php');
	$dat = date('Y-m-d');
	$query1 = "SELECT * FROM tbl_patient_reg where date_of_reg = '$dat'";
	$statement1 = $connection->prepare($query1);
	$statement1->execute();
	$filtered_rows1 = $statement1->rowCount();
  
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
	$('#hosp').load('patient_reg/power_sfty_chklst_count.php').fadeIn("slow");
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
                           Patient Registration Form
							
                            	<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> New Registration</b></button>
                            	
                          
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<br>
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">

										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4"> Patient Name</label>
											<div class="col-lg-4">
												<input type="text" list="plist" name="p_name" id="p_name" class="form-control" required />
												<datalist id="plist">
												
												</datalist>
											</div>


										</div>

							<div class="col-lg-12">
											<label class="col-lg-4">UHID No</label>
											<div class="col-lg-4" id='uhid'>
												<input type="text" 
												name="uhid_no" id="uhid_no" class="form-control" readonly="true" />
											</div>
							</div>			

										<div class="col-lg-12" style="padding-bottom: 20px">
											<label class="col-lg-4"> Gender</label>
											<div class="col-lg-3">
												<input type="radio" name="gender" value="male"> Male

												<datalist id="plist">
												
												</datalist>
											</div>
 								<div class="col-lg-3">
  										<input type="radio" name="gender" value="female"> Female 
								</div>
								<div class="col-lg-2"></div>
											
							</div>


							<div class="col-lg-12">
											<label class="col-lg-4">Date of Birthday</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="dddd" id="dddd" placeholder="yyyy-mm-dd" class="form-control" required />
											</div>
										</div>
							
						<div class="col-lg-12">
											<label class="col-lg-4"> Mobile</label>
											<div class="col-lg-4">
												<input type="text" list="plist" name="mobile" id="mobile" class="form-control" required />
												<datalist id="plist">
												
												</datalist>
											</div>


						</div>

						<div class="col-lg-12" style="padding-bottom: 20px">
											<label class="col-lg-4"> Marital Status</label>
											<div class="col-lg-3">
												<input type="radio" name="marital" value="single"> Single

												<datalist id="plist">
												
												</datalist>
											</div>
 								<div class="col-lg-3">
  										<input type="radio" name="marital" value="married"> Married 
								</div>
								<div class="col-lg-3">
  										<input type="radio" name="marital" value="divorced"> Divorced 
								</div>
								<div class="col-lg-3">
  										<input type="radio" name="marital" value="widow"> Widow 
								</div>
								<div class="col-lg-2"></div>
											
							</div>

                       <div class="col-lg-12">
											<label class="col-lg-4"> Patient's Address
							 					</label>
											<div class="col-lg-8">
												<input type="text"  name="address" id="address" class="form-control" required placeholder="Address" />
												
											</div>


						 </div>

						 <div class="col-lg-12">
											<label class="col-lg-4"> 
							 					</label>
											<div class="col-lg-4">
												<input type="text"  name="city" id="city" class="form-control" required placeholder="City" />
												
											</div>

											<div class="col-lg-4">
												<input type="text"  name="satate" id="satate" class="form-control" required placeholder="State" />
												
											</div>


						 </div>

						  <div class="col-lg-12">
											<label class="col-lg-4"> 
							 					</label>
											<div class="col-lg-4">
												<input type="text"  name="zipcode" id="zipcode" class="form-control" required placeholder="Zipcode" />
												
											</div>

						<div class="col-lg-12">
											<label class="col-lg-4">Date of Registraion</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="date_of_reg" id="date_of_reg" placeholder="yyyy-mm-dd" class="form-control" required />
											</div>
										</div>					


						 </div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" 
												name="user_id" id="user_id" />
												<input type="hidden" 
												name="operation" id="operation" />
												<button accesskey="s" type="submit" name="action" 
												id="action" 
												class="btn btn-primary pull-right" /> <span class="ui-button-text">Register ( Alt + s )</span></button>
											</div>
											<div class="col-lg-6">	
												<button type="button" 

											class="btn btn-default pull-left" 
											id="close_btn">Close</button>
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
												<th>UHID No.</th>	
												<th>Name</th>
												<th>Date of Registarion</th>	
												<th>Gender</th>	
												<th>Marital Status</th>

												

												
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<!-- <div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
									<div class="panel-body">
										<div id="hosp">
					
										</div>
									</div>									
								</div> -->
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>
				<!-- <div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1">From</label>
							<div class="col-lg-4">
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
				</div> -->
				<!-- <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart1" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-12">
						<hr />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart2" style="height:400px;"></div>
					</div>
				</div> -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style= colspan=6 height="28" align="center" valign=middle><b><font size=6 color="#000000">Power Safety Cheklist</font></b></p>
            </div>
            <div style="padding-right: 10px;
                       margin-bottom: 30px;
                         margin-top: 30px;
                         padding-left: 10px;">
            <div class="dash">
             <!-- Content goes in here -->
            </div>
            </div>
        </div>
    </div>
</div>
    <!-- /#wrapper -->
    <!-- jQuery -->    
</body>
</html>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "patient_reg/editdata.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#date_of_reg").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
				
		$(function(){  
			$("#date_of_reg").datepicker();
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
			$('#sr').load("patient_reg/load_patient.php");
			$('#uhid').load("patient_reg/load_patient_uhid.php");
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
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"patient_reg/fetch_all_form.php",
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
			var item_no = $('#item_no').val();
			if(item_no != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"patient_reg/insert_patient_form.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);
							window.location = window.location.href;
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
				url:"patient_reg/fetch_single_patnt_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#cb').show();
					$('#item_no').focus();
					$('#sr_no').val(data.sr_no);
						
					 $('#p_name').val(data.p_name);
					 $('#date_of_reg').val(data.date_of_reg);
					 $('#dddd').val(data.dob);
					 $("[name=marital]").val([data.marital]);
					 $("[name=gender]").val([data.gender]);
					 $('#uhid_no').val(data.uhid_no);
					 
					 $('#mobile').val(data.mobile);
					 
					 $('#address').val(data.address);
					 $('#city').val(data.city);
					 $('#satate').val(data.satate);
					 $('#zipcode').val(data.zipcode);
					
					$('#user_id').val(data.sr_no);
					//$('#action').val("Update Details ( Alt + s )");
					$("#action span").text("Update Details ( Alt + s )");
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
					url:"patient_reg/delete_patnt_form.php",
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
			var frdate = $('#frdate').val();
			var todate = $('#todate').val();
			if(frdate != '' && todate != '')
			{
				// chart one
				var jsonData = $.ajax({
				url: 'pharmacy_register_chart-1.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Pharmacy Regisatration Details',
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
				url: 'pharmacy_register_chart-2.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Hospital Utilization-2',
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