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
?>

<style>
	.medicinie {
    overflow-y: auto;
}
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
	<?php include"nav-bar.php";?>
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
                            Medicine Priscription
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<br />
									<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
									<div class="form-group">
										<br>
				<div class="scrollme">  
			<table class="table table-bordered" id="medicinie">
  <thead style="background-color: lightgray;">
    <tr>
      
      <th scope="col" colspan="5" style="padding-left: 100px">TO BE FILLED BY DOCTOR</th>
      <th scope="col" colspan="5" style="padding-left: 130px">BY NURSES</th>
    </tr>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Name of the Drug</th>

      <th scope="col">Dose</th>
      <th scope="col">Route</th>
      <th scope="col">Sign. <br>(DMO)</th>
     
      <th scope="col">Time & Sign.</th>
      <th scope="col">Time & Sign.</th>
      <th scope="col">Time & Sign.</th>
      <th scope="col">Time & Sign.</th>
     <th scope="col">Verified By</th>


    </tr>
  </thead>
   <tbody>
   	<?php for($i=1;$i<=5;$i++) :?>
    <tr>
      <th scope="row"><?=$i?></th>
      
      <td class="row1">
      	<select class="selectpicker form-control drugselect" data-show-subtext="true" data-live-search="true" name="name_drug[]" id="drug_1" onchange="check_other_drug(this.id)">
      	<option value="">--Select--</option>
       <option value="Medicne 1">Medicne 1</option>
        <option value="Headeach">Headeach</option>
        <option value="Crosine">Crosine</option>
        <option value="Disprin">Disprin</option>
        
      </select>
       <br />
         <input type="text"  name="other_drug[]" id="other_d_name" class="form-control other_dose1" style="margin-top: 25px" onkeyup="check_select(this.id)" placeholder="other drug" />
  </td>
      <td class="row1">
      	<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="dose[]" >
      		<option value="">--Select--</option>
       <option value="One Time(M)">One Time(M)</option>
       <option value="One Time(N)">One Time(N)</option>
        <option value="Two Time">Two Time</option>
        <option value="Three Times">Three Times</option>
        <option value="Four Times">Four Times</option>
        
      </select>
      <br />
      <input type="text"  name="other_dose[]" id="route" class="form-control"  style="margin-top: 25px" placeholder="other dose"/>
      </td>
      <td> <input type="text"  name="route[]" id="route" class="form-control"  /></td>
      <td><input type="text"  name="sign_dmo[]" id="sign_dmo" class="form-control"  /></td>
      <td>
      	<input type="text"  name="nurse_sign_1[]" id="nurse_sign_1" class="form-control"  /> 
      	  <br />
        <input type="time" autocomplete="off" name="nurse_time_1[]" id="nurse_time_1" placeholder="hh:mm" class="form-control"  /></td>


      <td>
      	<input type="text"  name="nurse_sign_2[]" id="nurse_sign_1" class="form-control"  /> 
      	  <br />
        <input type="time" autocomplete="off" name="nurse_time_2[]" id="nurse_time_2" placeholder="hh:mm" class="form-control"   />
      </td>
      <td>
      	 <input type="text"  name="nurse_sign_3[]" id="nurse_sign_1" class="form-control"  /> 
      	  <br />
        <input type="time" autocomplete="off" name="nurse_time_3[]" id="nurse_time_3" placeholder="hh:mm" class="form-control"  />
      </td>
      <td>
      	<input type="text"  name="nurse_sign_4[]" id="nurse_sign_1" class="form-control"  /> 
      	  <br />
        <input type="time" autocomplete="off" name="nurse_time_4[]" id="nurse_time_4" placeholder="hh:mm" class="form-control"  />
      </td>
      <td>
      	<input type="text"  name="vefied_by[]" id="vefied_by" class="form-control"  />
      </td>
    </tr>
<?php endfor; ?>
    
  </tbody> 
</table>
</div>
										
										<div class="col-lg-12">
											<hr />
										</div>
                                        <div class="col-lg-12">
											<label class="col-lg-4">Name of the Doctor</label>
											<div class="col-lg-7">
												<input type="text"  name="doctor_name" id="doctor_name" class="form-control"  />
												
											</div>
										</div>

										<div class="col-lg-12">
											<label class="col-lg-4">Date</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="date_done" id="date_done" placeholder="yyyy-mm-dd" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Time</label>
											<div class="col-lg-2">
												<input type="time" autocomplete="off" name="time_done" id="time_done" placeholder="hh:mm" class="form-control" required />
											</div>
										</div>





										<div class="col-lg-12">
											<label class="col-lg-4">OTHER ADVISED</label>
											<div class="col-lg-7">
												<input type="text"  name="other_advices" id="other_advices" class="form-control"  />
												
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">DIET ORDER</label>
											<div class="col-lg-7">
												<input type="text"  name="diet_orders" id="diet_orders" class="form-control"  />
												
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">DISCHARGE / TRANSFER ADVICE</label>
											<div class="col-lg-7">
												<input type="text"  name="dis_tras_advices" id="dis_tras_advices" class="form-control"  />
												
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
												<th>Time</th>
												<th>Other Advices</th>
												<th>Diet Orders</th>
												
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
							<div class="col-lg-3">
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
				<div class="form-group">
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
				</div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->    
</body>
</html>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#date_done").datepicker({
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
			$("#date_done").datepicker();
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
			$('#p_name').focus();
			$('#operation').val("Add_Prisciption");
			$("#action").attr("disabled", false);
			$('#sr').load("medicine_priscription/load_discriptions.php");
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
				url:"medicine_priscription/fetch_all_pric.php",
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
			var p_name = $('#p_name').val();
			if(p_name != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"medicine_priscription/insert_prescription.php",
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
				alert('Please enter patinet name');
				$('#p_name').focus();
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"fetch_single_hosp_form.php",
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
					$('#uhid_no').val(data.uhid_no);
					$('#ipd_no').val(data.ipd_no);
					$('#d_adm').val(data.d_adm);
					$('#t_adm').val(data.t_adm);
					$('#ddd').val(data.ddd);
					$('#dddd').val(data.dddd);
					$('#tddd').val(data.tddd);
					$('#mlc').val(data.mlc);
					$('#surg').val(data.surg);
					$('#los').val(data.los);
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
							dataOpacity: 0.3
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
<script type="text/javascript">

	  function check_other_drug(id) {
           $("#"+id).closest('.row1').find('.other_dose1').val("");
  
	  }
</script>