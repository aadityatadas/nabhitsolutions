<?php
	error_reporting(0);
	session_start();
	include"header.php";
?>
  <?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
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
	error_reporting(0);
	session_start();
	include"dbinfo.php";
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
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$qry123 = mysqli_query($connect,"SELECT SUM(vent_tcd) as std FROM tbl_huf WHERE vent_dt_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
	$res123 = mysqli_fetch_assoc($qry123);
	$i_count12 = $res123["std"];
	$qry213 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (vent_dt_iuc BETWEEN '$frdt' AND '$todt') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
	$v_count123 = mysqli_num_rows($qry213);
	$vap_count123 = $v_count123*1000/$i_count12;
	
?>

<?php include"footer.php";?>
<!--<!doctype html>
<html>

  <head>
    <meta charset="utf-8" />
    <title>Reverse</title>
    <meta name="viewport" content="width=device-width">
    <style>
    .wrapper {
      position: relative;
      width: 640px;
      height: 480px;
      margin: 50px auto 0 auto;
      padding-bottom: 30px;
      border: 1px solid #ccc;
      border-radius: 3px;
      clear: both;
    }

    .box {
      float: left;
      width: 50%;
      height: 50%;
      box-sizing: border-box;
    }

    .container {
      width: 450px;
      margin: 0 auto;
      text-align: center;
    }

    .gauge {
      width: 320px;
      height: 240px;
    }

    button {
      margin: 30px 5px 0 2px;
      padding: 16px 40px;
      border-radius: 5px;
      font-size: 18px;
      border: none;
      background: #34aadc;
      color: white;
      cursor: pointer;
    }
    </style>
  </head>

  <body>
    <div class="wrapper">
      <div class="box">
        <div id="g1" class="gauge"></div>
      </div>
      <div class="box">
        <div id="g2" class="gauge"></div>
      </div>
      <div class="box">
        <div id="g3" class="gauge"></div>
      </div>
      <div class="box">
        <div id="g4" class="gauge"></div>
      </div>
    </div>
    <div class="container">
      <button type="button" id="gauge_refresh">Refresh Gauges</button>
    </div>
    <script src="raphael-2.1.4.min.js"></script>
    <script src="justgage.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {

      var g1 = new JustGage({
        id: 'g1',
        value: <?php echo $A_count;?>,
        min: 0,
        max: 100,
        reverse: true,
        gaugeWidthScale: 0.6,
        customSectors: [{
          color: '#ff0000',
          lo: 50,
          hi: 100
        }, {
          color: '#00ff00',
          lo: 0,
          hi: 50
        }],
        counter: true
      });

      var g2 = new JustGage({
        id: 'g2',
        value:<?php echo $i_count;?>,
        min: 0,
        max: 100,
        reverse: true,
        gaugeWidthScale: 0.6,
        counter: true
      });

      var g3 = new JustGage({
        id: 'g3',
        value: <?php echo $dis_count;?>,
        min: 0,
        max: 100,
        humanFriendly : true,
        reverse: true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 50000,
          hi: 100000
        }, {
          color: "#00ff00",
          lo: 0,
          hi: 50000
        }],
        counter: true
      });

      var g4 = new JustGage({
        id: 'g4',
        value: 90,
        min: 0,
        max: 100,
        symbol: '%',
        reverse: true,
        gaugeWidthScale: 0.1,
        counter: true
      });

      document.getElementById('gauge_refresh').addEventListener('click', function() {
        g1.refresh(getRandomInt(0, 100));
        g2.refresh(getRandomInt(0, 100));
        g3.refresh(getRandomInt(0, 100000));
        g4.refresh(getRandomInt(0, 100));
      });
    });
    </script>
  </body>

</html>-->
	
