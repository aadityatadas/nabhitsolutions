<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"hira_analy_sheet/fetch_dept_place.php";
	include"location_checklist.php";
	

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
	$('#hosp').load('hira_analy_sheet/hira_sheet_count.php').fadeIn("slow");
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
	<?php include"nav-bar-audit.php";?>
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
                            Hazard Identification and Risk Analysis Sheet
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New Sheet</b></button>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										

										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Details</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-4" > Place/Dept.</div>
											<div class="col-lg-8">
												<select type="text" 
												name="place_dept" 
												id="place_dept" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
								<?php   foreach($places as $place): ?>

                                <option value="<?=$place["hira_place_dep_id"];?>">
                                	<?=$place["place_name"];?></option>
  
  
                                <?php endforeach;  ?>

												</select>
											</div>
						<div class="col-lg-12">
											<hr />
										</div>
											<div class="col-lg-4">Activity</div>
											<div class="col-lg-8">
												<select  
												name="activity_name" 
												id="activity_name" onChange="LoadData();" class="form-control" />
													<option value="">Select Activity</option>


												</select>
											</div>
											<div class="col-lg-12"></div>
											<div class="col-lg-4">Occupational Hazard</div>
											<div class="col-lg-8">
												<select type="text" 
												name="occup_hzrd_name" 
												id="occup_hzrd_name" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
								

												</select>
											</div>
											<div class="col-lg-4">Occupational Risk</div>
											<div class="col-lg-8">
												<select type="text" name="occup_risk_name" id="occup_risk_name" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
								

												</select>
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>

										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Existing control methods </label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-12"><b>PROACTIVE CONTROLS</b></div>
											<div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2">Engg. Control</div>
											<div class="col-lg-1">

													<input type="checkbox" name="engg_cntrl" 
													id="engg_cntrl" 
													class="form-control" />
												
											</div>
											<div class="col-lg-2">Monitoring,visual display, PPE</div>
											<div class="col-lg-1">

													<input type="checkbox" name="moni_visal_display" id="moni_visal_display" class="form-control" />
												
											</div>
											
											<div class="col-lg-2">Health Plan</div>
											<div class="col-lg-4">
												<input type="text" 
												name="health_plan" 
												id="health_plan" class="form-control" placeholder="Health Plan" />
											</div>
											<div class="col-lg-12"></div>
											<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>Reactive / Administrative controls</b></div>
											<div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2">LC(Legal Condition)</div>
											<div class="col-lg-4">
												<input type="text" name="l_c" id="l_c" class="form-control" placeholder="LC" />
											</div>
											<div class="col-lg-2">EC(Engineering Control)</div>
											<div class="col-lg-4">
												<input type="text" name="e_c" id="e_c" class="form-control" placeholder="EC" />
											</div>
											<div class="col-lg-2">MSDS(Material Safety Data Sheet)</div>
											<div class="col-lg-4">
												<input type="text" 
												name="m_s_d_s" id="m_s_d_s" class="form-control" placeholder="MSDS" />
											</div>
											<div class="col-lg-2">HB(Human Behaviour)</div>
											<div class="col-lg-4">
												<input type="text" name="h_b" id="h_b" class="form-control" placeholder="HB" />
											</div>
											<div class="col-lg-2">Protocol / Policy</div>
											<div class="col-lg-4">
												<input type="text" 
												name="protcl_polcy" id="protcl_polcy" class="form-control" placeholder="Protocol / Policy" />
											</div>
											<div class="col-lg-2">PPE</div>
											<div class="col-lg-4">
												<input type="text" 
												name="p_p_e" id="p_p_e" class="form-control" placeholder="PPE" />
											</div>
											
										</div>
									<div class="col-lg-12">
											<hr />
										</div>
									<div class="col-lg-2">Protocol / PolicyDescription
                                       of Legal/ Other Requirement</div>
											<div class="col-lg-4">
												<input type="text" 
												name="desptn_lgl_reqrmnt" 
												id="desptn_lgl_reqrmnt" class="form-control" placeholder="Protocol / PolicyDescription
                                       of Legal/ Other Requirement" />
											</div>
										<div class="col-lg-12">
											<hr />
										</div>



							<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Classification of Residual Risk</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Severity</div>
											<div class="col-lg-4">
												<select type="text" name="severity" id="severity" onChange="Loadrisk();" class="form-control" />
													<option value="0">Select</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<!-- <option value="4">4</option>
													<option value="5">5</option> -->
												</select>
											</div>
											<div class="col-lg-2" >Probability of occurance</div>
											<div class="col-lg-4">
												<select type="text" name="prob_of_occrance" id="prob_of_occrance" onChange="Loadrisk();" class="form-control" />
													<option value="0">Select</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<!-- <option value="4">4</option>
													<option value="5">5</option> -->
												</select>
											</div>
											
											<div class="col-lg-2">Score</div>
											<div class="col-lg-4">
												<input type="text" name="score" id="score" class="form-control" placeholder="Score" readonly="" />
											</div>
											
											<div class="col-lg-2">Classification</div>
											<div class="col-lg-4">
												<input type="text" 
												name="residual_risk" 
												id="residual_risk" class="form-control" placeholder="Classification" readonly="" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Criteria for Significance</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-4" >Criteria for Significance</div>
											<div class="col-lg-8">
												<input type="text" 
												name="critria_signfcne" 
												id="critria_signfcne" 
												class="form-control" placeholder="Criteria for Significance" />
											</div>
											
											
											
											<div class="col-lg-4">Action Plan</div>
											<div class="col-lg-8">
												<input type="text" 
												name="action_plan" 
												id="action_plan" class="form-control" placeholder="Action Plan" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										
										
										

										<div class="col-lg-12">
											<label class="col-lg-3">Name</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="name" id="name" 
												 placeholder="Name" class="form-control" />
											</div>
											<label class="col-lg-3">Sign</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="sign" id="sign" 
												 placeholder="Sign" class="form-control" />
											</div>
											<label class="col-md-3">Date & Time</label>
											<div class="col-md-4">
												<input type="text" autocomplete="off" name="list-date" id="list-date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-md-4">
												<input type="time" name="list-time" id="list-time" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
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
										</div>
									</div>	
								</form>
							</div>
						</div>
                        <div class="box" id="bx2">
							<div class="panel-body">
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
									<tr>
		
										<thead style="font-size:12px;color:darkblue;">

       <tr>
		<td colspan=22 height="20" align="left" valign=middle bgcolor="#FFFFFF"><font face="Century Gothic">Criteria For Significance -  1. Legal Concern/Requirement              2.  Sevearity Rating is = or &gt; 3.                    3.Total Score Rating is = or &gt; 5                      4.Emergency   Condition</font></td>
		</tr>

	 <tr height=20 style='height:15.0pt'>
	  
	<td rowspan=3 height=112 class=xl6619964 width=64 style='height:84.0pt;
  border-top:none;width:48pt'>Action</td>
  <!-- <td rowspan=3 height=112 class=xl6619964 width=64 style='height:84.0pt;
  border-top:none;width:48pt' >Sr. No.</td> -->

  <td rowspan=3 height=112 class=xl6619964 width=64 style='height:84.0pt;
  border-top:none;width:48pt'>Done By</td>
  
  <td rowspan=3 style="width:20%"  >Date&Time</td>

  
												
												
  <td class=xl6719964 width=64 style='border-top:none;border-left:none;
  width:48pt'>&nbsp;</td>
  <td rowspan=3 class=xl6619964 width=64 style='border-top:none;width:48pt'>Activity</td>
  <td rowspan=3 class=xl6619964 width=64 style='border-top:none;width:48pt'>Occupational
  Hazard</td>
  <td rowspan=3 class=xl6619964 width=64 style='border-top:none;width:48pt'>Occupational
  Risk</td>
  <td colspan=9 class=xl6619964 width=576 style='border-left:none;width:432pt'>Existing
  control methods<span style='mso-spacerun:yes'> </span></td>
  <td rowspan=3 class=xl6619964 width=64 style='border-top:none;width:48pt'>Description<br>
    of Legal/ Other Requirement</td>
  <td colspan=3 rowspan=2 class=xl6619964 width=192 style='width:144pt'>&nbsp;</td>
  <td rowspan=3 class=xl6619964 width=64 style='border-top:none;width:48pt'>Classification
  of Residual Risk
    
  <td rowspan=3 class=xl6619964 width=64 style='border-top:none;width:48pt'>Criteria
  for Significance</td>
  <td rowspan=3 class=xl6619964 width=64 style='border-top:none;width:48pt'>Action
  Plan</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6719964 width=64 style='height:15.0pt;border-top:none;
  border-left:none;width:48pt'>&nbsp;</td>
  <td colspan=3 class=xl6619964 width=192 style='border-left:none;width:144pt'>PROACTIVE
  CONTROLS</td>
  <td colspan=6 class=xl6619964 width=384 style='border-left:none;width:288pt'>REACTIVE
  / ADMINISTRATIVECONTROLS</td>
 </tr>
 <tr height=72 style='height:54.0pt'>
  <td height=72 class=xl6719964 width=64 style='height:54.0pt;border-top:none;
  border-left:none;width:48pt'>Place/Dept.</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>Engg. Control</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>Monitoring,visual display, PPE</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>Health Plan</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>LC</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>EC</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>MSDS</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>HB</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>Protocol / Policy</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>PPE</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>Severity</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>Probability of occurance</td>
  <td class=xl6619964 width=64 style='border-top:none;border-left:none;
  width:48pt'>Score</td>
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
                <p style= colspan=6 height="28" align="center" valign=middle><b><font size=6 color="#000000">HAZARD IDENTIFICATION AND RISK ANALYSIS SHEET</font></b></p>
            </div>
            <div style="padding-left: 30px;padding-right: 30px; margin-bottom: 30px; margin-top: 30px;">
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
                url: "hira_analy_sheet/editdata.php",
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
			$('#sr').load("hira_analy_sheet/load_hira_sheet.php");
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
				url:"hira_analy_sheet/fetch_all_hira_sheet_form.php",
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
						url:"hira_analy_sheet/insert_hira_sheet_form.php",
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
				url:"hira_analy_sheet/fetch_single_hira_sheet_form.php",
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
					$('#name').val(data.name);
					$('#sign').val(data.sign);
					$('#list-date').val(data.date1);
					$('#list-time').val(data.time1);

					$('#place_dept').val(data.place_dept);
				var options = [];
	    
               $.each(data.activity, function(key, value) {
               options.push ($('<option>', { value : value })
              .text(value));
               });
               var options1 = [];
	    
               $.each(data.occp1, function(key, value) {
               options1.push ($('<option>', { value : value })
              .text(value));
               });
               var options2 = [];
	    
               $.each(data.occp2, function(key, value) {
               options2.push ($('<option>', { value : value })
              .text(value));
               });

                 $('#activity_name option[value!=""]').remove();
                 $('#occup_hzrd_name option[value!=""]').remove();
                 $('#occup_risk_name option[value!=""]').remove();

                 $('#activity_name').append(options);
                 $('#occup_hzrd_name').append(options1);
                 $('#occup_risk_name').append(options2);
                
					$('#activity_name').val(data.activity_name);
					$('#occup_hzrd_name').val(data.occup_hzrd_name);
					$('#occup_risk_name').val(data.occup_risk_name);
					if(data.engg_cntrl==1){
                         $('#engg_cntrl').prop('checked',true);
					}
					if(data.moni_visal_display==1){
                         $('#moni_visal_display').prop('checked',true);
					}
					
					

					$('#health_plan').val(data.health_plan);
					$('#l_c').val(data.l_c);
					$('#e_c').val(data.e_c);
					$('#m_s_d_s').val(data.m_s_d_s);
					$('#h_b').val(data.h_b);
					$('#protcl_polcy').val(data.protcl_polcy);
					$('#p_p_e').val(data.p_p_e);
					$('#desptn_lgl_reqrmnt').val(data.desptn_lgl_reqrmnt);
					$('#severity').val(data.severity);
					$('#prob_of_occrance').val(data.prob_of_occrance);
					$('#score').val(data.score);
					$('#residual_risk').val(data.residual_risk);
					$('#critria_signfcne').val(data.critria_signfcne);

					
					
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
					url:"hira_analy_sheet/delete_hira_sheet_form.php",
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
<script type="text/javascript">
	function Loadrisk()
	{
		var severity = $('#severity').val();
		var prob = $('#prob_of_occrance').val();
		 var tot = parseInt(severity) + parseInt(prob);
		 console.log(tot);
		 $('#score').val(tot);
		 if(tot == 1)
		 {
		 	$('#residual_risk').val('Physical Risk');
		 }
		 if(tot == 2)
		 {
		 	$('#residual_risk').val('Chemical Risk');
		 }
		 if(tot == 3)
		 {
		 	$('#residual_risk').val('Biological Risk');
		 }
		 if(tot == 4)
		 {
		 	$('#residual_risk').val('Fire Hazard');
		 }
		 if(tot == 5)
		 {
		 	$('#residual_risk').val('Ergonomic');
		 }
		 if(tot == 6)
		 {
		 	$('#residual_risk').val('Radiation');
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
				url: 'hira_analy_sheet/delete_hira_sheet_form.php',
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
				
				url: 'hira_analy_sheet/pharmacy_hira_sheet-2.php',
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

<script type="text/javascript">
$(document).ready(function(){
    $('#place_dept').on('change',function(){
        var depID = $(this).val();
        if(depID){
            $.ajax({
                type:'POST',
                url:'hira_analy_sheet/fetch_dropdown.php',
                data:'hira_place_dep_id='+depID+'&action='+ 'one',

                success:function(html){
                     $('#activity_name').html(html);
                    // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#activity_name').html('<option value="">Select Dep/place first</option>');
             
        }

        if(depID){
            $.ajax({
                type:'POST',
                url:'hira_analy_sheet/fetch_dropdown.php',
                data:'hira_place_dep_id='+depID+'&action='+ 'two',
                success:function(html){
                     $('#occup_hzrd_name').html(html);
                    // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#occup_hzrd_name').html('<option value="">Select Dep/place first</option>');
             
        }
        if(depID){
            $.ajax({
                type:'POST',
                url:'hira_analy_sheet/fetch_dropdown.php',
                data:'hira_place_dep_id='+depID+'&action='+ 'three',
                success:function(html){
                     $('#occup_risk_name').html(html);
                    // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#occup_risk_name').html('<option value="">Select Dep/place first</option>');
             
        }
    });
    });
</script>


