<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>



<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>

<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$jan = date('Y-01');
	$feb = date('Y-02');
	$mar = date('Y-03');
	$apr = date('Y-04');
	$may = date('Y-05');
	$jun = date('Y-06');
	$jul = date('Y-07');
	$aug = date('Y-08');
	$sep = date('Y-09');
	$oct = date('Y-10');
	$nov = date('Y-11');
	$dec = date('Y-12');
	$yr = date('Y');
?>



<script >
	
	Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'HOSPITAL UTILIZATION- Monthly Average '
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Total No. of Inpatient Days',
        marker: {
            symbol: 'square'
        },
        data: [	<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res = mysqli_fetch_assoc($qry);
                            $i_count = $res["std"];
                            if($i_count > 0){
                                $icount = $i_count;
                            }else{
                                $icount = 0;
                            }
                    ?>
					
					<?php echo $icount;?>
					<?php echo ",";?>
					<?php
						}
					?>]
            

    }, 

    {
        name: ' Total No. of Admissions',
        marker: {
            symbol: 'diamond'
        },
        data: [ 	<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $A_count = mysqli_num_rows($qry2);
                    ?>
					<?php echo $A_count;?>
					<?php echo ",";?>
					<?php
						}
					?>]
    }, 

    {
        name: 'Total No. of Discharges',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $dis_count = mysqli_num_rows($qry3_1);
                    ?>
				<?php echo $dis_count;?>
				<?php echo ",";?>
					<?php
						}
					?>]
    },

    {
        name: 'Total No. of DAMA',
        marker: {
            symbol: 'diamond'
        },
        data: [	<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $dm_count = mysqli_num_rows($qry3_2);
                    ?>
			 <?php echo $dm_count;?>
			 <?php echo ",";?>
					<?php
						}
					?>]
    }, 

    {
        name: 'Total No. of Death',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $dh_count = mysqli_num_rows($qry3_3);
                    ?>
                <?php echo $dh_count;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: 'Total No. of MLC',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_4 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_mlc = 'MLC' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $mlc_count = mysqli_num_rows($qry3_4);
                    ?>
                <?php echo $mlc_count;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: 'Average Length of stay',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res = mysqli_fetch_assoc($qry);
                            $i_count = $res["std"];
                            $qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $A_count = mysqli_num_rows($qry2);
                            $dy = $i_count * 24;
                            $dys = $dy / $A_count;
                            $hmin = $dys / 24;
                            list($number1, $number2) = explode('.', $hmin);
                            
                            $los_count = $number1.'.'.$number2;
                            if($los_count > 0){
                                $loscount = $los_count;
                            }else{
                                $loscount = 0;
                            }
                    ?>
                <?php echo number_format($loscount,1);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: 'Total No. of Surgeries',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $s_count = mysqli_num_rows($qry5);
                    ?>
                <?php echo $s_count;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }]
});
</script><br><br>

<div id="container1" style="width: 800px; height: 400px; margin: 0 auto"></div>


<script >

	Highcharts.chart('container1', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'HOSPITAL UTILIZATION- Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'Total No. of Inpatient Days',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res = mysqli_fetch_assoc($qry);
                            $i_count = $res["std"];
                            if($i_count > 0){
                                $icount = $i_count;
                            }else{
                                $icount = 0;
                            }
                    ?>
                    
                    <?php echo $icount;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, 

    {
        name: 'Total No. of Admissions',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $A_count = mysqli_num_rows($qry2);
                    ?>
                    <?php echo $A_count;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]


       }, 

       {
        name: 'Total No. of Discharges',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $dis_count = mysqli_num_rows($qry3_1);
                    ?>
                <?php echo $dis_count;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: 'Total No. of DAMA',
        marker: {
            symbol: 'diamond'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $dm_count = mysqli_num_rows($qry3_2);
                    ?>
             <?php echo $dm_count;?>
             <?php echo ",";?>
                    <?php
                        }
                    ?>]           
    },

    {
        name: 'Total No. of Death',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $dh_count = mysqli_num_rows($qry3_3);
                    ?>
                <?php echo $dh_count;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: 'Total No. of MLC',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_4 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_mlc = 'MLC' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $mlc_count = mysqli_num_rows($qry3_4);
                    ?>
                <?php echo $mlc_count;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, 

    {
        name: 'Average Length of stay',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res = mysqli_fetch_assoc($qry);
                            $i_count = $res["std"];
                            $qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $A_count = mysqli_num_rows($qry2);
                            $dy = $i_count * 24;
                            $dys = $dy / $A_count;
                            $hmin = $dys / 24;
                            list($number1, $number2) = explode('.', $hmin);
                            
                            $los_count = $number1.'.'.$number2;
                            if($los_count > 0){
                                $loscount = $los_count;
                            }else{
                                $loscount = 0;
                            }
                    ?>
                <?php echo number_format($loscount,1);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: 'Total No. of Surgeries',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $s_count = mysqli_num_rows($qry5);
                    ?>
                <?php echo $s_count;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }]
});
</script><br><br>

<hr><br><br>  


<div id="container2" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container2', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'INITIAL ASSESSEMENT TIME - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Averarge Intial Assessment Time in Hrs.',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++)
                        {
                            $hr_num = 0;
                            $min_num = 0;
                            $sum_std = 0;
                            $tot_count = 0;
                            $numb3 = 0;
                            $qry = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
                            while($res = mysqli_fetch_array($qry))
                            {
                                $sm_std = $res["int_tottm"];
                                list($num1, $num2) = explode('.', $sm_std);
                                $hr_num = $hr_num + $num1;
                                $min_num = $min_num + $num2;
                            }
                            $sum_std = ($hr_num * 60) + $min_num;   
                        
                            $qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != ''")or die(mysqli_error($connect));
                            $s_count = mysqli_num_rows($qry5);
                            
                            $tot_count = $sum_std / $s_count;
                            if($tot_count >= 60)
                            {
                                $tt_count = $tot_count / 60;
                                list($number1, $number2) = explode('.', $tt_count);
                                
                                $tot_min = $tot_count - ($number1 * 60);
                                if($tot_min >= 10)
                                {
                                    $numb3 = $number1.'.'.$tot_min;
                                }else if($tot_min < 10){
                                    $a = 0;
                                    $numbr3 = $number1.'.'.$a.''.$tot_min;
                                    $numb3 = $numbr3;
                                }       
                            }else if($tot_count < 60){
                                list($numb1, $numb2) = explode('.', $tot_count);
                                $aj = 0;
                                $numbr3 = $aj.'.'.$numb1;
                                $numb3 = $numbr3;
                            }
                    ?>
                    
                    <?php echo number_format($numb3,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
            

    }, ]
});
</script><br><br>

<div id="container3" style="width: 800px; height: 400px; margin: 0 auto"></div>


<script >

    Highcharts.chart('container3', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'INITIAL ASSESSEMENT TIME - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'Averarge Intial Assessment Time in Hrs.',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++)
                        {
                            $hr_num = 0;
                            $min_num = 0;
                            $sum_std = 0;
                            $tot_count = 0;
                            $numb3 = 0;
                            $qry = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
                            while($res = mysqli_fetch_array($qry))
                            {
                                $sm_std = $res["int_tottm"];
                                list($num1, $num2) = explode('.', $sm_std);
                                $hr_num = $hr_num + $num1;
                                $min_num = $min_num + $num2;
                            }
                            $sum_std = ($hr_num * 60) + $min_num;   
                        
                            $qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != ''")or die(mysqli_error($connect));
                            $s_count = mysqli_num_rows($qry5);
                            
                            $tot_count = $sum_std / $s_count;
                            if($tot_count >= 60)
                            {
                                $tt_count = $tot_count / 60;
                                list($number1, $number2) = explode('.', $tt_count);
                                
                                $tot_min = $tot_count - ($number1 * 60);
                                if($tot_min >= 10)
                                {
                                    $numb3 = $number1.'.'.$tot_min;
                                }else if($tot_min < 10){
                                    $a = 0;
                                    $numbr3 = $number1.'.'.$a.''.$tot_min;
                                    $numb3 = $numbr3;
                                }       
                            }else if($tot_count < 60){
                                list($numb1, $numb2) = explode('.', $tot_count);
                                $aj = 0;
                                $numbr3 = $aj.'.'.$numb1;
                                $numb3 = $numbr3;
                            }
                    ?>
                    
                    <?php echo number_format($numb3,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

                    }, ]
});


</script><br><br>

<hr noshade><br><br>

<div id="container4" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container4', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'VENTILATOR ASSOCIATED PNEMONIA - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'VAP Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry1_vent = mysqli_query($connect,"SELECT SUM(vent_tcd) as std_vent FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')")or die(mysqli_error($connect));
                            $res1_vent = mysqli_fetch_assoc($qry1_vent);
                            $i_count_1 = $res1_vent["std_vent"];
                            $qry_vent2 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
                            $v_count_1 = mysqli_num_rows($qry_vent2);
                            $vap_count_1 = $v_count_1*1000/$i_count_1;
                            if($vap_count_1 > 0){
                                $icount_vent = $vap_count_1;
                            }else{
                                $icount_vent = 0;
                            }
                    ?>
                    
                    <?php echo number_format($icount_vent,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
            

    },  {
        name: '  Total Ventilator Days',
        marker: {
            symbol: 'diamond'
        },
        data: [     <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_vent = mysqli_query($connect,"SELECT SUM(vent_tcd) as std_vent FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')")or die(mysqli_error($connect));
                            $res_vent = mysqli_fetch_assoc($qry_vent);
                            $i_count_2 = $res_vent["std_vent"];
                            if($i_count_2 > 0){
                                $icountv_vent = $i_count_2;
                            }else{
                                $icountv_vent = 0;
                            }
                    ?>
                    <?php echo $icountv_vent;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, {
        name: 'Positive VAP',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_vent = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
                            $v_count_2 = mysqli_num_rows($qry2_vent);
                    ?>
                <?php echo $v_count_2;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, ]
}); 
</script>

<div id="container5" style="width: 800px; height: 400px; margin: 0 auto"></div>


<script >

    Highcharts.chart('container5', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'VENTILATOR ASSOCIATED PNEMONIA - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'VAP Rate',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry1_vent = mysqli_query($connect,"SELECT SUM(vent_tcd) as std_vent FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')")or die(mysqli_error($connect));
                            $res1_vent = mysqli_fetch_assoc($qry1_vent);
                            $i_count_1 = $res1_vent["std_vent"];
                            $qry_vent2 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
                            $v_count_1 = mysqli_num_rows($qry_vent2);
                            $vap_count_1 = $v_count_1*1000/$i_count_1;
                            if($vap_count_1 > 0){
                                $icount_vent = $vap_count_1;
                            }else{
                                $icount_vent = 0;
                            }
                    ?>
                    
                    <?php echo number_format($icount_vent,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

                    }, {
        name: '  Total Ventilator Days',
        marker: {
            symbol: 'diamond'
        },
        data: [     <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_vent = mysqli_query($connect,"SELECT SUM(vent_tcd) as std_vent FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')")or die(mysqli_error($connect));
                            $res_vent = mysqli_fetch_assoc($qry_vent);
                            $i_count_2 = $res_vent["std_vent"];
                            if($i_count_2 > 0){
                                $icountv_vent = $i_count_2;
                            }else{
                                $icountv_vent = 0;
                            }
                    ?>
                    <?php echo $icountv_vent;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },  {
        name: 'Positive VAP',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_vent = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
                            $v_count_2 = mysqli_num_rows($qry2_vent);
                    ?>
                <?php echo $v_count_2;?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, ]
}); 


</script><br><br>

<hr noshade><br><br>

<div id="container6" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container6', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'CATHETER ASSOCIATED UNRINARY TRACT INFECTION - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Total Catheter Days',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_cath3 = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as tcd_cath3 FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_tcd != ''")or die(mysqli_error($connect));
                            $res_cath3 = mysqli_fetch_assoc($qry_cath3);
                            $tcd_cath3 = $res_cath3["tcd_cath3"];
                            if($tcd_cath3 > 0){
                                $tcdcath3 = $tcd_cath3;
                            }else{
                                $tcdcath3 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tcdcath3,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, {
        name: 'Positive CAUTI',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_cath2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
                            $c_cathcount = mysqli_num_rows($qry_cath2);
                    ?>
                    
                    <?php echo $c_cathcount;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
                     }, ]
}); 
</script><br><br>

<div id="container7" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container7', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'CATHETER ASSOCIATED UNRINARY TRACT INFECTION - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'VAP Rate',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_cath3 = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as tcd_cath3 FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_tcd != ''")or die(mysqli_error($connect));
                            $res_cath3 = mysqli_fetch_assoc($qry_cath3);
                            $tcd_cath3 = $res_cath3["tcd_cath3"];
                            if($tcd_cath3 > 0){
                                $tcdcath3 = $tcd_cath3;
                            }else{
                                $tcdcath3 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tcdcath3,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, {
        name: 'Positive CAUTI',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_cath2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
                            $c_cathcount = mysqli_num_rows($qry_cath2);
                    ?>
                    
                    <?php echo $c_cathcount;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
                     }, ]
}); 
</script><br><br>

<hr><br><br>

