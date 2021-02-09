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
<div class="container">
  <div class="row">
    <div class="col-md-4" style="background-color: #9DA2E2;">Total</div>
    <div class="col-md-4" style="background-color: #9DA2E2;">Completed</div>
    <div class="col-md-4" style="background-color: #9DA2E2;">Not-Com.</div>
  </div>
  <div class="row">
    <div class="col-md-4">
        

                                                <?php
                          include('dbinfo.php');
                          $tbl = array( array("tbl_death_audit","date_death", "cause_of_death!=''","cause_of_death=''"),
                                        array("tbl_clinical_audit","created", "sent_on!=''","sent_on=''"),
                                        array("tbl_antibiotic_audit","created", "dose!=''","dose=''"),
                                        array("tbl_audit_hh1","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh2","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh3","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh4","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh5","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh6","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh7","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh8","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh9","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh10","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh11","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh12","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh13","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh14","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh15","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh16","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh17","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh18","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh19","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh20","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh21","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh22","created", "sign!=''","sign=''"),
                                        array("tbl_audit_hh23","created", "sign!=''","sign=''"),
                                        array("tbl_prescription_audit","monthyear", "dose='Yes'","(dose='No' OR dose='No')"),
                                        array("tbl_medical_record_audit","monthyear", "mr_without_dis_summary='Yes'","(mr_without_dis_summary='No' OR mr_without_dis_summary='Na')"),
                                        array("tbl_facility_infectionnew","audit_date", "name_sign!=''","name_sign=''"),
                                        array("tbl_icu_checkstnew","audit_date", "name_sign!=''","name_sign=''"),
                                        array("tbl_radtion_saftey_chklstnew","audit_date", "name_sign!=''","name_sign=''"),
                                        array("tbl_hr_audit","audit_date", "name_sign!=''","name_sign=''"),
                                        array("tbl_ward_round_chklst_audit","audit_date", "name_sign!=''","name_sign=''"),
                                        array("tbl_pharmacy_round_chklst_audit","audit_date", "name_sign!=''","name_sign=''"),
                                        array("tbl_biomedicaleqip_sfty_chklst","audit_date", "name_sign!=''","name_sign=''"),
                                        array("tbl_bio_sfty_chklst","date1", "sign!=''","sign=''"),
                                        array("tbl_bmw_checkstnew","audit_date", "name_sign!=''","name_sign=''"),
                                        array("tbl_bme_checkstnew","audit_date", "name_sign!=''","name_sign=''"),

                                      );

                          $total = 0;
                          $comp =0;
                          $notcomp=0;
                          foreach ($tbl as $tval) {
                             // print_r($tval);
                            $qry = "SELECT count(*) as total from $tval[0] WHERE year($tval[1]) = '$yr'";
                            $res = mysqli_query($connect, $qry);
                            $row=mysqli_fetch_assoc($res);
                            $total = $total + $row['total'];

                            $qrydis = "SELECT COUNT(*) as comp FROM $tval[0] WHERE $tval[2] AND year($tval[1]) = '$yr'";
                            $resdis = mysqli_query($connect, $qrydis);
                            $rowdis=mysqli_fetch_assoc($resdis);
                            $comp=$comp+$rowdis['comp'];

                            $qrynotdis = "SELECT COUNT(*) as notcomp FROM $tval[0] WHERE $tval[3] AND year($tval[1]) = '$yr'";
                            $resnotdis = mysqli_query($connect, $qrynotdis);
                            $rownotdis=mysqli_fetch_assoc($resnotdis);
                            $notcomp=$notcomp+$rownotdis['notcomp'];



                          }
                          

                            
                             

                          ?>
<?php echo $total;?>
 </div>
    <div class="col-md-4"><?php echo $comp;?></div>
    <div class="col-md-4"><?php echo $notcomp;?></div>
  </div>
</div>

                                              
                                         <canvas  id="myChart" width="200" height="60px" ></canvas>
                                         <div id="myChartAudit"><a class="zc-ref" href="https://www.zingchart.com">Powered by ZingChart</a></div>
                            </td>


                            
                        </tr>
                        
                       
                    </table>


 
  <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
      type: "pie",
      title: {
        text: 'Performance Of Audit'
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
        }
        ,
        {
          values: [<?php echo $comp; ?>]
        }
      ]
    };
 
    zingchart.render({
      id: 'myChartAudit',
      data: myConfig,
      height: 300,
      width:300
    });
 
    zingchart.label_click = function(e) {
      console.log(e)
      zingchart.exec('myChartAudit', 'clicknode', {
        plotindex: e.plotindex,
        nodeindex: e.nodeindex
      });
    }
  </script>
</body>
 
</html>