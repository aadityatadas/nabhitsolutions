  <?php
                                        $number = range(1,5);
                         foreach ($number as $value) {
                         	  echo $value;
                         }
                                                       ?>



   <!--   start -->

                                    <label class="col-lg-2">Vitals</label>
											<div class="col-lg-4">
												
												<!-- <input type="text" name="Vitals" id="Vitals" class="form-control" placeholder="Vitals" /> -->
									<select type="text" name="Vitals" id="Vitals" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
										 <?php
                                        
                                                foreach($number as $value): ?>
													<option value="<?=$value; ?>"><?=$value; ?></option>
												<?php  endforeach; ?>	
												</select>
											</div>
                                   <label class="col-lg-2">Pain assessment and score</label>
										<div class="col-lg-4">

											<select type="text" name="Pain-assessment-score" id="Pain-assessment-score" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>


											<!-- end -->

 
 
 
 
