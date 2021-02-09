			<?php  
				$y = date('M-Y');
				$m = date('Y-m');
				include"dbinfo.php";			
			?>
			<style type="text/css">
				#datatable{
					display:none;
				}
			</style>
			<div class="col-lg-12" id="ch2">
				<h3 align="center"> OPD Waiting Time Average For Month ( <?php echo $y;?> )</h3>  
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
						</tr>
					</thead>
					<tbody>
						<?php 
							//index.php
							$mon = date('Y-m');
							$query = "SELECT DISTINCT date(wttm_dttmr) as dat FROM tbl_huf WHERE date(wttm_dttmr) BETWEEN '$mon-01' AND '$mon-31'";
							$result = mysqli_query($connect, $query);
							while($row = mysqli_fetch_array($result))
							{
								$qry = mysqli_query($connect,"SELECT SUM(wttm_opdwttm) as std FROM tbl_huf WHERE date(wttm_dttmr) = '".$row["dat"]."'")or die(mysqli_error($connect));
								$res = mysqli_fetch_assoc($qry);
								$i_count = $res["std"];
								
								$qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE date(wttm_dttmr) = '".$row["dat"]."'")or die(mysqli_error($connect));
								$s_count = mysqli_num_rows($qry5);
								
								$tot_count = $i_count / $s_count;
								
						?>
						<tr>
							<td><?php echo $row["dat"];?></td>
							<td><?php echo $tot_count;?></td>
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
							text: 'Average'
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