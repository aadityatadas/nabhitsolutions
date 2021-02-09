
<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$tdt = date('Y-m-d');
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$yr = date('Y');
	
														$qry = "SELECT COUNT(*) as total FROM tbl_huf WHERE year(huf_dadm) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as discharge FROM tbl_huf WHERE (huf_ddd='Discharge' AND huf_ddd!=' ') AND year(huf_dadm) = '$yr' ";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ') AND year(huf_dadm) = '$yr'";
																	$resnotdis = mysqli_query($connect, $qrynotdis);
																	$rownotdis=mysqli_fetch_assoc($resnotdis);
$jsonData = array
(
    array("Total",20),
    array("Completed",20),
    array("Not-Complete",50),
    
);


$php_data_array[] = $row['total'];
echo json_encode($php_data_array);


?>
<!DOCTYPE html>
<html>
<head>
	<title>

	</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
		<!-- jQuery -->
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<div class="col-sm-8" id="container2">
 
</div>
<div class="col-sm-8" id="container">
 
</div>

</body>
</html>
<script>
jQuery(document).ready(function() {

$('#container2').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'Task Status'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
				showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'IPD',
            data: <?php echo json_encode($jsonData);?>
        }]
    });
    });

</script>
<script type="text/javascript">
	$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Browser market shares January, 2015 to May, 2015'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'IPD',
                colorByPoint: true,
                data: [{
                    name: 'total',
                    y:<?php echo json_encode($php_data_array);?>
                }, {
                    name: 'Completed',
                    y: 24.03
                }, {
                    name: 'Not-Copleted',
                    y: 10.38
                }]
            }]
        });
    });
});
</script>