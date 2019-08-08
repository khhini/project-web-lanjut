<h3><span class="glyphicon glyphicon-home"></span>  Beranda</h3>
<br>
<h4><span class="">  Data Gudang</span></h4>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current',{'packages':['corechart']});
    google.charts.load("current", {packages: ["bar"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart(){
			
	var dataPie = new google.visualization.DataTable(<?php echo $data['pieChartJson']; ?>);
	var dataBar = new google.visualization.DataTable(<?php echo $data['pieChartJson']; ?>);	
	var options = {
        titleTextStyle: {
            fontSize: 24
        },
        'width': 500, 
        'height':500,
        colors: ['#911176', '#209111', '#d87a0e'],
        legend: {
            position: 'top',
            alignment: 'center'
        }
    };
    var Baroptions = {
          width: 500,
          
          height:500,
          legend: { position: 'none' },
          chart: { title: 'Data Stok Gudang',
                   subtitle: 'Gudang' },
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },

          axes: {
            x: {
              distance: {label: 'parsecs'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

    
	var pieChart = new google.visualization.PieChart(document.getElementById('pieChart'));
    pieChart.draw(dataPie, options);
    
    var barChart = new google.visualization.BarChart(document.getElementById('barChart'));
    barChart.draw(dataBar,Baroptions);
}
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="pieChart"></div>
        </div>
        <div class="col-md-6">
            <div id="barChart"></div>
        </div>
    </div>
</div>

