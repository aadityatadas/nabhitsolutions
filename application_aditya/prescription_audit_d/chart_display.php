<script type="text/javascript">

 var audits = ["Patient Name","Medicatioy written in CAPS & Legible","Dose","Quantity","Date of prescription", "High risk medication verified","Signature of Doctor",'Prescription written by autorized person','Drug name is clear','Dose Route is correct','Time is written on prescription' , 'Sign of authorized person on prescription' ]; 




  // for(var k in audits) {
                 

  //           //console.log(k , audits[k]);

  //            eval('options'+k+'='+k+';');

  //            console.log('options'+k);
  //               }

  var obj1 = [];
 var k = 'options'; 
        
    for(var i in audits) {
        window['options'+i] = {
        chart: {
            renderTo: 'line_chart'+i,
            type: 'line'
        },
        xAxis: {
     type: 'string',
   
    },
    yAxis: {
        min: 0,
        title: {
            text: '% of '+audits[i]
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
        text: 'priscription Audit'
    },
    subtitle: {
        text: audits[i]
    },
        series: [{name: '% of yes',dataLabels: {
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
        }} ],

    };

    obj1[i]='options'+i;
         
    } 
    
         

   


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


    function line_chart(){


    	var frdate = $('#frdate').val();
			var todate = $('#todate').val();
			if(frdate != '' && todate != '')
			{
    $.ajax({  
        url: 'prescription_audit_d/show_excel.php',
        data:{frdate:frdate,todate:todate}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        console.log(data);

        var a = ["patient_name_present","medic_caps_legible","dose","quantity","date_prescription","high_risk_medicn_verified","sign_of_doc"];

        
        options0.series[0].data = data.patient_name_present;
        options0.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options0);

        options1.series[0].data = data.medic_caps_legible;
        options1.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options1);

        options2.series[0].data = data.dose;
        options2.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options2);

        options3.series[0].data = data.quantity;
        options3.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options3);

        options4.series[0].data = data.date_prescription;
        options4.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options4);

        options5.series[0].data = data.high_risk_medicn_verified;
        options5.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options5);

        options6.series[0].data = data.sign_of_doc;
        options6.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options6);

        options7.series[0].data = data.pre_by_auth_person;
        options7.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options7);

        options8.series[0].data = data.drug_name_clear;
        options8.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options8);

        options9.series[0].data = data.dose_corret;
        options9.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options9);

        options10.series[0].data = data.time_prescription;
        options10.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options10);

        options11.series[0].data = data.sign_of_auth;
        options11.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options11);
        
        

        }  
    });

}

    }

  line_chart();

</script>
