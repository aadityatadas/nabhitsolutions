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
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#cre').load('cre_count.php').fadeIn("slow");
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
	<?php include"nav-bar-mat.php";?>
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
                            Care Related Events

                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

						</div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<br>
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

				<hr />
				<label class="col-lg-2" style=" background-color: #d0dce9;">
					<u> Record 1</u></label>
			</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Peripheral Line insertion</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo1" id="mo1" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Time of Insertion</label>
											<div class="col-lg-2">
												<input type="time" name="mo2" id="mo2" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">VIP Score</label>
											<div class="col-lg-5">	
												<input type="text" name="mo3" id="mo3" class="form-control" />
											</div>
										</div> -->

               <div class="col-lg-12" style=" padding-bottom: 20px">
											<label class="col-lg-4">VIP Score (0 - 5)</label>
									<div class="col-lg-5">	
											<select class=" form-control " name="mo3" id="mo3" >
      	<option value="">--Select--(0 to 5)</option>
      	<?php for($i=0; $i<=5 ; $i++){?>
       <option value="<?=$i?>"><?=$i?></option>
        <?php }?>
    </select>
</div>
  <br/>
</div>
 



										<div class="col-lg-12">
											<label class="col-lg-4">Signs and Symptoms of Hematoma</label>
											<div class="col-lg-2">	
												<select type="text" name="mo4" id="mo4" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo5" id="mo5" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Signs and symptoms of Thromboplebitis</label>
											<div class="col-lg-2">	
												<select type="text" name="mo6" id="mo6" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo7" id="mo7" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Braden Score</label>
											<div class="col-lg-6">
												<input type="text" name="mo8" id="mo8" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Signs and Symptoms of Bed Scores</label>
											<div class="col-lg-2">	
												<select type="text" name="mo9" id="mo9" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo10" id="mo10" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">Morse Score</label>
											<div class="col-lg-4">
												<input type="text" name="mo11" id="mo11" class="form-control" />
											</div>
										</div> -->
										<div class="col-lg-12" style=" padding-bottom: 20px">
											<label class="col-lg-4">Morse Score (0 - 50)</label>
									<div class="col-lg-5">	
											<select class=" form-control "  name="mo11" id="mo11" >
      	<option value="">--Select--(0 to 50)</option>
      	<?php for($i=0; $i<=50 ; $i++){?>
       <option value="<?=$i?>"><?=$i?></option>
        <?php }?>
    </select>
</div>
  <br/>
