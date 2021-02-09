<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
	include('dbinfo.php');

	$dat = date('Y-m-d');
	$mnthNo = date('m');
	$mth = '';
	
	$mVal = 0;
	$m1 = array(1,2,3);
	$m2 = array(4,5,6);  
	$m3 = array(7,8,9);
	$m4 = array(10,11,12);

	switch (true) {
		case in_array($mnthNo, $m1):
			$mVal = 1;
			$mth = 'January';
			break;

		case in_array($mnthNo, $m2):
			$mVal = 2;
			$mth = 'April';
			break;

		case in_array($mnthNo, $m3):
			$mVal = 3;
			$mth = 'July';
			break;

		case in_array($mnthNo, $m4):
			$mVal = 4;
			$mth = 'October';
			break;
		
		
	}
	

	$qry = "SELECT DISTINCT month_id FROM tbl_audit_hh5";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_assoc($res);
	$cid = count($row)+1;
	
  
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');
	
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	$dArry[1] = array(0=>'Adequate facilities for hand hygiene are available In accordance with national guidance');
	$dArry[2] = array(0=>'Overall appearance of the environment is tidy and uncluttered with only appropriate, clean and Well maintained furniture used');
	$dArry[3] = array(0=>'Fabric of the environment and equipment is clean, fresh and pleasant');
	$dArry[4] = array(0=>'Rooms where clinical practice takes place are Not carpeted');
	$dArry[5] = array(0=>'Floor coverings are washable and impervious to Moisture and are sealed regularly');
	$dArry[6] = array(0=>'The complete floor, including edges and corners are visibly clean with no visible body Substances, dust, dirt or debris');
	$dArry[7] = array(0=>'Furnitures, fixtures and fittings are visibly clean With no body substances, dust, dirt or debris or Adhesive tape');

	$dArry1[9] = array(0=>'Lockers');
	$dArry1[10] = array(0=>'Chairs and stools');
	$dArry1[11] = array(0=>'Tables');
	$dArry1[12] = array(0=>'Medical equipment');
	$dArry1[13] = array(0=>'Curtains');
	$dArry1[14] = array(0=>'Changing mats');
	$dArry1[15] = array(0=>'Work station equipments : e.g. Phones, Computer key boards');
	$dArry1[16] = array(0=>'Fans');
	$dArry1[17] = array(0=>'Air vents');
	$dArry1[18] = array(0=>'Patient call bells');
	$dArry1[19] = array(0=>'Patient audio visual systems');
	$dArry1[20] = array(0=>'Toys');
	$dArry1[21] = array(0=>'Baby weighing scales');
	$dArry1[22] = array(0=>'All dispensers, holders and all parts of the Surfaces of dispensers of soap and alcohol gels');
	$dArry1[23] = array(0=>'Paper towel / cough / roll / toilet paper holders are visibly clean with no
	body substances, dust, Dirt or debris or adhesive tape');
	$dArry1[24] = array(0=>'Hand wash basins are visibly clean with no body substances, dust, lime scale stains  Deposits or smears');
	$dArry1[25] = array(0=>'Hand wash basins are dedicated for that use only and are free from used equipment and Inappropriate items');
	$dArry1[26] = array(0=>'Waste receptacles are clean, including lid and Pedal');
	$dArry1[27] = array(0=>'Foot pedals of clinical waste bins are in good Working order');
	$dArry1[28] = array(0=>'There is a procedure in place for regular Decontamination of curtains');
	$dArry1[29] = array(0=>'Furniture in patient areas e.g. chairs and Couches are made of impermeable and Washable materials');
	$dArry1[30] = array(0=>'Pillows are enclosed in a washable and Impervious cover');
	$dArry1[31] = array(0=>'Furniture that cannot be cleaned is condemned');
	$dArry1[32] = array(0=>'Tables are tidy and uncluttered to enable Cleaning');
	$dArry1[33] = array(0=>'Water coolers are visibly clean and on a planned Maintenance
	programme');
	$dArry1[34] = array(0=>'Soft toys are not available for communal use');
	$dArry1[35] = array(0=>'Feeding areas, bedding are changed and Cleaned regularly');

	$dArry2[36] = array(0=>'There is an identified area for the storage of Clean and sterile equipment');
	$dArry2[37] = array(0=>'All products are stored above floor level');

	$dArry3[38] = array(0=>'Bathrooms are not used for equipment storage');
	$dArry3[39] = array(0=>'Wall tiles and wall fixtures (including soap dispensers and towel holders) are clean and Free from mould');
	$dArry3[40] = array(0=>'Showers curtains and bath mats are free from Mould, clean and dry');
	$dArry3[41] = array(0=>'Appropriate cleaning materials are available for Staff to clean the bathroom between use (and There is information regarding its whereabouts)');

	$dArry4[42] = array(0=>'Toilets are visible clean with no body Substances, dust, lime scale stains, deposits Or smears – including underneath toilet seat');
	$dArry4[43] = array(0=>'Facilities are available for the safe disposal of sanitary towels');
	$dArry4[44] = array(0=>'Sanitary bins are replaced regularly with clean to prevent overfilling');

	$dArry5[45] = array(0=>'A dirty utility is available');
	$dArry5[46] = array(0=>'A separate sink is available for decontamination Of patient equipment');
	$dArry5[47] = array(0=>'A sluice hopper is available for the disposal of Body fluids');
	$dArry5[48] = array(0=>'Hand washing facilities are available including Soap and paper towels');
	$dArry5[49] = array(0=>'The room is clean and free from inappropriate Items');
	$dArry5[50] = array(0=>'The floor is clean and free from spillage');
	$dArry5[51] = array(0=>'Floors including edges and corners are free of Dust and grit');
	$dArry5[52] = array(0=>'Cleaning equipment is colour coded');
	$dArry5[53] = array(0=>'Mops and buckets are stored according to the Local policy');
	$dArry5[54] = array(0=>'Mop heads are washed with detergent daily and Dried');
	$dArry5[55] = array(0=>'The staff has knowledge about use of the Disinfectants');
	$dArry5[56] = array(0=>'There is a defined cleaning protocol available');






/*print_r($dArry);
die();
foreach ($dArry as $key => $value) {
	
}
*/

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
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-left:0;height: 60px;">
                            HIC Audit
							<?php if ($filtered_rows1 == 0) { ?>
                            	<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New HIC Audit</b></button>
                            	
                            <?php } ?>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" value="<?= $cid ?>" readonly />
											</div>
										</div>
									<div class="col-lg-12">
										<label class="col-md-2">Quarter</label>
										<div class="col-lg-4">
											<input type="text" name="quarter" id="quarter" value="<?= $mVal ?>"  class="form-control" readonly />
											<!-- <option value="1" <?= ($mVal == 1)? 'selected': '' ?>>1</option>
											<option value="2" <?= ($mVal == 2)? 'selected': '' ?>>2</option>
											<option value="3" <?= ($mVal == 3)? 'selected': '' ?>>3</option>
											<option value="4" <?= ($mVal == 4)? 'selected': '' ?>>4</option>
										</select> -->
										</div>
										<label class="col-md-2">Month</label>
										<div class="col-lg-4">
											<input type="text" name="month" id="month" value="<?= $mth ?>" class="form-control" readonly>
											<!-- <select type="text" name="month" id="month"  class="form-control" disabled="true" />
											<option value="1"><?= date('F') ?></option>
											 <option value="2" <?= ($mVal == 2)? 'selected': '' ?>><?= date('F') ?></option>
											<option value="3" <?= ($mVal == 3)? 'selected': '' ?>><?= date('F') ?></option>
											<option value="4" <?= ($mVal == 4)? 'selected': '' ?>><?= date('F') ?></option> 
										</select> -->
									</div>
										
								</div>
								<div class="col-lg-12">
									<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Environment </label>
									<div class="col-lg-12">
										<table class="table table-bordered">
													<thead>
														<tr>
															<th>sr.no</th>
															<th width="30%"><strong>Environment
															<th>Yes</th>
															<th>No</th>
															<th>NA</th>
															<th>Comment</th>
														</tr>
														</thead>
														<tbody>
														<?php 
															$n = 1;
															$k = 1;
															//$arrVal = array();
														 foreach ($dArry as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>
														<tr>
															
															<th colspan="6"><strong>The following are clean and free of splashes, soil, film, dust, fingerprints, and spillage and in a good state of repair free From rips and tears</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry1 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>Clinical room / clean store</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry2 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>Bathrooms/washrooms</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry3 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>Toilets</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry4 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>Dirty utility</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry5 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														
													</tbody>
												</table>
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
												 <input type="hidden" name="tbl" value="tbl_audit_hh5">
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
												<th>Action</th>
											    <th>Quarter</th> 
												<th>Month</th>	
												<th>Date</th>
												<th>Name</th>	
												<th>Sign</th>	
												
												
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
                <p style="text-align: center;"><b><font color="#000000">Environment</font></b></p>
                
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
				url: "audit_hh/hic5Excel.php",
				data:{user_id:uid,tbl:'tbl_audit_hh5',ptbl:'ptbl'},
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
				url:"audit_hh/fetch_all_data.php",
				type:"POST",
				data:{tbl:'tbl_audit_hh5'}
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
						url:"audit_hh/hh1.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							//alert(data);
							//window.location = window.location.href;
							$('#user_form')[0].reset();
							$('#adm').hide('fast');
							$('#bx1').hide('fast');
							$('#bx2').show('fast');
							$('#add_btn').show('fast');
							//$('#myModal').modal('hide');
							//dataTable.ajax.reload();
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
				data:{user_id:user_id,tbl:'tbl_audit_hh5'},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#cb').show();
					$('#item_no').focus();
					$('#sr_no').val(data.mthId);
					$("#month").val(data.month);
					$("#quarter").val(data.quarter);
					$('#name').val(data.name);
					$('#sign').val(data.sign);
					var lp = data.data;
					for (i = 0; i < lp.length; i++) {
						console.log('#yn'+lp[i][0]+'_'+lp[i][1]);
						$('#yn'+lp[i][0]+'_Yes').attr('checked', false);
						$('#yn'+lp[i][0]+'_'+lp[i][1]).attr('checked', true);
						$('#cmt'+lp[i][0]).val(lp[i][2]);
						
					}
					$('#user_id').val(data.mthId);
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
					data:{user_id:user_id,tbl:'tbl_audit_hh5'},
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