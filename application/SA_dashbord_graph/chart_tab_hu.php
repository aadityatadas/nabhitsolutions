<?php
	error_reporting(0);
	session_start();
	include"../dbinfo.php";
	
	?>
	


  <table cellspacing="0" cellpadding="0" width="1500"  align="center" border="0">
    <!-- <tr>
        <td colspan="2" ><center style="color: blue;font-size: 24px;">HOSPITAL UTILIZATION</center> </td>
    </tr>
    --> <tr>
        <td style="width: 500px;"><?php include"SA_dashbord_graph/piechart_hu.php"; ?></td>
        <td style="width: 1000px;"><?php include"SA_dashbord_graph/chart_hu.php"; ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php include"SA_dashbord_graph/tab_hu.php"; ?></td>
    </tr>
  </table>