</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Incidence of Patient Fall</label>
											<div class="col-lg-2">	
												<select type="text" name="mo12" id="mo12" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo13" id="mo13" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Incidence of Accidental Removal of Drains and lines</label>
											<div class="col-lg-2">	
												<select type="text" name="mo14" id="mo14" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo15" id="mo15" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Injury To Patient</label>
											<div class="col-lg-2">	
												<select type="text" name="mo16" id="mo16" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="mo17" id="mo17" placeholder="Enter Corrective Action" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
			
			

		<div id="Old_Data" >

			
											
		</div>

	<div class="col-lg-12">
			<div class="col-lg-10"></div>												
	<div class="col-lg-2" id="addButton">			
		     <button type="button" name="add" id="add" class="btn btn-info">
		      Add New Record</button>
	        </div>
     </div>

     <div id="newDatatoSave" >

			
											
		</div>

		
			<br>
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
												<th>Sr No</th>
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>IPD No</th>
												<th>Date of Peripheral Line insertion</th>
												<th>Time of Insertion</th>
												<th>VIP Score</th>
												<th>Signs and Symptoms of Hematoma</th>
												<th>Signs and symptoms of Thromboplebitis</th>
												<th>Braden Score</th>
												<th>Signs and Symptoms of Bed Scores</th>
												<th>Morse Score</th>
												<th>Incidence of Patient Fall</th>
												<th>Incidence of Accidental Removal of Drains and lines</th>
												<th>InjurytTo Patient </th>					
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									
									<form method="post" action="../excel/CRE/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-4">	
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
								<div class="col-lg-2">
										<input type="text" name="frdt" id="frdt" value="<?php echo $frdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-2">
									<input type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input type="submit" name="export" class="btn btn-danger" value="Excel" />
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div class="col-lg-12" id="cre">
					
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
						<div id="line_chart_care" style="height:400px;"></div>
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
		$("#mo1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});		
		$(function(){  
			$("#frdate").datepicker();
			$("#todate").datepicker();
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
			$("#mo1").datepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
			$("#todt").datepicker();
			$("#frdt").datepicker();
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
			$('#newDatatoSave div').empty();
			$('#Old_Data div').empty();
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_care_event_form.php",
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
					url:"insert_care_event_form.php",
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
						$('#newDatatoSave div').empty();
							$('#Old_Data div').empty();
					}
				});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_care_event_form.php",
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
					if(($('#mo1').val())==""){

                         $('#addButton').hide();
					}else{
						 $('#addButton').show();
					}
					if(data.oldDataCount>0){
          	var j=1;
          	
          	for(var i=0; i < data.oldDataCount; i++){

          var html ='<div id="row'+i+'"  ><div class="col-lg-12"><label class="col-lg-2" style="background-color: #d0dce9;"><u> Record '+(++j)+'</u></label></div>';

         html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Peripheral Line insertion</label><div class="col-lg-2">	<input type="text" autocomplete="off" name="mo1old[]" id="mo1old'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" value="'+data.mo1_old[i]+'" readonly /></div><div class="col-lg-2"><input type="time" name="mo2old[]" id="mo2old'+i+'" placeholder="hh:mm" class="form-control" value="'+data.mo2_old[i]+'" readonly /></div></div>';

         html += '<div class="col-lg-12"><label class="col-lg-4">VIP Score</label><div class="col-lg-6"><input type="text" name="mo3old[]" id="mo3old'+i+'" class="form-control" placeholder="VIP Score" value="'+data.mo3_old[i]+'" readonly= /></div></div>';

           

          html += '<div class="col-lg-12"><label class="col-lg-4">Signs and Symptoms of Hematoma</label><div class="col-lg-2"><select type="text" name="mo4old[]" id="mo4old'+i+'" class="form-control" value="'+data.mo4_old[i]+'" disabled><option value="'+data.mo4_old[i]+'">'+data.mo4_old[i]+'</option></select></div><div class="col-lg-6"><input type="text" name="mo5old[]" id="mo5old'+i+'" placeholder="Enter Corrective Action" class="form-control" value="'+data.mo5_old[i]+'" readonly /></div></div>'


html += '<div class="col-lg-12"><label class="col-lg-4">Signs and symptoms of Thromboplebitis</label><div class="col-lg-2"><select type="text" name="mo6old[]" id="mo6old'+i+'" class="form-control" disabled ><option value="'+data.mo6_old[i]+'">'+data.mo6_old[i]+'</option></select></div><div class="col-lg-6"><input type="text" name="mo7old[]" id="mo7old'+i+'" placeholder="Enter Corrective Action" class="form-control" value="'+data.mo7_old[i]+'" readonly/></div></div>'


html += '<div class="col-lg-12"><label class="col-lg-4">Braden Score</label><div class="col-lg-6"><input type="text" name="mo8old[]" id="mo8old'+i+'" class="form-control" value="'+data.mo8_old[i]+'" readonly/></div></div>'

html += '<div class="col-lg-12"><label class="col-lg-4">Signs and Symptoms of Bed Scores</label><div class="col-lg-2"><select type="text" name="mo9old[]" id="mo9old'+i+'" class="form-control" value="'+data.mo9_old[i]+'" disabled><option value="'+data.mo9_old[i]+'">'+data.mo9_old[i]+'</option></select></div><div class="col-lg-6"><input type="text" name="mo10old[]" id="mo10old'+i+'" placeholder="Enter Corrective Action" class="form-control" value="'+data.mo10_old[i]+'" readonly /></div></div>'

html += '<div class="col-lg-12"><label class="col-lg-4">Morse Score</label><div class="col-lg-4"><input type="text" name="mo11old[]" id="mo11old'+i+'" class="form-control" value="'+data.mo11_old[i]+'" readonly/></div></div>'

html += '<div class="col-lg-12"><label class="col-lg-4">Incidence of Patient Fall</label><div class="col-lg-2"><select type="text" name="mo12old[]" id="mo12old'+i+'" class="form-control" value="'+data.mo12_old[i]+'" disabled><option value="'+data.mo12_old[i]+'">'+data.mo12_old[i]+'</option></select></div><div class="col-lg-6"><input type="text" name="mo13old[]" id="mo13old'+i+'" placeholder="Enter Corrective Action" class="form-control" value="'+data.mo13_old[i]+'" readonly /></div></div>'

html += '<div class="col-lg-12"><label class="col-lg-4">Incidence of Accidental Removal of Drains and lines</label><div class="col-lg-2"><select type="text" name="mo14old[]" id="mo14old'+i+'" class="form-control" disabled><option value="'+data.mo14_old[i]+'" disable>'+data.mo14_old[i]+'</option></select></div><div class="col-lg-6"><input type="text" name="mo15old[]" id="mo15old'+i+'" placeholder="Enter Corrective Action" class="form-control" value="'+data.mo15_old[i]+'" readonly /></div></div>'

html += '<div class="col-lg-12"><label class="col-lg-4">Injury To Patient</label><div class="col-lg-2"><select type="text" name="mo16old[]" id="mo16old'+i+'" class="form-control" disabled><option value="'+data.mo16_old[i]+'">'+data.mo16_old[i]+'</option></select></div><div class="col-lg-6"><input type="text" name="mo17old[]" id="mo17old'+i+'" placeholder="Enter Corrective Action"class="form-control" value="'+data.mo17_old[i]+'" readonly/></div></div>';

         
  
          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button type="button" name="edit" id="'+data.care_extra_id[i]+'"  class="btn btn-primary edit_data">Edit Record No. '+j+'</button></div></div>';
          html +='<div class="col-lg-12"><hr /></div></div>';
         
          $('#Old_Data').append(html);
          }
      }
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
		$('#mo1').mask('9999-99-99');// for Date
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
				// Chart Six
					var jsonData = $.ajax({
					url: 'care_evt_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Care Related Events',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_care'));
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
     if(divss>0){ alert("Please fil data In Present Record Feilds"); return false;}  
           divcount++; 
         var html = '<div id="row'+divcount+'"  >'
         html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Peripheral Line insertion</label><div class="col-lg-2">	<input type="text" autocomplete="off" name="mo1new[]" id="mo1new'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required /></div><div class="col-lg-2"><input type="time" name="mo2new[]" id="mo2new'+divcount+'" placeholder="hh:mm" class="form-control" required/></div></div>';

         // html += '<div class="col-lg-12"><label class="col-lg-4">VIP Score  (0 - 5)</label><div class="col-lg-6"><input type="text" name="mo3new[]" id="mo3new'+divcount+'" class="form-control" /></div></div>';

        html += '<div class="col-lg-12"><label class="col-lg-4">VIP Score  (0 - 5)</label><div class="col-lg-4"><select type="text" name="mo3new[]" id="mo3new'+divcount+'" class="form-control" ><option value="">--Select--(0 to 5)</option><?php for($i=0; $i<=5 ; $i++){?>
       <option value="<?=$i?>"><?=$i?></option><?php }?></select></div></div>'  ; 

          html += '<div class="col-lg-12"><label class="col-lg-4">Signs and Symptoms of Hematoma</label><div class="col-lg-2"><select type="text" name="mo4new[]" id="mo4new'+divcount+'" class="form-control" ><option value="">Select Yes/No</option><option value="No">No</option><option value="Yes">Yes</option></select></div><div class="col-lg-6"><input type="text" name="mo5new[]" id="mo5new'+divcount+'" placeholder="Enter Corrective Action" class="form-control" /></div></div>'


html += '<div class="col-lg-12"><label class="col-lg-4">Signs and symptoms of Thromboplebitis</label><div class="col-lg-2"><select type="text" name="mo6new[]" id="mo6new'+divcount+'" class="form-control" ><option value="">Select Yes/No</option><option value="No">No</option><option value="Yes">Yes</option></select></div><div class="col-lg-6"><input type="text" name="mo7new[]" id="mo7new'+divcount+'" placeholder="Enter Corrective Action" class="form-control" /></div></div>'


html += '<div class="col-lg-12"><label class="col-lg-4">Braden Score</label><div class="col-lg-6"><input type="text" name="mo8new[]" id="mo8new'+divcount+'" class="form-control" /></div></div>'

html += '<div class="col-lg-12"><label class="col-lg-4">Signs and Symptoms of Bed Scores</label><div class="col-lg-2"><select type="text" name="mo9new[]" id="mo9new'+divcount+'" class="form-control" ><option value="">Select Yes/No</option><option value="No">No</option><option value="Yes">Yes</option></select></div><div class="col-lg-6"><input type="text" name="mo10new[]" id="mo10new'+divcount+'" placeholder="Enter Corrective Action" class="form-control" /></div></div>'




        html += '<div class="col-lg-12"><label class="col-lg-4">Morse Score  (0 - 50)</label><div class="col-lg-4"><select type="text" name="mo11new[]" id="mo11new'+divcount+'" class="form-control" ><option value="">--Select--(0 to 5)</option><?php for($i=0; $i<=50 ; $i++){?>
       <option value="<?=$i?>"><?=$i?></option><?php }?></select></div></div>'  ; 

