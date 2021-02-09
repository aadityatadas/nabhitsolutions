<div class="col-lg-12" style="padding-top: 30px;">
        <div class="col-lg-4">
          <select class="form-control" id="item1">
            <option value="9">Averarge Intial Assessment Time in Hrs.</option>
           </select>
        </div>
        <div class="col-lg-4">
          <select class="form-control" id="graph1">
            <option value="histogram">Histogram</option>
            <option value="pareto"> Pareto</option>
            <option value="scatter">Scatter</option>
            <option value="spline">Asq control</option>
            
          </select>
        </div>
         <div class="col-lg-4">
           <button class="btn btn-primary" onclick="line_chart1();">Search</button>
         </div>
      </div>
      <div id="container_histo1" style="width: 600px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">


 //var chart = new Highcharts.Chart(options2);
 function line_chart1(){


  var value1 = $("#item1 option:selected"); 
//alert(value1.text());
var heads1 = [value1.text()]; 
var graph1 = $('#graph1').val();
//alert(graph);
  options2 =  {
  chart: {
        renderTo: 'container_histo1',
        type: 'column'
    },
    title: {
        text: heads1[0]
    },
    tooltip: {
        shared: true
    },
   xAxis: {
    type: 'string'
    ,
    crosshair: true
  },
    yAxis: [{
        title: {
            text: ''
        }
    }, {
        title: {
            text: ''
        },
        minPadding: 0,
        maxPadding: 0,
        max: 100,
        min: 0,
        opposite: true,
        labels: {
            format: "{value}%"
        }
    }],
    series: [{
        type: graph1,
        name: 'percent',
        yAxis: 1,
        zIndex: 10,
        baseSeries: 1,
        tooltip: {
            valueDecimals: 1,
            valueSuffix: '%'
        }
    }, {
        name: 'Values',
        type: 'column',
        zIndex: 2,

        
    }]
};
      //$('#item').val();
     var items = $('#item1').val();
     alert(items);
    /* var value = $("#item option:selected"); 
                //alert(value.text());
     
     heads = [value.text()];*/

    $.ajax({  
        url: 'sup_admin/fecth_data_table.php',
        data:{items:items}, 
        dataType: 'json',
        method:"POST",
        success: function(data) {
        console.log(data);

        

        
        options2.series[0].data = data.indicator;
        options2.xAxis.categories=data.categories;
       // var chart = new Highcharts.Chart(options2);
       var chart = new Highcharts.Chart(options2);
      

        
        

        }  
    });

}

   

  line_chart1();
</script>