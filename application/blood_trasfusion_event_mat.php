<?php
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
	$('#blood').load('blood_count.php').fadeIn("slow");
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
	<?php include"nav-bar-mat.php";?>
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
                            Blood Trasfusion Related Events &nbsp;

                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35); color: #fff;font-weight:bold;margin-right: 10px;
                            " onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
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

													$qry = "SELECT COUNT(*) as total FROM tbl_blood_fusion WHERE year(bld_dtreq) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as comp FROM tbl_blood_fusion  WHERE (bld_tat!='' AND bld_tat!='00:00') AND year(bld_dtreq) = '$yr' ";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notcomp FROM tbl_blood_fusion  WHERE (bld_tat='' OR bld_tat='00:00')AND year(bld_dtreq) = '$yr'";
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
								<br>
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
											<label class="col-lg-4">Type of Blood Product Requested</label>
											<div class="col-lg-3">
												<select type="text" name="mo1" id="mo1" class="form-control" >
													<option value="">Select Type</option>
													<option value="Whole Blood">Whole Blood</option>
													<option value="Red Blood Concentrate">Red Blood Concentrate(PRBC)</option>

<option value="Platelet Concentrate (PC)">Platelet Concentrate (PC)</option>
<option value="Fresh Frozen Plasma (FFP)">Fresh Frozen Plasma (FFP)</option>
<option value="Cryoprecipitated anti- haemophilic factor (Cryo-AHF)">Cryoprecipitated anti- haemophilic factor (Cryo-AHF)</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">No Units requested</label>
											<div class="col-lg-3">
												<input type="text" name="mo2" id="mo2" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Requisition/order</label>
											<div class="col-lg-3">	
												<input type="text" autocomplete="off" name="mo3" id="mo3" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Time of Requisition/order</label>
											<div class="col-lg-3">	
												<input type="time" name="mo4" id="mo4" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the blood bank to which blood product requested/ordered</label>
											<div class="col-lg-6">
												<input type="text" name="mo5" id="mo5" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Requested/Ordered by</label>
											<div class="col-lg-6">
												<input type="text" name="mo6" id="mo6" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date at which blood product received</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="mo7" id="mo7" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">No of units received</label>
											<div class="col-lg-3">
												<input type="text" name="mo8" id="mo8" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Time at which blood product received</label>
											<div class="col-lg-3">
												<input type="time" name="mo9" id="mo9" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">TAT of Blood Product</label>
											<div class="col-lg-3">
												<input type="text" name="mo10" id="mo10" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Blood Product Received By</label>
											<div class="col-lg-6">
												<input type="text" name="mo11" id="mo11" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">No of units transfused</label>
											<div class="col-lg-3">
												<input type="text" name="mo12" id="mo12" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Blood Transfusion Reaction observed</label>
											<div class="col-lg-3">
												<select type="text" name="mo13" id="mo13" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Wastage of Blood Product if any</label>
											<div class="col-lg-3">
												<select type="text" name="mo14" id="mo14" class="form-control" >
													<option value="">Select Yes/No</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
											<div class="col-lg-3">
												<input type="text" name="mo15" id="mo15" class="form-control" />
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
												<button style="color:white;font-weight:bold;" accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" />Submit ( Alt + s )</button>
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
												<th>Type of Blood Product Requested</th>
												<th>No Units requested</th>
												<th>Date of Requisition/order</th>
												<th>Time of Requisition/order</th>
												<th>Name of the blood bank to which blood product requested/ordered</th>
												<th>Requested/Ordered by</th>
												<th>Date at which blood product received</th>
												<th>No of units received</th>
												<th>Time at which blood product received</th>
												<th>TAT of Blood Product</th>
												<th>Blood Product Received By</th>
												<th>No of units transfused</th>
												<th>Blood Transfusion Reaction observed</th>
												<th>Wastage of Blood Product if any</th>					
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									
									<form method="post" action="../excel/BTE/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-3" style="color:black;">	
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
								<div class="col-lg-1">
										<input type="text" name="frdt" id="frdt" value="<?php echo $frdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-1">
									<input type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input style="color:white;font-weight:bold;" type="submit" name="export" class="btn btn-danger" value="Excel" />
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div class="col-lg-12" id="blood">
					
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
								<button style="color:white;font-weight:bold;" type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_bld" style="height:400px;"></div>
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
		$("#mo7").datepicker({
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
			$("#mo7").datepicker();
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
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#newDatatoSave div').empty();
			$('#Old_Data div').empty();
		});
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_blood_trfusion_form.php",
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
					url:"insert_blood_trfusion_form.php",
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
				url:"fetch_single_blood_trfusion_form.php",
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
					if(($('#mo1').val())==""){

                         $('#addButton').hide();
					}else{
						 $('#addButton').show();
					}
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
					$('#user_id').val(data.sr_no);

		if(data.oldDataCount>0){
          	var j=1;
          	for(var i=0; i < data.oldDataCount; i++){

          var html ='<div id="row'+i+'"  ><div class="col-lg-12"><label class="col-lg-2" style="background-color: #d0dce9;"><u> Record '+(++j)+'</u></label></div>';

        

          html +='<div class="col-lg-12"><label class="col-lg-4">Type of Blood Product Requested</label><div class="col-lg-3"><select type="text" name="mo1old[]" id="mo1old'+i+'" class="form-control" value="'+data.mo1_old[i]+'"  disabled><option value="'+data.mo1_old[i]+'" >'+data.mo1_old[i]+'</option></select></div></div>';

        

           html +='<div class="col-lg-12"><label class="col-lg-4">No Units requested</label><div class="col-lg-3"><input type="text" name="mo2old[]" id="mo2old'+i+'" class="form-control" value="'+data.mo2_old[i]+'" readonly/></div></div>'

          html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Requisition/order</label><div class="col-lg-2">	<input type="text" autocomplete="off" name="mo3old[]" id="mo3old'+i+'" value="'+data.mo3_old[i]+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" readonly /></div><div class="col-lg-2"><input type="time" name="mo4old[]" id="mo4old'+i+'" placeholder="hh:mm" value="'+data.mo4_old[i]+'" class="form-control" readonly/></div></div>';

          html +='<div class="col-lg-12"><label class="col-lg-4">Name of the blood bank to which blood product requested/ordered</label><div class="col-lg-6"><input type="text" name="mo5old[]" id="mo5old'+i+'" value="'+data.mo5_old[i]+'" class="form-control" readonly /></div></div>';


     html +='<div class="col-lg-12"><label class="col-lg-4">Requested/Ordered by</label><div class="col-lg-6"><input type="text" name="mo6old[]" value="'+data.mo6_old[i]+'" id="mo6old'+i+'" class="form-control" readonly/></div></div>';

   html +='<div class="col-lg-12"><label class="col-lg-4">Date at which blood product received</label><div class="col-lg-3"><input type="text" autocomplete="off" name="mo7old[]" id="mo7old'+i+'" value="'+data.mo7_old[i]+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" readonly/></div></div>';

   html +='<div class="col-lg-12"><label class="col-lg-4">No of units received</label><div class="col-lg-3"><input type="text" name="mo8old[]" value="'+data.mo8_old[i]+'" id="mo8old'+i+'" class="form-control" readonly /></div></div>';

            html +='<div class="col-lg-12"><label class="col-lg-4">Time at which blood product received</label><div class="col-lg-3"><input type="time" name="mo9old[]" id="mo9old'+i+'" value="'+data.mo9_old[i]+'" placeholder="hh:mm" class="form-control" readonly /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">TAT of Blood Product</label><div class="col-lg-3"><input type="text" name="mo10old[]" value="'+data.mo10_old[i]+'" id="mo10old'+i+'"class="form-control" readonly /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Blood Product Received By</label><div class="col-lg-6"><input type="text" name="mo11old[]" id="mo11old'+i+'" class="form-control" value="'+data.mo11_old[i]+'" readonly /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">No of units transfused</label><div class="col-lg-3"><input type="text" name="mo12old[]" value="'+data.mo12_old[i]+'" id="mo12old'+i+'" class="form-control" readonly/></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Blood Transfusion Reaction observed</label><div class="col-lg-3"><select type="text" name="mo13old[]" id="mo13old'+i+'" class="form-control" value="'+data.mo13_old[i]+'"  disabled><option value="'+data.mo13_old[i]+'" >'+data.mo13_old[i]+'</option></select></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Wastage of Blood Product if any</label><div class="col-lg-3"><select type="text" name="mo14old[]" id="mo14old'+i+'" class="form-control" value="'+data.mo14_old[i]+'" disabled><option value="'+data.mo14_old[i]+'" >'+data.mo14_old[i]+'</option></select></div><div class="col-lg-3"><input type="text" name="mo15old[]" id="mo15old'+i+'" class="form-control" value="'+data.mo15_old[i]+'" readonly/></div>';

         
  
          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button type="button" name="edit" id="'+data.bld_extra_id[i]+'"  class="btn btn-info edit_data">Edit Record No. '+j+'</button></div></div>';
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
		$('#mo7').mask('9999-99-99');// for Date
		//$('#mo4').mask('99:99');// for Date
		//$('#mo9').mask('99:99');// for Date
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
				// chart three
					var jsonData = $.ajax({
					url: 'bld_evt_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							//console.log(jsonData)
							var options = 
							{
								title:'Blood Trasfusion related events',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_bld'));
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
         
         

          var html = '<div id="row'+divcount+'"  ><div class="col-lg-12"><label class="col-lg-4">Type of Blood Product Requested</label><div class="col-lg-6"><select type="text" name="mo1new[]" id="mo1new'+divcount+'" class="form-control" ><option value="">Select Type</option><option value="Whole Blood">Whole Blood</option><option value="Red Blood Concentrate">Red Blood Concentrate(PRBC)</option><option value="Platelet Concentrate (PC)">Platelet Concentrate (PC)</option><option value="Fresh Frozen Plasma (FFP)">Fresh Frozen Plasma (FFP)</option><option value="Cryoprecipitated anti- haemophilic factor (Cryo-AHF)">Cryoprecipitated anti- haemophilic factor (Cryo-AHF)</option></select></div></div>';

           html +='<div class="col-lg-12"><label class="col-lg-4">No Units requested</label><div class="col-lg-3"><input type="text" name="mo2new[]" id="mo2new'+divcount+'" class="form-control" /></div></div>'

          html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Requisition/order</label><div class="col-lg-2">	<input type="text" autocomplete="off" name="mo3new[]" id="mo3new'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required /></div><div class="col-lg-2"><input type="time" name="mo4new[]" id="mo4new'+divcount+'" placeholder="hh:mm" class="form-control" required/></div></div>';

          html +='<div class="col-lg-12"><label class="col-lg-4">Name of the blood bank to which blood product requested/ordered</label><div class="col-lg-6"><input type="text" name="mo5new[]" id="mo5new'+divcount+'" class="form-control" /></div></div>'


     html +='<div class="col-lg-12"><label class="col-lg-4">Requested/Ordered by</label><div class="col-lg-6"><input type="text" name="mo6new[]" id="mo6new'+divcount+'" class="form-control" /></div></div>'

   html +='<div class="col-lg-12"><label class="col-lg-4">Date at which blood product received</label><div class="col-lg-3"><input type="text" autocomplete="off" name="mo7new[]" id="mo7new'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" /></div></div>'

   html +='<div class="col-lg-12"><label class="col-lg-4">No of units received</label><div class="col-lg-3"><input type="text" name="mo8new[]" id="mo8new'+divcount+'" class="form-control" /></div></div>'

            html +='<div class="col-lg-12"><label class="col-lg-4">Time at which blood product received</label><div class="col-lg-3"><input type="time" name="mo9new[]" id="mo9new'+divcount+'" placeholder="hh:mm" class="form-control" /></div></div>'

html +='<div class="col-lg-12"><label class="col-lg-4">TAT of Blood Product</label><div class="col-lg-3"><input type="text" name="mo10new[]" id="mo10new'+divcount+'"class="form-control" readonly /></div></div>'

html +='<div class="col-lg-12"><label class="col-lg-4">Blood Product Received By</label><div class="col-lg-6"><input type="text" name="mo11new[]" id="mo11new'+divcount+'" class="form-control" /></div></div>'

html +='<div class="col-lg-12"><label class="col-lg-4">No of units transfused</label><div class="col-lg-3"><input type="text" name="mo12new[]" id="mo12new'+divcount+'" class="form-control" /></div></div>'

html +='<div class="col-lg-12"><label class="col-lg-4">Blood Transfusion Reaction observed</label><div class="col-lg-3"><select type="text" name="mo13new[]" id="mo13new'+divcount+'" class="form-control" ><option value="">Select Yes/No</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>'

html +='<div class="col-lg-12"><label class="col-lg-4">Wastage of Blood Product if any</label><div class="col-lg-3"><select type="text" name="mo14new[]" id="mo14new'+divcount+'" class="form-control" ><option value="">Select Yes/No</option><option value="No">No</option><option value="Yes">Yes</option></select></div><div class="col-lg-3"><input type="text" name="mo15new[]" id="mo15new'+divcount+'" class="form-control" /></div>'


          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button style="color:white;" type="button" name="remove" id="'+divcount+'" class="btn btn-danger btn_remove ">Delete</button></div></div>';
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
                     <h4 class="modal-title panel panel-info"> <div class="panel-heading" style="padding:7px;">Blood Trasfusion related events Edit Form</div></h4>  

                           
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_edit">
                      
					<div class="col-lg-12">
            
                   <label class="col-lg-8">Type of Blood Product Requested</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-8">
                              <select type="text" name="mo1Edit" id="mo1Edit" class="form-control" ><option value="">Select Type</option><option value="Whole Blood">Whole Blood</option><option value="Red Blood Concentrate">Red Blood Concentrate(PRBC)</option><option value="Platelet Concentrate (PC)">Platelet Concentrate (PC)</option><option value="Fresh Frozen Plasma (FFP)">Fresh Frozen Plasma (FFP)</option><option value="Cryoprecipitated anti- haemophilic factor (Cryo-AHF)">Cryoprecipitated anti- haemophilic factor (Cryo-AHF)</option></select>
                          </div>
                           
                    </div>
                     <br/>

                 <div class="col-lg-12">
                      <label class="col-lg-8">No Units requested</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                              <input type="text" name="mo2Edit" id="mo2Edit" class="form-control" />

                     </div>
                           
                  </div>
                   <br/>

                   <div class="col-lg-12">
                      <label class="col-lg-8">Date & Time of Requisition/order</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-6">
                              <input type="date" autocomplete="off" name="mo3Edit" id="mo3Edit" placehEditer="yyyy-mm-dd" class="form-control dateDisplay" required />

                     </div>

                     <div class="col-lg-6">
                             <input type="time" name="mo4Edit" id="mo4Edit" placehEditer="hh:mm" class="form-control" required/>

                     </div>
                           
                  </div>
                   <br/>

                   <div class="col-lg-12">
                      <label class="col-lg-8">Name of the blood bank to which blood product requested/ordered</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                              <input type="text" name="mo5Edit" id="mo5Edit" class="form-control" />

                     </div>
                           
                  </div>
                   <br/>

                   <div class="col-lg-12">
                      <label class="col-lg-8">Requested/Ordered by</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                              <input type="text" name="mo6Edit" id="mo6Edit" class="form-control" />

                     </div>
                           
                  </div>
                   <br/>

                    <div class="col-lg-12">
                      <label class="col-lg-8">Date at which blood product received</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                              <input type="date" autocomplete="off" name="mo7Edit" id="mo7Edit" placehEditer="yyyy-mm-dd" class="form-control dateDisplay" />

                     </div>
                           
                  </div>
                   <br/>


                   <div class="col-lg-12">
                      <label class="col-lg-8">No of units received</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                              <input type="text" name="mo8Edit" id="mo8Edit" class="form-control" />

                     </div>
                           
                  </div>
                   <br/>

                   <div class="col-lg-12">
                      <label class="col-lg-8">Time at which blood product received</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                             <input type="time" name="mo9Edit" id="mo9Edit" placehEditer="hh:mm" class="form-control" />

                     </div>
                           
                  </div>
                   <br/>

                   <div class="col-lg-12">
                      <label class="col-lg-8">TAT of Blood Product</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                            <input type="text" name="mo10Edit" id="mo10Edit"class="form-control" readonly />

                     </div>
                           
                  </div>
                   <br/>

                   <div class="col-lg-12">
                      <label class="col-lg-8">Blood Product Received By</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                            <input type="text" name="mo11Edit" id="mo11Edit" class="form-control" />

                     </div>
                           
                  </div>
                   <br/>

                   <div class="col-lg-12">
                      <label class="col-lg-8">No of units transfused</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                            <input type="text" name="mo12Edit" id="mo12Edit" class="form-control" />

                     </div>
                           
                  </div>
                   <br/>


                   <div class="col-lg-12">
                      <label class="col-lg-8">Blood Transfusion Reaction observed</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-8">
                            <select type="text" name="mo13Edit" id="mo13Edit" class="form-control" ><option value="">Select Yes/No</option><option value="Yes">Yes</option><option value="No">No</option></select>

                     </div>
                           
                  </div>
                   <br/>

                    <div class="col-lg-12">
                      <label class="col-lg-8">Wastage of Blood Product if any</label>
                   </div> 
                  <div class="col-lg-12">
                           <div class="col-lg-6">
                            <select type="text" name="mo14Edit" id="mo14Edit" class="form-control" ><option value="">Select Yes/No</option><option value="No">No</option><option value="Yes">Yes</option></select>

                     </div>
                     <div class="col-lg-6">
                     	<input type="text" name="mo15Edit" id="mo15Edit" class="form-control" />
                     </div>
                           
                  </div>
                   <br/>


                    
                      <br/>
                 <div class="col-lg-12">
								<hr />
					</div>

                    <input type="hidden" name="user_idEdit" id="user_idEdit" />
                     <input type="hidden" name="bld_extra_id" id="bld_extra_id" />
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

            var bld_extra_id = $(this).attr("id");
            var action = "view"; 
            
           $.ajax({  
                url:"fetch_single_blood_trfusion_edit.php",  
                method:"POST",  
                data:{bld_extra_id:bld_extra_id,action:action},  
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
 


					$('#bld_extra_id').val(data.bld_extra_id); 

                     $('#user_idEdit').val(data.bld_id); 
 

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
                     url:"fetch_single_blood_trfusion_edit.php",  
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
