<?php
	error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include "header.php";
	include "footer.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');	
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#vent').load('icu_register_ipd_count.php').fadeIn("slow");
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
<body>
	<?php include"nav-bar-icu-officer.php";?>
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
                            ICU Register Form

                             <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

						</div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">	
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-3">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
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
										
										<div id="record1" style="border:thin">
											<div class="col-lg-12">

												<hr />
												<label class="col-lg-2" style=" background-color: #d0dce9;">
													<u> Record 1</u></label>
											</div>
										
										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time Of Admission In ICU</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="date_of_admison_in_icu" id="date_of_admison_in_icu" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="time_of_admison_in_icu" id="time_of_admison_in_icu" placeholder="hh:mm" class="form-control" />
											</div>
										</div>


										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Discharge/Transfer In ICU</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="date_of_disc_trans_in_icu" id="date_of_disc_trans_in_icu" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="time_of_disc_trans_in_icu" id="time_of_disc_trans_in_icu" placeholder="hh:mm" class="form-control" />
											</div>
										</div>


										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Return TO ICU</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="date_of_return_in_icu" id="date_of_return_in_icu" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="time_of_return_in_icu" id="time_of_return_in_icu" placeholder="hh:mm" class="form-control" />
											</div>
										</div>


										
									
										<div class="col-lg-12">
											<label class="col-lg-4">Return To ICU WithIn 48 Hrs</label>
											<div class="col-lg-2">	
												<select type="text" name="retrn_to_icu_in_48hrs" id="retrn_to_icu_in_48hrs" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<!-- <div class="col-lg-6" id="symp">	
												
												<input type="text" autocomplete="off" name="ReasoneForReportingError" id="ReasoneForReportingError" placeholder="Reasone For Reporting Error" class="form-control" />
											
											</div> -->
										</div>


										<div class="col-lg-12">
											<label class="col-lg-4">
											ReAdmission 
										</label>
											<div class="col-lg-2">	
												<select type="text" name="re_admission" id="re_admission" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-6" >	
												
												<input type="text" autocomplete="off" name="re_admission_reson" id="re_admission_reson" placeholder="Reasone For ReAdmission" class="form-control" />
											
											</div>
										</div>


										<div class="col-lg-12">
											<label class="col-lg-4">
											Reintubation 
										</label>
											<div class="col-lg-2">	
												<select type="text" name="re_intubation" id="re_intubation" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-6" >	
												
												<input type="text" autocomplete="off" name="re_intubation_reson" id="re_intubation_reson" placeholder="Reasone For Reintubation" class="form-control" />
											
											</div>
										</div>

										
										
										
										
										
										<div class="col-lg-12">
											<label class="col-lg-4">Name of ICU Incharge</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="sign" id="sign" placeholder="name of Icu incharge" class="form-control" />
											</div>
										</div>
										</div>
										<div id="Old_Data" ></div>
											<div class="col-lg-12">
												<div class="col-lg-10"></div>
												<div class="col-lg-2" id="addButton">
												 <button type="button" name="add" id="add" class="btn btn-info">Add New Record</button>
												</div>
											</div>
											<div id="newDatatoSave" ></div>							
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />

		<input type="hidden" name="action_to_perform" value="<?php echo $output["action_to_perform"]?>">
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
												<!-- <th>lab ipd id.</th> -->
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>IPD No</th>

												<th>Date Of Admission In ICU</th>

											  <th> Time Of Admission In ICU</th>

											  <th>Date of Discharge/Transfer In ICU</th>
											   <th> Time of Discharge/Transfer In ICU</th>


											  <th>Date of Return TO ICU</th>
											  <th> Time of Return TO ICU</th>

											  <th>Return To ICU WithIn 48 Hrs</th>

											  <th>ReAdmission</th>

											  <th>ReIntubation</th>

											  <th>Name of ICU Incharge</th>


											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									
									<form method="post" action="../excel/ICU/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-3">	
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
								<div class="col-lg-1">
										<input type="text" name="frdt" id="frdt" value="<?php echo $frdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-1">
									<input type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input type="submit" name="export" class="btn btn-danger" value="Excel" />
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="vent">
											
										</div>
									</div>
								</div>
								<!-- /.panel -->
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
						<div id="line_chart3" style="height:400px;"></div>
					</div>
					<div class="col-sm-12">
						<div id="line_chart4" style="height:400px;"></div>
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
		$("#date_of_admison_in_icu").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});


		$("#date_of_return_in_icu").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#date_of_disc_trans_in_icu").datepicker({
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

				// 
			$("#date_of_admison_in_icu").datepicker();
			$("#date_of_disc_trans_in_icu").datepicker();
			$("#date_of_return_in_icu").datepicker();
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
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_cult', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_cult2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#adm').hide();
			$('#newDatatoSave div').empty();
			$('#Old_Data div').empty();
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_all_icu_register_ipd_form.php",
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
			if(confirm("Are you sure you want to submit this?"))
			{
					$.ajax({
						url:"insert_icu_register_ipd_form.php",
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
							dataTable.ajax.reload();
							$('#newDatatoSave div').empty();
							$('#Old_Data div').empty();
						}
					});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$('#newDatatoSave div').empty();
							$('#Old_Data div').empty();
			$.ajax({
				url:"fetch_single_icu_register_ipd_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{  
					console.log(data);
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					$('#uhid_no').val(data.uhid_no);
					$('#ipd_no').val(data.ipd_no);
					
					

					/*$('#tddd').val(data.tddd);
					$('#mlc').val(data.mlc);*/
					$('#tbl_icu_register_ipd').val(data.tbl_icu_register_ipd);
					$('#icu_register_ipd_id').val(data.icu_register_ipd_id);
					$('#tbl_huf_id').val(data.tbl_huf_id);
					$('#date_of_admison_in_icu').val(data.date_of_admison_in_icu);
					$('#time_of_admison_in_icu').val(data.time_of_admison_in_icu);
					$('#date_of_disc_trans_in_icu').val(data.date_of_disc_trans_in_icu);
					$('#time_of_disc_trans_in_icu').val(data.time_of_disc_trans_in_icu);
					$('#date_of_return_in_icu').val(data.date_of_return_in_icu);
					$('#time_of_return_in_icu').val(data.time_of_return_in_icu);
					$('#retrn_to_icu_in_48hrs').val(data.retrn_to_icu_in_48hrs);
					$('#re_admission').val(data.re_admission);

					
					$('#re_intubation').val(data.re_intubation);
					$('#re_admission_reson').val(data.re_admission_reson);

					
					$('#re_intubation_reson').val(data.re_intubation_reson);
					$('#sign').val(data.sign);
            		//alert(data.ipdid);
					if(data.oldDataCount>0){
						var j=1;
						for(var i=0; i < data.oldDataCount; i++){
							var html ='<div id="row'+i+'"  ><div class="col-lg-12"><hr /><label class="col-lg-2" style="background-color: #d0dce9;"><u> Record '+(++j)+'</u></label></div>';

							html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time Of Admission In ICU</label><div class="col-lg-2"><input type="text" autocomplete="off" value="'+data.one[i]+'" name="date_of_admison_in_icu_old[]" id="date_of_admison_in_icu_old'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required readonly/></div><div class="col-lg-2"><input type="time" name="time_of_admison_in_icu_old[]" id="time_of_admison_in_icu_old'+i+'" value="'+data.two[i]+'" placeholder="hh:mm" class="form-control" required readonly /></div></div>' ;

							html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Discharge/Transfer In ICU</label><div class="col-lg-2"><input type="text" autocomplete="off" value="'+data.three[i]+'" name="date_of_disc_trans_in_icu_old[]" id="date_of_disc_trans_in_icu_old'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required readonly/></div><div class="col-lg-2"><input type="time" name="time_of_disc_trans_in_icu_old[]" id="time_of_disc_trans_in_icu_old'+i+'" value="'+data.four[i]+'" placeholder="hh:mm" class="form-control" required readonly /></div></div>' ;

							html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Return TO ICU</label><div class="col-lg-2"><input type="text" autocomplete="off" value="'+data.five[i]+'" name="date_of_return_in_icu_old[]" id="date_of_return_in_icu_old'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required readonly/></div><div class="col-lg-2"><input type="time" name="time_of_return_in_icu_old[]" id="time_of_return_in_icu_old'+i+'" value="'+data.six[i]+'" placeholder="hh:mm" class="form-control" required readonly /></div></div>' ;

							html += '<div class="col-lg-12"><label class="col-lg-4">Return To ICU WithIn 48 Hrs</label><div class="col-lg-2"><select type="text" name="retrn_to_icu_in_48hrs_old[]" id="retrn_to_icu_in_48hrs_old'+i+'" class="form-control" disabled><option value=""'+data.seven[i]+'"">'+data.seven[i]+'</option></select></div></div>';

							html += '<div class="col-lg-12"><label class="col-lg-4">ReAdmission</label><div class="col-lg-2"><select type="text" name="re_admission_old[]" id="re_admission_old'+i+'" class="form-control" disabled><option value="'+data.eight[i]+'">'+data.eight[i]+'</option></select></div><div class="col-lg-6" ><input type="text" autocomplete="off" name="re_admission_reson_old[]" id="re_admission_reson_old'+i+'" placeholder="Reasone For ReAdmission" class="form-control" value="'+data.eightone[i]+'" disabled/></div></div>';




							html += '<div class="col-lg-12"><label class="col-lg-4">Reintubation</label><div class="col-lg-2"><select type="text" name="re_intubation_old[]" id="re_intubation_old'+i+'" class="form-control" disabled><option value="'+data.nine[i]+'">'+data.nine[i]+'</option></select></div><div class="col-lg-6" ><input type="text" autocomplete="off" name="re_intubation_reson_old[]" id="re_intubation_reson_old'+i+'" placeholder="Reasone For Reintubation" class="form-control" value="'+data.nineone[i]+'" disabled/ ></div></div>';

							html +='<div class="col-lg-12"><label class="col-lg-4">Name of ICU Incharge</label><div class="col-lg-6"><input type="text" autocomplete="off" name="sign_old" id="sign_old'+i+'" placeholder="name of ICU incharge..." value="'+data.ten[i]+'" class="form-control" readonly/></div>';

							html +='<div class="col-lg-2"><button type="button" name="edit" id="'+data.icu_ipd2_id[i]+'"  class="btn btn-primary edit_data">Edit Record No. '+j+'</button></div></div>';

							html +='</div>';
							$('#Old_Data').append(html);
						}
					}

					$('#newDatatoSave div').empty();
							

					$('#user_id').val(data.sr_no);
					$('#action').val("Update Details ( Alt + s )");
					$('#operation').val(data.action_to_perform);					
					$("#action").attr("disabled", false);

			
				}
			})
		});
	});
