<?php
                        

                          include('dbinfo.php');

                          $tbl= array( array("tbl_faq_emergency","qi='1'", "qi=''","hr='1'","hr='1'","hr=''"));

                                                    $totalemr= 0;
                                                    $compqiemr =0;
                                                    $notcompqiemr=0;
                                                    $comphremr =0;
                                                    $notcomphremr=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry4 = "SELECT COUNT(*) as totalemr FROM $tval[0]";
                                                            $res4= mysqli_query($connect, $qry4);
                                                            $row4=mysqli_fetch_assoc($res4);
                                                            echo $row4['totalemr'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqiemr  = "SELECT COUNT(*) as compqiemr  FROM $tval[0] where $tval[1]";
                                                            $rescompqiemr = mysqli_query($connect, $qrycompqiemr);
                                                            $rowcompqiemr =mysqli_fetch_assoc($rescompqiemr);
                                                           echo $rowcompqiemr['compqiemr'];

                                                            $qrynotcompqiemr = "SELECT COUNT(*) as notcompqiemr  FROM $tval[0] where $tval[2]";
                                                            $resnotcompqiemr  = mysqli_query($connect, $qrynotcompqiemr );
                                                            $rownotcompqiemr =mysqli_fetch_assoc($resnotcompqiemr );
                                                           echo $rownotcompqiemr['notcompqiemr'];

                                                            $qrycomphremr  = "SELECT COUNT(*) as comphremr  FROM $tval[0] where $tval[3]";
                                                            $rescomphremr  = mysqli_query($connect, $qrycomphremr );
                                                            $rowcomphremr =mysqli_fetch_assoc($rescomphremr );
                                                           echo $rowcomphremr['comphremr'];

                                                            $qrynotcomphremr  = "SELECT COUNT(*) as notcomphremr  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphremr = mysqli_query($connect, $qrynotcomphremr );
                                                            $rownotcomphremr=mysqli_fetch_assoc($resnotcomphremr);
                                                            echo $rownotcomphremr['notcomphremr'];
                                                            

                                                        }

                                                    

                             

 ?>


