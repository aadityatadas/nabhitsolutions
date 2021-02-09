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

date_default_timezone_set('Asia/Calcutta');
$frdt = date('Y-m-01');
$todt = date('Y-m-31');

 $to = date('Y-m-t');

 
?>
<!------ jquery for high chart-->


<?php include_once('high_chart_js.php'); ?>
<!------ jquery for high chart end-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="../data_multiselect/jquery.multiselect.css" type="text/css">
        <script type="text/javascript" src="../data_multiselect/jquery.multiselect.js"></script>
<!-- <script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#hosp').load('huf_count.php').fadeIn("slow");
}, 1000); // refresh every 5000 milliseconds

</script> -->

<link rel="stylesheet" type="text/css" href="sample_size_data/sample_size.css">
 <script type="text/javascript" src="sample_size_data/sample_size.js"></script>
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
#bxAudit,
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
<?php include"superadmin-nav-bar.php";?>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px;">
                           Medical Records Audit
<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Select Patient</b></button>
                        </div>

                      <!--   audit select start -->
                         <div class="box" id="bxAudit" style="Overflow: visible;">
<div class="panel-body">
<form method="post" id="audit_form1" enctype="multipart/form-data">

<div class="col-lg-12">
<label class="col-lg-4">Select Month of Data Entered</label>
<div class="col-lg-2">
<input type="text" autocomplete="off" name="hrdt" id="hrdt" placeholder="yyyy-mm-dd" class="form-control" required />
</div>
<div class="col-lg-4">
<input type="text" name="hrmon" id="hrmon" class="form-control" readonly />
</div>
<div class="col-lg-4">
<input type="hidden" name="auditSelectedMonth" id="auditSelectedMonth" class="form-control" readonly />
</div>
<div class="col-lg-4">
<input type="hidden" name="auditSelectedYear" id="auditSelectedYear" class="form-control" readonly />
</div>
</div>

<div class="col-lg-12">

    <div class="simple_calc">
 <table class="determine" >
   <tr>
     <td align='center'>
 <table>
 <CAPTION>
            <p><b>Determine Sample Size</b>

 </CAPTION>
 <tr>
   <td>Confidence Level:</td>
   <td>
   
   <input TYPE="RADIO" NAME="ConLevBut" VALUE="1" class="" onclick="ConLevButF1(this.form)"
  Checked>90%
     <input TYPE="RADIO" NAME="ConLevBut" VALUE="2" class="sil" onclick="ConLevButF2(this.form)"
  >95%
     <input TYPE="RADIO" NAME="ConLevBut" VALUE="3" onclick="ConLevButF3(this.form)"
 >99%</td>
 </tr>
 <tr>

   <td>Confidence Interval:</td>
   <td>
     <input type="text" name="box" size=15 class="form-control"></td>
 </tr>
 <tr>
   <td>Population:</td>
   <td>
     <input type="text" name="popbox" size=15 onKeyUp="this.value=iVal(this.value)" id="popbox" class="form-control"></td>

 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td colspan='2' align='center'>
<input type = "button" class='btn_s form-control' name = "Calculate" value = "&nbsp; Calculate &nbsp;" onClick ="to(this.form)">
     
<!-- &nbsp;&nbsp;&nbsp;&nbsp; <input type = "button" class='btn_s' name = "Clear" value = " &nbsp;  Clear &nbsp;  " onClick ="cler(this.form,'')"> -->
     </td>
 </tr>
 <tr>
   <td></td>
   <td></td>
 </tr>

 
</table>
     </td>
   </tr>

 </table>
      </div>

     
</div>
<br />
<div class="col-lg-12">
<hr/>
</div>
<div class="col-lg-12">
<div class="col-lg-9" style="padding-left:0;">
<label class="col-lg-3">Sample Size</label>
<div class="col-lg-4">
<input type="text" name="s_size" id="s_size" value="0" class="form-control" placeholder="Enter the sample size" />
</div>
<div class="col-lg-1"></div>
<div class="col-lg-2">

<input type="hidden" name="auditsearch" id="auditsearch"  class="form-control" value="true"  />

