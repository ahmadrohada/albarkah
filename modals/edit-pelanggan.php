<div class="modal fade edit-pelanggan" id="editPelanggan" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">
                                Edit Pelanggan
                            </h4>
                        </div>

                        <form  id="form-edit-pelanggan" method="POST" action="">
                        <input type="hidden" class="" value="update_pelanggan" name="op">
                        <input type="hidden" class="pelanggan_id" name="pelanggan_id">

                        <div class="modal-body">
							
						
					
						<div class="form-group nama ">
                            <label>Nama Pelanggan</label>
							<input type="text" class="form-control input-sm nama" id="nama" name="nama">
                        </div>

                        <div class="form-group kegiatan ">
                            <label>Alamat</label>
                            <textarea class="form-control alamat" rows="2" name="alamat" placeholder="Alamat"></textarea>
                        </div>

                        <div class="form-group nama ">
                            <label>No Tlp/HP</label>
							<input type="text" class="form-control input-sm tlp" id="tlp" name="tlp">
                        </div>

                        <div class="form-group kegiatan ">
                            <label>Informasi lain</label>
                            <textarea class="form-control txt-info info" rows="2" name="info" placeholder="Info Tambahan"></textarea>
                        </div>


                        </div>
                        <div class="modal-footer">
                            
                            <input type="button" class="btn btn-sm btn-warning pull-right" id="update_pelanggan" value="UPDATE">
                          
                        </div>

                        </form>
                    </div>
                </div>
            </div>







<script type="text/javascript">
$(document).ready(function() {



	$('.edit-pelanggan').on('hidden.bs.modal', function(){
		$('.alamat').html('');
        $('.info').html('');

        $('.nama').val('');
        $('.tlp').val('');
	});

    $(document).on('click', '#update_pelanggan', function(){
		
        var data = $('#form-edit-pelanggan').serialize();
		$.ajax({
			url     :"./kelas/pelanggan_post.php",
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
							$('.edit-pelanggan').modal('hide');
						}
					}
			)	
			},
			error: function(jqXHR , textStatus, errorThrown) {
                alert("unknown error");
				/* var test = $.parseJSON(jqXHR.responseText);
				
				var data= test.errors;

				$.each(data, function(index,value){
					
					if (index == 'label'){
						$('.kegiatan').addClass('has-error');
					}

					
				
				}); */

			
			}
			
		  });
		
    });




});
</script>