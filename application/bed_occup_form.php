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
	
	$frmdt = date('Y-m-d');
	$todt = date('Y-m-d');
?>

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
</style>
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
<?php include"new-nav-bar.php";?>
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
                        <div class="panel-heading" style="padding:7px;">
                            Bed Occupancy Report

                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px;" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
							<!--<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>-->
                        </div>
                        <div class="box" id="bx2">
							<div class="col-lg-12">
								<br />
							</div>
							<div class="col-lg-12">
								<div class="col-lg-2">
									<input type="text" name="frdt" id="frdt" value="<?php echo $frmdt;?>" placeholder="From date" class="form-control" />
								</div>
								<div class="col-lg-2">
									<input  type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
								<div class="col-lg-1">
									<button style="color:white;font-weight:bold;" type="button" title="Click here to search data" name="filter" id="filter" onclick="LoadData2();" class="btn btn-info pull-left">SEARCH</button>
								</div>
								<!--<div class="col-lg-1">
									<button type="button" title="Click here to reload data" name="reload" id="reload" onclick="LoadData3();" class="btn btn-default pull-right"><i class="ace-icon fa fa-refresh bigger-120"></i></button>
								</div>-->
							</div>
							<div class="col-lg-12">
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:#2b6a9f;">
											<tr>
												<!--<th>Action</th>-->
												<th>Sr.No.</th>
												<th style="width: 10%;text-align:center;">Date</th>
												<th>No. of Admitted patient on the day</th>
												<th>No. of patient Discharge on the day</th>
												<th>Inpatient Days on Day</th>
												<th>No. of Available bed Days</th>
												<th>Bed Occupancy Rate on the day(in %)</th>
												
											</tr>
										</thead>
										<tbody id="ord-table">
											<?php include "fetch_bof_form.php";?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								
									<div class="panel panel-default">
									
									<form method="post" action="../excel/BEDOCU/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-3" style="color:black;">	
										Indicator & Graphs For Today<?php echo $dt;?>
									</div>
								<div class="col-lg-2">
										<input  type="text" name="frdt" id="frdt1" value="<?php echo $frmdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-2" >
									<input type="text" name="todt" id="todt1" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input type="submit" name="export" class="btn btn-danger" value="Excel" style="color:white;font-weight:bold;" />
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="bof">
											<?php include"bof_count.php";?>
										</div>
									</div>
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
</div>
</section>
</body>
</html>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
		dateFormat: 'yy-mm-dd'   
		});
		$(function(){  
			$("#frdt").datepicker();
			$("#todt").datepicker();
			$("#frdt1").datepicker();
			$("#todt1").datepicker();
		});
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});

		$("#frdt1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#todt1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#frdt").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#todt").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
	});
</script>
<script>
	function LoadData2(){
		var frdt = $('#frdt').val();
		var todt = $('#todt').val();
        if(frdt != '' && todt != ''){
			$.ajax({  
                url:"fetch_bof_form2.php",  
                method:"POST",  
                data:{frdt:frdt,todt:todt},
                success:function(data)  
                {  
					$('#ord-table').html(data);								
				}  
            });  
		}
	}
	function LoadData3(){
		$.ajax({  
            url:"fetch_bof_form.php",  
            success:function(data)  
            {  
				$('#ord-table').html(data);
				$('#frdt').val('');
				$('#todt').val('');
			}  
        });
	}
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#frdt').mask('9999-99-99');// for Date
		$('#todt').mask('9999-99-99');// for Date
	});
</script>