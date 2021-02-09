<script type="text/javascript">


    chapterArary = ['Chapter 1','Chapter 2','Chapter 3','Chapter 4','Chapter 5','Chapter 6','Chapter 7','Chapter 8','Chapter 9','Chapter 10'];

    for(var i in chapterArary) {
        window['options'+i] = {
	
    chart: {
        type: 'bar',
         renderTo: 'con_chapter'+i,
    },
    title: {
        text: chapterArary[i]
    },
    subtitle: {
        text: null
    },
    xAxis: {
        categories: [chapterArary[i]],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Numbers',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' nos'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Yes',
        enabled: true,
        
    }, {
        name: 'No',
        enabled: true,
        
    }, {
        name: 'Total',
        enabled: true,
        
    }]
};

} 

//var chart = new Highcharts.Chart(options1);
 function line_chart(){

     var items = '';
    $.ajax({  
        url: 'assement_tool_chart/fetch_chapter_data.php',
        data:{items:items}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        console.log(data);

        
       

        for(let i = 0; i<10;i++){
           let option= window['options'+i];
           
                 let d = data['chapter'+i];
                // console.log(d);
                 option.series[0].data = [d[0]];
                option.series[1].data = [d[1]];
                option.series[2].data = [d[2]];
            
               // var chart = new Highcharts.Chart(options1);
               var chart = new Highcharts.Chart(option);
        }

        
        
      

        
        

        }  
    });

}

   

  line_chart();
</script>