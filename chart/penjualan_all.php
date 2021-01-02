

      
  
        <div class="table-responsive">
            <div id="chartdiv_penjualan_all" style="width: 600px; height: 300px;"></div>
        </div>


<script src="./assets/js/amcharts.js" type="text/javascript"></script>
<script src="./assets/js/serial.js" type="text/javascript"></script>
<script src="./assets/js/responsive.min.js"></script>
 

<script>
$(document).ready(function () {
             

            
    $.ajax({
			url		    : "./kelas/dashboard.php",
			type        : "GET",
			data	    : {op:"chart_penjualan_setahun"},
			dataType    : "json",
			cache	    : false,
			success	    : function(chartData){

                var chart = AmCharts.makeChart("chartdiv_penjualan_all",{
                    "type": "serial",
                    "categoryField": "bulan",
                    "startDuration" : 1,
                    "creditsPosition" : "top-right",

                    "graphs": [
                        {
                        "valueField": "total_penjualan",
                        "colorField": "color",
                        "balloonText" : "<b>[[category]]: [[value]] Kg</b>",
                        "type" : "column",
                        "lineAlpha" : 0,
                        "fillAlphas" : 1
                        }
                    ],
                    "dataProvider": chartData['penjualan_all'],
                    "categoryAxis":[
                            {
                                "labelRotation" : 45,
                                "gridAlpha" : 0,
                                "fillAlpha" : 1,
                                "fillColor" : "#FAFAFA",
                                "gridPosition" : "start",
                            }
                    ]
                });
				
			}
	});
           
});
</script>