</script>
<script type="text/javascript">
	jQuery(function($) {

		$.mask.definitions['~']='[+-]'; 
		$('#date_of_admison_in_icu').mask('9999-99-99');// for Date
		$('#date').mask('9999-99-99');// for Date
		//$('#t_adm1').mask('99:99');// for Time
		//$('#ddd1').mask('99:99');// for Time
		$('#date_of_disc_trans_in_icu').mask('9999-99-99');// for Date
		$('#frdate').mask('9999-99-99');// for Date
		$('#date_of_return_in_icu').mask('9999-99-99');// for Date
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
					url: 'icu_register_ipd_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'ICU Registration for IPD ',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart3'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
					// for 4
					var jsonData = $.ajax({
					url: 'icu_register_ipd_chart2.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'ICU Return Details ',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart4'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
			}	
		}	
</script>

<script type="text/javascript">
	$(document).ready(function(){  
      var divcount=1;  
      $('#add').click(function(){ 
     var divss=0;
       $("#newDatatoSave div").each(function(){
               divss++;
         });
     if(divss>0){alert("Please fill data In Present Record Feilds"); return false;}  
           divcount++; 
          var html = '<div id="row'+divcount+'"><div class="col-lg-12"><hr /></div><div class="col-lg-12"><label class="col-lg-4">Date & Time Of Admission In ICU</label><div class="col-lg-2"><input type="text" autocomplete="off" name="date_of_admison_in_icu_new[]" id="date_of_admison_in_icu_new'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required/></div><div class="col-lg-2"><input type="time" name="time_of_admison_in_icu_new[]" id="time_of_admison_in_icu_new'+divcount+'" placeholder="hh:mm" class="form-control" required /></div></div>' ;
            

          html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Discharge/Transfer In ICU</label><div class="col-lg-2"><input type="text" autocomplete="off" name="date_of_disc_trans_in_icu_new[]" id="date_of_disc_trans_in_icu_new'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required/></div><div class="col-lg-2"><input type="time" name="time_of_disc_trans_in_icu_new[]" id="time_of_disc_trans_in_icu_new'+divcount+'" placeholder="hh:mm" class="form-control" required /></div></div>' ;

            html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Return TO ICU</label><div class="col-lg-2"><input type="text" autocomplete="off" name="date_of_return_in_icu_new[]" id="date_of_return_in_icu_new'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required/></div><div class="col-lg-2"><input type="time" name="time_of_return_in_icu_new[]" id="time_of_return_in_icu_new'+divcount+'" placeholder="hh:mm" class="form-control" required /></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Return To ICU WithIn 48 Hrs</label><div class="col-lg-2"><select type="text" name="retrn_to_icu_in_48hrs_new[]" id="retrn_to_icu_in_48hrs_new'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">ReAdmission</label><div class="col-lg-2"><select type="text" name="re_admission_new[]" id="re_admission_new'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-6" >	<input type="text" autocomplete="off" name="re_admission_reson_new[]" id="re_admission_reson_new'+divcount+'" placeholder="Reasone For ReAdmission" class="form-control" /></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Reintubation</label><div class="col-lg-2"><select type="text" name="re_intubation_new[]" id="re_intubation_new'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-6" >	<input type="text" autocomplete="off" name="re_intubation_reson_new[]" id="re_intubation_reson_new'+divcount+'" placeholder="Reasone For Reintubation" class="form-control" /></div></div>';


         html +='<div class="col-lg-12"><label class="col-lg-4">Name of ICU Incharge</label><div class="col-lg-6"><input type="text" autocomplete="off" name="sign_new[]" id="sign_new'+divcount+'" placeholder="name of ICU Incharge" class="form-control" required/></div>';

          html +='<div class="col-lg-2"><button type="button" name="remove" id="'+divcount+'" class="btn btn-danger btn_remove ">Delete</button></div></div>';
          html +='</div>';
           $('#newDatatoSave').append(html);
            setDatePicker();  
      }); 
     }); 


	$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 

   function  setDatePicker(){
    	$(".dateDisplay").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
    }

	
</script>

<style type="text/css" media="screen">
.modal.custom .modal-dialog {
    max-width: 100%;
} 

</style>

<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title panel panel-primary"> <div class="panel-heading" style="padding:7px;">ICU Register Form</div></h4>  
                </div>

                <div class="modal-body">  
                     <form method="post" id="insert_form_edit">
                      
                     <div class="col-lg-12">
            
                   <label class="col-lg-12">Date & Time Of Admission In ICU</label>
                   </div> 
                   <div class="col-lg-12">
                      <div class="col-lg-6">
                        <input type="date" autocomplete="off" 
                              name="date_of_admison_in_icu_Edit" id="date_of_admison_in_icu_Edit" placeholder="yyyy-mm-dd" class="form-control" />
                      </div>
                      <div class="col-lg-6">
                        <input type="time" name="time_of_admison_in_icu_Edit" id="time_of_admison_in_icu_Edit" placeholder="hh:mm" class="form-control" />              
                      </div>
                    </div>
                    <br/>

                    <div class="col-lg-12">
            
                   <label class="col-lg-12">Date & Time of Discharge/Transfer In ICU</label>
                   </div> 
                   <div class="col-lg-12">
                      <div class="col-lg-6">
                        <input type="date" autocomplete="off" 
                              name="date_of_disc_trans_in_icu_Edit" id="date_of_disc_trans_in_icu_Edit" placeholder="yyyy-mm-dd" class="form-control" />
                      </div>
                      <div class="col-lg-6">
                        <input type="time" name="time_of_disc_trans_in_icu_Edit" id="time_of_disc_trans_in_icu_Edit" placeholder="hh:mm" class="form-control" />              
                      </div>
                    </div>
                    <br/>

                    <div class="col-lg-12">
            
                   <label class="col-lg-12">Date & Time of Return TO ICU</label>
                   </div> 
                   <div class="col-lg-12">
                      <div class="col-lg-6">
                        <input type="date" autocomplete="off" 
                              name="date_of_return_in_icu_Edit" id="date_of_return_in_icu_Edit" placeholder="yyyy-mm-dd" class="form-control" />
                      </div>
                      <div class="col-lg-6">
                        <input type="time" name="time_of_return_in_icu_Edit" id="time_of_return_in_icu_Edit" placeholder="hh:mm" class="form-control" />              
                      </div>
                    </div>
                    <br/>

                    <div class="col-lg-12">
                      <label class="col-lg-12">Return To ICU WithIn 48 Hrs</label>
                      <div class="col-lg-6">
                        <select type="text" name="retrn_to_icu_in_48hrs_Edit" id="retrn_to_icu_in_48hrs_Edit" onChange="LoadData();" class="form-control" />
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                      </div>
                    </div>
                    <br/>

                    <div class="col-lg-12">
                      <label class="col-lg-12">ReAdmission</label>
                      <div class="col-lg-6">
                        <select type="text" name="re_admission_Edit" id="re_admission_Edit" onChange="LoadData();" class="form-control" />
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                      </div>
						<div class="col-lg-6" >	
												
												<input type="text" autocomplete="off" name="re_admission_reson_Edit" id="re_admission_reson_Edit" placeholder="Reasone For ReAdmission" class="form-control" />
											
											</div>
                    </div>
                    <br/>

                    <div class="col-lg-12">
                      <label class="col-lg-12">Reintubation</label>
                      <div class="col-lg-6">
                        <select type="text" name="re_intubation_Edit" id="re_intubation_Edit" onChange="LoadData();" class="form-control" />
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                      </div>
                      <div class="col-lg-6" >	
												
												<input type="text" autocomplete="off" name="re_intubation_reson_Edit" id="re_intubation_reson_Edit" placeholder="Reasone For Reintubation" class="form-control" />
											
											</div>
                    </div>
                    <br/>
             
                    <div class="col-lg-12">
                      <label class="col-lg-12">Name of ICU Incharge</label>
                      <div class="col-lg-12">
                        <input type="text" autocomplete="off" name="sign_Edit" id="sign_Edit" placeholder="name of ICU incharge..." class="form-control" />
                      </div>
                    </div>
                    <br/>
                    <div class="col-lg-12">
                      <hr />
                    </div>
                    <input type="hidden" name="userEdit" id="userEdit" />
                    <input type="hidden" name="icu_register_ipd_id" id="icu_register_ipd_id" />
                    <input type="hidden" name="actionEdit" id="actionEdit" value="update" />  
                    <input type="submit" name="insert" id="insertEdit" value="Insert" class="btn btn-success" />
                  </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

 

 <script type="text/javascript">

  
  $(document).on('click', '.edit_data', function(){ 

            var icu_register_ipd_id = $(this).attr("id");
            var action = "view"; 
            //alert(icu_ipd2_id);
           $.ajax({  
                url:"icu_register_ipd_form_edit.php",  
                method:"POST",  
                data:{icu_register_ipd_id:icu_register_ipd_id,action:action},  
                dataType:"json",  
                success:function(data){ 
                	console.log(data);
                  $('#date_of_admison_in_icu_Edit').val(data.date_of_admison_in_icu);
                  $('#time_of_admison_in_icu_Edit').val(data.time_of_admison_in_icu);
                  $('#date_of_disc_trans_in_icu_Edit').val(data.date_of_disc_trans_in_icu);
                  $('#time_of_disc_trans_in_icu_Edit').val(data.time_of_disc_trans_in_icu);
                  $('#date_of_return_in_icu_Edit').val(data.date_of_return_in_icu);
                  $('#time_of_return_in_icu_Edit').val(data.time_of_return_in_icu);
                  $('#retrn_to_icu_in_48hrs_Edit').val(data.retrn_to_icu_in_48hrs);
                  $('#re_admission_Edit').val(data.re_admission);
                  $('#re_intubation_Edit').val(data.re_intubation); 
                   $('#re_admission_reson_Edit').val(data.re_admission_reson);
                  $('#re_intubation_reson_Edit').val(data.re_intubation_reson); 
                  $('#sign_Edit').val(data.sign); 
                  $('#icu_register_ipd_id').val(data.icu_ipd2_id);
                  $('#insertEdit').val("Update");  
                  $('#add_data_Modal').modal('show'); 
                }, 
                error: function(xhr, status, error,data) {
				      console.log(error,data);
				   }
           }); 
            $('#add_data_Modal').modal('show');
              
      }); 


  $('#insert_form_edit').on("submit", function(event){  
           event.preventDefault();  
           var action = "update";
                $.ajax({  
                     url:"icu_register_ipd_form_edit.php",  
                     method:"POST",  
                     data:$('#insert_form_edit').serialize(),  
                     beforeSend:function(){  
                          $('#insertEdit').val("Inserting");  
                     },  
                     success:function(data){ 
                          alert(data); 
                           location.reload();
                          $('#insert_form_edit')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                           
                         
                     }  
                });  
            
      });  
 </script>