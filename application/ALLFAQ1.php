<!DOCTYPE html>
<html>
 
<head>
  <meta charset="utf-8">
  <title>ZingSoft Demo</title>
 
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
  <style></style>
</head>
 
<body>
    
  
  <div id='myChartfaq' style="width: 500px;"></div>
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
      values: [<?php echo $rownotcompqi['notcompqi'];?>,<?php echo $rownotcompqicqi['notcompqicqi'];?>,<?php echo $rownotcompqihic['notcompqihic'];?>,<?php echo $rownotcompqisafty['notcompqisafty'];?>,<?php echo $rownotcompqirec['notcompqirec'];?>, <?php echo $rownotcompqiemr['notcompqiemr'];?>, <?php echo $rownotcompqilab['notcompqilab'];?>, <?php echo $rownotcompqiradio['notcompqiradio'];?>, <?php   echo $rownotcompqimed['notcompqimed'];?>, <?php echo $rownotcompqiicu['notcompqiicu'];?>, <?php echo $rownotcompqiotnurse['notcompqiotnurse'];?>, <?php echo $rownotcompqinurse['notcompqinurse'];?>,<?php echo $rownotcompqimaintainance['notcompqimaintainance'];?>,<?php echo $rownotcompqimedical['notcompqimedical'];?>,<?php  echo $rownotcompqistore['notcompqistore'];?>,<?php echo $rownotcompqicssd['notcompqicssd'];?>,<?php echo $rownotcompqihr['notcompqihr'];?>,<?php echo $rownotcompqihouse['notcompqihouse'];?>,<?php echo $rownotcompqiphar['notcompqiphar'];?>],
      stack:2
    } 
    ,{
       values: [<?php echo $rowcompqi['compqi'];?>,<?php echo $rowcompqicqi['compqicqi'];?>,<?php echo $rowcompqihic['compqihic'];?>,<?php echo $rowcompqisafty['compqisafty'];?>,<?php echo $rowcompqirec['compqirec'];?>, <?php echo $rowcompqiemr['compqiemr'];?>, <?php echo $rowcompqilab['compqilab'];?>, <?php echo $rowcompqiradio['compqiradio'];?>, <?php  echo $rowcompqimed['compqimed'];?>, <?php echo $rowcompqiicu['compqiicu'];?>, <?php echo $rowcompqiotnurse['compqiotnurse'];?>, <?php echo $rowcompqinurse['compqinurse'];?>,<?php echo $rowcompqimaintainance['compqimaintainance'];?>,<?php echo $rowcompqimedical['compqimedical'];?>,<?php  echo $rowcompqistore['compqistore'];?>,<?php echo $rowcompqicssd['compqicssd'];?>,<?php echo $rowcompqihr['compqihr'];?>,<?php echo $rowcompqihouse['compqihouse'];?>,<?php echo $rowcompqiphar['compqiphar'];?>],
      stack:2
    }
    ]

    };
 
    zingchart.render({
      id: 'myChartfaq',
      data: myConfig,
      height: 350,
      width: '500px;'
    });
  </script>
</body>
 
</html>

