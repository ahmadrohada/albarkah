
<?php
	$user_id = isset($_SESSION['md_user_id']) ? $_SESSION['md_user_id'] : '';
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-tags"></i> Informasi Nota Penjualan</h3>
                </div>
                <div class="box-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">No Nota</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-sm no_nota input_ket" id="no_nota" style="margin-top:3px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-sm tgl_nota input_ket" id="tgl_nota"  style="margin-top:3px;">
                        </div>
                    </div>

                    <input type="hidden" value="<?php echo $user_id ?>" class="user_id" id="user_id" name="user_id" >

                    

                </form>
                </div>
            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-users"></i> Informasi Pelanggan</h3>
                    <div class="box-tools pull-right">
                        <span  data-toggle="tooltip" title="Tambah Pelanggan"><a  style="margin-top:5px !important;" class="btn btn-warning btn-xs add_pelanggan" data-toggle="modal" data-target=".add-pelanggan"><i class="fa fa-plus" ></i></a></span>
                    </div>
                </div>
                <div class="box-body">
                
                    <div class="form-group nama ">
                        <label>Nama Pelanggan</label>
                        <select  class="form-control pelanggan_id" name="pelanggan_id" id="pelanggan" style="width:100%;">
                            <option value="1">Cash</option>
                        </select>
                    </div>

                    <div class="detail_pelanggan" hidden>
                        <div class="form-group nama ">
                            <label>No Tlp / HP</label>
                            <span class="form-control no_tlp"></span>
                        </div>

                        <div class="form-group nama ">
                            <label>Alamat</label>
                            <span class="form-control alamat" rows="2" placeholder="alamat" style="height:50px; width:100%;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-md-12" style="margin-top:-5px;">
                         <div id="toolbar">
                            <span  data-toggle="tooltip" title="Tambah Item Penjualan"><a class="btn btn-warning btn-sm add_item_penjualan" data-toggle="modal" data-target=".add-item_penjualan"><i class="fa fa-plus" ></i> TAMBAH ITEM</a></span>
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

                            <span  class="pull-left" style="" data-toggle="tooltip" title="Tambahan"><a class="btn btn-warning btn-xs add_item_tambahan" data-toggle="modal" data-target=".add-item_tambahan"><i class="fa fa-plus" ></i> TAMBAHAN</a></span>
                            
                            <table 
                            
                                id="list_tambahan"
                                class="table-striped" 
                                >
                            
                            </table>
                            <br>
                            
                            <span  class="pull-left" style="" data-toggle="tooltip" title="Pengurangan"><a class="btn btn-warning btn-xs add_item_pengurangan" data-toggle="modal" data-target=".add-item_pengurangan"><i class="fa fa-minus" ></i> PENGURANGAN</a></span>
                            <table 
                            
                                id="list_pengurangan"
                                class="table-striped" 
                                >
                            
                            </table>
                            <br> <br>
                            <textarea class="form-control keterangan" rows="2" placeholder="Keterangan tambahan" style="width:100%;"></textarea>
                            
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
                                <div class="form-group" style="margin-top:-10px;">
                                    <label class="col-sm-6 control-label">Total Pengurangan</label>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control input-sm total_pengurangan input_ket" value="0" style="text-align:right;" disabled> 
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
                                        <input type="text" class="form_bayar form-control input bayar input_bayar"  value="" id="bayar" style="text-align:right;">
                                    </div>
                                </div>
                                <div class="form-group"  style="margin-top:-10px;">
                                    <label class="col-sm-6 control-label">Kembali</label>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control input-sm kembali input_ket" value="0" style="text-align:right;" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-block btn-warning simpan_transaksi" style="margin-top:24px;">SIMPAN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
    include "modals/add-pelanggan.php";
    include "modals/add-penjualan_2.php";
    include "modals/add-tambahan.php";
    include "modals/add-pengurangan.php";
