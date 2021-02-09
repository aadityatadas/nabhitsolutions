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
 

<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> -->
<!-- <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" /> -->
<!-- Custom Css -->
<!-- <link href="../assets/css/main.css" rel="stylesheet"> -->
<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<!-- <link href="../assets/css/themes/all-themes.css" rel="stylesheet" /> -->
 <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
 <!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<div>
<form method="post" enctype="multipart/form-data"  id="faq_apex">
                                    
                                        <div class="container" style="width: 800px;">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->
<!-- Total(<span id="total_faq_apex">0</span>) <br>Q.I&nbsp;Completed(<span id="total_faq_qi_y_apex">0</span>)&nbsp;,&nbsp;Not-Completed(<span id="total_faq_qi_n_apex">0</span>)<br>HR&nbsp;Completed(<span id="total_faq_hr_y_apex">0</span>)&nbsp;,&nbsp;Not-Completed(<span id="total_faq_hr_n_apex">0</span>)
  -->                                              <button style="background-color: #607D8B;width: 400px;" type="button" class="btn btn-info btn-lg" class="                                                            show_faq_apex" id="show_faq_apex">FAQ’S FOR APEX MANUAL </button>

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
                                                                            <th>QI</th>
                                                                            <th>HR</th>
                                                                            
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
                                                 <div style="float: right;" class="show_faq_apex" id="show_faq_apex">
                                                     <table id="showtab">
                                                         <tr>
                                                            <td>Total(<span id="total_faq_apex">0</span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>QI</td>
                                                            <td><span id="total_faq_qi_y_apex">0</span></td>
                                                            <td><span id="total_faq_qi_n_apex">0</span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>HR</td>
                                                            <td><span id="total_faq_hr_y_apex">0</span></td>
                                                            <td><span id="total_faq_hr_n_apex">0</span></td>
                                                         </tr>
                                                     </table>
                                                 </div>
                                     </div>
                                                                                        
                                 </form>
                                
                            <div>
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




                    // $('#action').val("Update Details");
                    $('#myModal1').modal('show');                   
                    
                }
            })
        });
 </script>
 <!-- Jquery Core Js --> 
<!-- <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> -->
<script src="../assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js --> 
<!-- <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->  -->

<!-- <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js --> -->
<!-- <script src="../assets/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js -->  -->

<script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<!-- <script src="../assets/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js -->  -->
<script src="../assets/js/pages/index.js"></script>
<script src="../assets/js/pages/charts/sparkline.min.js"></script>