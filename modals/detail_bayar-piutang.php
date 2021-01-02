<div class="modal fade detail_bayar-piutang" id="bayarPiutang" role="dialog"  aria-hidden="true">
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
                        <input type="hidden" class="s_nota_id" value="" name="nota_id">

                        <div class="modal-body">
							
						
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group nama ">
                                    <label class="control-label">NAMA PELANGGAN</label>
                                    <input  class="form-control s_nama_pelanggan" name="" id="" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Tgl Transaksi</label>
                                <input  class="form-control s_tgl_transaksi" name="" id="" >
                            </div>
                            <div class="col-md-4">
                                <div class="form-group nama ">
                                    <label class="control-label">TOTAL BELANJA</label>
                                    <input  class="form_bayar form-control s_total_belanja" name="" id="" style="text-align:right">
                                </div>
                            </div>
                        </div>
						

                        <div class="row">
                            
                            <div class="col-md-12">
                                <table
                                    id="s_history_pembayaran"
                                    data-class="table-striped" 
                                    data-toolbar="#toolbar"
                                    
                                    >
                                
                                </table>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-block btn-warning" id="" style="margin-top:24px;" disabled>LUNAS</button>
                          
                        </div>

                        </form>
                    </div>
                </div>
            </div>







<script type="text/javascript">

$(document).ready(function() {


   $('#s_history_pembayaran').bootstrapTable({
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



     
});
</script>