html += '<div class="col-lg-12"><label class="col-lg-4">Incidence of Patient Fall</label><div class="col-lg-2"><select type="text" name="mo12new[]" id="mo12new'+divcount+'" class="form-control" ><option value="">Select Yes/No</option><option value="No">No</option><option value="Yes">Yes</option></select></div><div class="col-lg-6"><input type="text" name="mo13new[]" id="mo13new'+divcount+'" placeholder="Enter Corrective Action" class="form-control" /></div></div>'

html += '<div class="col-lg-12"><label class="col-lg-4">Incidence of Accidental Removal of Drains and lines</label><div class="col-lg-2"><select type="text" name="mo14new[]" id="mo14new'+divcount+'" class="form-control" ><option value="">Select Yes/No</option><option value="No">No</option><option value="Yes">Yes</option></select></div><div class="col-lg-6"><input type="text" name="mo15new[]" id="mo15new'+divcount+'" placeholder="Enter Corrective Action" class="form-control" /></div></div>'

html += '<div class="col-lg-12"><label class="col-lg-4">Injury To Patient</label><div class="col-lg-2"><select type="text" name="mo16new[]" id="mo16new'+divcount+'" class="form-control" ><option value="">Select Yes/No</option><option value="No">No</option><option value="Yes">Yes</option></select></div><div class="col-lg-6"><input type="text" name="mo17new[]" id="mo17new'+divcount+'" placeholder="Enter Corrective Action"class="form-control" /></div></div>'



          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button type="button" name="remove" id="'+divcount+'" class="btn btn-danger btn_remove ">Delete</button></div></div>';
          html +='<div class="col-lg-12"></div></div>';
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
                     <h4 class="modal-title panel panel-primary"> <div class="panel-heading" style="padding:7px;">Care related events Edit Form</div></h4>  

                           
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_edit">


                     <div class="col-lg-12">
                      <label class="col-lg-8">Date & Time of Peripheral Line insertion</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-6">
                              <input type="date" autocomplete="off" name="mo1Edit" id="mo1Edit" placehEditer="yyyy-mm-dd" class="form-control dateDisplay" required />

                     </div>

                     <div class="col-lg-6">
                             <input type="time" name="mo2Edit" id="mo2Edit" placehEditer="hh:mm" class="form-control" required/>

                     </div>
                           
                  </div>
                   <br/>
                      
					<div class="col-lg-12">
            
                   <label class="col-lg-8">VIP Score (0 - 5)</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-8">
                              <select  name="mo3Edit" id="mo3Edit" class=" form-control "   />
                              <option value="">--Select--(0 to 5)</option>
      	<?php for($i=0; $i<=5 ; $i++){?>
       <option value="<?=$i?>"><?=$i?></option>
        <?php }?>
    </select>

                          </div>
                           
                    </div>
                     <br/>

                  <div class="col-lg-12">
            
                   <label class="col-lg-8">Signs and Symptoms of Hematoma</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-4">
                              <select type="text" name="mo4Edit" id="mo4Edit" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>

                          </div>

                          <div class="col-lg-8">
                             <input type="text" name="mo5Edit" id="mo5Edit" placeholder="Enter Corrective Action" class="form-control" />

                          </div>

                           
                    </div>
                     <br/>


                     <div class="col-lg-12">
            
                   <label class="col-lg-8">Signs and symptoms of Thromboplebitis</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-4">
                             <select type="text" name="mo6Edit" id="mo6Edit" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>

                          </div>

                          <div class="col-lg-8">
                             <input type="text" name="mo7Edit" id="mo7Edit" placeholder="Enter Corrective Action" class="form-control" />

                          </div>

                           
                    </div>
                     <br/>

						<div class="col-lg-12">
            
                   <label class="col-lg-8">Braden Score</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-8">
                              <input type="text" name="mo8Edit" id="mo8Edit" class="form-control" />

                          </div>
                           
                    </div>
                     <br/>
						 <div class="col-lg-12">
                          <label class="col-lg-8">Signs and Symptoms of Bed Scores</label>
                   </div> 
                 <div class="col-lg-12">
                        <div class="col-lg-4">
                          <select type="text" name="mo9Edit" id="mo9Edit" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>

                          </div>

                          <div class="col-lg-8">
                            <input type="text" name="mo10Edit" id="mo10Edit" placeholder="Enter Corrective Action" class="form-control" />

                          </div>

                           
                    </div>
                     <br/>

                     <div class="col-lg-12">
            
                   <label class="col-lg-8">Morse Score (0 - 50)</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-8">
                             <select  name="mo11Edit" id="mo11Edit" class=" form-control "  />

                             <option value="">--Select--(0 to 50)</option>
      	<?php for($i=0; $i<=50 ; $i++){?>
       <option value="<?=$i?>"><?=$i?></option>
        <?php }?>
    </select>

                          </div>
                           
                    </div>
                     <br/>


                <div class="col-lg-12">
                          <label class="col-lg-8">Incidence of Patient Fall</label>
                   </div> 
                 <div class="col-lg-12">
                        <div class="col-lg-4">
                          <select type="text" name="mo12Edit" id="mo12Edit" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>

                          </div>

                          <div class="col-lg-8">
                             <input type="text" name="mo13Edit" id="mo13Edit" placeholder="Enter Corrective Action" class="form-control" />

                          </div>

                           
                    </div>
                     <br/>
                     <div class="col-lg-12">
                          <label class="col-lg-8">Incidence of Accidental Removal of Drains and lines</label>
                   </div> 
                 <div class="col-lg-12">
                        <div class="col-lg-4">
                          <select type="text" name="mo14Edit" id="mo14Edit" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>

                          </div>

                          <div class="col-lg-8">
                             <input type="text" name="mo15Edit" id="mo15Edit" placeholder="Enter Corrective Action" class="form-control" />

                          </div>

                           
                    </div>
                     <br/>
                     <div class="col-lg-12">
                          <label class="col-lg-8">Injury To Patient</label>
                   </div> 
                 <div class="col-lg-12">
                        <div class="col-lg-4">
                          <select type="text" name="mo16Edit" id="mo16Edit" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>

                          </div>

                          <div class="col-lg-8">
                             <input type="text" name="mo17Edit" id="mo17Edit" placeholder="Enter Corrective Action" class="form-control" />
                          </div>

                           
                    </div>
                     <br/>


                 <div class="col-lg-12">
								<hr />
					</div>

                    <input type="hidden" name="user_idEdit" id="user_idEdit" />
                     <input type="hidden" name="care_extra_id" id="care_extra_id" />
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

            var care_extra_id = $(this).attr("id");
            var action = "view"; 
            
           $.ajax({  
                url:"fetch_single_care_event_edit.php",  
                method:"POST",  
                data:{care_extra_id:care_extra_id,action:action},  
                dataType:"json",  
                success:function(data){ 
               
                 $('#mo1Edit').val(data.mo1Edit);
				$('#mo2Edit').val(data.mo2Edit);
				$('#mo3Edit').val(data.mo3Edit);
			    $('#mo4Edit').val(data.mo4Edit);
				$('#mo5Edit').val(data.mo5Edit);
				$('#mo6Edit').val(data.mo6Edit);
				$('#mo7Edit').val(data.mo7Edit);
				$('#mo8Edit').val(data.mo8Edit);
				$('#mo9Edit').val(data.mo9Edit);
				$('#mo10Edit').val(data.mo10Edit);
				$('#mo11Edit').val(data.mo11Edit);
				$('#mo12Edit').val(data.mo12Edit);
				$('#mo13Edit').val(data.mo13Edit);
				$('#mo14Edit').val(data.mo14Edit);
				$('#mo15Edit').val(data.mo15Edit);
				$('#mo16Edit').val(data.mo16Edit);
				$('#mo17Edit').val(data.mo17Edit);
 


					$('#care_extra_id').val(data.care_extra_id); 

                     $('#user_idEdit').val(data.care_id); 
 

                     $('#insertEdit').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           }); 
            $('#add_data_Modal').modal('show');
              
      }); 


 	$('#insert_form_edit').on("submit", function(event){  
           event.preventDefault();  
           var action = "update";
                $.ajax({  
                     url:"fetch_single_care_event_edit.php",  
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