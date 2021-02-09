
<?php  

//index.php
include("../application/dbinfo.php");





if(isset($_POST['selectedquater_id1']) ){


$quater_id = $_POST['selectedquater_id1'];
$start = $_POST['start1'];


$end = $_POST['end1'];

$quater_name = $_POST['selected_quater_name1'];
$audit_name = $_POST['selected_audit_name1'];

$months= date('F', strtotime($start))."-".date('F', strtotime($end));

$year = date('Y', strtotime($start));



} else{
  echo "Error In Quater Selection Selection";

  die();
}

?>


<!DOCTYPE html>  
<html>  
    <head>  
        <title>NabhBuddy Audit Report</title>
  <script src="jqury.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="custom.css">

  <style>

</style>
  <link rel="stylesheet" href="bootstrap.min.css">
        <script type="text/javascript" src="loader.js"></script>  
       
        
    </head>  
    <body>  
       
   

        <div class="container" id="testing"> 

          
            
   <div class="panel panel-default">
    <div class="panel-heading">
    
    </div>

    <h1 align="center"><u>ANTIBIOTICS AUDIT REPORT</u></h1>  
           
    <div class="panel-body" align="center" style="padding-top: 0px!important">

    
      <img src="hosp.png"  width="400" height="350" style="margin-top: 50px;margin-left: 50px;margin-right: 50px">
      
     

  <table style="width:100%">
  <tr>
    <th align="left">
      Audited By: <br>             <br>        Microbiologist/Infectious Disease Specialist
    <br>Date: _____________</th>
    <th></th> 
     <th></th> 
    <th align="right">
      Audit Reviewed By:<br> <br>Medical Director/Chairman Antibiotics Stewardship Programme<br>Date: _____________</th>
  </tr>
  
</table>


</div>
</div>
    
<p style="page-break-before: always"></p>
 <h2 align="center"><u>ANTIBIOTICS AUDIT REPORT</u></h2>  
           
    


  <h2 align="left"><u>Topic</u></h2> 

<ul>
  To analyze the compliance of antimicrobial Prescription as per Antibiotics Policies and protocols at <?=HOSPITAL_NAME?> . 
  
</ul> 


<ul>
  
ANTIBIOTICS AUDIT REPORT









        


<h4 align="left"><u><strong>Aims and guidelines for conducting audits</strong></u></h4>

<ul>
  The role of antibiotic policies is to guide physicians to prescribe all-appropriate antibiotics, avoid unjustified prescription, reduce the emergence of antibiotic-resistant bacteria, support high-quality clinical practice and minimize unnecessary expenses. The implementation of evidence-based guidelines for use of antimicrobials had been shown to improve the overall patient outcome. Studies have established the efficacy of surgical antibiotic prophylaxis for reducing the risk of postoperative wound infection. Others have consistently shown an association between timely start of antibiotics for patients with serious infections and a favorable clinical outcome
  <br>
<p>The aim of the present audit was to measure physicians’ adherence to the local hospital antibiotic policy guidelines.</p>
<br>
<p> audit has been carried out to identify potential errors and deficiencies in antibiotics Prescription process.</p>
 
  
</ul> 

<h4 align="left"><u><strong>Antibiotics Stewardship Team</strong></u></h4>

<ul>
  The Team comprises of individuals from the hospital that represent the key Doctors and Head of the department
  <br>
<p>Members of Committee</p>

<ol type="1">
  <li>Chairman:</li>
  <li>Secretary :</li>
  <li>REVIEW MEMBERS:</li>


</ol>
 
  
</ul> 

<p style="page-break-before: always"></p>
  
<h3 align="left"><u><strong>AUDIT Methodology</strong></u></h3>

<h4 align="left"><u><strong>Type of study</strong></u></h4>

<ul>
  The study was retrospective review of medical records for the period of three months <?=$months?> <?=$year?>.
  <br>

 
  
</ul>

<h4 align="left"><u><strong>Sampling Method</strong></u></h4>

<h4 align="left"><u><strong>Stratified Random sampling method is used including Medical and Surgical cases.</strong></u></h4>

<br>
<h4 align="left"><u><strong>Sample Size</strong></u></h4>
<?php 
$stmt = $connection->prepare("SELECT count(*) as a FROM tbl_antibiotic_audit as a WHERE a.tbl_quaterly_audit_details_id = ?");
$stmt->execute([$quater_id]);
$countP = $stmt->fetchColumn();

