
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



                    <div>
                    <form id="form-add-item" method="POST" action="">
                        <input type="hidden" class="" value="add_item_penjualan" name="op">
                        <input type="hidden" class="no_nota" value="" name="no_nota">

                        <div class="modal-body">


                            <div class="row">
                               
                                <div class="col-md-4">
                                    <div class="form-group nama ">
                                        <label class="control-label">Nama Barang</label>
                                        <select class="form-control nama_barang" name="nama_barang" id="nama_barang" style="width:100%;"></select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label class="control-label">Harga Satuan</label>
                                    <div class="input-group input-group">
                                        <span class="input-group-addon">Rp. </span>
                                        <input type="text" name="harga_satuan" id="harga_satuan" required class="form-control harga_satuan" onkeypress='return angka(event)'>
                                       
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Jumlah Beli</label>
                                    <div class="input-group input-group">
                                        <input type="text" name="qty" id="qty" required class="form-control qty" onkeypress='return angka(event)'>
                                        <span class="input-group-addon satuan">Satuan</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-block btn-sm btn-warning simpan_item" id="simpan_item" style="margin-top:24px;"><i class="fa fa-plus" ></i> TAMBAHKAN</button>
                                </div>
                               

                            </div>


                        </div>
                    </form>
                    </div>


                    <div class="col-md-12" style="margin-top:-5px;">
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
                        <div class="col-md-5">

                            <textarea class="form-control keterangan" rows="2" placeholder="Keterangan tambahan" style="width:80%;"></textarea>
                            
                        </div>
                        <div class="col-md-7">
                            <form class="form-horizontal">

                                

                                <div class="form-group" style="margin-top:20px;">
                                    <label class="col-sm-6 control-label">Total Belanja</label>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control input-sm total_belanja input_ket" value="0" style="text-align:right;" disabled> 
                                    </div>
                                </div> 
                                <div class="form-group" style="margin-top:-10px;">
                                    <label class="col-sm-6 control-label">Total Potongan</label>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control input-sm total_potongan input_ket" value="0" style="text-align:right;" disabled> 
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

    //====================== GENERATE NO NOTA =================================================================//
    user_id = $('.user_id').val();
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


    //================================= SIMPAN SEMENTARA PENJUALAN LIST ====================================//
    $('#nama_barang').select2({
        allowClear: true,
        minimumInputLength: 2,
        ajax: {
            url: './kelas/barang_get.php',
            dataType: 'json',
            quietMillis: 250,
            
            data: function(params) {
                var queryParameters = {
                    op          : 'nama_barang_select2',
                    nama_barang : params.term
                }
                return queryParameters;
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {

                        return {
                            text    : item.nama_barang,
                            id      : item.id,
                        }

                    })
                };
            }
        }
    });



    $('#nama_barang').on('select2:select', function(e) {
        id_barang = $('.nama_barang').val();
      
        $.ajax({
			url         : "./kelas/barang_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {op:'detail_barang',id_barang:id_barang},
			success     : function(data) {
                //alert(data['satuan']+data['harga_satuan']);
				$('.satuan').html(data['satuan']);
                $('.harga_satuan').val(data['harga_satuan']);
                $('.qty').val(1);

                $('#simpan_item').focus();

			},
			error: function(data){
					
			}
	    }); 
    });

    var harga_satuan = document.getElementById('harga_satuan');
	harga_satuan.addEventListener('keyup', function(e)
	{
        harga_satuan.value = formatRupiah(this.value);
        
	});


    //================= SIMPAN ITEM PENJUALAN =============================//

    $(document).on('click', '#simpan_item', function() {

        var data = $('#form-add-item').serialize();
        $.ajax({
            url: "./kelas/item_post.php",
            type: 'POST',
            data: data,
            success: function(data, textStatus, jqXHR) {
                load_data_penjualan();
               /*  swal({
                    title: "",
                    text: "Sukses",
                    type: "success",
                    width: "200px",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1500
                }).then(function() {},function(dismiss) {}
                ) */
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal({
                    title: "",
                    text: "Gagal",
                    type: "error",
                    width: "200px",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1500
                }).then(function() {


                    },

                    function(dismiss) {
                        if (dismiss === 'timer') {

                        }
                    }
                )
            }

        });

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
					field: 'nama_barang',
					title: 'NAMA BARANG',
					halign:'center',
                    align:'left',
					
				}, 
                {
					field: '',
					title: 'SATUAN',
					halign:'center',
                    align:'center',
                    width  : 80,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.satuan+'"  class="form-control input-sm tbl_qty" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					}
					
				}, 
                {
					field: '',
					title: 'HARGA',
					halign:'center',
                    align:'center',
                    width  : 80,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'"  value="'+row.harga_satuan+'"  class="form-control input-sm tbl_tonase" style="width:80px; text-align:center; margin-top:-4px;">' 
								];
					}
					
				}, 
				{
					field: '',
					title: 'QTY',
					halign:'center',
                    align:'center',
                    width:100,
                    formatter: function (value, row) {
					    return 	[  	'<input type="text" id="'+row.id+'" value="'+row.quantity+'" class="form-control input-sm tbl_harga" style="width:100px; text-align:right; margin-top:-4px;">' 
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
//==================== UPDATE potongan  PADA TABLE ====================================//
$(document).on('keydown','.tbl_potongan',function(e){
        if ( (e.which == 13)|(e.which == 9)) {
            potongan = $(this).val();
            id = $(this).attr('id');
            update_potongan_table(id,potongan);
        } 
    });

    $(document).on('blur','.tbl_potongan',function(e){
        potongan = $(this).val();
            id = $(this).attr('id');
            update_potongan_table(id,potongan);
    });

    function update_potongan_table(id,potongan){
        $.ajax({
                url         :"./kelas/item_post.php",
                type        : "POST",
                data        :{op:"update_potongan_tmp",potongan:potongan,id:id},
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
                    $('.total_potongan').val(data['detail_penjualan_list'][0]['total_potongan']);

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
            //$('.nama_barang').select2('close');
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


//================================== hitung ==========================================//
    function hitung_total_bayar(){

        total_belanja        = parseInt($(".total_belanja").val().replace(/[^,\d]/g, '').toString());
        total_potongan       = parseInt($(".total_potongan").val().replace(/[^,\d]/g, '').toString());


        total_bayar          = Intl.NumberFormat().format(total_belanja-total_potongan);   
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
        total_potongan        = parseInt($(".total_potongan").val().replace(/[^,\d]/g, '').toString());

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
        total_potongan        = $(".total_potongan").val();
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
                            total_potongan      : total_potongan,
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