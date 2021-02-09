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
	
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

 $to = date('Y-m-t');

 
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="../data_multiselect/jquery.multiselect.css" type="text/css">
        <script type="text/javascript" src="../data_multiselect/jquery.multiselect.js"></script>
<!-- <script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('huf_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	
</script> -->
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
#bxAudit,
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
                        <div class="panel-heading" style="padding-left:0;height: 60px;">
                            Bio-Medical Waste Management Checklist 
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Select Patient</b></button>
                        </div>

                      <!--   audit select start -->
                         <div class="box" id="bxAudit" style="Overflow: visible;">
							<div class="panel-body">
						<form method="post" id="audit_form1" enctype="multipart/form-data">
								<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-9" style="padding-left:0;">
							<label class="col-lg-3">From</label>
							<div class="col-lg-3">
								<input type="text" name="frdate1" id="frdate1" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-3">To</label>
							<div class="col-lg-3">
								<input type="text" name="todate1" id="todate1" value="<?php echo $todt;?>" class="form-control" />
							</div>
							
						</div>
					</div>
				</div>
					<div class="col-lg-12">
						<div class="col-lg-9" style="padding-left:0;">
							<label class="col-lg-3">Sample Size</label>
							<div class="col-lg-4">
								<input type="text" name="s_size" id="s_size" value="0" class="form-control" placeholder="Enter the sample size" />
							</div>
										<div class="col-lg-1"></div>
							<div class="col-lg-2">
								
								<input type="hidden" name="auditsearch" id="auditsearch"  class="form-control" value="true"  />

								<button  style="color: white;font-weight: bold;" accesskey="s" type="submit" name="actionAudit" id="actionAudit" class="btn btn-primary  btn-sm" />SEARCH </button>
							</div>
							
						</div>
					</div>
					</form>
					<br />
					<div class="col-lg-12" style="padding-top: 30px;padding-bottom: 15px;">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  Select Patient</label>

						</div>

					<br />	
					<form method="post" id="audit_form2" enctype="multipart/form-data">
								<div class="form-group">
				     <div class="col-lg-12" >
                        <div class="col-lg-9" style="padding-left:0;">
                            <label class="col-lg-3">Patient List</label>

                                <div class="col-lg-8">
                              <select id="user_data" multiple="multiple" name="PatientList[]"  class="form-control">
                              <option >--select patients--</option>
										
                             
                       </select>
                       </div>
                       </div>
                    </div> 
                </div>


                    <div class="col-lg-12" style="padding-top: 10px">
									<div class="col-lg-6">	
												
												<input type="hidden" name="operation1" id="operation1" />
												<button  style="color: white;font-weight: bold;"  type="submit" name="actionP" id="actionP" class="btn btn-primary pull-right" />Add Patients ( Alt + s )</button>
									</div>
									<div class="col-lg-6">	
												<button type="button" class="btn btn-default pull-left" id="close_btnAudit">Close</button>
									</div>
					</div>
					<div class="col-lg-12">
											<hr />
										</div>


						
					</form>

                    </div> 	
				</div>
			
			<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


		

							  <!--   audit select end -->
						
						<div class="box" id="bx1">
							<div id="adm">
								<br />
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										
										
										<div class="col-lg-12">
											<label class="col-lg-4">Date</label>
											<div class="col-lg-4">
												<input type="date" name="date" id="date" class="form-control"  />
											</div>
										</div>
										
										
										

										<div class="col-lg-12">
											<hr />
										</div>
										
										




<!-- <div class="col-lg-12" style="padding-top: 30px;padding-bottom: 15px;">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  Departement Name</label>

						</div> -->

					<br />

	
<div class="col-lg-12">
<table class="table table-bordered">

 <?php $c=0;?>
  <thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong></strong></th>
   	<th>Yes/No/NA</th>
   	<th>Comments</th>
   </tr>
	<?php $data = array('The organization has comprehensive policy for the disposal of waste',
'There is a dedicated compound for the safe storage of clinical waste, which is under cover from the elements and free from pests and vermin',
'The compound including waste containers are locked and inaccessible to the public',
'The compound has appropriate sign in the area',
'The waste storage area is clean and tidy',
'Clinical waste sacks are labeled and secured',
'There is no storage of waste in corridors or in other inappropriate areas inside/outside the facility whilst waste is awaiting collection',
'Hazardous and offensive waste is segregated from other waste for transportation',
'All plastic waste sacks are fully enclosed within bins to minimize the risk of exposure',
'There is no storage of inappropriate items in the waste compound',
'There is no emptying of clinical waste from one bag to another',
'Spill kit and heavy duty gloves or alternative are readily available',
'Clinical waste posters and/or a waste policy identifying waste segregation are available in all areas',
'HCW are aware of waste segregation procedures - Medical staff',
'HCW are aware of waste segregation procedures - Allied Health care professional',
'HCW are aware of waste segregation procedures - Nursing staff',
'HCW are aware of waste segregation procedures - Ancillary staff',
'BMW storage area is clearly labeled',
'The area is clean and tidy',
'Waste storage area/bins are kept locked or closed',
'There are color coded bags for categories of wastes',
'Wastes are segregated as per category into respective receptacles',
'All bags are tied, labeled with department name, date, and biohazard label and also secured before leaving the place of generation',
'Central waste collection area',
'Departmental waste handling and disposal',
'Page 1',
'HH2',
'Disposable wates such as gloves, caps, mask, IV sets, syringe, suction catheters are mutialed prior to disposal',
'Biological agents are made safe by autoclaving before leaving the laboratory for final disposal',
'Wast bags are removed at least daily',
'There is no transfer of clinical waste from one bag to another',
'There are no overfilled bags. Bags are no more than 3/4th full',
'Waste bags are not tied onto containers / trolleys',
'Sharp boxes are safely stored',
'There are no inappropriate items in the household or recycling bins',
'Spill kit and heavy duty gloves or alternative are readily available if mercury based devices are used.',
'There is no storage of wast in corridors',
'There is a system for transporting the waste through the hospital (i.e. which avoids manual handling of waste)',
'All waste containers used for transport are clean and in a good state of repair',
'There are provisions for disposal of difference type of sharps',
'Sharp bin labeled with departmetn name, date, and biohazard label',
'NaOCI in sharps container, wheter freshly prepared',
'Once 3/4th full the bin aperture is locked Sealed and locked bins are stored in a locked room, cupboard or container, away from public access',
'An empty sharp bin / hub cutter is available on the cardiac arrest trolley',
'Are the needles used on patient are recapped',
'To find out situations in which recapping is still carried out E.g ABG collection');
 ?>


 
  
<?php  foreach ($data as $key => $value) {  ?>

	

	<tr>
		<td><?=(++$c)?></td>
         <td><?=$value?></td>
        <td>
												
								<label class="radio-inline">
										      <input type="radio" name="<?=$value?>" value="Yes" checked>Yes
								</label>
								<label class="radio-inline">
										   <input type="radio" name="<?=$value?>" value="No">No
								</label>
								<label class="radio-inline">
										   <input type="radio" name="<?=$value?>" value="NA">NA
								</label>
			</td>
			<td><textarea name="<?=$value?>" rows="2" cols="40"></textarea></td>
      
    </tr>


	
<?php  } ?>






</thead></table></div>

										
										
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
												<th>Name of the Patient</th>
												<!-- <th>AGE</th> -->
												<th>IPD No</th>
												
												<th>DATE OF Admission</th>
												<th>DATE OF DISCHARGE</th>
												<th>Length of Stay</th>
												<th>TYPE OF DISCHARGE</th>
												<th>KNOWN CASE/NEWLY DETECTED</th>
												<th>SENT ON </th>
												<th>Informed by RMo to consultant  about raised BG</th>
												<th>Monitoring done by trained nurse</th>	
												<th>Technique of BG Monitoring	</th>
												<th>Frequency of BG Monitoring	</th>
												<th>Calibration of glucometer	</th>
												<th>Diet Plan we properly charted</th>	
												<th>Patient education was given on importance of controlling BG	</th>
												<th>FBS/RBS ON DISCHARGE</th>

												
												<th>Recorded By</th>
												<th>Updated By</th>
												<th>Recorded On</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>


							<div class="col-lg-12" style="display: none">
								
								<div class="panel panel-default">
									
							<form method="post" action="../excel/HOS/export.php" class="panel-heading">
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
										<div id="hosp">
											
										</div>
									</div>
								</div>
								<!-- /.panel -->
							</div>
                        </div>
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
		$("#d_adm").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#dddd").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});		
		$(function(){  
			$("#d_adm").datepicker();
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
			$('#audit_form1')[0].reset();
			$('#bxAudit').show('fast');
			
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			
			
			
		});
		
		$('#close_btnAudit').click(function(){
			$('#audit_form1')[0].reset();
			
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bxAudit').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		$('#close_btn').click(function(){
			$('#audit_form1')[0].reset();
			$('#audit_form2')[0].reset();
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
				url:"icu_audit_checklist_d/fetch_icuchlst_audit.php",
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
						url:"icu_audit_checklist_d/insert_audit_form.php",
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
			
		});
		$(document).on('submit', '#audit_form2', function(event){
		event.preventDefault();
	// $("#audit_form2").submit(function(event){
			var count = ($('#user_data').val().length);
			
			if(count > 0)
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					
					$.ajax({
						url:"icu_audit_checklist_d/insert_patinet.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);
							
							$('#audit_form1')[0].reset();
			                $('#audit_form2')[0].reset();
							 $('#adm').hide('fast');
							 $('#bx1').hide('fast');
							 $('#bxAudit').hide('fast');
							 $('#bx2').show('fast');
							// $('#add_btn').show('fast');
							// //$('#myModal').modal('hide');
							
									
							dataTable.ajax.reload();
   					
             		
					}
					
				});
					 
				}
			} else{
				alert('Please Select  Patient');
				$('#user_data').focus();
			}
			
			
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"icu_audit_checklist_d/fetch_patient_icuchlst_audit.php",
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
					$('#p_name').focus();
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					
					$('#ipd_no').val(data.ipd_no);
					
					
					$('#ddd').val(data.ddd);
					$('#dddd').val(data.dddd);
					$('#huf_dadm').val(data.huf_dadm);
					$('#huf_lens').val(data.huf_lens);
					
						
					$('#case_details').val(data.case_details);
					// $('#sent_on').val(data.sent_on);
					$('input:radio[name="sent_on"]').filter('[value="'+data.sent_on+'"]').attr('checked', true);
					$('input:radio[name="consulatnt"]').filter('[value="'+data.consulatnt+'"]').attr('checked', true);
					$('input:radio[name="monitoring"]').filter('[value="'+data.monitoring+'"]').attr('checked', true);
					$('input:radio[name="technique"]').filter('[value="'+data.technique+'"]').attr('checked', true);
					$('input:radio[name="diet_plan"]').filter('[value="'+data.diet_plan+'"]').attr('checked', true);
					$('input:radio[name="education"]').filter('[value="'+data.education+'"]').attr('checked', true);
					
					$('#frequency').val(data.frequency);
					$('#calibration').val(data.calibration);
					
					$('#fbs_rbs').val(data.fbs_rbs);
					
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
					url:"delete_hosp_form.php",
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
		$('.price').keyup(function (){
			var tot = 0;
			$('.price').each(function(){
				tot += Number($(this).val());
			});
			$('#mod26').val(tot);			
		});
		$('.price2').keyup(function (){
			var sp = 0;
			$('.price2').each(function(){
				sp += Number($(this).val());
			});
			$('#mod14').val(sp);			
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

    $('#user_data').multiselect({
    columns: 1,
    placeholder: 'Select Languages',
    search: true,
    selectAll: true
});
	
		$(document).on('submit', '#audit_form1', function(event){
			event.preventDefault();
	
	
			
		


				var s_size = $('#s_size').val();
				
				if(s_size != '' && s_size!=0)
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					
					$.ajax({
						url:"icu_audit_checklist_d/search_patinet.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(html)
						{
							console.log(html);
							// $('#user_form')[0].reset();
							// $('#adm').hide('fast');
							// $('#bx1').hide('fast');
							// $('#bx2').show('fast');
							// $('#add_btn').show('fast');
							// //$('#myModal').modal('hide');
							// dataTable.ajax.reload();


   					 $("#user_data").find('option').remove();	
             		$.each(html, function (key, value) {
                        	

                            $('<option>').val(value.huf_id).text(value.huf_pname).appendTo($("#user_data"));

                        });
            				$("#user_data").multiselect('reset');
           
						}
					});
					
				}

			} else{
				alert('Please enter sample size');
				$('#s_size').focus();
			}

			
		});



	
	function reloadpage(){
		
		dataTable.ajax.reload();
	}

</script>
<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
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
		$("#frdate1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#todate1").datepicker({
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
			$("#frdate").datepicker();
			$("#todate").datepicker();
			$("#frdate1").datepicker();
			$("#todate1").datepicker();
			$("#frdt").datepicker();
			$("#todt").datepicker();



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
				url: 'hosp_utilization_chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Hospital Utilization-1',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.5,
							is3D: true,
							backgroundColor: 'transparent',
							'chartArea': {
    						'backgroundColor': {
        					'fill': '#F4F4F4',
        					'opacity': 100
    						 },
 					}
       
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.ColumnChart(document.getElementById('line_chart1'));
						chart.draw(data, options);
						
					}	
				}).responseText;					
				// chart two
				var jsonData = $.ajax({
				url: 'hosp_utilization_chart2.php',
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
							dataOpacity: 0.5,
							is3D: true,
							backgroundColor: 'transparent',
							'chartArea': {
    						'backgroundColor': {
        					'fill': '#F4F4F4',
        					'opacity': 100
    						 },
 					}
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
	


  



</script>

