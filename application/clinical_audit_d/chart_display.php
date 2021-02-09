<script type="text/javascript">

 

    var options1 = {
        chart: {
            renderTo: 'line_chart0',
            type: 'column'
        },
        xAxis: {
     type: 'string',
   
    },
    yAxis: {
        min: 0,
        title: {
            text: '% of Yes'
        }
    },tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },

    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    title: {
        text: 'Clinical Auidit '
    },
    subtitle: {
        text: ''
    },
        series: [{name: '% of Yes',dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }}],

    };
    
         

   


    // var options1 = {
    //     chart: {
    //         renderTo: 'line_chart2',
    //         type: 'line'
    //     },
    //     xAxis: {
    //  type: 'string',
   
    // },
    // yAxis: {
    //     min: 0,
    //     title: {
    //         text: '% Medicatioy written in CAPS & Legible'
    //     }
    // },tooltip: {
    //     headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //     pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    //         '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
    //     footerFormat: '</table>',
    //     shared: true,
    //     useHTML: true
    // },

    // plotOptions: {
    //     column: {
    //         pointPadding: 0.2,
    //         borderWidth: 0
    //     }
    // },
    // legend: {
    //     align: 'right',
    //     x: -30,
    //     verticalAlign: 'top',
    //     y: 25,
    //     floating: true,
    //     backgroundColor:
    //         Highcharts.defaultOptions.legend.backgroundColor || 'white',
    //     borderColor: '#CCC',
    //     borderWidth: 1,
    //     shadow: false
    // },
    // title: {
    //     text: 'priscription Audit'
    // },
    // subtitle: {
    //     text: 'Medicatioy written in CAPS & Legible'
    // },
    //     series: [{name: '% of yes',dataLabels: {
    //         enabled: true,
    //         rotation: -90,
    //         color: '#FFFFFF',
    //         align: 'right',
    //         format: '{point.y:.1f}', // one decimal
    //         y: 10, // 10 pixels down from the top
    //         style: {
    //             fontSize: '13px',
    //             fontFamily: 'Verdana, sans-serif'
    //         }
    //     }} ],

    // };


    function audit_chart(){


     	var selectedquater_id = $('#quaterGraphh').val();
        var frm1Graphh=$('#frm1Graphh').val();
        var to1Graphh=$('#to1Graphh').val();


			
			if(selectedquater_id != '' )
	 {
    

    $.ajax({  
        url: 'clinical_audit_d/fetch_chart1.php',
        data:{selectedquater_id:selectedquater_id , frm1Graphh:frm1Graphh,to1Graphh :to1Graphh,graphp:1}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        options1.series[0].data = data.a;

       
        options1.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options1);
   }  
    });

    

 }





    }

  audit_chart();

</script>
