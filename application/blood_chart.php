			<?php 
				$y = date('M-Y');
			?>
			<style type="text/css">
				#datatable{
					display:none;
				}
			</style>
			<div class="col-lg-12" id="ch2">
				<h4 align="center"> Date Wise Analysis For Month <?php echo $y;?></h4>  
                <br />
				<script src="https://code.highcharts.com/highcharts.js"></script>
				<script src="https://code.highcharts.com/modules/data.js"></script>
				<script src="https://code.highcharts.com/modules/exporting.js"></script>
				<script src="https://code.highcharts.com/modules/export-data.js"></script>
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				<table id="datatable">
					<thead>
						<tr>
							<th>Blood Trasfusion related events</th>
							<th>No. of Units Transfused</th>
							<th>Reaction Observed</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							//index.php
							$mon = date('Y-m');
							include"dbinfo.php";
							$query = "SELECT DISTINCT date(bld_dtrec) as dat FROM tbl_blood_fusion WHERE date(bld_dtrec) BETWEEN '$mon-01' AND '$mon-31'";
							$result = mysqli_query($connect, $query);
							while($row = mysqli_fetch_array($result))
							{
								$query1 = "SELECT bld_id, count(*) as vid FROM tbl_blood_fusion WHERE date(bld_dtrec) = '".$row["dat"]."'";
								$result1 = mysqli_query($connect, $query1);
								$row1 = mysqli_fetch_array($result1);
								
								$query2 = "SELECT bld_id, count(*) as spc FROM tbl_blood_fusion WHERE bld_trfusreact = 'Yes' AND date(bld_dtrec) = '".$row["dat"]."'";
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