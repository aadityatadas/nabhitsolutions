<?php
	error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Calcutta');	
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');	
	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#cent').load('cent_count.php').fadeIn("slow");
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
	<?php include"nav-bar-nur.php";?>

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
                            Central Line Associated Blood Stream Infection Form

                           <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);  color: #fff;font-weight:bold;margin-right: 10px;" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
                             <div style="padding-left:  350px;">
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

													$qry = "SELECT COUNT(*) as total FROM tbl_centrl_line_assoc WHERE year(cent_bs_dticlc) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as comp FROM tbl_centrl_line_assoc WHERE (cent_bs_tcld!='' AND cent_bs_tcld!='0')AND year(cent_bs_dticlc) = '$yr'";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notcomp FROM tbl_centrl_line_assoc WHERE (cent_bs_tcld='' OR cent_bs_tcld='0')AND year(cent_bs_dticlc) = '$yr'";
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
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-3">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the Patient</label>
											<div class="col-lg-7">	
												<input type="text" list="plist" name="p_name" id="p_name" class="form-control" readonly />
												<datalist id="plist">
												
												</datalist>
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
											<label class="col-lg-4">Date of Admission</label>
											<div class="col-lg-4">
												<input type="text" name="d_adm" id="d_adm" class="form-control" readonly />
											</div>
										</div>
										<div id="record1" style="border:thin">
											<div class="col-lg-12">

												<hr />
												<label class="col-lg-2" style=" background-color: #d0dce9;">
													<u> Record 1</u></label>
											</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Insertion of Central Line Catheter</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="t_adm" id="t_adm" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="t_adm1" id="t_adm1" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Removal of Central Line Catheter</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="ddd" id="ddd" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="ddd1" id="ddd1" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Total Central Line Days</label>
											<div class="col-lg-2">
												<input type="text" name="dddd" id="dddd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Whether Patient has symptoms of BSI</label>
											<div class="col-lg-2">
												<select type="text" name="psympt" id="psympt" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-6" id="symp">	
												<select type="text" name="tddd" id="tddd" class="form-control" />
													<option value="">Select</option>
													<option value="Fever">Fever</option>
													<option value="Increased TLC Count">Increased TLC Count</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">							
											<label class="col-lg-4">Date of Sample sent for culture</label>
											<div class="col-lg-4">
												<input type="text" name="mlc" id="mlc" placeholder="yyyy-mm-dd" class="form-control" >
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Whether Sample Positive for CLABSI</label>
											<div class="col-lg-2">	
												<select type="text" name="surg" id="surg" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>								
										</div>
									</div>
										<div class="col-lg-12">
											<hr />
										</div>
											<div id="Old_Data" ></div>
											<div class="col-lg-12">
												<div class="col-lg-10"></div>
												<div class="col-lg-2" id="addButton">
												 <button type="button" name="add" id="add" class="btn btn-info">Add New Record</button>
												</div>
											</div>
											<div id="newDatatoSave" ></div>


		
			

     
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
												<th>Sr.No.</th>
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>IPD No</th>
												<th>Date of Admission</th>
												<th>Date & Time of Insertion of Central Line Catheter</th>
												<th>Date & Time of Removal of Central Line Catheter</th>
												<th>Total Central Line Days</th>
												<th>Whether Patient has symptoms of BSI</th>
												<th>Symptoms Details</th>
												<th>Date of Sample sent for culture</th>
												<th>Whether Sample Positive for CLABSI</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									
									<form method="post" action="../excel/CAU/export.php" class="panel-heading">
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
										<div class="col-lg-12" id="cent">
					
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
						<div id="line_chart1" style="height:400px;"></div>
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
		$("#ddd").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#t_adm").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#mlc").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});

		$(function(){  
			$("#frdate").datepicker();
			$("#todate").datepicker();
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
			$("#ddd").datepicker();
			$("#t_adm").datepicker();
			//$("#t_adm1").timepicker();
			//$("#ddd1").timepicker();
			$("#mlc").datepicker();
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
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_cult', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_cult2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
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
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_cent_bsi_form.php",
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
					url:"insert_cent_bsi_form.php",
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
						dataTable.ajax.reload();
					}
				});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_cent_bsi_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					$('#uhid_no').val(data.uhid_no);
					$('#ipd_no').val(data.ipd_no);
					$('#d_adm').val(data.d_adm);
					$('#t_adm').val(data.t_adm);

					if(($('#t_adm').val())==""){

                         $('#addButton').hide();
					}else{
						 $('#addButton').show();
					}
					$('#t_adm1').val(data.t_adm1);
					$('#psympt').val(data.psympt);
					$('#ddd').val(data.ddd);
					$('#ddd1').val(data.ddd1);
					$('#dddd').val(data.dddd);
					$('#tddd').val(data.tddd);
					$('#mlc').val(data.mlc);
					$('#surg').val(data.surg);
					$('#user_id').val(data.sr_no);

					if(data.oldDataCount>0){
          	var j=1;
          	for(var i=0; i < data.oldDataCount; i++){

          var html ='<div id="row'+i+'"  ><div class="col-lg-12"><hr /><label class="col-lg-2" style="background-color: #d0dce9;"><u> Record '+(++j)+'</u></label></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Insertion of Central Line Catheter</label><div class="col-lg-2"><input type="text" autocomplete="off" value="'+data.one[i]+'" name="t_admold[]" id="t_admold'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required readonly/></div><div class="col-lg-2"><input type="time" name="t_adm1old[]" id="t_adm1old'+i+'" value="'+data.two[i]+'" placeholder="hh:mm" class="form-control" required readonly /></div></div>' ;
            html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Removal of Central Line Catheter</label><div class="col-lg-2">	<input type="text" autocomplete="off" name="dddold[]" id="dddold'+i+'" value="'+data.three[i]+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required readonly/></div><div class="col-lg-2"><input type="time" name="ddd1old[]" value="'+data.four[i]+'" id="ddd1old'+i+'" placeholder="hh:mm" class="form-control" required readonly/></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Total Central Line Days</label><div class="col-lg-2"><input type="text" name="ddddold[]" id="ddddold'+i+'" value="'+data.five[i]+'" class="form-control" readonly  /></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Whether Patient has symptoms of BSI</label><div class="col-lg-2"><select type="text" name="psymptold[]" id="psymptold'+i+'" value="'+data.five[i]+'" onChange="LoadData();" class="form-control" disabled><option value=""'+data.six[i]+'"">'+data.six[i]+'</option></select></div><div class="col-lg-6" id="symp"><select type="text" value="'+data.seven[i]+'" name="tdddold[]" id="tdddold'+i+'" class="form-control" disabled><option value="'+data.seven[i]+'">'+data.seven[i]+'</option></select></div></div>';
        html +='   <div class="col-lg-12"><label class="col-lg-4">Date of Sample sent for culture</label><div class="col-lg-4"><input type="text" autocomplete="off" name="mlcold[]" id="mlcold'+i+'" value="'+data.eight[i]+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" readonly></div></div>';
        html += '<input type="hidden" value="'+data.tbl_huf_id[i]+'" name="vent_ass_'+i+'"><br><input type="hidden" value="'+data.centrl_line_assoc_id[i]+'" name="huf_id_'+i+'"><br>';
         html +=' <div class="col-lg-12"><label class="col-lg-4">Whether Sample Positive for CLABSI</label><div class="col-lg-2"><select type="text" name="surg[]" id="surg" class="form-control" value="" disabled ><option value="'+data.nine[i]+'">'+data.nine[i]+'</option></select></div>';

         
  
          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button type="button" name="edit" id="'+data.centrl_line_assoc_id[i]+'"  class="btn btn-info edit_data">Edit Record No. '+j+'</button></div></div>';
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
		$('#t_adm').mask('9999-99-99');// for Date
		$('#ddd').mask('9999-99-99');// for Date
		//$('#t_adm1').mask('99:99');// for time
		//$('#ddd1').mask('99:99');// for time
		$('#mlc').mask('9999-99-99');// for Date
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
				
				// Chart Twelve
				var jsonData = $.ajax({
				url: 'cent_ass_chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Central Line Associated Blood Stream Infection',
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
          var html = '<div id="row'+divcount+'"  ><div class="col-lg-12"><label class="col-lg-4">Date & Time of Insertion of Central Line Catheter</label><div class="col-lg-2"><input type="text" autocomplete="off" name="t_admnew[]" id="t_admnew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required/></div><div class="col-lg-2"><input type="time" name="t_adm1new[]" id="t_adm1new'+divcount+'" placeholder="hh:mm" class="form-control" required /></div></div>' ;
            html += '<div class="col-lg-12"><label class="col-lg-4">Date & Time of Removal of Central Line Catheter</label><div class="col-lg-2">	<input type="text" autocomplete="off" name="dddnew[]" id="dddnew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" required /></div><div class="col-lg-2"><input type="time" name="ddd1new[]" id="ddd1new'+divcount+'" placeholder="hh:mm" class="form-control" required/></div></div>';

          html += '<div class="col-lg-12"><label class="col-lg-4">Total Central Line Days</label><div class="col-lg-2"><input type="text" name="ddddnew[]" id="ddddnew'+divcount+'" class="form-control" readonly /></div></div>';
          html += '<div class="col-lg-12"><label class="col-lg-4">Whether Patient has symptoms of BSI</label><div class="col-lg-2"><select type="text" name="psymptnew[]" id="psymptnew'+divcount+'" onChange="LoadData();" class="form-control"><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-6" id="symp"><select type="text" name="tdddnew[]" id="tdddnew'+divcount+'" class="form-control"><option value="">Select</option><option value="Fever">Fever</option><option value="Increased TLC Count">Increased TLC Count</option></select></div></div>';
        html +='   <div class="col-lg-12"><label class="col-lg-4">Date of Sample sent for culture</label><div class="col-lg-4"><input type="text" autocomplete="off" name="mlcnew[]" id="mlcnew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" ></div></div>'

         html +=' <div class="col-lg-12"><label class="col-lg-4">Whether Sample Positive for CLABSI</label><div class="col-lg-2"><select type="text" name="surg[]" id="surg" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div>';

          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button style="color:white;" type="button" name="remove" id="'+divcount+'" class="btn btn-danger btn_remove ">Delete</button></div></div>';
          html +='<div class="col-lg-12"><hr /></div></div>';
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
                     <h4 class="modal-title panel panel-info"> <div class="panel-heading" style="padding:7px;">Central Line Associated Blood Stream Infection Form </div></h4>  

                           
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_edit">
                      
                     <div class="col-lg-12">
            
                   <label class="col-lg-8">Date & Time of Insertion of Central Line Catheter</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-6">
                              <input type="date" autocomplete="off" 
                              name="t_admEdit" id="t_admEdit" placeholder="yyyy-mm-dd" class="form-control" />

                          </div>
                            <div class="col-lg-6">
                         <input type="time" name="t_adm1Edit" id="t_adm1Edit" placeholder="hh:mm" class="form-control" />              

                           </div>
                    </div>
                      <br/>

                  <div class="col-lg-12">
                   <label class="col-lg-8">Date & Time of Removal of Central Line Catheter</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-6">
                            <input type="date" autocomplete="off" name="dddEdit" id="dddEdit" placeholder="yyyy-mm-dd" class="form-control" />

                          </div>
                            <div class="col-lg-6">
                        <input type="time" name="ddd1Edit" id="ddd1Edit" placeholder="hh:mm" class="form-control" /> 
                           </div>
                 </div>
                      <br/>

       <div class="col-lg-12">
                   <label class="col-lg-8">Total Central Line Days</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-6">
                            <input type="text" name="ddddEdit" id="ddddEdit" class="form-control" readonly />
                    </div>
                          
                 </div>
             <br/>

          <div class="col-lg-12">
                   <label class="col-lg-8">Whether Patient has symptoms of BSI</label>
                   </div> 
                       <div class="col-lg-12">
                           <div class="col-lg-6">
                           <select type="text" name="psymptEdit" id="psymptEdit" onChange="LoadData();" class="form-control" />
									<option value="">Select</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
						</select>
                          </div>
                            <div class="col-lg-6">
                        <select type="text" name="tdddEdit" id="tdddEdit" class="form-control" />
						<option value="">Select</option>
					<option value="Fever">Fever</option>
					<option value="Increased TLC Count">Increased TLC Count</option>
					</select>
                           </div>
                 </div>
                      <br/>



                    <div class="col-lg-12">
                   <label class="col-lg-8">Date of Sample sent for culture</label>
                   </div> 
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                        <input type="date" autocomplete="off" name="mlcEdit" id="mlcEdit" placeholder="yyyy-mm-dd" class="form-control" >

                        </div>
                       
                 </div>
                      <br/>
                <div class="col-lg-12">
                   <label class="col-lg-8">Whether Sample Positive for CLABSI</label>
                   </div> 
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                       <select type="text" name="surgEdit" id="surgEdit" class="form-control" >
								<option value="">Select</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
						</select>

                        </div>
                       
                 </div>
                      <br/>
                 <div class="col-lg-12">
								<hr />
					</div>

                    <input type="hidden" name="user_idEdit" id="user_idEdit" />
                     <input type="hidden" name="tbl_centrl_line_assoc_id" id="tbl_centrl_line_assoc_id" />
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

            var centrl_line_assoc_id = $(this).attr("id");
            var action = "view"; 
            
           $.ajax({  
                url:"fetch_single_centrl_line_assoc_edit.php",  
                method:"POST",  
                data:{centrl_line_assoc_id:centrl_line_assoc_id,action:action},  
                dataType:"json",  
                success:function(data){ 
               
                 $('#t_admEdit').val(data.t_adm);
                    $('#t_adm1Edit').val(data.t_adm1);
					$('#dddEdit').val(data.ddd);
					$('#ddd1Edit').val(data.ddd1);
					$('#ddddEdit').val(data.dddd);
					$('#psymptEdit').val(data.psympt);
					$('#tdddEdit').val(data.tddd);
					$('#mlcEdit').val(data.mlc);
					
					$('#surgEdit').val(data.surg); 
					$('#tbl_centrl_line_assoc_id').val(data.centrl_line_assoc_id); 

                     $('#user_idEdit').val(data.tbl_huf_id); 
 

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
                     url:"fetch_single_centrl_line_assoc_edit.php",  
                     method:"POST",  
                     data:$('#insert_form_edit').serialize(),  
                     beforeSend:function(){  
                          $('#insertEdit').val("Inserting");  
                     },  
                     success:function(data){ 
                          alert(data); 
                           //location.reload();
                          $('#insert_form_edit')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                           
                         
                     }  
                });  
            
      });  
 </script>