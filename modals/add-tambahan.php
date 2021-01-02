<div class="modal fade add-item_tambahan" id="addItem" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">
                                ITEM TAMBAHAN
                            </h4>
                        </div>

                        <form  id="form-add-item_tambahan" method="POST" action="">
                        <input type="hidden" class="" value="add_item_tambahan" name="op">
                        <input type="hidden" class="no_nota" value="" name="no_nota">

                        <div class="modal-body">
							
						
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group tambahan ">
                                    <label class="control-label">Item Tambahan :</label>
                                    <input type="text"  class="form-control item_tambahan" name="item_tambahan" id="item_tambahan">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">QTY</label>
                                <input type="text" name="qty" id="qty" required class="form-control qty" onkeypress='return angka(event)'>
                           
                            </div>
                            <div class="col-md-4">
                                <div class="form-group harga_satuan ">
                                    <label>Harga Satuan</label>
                                    <input type="text"  class="form-control harga_satuan" name="harga_satuan" id="harga_satuan">
                                </div>
                            </div>
                        </div>
						

                        

                       
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-block btn-warning simpan_item_tambahan" id="simpan_item_tambahan" style="margin-top:24px;">TAMBAH</button>
                          
                        </div>

                        </form>
                    </div>
                </div>
            </div>







<script type="text/javascript">
$(document).ready(function() {


    $('.add-item_tambahan').on('hidden.bs.modal', function(){
       
        $('.item_tambahan').val("");
        $('.qty').val("");
        $('.harga_satuan').val("");




	});

//================= SIMPAN ITEM PEMBELIAN =============================//

    $(document).on('click', '#simpan_item_tambahan', function(){
		
        var item_tambahan = $(".item_tambahan").val();
       
       

       if ( item_tambahan != "" ){
            var data = $('#form-add-item_tambahan').serialize();
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
                                $('.add-item_tambahan').modal('hide');
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
                    text: "item tambahan harus diisi",
                    type: "warning",
                    width: "200px",
                    showConfirmButton: false,
                    allowOutsideClick : false,
                    timer:1800
                }).then(function () {
                    $('.item_tambahan').focus();
                        
                },
                        
                    function (dismiss) {
                        if (dismiss === 'timer') {
                            $('.item_tambahan').focus();
                        }
                })
       }



		
    });


});
</script>