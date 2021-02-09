<script type="text/javascript">

 var audits = ["MR without Discharge Summary","MR having Incomplete/Improper consent","MR without Sign of consultant on Initial Assessment sheet","MR without Sign of consultant on Medication Order","MR without Nursing Asssement","MR without Nutritional Asssement","MR without Physiotherapy Asssement","Post anaesthesia scoring done & Signed by anaesthtist"]; 


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
        text: 'Medical Records Audit'
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
    
         

   




    function line_chart(){


    	var frdate = $('#frdate').val();
			var todate = $('#todate').val();
			if(frdate != '' && todate != '')
			{
    $.ajax({  
        url: 'medical_record_audit_d/show_excel.php',
        data:{frdate:frdate,todate:todate}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        //console.log(data);

        

        
        options0.series[0].data = data.mr_without_dis_summary;
        options0.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options0);

        options1.series[0].data = data.mr_having_incm_imp_const;
        options1.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options1);

        options2.series[0].data = data.dose;
        options2.xAxis.categories=data.mr_without_sign_init_ass_sheet;
        var chart = new Highcharts.Chart(options2);

        options3.series[0].data = data.quantity;
        options3.xAxis.categories=data.mr_without_sign_init_medictn_order;
        var chart = new Highcharts.Chart(options3);

        options4.series[0].data = data.mr_without_nursing_asst;
        options4.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options4);

        options5.series[0].data = data.mr_without_nutrition_asst;
        options5.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options5);

        options6.series[0].data = data.mr_without_physipy_asst;
        options6.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options6);

        options7.series[0].data = data.post_anaesthesia_scroing_sign_anaesthist;
        options7.xAxis.categories=data.col_name;
        var chart = new Highcharts.Chart(options7);

        
        
        

        }  
    });

}

    }

  line_chart();

</script>