<button style="color: white;" accesskey="s" type="submit" name="actionAudit" id="actionAudit" class="btn btn-primary  btn-sm" />SEARCH </button>
</div>

</div>
</div>
</form>
<br />
<div class="col-lg-12" style="padding-top: 30px;padding-bottom: 15px;">
<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  Select Patient</label>

</div>

<br />
<form method="post" id="audit_form2" enctype="multipart/form-data">
<div class="form-group">
    <div class="col-lg-12" >
                        <div class="col-lg-9" style="padding-left:0;">
                            <label class="col-lg-3">Patient List</label>

                                <div class="col-lg-8">
                              <select id="user_data" multiple="multiple" name="PatientList[]"  class="form-control">
                              <option >--select patients--</option>

                             
                       </select>
                       </div>
                       </div>
                    </div>
                </div>


                    <div class="col-lg-12" style="padding-top: 10px">
<div class="col-lg-6">
<input type="hidden" name="monthyear" id="monthyear" />
<input type="hidden" name="operation1" id="operation1" />
<button style="color: white;"


  type="submit" name="actionP" id="actionP" class="btn btn-primary pull-right" />Add Patients ( Alt + s )</button>
</div>
<div class="col-lg-6">
<button type="button" class="btn btn-default pull-left" id="close_btnAudit">Close</button>
</div>
</div>
<div class="col-lg-12">
<hr />
</div>



</form>

                    </div>
</div>

<!-- Large modal -->




 <!--   audit select end -->

<div class="box" id="bx1">
<div id="adm">
<form method="post" id="user_form" enctype="multipart/form-data">
<div class="form-group">
<div class="col-lg-12">
<label class="col-lg-4">Sr. No.</label>
<div class="col-lg-4" id="sr">
<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
</div>
</div>
<div class="col-lg-12">
<label class="col-lg-4">Name of the Patient</label>
<div class="col-lg-7">
<input type="text" list="plist" name="p_name" id="p_name" class="form-control"  readonly="" />
<datalist id="plist"  >

</datalist>
</div>
</div>

<div class="col-lg-12">
<label class="col-lg-4">IPD No</label>
<div class="col-lg-4">
<input type="text" name="ipd_no" id="ipd_no" class="form-control"  readonly=""/>
</div>
</div>



<div class="col-lg-12">
<label class="col-lg-4">Date of Dischage/DAMA/Death (D2)</label>
<div class="col-lg-3">
<input type="text" autocomplete="off" name="dddd" id="dddd" placeholder="yyyy-mm-dd" class="form-control"  readonly=""/>
</div>
</div>

<div class="col-lg-12">
<label class="col-lg-4">Type of Dischage</label>
<div class="col-lg-4">
<input type="text" name="ddd" id="ddd" class="form-control" readonly="">

</div>
</div>


<div class="col-lg-12">
<hr />
</div>
<?php
$dataA=array();

$dataA[0] = array(0=>'MR without Discharge  Summary' , 1 =>'mr_without_dis_summary');
$dataA[1] = array(0=>'MR having Incomplete/ Improper  consent' , 1 =>'mr_having_incm_imp_const');
$dataA[2] = array(0=>'MR without  Sign of consultant  on Initial  Assessment sheet' , 1 =>'mr_without_sign_init_ass_sheet');
$dataA[3] = array(0=>'MR without  Sign of consultant on Medication Order' , 1 =>'mr_without_sign_init_medictn_order');
$dataA[4] = array(0=>'MR without Nursing Asssement' , 1 =>'mr_without_nursing_asst');
$dataA[5] = array(0=>'MR without Nutritional Asssement' , 1 =>'mr_without_nutrition_asst');
$dataA[6] = array(0=>'MR without Physiotherapy Asssement' , 1 =>'mr_without_physipy_asst');
$dataA[7] = array(0=>'Post anaesthesia scoring done & Signed by anaesthtist' , 1 =>'post_anaesthesia_scroing_sign_anaesthist');



?>

