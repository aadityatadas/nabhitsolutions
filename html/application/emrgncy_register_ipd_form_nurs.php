<!-- ALTER TABLE `tbl_emrgncy_register_ipd`  ADD `date_of_intl_ass_is_cmpltd_by_doc` VARCHAR(150) NULL  AFTER `time_of_intl_ass_is_cmpltd_by_doc`; -->

<!-- ALTER TABLE `tbl_emrgncy_reg_ipd2`  ADD `date_of_intl_ass_is_cmpltd_by_doc` VARCHAR(150) NULL  AFTER `time_of_intl_ass_is_cmpltd_by_doc`; -->

<?php
	error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$today = date('Y-m-d'); 
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
	$('#vent').load('emrgncy_register_ipd_count.php').fadeIn("slow");
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
	<?php include"nav-bar-nurse.php";?>
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
                            Emergency Register Form

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
											<label class="col-lg-4">Date & Time Of Patient Arrival At The Emergency</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="date_of_patient_arrvl_at_emrgncy" id="date_of_patient_arrvl_at_emrgncy" placeholder="yyyy-mm-dd" class="form-control" required/>
											</div>
											<div class="col-lg-2">
												<input type="time" name="time_of_patient_arrvl_at_emrgncy" id="time_of_patient_arrvl_at_emrgncy" placeholder="hh:mm" class="form-control" required/>
											</div>
										</div>


										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time Of Initial Assessment Is Completed By Doctor  </label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="date_of_intl_ass_is_cmpltd_by_doc" id="date_of_intl_ass_is_cmpltd_by_doc" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="time_of_intl_ass_is_cmpltd_by_doc" id="time_of_intl_ass_is_cmpltd_by_doc" placeholder="hh:mm" class="form-control" required/>
											</div>
										</div>


										<div class="col-lg-12">
											<label class="col-lg-4">Time Taken For Initial Assessment </label>
											<!-- <div class="col-lg-2">
												<input type="text" autocomplete="off" name="time_taken_for_initl_assmnt" id="time_taken_for_initl_assmnt" placeholder="yyyy-mm-dd" class="form-control" />
											</div> -->
											<div class="col-lg-2">
												<input type="text" name="time_taken_for_initl_assmnt" id="time_taken_for_initl_assmnt" placeholder="time taken" class="form-control" readonly />
											</div>
										</div>



										<div class="col-lg-12">
											<label class="col-lg-4">Patient'S Complaint	</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="patient_cmplnt" id="patient_cmplnt" placeholder="Patient'S Complaint..." class="form-control" required/>
											</div>
										</div>	


										
									
										<div class="col-lg-12">
											<label class="col-lg-4">Mlc</label>
											<div class="col-lg-2">	
												<select type="text" name="m_l_c" id="m_l_c" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Brought Dead</label>
											<div class="col-lg-2">	
												<select type="text" name="brought_dead" id="brought_dead" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>
                                <div class="col-lg-12">
											<label class="col-lg-4">Date & Time Of Return To Emergency Department If Any</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="date_of_retrn_to_emrgncy_dept_if_any" id="date_of_retrn_to_emrgncy_dept_if_any" placeholder="yyyy-mm-dd" class="form-control" required/>
											</div>
											<div class="col-lg-2">
												<input type="time" name="time_of_retrn_to_emrgncy_dept_if_any" id="time_of_retrn_to_emrgncy_dept_if_any" placeholder="hh:mm" class="form-control" required/>
											</div>
										</div>


										<div class="col-lg-12">
											<label class="col-lg-4">Patient'S Complaint  On Return To Emergency	</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="patients_comp_on_rtn_of_emrgncy" id="patients_comp_on_rtn_of_emrgncy" placeholder="Patient'S Complaint  On Return To Emergency	..." class="form-control" required/>
											</div>
										</div>	

										<div class="col-lg-12">
											<label class="col-lg-4">Return To The Emergency Department With In 72 Hours With Similar Presenting Complaint If Any</label>
											<div class="col-lg-2">
												<select type="text" name="retn_of_emrgncy" id="retn_of_emrgncy" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" autocomplete="off" name="retn_of_emrgncy_reson" id="retn_of_emrgncy_reson" placeholder="Give reason if Yes" class="form-control" />
											</div>
										</div>

										
										<div class="col-lg-12">
											<label class="col-lg-4">CMO or Casualty Nurse</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="sign" id="sign" placeholder="cmo or casualty nurse..." class="form-control" readonly />
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

												<th>Date Of Patient Arrival At The Emergency	</th>
									<th>Time Of Patient Arrival At The Emergency</th>
									<th>Date Of Initial Assessment Is Completed By Doctor   </th>  	
									<th>Time Of Initial Assessment Is Completed By Doctor   </th>                        
									<th>Time Taken For Initial Assessment </th>                                                                                                      
									<th>Patient'S Complaint	</th>
									<th>Mlc	</th>
									<th>Brought Dead	</th>
									<th>Date Of Return To Emergency Department If Any</th>	
									<th>Time Of Return To Emergency Department If Any</th>	
									<th>Patient'S Complaint  On Return To Emergency	</th>
									<th>Return To The Emergency Department With In 72 Hours With Similar Presenting Complaint If Any</th>
									<th>Sign</th>

											 


											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									
									<form method="post" action="../excel/EMR/export.php" class="panel-heading">
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
		$("#date_of_patient_arrvl_at_emrgncy").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});

		$("#date_of_retrn_to_emrgncy_dept_if_any").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});

		$("#date_of_intl_ass_is_cmpltd_by_doc").datepicker({
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
			$("#date_of_patient_arrvl_at_emrgncy").datepicker();
			$("#date_of_retrn_to_emrgncy_dept_if_any").datepicker();
			$("#date_of_intl_ass_is_cmpltd_by_doc").datepicker();
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
				url:"fetch_all_emrgncy_register_ipd_form.php",
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
						url:"insert_emrgncy_register_ipd_form.php",
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
			$.ajax({
				url:"fetch_single_emrgncy_register_ipd_form.php",
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
	
						$('#emrgncy_register_ipd_id').val(data.emrgncy_register_ipd_id);
						$('#tbl_huf_id').val(data.tbl_huf_id);
						$('#date_of_patient_arrvl_at_emrgncy').val(data.date_of_patient_arrvl_at_emrgncy);

					if(($('#date_of_patient_arrvl_at_emrgncy').val())==""){

                         $('#addButton').hide();
					}else{
						 $('#addButton').show();
					}
						$('#time_of_patient_arrvl_at_emrgncy').val(data.time_of_patient_arrvl_at_emrgncy);
						$('#time_of_intl_ass_is_cmpltd_by_doc').val(data.time_of_intl_ass_is_cmpltd_by_doc);
						$('#date_of_intl_ass_is_cmpltd_by_doc').val(data.date_of_intl_ass_is_cmpltd_by_doc);
						$('#time_taken_for_initl_assmnt').val(data.time_taken_for_initl_assmnt);
						$('#patient_cmplnt').val(data.patient_cmplnt);
						$('#m_l_c').val(data.m_l_c);
						$('#brought_dead').val(data.brought_dead);
						$('#date_of_retrn_to_emrgncy_dept_if_any').val(data.date_of_retrn_to_emrgncy_dept_if_any);
						$('#time_of_retrn_to_emrgncy_dept_if_any').val(data.time_of_retrn_to_emrgncy_dept_if_any);
						$('#patients_comp_on_rtn_of_emrgncy').val(data.patients_comp_on_rtn_of_emrgncy);
						$('#retn_of_emrgncy').val(data.retn_of_emrgncy);
						$('#retn_of_emrgncy_reson').val(data.retn_of_emrgncy_reson);
					
						$('#sign').val(data.sign);

						if(data.oldDataCount>0){
						          	var j=1;
						          	for(var i=0; i < data.oldDataCount; i++){

						        var html ='<div id="row'+i+'"  ><div class="col-lg-12"><hr /><label class="col-lg-2" style="background-color: #d0dce9;"><u> Record '+(++j)+'</u></label></div>';

						        html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time Of Patient Arrival At The Emergency Catheter</label><div class="col-lg-2"><input type="text" autocomplete="off" value="'+data.one[i]+'" name="t_admold[]" id="t_admold'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required readonly/></div><div class="col-lg-2"><input type="time" name="t_adm1old[]" id="t_adm1old'+i+'" value="'+data.two[i]+'" placeholder="hh:mm" class="form-control" required readonly /></div></div>' ;
						        html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time Of Initial Assessment Is Completed By Doctor</label><div class="col-lg-2"><input type="text" autocomplete="off" name="ddd1dold[]" id="ddd1dold'+i+'" placeholder="yyyy-mm-dd" class="form-control" value="'+data.three1[i]+'"readonly/></div><div class="col-lg-2"><input type="text" name="ddd1old[]" id="ddd1old'+i+'" placeholder="" value="'+data.three[i]+'" class="form-control" required readonly/></div></div>';

						        html += '<div class="col-lg-12"><label class="col-lg-4">Time Taken For Initial Assessment</label><div class="col-lg-2"><input type="text" name="ddddold[]" id="ddddold'+i+'" placeholder="" value="'+data.four[i]+'" class="form-control" required readonly/></div></div>';

						        html += '<div class="col-lg-12"><label class="col-lg-4">Patient Complaint </label><div class="col-lg-7"><input type="text" autocomplete="off" name="patient_cmplntold[]" id="patient_cmplnt'+i+'" placeholder="Patient Complaint..." value="'+data.five[i]+'" class="form-control" readonly/></div></div>';

						        html += '<div class="col-lg-12"><label class="col-lg-4">Mlc</label><div class="col-lg-2"><select type="text" name="m_l_cold[]" id="m_l_c'+i+'" value="'+data.six[i]+'" class="form-control" disabled><option value=""'+data.six[i]+'"">'+data.six[i]+'</option></select></div></div>';

						        html += '<div class="col-lg-12"><label class="col-lg-4">Brought Dead</label><div class="col-lg-2"><select type="text" name="brought_deadold[]" id="brought_dead'+i+'" value="'+data.seven[i]+'" class="form-control" disabled><option value="'+data.seven[i]+'">'+data.seven[i]+'</option></select></div></div>';

						        html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time Of Return To Emergency Department If Any</label><div class="col-lg-2"><input type="text" autocomplete="off" name="date_of_retrn_to_emrgncy_dept_if_anyold[]" id="date_of_retrn_to_emrgncy_dept_if_any'+i+'" placeholder="yyyy-mm-dd" value="'+data.eight[i]+'" class="form-control dateDisplay required " readonly/></div><div class="col-lg-2"><input type="time" name="time_of_retrn_to_emrgncy_dept_if_anyold[]" id="time_of_retrn_to_emrgncy_dept_if_any'+i+'" placeholder="hh:mm" value="'+data.nine[i]+'" class="form-control" readonly/></div></div>';

						        html +='<div class="col-lg-12"><label class="col-lg-4">Patient Complaint  On Return To Emergency </label><div class="col-lg-7"><input type="text" autocomplete="off" name="patients_comp_on_rtn_of_emrgncyold[]" id="patients_comp_on_rtn_of_emrgncy'+i+'" placeholder="Patient Complaint  On Return To Emergency..." value="'+data.ten[i]+'" class="form-control" readonly/></div></div>';

						         html +='<div class="col-lg-12"><label class="col-lg-4">Return To The Emergency Department With In 72 Hours With Similar Presenting Complaint If Any</label><div class="col-lg-2"><select type="text" name="retn_of_emrgncyold[]" id="retn_of_emrgncy'+i+'" class="form-control" value="'+data.eleven[i]+'" disabled><option value="'+data.eleven[i]+'">'+data.eleven[i]+'</option></select></div><div class="col-lg-6"><input type="text" autocomplete="off" name="retn_of_emrgncy_resonold" id="retn_of_emrgncy_reson'+i+'"  value="'+data.thirteen[i]+'" placeholder="Give reason if Yes" class="form-control" disabled/></div>	</div>';
					        
						         
						           html +='<div class="col-lg-12"><label class="col-lg-4">CMO or Casualty Nurse</label><div class="col-lg-6"><input type="text" autocomplete="off" name="signold" id="sign'+i+'" placeholder="cmo or casualty nurse..." value="'+data.twelve[i]+'" class="form-control" readonly/></div>';

						         
						  
						          html +='<div class="col-lg-2"><button type="button" name="edit" id="'+data.emrgncy_reg_ipd2_id[i]+'"  class="btn btn-primary edit_data">Edit Record No. '+j+'</button></div></div>';
						          html +='</div>';
						         
						          $('#Old_Data').append(html);
						          }
						      }


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
		$('#date_of_patient_arrvl_at_emrgncy').mask('9999-99-99');// for Date
		$('#date').mask('9999-99-99');// for Date
		//$('#t_adm1').mask('99:99');// for Time
		//$('#ddd1').mask('99:99');// for Time
		$('#date_of_disc_trans_in_emrgncy').mask('9999-99-99');// for Date
		$('#frdate').mask('9999-99-99');// for Date
		
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
					url: 'emrgncy_register_ipd_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Emergency Register Form',
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
     if(divss>0){ alert("Please fill data In Present Record Feilds"); return false;}  
           divcount++; 
          var html = '<div id="row'+divcount+'"><div class="col-lg-12"><label class="col-lg-4">Date & Time Of Patient Arrival At The Emergency Catheter</label><div class="col-lg-2"><input type="text" autocomplete="off" name="t_admnew[]" id="t_admnew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required/></div><div class="col-lg-2"><input type="time" name="t_adm1new[]" id="t_adm1new'+divcount+'" placeholder="hh:mm" class="form-control" required /></div></div>' ;
            html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time Of Initial Assessment Is Completed By Doctor</label><div class="col-lg-2"><input type="text" autocomplete="off" name="ddd1dnew[]" id="ddd1dnew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" /></div><div class="col-lg-2"><input type="time" name="ddd1new[]" id="ddd1new'+divcount+'" placeholder="hh:mm" class="form-control" required/></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Time Taken For Initial Assessment</label><div class="col-lg-2"><input type="text" name="ddddnew[]" id="ddddnew'+divcount+'" placeholder="time taken" class="form-control" readonly/></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Patient Complaint </label><div class="col-lg-7"><input type="text" autocomplete="off" name="patient_cmplnt1[]" id="patient_cmplnt'+divcount+'" placeholder="Patient Complaint..." class="form-control" required/></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Mlc</label><div class="col-lg-2"><select type="text" name="m_l_c1[]" id="m_l_c'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Brought Dead</label><div class="col-lg-2"><select type="text" name="brought_dead1[]" id="brought_dead'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time Of Return To Emergency Department If Any</label><div class="col-lg-2"><input type="text" autocomplete="off" name="date_of_retrn_to_emrgncy_dept_if_any1[]" id="date_of_retrn_to_emrgncy_dept_if_any'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay required" required/></div><div class="col-lg-2"><input type="time" name="time_of_retrn_to_emrgncy_dept_if_any1[]" id="time_of_retrn_to_emrgncy_dept_if_any'+divcount+'" placeholder="hh:mm" class="form-control" required/></div></div>';

        html +='<div class="col-lg-12"><label class="col-lg-4">Patient Complaint  On Return To Emergency </label><div class="col-lg-7"><input type="text" autocomplete="off" name="patients_comp_on_rtn_of_emrgncy1[]" id="patients_comp_on_rtn_of_emrgncy'+divcount+'" placeholder="Patient Complaint  On Return To Emergency..." class="form-control" required/></div></div>';

         html +='<div class="col-lg-12"><label class="col-lg-4">Return To The Emergency Department With In 72 Hours With Similar Presenting Complaint If Any</label><div class="col-lg-2"><select type="text" name="retn_of_emrgncy1[]" id="retn_of_emrgncy'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-6"><input type="text" autocomplete="off" name="retn_of_emrgncy_reson1[]" id="retn_of_emrgncy_reson'+divcount+'" placeholder="Give reason if Yes" class="form-control" /></div></div>';




         html +='<div class="col-lg-12"><label class="col-lg-4">CMO or Casualty Nurse</label><div class="col-lg-6"><input type="text" autocomplete="off" name="sign1[]" id="sign'+divcount+'" placeholder="cmo or casualty nurse..." class="form-control" readonly/></div>';

          html +='<div class="col-lg-2"><button type="button" name="remove" id="'+divcount+'" class="btn btn-danger btn_remove ">Delete</button></div></div>';
          html +='<div class="col-lg-12"><hr /></div></div>';
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
                     <h4 class="modal-title panel panel-primary"> <div class="panel-heading" style="padding:7px;">Emergency Register Form  </div></h4>  

                           
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_edit">
                      
                     <div class="col-lg-12">
            
                   <label class="col-lg-12">Date & Time Of Patient Arrival At The Emergency Catheter</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-6">
                              <input type="date" autocomplete="off" 
                              name="t_admEdit" id="t_admEdit" placeholder="yyyy-mm-dd" class="form-control" />

                          </div>
                            <div class="col-lg-6">
                         <input type="time" name="t_adm1Edit" id="t_adm1Edit" placeholder="hh:mm" class="form-control" />              

                           </div>
                    </div>
                      <br/>

                  <div class="col-lg-12">
                   <label class="col-lg-12">Date & Time Of Initial Assessment Is Completed By Doctor</label>
                   </div> 
                       <div class="col-lg-12">
							
							<div class="col-lg-6">
                              <input type="date" autocomplete="off" 
                              name="ddd1dEdit" id="ddd1dEdit" placeholder="yyyy-mm-dd" class="form-control" />

                          </div>


                           <div class="col-lg-6">
                            <input type="time" name="ddd1Edit" id="ddd1Edit" placeholder="hh:mm"  class="form-control" required/>
                           </div>



                 		</div>
                      <br/>

                      <div class="col-lg-12">
                   <label class="col-lg-12">Time Taken For Initial Assessment</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-6">
                            <input type="text" name="ddddEdit" id="ddddEdit" placeholder="" class="form-control" required/>
                           </div>
                 </div>
                      <br/>

       			<div class="col-lg-12">
                   <label class="col-lg-12">Patient Complaint</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-12">
                            <input type="text" autocomplete="off" name="patient_cmplntEdit" id="patient_cmplntEdit" placeholder="Patient Complaint..." class="form-control" />
                    </div>
                          
                 </div>
             <br/>
             <div class="col-lg-12">
             	<label class="col-lg-12">Mlc</label>
             	<div class="col-lg-6">
             		<select type="text" name="m_l_cEdit" id="m_l_cEdit" onChange="LoadData();" class="form-control" />
	             		<option value="">Select</option>
	             		<option value="Yes">Yes</option>
	             		<option value="No">No</option>
             		</select>
             	</div>
             </div>
             <br/>
             <div class="col-lg-12">
             	<label class="col-lg-12">Brought Dead</label>
	            <div class="col-lg-6">
	             	<select type="text" name="brought_deadEdit" id="brought_deadEdit" onChange="LoadData();" class="form-control" />
			             <option value="">Select</option>
			             <option value="Yes">Yes</option>
			             <option value="No">No</option>
	         		</select>
	         	</div>
         	 </div>
             <br/>
             <div class="col-lg-12">
             	<label class="col-lg-12">Date & Time Of Return To Emergency Department If Any</label>
             	<div class="col-lg-6">
             		<input type="date" autocomplete="off" name="date_of_retrn_to_emrgncy_dept_if_anyEdit" id="date_of_retrn_to_emrgncy_dept_if_anyEdit" placeholder="yyyy-mm-dd" class="form-control" />
         	 	</div>
             	<div class="col-lg-6">
             		<input type="time" name="time_of_retrn_to_emrgncy_dept_if_anyEdit" id="time_of_retrn_to_emrgncy_dept_if_anyEdit" placeholder="hh:mm" class="form-control" />
         		</div>
        	 </div>
             <br/>
             <div class="col-lg-12">
             	<label class="col-lg-12">Patient'S Complaint  On Return To Emergency	</label>
             	<div class="col-lg-12">
             		<input type="text" autocomplete="off" name="patients_comp_on_rtn_of_emrgncyEdit" id="patients_comp_on_rtn_of_emrgncyEdit" placeholder="Patient'S Complaint  On Return To Emergency..." class="form-control" />
         		</div>
        	 </div>
             <br/>
             <div class="col-lg-12">
             	<label class="col-lg-12">Return To The Emergency Department With In 72 Hours With Similar Presenting Complaint If Any</label>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                	<select type="text" name="retn_of_emrgncyEdit" id="retn_of_emrgncyEdit" class="form-control" ><option value="">Select Yes/No</option><option value="Yes">Yes</option><option value="No">No</option></select>
                </div><div class="col-lg-8"><input type="text" autocomplete="off" name="retn_of_emrgncy_resonEdit" id="retn_of_emrgncy_resonEdit" placeholder="Give reason if Yes" class="form-control" /></div>	
             </div>
                </div>



             <br/>
             <div class="col-lg-12">
                <label class="col-lg-12">CMO or Casualty Nurse</label>
                <div class="col-lg-12">
                    <input type="text" autocomplete="off" name="signEdit" id="signEdit" placeholder="cmo or casualty nurse..." class="form-control" readonly />
                </div>
             </div>
              <br/>
                 <div class="col-lg-12">
								<hr />
					</div>
					<input type="hidden" name="userEdit" id="userEdit" />
                    <input type="hidden" name="emrgncy_register_ipd_id" id="emrgncy_register_ipd_id" />
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

            var emrgncy_register_ipd_id = $(this).attr("id");
            var action = "view"; 
            
           $.ajax({  
                url:"emrgncy_register_ipd_edit.php",  
                method:"POST",  
                data:{emrgncy_register_ipd_id:emrgncy_register_ipd_id,action:action},  
                dataType:"json",  
                success:function(data){ 
               
                 	$('#t_admEdit').val(data.t_admEdit);
                    $('#t_adm1Edit').val(data.t_adm1Edit);
					$('#ddd1Edit').val(data.ddd1Edit);
					$('#ddddEdit').val(data.ddddEdit);
					$('#patient_cmplntEdit').val(data.patient_cmplntEdit);
					$('#m_l_cEdit').val(data.m_l_cEdit);
					$('#brought_deadEdit').val(data.brought_deadEdit);
					$('#date_of_retrn_to_emrgncy_dept_if_anyEdit').val(data.date_of_retrn_to_emrgncy_dept_if_anyEdit);
					$('#time_of_retrn_to_emrgncy_dept_if_anyEdit').val(data.time_of_retrn_to_emrgncy_dept_if_anyEdit); 
					$('#patients_comp_on_rtn_of_emrgncyEdit').val(data.patients_comp_on_rtn_of_emrgncyEdit); 
					$('#retn_of_emrgncyEdit').val(data.retn_of_emrgncyEdit);
					$('#retn_of_emrgncy_resonEdit').val(data.retn_of_emrgncy_resonEdit);

					
					$('#signEdit').val(data.signEdit);
					$('#emrgncy_register_ipd_id').val(data.emrgncy_register_ipd_id);
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
                     url:"emrgncy_register_ipd_edit.php",  
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