<div id="container8" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container8', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'CENTRAL LINE ASSOCIATED BLOOD STREAM INFECTION FORM - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'CLABSI Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_clabsi = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as std_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr')")or die(mysqli_error($connect));
                            $res_clabsi = mysqli_fetch_assoc($qry_clabsi);
                            $i_count_clabsi = $res_clabsi["std_clabsi"];
                            $qry2_clabsi = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
                            $c_count_clabsi = mysqli_num_rows($qry2_clabsi);
                            $clabsi_count = $c_count_clabsi*1000/$i_count_clabsi;
                            if($clabsi_count > 0){
                                $clabsicount = $clabsi_count;
                            }else{
                                $clabsicount = 0;
                            }
                    ?>
                    
                    <?php echo number_format($clabsicount,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total Central Line Days',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_clabsi = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as tcd_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_tcld != ''")or die(mysqli_error($connect));
                            $res3_clabsi = mysqli_fetch_assoc($qry3_clabsi);
                            $tcd_clabsi = $res3_clabsi["tcd_clabsi"];
                            if($tcd_clabsi > 0){
                                $tcdclabsi = $tcd_clabsi;
                            }else{
                                $tcdclabsi = 0;
                            }
                    ?>
                    
                    <?php echo $tcdclabsi;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },

    {
        name: 'Positive CLABSI',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2clabsi = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
                            $c_countclabsi = mysqli_num_rows($qry2clabsi);
                    ?>
                    
                    <?php echo $c_countclabsi;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

}, ]

}); 
</script><br><br>

<div id="container9" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container9', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'CENTRAL LINE ASSOCIATED BLOOD STREAM INFECTION FORM - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'CLABSI Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_clabsi = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as std_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr')")or die(mysqli_error($connect));
                            $res_clabsi = mysqli_fetch_assoc($qry_clabsi);
                            $i_count_clabsi = $res_clabsi["std_clabsi"];
                            $qry2_clabsi = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
                            $c_count_clabsi = mysqli_num_rows($qry2_clabsi);
                            $clabsi_count = $c_count_clabsi*1000/$i_count_clabsi;
                            if($clabsi_count > 0){
                                $clabsicount = $clabsi_count;
                            }else{
                                $clabsicount = 0;
                            }
                    ?>
                    
                    <?php echo number_format($clabsicount,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total Central Line Days',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_clabsi = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as tcd_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_tcld != ''")or die(mysqli_error($connect));
                            $res3_clabsi = mysqli_fetch_assoc($qry3_clabsi);
                            $tcd_clabsi = $res3_clabsi["tcd_clabsi"];
                            if($tcd_clabsi > 0){
                                $tcdclabsi = $tcd_clabsi;
                            }else{
                                $tcdclabsi = 0;
                            }
                    ?>
                    
                    <?php echo $tcdclabsi;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },

    {
        name: 'Positive CLABSI',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2clabsi = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
                            $c_countclabsi = mysqli_num_rows($qry2clabsi);
                    ?>
                    
                    <?php echo $c_countclabsi;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

}, ]

}); 
</script><br><br>

<hr><br><br>

<div id="container10" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container10', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' SURGICAL SITE INFECTION FORM - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'SSI Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_ssi = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
                            $i_count_ssi = mysqli_num_rows($qry2_ssi);
                            $qry3_ssi = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND huf_surg = 'Surgery' ")or die(mysqli_error($connect));
                            $c_count_ssi = mysqli_num_rows($qry3_ssi);
                            $ssi_cnt_ssi = ($i_count_ssi/$c_count_ssi)*100; // - 0.13;
                            $ssi_count_ssi = (float)$ssi_cnt_ssi;
                            if($ssi_count_ssi > 0)
                            {
                                $ssicount = $ssi_count_ssi;
                            }else{
                                $ssicount = 0;
                            }
                    ?>
                    
                    <?php echo number_format($ssicount,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Symptoms Of SSI',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry4_ssi = mysqli_query($connect,"SELECT surg_symp FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_symp = 'Yes'")or die(mysqli_error($connect));
                            $s_ssicount = mysqli_num_rows($qry4_ssi);
                            
                    ?>
                    
                    <?php echo $s_ssicount;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },

    {
        name: 'Positive SSI',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_ssi = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
                            $i_ssicount = mysqli_num_rows($qry2_ssi);
                    ?>
                    
                    <?php echo $i_ssicount;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

}, ]

}); 
</script><br><br>

<div id="container11" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container11', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' SURGICAL SITE INFECTION FORM - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'SSI Rate',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_ssi = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
                            $i_count_ssi = mysqli_num_rows($qry2_ssi);
                            $qry3_ssi = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND huf_surg = 'Surgery' ")or die(mysqli_error($connect));
                            $c_count_ssi = mysqli_num_rows($qry3_ssi);
                            $ssi_cnt_ssi = ($i_count_ssi/$c_count_ssi)*100; // - 0.13;
                            $ssi_count_ssi = (float)$ssi_cnt_ssi;
                            if($ssi_count_ssi > 0)
                            {
                                $ssicount = $ssi_count_ssi;
                            }else{
                                $ssicount = 0;
                            }
                    ?>
                    
                    <?php echo number_format($ssicount,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Symptoms Of SSI',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry4_ssi = mysqli_query($connect,"SELECT surg_symp FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_symp = 'Yes'")or die(mysqli_error($connect));
                            $s_ssicount = mysqli_num_rows($qry4_ssi);
                            
                    ?>
                    
                    <?php echo $s_ssicount;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },

    {
        name: 'Positive SSI',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_ssi = mysqli_query($connect,"SELECT surg_sp_ssi FROM tbl_huf WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND surg_sp_ssi = 'Yes'")or die(mysqli_error($connect));
                            $i_ssicount = mysqli_num_rows($qry2_ssi);
                    ?>
                    
                    <?php echo $i_ssicount;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

}, ]

}); 
</script><br><br>

<hr><br><br>

<div id="container12" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container12', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' BED OCCUPANCY - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Total No. of Patient',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $s_bed = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $cnt2_bed = mysqli_num_rows($s_bed);
                    ?>
                    
                    <?php echo $cnt2_bed;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total No. of Discharge/Dama/Death',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $s3_bed = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE huf_ddd != '' AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $cnt3_bed = mysqli_num_rows($s3_bed);
                    ?>
                    
                    <?php echo $cnt3_bed;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container13" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container13', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' BED OCCUPANCY - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'Total No. of Patient',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $s_bed = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $cnt2_bed = mysqli_num_rows($s_bed);
                    ?>
                    
                    <?php echo $cnt2_bed;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total No. of Discharge/Dama/Death',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $s3_bed = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE huf_ddd != '' AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $cnt3_bed = mysqli_num_rows($s3_bed);
                    ?>
                    
                    <?php echo $cnt3_bed;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    }, ]

}); 
</script><br><br>

<hr><br><br>

<div id="container14" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container14', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' IPD WAITING TIME - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Average IPD Waiting Time',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_ipd = mysqli_query($connect,"SELECT SUM(wttm_opdwttm) as std_ipd FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $res_ipd = mysqli_fetch_assoc($qry_ipd);
                            $i_count_ipd = $res_ipd["std_ipd"];
                            
                            $qry5_ipd = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE wttm_opdwttm != '' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $s_count_ipd = mysqli_num_rows($qry5_ipd);
                            $tot_count_ipd = $i_count_ipd / $s_count_ipd;
                            if($tot_count_ipd > 0)
                            {
                                $totcount_ipd = $tot_count_ipd;
                            }else{
                                $totcount_ipd = 0;
                            }
                    ?>
                    
                    <?php echo number_format($totcount_ipd,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, ]

}); 
</script><br><br>

<div id="container15" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container15', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' IPD WAITING TIME - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'Average IPD Waiting Time',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_ipd = mysqli_query($connect,"SELECT SUM(wttm_opdwttm) as std_ipd FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $res_ipd = mysqli_fetch_assoc($qry_ipd);
                            $i_count_ipd = $res_ipd["std_ipd"];
                            
                            $qry5_ipd = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE wttm_opdwttm != '' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
                            $s_count_ipd = mysqli_num_rows($qry5_ipd);
                            $tot_count_ipd = $i_count_ipd / $s_count_ipd;
                            if($tot_count_ipd > 0)
                            {
                                $totcount_ipd = $tot_count_ipd;
                            }else{
                                $totcount_ipd = 0;
                            }
                    ?>
                    
                    <?php echo number_format($totcount_ipd,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, ]

}); 
</script><br><br>


<hr><br><br>

<div id="container16" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container16', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' OPD WAITING TIME - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Total No. of OPDs',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry5_opd = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
                            $s_count_opd = mysqli_num_rows($qry5_opd);
                    ?>
                    
                    <?php echo $s_count_opd;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Average OPD Waiting Time in Hrs.',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $hr_num_opd = 0;
                            $min_num_opd = 0;
                            $sum_std_opd = 0;
                            $tot_count_opd = 0;
                            $numb3_opd = 0;
                            $qry_opd = mysqli_query($connect,"SELECT opdwttm_opdwttm FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != '' ORDER BY opdwttm_id ASC")or die(mysqli_error($connect));
                            while($res_opd = mysqli_fetch_array($qry_opd))
                            {
                                $sm_std_opd = $res_opd["opdwttm_opdwttm"];
                                list($num1_opd, $num2_opd) = explode('.', $sm_std_opd);
                                $hr_num_opd = $hr_num_opd + $num1_opd;
                                $min_num_opd = $min_num_opd + $num2_opd;
                            }
                            $sum_std_opd = ($hr_num_opd * 60) + $min_num_opd;   
                            
                            $qry5_opd = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
                            $s_count_opd = mysqli_num_rows($qry5_opd);
                            
                            $tot_count_opd = $sum_std_opd / $s_count_opd;
                            if($tot_count_opd >= 60)
                            {
                                $tt_count_opd = $tot_count_opd / 60;
                                list($number1_opd, $number2_opd) = explode('.', $tt_count_opd);
                                
                                $tot_min_opd = $tot_count_opd - ($number1_opd * 60);
                                if($tot_min_opd >= 10)
                                {
                                    $numb3_opd = $number1_opd.'.'.$tot_min_opd;
                                }else if($tot_min_opd < 10){
                                    $a_opd = 0;
                                    $numbr3_opd = $number1_opd.'.'.$a_opd.''.$tot_min_opd;
                                    $numb3_opd = number_format($numbr3_opd,2);
                                }       
                            }else if($tot_count_opd < 60){
                                list($numb1_opd, $numb2_opd) = explode('.', $tot_count_opd);
                                $aj_opd = 0;
                                $numbr3_opd = $aj_opd.'.'.$numb1_opd;
                                $numb3_opd = number_format($numbr3_opd,2);
                            }
                    ?>
                    
                    <?php echo number_format($numb3_opd,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container17" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container17', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' OPD WAITING TIME - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'Total No. of OPDs',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry5_opd = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
                            $s_count_opd = mysqli_num_rows($qry5_opd);
                    ?>
                    
                    <?php echo $s_count_opd;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Average OPD Waiting Time in Hrs.',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $hr_num_opd = 0;
                            $min_num_opd = 0;
                            $sum_std_opd = 0;
                            $tot_count_opd = 0;
                            $numb3_opd = 0;
                            $qry_opd = mysqli_query($connect,"SELECT opdwttm_opdwttm FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != '' ORDER BY opdwttm_id ASC")or die(mysqli_error($connect));
                            while($res_opd = mysqli_fetch_array($qry_opd))
                            {
                                $sm_std_opd = $res_opd["opdwttm_opdwttm"];
                                list($num1_opd, $num2_opd) = explode('.', $sm_std_opd);
                                $hr_num_opd = $hr_num_opd + $num1_opd;
                                $min_num_opd = $min_num_opd + $num2_opd;
                            }
                            $sum_std_opd = ($hr_num_opd * 60) + $min_num_opd;   
                            
                            $qry5_opd = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opdwttm_dttmr != ''")or die(mysqli_error($connect));
                            $s_count_opd = mysqli_num_rows($qry5_opd);
                            
                            $tot_count_opd = $sum_std_opd / $s_count_opd;
                            if($tot_count_opd >= 60)
                            {
                                $tt_count_opd = $tot_count_opd / 60;
                                list($number1_opd, $number2_opd) = explode('.', $tt_count_opd);
                                
                                $tot_min_opd = $tot_count_opd - ($number1_opd * 60);
                                if($tot_min_opd >= 10)
                                {
                                    $numb3_opd = $number1_opd.'.'.$tot_min_opd;
                                }else if($tot_min_opd < 10){
                                    $a_opd = 0;
                                    $numbr3_opd = $number1_opd.'.'.$a_opd.''.$tot_min_opd;
                                    $numb3_opd = number_format($numbr3_opd,2);
                                }       
                            }else if($tot_count_opd < 60){
                                list($numb1_opd, $numb2_opd) = explode('.', $tot_count_opd);
                                $aj_opd = 0;
                                $numbr3_opd = $aj_opd.'.'.$numb1_opd;
                                $numb3_opd = number_format($numbr3_opd,2);
                            }
                    ?>
                    
                    <?php echo number_format($numb3_opd,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, ]

}); 
</script><br><br>

<hr noshade><br><br>

