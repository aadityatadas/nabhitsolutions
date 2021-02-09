
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
    #myChartHRI{
      height: 400px;
      width: 600px;
      min-height: 150px;
    }
 
 
    .zc-ref {
      display: none;
    }
  </style>
</head>
 
<body>
  <div id="myChartHRI"><a class="zc-ref" href="https://www.zingchart.com">Powered by ZingChart</a></div>
  <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
      type: "pie",
      title: {
        text: 'Click on a label or slice'
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
          values: [290]
        },
        {
          values: [20]
        },
        {
          values: [25]
        },
        {
          values: [40]
        },
        {
          values: [11]
        }
      ]
    };
 
    zingchart.render({
      id: 'myChartHRI',
      data: myConfig,
      height: 400,
      width: 600
    });
 
    zingchart.label_click = function(e) {
      console.log(e)
      zingchart.exec('myChartHRI', 'clicknode', {
        plotindex: e.plotindex,
        nodeindex: e.nodeindex
      });
    }
  </script>
</body>
 
</html>