
<?php

   $query1 = "SELECT * FROM $main_tableAll where $s_audit_name=1";

	
	
	$statement1 = $connection->prepare($query1);
	$r= $statement1->execute();
	
	$quaters = $statement1->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="panel panel-default" style="margin-bottom: 20px">

							<form method="post" action="../audit_file/<?=$fold?>/excel.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-2" style="color: black;">	
										Audit Details
									</div>
								<div class="col-lg-3">
												<select type="text" name="quater_r" id="quater_r" class="form-control find_quater" required="true" required="">
														<option value="">--select quater--</option>
	                                  <?php foreach ($quaters as $key => $quater) { ?>
	
													<option value="<?=$quater['id']?>"><?php echo $quater['quater_name']."(".$quater['audit_year'].")" ;?></option>
										<?php } ?>			
												</select>
								</div>
											<div class="col-lg-3">
												<input type="text" name="start" id="start" class="form-control" readonly />
												
								</div>

								<div class="col-lg-3">
												<input type="text" name="end" id="end" class="form-control" readonly />
												
								</div>
                                  <input type="hidden" name="selectedquater_id" id="quater1" class="form-control" readonly />

                                  <input type="hidden" name="selected_audit_name" id="audit_name1" class="form-control" readonly  />

                                   <input type="hidden" name="selected_audit_year" id="year1" class="form-control" readonly  />

                                    <input type="hidden" name="selected_quater_name" id="qaterName" class="form-control" readonly  />

                                   <input type="hidden" name="frmDate" id="frm1" class="form-control" readonly  />

                                   <input type="hidden" name="toDate" id="to1" class="form-control" readonly  />
								
								<div class="col-lg-1">
								
										<input type="submit" style="color: white;"  name="export" class="btn btn-danger" value="Excel" />
									</div>
									</div>
								</form>


								<form method="post" action="../php_pdf_chart/<?=$pdf?>" class="panel-heading" target="print_popup"  onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
									<!-- <form method="post" action="../php_pdf_chart/<?=$pdf?>" class="panel-heading"   > -->

									<div class="panel-heading">
									<div class="col-lg-2" style="color: black;">	
										Audit Details(Report)
									</div>
								<div class="col-lg-3">
												<select type="text" name="quater_r" id="quater_r" class="form-control find_quater1" required="true" required="">
														<option value="">--select quater--</option>
	                                  <?php foreach ($quaters as $key => $quater) { ?>
	
													<option value="<?=$quater['id']?>"><?php echo $quater['quater_name']."(".$quater['audit_year'].")" ;?></option>
										<?php } ?>			
												</select>
								</div>
											<div class="col-lg-3">
												<input type="text" name="start1" id="start1" class="form-control" readonly />
												
								</div>

								<div class="col-lg-3">
												<input type="text" name="end1" id="end1" class="form-control" readonly />
												
								</div>
                                  <input type="hidden" name="selectedquater_id1" id="quater11" class="form-control" readonly />

                                  <input type="hidden" name="selected_audit_name1" id="audit_name11" class="form-control" readonly  />

                                   <input type="hidden" name="selected_audit_year1" id="year11" class="form-control" readonly  />

                                    <input type="hidden" name="selected_quater_name1" id="qaterName1" class="form-control" readonly  />

                                   <input type="hidden" name="frmDate1" id="frm11" class="form-control" readonly  />

                                   <input type="hidden" name="toDate1" id="to11" class="form-control" readonly  />
								
								<div class="col-lg-1">
								
										<input type="submit" style="color: white;"  name="export" class="btn btn-danger" value="Report" />
									</div>
									</div>
								</form>

							
									
							
									</div>



<script type="text/javascript">
	$('.find_quater').change(function(){  
			var testn = $(this).val(); 			
			$.ajax({  
				url:"quater_audit_data/load_quater_audit_report.php",  
				method:"POST",  
					data:{testn:testn , tbl:'<?=$main_tableAll?>', tbl2 :'tbl_huf',audit_name:'<?=$s_audit_name?>'},
				dataType:"json",				
				success:function(data)
				{  
					 



					
					$('#start').val(data.from_a);
					$('#end').val(data.to_a);
					
					$('input[name="selectedquater_id"]').val(data.id);

					$('input[name="selected_audit_name"]').val(data.audit_name);
					$('input[name="selected_audit_year"]').val(data.audit_year);

					$('input[name="selected_quater_name"]').val(data.quater_name);

					

					$('input[name="frmDate"]').val(data.from_a);
					$('input[name="toDate"]').val(data.to_a);



					



				}  
			});  
		});

	$('.find_quater1').change(function(){  
			var testn = $(this).val(); 			
			$.ajax({  
				url:"quater_audit_data/load_quater_audit_report.php",  
				method:"POST",  
					data:{testn:testn , tbl:'<?=$main_tableAll?>', tbl2 :'tbl_huf',audit_name:'<?=$s_audit_name?>'},
				dataType:"json",				
				success:function(data)
				{  
					 



					
					$('#start1').val(data.from_a);
					$('#end1').val(data.to_a);
					
					$('input[name="selectedquater_id1"]').val(data.id);

					$('input[name="selected_audit_name1"]').val(data.audit_name);
					$('input[name="selected_audit_year1"]').val(data.audit_year);

					$('input[name="selected_quater_name1"]').val(data.quater_name);

					

					$('input[name="frmDate1"]').val(data.from_a);
					$('input[name="toDate1"]').val(data.to_a);



					



				}  
			});  
		});
</script>