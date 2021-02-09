<div class="col-lg-12" style="padding-top: 30px;">
        <div class="col-lg-4">
          <select class="form-control" id="item">
            <option value="1">Total No. of Inpatient Days</option>
            <option value="2"> Total No. of Admissions</option>
            <option value="3">Total No. of Discharges</option>
            <option value="4">Total No. of DAMA</option>
            <option value="5">Total No. of Death</option>
            <option value="6">Total No. of MLC</option>
            <option value="7">Average Length of stay (in Days)</option>
            <option value="8">Total No. of Surgeries</option>
          </select>
        </div>
        <div class="col-lg-4">
          <select class="form-control" id="graph">
            <option value="histogram">Histogram</option>
            <option value="pareto"> Pareto</option>
            <option value="scatter">Scatter</option>
            <option value="spline">Asq control</option>
            
          </select>
        </div>
         <div class="col-lg-4">
           <button class="btn btn-primary" onclick="line_chart();">Search</button>
         </div>
      </div>
      <div id="container_histo" style="width: 600px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">


 //var chart = new Highcharts.Chart(options1);
 function line_chart(){


  var value = $("#item option:selected"); 
//alert(value.text());
var heads = [value.text()]; 
var graph = $('#graph').val();
//alert(graph);
  options1 =  {
  chart: {
        renderTo: 'container_histo',
        type: 'column'
    },
    title: {
        text: heads[0]
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
        type: graph,
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
     var items = $('#item').val();
     //alert(items);
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

        

        
        options1.series[1].data = data.indicator;
        options1.xAxis.categories=data.categories;
       // var chart = new Highcharts.Chart(options1);
       var chart = new Highcharts.Chart(options1);
      

        
        

        }  
    });

}

   

  line_chart();
</script>