?>





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
	


    $(window).bind('keydown', function(e) {
        if (e.which == 113)
        $('.add-item_penjualan').modal('show');
    });










    user_id = $('.user_id').val();
   
    $('.add-item_penjualan').on('hidden.bs.modal', function(){
		load_data_penjualan();
	});

    $('.add-item_tambahan').on('hidden.bs.modal', function(){
		load_data_tambahan();
	});

    $('.add-item_pengurangan').on('hidden.bs.modal', function(){
		load_data_pengurangan();
	});
    
 

    $.ajax({
			url         : "./kelas/new_transaksi_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'new_transaksi_penjualan',user_id:user_id},
			success     : function(data) {

				$('.no_nota').val(data['no_nota']);
                $('#tgl_nota').val(data['tgl_nota']);
                $('#nama_user').val(data['nama_user']);

                
				
			},
			error: function(data){
					
			}
	});

//=========================  P E L A N G G A N  =============================// 

    $('#pelanggan').select2({
        
        allowClear          : true,
        ajax: {
            url: './kelas/pelanggan_get.php',
            dataType: 'json',
            quietMillis: 250,
            data: function (params) {
                var queryParameters = {
                    op: 'pelanggan_list',
                    nama: params.term
                }
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        
                        return {
                            text: item.nama,
						    id: item.id,
                        }
                        
                    })
                };
            }
        }
    });

    $("#pelanggan").change(function(){
        var pelanggan_id = $("#pelanggan option:selected").val();
        $.ajax({
            url     : "./kelas/pelanggan_get.php",
            type    : "GET",
            dataType: "json",
            data    : { op  : "detail_pelanggan", pelanggan_id : pelanggan_id },
            success: function (data) {
                

                $(".no_tlp").html(data['no_tlp']);
                $(".alamat").html(data['alamat']);

                $('.detail_pelanggan').show(); 

                //$('.simpan_transaksi').prop('disabled',false); 
            },
            error: function (data) {
                //$('.simpan_transaksi').prop('disabled',true);
                $('.detail_pelanggan').hide(); 
            }
        }); 
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
					title: 'NAMA KARUNG',
					halign:'center',
                    align:'left',
					
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
					field: 'jumlah',
					title: 'JUMLAH HARGA',
					halign:'center',
                    align:'right',
                    width:140,
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



//==================== UPDATE QTY PADA TABLE ====================================//

    $(document).on('keydown','.tbl_qty',function(e){
        if ( (e.which == 13)|(e.which == 9) ) {
            qty = $(this).val();
            id = $(this).attr('id');
            update_qty_table(id,qty);
            
        } 
    });


    $(document).on('blur','.tbl_qty',function(e){
            qty = $(this).val();
            id = $(this).attr('id');
            update_qty_table(id,qty);
    });

    function update_qty_table(id,qty){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_qty_tmp",qty:qty,id:id},
                cache       :false,
                success:function(data){
                    load_data_penjualan();
                },
        }); 

    }
//=============================================================================//



//==================== UPDATE TONASE  PADA TABLE ====================================//
 $(document).on('keydown','.tbl_tonase',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            tonase = $(this).val();
            id = $(this).attr('id');
            update_tonase_table(id,tonase);
        } 
    });

    $(document).on('blur','.tbl_tonase',function(e){
            tonase = $(this).val();
            id = $(this).attr('id');
            update_tonase_table(id,tonase);
    });

    function update_tonase_table(id,tonase){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_tonase_tmp",tonase:tonase,id:id},
                cache       :false,
                success:function(data){
                    load_data_penjualan();
                },
        }); 

    }

//=============================================================================//



//==================== UPDATE HARGA  PADA TABLE ====================================//
$(document).on('keydown','.tbl_harga',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            harga = $(this).val();
            id = $(this).attr('id');
            update_harga_table(id,harga);
        } 
    });

    $(document).on('blur','.tbl_harga',function(e){
            harga = $(this).val();
            id = $(this).attr('id');
            update_harga_table(id,harga);
    });

    function update_harga_table(id,harga){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_harga_tmp",harga:harga,id:id},
                cache       :false,
                success:function(data){
                    load_data_penjualan();
                },
        }); 

    }

//=======================================================================//
//==================== UPDATE KOMISI  PADA TABLE ====================================//
$(document).on('keydown','.tbl_komisi',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            komisi = $(this).val();
            id = $(this).attr('id');
            update_komisi_table(id,komisi);
        } 
    });

    $(document).on('blur','.tbl_komisi',function(e){
        komisi = $(this).val();
            id = $(this).attr('id');
            update_komisi_table(id,komisi);
    });

    function update_komisi_table(id,komisi){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_komisi_tmp",komisi:komisi,id:id},
                cache       :false,
                success:function(data){
                    load_data_penjualan();
                },
        }); 

    }


