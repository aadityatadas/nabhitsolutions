<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
	 include "power_sfty_chklist/headings.php";
//   foreach($checklist_locations as $loc)
// {
 
//   print_r($loc["loc_name"]);
//   print_r($loc["loc_checklist_id"]);

//   echo "<br>";
  
// }
// die();
  
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
	$('#hosp').load('power_sfty_chklist/power_sfty_chklst_count.php').fadeIn("slow");
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
                            Power Safety Checklist
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>
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
								<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  <?=$rowHead[0];?></label>
										<div class="col-lg-12" style="padding-top: 10px;"></div>
									<div class="col-lg-2" ><?=$rowHead[0];?></div>
											<div class="col-lg-4">
												<select type="text" 
												name="hosp_3_srce_powr_yn" 
												id="hosp_3_srce_powr_yn" 
												onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>

												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" 
												name="hosp_3_srce_powr_loc" 
												id="hosp_3_srce_powr_loc" onChange="LoadData();" 
												class="form-control" />

													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?> 
                               <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" 
												name="hosp_3_srce_powr_rmrk" 
												id="hosp_3_srce_powr_rmrk" 
												class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>

										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> <?=$rowHead[1];?></label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >
												<?=$rowHead[1];?></div>
											<div class="col-lg-4">
												<select type="text" 
												name="all_powr_wrking_yn" 
												id="all_powr_wrking_yn" onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" 
												name="all_powr_wrking_loc" 
												id="all_powr_wrking_loc" onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                                <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-12">
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" 
												name="all_powr_wrking_rmrk" 
												id="all_powr_wrking_rmrk" 
												class="form-control" 
												placeholder="Remarks" />
											</div>
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> 
												<?=$rowHead[2];?></label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >
												<?=$rowHead[2];?> </div>
											<div class="col-lg-4">
												<select type="text" 
												name="dg_shall_sufcnt_fuel_yn" 
												id="dg_shall_sufcnt_fuel_yn" 
												onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" 
												name="dg_shall_sufcnt_fuel_loc" 
												id="dg_shall_sufcnt_fuel_loc" 
												onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
							<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?> 
                               <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" 
												name="dg_shall_sufcnt_fuel_rmrk" 
												id="dg_shall_sufcnt_fuel_rmrk" 
												class="form-control" 
												placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  <?=$rowHead[3];?></label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >
											 <?=$rowHead[3];?></div>
											<div class="col-lg-4">
												<select type="text" 
												name="all_emergncy_machin_yn" 
												id="all_emergncy_machin_yn" 
												onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" 
												name="all_emergncy_machin_loc" 
												id="all_emergncy_machin_loc" 
												onChange="LoadData();" 
												class="form-control" />

								<option value="">Select</option>
	                           <?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>
													
													<!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-12">
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" 
												name="all_emergncy_machin_rmrk" 
												id="all_emergncy_machin_rmrk" 
												class="form-control" 
												placeholder="Remarks" />
											</div>
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"><?=$rowHead[4];?></label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >
												<?=$rowHead[4];?></div>
											<div class="col-lg-4">
												<select type="text" 
												name="dg_shall_readings_yn" 
												id="dg_shall_readings_yn" 
												onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" 
												name="dg_shall_readings_loc" 
												id="dg_shall_readings_loc" 
												onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-12"></div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" 
												name="dg_shall_readings_rmrk" 
												id="dg_shall_readings_rmrk" 
												class="form-control" 
												placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"><?=$rowHead[5];?></label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >
												<?=$rowHead[5];?></div>
											<div class="col-lg-4">
												<select type="text" 
												name="altrnt_line_safty_yn" 
												id="altrnt_line_safty_yn" onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" 
												name="altrnt_line_safty_loc" 
												id="altrnt_line_safty_loc" onChange="LoadData();" 
												class="form-control" />
													<option value="">Select</option>
							<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" 
												name="altrnt_line_safty_rmrk" 
												id="altrnt_line_safty_rmrk" class="form-control" 
												placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										
										
									

										<div class="col-lg-12">
											<label class="col-lg-3">Name</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="name" 
												id="name" 
												 placeholder="Name" 
												 class="form-control" />
											</div>
											<label class="col-lg-3">Sign</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="sign" id="sign" 
												 placeholder="Sign" class="form-control" />
											</div>
											<label class="col-md-3">Date & Time</label>
											<div class="col-md-4">
												<input type="text" autocomplete="off" name="list-date" 
												id="list-date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-md-4">
												<input type="time" 
												name="list-time" 
												id="list-time" placeholder="hh:mm" class="form-control" />
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
												class="btn btn-primary pull-right" />Submit ( Alt + s )</button>
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
												<th>Name</th>	
												<th>Sign</th>	
												<th>Date</th>	
												<th>Time</th>
												
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
                url: "power_sfty_chklist/editdata.php",
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
			$('#sr').load("power_sfty_chklist/load_power_sfty_chklst.php");
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
				url:"power_sfty_chklist/fetch_all_power_sfty_chklst_form.php",
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
						url:"power_sfty_chklist/insert_power_sfty_chklst_form.php",
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
				url:"power_sfty_chklist/fetch_single_power_sfty_chklst_form.php",
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
					$('#hosp_3_srce_powr_yn').val(data.hosp_3_srce_powr_yn);
					$('#hosp_3_srce_powr_loc').val(data.hosp_3_srce_powr_loc);
					$('#hosp_3_srce_powr_rmrk').val(data.hosp_3_srce_powr_rmrk);
	





				
					
                   $('#all_powr_wrking_yn').val(data.all_powr_wrking_yn);
				$('#all_powr_wrking_loc').val(data.all_powr_wrking_loc);
				$('#all_powr_wrking_rmrk').val(data.all_powr_wrking_rmrk);





			$('#dg_shall_sufcnt_fuel_yn').val(data.dg_shall_sufcnt_fuel_yn);
			$('#dg_shall_sufcnt_fuel_loc').val(data.dg_shall_sufcnt_fuel_loc);
			$('#dg_shall_sufcnt_fuel_rmrk').val(data.dg_shall_sufcnt_fuel_rmrk);
			$('#all_emergncy_machin_yn').val(data.all_emergncy_machin_yn);
			$('#all_emergncy_machin_loc').val(data.all_emergncy_machin_loc);
			$('#all_emergncy_machin_rmrk').val(data.all_emergncy_machin_rmrk);
			$('#dg_shall_readings_yn').val(data.dg_shall_readings_yn);
			$('#dg_shall_readings_loc').val(data.dg_shall_readings_loc);
			$('#dg_shall_readings_rmrk').val(data.dg_shall_readings_rmrk);
			$('#altrnt_line_safty_yn').val(data.altrnt_line_safty_yn);
			$('#altrnt_line_safty_loc').val(data.altrnt_line_safty_loc);
			$('#altrnt_line_safty_rmrk').val(data.altrnt_line_safty_rmrk);
					
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
					url:"power_sfty_chklist/delete_power_sfty_chklst_form.php",
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