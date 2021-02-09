

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
 
  
 
</head>
<body>

 
                               
<table class="custom-table"  cellspacing="0" cellpadding="0" border="1" width="400px"  style="border-color: #9DA2E2; text-align: center;" >
                                            <tr style="background-color: #9DA2E2;">
                                            	<td>&nbsp;</td>
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
                          $tbl1 = array( array("tbl_huf","huf_dadm", "(huf_ddd='Discharge' AND huf_ddd!='')","(huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd='')"),
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
                          $total1 = 0;
                          $comp1 =0;
                          $notcomp1=0;
                          foreach ($tbl1 as $tval1) {
                             // print_r($tval);
                            $qry1 = "SELECT count(*) as total1 from $tval1[0] WHERE year($tval1[1]) = '$yr'";
                            $res1 = mysqli_query($connect, $qry1);
                            $row1=mysqli_fetch_assoc($res1);
                            $total1 = $total1 + $row1['total1'];

                            $qrycomp1 = "SELECT COUNT(*) as comp1 FROM $tval1[0] WHERE $tval1[2] AND year($tval1[1]) = '$yr'";
                            $rescomp1 = mysqli_query($connect, $qrycomp1);
                            $rowcomp1=mysqli_fetch_assoc($rescomp1);
                            $comp1=$comp1+$rowcomp1['comp1'];

                            $qrynotcomp1 = "SELECT COUNT(*) as notcomp1 FROM $tval1[0] WHERE $tval1[3] AND year($tval1[1]) = '$yr'";
                            $resnotcomp1 = mysqli_query($connect, $qrynotcomp1);
                            $rownotcomp1=mysqli_fetch_assoc($resnotcomp1);
                            $notcomp1=$notcomp1+$rownotcomp1['notcomp1'];



                          }
                          

                            
                             

                          ?>

                          						<td>Quality Indicator</td>
                                               <td style="font-weight: bold;color: black;" ><?php echo $total1;?></td>
                                               <td style="font-weight: bold;color: green;"><?php echo $comp1;?></td>
                                               <td style="font-weight: bold;color: red;"><?php echo $notcomp1;?></td>
                                                
                                            </tr>
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
                          $tbl2 = array( array("tbl_death_audit","date_death", "cause_of_death!=''","cause_of_death=''"),
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

                          $total2 = 0;
                          $comp2 =0;
                          $notcomp2=0;
                          foreach ($tbl2 as $tval2) {
                             // print_r($tval);
                            $qry2 = "SELECT count(*) as total2 from $tval2[0] WHERE year($tval2[1]) = '$yr'";
                            $res2 = mysqli_query($connect, $qry2);
                            $row2=mysqli_fetch_assoc($res2);
                            $total2 = $total2 + $row2['total2'];

                            $qrycomp2 = "SELECT COUNT(*) as comp2 FROM $tval2[0] WHERE $tval2[2] AND year($tval2[1]) = '$yr'";
                            $rescomp2 = mysqli_query($connect, $qrycomp2);
                            $rowcomp2=mysqli_fetch_assoc($rescomp2);
                            $comp2=$comp2+$rowcomp2['comp2'];

                            $qrynotcomp2 = "SELECT COUNT(*) as notcomp2 FROM $tval2[0] WHERE $tval2[3] AND year($tval2[1]) = '$yr'";
                            $resnotcomp2 = mysqli_query($connect, $qrynotcomp2);
                            $rownotcomp2=mysqli_fetch_assoc($resnotcomp2);
                            $notcomp2=$notcomp2+$rownotcomp2['notcomp2'];



                          }
                          

                            
                             

                          ?>

                                            <tr>

                          						<td>Audit</td>
                                               <td style="font-weight: bold;color: black;" ><?php echo $total2;?></td>
                                               <td style="font-weight: bold;color: green;"><?php echo $comp2;?></td>
                                               <td style="font-weight: bold;color: red;"><?php echo $notcomp2;?></td>
                                            	
                                            </tr>
                                             
                                            <tr>

                          						<td>Training</td>
                                               <td style="font-weight: bold;color: black;" ><?php echo $total1;?></td>
                                               <td style="font-weight: bold;color: green;"><?php echo $comp1;?></td>
                                               <td style="font-weight: bold;color: red;"><?php echo $notcomp1;?></td>
                                            	
                                            </tr>

                                            <tr>

                          						<td style="background-color: #9DA2E2;color: white;">All Total</td>
                                               <td style="font-weight: bold;color: blue;background-color: #9DA2E2;" ><?php echo $total1+$total2+$total1;?></td>
                                               <td style="font-weight: bold;color: green;background-color: #9DA2E2;"><?php echo $comp1+$comp2+$comp1;?></td>
                                               <td style="font-weight: bold;color: red;background-color: #9DA2E2;"><?php echo $notcomp1+$notcomp2+$notcomp1;?></td>
                                            	
                                            </tr>
                                              
                                        </table>

                                   </body>
 
</html>