			<?php  
				$y = date('Y');
				include"dbinfo.php";
				$query = "SELECT huf_ddd, count(*) as d_numb FROM tbl_huf WHERE huf_dddd BETWEEN '$y-01-01' AND '$y-12-31' GROUP BY huf_ddd";  
				$result = mysqli_query($connect, $query); 
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
							  while($row = mysqli_fetch_array($result))  
							  {  
								   echo "['".$row["huf_ddd"]."', ".$row["d_numb"]."],";  
							  }  
							  ?>  
						 ]);  
					var options = {  
						  //title: 'Percentage',  
						  is3D:true,  
						  pieHole: 0.4  
						 };  
					var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
					chart.draw(data, options);  
			   }  
			</script>
			<div class="col-lg-12" id="ch1">  
                <h3 align="center">Percentage of Discharges / DAMA / Death wise analysis ( Year-<?php echo $y;?> )</h3>  
                <div id="piechart" style="width: 100%; height: 400px;"></div>  
			</div> 
			<div class="col-lg-12" id="ch2">
				<?php 
					//index.php
					for ($month = 1; $month <= 12; $month ++){
						$sql="SELECT huf_dadm, COUNT(*) AS d_numb FROM tbl_huf WHERE month(huf_dadm)='$month' AND year(huf_dadm) = '$y'";
						$query=$connect->query($sql);
						$row=$query->fetch_array();

						$monthName = date('M', mktime(0, 0, 0, $month, 10));
						
						$chart_data .= "{ month:'".$monthName."', numb:".$row["d_numb"]."}, ";
					}					
					$chart_data = substr($chart_data, 0, -2);					
				?>
				<h3 align="center"> Month wise Patient Admitted ( Year-<?php echo $y;?> )</h3>  
                <br />  
                <div id="chart" style="width: 100%; height: 400px;"></div>
				<script>
					Morris.Bar({
						 element : 'chart',
						 data:[<?php echo $chart_data; ?>],
						 xkey:['month'],
						 ykeys:['numb'], 
						 labels:['Patient'],
						 hideHover:'auto',
						 stacked:true
					});
				</script>
			</div>