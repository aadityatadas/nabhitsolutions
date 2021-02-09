<script type="text/javascript">

var heads = ['Total No. of Inpatient Days']; 

	options1 =  {
  chart: {
    renderTo: 'container_histo',
    type: 'column'
  },
  title: {
    text: heads[0]
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    type: 'string'
    ,
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: ''
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0,
      borderWidth: 0,
      groupPadding: 0,
      shadow: false
    }
  },
  series: [{
    name: 'Indicator',
    

  }]
};

 //var chart = new Highcharts.Chart(options1);
 function line_chart(){

     var items = '';
    $.ajax({  
        url: 'fecth_data_table.php',
        data:{items:items}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        console.log(data);

        

        
        options1.series[0].data = data.indicator;
        options1.xAxis.categories=data.categories;
       // var chart = new Highcharts.Chart(options1);
       var chart = new Highcharts.Chart(options1);
      

        
        

        }  
    });

}

   

  line_chart();
</script>