<?php foreach ($dataA as $key => $value) { ?>

<div class="col-lg-12" style="padding-bottom: 10px;border-style: ridge;">
<label class="col-lg-4"><?=$value[0]?></label>

<div class="col-lg-4">

<label class="radio-inline">
     <input type="radio" name="<?=$value[1]?>" value="Yes" id="<?=$value[1]?>" checked>Yes
  </label>
  <label class="radio-inline">
     <input type="radio" id="<?=$value[1]?>"  name="<?=$value[1]?>" value="No">No
  </label>
   <label class="radio-inline">
     <input type="radio" id="<?=$value[1]?>"  name="<?=$value[1]?>" value="Na">NA
  </label>
</div>
</div>

<?php } ?>
 


<div class="col-lg-12">
<hr />
</div>
<div class="col-lg-12">
<div class="col-lg-6">
<input type="hidden" name="user_id" id="user_id" />
<input type="hidden" name="operation" id="operation" />
<button style="color: white;" accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit ( Alt + s )</button>
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
<thead style="font-size:12px;color:darkblue;">
<tr>
<th>Action</th>
<th>Sr.No.</th>
<th>Name of the Patient</th>
<!-- <th>AGE</th> -->
<th>IPD No</th>

<th>Audit M/Y</th>
<th>MR without Discharge  Summary</th>
<th>MR having Incomplete/ Improper  consent</th>
<th>MR without  Sign of consultant  on Initial  Assessment sheet</th>
<th>MR without  Sign of consultant on Medication Order</th>
<th>MR without Nursing Asssement</th>
<th>MR without Nutritional Asssement</th>
<th>MR without Physiotherapy Asssement</th>
<th>Post anaesthesia scoring done & Signed by anaesthtist</th>



<th>Recorded By</th>
<th>Updated By</th>
<th>Recorded On</th>
</tr>
</thead>
</table>
</div>
</div>


<div class="col-lg-12" >

<div class="panel panel-default">

<form method="post" action="../audit_file/mrd/excel.php" class="panel-heading">
<div class="panel-heading">
<div class="col-lg-2" style="color: black;">
Audit Details
</div>
<div class="col-lg-2">
<input type="text" autocomplete="off" name="hrdtD" id="hrdtD" placeholder="yyyy-mm-dd" class="form-control" required />
</div>
<div class="col-lg-4">
<input type="text" name="hrmonD" id="hrmonD" class="form-control" readonly />
<input type="hidden" name="auditSelectedMonthD" id="auditSelectedMonthD" class="form-control" readonly />
<input type="hidden" name="auditSelectedYearD" id="auditSelectedYearD" class="form-control" readonly />
</div>
<script type="text/javascript">
$("#hrdtD").datepicker({
showOtherMonths: true,
selectOtherMonths: true,
changeMonth: true,
changeYear: true,
});
$('#hrdtD').change(function(){  
var testn = $(this).val();
$.ajax({  
url:"monthly_audit_data/load_month_audit.php",  
method:"POST",  
data:{testn:testn , tbl2:'tbl_medical_record_audit'},
dataType:"json",
success:function(data)
{  
console.log(data);
$('#hrmonD').val(data.hrmon);
$('#auditSelectedMonthD').val(data.auditSelectedMonth);
$('#auditSelectedYearD').val(data.auditSelectedYear);

}  
});  
});
</script>
<input style="color: white;" type="submit" name="export" class="btn btn-danger" value="Excel" />
</div>
</form>

<form method="post" action="../audit_file/mrd/excel2.php" class="panel-heading">
<div class="panel-heading">
<div class="col-lg-2" style="color: black;">
Audit Details Range
</div>
<div class="col-lg-2">
<input type="text" autocomplete="off" name="hrdtDR1" id="hrdtDR1" placeholder="yyyy-mm-dd" class="form-control" required />
</div>
<div class="col-lg-2">
<input type="text" name="hrmonDR1" id="hrmonDR1" class="form-control" readonly />
<input type="hidden" name="auditSelectedMonthDR1" id="auditSelectedMonthDR1" class="form-control" readonly />
<input type="hidden" name="auditSelectedYearDR1" id="auditSelectedYearDR1" class="form-control" readonly />

