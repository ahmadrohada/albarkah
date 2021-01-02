<?php
    $pembelian_id = isset($_GET['pembelian_id']) ? $_GET['pembelian_id'] : '';
?>
<input type="hidden" value="<?php echo $pembelian_id ?>" class="pembelian_id" id="pembelian_id" name="pembelian_id" >


<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-tags"></i> Informasi Nota</h3>
                </div>
                
                <form class="form-horizontal">
                <div class="box-body" style="padding-left:20px;">
                    <div class="form-group">
                        <label class="col-sm-5 text-align">No Nota</label>
                        <div class="col-sm-7">
                            <span class="span_label no_nota"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 text-align">Tgl Transaksi</label>
                        <div class="col-sm-7">
                            <span class="span_label tgl_nota"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 text-align">Waktu</label>
                        <div class="col-sm-7">
                            <span class="span_label waktu"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 text-align">Supplier</label>
                        <div class="col-sm-7">
                            <span class="span_label nama_supplier"></span>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-5 text-align">User</label>
                        <div class="col-sm-7">
                            <span class="span_label nama_user"></span>
                        </div>
                    </div>
                    
                </div>
                <!-- /.box-footer -->
                </form>

                 
            </div>
        </div>

        <div class="col-md-9">
            
        
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-th-list"></i> Transaksi Pembelian</h3>
                </div>
                <div class="box-body">
                    
                    
                    
                    <div class="col-md-12" style="margin-top:10px;">
                        
                  
                        <div id="toolbar">
                        </div>
                        <table
                            id="list_pembelian"
                            class="table-striped" 
							data-toolbar="#toolbar"
							data-toolbar-align="right" 
                            >
                        
                        </table>
                    </div>

                    <div class="col-md-12" style="margin-top:10px; text-align:right;">
                        <div class="col-md-8" style="margin-top:6px;">
                            <span class="grand_total_text" >Total</span>
                        </div>
                        <div class="col-md-4">
                            <span class="grand_total total_harga"></span>
                            <input type="hidden" class="total_harga">
                        </div>
                        
                    </div>

                    <div class="col-md-12 no-padding" style="margin-top:10px; ">
                        <div class="col-md-7">
                           
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control keterangan" rows="2" placeholder="Keterangan tambahan" style="width:70%;"></textarea>
                        </div>



                            
                        </div>
                        <div class="col-md-5">
                            <form class="form-horizontal">
                                <div class="form-group" style="margin-top:20px;">
                                    <label class="col-sm-6 control-label">Total Upah Kuli</label>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control input-sm total_upah_kuli" value="0" style="text-align:right; margin-top:5px;" disabled>
                                    </div>
                                </div> 

                                <div class="form-group"  style="margin-top:-10px;">
                                    <label class="col-sm-6 control-label">Total Bayar</label>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control input-sm total_bayar" value="0" style="text-align:right; margin-top:2px;" disabled>
                                    </div>
                                </div>
                            </form>
                           
                        </div>

                        
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</section>


<script>
$(document).ready(function () {
	
    pembelian_id = $('.pembelian_id').val();
   
    
    $.ajax({
			url         : "./kelas/pembelian_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'detail_transaksi_pembelian',pembelian_id:pembelian_id},
			success     : function(data) {

				$('.no_nota').html(data['no_nota']);
                $('.tgl_nota').html(data['tgl_nota']);
                $('.waktu').html(data['jam']);
                $('.nama_supplier').html(data['nama_supplier']);
                $('.nama_user').html(data['nama_user']);

                load_data_pembelian(data['no_nota']);
				
			},
			error: function(data){
					
			}
	});


//======================== TABLE   ===================================//
        $('#list_pembelian').bootstrapTable({
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
					title: 'NM KARUNG',
					halign:'center',
                    align:'center',
					
				}, 
                {
					field: 'jenis_beras',
					title: 'JENIS BERAS',
					halign:'center'
					
				}, 
                {
					field: '',
					title: 'QTY KARUNG',
					halign:'center',
                    align:'center',
                    width  : 80,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.qty+'"  class="form-control input-sm tbl_qty" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					}
					
				}, 
                {
					field: '',
					title: '@TONASE',
					halign:'center',
                    align:'center',
                    width  : 80,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.tonase+'"  class="form-control input-sm tbl_tonase" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					}
					
				}, 
				{
					field: '',
					title: 'HARGA @Kg',
					halign:'center',
                    align:'center',
                    width:100,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'" value="'+row.harga+'" class="form-control input-sm tbl_harga" style="width:100px; text-align:right; margin-top:-4px;">' 
								];
					}

					
                }, 
                {
					field: '',
					title: 'KULI @Kg',
					halign:'center',
                    align:'center',
                    width:100,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'" value="'+row.upah_kuli+'" class="form-control input-sm tbl_upah_kuli" style="width:100px; text-align:right; margin-top:-4px;">' 
								];
					}

					
                }, 
                {
					field: 'jumlah',
					title: 'JUMLAH HARGA',
					halign:'center',
                    align:'right',
				}, 
				{
					field: 'Status',
					title: '<i class="glyphicon glyphicon-cog"></i>',
					halign:'center',
					align:'center',
					width:60,
					formatter: function (value, row) {
					    return 	[  	'<button  style="margin-top:-4px;" class="btn btn-danger btn-xs tbl_hapus" value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Hapus"><span class="fa fa-remove"></span></button>' 
									
								];
					}
				}
				]
	    });




//====================== TABLE LIST ITEM ===================================//   
    function load_data_pembelian(no_nota){
		
		$.ajax({
			url         : "./kelas/pembelian_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'transaksi_pembelian_list_item',no_nota:no_nota},
			success     : function(data) {
				
					$('#list_pembelian').bootstrapTable('load',{data: data['tmp_pembelian_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);


                    $('.total_harga').html(data['detail_pembelian_list'][0]['total']);
                    $('.grand_total').val(data['detail_pembelian_list'][0]['total']);

                    $('.total_upah_kuli').val(data['detail_pembelian_list'][0]['total_upah_kuli']);
                    $('.total_bayar').val(data['detail_pembelian_list'][0]['total_bayar']);
                   
				
			},
			error: function(data){
					$('#table').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
					$('#list_penjualan').bootstrapTable('removeAll');
				
			}
		});
    }




});
</script>		