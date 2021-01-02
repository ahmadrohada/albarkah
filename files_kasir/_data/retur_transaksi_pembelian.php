<?php
    $pembelian_id = isset($_GET['pembelian_id']) ? $_GET['pembelian_id'] : '';
?>
<input type="hidden" value="<?php echo $pembelian_id ?>" class="pembelian_id" id="pembelian_id" name="pembelian_id" >

<input type="text" value="" class="no_nota" id="no_nota" name="no_nota" >
<input type="text" value="" class="status_retur" id="status_retur" name="status_retur" >


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
                    <h3 class="box-title"><i class="fa  fa-th-list"></i> Retur Pembelian</h3>
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

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control keterangan" rows="2" placeholder="Keterangan tambahan" style="width:100%;"></textarea>
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
    
    load_data();
    function load_data()
    {
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
                    $('.no_nota').val(data['no_nota']);

                    $('.status_retur').val(data['status_retur']);
                    $('.keterangan').val(data['keterangan_retur']);

                

                    load_data_pembelian(data['no_nota']);
                    
                },
                error: function(data){
                        
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
					title: 'QTY BELI',
					halign:'center',
                    align:'center',
                    width  : 80/* ,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.qty+'"  class="form-control input-sm tbl_qty" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					} */
					
				}, 
                {
					field: 'tonase',
					title: '@TONASE',
					halign:'center',
                    align:'center',
                    width  : 80/* ,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.tonase+'"  class="form-control input-sm tbl_tonase" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					} */
					
				}, 
				{
					field: 'harga',
					title: 'HARGA @Kg',
					halign:'center',
                    align:'center',
                    width:100/* ,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'" value="'+row.harga+'" class="form-control input-sm tbl_harga" style="width:100px; text-align:right; margin-top:-4px;">' 
								];
					} */

					
                }, 
                {
					field: '',
					title: 'QTY RETUR',
					halign:'center',
                    align:'center',
                    width:100,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'" value="'+row.retur+'" class="form-control input-sm qty_retur" style="width:100px; text-align:right; margin-top:-4px;">' 
								];
					}

					
                },
                {
					field: 'jumlah_retur',
					title: 'JM RETUR',
					halign:'center',
                    align:'right',
                    width  : 100/* ,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.tonase+'"  class="form-control input-sm tbl_tonase" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					} */
					
				}, 
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


                    $('.total_retur').val(data['detail_pembelian_list'][0]['total_retur']);
                   


                    //$('.total_harga').html(data['detail_pembelian_list'][0]['total']);
                  
				
			},
			error: function(data){
					$('#list_pembelian').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }

//================================= FUNGSI UPDATEQTY RETUR  =======================================//
$(document).on('keydown','.qty_retur',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            
            qty         = $(this).val();
            id          = $(this).attr('id');

            keterangan = $(".keterangan").val();
            status_retur = $(".status_retur").val();

            update_qty_table(id,qty);
            

        } 
    });


    $(document).on('blur','.qty_retur',function(e){
            qty         = $(this).val();
            id          = $(this).attr('id');

            keterangan = $(".keterangan").val();
            status_retur = $(".status_retur").val();

            update_qty_table(id,qty);
    });

    function update_qty_table(id,qty){
        no_nota =  $("#no_nota").val();

        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_qty_retur_pembelian",qty:qty,no_nota:no_nota,keterangan:keterangan,status_retur:status_retur},
                cache       :false,
                success:function(data){
                    load_data();
                },
        }); 

    }


//================================= FUNGSI UPDATE  KETERANGAN RETUR  =======================================//
$(document).on('keydown','.keterangan',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
          
            keterangan = $(".keterangan").val();
            status_retur = $(".status_retur").val();

            update_ket_table();
            

        } 
    });


    $(document).on('blur','.keterangan',function(e){
          
            keterangan = $(".keterangan").val();
            status_retur = $(".status_retur").val();

            update_ket_table();
    });

    function update_ket_table(){
        no_nota =  $("#no_nota").val();

        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_keterangan_retur_pembelian",no_nota:no_nota,keterangan:keterangan,status_retur:status_retur},
                cache       :false,
                success:function(data){
                    load_data();
                },
        }); 

    }


});
</script>		