
<?php
	$user_id = isset($_SESSION['md_user_id']) ? $_SESSION['md_user_id'] : '';
?>




<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-tags"></i> Informasi Nota Pembelian</h3>
                </div>
                <div class="box-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">No Nota</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-sm no_nota" id="no_nota" style="margin-top:3px;" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-sm tgl_nota" id="tgl_nota"  style="margin-top:3px;"  readonly>
                        </div>
                    </div>

                    <input type="hidden" value="<?php echo $user_id ?>" class="user_id" id="user_id" name="user_id" >

                    

                </form>
                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-users"></i> Informasi Supplier</h3>
                    <div class="box-tools pull-right">
                        <span  data-toggle="tooltip" title="Tambah Supplier"><a  style="margin-top:5px !important;" class="btn btn-warning btn-xs add_supplier" data-toggle="modal" data-target=".add-supplier"><i class="fa fa-plus" ></i></a></span>
                    </div>
                </div>
                <div class="box-body">
                
                    <div class="form-group nama ">
                        <label>Nama Supplier</label>
                        <select  class="form-control supplier_id" name="supplier_id" id="supplier" style="width:100%;">
                            <option value="1" selected>Cash</option>
                        </select>
                    </div>

                    <div class="detail_supplier" hidden>
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
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-th-list"></i> Transaksi Pembelian</h3>
                </div>
                <div class="box-body">
                    
                    
                    
                    <div class="col-md-12" style="margin-top:10px;">
                        
                  
                        <div id="toolbar">
                            <span  data-toggle="tooltip" title="Tambah Item Pembelian"><a class="btn btn-warning btn-sm add_item_pembelian" data-toggle="modal" data-target=".add-item_pembelian"><i class="fa fa-plus" ></i> TAMBAH ITEM</a></span>
					    </div>
                        <table
                            id="list_pembelian"
                            class="table-striped" 
							data-toolbar="#toolbar"
							data-toolbar-align="right" 
                            >
                        
                        </table>
                    </div>

                    <div class="col-md-12 no-padding" style="margin-top:30px; ">
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
                            <br><br>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control keterangan" rows="2" placeholder="Keterangan tambahan" style="width:70%;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <form class="form-horizontal">



                                <div class="form-group" style="margin-top:20px;">
                                    <label class="col-sm-6 control-label">Total Pembelian</label>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control input-sm total_pembelian" value="0" style="text-align:right;" disabled> 
                                    </div>
                                </div> 







                                <div class="form-group" style="margin-top:-10px;">
                                    <label class="col-sm-6 control-label">Total Upah Kuli</label>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control input-sm total_upah_kuli" value="0" style="text-align:right; margin-top:5px;" disabled>
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

                                <div class="form-group"  style="margin-top:-10px;">
                                    <label class="col-sm-6 control-label">Type Bayar</label>
                                    <div class="col-sm-6">
                                       
                                        <select class="form-control type_bayar" name="type_bayar" style="width:100%">
                                            <option value="1" selected>Cash</option>
                                            <option value="2">Hutang</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group jumlah_dp"  style="margin-top:-10px;" hidden>
                                    <label class="col-sm-6 control-label">DP</label>
                                    <div class="col-sm-6">
                                        <input type="text"  id="dp" class="form_bayar form-control input-sm txt_jm_dp" value="" style="text-align:right;" name="jumlah_dp" style="text-align:right; margin-top:2px;">
                                    </div>
                                </div>


                            </form>
                           
                        </div>

                        
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-block btn-warning simpan_transaksi_pembelian" style="margin-top:24px;">SIMPAN</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>



<?php
    include "modals/add-pembelian.php";
    include "modals/add-supplier.php";

    include "modals/add-tambahan_pembelian.php";
    include "modals/add-pengurangan_pembelian.php";

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
	
    user_id = $('.user_id').val();
   
    
    $('.add-item_pembelian').on('hidden.bs.modal', function(){
		load_data_pembelian();
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
			data        : {data:'new_transaksi_pembelian',user_id:user_id},
			success     : function(data) {

				$('.no_nota').val(data['no_nota']);
                $('#tgl_nota').val(data['tgl_nota']);
                $('#nama_user').val(data['nama_user']);

                
                load_data_pembelian();
				
			},
			error: function(data){
					
			}
	});


