<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	
	include('dbinfo.php');

	$dat = date('Y-m-d');


	$date1 = explode(",",date('F, Y'));

	
	$query1 = "SELECT * FROM tbl_icu_checkstnew where audit_month = '".$date1[0]."' and audit_year=".$date1[1]."";

	

	
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php include_once('high_chart_js.php'); ?>
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


	<?php include"nav-bar-icu-officer.php";?>
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
                            ICU Audit Checklist
						
									<?php if ($filtered_rows1 ==0 ) { ?>
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
										</div>
								<div class="col-lg-12">
<table class="table table-bordered">

 <?php $c=0;?>
  <thead>
   <tr>
   	<th>sr.no</th>
   	<th width="30%"><strong></strong></th>
   	<th>Yes/No/NA</th>
   	<th>Remark</th>
   </tr>
	<?php $data = array('Sufficient space for carrying out patient care activities with adequate circulation space',
'Facility should be safe from any physical injury chances (non-slippery floor, safe electrical fittings, no accidental spots etc.)',
'Inter-bed distance to be maintained at around 6 feet',
'Hand washing area easily accessible to healthcare staff',
'Accessibility of fire-fighting equipment',
'Crash cart placed at a location from where it could be immediately accessed when required',
'Patient’s washroom should have safety arrangements (anti-skid mats, emergency call button, grab bars, disable friendliness, door opening outside, latch type locking which can be opened from outside)',
'Adequate privacy arrangement for patient (especially applicable in multi-bed ICUs)',
'Availability of all necessary patient care equipment',
'Bio-medical waste bins as per BMW rules',
'Separate or segregated storage area for clean and dirty supplies'

   );
 ?>


   <tr style="background-color: #001c8047;">
   	<th align="center">A</th>
   	<th align="center">Physical Facilities Related Requirements:</th>
   	<th></th>
   	<th></th>
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

<?php $data = array('Categories of nurses required to be identified',
'Nurse: patient ratio to be defined for the ICU in each shift',
'Duty roster to serve as an evidence of nurse patient ratio',
'Duty doctor should be available round the clock (physical or on call)',
'Other support staff as required'
);
 ?>


    <tr style="background-color: #001c8047;">
   	<th align="center">B</th>
   	<th align="center">Staffing related requirements</th>
   	<th></th>
   	<th></th>
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

<?php $data = array('Linen on patients’ beds to be changed daily (or as defined by hospital’s policy)',
'Periodic cleaning of mattresses, pillow and other bed items',
'Temperature of refrigerator in which medicines are stored should be monitored and recorded, at-least once in each shift ',
'Crash cart should have all life- saving drugs and equipment. It should be replenished whenever used',
'All emergency medicines should be available as per defined quantity',
'Mechanism of replenishing emergency medicines to be followed',
'If medicines are stored in ICUs, look alike, sound alike medicines to be stored separately (or as per hospital’s policy)',
'High risk medicines to be identified and stored separately',
'Multi-use open vials to have labels of date of opening and date of expiry',
'If NDPS are temporarily stored, it should be under lock and key. NDPS regulations to be followed',
'Proper identification of patient before carrying out any patient care activity',
'Reporting of adverse patient events',
'List of hazardous materials in the ICU to be identified and MSDS sheet for them should be available',
'Bio-medical waste should be segregated as per regulation ',
'All areas of ICU’s, including washroom should be maintained neat and tidy',
'Clean supplies and dirty used items should be stored separately  ',
'Maintenance of medical records as per hospital’s policy',
'Security and confidentiality of medical records to be maintained as per hospital’s policy',
'Maintenance of necessary registers (admission-discharge, stock, laundry, adverse incident register etc.)'
);
 ?>


   <tr style="background-color: #001c8047;">
   	<th align="center">C</th>
   	<th align="center">ICU management related requirements</th>
   	<th></th>
   	<th></th>
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



<?php $data = array('Components and time-frame for initial assessment of admitted patients',
'Uniform care policy and patient care process that falls under it ',
'Patients’ rights',
'Dealing with HIV +ve patients and maintaining confidentiality ',
'Provision of basic cardiac life support',
'Code blue policy and procedure',
'Other emergency codes (such as code blue, code red, code orange etc.)',
'Identification and care of vulnerable patients',
'Care of surgical patient/cardiac (as per ICU speciality)',
'Proper identification of patients',
'Safe medication practices (things to check before administration, monitoring, verbal orders, administering high risk medicines etc.)',
'Safe blood transfusion practices',
'Policy and procedure of patient’s restraint',
'Pain management policy and protocol ',
'Standard precautions for infection control (hand hygiene, use of PPE etc.)',
'Safe injection practices',
'Patient safety incidents, its types and reporting (such as near miss, sentinel, adverse drug reaction etc.)',
'Emergency evacuation plan ',
'Their role during any disastrous situation',
'Basic fire safety measures'

);
 ?>


   <tr style="background-color: #001c8047;">
   	<th align="center">D</th>
   	<th align="center">Staff awareness related requirements: staff of the ICU (nurses and doctors) should receive training and be aware on a large number of topics. The important ones from accreditation point of view are;</th>
   	<th></th>
   	<th></th>
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

<?php $data = array('Average time for initial assessment of admitted patient and % outliers ',
'Incidence of medication errors ',
'Percentage of admissions with adverse drug reaction',
'Percentage of patients receiving high risk medicines and developing adverse drug reaction',
'Percentage of transfusion reaction',
'Percentage of near miss events ',
'Incidence of patient falls ',
'Incidence of bed sores after admissions ',
'incidence of patient rights violations',
'Incidence of needle stick injuries',
'Incidence of missing medical records ',
'Incidence of non-compliance observed to infection control practices ',
'Patient satisfaction rate of the ICU (checkout a sample form)',
'Time taken for discharge ',
'Average nurse patient ratio in each shift',
'Percentage of current medical records that are incomplete as per hospital’s policy');
 ?>


   <tr style="background-color: #001c8047;">
   	<th align="center">E</th>
   	<th align="center">Quality indicators for ICUs: These QIs can be calculated in each ICU and then combined for hospital wide QI</th>
   	<th></th>
   	<th></th>
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
												 <input type="hidden" name="tbl" value="tbl_icu_checkstnew">
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
							
                        </div>
                    </div>
                </div>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<div class="col-lg-3" style="color: black;">	
										Audit Details(charts)
									</div>

									<input type="hidden" id="audittitle" name="audittitle" value="ICU Audit Checklist">	
			<?php $tbl = 'tbl_icu_checkstnew';

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
</div>
</section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style="text-align: center;"><b><font color="#000000">ICU Audit Checklist</font></b></p>
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
				url: "monthly_audit_data/icu_chklst_excel.php",
				data:{user_id:uid,tbl:'tbl_icu_checkstnew'},
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
		$("#audit_date1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
			today:true
		});
				
		$(function(){  
			var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
			$("#audit_date1").datepicker();
			
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
			
			$('#audit_date').val("<?=$dat?>");
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
				url:"monthly_audit_data/fetch_all_data.php",
				type:"POST",
				data:{tbl:'tbl_icu_checkstnew'}
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
				data:{user_id:user_id,tbl:'tbl_icu_checkstnew'},
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
					data:{user_id:user_id,tbl:'tbl_icu_checkstnew'},
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
