<?php
	error_reporting(0);
	session_start();
	include"../dbinfo.php";
	
	?>
	
<table cellspacing="0" cellpadding="0" width="1400"  align="center" border="1">
 	<tr>
 		<td colspan="2" ><center style="color: blue;font-size: 24px;">BED OCCUPANCY FORM</center> </td>
 	</tr>

                        <tr>

                            <!-- <td width="600px"><?php //include"../SA_dashbord_graph/piechart_hu.php"; ?></td> -->
                            <td style="width:400px;""><?php include"SA_dashbord_graph/piechart_hu.php"; ?></td>
                            <td >
                            	<table cellspacing="0" cellpadding="0" width="800px"  align="center" border="0">
                            		<tr>
                            			
                            				
                            				<?php include"SA_dashbord_graph/chart_BOF.php"; ?>
							           
                            		</tr>
                            		<tr>
                            			<td>
                            				<?php include"SA_dashbord_graph/tab_BOF.php"; ?>
										</td>
                            		</tr>
                            	</table>
                            </td>

                        </tr>
                        
  </table>
  