//=========================  S U P P L I E R  =============================// 

$('#supplier').select2({
       
       allowClear          : true,
       ajax: {
           url: './kelas/supplier_get.php',
           dataType: 'json',
           quietMillis: 250,
           data: function (params) {
               var queryParameters = {
                   op: 'supplier_list',
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

   $("#supplier").change(function(){
       var supplier_id = $("#supplier option:selected").val();
       $.ajax({
           url     : "./kelas/supplier_get.php",
           type    : "GET",
           dataType: "json",
           data    : { op  : "detail_supplier", supplier_id : supplier_id },
           success: function (data) {
               

               $(".no_tlp").html(data['no_tlp']);
               $(".alamat").html(data['alamat']);

               $('.detail_supplier').show(); 

               
           },
           error: function (data) {
             
               $('.detail_supplier').hide(); 
           }
       }); 
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




//==================== UPDATE QTY PADA TABLE ====================================//

$(document).on('keydown','.tbl_qty',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            
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
                    load_data_pembelian();
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
                    load_data_pembelian();
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
                    load_data_pembelian();
                },
        }); 

    }


    

//=======================================================================//
//==================== UPDATE UPAH KULI  PADA TABLE ====================================//
$(document).on('keydown','.tbl_upah_kuli',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            upah_kuli = $(this).val();
            id = $(this).attr('id');
            update_upah_kuli_table(id,upah_kuli);
        } 
    });

    $(document).on('blur','.tbl_upah_kuli',function(e){
        upah_kuli = $(this).val();
            id = $(this).attr('id');
            update_upah_kuli_table(id,upah_kuli);
    });

    function update_upah_kuli_table(id,upah_kuli){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_upah_kuli_tmp",upah_kuli:upah_kuli,id:id},
                cache       :false,
                success:function(data){
                    load_data_pembelian();
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
                load_data_pembelian();
			},
		});
		
    });


//====================== TABLE LIST ITEM ===================================//   
    
