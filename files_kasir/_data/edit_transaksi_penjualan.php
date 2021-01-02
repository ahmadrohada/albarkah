<?php
    $penjualan_id = isset($_GET['penjualan_id']) ? $_GET['penjualan_id'] : '';
?>
<input type="hidden" value="<?php echo $penjualan_id ?>" class="penjualan_id" id="penjualan_id" name="penjualan_id" >



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
                    <h3 class="box-title"><i class="fa  fa-th-list"></i> Detail Transaksi Penjualan</h3>
                </div>
                <div class="box-body">
                <div class="col-md-12" style="margin-top:10px;">

                    <div id="toolbar">
                    </div>
                    <table
                        id="list_penjualan"
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
                                    <input type="text"  class="form-control input-sm total_belanja input_ket" value="0" style="text-align:right;" disabled> 
                                </div>
                            </div> 
                        <div class="form-group" style="margin-top:-10px;" hidden>
                            <label class="col-sm-6 control-label">Total Komisi</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control input-sm total_komisi input_ket" value="0" style="text-align:right;" disabled> 
                                </div>
                            </div> 
                        <div class="form-group" style="margin-top:-10px;">
                            <label class="col-sm-6 control-label">Total Tambahan</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control input-sm total_tambahan input_ket" value="0" style="text-align:right;" disabled> 
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
                                    <input type="text" class="form_bayar form-control input-sm bayar"  value="" id="bayar" style="text-align:right;">
                                </div>
                            </div>
                        <div class="form-group"  style="margin-top:-10px;">
                            <label class="col-sm-6 control-label"><span class="txt-kembali">Kembali</span></label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control input-sm kembali input_ket" value="0" style="text-align:right;" disabled>
                                </div>
                            </div>
                        </form>
                           
                    </div>

                        
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-block btn-warning update_transaksi" style="margin-top:24px;">UPDATE DATA</button>
                </div>


                      
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    /* Fungsi */
	function formatRupiah(angka, prefix)
	{
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
$(document).ready(function () {
	
    penjualan_id = $('.penjualan_id').val();
    

    
    $.ajax({
			url         : "./kelas/penjualan_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'detail_transaksi_penjualan',penjualan_id:penjualan_id},
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

                

                

                load_data_penjualan(data['no_nota']);
                load_data_tambahan(data['no_nota']);
				
			},
			error: function(data){
					
			}
	});

   //======================== TABLE   ===================================//
   $('#list_penjualan').bootstrapTable({
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
                    align:'left',
					
				}, 
                {
					field: 'qty',
					title: 'QTY KARUNG',
					halign:'center',
                    align:'center',
                    width  : 80,
                    /* formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.qty+'"  class="form-control input-sm tbl_qty" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					} */
					
				}, 
                {
					field: 'tonase',
					title: '@TONASE',
					halign:'center',
                    align:'center',
                    width  : 80,
                    /* formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.tonase+'"  class="form-control input-sm tbl_tonase" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					} */
					
				}, 
				{
					field: 'harga',
					title: 'HARGA @Kg',
					halign:'center',
                    align:'center',
                    width:100,
                  /*   formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'" value="'+row.harga+'" class="form-control input-sm tbl_harga" style="width:100px; text-align:right; margin-top:-4px;">' 
								];
					} */

					
                }, 
                
                {
					field: 'jumlah',
					title: 'JUMLAH HARGA',
					halign:'center',
                    align:'right',
                    width:140,
				}, 
				/* {
					field: 'Status',
					title: '<i class="glyphicon glyphicon-cog"></i>',
					halign:'center',
					align:'center',
					width:60,
					formatter: function (value, row) {
					    return 	[  	'<button  style="margin-top:-4px;" class="btn btn-danger btn-xs tbl_hapus" value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Hapus"><span class="fa fa-remove"></span></button>' 
									
								];
					}
				} */
				]
	});


    
    function load_data_penjualan(no_nota){
		
		$.ajax({
			url         : "./kelas/penjualan_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'transaksi_penjualan_list_item',no_nota:no_nota},
			success     : function(data) {
				
                    $('#list_penjualan').bootstrapTable('load',{data: data['tmp_penjualan_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);


                    $('.total_harga').html(data['detail_penjualan_list'][0]['total']);
                    $('.grand_total').val(data['detail_penjualan_list'][0]['total']);

                    $('.total_komisi').val(data['detail_penjualan_list'][0]['total_komisi']);


                    //$('.total_harga').html(data['detail_penjualan_list'][0]['total']);
                  
				
			},
			error: function(data){
					$('#list_penjualan').bootstrapTable('removeAll');
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
			url         : "./kelas/penjualan_get.php",
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


    //=============================== B   A   Y   A   R ========================================//
    document.addEventListener('keydown', function(event) {
        if (event.code == 'F2') {
            $('.bayar').focus();
            //$('.jenis_beras').select2('close');
        }
    });


    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('bayar');
	tanpa_rupiah.addEventListener('keyup', function(e)
	{
        tanpa_rupiah.value = formatRupiah(this.value);
        
	});
	

    $(document).on('keydown','.bayar',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            hitung_kembalian();
        } 
    });

     $(document).on('blur','.bayar',function(e){
        hitung_kembalian();
    });

    function hitung_kembalian(bayar,grand_total){

        bayar       = parseInt($(".bayar").val().replace(/[^,\d]/g, '').toString());
        total_bayar = parseInt($(".total_bayar").val().replace(/[^,\d]/g, '').toString());

        kembali = Intl.NumberFormat().format(bayar-total_bayar); 

         $(".kembali").val(kembali);
        
    }

    //============================== PROSES UPDATYE TRANSAKSI =============================//
    $(document).on('click','.update_transaksi',function(e){
        e.preventDefault();
        grand_total         = parseInt($(".grand_total").val().replace(/[^,\d]/g, '').toString());
        bayar               = parseInt($(".bayar").val().replace(/[^,\d]/g, '').toString());
        kembali             = $(".kembali").val();
        hutang              = $(".kembali").val().replace('-', '');


        if ( $(".bayar").val() == "") {
            swal({
				
				text: "Kolom bayar harus terisi",
				type: "warning"
			}).then (function(){
                $('.bayar').focus();		
			});
        }else if ( (bayar < grand_total)&(kembali != 0) ){


            swal({
				
                html                : "Pembayaran yang dilakukan kurang dari Jumlah yang harus dibayar"
                                    +"<br>Transaksi ini akan dianggap sebagai hutang<br>"
                                    +"sisa yang belum dibayar sebesar Rp. <b>"+hutang+"</b><br>",
				type                : "question",
                //customClass         : 'swal2-overflow',
                showCancelButton	: true,
                cancelButtonText	: "Batal",
			}).then (function(){
                update_transaksi('2');	
                
			}); 


        }else{
            update_transaksi('1');
        } 
         
    });


    function update_transaksi(type_bayar){
        penjualan_id        = $(".penjualan_id").val();
       
        bayar               = $(".bayar").val();
        kembali             = $(".kembali").val().replace('-', '');
        keterangan          = $(".keterangan").val(); 


          $.ajax({
			url         : "./kelas/transaksi_post.php",
			type        : "POST",
			data        : { op                  : "update_transaksi_penjualan",
                            penjualan_id        : penjualan_id,
                            bayar               : bayar,
                            kembali             : kembali,
                            type_bayar          : type_bayar,
                            keterangan          : keterangan
                          },
			cache       :false,
			success:function(data){
                
                swal({
					title: "",
					text: "Sukses",
					type: "success",
					width: "200px",
					showConfirmButton: false,
					allowOutsideClick : false,
					timer: 900
					}).then(function () {
										
					},
					function (dismiss) {
						if (dismiss === 'timer') {
                            window.location.assign("home.php?page=penjualan");
                        }
					}
				)
                
			
			},
            error: function(e) {
					swal({
						title: "Gagal",
						text: "",
						type: "warning"
					}).then (function(){
						
					});
				}
		}); 
    }


});
</script>		