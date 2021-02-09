<script type="text/javascript">

var audits = []; 
 var table = '<?=$tbl?>';
  audits[0] = {name:$('#audittitle').val(), val1:"numbers", val2:'%'};



  for(var k in audits) {
                 

            console.log(k , audits[k]);

             eval('options'+k+'='+k+';');

             
                }

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
            text: audits[i].name
        }
    },tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
        text: 'Hr  Audit'
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
        }} ,{name: audits[i].val2,dataLabels: {
            enabled: true,
            rotation: -90,
            color: 'green',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }}],

    };

    obj1[i]='options'+i;
         
    } 
    
         

   


    


    function line_chart(){


        
        var a_id1= $("#a_id1").val();
        var t_id = '<?=$t_id?>';
            if(a_id1 != '')
            {
    $.ajax({  
        url: 'daily_audit_data/show_excel2.php',
        data:{tbl:table,name:$('#audittitle').val(),id:a_id1,t_id:t_id}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        

        

        
        options0.series[0].data = data.a;
         options0.series[1].data = data.b;
        options0.xAxis.categories=data.col_name;

        var chart = new Highcharts.Chart(options0);
         chart.setTitle({ text: data.name });

       
        
        

        }  
    });

}

    }

   line_chart();

</script>
