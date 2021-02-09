

<?php
 $date = "2019-02-01";

 print_r(date(strtotime($date)));
 echo "<br>";
 print_r((strtotime($date)));
 echo "<br>";


function my_sort($a,$b)
{
	$a= strtotime($a);
	$b= strtotime($b);
	

   if ($a==$b) return 0;
  return ($a<$b)?-1:1;
}
$a=array("2019-02-11","2019-02-05","2019-02-08","2019-02-01");
print_r($a);
echo "<br>";

usort($a,"my_sort");

print_r($a);



?> 