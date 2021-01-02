<section class="content">
    <div class="row">


        <div class="col-md-4">

		 	<div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-th-list"></i> JENIS BERAS</h3>
                </div>
                <div class="box-body">
                
					<table
						id="table_jenis_beras"
                        data-class="table-striped" 
						data-pagination="false"
						data-search="false"
						>
					
                    </table>
                    
				<ul class="nav">
                	<li><a >TOTAL <span class="pull-right badge bg-blue total" style="margin-right:70px;">***</span></a></li>	
              	</ul>


            	</div>
          	</div>
		
        </div>

        <div class="col-md-8">
            
        
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-th-list"></i> DETAIL STOK BERAS</h3>
                </div>
                <div class="box-body">
                
                </div>
            </div>
        </div>

    </div>
</section>


<script>
$(document).ready(function () {

    $(document).on('click','.lihat_detail',function(e){
        e.preventDefault();
        jenis_beras_id   = $(this).data('id');
        //alert(jenis_beras_id);
		window.location.assign("home.php?page=detail_stok&jenis_beras_id="+jenis_beras_id);

	});


//========================== JENIS BERAS ==============================//

	$('#table_jenis_beras').bootstrapTable({
		columns:[	
				{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center',
					width:30,
					
				}, 
				{
					field: 'label',
					title: 'NAMA',
					halign:'center',
					sortable:true,

					
				}, 
                {
					field: 'stok',
					title: 'QTY STOK',
					halign:'center',
					align:'right',
					width:50,
					
				}, 
				{
					field: '',
					title: '<i class="glyphicon glyphicon-cog"></i>',
					halign:'center',
					align:'center',
					width:80,
					formatter: function (value, row) {
                            return 	[  '<span  data-toggle="tooltip" title="Lihat Detail" style="margin:1px;" ><a class="btn btn-warning btn-xs lihat_detail" data-toggle="" data-target="" data-label="'+row.label+'" data-id="'+row.jenis_beras_id+'"><i class="fa fa-forward" ></i></a></span>'
									];	
					} 
				}
				
				]
	});



    load_data_jenis_beras();
    function load_data_jenis_beras(){
		
		$.ajax({
			url         : "./kelas/stok_beras.php",
			type        : "GET",
			dataType    : "json",
			data        : {op:'jenis_beras_tbl_list'},
			success     : function(data) {
				
                    $('.total').html(data['total'][0].total);

					$('#table_jenis_beras').bootstrapTable('load',{data: data['jenis_beras_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);
				
			},
			error: function(data){
					$('#table_jenis_beras').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }
});
</script>		