<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
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
	$('#hosp').load('bio_sfty_chklst/bio_sfty_chklst_count.php').fadeIn("slow");
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
                            Bio Safety Checklist
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
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  BMW Dust Bins shall be available in all patient care areas with labelled Bio- safet sticker/ and covered</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >  BMW Dust Bins shall be available in all patient care areas with labelled Bio- safet sticker/ and covered</div>
											<div class="col-lg-4">
												<select type="text" name="bmw_dus_bins_yn" id="bmw_dus_bins_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>

												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="bmw_dus_bins_loc" id="bmw_dus_bins_loc" onChange="LoadData();" class="form-control" />

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
											<div class="col-lg-12"></div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="bmw_dus_bins_rmrk" id="bmw_dus_bins_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>

										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Puncture Proof container shall be used to discard needles</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >  Puncture Proof container shall be used to discard needles</div>
											<div class="col-lg-4">
												<select type="text" name="punctr_prof_contanr_yn" id="punctr_prof_contanr_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="punctr_prof_contanr_loc" id="punctr_prof_contanr_loc" onChange="LoadData();" class="form-control" />
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
												<input type="text" name="punctr_prof_contanr_rmrk" id="punctr_prof_contanr_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Bllod spillage kits shall be available for any spillgage.</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" > Bllod spillage kits shall be available for any spillgage.</div>
											<div class="col-lg-4">
												<select type="text" name="bllod_spillgage_yn" id="bllod_spillgage_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="bllod_spillgage_loc" id="bllod_spillgage_loc" onChange="LoadData();" class="form-control" />
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
											<div class="col-lg-12"></div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="bllod_spillgage_rmrk" id="bllod_spillgage_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> PPE shall be available and used for protection</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" > PPE shall be available and used for protection</div>
											<div class="col-lg-4">
												<select type="text" name="ppe_prctn_yn" id="ppe_prctn_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="ppe_prctn_loc" id="ppe_prctn_loc" onChange="LoadData();" class="form-control" />

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
											<div class="col-lg-12"></div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="ppe_prctn_rmrk" id="ppe_prctn_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">Central Biomedical area shall have weighing machine. It shall be restricted/fenced/secured with bio safety signage. Rubber hard gloves and gum boot shall be available. </label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Central Biomedical area shall have weighing machine</div>
											<div class="col-lg-4">
												<select type="text" name="central_biomtrc_avalbl_yn" id="central_biomtrc_avalbl_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="central_biomtrc_avalbl_loc" id="central_biomtrc_avalbl_loc" onChange="LoadData();" class="form-control" />
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
												<input type="text" name="central_biomtrc_avalbl_rmrk" id="central_biomtrc_avalbl_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">   Needle prick injury prevention and exposure safety guidelines poster shall be displayed including do not recap guidelines.</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2">   Needle prick injury prevention and exposure safety</div>
											<div class="col-lg-4">
												<select type="text" name="needle_prick_gudline_yn" id="needle_prick_gudline_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="needle_prick_gudline_loc" id="needle_prick_gudline_loc" onChange="LoadData();" class="form-control" />
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
												<input type="text" name="needle_prick_gudline_rmrk" id="needle_prick_gudline_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Staff shall be trained on biosafety and universal precautions.</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" > Staff shall be trained on biosafety and universal precautions.</div>
											<div class="col-lg-4">
												<select type="text" name="staff_prcution_yn" id="staff_prcution_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="staff_prcution_loc" id="staff_prcution_loc" onChange="LoadData();" class="form-control" />
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
												<input type="text" name="staff_prcution_rmrk" id="staff_prcution_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  Staff shall be immunized for hepatitis.</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >  Staff shall be immunized for hepatitis.</div>
											<div class="col-lg-4">
												<select type="text" name="staff_hepatitis_yn" id="staff_hepatitis_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="staff_hepatitis_loc" id="staff_hepatitis_loc" onChange="LoadData();" class="form-control" />
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
												<input type="text" name="staff_hepatitis_rmrk" id="staff_hepatitis_rmrk" class="form-control" placeholder="Remarks" />
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
                <p style= colspan=6 height="28" align="center" valign=middle><b><font size=6 color="#000000">Bio Safety Checklist</font></b></p>
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
                url: "bio_sfty_chklst/editdata.php",
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
			$('#sr').load("bio_sfty_chklst/load_bio_sfty_chklst.php");
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
				url:"bio_sfty_chklst/fetch_all_bio_sfty_chklst_form.php",
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
						url:"bio_sfty_chklst/insert_bio_sfty_chklst_form.php",
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
				url:"bio_sfty_chklst/fetch_single_bio_sfty_chklst_form.php",
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
					$('#bmw_dus_bins_yn') .val(data.bmw_dus_bins_yn);
					$('#bmw_dus_bins_loc') .val(data.bmw_dus_bins_loc);
					$('#bmw_dus_bins_rmrk') .val(data.bmw_dus_bins_rmrk);
					$('#punctr_prof_contanr_yn') .val(data.punctr_prof_contanr_yn);
					$('#punctr_prof_contanr_loc') .val(data.punctr_prof_contanr_loc);
					$('#punctr_prof_contanr_rmrk') .val(data.punctr_prof_contanr_rmrk);
					$('#bllod_spillgage_yn') .val(data.bllod_spillgage_yn);
					$('#bllod_spillgage_loc') .val(data.bllod_spillgage_loc);
					$('#bllod_spillgage_rmrk') .val(data.bllod_spillgage_rmrk);
					$('#ppe_prctn_yn') .val(data.ppe_prctn_yn);
					$('#ppe_prctn_loc') .val(data.ppe_prctn_loc);
					$('#ppe_prctn_rmrk') .val(data.ppe_prctn_rmrk);
					$('#central_biomtrc_avalbl_yn') .val(data.central_biomtrc_avalbl_yn);
					$('#central_biomtrc_avalbl_loc') .val(data.central_biomtrc_avalbl_loc);
					$('#central_biomtrc_avalbl_rmrk') .val(data.central_biomtrc_avalbl_rmrk);
					$('#needle_prick_gudline_yn') .val(data.needle_prick_gudline_yn);
					$('#needle_prick_gudline_loc') .val(data.needle_prick_gudline_loc);
					$('#needle_prick_gudline_rmrk') .val(data.needle_prick_gudline_rmrk);
					$('#staff_prcution_yn') .val(data.staff_prcution_yn);
					$('#staff_prcution_loc') .val(data.staff_prcution_loc);
					$('#staff_prcution_rmrk') .val(data.staff_prcution_rmrk);
					$('#staff_hepatitis_yn') .val(data.staff_hepatitis_yn);
					$('#staff_hepatitis_loc') .val(data.staff_hepatitis_loc);
					$('#staff_hepatitis_rmrk') .val(data.staff_hepatitis_rmrk);
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
					url:"radtin_sfty_chklst/delete_radtin_sfty_chklst_form.php",
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