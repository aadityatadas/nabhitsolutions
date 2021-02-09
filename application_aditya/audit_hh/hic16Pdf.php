
<?php  

//index.php
include("../dbinfo.php");

$dArry[1] = array(0=>'Hand wash basin, liquid soap and hand towels are available');
  $dArry[2] = array(0=>'The area is clean and free of litter and extraneous items');
  $dArry[3] = array(0=>'Floors are slip resistant, with no broken surfaces');
  $dArry[4] = array(0=>'Walls and ceilings and exposed pipes are clean and free from lint,
  dust and dirt');
  $dArry[5] = array(0=>'Linen is in the appropriate bag and surely fastened on arrival');
  $dArry[6] = array(0=>'Linen bags are less than 3/4 full and tied up, clean and maintained');
  $dArry[7] = array(0=>'Protective clothing is worn for placing linen inside the washers');
  $dArry[8] = array(0=>'Any tables are clean with no broken surfaces and in good condition');
  $dArry[9] = array(0=>'Bins/trolleys are clean with no broken surfaces and in good
  condition');
  $dArry[10] = array(0=>'Soiled linen/equipment stored at least 2m from clean linen
  /equipment (visual demarcation)');
  $dArry[11] = array(0=>'There is a cleaning schedule (frequency)');

  $dArry1[12] = array(0=>'Hand washing basin and changing facilities are available');
  $dArry1[13] = array(0=>'Liquid soap and hand towels are are available at all sinks');
  $dArry1[14] = array(0=>'Nail brushes are not in use');
  $dArry1[15] = array(0=>'Protective clothing is worn for sorting linen i.e. waterproof aprons
  and gloves');
  $dArry1[16] = array(0=>'Clean overalls/uniforms are available for changing if necessary');
  $dArry1[17] = array(0=>'Protective clothing is removed and hands washed before leaving
  area');
  $dArry1[18] = array(0=>'Staff are aware of the correct procedure for disposing of any sharps
  found in laundry');
  $dArry1[19] = array(0=>'Staff are aware of the correct procedure following a blood/body
  fluid exposure');
  $dArry1[20] = array(0=>'Appropriate disposal unit for waste');
  $dArry1[21] = array(0=>'Sharps containers are available and less than 2/3 full');
  $dArry1[22] = array(0=>'Conveyor belt is clean with no broken surfaces');
  $dArry1[23] = array(0=>'Walls and ceiling are kept and free from dust, lint and dirt');
  $dArry1[24] = array(0=>'Floor are clean, slip resistant with no broken surface');
  $dArry1[25] = array(0=>'Lint screens are clean and free from lint and dust');
  $dArry1[26] = array(0=>'There is a cleaning schedule (frequency)');

  $dArry2[27] = array(0=>'Floor is clean and slip resistant with no broken surface');
  $dArry2[28] = array(0=>'All walls, ceilings are free from lint, dust and dirt');
  $dArry2[29] = array(0=>'Washers are clean and free from algae, dust and dirt');
  $dArry2[30] = array(0=>'Processing parameters (Cycle times, temperature) available for
  checking each cycle');
  $dArry2[31] = array(0=>'Operators know how to manage a system failure');
  $dArry2[32] = array(0=>'Bins/trolleys are clean with no broken surfaces and in good
  condition');
  $dArry2[33] = array(0=>'Tables/benches are clean with no broken surfaces and in good
  condition');
  $dArry2[34] = array(0=>'There is a process for cleaning and maintaining the bins/trolleys');

  $dArry3[35] = array(0=>'Driers are clean, lint free and free from dust and dirt');
  $dArry3[36] = array(0=>'Length of drying times cycle available');
  $dArry3[37] = array(0=>'Operators know how to manage a system failure');
  $dArry3[38] = array(0=>'Bins/trolleys are clean with no broken surfaces and in good
  condition');
  $dArry3[39] = array(0=>'Tables/benches are clean with no broken surfaces and in good
  condition');
  $dArry3[40] = array(0=>'Linen skips are less than 3/4 full, clean and maintained');
  $dArry3[41] = array(0=>'Floors are clean with no broken surfaces');
  $dArry3[42] = array(0=>'There is a process for cleaning and maintaining the bins/trolleys');

  $dArry4[43] = array(0=>'Clean, lint free and free from dust and dirt');
  $dArry4[44] = array(0=>'Lint screens are free of dust and dirt');
  $dArry4[45] = array(0=>'Floors are clean with no broken surfaces');
  $dArry4[46] = array(0=>'Appropriate disposal unit for waste');
  $dArry4[47] = array(0=>'There is a cleaning schedule (frequency)');

  $dArry5[48] = array(0=>'Clean linen is stored in a clean dry place in a manner that is :');
  $dArry5[49] = array(0=>'a) Distinctly separated from soiled linen');
  $dArry5[50] = array(0=>'b) Prevents contamination (e.g. by aerosol, dust, moisture and
  vermin)');
  $dArry5[51] = array(0=>'c) Allows stock rotation, so that oldest stock may be used first');
  $dArry5[52] = array(0=>'Clean linen is packed ready for delivery on clean trolleys and
  covered, or if bagged these are securely fastened');
  $dArry5[53] = array(0=>'Trolleys that are used for receiving clean linen from driers for sorting
  are clean  And in good condition');
  $dArry5[54] = array(0=>'The cloth drying racks are clean and in good repair');
  $dArry5[55] = array(0=>'Staff know what to do if an item after washing is still stained');
  $dArry5[56] = array(0=>'Staff know what to do if a clean washed item falls on the floor');
  $dArry5[57] = array(0=>'Linen is checked for quality');
  $dArry5[58] = array(0=>'Appropriate disposal unit for waste');
  $dArry5[59] = array(0=>'Benches are clean with no broken surfaces');
  $dArry5[60] = array(0=>'Walls and ceiling are kept and free from dust, lint and dirt');
  $dArry5[61] = array(0=>'Floor is clean with no broken surfaces');
  $dArry5[62] = array(0=>'The roller doors are clean and free from lint, dust and dirt');
  $dArry5[63] = array(0=>'There is a regular cleaning schedule (frequency)');

  $dArry6[64] = array(0=>'Doors are kept closed');
  $dArry6[65] = array(0=>'Linen is stored in clean trolleys or clean bags which are securely
  fastened');
  $dArry6[66] = array(0=>'Linen is rotated so that oldest stock is used first');
  $dArry6[67] = array(0=>'Walls/doors have no damaged surfaces and are kept clean and free
  from lint  And dust');
  $dArry6[68] = array(0=>'The floor is clean with no broken surfaces');
  $dArry6[69] = array(0=>'There is a regular cleaning schedule');

  $dArry7[70] = array(0=>'Hand basin is clean');
  $dArry7[71] = array(0=>'Liquid soap and hand towels are available');
  $dArry7[72] = array(0=>'Nail brushes not present on hand basins');
  $dArry7[73] = array(0=>'Poster demonstrating a good hand wash is available');

  $dArry8[74] = array(0=>'The area is clean and free from lint, dust and dirt including finisher
  and extractor');
  $dArry8[75] = array(0=>'The ceiling vent is clean');
  $dArry8[76] = array(0=>'The (cloth hanger) rails are clean and dust free');
  $dArry8[77] = array(0=>'The floor is clean with no broken surfaces');
  $dArry8[78] = array(0=>'There is a cleaning schedule (frequency)');

  $dArry9[79] = array(0=>'Floors are clean with no broken surfaces');
  $dArry9[80] = array(0=>'Walls and ceiling are kept and free from dust, lint and dirt');
  $dArry9[81] = array(0=>'Shelving is clean');
  $dArry9[82] = array(0=>'There is a cleaning schedule');

  $dArry10[83] = array(0=>'Hand basin, liquid soap and hand towels are available');
  $dArry10[84] = array(0=>'Clean and free from extraneous items');

  $dArry11[85] = array(0=>'Hand basin, liquid soap and hand towels are available');
  $dArry11[86] = array(0=>'Clean and free from extraneous items');
  $dArry11[87] = array(0=>'Toilet area is clean and free from extraneous items');

  $dArry12[88] = array(0=>'Chemicals are be stored safely');
  $dArry12[89] = array(0=>'Expired chemicals shall be disposed of appropriately');
  $dArry12[90] = array(0=>'No leakage/seepage from washers');
  $dArry12[91] = array(0=>'Records of maintenance and external audits maintained');

  $dArry13[92] = array(0=>'There is a programme for each work area including furniture /
  equipment and Overhead and hard to reach areas');
  $dArry13[93] = array(0=>'There are equipment cleaning and maintenance schedules e.g.
  washing Programmes and ironing temperatures');
  $dArry13[94] = array(0=>'There is a preventative maintenance system that ensures correct and safe operation of all plant and equipment including appropriate calibration of all key equipment such as water levels, temperature controls and other process Controls');
  $dArry13[95] = array(0=>'There is a pest control programme');
  $dArry13[96] = array(0=>'Process in place for return of miscellaneous items to appropriate
  department');

  $dArry14[97] = array(0=>'Accessibility to all Manuals including Infection Control Manual');
  $dArry14[98] = array(0=>'There is a staff work restriction policy – staff to report infections e.g.
  boils, Gastroenteritis etc');
  $dArry14[99] = array(0=>'Staff receive training in infection control');
  $dArry14[100] = array(0=>'Records are kept of attendance at training sessions');
  $dArry14[101] = array(0=>'Staff offered Hepatitis B vaccination');
  $dArry14[102] = array(0=>'Staff are aware of the correct procedure following a blood / body
  fluid exposure');
  $dArry14[103] = array(0=>'Personal protective equipment is available');
  $dArry14[104] = array(0=>'Wash formula records – temperature of load is maintained at a minimum of 65°C for not less than 10 mins or at a minimum of 71°C
  for not less than 3 mins');
  $dArry14[105] = array(0=>'Records are kept for a minimum of 12 months for each wash formula
  used');

  $dArry15[106] = array(0=>'A monitoring scheme has been implemented that regularly records each of the washing parameters to ensure that actual laundering conditions comply with the relevant requirements (i.e. that the equipment was operating Appropriately and that the wash formula
  conditions above were complied with)');



if(isset($_POST['quater']) &&  $_POST['quater'] != ''){


$quater_id = $_POST['quater'];
$yr = $_POST['yr'];
$tblname = $_POST['tblname'];
//$audit_name = $_POST['audit_name'];
$output = array();

  $statement = $connection->prepare(
    "SELECT * FROM $tblname 
    WHERE quarter = '".$quater_id."' and month_id ='".$yr."'"
  );
  $statement->execute();
  $result = $statement->fetchAll();
  




} else{
  echo "Error In Quater Selection Selection";

  die();
}

?>


<!DOCTYPE html>  
<html>  
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
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

    <!-- <h1 align="center"><u><?=$audit_name?></u></h1>   -->
           
    <div class="panel-body" align="center" style="padding-top: 0px!important">

    
      <img src="hosp.png"  width="400" height="350" style="margin-top: 50px;margin-left: 50px;margin-right: 50px">
      
     

  <!-- <table style="width:100%">
  <tr>
    <th align="left">
      Audit Done By:<br>           Mrs. Shilpi Guryani  <br>        Pharmacist</th>
    <th></th> 
     <th></th> 
    <th align="right">
      Audit Reviewed By:<br> Dr. Deepak Jeswani<br>Medical Director</th>
  </tr>
  
</table> -->


</div>
</div>
    
<p style="page-break-before: always"></p>
 <h2 align="center"><u>Laundry Audit</u></h2>  



 <?php

          $output = '';
  $output .= '
  <table class="table" border="1">
  <thead>
  

<tr>
  <th width="10%">sr.no</th>
  <th width="25%"><strong>Laundry Audit</strong></th>
  <th width="20%">Yes</th>
  <th width="20%">No</th>
  <th width="20%">NA</th>
  <th width="35%">Comment</th>
  </tr>
  </thead>

   <tbody>
            
  ';
  $n = 1;
  $k = 1;
  $ye = 0;
  $no = 0;
  $na = 0;



  foreach ($dArry as $value) { 

  if($result[$n - 1]['yn_val'] == 'Yes')
    {
      
      $ye++;
    } 
  elseif($result[$n - 1]['yn_val'] == 'No')
    {
      $no++;

    }
  elseif($result[$n - 1]['yn_val'] == 'NA')
  {
    $na++;
  }
            
            $output .= "
            <tr>
              <th colspan='6'><strong>A receiving area - soiled linen</strong></th>
            </tr>
            <tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 
            $output .='<tr>
              <th colspan="6"><strong>Sorting room</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry1 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 

            $output .='
            <tr>
              <th colspan="6"><strong>Washing area</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry2 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 

            $output .='<tr>
            <th colspan="6"><strong>Driers</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry3 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 

            $output .='<tr>
            <th colspan="6"><strong>Ironing Area</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry4 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 

            $output .='<tr>
            <th colspan="6"><strong>Clean linen area</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry5 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 

            $output .='<tr>
            <th colspan="6"><strong>Dispatch Area</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 


            $output .='<tr>
            <th colspan="6"><strong>Hang washing area</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 

            $output .='<tr>
            <th colspan="6"><strong>Uniform area</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 
            $output .='<tr>
            <th colspan="6"><strong>Sewing room</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 
            $output .='<tr>
            <th colspan="6"><strong>Staff change room</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 
            $output .='<tr>
            <th colspan="6"><strong>Bathroom</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 
            $output .='<tr>
            <th colspan="6"><strong>ETP i.e Effluent Treatment Plant</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 
            $output .='<tr>
            <th colspan="6"><strong>General</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 
            $output .='<tr>
            <th colspan="6"><strong>Policy and procedure</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; } 


            $output .='<tr>
            <th colspan="6"><strong>Monitoring records</strong></th>
            </tr>';

            $k = 1;
            foreach ($dArry6 as $value) { 

              if($result[$n - 1]['yn_val'] == 'Yes')
                {
                  
                  $ye++;
                } 
              elseif($result[$n - 1]['yn_val'] == 'No')
                {
                  $no++;

                }
              elseif($result[$n - 1]['yn_val'] == 'NA')
              {
                $na++;
              }
            
            $output .= "<tr>
              <td>". $k ."</td>
              <td>".$value[0]."</td>
              <td>
                <label class='radio-inline'>";

                $output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
                    
                   $output .="
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
                    
                  $output .= "
                  
                </label>
              </td>
              <td>
                <label class='radio-inline'>
                  ";
                  $output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
                    
                    
                  $output .= "
                </label>
              </td>
              <td>
                " .$result[$n - 1]['cmmnt'] ."
              </td>
            </tr>";
            $n++; $k++; }



            $output .= "<tr>

              <td colspan='2' style='text-align: center;''>Total</td>
              <td>".  $ye ."</td>
              <td>".  $no ."</td>
              <td>".  $na ."</td>
              <td></td>
            </tr>";

            $output .= '</tbody></table>';
  

  echo $output;

 ?>
           
    


  

<p style="page-break-before: always"></p>


           

             <div id="hic_chart" style="width: 100%; max-width:730px; height: 300px; "></div>
            <br>

          

          
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

 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
  
      function drawChart() {

       var jsonData = $.ajax({
        url: 'chart.php',
        dataType:"json",
        method:"POST",
        async: false,
        data:{qut:'<?=$quater_id?>',tbl:'<?=$tblname?>',yrg:'<?=$yr?>'},
        success: function(jsonData)
          {
             var options = {
          title : 'Laundry Audit',
          curveType: 'function',
              dataOpacity: 0.5,
              is3D: false,
              bar: {groupWidth: "40%"},
          chartArea:{'backgroundColor': {
                  'fill': '#F4F4F4',
                  'opacity': 100
                 } },
          backgroundColor: 'transparent',
          hAxis: {
                  title: '%',
                  textStyle: {
                     color: '#01579b',
                     
                  },
                  
                  minValue: 0, maxValue: 100
               },

               vAxis: {
                  title: '%',
                  textStyle: {
                     color: '#1a237e',
                     fontSize: 15,
                     bold: true
                  },
                  colors: ['green','#ffff99'],
                  legend: { position: 'top' },
                  minValue: 0, maxValue: 100
                  
               }, 
              
        };
            
            var data1 = new google.visualization.arrayToDataTable(jsonData); 

            

          var chart_area = document.getElementById('hic_chart');

          var chart = new google.visualization.ColumnChart(chart_area);

        
          google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data1, options);



            
          } 
        }).responseText;
        
   
}
        </script>  