<div id="container18" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container18', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' NEEDLE PRICK INJURY - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: ' Needle Prick Injury Incidences',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_needl = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
                            $res_needl = mysqli_num_rows($qry_needl);
                    ?>
                    
                    <?php echo $res_needl;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Needle Prick Injury Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qryneedl = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
                            $resneedl = mysqli_num_rows($qryneedl);
                            
                            $qrneedl = mysqli_query($connect,"SELECT SUM(huf_lens) as stdneedl FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rsneedl = mysqli_fetch_assoc($qrneedl);
                            $i_countneedl = $rsneedl["stdneedl"];
                            
                            $rateneedl = ($resneedl / $i_countneedl) * 1000;
                            if($rateneedl > 0)
                            {
                                $rateneedl2 = $rateneedl;
                            }else{
                                $rateneedl2 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rateneedl2,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container19" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container19', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' NEEDLE PRICK INJURY - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'Needle Prick Injury Incidences',
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_needl = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
                            $res_needl = mysqli_num_rows($qry_needl);
                    ?>
                    
                    <?php echo $res_needl;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Needle Prick Injury Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qryneedl = mysqli_query($connect,"SELECT needp_id FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
                            $resneedl = mysqli_num_rows($qryneedl);
                            
                            $qrneedl = mysqli_query($connect,"SELECT SUM(huf_lens) as stdneedl FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rsneedl = mysqli_fetch_assoc($qrneedl);
                            $i_countneedl = $rsneedl["stdneedl"];
                            
                            $rateneedl = ($resneedl / $i_countneedl) * 1000;
                            if($rateneedl > 0)
                            {
                                $rateneedl2 = $rateneedl;
                            }else{
                                $rateneedl2 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rateneedl2,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, ]

}); 
</script><br><br>

<hr><br><br>

<div id="container20" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script>
    
    Highcharts.chart('container20', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'SENTINEL EVENT RELATED TO SURGERY AND ANESTHETIA - Monthly Average '
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Total Number of surgeries in the month',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                    ?>
                    
                    <?php echo $rs_surg;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
            

    }, 

    {
        name: ' Total No of anesthetia given in the month',
        marker: {
            symbol: 'diamond'
        },
        data: [     <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_ans=mysqli_query($connect,"SELECT senti_tp_ans_gv, COUNT(*) AS ans_gv FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_ans=mysqli_fetch_assoc($sql_ans);
                            $rs_ans = $qry_ans["ans_gv"];
                    ?>
                    <?php echo $rs_ans;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, 

    {
        name: '% of Unplanned return to OT',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_ret_ot=mysqli_query($connect,"SELECT senti_unpl_ret_ot FROM tbl_senti_det WHERE senti_unpl_ret_ot='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
                            $query_ret_ot=mysqli_num_rows($sql_ret_ot);
                            
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                            $otr = ($query_ret_ot / $rs_surg) * 100;
                            if($otr > 0)
                            {
                                $otr1 = $otr;
                            }else{
                                $otr1 = 0;
                            }
                    ?>
                <?php echo number_format($otr1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: '% of resceduling of surgeries',
        marker: {
            symbol: 'diamond'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                            $sql_resch=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_resch_surg_dn='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $query_resch=mysqli_num_rows($sql_resch);
                            $otf = ($query_resch / $rs_surg) * 100;
                            if($otf > 0)
                            {
                                $otf1 = $otf;
                            }else{
                                $otf1 = 0;
                            }
                    ?>
             <?php echo number_format($otf1,2);?>
             <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, 

    {
        name: 'Reexploration Rate',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                            $sql_rexpl=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_rexpl='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $query_rexpl=mysqli_num_rows($sql_rexpl);
                            $rexpl = ($query_rexpl / $rs_surg) * 100;
                            if($rexpl > 0)
                            {
                                $rexpl1 = $rexpl;
                            }else{
                                $rexpl1 = 0;
                            }
                    ?>
                <?php echo number_format($rexpl1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: '% of adverse events related to surgery',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                            $sql_evt=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_any_adv_surg_evt='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $query_evt=mysqli_num_rows($sql_evt);
                            $surg_evt = ($query_evt / $rs_surg) * 100;
                            if($surg_evt > 0)
                            {
                                $surg_evt1 = $surg_evt;
                            }else{
                                $surg_evt1 = 0;
                            }
                    ?>
                <?php echo number_format($surg_evt1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: 'Total % of PAC done',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_pacdn=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_pacdn='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $pacdn = mysqli_num_rows($sql_pacdn);
                            $sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $ans_gv = mysqli_num_rows($sql_ans_gv);
                            $pac = ($pacdn / $ans_gv) * 100;
                            if($pac > 0)
                            {
                                $pac1 = $pac;
                            }else{
                                $pac1 = 0;
                            }
                    ?>
                <?php echo number_format($pac1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: '% of modification in anesthetia plan',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_anspl=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_mod_anspl='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $anspl = mysqli_num_rows($sql_anspl);
                            $sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $ans_gv = mysqli_num_rows($sql_ans_gv);
                            $tp_ans = ($anspl / $ans_gv) * 100;
                            if($tp_ans > 0)
                            {
                                $tp_ans1 = $tp_ans;
                            }else{
                                $tp_ans1 = 0;
                            }
                    ?>
                <?php echo number_format($tp_ans1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, {
        name: '% of unplanned ventilation following anesthetia',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_aft_ans=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_unp_vent_aft_ans='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $aft_ans = mysqli_num_rows($sql_aft_ans);
                            $sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $ans_gv = mysqli_num_rows($sql_ans_gv);
                            $tp_anss1 = ($aft_ans / $ans_gv) * 100;
                            if($tp_ans > 0)
                            {
                                $tp_anss1 = $tp_anss;
                            }else{
                                $tp_anss1 = 0;
                            }
                    ?>
                <?php echo number_format($tp_ans1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },  {
        name: '% of anesthetia related mortality rate',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_rel_ans=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_dth_rel_ans='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $rel_ans = mysqli_num_rows($sql_rel_ans);
                            $sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $ans_gv = mysqli_num_rows($sql_ans_gv);
                            $tp_anns = ($rel_ans / $ans_gv) * 100;
                            if($tp_anns > 0)
                            {
                                $tp_anns1 = $tp_anns;
                            }else{
                                $tp_anns1 = 0;
                            }
                    ?>
                <?php echo number_format($tp_anns1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }]
});
</script><br><br>

<div id="container21" style="width: 800px; height: 400px; margin: 0 auto"></div>


<script >

    Highcharts.chart('container21', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'SENTINEL EVENT RELATED TO SURGERY AND ANESTHETIA- Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series:  [{
        name: 'Total Number of surgeries in the month',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                    ?>
                    
                    <?php echo $rs_surg;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
            

    }, 

    {
        name: ' Total No of anesthetia given in the month',
        marker: {
            symbol: 'diamond'
        },
        data: [     <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_ans=mysqli_query($connect,"SELECT senti_tp_ans_gv, COUNT(*) AS ans_gv FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_ans=mysqli_fetch_assoc($sql_ans);
                            $rs_ans = $qry_ans["ans_gv"];
                    ?>
                    <?php echo $rs_ans;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, 

    {
        name: '% of Unplanned return to OT',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_ret_ot=mysqli_query($connect,"SELECT senti_unpl_ret_ot FROM tbl_senti_det WHERE senti_unpl_ret_ot='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
                            $query_ret_ot=mysqli_num_rows($sql_ret_ot);
                            
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                            $otr = ($query_ret_ot / $rs_surg) * 100;
                            if($otr > 0)
                            {
                                $otr1 = $otr;
                            }else{
                                $otr1 = 0;
                            }
                    ?>
                <?php echo number_format($otr1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: '% of resceduling of surgeries',
        marker: {
            symbol: 'diamond'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                            $sql_resch=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_resch_surg_dn='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $query_resch=mysqli_num_rows($sql_resch);
                            $otf = ($query_resch / $rs_surg) * 100;
                            if($otf > 0)
                            {
                                $otf1 = $otf;
                            }else{
                                $otf1 = 0;
                            }
                    ?>
             <?php echo number_format($otf1,2);?>
             <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, 

    {
        name: 'Reexploration Rate',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                            $sql_rexpl=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_rexpl='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $query_rexpl=mysqli_num_rows($sql_rexpl);
                            $rexpl = ($query_rexpl / $rs_surg) * 100;
                            if($rexpl > 0)
                            {
                                $rexpl1 = $rexpl;
                            }else{
                                $rexpl1 = 0;
                            }
                    ?>
                <?php echo number_format($rexpl1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: '% of adverse events related to surgery',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_senti=mysqli_query($connect,"SELECT senti_nm_surg_dn, COUNT(*) AS surg_dn FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $qry_senti=mysqli_fetch_assoc($sql_senti);
                            $rs_surg = $qry_senti["surg_dn"];
                            $sql_evt=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_any_adv_surg_evt='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $query_evt=mysqli_num_rows($sql_evt);
                            $surg_evt = ($query_evt / $rs_surg) * 100;
                            if($surg_evt > 0)
                            {
                                $surg_evt1 = $surg_evt;
                            }else{
                                $surg_evt1 = 0;
                            }
                    ?>
                <?php echo number_format($surg_evt1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: 'Total % of PAC done',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_pacdn=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_pacdn='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $pacdn = mysqli_num_rows($sql_pacdn);
                            $sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $ans_gv = mysqli_num_rows($sql_ans_gv);
                            $pac = ($pacdn / $ans_gv) * 100;
                            if($pac > 0)
                            {
                                $pac1 = $pac;
                            }else{
                                $pac1 = 0;
                            }
                    ?>
                <?php echo number_format($pac1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: '% of modification in anesthetia plan',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_anspl=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_mod_anspl='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $anspl = mysqli_num_rows($sql_anspl);
                            $sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $ans_gv = mysqli_num_rows($sql_ans_gv);
                            $tp_ans = ($anspl / $ans_gv) * 100;
                            if($tp_ans > 0)
                            {
                                $tp_ans1 = $tp_ans;
                            }else{
                                $tp_ans1 = 0;
                            }
                    ?>
                <?php echo number_format($tp_ans1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }, {
        name: '% of unplanned ventilation following anesthetia',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_aft_ans=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_unp_vent_aft_ans='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $aft_ans = mysqli_num_rows($sql_aft_ans);
                            $sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $ans_gv = mysqli_num_rows($sql_ans_gv);
                            $tp_anss1 = ($aft_ans / $ans_gv) * 100;
                            if($tp_ans > 0)
                            {
                                $tp_anss1 = $tp_anss;
                            }else{
                                $tp_anss1 = 0;
                            }
                    ?>
                <?php echo number_format($tp_ans1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    } , {
        name: '% of anesthetia related mortality rate',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_rel_ans=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_dth_rel_ans='Yes' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $rel_ans = mysqli_num_rows($sql_rel_ans);
                            $sql_ans_gv=mysqli_query($connect,"SELECT senti_det_id FROM tbl_senti_det WHERE senti_tp_ans_gv <> '' AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')");
                            $ans_gv = mysqli_num_rows($sql_ans_gv);
                            $tp_anns = ($rel_ans / $ans_gv) * 100;
                            if($tp_anns > 0)
                            {
                                $tp_anns1 = $tp_anns;
                            }else{
                                $tp_anns1 = 0;
                            }
                    ?>
                <?php echo number_format($tp_anns1,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }]
});
</script><br><br>
 
 <hr><br><br>

<div id="container22" style="width: 800px; height: 400px; margin: 0 auto"></div>



<script>
    
    Highcharts.chart('container22', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'BLOOD TRANSFUSION RELATED EVENTS - Monthly Average '
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Average Turn around time for Blood',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $treq_bld = 0;
                            $trec_bld = 0;
                            $sql_bld = mysqli_query($connect,"SELECT bld_dtrec, bld_tmreq, bld_dtreq, bld_tmrec FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            while($rw_bld = mysqli_fetch_array($sql_bld))
                            {
                                $req_bld = strtotime($rw_bld["bld_dtreq"].' '.$rw_bld["bld_tmreq"]);
                                $treq_bld = $treq_bld + $req_bld;
                                $rec_bld = strtotime($rw_bld["bld_dtrec"].' '.$rw_bld["bld_tmrec"]);
                                $trec_bld = $trec_bld + $rec_bld;
                            }
                            $diff_bld = abs($trec_bld - $treq_bld);
                            $years_bld   = floor($diff_bld / (365*60*60*24)); 
                            $months_bld  = floor(($diff_bld - $years_bld * 365*60*60*24) / (30*60*60*24)); 
                            $days_bld    = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24)/ (60*60*24));
                            $hours_bld   = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24 - $days_bld*60*60*24)/ (60*60)); 
                            
                            $hour_bld   = floor(($diff_bld) / (60*60)); 

                            $minuts_bld  = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24 - $days_bld*60*60*24 - $hours_bld*60*60)/ 60); 
                            
                            $ht_mi_bld = $hour_bld.'.'.$minuts_bld;
                            $sql1_bld = mysqli_query($connect,"SELECT * FROM tbl_blood_fusion WHERE bld_dtrec <> ''")or die(mysqli_error($connect));
                            $rs_bld = mysqli_num_rows($sql1_bld);
                            $min_bld = $ht_mi_bld / $rs_bld;
                    ?>
                    
                    <?php echo number_format($min_bld,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
            

    }, 

    

    {
        name: '% of Blood Product Wastage',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql1bld = mysqli_query($connect,"SELECT SUM(bld_waste_det) as totbld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            $rs1bld = mysqli_fetch_array($sql1bld);
                            $totbld = $rs1bld["totbld"];
                            $sqlbld = mysqli_query($connect,"SELECT SUM(bld_norec) as ttbld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            $rsbld = mysqli_fetch_array($sqlbld);
                            $ttbld = $rsbld["ttbld"];
                            $ttsbld = ($totbld / $ttbld) * 100;
                            if($ttsbld > 0)
                            {
                                $tts = $ttsbld;
                            }else{
                                $tts = 0;
                            }
                    ?>
                <?php echo number_format($tts,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: '% of Blood Component Usage',
        marker: {
            symbol: 'diamond'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sqlbld2 = mysqli_query($connect,"SELECT SUM(bld_norec) as ttsbld2 FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            $rsbld2 = mysqli_fetch_array($sqlbld2);
                            $ttsbld2 = $rsbld2["ttsbld2"];
                            $sqlsbld2 = mysqli_query($connect,"SELECT SUM(bld_notrfus) as tttsbld2 FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            $rssbld2 = mysqli_fetch_array($sqlsbld2);
                            $tttsbld2 = $rssbld2["tttsbld2"];
                            $ttssbld2 = ($tttsbld2 / $ttsbld2) * 100;
                            if($ttsbld2 > 0)
                            {
                                $ttss = $ttsbld2;
                            }else{
                                $ttss = 0;
                            }
                    ?>
             <?php echo number_format($ttss,2);?>
             <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }]
});

</script><br><br>

 

<div id="container23" style="width: 800px; height: 400px; margin: 0 auto"></div>


<script >

    Highcharts.chart('container23', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'BLOOD TRANSFUSION RELATED EVENTS - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: 'Average Turn around time for Blood',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $treq_bld = 0;
                            $trec_bld = 0;
                            $sql_bld = mysqli_query($connect,"SELECT bld_dtrec, bld_tmreq, bld_dtreq, bld_tmrec FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            while($rw_bld = mysqli_fetch_array($sql_bld))
                            {
                                $req_bld = strtotime($rw_bld["bld_dtreq"].' '.$rw_bld["bld_tmreq"]);
                                $treq_bld = $treq_bld + $req_bld;
                                $rec_bld = strtotime($rw_bld["bld_dtrec"].' '.$rw_bld["bld_tmrec"]);
                                $trec_bld = $trec_bld + $rec_bld;
                            }
                            $diff_bld = abs($trec_bld - $treq_bld);
                            $years_bld   = floor($diff_bld / (365*60*60*24)); 
                            $months_bld  = floor(($diff_bld - $years_bld * 365*60*60*24) / (30*60*60*24)); 
                            $days_bld    = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24)/ (60*60*24));
                            $hours_bld   = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24 - $days_bld*60*60*24)/ (60*60)); 
                            
                            $hour_bld   = floor(($diff_bld) / (60*60)); 

                            $minuts_bld  = floor(($diff_bld - $years_bld * 365*60*60*24 - $months_bld*30*60*60*24 - $days_bld*60*60*24 - $hours_bld*60*60)/ 60); 
                            
                            $ht_mi_bld = $hour_bld.'.'.$minuts_bld;
                            $sql1_bld = mysqli_query($connect,"SELECT * FROM tbl_blood_fusion WHERE bld_dtrec <> ''")or die(mysqli_error($connect));
                            $rs_bld = mysqli_num_rows($sql1_bld);
                            $min_bld = $ht_mi_bld / $rs_bld;
                    ?>
                    
                    <?php echo number_format($min_bld,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]
            

    }, 

    

    {
        name: '% of Blood Product Wastage',
        marker: {
            symbol: 'diamond'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql1bld = mysqli_query($connect,"SELECT SUM(bld_waste_det) as totbld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            $rs1bld = mysqli_fetch_array($sql1bld);
                            $totbld = $rs1bld["totbld"];
                            $sqlbld = mysqli_query($connect,"SELECT SUM(bld_norec) as ttbld FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            $rsbld = mysqli_fetch_array($sqlbld);
                            $ttbld = $rsbld["ttbld"];
                            $ttsbld = ($totbld / $ttbld) * 100;
                            if($ttsbld > 0)
                            {
                                $tts = $ttsbld;
                            }else{
                                $tts = 0;
                            }
                    ?>
                <?php echo number_format($tts,2);?>
                <?php echo ",";?>
                    <?php
                        }
                    ?>]
    },

    {
        name: '% of Blood Component Usage',
        marker: {
            symbol: 'diamond'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sqlbld2 = mysqli_query($connect,"SELECT SUM(bld_norec) as ttsbld2 FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            $rsbld2 = mysqli_fetch_array($sqlbld2);
                            $ttsbld2 = $rsbld2["ttsbld2"];
                            $sqlsbld2 = mysqli_query($connect,"SELECT SUM(bld_notrfus) as tttsbld2 FROM tbl_blood_fusion WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
                            $rssbld2 = mysqli_fetch_array($sqlsbld2);
                            $tttsbld2 = $rssbld2["tttsbld2"];
                            $ttssbld2 = ($tttsbld2 / $ttsbld2) * 100;
                            if($ttsbld2 > 0)
                            {
                                $ttss = $ttsbld2;
                            }else{
                                $ttss = 0;
                            }
                    ?>
             <?php echo number_format($ttss,2);?>
             <?php echo ",";?>
                    <?php
                        }
                    ?>]
    }]
});


</script>
 
<hr><br><br>

<div id="container24" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container24', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' CARE RELATED EVENTS - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: ' Thromboplebitis Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car = mysqli_fetch_assoc($qry_car);
                            $i_count_car = $res_car["std_car"];
                            
                            $qry2_car1 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsymp_th = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car1 = mysqli_num_rows($qry2_car1);
                            $res_thromb_car1 = ($thromb_car1 / $i_count_car) * 1000;
                            if($res_thromb_car1 > 0)
                            {
                                $res_thromb1 = $res_thromb_car1;
                            }else{
                                $res_thromb1 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb1,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Hematoma Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car2 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car2 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car2 = mysqli_fetch_assoc($qry_car2);
                            $i_count_car2 = $res_car2["std_car2"];
                            
                            $qry2_car2 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsymp = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car2 = mysqli_num_rows($qry2_car2);
                            $res_thromb_car2 = ($thromb_car2 / $i_count_car2) * 1000;
                            if($res_thromb_car2 > 0)
                            {
                                $res_thromb2 = $res_thromb_car2;
                            }else{
                                $res_thromb2 = 0;
                            }
                            
                    ?>
                    
                    <?php echo number_format($res_thromb2,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Bed Score Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car3 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car3 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car3 = mysqli_fetch_assoc($qry_car3);
                            $i_count_car3 = $res_car3["std_car3"];
                            
                            $qry2_car3 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsyp_bed = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car3 = mysqli_num_rows($qry2_car3);
                            $res_thromb_car3 = ($thromb_car3 / $i_count_car3) * 1000;
                            if($res_thromb_car3 > 0)
                            {
                                $res_thromb3 = $res_thromb_car3;
                            }else{
                                $res_thromb3 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb3,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Patient Fall Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car4 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car4 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car4 = mysqli_fetch_assoc($qry_car4);
                            $i_count_car4 = $res_car4["std_car4"];
                            
                            $qry2_car4 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_incd_ptfall = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car4 = mysqli_num_rows($qry2_car4);
                            $res_thromb_car4 = ($thromb_car4 / $i_count_car4) * 1000;
                            if($res_thromb_car4 > 0)
                            {
                                $res_thromb4 = $res_thromb_car4;
                            }else{
                                $res_thromb4 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb4,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Accidental Removal of Drains and Lines Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car5 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car5 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car5 = mysqli_fetch_assoc($qry_car5);
                            $i_count_car5 = $res_car5["std_car5"];
                            
                            $qry2_car5 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_iardl = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car5 = mysqli_num_rows($qry2_car5);
                            $res_thromb_car5 = ($thromb_car5 / $i_count_car5) * 1000;
                            if($res_thromb_car5 > 0)
                            {
                                $res_thromb5 = $res_thromb_car5;
                            }else{
                                $res_thromb5 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb5,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Injury to Patient Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car6 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car6 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car6 = mysqli_fetch_assoc($qry_car6);
                            $i_count_car6 = $res_car6["std_car6"];
                            
                            $qry2_car6 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_injtpt = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car6 = mysqli_num_rows($qry2_car6);
                            $res_thromb_car6 = ($thromb_car6 / $i_count_car6) * 1000;
                            if($res_thromb_car6 > 0)
                            {
                                $res_thromb6 = $res_thromb_car6;
                            }else{
                                $res_thromb6 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb6,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container25" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container25', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' CARE RELATED EVENTS - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: ' Thromboplebitis Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car = mysqli_fetch_assoc($qry_car);
                            $i_count_car = $res_car["std_car"];
                            
                            $qry2_car1 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsymp_th = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car1 = mysqli_num_rows($qry2_car1);
                            $res_thromb_car1 = ($thromb_car1 / $i_count_car) * 1000;
                            if($res_thromb_car1 > 0)
                            {
                                $res_thromb1 = $res_thromb_car1;
                            }else{
                                $res_thromb1 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb1,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Hematoma Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car2 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car2 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car2 = mysqli_fetch_assoc($qry_car2);
                            $i_count_car2 = $res_car2["std_car2"];
                            
                            $qry2_car2 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsymp = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car2 = mysqli_num_rows($qry2_car2);
                            $res_thromb_car2 = ($thromb_car2 / $i_count_car2) * 1000;
                            if($res_thromb_car2 > 0)
                            {
                                $res_thromb2 = $res_thromb_car2;
                            }else{
                                $res_thromb2 = 0;
                            }
                            
                    ?>
                    
                    <?php echo number_format($res_thromb2,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Bed Score Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car3 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car3 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car3 = mysqli_fetch_assoc($qry_car3);
                            $i_count_car3 = $res_car3["std_car3"];
                            
                            $qry2_car3 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_signsyp_bed = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car3 = mysqli_num_rows($qry2_car3);
                            $res_thromb_car3 = ($thromb_car3 / $i_count_car3) * 1000;
                            if($res_thromb_car3 > 0)
                            {
                                $res_thromb3 = $res_thromb_car3;
                            }else{
                                $res_thromb3 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb3,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Patient Fall Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car4 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car4 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car4 = mysqli_fetch_assoc($qry_car4);
                            $i_count_car4 = $res_car4["std_car4"];
                            
                            $qry2_car4 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_incd_ptfall = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car4 = mysqli_num_rows($qry2_car4);
                            $res_thromb_car4 = ($thromb_car4 / $i_count_car4) * 1000;
                            if($res_thromb_car4 > 0)
                            {
                                $res_thromb4 = $res_thromb_car4;
                            }else{
                                $res_thromb4 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb4,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Accidental Removal of Drains and Lines Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car5 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car5 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car5 = mysqli_fetch_assoc($qry_car5);
                            $i_count_car5 = $res_car5["std_car5"];
                            
                            $qry2_car5 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_iardl = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car5 = mysqli_num_rows($qry2_car5);
                            $res_thromb_car5 = ($thromb_car5 / $i_count_car5) * 1000;
                            if($res_thromb_car5 > 0)
                            {
                                $res_thromb5 = $res_thromb_car5;
                            }else{
                                $res_thromb5 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb5,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Injury to Patient Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry_car6 = mysqli_query($connect,"SELECT SUM(huf_lens) as std_car6 FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $res_car6 = mysqli_fetch_assoc($qry_car6);
                            $i_count_car6 = $res_car6["std_car6"];
                            
                            $qry2_car6 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND care_injtpt = 'Yes'")or die(mysqli_error($connect));
                            $thromb_car6 = mysqli_num_rows($qry2_car6);
                            $res_thromb_car6 = ($thromb_car6 / $i_count_car6) * 1000;
                            if($res_thromb_car6 > 0)
                            {
                                $res_thromb6 = $res_thromb_car6;
                            }else{
                                $res_thromb6 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($res_thromb6,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<hr><br><br>

<div id="container26" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container26', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' MEDICAL RECORDS INDICATOR - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '  % of Missing Records',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi = mysqli_num_rows($sq_medi);
                            $sql_medi=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdav='Missing' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl_medi = mysqli_num_rows($sql_medi);
                            $rexpl_medi = ($rsl_medi / $rs_medi) * 100;
                            if($rexpl_medi > 0)
                            {
                                $rexpls_medi = $rexpl_medi;
                            }else{
                                $rexpls_medi = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls_medi,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'MRD File In order as per MRD checklist',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi2 = mysqli_num_rows($sq_medi2);
                            $sql2_medi2=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdfile='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl2_medi2 = mysqli_num_rows($sql2_medi2);
                            $rexpl2_medi2 = ($rsl2_medi2 / $rs_medi2) * 100;
                            if($rexpl2_medi2 > 0)
                            {
                                $rexpls2_medi2 = $rexpl2_medi2;
                            }else{
                                $rexpls2_medi2 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls2_medi2,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'MRD has Discharge Summary',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi3 = mysqli_num_rows($sq_medi3);
                            $sql3_medi3=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrddissum='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl3_medi3 = mysqli_num_rows($sql3_medi3);
                            $rexpl3_medi3 = ($rsl3_medi3 / $rs_medi3) * 100;
                            if($rexpl3_medi3 > 0)
                            {
                                $rexpls3_medi3 = $rexpl3_medi3;
                            }else{
                                $rexpls3_medi3 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls3_medi3,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'MRD has codification as per ICD',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi4 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi4 = mysqli_num_rows($sq_medi4);
                            $sql4_medi4=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdicd='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl4_medi4 = mysqli_num_rows($sql4_medi4);
                            $rexpl4_medi4 = ($rsl4_medi4 / $rs_medi4) * 100;
                            if($rexpl4_medi4 > 0)
                            {
                                $rexpls4_medi4 = $rexpl4_medi4;
                            }else{
                                $rexpls4_medi4 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls4_medi4,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'MRD has incomplete or Improper Consent',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi5 = mysqli_num_rows($sq_medi5);
                            $sql5_medi5=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdimpcons='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl5_medi5 = mysqli_num_rows($sql5_medi5);
                            $rexpl5_medi5 = ($rsl5_medi5 / $rs_medi5) * 100;
                            if($rexpl5_medi5 > 0)
                            {
                                $rexpls5_medi5 = $rexpl5_medi5;
                            }else{
                                $rexpls5_medi5 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls5_medi5,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' Medication orders are properly written',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi6 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi6 = mysqli_num_rows($sq_medi6);
                            $sql6_medi6=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mediord='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medi6 = mysqli_num_rows($sql6_medi6);
                            $rexpl6_medi6 = ($rsl6_medi6 / $rs_medi6) * 100;
                            if($rexpl6_medi6 > 0)
                            {
                                $rexpls6_medi6 = $rexpl6_medi6;
                            }else{
                                $rexpls6_medi6 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medi6,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' Handover Sheet of Doctors are properly filled',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi7 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi7 = mysqli_num_rows($sq_medi7);
                            $sql6_medi7=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_dr='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medi7 = mysqli_num_rows($sql6_medi7);
                            $rexpl6_medi7 = ($rsl6_medi7 / $rs_medi7) * 100;
                            if($rexpl6_medi7 > 0)
                            {
                                $rexpls6_medi7 = $rexpl6_medi7;
                            }else{
                                $rexpls6_medi7 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medi7,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' Handover Sheet of Nurses are properly filled',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi8 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi8 = mysqli_num_rows($sq_medi8);
                            $sql6_medi8=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_nur='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medi8 = mysqli_num_rows($sql6_medi8);
                            $rexpl6_medi8 = ($rsl6_medi8 / $rs_medi8) * 100;
                            if($rexpl6_medi8 > 0)
                            {
                                $rexpls6_medi8 = $rexpl6_medi8;
                            }else{
                                $rexpls6_medi8 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medi8,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' The Plan of care is documented with desired outcome and countersigned by clinicians',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi9 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi9 = mysqli_num_rows($sq_medi9);
                            $sql6_medi9=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_planofcare='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medi9 = mysqli_num_rows($sql6_medi9);
                            $rexpl6_medi9 = ($rsl6_medi9 / $rs_medi9) * 100;
                            if($rexpl6_medi9 > 0)
                            {
                                $rexpls6_medi9 = $rexpl6_medi9;
                            }else{
                                $rexpls6_medi9 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medi9,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' MRD includes screening for nutritional needs',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_media = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_media = mysqli_num_rows($sq_media);
                            $sql6_media=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_screen='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_media = mysqli_num_rows($sql6_media);
                            $rexpl6_media = ($rsl6_media / $rs_media) * 100;
                            if($rexpl6_media > 0)
                            {
                                $rexpls6_media = $rexpl6_media;
                            }else{
                                $rexpls6_media = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_media,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' MRD Includes Nursing care plan is documented with outcome at the time of admission',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medib = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medib = mysqli_num_rows($sq_medib);
                            $sql6_medib=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_nur_careplan='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medib = mysqli_num_rows($sql6_medib);
                            $rexpl6_medib = ($rsl6_medib / $rs_medib) * 100;
                            if($rexpl6_medib > 0)
                            {
                                $rexpls6_medib = $rexpl6_medib;
                            }else{
                                $rexpls6_medib = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medib,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container27" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container27', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' MEDICAL RECORDS INDICATOR - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: '  % of Missing Records',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi = mysqli_num_rows($sq_medi);
                            $sql_medi=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdav='Missing' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl_medi = mysqli_num_rows($sql_medi);
                            $rexpl_medi = ($rsl_medi / $rs_medi) * 100;
                            if($rexpl_medi > 0)
                            {
                                $rexpls_medi = $rexpl_medi;
                            }else{
                                $rexpls_medi = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls_medi,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'MRD File In order as per MRD checklist',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi2 = mysqli_num_rows($sq_medi2);
                            $sql2_medi2=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdfile='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl2_medi2 = mysqli_num_rows($sql2_medi2);
                            $rexpl2_medi2 = ($rsl2_medi2 / $rs_medi2) * 100;
                            if($rexpl2_medi2 > 0)
                            {
                                $rexpls2_medi2 = $rexpl2_medi2;
                            }else{
                                $rexpls2_medi2 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls2_medi2,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'MRD has Discharge Summary',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi3 = mysqli_num_rows($sq_medi3);
                            $sql3_medi3=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrddissum='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl3_medi3 = mysqli_num_rows($sql3_medi3);
                            $rexpl3_medi3 = ($rsl3_medi3 / $rs_medi3) * 100;
                            if($rexpl3_medi3 > 0)
                            {
                                $rexpls3_medi3 = $rexpl3_medi3;
                            }else{
                                $rexpls3_medi3 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls3_medi3,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'MRD has codification as per ICD',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi4 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi4 = mysqli_num_rows($sq_medi4);
                            $sql4_medi4=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdicd='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl4_medi4 = mysqli_num_rows($sql4_medi4);
                            $rexpl4_medi4 = ($rsl4_medi4 / $rs_medi4) * 100;
                            if($rexpl4_medi4 > 0)
                            {
                                $rexpls4_medi4 = $rexpl4_medi4;
                            }else{
                                $rexpls4_medi4 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls4_medi4,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'MRD has incomplete or Improper Consent',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi5 = mysqli_num_rows($sq_medi5);
                            $sql5_medi5=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdimpcons='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl5_medi5 = mysqli_num_rows($sql5_medi5);
                            $rexpl5_medi5 = ($rsl5_medi5 / $rs_medi5) * 100;
                            if($rexpl5_medi5 > 0)
                            {
                                $rexpls5_medi5 = $rexpl5_medi5;
                            }else{
                                $rexpls5_medi5 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls5_medi5,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' Medication orders are properly written',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi6 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi6 = mysqli_num_rows($sq_medi6);
                            $sql6_medi6=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mediord='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medi6 = mysqli_num_rows($sql6_medi6);
                            $rexpl6_medi6 = ($rsl6_medi6 / $rs_medi6) * 100;
                            if($rexpl6_medi6 > 0)
                            {
                                $rexpls6_medi6 = $rexpl6_medi6;
                            }else{
                                $rexpls6_medi6 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medi6,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' Handover Sheet of Doctors are properly filled',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi7 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi7 = mysqli_num_rows($sq_medi7);
                            $sql6_medi7=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_dr='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medi7 = mysqli_num_rows($sql6_medi7);
                            $rexpl6_medi7 = ($rsl6_medi7 / $rs_medi7) * 100;
                            if($rexpl6_medi7 > 0)
                            {
                                $rexpls6_medi7 = $rexpl6_medi7;
                            }else{
                                $rexpls6_medi7 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medi7,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' Handover Sheet of Nurses are properly filled',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi8 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi8 = mysqli_num_rows($sq_medi8);
                            $sql6_medi8=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_nur='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medi8 = mysqli_num_rows($sql6_medi8);
                            $rexpl6_medi8 = ($rsl6_medi8 / $rs_medi8) * 100;
                            if($rexpl6_medi8 > 0)
                            {
                                $rexpls6_medi8 = $rexpl6_medi8;
                            }else{
                                $rexpls6_medi8 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medi8,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' The Plan of care is documented with desired outcome and countersigned by clinicians',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medi9 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medi9 = mysqli_num_rows($sq_medi9);
                            $sql6_medi9=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_planofcare='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medi9 = mysqli_num_rows($sql6_medi9);
                            $rexpl6_medi9 = ($rsl6_medi9 / $rs_medi9) * 100;
                            if($rexpl6_medi9 > 0)
                            {
                                $rexpls6_medi9 = $rexpl6_medi9;
                            }else{
                                $rexpls6_medi9 = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medi9,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' MRD includes screening for nutritional needs',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_media = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_media = mysqli_num_rows($sq_media);
                            $sql6_media=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_screen='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_media = mysqli_num_rows($sql6_media);
                            $rexpl6_media = ($rsl6_media / $rs_media) * 100;
                            if($rexpl6_media > 0)
                            {
                                $rexpls6_media = $rexpl6_media;
                            }else{
                                $rexpls6_media = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_media,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' MRD Includes Nursing care plan is documented with outcome at the time of admission',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_medib = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
                            $rs_medib = mysqli_num_rows($sq_medib);
                            $sql6_medib=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_nur_careplan='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
                            $rsl6_medib = mysqli_num_rows($sql6_medib);
                            $rexpl6_medib = ($rsl6_medib / $rs_medib) * 100;
                            if($rexpl6_medib > 0)
                            {
                                $rexpls6_medib = $rexpl6_medib;
                            }else{
                                $rexpls6_medib = 0;
                            }
                    ?>
                    
                    <?php echo number_format($rexpls6_medib,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

 <hr><br><br>

<div id="container28" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container28', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' HR INDICATOR - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '  Employee Absentism Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_hr = mysqli_query($connect,"SELECT SUM(hr_absent) as abs_hr FROM tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs_hr = mysqli_fetch_array($sql_hr);
                            $abs_hr = $rs_hr["abs_hr"];
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $tabss1_hr = ($abs_hr/$rq_hr/30) * 100;
                            if($tabss1_hr > 0)
                            {
                                $tabs1_hr = number_format($tabss1_hr,2);
                            }else{
                                $tabs1_hr = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tabs1_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Employee Satisfaction Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $sql2_hr = mysqli_query($connect,"SELECT SUM(hr_satis_score) as abs2_hr FROM tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs2_hr = mysqli_fetch_assoc($sql2_hr);
                            $abs2_hr = $rs2_hr["abs2_hr"];
                            $tabss2_hr = ($abs2_hr/$rq_hr);
                            if($tabss2_hr > 0)
                            {
                                $tabs2_hr = $tabss2_hr;
                            }else{
                                $tabs2_hr = 0;
                            }
                    ?>

                    <?php echo number_format($tabs2_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Needle Prick Injury Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $sql4_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_need_inj = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs4_hr = mysqli_num_rows($sql4_hr);
                            $tabss4_hr = ($rs4_hr/$rq_hr) * 100;
                            if($tabss4_hr > 0)
                            {
                                $tabs4_hr = $tabss4_hr;
                            }else{
                                $tabs4_hr = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tabs4_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Occupational Exposure rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $sql5_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_occpany = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs5_hr = mysqli_num_rows($sql5_hr);
                            $tabss5_hr = ($rs5_hr/$rq_hr) * 100;
                            if($tabss5_hr > 0)
                            {
                                $tabs5_hr = $tabss5_hr;
                            }else{
                                $tabs5_hr = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tabs5_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: '% of complete HR files',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $sql6_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_per_file = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs6_hr = mysqli_num_rows($sql6_hr);
                            $tabss6_hr = ($rs6_hr/$rq_hr) * 100;
                            if($tabss6_hr > 0)
                            {
                                $tabs6_hr = $tabss6_hr;
                            }else{
                                $tabs6_hr = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tabs6_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container29" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container29', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' HR INDICATOR - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: '  Employee Absentism Rate',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql_hr = mysqli_query($connect,"SELECT SUM(hr_absent) as abs_hr FROM tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs_hr = mysqli_fetch_array($sql_hr);
                            $abs_hr = $rs_hr["abs_hr"];
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $tabss1_hr = ($abs_hr/$rq_hr/30) * 100;
                            if($tabss1_hr > 0)
                            {
                                $tabs1_hr = number_format($tabss1_hr,2);
                            }else{
                                $tabs1_hr = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tabs1_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Employee Satisfaction Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $sql2_hr = mysqli_query($connect,"SELECT SUM(hr_satis_score) as abs2_hr FROM tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs2_hr = mysqli_fetch_assoc($sql2_hr);
                            $abs2_hr = $rs2_hr["abs2_hr"];
                            $tabss2_hr = ($abs2_hr/$rq_hr);
                            if($tabss2_hr > 0)
                            {
                                $tabs2_hr = $tabss2_hr;
                            }else{
                                $tabs2_hr = 0;
                            }
                    ?>

                    <?php echo number_format($tabs2_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Needle Prick Injury Rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $sql4_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_need_inj = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs4_hr = mysqli_num_rows($sql4_hr);
                            $tabss4_hr = ($rs4_hr/$rq_hr) * 100;
                            if($tabss4_hr > 0)
                            {
                                $tabs4_hr = $tabss4_hr;
                            }else{
                                $tabs4_hr = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tabs4_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Occupational Exposure rate',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $sql5_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_occpany = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs5_hr = mysqli_num_rows($sql5_hr);
                            $tabss5_hr = ($rs5_hr/$rq_hr) * 100;
                            if($tabss5_hr > 0)
                            {
                                $tabs5_hr = $tabss5_hr;
                            }else{
                                $tabs5_hr = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tabs5_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: '% of complete HR files',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq_hr = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rq_hr = mysqli_num_rows($sq_hr);
                            $sql6_hr = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_per_file = 'Yes' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
                            $rs6_hr = mysqli_num_rows($sql6_hr);
                            $tabss6_hr = ($rs6_hr/$rq_hr) * 100;
                            if($tabss6_hr > 0)
                            {
                                $tabs6_hr = $tabss6_hr;
                            }else{
                                $tabs6_hr = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tabs6_hr,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

 

<hr noshade><br><br>

<div id="container30" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container30', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' EQUIPMENT INDICATOR - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '  Equipement Breakdown Time',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $treq_eqp = 0;
                            $trec_eqp = 0;
                            $sql_eqp = mysqli_query($connect,"SELECT eqp_dtbr, eqp_dtrp FROM tbl_eqp_indic WHERE (month(eqp_dtbr) = '$month' AND year(eqp_dtbr) = '$yr')")or die(mysqli_error($connect));
                            while($rw_eqp = mysqli_fetch_array($sql_eqp))
                            {
                                $req_eqp = strtotime($rw_eqp["eqp_dtbr"]);
                                $treq_eqp = $treq_eqp + $req_eqp;
                                $rec_eqp = strtotime($rw_eqp["eqp_dtrp"]);
                                $trec_eqp = $trec_eqp + $rec_eqp;
                            }
                            $diff_eqp = abs($trec_eqp - $treq_eqp);
                            $years_eqp   = floor($diff_eqp / (365*60*60*24)); 
                            $months_eqp  = floor(($diff_eqp - $years_eqp * 365*60*60*24) / (30*60*60*24)); 
                            $days_eqp    = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24)/ (60*60*24));
                            $hours_eqp   = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24 - $days_eqp*60*60*24)/ (60*60)); 
                            
                            $hour_eqp   = floor(($diff_eqp) / (60*60)); 

                            $minuts_eqp  = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24 - $days_eqp*60*60*24 - $hours_eqp*60*60)/ 60); 
                            
                            $ht_mi_eqp = $hour_eqp.'.'.$minuts_eqp;
                            $sql1_eqp = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic")or die(mysqli_error($connect));
                            $rs_eqp = mysqli_num_rows($sql1_eqp);
                            $min_eqp = $ht_mi_eqp / $rs_eqp;
                            if($min_eqp > 0)
                            {
                                $mineqp = $min_eqp;
                            }else{
                                $mineqp = 0;
                            }
                    ?>
                    
                    <?php echo number_format($mineqp,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'No. of Equipement under Warranty',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq2_eqp = mysqli_query($connect,"SELECT eqpid FROM tbl_eqp_mast WHERE (month(eqp_wty1) = '$month' OR month(eqp_wty1) < '$month' AND year(eqp_wty1) = '$yr' OR year(eqp_wty1) < '$yr') AND (month(eqp_wty2) > '$month' AND year(eqp_wty2) = '$yr' OR year(eqp_wty2) > '$yr')")or die(mysqli_error($connect));
                            $rs2_eqp = mysqli_num_rows($sq2_eqp);
                    ?>

                    <?php echo $rs2_eqp;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'No. of Equipement under AMC',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq3_eqp = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic WHERE (month(eqp_amc1) = '$month' OR month(eqp_amc1) < '$month' AND year(eqp_amc1) = '$yr' OR year(eqp_amc1) < '$yr') AND (month(eqp_amc2) > '$month' AND year(eqp_amc2) = '$yr' OR year(eqp_amc2) > '$yr')")or die(mysqli_error($connect));
                            $rs3_eqp = mysqli_num_rows($sq3_eqp);
                    ?>
                    
                    <?php echo $rs3_eqp;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: '% of AMC',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql4_eqp = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast")or die(mysqli_error($connect));
                            $rs4_eqp = mysqli_num_rows($sql4_eqp);                  
                            
                            $sql5_eqp = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast LEFT JOIN tbl_eqp_indic ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE (month(tbl_eqp_indic.eqp_amc1) = '$month' OR month(tbl_eqp_indic.eqp_amc1) < '$month' AND year(tbl_eqp_indic.eqp_amc1) = '$yr' OR year(tbl_eqp_indic.eqp_amc1) < '$yr') AND (month(tbl_eqp_indic.eqp_amc2) > '$month' AND year(tbl_eqp_indic.eqp_amc2) = '$yr' OR year(tbl_eqp_indic.eqp_amc2) > '$yr')")or die(mysqli_error($connect));
                            $rs5_eqp = mysqli_num_rows($sql5_eqp);
                            
                            $tt5_eqp = ($rs5_eqp / $rs4_eqp) * 100;
                            if($tt5_eqp > 0)
                            {
                                $tt5eqp = $tt5_eqp; 
                            }else{
                                $tt5eqp = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tt5eqp,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container31" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container31', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' HR INDICATOR - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series:[{
        name: '  Equipement Breakdown Time',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $treq_eqp = 0;
                            $trec_eqp = 0;
                            $sql_eqp = mysqli_query($connect,"SELECT eqp_dtbr, eqp_dtrp FROM tbl_eqp_indic WHERE (month(eqp_dtbr) = '$month' AND year(eqp_dtbr) = '$yr')")or die(mysqli_error($connect));
                            while($rw_eqp = mysqli_fetch_array($sql_eqp))
                            {
                                $req_eqp = strtotime($rw_eqp["eqp_dtbr"]);
                                $treq_eqp = $treq_eqp + $req_eqp;
                                $rec_eqp = strtotime($rw_eqp["eqp_dtrp"]);
                                $trec_eqp = $trec_eqp + $rec_eqp;
                            }
                            $diff_eqp = abs($trec_eqp - $treq_eqp);
                            $years_eqp   = floor($diff_eqp / (365*60*60*24)); 
                            $months_eqp  = floor(($diff_eqp - $years_eqp * 365*60*60*24) / (30*60*60*24)); 
                            $days_eqp    = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24)/ (60*60*24));
                            $hours_eqp   = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24 - $days_eqp*60*60*24)/ (60*60)); 
                            
                            $hour_eqp   = floor(($diff_eqp) / (60*60)); 

                            $minuts_eqp  = floor(($diff_eqp - $years_eqp * 365*60*60*24 - $months_eqp*30*60*60*24 - $days_eqp*60*60*24 - $hours_eqp*60*60)/ 60); 
                            
                            $ht_mi_eqp = $hour_eqp.'.'.$minuts_eqp;
                            $sql1_eqp = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic")or die(mysqli_error($connect));
                            $rs_eqp = mysqli_num_rows($sql1_eqp);
                            $min_eqp = $ht_mi_eqp / $rs_eqp;
                            if($min_eqp > 0)
                            {
                                $mineqp = $min_eqp;
                            }else{
                                $mineqp = 0;
                            }
                    ?>
                    
                    <?php echo number_format($mineqp,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'No. of Equipement under Warranty',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq2_eqp = mysqli_query($connect,"SELECT eqpid FROM tbl_eqp_mast WHERE (month(eqp_wty1) = '$month' OR month(eqp_wty1) < '$month' AND year(eqp_wty1) = '$yr' OR year(eqp_wty1) < '$yr') AND (month(eqp_wty2) > '$month' AND year(eqp_wty2) = '$yr' OR year(eqp_wty2) > '$yr')")or die(mysqli_error($connect));
                            $rs2_eqp = mysqli_num_rows($sq2_eqp);
                    ?>

                    <?php echo $rs2_eqp;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'No. of Equipement under AMC',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sq3_eqp = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic WHERE (month(eqp_amc1) = '$month' OR month(eqp_amc1) < '$month' AND year(eqp_amc1) = '$yr' OR year(eqp_amc1) < '$yr') AND (month(eqp_amc2) > '$month' AND year(eqp_amc2) = '$yr' OR year(eqp_amc2) > '$yr')")or die(mysqli_error($connect));
                            $rs3_eqp = mysqli_num_rows($sq3_eqp);
                    ?>
                    
                    <?php echo $rs3_eqp;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: '% of AMC',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $sql4_eqp = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast")or die(mysqli_error($connect));
                            $rs4_eqp = mysqli_num_rows($sql4_eqp);                  
                            
                            $sql5_eqp = mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast LEFT JOIN tbl_eqp_indic ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE (month(tbl_eqp_indic.eqp_amc1) = '$month' OR month(tbl_eqp_indic.eqp_amc1) < '$month' AND year(tbl_eqp_indic.eqp_amc1) = '$yr' OR year(tbl_eqp_indic.eqp_amc1) < '$yr') AND (month(tbl_eqp_indic.eqp_amc2) > '$month' AND year(tbl_eqp_indic.eqp_amc2) = '$yr' OR year(tbl_eqp_indic.eqp_amc2) > '$yr')")or die(mysqli_error($connect));
                            $rs5_eqp = mysqli_num_rows($sql5_eqp);
                            
                            $tt5_eqp = ($rs5_eqp / $rs4_eqp) * 100;
                            if($tt5_eqp > 0)
                            {
                                $tt5eqp = $tt5_eqp; 
                            }else{
                                $tt5eqp = 0;
                            }
                    ?>
                    
                    <?php echo number_format($tt5eqp,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<hr><br><br>

<div id="container32" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container32', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' IPD FEEDBACK - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '  Total No. of IPD Patient',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry4_ipdf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr')")or die(mysqli_error($connect));
                            $res4_ipdf = mysqli_num_rows($qry4_ipdf);
                    ?>
                    
                    <?php echo $res4_ipdf;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total No. of Patient Who Has Given Feedback',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_ipdf = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr') AND ipd_user != ''")or die(mysqli_error($connect));
                            $res2_ipdf = mysqli_num_rows($qry2_ipdf);
                    ?>

                    <?php echo $res2_ipdf;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'IPD Satisfaction Index',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_ipdf = mysqli_query($connect,"SELECT SUM(ipd_score) as score_ipdf FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr') AND ipd_user != ''")or die(mysqli_error($connect));
                            $res3_ipdf = mysqli_fetch_assoc($qry3_ipdf);
                            $res_ipdf = $res3_ipdf["score_ipdf"];
                            
                            $qry4_ipdf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr')")or die(mysqli_error($connect));
                            $res4_ipdf = mysqli_num_rows($qry4_ipdf);
                            
                            $tot_scor_ipdf = ($res_ipdf / 120 / $res4_ipdf) * 100;
                            $resul_ipdf = $tot_scor_ipdf;
                            if($resul_ipdf > 0)
                            {
                                $resulipdf = $resul_ipdf; 
                            }else{
                                $resulipdf = 0;
                            }
                    ?>
                    
                    <?php echo number_format($resulipdf,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container33" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container33', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' IPD FEEDBACK - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series:[{
        name: '  Total No. of IPD Patient',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry4_ipdf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr')")or die(mysqli_error($connect));
                            $res4_ipdf = mysqli_num_rows($qry4_ipdf);
                    ?>
                    
                    <?php echo $res4_ipdf;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total No. of Patient Who Has Given Feedback',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_ipdf = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr') AND ipd_user != ''")or die(mysqli_error($connect));
                            $res2_ipdf = mysqli_num_rows($qry2_ipdf);
                    ?>

                    <?php echo $res2_ipdf;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'IPD Satisfaction Index',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_ipdf = mysqli_query($connect,"SELECT SUM(ipd_score) as score_ipdf FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr') AND ipd_user != ''")or die(mysqli_error($connect));
                            $res3_ipdf = mysqli_fetch_assoc($qry3_ipdf);
                            $res_ipdf = $res3_ipdf["score_ipdf"];
                            
                            $qry4_ipdf = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(wttm_dttmr) = '$month' AND year(wttm_dttmr) = '$yr')")or die(mysqli_error($connect));
                            $res4_ipdf = mysqli_num_rows($qry4_ipdf);
                            
                            $tot_scor_ipdf = ($res_ipdf / 120 / $res4_ipdf) * 100;
                            $resul_ipdf = $tot_scor_ipdf;
                            if($resul_ipdf > 0)
                            {
                                $resulipdf = $resul_ipdf; 
                            }else{
                                $resulipdf = 0;
                            }
                    ?>
                    
                    <?php echo number_format($resulipdf,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<hr><br><br>


<div id="container34" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container34', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' OPD FEEDBACK FORM - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '  Total No. of OPD Patient',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry4_opdf = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr')")or die(mysqli_error($connect));
                            $res4_opdf = mysqli_num_rows($qry4_opdf);
                    ?>
                    
                    <?php echo $res4_opdf;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total No. of Patient Who Has Given Feedback',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_opdf = mysqli_query($connect,"SELECT opd_id FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opd_user != ''")or die(mysqli_error($connect));
                            $res2_opdf = mysqli_num_rows($qry2_opdf);
                    ?>

                    <?php echo $res2_opdf;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'OPD Satisfaction Index',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_opdf = mysqli_query($connect,"SELECT SUM(opd_score) as score_opdf FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opd_user != ''")or die(mysqli_error($connect));
                            $res3_opdf = mysqli_fetch_assoc($qry3_opdf);
                            $res_opdf = $res3_opdf["score_opdf"];
                            
                            $qry4_opdf = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr')")or die(mysqli_error($connect));
                            $res4_opdf = mysqli_num_rows($qry4_opdf);
                            
                            $tot_scor_opdf = ($res_opdf / 120 / $res4_opdf) * 100;
                            $resul_opdf = number_format($tot_scor_opdf,2);
                            if($resul_opdf > 0)
                            {
                                $resulopdf = $resul_opdf; 
                            }else{
                                $resulopdf = 0;
                            }
                    ?>
                    
                    <?php echo number_format($resulopdf,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container35" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container35', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' OPD FEEDBACK FORM - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series:[{
        name: '  Total No. of OPD Patient',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry4_opdf = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr')")or die(mysqli_error($connect));
                            $res4_opdf = mysqli_num_rows($qry4_opdf);
                    ?>
                    
                    <?php echo $res4_opdf;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total No. of Patient Who Has Given Feedback',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_opdf = mysqli_query($connect,"SELECT opd_id FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opd_user != ''")or die(mysqli_error($connect));
                            $res2_opdf = mysqli_num_rows($qry2_opdf);
                    ?>

                    <?php echo $res2_opdf;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'OPD Satisfaction Index',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry3_opdf = mysqli_query($connect,"SELECT SUM(opd_score) as score_opdf FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr') AND opd_user != ''")or die(mysqli_error($connect));
                            $res3_opdf = mysqli_fetch_assoc($qry3_opdf);
                            $res_opdf = $res3_opdf["score_opdf"];
                            
                            $qry4_opdf = mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE (month(opdwttm_dttmr) = '$month' AND year(opdwttm_dttmr) = '$yr')")or die(mysqli_error($connect));
                            $res4_opdf = mysqli_num_rows($qry4_opdf);
                            
                            $tot_scor_opdf = ($res_opdf / 120 / $res4_opdf) * 100;
                            $resul_opdf = number_format($tot_scor_opdf,2);
                            if($resul_opdf > 0)
                            {
                                $resulopdf = $resul_opdf; 
                            }else{
                                $resulopdf = 0;
                            }
                    ?>
                    
                    <?php echo number_format($resulopdf,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>


<hr><br><br>


<div id="container36" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container36', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' EMERGENCY REGISTER - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '   Total No of Emergencies',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry4_emer = mysqli_query($connect,"SELECT emrgncy_register_ipd_id FROM tbl_emrgncy_register_ipd WHERE (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr')")or die(mysqli_error($connect));
                            $emercount = mysqli_num_rows($qry4_emer);
                    ?>
                    
                    <?php echo number_format($emercount,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Average Emergency Arival Time in hrs',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qryEm2 = mysqli_query($connect,"SELECT SUM(TIME_TO_SEC(time_taken_for_initl_assmnt)) as time_diff,Count(time_taken_for_initl_assmnt) as countval FROM tbl_emrgncy_register_ipd  WHERE (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr') ")or die(mysqli_error($connect));
                    $resEm2 = mysqli_fetch_assoc($qryEm2);
                        $emercount = $resEm2['countval'];
                        $time_diff   = $resEm2['time_diff'];
                        if($emercount){
                        $avg_imgncy_arival_time = $time_diff/$emercount;
                        } else {
                                    $avg_imgncy_arival_time = 0;
                        }

                            
                    ?>
                    <?php echo number_format(($avg_imgncy_arival_time/(60*60)),2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'No of Brought Dead',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry5_emer = mysqli_query($connect,"SELECT COUNT(*) as brought_dead FROM tbl_emrgncy_register_ipd WHERE (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr') AND brought_dead='yes'")or die(mysqli_error($connect));

                            $resEm3 = mysqli_fetch_assoc($qry5_emer);

                        $brought_dead   = $resEm3['brought_dead'];
                            
                    ?>
                    
                    <?php echo ($brought_dead);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container37" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container37', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' EMERGENCY REGISTER - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series:[{
        name: '   Total No of Emergencies',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry4_emer = mysqli_query($connect,"SELECT emrgncy_register_ipd_id FROM tbl_emrgncy_register_ipd WHERE (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr')")or die(mysqli_error($connect));
                            $emercount = mysqli_num_rows($qry4_emer);
                    ?>
                    
                    <?php echo number_format($emercount,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Average Emergency Arival Time in hrs',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qryEm2 = mysqli_query($connect,"SELECT SUM(TIME_TO_SEC(time_taken_for_initl_assmnt)) as time_diff,Count(time_taken_for_initl_assmnt) as countval FROM tbl_emrgncy_register_ipd  WHERE (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr') ")or die(mysqli_error($connect));
                    $resEm2 = mysqli_fetch_assoc($qryEm2);
                        $emercount = $resEm2['countval'];
                        $time_diff   = $resEm2['time_diff'];
                        if($emercount){
                        $avg_imgncy_arival_time = $time_diff/$emercount;
                        } else {
                                    $avg_imgncy_arival_time = 0;
                        }

                            
                    ?>
                    <?php echo number_format(($avg_imgncy_arival_time/(60*60)),2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'No of Brought Dead',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry5_emer = mysqli_query($connect,"SELECT COUNT(*) as brought_dead FROM tbl_emrgncy_register_ipd WHERE (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr') AND brought_dead='yes'")or die(mysqli_error($connect));

                            $resEm3 = mysqli_fetch_assoc($qry5_emer);

                        $brought_dead   = $resEm3['brought_dead'];
                            
                    ?>
                    
                    <?php echo ($brought_dead);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<hr><br><br>


<div id="container38" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container38', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' ICU REGISTER - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '   Total No of Patient Admitted In ICU',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            
                            

                            $qryICU1 = mysqli_query($connect,"SELECT count(*) as total_icu FROM tbl_icu_register_ipd WHERE (month(date_of_admison_in_icu) = '$month' AND year(date_of_admison_in_icu) = '$yr') AND date_of_admison_in_icu !='' ")or die(mysqli_error($connect));
                $resICU1 = mysqli_fetch_assoc($qryICU1);
                $total_icu = $resICU1["total_icu"];
                    ?>
                    
                    <?php echo $total_icu;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total No of Patient Transfer/Descharge from ICU',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                    $qryICU2 = mysqli_query($connect,"SELECT count(*) as total_icu_dis FROM tbl_icu_register_ipd WHERE (month(date_of_disc_trans_in_icu) = '$month' AND year(date_of_disc_trans_in_icu) = '$yr') AND date_of_disc_trans_in_icu !='' ")or die(mysqli_error($connect));
    $resICU2 = mysqli_fetch_assoc($qryICU2);
    $total_icu_dis = $resICU2["total_icu_dis"];     
                            



                            
                    ?>
                    <?php echo $total_icu_dis;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Total No of Patient Return to ICU in 48hrs',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){

    $qryICU3 = mysqli_query($connect,"SELECT count(*) as total_icu_return FROM tbl_icu_register_ipd WHERE (month(date_of_admison_in_icu) = '$month' AND year(date_of_admison_in_icu) = '$yr') AND retrn_to_icu_in_48hrs ='Yes' ")or die(mysqli_error($connect));
    $resICU3 = mysqli_fetch_assoc($qryICU3);
    $total_icu_return = $resICU3["total_icu_return"];       
                            

                            
                    ?>
                    
                    <?php echo $total_icu_return;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: '% of Patient Return to ICU in 48hrs',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){

    $qryICU3 = mysqli_query($connect,"SELECT count(*) as total_icu_return FROM tbl_icu_register_ipd WHERE (month(date_of_admison_in_icu) = '$month' AND year(date_of_admison_in_icu) = '$yr') AND retrn_to_icu_in_48hrs ='Yes' ")or die(mysqli_error($connect));
    $resICU3 = mysqli_fetch_assoc($qryICU3);
    $total_icu_return = $resICU3["total_icu_return"];


    $qryICU1 = mysqli_query($connect,"SELECT count(*) as total_icu FROM tbl_icu_register_ipd WHERE (month(date_of_admison_in_icu) = '$month' AND year(date_of_admison_in_icu) = '$yr') AND date_of_admison_in_icu !='' ")or die(mysqli_error($connect));
                $resICU1 = mysqli_fetch_assoc($qryICU1);
                $total_icu = $resICU1["total_icu"];
            $per = 0;   
            if($total_icu){
                     $per = (($total_icu_return/$total_icu)*100);  
            }
            
                            

                            
                    ?>
                    
                    <?php echo $per;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container39" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container39', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' ICU REGISTER - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series:[{
        name: '   Total No of Patient Admitted In ICU',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            
                            

                            $qryICU1 = mysqli_query($connect,"SELECT count(*) as total_icu FROM tbl_icu_register_ipd WHERE (month(date_of_admison_in_icu) = '$month' AND year(date_of_admison_in_icu) = '$yr') AND date_of_admison_in_icu !='' ")or die(mysqli_error($connect));
                $resICU1 = mysqli_fetch_assoc($qryICU1);
                $total_icu = $resICU1["total_icu"];
                    ?>
                    
                    <?php echo $total_icu;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Total No of Patient Transfer/Descharge from ICU',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                    $qryICU2 = mysqli_query($connect,"SELECT count(*) as total_icu_dis FROM tbl_icu_register_ipd WHERE (month(date_of_disc_trans_in_icu) = '$month' AND year(date_of_disc_trans_in_icu) = '$yr') AND date_of_disc_trans_in_icu !='' ")or die(mysqli_error($connect));
    $resICU2 = mysqli_fetch_assoc($qryICU2);
    $total_icu_dis = $resICU2["total_icu_dis"];     
                            



                            
                    ?>
                    <?php echo $total_icu_dis;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Total No of Patient Return to ICU in 48hrs',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){

    $qryICU3 = mysqli_query($connect,"SELECT count(*) as total_icu_return FROM tbl_icu_register_ipd WHERE (month(date_of_admison_in_icu) = '$month' AND year(date_of_admison_in_icu) = '$yr') AND retrn_to_icu_in_48hrs ='Yes' ")or die(mysqli_error($connect));
    $resICU3 = mysqli_fetch_assoc($qryICU3);
    $total_icu_return = $resICU3["total_icu_return"];       
                            

                            
                    ?>
                    
                    <?php echo $total_icu_return;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: '% of Patient Return to ICU in 48hrs',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){

    $qryICU3 = mysqli_query($connect,"SELECT count(*) as total_icu_return FROM tbl_icu_register_ipd WHERE (month(date_of_admison_in_icu) = '$month' AND year(date_of_admison_in_icu) = '$yr') AND retrn_to_icu_in_48hrs ='Yes' ")or die(mysqli_error($connect));
    $resICU3 = mysqli_fetch_assoc($qryICU3);
    $total_icu_return = $resICU3["total_icu_return"];


    $qryICU1 = mysqli_query($connect,"SELECT count(*) as total_icu FROM tbl_icu_register_ipd WHERE (month(date_of_admison_in_icu) = '$month' AND year(date_of_admison_in_icu) = '$yr') AND date_of_admison_in_icu !='' ")or die(mysqli_error($connect));
                $resICU1 = mysqli_fetch_assoc($qryICU1);
                $total_icu = $resICU1["total_icu"];
            $per = 0;   
            if($total_icu){
                     $per = (($total_icu_return/$total_icu)*100);  
            }
            
                            

                            
                    ?>
                    
                    <?php echo $per;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    }]

}); 
</script><br><br>

<hr><br><br>
 


<div id="container40" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container40', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' LABORATORY INDICATOR - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '   Total No. of test',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry1_lopd = mysqli_query($connect,"SELECT count(*) as td FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));
                            

                            $reslod1 = mysqli_fetch_assoc($qry1_lopd);

                        $tcount   = $reslod1['td'];
                    ?>
                    
                    <?php echo ($tcount);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Avrage Total No. of test',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){

                            $qry1 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));

                            $c_count = mysqli_num_rows($qry1);
                            $avgtot = 0;
    while ($res = mysqli_fetch_array($qry1)) {
        $avgtot += strtotime($res['time_date_of_rep_gen']) - strtotime($res['sample_rec_time_date']) ;
        
    }
                    ?>
                    <?php echo number_format($avgtot / 3600, 2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'No. Critical Alerts',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_lopd = mysqli_query($connect,"SELECT *  FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND cri_res_if_any  != ' '")or die(mysqli_error($connect));

                            
    $cri_count = mysqli_num_rows($qry2_lopd);
                            
                        
                    ?>
                    
                    <?php echo number_format($cri_count);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Average Critical Alerts Time',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){


                            $qry2 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND cri_res_if_any  != ' '")or die(mysqli_error($connect));
    $cri_count = mysqli_num_rows($qry2);
    $avgcri = 0;
    while ($res = mysqli_fetch_array($qry2)) {
        $avgcri += strtotime($res['info_time']) - strtotime($res['result_time']) ;
        
    }

                            
                    ?>
                    
                    <?php echo number_format($avgcri / 3600, 2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: '% Redos',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                $qry1_lopd = mysqli_query($connect,"SELECT count(*) as td FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));
                            

                            $reslod1 = mysqli_fetch_assoc($qry1_lopd);

                        $tcount   = $reslod1['td'];         

                    $qry3 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND redos = 'Yes'")or die(mysqli_error($connect));
    $res3 = mysqli_fetch_assoc($qry3);
    $redos_count = mysqli_num_rows($qry3);
    $perredo = ($redos_count / $tcount) * 100 ;
    $perredo = is_nan($perredo)? 0 : $perredo;
                    ?>
                    
                    <?php echo number_format($perredo,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' % Reporting of Error',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                $qry1_lopd = mysqli_query($connect,"SELECT count(*) as td FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));
                            

                            $reslod1 = mysqli_fetch_assoc($qry1_lopd);

                        $tcount   = $reslod1['td'];         

                    $qry4 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND resp_err = 'Yes'")or die(mysqli_error($connect));
    $error = mysqli_num_rows($qry4);
    $pererror = ($error / $tcount) * 100 ;

    $pererror = is_nan($pererror)? 0 : $pererror;
                    ?>
                    
                    <?php echo number_format($pererror,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' % Report Corelating with Clinical Diagnosis',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                $qry1_lopd = mysqli_query($connect,"SELECT count(*) as td FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));
                            

                            $reslod1 = mysqli_fetch_assoc($qry1_lopd);

                        $tcount   = $reslod1['td'];         

                    $qry5 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND clinical_correlation = 'Yes'")or die(mysqli_error($connect));
    $clinical = mysqli_num_rows($qry5);
    $perclinical = ($clinical / $tcount) * 100 ;

    $perclinical = is_nan($perclinical)? 0 : $perclinical;
                    ?>
                    
                    <?php echo number_format($perclinical,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>

<div id="container41" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container41', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' LABORATORY INDICATOR - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: '   Total No. of test',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry1_lopd = mysqli_query($connect,"SELECT count(*) as td FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));
                            

                            $reslod1 = mysqli_fetch_assoc($qry1_lopd);

                        $tcount   = $reslod1['td'];
                    ?>
                    
                    <?php echo ($tcount);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    }, 

    {
        name: 'Avrage Total No. of test',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){

                            $qry1 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));

                            $c_count = mysqli_num_rows($qry1);
                            $avgtot = 0;
    while ($res = mysqli_fetch_array($qry1)) {
        $avgtot += strtotime($res['time_date_of_rep_gen']) - strtotime($res['sample_rec_time_date']) ;
        
    }
                    ?>
                    <?php echo number_format($avgtot / 3600, 2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'No. Critical Alerts',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                            $qry2_lopd = mysqli_query($connect,"SELECT *  FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND cri_res_if_any  != ' '")or die(mysqli_error($connect));

                            
    $cri_count = mysqli_num_rows($qry2_lopd);
                            
                        
                    ?>
                    
                    <?php echo number_format($cri_count);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: 'Average Critical Alerts Time',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){


                            $qry2 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND cri_res_if_any  != ' '")or die(mysqli_error($connect));
    $cri_count = mysqli_num_rows($qry2);
    $avgcri = 0;
    while ($res = mysqli_fetch_array($qry2)) {
        $avgcri += strtotime($res['info_time']) - strtotime($res['result_time']) ;
        
    }

                            
                    ?>
                    
                    <?php echo number_format($avgcri / 3600, 2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: '% Redos',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                $qry1_lopd = mysqli_query($connect,"SELECT count(*) as td FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));
                            

                            $reslod1 = mysqli_fetch_assoc($qry1_lopd);

                        $tcount   = $reslod1['td'];         

                    $qry3 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND redos = 'Yes'")or die(mysqli_error($connect));
    $res3 = mysqli_fetch_assoc($qry3);
    $redos_count = mysqli_num_rows($qry3);
    $perredo = ($redos_count / $tcount) * 100 ;
    $perredo = is_nan($perredo)? 0 : $perredo;
                    ?>
                    
                    <?php echo number_format($perredo,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' % Reporting of Error',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                $qry1_lopd = mysqli_query($connect,"SELECT count(*) as td FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));
                            

                            $reslod1 = mysqli_fetch_assoc($qry1_lopd);

                        $tcount   = $reslod1['td'];         

                    $qry4 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND resp_err = 'Yes'")or die(mysqli_error($connect));
    $error = mysqli_num_rows($qry4);
    $pererror = ($error / $tcount) * 100 ;

    $pererror = is_nan($pererror)? 0 : $pererror;
                    ?>
                    
                    <?php echo number_format($pererror,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },{
        name: ' % Report Corelating with Clinical Diagnosis',
        marker: {
            symbol: 'square'
        },
        data: [<?php
                        for($month = 1; $month <= 12; $month ++){
                $qry1_lopd = mysqli_query($connect,"SELECT count(*) as td FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr')")or die(mysqli_error($connect));
                            

                            $reslod1 = mysqli_fetch_assoc($qry1_lopd);

                        $tcount   = $reslod1['td'];         

                    $qry5 = mysqli_query($connect,"SELECT * FROM tbl_lab_ipd WHERE (month(sample_rec_date) = '$month' AND year(sample_rec_date) = '$yr') AND clinical_correlation = 'Yes'")or die(mysqli_error($connect));
    $clinical = mysqli_num_rows($qry5);
    $perclinical = ($clinical / $tcount) * 100 ;

    $perclinical = is_nan($perclinical)? 0 : $perclinical;
                    ?>
                    
                    <?php echo number_format($perclinical,2);?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?>]

    },]

}); 
</script><br><br>


<hr noshade><br><br>


<div id="container42" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container42', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' PHARMACY REGISTRATION - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '  Total no of Pharmacy Registration',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            
                            

                            $qryPhar = mysqli_query($connect,"SELECT count(*) as total_reg FROM tbl_pharmcy_register WHERE (month(vendor) = '$month' AND year(vendor) = '$yr') AND item_no !='' ")or die(mysqli_error($connect));
                $resPhar = mysqli_fetch_assoc($qryPhar);
                $total_reg = $resPhar["total_reg"];
                    ?>
                    
                    <?php echo $total_reg;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    } ]

}); 
</script><br><br>

<div id="container43" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container43', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' PHARMACY REGISTRATION - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: '  Total no of Pharmacy Registration',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            
                            

                            $qryPhar = mysqli_query($connect,"SELECT count(*) as total_reg FROM tbl_pharmcy_register WHERE (month(vendor) = '$month' AND year(vendor) = '$yr') AND item_no !='' ")or die(mysqli_error($connect));
                $resPhar = mysqli_fetch_assoc($qryPhar);
                $total_reg = $resPhar["total_reg"];
                    ?>
                    
                    <?php echo $total_reg;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    } ]

}); 
</script><br><br>


<hr noshade><br><br>


<div id="container44" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container44', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' RADIOLOGY INDICATOR (IPD) - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '  Total no of Radiology Indicator',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            
                            

                            $qryRIPD = mysqli_query($connect,"SELECT count(*) as total_ripd FROM tbl_radio_ipd WHERE (month(date_time_of_rep_gen) = '$month' AND year(date_time_of_rep_gen) = '$yr') AND prov_finl_daig !='' ")or die(mysqli_error($connect));
                $resRIPD = mysqli_fetch_assoc($qryRIPD);
                $total_ripd = $resRIPD["total_ripd"];

                $qryRIPD1 = mysqli_query($connect,"SELECT count(*) as total_ripd1 FROM tbl_radio_ipd_extra WHERE (month(date_time_of_rep_gen) = '$month' AND year(date_time_of_rep_gen) = '$yr') AND prov_finl_daig !='' ")or die(mysqli_error($connect));
                $resRIPD1 = mysqli_fetch_assoc($qryRIPD1);
                $total_ripd1 = $resRIPD1["total_ripd1"];
                    ?>
                    
                    <?php echo $total_ripd + $total_ripd1;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    } ]

}); 
</script><br><br>

<div id="container45" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container45', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' RADIOLOGY INDICATOR (IPD)- Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: '  Total no of Radiology Indicator',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            
                            

                            $qryRIPD = mysqli_query($connect,"SELECT count(*) as total_ripd FROM tbl_radio_ipd WHERE (month(date_time_of_rep_gen) = '$month' AND year(date_time_of_rep_gen) = '$yr') AND prov_finl_daig !='' ")or die(mysqli_error($connect));
                $resRIPD = mysqli_fetch_assoc($qryRIPD);
                $total_ripd = $resRIPD["total_ripd"];

                $qryRIPD1 = mysqli_query($connect,"SELECT count(*) as total_ripd1 FROM tbl_radio_ipd_extra WHERE (month(date_time_of_rep_gen) = '$month' AND year(date_time_of_rep_gen) = '$yr') AND prov_finl_daig !='' ")or die(mysqli_error($connect));
                $resRIPD1 = mysqli_fetch_assoc($qryRIPD1);
                $total_ripd1 = $resRIPD1["total_ripd1"];
                    ?>
                    
                    <?php echo $total_ripd + $total_ripd1;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    } ]

}); 
</script><br><br>

<hr noshade><br><br>
<div id="container46" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >
    
    Highcharts.chart('container46', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ' RADIOLOGY INDICATOR (OPD) - Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        labels: {
            formatter: function () {
               // return this.value + '%';
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '  Total no of Radiology Indicator',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            
                            

                            $qryROPD = mysqli_query($connect,"SELECT count(*) as total_ropd FROM tbl_radio_opd WHERE (month(date_time_of_rep_gen) = '$month' AND year(date_time_of_rep_gen) = '$yr') AND prov_finl_daig !='' ")or die(mysqli_error($connect));
                $resROPD = mysqli_fetch_assoc($qryROPD);
                $total_ropd = $resROPD["total_ropd"];

                $qryROPD1 = mysqli_query($connect,"SELECT count(*) as total_ropd1 FROM tbl_radio_opd_extra WHERE (month(date_time_of_rep_gen) = '$month' AND year(date_time_of_rep_gen) = '$yr') AND prov_finl_daig !='' ")or die(mysqli_error($connect));
                $resROPD1 = mysqli_fetch_assoc($qryROPD1);
                $total_ropd1 = $resROPD1["total_ropd1"];
                    ?>
                    
                    <?php echo $total_ropd + $total_ropd1;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    } ]

}); 
</script><br><br>

<div id="container47" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script >

    Highcharts.chart('container47', {
    chart: {
        type: 'line'
    },
    title: {
        text: ' RADIOLOGY INDICATOR (OPD)- Monthly Average'
    },
    subtitle: {
        text: 'Source: PERFORMANCE OF KEY QUALITY INDICATOR'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Number'
        },
        column: {
        zones: [{
            value: 10, // Values up to 10 (not including) ...
            color: 'gold' // ... have the color blue.
        },{
            color: 'red' // Values from 10 (including) and up have the color red
        }]
    },
        plotLines: [{
                value: 4,
                color: 'green',
                dashStyle: 'shortdash',
                width: 2,
                label: {
                    text: 'minimum'
                }
            }, {
                value: 10,
                color: 'red',
               
                width: 2,
                label: {
                    text: 'maximum'
                }
            }]
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        },
    },
    series: [{
        name: '  Total no of Radiology Indicator',
        marker: {
            symbol: 'square'
        },
        data: [ <?php
                        for($month = 1; $month <= 12; $month ++){
                            
                            

                            $qryROPD = mysqli_query($connect,"SELECT count(*) as total_ropd FROM tbl_radio_opd WHERE (month(date_time_of_rep_gen) = '$month' AND year(date_time_of_rep_gen) = '$yr') AND prov_finl_daig !='' ")or die(mysqli_error($connect));
                $resROPD = mysqli_fetch_assoc($qryROPD);
                $total_ropd = $resROPD["total_ropd"];

                $qryROPD1 = mysqli_query($connect,"SELECT count(*) as total_ropd1 FROM tbl_radio_opd_extra WHERE (month(date_time_of_rep_gen) = '$month' AND year(date_time_of_rep_gen) = '$yr') AND prov_finl_daig !='' ")or die(mysqli_error($connect));
                $resROPD1 = mysqli_fetch_assoc($qryROPD1);
                $total_ropd1 = $resROPD1["total_ropd1"];
                    ?>
                    
                    <?php echo $total_ropd + $total_ropd1;?>
                    <?php echo ",";?>
                    <?php
                        }
                    ?> ]
            

    } ]

}); 
</script><br><br>

<hr><br><br>




 









<!--<div id="containerGa" style="width: 800px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
    Highcharts.chart('containerGa', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },

    title: {
        text: 'Speedometer'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: 'km/h'
        },
        plotBands: [{
            from: 0,
            to: 120,
            color: '#55BF3B' // green
        }, {
            from: 120,
            to: 160,
            color: '#DDDF0D' // yellow
        }, {
            from: 160,
            to: 200,
            color: '#DF5353' // red
        }]
    },

    series: [{
        name: 'Speed',
        data: [80],
        tooltip: {
            valueSuffix: ' km/h'
        }
    }]

},
// Add some life
function (chart) {
    if (!chart.renderer.forExport) {
        setInterval(function () {
            var point = chart.series[0].points[0],
                newVal,
                inc = Math.round((Math.random() - 0.5) * 20);

            newVal = point.y + inc;
            if (newVal < 0 || newVal > 200) {
                newVal = point.y - inc;
            }

            point.update(newVal);

        }, 3000);
    }
});
</script>-->

	
