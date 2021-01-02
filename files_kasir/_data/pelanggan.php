<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Pelanggan</h3>
                </div>
                <div class="box-body">

                    <div id="toolbar">
						<span  data-toggle="tooltip" title="Tambah Pelanggan"><a  class="btn btn-sm btn-warning add_pelanggan" data-toggle="modal" data-target=".add-pelanggan"><i class="fa fa-plus" ></i> Pelanggan</a></span>
					</div>
				

                    <table
						id="table_pelanggan"
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





<?php
	include "modals/add-pelanggan.php";
	include "modals/edit-pelanggan.php";
?>








<script>
$(document).ready(function () {


  	$('.add-pelanggan , .edit-pelanggan').on('hidden.bs.modal', function(){
		load_data_pelanggan();
	});
	
	
	$(document).on('click','.edit_pelanggan',function(e){
		
		var pelanggan_id = $(this).data('id');	

		$.ajax({
			url         : "./kelas/pelanggan_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {op:'detail_pelanggan', pelanggan_id:pelanggan_id},
			success     : function(data) {
				
						$('.pelanggan_id').val(data['id']);
						$('.nama').val(data['nama']);
						$('.tlp').val(data['no_tlp']);

						$('.alamat').val(data['alamat']);
						$('.info').html(data['info_lain']);


						$('.edit-pelanggan').modal('show');
			},
			error: function(data){

			}
		});
		
	});






	$('#table_pelanggan').bootstrapTable({
		columns:[	
				{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center'
				}, 
				{
					/** class: 'hidden-xs', **/
					field: 'nama',
					title: 'NAMA',
					halign:'center',
					sortable:true
					
				}, 
				{
					field: 'no_tlp',
					title: 'NO TLP',
					halign:'center',
					align:'center',

					
				}, 
				{
					field: 'alamat',
					title: 'ALAMAT',
					halign:'center',
					sortable:true
				}, 
                {
					field: 'keterangan',
					title: 'KETERANGAN',
					halign:'center',
				},
				{
					field: '',
					title: '<i class="glyphicon glyphicon-cog"></i>',
					halign:'center',
					align:'center',
					width:80,
					formatter: function (value, row) {
                            return 	[  '<span  data-toggle="tooltip" title="Edit Data Pelanggan" style="margin:1px;" ><a class="btn btn-info btn-xs edit_pelanggan" data-toggle="" data-target="" data-label="'+row.nama+'" data-id="'+row.pelanggan_id+'"><i class="fa fa-pencil" ></i></a></span>'
									];	
					} 
				}
				
				]
	});



    load_data_pelanggan();
    function load_data_pelanggan(){
		
		$.ajax({
			url         : "./kelas/pelanggan_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {op:'pelanggan_tbl_list'},
			success     : function(data) {
				
					$('#table_pelanggan').bootstrapTable('load',{data: data['pelanggan_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);
				
			},
			error: function(data){
					$('#table_pelanggan').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }



});
</script>		