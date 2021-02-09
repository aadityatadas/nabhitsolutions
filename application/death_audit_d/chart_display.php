<script type="text/javascript">

 var audits = []; 


  audits[0] = {name:"Type Of Admission", val1:"% of Emergency", val2:'% of planned'}; 
  audits[2] = {name:"Probability of Death Expected During Admission", val1:"% of Expected", val2:'% of Non Expected'}; 
  audits[3] = {name:"Surgery/Procedure", val1:"% of Surgery", val2:'% of Procedure'}; 
  










  

  var obj1 = [];
 var k = 'options'; 
        
    for(var i in audits) {
        window['options'+i] = {
        chart: {
            renderTo: 'line_chart'+i,
            type: 'column'
        },
        xAxis: {
     type: 'string',
   
    },
    yAxis: {
        min: 0,
        title: {
            text: '% of '+audits[i].name
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
        text: 'Death Audit '
    },
    subtitle: {
        text: audits[i].name
    },
        series: [{name: audits[i].val1,dataLabels: {
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
        }},{name: audits[i].val2,dataLabels: {
            enabled: true,
            rotation: -90,
            color: 'Green',
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

    
  



audits[4] = {name:"Apache Score During Admission", val1:"Number", val2:'%'}; 
  audits[5] = {name:"Sofa Score Within 48 hrs", val1:"Number", val2:'%'}; 
 
var obj2 = [];
 var k = 'options'; 
        
    for(var i in audits) {
        window['options'+i] = {
        chart: {
            renderTo: 'line_chart'+i,
            type: 'column'
        },
        xAxis: {
     type: 'string',
   
    },
    yAxis: {
        min: 0,
        title: {
            text: '% of '+audits[i].name
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
        text: 'Death Audit '
    },
    subtitle: {
        text: audits[i].name
    },
        series: [{name: audits[i].val1,dataLabels: {
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
        }},{name: audits[i].val2,dataLabels: {
            enabled: true,
            rotation: -90,
            color: 'Green',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }} ],

    };

    obj2[i]='options'+i;
         
    } 


    var optionsX = {
        chart: {
            renderTo: 'line_chart1',
            type: 'column'
        },
        xAxis: {
     type: 'string',
   
    },
    yAxis: {
        min: 0,
        title: {
            text: '% of Condition at the time of admission'
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
        text: 'Death Audit '
    },
    subtitle: {
        text: 'Condition at the time of admission'
    },
        series: [{name: '% of Critical',dataLabels: {
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
        }},{name: '% of Non Critical',dataLabels: {
            enabled: true,
            rotation: -90,
            color: 'Green',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }},{name: '% of End Of life',dataLabels: {
            enabled: true,
            rotation: -90,
            color: 'Red',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }} ],

    };

    var optionsY = {
        chart: {
            renderTo: 'line_chart6',
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
        text: 'Death Audit '
    },
    subtitle: {
        text: 'Factor Affecting mortality'
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
        url: 'death_audit_d/fetch_chart1.php',
        data:{selectedquater_id:selectedquater_id , frm1Graphh:frm1Graphh,to1Graphh :to1Graphh,graphp:1}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        


        
        options0.series[0].data = data.Emergency;

        options0.series[1].data = data.Planned;


        
        options0.xAxis.categories=data.col_name;

        var chart = new Highcharts.Chart(options0);

        options2.series[0].data = data.Expected;
        options2.series[1].data = data.NotExpected;
        options2.xAxis.categories=data.col_name;

        var chart = new Highcharts.Chart(options2);


        options3.series[0].data = data.Surgery;
        options3.series[1].data = data.Procedure;
        options3.xAxis.categories=data.col_name;

        var chart = new Highcharts.Chart(options3);



        options4.series[0].data = data.Aval;
        options4.series[1].data = data.APer;
        options4.xAxis.categories=data.col_nameA;
        var chart = new Highcharts.Chart(options4);


        options5.series[0].data = data.Sval;
        options5.series[1].data = data.SPer;
        options5.xAxis.categories=data.col_nameS;
        var chart = new Highcharts.Chart(options5);


        

       
        
        

        }  
    });

    $.ajax({  
        url: 'death_audit_d/fetch_chart1.php',
        data:{selectedquater_id:selectedquater_id , frm1Graphh:frm1Graphh,to1Graphh :to1Graphh,graphp:2}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
      optionsX.series[0].data = data.critial;

        optionsX.series[1].data = data.noncritial;

         optionsX.series[2].data = data.EndOflife;
    optionsX.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(optionsX);
   }  
    });

    $.ajax({  
        url: 'death_audit_d/fetch_chart1.php',
        data:{selectedquater_id:selectedquater_id , frm1Graphh:frm1Graphh,to1Graphh :to1Graphh,graphp:3}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        optionsY.series[0].data = data.a;

       
        optionsY.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(optionsY);
   }  
    });

    

 }





    }

  audit_chart();

</script>
