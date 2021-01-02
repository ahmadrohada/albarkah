<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">DATA PENJUALAN [ <?php echo date('d'."-".'m'."-".'Y')?>]</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
          <div id="chartdiv" style="width: 100%; height: 430px;"></div>
    </div>
</div>


<script src="./assets/js/amcharts.js" type="text/javascript"></script>
<script src="./assets/js/pie.js" type="text/javascript"></script>
<script src="./assets/js/responsive.min.js"></script>

<script>
$(document).ready(function () {


    $.ajax({
			url		    : "./kelas/dashboard.php",
			type        : "GET",
			data	    : {op:"chart_penjualan_today"},
			dataType    : "json",
			cache	    : false,
			success	    : function(chartData){
			
					var chart = AmCharts.makeChart("chartdiv",{
				
							   "responsive": {
								"enabled": true
							  },
							  "legend": {
								  "enabled": true
								 
								},
								"valueAxes": {
								  "inside": true
								},
							  "type"    : "pie",
							  "titleField"  : "jenis_beras",
							  "valueField"  : "jumlah",
							 "dataProvider" : chartData['jenis_beras'],
							 
							 "balloon": {
								"adjustBorderColor": true,
								"color": "#000000",
								"cornerRadius": 5,
								"fillColor": "#FFFFFF"
							  },
							  "depth3D":15,
							  "angle" : 38,
							  "gradientRatio" :  [-0.2, 0, -0.1],
							  
							  "balloonText" : "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> Kg ([[percents]]%)</span>",
							 "fontFamily" : "isi",
							"colors" : ["#001de0","#00e00b","#ff9724","#fffc24","#e02c00"],
							"startEffect" : "bounce", //easeInSine, elastic, bounce
						
						});		
			
						
				
			}
		});

});
</script>		