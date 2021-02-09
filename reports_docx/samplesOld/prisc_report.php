<?php
include_once 'Sample_Header.php';

use PhpOffice\PhpWord\Shared\Converter;



if(isset($_POST['auditSelectedMonthDR11']) && isset($_POST['auditSelectedYearDR11'])){
// New Word document
echo date('H:i:s'), ' Create new PhpWord object', EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$monthR1 = $_POST['auditSelectedMonthDR11'];
$yearR1 = $_POST['auditSelectedYearDR11'];

$monthR2 = $_POST['auditSelectedMonthDR21'];
$yearR2 = $_POST['auditSelectedYearDR21'];



if($monthR1 >= $monthR2){
  $max = $monthR1;
  $min = $monthR2;
} else{
    $max = $monthR2;
    $min = $monthR1;
}


print_r($_POST);


die();



$phpWord->setDefaultFontName('Times New Roman');
$phpWord->setDefaultFontSize(12);

// Define styles
$phpWord->addTitleStyle(1, array('size' => 14, 'bold' => true), array('keepNext' => true, 'spaceBefore' => 240));
$phpWord->addTitleStyle(2, array('size' => 14, 'bold' => true), array('keepNext' => true, 'spaceBefore' => 240));

//image start
$section = $phpWord->addSection(array('borderColor' => '00FF00', 'borderSize' => 12));

//tab

$auditHeading= 'Prescription Audit';
$phpWord->addFontStyle('r2Style', array('bold'=>true, 'italic'=>false, 'size'=>30,'underline'=>'single'));
$phpWord->addParagraphStyle('p2Style', array('align'=>'center', 'spaceAfter'=>100));
$section->addText($auditHeading, 'r2Style', 'p2Style'); 



// $headTextElement->setFontStyle($fontStyle);



//tab
//$html = '<center> <h1 style="align:center">Adding element via HTML</h1></center>';

$section->addimage('resources/hosp.png', array('marginTop' => 200, 'marginLeft' => 50,'marginRight' => 50,'width'=>400,'height'=>350) );
//$section->addText('The header reference to the current section includes a watermark image.');
//image end



//\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

//table start
// Define styles


$rightTabStyleName = 'rightTab';


$left ="Audit Done By:".'/n'.'Mrs. Shilpi Guryani'.'/n'.'Pharmacist';


$right ="Audit Reviewed By:".'/n'.' Dr. Deepak Jeswani'.'/n'.'Medical Director';                  


//$section->addText("{$left}\t{$right}", null, $rightTabStyleName);

$styleTable = array('borderColor'=>'#CCC', 'borderSize'=> 2, 'valign'=>'center');

$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$table = $section->addTable('Colspan Rowspan');

$row = $table->addRow();
$row->addCell(5000, array('vMerge' => 'restart'))->addText($left);
$row->addCell(2000, array('gridSpan' => 5, 'vMerge' => 'restart'))->addText();
$row->addCell(2000, array('gridSpan' => 5, 'vMerge' => 'restart'))->addText();
$row->addCell(2000, array('gridSpan' => 5, 'vMerge' => 'restart'))->addText();
$row->addCell(5000)->addText($right);




// $row = $table->addRow();
// $row->addCell(1000, array('vMerge' => 'continue'));
// $row->addCell(1000, array('vMerge' => 'continue', 'gridSpan' => 2));
// $row->addCell(1000)->addText('2');

// $row = $table->addRow();
// $row->addCell(1000, array('vMerge' => 'continue'));
// $row->addCell(1000)->addText('C');
// $row->addCell(1000)->addText('D');
// $row->addCell(1000)->addText('C');
// $row->addCell(1000)->addText('D');
// $row->addCell(1000)->addText('C');

// $row->addCell(1000)->addText('3');




$monthsAll = array();

$total = 0;
$totalAll = 0;

for($i= $min;$i<=$max;$i++){

  $patient_name_present=0;
  $medic_caps_legible=0;
  $dose=0;
  $quantity=0;
  $date_prescription=0;
  $high_risk_medicn_verified=0;
  $sign_of_doc=0;

$query1 = "SELECT count(*) as c FROM tbl_huf where month(huf_dadm) = '$i' and year(huf_dadm) = '$yearR1'";



$result1 = mysqli_query($connect, $query1);


$row1 = $result1->fetch_row();

$count1 = $row1[0];

$totalAll = $totalAll + $count1;

$monthsAll=array();
$dataAll=[] ;

$query = "SELECT * FROM tbl_prescription_audit WHERE (month(monthyear)='$i' AND  year(monthyear)='$yearR1')";

$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;

$total = $total + $mlc_count;


 foreach ($result as $key => $row) {
   

   if($row["patient_name_present"]=='Yes'){
      $patient_name_present++;
    }
    if($row["medic_caps_legible"]=='Yes'){
      $medic_caps_legible++;
    }
    if($row["dose"]=='Yes'){
      $dose++;
    }
    if($row["quantity"]=='Yes'){
      $quantity++;
    }
    if($row["date_prescription"]=='Yes'){
      $date_prescription++;
    }
    if($row["high_risk_medicn_verified"]=='Yes'){
      $high_risk_medicn_verified++;
    }
    if($row["sign_of_doc"]=='Yes'){
      $sign_of_doc++;
    }


   // [patient_name_present] => [medic_caps_legible] => [dose] => [quantity] => [date_prescription] => [high_risk_medicn_verified] => [sign_of_doc] =>
   
 }
     //echo count($result);
        if($mlc_count){
       $patient_name_present_per=($patient_name_present/$mlc_count)*100;
       $medic_caps_legible_per=($medic_caps_legible/$mlc_count)*100;
       $dose_per=($dose/$mlc_count)*100;
       $quantity_per=($quantity/$mlc_count)*100;
       $date_prescription_per=($date_prescription/$mlc_count)*100;
       $high_risk_medicn_verified_per=($high_risk_medicn_verified/$mlc_count)*100;
       $sign_of_doc_per=($sign_of_doc/$mlc_count)*100;

       $monthName = date("F", mktime(0, 0, 0, $i, 10))."-".$yearR1;

       $monthsAll[] = $monthName;
       $dataAll[] = array(
            'month'=> $monthName,
            'count' => $mlc_count,
            'patient_name_present' => $patient_name_present_per,
            'medic_caps_legible' => $medic_caps_legible_per,
            'dose' => $dose_per,
            'quantity' => $quantity_per,
            'date_prescription' => $date_prescription_per,
            'high_risk_medicn_verified' => $high_risk_medicn_verified_per,
            'sign_of_doc' => $sign_of_doc_per,
   );

       $json['patient_name_present'][] = (int)$patient_name_present_per;

       $json['medic_caps_legible'][] =  (int)$medic_caps_legible_per;

       $json['dose'][] =  (int)$dose_per;

       $json['quantity'][] =  (int)$quantity_per;

       $json['date_prescription'][] = (int)$date_prescription_per;

       $json['high_risk_medicn_verified'][] = (int)$high_risk_medicn_verified_per;

       
       $json['sign_of_doc'][] =  (int)$sign_of_doc_per;

       
     }



}

if(count($monthsAll)==0){

  echo 'No data found';
  die();

}
$section->addPageBreak();
echo $total;
$auditHeading= 'Prescription Audit';
$phpWord->addFontStyle('r2Style', array('bold'=>true, 'italic'=>false, 'size'=>20,'underline'=>'single'));
$phpWord->addParagraphStyle('p2Style', array('align'=>'center', 'spaceAfter'=>100));
$section->addText($auditHeading, 'r2Style', 'p2Style'); 



$section->addText('Title- To check the compliance of  prescription as per NABH Standard.');
$section->addTextBreak(1);
$section->addText('Type of Audit- Retrospective');
$section->addTextBreak(1);
$section->addText('Month-  '.$monthsAll[0]  .'   to  '. $monthsAll[count($monthsAll)-1] );
$section->addTextBreak(1);
$section->addText('Number of prescription audited- '.round($total * 100 / $totalAll).'% of total prescription (sample size)');

$section->addTextBreak(2);

$auditHeading= 'Methodology';

$fontStyle['name'] = 'Times New Roman';
$fontStyle['size'] = 20;
$fontStyle['underline'] = true;
$section->addText($auditHeading , $fontStyle); 

$section->addText('The study was conducted  in Criticare Hospital & Reserch Institute. The study was carried over a period of '.count($monthsAll).' months from '.$monthsAll[0].' to '.$monthsAll[count($monthsAll)-1].'. A total of '.$total.' In-patient prescriptions were randomly sampled from the hospital pharmacy.');

$section->addText('The details of all the prescriptions were analyzed on the following parameters:');

$section->addTextBreak(1);
$aAll =array('Patient Name on prescription','Medication written in CAPS & Legible','Dose mentioned','Quantity mentioned','Date of prescription','High risk medication verified prior to dispensing','Signature of Doctor on prescription');

foreach ($aAll as $key => $av) {
  $section->addListItem($av);

}

$section->addTextBreak(2);
$header = array('size' => 16, 'bold' => true);
$section->addText('Analysis', $header);

$section->addListItem('The area of adherence and their compliance is shown below');


$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 10);
$fancyTableFirstRowStyle = array('borderBottomSize' => 5, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$fancyTableCellStyle = array('valign' => 'center');
$fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$fancyTableFontStyle = array('bold' => true);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(900);

$countid = 1;

$table->addCell(1000, $fancyTableCellStyle)->addText('Sr. No.', $fancyTableFontStyle);
$table->addCell(4000, $fancyTableCellStyle)->addText('Audit element in prescription', $fancyTableFontStyle);
 

    foreach ($dataAll as $key => $da) {
           
       

        $table->addCell(2000, $fancyTableCellStyle)->addText($da['month'].'('.$da['count'].')', $fancyTableFontStyle);    
    }

$dataA[0] = array(0=>'Patient Name' , 1 =>'patient_name_present');
$dataA[1] = array(0=>'Medicatioy written in CAPS & Legible' , 1 =>'medic_caps_legible');
$dataA[2] = array(0=>'Dose' , 1 =>'dose');
$dataA[3] = array(0=>'Quantity' , 1 =>'quantity');
$dataA[4] = array(0=>'Date of prescription ' , 1 =>'date_prescription');
$dataA[5] = array(0=>'High risk medication verified' , 1 =>'high_risk_medicn_verified');
$dataA[6] = array(0=>'Signature of Doctor' , 1 =>'sign_of_doc');



foreach ($dataA as $key => $val) {

    $table->addRow();

    $table->addCell(1000)->addText(++$key);
    $table->addCell(4000)->addText($val[0]);

  

    foreach ($dataAll as $key => $da) {
           
        

        $table->addCell(2000)->addText(number_format($da[$val[1]],2));   
    }



}
$section->addTextBreak(2);
//graph start
$section = $phpWord->addSection(array('colsNum' => 1, 'breakType' => 'continuous','borderColor' => '00FF00', 'borderSize' => 10));


$showGridLines = false;
$showAxisLabels = true;


// 3D charts


$section->addTitle('', 1);

$chartTypes = array('line');
$multiSeries = array();
$style = array(
    'width'          => Converter::cmToEmu(10),
    'height'         => Converter::cmToEmu(8),
    '3d'             => true,
    'showAxisLabels' => $showAxisLabels,
    'showGridX'      => false,
    'showGridY'      => true,

);


foreach ($dataA as $keyAll => $valueAll) {

    $section->addTitle(ucfirst($valueAll[0]), 2);
    $section->addTitle('% of yes');
    $chart = $section->addChart('line', $monthsAll, $json[$valueAll[1]], $style);
    
    $section->addTextBreak();

   
}
//graph end
// Save file

$wordocname = 'prescription'.time();
$fol='prescription';

echo write($phpWord, $wordocname, $writers,$fol);

} else {
    echo "<script>function goBack() {window.history.back();goBack();}</script>";
}

if (!CLI) {
    include_once 'Sample_Footer.php';
}
