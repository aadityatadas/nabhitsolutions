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
    #myChartTR{
      height: 400px;
      width: 400px;
      min-height: 150px;
     
    }
 
 
    .zc-ref {
      display: none;
    }
  </style>
</head>

  <table class="table header table-hover table-bordered">
                        <tr >
                            <td style="width: 300px;">
                               
<table class="custom-table"  cellspacing="10" cellpadding="10" border="1" width="400px"  style="border-color: #9DA2E2; text-align: center;"  >
                                            <tr style="background-color: #9DA2E2;">
                                                <td style="font-weight: bold;color: white;">Total</td>
                                                <td style="font-weight: bold;color: white;">Completed</td>
                                                <td style="font-weight: bold;color: white;">Not-Completed</td>

                                        
                                            
                                            </tr>
                                            <tr style="background-color: white;">
                                                <?php
                          include('dbinfo.php');

                          // $qry1="SELECT COUNT(*) from tbl_huf";
                          // $qry2="SELECT COUNT(*) from tbl_opdwttm";
                          // echo $qryres="SUM($qry1+$qry1)";

                          // SELECT (SUM(amex.Qty) + SUM(mc.Qty)) as total from amex, mc
                          //select COUNT(tbl_huf.huf_id) from tbl_huf Union select COUNT(tbl_opdwttm.opdwttm_id) from tbl_opdwttm


                          // $qry = "SELECT (COUNT(tbl_huf.huf_id) +COUNT(tbl_opdwttm.opdwttm_id)) as total from tbl_huf,tbl_opdwttm WHERE year(huf_dadm) = '$yr'";
                          //  $res = mysqli_query($connect, $qry);
                          //  $row=mysqli_fetch_assoc($res);
                          //  echo "SELECT (COUNT(tbl_huf.huf_id) +COUNT(tbl_opdwttm.opdwttm_id)) as total from tbl_huf,tbl_opdwttm WHERE year(huf_dadm) = '$yr'";
                            
                            //echo $row['total'];
                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                            // die();
                          $tbl = array( array("tbl_huf","huf_dadm", "(huf_ddd='Discharge' AND huf_ddd!='')","(huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd='')"),
                                    array("tbl_opdwttm","opdwttm_dttmds","(opdwttm_opdwttm!=''AND opdwttm_opdwttm!='0')","(opdwttm_opdwttm='0' OR opdwttm_opdwttm='' )"),
                                  array("tbl_opd LEFT JOIN tbl_opdwttm  ON tbl_opdwttm.opdwttm_id= tbl_opd.opd_id","opdwttm_dttmds","(opd_score!='' AND opd_score!='0')","(opd_score='0' OR opd_score='' )"),
                                    array("tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_ipd.ipd_id","huf_dadm","(ipd_score!='' AND ipd_score!='0')","(ipd_score='0' OR ipd_score=' ')"),
                                    array("tbl_vent_ass_phmn","vent_dt_iuc","(vent_tcd!='' AND vent_tcd!='0')","(vent_tcd='0' OR vent_tcd='')"),
                                    array("tbl_cath_assoc_uti","cath_uti_iuc","(cath_uti_tcd!='' AND cath_uti_tcd!='0')","(cath_uti_tcd='0' OR cath_uti_tcd='')"),
                                    array("tbl_centrl_line_assoc","cent_bs_dticlc","(cent_bs_tcld!='' AND cent_bs_tcld!='0')","(cent_bs_tcld='' OR cent_bs_tcld='0')"),
                                    array("tbl_surg_site_infec","surg_dtos","(surg_nsurg!='' AND surg_nsurg!='0')","(surg_nsurg='0' OR surg_nsurg='')"),
                                    array("tbl_need_pif","needp_dttm","(needp_mod_inj!='' AND needp_mod_inj!='0')","(needp_mod_inj=' ' OR needp_mod_inj='0')"),
                                    array("tbl_huf","huf_dadm","(int_tottm!=''AND int_tottm!='0')","(int_tottm='' OR int_tottm='0')"),
                                    array("tbl_huf","huf_dadm","(wttm_opdwttm!='' AND  wttm_opdwttm!='0')","(wttm_opdwttm=' ' OR wttm_opdwttm='0')"),
                                    array("tbl_blood_fusion","bld_dtreq","(bld_tat!='' AND bld_tat!='00:00')","(bld_tat='' OR bld_tat='00:00')"),
                                    array("tbl_care_evt","care_dtpli","(care_tmpli!='' AND care_tmpli!='00:00')","(care_tmpli=' ' OR care_tmpli='00:00')"),
                                    array("tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_medi_indi.medi_id","huf_dadm","(medi_mrdav='Available' OR medi_mrdav='Missing')","medi_mrdav=''"),
                                    array("tbl_hr_mast","hr_datej","hr_emp_type!=''","hr_emp_type=''"),
                                    array("tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hrid = tbl_hr_indic.hrid","hr_date","hr_ctstat!=''","hr_ctstat='' "),
                                    array("tbl_eqp_mast_bio","eqp_dtpur","eqp_make!=''","eqp_make=''"),
                                    array("tbl_eqp_indic_bio LEFT JOIN tbl_eqp_mast_bio ON tbl_eqp_mast_bio.eqpid = tbl_eqp_indic_bio.eqpid","eqp_brkdwn_date","eqp_make!=''","eqp_make=''"),
                                    array("tbl_eqp_mast","eqp_dtpur","eqp_make!=''","eqp_make=''"),
                                    array("tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid"," ","eqp_make!=''","eqp_make=''"),
                                    array("tbl_senti_det","senti_dt_surg_dn","(senti_nm_surg_pl!='' AND senti_nm_surg_pl!='0')","(senti_nm_surg_pl='' OR senti_nm_surg_pl='0' )"),
                                    array("tbl_emrgncy_register_ipd","date_of_patient_arrvl_at_emrgncy","(time_taken_for_initl_assmnt!='' AND time_taken_for_initl_assmnt!='00:00')","(time_taken_for_initl_assmnt='' OR time_taken_for_initl_assmnt='00:00' )"),
                                    array("tbl_icu_register_ipd","date_of_return_in_icu","sign!=''","sign=''"),
                                    array("tbl_lab_opd","date_of_rep_gen","nam_of_test!=''","nam_of_test=''"),
                                    array("tbl_lab_ipd","date_of_rep_gen","nam_of_test!=''","nam_of_test=''"),
                                    array("tbl_pharmcy_register","vendor","(item_no!='' AND item_no!='0')","(item_no='' OR item_no='0')"),
                                    array("tbl_radio_opd","date_of_rep_gen","radio_invst!=''","radio_invst=''"),
                                    array("tbl_radio_ipd","date_of_rep_gen","radio_invst!=''","radio_invst=''"));
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


                                               <td style="font-weight: bold;color: black;" ><?php echo $total;?></td>
                                               <td style="font-weight: bold;color: green;"><?php echo $comp;?></td>
                                               <td style="font-weight: bold;color: red;"><?php echo $notcomp;?></td>
                                                
                                            </tr>
                                            
                                        </table>
                                         <canvas  id="myChart" width="400" height="100px" ></canvas>
                                         <div id="myChartTR"><a class="zc-ref" href="https://www.zingchart.com">Powered by ZingChart</a></div>
                            </td>


                            
                        </tr>
                        
                       
                    </table>


 
  <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
      type: "pie",
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
      height: 400,
      width:400
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