function load_data_pembelian(){
        no_nota  = $('.no_nota').val();
		
		$.ajax({
			url         : "./kelas/pembelian_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'tmp_pembelian_list',no_nota:no_nota},
			success     : function(data) {
				
					$('#list_pembelian').bootstrapTable('load',{data: data['tmp_pembelian_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);


    
                    $('.total_pembelian').val(data['detail_pembelian_list'][0]['total']);
                    $('.total_upah_kuli').val(data['detail_pembelian_list'][0]['total_upah_kuli']);

                    $('.total_bayar').val(data['detail_pembelian_list'][0]['total_bayar']);
                   
                    hitung_total_bayar();
				
			},
			error: function(data){
					$('#table').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
					$('#list_penjualan').bootstrapTable('removeAll');
				
			}
		});
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
                data        :{op:"update_qty_tmp_tambahan_beli",qty:qty,id:id},
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
                data        :{op:"update_harga_satuan_tmp_tambahan_beli",harga_satuan:harga_satuan,id:id},
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
			data        :{op:"delete_from_tmp_tambahan_beli",tmp_transaksi_tambahan_id:tmp_transaksi_tambahan_id},
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
			data        : {data:'tmp_tambahan_list_beli'},
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
                data        :{op:"update_qty_tmp_pengurangan_beli",qty:qty,id:id},
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
                data        :{op:"update_harga_satuan_tmp_pengurangan_beli",harga_satuan:harga_satuan,id:id},
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
			data        :{op:"delete_from_tmp_pengurangan_beli",tmp_transaksi_pengurangan_id:tmp_transaksi_pengurangan_id},
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
			data        : {data:'tmp_pengurangan_list_beli'},
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

total_pembelian      = parseInt($(".total_pembelian").val().replace(/[^,\d]/g, '').toString());
total_upah_kuli      = parseInt($(".total_upah_kuli").val().replace(/[^,\d]/g, '').toString());
total_tambahan       = parseInt($(".total_tambahan").val().replace(/[^,\d]/g, '').toString());
total_pengurangan    = parseInt($(".total_pengurangan").val().replace(/[^,\d]/g, '').toString());


total_bayar          = Intl.NumberFormat().format((total_pembelian-total_upah_kuli+total_tambahan ) - total_pengurangan );   
$(".total_bayar").html(total_bayar);
$(".total_bayar").val(total_bayar);



}







//=========================== T Y P E   B A Y A R =================================================//
$('.type_bayar').select2();
    $(".type_bayar").change(function(){
        var type = $(".type_bayar option:selected").val();


        if ( type == 2 ){
            $('.jumlah_dp').show();
        }else{
            $('.jumlah_dp').hide();
        }


    });


    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('dp');
	tanpa_rupiah.addEventListener('keyup', function(e)
	{
        tanpa_rupiah.value = formatRupiah(this.value);
        
	});


//======================= SIMPAN TRANSAKSI PEMBELIAN ===============================================//
    $(document).on('click','.simpan_transaksi_pembelian',function(e){
        e.preventDefault();
        user_id             = $(".user_id").val();
        supplier_id         = $(".supplier_id").val();
        no_nota             = $(".no_nota").val();

        total_pembelian     = parseInt($(".total_pembelian").val().replace(/[^,\d]/g, '').toString());
        total_upah_kuli     = parseInt($(".total_upah_kuli").val().replace(/[^,\d]/g, '').toString());
        total_tambahan      = parseInt($(".total_tambahan").val().replace(/[^,\d]/g, '').toString());
        total_pengurangan   = parseInt($(".total_pengurangan").val().replace(/[^,\d]/g, '').toString());
        
        
        keterangan          = $(".keterangan").val();

        type_bayar          = $(".type_bayar").val();
        jumlah_dp           = parseInt($(".txt_jm_dp").val().replace(/[^,\d]/g, '').toString());
      
        
       
        if ( total_pembelian == 0 ){
           
            swal({
				
				text: "List Item Pembelian Masih Kosong",
				type: "warning"
			}).then (function(){
                	
			});
        }else if ( ( type_bayar != '1' ) & (supplier_id == '1') ){
            swal({
				
				text: "Nama Supplier tidak boleh Cash",
				type: "warning"
			}).then (function(){
                $('#supplier').select2('open');		
			});
            
        }else{
            simpan_transaksi_pembelian();
        }
    });




    function simpan_transaksi_pembelian(){
        user_id             = $(".user_id").val();
        supplier_id         = $(".supplier_id").val();
        no_nota             = $(".no_nota").val();

        total_pembelian     = parseInt($(".total_pembelian").val().replace(/[^,\d]/g, '').toString());
        total_upah_kuli     = parseInt($(".total_upah_kuli").val().replace(/[^,\d]/g, '').toString());
        total_tambahan      = parseInt($(".total_tambahan").val().replace(/[^,\d]/g, '').toString());
        total_pengurangan   = parseInt($(".total_pengurangan").val().replace(/[^,\d]/g, '').toString());
        
        
        keterangan          = $(".keterangan").val();

        type_bayar          = $(".type_bayar").val();
        jumlah_dp           = parseInt($(".txt_jm_dp").val().replace(/[^,\d]/g, '').toString());

          $.ajax({
			url         : "./kelas/transaksi_post.php",
			type        : "POST",
			data        : { op              : "simpan_transaksi_pembelian",
                            user_id         : user_id,
                            supplier_id     : supplier_id, 
                            no_nota         : no_nota,
                            total_pembelian : total_pembelian,
                            total_pengurangan : total_pengurangan,
                            total_tambahan  : total_tambahan,
                            total_upah_kuli : total_upah_kuli,
                            type_bayar      : type_bayar,
                            jumlah_dp       : jumlah_dp,
                            keterangan      :keterangan
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

                            window.location.assign("home.php?page=pembelian");


                            window.open("./print_out/cetak_nota_pembelian.php?pembelian_id="+data, "print_nota","width=900,height=800,top=50,left=250" );
						
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