</div>
<div class="col-lg-1" style="color: black;">To</div>
<div class="col-lg-2">

<input type="text" autocomplete="off" name="hrdtDR2" id="hrdtDR2" placeholder="yyyy-mm-dd" class="form-control" required />
</div>
<div class="col-lg-2">
<input type="text" name="hrmonDR2" id="hrmonDR2" class="form-control" readonly />
<input type="hidden" name="auditSelectedMonthDR2" id="auditSelectedMonthDR2" class="form-control" readonly />
<input type="hidden" name="auditSelectedYearDR2" id="auditSelectedYearDR2" class="form-control" readonly />
</div>
<script type="text/javascript">
$("#hrdtDR2").datepicker({
showOtherMonths: true,
selectOtherMonths: true,
changeMonth: true,
changeYear: true,
});
$("#hrdtDR1").datepicker({
showOtherMonths: true,
selectOtherMonths: true,
changeMonth: true,
changeYear: true,
});
$('#hrdtDR1').change(function(){  
var testn = $(this).val();
$.ajax({  
url:"monthly_audit_data/load_month_audit.php",  
method:"POST",  
data:{testn:testn , tbl2:'tbl_medical_record_audit'},
dataType:"json",
success:function(data)
{  
console.log(data);
$('#hrmonDR1').val(data.hrmon);
$('#auditSelectedMonthDR1').val(data.auditSelectedMonth);
$('#auditSelectedYearDR1').val(data.auditSelectedYear);

}  
});  
});
$('#hrdtDR2').change(function(){  
var testn = $(this).val();
$.ajax({  
url:"monthly_audit_data/load_month_audit.php",  
method:"POST",  
data:{testn:testn , tbl2:'tbl_medical_record_audit'},
dataType:"json",
success:function(data)
{  

if($('#auditSelectedYearDR1').val()!=data.auditSelectedYear){
$('#hrdtDR2').val('');
alert("Selected Year Must Be same");
return false;
}


console.log(data);
$('#hrmonDR2').val(data.hrmon);
$('#auditSelectedMonthDR2').val(data.auditSelectedMonth);
$('#auditSelectedYearDR2').val(data.auditSelectedYear);

}  
});  
});
</script>
<input style="color: white;" type="submit" name="export" class="btn btn-danger" value="Excel" />
</div>
</form>


<form method="post" action="../reports_docx/samples/mrd_report.php" class="panel-heading" target="print_popup"  onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
<div class="panel-heading">
<div class="col-lg-2" style="color: black;">
Audit Details Range(Report)
</div>
<div class="col-lg-2">
<input type="text" autocomplete="off" name="hrdtDR11" id="hrdtDR11" placeholder="yyyy-mm-dd" class="form-control" required />
</div>
<div class="col-lg-2">
<input type="text" name="hrmonDR11" id="hrmonDR11" class="form-control" readonly />
<input type="hidden" name="auditSelectedMonthDR11" id="auditSelectedMonthDR11" class="form-control" readonly />
<input type="hidden" name="auditSelectedYearDR11" id="auditSelectedYearDR11" class="form-control" readonly />

</div>
<div class="col-lg-1" style="color: black;"> To</div>
<div class="col-lg-2">

