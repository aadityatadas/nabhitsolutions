			<?php  
				$y = date('M-Y');
				$m = date('Y-m');
				include"dbinfo.php";
				
			?>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
			<script type="text/javascript">  
			   google.charts.load('current', {'packages':['corechart']});  
			   google.charts.setOnLoadCallback(drawChart);  
			   function drawChart()  
			   {  
					var data = google.visualization.arrayToDataTable([  
							  ['Status', 'Number'],  
							  <?php  
							  $query3 = "SELECT cent_bs_symp_det, count(*) as d_numb FROM tbl_huf WHERE cent_bs_dticlc BETWEEN '$m-01' AND '$m-31' GROUP BY cent_bs_symp_det";  
							  $result3 = mysqli_query($connect, $query3);
							  	  
							  while($row3 = mysqli_fetch_array($result3))  
							  {  
								   echo "['".$row3["cent_bs_symp_det"]."', ".$row3["d_numb"]."],";  
							  }
							  ?>  
						 ]);  
					var options = {  
						  //title: 'Percentage By Symptons',  
						  is3D:true,  
						  pieHole: 0.4  
						 };  
					var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
					chart.draw(data, options);  
			   }  
			</script>
			<div class="col-lg-12" id="ch1">  
                <h3 align="center">Percentage By Symptons For Month ( <?php echo $y;?> )</h3>  
                <br />  
                <div id="piechart" style="min-width: 100%; height: auto;"></div>  
			</div>
			<style type="text/css">
				#datatable{
					display:none;
				}
			</style>
			<div class="col-lg-12" id="ch2">
				<h3 align="center"> Date Wise Analysis For Month ( <?php echo $y;?> )</h3>  
                <br />
				<script src="https://code.highcharts.com/highcharts.js"></script>
				<script src="https://code.highcharts.com/modules/data.js"></script>
				<script src="https://code.highcharts.com/modules/exporting.js"></script>
				<script src="https://code.highcharts.com/modules/export-data.js"></script>
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				<table id="datatable">
					<thead>
						<tr>
							<th>Symptons Details</th>
							<th>D1</th>
							<th>CLAB</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							//index.php
							$mon = date('Y-m');
							$query = "SELECT DISTINCT date(cent_bs_dticlc) as dat FROM tbl_huf WHERE date(cent_bs_dticlc) BETWEEN '$mon-01' AND '$mon-31'";
							$result = mysqli_query($connect, $query);
							while($row = mysqli_fetch_array($result))
							{
								$query1 = "SELECT huf_id, count(*) as vid FROM tbl_huf WHERE date(cent_bs_dticlc) = '".$row["dat"]."'";
								$result1 = mysqli_query($connect, $query1);
								$row1 = mysqli_fetch_array($result1);
								
								$query2 = "SELECT cent_bs_clabsi, COUNT(*) as spc FROM tbl_huf WHERE cent_bs_clabsi = 'Yes' AND date(cent_bs_dticlc) = '".$row["dat"]."'";
								$result2 = mysqli_query($connect, $query2);
								$row2 = mysqli_fetch_array($result2);
								
						?>
						<tr>
							<td><?php echo $row["dat"];?></td>
							<td><?php echo $row1["vid"];?></td>
							<td><?php echo $row2["spc"];?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				 
				<script type="text/javascript">
				Highcharts.chart('container', {
					data: {
						table: 'datatable'
					},
					chart: {
						type: 'column'
					},
					title: {
						text: ''
					},
					yAxis: {
						allowDecimals: false,
						title: {
							text: 'Count'
						}
					},
					tooltip: {
						headerFormat: '<b><span style="font-size:12px">{point.key}</span></b><table>',
						pointFormat: '<tr><td style="float:right;color:{series.color};padding:0">{series.name}: </td>' +
							'<td style="padding:0"><b>{point.y}</b></td></tr>',
						footerFormat: '</table>',
						useHTML: true
					},
				});
				</script>

				  <script>
				  // tell the embed parent frame the height of the content
				  if (window.parent && window.parent.parent){
					window.parent.parent.postMessage(["resultsFrame", {
					  height: document.body.getBoundingClientRect().height,
					  slug: "None"
					}], "*")
				  }
				</script>
			</div>
			
			