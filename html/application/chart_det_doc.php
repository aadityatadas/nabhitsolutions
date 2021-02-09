<?php
	error_reporting(0);
	session_start();
	include"header.php";
	include"nav-bar-doc.php";
	include"footer.php";
	
	$frdt = date('Y-01-01');
	$todt = date('Y-12-31');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body>
    <div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
                <div class="form-group">
					<div class="col-lg-12">
						<h4 class="page-header"><a href="#!" style="text-decoration:none;">Control Charts : </a></h4>
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-md-1">From</label>
							<div class="col-lg-3">
								<input type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-md-1">To</label>
							<div class="col-lg-3">
								<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
                <!-- <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart1" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart2" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div> -->
				
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart12" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<!-- <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart3" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart13" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart5" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart6" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div> -->
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart7" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
<!-- 				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_wtm" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_wtm1" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart8" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart9" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart10" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart11" style="height:400px;"></div>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_care" style="height:400px;"></div>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_hrmast" style="height:400px;"></div>
					</div>
				</div>		
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_hr" style="height:400px;"></div>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_eqp" style="height:400px;"></div>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_medi1" style="height:400px;"></div>
					</div>
				</div>		
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_medi2" style="height:400px;"></div>
					</div>
				</div>		
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_ipdf" style="height:400px;"></div>
					</div>
				</div>		
				<div class="form-group">
					<div class="col-sm-12">
						<br />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_opdf" style="height:400px;"></div>
					</div>
				</div> -->
            </div>		
        </div>
        <!-- /#page-wrapper -->
    </div>
</body>
</html>
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
					/*var jsonData = $.ajax({
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
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart1'));
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
							vAxis: { minValue: 0 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.3
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.LineChart(document.getElementById('line_chart2'));
						chart.draw(data, options);
							
					}	
				}).responseText;*/
				// Chart Twelve
					var jsonData = $.ajax({
					url: 'int_asst_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Initial Asseessment Time',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart12'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
				/*// chart three
					var jsonData = $.ajax({
					url: 'vent_ass_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Ventilator Associated Pnemonia',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart3'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				// chart four
					var jsonData = $.ajax({
					url: 'cath_ass_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Cather Associated Unrinary Tract Infection',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart4'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				// Chart Five
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
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart5'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
				// Chart Six
					var jsonData = $.ajax({
					url: 'surg_site_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Surgical Site Infection',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart6'));
							 chart.draw(data, options);
							
						}	
				}).responseText;*/
				// Chart Seven
					var jsonData = $.ajax({
					url: 'ipd_wattm_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'IPD Waiting Time',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart7'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
				/*// Chart Eight
					var jsonData = $.ajax({
					url: 'needp_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Neddle Prick Injury',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart8'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
				// Chart Nine
					var jsonData = $.ajax({
					url: 'senti_surg_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Surgery',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart9'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
				// Chart Ten
					var jsonData = $.ajax({
					url: 'senti_an_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Anesthetia',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart10'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
				// Chart Eleven
					var jsonData = $.ajax({
					url: 'bld_evt_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Blood Trasfusion related events',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart11'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
				// Chart Thirteen
					var jsonData = $.ajax({
					url: 'cath_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Cather Associated Unrinary Tract Infection',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart13'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
				// chart one
					var jsonData = $.ajax({
					url: 'opd_wattm_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Total No. of OPDs On Day ',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart_wtm'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				// chart two
					var jsonData = $.ajax({
					url: 'opd_wattm_chart1.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'OPD Waiting Time',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart_wtm1'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
					// care related events
						var jsonData = $.ajax({
						url: 'care_evt_chart.php',
						dataType:"json",
						method:"POST",
						async: false,
						data:{frdate:frdate,todate:todate},
						success: function(jsonData)
							{
								var options = 
								{
									title:'Care Related Events',
									legend: '',
									hAxis: { minValue: 0, maxValue: 10 },
									vAxis: { minValue: 0 },
									//curveType: 'function',
									pointSize: 7,
									dataOpacity: 0.3
								};
								var data = new google.visualization.arrayToDataTable(jsonData);	
								 var chart = new google.visualization.LineChart(document.getElementById('line_chart_care'));
								 chart.draw(data, options);
								
							}	
					}).responseText;
				// chart HR
				var jsonData = $.ajax({
					url: 'hr_indic_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'HR Indicator',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart_hr'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				// Equipment Indicator
				var jsonData = $.ajax({
					url: 'eqp_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Equipment Indicator',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							var chart = new google.visualization.LineChart(document.getElementById('line_chart_eqp'));
							chart.draw(data, options);							
						}	
					}).responseText;
				// Medical Records chart one
					var jsonData = $.ajax({
					url: 'medi_records_chart1.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Medical Records Indicator',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart_medi1'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				// Medical Records chart two
					var jsonData = $.ajax({
					url: 'medi_records_chart2.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Medical Records Indicator',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart_medi2'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
				// chart ipd feedback
					var jsonData = $.ajax({
					url: 'ipd_satis_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Overall IPD Satisfaction Rating',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart_ipdf'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
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
				// Chart HR Master
					var jsonData = $.ajax({
					url: 'hr_mast_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					//data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'HR Master',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.LineChart(document.getElementById('line_chart_hrmast'));
							 chart.draw(data, options);
							
						}	
					}).responseText;*/
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