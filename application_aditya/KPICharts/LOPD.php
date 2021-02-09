

<?php
  error_reporting(0);
  session_start();
  $typ = $_SESSION['typ'];
  $syr = $_SESSION['finyr'];
  // include"header.php";
  // include"footer.php";
  $dt = date('d/m/Y');
  $tm = date('h:i:s a');
  $yr = date('Y');
  
  date_default_timezone_set('Asia/Calcutta'); 
  $frdt = date('Y-m-01');
  $todt = date('Y-m-31');
?>
<!DOCTYPE html>
<html>
 
<head>
  <meta charset="utf-8">
  <title>ZingSoft Demo</title>
 
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
  <style>
    html,
    body {
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
    }
 /*
    #myCharthu {
      height: 100%;
      width: 100%;
      min-height: 150px;
    }*/
    #myChartLOPD{
      height: 400px;
      width: 800px;
      min-height: 150px;
      padding-left: 200px;
    }
 
 
    .zc-ref {
      display: none;
    }
  </style>
</head>
<?php
                          include('dbinfo.php');

                          $qry = "SELECT COUNT(*) as total FROM tbl_lab_opd WHERE year(date_of_rep_gen) = '$yr'";
                            $res = mysqli_query($connect, $qry);
                            $row=mysqli_fetch_assoc($res);
                            // echo $row['total'];
                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                            // die();

                            $qrycomp = "SELECT COUNT(*) as comp FROM tbl_lab_opd WHERE nam_of_test!='' AND year(date_of_rep_gen) = '$yr' ";
                                $rescomp = mysqli_query($connect, $qrycomp);
                                $rowcomp=mysqli_fetch_assoc($rescomp);
                                // echo $rowdis['discharge'];
                                                      

                            $qrynotcomp= "SELECT COUNT(*) as notcomp FROM tbl_lab_opd WHERE nam_of_test='' AND year(date_of_rep_gen) = '$yr'";
                                  $resnotcomp = mysqli_query($connect, $qrynotcomp);
                                  $rownotcomp=mysqli_fetch_assoc($resnotcomp);
                                  // echo $rownotdis['notdischarge'];
                                  // echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
                                  // die();

                             

                          ?>

<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:200px;">
		<table   cellspacing="0" cellpadding="0" border="1" width="800px" align="center" style="border-color: #9DA2E2; text-align: center;font-weight: bold;">
			<tr >
				<td width="80%;" >Total </td>
				<td width="20%;" ><?php echo $row['total'];?></td>
			</tr>
			<tr>
				<td width="80%;">Completed </td>
				<td width="20%;" style="color: green;"><?php echo $rowcomp['comp'];?></td>
			</tr>
			<tr>
				<td width="80%;">Not-Completed </td>
				<td width="20%;" style="color: red;"><?php echo $rownotcomp['notcomp'];?></td>
			</tr>
			
		</table>

	</div>
	<div class="col-lg-12">
	<div class="col-lg-12" style="margin-left: 200px;">
		<canvas  id="myChart" width="400" height="100px"></canvas>
	</div>
</div>
</div>
  <div id="myChartLOPD"><a class="zc-ref" href="https://www.zingchart.com">Powered by ZingChart</a></div>
  <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
      type: "pie",
      title: {
        text: 'Performance Of Laboratory Indicator Form (OPD)'
      },
      plot: {
        valueBox: {
          placement: 'out',
          backgroundColor: 'black',
          decimals: 2,
          flat: false // MOST IMPORTANT PART TO GET LABEL CLICK
        }
      },
      series: [{
          values: [<?php echo $row['total']; ?>]
         
        },
        {
          values: [<?php echo $rowcomp['comp']; ?>]
        },
        {
          values: [<?php echo $rownotcomp['notcomp']; ?>]
        }
      ]
    };
 
    zingchart.render({
      id: 'myChartLOPD',
      data: myConfig,
      height: 400,
      width: 600
    });
 
    zingchart.label_click = function(e) {
      console.log(e)
      zingchart.exec('myChartLOPD', 'clicknode', {
        plotindex: e.plotindex,
        nodeindex: e.nodeindex
      });
    }
  </script>
</body>
 
</html>