<input type="text" autocomplete="off" name="hrdtDR21" id="hrdtDR21" placeholder="yyyy-mm-dd" class="form-control" required />
</div>
<div class="col-lg-2">
<input type="text" name="hrmonDR21" id="hrmonDR21" class="form-control" readonly />
<input type="hidden" name="auditSelectedMonthDR21" id="auditSelectedMonthDR21" class="form-control" readonly />
<input type="hidden" name="auditSelectedYearDR21" id="auditSelectedYearDR21" class="form-control" readonly />
</div>
<script type="text/javascript">
$("#hrdtDR21").datepicker({
showOtherMonths: true,
selectOtherMonths: true,
changeMonth: true,
changeYear: true,
});
$("#hrdtDR11").datepicker({
showOtherMonths: true,
selectOtherMonths: true,
changeMonth: true,
changeYear: true,
});
$('#hrdtDR11').change(function(){  
var testn = $(this).val();

$.ajax({  
url:"monthly_audit_data/load_month_audit.php",  
method:"POST",  
data:{testn:testn , tbl2:'tbl_medical_record_audit'},
dataType:"json",
success:function(data)
{  
console.log(data);
$('#hrmonDR11').val(data.hrmon);
$('#auditSelectedMonthDR11').val(data.auditSelectedMonth);
$('#auditSelectedYearDR11').val(data.auditSelectedYear);

}  
});  
});
$('#hrdtDR21').change(function(){  
var testn = $(this).val();
$.ajax({  
url:"monthly_audit_data/load_month_audit.php",  
method:"POST",  
data:{testn:testn , tbl2:'tbl_medical_record_audit'},
dataType:"json",
success:function(data)
{  

if($('#auditSelectedYearDR11').val()!=data.auditSelectedYear){
$('#hrdtDR21').val('');
alert("Selected Year Must Be same");
return false;
}

console.log(data);
$('#hrmonDR21').val(data.hrmon);
$('#auditSelectedMonthDR21').val(data.auditSelectedMonth);
$('#auditSelectedYearDR21').val(data.auditSelectedYear);

}  
});  
});
</script>
<input style="color: white;" type="submit" name="export" class="btn btn-danger" value="Report" />
</div>
</form>





</div>
</div>
<!-- /.panel -->
</div>
                        </div>
                    </div>
                </div>
<div class="form-group">
<div class="col-lg-12">
<div class="col-lg-8" style="padding-left:0;">
<label class="col-lg-1" style="color: black;">From</label>
<div class="col-lg-3">
<input type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
</div>
<label class="col-lg-1" style="color: black;">To</label>
<div class="col-lg-3">
<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
</div>
<div class="col-lg-4">
<button style="color: white;" type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="line_chart()" >SEARCH</button>
</div>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<?php for($i=0;$i<=7;$i++):?>
<div id="line_chart<?=$i?>" style="height:300px;"></div>
<br>

<?php endfor; ?>



<!-- <div id="container" style="width:100%; height:400px;"></div> -->
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
//$("#t_adm").timepicker();
//$("#tddd").timepicker();
});
$(function(){
$(".preload").fadeOut(300, function(){
$("#bx2").fadeIn(300);
$("#order-table").fadeIn(300);
});
});

$("#hrdt").datepicker({
showOtherMonths: true,
selectOtherMonths: true,
changeMonth: true,
changeYear: true,
});



   

    $('#hrdt').change(function(){  
var testn = $(this).val();
$.ajax({  
url:"monthly_audit_data/load_month_audit.php",  
method:"POST",  
data:{testn:testn , tbl2:'tbl_medical_record_audit' , tbl: 'tbl_huf'},
dataType:"json",
success:function(data)
{  
console.log(data);
$('#hrmon').val(data.hrmon);
$('#auditSelectedMonth').val(data.auditSelectedMonth);
$('#auditSelectedYear').val(data.auditSelectedYear);
$('#popbox').val(data.sample_size);

}  
});  
});

$('#add_btn').click(function(){
alert("k");

$("#user_data").multiselect('reset');
$('#audit_form1')[0].reset();
$('#bxAudit').show('fast');

$('#bx2').hide('fast');
$('#md2').hide('fast');





});

