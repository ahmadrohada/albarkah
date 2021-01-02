<?php
    $jenis_beras_id = isset($_GET['jenis_beras_id']) ? $_GET['jenis_beras_id'] : '';
?>
<input type="hidden" value="<?php echo $jenis_beras_id ?>" class="jenis_beras_id" id="jenis_beras_id" name="jenis_beras_id" >


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
                <div class="col-md-12" style="margin-top:10px;">

                    <table
						id="nama_karung"
                        data-class="table-striped" 
						data-pagination="false"
						data-search="false"
						>
					
					</table>
                    

                      
                </div>
            </div>
        </div>
    </div>
</section>


<script>
$(document).ready(function () {

    jenis_beras_id = $('.jenis_beras_id').val();

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
                    formatter: function (value, row) {
                        if ( row.jenis_beras_id == jenis_beras_id){
                            return 	"<b>"+row.label+"</b>";
                        }else{
                            return 	row.label ; 
                        }
                           	
					} 

					
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
                        if ( row.jenis_beras_id == jenis_beras_id){
                            return 	[  '<span style="margin:1px;" ><a class="btn btn-warning btn-xs "><i class="fa fa-forward" ></i></a></span>'
									];	
                        }else{
                            return 	[  '<span  data-toggle="tooltip" title="Lihat Detail" style="margin:1px;" ><a class="btn btn-default btn-xs lihat_detail" data-toggle="" data-target="" data-label="'+row.label+'" data-id="'+row.jenis_beras_id+'"><i class="fa fa-forward" ></i></a></span>'
									];
                            
                        }
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
			data        : {op:'stok_jenis_beras'},
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



//========================== JENIS BERAS ==============================//

	$('#nama_karung').bootstrapTable({
		columns:[	
				{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center',
					width:30,
					
				}, 
				{
					field: 'nama_karung',
					title: 'NAMA KARUNG',
					halign:'center',
					sortable:true,
					
				}, 
                {
					field: 'tonase',
					title: 'TONASE ( Kg )',
					halign:'center',
					align:'right',
					width:100,
					
				},
				{
					field: 'harga_beli',
					title: 'HARGA BELI',
					halign:'center',
					align:'right',
					width:100,
					
				}/*,
				{
					field: 'harga_jual',
					title: 'HARGA JUAL',
					halign:'center',
					align:'right',
					width:100,
					
				} */,
				{
					field: 'stok',
					title: 'QTY STOK ( Karung )',
					halign:'center',
					align:'right',
					width:100,
					
				}
				
				]
	});



    load_data_nama_karung();
    function load_data_nama_karung(){
		
		$.ajax({
			url         : "./kelas/stok_beras.php",
			type        : "GET",
			dataType    : "json",
			data        : {op:'stok_karung',jenis_beras_id:jenis_beras_id},
			success     : function(data) {
				
             
				$('#nama_karung').bootstrapTable('load',{data: data['nama_karung_list'] });
				$('[data-toggle="tooltip"]').tooltip();
				$('.fixed-table-loading').fadeOut(100);
				
			},
			error: function(data){
				$('#nama_karung').bootstrapTable('removeAll');
				$('.fixed-table-loading').fadeOut(100);
				$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }
});
</script>		