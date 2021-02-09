



  
 
  
  <style>
    
    #myChartBEMI{
      height: 400px;
      width: 800px;
      min-height: 150px;
      padding-left: 200px;
    }
 
 
    .zc-ref {
      display: none;
    }
  </style>

<?php
                          

                          $qry = "SELECT COUNT(*) as total FROM tbl_eqp_mast_bio WHERE year(eqp_dtpur) = '$yr'";
                            $res = mysqli_query($connect, $qry);
                            $row=mysqli_fetch_assoc($res);
                            // echo $row['total'];
                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                            // die();

                            $qrycomp= "SELECT COUNT(*) as comp FROM tbl_eqp_mast_bio WHERE eqp_make!='' AND year(eqp_dtpur) = '$yr'";
                                $rescomp = mysqli_query($connect, $qrycomp);
                                $rowcomp=mysqli_fetch_assoc($rescomp);
                                // echo $rowdis['discharge'];
                                                      

                            $qrynotcomp= "SELECT COUNT(*) as notcomp FROM tbl_eqp_mast_bio WHERE eqp_make='' AND year(eqp_dtpur) = '$yr'";
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
  <div id="myChartBEMI"><a class="zc-ref" href="https://www.zingchart.com">Powered by ZingChart</a></div>
  <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
      type: "pie",
      title: {
        text: 'Performance Of Bio Equipement Master'
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
      id: 'myChartBEMI',
      data: myConfig,
      height: 400,
      width: 600
    });
 
    zingchart.label_click = function(e) {
      console.log(e)
      zingchart.exec('myChartBEMI', 'clicknode', {
        plotindex: e.plotindex,
        nodeindex: e.nodeindex
      });
    }
  </script>
