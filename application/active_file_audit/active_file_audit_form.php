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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('pharmcy_register_count.php').fadeIn("slow");
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
                            Pharmacy Registration Form
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>
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
											<label class="col-lg-4">Item No.</label>
											<div class="col-lg-7">
												<input type="text" name="item_no" id="item_no" class="form-control" placeholder="Item No." required />
											</div>
										</div>

										<div class="col-lg-12">
											<label class="col-lg-4">Quantity</label>
											<div class="col-lg-4">
												<input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity" />
											</div>
										</div>


										<div class="col-lg-12">
											<label class="col-lg-4">Vendor</label>
											<div class="col-lg-4">
												<input type="text" name="vendor" id="vendor" class="form-control" placeholder="Vendor" />
											</div>
										</div>
										
										
										
										<div class="col-lg-12">
											<label class="col-lg-4">Purchase Order	</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="purchase_ordr" id="purchase_ordr" placeholder="Purchase Order..." class="form-control" />
											</div>
										</div>	


									<div class="col-lg-12">
											<label class="col-lg-4">No. Of Drugs/Items Purchased By Local Purchase Within Formulary	</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary" id="no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary" placeholder="No. Of Drugs/Items Purchased By Local Purchase Within Formulary	..." class="form-control" />
											</div>
										</div>	


										<div class="col-lg-12">
											<label class="col-lg-4">% Of Drugs And Consumable Procured By Local Purchase	</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="per_of_drug_consumble_producd_by_locl_purchase" id="per_of_drug_consumble_producd_by_locl_purchase" placeholder="% Of Drugs And Consumable Procured By Local Purchase	..." class="form-control" />
											</div>
										</div>	


										
									
										<div class="col-lg-12">
											<label class="col-lg-4">No. Of Stock Outs</label>
											<div class="col-lg-2">	
												<select type="text" name="no_of_stock_out" id="no_of_stock_out" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<!-- <div class="col-lg-6" id="symp">	
												
												<input type="text" autocomplete="off" name="ReasoneForReportingError" id="ReasoneForReportingError" placeholder="Reasone For Reporting Error" class="form-control" />
											
											</div> -->
										</div>


											<div class="col-lg-12">
											<label class="col-lg-4">% Of Stock Outs </label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="per_of_stocks_out" id="per_of_stocks_out" placeholder="% Of Stock Outs ..." class="form-control" />
											</div>
										</div>	
										
 
  
  

									  <div class="col-lg-12">
											<label class="col-lg-4">Total Quantity Rejected	</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="total_quantity_rejected" id="total_quantity_rejected" placeholder="Total Quantity Rejected	..." class="form-control" />
											</div>
										</div>	

									<div class="col-lg-12">
											<label class="col-lg-4">Total Quantity Received Before Grn		</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="total_qnty_receivd_befor_grn" id="total_qnty_receivd_befor_grn" placeholder="Total Quantity Received Before Grn ..." class="form-control" />
											</div>
									</div>	
									
							<div class="col-lg-12">
	
											<label class="col-lg-4">  % Of Drugs And Consumables Rejected Before Preparation Of Goods Receipt Note(Grn)	</label>
											<div class="col-lg-7">
                                  
												<input type="text" autocomplete="off" name="per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn" id="per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn" placeholder="% Of Drugs And Consumables Rejected Before Preparation Of Goods Receipt Note(Grn)..." class="form-control" />
											</div>
										</div>	

	



							<div class="col-lg-12">
											<label class="col-lg-4">Total Number Of Variations From The Defined Procurement Process	</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="totl_num_of_variation_frm_the_defend_procument_procs" id="totl_num_of_variation_frm_the_defend_procument_procs" placeholder="Total Number Of Variations From The Defined Procurement Process	..." class="form-control" />
											</div>
										</div>	


							<div class="col-lg-12">
											<label class="col-lg-4">Total No. Of Item Procured	</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="totl_no_of_itm_procured" id="totl_no_of_itm_procured" placeholder="Total No. Of Item Procured..." class="form-control" />
											</div>
										</div>	
										
										
										
										<div class="col-lg-12">
											<label class="col-lg-4">% Of Variation From The Procurement Process</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="per_of_vartion_frm_the_procmnt_process" id="per_of_vartion_frm_the_procmnt_process" 
												 placeholder="% Of Variation From The Procurement Process..." class="form-control" />
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
												<th>Item No.</th>	
												<th>Quantity</th>	
												<th>Vendor</th>	
												<th>Purchase Order</th>
												<th>No. Of Drugs/Items Purchased By Local Purchase Within Formulary</th>	
												<th>% Of Drugs And Consumable Procured By Local Purchase</th>	
												<th>No. Of Stock Outs</th>	
												<th>% Of Stock Outs</th> 	
												<th>Total Quantity Rejected</th>	
												<th>Total Quantity Received Before Grn</th>	
												<th>% Of Drugs And Consumables Rejected Before Preparation Of Goods Receipt Note(Grn)</th>	
												<th>Total Number Of Variations From The Defined Procurement Process</th>	
												<th>Total No. Of Item Procured</th>

												<th>% Of Variation From The Procurement Process</th>
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
				<!-- <div class="form-group">
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
				</div> -->
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
		$("#d_adm").datepicker({
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
			$('#user_form')[0].reset();
			$('#bx1').show('fast');
			$('#adm').show('fast');
			$('#add_btn').hide('fast');
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			$('#item_no').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			$('#sr').load("load_pharmcy_register.php");
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
				url:"fetch_all_pharmcy_register_form.php",
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
			var item_no = $('#item_no').val();
			if(item_no != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"insert_pharmcy_register_form.php",
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
				alert('Please enter Item no.');
				$('#item_no').focus();
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"fetch_single_pharmcy_register_form.php",
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
					$('#item_no').val(data.item_no);

					$('#quantity').val(data.quantity);
					$('#vendor').val(data.vendor);
					$('#purchase_ordr').val(data.purchase_ordr);
					$('#no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary').val(data.no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary);
					$('#per_of_drug_consumble_producd_by_locl_purchase').val(data.per_of_drug_consumble_producd_by_locl_purchase);
					$('#no_of_stock_out').val(data.no_of_stock_out);
					$('#per_of_stocks_out').val(data.per_of_stocks_out);
					$('#total_quantity_rejected').val(data.total_quantity_rejected);
					$('#total_qnty_receivd_befor_grn').val(data.total_qnty_receivd_befor_grn);
					$('#per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn').val(data.per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn);
					$('#totl_num_of_variation_frm_the_defend_procument_procs').val(data.totl_num_of_variation_frm_the_defend_procument_procs);
					$('#totl_no_of_itm_procured').val(data.totl_no_of_itm_procured);
					$('#per_of_vartion_frm_the_procmnt_process').val(data.per_of_vartion_frm_the_procmnt_process);
					
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
					url:"delete_pharmcy_register_form.php",
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
				url: 'pharmacy_register_chart-1.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Pharmacy Regisatration Details',
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
				url: 'pharmacy_register_chart-2.php',
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