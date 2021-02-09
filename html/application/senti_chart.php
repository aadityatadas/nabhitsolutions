			<?php 
				$y = date('M-Y');
			?>
			<style type="text/css">
				#datatable{
					display:none;
				}
			</style>
			<div class="col-lg-12" id="ch2">
				<h3 align="center"> Surgery For Month <?php echo $y;?></h3>  
                <br />
				<script src="https://code.highcharts.com/highcharts.js"></script>
				<script src="https://code.highcharts.com/modules/data.js"></script>
				<script src="https://code.highcharts.com/modules/exporting.js"></script>
				<script src="https://code.highcharts.com/modules/export-data.js"></script>
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				<table id="datatable">
					<thead>
						<tr>
							<th>Surgery Details</th>
							<th>Return To OT</th>
							<th>Rescheduling of Surgery Done</th>
							<th>Anesthetia Given</th>
							<th>Rexploration Done</th>
							<th>Planned Intraoperatively</th>
							<th>Total No. Of Surgery</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							//index.php
							$mon = date('Y-m');
							include"dbinfo.php";
							$query = "SELECT DISTINCT date(senti_dt_surg_dn) as dat FROM tbl_senti_det WHERE date(senti_dt_surg_dn) BETWEEN '$mon-01' AND '$mon-31'";
							$result = mysqli_query($connect, $query);
							while($row = mysqli_fetch_array($result))
							{
								$query1 = "SELECT senti_unpl_ret_ot, count(*) as vid FROM tbl_senti_det WHERE senti_unpl_ret_ot = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$result1 = mysqli_query($connect, $query1);
								$row1 = mysqli_fetch_array($result1);
								
								$query2 = "SELECT senti_resch_surg_dn, count(*) as spc FROM tbl_senti_det WHERE senti_resch_surg_dn = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$result2 = mysqli_query($connect, $query2);
								$row2 = mysqli_fetch_array($result2);
								
								$qry3 = "SELECT senti_tp_ans_gv, count(*) as spc3 FROM tbl_senti_det WHERE senti_tp_ans_gv != '' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$res3 = mysqli_query($connect, $qry3);
								$row3 = mysqli_fetch_array($res3);
								
								$qry4 = "SELECT senti_rexpl, count(*) as spc4 FROM tbl_senti_det WHERE senti_rexpl = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$res4 = mysqli_query($connect, $qry4);
								$row4 = mysqli_fetch_array($res4);
								
								$qry5 = "SELECT senti_chng_surg_pl_int, count(*) as spc5 FROM tbl_senti_det WHERE senti_chng_surg_pl_int = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$res5 = mysqli_query($connect, $qry5);
								$row5 = mysqli_fetch_array($res5);
								
								$qry6 = "SELECT senti_det_id, count(*) as spc6 FROM tbl_senti_det WHERE date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$res6 = mysqli_query($connect, $qry6);
								$row6 = mysqli_fetch_array($res6);
								
						?>
						<tr>
							<td><?php echo $row["dat"];?></td>
							<td><?php echo $row1["vid"];?></td>
							<td><?php echo $row2["spc"];?></td>
							<td><?php echo $row3["spc3"];?></td>
							<td><?php echo $row4["spc4"];?></td>
							<td><?php echo $row5["spc5"];?></td>
							<td><?php echo $row6["spc6"];?></td>
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
			<!-- Second Chart -->
			<style type="text/css">
				#datatable2{
					display:none;
				}
			</style>
			<div class="col-lg-12" id="ch3">
				<h3 align="center"> Anesthetia For Month <?php echo $y;?></h3>  
                <br />				
                <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				<table id="datatable2">
					<thead>
						<tr>
							<th>Anesthetia Details</th>
							<th>PAC Done</th>
							<th>Anesthetia Plan</th>
							<th>Unplanned Ventilator After Anesthetia</th>
							<th>Adverse Anesthetia Event</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							//index.php
							$mon = date('Y-m');
							include"dbinfo.php";
							$query2 = "SELECT DISTINCT date(senti_dt_surg_dn) as dat FROM tbl_senti_det WHERE date(senti_dt_surg_dn) BETWEEN '$mon-01' AND '$mon-31'";
							$result2 = mysqli_query($connect, $query2);
							while($row = mysqli_fetch_array($result2))
							{
								$qry7 = "SELECT senti_pacdn, count(*) as vid FROM tbl_senti_det WHERE senti_pacdn = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$res7 = mysqli_query($connect, $qry7);
								$row7 = mysqli_fetch_array($res7);
								
								$qry8 = "SELECT senti_mod_anspl, count(*) as spc FROM tbl_senti_det WHERE senti_mod_anspl = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$res8 = mysqli_query($connect, $qry8);
								$row8 = mysqli_fetch_array($res8);
								
								$qry9 = "SELECT senti_unp_vent_aft_ans, count(*) as spc3 FROM tbl_senti_det WHERE senti_unp_vent_aft_ans = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
								$res9 = mysqli_query($connect, $qry9);
								$row9 = mysqli_fetch_array($res9);
								
								$qry10 = "SELECT senti_any_adv_ans_evt, count(*) as spc4 FROM tbl_senti_det WHERE senti_any_adv_ans_evt = 'Yes' AND date(senti_dt_surg_dn) = '".$row22["dat"]."'";
								$res10 = mysqli_query($connect, $qry10);
								$row10 = mysqli_fetch_array($res10);
								
						?>
						<tr>
							<td><?php echo $row["dat"];?></td>
							<td><?php echo $row1["vid"];?></td>
							<td><?php echo $row2["spc"];?></td>
							<td><?php echo $row3["spc3"];?></td>
							<td><?php echo $row4["spc4"];?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>				 
				<script type="text/javascript">
				Highcharts.chart('container2', {
					data: {
						table: 'datatable2'
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
			</div>
			
			