//==============================================================================//
//==================== HAPUS ITEM PEMBELIAN  ====================================//
    $(document).on('click','.tbl_hapus',function(e){
        //e.preventDefault();
		tmp_transaksi_id = $(this).val();
		$.ajax({
			url         :"./kelas/item_post.php",
			type        : "POST",
			data        :{op:"delete_from_tmp",tmp_transaksi_id:tmp_transaksi_id},
			cache       :false,
			success:function(data){
                load_data_penjualan();
			},
		});
		
    });

//====================== TABLE LIST ITEM ===================================//   
    load_data_penjualan();
    function load_data_penjualan(){
		
		$.ajax({
			url         : "./kelas/penjualan_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'tmp_penjualan_list'},
			success     : function(data) {
				
					$('#list_penjualan').bootstrapTable('load',{data: data['tmp_penjualan_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);


                    $('.total_belanja').val(data['detail_penjualan_list'][0]['total']);
                    $('.total_komisi').val(data['detail_penjualan_list'][0]['total_komisi']);

                    //$('.total_tambahan').val(data['detail_penjualan_list'][0]['total_tambahan']);

                    hitung_total_bayar();
                    $('.bayar').focus();
                    

                    $('.bayar').val("");
                    $('.kembali').val("0");
				
			},
			error: function(data){
					$('#list_penjualan').bootstrapTable('removeAll');
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

//====================================================================================================//
//=========================================== TAMBAHAN PENJUALAN =====================================//
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
					field: '',
					title: 'QTY',
					halign:'center',
                    align:'center',
                    width  : 80,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.qty+'"  class="form-control input-sm tbl_qty_tambahan" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					}
					
				}, 
                {
					field: '',
					title: 'HRG SATUAN',
					halign:'center',
                    align:'right',
                    width  : 80,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.harga_satuan+'"  class="form-control input-sm tbl_harga_satuan" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					}
					
				}, 
                {
					field: 'jumlah',
					title: 'JUMLAH',
					halign:'center',
                    align:'right'
				}, 
				{
					field: 'Status',
					title: '<i class="glyphicon glyphicon-cog"></i>',
					halign:'center',
					align:'center',
					width:60,
					formatter: function (value, row) {
					    return 	[  	'<button  style="margin-top:-4px;" class="btn btn-danger btn-xs tbl_hapus_tambahan" value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Hapus"><span class="fa fa-remove"></span></button>' 
									
								];
					}
				}
				]
	});

//==================== UPDATE QTY PADA TABLE TAMABAHAN  ====================================//

    $(document).on('keydown','.tbl_qty_tambahan',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            
            qty = $(this).val();
            id = $(this).attr('id');
            update_qty_table_tambahan(id,qty);
            

        } 
    });


    $(document).on('blur','.tbl_qty_tambahan',function(e){
            qty = $(this).val();
            id = $(this).attr('id');
            update_qty_table_tambahan(id,qty);
    });

    function update_qty_table_tambahan(id,qty){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_qty_tmp_tambahan",qty:qty,id:id},
                cache       :false,
                success:function(data){
                    load_data_tambahan();
                },
        }); 

    }
//=============================================================================//

//==================== UPDATE HARGA SATUAN  PADA TABLE TAMABAHAN  ====================================//

    $(document).on('keydown','.tbl_harga_satuan',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            
            harga_satuan = $(this).val();
            id = $(this).attr('id');
            update_harga_satuan_table_tambahan(id,harga_satuan);
            

        } 
    });


    $(document).on('blur','.tbl_harga_satuan',function(e){
            harga_satuan = $(this).val();
            id = $(this).attr('id');
            update_harga_satuan_table_tambahan(id,harga_satuan);
    });

    function update_harga_satuan_table_tambahan(id,qty){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_harga_satuan_tmp_tambahan",harga_satuan:harga_satuan,id:id},
                cache       :false,
                success:function(data){
                    load_data_tambahan();
                },
        }); 

    }
