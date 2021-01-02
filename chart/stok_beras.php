
    <div class="box-body">
          <div id="chartdiv_stok" style="width: 100%; height: 330px;"></div>
    </div>

<script src="./assets/js/amcharts.js" type="text/javascript"></script>
<script src="./assets/js/pie.js" type="text/javascript"></script>
<script src="./assets/js/responsive.min.js"></script>

<script>
$(document).ready(function () {


    $.ajax({
			url		    : "./kelas/dashboard.php",
			type      : "GET",
			data	    : {op:"stok_beras"},
			dataType  : "json",
			cache	    : false,
			success	  : function(chartData){
			
					var chart = AmCharts.makeChart("chartdiv_stok",{
				
							   "responsive": {
								"enabled": true
							  },
							  "legend": {
								  "enabled": false
								 
								},
								"valueAxes": {
								  "inside": true
								},
							  "type"    : "pie",
							  "titleField"  : "jenis_beras",
							  "valueField"  : "jumlah",
							 "dataProvider" : chartData['stok_beras'],
							 
							 "balloon": {
								"adjustBorderColor": true,
								"color": "#000000",
								"cornerRadius": 5,
								"fillColor": "#FFFFFF"
							  },
							  "depth3D":15,
							  "angle" : 38,
							  "gradientRatio" :  [-0.2, 0, -0.1],
							  
							  "balloonText" : "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
							 "fontFamily" : "isi",
							"colors" : ["#001de0","#00e00b","#ff9724","#fffc24","#e02c00"],
							"startEffect" : "bounce", //easeInSine, elastic, bounce
						
						});		
			
						$(".load").hide();
				
			}
		});

});
</script>		