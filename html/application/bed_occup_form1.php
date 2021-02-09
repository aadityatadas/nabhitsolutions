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
	<?php include"nav-bar-reception.php";?>
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px;">
                            Bed Occupancy Form
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
									<input type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
								<div class="col-lg-1">
									<button type="button" title="Click here to search data" name="filter" id="filter" onclick="LoadData2();" class="btn btn-success pull-left">SEARCH</button>
								</div>
								<div class="col-lg-1">
									<button type="button" title="Click here to reload data" name="reload" id="reload" onclick="LoadData3();" class="btn btn-default pull-right"><i class="ace-icon fa fa-refresh bigger-120"></i></button>
								</div>
							</div>
							<div class="col-lg-12">
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:darkblue;">
											<tr>
												<!--<th>Action</th>-->
												<th>Sr.No.</th>
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>IPD No</th>
												<th>Date of Admission</th>
												<th>Dischage/DAMA/Death</th>
												<th>Date of Dischage/DAMA/Death</th>
												<th>Lenth of Stay</th>
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
									<div class="panel-heading">
										Indicator & Graphs For Today <?php echo $dt;?>
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="bof">
											<?php include"bof_count.php";?>
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
		});
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
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