<?php

//create_pdf.php

require_once 'dompdf/autoload.inc.php';
include('pdf.php');

use Dompdf\Options; 
// Reference the Font Metrics namespace 
use Dompdf\FontMetrics; 

// Set options to enable embedded PHP 
$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 

if(isset($_POST["hidden_html"]) && $_POST["hidden_html"] != '')
{
 $file_name = 'audit_report'.time().'.pdf';
 $html = '<link rel="stylesheet" href="bootstrap.min.css">';

 $html = '<link rel="stylesheet" type="text/css" href="custom.css">';
 $html .= $_POST["hidden_html"];

 $pdf = new Pdf($options);
 $pdf->load_html($html);
 //$pdf->setPaper('A4', 'portrait'); 
 $pdf->render();

 // Instantiate canvas instance 
$canvas = $pdf->getCanvas(); 
 
// Instantiate font metrics class 
$fontMetrics = new FontMetrics($canvas, $options); 
 
// Get height and width of page 
$w = $canvas->get_width(); 
$h = $canvas->get_height(); 
 
// Get font family file 
$font = $fontMetrics->getFont('times'); 
 
// Specify watermark text 
$text = "CONFIDENTIAL"; 
 
// Get height and width of text 
$txtHeight = $fontMetrics->getFontHeight($font, 75); 
$textWidth = $fontMetrics->getTextWidth($text, $font, 75); 
 
// Set text opacity 
$canvas->set_opacity(.2); 
 
// Specify horizontal and vertical position 
$x = (($w-$textWidth)/2); 
$y = (($h-$txtHeight)/2); 
 
// Writes text at the specified x and y coordinates 
$canvas->text($x, $y, $text, $font, 75); 


 $pdf->stream($file_name, array("Attachment" => false));
}

?>