<!DOCTYPE html>
<html>
 
<head>
  <meta charset="utf-8">
  <title>ZingSoft Demo</title>
 
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
 
</head>
 
<body>
  <div id='myChartfaq2' style="width: 500px;"></div>
  <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
     
  type: 'bar',
   'scale-x': {
    labels: [ "apex","cqi","hic","safety","front office", "emergency", "laboratory", "radiology","medicin", "icu", "surgery", "nursing", "maintainence", "medical", "store", "cssd", "HR", "House", "Pharmacy"]
  },
   'scale-y': {
    labels: [0, 5,10,15,20,25,30,35,40]
  },
      title: {
        text: 'FAQ STATUS FOR INCHARGE COMPLETED BY'
      },
  plot: {
    stacked: true,
  },
  series: [
  {
     values: [<?php echo $rowapex['total1'] ?>,<?php echo $rowcqi['totalcqii'];?>,<?php echo $row5['totalhic']; ?>,<?php echo $row8['totalsafty']; ?>,<?php echo $row12['totalrec']; ?>, <?php echo $row4['totalemr']; ?>, <?php echo $row9['totallab'];?>, <?php echo $row10['totalradio'];?>, <?php echo $row13['totalmed'];?>, <?php echo $row11['totalicu']; ?>, <?php echo $row19['totalotnurse']; ?>, <?php echo $row18['totalnurse']; ?>,<?php echo $row17['totalmaintainance'];?>, <?php echo $row16['totalmedical'];?>,<?php echo $row15['totalstore'];?>,<?php echo $row3['totalcssd'];?>,<?php echo $row7['totalhr'];?>,<?php echo $row6['totalhouse'];?>,<?php echo $row14['totalphar'];?>],
      stack:1
    },
    {
     values: [<?php echo $rownotcomphr['notcomphr'];?>,<?php echo $rownotcomphrcqi['notcomphrcqi'];?>,<?php echo $rownotcomphrhic['notcomphrhic'];?>,<?php echo $rownotcomphrsafty['notcomphrsafty'];?>,<?php echo $rownotcomphrrec['notcomphrrec'];?>, <?php echo $rownotcomphremr['notcomphremr'];?>, <?php echo $rowcomphrlab['comphrlab'];?>, <?php echo $rownotcomphrradio['notcomphrradio'];?>, <?php  echo $rownotcomphrmed['notcomphrmed'];?>, <?php echo $rownotcomphricu['notcomphricu'];?>, <?php echo $rownotcomphrotnurse['notcomphrotnurse'];?>, <?php echo $rownotcomphrnurse['notcomphrnurse'];?>,<?php echo $rownotcomphrmaintainance['notcomphrmaintainance'];?>,<?php echo $rownotcomphrmedical ['notcomphrmedical'];?>,<?php  echo $rownotcomphrstore['notcomphrstore'];?>,<?php echo $rownotcomphrcssd['notcomphrcssd'];?>,<?php echo $rownotcomphrhr['notcomphrhr'];?>,<?php echo $rownotcomphrhouse['notcomphrhouse'];?>,<?php echo $rownotcomphrphar['notcomphrphar'];?>],
      stack:2
    },
    {
       values: [<?php echo $rowcomphr['comphr'];?>,<?php echo $rowcomphrcqi['comphrcqi'];?>,<?php echo $rowcomphrhic['comphrhic'];?>,<?php echo $rowcomphrsafty['comphrsafty'];?>,<?php echo $rowcomphrrec['comphrrec'];?>, <?php echo $rowcomphremr['comphremr'];?>, <?php echo $rownotcomphrlab['notcomphrlab'];?>, <?php echo $rowcomphrradio['comphrradio'];?>, <?php  echo $rowcomphrmed['comphrmed'];?>, <?php echo $rowcomphricu['comphricu'];?>, <?php echo $rowcomphotnurse['comphrotnurse'];?>, <?php echo $rowcomphnurse['comphrnurse'];?>,<?php echo $rowcomphmaintainance['comphrmaintainance'];?>,<?php echo $rowcomphmedical ['comphrmedical'];?>,<?php  echo $rowcomphstore ['comphrstore'];?>,<?php echo $rowcomphrcssd['comphrcssd'];?>,<?php echo $rowcomphrhr['comphrhr'];?>,<?php echo $rowcomphrhouse['comphrhouse'];?>,<?php echo $rowcomphphar['comphrphar'];?>],
      stack:2
    }
    
    ]

    };
 
    zingchart.render({
      id: 'myChartfaq2',
      data: myConfig,
      height: 350,
      width: '500px;'
    });
  </script>
</body>
 
</html>


 