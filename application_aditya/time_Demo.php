<?php
$datetime1 = strtotime('2019-02-05 08:00');
$datetime2 = strtotime('2019-02-06 23:10');

$diff =  $datetime2 - $datetime1;
$timeMinTotal =  floor(($diff/60));
echo $timeMinTotal;
echo "<br>";

$timeInMin= $timeMinTotal%60;
echo $timeInMin;
echo "<br>";
$timeInhr= floor($timeMinTotal/60);
echo $timeInhr;

echo "<br>";
echo $timeInhr."hr ". $timeInMin ."min";

?>