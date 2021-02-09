<?php

  // ALTER TABLE `tbl_senti_det` ADD `senti_unp_vent_aft_ans_det` TEXT NULL AFTER `senti_recd`, ADD `senti_dth_rel_ans_det` TEXT NULL AFTER `senti_unp_vent_aft_ans_det`, ADD `senti_any_adv_ans_evt_det` TEXT NULL AFTER `senti_dth_rel_ans_det`, ADD `senti_any_adv_surg_evt_det` TEXT NULL AFTER `senti_any_adv_ans_evt_det`;

  // ALTER TABLE `tbl_senti_det_addon` ADD `senti_unp_vent_aft_ans_det` TEXT NULL AFTER `senti_recd`, ADD `senti_dth_rel_ans_det` TEXT NULL AFTER `senti_unp_vent_aft_ans_det`, ADD `senti_any_adv_ans_evt_det` TEXT NULL AFTER `senti_dth_rel_ans_det`, ADD `senti_any_adv_surg_evt_det` TEXT NULL AFTER `senti_any_adv_ans_evt_det`;

	error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
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
	$('#senti').load('senti_count.php').fadeIn("slow");
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
<?php include"superadmin-nav-bar.php";?>
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
                            Sentinel Event Related to Surgery and Anesthetia &nbsp;

                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: white;font-weight: bold;" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
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

													$qry = "SELECT COUNT(*) as total FROM tbl_senti_det WHERE year(senti_dt_surg_dn) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as comp FROM tbl_senti_det LEFT JOIN tbl_huf ON tbl_senti_det.huf_id = tbl_huf.huf_id WHERE (senti_nm_surg_pl!='' AND senti_nm_surg_pl!='0') AND year(senti_dt_surg_dn) = '$yr' ";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notcomp  FROM tbl_senti_det LEFT JOIN tbl_huf ON tbl_senti_det.huf_id = tbl_huf.huf_id WHERE (senti_nm_surg_pl='' OR senti_nm_surg_pl='0' ) AND year(senti_dt_surg_dn) = '$yr' ";
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

												<hr />
												<label class="col-lg-2" style=" background-color: #d0dce9;">
													<u> Record 1</u></label>
											</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the Surgery Planned</label>
											<div class="col-lg-6">
												<input type="text" onKeyup="get_sel_surg1(this.value);" name="mo1" id="mo1" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of Surgery Done</label>
											<div class="col-lg-6">
												<input type="text" onKeyup="get_sel_surg2(this.value);" name="mo2" id="mo2" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Surgery Planned</label>
											<div class="col-lg-3">	
												<input type="text" onChange="get_sel_dt1(this.value);" autocomplete="off" name="mo3" id="mo3" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Surgery Done</label>
											<div class="col-lg-3">	
												<input type="text" onChange="get_sel_dt2(this.value);" autocomplete="off" name="mo4" id="mo4" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Type of Anesthetia Planned</label>
											<div class="col-lg-5">
												<select type="text" onChange="get_sel_ans1(this.value);" name="mo5" id="mo5" class="form-control" >
													<option value="">Select Type of Anesthetia Planned</option>
													<option value="LA">LA</option>
													<option value="Spinal">Spinal</option>
													<option value="Short GA">Short GA</option>
													<option value="Long GA">Long GA</option>
													<option value="Sedation">Sedation</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Type of Anesthetia Given</label>
											<div class="col-lg-5">
												<select type="text" onChange="get_sel_ans2(this.value);" name="mo6" id="mo6" class="form-control" >
													<option value="">Select Type of Anesthetia Given</option>
													<option value="LA">LA</option>
													<option value="Spinal">Spinal</option>
													<option value="Short GA">Short GA</option>
													<option value="Long GA">Long GA</option>
													<option value="Sedation">Sedation</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Rescheduling of Surgery Done</label>
											<div class="col-lg-3">
												<select type="text" name="mo7" id="mo7" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-5">
												<textarea type="text" name="mo8" id="mo8" class="form-control" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Unplanned return to OT</label>
											<div class="col-lg-3">
												<select  name="mo9" id="mo9" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-5">
												<textarea type="text" name="mo10" id="mo10" class="form-control" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Procedure Followed to Prevent Adverse Events.e. WP, WS, WS</label>
											<div class="col-lg-3">
												<select type="text" name="mo11" id="mo11" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="Yes">Yes (Confirmation by WHO surgical Safety Checklist Filled)</option>
													<option value="No">No(if Not filled or not attached)</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Appropriate Prophylactic antibiotics given within stipulated time</label>
											<div class="col-lg-3">
												<select type="text" name="mo12" id="mo12" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="Yes">Yes (confirmed by Preoprative Checklist)</option>
													<option value="No">No (if not filled)</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Change in surgery planned intraoperatively</label>
											<div class="col-lg-3">
												<select type="text" name="mo13" id="mo13" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Rexploration Done</label>
											<div class="col-lg-3">
												<select type="text" name="mo14" id="mo14" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">PAC done</label>
											<div class="col-lg-3">
												<select type="text" name="mo15" id="mo15" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="Yes">Yes (confirmed by filled PAC form)</option>
													<option value="No">No (If not filled)</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Modification in Anesthetia Plan</label>
											<div class="col-lg-3">
												<select type="text" name="mo16" id="mo16" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-5">
												<textarea type="text" name="mo17" id="mo17" class="form-control" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Unplanned Ventilation after anesthetia</label>
											<div class="col-lg-3">
												<select type="text" name="mo18" id="mo18" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-5">
												<input type="text" name="mo18_r" id="mo18_r" class="form-control" placeholder="Details" />
											</div>

										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Death related to anesthetia</label>
											<div class="col-lg-3">
												<select type="text" name="mo19" id="mo19" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-5">
												<input type="text" name="mo19_r" id="mo19_r" class="form-control" placeholder="Details" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Any Adverse Anesthetia Event</label>
											<div class="col-lg-3">
												<select type="text" name="mo20" id="mo20" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-5">
												<input type="text" name="mo20_r" id="mo20_r" class="form-control" placeholder="Details" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Any Adverse Surgery event</label>
											<div class="col-lg-3">
												<select type="text" name="mo21" id="mo21" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-5">
												<input type="text" name="mo21_r" id="mo21_r" class="form-control" placeholder="Details" />
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
											<div id="Old_Data" ></div>
											<div class="col-lg-12">
												<div class="col-lg-10"></div>
												<div class="col-lg-2" id="addButton">
												 <button style="color:white;font-weight: bold;" type="button" name="add" id="add" class="btn btn-info">Add New Record</button>
												</div>
											</div>
											<div id="newDatatoSave" ></div>
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
												<th>Name of the Surgery Planned</th>
												<th>Name of Surgery Done</th>
												<th>Date of Surgery Planned</th>
												<th>Date of Surgery Done</th>
												<th>Type of Anesthetia Planned</th>
												<th>Type of Anesthetia given</th>
												<th>Resceduling of Surgery Done</th>
												<th>Unplanned return to OT</th>
												<th>Procedure Followed to Prevent Adverse Events.e. WP, WS, WS</th>
												<th>Appropriate Prophylactic antibiotics given within stipulated time</th>
												<th>Change in surgery planned intraoperatively</th>
												<th>Rexploration Done</th>
												<th>PAC done</th>
												<th>Modification in Anesthetia Plan</th>
												<th>unplanned Ventilation after anesthetia</th>
												<th>Death related to anesthetia</th>
												<th>Any Adverse Anesthetia Event</th>
												<th>Any Adverse Surgery event</th>							
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									
									<form method="post" action="../excel/SESA/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-3" style="color: black;">	
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
								<div class="col-lg-1">
										<input type="text" name="frdt" id="frdt" value="<?php echo $frdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-1">
									<input type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input type="submit" name="export" class="btn btn-danger" value="Excel" style="color:white;font-weight: bold;"/>
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div class="col-lg-12" id="senti">
					
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
								<input  type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1">To</label>
							<div class="col-lg-3">
								<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button style="color:white;font-weight: bold;" type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_surg" style="height:400px;"></div>
					</div>
					<div class="col-sm-12">
						<div id="line_chart_ans" style="height:400px;"></div>
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
	function get_sel_surg1(val){
		if(val){
			var surg = $('#mo2').val(); 
			if(val == surg)
			{
				$('#mo13').val('No'); 
			}else{
				$('#mo13').val('Yes'); 
			}
		}
	}
	function get_sel_surg2(val){
		if(val){
			var surg = $('#mo1').val(); 
			if(val == surg)
			{
				$('#mo13').val('No'); 
			}else{
				$('#mo13').val('Yes'); 
			}
		}
	}
	function get_sel_dt1(val){
		if(val){
			var dt = $('#mo4').val(); 
			if(val == dt)
			{
				$('#mo7').val('No'); 
			}else{
				$('#mo7').val('Yes'); 
			}
		}
	}
	function get_sel_dt2(val){
		if(val){
			var dt = $('#mo3').val(); 
			if(val == dt)
			{
				$('#mo7').val('No'); 
			}else{
				$('#mo7').val('Yes'); 
			}
		}
	}
	function get_sel_ans1(val){
		if(val){
			var ans = $('#mo6').val(); 
			if(val == ans)
			{
				$('#mo16').val('No'); 
			}else{
				$('#mo16').val('Yes'); 
			}
		}
	}
	function get_sel_ans2(val){
		if(val){
			var ans = $('#mo5').val(); 
			if(val == ans)
			{
				$('#mo16').val('No'); 
			}else{
				$('#mo16').val('Yes'); 
			}
		}
	}

	function get_sel_surg11(val,divc){
		if(val){
			var surg = $('#mo212'+divc).val(); 
			if(val == surg)
			{
				$('#mo131'+divc).val('No'); 
			}else{
				$('#mo131'+divc).val('Yes'); 
			}
		}
	}
	function get_sel_surg21(val,divc){
		if(val){
			var surg = $('#mo112'+divc).val(); 
			if(val == surg)
			{
				$('#mo131'+divc).val('No'); 
			}else{
				$('#mo131'+divc).val('Yes'); 
			}
		}
	}
	function get_sel_dt11(val,divc){
		if(val){
			var dt = $('#mo41'+divc).val(); 
			if(val == dt)
			{
				$('#mo71'+divc).val('No'); 
			}else{
				$('#mo71'+divc).val('Yes'); 
			}
		}
	}
	function get_sel_dt21(val,divc){
		if(val){
			var dt = $('#mo31'+divc).val(); 
			if(val == dt)
			{
				$('#mo71'+divc).val('No'); 
			}else{
				$('#mo71'+divc).val('Yes'); 
			}
		}
	}
	function get_sel_ans11(val,divc){
		if(val){
			var ans = $('#mo61'+divc).val(); 
			if(val == ans)
			{
				$('#mo161'+divc).val('No'); 
			}else{
				$('#mo161'+divc).val('Yes'); 
			}
		}
	}
	function get_sel_ans21(val,divc){
		if(val){
			var ans = $('#mo51'+divc).val(); 
			if(val == ans)
			{
				$('#mo161'+divc).val('No'); 
			}else{
				$('#mo161'+divc).val('Yes'); 
			}
		}
	}

	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#mo3").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#mo4").datepicker({
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
			$("#mo3").datepicker();
			$("#mo4").datepicker();
			//$("#mo4").timepicker();
			//$("#mo9").timepicker();
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
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#newDatatoSave div').empty();
							$('#Old_Data div').empty();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
		});
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt3', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt4', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_senti_form.php",
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
					url:"insert_senti_form.php",
					method:'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert(data);
						$('#user_form')[0].reset();
						$('#adm').hide('fast');
						$('#newDatatoSave div').empty();
							$('#Old_Data div').empty();
						$('#bx1').hide('fast');
						$('#bx2').show('fast');
						$('#add_btn').show('fast');
						//$('#myModal').modal('hide');
						dataTable.ajax.reload();
					}
				});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_senti_form.php",
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
					$('#mo18').val(data.mo18);
					$('#mo19').val(data.mo19);
					$('#mo20').val(data.mo20);
					$('#mo21').val(data.mo21);
					$('#mo18_r').val(data.mo18_r);
					$('#mo19_r').val(data.mo19_r);
					$('#mo20_r').val(data.mo20_r);
					$('#mo21_r').val(data.mo21_r);
					$('#user_id').val(data.sr_no);
					if(data.oldDataCount>0){
          	var j=1;
          	for(var i=0; i < data.oldDataCount; i++){

          var html ='<div id="row'+i+'"  ><div class="col-lg-12"><hr /><label class="col-lg-2" style="background-color: #d0dce9;"><u> Record '+(++j)+'</u></label></div>';

          html = '<div id="row'+i+'"  ><div class="col-lg-12"><label class="col-lg-4">Name of the Surgery Planned</label><div class="col-lg-6"><input type="text" onKeyup="get_sel_surg11_edit(this.value,'+i+');" name="mo112_edit[]" id="mo112_edit'+i+'"  value="'+data.one[i]+'" class="form-control" readonly /></div></div>' ;

            html += '<div class="col-lg-12"><label class="col-lg-4">Name of Surgery Done</label><div class="col-lg-6">	<input type="text" onKeyup="get_sel_surg21(this.value,'+i+');" name="mo212_edit[]" id="mo212_edit'+i+'"  value="'+data.two[i]+'" class="form-control" readonly /></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Date of Surgery Planned</label><div class="col-lg-3"><input type="text" onChange="get_sel_dt11(this.value,'+i+');" autocomplete="off" name="mo31_edit[]" id="mo31_edit'+i+'"  value="'+data.three[i]+'"" placeholder="yyyy-mm-dd" class="form-control dateDisplay" readonly /></div></div>';

           html += '<div class="col-lg-12"><label class="col-lg-4">Date of Surgery Done</label><div class="col-lg-3"><input type="text" onChange="get_sel_dt21(this.value,'+i+');" autocomplete="off" name="mo41_edit[]" id="mo41_edit'+i+'"  value="'+data.four[i]+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" readonly /></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Type of Anesthetia Planned</label><div class="col-lg-5"><select type="text" onChange="get_sel_ans11(this.value,'+i+');" name="mo51_edit[]" id="mo51_edit'+i+'" onChange="LoadData();" class="form-control" disabled><option value="'+data.five[i]+'">'+data.five[i]+'</option></select></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Type of Anesthetia Given</label><div class="col-lg-5"><select type="text" onChange="get_sel_ans2(this.value,'+i+');" name="mo61_edit[]" id="mo61_edit'+i+'" onChange="LoadData();" class="form-control" disabled><option value="'+data.six[i]+'">'+data.six[i]+'</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Rescheduling of Surgery Done</label><div class="col-lg-3"><select type="text" name="mo71_edit[]" id="mo71_edit'+i+'" class="form-control" disabled><option value="'+data.seven[i]+'">'+data.seven[i]+'</option></select></div><div class="col-lg-5"><textarea type="text" name="mo81_edit[]" id="mo81_edit'+i+'" class="form-control" readonly>'+data.eight[i]+'</textarea></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Unplanned return to OT</label><div class="col-lg-3"><select type="text" name="mo91[]" id="mo91'+i+'" class="form-control" disabled><option value="'+data.nine[i]+'">'+data.nine[i]+'</option></select></div><div class="col-lg-5"><textarea type="text" name="mo101_edit[]" id="mo101_edit'+i+'" class="form-control" readonly>'+data.ten[i]+'</textarea></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Procedure Followed to Prevent Adverse Events.e. WP, WS, WS</label><div class="col-lg-3"><select type="text" name="mo111_edit[]" id="mo111_edit'+i+'" class="form-control" disabled><option value="'+data.eleven[i]+'">'+data.eleven[i]+'</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Appropriate Prophylactic antibiotics given within stipulated time</label><div class="col-lg-3"><select type="text" name="mo121_edit[]" id="mo121_edit'+i+'" class="form-control" disabled><option value="'+data.twelve[i]+'">'+data.twelve[i]+'</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Change in surgery planned intraoperatively</label><div class="col-lg-3"><select type="text" name="mo131_edit[]" id="mo131_edit'+i+'" class="form-control" disabled><option value="'+data.thirteen[i]+'">'+data.thirteen[i]+'</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Rexploration Done</label><div class="col-lg-3"><select type="text" name="mo141_edit[]" id="mo141_edit'+i+'" class="form-control" disabled><option value="'+data.fourteen[i]+'">'+data.fourteen[i]+'</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">PAC done</label><div class="col-lg-3"><select type="text" name="mo151_edit[]" id="mo151_edit'+i+'" class="form-control" disabled><option value="'+data.fifteen[i]+'">'+data.fifteen[i]+'</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Modification in Anesthetia Plan</label><div class="col-lg-3"><select type="text" name="mo161_edit[]" id="mo161_edit'+i+'" class="form-control" disabled><option value="'+data.sixteen[i]+'">'+data.sixteen[i]+'</option></select></div><div class="col-lg-5"><textarea type="text" name="mo171_edit[]" id="mo171_edit'+i+'" class="form-control" readonly>'+data.seventeen[i]+'</textarea></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Unplanned Ventilation after anesthetia</label><div class="col-lg-3"><select type="text" name="mo181_edit[]" id="mo181_edit'+i+'" class="form-control" disabled><option value="'+data.eighteen[i]+'">'+data.eighteen[i]+'</option></select></div><div class="col-lg-5"><input type="text" name="mo181_r_edit[]" id="mo181_r_edit'+i+'" class="form-control" placeholder="Details" value="'+data.eighteen_r[i]+'" disabled/></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Death related to anesthetia</label><div class="col-lg-3"><select type="text" name="mo191_edit[]" id="mo191_edit'+i+'" class="form-control" disabled><option value="'+data.nineteen[i]+'">'+data.nineteen[i]+'</option></select></div><div class="col-lg-5"><input type="text" name="mo191_r_edit[]" id="mo191_r_edit'+i+'" class="form-control" placeholder="Details" value="'+data.nineteen_r[i]+'" disabled/></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Any Adverse Anesthetia Event</label><div class="col-lg-3"><select type="text" name="mo201_edit[]" id="mo201_edit'+i+'" class="form-control" disabled><option value="'+data.twenty[i]+'">'+data.twenty[i]+'</option></select></div><div class="col-lg-5"><input type="text" name="mo201_r_edit[]" id="mo201_r_edit'+i+'" class="form-control" placeholder="Details" value="'+data.twenty_r[i]+'" disabled/></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Any Adverse Surgery event</label><div class="col-lg-3"><select type="text" name="mo211_edit[]" id="mo211_edit'+i+'" class="form-control" disabled><option value="'+data.twentyone[i]+'">'+data.twentyone[i]+'</option></select></div><div class="col-lg-5"><input type="text" name="mo211_r_edit[]" id="mo211_r_edit'+i+'" class="form-control" placeholder="Details" value="'+data.twentyone_r[i]+'" disabled/></div></div>';

         
  
          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button type="button" name="edit" id="'+data.twentytwo[i]+'"  class="btn btn-info edit_data">Edit Record No. '+j+'</button></div></div>';
          html +='<div class="col-lg-12"><hr /></div></div>';
         
          $('#Old_Data').append(html);
          }
      }
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
		$('#mo3').mask('9999-99-99');// for Date
		$('#mo4').mask('9999-99-99');// for Date
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
				// chart surg
					var jsonData = $.ajax({
					url: 'senti_surg_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Surgery',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_surg'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				// Chart ans
					var jsonData = $.ajax({
					url: 'senti_an_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Anesthetia',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_ans'));
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
          var html = '<div id="row'+divcount+'"  ><div class="col-lg-12"><label class="col-lg-4">Name of the Surgery Planned</label><div class="col-lg-6"><input type="text" onKeyup="get_sel_surg11(this.value,'+divcount+');" name="mo112[]" id="mo112'+divcount+'" class="form-control" /></div></div>' ;

            html += '<div class="col-lg-12"><label class="col-lg-4">Name of Surgery Done</label><div class="col-lg-6">	<input type="text" onKeyup="get_sel_surg21(this.value,'+divcount+');" name="mo212[]" id="mo212'+divcount+'" class="form-control" /></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Date of Surgery Planned</label><div class="col-lg-3"><input type="text" onChange="get_sel_dt11(this.value,'+divcount+');" autocomplete="off" name="mo31[]" id="mo31'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" /></div></div>';

           html += '<div class="col-lg-12"><label class="col-lg-4">Date of Surgery Done</label><div class="col-lg-3"><input type="text" onChange="get_sel_dt21(this.value,'+divcount+');" autocomplete="off" name="mo41[]" id="mo41'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" /></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Type of Anesthetia Planned</label><div class="col-lg-5"><select type="text" onChange="get_sel_ans11(this.value,'+divcount+');" name="mo51[]" id="mo51'+divcount+'" onChange="LoadData();" class="form-control"><option value="">Select Type of Anesthetia Planned</option><option value="LA">LA</option><option value="Spinal">Spinal</option><option value="Short GA">Short GA</option><option value="Long GA">Long GA</option><option value="Sedation">Sedation</option></select></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Type of Anesthetia Given</label><div class="col-lg-5"><select type="text" onChange="get_sel_ans2(this.value,'+divcount+');" name="mo61[]" id="mo61'+divcount+'" onChange="LoadData();" class="form-control"><option value="">Select Type of Anesthetia Given</option><option value="LA">LA</option><option value="Spinal">Spinal</option><option value="Short GA">Short GA</option><option value="Long GA">Long GA</option><option value="Sedation">Sedation</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Rescheduling of Surgery Done</label><div class="col-lg-3"><select type="text" name="mo71[]" id="mo71'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-5"><textarea type="text" name="mo81[]" id="mo81'+divcount+'" class="form-control" ></textarea></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Unplanned return to OT</label><div class="col-lg-3"><select type="text" name="mo91[]" id="mo91'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-5"><textarea type="text" name="mo101[]" id="mo101'+divcount+'" class="form-control" ></textarea></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Procedure Followed to Prevent Adverse Events.e. WP, WS, WS</label><div class="col-lg-3"><select type="text" name="mo111[]" id="mo111'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes (Confirmation by WHO surgical Safety Checklist Filled)</option><option value="No">No(if Not filled or not attached)</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Appropriate Prophylactic antibiotics given within stipulated time</label><div class="col-lg-3"><select type="text" name="mo121[]" id="mo121'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes (confirmed by Preoprative Checklist)</option><option value="No">No (if not filled)</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Change in surgery planned intraoperatively</label><div class="col-lg-3"><select type="text" name="mo131[]" id="mo131'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Rexploration Done</label><div class="col-lg-3"><select type="text" name="mo141[]" id="mo141'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">PAC done</label><div class="col-lg-3"><select type="text" name="mo151[]" id="mo151'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes (confirmed by filled PAC form)</option><option value="No">No (If not filled)</option></select></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Modification in Anesthetia Plan</label><div class="col-lg-3"><select type="text" name="mo161[]" id="mo161'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-5"><textarea type="text" name="mo171[]" id="mo171'+divcount+'" class="form-control" ></textarea></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Unplanned Ventilation after anesthetia</label><div class="col-lg-3"><select type="text" name="mo181[]" id="mo181'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-5"><input type="text" name="mo181_r[]" id="mo181_r'+divcount+'" class="form-control" placeholder="Details" /></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Death related to anesthetia</label><div class="col-lg-3"><select type="text" name="mo191[]" id="mo191'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-5"><input type="text" name="mo191_r[]" id="mo191_r'+divcount+'" class="form-control" placeholder="Details" /></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Any Adverse Anesthetia Event</label><div class="col-lg-3"><select type="text" name="mo201[]" id="mo201'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-5"><input type="text" name="mo201_r[]" id="mo201_r'+divcount+'" class="form-control" placeholder="Details" /></div></div>';

          html +=' <div class="col-lg-12"><label class="col-lg-4">Any Adverse Surgery event</label><div class="col-lg-3"><select type="text" name="mo211[]" id="mo211'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-5"><input type="text" name="mo211_r[]" id="mo211_r'+divcount+'" class="form-control" placeholder="Details" /></div></div>';

          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button style="color:white;" type="button" name="remove" id="'+divcount+'" class="btn btn-danger btn_remove ">Delete</button></div></div>';
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
                     <h4 class="modal-title panel panel-info"> <div class="panel-heading" style="padding:7px;">Sentinel Event related to surgery and anesthetia  </div></h4>  

                           
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_edit">
                      
                     <div class="col-lg-12">
                      <label class="col-lg-4">Name of the Surgery Planned</label>
                      <div class="col-lg-6">
                        <input type="text" onKeyup="get_sel_surg1_edit(this.value);" name="mo1_edit" id="mo1_edit" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Name of Surgery Done</label>
                      <div class="col-lg-6">
                        <input type="text" onKeyup="get_sel_surg2_edit(this.value);" name="mo2_edit" id="mo2_edit" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Date of Surgery Planned</label>
                      <div class="col-lg-3">  
                        <input type="text" onChange="get_sel_dt1_edit(this.value);" autocomplete="off" name="mo3_edit" id="mo3_edit" placeholder="yyyy-mm-dd" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Date of Surgery Done</label>
                      <div class="col-lg-3">  
                        <input type="text" onChange="get_sel_dt2_edit(this.value);" autocomplete="off" name="mo4_edit" id="mo4_edit" placeholder="yyyy-mm-dd" class="form-control" />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Type of Anesthetia Planned</label>
                      <div class="col-lg-5">
                        <select type="text" onChange="get_sel_ans1_edit(this.value);" name="mo5_edit" id="mo5_edit" class="form-control" >
                          <option value="">Select Type of Anesthetia Planned</option>
                          <option value="LA">LA</option>
                          <option value="Spinal">Spinal</option>
                          <option value="Short GA">Short GA</option>
                          <option value="Long GA">Long GA</option>
                          <option value="Sedation">Sedation</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Type of Anesthetia Given</label>
                      <div class="col-lg-5">
                        <select type="text" onChange="get_sel_ans2_edit(this.value);" name="mo6_edit" id="mo6_edit" class="form-control" >
                          <option value="">Select Type of Anesthetia Given</option>
                          <option value="LA">LA</option>
                          <option value="Spinal">Spinal</option>
                          <option value="Short GA">Short GA</option>
                          <option value="Long GA">Long GA</option>
                          <option value="Sedation">Sedation</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Rescheduling of Surgery Done</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo7_edit" id="mo7_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                      <div class="col-lg-5">
                        <textarea type="text" name="mo8_edit" id="mo8_edit" class="form-control" ></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Unplanned return to OT</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo9_edit" id="mo9_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                      <div class="col-lg-5">
                        <textarea type="text" name="mo10_edit" id="mo10_edit" class="form-control" ></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Procedure Followed to Prevent Adverse Events.e. WP, WS, WS</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo11_edit" id="mo11_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="Yes">Yes (Confirmation by WHO surgical Safety Checklist Filled)</option>
                          <option value="No">No(if Not filled or not attached)</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Appropriate Prophylactic antibiotics given within stipulated time</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo12_edit" id="mo12_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="Yes">Yes (confirmed by Preoprative Checklist)</option>
                          <option value="No">No (if not filled)</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Change in surgery planned intraoperatively</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo13_edit" id="mo13_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Rexploration Done</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo14_edit" id="mo14_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">PAC done</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo15_edit" id="mo15_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="Yes">Yes (confirmed by filled PAC form)</option>
                          <option value="No">No (If not filled)</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Modification in Anesthetia Plan</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo16_edit" id="mo16_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                      <div class="col-lg-5">
                        <textarea type="text" name="mo17_edit" id="mo17_edit" class="form-control" ></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Unplanned Ventilation after anesthetia</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo18_edit" id="mo18_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                      <div class="col-lg-5">

                      	<input type="text" name="mo18_r_edit" id="mo18_r_edit" class="form-control" placeholder="Details" />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Death related to anesthetia</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo19_edit" id="mo19_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                      <div class="col-lg-5">

                      	<input type="text" name="mo19_r_edit" id="mo19_r_edit" class="form-control" placeholder="Details" />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Any Adverse Anesthetia Event</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo20_edit" id="mo20_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                      <div class="col-lg-5">

                      	<input type="text" name="mo20_r_edit" id="mo20_r_edit" class="form-control" placeholder="Details" />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="col-lg-4">Any Adverse Surgery event</label>
                      <div class="col-lg-3">
                        <select type="text" name="mo21_edit" id="mo21_edit" class="form-control" >
                          <option value="">Select Yes/No</option>
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                      <div class="col-lg-5">

                      	<input type="text" name="mo21_r_edit" id="mo21_r_edit" class="form-control" placeholder="Details" />
                      </div>
                    </div>
                      <br/>
                 <div class="col-lg-12">
								<hr />
					</div>

                    <input type="hidden" name="user_idEdit" id="user_idEdit" />
                     <input type="hidden" name="tbl_senti_det_id" id="tbl_senti_det_id" />
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

            var senti_det_addon_id = $(this).attr("id");
            var action = "view"; 
           //alert(senti_det_addon_id);
            
           $.ajax({  
                url:"fetch_single_senti_form_addon.php",  
                method:"POST",  
                data:{senti_det_addon_id:senti_det_addon_id,action:action},  
                dataType:"json",  
                success:function(data){ 
               
                    $('#mo1_edit').val(data.mo1_edit);
                    $('#mo2_edit').val(data.mo2_edit);
                    $('#mo3_edit').val(data.mo3_edit);
                    $('#mo4_edit').val(data.mo4_edit);
                    $('#mo5_edit').val(data.mo5_edit);
                    $('#mo6_edit').val(data.mo6_edit);
                    $('#mo7_edit').val(data.mo7_edit);
                    $('#mo8_edit').val(data.mo8_edit);
                    $('#mo9_edit').val(data.mo9_edit);
                    $('#mo10_edit').val(data.mo10_edit);
                    $('#mo11_edit').val(data.mo11_edit);
                    $('#mo12_edit').val(data.mo12_edit);
                    $('#mo13_edit').val(data.mo13_edit);
                    $('#mo14_edit').val(data.mo14_edit);
                    $('#mo15_edit').val(data.mo15_edit);
                    $('#mo16_edit').val(data.mo16_edit);
                    $('#mo17_edit').val(data.mo17_edit);
                    $('#mo18_edit').val(data.mo18_edit);
                    $('#mo19_edit').val(data.mo19_edit);
                    $('#mo20_edit').val(data.mo20_edit);
                    $('#mo21_edit').val(data.mo21_edit);
                     $('#mo18_r_edit').val(data.mo18_r_edit);
                    $('#mo19_r_edit').val(data.mo19_r_edit);
                    $('#mo20_r_edit').val(data.mo20_r_edit);
                    $('#mo21_r_edit').val(data.mo21_r_edit); 
          			$('#tbl_senti_det_id').val(data.tbl_senti_det_id); 

                    $('#user_idEdit').val(data.tbl_senti_det_addon_id); 
 

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
                     url:"fetch_single_senti_form_addon.php",  
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