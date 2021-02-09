<?php
	error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');	
?>
<link href="testsign/assets/my_sign.css" rel="stylesheet">
<script src="testsign/assets/flashcanvas.js"></script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#opdf').load('ipdf_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	
</script>

<script>
function myFunction() {
  window.print();
}

function goBack() {
  window.history.back();
}

</script>

<style>
.preload{
	margin:0;
	position:absolute;
	top:50%;
	left:60%;
	margin-right: -50%;
	transform:translate(-50%, -50%);
}
#bx1,
#bx2,
#adm,
#order-table{
	display:none;
}
.form-control{
	margin-bottom:10px;
}
<style type="text/css">
	#wrapper {
  width: 100%;
}
#page-wrapper {
  padding: 0 15px;
  min-height: 568px;
  background-color: white;
  border-color:#D9EDF7; 
}
@media (min-width: 768px) {
  #page-wrapper {
    position: inherit;
    margin: 0 0 0 0px;
    padding: 0 30px;
    border-left: 1px solid #e7e7e7;
  }

}
.box {
    height: 100%;
    overflow: hidden;
    width: 100%;
    margin: 0px auto 15px;
    border: 1px solid black;
	
}

.form-group label {
    font-size: 14px;
    line-height: 1.42857;
    color: #121212 !important;
    font-weight: 400;
	
}
</style>
<body>
<?php include"nav-bar-nur.php";?>
<section class="content home" >
<div class="container-fluid" >
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"   style="padding:7px;height: 140px;">
                            IPD Feedback Form &nbsp;
                             <div>
		                    	 <table class="custom-table"  cellspacing="10" cellpadding="10" border="1" width="670px" align="center" style="border-color: #9DA2E2; text-align: center;" >
		                            		<tr style="background-color: #9DA2E2;">
		                            			<td style="font-weight: bold;color: white;">Total</td>
		                            			<td style="font-weight: bold;color: white;">Completed</td>
		                            			<td style="font-weight: bold;color: white;">Not-Completed</td>
		                            			<td>
		                            				&nbsp;
		                            			</td>
		                            		</tr>
		                            		<tr style="background-color: white;">
		                            			<?php
													include('dbinfo.php');

													$qry = "SELECT COUNT(*) as total FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_ipd.ipd_id WHERE year(huf_dadm) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as comp FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_ipd.ipd_id WHERE (ipd_score!='' AND ipd_score!='0') AND year(huf_dadm) = '$yr'";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notcomp FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_ipd.ipd_id WHERE (ipd_score='0' OR ipd_score=' ')AND year(huf_dadm) = '$yr' ";
																	$resnotdis = mysqli_query($connect, $qrynotdis);
																	$rownotdis=mysqli_fetch_assoc($resnotdis);
																	// echo $rownotdis['notdischarge'];
																	// echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
																	// die();

													   

													?>


		                            			<td style="font-weight: bold;color: black;" ><?php echo $row['total'];?></td>
		                            			<td style="font-weight: bold;color: green;"><?php echo $rowdis['comp'];?></td>
		                            			<td style="font-weight: bold;color: red;"><?php echo $rownotdis['notcomp'];?></td>
		                            			<td>
		                            				<a href="performence.php">Click here for Details</a>
		                            			</td>
		                            		
		                            		</tr>
		                            	</table>
                            </div>

                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color:white;font-weight:bold;" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

							<!--<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>-->
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" class="sigPad" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.  (अनु क्रमांक)</label>
											<div class="col-lg-2" id="bofid">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date (दिनांक)</label>
											<div class="col-lg-3">
												<input type="text" name="dt" id="dt" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name (Optional)/नाम (वैकल्पिक)</label>
											<div class="col-lg-7">
												<input type="text" name="mo1" id="mo1" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Age (आयु)</label>
											<div class="col-lg-2">
												<input type="text" name="mo2" id="mo2" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Sex (लिंग)</label>
											<div class="col-lg-2">
												<select type="text" name="mo3" id="mo3" class="form-control" >
													<option value="">Select</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">E-mail ID (ईमेल आईडी)</label>
											<div class="col-lg-7">
												<input type="email" name="em" id="em" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Address (पता)</label>
											<div class="col-lg-7">
												<textarea type="text" name="mo4" id="mo4" class="form-control" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Treating Doctor (इलाज कर रहे डॉक्टर)</label>
											<div class="col-lg-7">
												<input type="text" name="mo5" id="mo5" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">You Heard/Read about Hospital From <br>(आपने अस्पताल के बारे में सुना / पढ़ा)</label>
											<div class="col-lg-8">
												TV/Radio&nbsp;&nbsp;<input type="checkbox" value="TV/Radio" name="aj1" id="tvv" />
												&nbsp;Print Media/Hoarding&nbsp;&nbsp;<input type="checkbox" value="Print Media/Hoarding" name="aj2" id="prtt" />
												&nbsp;Friend/Relatives&nbsp;&nbsp;<input type="checkbox" value="Friend/Relatives" name="aj3" id="medd" />
											</div>
										</div>
										<div class="col-lg-12">
											<br />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Other (Please Specify)/अन्य (कृपया निर्दिष्ट करें)</label>
											<div class="col-lg-7">
												<textarea type="text" name="mo7" id="mo7" class="form-control" ></textarea>
											</div>
										</div>										
										<div class="col-lg-12">
											<hr style="margin-bottom:0px;border:1px solid #900;"/>
										</div>
										<div class="col-lg-12">
											<div id="ord" class="table-responsive">
												<table class="table table-bordered table-hover">
													<thead>
														<tr>
															<th width="20%">Facilities / Services(सुविधाएँ और सेवाएं)<br>(5 Marks for each)</th>
															<th width="12%">Extremely Dissatisfied<br>(अत्यंत असंतुष्ट)</th>
															<th width="12%">Dissatisfied<br>(असंतुष्ट)</th>
															<th width="15%">Neither Satisfied / Nor dissatisfied<br>(न तो संतुष्ट/ न ही असंतुष्ट)</th>
															<th width="12%">Satisfied<br>(संतुष्ट)</th>
															<th width="12%">Extremely Satisfied<br>(अत्यंत समाधानी)</th>
															<th width="12%">Not Applicable(N/A)<br>(लागू नहीं)</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1) Reception Staff<br>&nbsp;&nbsp;&nbsp;&nbsp;(रिसेप्शन स्टाफ)</td>
															<td><input type="radio" value="1" name="chk1" class="chhk1" /></td>
															<td><input type="radio" value="2" name="chk1" class="chhk2" /></td>
															<td><input type="radio" value="3" name="chk1" class="chhk3" /></td>
															<td><input type="radio" value="4" name="chk1" class="chhk4" /></td>
															<td><input type="radio" value="5" name="chk1" class="chhk5" /></td>
															<td><input type="radio" value="-5" name="chk1" class="chhk6" /></td>
														</tr>
														<tr>
															<td>2) Registration Process<br>&nbsp;&nbsp;&nbsp;&nbsp;(पंजीकरण की प्रक्रिया)</td>
															<td><input type="radio" value="1" name="chk2" class="chhk7" /></td>
															<td><input type="radio" value="2" name="chk2" class="chhk8" /></td>
															<td><input type="radio" value="3" name="chk2" class="chhk9" /></td>
															<td><input type="radio" value="4" name="chk2" class="chhk10" /></td>
															<td><input type="radio" value="5" name="chk2" class="chhk11" /></td>
															<td><input type="radio" value="-5" name="chk2" class="chhk12" /></td>
														</tr>
														<tr>
															<td>3) I.P.D. Billing<br>&nbsp;&nbsp;&nbsp;&nbsp;(आई.पी.डी. बिलिंग)</td>
															<td><input type="radio" value="1" name="chk3" class="chhk13" /></td>
															<td><input type="radio" value="2" name="chk3" class="chhk14" /></td>
															<td><input type="radio" value="3" name="chk3" class="chhk15" /></td>
															<td><input type="radio" value="4" name="chk3" class="chhk16" /></td>
															<td><input type="radio" value="5" name="chk3" class="chhk17" /></td>
															<td><input type="radio" value="-5" name="chk3" class="chhk18" /></td>
														</tr>
														<tr>
															<td>4) Waiting Area<br>&nbsp;&nbsp;&nbsp;&nbsp;(प्रतीक्षा स्थल)</td>
															<td><input type="radio" value="1" name="chk4" class="chhk19" /></td>
															<td><input type="radio" value="2" name="chk4" class="chhk20" /></td>
															<td><input type="radio" value="3" name="chk4" class="chhk21" /></td>
															<td><input type="radio" value="4" name="chk4" class="chhk22" /></td>
															<td><input type="radio" value="5" name="chk4" class="chhk23" /></td>
															<td><input type="radio" value="-5" name="chk4" class="chhk24" /></td>
														</tr>
														<tr>
															<td>5) Nursing Staff<br>&nbsp;&nbsp;&nbsp;&nbsp;(नर्सिंग कर्मचारी)</td>
															<td><input type="radio" value="1" name="chk5" class="chhk25" /></td>
															<td><input type="radio" value="2" name="chk5" class="chhk26" /></td>
															<td><input type="radio" value="3" name="chk5" class="chhk27" /></td>
															<td><input type="radio" value="4" name="chk5" class="chhk28" /></td>
															<td><input type="radio" value="5" name="chk5" class="chhk29" /></td>
															<td><input type="radio" value="-5" name="chk5" class="chhk30" /></td>
														</tr>
														<tr>
															<td>6) Consultant/Treating Doctor<br>&nbsp;&nbsp;&nbsp;&nbsp;(परामर्शदाता / उपचार करने वाला चिकित्सक)</td>
															<td><input type="radio" value="1" name="chk6" class="chhk31" /></td>
															<td><input type="radio" value="2" name="chk6" class="chhk32" /></td>
															<td><input type="radio" value="3" name="chk6" class="chhk33" /></td>
															<td><input type="radio" value="4" name="chk6" class="chhk34" /></td>
															<td><input type="radio" value="5" name="chk6" class="chhk35" /></td>
															<td><input type="radio" value="-5" name="chk6" class="chhk36" /></td>
														</tr>
														<tr>
															<td>7) Waiting Time to see the Doctor<br>&nbsp;&nbsp;&nbsp;&nbsp;(डॉक्टर को देखने के लिए इंतजार का समय)</td>
															<td><input type="radio" value="1" name="chk7" class="chhk37" /></td>
															<td><input type="radio" value="2" name="chk7" class="chhk38" /></td>
															<td><input type="radio" value="3" name="chk7" class="chhk39" /></td>
															<td><input type="radio" value="4" name="chk7" class="chhk40" /></td>
															<td><input type="radio" value="5" name="chk7" class="chhk41" /></td>
															<td><input type="radio" value="-5" name="chk7" class="chhk42" /></td>
														</tr>
														<tr>
															<td>8) Pharmacy<br>&nbsp;&nbsp;&nbsp;&nbsp;(फार्मसी)</td>
															<td><input type="radio" value="1" name="chk8" class="chhk43" /></td>
															<td><input type="radio" value="2" name="chk8" class="chhk44" /></td>
															<td><input type="radio" value="3" name="chk8" class="chhk45" /></td>
															<td><input type="radio" value="4" name="chk8" class="chhk46" /></td>
															<td><input type="radio" value="5" name="chk8" class="chhk47" /></td>
															<td><input type="radio" value="-5" name="chk8" class="chhk48" /></td>
														</tr>
														<tr>
															<td>9) Diagnostic<br>&nbsp;&nbsp;&nbsp;&nbsp;(डायग्नोस्टिक)</td>
															<td><input type="radio" value="1" name="chk9" class="chhk49" /></td>
															<td><input type="radio" value="2" name="chk9" class="chhk50" /></td>
															<td><input type="radio" value="3" name="chk9" class="chhk51" /></td>
															<td><input type="radio" value="4" name="chk9" class="chhk52" /></td>
															<td><input type="radio" value="5" name="chk9" class="chk53" /></td>
															<td><input type="radio" value="-5" name="chk9" class="chhk54" /></td>
														</tr>
														<tr>
															<td>a) Pathology<br>&nbsp;&nbsp;&nbsp;&nbsp;(पॅथॉलॉजी)</td>
															<td><input type="radio" value="1" name="chk10" class="chhk55" /></td>
															<td><input type="radio" value="2" name="chk10" class="chhk56" /></td>
															<td><input type="radio" value="3" name="chk10" class="chhk57" /></td>
															<td><input type="radio" value="4" name="chk10" class="chhk58" /></td>
															<td><input type="radio" value="5" name="chk10" class="chhk59" /></td>
															<td><input type="radio" value="-5" name="chk10" class="chhk60" /></td>
														</tr>
														<tr>
															<td>b) Sonography<br>&nbsp;&nbsp;&nbsp;&nbsp;(सोनोग्राफी)</td>
															<td><input type="radio" value="1" name="chk11" class="chhk61" /></td>
															<td><input type="radio" value="2" name="chk11" class="chhk62" /></td>
															<td><input type="radio" value="3" name="chk11" class="chhk63" /></td>
															<td><input type="radio" value="4" name="chk11" class="chhk64" /></td>
															<td><input type="radio" value="5" name="chk11" class="chhk65" /></td>
															<td><input type="radio" value="-5" name="chk11" class="chhk66" /></td>
														</tr>
														<tr>
															<td>c) 2D Echo<br>&nbsp;&nbsp;&nbsp;&nbsp;(2 डी इको)</td>
															<td><input type="radio" value="1" name="chk12" class="chhk67" /></td>
															<td><input type="radio" value="2" name="chk12" class="chhk68" /></td>
															<td><input type="radio" value="3" name="chk12" class="chhk69" /></td>
															<td><input type="radio" value="4" name="chk12" class="chhk70" /></td>
															<td><input type="radio" value="5" name="chk12" class="chhk71" /></td>
															<td><input type="radio" value="-5" name="chk12" class="chhk72" /></td>
														</tr>
														<tr>
															<td>d) Stress Test<br>&nbsp;&nbsp;&nbsp;&nbsp;(तनाव परीक्षण)</td>
															<td><input type="radio" value="1" name="chk13" class="chhk73" /></td>
															<td><input type="radio" value="2" name="chk13" class="chhk74" /></td>
															<td><input type="radio" value="3" name="chk13" class="chhk75" /></td>
															<td><input type="radio" value="4" name="chk13" class="chhk76" /></td>
															<td><input type="radio" value="5" name="chk13" class="chhk77" /></td>
															<td><input type="radio" value="-5" name="chk13" class="chhk78" /></td>
														</tr>
														<tr>
															<td>e) ECG<br>&nbsp;&nbsp;&nbsp;&nbsp;(ईसीजी)</td>
															<td><input type="radio" value="1" name="chk14" class="chhk79" /></td>
															<td><input type="radio" value="2" name="chk14" class="chhk80" /></td>
															<td><input type="radio" value="3" name="chk14" class="chhk81" /></td>
															<td><input type="radio" value="4" name="chk14" class="chhk82" /></td>
															<td><input type="radio" value="5" name="chk14" class="chhk83" /></td>
															<td><input type="radio" value="-5" name="chk14" class="chhk84" /></td>
														</tr>
														<tr>
															<td>f) C.T. Scan<br>&nbsp;&nbsp;&nbsp;&nbsp;(सी.टी. स्कैन)</td>
															<td><input type="radio" value="1" name="chk15" class="chhk85" /></td>
															<td><input type="radio" value="2" name="chk15" class="chhk86" /></td>
															<td><input type="radio" value="3" name="chk15" class="chhk87" /></td>
															<td><input type="radio" value="4" name="chk15" class="chhk88" /></td>
															<td><input type="radio" value="5" name="chk15" class="chhk89" /></td>
															<td><input type="radio" value="-5" name="chk15" class="chhk90" /></td>
														</tr>
														<tr>
															<td>g) M.R.I<br>&nbsp;&nbsp;&nbsp;&nbsp;(एम.आर.आय.)</td>
															<td><input type="radio" value="1" name="chk16" class="chhk91" /></td>
															<td><input type="radio" value="2" name="chk16" class="chhk92" /></td>
															<td><input type="radio" value="3" name="chk16" class="chhk93" /></td>
															<td><input type="radio" value="4" name="chk16" class="chhk94" /></td>
															<td><input type="radio" value="5" name="chk16" class="chhk95" /></td>
															<td><input type="radio" value="-5" name="chk16" class="chhk96" /></td>
														</tr>
														<tr>
															<td>10) Physiotherapy<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(फिजियोथेरेपी)</td>
															<td><input type="radio" value="1" name="chk17" class="chhk97" /></td>
															<td><input type="radio" value="2" name="chk17" class="chhk98" /></td>
															<td><input type="radio" value="3" name="chk17" class="chhk99" /></td>
															<td><input type="radio" value="4" name="chk17" class="chhk100" /></td>
															<td><input type="radio" value="5" name="chk17" class="chhk101" /></td>
															<td><input type="radio" value="-5" name="chk17" class="chhk102" /></td>
														</tr>
														<tr>
															<td>11) Cleanliness & Hygeine<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(स्वच्छता और  हायजिन)</td>
															<td><input type="radio" value="1" name="chk18" class="chhk103" /></td>
															<td><input type="radio" value="2" name="chk18" class="chhk104" /></td>
															<td><input type="radio" value="3" name="chk18" class="chhk105" /></td>
															<td><input type="radio" value="4" name="chk18" class="chhk106" /></td>
															<td><input type="radio" value="5" name="chk18" class="chhk107" /></td>
															<td><input type="radio" value="-5" name="chk18" class="chhk108" /></td>
														</tr>
														<tr>
															<td>12) Drinking Water Facilities<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(पेयजल की सुविधा)</td>
															<td><input type="radio" value="1" name="chk19" class="chhk109" /></td>
															<td><input type="radio" value="2" name="chk19" class="chhk110" /></td>
															<td><input type="radio" value="3" name="chk19" class="chhk111" /></td>
															<td><input type="radio" value="4" name="chk19" class="chhk112" /></td>
															<td><input type="radio" value="5" name="chk19" class="chhk113" /></td>
															<td><input type="radio" value="-5" name="chk19" class="chhk114"/></td>
														</tr>
														<tr>
															<td>13) Toilet Facility<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(शौचालय सुविधा)</td>
															<td><input type="radio" value="1" name="chk20" class="chhk115" /></td>
															<td><input type="radio" value="2" name="chk20" class="chhk116" /></td>
															<td><input type="radio" value="3" name="chk20" class="chhk117" /></td>
															<td><input type="radio" value="4" name="chk20" class="chhk118" /></td>
															<td><input type="radio" value="5" name="chk20" class="chhk119" /></td>
															<td><input type="radio" value="-5" name="chk20" class="chhk120"/></td>
														</tr>
														<tr>
															<td>14) Cafeteria<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(कॅफेटेरिया)</td>
															<td><input type="radio" value="1" name="chk21" class="chhk121" /></td>
															<td><input type="radio" value="2" name="chk21" class="chhk122" /></td>
															<td><input type="radio" value="3" name="chk21" class="chhk123" /></td>
															<td><input type="radio" value="4" name="chk21" class="chhk124" /></td>
															<td><input type="radio" value="5" name="chk21" class="chhk125" /></td>
															<td><input type="radio" value="-5" name="chk21" class="chhk126" /></td>
														</tr>
														<tr>
															<td>15) Information & Sign Board<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(सूचना और साइन बोर्ड)</td>
															<td><input type="radio" value="1" name="chk22" class="chhk127" /></td>
															<td><input type="radio" value="2" name="chk22" class="chhk128" /></td>
															<td><input type="radio" value="3" name="chk22" class="chhk129" /></td>
															<td><input type="radio" value="4" name="chk22" class="chhk130" /></td>
															<td><input type="radio" value="5" name="chk22" class="chhk131" /></td>
															<td><input type="radio" value="-5" name="chk22" class="chhk132" /></td>
														</tr>
														<tr>
															<td>16) Parking Facility<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(पार्किंग सुविधा)</td>
															<td><input type="radio" value="1" name="chk23" class="chhk133" /></td>
															<td><input type="radio" value="2" name="chk23" class="chhk134" /></td>
															<td><input type="radio" value="3" name="chk23" class="chhk135" /></td>
															<td><input type="radio" value="4" name="chk23" class="chhk136" /></td>
															<td><input type="radio" value="5" name="chk23" class="chhk137" /></td>
															<td><input type="radio" value="-5" name="chk23" class="chhk138" /></td>
														</tr>
														<tr>
															<td>17) Security Staff<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(सुरक्षा कर्मचारी)</td>
															<td><input type="radio" value="1" name="chk24" class="chhk139" /></td>
															<td><input type="radio" value="2" name="chk24" class="chhk140" /></td>
															<td><input type="radio" value="3" name="chk24" class="chhk141" /></td>
															<td><input type="radio" value="4" name="chk24" class="chhk142" /></td>
															<td><input type="radio" value="5" name="chk24" class="chhk143" /></td>
															<td><input type="radio" value="-5" name="chk24" class="chhk144" /></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-lg-12">
											<hr style="margin-top:0px;border:1px solid #900;"/>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Reason for Dissatisfaction with above services / Facilities(उपरोक्त सेवाओं / सुविधाओं के साथ असंतोष का कारण)</label>
											<div class="col-lg-7">
												<textarea type="text" col="3" name="mo8" id="mo8" class="form-control" ></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Any other Suggestion / Complaints<br>(कोई अन्य सुझाव / शिकायत)</label>
											<div class="col-lg-7">
												<textarea type="text" col="3" name="mo9" id="mo9" class="form-control" ></textarea>
											</div>
										</div>
										
										<div class="col-lg-12">
											<label class="col-lg-4">Signature<br>( हस्ताक्षर / दस्तख़त)</label>
											<div class="col-lg-8">
												<div style="display: none" id="showimage"></div>
											</div>
										</div>
										
										<div class="col-lg-12">
											<label class="col-lg-4 drawItDesc">Signature<br>( हस्ताक्षर / दस्तख़त)</label>
											<div class="col-lg-7">
												<ul class="sigNav">
												  <li class="drawIt"><a href="#draw-it" >Draw It</a></li>
												  <li class="clearButton"><a href="#clear" id="clearsign">Clear</a></li>
												</ul>
												<div class="sig sigWrapper">
												  <div class="typed"></div>
												  <canvas class="pad" width="250" height="150"></canvas>
												  <input type="hidden" name="output" class="output">
												</div>
											</div>
										</div>
										
										
										
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />
												<button style="color:white;font-weight:bold;" accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" >Submit Details ( Alt + s )</button>
											</div>
											<div class="col-lg-6">	
												<button type="button" class="btn btn-default pull-left" id="close_btn">Close</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						
						
                        <div class="box" id="bx2">
							<div class="panel-body">
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:#2b6a9f;">
											<tr>
												<th>Action</th>
												<th>Sr No</th>
												<th>Date</th>
												<th>Name (Optional)</th>
												<th>Age</th>
												<th>Sex</th>
												<th>Email</th>
												<th>Address</th>
												<th>Treating Doctor</th>
												<th>Heard about hospital from</th>
												<th>Other</th>
												<th>Score (Out of 120)</th>
												<th>Recorded By</th>
												
											</tr>
										</thead>
									</table>
								</div>								
							</div>
							<form method="post" action="../excel/IPD-FEED/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										
										
                                    <input type="submit" name="export" class="btn btn-danger" value="Excel" style="color:white;font-weight:bold;"
									/>
    
									</div>
									</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="opdf">
					
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1">From</label>
							<div class="col-lg-3">
								<input style="border:1px solid black;" type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1">To</label>
							<div class="col-lg-3">
								<input style="border:1px solid black;" type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" style="color:white;font-weight:bold;">SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_ipdf" style="height:400px;"></div>
					</div>
				</div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->  
    </div>