$qry = $connection->prepare("SELECT  count(*) as allpatinet FROM tbl_huf
              WHERE huf_dddd BETWEEN '".$start."' AND '".$end."'");


$qry->execute();
$countAll = $qry->fetchColumn();





?> 

<ul><strong>Data as defined below were first stratified according to hospital. Then the suggested sample size (n = <?=$countP?> ) was selected by proportional allocation randomly.</strong></ul>

<br>
<ul><strong>A sample size of <?=$countP?> .records was determined on an assumption that antibiotics are prescribed in <?php echo (number_format((($countP/$countAll)*100),2))?>% of the total number of hospital discharges based on results of the pilot survey at 5% significance level and power of 80% using MEDNET HMIS.</strong></ul>
  <?php 
$stmt = $connection->prepare("SELECT count(*) as total ,huf_dddd as month FROM tbl_huf as a
WHERE a.huf_id IN (SELECT huf_id FROM tbl_antibiotic_audit as a
WHERE a.tbl_quaterly_audit_details_id=?)
GROUP BY month(a.huf_dddd) ASC");
$stmt->execute([$quater_id]);
$allMonths = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<br>
<ul><table class="table" border="1" > 
            <tr>  
                  <th style="width: 10%">Month.</th>
                  <th width="30%">Cases
                  </th>
                </tr>
            <tbody>
              <?php foreach ($allMonths as $key => $allMonth) { ?>
                
              <tr style="width: 20%">
                <td><?=date('F', strtotime($allMonth['month']))?></td>
                <td><?=$allMonth['total']?></td>
              </tr>
            <?php } ?>
            </tbody>

    </table></ul>

<?php 
$stmt = $connection->prepare("SELECT DATE(created) as d FROM tbl_antibiotic_audit WHERE tbl_quaterly_audit_details_id=? GROUP BY DATE(created)");
$stmt->execute([$quater_id]);
$allDates = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<br>
<h5 align="left"><u><strong>Study sample Period</strong></u></h5>
<ul>The Study was carried out from 
  <?php foreach ($allDates as $key => $allDate) {
    if($key!=0){ echo ",";}
    echo $allDate['d'];
  } ?>
  . 

  The Study sample was selected from <?=$months?> <?=$year?> (Three Months) </ul>

  <br>
<ul>

<h4 align="left"><u><strong>Process of Audit: </strong></u></h4>

  <ol type="A">
      <li>The Antibiotics Stewardship Team of <?=HOSPITAL_NAME?> has approved the Audit study. </li>

      <li>
        Audit Form (Audit data collection form) was designed to collect the data from medical records. The form was designed by two infection control physicians and was discussed with clinical microbiologists and statisticians. In each record, the most recent hospital admission was checked for antibiotic prescribing. 

        <p style="page-break-before: always"></p>
        The following data were recorded: patients’ demographics, hospital name, unit specialty, date of last admission and discharge, the clinical diagnosis, availability of reasons/indications for prescribing, and the antibiotic-related information. Data for diagnosis were extracted from the clinical notes (symptoms and signs) of the physicians and nurses, laboratory and radiological microbiological culture and sensitivity reports and medication charts. 
        <br>
 On the audit form, the reason/indication for prescribing antibiotics was checked and included: 
 <ol type="1">
   <li>
    <br>
    definite or presumed diagnosis of a bacterial infection; the infections were grouped according to the standard method of grouping healthcare-associated infections as described by the Centres for Disease Control and Prevention 
   </li>
   <br>
   <li>Medical prophylaxis (e.g. infective endocarditis)</li>
   <br>
<li>Preoperative surgical prophylaxis</li>
<br>
<li>Irrational prescription for a noninfectious condition (e.g. uncomplicated bronchial asthma) or a nonbacterial infection (e.g. viral infection)</li>
<br>
<li>Unclear, i.e. the information provided in the record was not sufficient to claim specific diagnosis</li>

 </ol>
<br>
      </li>

      <li>
    Assessment of Adherence to the Policy 
We proceeded by identifying the reason for antibiotic prescribing if any, checking indications and evaluating the appropri-ateness of the agent. Analysis of the prescription was based on the recommendations of the local departmental policy. When the antibiotic was prescribed according to the policy-cited choice and/ or based on microbiological culture and sensitivity results, we considered it appropriate and then its dose, route of administration, frequency and duration were further evaluated. If more than one agent was prescribed for a specific condition, all aspects for each antibiotic were evaluated separately. 
<br>
A simplified version of the steps for reviewing the record to evaluate adherence to the hospital policy guidelines has adopted.
<br>
<ol type="a">
  <br>
   <li>Full adherence (compliance) was defined as prescription of a justifiably indicated antibiotic fulfilling the correct choice, dose, route, frequency and duration of therapy.</li>
   <br> 
<li>Nonadherence (noncompliance) to the policy was considered when there was prescription of a nonindicated antibiotic (overprescription), divergence from the advisable antibiotic, or failure to have full concordance with other aspects of the dose, route, frequency or duration. </li>
<br>



<li>When the diagnosis was unclear in the patient record or the condition which necessitated antibiotic use was not mentioned in the policy, evaluation for adherence could not be performed and was considered as nonassessable.  </li>


 </ol>

      </li>



  </ol>
<p style="page-break-before: always"></p>
  <ul>
    <img src="antibotic_1.png"  width="400" height="600" style="margin-top: 50px;margin-left: 50px;margin-right: 50px">
  </ul>

  <p style="page-break-before: always"></p>

  <ul><h5 align="left" style="padding-right: 20px"><u><strong>Standard</strong></u></h5>
  Antibiotics Adherence in <?=HOSPITAL_NAME?> shall be more than 80% against the standard Antibiotics 
  <br>
</ul>
 <ul> Policy designed by Antibiotics Stewardship Team/Committee.
<br>
  <h5 align="left" style="padding-right: 20px"><u><strong>Statistical Analysis:    </strong></u></h5>
  <br>
  Qualitative variables were expressed as numbers and percentages while quantitative variables were expressed as median and interquartile range.  
  <br>
  <p>Compliance was calculated as the percentage of compliant prescriptions divided by compliant plus noncompliant plus nonassessable ones as follows: compliance = [(number of compliant prescriptions)/ (number of compliant + noncompliant + nonassessable prescriptions)] × 100</p> 
</ul>

<ul><h5 align="left" style="padding-right: 20px"><u><strong>Situational Analysis of Antibiotics Presciptions:    </strong></u></h5>
<img src="antibotic_2.png"  width="400" height="500" style="margin-top: 50px;margin-left: 50px;margin-right: 50px">
</ul>
  <p style="page-break-before: always"></p>

 

  <ul><h4 align="left" style="padding-right: 20px"><u><strong> Interpretation/Results   </strong></u></h4> 


<p>Of 2,300 records, 2,232 were reviewed and 68 (3%) were missing. Of the 2,232 records, 1,112 (49.8%) had1, 528 antibiotic prescriptions Regarding antibiotic indications, antibiotics were ‘indicated’ in 1,099 (71.9%) of which 936 were evaluated and163 despite being indicated were not evaluated due to conditions not mentioned in the policy; ‘not indicated’ in 382 (25%) and ‘not evaluated’ in 47 (3.1%) due to unclear diagnosis.</p>

              <p>With respect to adherence to Hospital policies, antibiotic prescriptions were evaluated as follows:   fully adherent (compliant) in 464 (30.4%), nonadherent (noncompliant) in 854 (55.9%) and nonassessable in 210 (13.7%). The situational analysis of all antibiotic prescriptions is illustrated in figure 2 . The choice of the antibiotic was appropriate in 806 (52.7%). Adherence to the route of administration was achieved in 768/806 (95.3%), dose in 758 (94%), frequency in 746 (92.6%) and to duration in 608 (75.4%).</p>

<p>Surgical prophylaxis was the leading indication for antibiotic prescribing (735 prescriptions) distributed as follows: indicated’: 545; ‘not indicated’: 190, as shown in table 3 . Of the ‘indicated’ surgical prophylaxis, the correct choice of agent was achieved in 486 (89.2%) while full adherence to prophylaxis guidelines was achieved in 272 (49.9%), which equals 37% of all surgical prophylaxis. Percentage of appropriateness of the agent varied from one indication category to another: bloodstream infection: 22/24 (91.7%); lower respiratory tract infection: 86/94 (91.5%); urinary tract infection: 79/90 (87.8%); and skin and soft tissue infection: 29/39 (74.4%). Nevertheless, full adherence to policy guidelines was 66.7% in bloodstream infection, 48.9% in lower respiratory tract infection, 47.8% in urinary tract infection and 56.4% in skin and soft tissue infection Distribution of antibiotic</p><br>
<p>prescriptions by indication and level of adherence to the policy are presented in table 3 .The rationale for prescribing a nonindicated surgical prophylaxis in our study might be the fear of complications, sense of more self-assurance of the surgeons when the patient receives antibiotic, or nonacquaintance with the policy recommendations. Therefore, it is crucial for surgeons to understand the true role of prophylaxis, and the drawbacks when used inappropriately. They should be aware of the optimal prophylactic antibiotic, when and for how long it should be given. The key obstacles to localpolicy adherence need to be explored.</p><br>

           <p>To improve adherence to antibiotic policy, we recommend that more efficient control measures should be developed and implemented which include availability of the guidelines on the hospital information system, monitoring antibiotic misuse through repetitive audits and continuous education of the physicians to raise their awareness of proper prescription. Policies should be revised and periodically updated to cover all conditions treatable with antibiotics. </p><br>

</ul>


<p style="page-break-before: always"></p>

 

  <ul><h4 align="left" style="padding-right: 20px"><u><strong> Improvement points   </strong></u></h4>
  <ul>
    <li>In our study, the 25% nonindicated anti -biotic prescriptions was within the range of 15.5–72%
reported in other Audit studies. The unwarranted prescription of antibiotics among physicians could be due to inaccurate diagnosis, imprecise recognition of conditions that can be treated with antibiotics, and concerns of a poor clinical outcome when antibiotics are not given. Fear of legal action by patients might have led to the tendency of self-protection. So more confidence is given to them through continuous discussions and training.
<br>
</li>
    <li>The proper antibiotic choice of 52.7% of all prescriptions in this study was lower (67%) which can be improved by regular monitoring of antibiotics use and training of staff.<br></li><br>
    <li>Surgical prophylaxis was the commonest indication for antibiotic prescribing in our study, comparable to of full adherence to surgical prophylaxis guidelines varied in the literature<br></li><br>
    <li>Antibiotic regimen and failure to change a familiar ward popular antibiotic or combination of antibiotics have been shown to influence the empirical and other policy related guidelines<br></li><br>
    <li>The appropriate use of antimicrobials is an essential part of patient safety and deserves careful oversight and guidance. Given the association between antimicrobial use and the selection of resistant pathogens, the frequency of inappropriate antimicrobial use is often used as a surrogate marker for the avoidable impact on antimicrobial resistance. The combination of effective antimicrobial stewardship with a comprehensive infection control program has been shown to limit the emergence and transmission of antimicrobial-resistant bacteria.<br></li><br>
    <li>The primary goal of antimicrobial stewardship is to optimize clinical outcomes while minimizing unintended consequences of antimicrobial use that include toxicity, the selection of pathogenic organisms (such as Clostridium difficile), and the emergence of resistance. The secondary goal is to reduce health care costs without adversely impacting quality of care. New antibiotic stewardship tools, such as the use of blood biomarker-derived treatment algorithm, have been shown to reduce antibiotic consumption. The biomarker, procalcitonin, that is released rapidly into the bloodstream in the presence of an infection, has demonstrated utility in guiding decisions regarding antimicrobial therapy<br></li><br>
    <li>To improve adherence to antibiotic policy, we recommend that more efficient control measures should be developed and implemented which include availability of the guidelines on the hospital information system, monitoring antibiotic misuse through repetitive audits and continuous education of the physicians to raise their awareness of proper prescription. Policies should be revised and periodically updated to cover all conditions treatable with antibiotics. <br></li><br>
  </ul> 


    </ul>


<p style="page-break-before: always"></p>

    
          <h3 align="left"><u>1)Corrective Action</u></h2>  
 
<ol>
  <?php 
$output=[];
    $query = "SELECT corrective_action  FROM `tbl_quaterly_audit_reports`
          
            WHERE tbl_quaterly_audit_details_id = '".$quater_id."' 
        AND audit_name='antibiotic_audit'";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output = json_decode($row["corrective_action"]);
         
  }
foreach ($output as $key1 => $out) {
  if($key1!=100){
  
 
  echo '<li>'.$out.'</li>';
}
}
?>
    

</ol>
  
  
<br>

<h3 align="left"><u>2)Preventive Action</u></h2>  
     

  
  <ol>
  <?php 
$output=[];
    $query = "SELECT preventive_action  FROM `tbl_quaterly_audit_reports`
          
            WHERE tbl_quaterly_audit_details_id = '".$quater_id."' 
        AND audit_name='antibiotic_audit'";
$statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
     $output = json_decode($row["preventive_action"]);
         
  }
foreach ($output as $key1 => $out) {
  if($key1!=100){
  
 
  echo '<li>'.$out.'</li>';
}
}
?>
    

</ol>
</div>

<div align="center">
   <form method="post" id="make_pdf" action="create_pdf.php">
    <input type="hidden" name="hidden_html" id="hidden_html" />
    <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Create PDF</button>
   </form>
  </div>
  <br />
  <br />
  <br />

    </body>  
</html>

<script>
$(document).ready(function(){
 $('#create_pdf').click(function(){
  $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });
});
</script>

 