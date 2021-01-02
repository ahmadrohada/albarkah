<div class="modal fade add-item_pembelian" id="addItem" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">
                                ITEM PEMBELIAN
                            </h4>
                        </div>

                        <form  id="form-add-item" method="POST" action="">
                        <input type="hidden" class="" value="add_item_pembelian" name="op">
                        <input type="hidden" class="no_nota" value="" name="no_nota">

                        <div class="modal-body">
							
						
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group nama ">
                            <label class="control-label">Nama Karung :</label>
                            <input type="text"  class="form-control nama_karung" style="width:100%;" name="nama_karung">
                            </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-group nama ">
                                <label>Jenis Beras</label>
                                <select  class="form-control jenis_beras" name="jenis_beras" id="jenis_beras" style="width:100%;"></select>
                            </div>


                            </div>
                        </div>
						

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Jumlah</label>
                                <div class="input-group input-group">
                                <input type="text" name="qty" id="qty" required class="form-control qty" onkeypress='return angka(event)'>
                                <span class="input-group-addon">Karung</span>
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
                                <label class="control-label">Harga</label>
                                <div class="input-group input-group">
                                <input type="text" name="harga" id="harga" required class="form-control harga" onkeypress='return angka(event)'>
                                <span class="input-group-addon">/Kg</span>
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


    $('.add-item_pembelian').on('hidden.bs.modal', function(){
        $('#jenis_beras').select2("val", "");
        $('.nama_karung').val("");
        $('.qty').val("");
        $('.tonase').val("");
        $('.harga').val("");
	});



//========================= JENIS BERAS  =============================// 

    $('#jenis_beras').select2({
        
        allowClear          : true,
        ajax: {
            url: './kelas/jenis_beras_get.php',
            dataType: 'json',
            quietMillis: 250,
            data: function (params) {
                var queryParameters = {
                    op: 'jenis_beras_select2',
                    label: params.term
                }
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        
                        return {
                            text: item.label,
						    id: item.id,
                        }
                        
                    })
                };
            }
        }
    });

//======================== SHORT  PROCCESS ============================//
    $('.add-item_pembelian').on('shown.bs.modal', function(){
        $('.nama_karung').focus();
	});

    $(document).on('keydown','.nama_karung',function(e){
        //13 = enter 9 = tab
        if ( (e.which == 13)|(e.which == 9)) {
            $('#jenis_beras').select2('open');
        } 
    });

    $('#jenis_beras').on('select2:select', function (e) {
        $('.qty').focus();
    });
   
    $(document).on('keydown','.qty',function(e){
        //13 = enter 9 = tab
        if ( (e.which == 13)|(e.which == 9)) {
            $('.tonase').focus();
        } 
    });

    $(document).on('keydown','.tonase',function(e){
        //13 = enter 9 = tab
        if ( (e.which == 13)|(e.which == 9)) {
            $('.harga').focus();
        } 
    });

    $(document).on('keydown','.harga',function(e){
        //13 = enter 9 = tab
        if ( (e.which == 13)|(e.which == 9)) {
            $('#simpan_item').focus();
        } 
    });



    $(document).on('click', '#simpan_item', function(){
		
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
							$('.add-item_pembelian').modal('hide');
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
		
    });


});
</script>