//=============================================================================//
//==============================================================================//
//==================== HAPUS ITEM TAMBAHAN  ====================================//
$(document).on('click','.tbl_hapus_tambahan',function(e){
        //e.preventDefault();
		tmp_transaksi_tambahan_id = $(this).val();
		$.ajax({
			url         :"./kelas/item_post.php",
			type        : "POST",
			data        :{op:"delete_from_tmp_tambahan",tmp_transaksi_tambahan_id:tmp_transaksi_tambahan_id},
			cache       :false,
			success:function(data){
                load_data_tambahan();
			},
		});
		
    });

    load_data_tambahan();
    function load_data_tambahan(){
        $('#list_tambahan').hide();
		
		$.ajax({
			url         : "./kelas/penjualan_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'tmp_tambahan_list'},
			success     : function(data) {
				
                    if ( data['detail_tambahan_list'][0]['total_tambahan'] != 0 ){
                        $('#list_tambahan').show();
                        $('.total_tambahan').val(data['detail_tambahan_list'][0]['total_tambahan']);
                    }else{
                        $('.total_tambahan').val(0);
                    }
                    

					$('#list_tambahan').bootstrapTable('load',{data: data['tmp_tambahan_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);

                    hitung_total_bayar();

                    $('.bayar').val("");
                    $('.kembali').val("0");
				
			},
			error: function(data){
                    $('#list_tambahan').hide();
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
					field: '',
					title: 'QTY',
					halign:'center',
                    align:'center',
                    width  : 80,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.qty+'"  class="form-control input-sm tbl_qty_pengurangan" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					}
					
				}, 
                {
					field: '',
					title: 'HRG SATUAN',
					halign:'center',
                    align:'right',
                    width  : 80,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.harga_satuan+'"  class="form-control input-sm tbl_harga_satuan_pengurangan" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					}
					
				}, 
                {
					field: 'jumlah',
					title: 'JUMLAH',
					halign:'center',
                    align:'right'
				}, 
				{
					field: 'Status',
					title: '<i class="glyphicon glyphicon-cog"></i>',
					halign:'center',
					align:'center',
					width:60,
					formatter: function (value, row) {
					    return 	[  	'<button  style="margin-top:-4px;" class="btn btn-danger btn-xs tbl_hapus_pengurangan" value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Hapus"><span class="fa fa-remove"></span></button>' 
									
								];
					}
				}
				]
	});

//==================== UPDATE QTY PADA TABLE PENGURANGAN  ====================================//

$(document).on('keydown','.tbl_qty_pengurangan',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            
            qty = $(this).val();
            id = $(this).attr('id');
            update_qty_table_pengurangan(id,qty);
            

        } 
    });


    $(document).on('blur','.tbl_qty_pengurangan',function(e){
            qty = $(this).val();
            id = $(this).attr('id');
            update_qty_table_pengurangan(id,qty);
    });

    function update_qty_table_pengurangan(id,qty){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_qty_tmp_pengurangan",qty:qty,id:id},
                cache       :false,
                success:function(data){
                    load_data_pengurangan();
                },
        }); 

    }
//=============================================================================//

//==================== UPDATE HARGA SATUAN  PADA TABLE PENGURANGAN  ====================================//

    $(document).on('keydown','.tbl_harga_satuan_pengurangan',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            
            harga_satuan = $(this).val();
            id = $(this).attr('id');
            update_harga_satuan_table_pengurangan(id,harga_satuan);
            

        } 
    });


    $(document).on('blur','.tbl_harga_satuan_pengurangan',function(e){
            harga_satuan = $(this).val();
            id = $(this).attr('id');
            update_harga_satuan_table_pengurangan(id,harga_satuan);
    });

    function update_harga_satuan_table_pengurangan(id,qty){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_harga_satuan_tmp_pengurangan",harga_satuan:harga_satuan,id:id},
                cache       :false,
                success:function(data){
                    load_data_pengurangan();
                },
        }); 

    }
