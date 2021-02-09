<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	$ses = $_SESSION['login'];

	
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
	include('dbinfo.php');

	date_default_timezone_set('Asia/Calcutta');
	$dat = date('Y-m-d');
	function isWeekend($date) {
	    $weekDay = date('w', strtotime($date));
	    return ($weekDay == 0 || $weekDay == 6);
	}
	$day = isWeekend($dat);
	
	

	$query = "SELECT * FROM tbl_audit_hh10 where ses = '$ses' and typ = '$typ'";
	$statement = $connection->prepare($query);
	$statement->execute();
	$filtered_rows = $statement->rowCount();

	$cid = $filtered_rows + 1;

	/*print_r($cid);
	die();*/
	
  
	/*$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');
	
	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');*/


?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('blod_trans_sfty_chklst/blod_trans_sfty_chklst_count.php').fadeIn("slow");
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
.modal-backdrop {
   position: static!important;

   }

</style>
<script>
function myFunction() {
  window.print();
}

 
function goBack() {
  window.history.back();
}
 
</script>
<body>
<?php include"QM-nav-bar.php";?>
<section class="content home" >
	<div class="container-fluid">

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
                        <div class="panel-heading" style="padding-left:0;height:140px;">
                          
							
                             HIC Audit&nbsp;
							<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px; " onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
							<?php if ($filtered_rows1 == 0) { ?>
                            	<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New HIC Audit</b></button>
                            	
                            <?php } ?>
                            	
							<div>
		                    	 <table class="custom-table"  cellspacing="10" cellpadding="10" border="1" width="650px" align="center" style="border-color: #9DA2E2; text-align: center;" >
		                            		<tr style="background-color: #9DA2E2;">
		                            			<td style="font-weight: bold;color: white;">Total</td>
		                            			<td style="font-weight: bold;color: white;">Completed</td>
		                            			<td style="font-weight: bold;color: white;">Not-Completed</td>

		                            			
		                            		
		                            		</tr>
		                            		<tr style="background-color: white;">
		                            			<?php
													include('dbinfo.php');

													$tot= "SELECT COUNT(*) as total FROM tbl_audit_hh10  WHERE year(created) = '$yr'";
														$totres = mysqli_query($connect, $tot);
														$totrow=mysqli_fetch_assoc($totres);
														// echo $totrow['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrycomp = "SELECT COUNT(*) as comp FROM tbl_audit_hh10 WHERE sign!='' AND year(created) = '$yr' ";
																$rescomp = mysqli_query($connect, $qrycomp);
																$rowcomp=mysqli_fetch_assoc($rescomp);
																// echo $rowcomp['comp'];
																										
														$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_audit_hh10 WHERE sign='' AND year(created) = '$yr' ";
																	$resnotcomp= mysqli_query($connect, $qrynotcomp);
																	$rownotcomp=mysqli_fetch_assoc($resnotcomp);
																	// echo $rownotcomp['notcomp'];
																	// echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
																	// die();

													   

													?>


		                            			<td style="font-weight: bold;color: black;" ><?php echo $totrow['total'];?></td>
		                            			<td style="font-weight: bold;color: green;"><?php echo $rowcomp['comp'];?></td>
		                            			<td style="font-weight: bold;color: red;"><?php echo $rownotcomp['notcomp'];?></td>
		                            			
		                            		</tr>
		                            		
		                            	</table>
		                            </div>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-2">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" value="<?= $cid ?>" readonly />
											</div>
											<label class="col-lg-2">Shift & Time:</label>
											<div class="col-lg-4" id="sr">
												<select class="form-control" name="sTime" id="sTime">
													<option value="Morning (6:00 to 12:00)"> Morning (6:00 to 12:00)</option>
													<option value="Afternoon (12:00 to 18:00)"> Afternoon (12:00 to 18:00)</option>
													<option value="Night (18:00 to 24:00)"> Night (18:00 to 24:00)</option>
													<option value="Night (24:00 to 6:00)"> Night (24:00 to 6:00)</option>
												</select>
											</div>
										</div>
									<div class="col-lg-12">
										<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Moment </label>
										<label class="col-md-1">Date</label>
										<div class="col-lg-2">
											<input type="text" name="dateVal" id="dateVal" value="<?= date('d/m/Y',strtotime($dat)) ?>"  class="form-control" readonly />
											
										</div>
										<label class="col-md-2">WD / WE</label>
										<div class="col-lg-2">
											<input type="radio" name="day" id="day" value="WD" <?= ($day == true) ? '' : 'checked' ; ?>>&nbsp;WD
										</div>
										<div class="col-lg-2">
											<input type="radio" name="day" id="day" value="WE" <?= ($day == true) ? 'checked' : '' ; ?>>&nbsp;WE
										</div>

										<label class="col-md-1">Time</label>
										<div class="col-lg-2">
											<input type="text" name="timeVal" id="timeVal" value="<?= date("h:i A") ?>"  class="form-control" readonly />
										</div>
										
										<!-- <label class="col-md-2">Quarter</label>
										<div class="col-lg-4">
											<input type="text" name="quarter" id="quarter" value="<?= $mVal ?>"  class="form-control" readonly />
											
										</div> -->
										<!-- <label class="col-md-2">Month</label>
										<div class="col-lg-4">
											<input type="text" name="month" id="month" value="<?= $mth ?>" class="form-control" readonly>
											
									</div> -->
										
								</div>
								<div class="col-lg-12">
											<hr />
										</div>

								<div class="col-lg-12">
										<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Subject </label>
										<label class="col-md-2">Health Care Professional</label>
										<div class="col-lg-2">
											<select class="form-control" name="prof" id="prof">
												<option value="">---SELECT---</option>
												<option value="MD"> Medical Doctor (MD)</option>
												<option value="N">Nurse (N)</option>
												<option value="AS">Ancillary Staff (AS)</option>

											</select>
											
										</div>
										<label class="col-md-1">Name initials </label>
										<div class="col-lg-3">
											<input type="text" name="nameVal" id="nameVal" value="<?= $ses ?>"  class="form-control" readonly />
										</div>
										

										<label class="col-md-1">Gender</label>
										
											<div class="col-lg-2">
											<select class="form-control" name="sex" id="sex">
												<option value="">---SELECT Gender---</option>
												<option value="M"> Male</option>
												<option value="F">Female</option>
											</select>
											
										</div>
											
										
										
										
										
								</div>

								<div class="col-lg-12">
											<hr />
										</div>

								<div class="col-lg-12">
										<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Process of HH</label>
										<label class="col-md-2">H.H</label>
										<div class="col-lg-4">
											<select class="form-control" name="hh" id="hh">
												<option value="Yes"> Yes</option>
												<option value="No">No</option>
												<option value="N/A">N/A</option>

											</select>
											
										</div>
										<label class="col-md-2">Technique</label>
										<div class="col-lg-4">
											<select class="form-control" name="tech" id="tech">
												<option value="A"> Adequate(A)</option>
												<option value="I">Inadequate(I)</option>
											</select>
										</div>
										<label class="col-md-2">Used product</label>
										<div class="col-lg-4">
											<select class="form-control" name="usedProduct" id="usedProduct">
												<option value="NM"> Non medicated soap (NM)</option>
												<option value="A"> Alcohol (A)</option>
												<option value="C"> Chlorhexidine</option>
												<option value="I"> Iodine</option>
											</select>
										</div>
										<label class="col-md-2">Used Towel</label>
										<div class="col-lg-4">
											<select class="form-control" name="towel" id="towel">
												<option value="C"> Clot (C)</option>
												<option value="P">  Paper (P) </option>
											</select>
										</div>
										
											
								</div>
								<div class="col-lg-12">
											<hr />
										</div>

								<div class="col-lg-12">
										<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Moment of HH</label>
										<label class="col-md-12" style="border-color: #9ac6eb!important; text-align: center; padding:10px;">Moment 1</label>
										<label class="col-md-8">Before patient contact (Noninvasive procedure) :</label>
										<div class="col-lg-4">
											<select class="form-control" name="noninvasive" name="noninvasive">
												<option value="Yes"> Yes</option>
												<option value="No">No</option>
												<option value="N/A">N/A</option>

											</select>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<label class="col-md-12" style="border-color: #9ac6eb!important; text-align: center; padding:10px;">Moment 2</label>
										<label class="col-md-8">Before aseptic task (Invasive procedure) :</label>
										<div class="col-lg-4">
											<select class="form-control" name="invasive" id="invasive">
												<option value="Yes"> Yes</option>
												<option value="No">No</option>
												<option value="N/A">N/A</option>

											</select>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<label class="col-md-12" style="border-color: #9ac6eb!important; text-align: center; padding:10px;">Moment 3</label>
										<label class="col-md-8">After body fluid exposition risk  :</label>
										<div class="col-lg-4">
											<select class="form-control" name="fluid" id="fluid">
												<option value="Yes"> Yes</option>
												<option value="No">No</option>
												<option value="N/A">N/A</option>

											</select>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>

										<label class="col-md-12" style="border-color: #9ac6eb!important; text-align: center; padding:10px;">Moment 4</label>
										<label class="col-md-8">After patient contact  :</label>
										<div class="col-lg-4">
											<select class="form-control" name="contact" id="contact">
												<option value="Yes"> Yes</option>
												<option value="No">No</option>
												<option value="N/A">N/A</option>

											</select>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>

										<label class="col-md-12" style="border-color: #9ac6eb!important; text-align: center; padding:10px;">Moment 5</label>
										<label class="col-md-8">fter touching patient's surroundings  :</label>
										<div class="col-lg-4">
											<select class="form-control" name="surroundings" id="surroundings">
												<option value="Yes"> Yes</option>
												<option value="No">No</option>
												<option value="N/A">N/A</option>

											</select>
											
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
												 <input type="hidden" name="tbl" value="tbl_audit_hh10">
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />
												<button  style="color: white;font-weight: bold;" accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit ( Alt + s )</button>
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
												<th rowspan="3">Action</th>
												<th colspan="4">Moment</th>
												<th colspan="3">Subject</th>
												<th colspan="4">Process of HH</th>
												<th colspan="5">Moment of HH</th>
											</tr>
											<tr>
												<th rowspan="2">Shift & Time</th>
												<th rowspan="2">Date</th>
											    <th rowspan="2">WD / WE</th> 
												<th rowspan="2">Time</th>	
												<th rowspan="2">Health Care Professional: MD: Medical doctor/ N: Nurse / AS: Ancillary staff </th>
												<th rowspan="2">Name initials </th>	
												<th rowspan="2">Gender : F/M</th>
												<th rowspan="2">H.H: Y/N</th>
												<th rowspan="2">Technique: A / I</th>	
												<th rowspan="2">Used product: A/C/I/NM</th>
												<th rowspan="2">Used towel</th>
												<th>Moment 1</th>
												<th>Moment 2</th>
												<th>Moment 3</th>
												<th>Moment 4</th>
												<th>Moment 5</th>
											</tr>
											<tr>
												<th>Before patient contact (Noninvasive procedure) </th>
												<th>Before aseptic task (Invasive procedure)</th>
												<th>After body fluid exposition risk </th>
												<th>After patient contact</th>
												<th>After touching patient's surroundings. </th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="col-lg-12">
									Week day = WD, Week end : WE <br>
									Health care professional = medical doctor (MD), nurse (N), Ancillary Staff (AS)<br> 
									Sex = Male (M), Female (F)<br>
									Used product = Non medicated soap (NM), Alcohol (A), Chlorhexidine©, Iodine(I) <br>
									Towel=Clot(C), Paper (P)<br> 
									Technique=Adequate(A), Inadequate(I)<br>
								</div>
							</div>
							
                        </div>
                    </div>
                </div>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1">Quarter</label>
							<div class="col-lg-4">
								<select name="qut" id="qut" class="form-control">
									<option value="1">1(January)</option>
									<option value="2">2(April)</option>
									<option value="3">3(July)</option>
									<option value="4">4(October)</option>
								</select>
							</div>
							<div class="col-lg-4">
								<button  style="color: white;font-weight: bold;" type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div> 
				 <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart1" style="height:400px;"></div>
					</div>
				</div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style="text-align: center;"><b><font color="#000000">Bio-Medical Waste Management</font></b></p>
                <a class="btn btn-success pull-right" href="#" id="excel">Excel</a>
        			<div class="dash"></div>
            </div>
            <!-- <div class="modal-footer">
	           
	           
	       </div> -->
        </div>
    </div>
