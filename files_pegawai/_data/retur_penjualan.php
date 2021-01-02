<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Retur Penjualan</h3>
                </div>
                <div class="box-body">

                    
                    <table
						id="table_retur_penjualan"
                        data-class="table-striped" 
						data-pagination="true"
						data-search="true"
						data-toolbar="#toolbar"
						data-search="true"
						>
					
					</table>
                </div>
            </div>
        </div>
    </div>
</section>











<script>
$(document).ready(function () {


	

    $(document).on('click','.transaksi_retur_penjualan',function(e){
		//window.location.assign("home.php?page=transaksi_retur_penjualan");
	});

	$('#table_retur_penjualan').bootstrapTable({
		columns:[	
				{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center',
					width:40,
				}, 
				{
					/** class: 'hidden-xs', **/
					field: 'tgl_transaksi',
					title: 'TGL TRANSAKSI',
					halign:'center',
					align:'center',
					sortable:true,
					width:180,
					
				}, 
				{
					/** class: 'hidden-xs', **/
					field: 'tgl_retur',
					title: 'TGL RETUR',
					halign:'center',
					align:'center',
					sortable:true,
					width:180,
					
				}, 
				{
					field: 'no_nota',
					title: 'NO NOTA',
					halign:'center',
					align:'center',
					sortable:true,
					width:110,

					
				}, 
				{
					field: 'pelanggan',
					title: 'PELANGGAN',
					halign:'center',
					sortable:true,
					width:130,
				}, 
                {
					field: 'total_belanja',
					title: 'TOTAL BELANJA',
					halign:'center',
                    align:'right',
					width:110,
				}, 
				{
					field: 'total_retur',
					title: 'TOTAL RETUR',
					halign:'center',
                    align:'right',
					width:110,
				},
				{
					field: 'keterangan',
					title: 'KETERANGAN',
					halign:'center',
				},
				{
					field: 'Status',
					title: '<i class="glyphicon glyphicon-cog"></i>',
					halign:'center',
					align:'center',
					width:140,
					formatter: function (value, row) {
						
                        return 	[  /* 	'<button  style="margin:1px; margin-top:-5px;" class="btn btn-warning		btn-xs cetak" 		value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Cetak" ><span class="fa fa-print"></span></button>'
									+ */'<button  style="margin:1px;  margin-top:-5px;" class="btn btn-success 	btn-xs lihat" 		value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Lihat"><span class="fa fa-eye"></span></button>' 
									/* +'<button  style="margin:1px;  margin-top:-5px;" class="btn btn-info 		btn-xs edit" 		value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></button>'
									+'<button  style="margin:1px;  margin-top:-5px;" class="btn btn-danger 		btn-xs hapus" 		value="'+row.id+'" data-toggle="tooltip" data-placement="top" title="Hapus"><span class="fa fa-remove"></span></button>'  
								 */];
                      		
					}
				}
			
				]
	});



    load_data_retur_penjualan();
    function load_data_retur_penjualan(){
		
		$.ajax({
			url         : "./kelas/penjualan_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {data:'retur_penjualan_list'},
			success     : function(data) {
				
					$('#table_retur_penjualan').bootstrapTable('load',{data: data['retur_penjualan_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);
				
			},
			error: function(data){
					$('#table_retur_penjualan').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }



	$(document).on('click','.lihat',function(e){
        e.preventDefault();
        id   = $(this).val();

		window.location.assign("home.php?page=detail_transaksi_retur_penjualan&retur_penjualan_id="+id);

	});

	$(document).on('click','.edit',function(e){
        e.preventDefault();
        penjualan_id   = $(this).val();

		window.location.assign("home.php?page=edit_transaksi_penjualan&penjualan_id="+penjualan_id);

	});


	$(document).on('click','.cetak',function(e){
        e.preventDefault();
        penjualan_id   = $(this).val();

		window.open("./print_out/cetak_nota_penjualan.php?penjualan_id="+penjualan_id, "print_nota","width=900,height=800,top=50,left=250" );          

	});


	$(document).on('click','.hapus',function(e){
        e.preventDefault();
        penjualan_id   = $(this).val();

		swal({
				title: "Hapus Data Penjualan",
				/* html: "Data Absensi anda akan dikirim kepada Pejabat Penilai untuk diverifikasi<br>"
							  +"Data potongan tanpa diberikan alasan akan dianggap mangkir/alpa", */
				type: "question",
				showCancelButton: true,
				cancelButtonText: "Batal",
				confirmButtonText: "Hapus",
				confirmButtonClass: "btn btn-success",
				cancelButtonClass: "btn btn-danger",
				closeOnConfirm: false
			}).then (function(){
				$.ajax({
			url         :"./kelas/transaksi_post.php",
			type        : "POST",
			data        :{op:"hapus_transaksi_penjualan",penjualan_id:penjualan_id},
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

								load_data_penjualan();
									
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
		 
			});
		//alert(penjualan_id);
		

	});


		

});
</script>		