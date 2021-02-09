<?php
ob_start();
session_start();

include("../../application/dbinfo.php");

?>

<!DOCTYPE html>
<html>
<style type="text/css">
  .report {
  padding: 10px; 
      border-bottom: 2px solid #8ebf42; 
      text-align: center;
}
</style>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr> 
           <th colspan="4">  
           </th>
           <th colspan="14">
             <img src="<?=HOSPITAL_NAME_IMAGE?>"  alt="" width="400" height="200" >
           </th>

            <th colspan="4">  
           </th>

             
         </tr>
            <tr>
              <th colspan="14" >
               
                <h1 style="text-align: center; text-decoration: underline;"><?=HOSPITAL_NAME?></h1> 
                 <h3 style="text-align: center; text-decoration: underline;">Hr  Audit </h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="14" ></th>

              <th colspan="4" >
               
               <h4><?php
                date_default_timezone_set("Asia/Calcutta");
                echo "<b>"."Time: " . strtoupper(date("h:i:sa"))."<br><br>";?></h4>
               </th>
                    
            </tr>

  </table>


<?php  
//export.php  

$output = '';
include "../date_calculation.php"; 

$month = $_POST['auditSelectedMonthD'];
$year = $_POST['auditSelectedYearD'];

$tbl = 'tbl_hr_audit';

$a_id = $_POST['a_id'];




$query ="SELECT * from $tbl LEFT JOIN tbl_hr_mast 
on tbl_hr_mast.hrid = $tbl.hrid_id 
where $tbl.tbl_hr_audit_date_id= '$a_id' ";



$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;
//echo $mlc_count;
$countid = 1;

$output .= '
   <table class="table" style="" border="1" >  
                    <tr>  
                    <th >Sr. <br>No.</th>
                  <th style="width:2%">Name</th> 
                        <th style="width:2%">Employment <br>Code</th>
                       
                        <th>Employment <br>Application <br>Form </th>
                        <th>Interview <br>Assessment <br>Sheet</th>
                        <th>Resume/ <br>BioData/<br>Curriculum <br>Vitae</th>
                        <th>Pre-Employment<br>HealthCheckUp</th>
                        <th>Identity <br>Proof <br>Document</th>
                        <th>Offer <br>Letter</th>
                        <th>Appointment <br>Letter</th>
                        <th>Copy of Professional <br>Qualifications & <br>Training <br>Certi<br>ficates</th>
                        <th>Experience <br>/Relieving<br>/Service<br>/Salary <br>Certificates <br>if <br>applicable</th>
                        <th>Job Descriptions & <br>Job <br>Speci<br>fications</th>
                        <th>Credentialing <br>Report</th>
                        <th>Privileging <br>Report</th>
                        <th>Training <br>Records</th>
                        <th>Vaccination <br>Records</th>
                        <th>AnnualHealth <br>Checkup</th>
                        <th>Performance <br>Appraisal</th>
                        <th>Disciplinary<br>/Counseling <br>Reports</th>
                        <th >Background <br>Verification <br>Form(Self <br>declaration)</th>
                        <th>Exit <br>Interview</th>
                        <th>Other <br>Records</th>

                        <th>Done <br>By</th>

                    </tr>
  ';
  

$data=array();

  if(mysqli_num_rows($result) > 0)
{

$data_dep=array();
$query1="SELECT DISTINCT tbl_hr_audit.emp_department from tbl_hr_audit LEFT JOIN tbl_hr_mast on tbl_hr_mast.hrid = tbl_hr_audit.hrid_id where tbl_hr_audit.tbl_hr_audit_date_id= '$a_id' ";
$result1 = mysqli_query($connect, $query1);

while($row = mysqli_fetch_assoc($result1))
  {

    $data_dep[]=($row['emp_department']);

    
    
}

  
while($row = mysqli_fetch_assoc($result))
  {

    $data[]=($row);

    
    
}

$filterdata = array();
foreach ($data_dep as $like) {
            $result1 = array_filter($data, function ($item) use ($like) {
            if (( $item['emp_department']==$like) ) {
                return true;
            }
            return false;
       });


     $filterdata[] = $result1;
            }


            foreach ($filterdata as $key => $value) {
              $countid=1;
              $output .= '
       <tr>  
           <td align="center" colspan="24" style="Background:yellow"><strong>'.strtoupper($data_dep[$key]) .'</strong></td>   
       
       
       </tr>
   ';
               // echo $data_dep[$key]."<br>";
              foreach ($value as $key => $value1) {
              $output .= '
    <tr>  
       <td align="center">'.$countid++ .'</td>   
       <td align="center">'.$value1["emp_name"].'</td>  
       <td align="center">'.$value1["emp_code"].'</td>  
       <td align="center">'.$value1['emp_app_form'].'</td>
<td align="center">'.$value1['interview_ass_sheet'].'</td>
<td align="center">'.$value1['resume_bio_cv'].'</td>
<td align="center">'.$value1['pre_emp_chkup'].'</td>
<td align="center">'.$value1['indetify_proof_documnt'].'</td>
<td align="center">'.$value1['offer_letter'].'</td>
<td align="center">'.$value1['appoint_letter'].'</td>
<td align="center">'.$value1['cpy_of_prof'].'</td>
<td align="center">'.$value1['exp_reliving_serv_sal_cert'].'</td>
<td align="center">'.$value1['job_disc_job_spec'].'</td>
<td align="center">'.$value1['cread_report'].'</td>
<td align="center">'.$value1['priv_report'].'</td>
<td align="center">'.$value1['traning_record'].'</td>
<td align="center">'.$value1['vaccination_record'].'</td>
<td align="center">'.$value1['annual_checkup'].'</td>
<td align="center">'.$value1['perf_appraisal'].'</td>
<td align="center">'.$value1['dis_coun'].'</td>
<td align="center">'.$value1['bacground_ver'].'</td>
<td align="center">'.$value1['exit_interview'].'</td>
<td align="center">'.$value1['other_record'].'</td>
<td align="center">'.$value1["name_sign"].'</td>
       

       
       </tr>
   ';

            }

            $output .= '
       <tr>  
           <td align="center" colspan="24" style="Background:gray"><strong></strong></td>   
       
       
       </tr>
   ';

              //echo "<br>----------------------";
            }

$output .='<br><table class="table table-bordered" border="1"><tr><th colspan="10"><h4 align="left"><u>1)Corrective Action</u></h4></th></tr>';
      
 
 
$output1=[];
$c=0;
    $query = "SELECT corrective_action  FROM `tbl_hr_audit_reports`
          
            WHERE tbl_hr_audit_date_id = '$a_id' 
        ";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output1 = json_decode($row["corrective_action"]);
         
  }
foreach ($output1 as $key1 => $out) {
  if($key1!=100){
  
 
  $output .='<tr><td colspan="10">'.++$c.')'.$out.'</td></tr>';
}
}

    
 
 $output .='</table>';
  

  $output .='<table class="table table-bordered" border="1"><tr><th colspan="10"><h4 align="left"><u>2)Preventive Action</u></h4></th></tr> ';   

  

$output1=[];
$c=0;
    $query = "SELECT preventive_action  FROM `tbl_hr_audit_reports`
          
            WHERE tbl_hr_audit_date_id = '$a_id'
        ";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output1 = json_decode($row["preventive_action"]);
         
  }
foreach ($output1 as $key1 => $out) {
  if($key1!=100){
  
 
   $output .='<tr><td colspan="10">'.++$c.')'.$out.'</td></tr>';
}
}

$output .='</table>';


}
  
 
  $name = 'hraudit'.time().'.xls';

  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$name);
  echo $output;

?>
