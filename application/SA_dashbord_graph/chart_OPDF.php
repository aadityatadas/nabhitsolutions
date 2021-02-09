<?php
	error_reporting(0);
	session_start();
	
	$frdt = date('Y-01-01');
	$todt = date('Y-12-31');
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
        
            <!-- <div class="row">
                <div class="form-group">
					<div class="col-lg-12">
						<h4 class="page-header"><a href="#!" style="text-decoration:none;">Control Charts : </a></h4>
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-md-1" style="color: black;">From</label>
							<div class="col-lg-3">
								<input type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-md-1" style="color: black;">To</label>
							<div class="col-lg-3">
								<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button style="color: white;font-weight: bold;" type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
               
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_opdf" style="height:300px;margin: 20px;"></div>
					</div>
				</div>
            </div>		
        
       -->
<div class="row">
   <div class="form-group">
        <table cellspacing="0" cellpadding="0" border="0" width="600px" >
						<tr>
							<td colspan="2" style="padding-left: 70px;color:#29A2CC;font-weight: bold; ">Control Charts :</td>
						</tr>
						<tr>
							<td colspan="2" style="padding-left: 70px;">
							From
							<input type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" style="width: 80px;" />
							To

							<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" style="width: 80px;" />
							<button style="color: white;font-weight: bold;" type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
							 </td>

						</tr>
						<tr>
							<td style="vertical-align: top;">
								<div id="line_chart_opdf" style="height:300px;margin: 20px;"></div>

								
							</td>
							
						</tr>
		</table>
	</div>
</div>
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
					// chart opd feedback
					var jsonData = $.ajax({
					url: 'opd_satis_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Overall OPD Satisfaction Rating',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart_opdf'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				
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
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';      
		$('#frdate').mask('9999-99-99');// for  To Date
		$('#todate').mask('9999-99-99');// for  To Date
	});
</script>