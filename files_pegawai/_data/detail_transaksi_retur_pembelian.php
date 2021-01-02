<?php
    $retur_pembelian_id = isset($_GET['retur_pembelian_id']) ? $_GET['retur_pembelian_id'] : '';
?>
<input type="hidden" value="<?php echo $retur_pembelian_id ?>" class="retur_pembelian_id" id="retur_pembelian_id" name="retur_pembelian_id" >

 

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-tags"></i> Informasi Retur</h3>
                </div>
                
                <form class="form-horizontal">
                <div class="box-body" style="padding-left:20px;">
                  
                    <div class="form-group">
                        <label class="col-sm-5 text-align">Tgl Retur</label>
                        <div class="col-sm-7">
                            <span class="span_label tgl_retur"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 text-align">Waktu</label>
                        <div class="col-sm-7">
                            <span class="span_label waktu_retur"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 text-align">User</label>
                        <div class="col-sm-7">
                            <span class="span_label nama_user_retur"></span>
                        </div>
                    </div>
                    
                </div>
                <!-- /.box-footer -->
                </form>

                 
            </div>
        </div>

        <div class="col-md-9">
            <div class="box box-warning">
                <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa  fa-th-list"></i> Retur List</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12" style="margin-top:10px;">

                        <table
                            id="list_retur_pembelian"
                            class="table-striped" 
                            data-toolbar="#toolbar"
                            data-toolbar-align="right"  
                        >

                        </table>
                    </div>
                    <div class="col-md-12 no-padding" style="margin-top:20px; ">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control keterangan_retur" rows="2" placeholder="Keterangan tambahan" style="width:100%;" ></textarea>
                            </div>
                        
                        </div>
                        <div class="col-md-5">
                            <form class="form-horizontal">
                                <div class="form-group" style="margin-top:20px;">
                                    <label class="col-sm-6 control-label">Total Retur</label>
                                        <div class="col-sm-6">
                                            <input type="text"  class="form-control input-sm total_retur" value="0" style="text-align:right;" disabled> 
                                        </div>
                                </div> 
                            
                            </form>
                            
                        </div>

                            
                    </div>
                </div>
            </div>
        </div> <!-- end of md 9 -->


    </div>
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
                        <label class="col-sm-5 text-align">Pelanggan</label>
                        <div class="col-sm-7">
                            <span class="span_label nama_pelanggan"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 text-align">Status</label>
                        <div class="col-sm-7">
                            <span class="span_label status"></span>
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
                    <h3 class="box-title"><i class="fa  fa-th-list"></i> Detail Transaksi Pembelian</h3>
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
                <div class="col-md-12 no-padding" style="margin-top:20px; ">
                    <div class="col-md-7">
                        
                        <div class="list_tambahan">
                            <table 
                                id="list_tambahan"
                                class="table-striped" 
                            >
                                
                            </table>
                        </div>

                        <br>
                        <div class="list_pengurangan">
                            <table 
                                id="list_pengurangan"
                                class="table-striped" 
                            >
                                
                            </table>
                        </div>
                        
                        <br>
                           
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control keterangan" rows="2" placeholder="Keterangan tambahan" style="width:100%;"></textarea>
                    </div>
                    
                    </div>
                    <div class="col-md-5">
                        <form class="form-horizontal">

                                
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-sm-6 control-label">Total Belanja</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control input-sm total_belanja" value="0" style="text-align:right;" disabled> 
                                </div>
                            </div> 
                        <div class="form-group" style="margin-top:-10px;">
                            <label class="col-sm-6 control-label">Total Komisi</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control input-sm total_komisi" value="0" style="text-align:right;" disabled> 
                                </div>
                            </div> 
                        <div class="form-group" style="margin-top:-10px;">
                            <label class="col-sm-6 control-label">Total Tambahan</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control input-sm total_tambahan" value="0" style="text-align:right;" disabled> 
                                </div>
                        </div> 

                        <div class="form-group" style="margin-top:-10px;">
                            <label class="col-sm-6 control-label">Total Pengurangan</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control input-sm total_pengurangan" value="0" style="text-align:right;" disabled> 
                                </div>
                        </div> 

                        <hr>
                        <div class="form-group" style="margin-top:-10px;">
                            <span class="col-sm-6 grand_total_text" style="margin-top:4px;">Total Bayar</span>
                            <div class="col-sm-6 ">
                                <span class="grand_total total_bayar pull-right"></span>
                                    <input type="hidden" class="total_bayar">
                                </div>
                            </div> 


                        <div class="form-group" >
                            <label class="col-sm-6 control-label" >Bayar</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form_bayar form-control input-sm bayar"  value="" id="bayar" style="text-align:right;" disabled>
                                </div>
                            </div>
                        <div class="form-group"  style="margin-top:-10px;">
                            <label class="col-sm-6 control-label"><span class="txt-kembali">Kembali</span></label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control input-sm kembali" value="0" style="text-align:right;" disabled>
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
	
    retur_pembelian_id = $('.retur_pembelian_id').val();
    
    $.ajax({
			url         : "./kelas/pembelian_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'detail_retur_transaksi_pembelian',retur_pembelian_id:retur_pembelian_id},
			success     : function(data) {

				$('.tgl_retur').html(data['tgl_retur']);
                $('.waktu_retur').html(data['jam_retur']);
                $('.waktu').html(data['jam']);
                $('.nama_user_retur').html(data['nama_user_retur']);
                $('.total_retur').val(data['total_retur']);
                $('.keterangan_retur').html(data['keterangan_retur']);

                load_data_retur_pembelian(data['no_nota']);
                load_detail_pembelian(data['pembelian_id']);
                load_data_pembelian(data['no_nota']);
                load_data_tambahan(data['no_nota']);
                load_data_pengurangan(data['no_nota']);
				
			},
			error: function(data){
					
			}
	});





    function load_detail_pembelian(pembelian_id){
        $.ajax({
                url         : "./kelas/pembelian_get.php",
                type        : "GET",
                dataType    : "json",
                data        : {data:'detail_transaksi_pembelian',pembelian_id:pembelian_id},
                success     : function(data) {

                    $('.no_nota').html(data['no_nota']);
                    $('.tgl_nota').html(data['tgl_nota']);
                    $('.waktu').html(data['jam']);
                    $('.nama_pelanggan').html(data['nama_pelanggan']);
                    $('.status').html(data['status']);
                    $('.nama_user').html(data['nama_user']);

                    $('.total_belanja').val(data['total_belanja']);
                    $('.total_komisi').val(data['total_komisi']);
                    $('.total_tambahan').val(data['total_tambahan']);
                    $('.total_pengurangan').val(data['total_pengurangan']);

                    $('.total_bayar').html(data['total_bayar']);

                    $('.bayar').val(data['bayar']);
                    $('.kembali').val(data['kembali']);



                    $('.keterangan').html(data['keterangan']);

                    //$('.total_harga').html(data['grand_total']);


                    if ( data['status'] == '2'){
                        $('.txt-kembali').html("Sisa Hutang");  
                        $('.kembali').val(data['sisa']);
                    }else{
                        $('.kembali').val(data['kembali']);
                    } 

                    

                    
                },
                error: function(data){
                        
                }
        });
    }
   

    //======================== RETUR TABLE   ===================================//
    $('#list_retur_pembelian').bootstrapTable({
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
					field: 'qty',
					title: 'QTY RETUR',
					halign:'center',
                    align:'center',
                    width  : 80,
					
				}, 
                {
					field: 'tonase',
					title: '@TONASE',
					halign:'center',
                    align:'center',
                    width  : 80,
					
				}, 
				{
					field: 'harga',
					title: 'HARGA @Kg',
					halign:'center',
                    align:'center',
                    width:100,

					
                }, 
                {
					field: 'jumlah',
					title: 'JUMLAH HARGA',
					halign:'center',
                    align:'right',
				}
				]
	});


    function load_data_retur_pembelian(no_nota){
		
		$.ajax({
			url         : "./kelas/pembelian_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'transaksi_retur_pembelian_list_item',no_nota:no_nota},
			success     : function(data) {
				
                    $('#list_retur_pembelian').bootstrapTable('load',{data: data['retur_pembelian_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);


				
			},
			error: function(data){
					$('#list_retur_pembelian').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }

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
					field: 'qty',
					title: 'QTY KARUNG',
					halign:'center',
                    align:'center',
                    width  : 80,
					
				}, 
                {
					field: 'tonase',
					title: '@TONASE',
					halign:'center',
                    align:'center',
                    width  : 80,
					
				}, 
				{
					field: 'harga',
					title: 'HARGA @Kg',
					halign:'center',
                    align:'center',
                    width:100,

					
                }, 
                {
					field: 'komisi',
					title: 'KOMISI @Kg',
					halign:'center',
                    align:'center',
                    width:100,

					
                }, 
                {
					field: 'jumlah',
					title: 'JUMLAH HARGA',
					halign:'center',
                    align:'right',
				}
				]
	});


    
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


                    //$('.total_harga').html(data['detail_pembelian_list'][0]['total']);
                    //$('.grand_total').val(data['detail_pembelian_list'][0]['total']);

                    //$('.total_komisi').val(data['detail_pembelian_list'][0]['total_komisi']);


                    //$('.total_harga').html(data['detail_pembelian_list'][0]['total']);
                  
				
			},
			error: function(data){
					$('#list_pembelian').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }





//====================================================================================================//
//=========================================== TAMBAHAN PEMBELIAN =====================================//
//====================================================================================================//


$('#list_tambahan').bootstrapTable({
		columns:[	
				{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center',
                    width:30,
				}, 
				
                {
					field: 'item_tambahan',
					title: 'ITEM TAMBAHAN',
					halign:'center',
					
				}, 
                {
					field: 'qty',
					title: 'QTY',
					halign:'center',
                    align:'center',
                    width  : 80
					
				}, 
                {
					field: 'harga_satuan',
					title: 'HRG SATUAN',
					halign:'center',
                    align:'right',
                    width  : 80,
					
				}, 
                {
					field: 'jumlah',
					title: 'JUMLAH',
					halign:'center',
                    align:'right'
				}
				]
	});

    function load_data_tambahan(no_nota){
		$.ajax({
			url         : "./kelas/pembelian_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'transaksi_tambahan_list_item',no_nota:no_nota},
			success     : function(data) {
				
                    if ( data['tmp_tambahan_detail'][0]['data_table'] == 'show' ){
                        $('.list_tambahan').show();
                    }else{
                        $('.list_tambahan').hide();
                    }

                    $('#list_tambahan').bootstrapTable('load',{data: data['tmp_tambahan_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);



				
			},
			error: function(data){
					$('#list_tambahan').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }


//====================================================================================================//
//=========================================== PENGURANGAN PEMBELIAN =====================================//
//====================================================================================================//


$('#list_pengurangan').bootstrapTable({
		columns:[	
				{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center',
                    width:30,
				}, 
				
                {
					field: 'item_pengurangan',
					title: 'ITEM PENGURANGAN',
					halign:'center',
					
				}, 
                {
					field: 'qty',
					title: 'QTY',
					halign:'center',
                    align:'center',
                    width  : 80
					
				}, 
                {
					field: 'harga_satuan',
					title: 'HRG SATUAN',
					halign:'center',
                    align:'right',
                    width  : 80,
					
				}, 
                {
					field: 'jumlah',
					title: 'JUMLAH',
					halign:'center',
                    align:'right'
				}
				]
	});

    function load_data_pengurangan(no_nota){
		$.ajax({
			url         : "./kelas/pembelian_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'transaksi_pengurangan_list_item',no_nota:no_nota},
			success     : function(data) {
				
                    if ( data['tmp_pengurangan_detail'][0]['data_table'] == 'show' ){
                        $('.list_pengurangan').show();
                    }else{
                        $('.list_pengurangan').hide();
                    }

                    $('#list_pengurangan').bootstrapTable('load',{data: data['tmp_pengurangan_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);



				
			},
			error: function(data){
					$('#list_pengurangan').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }


});
</script>		