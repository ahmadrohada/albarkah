<div class="modal fade add-item_penjualan" id="addItem" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">
                                ITEM PENJUALAN
                            </h4>
                        </div>

                        <form  id="form-add-item" method="POST" action="">
                        <input type="hidden" class="" value="add_item_penjualan" name="op">
                        <input type="hidden" class="no_nota" value="" name="no_nota">

                        <div class="modal-body">
							
						
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group nama ">
                                    <label class="control-label">Nama Karung :</label>
                                    <select  class="form-control nama_karung" name="nama_karung" id="nama_karung" style="width:100%;"></select>
                                </div>
                            </div>
                           
                            
                        </div>
						

                        <div class="row">
                            
                            <div class="col-md-4">
                                <label class="control-label">Harga</label>
                                <div class="input-group input-group">
                                <input type="text" name="harga" id="harga" required class="form-control f_harga" onkeypress='return angka(event)'>
                                <span class="input-group-addon">/Kg</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Tonase</label>
                                    <div class="input-group input-group">
                                    <input type="text" name="tonase" id="tonase" required class="form-control tonase" onkeypress='return angka(event)'>
                                    <span class="input-group-addon">Kg / Karung</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Jumlah</label>
                                <div class="input-group input-group">
                                <input type="text" name="qty" id="qty" required class="form-control f_qty" onkeypress='return angka(event)'>
                                <span class="input-group-addon">Karung</span>
                                </div>
                            </div>

                        </div>

                       
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-block btn-warning simpan_item" id="simpan_item" style="margin-top:24px;">TAMBAH</button>
                          
                        </div>

                        </form>
                    </div>
                </div>
            </div>







<script type="text/javascript">
$(document).ready(function() {


    $('.add-item_penjualan').on('hidden.bs.modal', function(){
        
        $('.nama_karung').val("");
        $('.qty').val("");
        $('.tonase').val("");
        $('.harga').val("");
	});


//========================= NAMA KARUNG  =============================//
   

    $('#nama_karung').select2({
        
        allowClear          : true,
        ajax: {
            url: './kelas/stok_beras.php',
            dataType: 'json',
            quietMillis: 250,
            data: function (params) {
                var queryParameters = {
                    op: 'stok_beras_list',
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


    $('.add-item_penjualan').on('shown.bs.modal', function(){
        $('#nama_karung').select2('open');
	});


    $('#nama_karung').on('select2:select', function (e) {

        var stok = $("#nama_karung option:selected").val();
    
        
        $('#tonase').val(stok.split('|')[1]);
        $('#harga').val(stok.split('|')[2]);

        $('#qty').focus();
    

    });


    

    $(document).on('keydown','.f_harga',function(e){
        //13 = enter 9 = tab
        if ( e.which == 13) {
            $('.tonase').focus();
        } 
    });

    $(document).on('keydown','.tonase',function(e){
        //13 = enter 9 = tab
        if ( e.which == 13) {
            $('.f_qty').focus();
        } 
    });

     $(document).on('keydown','.f_qty',function(e){
        //13 = enter 9 = tab
        if ( e.which == 13) {
            $('#simpan_item').focus();
        } 
    });
//=========================================================================// 

    


//================= SIMPAN ITEM PEMBELIAN =============================//

    $(document).on('click', '#simpan_item', function(){
		
        var nama_karung = $("#nama_karung option:selected").val();
        var tonase_std  = nama_karung.split('|')[1];
        var tonase_jual = $('#tonase').val();
       
       

       if ( tonase_jual <=  tonase_std ){
            var data = $('#form-add-item').serialize();
            $.ajax({
                url     :"./kelas/item_post.php",
                type	: 'POST',
                data	:  data,
                success	: function(data , textStatus, jqXHR) {
                    
                    swal({
                        title: "",
                        text: "Sukses",
                        type: "success",
                        width: "200px",
                        showConfirmButton: false,
                        allowOutsideClick : false,
                        timer:1500
                    }).then(function () {
                        
                        
                    },
                        
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                $('.add-item_penjualan').modal('hide');
                            }
                        }
                )	
                },
                error: function(jqXHR , textStatus, errorThrown) {
                    swal({
                        title: "",
                        text: "Gagal",
                        type: "error",
                        width: "200px",
                        showConfirmButton: false,
                        allowOutsideClick : false,
                        timer:1500
                    }).then(function () {
                        
                        
                    },
                        
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                
                            }
                        }
                    )	
                }
                
            });
       }else{
            swal({
                    title: "",
                    text: "Tonase tidak boleh lebih dari"+tonase_std,
                    type: "warning",
                    width: "200px",
                    showConfirmButton: false,
                    allowOutsideClick : false,
                    timer:1800
                }).then(function () {
                    $('#tonase').focus();
                        
                },
                        
                    function (dismiss) {
                        if (dismiss === 'timer') {
                            $('#tonase').focus();
                        }
                })
       }



		
    });


});
</script>