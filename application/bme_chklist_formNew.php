<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	
	include('dbinfo.php');

	


	$dat = date('Y-m-d');


	

	
	$query1 = "SELECT * FROM tbl_bme_checkstnew where audit_date = '".$dat."'";

	

	
	$statement1 = $connection->prepare($query1);
	$r= $statement1->execute();
	$filtered_rows1 = $statement1->rowCount();
	 
	
	
	
  
	$dt = date('d/m/Y');


	$tm = date('h:i:s a');
	$yr = date('Y');
	
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	




/*print_r($dArry);
die();
foreach ($dArry as $key => $value) {
	
}
*/

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
                        <div class="panel-heading" style="padding:7px;">
                           Biomedical Equipment Safety monthly Checklist 
						
									<?php if (1) { ?>
                            	<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New Record</b></button>
                            	
                            <?php } ?>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">

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
										<div class="col-lg-4">
								 <div class="alert alert-danger alert-dismissible dateerror21" role="alert" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Audit Done On this date
                        </div>
							</div>
										</div>


										<script type="text/javascript">
									
									$('#audit_date').change(function(){  
								var testn = $(this).val(); 			
								$.ajax({  
									url:"daily_audit_data/check_date_present.php",  
									method:"POST",  
									data:{testn:testn , tbl:'tbl_bme_checkstnew'},
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
								<div class="col-lg-12">
<table class="table table-bordered">

 <?php $c=0;?>
  <thead>

  	<tr style="background-color: #001c8047;">
   
   	<th align="center" colspan="6"> Biomedical Equipment Safety monthly Checklist </th>
   	
   </tr>
   <tr>
   
   	<th align="center" colspan="6"></th>
   	
   </tr>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong></strong></th>
   	<th>Yes</th>
   	<th>No</th>
   	<th>NA</th>
   	<th>Comments</th>
   </tr>
	<?php  $data = array('Department ',
' List of updated biomedical equipment shall be there with Equipment Identification tag. (EIT)',
'Preventive maintenance shall be planned (PMS schedule). With proper PMS reports.',
'Calibration shall be done as per schedule with proper calibration reports. Calibration tags shall be displayed on machine.',
'Breakdown shall be recorded in complaint book and down time shall be recored. It shall be as minimum as possible for critical equipements.',
'Dos and don’t shall be displayed on equipement with proper sop to use including safety precaution.',
'All wires and cables shall be properly insulated to avoid any shocks to patient. Machine shall be checked daily by tester before patient use.'

);
 ?>


   
  
<?php  foreach ($data as $key => $value) {  ?>

	

	<tr>
		<td><?php echo $key+1; (++$c);?></td>
        <td><?=$value?> <input type="hidden" name="arrVal[<?= $c ?>][0]" value="<?= $c ?>" id="pos_id<?= $c ?>"></td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Yes" value="Yes" checked>Yes
			</label>


		</td>
		<td>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_No" value="No" >No
			</label>
		</td>
		<td>
			<label class="radio-inline">
					<input type="radio" name="arrVal[<?= $c ?>][1]" id="yn<?= $c ?>_Na" value="Na" >NA
			</label>
        </td>
		<td>  <textarea name="arrVal[<?= $c ?>][2]" rows="2" id="cmt<?= $c ?>" cols="40">    </textarea>
		</td>

			
      
    </tr>
<?php } ?>

	


</thead></table></div>


											
										
										<div class="col-lg-12">
											<hr />
										</div>

										
											
											
										<div class="col-lg-12">
											<!-- <label class="col-lg-3">Name</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="name" id="name" 
												 placeholder="Name" class="form-control" />
											</div> -->
											<!-- <label class="col-lg-3">Sign</label> -->
											<div class="col-lg-9">
												<!-- <input type="text" autocomplete="off" name="name_sign" id="name_sign" 
												 placeholder="Sign" class="form-control" readonly="" /> -->
												 <input type="hidden" name="tbl" value="tbl_bme_checkstnew">
												  <input type="hidden" name="audit_yr"  id="audit_yr">
												  <input type="hidden" name="audit_mnt" id="audit_mnt" >
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
												<th>Date</th>	
												<th>Month</th>
												<th>Done By</th>	
												
												
												
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
									data:{testn:testn , tbl:'tbl_bme_checkstnew'},
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
				<input type="hidden" id="audittitle" name="audittitle" value="Biomedical Equipment Safety monthly Checklist">	
			
				<?php $tbl = 'tbl_bme_checkstnew'; 
				include('daily_audit_data/chart_display1.php'); 
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
    </div>
</section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style="text-align: center;"><b><font color="#000000"> Biomedical Equipment Safety monthly Checklist </font></b></p>
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
				url: "daily_audit_data/bme_chklst_excel.php",
				data:{user_id:uid,tbl:'tbl_bme_checkstnew'},
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
		$("#audit_date").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
			today:true
		});
				
		$(function(){  
			var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
			$("#audit_date").datepicker();
			
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
			
			// $('#audit_date').val("<?=$dat?>");
			$("#action").attr("disabled", false);
			// $('#sr').load("radiation_cklist_d/load_table_data.php");
			$('#srdiv').hide();

			
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
				url:"daily_audit_data/fetch_all_data.php",
				type:"POST",
				data:{tbl:'tbl_bme_checkstnew'}
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
						url:"daily_audit_data/insert_update_data_monnth.php",
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
				url:"daily_audit_data/update_audit.php",
				method:"POST",
				data:{user_id:user_id,tbl:'tbl_bme_checkstnew'},
				dataType:"json",
				success:function(data)
				{

					console.log(data);
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
					url:"daily_audit_data/delete_form.php",
					method:"POST",
					data:{user_id:user_id,tbl:'tbl_bme_checkstnew'},
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
<?php include_once('audit_report_corr_pre/preventive_correction_month_load.php');?>