$('#close_btnAudit').click(function(){
$('#audit_form1')[0].reset();

$('#adm').hide('fast');
$('#bx1').hide('fast');
$('#bxAudit').hide('fast');
$('#bx2').show('fast');
$('#add_btn').show('fast');
});
$('#close_btn').click(function(){
$('#audit_form1')[0].reset();
$('#audit_form2')[0].reset();
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
url:"medical_record_audit_d/fetch_medical_record_audit.php",
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
url:"medical_record_audit_d/insert_audit_form.php",
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

});
$(document).on('submit', '#audit_form2', function(event){
event.preventDefault();
// $("#audit_form2").submit(function(event){
var count = ($('#user_data').val().length);



if(count > 0)
{
if(confirm("Are you sure you want to Submit this?"))
{

$.ajax({
url:"medical_record_audit_d/insert_patinet.php",
method:'POST',
data:new FormData(this),
contentType:false,
processData:false,
success:function(data)
{
alert(data);

$('#audit_form1')[0].reset();
               $('#audit_form2')[0].reset();
$('#adm').hide('fast');
$('#bx1').hide('fast');
$('#bxAudit').hide('fast');
$('#bx2').show('fast');
// $('#add_btn').show('fast');
// //$('#myModal').modal('hide');


dataTable.ajax.reload();
   
             
}

});

}
} else{
alert('Please Select  Patient');
$('#user_data').focus();
}


});
$(document).on('click', '.update', function(){
var user_id = $(this).attr("id");
//$('#md1').hide('fast');
//$('#md2').show('fast');
$.ajax({
url:"medical_record_audit_d/fetch_patient_medical_record_audit.php",
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

$('#ipd_no').val(data.ipd_no);


$('#ddd').val(data.ddd);
$('#dddd').val(data.dddd);





for(var k in data) {
 

  $('input:radio[name="'+k+'"]').filter('[value="'+data[k]+'"]').attr('checked', true);
}




$('#user_id').val(data.sr_no);
$('#action').val("Update Details ( Alt + s )");
$('#operation').val("Edit");
$("#action").attr("disabled", false);
}
})
});
// $(document).on('click', '.delete', function(){
// var user_id = $(this).attr("id");
// if(confirm("Are you sure you want to delete this?"))
// {
// $.ajax({
// url:"delete_hosp_form.php",
// method:"POST",
// data:{user_id:user_id},
// success:function(data)
// {
// alert(data);
// dataTable.ajax.reload();
// }
// });
// }
// else
// {
// return false;
// }
// });
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

    $('#user_data').multiselect({
    columns: 1,
    placeholder: 'Select Patients',
    search: true,
    selectAll: true
});

$(document).on('submit', '#audit_form1', function(event){
event.preventDefault();

var s_size = $('#s_size').val();

if(s_size != '' && s_size!=0)
{
if(confirm("Are you sure you want to Submit this?"))
{

$.ajax({
url:"medical_record_audit_d/search_patinet.php",
method:'POST',
data:new FormData(this),
contentType:false,
processData:false,
success:function(html)
{
//console.log(html);
// $('#user_form')[0].reset();
// $('#adm').hide('fast');
// $('#bx1').hide('fast');
// $('#bx2').show('fast');
// $('#add_btn').show('fast');
// //$('#myModal').modal('hide');
// dataTable.ajax.reload();


    $("#user_data").find('option').remove();
              $.each(html, function (key, value) {
                       

                            $('<option>').val(value.huf_id).text(value.huf_pname).appendTo($("#user_data"));

                        });
            $("#user_data").multiselect('reset');

            $("#monthyear").val($("#hrdt").val());
           
}


});

}

} else{
alert('Please enter sample size');
$('#s_size').focus();
}


});




function reloadpage(){

dataTable.ajax.reload();
}

</script>
<script>
$(document).ready(function(){
$.datepicker.setDefaults({  
dateFormat: 'yy-mm-dd'  
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
$("#frdate1").datepicker({
showOtherMonths: true,
selectOtherMonths: true,
changeMonth: true,
changeYear: true,
});
$("#todate1").datepicker({
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
$(function(){  
$("#frdate").datepicker();
$("#todate").datepicker();
$("#frdate1").datepicker();
$("#todate1").datepicker();
$("#frdt").datepicker();
$("#todt").datepicker();



});
});
</script>
<script type="text/javascript">
jQuery(function($) {
$.mask.definitions['~']='[+-]';
$('#d_adm').mask('9999-99-99');// for Birth Date
$('#dddd').mask('9999-99-99');// for Joining Date
//$('#t_adm').mask('99:99');// for Birth Date
//$('#tddd').mask('99:99');// for Joining Date
});
</script>


<?php //include('medical_record_audit_d/chart_display.php'); ?>
