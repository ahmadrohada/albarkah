<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Piutang</h3>
                </div>
                <div class="box-body">

                    <div id="toolbar">
						
					</div>
				

                    <table
						id="table_piutang"
                        data-class="table-striped" 
						data-pagination="true"
						data-search="true"
						data-toolbar="#toolbar"
						data-search="true"
						>
					
					</table>
                </div>
            </div>
        </div>
    </div>
</section>




<?php
	include "modals/bayar-piutang.php";
	include "modals/detail_bayar-piutang.php";
?>






<script>
$(document).ready(function () {



	$('#table_piutang').bootstrapTable({
		columns:[	
				{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center',
					width:40,
				}, 
				
				{
					field: 'pelanggan',
					title: 'NAMA PELANGGAN',
					halign:'center',
					sortable:true,
					width:130,
				}, 
				{
					/** class: 'hidden-xs', **/
					field: 'tgl_nota',
					title: 'TGL TRANSAKSI',
					halign:'center',
					align:'center',
					sortable:true,
					width:180,
					
				}, 
				{
					field: '',
					title: 'NO NOTA',
					halign:'center',
					align:'center',
					sortable:true,
					width:110,
					formatter: function (value, row) {
						return 	['<button  style="margin:1px; margin-top:-5px;" class="btn btn-default 	btn-xs detail_transaksi" 		value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Detail Transaksi">'+row.no_nota+'</button>' ];
                       	
					}

					
				}, 
                {
					field: 'total_belanja',
					title: 'TOTAL BELANJA',
					halign:'center',
                    align:'right',
					width:110,
				}, 
				{
					field: 'total_bayar',
					title: 'TOTAL DIBAYAR',
					halign:'center',
                    align:'right',
					width:80,
				},
				{
					field: 'sisa_piutang',
					title: 'SISA PIUTANG',
					halign:'center',
                    align:'right',
					sortable:true,
					width:80,
				},
				{
					field: 'Status',
					title: '<i class="glyphicon glyphicon-cog"></i>',
					halign:'center',
					align:'center',
					width:80,
					formatter: function (value, row) {
						if ( row.sisa_piutang != 0 ){
                            return 	[  	'<button  style="margin:1px; margin-top:-5px;" class="btn btn-warning 	btn-xs bayar" 		value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Bayar"><span class="fa fa-edit"></span></button>' 
									];
                        }else{
							return 	[  	'<button  style="margin:1px; margin-top:-5px;" class="btn btn-success 	btn-xs lihat" value="'+row.id+'" ><span class="fa fa-eye"></span></button>' 
									];
                        }	                                
								
								
					}
				}
			
				]
	});

  	$('.bayar-piutang').on('hide.bs.modal', function () {
		$('#jumlah_bayar').val("");
		$('#piutang').val("");
        load_data_piutang();
    }) 

    load_data_piutang();
    function load_data_piutang(){
		
		$.ajax({
			url         : "./kelas/piutang_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'piutang_list'},
			success     : function(data) {
				
					$('#table_piutang').bootstrapTable('load',{data: data['piutang_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);
				
			},
			error: function(data){
					$('#table_piutang').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }


	$(document).on('click','.bayar',function(e){
        e.preventDefault();
        nota_id   = $(this).val();

		detail_piutang(nota_id);
        history_pembayaran(nota_id);

		

	});

    function detail_piutang(nota_id){
        $.ajax({
			url         : "./kelas/piutang_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'detail_piutang',nota_id:nota_id},
			success     : function(data) {

				$('.nama_pelanggan').val(data['nama']);
                $('.tgl_transaksi').val(data['tgl_transaksi']);
				$('.sisa_piutang').val(data['sisa_piutang']);
                $('.total_belanja').val(data['total_belanja']);
                $('.nota_id').val(nota_id);
				
				
				

				$('.bayar-piutang').modal('show');
              
			},
			error: function(data){
					
			}
	    });
    };

	function history_pembayaran(nota_id){
        $.ajax({
			url         : "./kelas/piutang_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'history_pembayaran',nota_id:nota_id},
			success     : function(data) {
				
					$('#history_pembayaran').bootstrapTable('load',{data: data['history_pembayaran'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);
				
			},
			error: function(data){
					$('#history_pembayaran').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});


    };


	$(document).on('click','.lihat',function(e){
        e.preventDefault();
		e.preventDefault();
        nota_id   = $(this).val();

		s_detail_piutang(nota_id);
        s_history_pembayaran(nota_id);

	});

	function s_detail_piutang(nota_id){
        $.ajax({
			url         : "./kelas/piutang_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'detail_piutang',nota_id:nota_id},
			success     : function(data) {

				$('.s_nama_pelanggan').val(data['nama']);
                $('.s_tgl_transaksi').val(data['tgl_transaksi']);
				$('.s_sisa_piutang').val(data['sisa_piutang']);
                $('.s_total_belanja').val(data['total_belanja']);
                $('.s_nota_id').val(nota_id);
				
				
				

				$('.detail_bayar-piutang').modal('show');
              
			},
			error: function(data){
					
			}
	    });
    };

	function s_history_pembayaran(nota_id){
        $.ajax({
			url         : "./kelas/piutang_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'history_pembayaran',nota_id:nota_id},
			success     : function(data) {
				
					$('#s_history_pembayaran').bootstrapTable('load',{data: data['history_pembayaran'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);
				
			},
			error: function(data){
					$('#s_history_pembayaran').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});


    };


	$(document).on('click','.detail_transaksi',function(e){
        e.preventDefault();
        penjualan_id   = $(this).val();

		window.location.assign("home.php?page=detail_transaksi_penjualan&penjualan_id="+penjualan_id);

	});
	
});
</script>		