<body>
    <?php include"nav-bar-con-officer.php";?>
	<div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header"><a href="#" style="text-decoration:none;">Dashboard</a>&nbsp; &nbsp; &nbsp; Month : <?php echo date('M-Y');?></h4>
										
									
                </div>
                <!-- /.col-lg-12 -->

                
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $i_count;?></div>
                                    <!--<div><a href="Total No. of Inpatient Days">Details</a></div>-->
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="#">Total No. of Inpatient Days</span></a>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $A_count;?></div>
                                   <!-- <div>Events Calendar</div>-->
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="#">Total No. of Admissions</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $dis_count;?></div>
                                    <!--<div>FEES</div>-->
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="#">Total No. of Discharges</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $dm_count;?></div>
                                    <!--<div>Attendance</div>-->
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="#">Total No. of DAMA</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
			<!-- Second Row -->
			<div class="row">
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $dh_count;?></div>
                                    <!--<div>GALLERY</div>-->
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="#">Total No. of Death</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $mlc_count;?></div>
                                   <!-- <div>FEEDBACK</div>-->
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="#">Total No. of MLC</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        
                                        <?php echo number_format($los_count ,2);?>
                                    
                                    
                                    </div>
                                    <div>Days</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="#">Average Length of stay </a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $s_count;?></div>
                                    <!--<div>Bus Tracker</div>-->
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="#">Total No. of Surgeries</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        
                    </div>
                </div>                
			</div>	
		
		
        <!-- /#page-wrapper -->
        
        

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');	
?>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('huf_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp_chart').load('hosp_chart.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds

</script>
<!--
<script type="text/javascript"> 
	$(document).ready(function () {
		$("#bx1").niceScroll({ autohidemode: true })
		$("#bx2").niceScroll({ autohidemode: true })
	});
</script>-->
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
</style>
<body>
	
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="hosp">
					
										</div>
										<br />
										<div id="hosp_chart">
											
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->   
              <div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="int">
					
										</div>
										<div id="int_chart">
											<?php include "int_chart.php";?>
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>	 
               <div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="vent">
											
										</div>
										<br />
										<div id="vent_chart">
											<?php include "vent_chart.php";?>
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>	
               <div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Cather Associated Unrinary Tract Infection
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="cath">
					
										</div>
										<br />
										<div id="cath_chart">
											<?php include "cath_chart.php";?>
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>	
               <div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Central Line Associated Blood Stream Infection Form
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="cent">
					
										</div>
										<br />
										<div id="cent_chart">
											<?php include "cent_chart.php";?>
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>	
               <div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Surgical Site Infection Form
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="ssi">
					
										</div>
										<br />
										<div id="surg_chart">
											<?php include "surg_chart.php";?>
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>

<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										OPD Waiting Time Form
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="opdwt">
					
										</div>
										<br />
										<div id="opdwt_chart">
											<?php include "opdwt_chart.php";?>
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>	
<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Neddle Prick Injury Form
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="needl">
					
										</div>
										<br />
										<div id="needl_chart">
											
											<?php include "needl_chart.php";?>
										
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>	
	<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div class="col-lg-12" id="senti">
					
										</div>
										<br />
										<div class="col-lg-12" id="senti_chart">
											<?php include "senti_chart.php";?>
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                    
</body>
</html>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#d_adm").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#dddd").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		
		$(function(){  
			$("#d_adm").datepicker();
			$("#dddd").datepicker();
			$("#t_adm").timepicker();
			$("#tddd").timepicker();
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
			$('#p_name').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			$('#sr').load("load_hospno.php");
			$('#nm').text("New Receipt");
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
				url:"fetch_hosp_form.php",
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
			var p_name = $('#p_name').val();
			if(p_name != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"insert_hosp_form.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);
							$('#user_form')[0].reset();
							$('#adm').hide('fast');
							$('#bx1').hide('fast');
							$('#bx2').show('fast');
							$('#add_btn').show('fast');
							//$('#myModal').modal('hide');
							dataTable.ajax.reload();
						}
					});
				}
			}else{
				alert('Please enter patinet name');
				$('#p_name').focus();
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"fetch_single_hosp_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#cb').show();
					$('#p_name').focus();
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					$('#uhid_no').val(data.uhid_no);
					$('#ipd_no').val(data.ipd_no);
					$('#d_adm').val(data.d_adm);
					$('#t_adm').val(data.t_adm);
					$('#ddd').val(data.ddd);
					$('#dddd').val(data.dddd);
					$('#tddd').val(data.tddd);
					$('#mlc').val(data.mlc);
					$('#surg').val(data.surg);
					$('#los').val(data.los);
					$('#user_id').val(data.sr_no);
					$('#action').val("Update Details ( Alt + s )");
					$('#operation').val("Edit");					
					$("#action").attr("disabled", false);
				}
			})
		});
		$(document).on('click', '.delete', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"delete_hosp_form.php",
					method:"POST",
					data:{user_id:user_id},
					success:function(data)
					{
						alert(data);
						dataTable.ajax.reload();
					}
				});
			}
			else
			{
				return false;	
			}
		});
		$('.price').keyup(function (){
			var tot = 0;
			$('.price').each(function(){
				tot += Number($(this).val());
			});
			$('#mod26').val(tot);			
		});
		$('.price2').keyup(function (){
			var sp = 0;
			$('.price2').each(function(){
				sp += Number($(this).val());
			});
			$('#mod14').val(sp);			
		});
	});
	function NumAndTwoDecimals(e, field) {  
        var val = field.value;  
        var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;  
        var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g;  
        if (re.test(val)) {  

        }  
        else {  
			val = re1.exec(val);  
			if (val) {  
			field.value = val[0];  
			}  
			else {  
			field.value = "";  
			}  
        }  
    }
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#d_adm').mask('9999-99-99');// for Birth Date
		$('#dddd').mask('9999-99-99');// for Joining Date
		$('#t_adm').mask('99:99');// for Birth Date
		$('#tddd').mask('99:99');// for Joining Date
	});
</script>

</body>
</html>
<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({  
				dateFormat: 'yy-mm-dd'   
		});  
		$(function(){  
			$("#frdate").datepicker();
			$("#todate").datepicker();
		});
		$("#frdate").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#todate").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
	});
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';      
		$('#frdate').mask('9999-99-99');// for  To Date
		$('#todate').mask('9999-99-99');// for  To Date
	});
</script>

