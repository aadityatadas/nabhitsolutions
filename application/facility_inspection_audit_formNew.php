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

$dat = date('Y-m-d');
$date1 = explode(",",date('F, Y'));

	
	$query1 = "SELECT * FROM tbl_facility_infectionnew where audit_month = '".$date1[0]."' and audit_year=".$date1[1]."";

	

	
	$statement1 = $connection->prepare($query1);
	$r= $statement1->execute();
	$filtered_rows1 = $statement1->rowCount();


 
?>
<?php include_once('high_chart_js.php'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="../data/jquery.multiselect.css" type="text/css">
        <script type="text/javascript" src="../data/jquery.multiselect.js"></script>
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
<?php include"new-nav-bar.php";?>
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
                            FACILITY INSPECTION AUDIT
							<?php if ($filtered_rows1 ==0 ) { ?>
                            	<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New Record</b></button>
                            	
                            <?php } ?>
                        </div>

                     
						
						<div class="box" id="bx1">
							<div id="adm">
								<br />
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<!-- <div class="col-lg-12" id="srdiv">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" value="<?= $cid ?>" readonly />
											</div>
										</div> -->
									<div class="col-lg-12">
											<label class="col-lg-4">Audit Date</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="audit_date" id="audit_date" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										
										
										

										<div class="col-lg-12">
											<hr />
										</div>
										
										






					<br />

	
<?php $c=0;?>
	<?php $data = array('Are Fire exits and fire equipment free from obstruction?',	'Properly signposted?',	'In good working condition?',	'Are staff aware of the security procedures in the workplace?',	'Is Emergency  exit signage is clearly visible',	'Staff are aware of fire safety procedures and know the emergency personnel',	'Staff are inducted in fire safety and Disaster management',	'Extinguisher of appropriate type is close by; i.e., within 20 m',	'Extinguisher is checked once in Three months?',	'Extinguisher is mounted within 1.7m from the floor',	'Fire Alarm can be heard in the area',	'Staff aware about Non fire emergencies',	'Staff aware about evacuation plan during fire and non fire emergencies'
   );
 ?>
<div class="col-lg-12">
<table class="table table-bordered">


  <thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong>FIRE AND SECURITY </strong></th>
   	<th>Yes/No/NA</th>
   	<th>Location & action to be taken</th>
   </tr>
  
<?php  foreach ($data as $key => $value) {  ?>

	

	<tr>
		<td><?php echo $key+1; (++$c);?></td>
        <td><?=$value?> <input type="hidden" name="arrVal[<?= $c ?>][0]" value="<?= $c ?>" id="pos_id<?= $c ?>"></td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Yes" value="Yes" checked>Yes
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_No" value="No" >No
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Na" value="Na" >NA
			</label>
        </td>
		<td>  <textarea name="arrVal[<?= $c ?>][2]" rows="2" id="cmt<?= $c ?>" cols="40">    </textarea>
		</td>

			
      
    </tr>


	
<?php  } ?>	

</thead></table>
</div>

<?php $data = array('Slippery or unsafe floor/corridors? ',	'Is the lighting adequate for the work required?',	'Is protective equipment available and used ',	'For exposure to dust and fumes?',	'In high noise areas?',	'For exposure to extremes of temperature?',	'For protection from blood or body fluids',	'Are ALL safety signs displayed appropriately? e.g. universal precautions  or  fire',	'Adequate personnel available to handle '			

   );
 ?>
<div class="col-lg-12">
<table class="table table-bordered">
<thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong>WORK AREAS AND PHYSICAL HAZARDS</strong></th>
   	<th>Yes/No/NA</th>
   	<th>Location & action to be taken</th>
   </tr>
  
<?php  foreach ($data as $key => $value) {  ?>
<tr>
		<td><?php echo $key+1; (++$c);?></td>
        <td><?=$value?> <input type="hidden" name="arrVal[<?= $c ?>][0]" value="<?= $c ?>" id="pos_id<?= $c ?>"></td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Yes" value="Yes" checked>Yes
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_No" value="No" >No
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Na" value="Na" >NA
			</label>
        </td>
		<td>  <textarea name="arrVal[<?= $c ?>][2]" rows="2" id="cmt<?= $c ?>" cols="40">    </textarea>
		</td>

			
      
    </tr>


	<?php  } ?>	

</thead></table>
</div>

<?php $data = array('Are cords/plugs safe, not frayed or broken?',	'Do any cords present a tripping hazard by running across floors?',	'Has defective electrical equipment been not in use ?',	'Are all hand-operated electric tools/equipment used with a Residual Current Device? ',	'Backup available in case of electricity failure'				
);
 ?>
<div class="col-lg-12">
<table class="table table-bordered">
<thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong>ELECTRICAL HAZARDS</strong></th>
   	<th>Yes/No/NA</th>
   	<th>Location & action to be taken</th>
   </tr>
  
<?php  foreach ($data as $key => $value) {  ?>
<tr>
		<td><?php echo $key+1; (++$c);?></td>
        <td><?=$value?> <input type="hidden" name="arrVal[<?= $c ?>][0]" value="<?= $c ?>" id="pos_id<?= $c ?>"></td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Yes" value="Yes" checked>Yes
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_No" value="No" >No
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Na" value="Na" >NA
			</label>
        </td>
		<td>  <textarea name="arrVal[<?= $c ?>][2]" rows="2" id="cmt<?= $c ?>" cols="40">    </textarea>
		</td>

			
      
    </tr>


	<?php  } ?>	

</thead></table>
</div>
<?php $data = array('Are all chemical containers clearly labelled?',	'Are Material Safety Data Sheets available at the point of use of the chemical?',	'Are dangerous or harmful substances stored appropriately ',	'Is the necessary protective equipment available and used?',	'Are emergency spill kits available and procedures displayed?',	'Is oxygen stored securely and safety signs displayed?',	'Staff are aware of procedures relating to Hazardous materials?',	'Staff trained in chemical handling and are aware of chemical hazards Current chemical MSDS available?',	'Spill kits are available and regularly maintained?',	'Gas cylinders are stored properly and appropriately labelled ',	'Written procedures for chemical handling, storage and spillage in place?'		
				
);
 ?>
<div class="col-lg-12">
<table class="table table-bordered">
<thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong>CHEMICAL, DRUG AND SUBSTANCE HAZARDS</strong></th>
   	<th>Yes/No/NA</th>
   	<th>Location & action to be taken</th>
   </tr>
  
<?php  foreach ($data as $key => $value) {  ?>
<tr>
		<td><?php echo $key+1; (++$c);?></td>
        <td><?=$value?> <input type="hidden" name="arrVal[<?= $c ?>][0]" value="<?= $c ?>" id="pos_id<?= $c ?>"></td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Yes" value="Yes" checked>Yes
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_No" value="No" >No
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Na" value="Na" >NA
			</label>
        </td>
		<td>  <textarea name="arrVal[<?= $c ?>][2]" rows="2" id="cmt<?= $c ?>" cols="40">    </textarea>
		</td>

			
      
    </tr>


	<?php  } ?>	

</thead></table>
</div>
	
	<?php $data = array('Are all equipment, tools, and furniture in good repair and labelled with equipment ID',	'Have broken items been tagged and removed from use?',	'Are special precautions clearly displayed for using dangerous equipment?',	'Is all appropriate guarding in place and operational',	'Are safety signs displayed regarding the use of equipment?',	'Are heavy items or frequently used items stored properly - between hip and shoulder height ',	'Are lifting aids available, in good repair, and stored properly in Back Care Stations?',	'There is proper documented operational and maintenance plan for the equipments. ',	'Copy of proper license/registration certificates available (indicate deficiency)',	'Proper maintenance  and inspection done for all equipments and PM and calibration stickers are pasted'		

				
);
 ?>
<div class="col-lg-12">
<table class="table table-bordered">
<thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong>EQUIPMENT AND MANUAL HANDLING</strong></th>
   	<th>Yes/No/NA</th>
   	<th>Location & action to be taken</th>
   </tr>
  
<?php  foreach ($data as $key => $value) {  ?>
<tr>
		<td><?php echo $key+1; (++$c);?></td>
        <td><?=$value?> <input type="hidden" name="arrVal[<?= $c ?>][0]" value="<?= $c ?>" id="pos_id<?= $c ?>"></td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Yes" value="Yes" checked>Yes
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_No" value="No" >No
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Na" value="Na" >NA
			</label>
        </td>
		<td>  <textarea name="arrVal[<?= $c ?>][2]" rows="2" id="cmt<?= $c ?>" cols="40">    </textarea>
		</td>

			
      
    </tr>


	<?php  } ?>	

</thead></table>
</div>

<?php $data = array('Are known infection risks identified and proper notices in place?',
'Is protective equipment available and used?  i.e. gloves, mask, goggles, gown etc',
'Are there sufficient number of waste collection bins containers available?',
'Are the sharps containers overfilled?',
'Is waste segregated properly?',
'Potable water available round the clock',
'Regular waste disposal is done to minimise waste on site',
'Records of waste are kept',
'Transport of Biomedical waste across the hospital done properly?',
'Are all the staff aware of the biomedical waste practices?'
);
 ?>
<div class="col-lg-12">
<table class="table table-bordered">
<thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong>BIOLOGICAL HAZARDS AND WASTE</strong></th>
   	<th>Yes/No/NA</th>
   	<th>Location & action to be taken</th>
   </tr>
  
<?php  foreach ($data as $key => $value) {  ?>
<tr>
		<td><?php echo $key+1; (++$c);?></td>
        <td><?=$value?> <input type="hidden" name="arrVal[<?= $c ?>][0]" value="<?= $c ?>" id="pos_id<?= $c ?>"></td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Yes" value="Yes" checked>Yes
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_No" value="No" >No
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Na" value="Na" >NA
			</label>
        </td>
		<td>  <textarea name="arrVal[<?= $c ?>][2]" rows="2" id="cmt<?= $c ?>" cols="40">    </textarea>
		</td>

			
      
    </tr>


	<?php  } ?>	

</thead></table>
</div>

<?php $data = array('Staff trained on fire safety and Fire license safety  available for the Hospital',	'Lift maintenance records and license available for all lifts',	'DG maintenance records and license available',	'Electrical safety inspection by EB done and records available ',	'Water quality check done and records available including records for water tank cleaning.'								

);
 ?>
<div class="col-lg-12">
<table class="table table-bordered">
<thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong>OTHER FINDINGS/HAZARDS IF ANY? (Please include)</strong></th>
   	<th>Yes/No/NA</th>
   	<th>Location & action to be taken</th>
   </tr>
  
<?php  foreach ($data as $key => $value) {  ?>
<tr>
		<td><?php echo $key+1; (++$c);?></td>
        <td><?=$value?> <input type="hidden" name="arrVal[<?= $c ?>][0]" value="<?= $c ?>" id="pos_id<?= $c ?>"></td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Yes" value="Yes" checked>Yes
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_No" value="No" >No
			</label>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Na" value="Na" >NA
			</label>
        </td>
		<td>  <textarea name="arrVal[<?= $c ?>][2]" rows="2" id="cmt<?= $c ?>" cols="40">    </textarea>
		</td>

			
      
    </tr>


	<?php  } ?>	

</thead></table>
</div>
										
										
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">

											 <input type="hidden" name="tbl" value="tbl_facility_infectionnew">
												  <input type="hidden" name="audit_yr"  id="audit_yr">
												  <input type="hidden" name="audit_mnt" id="audit_mnt" >


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
												<th>Date</th>	
												<th>Month</th>
												<th>Done By</th>	
												
												
												
											</tr>
										</thead>
									</table>
								</div>
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

									<input type="hidden" id="audittitle" name="audittitle" value="FACILITY INSPECTION AUDIT ">	
			<?php $tbl = 'tbl_facility_infectionnew';

 include('monthly_audit_data/find_date_year_list.php'); ?> 	

													
							
						
							
           <div class="col-lg-2">
								<button type="button" name="search" id="searchgraph" class="btn btn-primary btn-sm searchgraph" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				 <?php include('monthly_audit_data/chart_display.php'); ?>
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
    <!-- /#wrapper -->
    <!-- jQuery -->    
</div>
</section>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style="text-align: center;"><b><font color="#000000">FACILITY INSPECTION AUDIT</font></b></p>
                <a class="btn btn-success pull-right" href="#" id="excel">Excel</a>
        			<div class="dash"></div>
            </div>
            <!-- <div class="modal-footer">
	           
	           
	       </div> -->
        </div>
    </div>
</div>  
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
				url: "monthly_audit_data/faclity_insp_excel.php",
				data:{user_id:uid,tbl:'tbl_facility_infectionnew'},
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
		$("#audit_date1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});		
		$(function(){  
			$("#d_adm").datepicker();
			$("#dddd").datepicker();
			$("#audit_date1").datepicker();
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
			
			$('#audit_date').val("<?=$dat?>");
			$("#action").attr("disabled", false);
			// $('#sr').load("radiation_cklist_d/load_table_data.php");
			$('#srdiv').hide();

			
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
				url:"monthly_audit_data/fetch_all_data.php",
				type:"POST",
				data:{tbl:'tbl_facility_infectionnew'}
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
			
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"monthly_audit_data/insert_update_data_monnth.php",
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
							location.reload();
						}
					});
				}
			
		});
		
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"monthly_audit_data/update_audit.php",
				method:"POST",
				data:{user_id:user_id,tbl:'tbl_facility_infectionnew'},
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
					$('#audit_date').val(data.audit_date);
					
					
					var lp = data.data;
					for (i = 0; i < lp.length; i++) {
						console.log('#yn'+lp[i][0]+'_'+lp[i][1]);
						$('#yn'+lp[i][0]+'_Yes').attr('checked', false);
						$('#yn'+lp[i][0]+'_'+lp[i][1]).attr('checked', true);
						$('#cmt'+lp[i][0]).val(lp[i][2]);
						
					}
					
                  
                  
                  $('#audit_yr').val(data.audit_year);
                  $('#audit_mnt').val(data.audit_month);
                  
                  
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
					url:"monthly_audit_data/delete_form.php",
					method:"POST",
					data:{user_id:user_id,tbl:'tbl_icu_checkstNew'},
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
						url:"hr_audit_d/search_patinet.php",
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
	


  



</script>

<?php include_once('audit_report_corr_pre/preventive_correction_month_load.php');?>