//=============================================================================//
//==============================================================================//
//==================== HAPUS ITEM PENGURANGAN  ====================================//
$(document).on('click','.tbl_hapus_pengurangan',function(e){
        //e.preventDefault();
		tmp_transaksi_pengurangan_id = $(this).val();
		$.ajax({
			url         :"./kelas/item_post.php",
			type        : "POST",
			data        :{op:"delete_from_tmp_pengurangan",tmp_transaksi_pengurangan_id:tmp_transaksi_pengurangan_id},
			cache       :false,
			success:function(data){
                load_data_pengurangan();
			},
		});
		
    });


    load_data_pengurangan();
    function load_data_pengurangan(){
        $('#list_pengurangan').hide();
		
		$.ajax({
			url         : "./kelas/penjualan_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'tmp_pengurangan_list'},
			success     : function(data) {
				
                    if ( data['detail_pengurangan_list'][0]['total_pengurangan'] != 0 ){
                        $('#list_pengurangan').show();
                        $('.total_pengurangan').val(data['detail_pengurangan_list'][0]['total_pengurangan']);
                    }else{
                        $('.total_pengurangan').val(0);
                    }
                    

					$('#list_pengurangan').bootstrapTable('load',{data: data['tmp_pengurangan_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);

                    hitung_total_bayar();

                    $('.bayar').val("");
                    $('.kembali').val("0");
				
			},
			error: function(data){
                    //$('#list_pengurangan').hide();
					$('#list_pengurangan').bootstrapTable('removeAll');
                   
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }













//================================== hitung ==========================================//
    function hitung_total_bayar(){

        total_belanja        = parseInt($(".total_belanja").val().replace(/[^,\d]/g, '').toString());
        total_komisi         = parseInt($(".total_komisi").val().replace(/[^,\d]/g, '').toString());
        total_tambahan       = parseInt($(".total_tambahan").val().replace(/[^,\d]/g, '').toString());
        total_pengurangan    = parseInt($(".total_pengurangan").val().replace(/[^,\d]/g, '').toString());


        total_bayar          = Intl.NumberFormat().format((total_belanja-total_komisi)+total_tambahan - total_pengurangan );   
       $(".total_bayar").html(total_bayar);
       $(".total_bayar").val(total_bayar);



    }
    

//============================== PROSES SIMPAN TRANSAKSI =============================//
    $(document).on('click','.simpan_transaksi',function(e){
        e.preventDefault();
        user_id             = $(".user_id").val();
        pelanggan_id        = $("#pelanggan").val();
        no_nota             = $(".no_nota").val();

        grand_total         = parseInt($(".grand_total").val().replace(/[^,\d]/g, '').toString());
        bayar               = parseInt($(".bayar").val().replace(/[^,\d]/g, '').toString());
        total_komisi        = parseInt($(".total_komisi").val().replace(/[^,\d]/g, '').toString());

        kembali             = $(".kembali").val();

        hutang             = $(".kembali").val().replace('-', '');

       

        if ( grand_total == 0 ){
           
            swal({
				
				text: "Tidak Ada List Barang yang dibeli",
				type: "warning"
			}).then (function(){
                	
			});
        }else if ( (pelanggan_id == '1' ) & (bayar < grand_total)&(kembali != 0) ){
            swal({
				
				text: "Nama pelanggan tidak boleh Cash",
				type: "warning"
			}).then (function(){
                $('#pelanggan').select2('open');		
			});
            
        }else if ( $(".bayar").val() == "") {
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
                simpan_transaksi('2');	
                
			}); 


        }else{
            simpan_transaksi('1');
        }
         
    });


    function simpan_transaksi(type_bayar){
        user_id             = $(".user_id").val();
        pelanggan_id        = $("#pelanggan").val();
        no_nota             = $(".no_nota").val();

        total_belanja       = $(".total_belanja").val();
        total_komisi        = $(".total_komisi").val();
        total_tambahan      = $(".total_tambahan").val();
        total_pengurangan   = $(".total_pengurangan").val();
        bayar               = $(".bayar").val();
        kembali             = $(".kembali").val().replace('-', '');

        keterangan          = $(".keterangan").val(); 


          $.ajax({
			url         : "./kelas/transaksi_post.php",
			type        : "POST",
			data        : { op                  : "simpan_transaksi_penjualan",
                            user_id             : user_id,
                            pelanggan_id        : pelanggan_id, 
                            no_nota             : no_nota,
                            total_belanja       : total_belanja,
                            total_komisi        : total_komisi,
                            total_tambahan      : total_tambahan,
                            total_pengurangan   : total_pengurangan,
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

                            window.open("./print_out/cetak_nota_penjualan.php?penjualan_id="+data, "print_nota","width=600,height=800,top=50,left=250" );
						
                            window.location.reload();
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