<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
	include "bio_sfty_chklst/headings.php";
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
<?php include_once('high_chart_js.php'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
                        <div class="panel-heading" style="padding-left:0;height: 140px;">
                            Bio Safety Checklist
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px; " onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
							
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>
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

													$tot= "SELECT COUNT(*) as total FROM tbl_bio_sfty_chklst WHERE year(date1) = '$yr'";
														$totres = mysqli_query($connect, $tot);
														$totrow=mysqli_fetch_assoc($totres);
														// echo $totrow['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrycomp = "SELECT COUNT(*) as comp FROM tbl_bio_sfty_chklst WHERE sign!='' AND year(date1) = '$yr' ";
																$rescomp = mysqli_query($connect, $qrycomp);
																$rowcomp=mysqli_fetch_assoc($rescomp);
																// echo $rowcomp['comp'];
																											

														$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_bio_sfty_chklst WHERE sign=''   AND year(date1) = '$yr' ";
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
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										
											<div class="col-lg-12">
											<label class="col-lg-4">Audit Date</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="list-date" id="list-date" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>

											<div  style="display: none">
												<input type="time" 
												name="list-time" 
												id="list-time" placeholder="hh:mm" class="form-control" />
											</div>
										<div class="col-lg-4">
								 <div class="alert alert-danger alert-dismissible dateerror21" role="alert" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Audit Already Done On this date
                        </div>
							</div>
										</div>


										<script type="text/javascript">
									
									$('#list-date').change(function(){  
								var testn = $(this).val(); 			
								$.ajax({  
									url:"daily_audit_data/check_date_present.php",  
									method:"POST",  
									data:{testn1:testn , tbl:'tbl_bio_sfty_chklst',tid:'bio_sfty_chklst_id'},
									dataType:"json",				
									success:function(data)
									{  
										

										 if(data.sample_size!=0){
										 	
										 	$('.dateerror21').show();
										 
										 	$("#action").attr("disabled", true);
										 	return false;
										 }else{
										 	$("#action").attr("disabled", false);
										 	$('.dateerror21').hide();
										 }
										
                                      }  
								});  
							});
									
								</script>
		<?php foreach ($rowHead as $key => $value) { ?>
		<div class="col-lg-12">
								<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  <?=$value[0];?></label>
										<div class="col-lg-12" style="padding-top: 10px;"></div>
									<div class="col-lg-2" ><?=$value[0];?></div>
											<div class="col-lg-4">
												<select type="text" 
												name="<?=$value[1]?>" 
												id="<?=$value[1]?>" 
												 
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
												name="<?=$value[2]?>" 
												id="<?=$value[2]?>"  
												class="form-control" />

													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?> 
                               
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" 
												name="<?=$value[3]?>" 
												id="<?=$value[3]?>" 
												class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
<?php }


?>
										
											
											
									
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
												<th>Action</th>
												<th>Sr.No.</th>
												<th>Name</th>	
												
												<th>Date</th>	
												
												
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
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<div class="col-lg-3" style="color: black;">	
										Audit Details(charts)
									</div>
							

							<div class="col-lg-3">
								<input type="text" autocomplete="off" name="hrdtD1" id="hrdtD1" placeholder="yyyy-mm-dd" class="form-control" required />
							</div>
							<input type="hidden" name="hrmonD1" id="hrmonD1" class="form-control" readonly />
												<input type="hidden" name="a_id1" id="a_id1" class="form-control" readonly />
												<input type="hidden" name="auditSelectedMonthD1" id="auditSelectedMonthD1" class="form-control" readonly />
												<input type="hidden" name="auditSelectedYearD1" id="auditSelectedYearD1" class="form-control" readonly />
												<input type="hidden" name="departments" id="departments" class="form-control" readonly />
							<div class="col-lg-4">
								 <div class="alert alert-danger alert-dismissible dateerror2" role="alert" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            No data found on this date
                        </div>
							</div>

							<script type="text/javascript">
									$("#hrdtD1").datepicker({
											showOtherMonths: true,
											selectOtherMonths: true,
											changeMonth: true,
											changeYear: true,
									});	
									$('#hrdtD1').change(function(){  
								var testn = $(this).val(); 			
								$.ajax({  
									url:"daily_audit_data/load_daily_audit_details.php",  
									method:"POST",  
									data:{testn1:testn , tbl:'tbl_bio_sfty_chklst',tid:'bio_sfty_chklst_id'},
									dataType:"json",				
									success:function(data)
									{  
										

										 if(data.sample_size==0){
										 	
										 	$('.dateerror2').show();
										 
										 	$(".searchgraph").attr("disabled", true);
										 	return false;
										 }else{
										 	$(".searchgraph").attr("disabled", false);
										 	$('.dateerror2').hide();
										 }
										$('#hrmonD1').val(data.hrmon);
										$('#auditSelectedMonthD1').val(data.auditSelectedMonth);
										$('#auditSelectedYearD1').val(data.auditSelectedYear);
										$('#a_id1').val(data.id);

										
									
								

										

										

									}  
								});  
							});
									
								</script>
							
							
								
							
							<div class="col-lg-2">
								<button type="button" name="search" id="searchgraph" class="btn btn-primary btn-sm searchgraph" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" id="audittitle" name="audittitle" value="Bio Safety Checklist">	
			
				<?php $tbl = 'tbl_bio_sfty_chklst'; 
				$t_id='bio_sfty_chklst_id';
				include('daily_audit_data/chart_display2.php'); 
				?>
				<div class="form-group">
					<div class="col-sm-12">
					<?php for($i=0;$i<=1;$i++):?>
						<div id="line_chart<?=$i?>" style="height:300px;"></div>
						<br>

					<?php endfor; ?>

						

						<!-- <div id="container" style="width:100%; height:400px;"></div> -->
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

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style="text-align: center;"><b><font color="#000000"> Bio Safety Checklist </font></b></p>
                <a class="btn btn-success pull-right" href="#" id="excel">Excel</a>
        			<div class="dash1"></div>
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
    $(document).on('click', '#myModel', function(){
		  var recipient = $(this).data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var uid = recipient;
          //alert(uid);
 
            $.ajax({
                method:"POST",
				url: "daily_audit_data/bio_sfty_excel.php",
				data:{user_id:uid,tbl:'tbl_bio_sfty_chklst',tid:'bio_sfty_chklst_id'},
                cache: false,
                success: function (data) {
                	$('#exampleModal1').modal('show');
                	$('.dash1').html(data);
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
			$('#list-date').prop('disabled', false);
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
					"targets":[0, 1, 2],
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
					$('#list-date').prop('disabled', true);
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
					url:"bio_sfty_chklst/delete_bio_sfty_chklst_form.php",
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
