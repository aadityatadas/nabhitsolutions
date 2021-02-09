<?php
error_reporting(0);
    session_start();
include('checklogin.php');
    check_login();  

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>

  <script src="https://code.highcharts.com/highcharts.js"></script>

<script   src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



<script src="../vendor/jquery/jquery.min.js"></script>      
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HospiXperts-NABH Consultants & Service | NABH Certification‎</title>
  <?php
                        

                          include('dbinfo.php');

                          $tbl = array( array("tbl_faq_apex","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $total1 = 0;
                                                    $compqi =0;
                                                    $notcompqi=0;
                                                    $comphr =0;
                                                    $notcomphr=0;
                                                    foreach ($tbl as $tval) {
                                                          $qryapex = "SELECT COUNT(*) as total1 FROM $tval[0]";
                                                            $resapex = mysqli_query($connect, $qryapex);
                                                            $rowapex=mysqli_fetch_assoc($resapex);
                                                            //echo $rowapex['total1'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqi = "SELECT COUNT(*) as compqi FROM $tval[0] where $tval[1]";
                                                            $rescompqi = mysqli_query($connect, $qrycompqi);
                                                            $rowcompqi=mysqli_fetch_assoc($rescompqi);
                                                           // echo $rowcompqi['compqi'];

                                                            $qrynotcompqi = "SELECT COUNT(*) as notcompqi FROM $tval[0] where $tval[2]";
                                                            $resnotcompqi = mysqli_query($connect, $qrynotcompqi);
                                                            $rownotcompqi=mysqli_fetch_assoc($resnotcompqi);
                                                          //  echo $rownotcompqi['notcompqi'];

                                                            $qrycomphr = "SELECT COUNT(*) as comphr FROM $tval[0] where $tval[3]";
                                                            $rescomphr = mysqli_query($connect, $qrycomphr);
                                                            $rowcomphr=mysqli_fetch_assoc($rescomphr);
                                                           // echo $rowcomphr['comphr'];

                                                            $qrynotcomphr = "SELECT COUNT(*) as notcomphr FROM $tval[0] where $tval[4]";
                                                            $resnotcomphr = mysqli_query($connect, $qrynotcomphr);
                                                            $rownotcomphr=mysqli_fetch_assoc($resnotcomphr);
                                                            //echo $rownotcomphr['notcomphr'];

                                                        }

                                                    

                             

 ?>
 <?php
                        

                         

                          $tbl= array( array("tbl_faq_cqi","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalcqii = 0;
                                                    $compqicqi =0;
                                                    $notcompqicqi=0;
                                                    $comphrcqi =0;
                                                    $notcomphrcqi=0;
                                                    foreach ($tbl as $tval) {
                                                          $qrycqi = "SELECT COUNT(*) as totalcqii FROM $tval[0]";
                                                            $rescqi = mysqli_query($connect, $qrycqi);
                                                            $rowcqi=mysqli_fetch_assoc($rescqi);
                                                            //echo $rowcqi['totalcqii'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqicqi = "SELECT COUNT(*) as compqicqi FROM $tval[0] where $tval[1]";
                                                            $rescompqicqi = mysqli_query($connect, $qrycompqicqi);
                                                            $rowcompqicqi=mysqli_fetch_assoc($rescompqicqi);
                                                           // echo $rowcompqicqi['compqicqi'];

                                                            $qrynotcompqicqi = "SELECT COUNT(*) as notcompqicqi FROM $tval[0] where $tval[2]";
                                                            $resnotcompqicqi = mysqli_query($connect, $qrynotcompqicqi);
                                                            $rownotcompqicqi=mysqli_fetch_assoc($resnotcompqicqi);
                                                          //  echo $rownotcompqicqi['notcompqicqi'];

                                                            $qrycomphrcqi = "SELECT COUNT(*) as comphrcqi FROM $tval[0] where $tval[3]";
                                                            $rescomphrcqi = mysqli_query($connect, $qrycomphrcqi);
                                                            $rowcomphrcqi=mysqli_fetch_assoc($rescomphrcqi);
                                                           // echo $rowcomphrcqi['comphrcqi'];

                                                            $qrynotcomphrcqi = "SELECT COUNT(*) as notcomphrcqi FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrcqi = mysqli_query($connect, $qrynotcomphrcqi);
                                                            $rownotcomphrcqi=mysqli_fetch_assoc($resnotcomphrcqi);
                                                            // echo $rownotcomphrcqi['notcomphrcqi'];

                                                        }

                                                    

                             

 ?>
 <?php
                        

                       
                          $tbl= array( array("tbl_faq_cssd","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalcssd = 0;
                                                    $compqicssd =0;
                                                    $notcompqicssd=0;
                                                    $comphrcssd =0;
                                                    $notcomphrcssd=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry3 = "SELECT COUNT(*) as totalcssd FROM $tval[0]";
                                                            $res3 = mysqli_query($connect, $qry3);
                                                            $row3=mysqli_fetch_assoc($res3);
                                                            //echo $row3['totalcssd'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqicssd  = "SELECT COUNT(*) as compqicssd  FROM $tval[0] where $tval[1]";
                                                            $rescompqicssd = mysqli_query($connect, $qrycompqicssd);
                                                            $rowcompqicssd =mysqli_fetch_assoc($rescompqicssd);
                                                           // echo $rowcompqicssd['compqicssd'];

                                                            $qrynotcompqicssd  = "SELECT COUNT(*) as notcompqicssd  FROM $tval[0] where $tval[2]";
                                                            $resnotcompqicssd  = mysqli_query($connect, $qrynotcompqicssd );
                                                            $rownotcompqicssd =mysqli_fetch_assoc($resnotcompqicssd );
                                                          //  echo $rownotcompqicssd['notcompqicssd'];

                                                            $qrycomphrcssd  = "SELECT COUNT(*) as comphrcssd  FROM $tval[0] where $tval[3]";
                                                            $rescomphrcssd  = mysqli_query($connect, $qrycomphrcssd );
                                                            $rowcomphrcssd =mysqli_fetch_assoc($rescomphrcssd );
                                                           // echo $rowcomphrcssd['comphrcssd'];

                                                            $qrynotcomphrcssd  = "SELECT COUNT(*) as notcomphrcssd  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrcssd  = mysqli_query($connect, $qrynotcomphrcssd );
                                                            $rownotcomphrcssd =mysqli_fetch_assoc($resnotcomphrcssd);
                                                            // echo $rownotcomphrcssd['notcomphrcssd'];

                                                        }

                                                    

                             

 ?>
 <?php
                        

                         

                          $tbl= array( array("tbl_faq_emergency","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalemr= 0;
                                                    $compqiemr =0;
                                                    $notcompqiemr=0;
                                                    $comphremr =0;
                                                    $notcomphremr=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry4 = "SELECT COUNT(*) as totalemr FROM $tval[0]";
                                                            $res4= mysqli_query($connect, $qry4);
                                                            $row4=mysqli_fetch_assoc($res4);
                                                            //echo $row4['totalemr'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqiemr  = "SELECT COUNT(*) as compqiemr  FROM $tval[0] where $tval[1]";
                                                            $rescompqiemr = mysqli_query($connect, $qrycompqiemr);
                                                            $rowcompqiemr =mysqli_fetch_assoc($rescompqiemr);
                                                           // echo $rowcompqiemr['compqiemr'];

                                                            $qrynotcompqiemr = "SELECT COUNT(*) as notcompqiemr  FROM $tval[0] where $tval[2]";
                                                            $resnotcompqiemr  = mysqli_query($connect, $qrynotcompqiemr );
                                                            $rownotcompqiemr =mysqli_fetch_assoc($resnotcompqiemr );
                                                          //  echo $rownotcompqiemr['notcompqiemr'];

                                                            $qrycomphremr  = "SELECT COUNT(*) as comphremr  FROM $tval[0] where $tval[3]";
                                                            $rescomphremr  = mysqli_query($connect, $qrycomphremr );
                                                            $rowcomphremr =mysqli_fetch_assoc($rescomphremr );
                                                           // echo $rowcomphremr['comphremr'];

                                                            $qrynotcomphremr  = "SELECT COUNT(*) as notcomphremr  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphremr = mysqli_query($connect, $qrynotcomphremr );
                                                            $rownotcomphremr=mysqli_fetch_assoc($resnotcomphremr);
                                                            // echo $rownotcomphremr['notcomphremr'];

                                                        }

                                                    

                             

 ?>
 <?php
                        

                          

                          $tbl= array( array("tbl_faq_hic","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalhic= 0;
                                                    $compqihic =0;
                                                    $notcompqihic=0;
                                                    $comphrhic =0;
                                                    $notcomphrhic=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry5= "SELECT COUNT(*) as totalhic FROM $tval[0]";
                                                            $res5= mysqli_query($connect, $qry5);
                                                            $row5=mysqli_fetch_assoc($res5);
                                                            //echo $row5['totalhic'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqihic  = "SELECT COUNT(*) as compqihic  FROM $tval[0] where $tval[1]";
                                                            $rescompqihic= mysqli_query($connect, $qrycompqihic);
                                                            $rowcompqihic =mysqli_fetch_assoc($rescompqihic);
                                                           // echo $rowcompqihic['compqihic'];

                                                            $qrynotcompqihic = "SELECT COUNT(*) as notcompqihic  FROM $tval[0] where $tval[2]";
                                                            $resnotcompqihic = mysqli_query($connect, $qrynotcompqihic );
                                                            $rownotcompqihic=mysqli_fetch_assoc($resnotcompqihic );
                                                          //  echo $rownotcompqihic['notcompqihic'];

                                                            $qrycomphrhic  = "SELECT COUNT(*) as comphrhic  FROM $tval[0] where $tval[3]";
                                                            $rescomphrhic = mysqli_query($connect, $qrycomphrhic );
                                                            $rowcomphrhic =mysqli_fetch_assoc($rescomphrhic );
                                                           // echo $rowcomphrhic['comphrhic'];

                                                            $qrynotcomphrhic = "SELECT COUNT(*) as notcomphrhic  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrhic = mysqli_query($connect, $qrynotcomphrhic );
                                                            $rownotcomphrhic=mysqli_fetch_assoc($resnotcomphrhic);
                                                            // echo $rownotcomphrhic['notcomphrhic'];

                                                        }

                                                    

                             

 ?>
 <?php
                         $tbl= array( array("tbl_faq_house","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalhouse= 0;
                                                    $compqihouse =0;
                                                    $notcompqihouse=0;
                                                    $comphrhouse =0;
                                                    $notcomphrhouse=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry6= "SELECT COUNT(*) as totalhouse FROM $tval[0]";
                                                            $res6= mysqli_query($connect, $qry6);
                                                            $row6=mysqli_fetch_assoc($res6);
                                                            //echo $row6['totalhouse'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqihouse = "SELECT COUNT(*) as compqihouse  FROM $tval[0] where $tval[1]";
                                                            $rescompqihouse= mysqli_query($connect, $qrycompqihouse);
                                                            $rowcompqihouse=mysqli_fetch_assoc($rescompqihouse);
                                                           // echo $rowcompqihouse['compqihouse'];

                                                            $qrynotcompqihouse= "SELECT COUNT(*) as notcompqihouse FROM $tval[0] where $tval[2]";
                                                            $resnotcompqihouse = mysqli_query($connect, $qrynotcompqihouse );
                                                            $rownotcompqihouse=mysqli_fetch_assoc($resnotcompqihouse );
                                                          //  echo $rownotcompqihouse['notcompqihouse'];

                                                            $qrycomphrhouse  = "SELECT COUNT(*) as comphrhouse  FROM $tval[0] where $tval[3]";
                                                            $rescomphrhouse = mysqli_query($connect, $qrycomphrhouse );
                                                            $rowcomphrhouse =mysqli_fetch_assoc($rescomphrhouse );
                                                           // echo $rowcomphrhouse['comphrhouse'];

                                                            $qrynotcomphrhouse = "SELECT COUNT(*) as notcomphrhouse  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrhouse = mysqli_query($connect, $qrynotcomphrhouse );
                                                            $rownotcomphrhouse=mysqli_fetch_assoc($resnotcomphrhouse);
                                                            // echo $rownotcomphrhouse['notcomphrhouse'];

                                                        }

                                                    

                             

 ?>
 <?php
                         $tbl= array( array("tbl_faq_lab","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totallab= 0;
                                                    $compqilab =0;
                                                    $notcompqilab=0;
                                                    $comphrlab =0;
                                                    $notcomphrlab=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry9= "SELECT COUNT(*) as totallab FROM $tval[0]";
                                                            $res9= mysqli_query($connect, $qry9);
                                                            $row9=mysqli_fetch_assoc($res9);
                                                            //echo $row9['totallab'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqilab = "SELECT COUNT(*) as compqilab  FROM $tval[0] where $tval[1]";
                                                            $rescompqilab= mysqli_query($connect, $qrycompqilab);
                                                            $rowcompqilab=mysqli_fetch_assoc($rescompqilab);
                                                           // echo $rowcompqilab['compqilab'];

                                                            $qrynotcompqilab= "SELECT COUNT(*) as notcompqilab FROM $tval[0] where $tval[2]";
                                                            $resnotcompqilab = mysqli_query($connect, $qrynotcompqilab );
                                                            $rownotcompqilab=mysqli_fetch_assoc($resnotcompqilab );
                                                          //  echo $rownotcompqilab['notcompqilab'];

                                                            $qrycomphrlab = "SELECT COUNT(*) as comphrlab  FROM $tval[0] where $tval[3]";
                                                            $rescomphrlab = mysqli_query($connect, $qrycomphrlab );
                                                            $rowcomphrlab =mysqli_fetch_assoc($rescomphrlab );
                                                           // echo $rowcomphrlab['comphrlab'];

                                                            $qrynotcomphrlab = "SELECT COUNT(*) as notcomphrlab  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrlab = mysqli_query($connect, $qrynotcomphrlab );
                                                            $rownotcomphrlab=mysqli_fetch_assoc($resnotcomphrlab);
                                                            // echo $rownotcomphrlab['notcomphrlab'];

                                                        }

                                                    

                             

 ?>
 <?php
                         $tbl= array( array("tbl_faq_hr","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalhr= 0;
                                                    $compqihr =0;
                                                    $notcompqihr=0;
                                                    $comphrhr =0;
                                                    $notcomphrhr=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry7= "SELECT COUNT(*) as totalhr FROM $tval[0]";
                                                            $res7= mysqli_query($connect, $qry7);
                                                            $row7=mysqli_fetch_assoc($res7);
                                                            //echo $row7['totalhr'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqihr= "SELECT COUNT(*) as compqihr  FROM $tval[0] where $tval[1]";
                                                            $rescompqihr= mysqli_query($connect, $qrycompqihr);
                                                            $rowcompqihr=mysqli_fetch_assoc($rescompqihr);
                                                           // echo $rowcompqihr['compqihr'];

                                                            $qrynotcompqihr= "SELECT COUNT(*) as notcompqihr FROM $tval[0] where $tval[2]";
                                                            $resnotcompqihr = mysqli_query($connect, $qrynotcompqihr );
                                                            $rownotcompqihr=mysqli_fetch_assoc($resnotcompqihr );
                                                          //  echo $rownotcompqihr['notcompqihr'];

                                                            $qrycomphrhr = "SELECT COUNT(*) as comphrhr  FROM $tval[0] where $tval[3]";
                                                            $rescomphrhr = mysqli_query($connect, $qrycomphrhr );
                                                            $rowcomphrhr=mysqli_fetch_assoc($rescomphrhr );
                                                           // echo $rowcomphrhr['comphrhr'];

                                                            $qrynotcomphrhr = "SELECT COUNT(*) as notcomphrhr  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrhr = mysqli_query($connect, $qrynotcomphrhr );
                                                            $rownotcomphrhr=mysqli_fetch_assoc($resnotcomphrhr);
                                                            // echo $rownotcomphrhr['notcomphrhr'];

                                                        }

                                                    

                             

 ?>
  <?php
                         $tbl= array( array("tbl_faq_safety","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalsafty= 0;
                                                    $compqisafty =0;
                                                    $notcompqisafty=0;
                                                    $comphrsafty =0;
                                                    $notcomphrsafty=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry8= "SELECT COUNT(*) as totalsafty FROM $tval[0]";
                                                            $res8= mysqli_query($connect, $qry8);
                                                            $row8=mysqli_fetch_assoc($res8);
                                                            //echo $row8['totalsafty'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqisafty= "SELECT COUNT(*) as compqisafty  FROM $tval[0] where $tval[1]";
                                                            $rescompqisafty= mysqli_query($connect, $qrycompqisafty);
                                                            $rowcompqisafty=mysqli_fetch_assoc($rescompqisafty);
                                                           // echo $rowcompqisafty['compqisafty'];

                                                            $qrynotcompqisafty= "SELECT COUNT(*) as notcompqisafty FROM $tval[0] where $tval[2]";
                                                            $resnotcompqisafty = mysqli_query($connect, $qrynotcompqisafty );
                                                            $rownotcompqisafty=mysqli_fetch_assoc($resnotcompqisafty );
                                                          //  echo $rownotcompqisafty['notcompqisafty'];

                                                            $qrycomphrsafty = "SELECT COUNT(*) as comphrsafty  FROM $tval[0] where $tval[3]";
                                                            $rescomphrsafty = mysqli_query($connect, $qrycomphrsafty );
                                                            $rowcomphrsafty=mysqli_fetch_assoc($rescomphrsafty );
                                                           // echo $rowcomphrsafty['comphrsafty'];

                                                            $qrynotcomphrsafty = "SELECT COUNT(*) as notcomphrsafty  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrsafty = mysqli_query($connect, $qrynotcomphrsafty );
                                                            $rownotcomphrsafty=mysqli_fetch_assoc($resnotcomphrsafty);
                                                            // echo $rownotcomphrsafty['notcomphrsafty'];

                                                        }

                                                    

                             

 ?>
  <?php
                         $tbl= array( array("tbl_faq_radio","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalradio= 0;
                                                    $compqiradio =0;
                                                    $notcompqiradio=0;
                                                    $comphrradio =0;
                                                    $notcomphrsradio=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry10= "SELECT COUNT(*) as totalradio FROM $tval[0]";
                                                            $res10= mysqli_query($connect, $qry10);
                                                            $row10=mysqli_fetch_assoc($res10);
                                                            //echo $row10['totalradio'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqiradio= "SELECT COUNT(*) as compqiradio  FROM $tval[0] where $tval[1]";
                                                            $rescompqiradio= mysqli_query($connect, $qrycompqiradio);
                                                            $rowcompqiradio=mysqli_fetch_assoc($rescompqiradio);
                                                           // echo $rowcompqiradio['compqiradio'];

                                                            $qrynotcompqiradio= "SELECT COUNT(*) as notcompqiradio FROM $tval[0] where $tval[2]";
                                                            $resnotcompqiradio = mysqli_query($connect, $qrynotcompqiradio );
                                                            $rownotcompqiradio=mysqli_fetch_assoc($resnotcompqiradio);
                                                          //  echo $rownotcompqiradio['notcompqiradio'];

                                                            $qrycomphrradio= "SELECT COUNT(*) as comphrradio  FROM $tval[0] where $tval[3]";
                                                            $rescomphrradio = mysqli_query($connect, $qrycomphrradio );
                                                            $rowcomphrradio=mysqli_fetch_assoc($rescomphrradio );
                                                           // echo $rowcomphrradio['comphrradio'];

                                                            $qrynotcomphrradio = "SELECT COUNT(*) as notcomphrradio FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrradio = mysqli_query($connect, $qrynotcomphrradio );
                                                            $rownotcomphrradio=mysqli_fetch_assoc($resnotcomphrradio);
                                                            // echo $rownotcomphrradio['notcomphrradio'];

                                                        }

                                                    

                             

 ?> 
 <?php
                         $tbl= array( array("tbl_faq_icu","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalicu= 0;
                                                    $compqiicu  =0;
                                                    $notcompqiicu =0;
                                                    $comphricu  =0;
                                                    $notcomphrsicu =0;
                                                    foreach ($tbl as $tval) {
                                                          $qry11= "SELECT COUNT(*) as totalicu FROM $tval[0]";
                                                            $res11= mysqli_query($connect, $qry11);
                                                            $row11=mysqli_fetch_assoc($res11);
                                                            //echo $row11['totalicu'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqiicu= "SELECT COUNT(*) as compqiicu  FROM $tval[0] where $tval[1]";
                                                            $rescompqiicu= mysqli_query($connect, $qrycompqiicu);
                                                            $rowcompqiicu=mysqli_fetch_assoc($rescompqiicu);
                                                           // echo $rowcompqiicu['compqiicu'];

                                                            $qrynotcompqiicu= "SELECT COUNT(*) as notcompqiicu FROM $tval[0] where $tval[2]";
                                                            $resnotcompqiicu = mysqli_query($connect, $qrynotcompqiicu );
                                                            $rownotcompqiicu=mysqli_fetch_assoc($resnotcompqiicu);
                                                          //  echo $rownotcompqiicu['notcompqiicu'];

                                                            $qrycomphricu= "SELECT COUNT(*) as comphricu  FROM $tval[0] where $tval[3]";
                                                            $rescomphricu = mysqli_query($connect, $qrycomphricu );
                                                            $rowcomphricu=mysqli_fetch_assoc($rescomphricu );
                                                           // echo $rowcomphricu['comphricu'];

                                                            $qrynotcomphricu = "SELECT COUNT(*) as notcomphricu FROM $tval[0] where $tval[4]";
                                                            $resnotcomphricu= mysqli_query($connect, $qrynotcomphricu );
                                                            $rownotcomphricu=mysqli_fetch_assoc($resnotcomphricu);
                                                            // echo $rownotcomphricu['notcomphricu'];

                                                        }

                                                    

                             

 ?> 
  <?php
                         $tbl= array( array("tbl_faq_rec","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalrec= 0;
                                                    $compqirec  =0;
                                                    $notcompqirec =0;
                                                    $comphricu  =0;
                                                    $notcomphrrec =0;
                                                    foreach ($tbl as $tval) {
                                                          $qry12= "SELECT COUNT(*) as totalrec FROM $tval[0]";
                                                            $res12= mysqli_query($connect, $qry12);
                                                            $row12=mysqli_fetch_assoc($res12);
                                                            //echo $row12['totalrec'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqirec= "SELECT COUNT(*) as compqirec  FROM $tval[0] where $tval[1]";
                                                            $rescompqirec= mysqli_query($connect, $qrycompqirec);
                                                            $rowcompqirec=mysqli_fetch_assoc($rescompqirec);
                                                           // echo $rowcompqirec['compqirec'];

                                                            $qrynotcompqirec= "SELECT COUNT(*) as notcompqirec FROM $tval[0] where $tval[2]";
                                                            $resnotcompqirec= mysqli_query($connect, $qrynotcompqirec );
                                                            $rownotcompqirec=mysqli_fetch_assoc($resnotcompqirec);
                                                          //  echo $rownotcompqirec['notcompqirec'];

                                                            $qrycomphrrec= "SELECT COUNT(*) as comphrrec  FROM $tval[0] where $tval[3]";
                                                            $rescomphrrec = mysqli_query($connect, $qrycomphrrec );
                                                            $rowcomphrrec=mysqli_fetch_assoc($rescomphrrec );
                                                           // echo $rowcomphrrec['comphrrec'];

                                                            $qrynotcomphrrec= "SELECT COUNT(*) as notcomphrrec FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrrec= mysqli_query($connect, $qrynotcomphrrec );
                                                            $rownotcomphrrec=mysqli_fetch_assoc($resnotcomphrrec);
                                                            // echo $rownotcomphrrec['notcomphrrec'];

                                                        }

                                                    

                             

 ?> 
 <?php
                         $tbl= array( array("tbl_faq_medicin","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalmed= 0;
                                                    $compqimed =0;
                                                    $notcompqimed =0;
                                                    $comphrmed  =0;
                                                    $notcomphrmed =0;
                                                    foreach ($tbl as $tval) {
                                                          $qry13= "SELECT COUNT(*) as totalmed FROM $tval[0]";
                                                            $res13= mysqli_query($connect, $qry13);
                                                            $row13=mysqli_fetch_assoc($res13);
                                                            //echo $row13['totalmed'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqimed= "SELECT COUNT(*) as compqimed  FROM $tval[0] where $tval[1]";
                                                            $rescompqimed= mysqli_query($connect, $qrycompqimed);
                                                            $rowcompqimed=mysqli_fetch_assoc($rescompqimed);
                                                           // echo $rowcompqimed['compqimed'];

                                                            $qrynotcompqimed= "SELECT COUNT(*) as notcompqimed FROM $tval[0] where $tval[2]";
                                                            $resnotcompqimed= mysqli_query($connect, $qrynotcompqimed );
                                                            $rownotcompqimed=mysqli_fetch_assoc($resnotcompqimed);
                                                          //  echo $rownotcompqimed['notcompqimed'];

                                                            $qrycomphrmed = "SELECT COUNT(*) as comphrmed  FROM $tval[0] where $tval[3]";
                                                            $rescomphrmed  = mysqli_query($connect, $qrycomphrmed  );
                                                            $rowcomphrmed =mysqli_fetch_assoc($rescomphrmed  );
                                                           // echo $rowcomphrmed['comphrmed'];

                                                            $qrynotcomphrmed = "SELECT COUNT(*) as notcomphrmed FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrmed = mysqli_query($connect, $qrynotcomphrmed  );
                                                            $rownotcomphrmed =mysqli_fetch_assoc($resnotcomphrmed );
                                                            // echo $rownotcomphrmed['notcomphrmed'];

                                                        }

                                                    

                             

 ?> 
<?php
                         $tbl= array( array("tbl_faq_pharmacy","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalphar= 0;
                                                    $compqiphar =0;
                                                    $notcompqiphar =0;
                                                    $comphrphar  =0;
                                                    $notcomphrphar =0;
                                                    foreach ($tbl as $tval) {
                                                          $qry14= "SELECT COUNT(*) as totalphar FROM $tval[0]";
                                                            $res14= mysqli_query($connect, $qry14);
                                                            $row14=mysqli_fetch_assoc($res14);
                                                            //echo $row14['totalphar'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqiphar= "SELECT COUNT(*) as compqiphar  FROM $tval[0] where $tval[1]";
                                                            $rescompqiphar= mysqli_query($connect, $qrycompqiphar);
                                                            $rowcompqiphar=mysqli_fetch_assoc($rescompqiphar);
                                                           // echo $rowcompqiphar['compqiphar'];

                                                            $qrynotcompqiphar= "SELECT COUNT(*) as notcompqiphar FROM $tval[0] where $tval[2]";
                                                            $resnotcompqiphar= mysqli_query($connect, $qrynotcompqiphar );
                                                            $rownotcompqiphar=mysqli_fetch_assoc($resnotcompqiphar);
                                                          //  echo $rownotcompqiphar['notcompqiphar'];

                                                            $qrycomphrphar = "SELECT COUNT(*) as comphrphar  FROM $tval[0] where $tval[3]";
                                                            $rescomphrphar = mysqli_query($connect, $qrycomphrphar  );
                                                            $rowcomphphar =mysqli_fetch_assoc($rescomphrphar  );
                                                           // echo $rowcomphphar['comphrphar'];

                                                            $qrynotcomphrphar= "SELECT COUNT(*) as notcomphrphar FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrphar = mysqli_query($connect, $qrynotcomphrphar  );
                                                            $rownotcomphrphar=mysqli_fetch_assoc($resnotcomphrphar );
                                                            // echo $rownotcomphrphar['notcomphrphar'];

                                                        }

                                                    

                             

 ?> 
 <?php
                         $tbl= array( array("tbl_faq_store","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalstore= 0;
                                                    $compqistore  =0;
                                                    $notcompqistore  =0;
                                                    $comphrstore   =0;
                                                    $notcomphrstore  =0;
                                                    foreach ($tbl as $tval) {
                                                          $qry15= "SELECT COUNT(*) as totalstore FROM $tval[0]";
                                                            $res15= mysqli_query($connect, $qry15);
                                                            $row15=mysqli_fetch_assoc($res15);
                                                            //echo $row15['totalstore'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqistore = "SELECT COUNT(*) as compqistore  FROM $tval[0] where $tval[1]";
                                                            $rescompqistore = mysqli_query($connect, $qrycompqistore);
                                                            $rowcompqistore =mysqli_fetch_assoc($rescompqistore);
                                                           // echo $rowcompqistore['compqistore'];

                                                            $qrynotcompqistore = "SELECT COUNT(*) as notcompqistore FROM $tval[0] where $tval[2]";
                                                            $resnotcompqistore = mysqli_query($connect, $qrynotcompqistore );
                                                            $rownotcompqistore =mysqli_fetch_assoc($resnotcompqistore);
                                                          //  echo $rownotcompqistore['notcompqistore'];

                                                            $qrycomphrstore  = "SELECT COUNT(*) as comphrstore  FROM $tval[0] where $tval[3]";
                                                            $rescomphrstore  = mysqli_query($connect, $qrycomphrstore );
                                                            $rowcomphstore  =mysqli_fetch_assoc($rescomphrstore);
                                                           // echo $rowcomphstore ['comphrstore'];

                                                            $qrynotcomphrstore = "SELECT COUNT(*) as notcomphrstore  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrstore  = mysqli_query($connect, $qrynotcomphrstore  );
                                                            $rownotcomphrstore =mysqli_fetch_assoc($resnotcomphrstore );
                                                            // echo $rownotcomphrstore['notcomphrstore'];

                                                        }

                                                    

                             

 ?> 
 <?php
                         $tbl= array( array("tbl_faq_medical","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalmedical= 0;
                                                    $compqimedical =0;
                                                    $notcompqimedical  =0;
                                                    $comphrmedical  =0;
                                                    $notcomphrmedical  =0;
                                                    foreach ($tbl as $tval) {
                                                          $qry16= "SELECT COUNT(*) as totalmedical FROM $tval[0]";
                                                            $res16= mysqli_query($connect, $qry16);
                                                            $row16=mysqli_fetch_assoc($res16);
                                                            //echo $row16['totalmedical'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqimedical  = "SELECT COUNT(*) as compqimedical  FROM $tval[0] where $tval[1]";
                                                            $rescompqimedical  = mysqli_query($connect, $qrycompqimedical);
                                                            $rowcompqimedical =mysqli_fetch_assoc($rescompqimedical);
                                                           // echo $rowcompqimedical['compqimedical'];

                                                            $qrynotcompqimedical  = "SELECT COUNT(*) as notcompqimedical FROM $tval[0] where $tval[2]";
                                                            $resnotcompqimedical  = mysqli_query($connect, $qrynotcompqimedical );
                                                            $rownotcompqimedical  =mysqli_fetch_assoc($resnotcompqimedical);
                                                          //  echo $rownotcompqimedical['notcompqimedical'];

                                                            $qrycomphrmedical  = "SELECT COUNT(*) as comphrmedical  FROM $tval[0] where $tval[3]";
                                                            $rescomphrmedical   = mysqli_query($connect, $qrycomphrmedical );
                                                            $rowcomphmedical   =mysqli_fetch_assoc($rescomphrmedical);
                                                           // echo $rowcomphmedical ['comphrmedical'];

                                                            $qrynotcomphrmedical  = "SELECT COUNT(*) as notcomphrmedical  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrmedical   = mysqli_query($connect, $qrynotcomphrmedical  );
                                                            $rownotcomphrmedical  =mysqli_fetch_assoc($resnotcomphrmedical );
                                                            // echo $rownotcomphrmedical ['notcomphrmedical'];

                                                        }

                                                    

                             

 ?> 
  <?php
                         $tbl= array( array("tbl_faq_maintainance","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalmaintainance= 0;
                                                    $compqimaintainance=0;
                                                    $notcompqimaintainance =0;
                                                    $comphrmaintainance=0;
                                                    $notcomphrmaintainance=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry17= "SELECT COUNT(*) as totalmaintainance FROM $tval[0]";
                                                            $res17= mysqli_query($connect, $qry17);
                                                            $row17=mysqli_fetch_assoc($res17);
                                                            //echo $row17['totalmaintainance'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqimaintainance  = "SELECT COUNT(*) as compqimaintainance  FROM $tval[0] where $tval[1]";
                                                            $rescompqimaintainance  = mysqli_query($connect, $qrycompqimaintainance);
                                                            $rowcompqimaintainance =mysqli_fetch_assoc($rescompqimaintainance);
                                                           // echo $rowcompqimaintainance['compqimaintainance'];

                                                            $qrynotcompqimaintainance = "SELECT COUNT(*) as notcompqimaintainance FROM $tval[0] where $tval[2]";
                                                            $resnotcompqimaintainance  = mysqli_query($connect, $qrynotcompqimaintainance);
                                                            $rownotcompqimaintainance  =mysqli_fetch_assoc($resnotcompqimaintainance);
                                                          //  echo $rownotcompqimaintainance['notcompqimaintainance'];

                                                            $qrycomphrmaintainance = "SELECT COUNT(*) as comphrmaintainance  FROM $tval[0] where $tval[3]";
                                                            $rescomphrmaintainance  = mysqli_query($connect, $qrycomphrmaintainance);
                                                            $rowcomphmaintainance  =mysqli_fetch_assoc($rescomphrmaintainance);
                                                           // echo $rowcomphmaintainance['comphrmaintainance'];

                                                            $qrynotcomphrmaintainance= "SELECT COUNT(*) as notcomphrmaintainance  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrmaintainance = mysqli_query($connect, $qrynotcomphrmaintainance);
                                                            $rownotcomphrmaintainance =mysqli_fetch_assoc($resnotcomphrmaintainance);
                                                            // echo $rownotcomphrmaintainance['notcomphrmaintainance'];

                                                        }

                                                    

                             

 ?> 
  <?php
                         $tbl= array( array("tbl_faq_nurse","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalnurse= 0;
                                                    $compqinurse=0;
                                                    $notcompqinurse=0;
                                                    $comphrnurse=0;
                                                    $notcomphrnurse=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry18= "SELECT COUNT(*) as totalnurse FROM $tval[0]";
                                                            $res18= mysqli_query($connect, $qry18);
                                                            $row18=mysqli_fetch_assoc($res18);
                                                            //echo $row18['totalnurse'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqinurse  = "SELECT COUNT(*) as compqinurse  FROM $tval[0] where $tval[1]";
                                                            $rescompqinurse = mysqli_query($connect, $qrycompqinurse);
                                                            $rowcompqinurse =mysqli_fetch_assoc($rescompqinurse);
                                                           // echo $rowcompqinurse['compqinurse'];

                                                            $qrynotcompqinurse= "SELECT COUNT(*) as notcompqinurse FROM $tval[0] where $tval[2]";
                                                            $resnotcompqinurse= mysqli_query($connect, $qrynotcompqinurse);
                                                            $rownotcompqinurse=mysqli_fetch_assoc($resnotcompqinurse);
                                                          //  echo $rownotcompqinurse['notcompqinurse'];

                                                            $qrycomphrnurse= "SELECT COUNT(*) as comphrnurse  FROM $tval[0] where $tval[3]";
                                                            $rescomphrnurse= mysqli_query($connect, $qrycomphrnurse);
                                                            $rowcomphnurse=mysqli_fetch_assoc($rescomphrnurse);
                                                           // echo $rowcomphnurse['comphrnurse'];

                                                            $qrynotcomphrnurse= "SELECT COUNT(*) as notcomphrnurse  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrnurse = mysqli_query($connect, $qrynotcomphrnurse);
                                                            $rownotcomphrnurse =mysqli_fetch_assoc($resnotcomphrnurse);
                                                            // echo $rownotcomphrnurse['notcomphrnurse'];

                                                        }

                                                    

                             

 ?> 
 <?php
                         $tbl= array( array("tbl_faq_otnurse","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalotnurse= 0;
                                                    $compqiotnurse=0;
                                                    $notcompqiotnurse=0;
                                                    $comphrotnurse=0;
                                                    $notcomphrotnurse=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry19= "SELECT COUNT(*) as totalotnurse FROM $tval[0]";
                                                            $res19= mysqli_query($connect, $qry19);
                                                            $row19=mysqli_fetch_assoc($res19);
                                                            //echo $row19['totalotnurse'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqiotnurse  = "SELECT COUNT(*) as compqiotnurse  FROM $tval[0] where $tval[1]";
                                                            $rescompqiotnurse = mysqli_query($connect, $qrycompqiotnurse);
                                                            $rowcompqiotnurse =mysqli_fetch_assoc($rescompqiotnurse);
                                                           // echo $rowcompqiotnurse['compqiotnurse'];

                                                            $qrynotcompqiotnurse= "SELECT COUNT(*) as notcompqiotnurse FROM $tval[0] where $tval[2]";
                                                            $resnotcompqiotnurse= mysqli_query($connect, $qrynotcompqiotnurse);
                                                            $rownotcompqiotnurse=mysqli_fetch_assoc($resnotcompqiotnurse);
                                                          //  echo $rownotcompqiotnurse['notcompqiotnurse'];

                                                            $qrycomphrotnurse= "SELECT COUNT(*) as comphrotnurse  FROM $tval[0] where $tval[3]";
                                                            $rescomphrotnurse= mysqli_query($connect, $qrycomphrotnurse);
                                                            $rowcomphotnurse=mysqli_fetch_assoc($rescomphrotnurse);
                                                           // echo $rowcomphotnurse['comphrotnurse'];

                                                            $qrynotcomphrotnurse= "SELECT COUNT(*) as notcomphrotnurse  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrotnurse = mysqli_query($connect, $qrynotcomphrotnurse);
                                                            $rownotcomphrotnurse =mysqli_fetch_assoc($resnotcomphrotnurse);
                                                            // echo $rownotcomphrotnurse['notcomphrotnurse'];

                                                        }

                                                    

                             

 ?> 


  <?php
   
    $cdate = date('Y-m-d');
    $fdt = date('Y-m-01');

    $tdt = date('Y-m-31');
    
    $qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (huf_dadm BETWEEN '$fdt' AND '$tdt') AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $res = mysqli_fetch_assoc($qry);
  $i_count = $res["std"];
  
 $qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$fdt' AND '$tdt'")or die(mysqli_error($connect));
  $A_count = mysqli_num_rows($qry2);

  $qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $dis_count = mysqli_num_rows($qry3_1);

  $qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $dm_count = mysqli_num_rows($qry3_2);

  $qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $dh_count = mysqli_num_rows($qry3_3);

  $qry3_4 = mysqli_query($connect,"SELECT huf_mlc FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $mlc_count = mysqli_num_rows($qry3_4);

  $dy = $i_count * 24;
  $dys = $dy / $A_count;
  $hmin = $dys / 24;
  list($number1, $number2) = explode('.', $hmin);
    
    //$hrs = $number2 * 0.24;
    //list($numb1, $numb2) = explode('.', $hrs);
    $los_count = $number1.'.'.$number2;
    //$los_count1 = $numb1;
    
    $qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (huf_dadm BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
    $s_count = mysqli_num_rows($qry5);
        
    $qry6 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm = '$cdate' AND huf_ddd != '$cdate'")or die(mysqli_error($connect));
    $c_count = mysqli_num_rows($qry6);
    
    $qry7 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = ''")or die(mysqli_error($connect));
    $c2_count = mysqli_num_rows($qry7);
    
    $c3_count = $c_count + $c2_count;
    
?>
<?php
    
    $frdt = date('Y-m-01');
    $todt = date('Y-m-31');
    
    $qry = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (huf_dadm BETWEEN '$frdt' AND '$todt') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
    while($res = mysqli_fetch_array($qry))
    {
        $sm_std = $res["int_tottm"];
        list($num1, $num2) = explode('.', $sm_std);
        $hr_num = $hr_num + $num1;
        $min_num = $min_num + $num2;
    }
    $sum_std = ($hr_num * 60) + $min_num;   
    
    $qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (huf_dadm BETWEEN '$frdt' AND '$todt') AND int_ddd != ''")or die(mysqli_error($connect));
    $s_count = mysqli_num_rows($qry5);
    
    $tot_count = $sum_std / $s_count;
    if($tot_count >= 60)
    {
        $tt_count = $tot_count / 60;
        list($number1, $number2) = explode('.', $tt_count);
        
        $tot_min = $tot_count - ($number1 * 60);
        if($tot_min >= 10)
        {
            $numb3 = $number1.'.'.$tot_min;
        }else if($tot_min < 10){
            $a = 0;
            $numbr3 = $number1.'.'.$a.''.$tot_min;
            $numb3 = number_format($numbr3,2);
        }       
    }else if($tot_count < 60){
        list($numb1, $numb2) = explode('.', $tot_count);
        $aj = 0;
        $numbr3 = $aj.'.'.$numb1;
        $numb3 = number_format($numbr3,2);
    }
?>
<?php
   
   
    $frdt = date('Y-m-01');
    $todt = date('Y-m-31');
    $qry123 = mysqli_query($connect,"SELECT SUM(vent_tcd) as std FROM tbl_huf WHERE vent_dt_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
    $res123 = mysqli_fetch_assoc($qry123);
    $i_count12 = $res123["std"];

    $qry213 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (vent_dt_iuc BETWEEN '$frdt' AND '$todt') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
    $v_count123 = mysqli_num_rows($qry213);
    $vap_count123 = $v_count123*1000/$i_count12;
    
?>

      

 
<style>
    .sidebar .menu .list a {
    color: #eee;
    font-size: 13.5px;
}
.modal-backdrop {
    position: static!important;

    }
    input[type="checkbox"]:not(:checked), input[type="checkbox"]:checked {
    position: initial!important;
    left: -9999px;
    opacity: 1!important;
}

</style>
 <script>
function myFunction() {
  window.print();
}

 
function goBack() {
  window.history.back();
}
 
</script>

<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="../assets/css/main.css" rel="stylesheet">
<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
 
<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-cyan">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader --> 
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- #Float icon -->
<ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
  <li class="mfb-component__wrap">
    <a href="#" class="mfb-component__button--main g-bg-cyan">
      <i class="mfb-component__main-icon--resting zmdi zmdi-plus"></i>
      <i class="mfb-component__main-icon--active zmdi zmdi-close"></i>
    </a>
    <ul class="mfb-component__list">
      
      <li>
        <a href="incident_report.php" data-mfb-label="Incidence Report" class="mfb-component__button--child bg-orange">
          <i class="zmdi zmdi-account-o mfb-component__child-icon"></i>
        </a>
      </li>

      <li>
        <a href="grievance_from.php" data-mfb-label="Grievance Report" class="mfb-component__button--child bg-purple">
          <i class="zmdi zmdi-balance-wallet mfb-component__child-icon"></i>
        </a>
      </li>
    </ul>
  </li>
</ul>

<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-cyan">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader --> 
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- #Float icon -->
<ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
  <li class="mfb-component__wrap">
    <a href="#" class="mfb-component__button--main g-bg-cyan">
      <i class="mfb-component__main-icon--resting zmdi zmdi-plus"></i>
      <i class="mfb-component__main-icon--active zmdi zmdi-close"></i>
    </a>
    <ul class="mfb-component__list">
      <li>
        <a href="incident_report.php" data-mfb-label="Incident Report" class="mfb-component__button--child bg-blue">
          <i class="zmdi zmdi-calendar mfb-component__child-icon"></i>
        </a>
      </li>
      <li>
        <a href="grievance_from.php" data-mfb-label="Grivence Report" class="mfb-component__button--child bg-orange">
          <i class="zmdi zmdi-account-o mfb-component__child-icon"></i>
        </a>
      </li>

     
    </ul>
  </li>
</ul>
<!-- #Float icon -->
<!-- Morphing Search  -->
<!-- <div id="morphsearch" class="morphsearch">
    <form class="morphsearch-form">
        <div class="form-group m-0">
            <input value="" type="search" placeholder="Explore Swift..." class="form-control morphsearch-input" />
            <button class="morphsearch-submit" type="submit">Search</button>
        </div>
    </form>
    <div class="morphsearch-content">
        <div class="dummy-column">
            <h2>People</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar3.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar5.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a></div>
        <div class="dummy-column">
            <h2>Popular</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="assetqs/images/xs/avatar5.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar3.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a> </div>
        <div class="dummy-column">
            <h2>Recent</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar5.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a></div>
    </div> -->
    <!-- /morphsearch-content --> 
    <!-- <span class="morphsearch-close"></span> </div> -->
<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html" style="font-size: 22px; padding-left: 15px;font-weight: bold;">NABH IT SOLUTION</a></div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i> <span class="label-count"></span> </a>
                <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu">
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-green"><i class="zmdi zmdi-account-add"></i></div>
                                <div class="menu-info">
                                    <h4>12 new members joined</h4>
                                    <p> <i class="material-icons">access_time</i> 14 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-cyan"><i class="zmdi zmdi-shopping-cart-plus"></i></div>
                                <div class="menu-info">
                                    <h4>4 sales made</h4>
                                    <p> <i class="material-icons">access_time</i> 22 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy Doe</b> deleted account</h4>
                                    <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-orange"><i class="zmdi zmdi-edit"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy</b> changed name</h4>
                                    <p> <i class="material-icons">access_time</i> 2 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue-grey"><i class="zmdi zmdi-comment-alt-text"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> commented your post</h4>
                                    <p> <i class="material-icons">access_time</i> 4 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-green"><i class="zmdi zmdi-refresh-alt"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> updated status</h4>
                                    <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-purple"><i class="zmdi zmdi-settings"></i></div>
                                <div class="menu-info">
                                    <h4>Settings updated</h4>
                                    <p> <i class="material-icons">access_time</i> Yesterday </p>
                                </div>
                                </a> </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>
            <!-- #END# Notifications --> 
            <!-- Tasks -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i><span class="label-count"></span> </a>
                <ul class="dropdown-menu">
                    <li class="header">TASKS</li>
                    <li class="body">
                        <ul class="menu tasks">
                            <li> <a href="javascript:void(0);">
                                <h4> Task 1 <small>32%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4>Task 2 <small>45%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4>Task 3 <small>54%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4> Task 4 <small>65%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%"> </div>
                                </div>
                                </a> </li>                          
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Tasks</a> </li>
                </ul>
            </li>
            <!-- #END# Tasks -->
           <li>
               
                 <!--<a href="change_pass.php" class="btn btn-default ">Change Password</a><br>-->
                 <a href="../logout.php" >Sign out</a>
              </li>
        </ul>
    </div>
</nav>
<!-- #Top Bar -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="../assets/images/random-avatar7.jpg" alt=""> </div>
            <div class="admin-action-info"> <span>Welcome</span>
                <h3><?php
                    
                     $sql = "SELECT * From tbl_staff  WHERE stf_id=".$_SESSION['id'];
                                     $result = mysqli_query($connect, $sql);
                                     $DB_ROW = mysqli_fetch_assoc($result);
                                    
                                     echo ucfirst($DB_ROW['stf_uname']);
                       ?>              
                </h3>
                <ul>
                    <!-- <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li> -->
                    <li><a data-placement="bottom" title="Go to Profile" href="user_profile.php"><i class="zmdi zmdi-account"></i></a></li>                    
                    <!-- <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li> -->
                    <!-- <li><a data-placement="bottom" title="Log Out" href="../logout.php " ><i class="zmdi zmdi-sign-in"></i></a></li> -->
                </ul>
            </div>

       
            <div class="quick-stats">
                <h5>Today Report</h5>
                <ul>
                    <li><span><?php 
        
                                     $c = $DB_ROW['stf_uname'];
                                     $sql = "SELECT * From tbl_huf  WHERE huf_recd='$c'";

                                     $result = mysqli_query($connect, $sql);
                                    

                             ?>
                            <div class="number"><?=mysqli_num_rows($result); ?></div>
                            <i>IPD</i>
                        </span>
                    </li>
                            &nbsp;&nbsp;&nbsp;
                    <li>
                        <span><?php 
        
                                     $d = $DB_ROW['stf_uname'];
                                     $sql = "SELECT * From tbl_opdwttm  WHERE opdwttm_recd ='$d'";

                                     $result = mysqli_query($connect, $sql);
                                    

                             ?>
                            <div class="number"><?=mysqli_num_rows($result); ?>
                            <i>OPD</i>
                        </span>
                    </li>
                   <!--  <li><span>04<i>Visit</i></span></li> -->
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu"  >
            <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: calc(100vh - 184px);">
            <ul class="list" >
                <li class="header" style="color: #eee;">MAIN NAVIGATION</li>
                <li class="active open"><a href="dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

               <!--  <li><a href="admin-kpi.php"><i class="zmdi zmdi-home"></i><span>K.P.I. - Front Office</span></a></li> -->                                               
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px;">Quality Indicators</span> </a>
                    <ul class="ml-menu">
                        <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Front Office</a></li>
                        <li><a href="hosp_util_form.php" style="color: #eee; font-size: 13.5px;">IPD Register</a></li>
                        <li><a href="opd_waittm_form_det.php" style="color: #eee; font-size: 13.5px;">OPD Register</a></li>
                        <li><a href="bed_occup_form.php" style="color: #eee; font-size: 13.5px;">Bed Occupancy Report</a></li>
                        <li><a href="opd_feedback_form.php" style="color: #eee; font-size: 13.5px;">OPD Feedback Form</a></li>
                        <li><a href="ipd_feedback_form.php" style="color: #eee; font-size: 13.5px;">IPD Feedback Form</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Infection Control Indicator</a></li>
                        <li><a href="vent_ass_form.php" style="color: #eee; font-size: 13.5px;">Ventilator Associated Pnemonia</a></li>
                        <li><a href="cat_ass_uti_form.php" style="color: #eee; font-size: 13.5px;">Catheter Associated UTI</a></li>
                        <li><a href="cent_line_ass_bsi_form.php" style="color: #eee; font-size: 13.5px;">Central Line Associated BSI</a></li>
                        <li><a href="surg_site_inf_form.php" style="color: #eee; font-size: 13.5px;">Surgical Site Infection</a></li>
                        <li><a href="needle_prick_inj_form.php" style="color: #eee; font-size: 13.5px;">Occupational Exposure/ Needle Prick Injury</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Doctor's Related Indicator</a></li>
                        <li><a href="int_asst_form.php" style="color: #eee; font-size: 13.5px;">Initial Assessment Register</a></li>
                        <li><a href="ipd_waittm_form.php" style="color: #eee; font-size: 13.5px;">IPD Discharge Register</a></li>
                        <li><a href="blood_trasfusion_event.php" style="color: #eee; font-size: 13.5px;">Blood Trasfusion Register</a></li><br>
                        
                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Nurse's Related Indicator</a></li>  
                        <li><a href="care_relate_event.php" style="color: #eee; font-size: 13.5px;">Nursing Care Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Medical Records Indicator</a></li>  
                        <li><a href="medi_records_indicator.php" style="color: #eee; font-size: 13.5px;">MRD Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">HR Related Indicators</a></li>
                        <li><a href="hr_mast.php" style="color: #eee; font-size: 13.5px;">HR Master</a></li>
                        <li><a href="hr_indicator.php" style="color: #eee; font-size: 13.5px;">HR Indicator</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Bio Medical Equipment</a></li>
                        <li><a href="equip_mast_bio.php" style="color: #eee; font-size: 13.5px;">Bio Equipment Master</a></li>
                        <li><a href="equip_indicator_form_bio.php" style="color: #eee; font-size: 13.5px;">Bio Maintenance Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">General Equipment</a></li>
                        <li><a href="equip_mast.php" style="color: #eee; font-size: 13.5px;">General Equipment Master</a></li>
                        <li><a href="equip_indicator_form.php" style="color: #eee; font-size: 13.5px;">General Maintenance Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">OT  Indicators</a></li>
                        <li><a href="sentinel_event_form.php" style="color: #eee; font-size: 13.5px; font-size: 13.5px;">OT Register <br>(Sentinel Event - Surgical and Anesthetia Events)</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Emergency Indicators</a></li>
                        <li><a href="emrgncy_register_ipd_form.php" style="color: #eee; font-size: 13.5px;">Emergency Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">ICU Indicator</a></li>
                        <li><a href="icu_register_ipd_form.php" style="color: #eee; font-size: 13.5px;">ICU Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Laboratory Indicators</a></li>
                        <li><a href="lab_opd_form.php" style="color: #eee; font-size: 13.5px;">Laboratory Register (OPD)</a></li>
                        <li><a href="lab_ipd_form.php" style="color: #eee; font-size: 13.5px;">Laboratory Register (IPD)</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Pharmacy Indicators (Medication Related)</a></li>
                        <li><a href="pharmcy_register_form.php" style="color: #eee; font-size: 13.5px;">Pharmacy Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Radiology Indicators</a></li>
                        <li><a href="radio_opd_form.php" style="color: #eee; font-size: 13.5px;">Radiology Register (OPD)</a></li>
                        <li><a href="radio_ipd_form.php" style="color: #eee; font-size: 13.5px;">Radiology Register (IPD)</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Form Indicators</a></li>
                        <li><a href="form_indicator.php" style="color: #eee; font-size: 13.5px;">Performance of KPI Yearly</a></li><br>
                        <li><a href="performence.php" style="color: #eee; font-size: 13.5px;">Performance</a></li>
                         

                    </ul>
                </li>


                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px;">Audit</span> </a>
                    <ul class="ml-menu">
                        
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Quaterly Audit</span> 
                            </a>
                    <ul class="ml-menu">
                        
                        
                        
                         <li><a href="death_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">Death Audit</a></li>
                          <li><a href="clinical_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">Clinical Audit</a></li>
                           <li><a href="antibiotics_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">Antibiotics Audit</a></li>
                        
                        
                        
                        
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span style="color: #eee; font-size: 13.5px;">HIC Audit</span> </a>
                            <ul class="ml-menu">
                              <li><a href="hic1_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Hand hygiene</a></li>
                              <li><a href="hic2_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Bio-Medical Waste Management</a></li>
                              <li><a href="hic3_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Sharp Safety Audit</a></li>
                              <li><a href="hic4_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Spillage and / or Contamination with blood/ body fluids</a></li>
                              <li><a href="hic5_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Environment Audit</a></li>
                              <li><a href="hic6_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Management of Patient Equipment</a></li>
                              <li><a href="hic7_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Resuscitation equipment</a></li>
                              <li><a href="hic8_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Transportation & Handling of Specimens</a></li>
                              <li><a href="hic9_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Kitchens</a></li>
                              
                              <li><a href="hic11_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Care of Invasive device</a></li>
                              <li><a href="hic12_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Care of Urinary Catheter</a></li>
                              <li><a href="hic13_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Care ventilated patient</a></li>
                              <li><a href="hic14_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Enteral feeding</a></li>
                              <li><a href="hic15_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Isolation Precautions</a></li>
                              <li><a href="hic16_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Laundry Audit</a></li>
                              <li><a href="hic17_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Ward management of linen</a></li>
                              <li><a href="hic18_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Endoscopy</a></li>
                              <li><a href="hic19_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Infection Prevention and Control-Management</a></li>
                              <li><a href="hic20_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Operation Theatre Asepsis</a></li>
                              <li><a href="hic21_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  CSSD</a></li>
                              <li><a href="hic22_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  ANTIMICROBIAL STEWARDSHIP Audit</a></li>
                              <li><a href="hic23_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Scoring summary</a></li>
                        </ul>
                </li>
  <!--<li><a href="#" style="color: #eee; font-size: 13.5px;">Monthly Audit</a></li><br>                       
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">NABH Status Scoreboard</a></li>--><br>
                    </ul>
                </li>

                
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Monthly Audit</span> </a>
                    <ul class="ml-menu">
                        
                        
                        
                        <li><a href="prescription_audit_formNew.php" style="color: #eee; font-size: 13.5px;"> Prescription Audit </a></li>
                        
                        <li><a href="medical_records_audit_formNew.php" style="color: #eee; font-size: 13.5px;"> Medical Records Audit </a></li>
                        
                        <li><a href="facility_inspection_audit_formNew.php" style="color: #eee; font-size: 13.5px;"> FACILITY INSPECTION AUDIT </a></li>
                        
                        
                        <li><a href="icu_audit_chklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;"> ICU Audit Checklist </a></li>
                        
                        
                        <li><a href="radion_saftey_chklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;"> Radiation  Checklist </a></li>
                        
                         
                    </ul>
                </li>
                
                 <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Daily Audit</span> </a>
                    <ul class="ml-menu">
                        
                        
                        <li><a href="hic10_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>   Hand hygiene</a></li>
                        <li><a href="hr_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  HR  Audit</a></li>
                        
                        <li><a href="ward_round_cklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  Ward Round Checklist</a></li>
                        
                        <li><a href="pharmacy_round_chklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  Pharmacy round  Checklist</a></li>
                        
                        
                        <li><a href="biomedicaleqip_sfty_check_list.php" style="color: #eee; font-size: 13.5px;">  Bio-Medical Equipment Safety checklist </a></li>
                         
                        
                        
                        <li><a href="bio_sfty_chklst.php" style="color: #eee; font-size: 13.5px;">  Bio Safety Checklist Checklist</a></li>
                        
                        <li><a href="bmw_chklst_formNew.php" style="color: #eee; font-size: 13.5px;">  Bio-Medical Waste Management Checklist</a></li>
                        
                        <li><a href="bme_chklist_formNew.php" style="color: #eee; font-size: 13.5px;">  Biomedical Equipment Safety monthly Checklist</a></li>
                        
                        
                         
                    </ul>
                </li> 

                    </ul>
                </li>


               
               
  <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment-returned zmdi-hc-fw"></i><span style="color: #eee; font-size: 13.5px;">Training</span> </a>
                    <ul class="ml-menu">
                        <li><a href="http://nabhitsolutions.in/nabhbuddyTraning/login/siteLogin/<?=$_SESSION['email']?>/<?=$_SESSION['password']?>/<?=$_SESSION['department']?>" style="color: #eee; font-size: 13.5px;">Traning </a></li><br>
                        
                         
                    </ul>
                </li>


                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-star-circle zmdi-hc-fw"></i><span style="color: #eee; font-size: 13.5px;">Assesment Tool</span> </a>
                    <ul class="ml-menu">
                        <li><a href="http://nabhitsolutions.in/hospRegistration/dashboard/nabhlogin/<?=$_SESSION['email']?>/<?=$_SESSION['password']?>" style="color: #eee; font-size: 13.5px;">Assesment Tool </a></li><br>
                        
                         
                    </ul>
                </li>


                

                 <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder zmdi-hc-fw"></i><span style="color: #eee; font-size: 13.5px;">Documentation</span> </a>
                    <ul class="ml-menu">
                        <li><a href="documents.php" style="color: #eee; font-size: 13.5px;">Documentation </a></li><br>
                        
                         
                    </ul>
                </li>
                     

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span style="color: #eee; font-size: 13.5px;">SOP's</span> </a>
                    <ul class="ml-menu">
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">Pre-Entry Level SOP</a></li><br>
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">Final Level SOP</a></li><br>                       
                         
                         
                    </ul>
                </li>
               <!--  <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-balance-wallet"></i><span>Payments</span> </a>
                    <ul class="ml-menu"> 
                        <li> <a href="payments.html">Payments</a></li>
                        <li> <a href="add-payments.html">Add Payment</a></li>
                        <li> <a href="patient-invoice.html">Patient Invoice</a></li>
                    </ul>
                </li>
                <li><a href="reports.html"><i class="zmdi zmdi-file-text"></i><span>Reports</span></a></li>
                <li><a href="widgets.html"><i class="zmdi zmdi-delicious"></i><span>Widgets</span></a></li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Extra Pages</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="sign-in.html">Sign In</a> </li>
                        <li> <a href="sign-up.html">Sign Up</a> </li>
                        <li> <a href="forgot-password.html">Forgot Password</a> </li>
                        <li> <a href="404.html">Page 404</a> </li>
                        <li> <a href="500.html">Page 500</a> </li>
                        <li> <a href="page-offline.html">Page Offline</a> </li>
                        <li> <a href="locked.html">Locked Screen</a> </li>
                        <li> <a href="blank.html">Blank Page</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>User Interface (UI)</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="typography.html">Typography</a> </li>
                        <li> <a href="helper-classes.html">Helper Classes</a></li>
                        <li> <a href="alerts.html">Alerts</a> </li>
                        <li> <a href="animations.html">Animations</a> </li>
                        <li> <a href="badges.html">Badges</a> </li>
                        <li> <a href="breadcrumbs.html">Breadcrumbs</a> </li>
                        <li> <a href="buttons.html">Buttons</a> </li>
                        <li> <a href="collapse.html">Collapse</a> </li>
                        <li> <a href="colors.html">Colors</a> </li>
                        <li> <a href="dialogs.html">Dialogs</a> </li>
                        <li> <a href="icons.html">Icons</a> </li>
                        <li> <a href="labels.html">Labels</a> </li>
                        <li> <a href="list-group.html">List Group</a> </li>
                        <li> <a href="media-object.html">Media Object</a> </li>
                        <li> <a href="modals.html">Modals</a> </li>
                        <li> <a href="notifications.html">Notifications</a> </li>
                        <li> <a href="pagination.html">Pagination</a> </li>
                        <li> <a href="preloaders.html">Preloaders</a> </li>
                        <li> <a href="progressbars.html">Progress Bars</a> </li>
                        <li> <a href="range-sliders.html">Range Sliders</a> </li>
                        <li> <a href="sortable-nestable.html">Sortable & Nestable</a> </li>
                        <li> <a href="tabs.html">Tabs</a> </li>
                        <li> <a href="waves.html">Waves</a> </li>
                    </ul>
                </li> -->
                <li class="header">LABELS</li>
                <li> <a href="chart_det.php"><i class="zmdi zmdi-chart-donut col-red"></i><span>Control Charts</span> </a> </li>
                <li> <a href="graphicalreprsentation.php"><i class="zmdi zmdi-chart-donut col-blue"></i><span>Graphical Reprsentation</span> </a> </li>
                <li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>Backup Database</span> </a> </li>
                <!-- <li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>SESSION : <?php echo $finyr;?></span> </a> </li> -->


            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar --> 
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Setting</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red">
                        <div class="red"></div>
                        <span>Red</span> </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span> </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span> </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span> </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span> </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span> </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span> </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span> </li>
                    <li data-theme="blush">
                        <div class="blush"></div>

                        
                        <span>Blush</span> </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="chat">
                <div class="demo-settings">
                    <div class="search">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Search..." required autofocus>
                            </div>
                        </div>
                    </div>
                    <h6>Recent</h6>
                    <ul>
                        <li class="online">
                            <div class="media">
                                <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar1.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Claire Sassu</span> <span class="message">Can you share the...</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar2.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Maggie jackson</span> <span class="message">Can you share the...</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar3.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Joel King</span> <span class="message">Ready for the meeti...</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <h6>Contacts</h6>
                    <ul>
                        <li class="offline">
                            <div class="media"> <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar4.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Joel King</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar1.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Joel King</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="offline">
                            <div class="media"> <a class="pull-left " role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar2.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Joel King</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar --> 
</section>


 

<!-- #Top Bar -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard </h2>
            <small class="text-muted">NABH For Hospitals And Healthcare Providers.</small><br><br>
            <span><b>Month : <?php echo date('M-Y');?> </b></span><br>
            <small class="text-muted">Hospitals Statistics</small>
        </div>
       <div class="row clearfix" > 
            <!-- Basic Examples -->
            <div class="col-lg-6 col-md-6 col-sm-12" >
                <div class="card" style="height: 410px">
                    <div class="header">
                        NABH STATUS &nbsp;&nbsp;<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px; " onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>
                        
                    </div>
                    <div class="body">
                        <?php include"AllScoreTab.php";?>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples --> 
            <!-- With Icons -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>  </h2>
                        
                    </div>
                    <div class="body" style="align-content: center">
                        <?php include"AllScoreGuage.php";?>
                    </div>
                </div>
            </div>
            <!-- #END# With Icons --> 
        </div>
        
<div class="row clearfix" > 
            <!-- Basic Examples -->
              <div class="col-lg-12 col-md-12 col-sm-12" >
             <div class="card" >
            
               
                    <div class="header">
                        Upcomings
                        
                    </div>
                    <div class="body">
                      
                        <?php include"AllFAQ.php";?>
                   
                   
           
        
                    
                
                  
                       
                    </div>
                </div>
            </div>
             <div class="col-lg-12 col-md-12 col-sm-12" >
             <div class="card" >
            
               
                    <div class="header">
                        Upcomings
                        
                    </div>
                    <div class="body">
                      
                        <?php include"AllFAQ2.php";?>
                   
                   
           
        
                    
                
                  
                       
                    </div>
                </div>
            </div>
            <!-- #END# With Icons --> 
        </div>
   


       
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-green hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Inpatient Days</div>
                        <div class="number"><?php echo $i_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Admissions</div>
                        <div class="number"><?php echo $A_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blue hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Discharges</div>
                        <div class="number"><?php echo $dis_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of DAMA</div>
                        <div class="number"><?php echo $dm_count;?></div>
                    </div>
                </div>
            </div>
        </div>
          <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-green hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Death</div>
                        <div class="number"><?php echo $dh_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of MLC</div>
                        <div class="number"><?php echo $mlc_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blue hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Average Length of stay</div>
                        <div class="number"><?php echo number_format($los_count ,2);?> <small>Days</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Surgeries</div>
                        <div class="number"><?php echo $s_count;?></div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                        <div class="header"><h2><b>Quality INDICATOR</b></h2></div>
                        <div><?php include"KPICharts/QItab_chart.php";?></div>
                     </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                        <div class="header"><h2><b>AUDIT</b></h2></div>
                    <?php include"KPICharts/Audittab_chart.php";?>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                        <div class="header"><h2><b>TRAINING</b></h2></div>
                    <?php include"KPICharts/Trainingtab_chart.php";?>
                    </div>
                </div>
            </div>
            
        </div>

         

    <!--QUALITY INDICATOR END-->
    <!--AUDIT START-->
       <!--   <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   <div class="header"><h2><b>AUDIT</b></h2></div>
                    <?php //include"KPICharts/Audittab_chart.php";?>
                </div>
            </div>
        </div> -->
    <!--AUDIT END-->
    <!--TRAINIG START-->
        <!--  <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   <div class="header"><h2><b>TRAINING</b></h2></div>
                   <?php //include"KPICharts/Trainingtab_chart.php";?>
                </div>
            </div>
        </div> -->
    <!--TRAINIG END-->
    <!--REPORTSTART-->
         <!-- <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   <div class="header"><h2><b>REPORT</b></h2></div>
                     <?php //include"KPICharts/Reporttab_chart.php";?>
                </div>
            </div>
        </div> -->
    <!--REPORT END-->
 <div class="row clearfix">
          
             <div class="col-lg-4 col-md-4 col-sm-4">
                 <div class="header"><b>NABH FAQ'S STATUS</b></div>
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                      
                    <div>
                           
                                      
                                          <form method="post" enctype="multipart/form-data"  id="faq_apex">
                                    
                                        <div class="container">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->
<!-- Total(<span id="total_faq_apex">0</span>) <br>Q.I&nbsp;Completed(<span id="total_faq_qi_y_apex">0</span>)&nbsp;,&nbsp;Not-Completed(<span id="total_faq_qi_n_apex">0</span>)<br>HR&nbsp;Completed(<span id="total_faq_hr_y_apex">0</span>)&nbsp;,&nbsp;Not-Completed(<span id="total_faq_hr_n_apex">0</span>)
  -->                                              <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="                                                            show_faq_apex" id="show_faq_apex">FAQ’S FOR APEX MANUAL </button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal1" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR APEX MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_apex=array('Mission, Vision of the hospital?',
                                                                    'All statuaries completed and renewed',
                                                                    'MOM (Safety , Quality)','Emergency Codes');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_apex as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi1_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr1_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_apex">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_apex">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_apex">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_apex">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_apex">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_apex" class="btn btn-link waves-effect" id="action_apex">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>

                                                 <!-- <div style="float: right;" class="show_faq_apex" id="show_faq_apex"> -->
                                                     <table id="showtab" cellpadding="0" cellspacing="0" border="1" style=" text-align: center;border-color: 1px solid #B5B5B5;" width="300">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_apex"><?php echo $rowapex['total1'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_apex"><?php echo $rowcompqi['compqi'];?></span></td>
                                                            <td><span id="total_faq_qi_n_apex"><?php echo $rownotcompqi['notcompqi'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_apex"><?php echo $rowcomphr['comphr'];?></span></td>
                                                            <td><span id="total_faq_hr_n_apex"><?php echo $rownotcomphr['notcomphr'];?></span></td>
                                                         </tr>
                                                     </table>
                                                 <!-- </div> -->
                                     </div>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div>
                                      
                                   <form method="post" enctype="multipart/form-data"  id="faq_cqi">
                                    
                                        <div style="width: 800px;">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_cqi" id="show_faq_cqi">FAQ’S FOR CQI MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal2" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR CQI MANUAL</h4>
                                                      <button  type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    
                                                                    $data_cqi=array('QIP',
                                                                    'CQI presentation (QI)',
                                                                    'Raw data Collection Process','MOM( Quality Assurance committee)',
                                                                    'Finance for quality','Surveillance audit','Mock drill analysis form for emergency codes','MOM for all the committees ',
                                                                    ' Manuals control copy',' HIRA analysis report','Clinical audit','Training calendar'
                                                                );             
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ( $data_cqi as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi2_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr2_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_cqi">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_cqi">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_cqi">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_cqi">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_cqi">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_cqi" class="btn btn-link waves-effect" id="action_cqi">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                            </div>
                                        
                                        
                                        
                                                     <table id="showtab2" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_cqi"><?php echo $rowcqi['totalcqii'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_cqi"><?php echo $rowcompqicqi['compqicqi'];?></span></td>
                                                            <td><span id="total_faq_qi_n_cqi"><?php echo $rownotcompqicqi['notcompqicqi'];
                                                                                                                                        ?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_cqi"><?php echo $rowcomphrcqi['comphrcqi'];?></span></td>
                                                            <td><span id="total_faq_hr_n_cqi"><?php echo $rownotcomphrcqi['notcomphrcqi'];?></span></td>
                                                         </tr>
                                                     </table>
                                                 <!-- </div> -->
                                         
                                                                                    
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div>
                                      
                                   <form method="post" enctype="multipart/form-data"  id="faq_hic">
                                    
                                        <div  style="width: 800px;">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_hic" id="show_faq_hic">FAQ’S FOR HIC MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal3" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR HIC MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_hic=array('MOM',
                                                                    'Manual',
                                                                    'Training','Data collection record',
                                                                    'Cleaning and sterilization record','Visit  reports ( laundry, canteen )','HEPA Reports –OT / Maintenance','Fumigation records ',
                                                                    ' Display to be made in all the needed places','Pre prophylaxis record','Training barrier nursing',
                                                                    'PPE’s in all needed places','CSSD documentation (Manual)',
                                                                    'Validation Test – All indicators','Recall policy',
                                                                    'CSSD manual','BMW – guidelines and training',
                                                                    'Licenses','Collection & transportation Of BMW',' Weight record of BMW','Documents – fees / receipt/ report ','Availability of chemicals','MSDS sheets for chemicals used');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_hic as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi3_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr3_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_hic">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_hic">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_hic">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_hic">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_hic">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_hic" class="btn btn-link waves-effect" id="action_hic">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab3" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_hic"><?php echo $row5['totalhic'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_hic"><?php echo $rowcompqihic['compqihic'];?></span></td>
                                                            <td><span id="total_faq_qi_n_hic"><?php echo $rownotcompqihic['notcompqihic'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_hic"><?php echo $rowcomphrhic['comphrhic'];?></span></td>
                                                            <td><span id="total_faq_hr_n_hic"><?php echo $rownotcomphrhic['notcomphrhic'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

            
</div>




<!-- KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
                   
                  
     <div class="row clearfix">
           
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                      
                   <div>
                                 <form method="post" enctype="multipart/form-data"  id="faq_lab">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_lab" id="show_faq_lab">FAQ’S FOR LABORATORY MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal7" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR LABORATORY MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_lab=array('Manual','Quality Indicators',
                                                                        'Data for quality indicators','Training',
                                                                        ' PPE',' P&P for Sample requisition','P&P for Sample collection','P&P for safe transportation of sample',
                                                                        'P&P for  HIC practices','P&P for Critical alert',
                                                                        'P&P for reporting',
                                                                        'Register for TAT','Register for  Redo’s',
                                                                        'P&P for recall of report','P&P for informing Critical alert value','P&P for BMW – training display',
                                                                        'P&P for Disposal of specimen ','Antibiogram if asked','All departmental Registers','Cleaning protocol',
                                                                        'Register for  validation test','Quality assurance – External- reports','Calibration reports – BME','List of outsourced services','TAT for  outsourced ');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_lab as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi7_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr7_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_lab">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_lab">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_lab">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_lab">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_lab">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_lab" class="btn btn-link waves-effect" id="action_lab">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                       <table id="showtab7" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_lab"><?php echo $row9['totallab'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_lab"><?php echo $rowcompqilab['compqilab'];?></span></td>
                                                            <td><span id="total_faq_qi_n_lab"><?php echo $rownotcompqilab['notcompqilab'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_lab"><?php echo $rowcomphrlab['comphrlab'];?></span></td>
                                                            <td><span id="total_faq_hr_n_lab"><?php echo $rownotcomphrlab['notcomphrlab'];?></span></td>
                                                         </tr>
                                                     </table>                                 
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                          <div>
                                      
                                  <form method="post" enctype="multipart/form-data"  id="faq_rec">
                                    
                                        <div class="container">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq" id="show_faq">FAQ’S FOR FRONT OFFICE MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal5" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR FRONT OFFICE MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                           <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data=array('Mission, Vision Display',
                                                                    'Patients Right &responsibilities',
                                                                    'Quality Indicators',
                                                                    'Data Collection process for quality Indicators',
                                                                    'Tariff list','Scope of services','Services not available',
                                                                    ' P & P for registration IP/ OP','P & P for making appointment OP',
                                                                    ' P & P for Non availability of beds','P & P for discharge / DAMA / LAMA','P & P for transfer of patient','P & P for dispatching reports','P & P for using PA system for emergency codes' );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi5_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr5_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y">0</span></td>
                                                                                        <td><span id="total_faq_qi_n">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y">0</span></td>
                                                                                        <td><span id="total_faq_hr_n">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action" class="btn btn-link waves-effect" id="action">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab5" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq"><?php echo $row12['totalrec'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y"><?php echo $rowcompqirec['compqirec'];?></span></td>
                                                            <td><span id="total_faq_qi_n"><?php echo $rownotcompqirec['notcompqirec'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y"><?php echo $rowcomphrrec['comphrrec']; ?></span></td>
                                                            <td><span id="total_faq_hr_n"><?php echo $rownotcomphrrec['notcomphrrec'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                           
                             </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div>
                                 <form method="post" enctype="multipart/form-data"  id="faq_emergency">
                                    
                                        <div class="container">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_emergency" id="show_faq_emergency">FAQ’S FOR EMERGENCY MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal6" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR EMERGENCY MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                           <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_emergency=array('Mission Vision',' Patient Rights and responsibilities',
                                                                      'MLC procedure – records',' P & P for CPR','Scope of services',
                                                                      ' Services not available ','crash cart – register',' Emergency drugs',
                                                                      ' High risk drugs','BME record – history card of equipments','Instruments register','  Code blue mock drill',' Humidifier/ Oxygen supply','BMW segregation / guide line',
                                                                      'Triage','Criteria for stable and unstable patient',' Transfer procedure',
                                                                      ' P & P for Brought dead  patient','P & P for Ambulance  ',' DAMA','Vulnerable Patients',
                                                                      ' Patient identifier','Verbal order policy','Close monitoring for high risk drugs',
                                                                      ' Spill management ',' HIC practices',' Sample collection','Safe transfer to wards');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_emergency as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi6_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr6_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_emergency">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_emergency">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_emergency">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_emergency">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_emergency">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_emergency" class="btn btn-link waves-effect" id="action_emergency">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab6" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_emergency"><?php echo $row4['totalemr'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_emergency"><?php echo $rowcompqiemr['compqiemr'];?></span></td>
                                                            <td><span id="total_faq_qi_n_emergency"><?php echo $rownotcompqiemr['notcompqiemr'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_emergency"><?php echo $rowcomphremr['comphremr'];?></span></td>
                                                            <td><span id="total_faq_hr_n_emergency"><?php echo $rownotcomphremr['notcomphremr'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

            
</div>
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
<!-- KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
                   
                  
     <div class="row clearfix">
           
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                      
                   <div>
                                      
                                   <form method="post" enctype="multipart/form-data"  id="faq_safety">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_safety" id="show_faq_safety">FAQ’S FOR SAFETY MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal4" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR SAFETY MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_safety=array('Mock drills','MOM',
                                                                        'Manual','Fire  Training','Emergency codes – RED, BLUE, PINK, ORANGE, YELLOW','Training',' Fire NOC','Fire exit','Evacuation plan'
                                                                    );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_safety as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi4_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr4_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_safety">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_safety">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_safety">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_safety">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_safety">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_safety" class="btn btn-link waves-effect" id="action_safety">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                      <table id="showtab4" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_safety"><?php echo $row8['totalsafty'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_safety"><?php echo $rowcompqisafty['compqisafty'];?></span></td>
                                                            <td><span id="total_faq_qi_n_safety"><?php echo $rownotcompqisafty['notcompqisafty']; ?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_safety"><?php echo $rowcomphrsafty['comphrsafty']; ?></span></td>
                                                            <td><span id="total_faq_hr_n_safety"><?php echo $rownotcomphrsafty['notcomphrsafty'];?></span></td>
                                                         </tr>
                                                     </table>                                  
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                          <div>
                                 
                                <form method="post" enctype="multipart/form-data"  id="faq_radio">
                                    
                                        <div class="container">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_radio" id="show_faq_radio">FAQ’S FOR RADIOLOGY MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal8" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR RADIOLOGY MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                           <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_radio=array('Manual','Quality Indicators',
                                                                        'Data for quality indicators','Training Record',
                                                                        'PPE','P&P for Sample requisition','P&P for Sample collection',
                                                                        'P&P for safe transportation of sample','P&P for  HIC practices','P&P for Critical alert','P&P for reporting','Register for TAT','Register for  Redo’s',
                                                                        'P&P for recall of report',' P&P for informing Critical alert value','P&P for BMW – training display','All departmental Registers','Cleaning protocol','Quality assurance – External- reports',' Calibration reports – BME','List of outsourced services',' TAT for  outsourced ','Safety Training- RSO','Lead apron records',' TLD batches','   Record for TLD batches','ARBE certificates','RSO certificate','consents complete with SNDT'
                                                                );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ( $data_radio as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi8_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr8_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_radio">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_radio">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_radio">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_radio">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_radio">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_radio" class="btn btn-link waves-effect" id="action_radio">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab8" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_radio"><?php echo $row10['totalradio'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_radio"><?php echo $rowcompqiradio['compqiradio']; ?></span></td>
                                                            <td><span id="total_faq_qi_n_radio"><?php echo $rownotcompqiradio['notcompqiradio'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_radio"><?php echo $rowcomphrradio['comphrradio'];?></span></td>
                                                            <td><span id="total_faq_hr_n_radio"><?php echo $rownotcomphrradio['notcomphrradio'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div>
                                 
                                <form method="post" enctype="multipart/form-data"  id="faq_medicin">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_medicin" id="show_faq_medicin">FAQ’S FOR MEDICINE MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal9" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR MEDICINE MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_medicin=array('Manual','Quality Indicators',
                                                                        'Data for quality indicators','Training Record',
                                                                        'PPE',' Scope of services','Services not available ','    Verbal order policy','Stable & unstable patients criteria',
                                                                        'Crash cart','Emergency drugs','High risk drugs','BME record – history card of equipments',' Instruments register',
                                                                        ' Code blue mock drill','Humidifier/ Oxygen supply','BMW segregation / guideline','Vulnerable Patients','    Terminal cleaning record','Safe medication practices',
                                                                        'Barrier Nursing',' High risk medication verification medication ','Adverse drug events','Procedure for informed consent','Medical record  - consents complete with SNDT',
                                                                        'HIC procedures- hand washing, Sterilium,','Spill management ',
                                                                        ' Transfer procedure','Discharge procedure','Temperature control for fridge  3 times a day'
                                                                );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ( $data_medicin as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi9_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr9_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_medicin">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_medicin">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_medicin">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_medicin">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_medicin">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_medicin"" class="btn btn-link waves-effect" id="action_medicin"">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                 <table id="showtab9" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_medicin"><?php echo $row13['totalmed'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_medicin"><?php echo $rowcompqimed['compqimed'];?></span></td>
                                                            <td><span id="total_faq_qi_n_medicin"><?php echo $rownotcompqimed['notcompqimed'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_medicin"><?php echo $rowcomphrmed['comphrmed'];?></span></td>
                                                            <td><span id="total_faq_hr_n_medicin"><?php echo $rownotcomphrmed['notcomphrmed'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

            
</div>
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
<!-- KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
                   
                  
     <div class="row clearfix">
           
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                      
                   <div>
                                  <form method="post" enctype="multipart/form-data"  id="faq_icu">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_icu" id="show_faq_icu">FAQ’S FOR ICU MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal10" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR ICU MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_icu=array('Manual',
                                                                    'Patients Right &responsibilities',
                                                                    'Data for quality indicator',
                                                                    'Training Record',' PPE','Scope of services'
                                                                    ,
                                                                    'Services not available ',
                                                                    'Verbal order policy','Stable & unstable patients criteria',
                                                                    'Crash cart','Emergency drugs',' High risk drugs','BME record – HISTORY CARD OF EQUIPMENTS',' Instruments register',' Code blue mock drill','Humidifier/ Oxygen supply','BMW segregation / guideline','Vulnerable Patients','Terminal cleaning record','Safe medication practices',' Barrier Nursing','  High risk medication verification medication ','Adverse drug events',
                                                                    ' Procedure for informed consent','Medical record  - consents complete with SNDT','HIC procedures- hand washing, Sterilium, PPE','Spill management ','Transfer procedure','ICU admission  and Discharge criteria ','Bundle  care formats / display',
                                                                    'HIC protocol for ICU- Terminal register/ fumigation register',
                                                                    'End of life care ','Culture reports','Temperature control for fridge  3 times a day'
                                                                );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_icu as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi10_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr10_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_icu">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_icu">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_icu">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_icu">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_icu">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_icu" class="btn btn-link waves-effect" id="action_icu">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab10" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_icu"><?php echo $row11['totalicu'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_icu"><?php echo $rowcompqiicu['compqiicu'];?></span></td>
                                                            <td><span id="total_faq_qi_n_icu"><?php echo $rownotcompqiicu['notcompqiicu'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_icu"><?php echo $rowcomphricu['comphricu'];?></span></td>
                                                            <td><span id="total_faq_hr_n_icu"><?php echo $rownotcomphricu['notcomphricu'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                           <div>
                                  <form method="post" enctype="multipart/form-data"  id="faq_otnurse">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_otnurse" id="show_faq_otnurse">FAQ’S FOR OT, SURGERY AND ANESTHESIA MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal11" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR OT, SURGERY AND ANESTHESIA MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_otnurse=array('Manual',' Quality Indicators',
                                                                      'Data for quality indicator',' Training Record',
                                                                      'PPE','Scope of services','Services not available ',
                                                                      'HIC protocol – terminal cleaning/ fumigation record/chemicals used','HEPA filters- record',' Sterile equipment – checklist',
                                                                      'OT booking register','OT implant register',
                                                                      'Pressure/ temperature & humidity record','Zoning – without mixing ',' Cleaning of equipments','Culture reports',' Medical record- PAC completed/ Alderte’s scoring/ OT notes/ WHO checklist/ Post –       Operative plan/ consents complete with SNDT','Reuse policy','Temperature control for fridge  3 times a day');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_otnurse as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi11_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr11_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_otnurse">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_otnurse">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_otnurse">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_otnurse">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_otnurse">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_otnurse" class="btn btn-link waves-effect" id="action_otnurse">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                 <table id="showtab11" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_otnurse"><?php echo $row19['totalotnurse'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_otnurse"><?php echo $rowcompqiotnurse['compqiotnurse'];?></span></td>
                                                            <td><span id="total_faq_qi_n_otnurse"><?php echo $rownotcompqiotnurse['notcompqiotnurse'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_otnurse"><?php echo $rowcomphotnurse['comphrotnurse'];?></span></td>
                                                            <td><span id="total_faq_hr_n_otnurse"><?php echo $rownotcomphrotnurse['notcomphrotnurse'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div>
                                     <form method="post" enctype="multipart/form-data"  id="faq_nurse">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_nurse" id="show_faq_nurse">FAQ’S FOR NURSING DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal12" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR NURSING DEPARTMENT</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                           <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_nurse=array('Manual',
                                                                    'Patients Right &responsibilities',
                                                                    'Data for quality indicator',
                                                                    'Training Record',
                                                                    'Scope of services',
                                                                    'Services not available ',
                                                                    'HIC protocol – terminal cleaning/ fumigation record/chemicals used','Code blue mock drill','BMW segregation / guideline','Vulnerable Patients','Terminal cleaning record','Safe medication practices','Barrier Nursing','End of life care','High risk medication verification medication','Adverse drug events' ,'HIC procedures- hand washing, Sterilium, PPE','Spill management ','Transfer procedure','Hand hygiene practices ','Crash cart register','  Temperature control for fridge  3 times a day','Emergency Drugs register','High risk  Drug register');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_nurse as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi12_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr12_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_nurse">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_nurse">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_nurse">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_nurse">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_nurse">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_nurse" class="btn btn-link waves-effect" id="action_nurse">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab12" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_nurse"><?php echo $row18['totalnurse'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_nurse"><?php echo $rowcompqinurse['compqinurse'];?></span></td>
                                                            <td><span id="total_faq_qi_n_nurse"><?php echo $rownotcompqinurse['notcompqinurse'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_nurse"><?php echo $rowcomphnurse['comphrnurse'];?></span></td>
                                                            <td><span id="total_faq_hr_n_nurse"><?php echo $rownotcomphrnurse['notcomphrnurse'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

            
</div>
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
<!-- KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
                   
                  
     <div class="row clearfix">
           
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                      
                    <div>
                                     <form method="post" enctype="multipart/form-data"  id="faq_maintainance">
                                    
                                        <div class="container">

                                           

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_maintainance" id="show_faq_maintainance">FAQ’S FOR MAINTENANCE+HVAC, BME DEPARTMENT</button>

                                           
                                              <div class="modal fade" id="myModal14" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                 
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR MAINTENANCE+HVAC, BME DEPARTMENT</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>QI</th>
                                                                            <th>HR</th>
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_maintainance=array('Manual','Quality Indicators','Training Record','Scope of services',' Services not available','Preventive maintenance  plan /report','CMC','AMC',' History card update',' Daily rounds','Response time register',
                                                                        'Calibration reports','Equipment History Documents','Installation reports',
                                                                        'Procurement formats','End user training','Breakdown process','Condemnation Report',
                                                                        ' Asset coding',' List of equipments','Medical gases / safety / daily check','   Generator sets ( license , diesel storage )'


                                                                    );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_maintainance as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi13_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr13_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_maintainance">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_maintainance">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_maintainance">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_maintainance">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_maintainance">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_maintainance" class="btn btn-link waves-effect" id="action_maintainance">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                 <table id="showtab14" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray; ">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_maintainance"><?php echo $row17['totalmaintainance'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_maintainance"><?php echo $rowcompqimaintainance['compqimaintainance'];?></span></td>
                                                            <td><span id="total_faq_qi_n_maintainance"><?php echo $rownotcompqimaintainance['notcompqimaintainance'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_maintainance"><?php echo $rowcomphmaintainance['comphrmaintainance'];
?></span></td>
                                                            <td><span id="total_faq_hr_n_maintainance"><?php  echo $rownotcomphrmaintainance['notcomphrmaintainance'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>  
                    </div>
                </div>
            </div>
        </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                           <div>
                                     <form method="post" enctype="multipart/form-data"  id="faq_medical">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_medical" id="show_faq_medical">FAQ’S FOR MEDICAL RECORD DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal13" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR MEDICAL RECORD DEPARTMENTDEPARTMENT</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_medical=array('Manual','Quality Indicators',' Data for quality indicators',
                                                                        ' Security for MR','Fire safety for MR','Documents in MR','MOM (medical record review)',
                                                                        'Inward register','Outward register','File Requisition Form','Indent form','File tracker',
                                                                        ' 2 death files','2 MLC files','2 TPA files','2 discharge files','Checklist for documents','Trackers for the files','Retention policy'


                                                                    );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_medical as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi15_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr15_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_medical">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_medical">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_medical">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_medical">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_medical">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_medical" class="btn btn-link waves-effect" id="action_medical">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab13" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_medical"><?php echo $row16['totalmedical'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_medical"><?php echo $rowcompqimedical['compqimedical'];?></span></td>
                                                            <td><span id="total_faq_qi_n_medical"><?php echo $rownotcompqimedical['notcompqimedical'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_medical"><?php echo $rowcomphmedical ['comphrmedical'];?></span></td>
                                                            <td><span id="total_faq_hr_n_medical"><?php echo $rownotcomphrmedical ['notcomphrmedical'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div>
                                     <form method="post" enctype="multipart/form-data"  id="faq_store">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_store" id="show_faq_store">FAQ’S FOR STORES DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal16" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR STORES DEPARTMENT</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                           <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_store=array('Manual','MOM ( purchase & condemnation )',
                                                                        'Procurement procedure','GRN , receipts','FDA / approvals from / certifications of vendor','Indent formats','Quotations for various vendors','P & P to purchase','P& P for condemnation','P & P for Indent','Storage Policy (ABC or VED analysis)',' Storage of flammable (under lock & key)',
                                                                        'Consumption record (where ever possible)','Security ','MSDS sheets for chemicals used'

                                                                    );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach (  $data_store as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi16_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr16_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_store">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_store">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_store">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_store">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_store">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_store" class="btn btn-link waves-effect" id="action_store">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                 <table id="showtab16" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_store"><?php echo $row15['totalstore'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_store"><?php echo $rowcompqistore['compqistore'];?></span></td>
                                                            <td><span id="total_faq_qi_n_store"><?php echo $rownotcompqistore['notcompqistore'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_store"><?php echo $rowcomphstore ['comphrstore'];?></span></td>
                                                            <td><span id="total_faq_hr_n_store"><?php echo $rownotcomphrstore['notcomphrstore'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div> 
                    </div>
                </div>
            </div>
        </div>

            
</div>
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
<!-- KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
                   
                  
     <div class="row clearfix">
           
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                      
                    <div>
                                     <form method="post" enctype="multipart/form-data"  id="faq_cssd">
                                    
                                        <div class="container">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_cssd" id="show_faq_cssd">FAQ’S FOR CSSD DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal17" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR CSSD DEPARTMENT</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_cssd=array('Manual','HIC protocols',
                                                                        'Issuing register','List of Chemicals Used',
                                                                        ' P & P for cleaning','P & P for drying','P & P for packing',
                                                                        'P & P for issuing instruments','P & P for receiving instruments','P & P for Recall',' Register for  validation test',
                                                                        'Register for swab reports monthly','Cleaning protocol',
                                                                        'Hand hygiene procedure / display/ drying of hands','    Temperature control','MSDS sheets for chemicals used'

                                                                    );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_cssd as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi17_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr17_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_cssd">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_cssd">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_cssd">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_cssd">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_cssd">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_cssd" class="btn btn-link waves-effect" id="action_cssd">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                 <table id="showtab17" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_cssd"><?php echo $row3['totalcssd'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_cssd"><?php echo $rowcompqicssd['compqicssd'];?></span></td>
                                                            <td><span id="total_faq_qi_n_cssd"><?php echo $rownotcompqicssd['notcompqicssd'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_cssd"><?php echo $rowcomphrcssd['comphrcssd'];?></span></td>
                                                            <td><span id="total_faq_hr_n_cssd"><?php echo $rownotcomphrcssd['notcomphrcssd'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div> 
                    </div>
                </div>
            </div>
        </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                            <div>
                                     <form method="post" enctype="multipart/form-data"  id="faq_hr">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 300px;" type="button" class="btn btn-info btn-lg" class="show_faq_hr" id="show_faq_hr">FAQ’S FOR H. R. M DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal18" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR H. R. M DEPARTMENT</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                           <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                           
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_hr=array('Manual',' QI ','Data collection for QI',
                                                                        'Forms and formats','JD/JS',' Man power requisition format '
                                                                        ,' Application form','Interview  evaluation form','   Background verification form','Joining report form',
                                                                        'Declaration for criminal check',' Document checklist',
                                                                        'Credentialing an d privileging formats (doctors/ nurses)',
                                                                        'Training attendance sheet','Training feedback form',
                                                                        'Promotions increment format','Annual appraisal form',
                                                                        'Clearance form / Exit interview','2 employee file ( Doctor) ',
                                                                        ' 2 employee file (Nurse) ','2 employee file (Administration) ',
                                                                        '2 employee file (ICN) ',' 2 employee file (Housekeeping) ',
                                                                        ' 2 employee file (Security) ',' 2 employee file ( Any technician {1 pathology/ 1 radiology} ) ',' 1 RSO file (Dr. Bang)','Dietician / Physiotherapy file',' Employee rights & responsibility',' Leave policy','Late coming policy','P & P Grievance redressal ','MOM for Grievance redressal',' P & P for Promotions /increment','P & P for Credentialing and privileging','MOM for Credentialing and privileging','Training calendar ','Training record (attendance , feedback and questioner)','Pre health check up record','Immunization record'

                                                                    );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ( $data_hr as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi18_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr18_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_hr">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_hr">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_hr">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_hr">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_hr">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_hr" class="btn btn-link waves-effect" id="action_hr">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab18" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_hr"><?php echo $row7['totalhr'];
                                                                            ?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_hr"><?php echo $rowcompqihr['compqihr'];?></span></td>
                                                            <td><span id="total_faq_qi_n_hr"><?php echo $rownotcompqihr['notcompqihr'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_hr"><?php echo $rowcomphrhr['comphrhr'];?></span></td>
                                                            <td><span id="total_faq_hr_n_hr"><?php echo $rownotcomphrhr['notcomphrhr'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div> 
                    </div>
                </div>
            </div>
        </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div>
                                 <form method="post" enctype="multipart/form-data"  id="faq_pharmacy">
                                    
                                        <div class="container">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width:300px;" type="button" class="btn btn-info btn-lg" class="show_faq_pharmacy" id="show_faq_pharmacy">FAQ’S FOR PHARMACY DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal19" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR PHARMACY DEPARTMENT</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                           <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                           
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_pharmacy=array(' Manual','MOM','Licenses for pharmacy ',
                                                                    'Licenses for pharmacist ',' Licenses for narcotic drugs','Drug Formulary','LASA','High risk medication list' ,'High risk medication storage','Emergency drug list ','Emergency drug storage','Inventory management ( ABC analysis / VED analysis)','Narcotic drugs storage','Psychotropic medication','Temperature control 3 times a day','P & P for Recall ','P & P for Expiry medicine ','P & P for verification of high risk medication','P & P for procuring drugs (vendor selection , GRN receipt)','P & P for Implant procurement / cardiac stents ',' Scheduled X drugs list','List of prescription (H drugs)','Antibiotic policy');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_pharmacy as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi19_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr19_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_pharmacy">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_pharmacy">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_pharmacy">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_pharmacy">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_pharmacy">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_pharmacy" class="btn btn-link waves-effect" id="action_pharmacy">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                 <table id="showtab19" cellpadding="0" cellspacing="0" border="1" width="300" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_pharmacy"><?php echo $row14['totalphar'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_pharmacy"><?php echo $rowcompqiphar['compqiphar'];?></span></td>
                                                            <td><span id="total_faq_qi_n_pharmacy"><?php echo $rownotcompqiphar['notcompqiphar'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_pharmacy"><?php echo $rowcomphphar['comphrphar'];?></span></td>
                                                            <td><span id="total_faq_hr_n_pharmacy"><?php echo $rownotcomphrphar['notcomphrphar'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

            
</div>
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
<!-- KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
   
   
   
   
                   
                  
     <div class="row clearfix">
           
           

            
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div>
                                 <form method="post" enctype="multipart/form-data"  id="faq_house">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width:300px;" type="button" class="btn btn-info btn-lg" class="show_faq_house" id="show_faq_house">FAQ’S FOR HOUSE KEEPING DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal20" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR HOUSE KEEPING DEPARTMENT</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_house=array(' Manual','Availability of PPE',
                                                                        'MSPB certificate','BMW rules Segregation',
                                                                        'Collection transport ( closed trolley )',
                                                                        'Fees / receipt/reports ','Weight record for waste generated ',
                                                                        ' Register for weight',' Register for waste sent out',
                                                                        'Availability of Material for cleaning','Availability of MSDS sheets','Schedule of cleaning',' Clean Mops / brooms (plastic)',
                                                                        ' Training records – BMW rules','Spill management');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_house as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi20_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr20_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_house">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_house">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_house">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_house">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_house">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_house" class="btn btn-link waves-effect" id="action_house">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab20" cellpadding="0" cellspacing="0" width="300" border="1" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_house"><?php echo $row6['totalhouse']; ?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_house"><?php echo $rowcompqihouse['compqihouse'];?></span></td>
                                                            <td><span id="total_faq_qi_n_house"><?Php echo $rownotcompqihouse['notcompqihouse'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_house"><?php echo $rowcomphrhouse['comphrhouse'];?></span></td>
                                                            <td><span id="total_faq_hr_n_house"><?php echo $rownotcomphrhouse['notcomphrhouse'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once("AllFAQ1.php");?>     
</div>
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->


<?php 

$chapterArray=array( 
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 1') ,
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 2')  ,
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 3'),
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 4'),
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 5') ,
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 6') ,
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 7')  ,
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 8'),
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 9'),
             array('status'=>'Under Complication',
                    'remark'=>'....',
                    'name'=>'Chapter 10') 

         );

?>


<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header" align="center">
                        <h2> Assesment Tool Kit </h2>
</div></div>
</div>
<div class="row clearfix">

    <?php foreach ($chapterArray as $key => $value) { ?>
       


                <!-- Radar Chart -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            
                            <div class="body" style="height: 100%">
                              <div id="con_chapter<?=$key?>" style="width: 100%;height: 200px;  margin: 0 auto"></div>  
                                 <ul class="basic-list">
                            <li>Status <span class="label-danger label"><?=$value['status']?></span></li>
                            <li>Remark <span class="label-purple label"><?=$value['remark']?></span></li>
                            
                        </ul>
                            </div>
                        </div>
                    </div>
       <?php } ?>             
</div>
<?php include('assement_tool_chart/call_chart.php');?>

  <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Hospital Survey</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="line_chart" height="70"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="../assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js --> 
<script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="../assets/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js --> 

<script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="../assets/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js --> 
<script src="../assets/js/pages/index.js"></script>
<script src="../assets/js/pages/charts/sparkline.min.js"></script>
</body>

<script type="text/javascript">

 $(document).on('submit', '#faq_apex', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_apex").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_apex.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_apex').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_apex.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                    console.log();
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi1_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr1_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        
                        $('#total_faq_apex').html(total);
                        $('#total_faq_hr_y_apex').html(hr_y);
                        $('#total_faq_hr_n_apex').html(hr_n);
                        $('#total_faq_qi_y_apex').html(qi_y);
                        $('#total_faq_qi_n_apex').html(qi_n);

                        var row = document.getElementById("showtab").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;


                    // $('#action').val("Update Details");
                    $('#myModal1').modal('show');                   
                    
                }
            })
        });
 </script>
 
<script type="text/javascript">
 $(document).on('submit', '#faq_cqi', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_cqi").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_cqi.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_cqi').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_cqi.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi2_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr2_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_cqi').html(total);
                        $('#total_faq_hr_y_cqi').html(hr_y);
                        $('#total_faq_hr_n_cqi').html(hr_n);
                        $('#total_faq_qi_y_cqi').html(qi_y);
                        $('#total_faq_qi_n_cqi').html(qi_n);

                          var row = document.getElementById("showtab2").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;


                    // $('#action').val("Update Details");
                    $('#myModal2').modal('show');                   
                    
                }
            })
        });
 </script>
<script type="text/javascript">
 $(document).on('submit', '#faq_hic', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_hic").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_hic.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_hic').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_hic.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi3_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr3_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        
                        $('#total_faq_hic').html(total);
                        $('#total_faq_hr_y_hic').html(hr_y);
                        $('#total_faq_hr_n_hic').html(hr_n);
                        $('#total_faq_qi_y_hic').html(qi_y);
                        $('#total_faq_qi_n_hic').html(qi_n);


                         var row = document.getElementById("showtab3").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;

                    // $('#action').val("Update Details");
                    $('#myModal3').modal('show');                   
                    
                }
            })
        });
 </script>
<script type="text/javascript">
 $(document).on('submit', '#faq_safety', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_safety").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_safety.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_safety').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_safety.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi4_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr4_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_safety').html(total);
                        $('#total_faq_hr_y_safety').html(hr_y);
                        $('#total_faq_hr_n_safety').html(hr_n);
                        $('#total_faq_qi_y_safety').html(qi_y);
                        $('#total_faq_qi_n_safety').html(qi_n);

                         var row = document.getElementById("showtab4").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;


                    // $('#action').val("Update Details");
                    $('#myModal4').modal('show');                   
                    
                }
            })
        });
 </script>

<script type="text/javascript">
 $(document).on('submit', '#faq_rec', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_rec.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_single_faq.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi5_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr5_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq').html(total);
                        $('#total_faq_hr_y').html(hr_y);
                        $('#total_faq_hr_n').html(hr_n);
                        $('#total_faq_qi_y').html(qi_y);
                        $('#total_faq_qi_n').html(qi_n);



                          var row = document.getElementById("showtab5").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;
                    // $('#action').val("Update Details");
                    $('#myModal5').modal('show');                   
                    
                }
            })
        });
 </script>

 <script type="text/javascript">
 $(document).on('submit', '#faq_emergency', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_emergency").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_emergency.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_emergency').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_emergency.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi6_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr6_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_emergency').html(total);
                        $('#total_faq_hr_y_emergency').html(hr_y);
                        $('#total_faq_hr_n_emergency').html(hr_n);
                        $('#total_faq_qi_y_emergency').html(qi_y);
                        $('#total_faq_qi_n_emergency').html(qi_n);


                          var row = document.getElementById("showtab6").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;

                    // $('#action').val("Update Details");
                    $('#myModal6').modal('show');                   
                    
                }
            })
        });
 </script>

 <script type="text/javascript">
 $(document).on('submit', '#faq_lab', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_lab").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_lab.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_lab').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_lab.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi7_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr7_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        $('#total_faq_lab').html(total);
                        $('#total_faq_hr_y_lab').html(hr_y);
                        $('#total_faq_hr_n_lab').html(hr_n);
                        $('#total_faq_qi_y_lab').html(qi_y);
                        $('#total_faq_qi_n_lab').html(qi_n);


                          var row = document.getElementById("showtab7").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;
                    // $('#action').val("Update Details");
                    $('#myModal7').modal('show');                   
                    
                }
            })
        });
 </script>

 <script type="text/javascript">
 $(document).on('submit', '#faq_radio', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_radio").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_radio.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_radio').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_radio.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi8_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr8_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_radio').html(total);
                        $('#total_faq_hr_y_radio').html(hr_y);
                        $('#total_faq_hr_n_radio').html(hr_n);
                        $('#total_faq_qi_y_radio').html(qi_y);
                        $('#total_faq_qi_n_radio').html(qi_n);

                          var row = document.getElementById("showtab8").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;


                    // $('#action').val("Update Details");
                    $('#myModal8').modal('show');                   
                    
                }
            })
        });
 </script>

 <script type="text/javascript">
 $(document).on('submit', '#faq_medicin', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_medicin").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_medicin.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_medicin').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_medicin.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi9_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr9_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_medicin').html(total);
                        $('#total_faq_hr_y_medicin').html(hr_y);
                        $('#total_faq_hr_n_medicin').html(hr_n);
                        $('#total_faq_qi_y_medicin').html(qi_y);
                        $('#total_faq_qi_n_medicin').html(qi_n);


                          var row = document.getElementById("showtab9").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;

                    // $('#action').val("Update Details");
                    $('#myModal9').modal('show');                   
                    
                }
            })
        });
 </script>

 <script type="text/javascript">
faq_icu
 $(document).on('submit', '#faq_icu', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_icu").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_icu.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_icu').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_icu.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi10_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr10_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_icu').html(total);
                        $('#total_faq_hr_y_icu').html(hr_y);
                        $('#total_faq_hr_n_icu').html(hr_n);
                        $('#total_faq_qi_y_icu').html(qi_y);
                        $('#total_faq_qi_n_icu').html(qi_n);


                          var row = document.getElementById("showtab10").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;

                    // $('#action').val("Update Details");
                    $('#myModal10').modal('show');                   
                    
                }
            })
        });
 </script>
 <script type="text/javascript">
 $(document).on('submit', '#faq_otnurse', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_otnurse").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_otnurse.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_otnurse').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_otnurse.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi11_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr11_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_otnurse').html(total);
                        $('#total_faq_hr_y_otnurse').html(hr_y);
                        $('#total_faq_hr_n_otnurse').html(hr_n);
                        $('#total_faq_qi_y_otnurse').html(qi_y);
                        $('#total_faq_qi_n_otnurse').html(qi_n);
                          var row = document.getElementById("showtab11").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;



                    // $('#action').val("Update Details");
                    $('#myModal11').modal('show');                   
                    
                }
            })
        });
 </script>
 <script type="text/javascript">
 $(document).on('submit', '#faq_nurse', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_nurse").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_nurse.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_nurse').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_nurse.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi12_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr12_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        $('#total_faq_nurse').html(total);
                        $('#total_faq_hr_y_nurse').html(hr_y);
                        $('#total_faq_hr_n_nurse').html(hr_n);
                        $('#total_faq_qi_y_nurse').html(qi_y);
                        $('#total_faq_qi_n_nurse').html(qi_n);
                          var row = document.getElementById("showtab12").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;


                    // $('#action').val("Update Details");
                    $('#myModal12').modal('show');                   
                    
                }
            })
        });
 </script>
 <script type="text/javascript">
 $(document).on('submit', '#faq_medical', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_medical").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_medical.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_medical').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_medical.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi13_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr13_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        $('#total_faq_medical').html(total);
                        $('#total_faq_hr_y_medical').html(hr_y);
                        $('#total_faq_hr_n_medical').html(hr_n);
                        $('#total_faq_qi_y_medical').html(qi_y);
                        $('#total_faq_qi_n_medical').html(qi_n);


                          var row = document.getElementById("showtab13").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;
                    // $('#action').val("Update Details");
                    $('#myModal13').modal('show');                   
                    
                }
            })
        });
 </script>

 <script type="text/javascript">
 $(document).on('submit', '#faq_maintainance', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_maintainance").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_maintainance.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_maintainance').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_maintainance.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi14_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr14_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        $('#total_faq_maintainance').html(total);
                        $('#total_faq_hr_y_maintainance').html(hr_y);
                        $('#total_faq_hr_n_maintainance').html(hr_n);
                        $('#total_faq_qi_y_maintainance').html(qi_y);
                        $('#total_faq_qi_n_maintainance').html(qi_n);

                          var row = document.getElementById("showtab14").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;

                    // $('#action').val("Update Details");
                    $('#myModal14').modal('show');                   
                    
                }
            })
        });
 </script>


 <script type="text/javascript">
 $(document).on('submit', '#faq_store', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_store").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_store.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_store').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_store.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi16_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr16_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        $('#total_faq_store').html(total);
                        $('#total_faq_hr_y_store').html(hr_y);
                        $('#total_faq_hr_n_store').html(hr_n);
                        $('#total_faq_qi_y_store').html(qi_y);
                        $('#total_faq_qi_n_store').html(qi_n);
                          var row = document.getElementById("showtab16").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;


                    // $('#action').val("Update Details");
                    $('#myModal16').modal('show');                   
                    
                }
            })
        });
 </script>

  <script type="text/javascript">
 $(document).on('submit', '#faq_cssd', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_cssd").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_cssd.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_cssd').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_cssd.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi17_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr17_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        $('#total_faq_cssd').html(total);
                        $('#total_faq_hr_y_cssd').html(hr_y);
                        $('#total_faq_hr_n_cssd').html(hr_n);
                        $('#total_faq_qi_y_cssd').html(qi_y);
                        $('#total_faq_qi_n_cssd').html(qi_n);

                          var row = document.getElementById("showtab17").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;

                    // $('#action').val("Update Details");
                    $('#myModal17').modal('show');                   
                    
                }
            })
        });
 </script>
 <script type="text/javascript">
 $(document).on('submit', '#faq_hr', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_hr").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_hr.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_hr').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_hr.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi18_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr18_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_hr').html(total);
                        $('#total_faq_hr_y_hr').html(hr_y);
                        $('#total_faq_hr_n_hr').html(hr_n);
                        $('#total_faq_qi_y_hr').html(qi_y);
                        $('#total_faq_qi_n_hr').html(qi_n);

                          var row = document.getElementById("showtab18").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;



                    // $('#action').val("Update Details");
                    $('#myModal18').modal('show');                   
                    
                }
            })
        });
 </script>
 <script type="text/javascript">
 $(document).on('submit', '#faq_pharmacy', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_pharmacy").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_pharmacy.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_pharmacy').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_pharmacy.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi19_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr19_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_pharmacy').html(total);
                        $('#total_faq_hr_y_pharmacy').html(hr_y);
                        $('#total_faq_hr_n_pharmacy').html(hr_n);
                        $('#total_faq_qi_y_pharmacy').html(qi_y);
                        $('#total_faq_qi_n_pharmacy').html(qi_n);

                          var row = document.getElementById("showtab19").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;


                    // $('#action').val("Update Details");
                    $('#myModal19').modal('show');                   
                    
                }
            })
        });
 </script>
 <script type="text/javascript">
 $(document).on('submit', '#faq_house', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_house").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_house.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_house').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_house.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi20_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr20_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_house').html(total);
                        $('#total_faq_hr_y_house').html(hr_y);
                        $('#total_faq_hr_n_house').html(hr_n);
                        $('#total_faq_qi_y_house').html(qi_y);
                        $('#total_faq_qi_n_house').html(qi_n);


                          var row = document.getElementById("showtab20").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;

                    // $('#action').val("Update Details");
                    $('#myModal20').modal('show');                   
                    
                }
            })
        });
 </script>
 
</html>