<div class="modal fade bayar-piutang" id="bayarPiutang" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">
                                DETAIL PIUTANG
                            </h4>
                        </div>

                    <form  id="form-bayar-piutang" method="POST" action="">
                        <input type="hidden" class="" value="bayar_piutang" name="op">
                        <input type="hidden" class="nota_id" value="" name="nota_id">

                        <div class="modal-body">
							
						
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group nama ">
                                    <label class="control-label">NAMA PELANGGAN</label>
                                    <input  class="form-control nama_pelanggan" name="" id="" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Tgl Transaksi</label>
                                <input  class="form-control tgl_transaksi" name="" id="" >
                            </div>
                            <div class="col-md-4">
                                <div class="form-group nama ">
                                    <label class="control-label">TOTAL BELANJA</label>
                                    <input  class="form_bayar form-control total_belanja" name="" id="" style="text-align:right">
                                </div>
                            </div>
                        </div>
						

                        <div class="row">
                            
                            <div class="col-md-12">
                                <table
                                    id="history_pembayaran"
                                    data-class="table-striped" 
                                    data-toolbar="#toolbar"
                                    
                                    >
                                
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group nama ">
                                    <label class="control-label">SISA HUTANG</label>
                                    <input type="text" class="form_bayar form-control input-sm sisa_piutang"  value="" id="sisa_piutang" style="text-align:right;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group nama ">
                                    <label class="control-label">JUMLAH BAYAR</label>
                                    <input type="text" class="form_bayar form-control input-sm jumlah_bayar"  name="jumlah_bayar" value="" id="jumlah_bayar" style="text-align:right;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group nama ">
                                    <label class="control-label">KETERANGAN</label>
                                    <input type="text" class="form-control input-sm keterangan"  name="keterangan" value="" id="keterangan" style="">
                                </div>
                            </div>
                        </div>

                       
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-block btn-warning simpan_pembayaran" id="simpan_pembayaran" style="margin-top:24px;">SIMPAN</button>
                          
                        </div>

                        </form>
                    </div>
                </div>
            </div>







<script type="text/javascript">
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

$(document).ready(function() {


    $('.bayar-piutang').on('shown.bs.modal', function () {
        
        $('#jumlah_bayar').focus();
    }) 

   
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('jumlah_bayar');
	tanpa_rupiah.addEventListener('keyup', function(e)
	{
        tanpa_rupiah.value = formatRupiah(this.value);
        
	});

   $('#history_pembayaran').bootstrapTable({
		columns:[	
				{
					field: 'tgl',
					title: 'TANGGAL',
					halign:'center',
					align:'center',
				}, 
				
				{
					field: 'bayar',
					title: 'JUMLAH BAYAR',
					halign:'center',
					align:'right'
				},
                {
					field: 'keterangan',
					title: 'KETERANGAN',
					halign:'center'
				}
			
				]
	});



     
//================= SIMPAN ITEM PEMBELIAN =============================//

    $(document).on('click', '#simpan_pembayaran', function(){
		
      
        var jumlah_bayar = $('.jumlah_bayar').val();
       
       if ( jumlah_bayar !=  "" ){

            var data = $('#form-bayar-piutang').serialize();

            $.ajax({
                url     :"./kelas/piutang_post.php",
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
                                $('.bayar-piutang').modal('hide');
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
       }
		
    });


});
</script>