</div>
    <!-- /#wrapper -->
    <!-- jQuery -->  

    </div>
    </section>  
</body>
</html>
<script>
    $(document).on('click', '#myModel', function(){
		  var recipient = $(this).data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var uid = recipient;
          //alert(uid);
 
            $.ajax({
                method:"POST",
				url: "audit_hh/hic2Excel.php",
				data:{user_id:uid,tbl:'tbl_audit_hh10'},
                cache: false,
                success: function (data) {
                	$('#exampleModal').modal('show');
                	$('.dash').html(data);
                    /*console.log(data);
                    modal.find*/
                },
                error: function(err) {
                    console.log(err);
                }
            });  
		});
    $(function() {
		  $('#excel').click(function() {
		    var url = 'data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html())
		    location.href = url
		    return false
		  })
		});
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
			//$('#sr').load("blod_trans_sfty_chklst/load_blod_trans_sfty_chklst.php");
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
				url:"audit_hh/fetch_all_10.php",
				type:"POST",
				data:{tbl:'tbl_audit_hh10'}
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
						url:"audit_hh/hh10.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);
							//window.location = window.location.href;
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
				url:"audit_hh/update_audit.php",
				method:"POST",
				data:{user_id:user_id,tbl:'tbl_audit_hh10'},
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
					$("#sTime").val(data.sTime);
					$("#dateVal").val(data.dateVal);
					//$("#day").val(data.day);
					$("input[name=day][value='"+data.day+"']").prop("checked",true);
					$("#timeVal").val(data.timeVal);
					$("#prof").val(data.prof);
					$("#nameVal").val(data.nameVal);
					$("#sex").val(data.sex);
					$("#hh").val(data.hh);
					$("#tech").val(data.tech);
					$("#usedProduct").val(data.usedProduct);
					$("#towel").val(data.towel);
					$("#noninvasive").val(data.noninvasive);
					$("#invasive").val(data.invasive);
					$("#fluid").val(data.fluid);
					$("#contact").val(data.contact);
					$("#surroundings").val(data.surroundings);
					$('#name').val(data.name);
					$('#sign').val(data.sign);
					
					$('#user_id').val(data.id);
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
					url:"audit_hh/delete_form.php",
					method:"POST",
					data:{user_id:user_id,tbl:'tbl_audit_hh10'},
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
			var qut = $('#qut').val();
			var tbl = $('input[name="tbl"]').val();

			
			if(qut != '')
			{
				// chart one
				var jsonData = $.ajax({
				url: 'audit_hh/chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{qut:qut,tbl:tbl},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Audit Details',
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
								
			}	
		}	
</script>