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
    #myChartQI{
      height: 400px;
      width: 300px;
      min-height: 150px;
     
    }
 
 
    .zc-ref {
      display: none;
    }
  </style>
</head>

  


                                            
                                     
                                         <canvas  id="myChart" width="200" height="60px" ></canvas>
                                         <div id="myChartTR"><a class="zc-ref" href="https://www.zingchart.com">Powered by ZingChart</a></div>
    
 
  <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
      type: "line",
      title: {
        text: 'Performance Of Trainnig'
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
          values: [<?php echo $total; ?>]
         
        },
        
        {
          values: [<?php echo $notcomp; ?>]
        },
        {
          values: [<?php echo $comp; ?>]
        }
      ]
    };
 
    zingchart.render({
      id: 'myChartTR',
      data: myConfig,
      height: 300,
      width:300
    });
 
    zingchart.label_click = function(e) {
      console.log(e)
      zingchart.exec('myChartTR', 'clicknode', {
        plotindex: e.plotindex,
        nodeindex: e.nodeindex
      });
    }
  </script>
</body>
 
</html>