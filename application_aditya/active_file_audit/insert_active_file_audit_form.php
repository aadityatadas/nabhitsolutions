<?php
session_start();
include('../dbinfo.php');
$ses = $_SESSION['login'];

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{

	

	$user_id = $_POST['user_id'];
    $p_name = $_POST['p_name'];
    $uhid_no = $_POST['uhid_no'];
    $ipd_no = $_POST['ipd_no'];
    // $d_adm = $_POST['d_adm'];

    $dIEfrm_dt_arvl_patnt_date  =  $_POST['dIEfrm_dt_arvl_patnt_date'];
$dIEfrm_dt_arvl_patnt_time  =  $_POST['dIEfrm_dt_arvl_patnt_time'];
  //  $dIEfrm_dt_arvl_patnt_time="jlk";
$dIEfrm_dt_ia_cmplt_date  =  $_POST['dIEfrm_dt_ia_cmplt_date'];
$dIEfrm_dt_ia_cmplt_time  =  $_POST['dIEfrm_dt_ia_cmplt_time'];
$dIEfrm_pa_ass_scr  =  $_POST['dIEfrm_pa_ass_scr'];
$dIEfrm_gsc_scr  =  $_POST['dIEfrm_gsc_scr'];
$dIEfrm_histry  =  $_POST['dIEfrm_histry'];
$dIEfrm_vital  =  $_POST['dIEfrm_vital'];
$dIEfrm_vital_remarks  =  $_POST['dIEfrm_vital_remarks'];
$dcp_sign  =  $_POST['dcp_sign'];
$dcp_name  =  $_POST['dcp_name'];
$dcp_date  =  $_POST['dcp_date'];
$dcp_time  =  $_POST['dcp_time'];
$dcp_remarks  =  $_POST['dcp_remarks'];
$dn_sign  =  $_POST['dn_sign'];
$dn_name  =  $_POST['dn_name'];
$dn_date  =  $_POST['dn_date'];
$dn_time  =  $_POST['dn_time'];
$dn_vital  =  $_POST['dn_vital'];
$dn_pa_ass_scr  =  $_POST['dn_pa_ass_scr'];
$dn_remarks  =  $_POST['dn_remarks'];
$nas_sign  =  $_POST['nas_sign'];
$nas_name   =  $_POST['nas_name'];
$nas_date   =  $_POST['nas_date'];
$nas_time   =  $_POST['nas_time'];
$nas_date_arv_ptnt   =  $_POST['nas_date_arv_ptnt'];
$nas_time_arv_ptnt   =  $_POST['nas_time_arv_ptnt'];
$nas_date_ia_cmplt   =  $_POST['nas_date_ia_cmplt'];
$nas_time_ia_cmplt   =  $_POST['nas_time_ia_cmplt'];
$nas_pan_ass_scr   =  $_POST['nas_pan_ass_scr'];
//$nas_pan_ass_scr="jlkj";
$nas_vital   =  $_POST['nas_vital'];
$nas_morse_fall_scale   =  $_POST['nas_morse_fall_scale'];
$nas_remarks   =  $_POST['nas_remarks'];
$ncp_sign   =  $_POST['ncp_sign'];
$ncp_name   =  $_POST['ncp_name'];
$ncp_date   =  $_POST['ncp_date'];
$ncp_time   =  $_POST['ncp_time'];
$ncp_remarks   =  $_POST['ncp_remarks'];
$nps_sign   =  $_POST['nps_sign'];
$nps_name   =  $_POST['nps_name'];
$nps_date   =  $_POST['nps_date'];
$nps_time   =  $_POST['nps_time'];
$nps_handovr_tkn_by_from   =  $_POST['nps_handovr_tkn_by_from'];
$nps_remarks   =  $_POST['nps_remarks'];
$nuAss_sign   =  $_POST['nuAss_sign'];
$nuAss_name   =  $_POST['nuAss_name'];
$nuAss_date   =  $_POST['nuAss_date'];
$nuAss_time   =  $_POST['nuAss_time'];
$nuAss_remarks   =  $_POST['nuAss_remarks'];
$phys_ass_sign   =  $_POST['phys_ass_sign'];
$phys_ass_name   =  $_POST['phys_ass_name'];
$phys_ass_date   =  $_POST['phys_ass_date'];
$phys_ass_time   =  $_POST['phys_ass_time'];
$phys_ass_remarks   =  $_POST['phys_ass_remarks'];
$medictin_chrt_in_caps   =  $_POST['medictin_chrt_in_caps'];
$medictin_chrt_sign   =  $_POST['medictin_chrt_sign'];
$medictin_chrt_name   =  $_POST['medictin_chrt_name'];
$medictin_chrt_date   =  $_POST['medictin_chrt_date'];
$medictin_chrt_time   =  $_POST['medictin_chrt_time'];
$medictin_chrt_risk_vrfd   =  $_POST['medictin_chrt_risk_vrfd'];
$medictin_chrt_remarks   =  $_POST['medictin_chrt_remarks'];
$invstigation_sheet  =  $_POST['invstigation_sheet'];
$btCsnt_name  =  $_POST['btCsnt_name'];
$btCsnt_sign  =  $_POST['btCsnt_sign'];
$btCsnt_date  =  $_POST['btCsnt_date'];
$btCsnt_time  =  $_POST['btCsnt_time'];
$btCsnt_remarks  =  $_POST['btCsnt_remarks'];
$resCsnt_name  =  $_POST['resCsnt_name'];
$resCsnt_sign  =  $_POST['resCsnt_sign'];
$resCsnt_date  =  $_POST['resCsnt_date'];
$resCsnt_time  =  $_POST['resCsnt_time'];
$resCsnt_remarks  =  $_POST['resCsnt_remarks'];
$pCsnt_name  =  $_POST['pCsnt_name'];
$pCsnt_sign  =  $_POST['pCsnt_sign'];
$pCsnt_date  =  $_POST['pCsnt_date'];
$pCsnt_time  =  $_POST['pCsnt_time'];
$pCsnt_remarks  =  $_POST['pCsnt_remarks'];
$hivCsnt_name  =  $_POST['hivCsnt_name'];
$hivCsnt_sign  =  $_POST['hivCsnt_sign'];
$hivCsnt_date  =  $_POST['hivCsnt_date'];
$hivCsnt_time  =  $_POST['hivCsnt_time'];
$hivCsnt_remarks  =  $_POST['hivCsnt_remarks'];
$bcl_cather_frm  =  $_POST['bcl_cather_frm'];
$bcl_ventr_frm  =  $_POST['bcl_ventr_frm'];
$bcl_line_frn  =  $_POST['bcl_line_frn'];
$bcl_ssl_pvnt_frm  =  $_POST['bcl_ssl_pvnt_frm'];
$btmf_s_e_time  =  $_POST['btmf_s_e_time'];
$btmf_s_e_date  =  $_POST['btmf_s_e_date'];
$btmf_sign  =  $_POST['btmf_sign'];
$btmf_name  =  $_POST['btmf_name'];
$btmf_date  =  $_POST['btmf_date'];
$btmf_time  =  $_POST['btmf_time'];
$btmf_vital  =  $_POST['btmf_vital'];
$btmf_remarks  =  $_POST['btmf_remarks'];
$dmc_vital  =  $_POST['dmc_vital'];
$dmc_ressmnt_scr  =  $_POST['dmc_ressmnt_scr'];
$intak_opt  =  $_POST['intak_opt'];
$movmnt_sheet  =  $_POST['movmnt_sheet'];
$restrn_frm  =  $_POST['restrn_frm'];
$patnt_rigt_res_frm  =  $_POST['patnt_rigt_res_frm'];
$patnt_f_e_chrt  =  $_POST['patnt_f_e_chrt'];
$esti_frm  =  $_POST['esti_frm'];
$s_c_sign  =  $_POST['s_c_sign'];
$s_c_name  =  $_POST['s_c_name'];
$s_c_date  =  $_POST['s_c_date'];
$s_c_time  =  $_POST['s_c_time'];
$s_c_remarks  =  $_POST['s_c_remarks'];
$a_c_sign  =  $_POST['a_c_sign'];
$a_c_name  =  $_POST['a_c_name'];
$a_c_date  =  $_POST['a_c_date'];
$a_c_time  =  $_POST['a_c_time'];
$a_c_remarks  =  $_POST['a_c_remarks'];
$pac  =  $_POST['pac'];
$anasthsia_care_plan  =  $_POST['anasthsia_care_plan'];
$pr_optv_chcklst  =  $_POST['pr_optv_chcklst'];
$anasthsia_sfty_chcklst  =  $_POST['anasthsia_sfty_chcklst'];
$surgn_sign  =  $_POST['surgn_sign'];
$surgn_name  =  $_POST['surgn_name'];
$surgn_date  =  $_POST['surgn_date'];
$surgn_time  =  $_POST['surgn_time'];
$surgn_remarks  =  $_POST['surgn_remarks'];
$anast_sign  =  $_POST['anast_sign'];
$anast_name  =  $_POST['anast_name'];
$anast_date  =  $_POST['anast_date'];
$anast_time  =  $_POST['anast_time'];
$anast_remarks  =  $_POST['anast_remarks'];
$nurse_sign  =  $_POST['nurse_sign'];
$nurse_name  =  $_POST['nurse_name'];
$nurse_date  =  $_POST['nurse_date'];
$nurse_time  =  $_POST['nurse_time'];
$nurse_remarks  =  $_POST['nurse_remarks'];
$anaeshts_chart  =  $_POST['anaeshts_chart'];
$intraptv_mon_rcrd  =  $_POST['intraptv_mon_rcrd'];
$anaeshts_chart1  =  $_POST['anaeshts_chart1'];
$pst_anaeshts_mgmt  =  $_POST['pst_anaeshts_mgmt'];
$opertv_notes  =  $_POST['opertv_notes'];


   
   
   
		// $dt1 = mysqli_real_escape_string($connect, $srt);
		// $dtt1 = mysqli_real_escape_string($connect, $srtt);
		// $dt2 = mysqli_real_escape_string($connect, $dateofreportgeneration);
		// $dtt2 = mysqli_real_escape_string($connect, $timeofreportgeneration);
		
		
		// $dt3 = $dt1.''.$dtt1;
		// $dt4 = $dt2.''.$dtt2;
		// $ResultTD = $ResultDate.''.$ResultTime;
		// $InformedTD = $InformedDate.''.$InformedTime;

  //         if($dt4 !='') {
  

  //       	 $datetime1 = strtotime($dt3);
  //            $datetime2 = strtotime($dt4);
		// 	$diff =  $datetime2 - $datetime1;
			
		// 	$timeMinTotal =  floor(($diff/60));
			
		// 	$timeInMin= $timeMinTotal%60;
			
		// 	$timeInhr= floor($timeMinTotal/60);
		//     $diffrenceInHr =$timeInhr." hr ". $timeInMin ." min";

        	

           
  //        } else {

  //        	$diffrenceInHr = "";
         	
  //        }
		


		
		$statement = $connection->prepare(
			"INSERT INTO tbl_active_file_audit (
			`tbl_huf_id`,
            `dIEfrm_dt_arvl_patnt_date`,
`dIEfrm_dt_arvl_patnt_time`,
`dIEfrm_dt_ia_cmplt_date`,
`dIEfrm_dt_ia_cmplt_time`,
`dIEfrm_pa_ass_scr`,
`dIEfrm_gsc_scr`,
`dIEfrm_histry`,
`dIEfrm_vital`,
`dIEfrm_vital_remarks`,
`dcp_sign`,
`dcp_name`,
`dcp_date`,
`dcp_time`,
`dcp_remarks`,
`dn_sign`,
`dn_name`,
`dn_date`,
`dn_time`,
`dn_vital`,
`dn_pa_ass_scr`,
`dn_remarks`,
`nas_sign`,
`nas_name`,
`nas_date`,
`nas_time`,
`nas_date_arv_ptnt`,
`nas_time_arv_ptnt`,
`nas_date_ia_cmplt`,
`nas_time_ia_cmplt`,
`nas_pan_ass_scr`,
`nas_vital`,
`nas_morse_fall_scale`,
`nas_remarks`,
`ncp_sign`,
`ncp_name`,
`ncp_date`,
`ncp_time`,
`ncp_remarks`,
`nps_sign`,
`nps_name`,
`nps_date`,
`nps_time`,
`nps_handovr_tkn_by_from`,
`nps_remarks`,
`nuAss_sign`,
`nuAss_name`,
`nuAss_date`,
`nuAss_time`,
`nuAss_remarks`,
`phys_ass_sign`,
`phys_ass_name`,
`phys_ass_date`,
`phys_ass_time`,
`phys_ass_remarks`,
`medictin_chrt_in_caps`,
`medictin_chrt_sign`,
`medictin_chrt_name`,
`medictin_chrt_date`,
`medictin_chrt_time`,
`medictin_chrt_risk_vrfd`,
`medictin_chrt_remarks`,
`invstigation_sheet`,
`btCsnt_name`,
`btCsnt_sign`,
`btCsnt_date`,
`btCsnt_time`,
`btCsnt_remarks`,
`resCsnt_name`,
`resCsnt_sign`,
`resCsnt_date`,
`resCsnt_time`,
`resCsnt_remarks`,
`pCsnt_name`,
`pCsnt_sign`,
`pCsnt_date`,
`pCsnt_time`,
`pCsnt_remarks`,
`hivCsnt_name`,
`hivCsnt_sign`,
`hivCsnt_date`,
`hivCsnt_time`,
`hivCsnt_remarks`,
`bcl_cather_frm`,
`bcl_ventr_frm`,
`bcl_line_frn`,
`bcl_ssl_pvnt_frm`,
`btmf_s_e_time`,
`btmf_s_e_date`,
`btmf_sign`,
`btmf_name`,
`btmf_date`,
`btmf_time`,
`btmf_vital`,
`btmf_remarks`,
`dmc_vital`,
`dmc_ressmnt_scr`,
`intak_opt`,
`movmnt_sheet`,
`restrn_frm`,
`patnt_rigt_res_frm`,
`patnt_f_e_chrt`,
`esti_frm`,
`s_c_sign`,
`s_c_name`,
`s_c_date`,
`s_c_time`,
`s_c_remarks`,
`a_c_sign`,
`a_c_name`,
`a_c_date`,
`a_c_time`,
`a_c_remarks`,
`pac`,
`anasthsia_care_plan`,
`pr_optv_chcklst`,
`anasthsia_sfty_chcklst`,
`surgn_sign`,
`surgn_name`,
`surgn_date`,
`surgn_time`,
`surgn_remarks`,
`anast_sign`,
`anast_name`,
`anast_date`,
`anast_time`,
`anast_remarks`,
`nurse_sign`,
`nurse_name`,
`nurse_date`,
`nurse_time`,
`nurse_remarks`,
`anaeshts_chart`,
`intraptv_mon_rcrd`,
`anaeshts_chart1`,
`pst_anaeshts_mgmt`,
`opertv_notes`

) VALUES ('$user_id', 
'$dIEfrm_dt_arvl_patnt_date',
'$dIEfrm_dt_arvl_patnt_time',
'$dIEfrm_dt_ia_cmplt_date',
'$dIEfrm_dt_ia_cmplt_time',
'$dIEfrm_pa_ass_scr',
'$dIEfrm_gsc_scr',
'$dIEfrm_histry',
'$dIEfrm_vital',
'$dIEfrm_vital_remarks',
'$dcp_sign',
'$dcp_name',
'$dcp_date',
'$dcp_time',
'$dcp_remarks',
'$dn_sign',
'$dn_name',
'$dn_date',
'$dn_time',
'$dn_vital',
'$dn_pa_ass_scr',
'$dn_remarks',
'$nas_sign',
'$nas_name',
'$nas_date',
'$nas_time',
'$nas_date_arv_ptnt',
'$nas_time_arv_ptnt',
'$nas_date_ia_cmplt',
'$nas_time_ia_cmplt',
'$nas_pan_ass_scr',
'$nas_vital',
'$nas_morse_fall_scale',
'$nas_remarks',
'$ncp_sign',
'$ncp_name',
'$ncp_date',
'$ncp_time',
'$ncp_remarks',
'$nps_sign',
'$nps_name',
'$nps_date',
'$nps_time',
'$nps_handovr_tkn_by_from',
'$nps_remarks',
'$nuAss_sign',
'$nuAss_name',
'$nuAss_date',
'$nuAss_time',
'$nuAss_remarks',
'$phys_ass_sign',
'$phys_ass_name',
'$phys_ass_date',
'$phys_ass_time',
'$phys_ass_remarks',
'$medictin_chrt_in_caps',
'$medictin_chrt_sign',
'$medictin_chrt_name',
'$medictin_chrt_date',
'$medictin_chrt_time',
'$medictin_chrt_risk_vrfd',
'$medictin_chrt_remarks',
'$invstigation_sheet',
'$btCsnt_name',
'$btCsnt_sign',
'$btCsnt_date',
'$btCsnt_time',
'$btCsnt_remarks',
'$resCsnt_name',
'$resCsnt_sign',
'$resCsnt_date',
'$resCsnt_time',
'$resCsnt_remarks',
'$pCsnt_name',
'$pCsnt_sign',
'$pCsnt_date',
'$pCsnt_time',
'$pCsnt_remarks',
'$hivCsnt_name',
'$hivCsnt_sign',
'$hivCsnt_date',
'$hivCsnt_time',
'$hivCsnt_remarks',
'$bcl_cather_frm',
'$bcl_ventr_frm',
'$bcl_line_frn',
'$bcl_ssl_pvnt_frm',
'$btmf_s_e_time',
'$btmf_s_e_date',
'$btmf_sign',
'$btmf_name',
'$btmf_date',
'$btmf_time',
'$btmf_vital',
'$btmf_remarks',
'$dmc_vital',
'$dmc_ressmnt_scr',
'$intak_opt',
'$movmnt_sheet',
'$restrn_frm',
'$patnt_rigt_res_frm',
'$patnt_f_e_chrt',
'$esti_frm',
'$s_c_sign',
'$s_c_name',
'$s_c_date',
'$s_c_time',
'$s_c_remarks',
'$a_c_sign',
'$a_c_name',
'$a_c_date',
'$a_c_time',
'$a_c_remarks',
'$pac',
'$anasthsia_care_plan',
'$pr_optv_chcklst',
'$anasthsia_sfty_chcklst',
'$surgn_sign',
'$surgn_name',
'$surgn_date',
'$surgn_time',
'$surgn_remarks',
'$anast_sign',
'$anast_name',
'$anast_date',
'$anast_time',
'$anast_remarks',
'$nurse_sign',
'$nurse_name',
'$nurse_date',
'$nurse_time',
'$nurse_remarks',
'$anaeshts_chart',
'$intraptv_mon_rcrd',
'$anaeshts_chart1',
'$pst_anaeshts_mgmt',
'$opertv_notes'


);
			"
		);

		
		$result = $statement->execute(
			
		);

	//	print_r($result);
		if(!empty($result))
		{
			echo'Active File Audit Form Inserted Successfully';
		} else {
			  echo' Error in Active File Audit Form Form';
		}
	}

	      elseif(($_POST["operation"] == "Update")) {

	      
    // $d_adm = $_POST['d_adm'];
$ipd_no = $_POST['ipd_no'];
   
    $dIEfrm_dt_arvl_patnt_date  =  $_POST['dIEfrm_dt_arvl_patnt_date'];
$dIEfrm_dt_arvl_patnt_time  =  $_POST['dIEfrm_dt_arvl_patnt_time'];
  //  $dIEfrm_dt_arvl_patnt_time="jlk";
$dIEfrm_dt_ia_cmplt_date  =  $_POST['dIEfrm_dt_ia_cmplt_date'];
$dIEfrm_dt_ia_cmplt_time  =  $_POST['dIEfrm_dt_ia_cmplt_time'];
$dIEfrm_pa_ass_scr  =  $_POST['dIEfrm_pa_ass_scr'];
$dIEfrm_gsc_scr  =  $_POST['dIEfrm_gsc_scr'];
$dIEfrm_histry  =  $_POST['dIEfrm_histry'];
$dIEfrm_vital  =  $_POST['dIEfrm_vital'];
$dIEfrm_vital_remarks  =  $_POST['dIEfrm_vital_remarks'];
$dcp_sign  =  $_POST['dcp_sign'];
$dcp_name  =  $_POST['dcp_name'];
$dcp_date  =  $_POST['dcp_date'];
$dcp_time  =  $_POST['dcp_time'];
$dcp_remarks  =  $_POST['dcp_remarks'];
$dn_sign  =  $_POST['dn_sign'];
$dn_name  =  $_POST['dn_name'];
$dn_date  =  $_POST['dn_date'];
$dn_time  =  $_POST['dn_time'];
$dn_vital  =  $_POST['dn_vital'];
$dn_pa_ass_scr  =  $_POST['dn_pa_ass_scr'];
$dn_remarks  =  $_POST['dn_remarks'];
$nas_sign  =  $_POST['nas_sign'];
$nas_name   =  $_POST['nas_name'];
$nas_date   =  $_POST['nas_date'];
$nas_time   =  $_POST['nas_time'];
$nas_date_arv_ptnt   =  $_POST['nas_date_arv_ptnt'];
$nas_time_arv_ptnt   =  $_POST['nas_time_arv_ptnt'];
$nas_date_ia_cmplt   =  $_POST['nas_date_ia_cmplt'];
$nas_time_ia_cmplt   =  $_POST['nas_time_ia_cmplt'];
$nas_pan_ass_scr   =  $_POST['nas_pan_ass_scr'];
//$nas_pan_ass_scr="jlkj";
$nas_vital   =  $_POST['nas_vital'];
$nas_morse_fall_scale   =  $_POST['nas_morse_fall_scale'];
$nas_remarks   =  $_POST['nas_remarks'];
$ncp_sign   =  $_POST['ncp_sign'];
$ncp_name   =  $_POST['ncp_name'];
$ncp_date   =  $_POST['ncp_date'];
$ncp_time   =  $_POST['ncp_time'];
$ncp_remarks   =  $_POST['ncp_remarks'];
$nps_sign   =  $_POST['nps_sign'];
$nps_name   =  $_POST['nps_name'];
$nps_date   =  $_POST['nps_date'];
$nps_time   =  $_POST['nps_time'];
$nps_handovr_tkn_by_from   =  $_POST['nps_handovr_tkn_by_from'];
$nps_remarks   =  $_POST['nps_remarks'];
$nuAss_sign   =  $_POST['nuAss_sign'];
$nuAss_name   =  $_POST['nuAss_name'];
$nuAss_date   =  $_POST['nuAss_date'];
$nuAss_time   =  $_POST['nuAss_time'];
$nuAss_remarks   =  $_POST['nuAss_remarks'];
$phys_ass_sign   =  $_POST['phys_ass_sign'];
$phys_ass_name   =  $_POST['phys_ass_name'];
$phys_ass_date   =  $_POST['phys_ass_date'];
$phys_ass_time   =  $_POST['phys_ass_time'];
$phys_ass_remarks   =  $_POST['phys_ass_remarks'];
$medictin_chrt_in_caps   =  $_POST['medictin_chrt_in_caps'];
$medictin_chrt_sign   =  $_POST['medictin_chrt_sign'];
$medictin_chrt_name   =  $_POST['medictin_chrt_name'];
$medictin_chrt_date   =  $_POST['medictin_chrt_date'];
$medictin_chrt_time   =  $_POST['medictin_chrt_time'];
$medictin_chrt_risk_vrfd   =  $_POST['medictin_chrt_risk_vrfd'];
$medictin_chrt_remarks   =  $_POST['medictin_chrt_remarks'];
$invstigation_sheet  =  $_POST['invstigation_sheet'];
$btCsnt_name  =  $_POST['btCsnt_name'];
$btCsnt_sign  =  $_POST['btCsnt_sign'];
$btCsnt_date  =  $_POST['btCsnt_date'];
$btCsnt_time  =  $_POST['btCsnt_time'];
$btCsnt_remarks  =  $_POST['btCsnt_remarks'];
$resCsnt_name  =  $_POST['resCsnt_name'];
$resCsnt_sign  =  $_POST['resCsnt_sign'];
$resCsnt_date  =  $_POST['resCsnt_date'];
$resCsnt_time  =  $_POST['resCsnt_time'];
$resCsnt_remarks  =  $_POST['resCsnt_remarks'];
$pCsnt_name  =  $_POST['pCsnt_name'];
$pCsnt_sign  =  $_POST['pCsnt_sign'];
$pCsnt_date  =  $_POST['pCsnt_date'];
$pCsnt_time  =  $_POST['pCsnt_time'];
$pCsnt_remarks  =  $_POST['pCsnt_remarks'];
$hivCsnt_name  =  $_POST['hivCsnt_name'];
$hivCsnt_sign  =  $_POST['hivCsnt_sign'];
$hivCsnt_date  =  $_POST['hivCsnt_date'];
$hivCsnt_time  =  $_POST['hivCsnt_time'];
$hivCsnt_remarks  =  $_POST['hivCsnt_remarks'];
$bcl_cather_frm  =  $_POST['bcl_cather_frm'];
$bcl_ventr_frm  =  $_POST['bcl_ventr_frm'];
$bcl_line_frn  =  $_POST['bcl_line_frn'];
$bcl_ssl_pvnt_frm  =  $_POST['bcl_ssl_pvnt_frm'];
$btmf_s_e_time  =  $_POST['btmf_s_e_time'];
$btmf_s_e_date  =  $_POST['btmf_s_e_date'];
$btmf_sign  =  $_POST['btmf_sign'];
$btmf_name  =  $_POST['btmf_name'];
$btmf_date  =  $_POST['btmf_date'];
$btmf_time  =  $_POST['btmf_time'];
$btmf_vital  =  $_POST['btmf_vital'];
$btmf_remarks  =  $_POST['btmf_remarks'];
$dmc_vital  =  $_POST['dmc_vital'];
$dmc_ressmnt_scr  =  $_POST['dmc_ressmnt_scr'];
$intak_opt  =  $_POST['intak_opt'];
$movmnt_sheet  =  $_POST['movmnt_sheet'];
$restrn_frm  =  $_POST['restrn_frm'];
$patnt_rigt_res_frm  =  $_POST['patnt_rigt_res_frm'];
$patnt_f_e_chrt  =  $_POST['patnt_f_e_chrt'];
$esti_frm  =  $_POST['esti_frm'];
$s_c_sign  =  $_POST['s_c_sign'];
$s_c_name  =  $_POST['s_c_name'];
$s_c_date  =  $_POST['s_c_date'];
$s_c_time  =  $_POST['s_c_time'];
$s_c_remarks  =  $_POST['s_c_remarks'];
$a_c_sign  =  $_POST['a_c_sign'];
$a_c_name  =  $_POST['a_c_name'];
$a_c_date  =  $_POST['a_c_date'];
$a_c_time  =  $_POST['a_c_time'];
$a_c_remarks  =  $_POST['a_c_remarks'];
$pac  =  $_POST['pac'];
$anasthsia_care_plan  =  $_POST['anasthsia_care_plan'];
$pr_optv_chcklst  =  $_POST['pr_optv_chcklst'];
$anasthsia_sfty_chcklst  =  $_POST['anasthsia_sfty_chcklst'];
$surgn_sign  =  $_POST['surgn_sign'];
$surgn_name  =  $_POST['surgn_name'];
$surgn_date  =  $_POST['surgn_date'];
$surgn_time  =  $_POST['surgn_time'];
$surgn_remarks  =  $_POST['surgn_remarks'];
$anast_sign  =  $_POST['anast_sign'];
$anast_name  =  $_POST['anast_name'];
$anast_date  =  $_POST['anast_date'];
$anast_time  =  $_POST['anast_time'];
$anast_remarks  =  $_POST['anast_remarks'];
$nurse_sign  =  $_POST['nurse_sign'];
$nurse_name  =  $_POST['nurse_name'];
$nurse_date  =  $_POST['nurse_date'];
$nurse_time  =  $_POST['nurse_time'];
$nurse_remarks  =  $_POST['nurse_remarks'];
$anaeshts_chart  =  $_POST['anaeshts_chart'];
$intraptv_mon_rcrd  =  $_POST['intraptv_mon_rcrd'];
$anaeshts_chart1  =  $_POST['anaeshts_chart1'];
$pst_anaeshts_mgmt  =  $_POST['pst_anaeshts_mgmt'];
$opertv_notes  =  $_POST['opertv_notes'];
   
   
   
		// $dt1 = mysqli_real_escape_string($connect, $srt);
		// $dtt1 = mysqli_real_escape_string($connect, $srtt);
		// $dt2 = mysqli_real_escape_string($connect, $dateofreportgeneration);
		// $dtt2 = mysqli_real_escape_string($connect, $timeofreportgeneration);
		
		
		// $dt3 = $dt1.''.$dtt1;
		// $dt4 = $dt2.''.$dtt2;
		// $ResultTD = $ResultDate.''.$ResultTime;
		// $InformedTD = $InformedDate.''.$InformedTime;

  //         if($dt4 !='') {
  

  //       	 $datetime1 = strtotime($dt3);
  //            $datetime2 = strtotime($dt4);
		// 	$diff =  $datetime2 - $datetime1;
			
		// 	$timeMinTotal =  floor(($diff/60));
			
		// 	$timeInMin= $timeMinTotal%60;
			
		// 	$timeInhr= floor($timeMinTotal/60);
		//     $diffrenceInHr =$timeInhr." hr ". $timeInMin ." min";

        	

           
  //        } else {

  //        	$diffrenceInHr = "";
         	
  //        }
		


		
		

		$statement = $connection->prepare(
			"UPDATE tbl_active_file_audit 
			   SET dIEfrm_dt_arvl_patnt_date ='$dIEfrm_dt_arvl_patnt_date',
dIEfrm_dt_arvl_patnt_time ='$dIEfrm_dt_arvl_patnt_time',
dIEfrm_dt_ia_cmplt_date ='$dIEfrm_dt_ia_cmplt_date',
dIEfrm_dt_ia_cmplt_time ='$dIEfrm_dt_ia_cmplt_time',
dIEfrm_pa_ass_scr ='$dIEfrm_pa_ass_scr',
dIEfrm_gsc_scr ='$dIEfrm_gsc_scr',
dIEfrm_histry ='$dIEfrm_histry',
dIEfrm_vital ='$dIEfrm_vital',
dIEfrm_vital_remarks ='$dIEfrm_vital_remarks',
dcp_sign ='$dcp_sign',
dcp_name ='$dcp_name',
dcp_date ='$dcp_date',
dcp_time ='$dcp_time',
dcp_remarks ='$dcp_remarks',
dn_sign ='$dn_sign',
dn_name ='$dn_name',
dn_date ='$dn_date',
dn_time ='$dn_time',
dn_vital ='$dn_vital',
dn_pa_ass_scr ='$dn_pa_ass_scr',
dn_remarks ='$dn_remarks',
nas_sign ='$nas_sign',
 nas_name  ='$nas_name',
 nas_date  ='$nas_date',
 nas_time  ='$nas_time',
 nas_date_arv_ptnt  ='$nas_date_arv_ptnt',
 nas_time_arv_ptnt  ='$nas_time_arv_ptnt',
 nas_date_ia_cmplt  ='$nas_date_ia_cmplt',
 nas_time_ia_cmplt  ='$nas_time_ia_cmplt',
 nas_pan_ass_scr  ='$nas_pan_ass_scr',
 nas_vital  ='$nas_vital',
 nas_morse_fall_scale  ='$nas_morse_fall_scale',
 nas_remarks  ='$nas_remarks',
 ncp_sign  ='$ncp_sign',
 ncp_name  ='$ncp_name',
 ncp_date  ='$ncp_date',
 ncp_time  ='$ncp_time',
 ncp_remarks  ='$ncp_remarks',
 nps_sign  ='$nps_sign',
 nps_name  ='$nps_name',
 nps_date  ='$nps_date',
 nps_time  ='$nps_time',
 nps_handovr_tkn_by_from  ='$nps_handovr_tkn_by_from',
 nps_remarks  ='$nps_remarks',
 nuAss_sign  ='$nuAss_sign',
 nuAss_name  ='$nuAss_name',
 nuAss_date  ='$nuAss_date',
 nuAss_time  ='$nuAss_time',
 nuAss_remarks  ='$nuAss_remarks',
 phys_ass_sign  ='$phys_ass_sign',
 phys_ass_name  ='$phys_ass_name',
 phys_ass_date  ='$phys_ass_date',
 phys_ass_time  ='$phys_ass_time',
 phys_ass_remarks  ='$phys_ass_remarks',
 medictin_chrt_in_caps  ='$medictin_chrt_in_caps',
 medictin_chrt_sign  ='$medictin_chrt_sign',
 medictin_chrt_name  ='$medictin_chrt_name',
 medictin_chrt_date  ='$medictin_chrt_date',
 medictin_chrt_time  ='$medictin_chrt_time',
 medictin_chrt_risk_vrfd  ='$medictin_chrt_risk_vrfd',
 medictin_chrt_remarks  ='$medictin_chrt_remarks',
invstigation_sheet ='$invstigation_sheet',
btCsnt_name ='$btCsnt_name',
btCsnt_sign ='$btCsnt_sign',
btCsnt_date ='$btCsnt_date',
btCsnt_time ='$btCsnt_time',
btCsnt_remarks ='$btCsnt_remarks',
resCsnt_name ='$resCsnt_name',
resCsnt_sign ='$resCsnt_sign',
resCsnt_date ='$resCsnt_date',
resCsnt_time ='$resCsnt_time',
resCsnt_remarks ='$resCsnt_remarks',
pCsnt_name ='$pCsnt_name',
pCsnt_sign ='$pCsnt_sign',
pCsnt_date ='$pCsnt_date',
pCsnt_time ='$pCsnt_time',
pCsnt_remarks ='$pCsnt_remarks',
hivCsnt_name ='$hivCsnt_name',
hivCsnt_sign ='$hivCsnt_sign',
hivCsnt_date ='$hivCsnt_date',
hivCsnt_time ='$hivCsnt_time',
hivCsnt_remarks ='$hivCsnt_remarks',
bcl_cather_frm ='$bcl_cather_frm',
bcl_ventr_frm ='$bcl_ventr_frm',
bcl_line_frn ='$bcl_line_frn',
bcl_ssl_pvnt_frm ='$bcl_ssl_pvnt_frm',
btmf_s_e_time ='$btmf_s_e_time',
btmf_s_e_date ='$btmf_s_e_date',
btmf_sign ='$btmf_sign',
btmf_name ='$btmf_name',
btmf_date ='$btmf_date',
btmf_time ='$btmf_time',
btmf_vital ='$btmf_vital',
btmf_remarks ='$btmf_remarks',
dmc_vital ='$dmc_vital',
dmc_ressmnt_scr ='$dmc_ressmnt_scr',
intak_opt ='$intak_opt',
movmnt_sheet ='$movmnt_sheet',
restrn_frm ='$restrn_frm',
patnt_rigt_res_frm ='$patnt_rigt_res_frm',
patnt_f_e_chrt ='$patnt_f_e_chrt',
esti_frm ='$esti_frm',
s_c_sign ='$s_c_sign',
s_c_name ='$s_c_name',
s_c_date ='$s_c_date',
s_c_time ='$s_c_time',
s_c_remarks ='$s_c_remarks',
a_c_sign ='$a_c_sign',
a_c_name ='$a_c_name',
a_c_date ='$a_c_date',
a_c_time ='$a_c_time',
a_c_remarks ='$a_c_remarks',
pac ='$pac',
anasthsia_care_plan ='$anasthsia_care_plan',
pr_optv_chcklst ='$pr_optv_chcklst',
anasthsia_sfty_chcklst ='$anasthsia_sfty_chcklst',
surgn_sign ='$surgn_sign',
surgn_name ='$surgn_name',
surgn_date ='$surgn_date',
surgn_time ='$surgn_time',
surgn_remarks ='$surgn_remarks',
anast_sign ='$anast_sign',
anast_name ='$anast_name',
anast_date ='$anast_date',
anast_time ='$anast_time',
anast_remarks ='$anast_remarks',
nurse_sign ='$nurse_sign',
nurse_name ='$nurse_name',
nurse_date ='$nurse_date',
nurse_time ='$nurse_time',
nurse_remarks ='$nurse_remarks',
anaeshts_chart ='$anaeshts_chart',
intraptv_mon_rcrd ='$intraptv_mon_rcrd',
anaeshts_chart1 ='$anaeshts_chart1',
pst_anaeshts_mgmt ='$pst_anaeshts_mgmt',
opertv_notes ='$opertv_notes'


			WHERE tbl_huf_id = :user_id "
		   );
		

		$result = $statement->execute(
			array(
				':user_id'		=>	$_POST["user_id"]
			)
		);
		
		

	//	print_r($result);
		if(!empty($result))
		{
			echo'Active File Audit Form Updated Successfully';
		} else {
			  echo' Error in Active File Audit Form';
		}

                         
	      }
}
?>