</section>

</body>
</html>
<!--script for signature start-->
<script src="testsign/js/jquery.signaturepad.js"></script>
<script src="testsign/assets/json2.min.js"></script>
 <script>
		$(document).ready(function() {
		$('.sigPad').signaturePad({drawOnly:true});
											});
 </script>
<!--script for signature start-->
						
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#mo6").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$(function(){  
			$("#dt").datepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
		});
		
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});
		$('#add_btn').click(function(){
			$('#user_form')[0].reset();
			$('#bx1').show('fast');
			$('#adm').show('fast');
			$('#add_btn').hide('fast');
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			$('#mo1').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			//$('#bofid').load("load_ipdno.php");
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_ipd_form.php",
				type:"POST"
			},
			"columnDefs":[
				{
					"targets":[0, 3, 4],
					"orderable":false,
				},
			],
		});
		$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			if(confirm("Are you sure you want to Submit this?"))
			{
				$("#action").attr("disabled", true);
				$.ajax({
					url:"insert_ipd_form.php",
					method:'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert(data);
						$("#clear").click();
						$('#user_form')[0].reset();
						$('#adm').hide('fast');
						$('#bx1').hide('fast');
						$('#bx2').show('fast');
						$('#add_btn').show('fast');
						dataTable.ajax.reload();
					}
				});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_ipd_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#bx2').hide('fast');
					$('#add_btn').hide('fast');
					$('#sr_no').focus();
					$('#sr_no').val(data.sr_no);
					$('#dt').val(data.dt);
					$('#mo1').val(data.mo1);
					$('#mo2').val(data.mo2);
					$('#mo3').val(data.mo3);
					$('#em').val(data.em);
					$('#mo4').val(data.mo4);
					$('#mo5').val(data.mo5);
					//$('#tvv').val(data.chkk1);
					//$('#prtt').val(data.chkk2);
					//$('#medd').val(data.chkk3);
					$('#mo7').val(data.mo7);
					$('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
					$('input:radio[name="chk2"]').filter('[value="'+data.chk2+'"]').attr('checked', true);
					$('input:radio[name="chk3"]').filter('[value="'+data.chk3+'"]').attr('checked', true);
					$('input:radio[name="chk4"]').filter('[value="'+data.chk4+'"]').attr('checked', true);
					$('input:radio[name="chk5"]').filter('[value="'+data.chk5+'"]').attr('checked', true);
					$('input:radio[name="chk6"]').filter('[value="'+data.chk6+'"]').attr('checked', true);
					$('input:radio[name="chk7"]').filter('[value="'+data.chk7+'"]').attr('checked', true);
					$('input:radio[name="chk8"]').filter('[value="'+data.chk8+'"]').attr('checked', true);
					$('input:radio[name="chk9"]').filter('[value="'+data.chk9+'"]').attr('checked', true);
					$('input:radio[name="chk10"]').filter('[value="'+data.chk10+'"]').attr('checked', true);
					$('input:radio[name="chk11"]').filter('[value="'+data.chk11+'"]').attr('checked', true);
					$('input:radio[name="chk12"]').filter('[value="'+data.chk12+'"]').attr('checked', true);
					$('input:radio[name="chk13"]').filter('[value="'+data.chk13+'"]').attr('checked', true);
					$('input:radio[name="chk14"]').filter('[value="'+data.chk14+'"]').attr('checked', true);
					$('input:radio[name="chk15"]').filter('[value="'+data.chk15+'"]').attr('checked', true);
					$('input:radio[name="chk16"]').filter('[value="'+data.chk16+'"]').attr('checked', true);
					$('input:radio[name="chk17"]').filter('[value="'+data.chk17+'"]').attr('checked', true);
					$('input:radio[name="chk18"]').filter('[value="'+data.chk18+'"]').attr('checked', true);
					$('input:radio[name="chk19"]').filter('[value="'+data.chk19+'"]').attr('checked', true);
					$('input:radio[name="chk20"]').filter('[value="'+data.chk20+'"]').attr('checked', true);
					$('input:radio[name="chk21"]').filter('[value="'+data.chk21+'"]').attr('checked', true);
					$('input:radio[name="chk22"]').filter('[value="'+data.chk22+'"]').attr('checked', true);
					$('input:radio[name="chk23"]').filter('[value="'+data.chk23+'"]').attr('checked', true);
					$('input:radio[name="chk24"]').filter('[value="'+data.chk24+'"]').attr('checked', true);					
					$('#mo8').val(data.mo8);
					$('#mo9').val(data.mo9);

					$("#showimage").empty();
					if(data.user_sign !=''){

						html ='<img src="users_signs/'+data.user_sign+'" alt="'+data.user_sign+'" width="400" height="300">';
						
						
						$("#showimage").append(html);

						$("#showimage").show();
						

					}



					$('#clearsign').click();
					$('#user_id').val(data.sr_no);
					$('#action').val("Update Details ( Alt + s )");
					$('#operation').val("Edit");					
					$("#action").attr("disabled", false);
				}
			})
		});
	});
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#mo6').mask('9999-99-99');// for  To Date
		$('#frdate').mask('9999-99-99');// for Date
		$('#todate').mask('9999-99-99');// for Date
	});
</script>
<script type="text/javascript">	
		// Load the Visualization API and the piechart package.
		google.charts.load('current', {'packages':['corechart']});
		  
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(line_chart);
		
		function line_chart() 
		{
			var frdate = $('#frdate').val();
			var todate = $('#todate').val();
			if(frdate != '' && todate != '')
			{
				// chart three
					var jsonData = $.ajax({
					url: 'ipd_satis_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Overall IPD Satisfaction Rating',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								vAxis: { minValue: 0 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_ipdf'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
			}	
		}	
</script>