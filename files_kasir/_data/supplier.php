<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Supplier</h3>
                </div>
                <div class="box-body">

                    <div id="toolbar">
						<span  data-toggle="tooltip" title="Tambah Supplier"><a  class="btn btn-sm btn-warning add_supplier" data-toggle="modal" data-target=".add-supplier"><i class="fa fa-plus" ></i> Supplier</a></span>
					</div>
				

                    <table
						id="table_supplier"
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
	include "modals/add-supplier.php";
	include "modals/edit-supplier.php";
?>








<script>
$(document).ready(function () {


  	$('.add-supplier , .edit-supplier').on('hidden.bs.modal', function(){
		load_data_supplier();
	});
	
	
	$(document).on('click','.edit_supplier',function(e){
		
		var supplier_id = $(this).data('id');	

		$.ajax({
			url         : "./kelas/supplier_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {op:'detail_supplier', supplier_id:supplier_id},
			success     : function(data) {
				
						$('.supplier_id').val(data['id']);
						$('.nama').val(data['nama']);
						$('.tlp').val(data['no_tlp']);

						$('.alamat').val(data['alamat']);
						$('.info').html(data['info_lain']);


						$('.edit-supplier').modal('show');
			},
			error: function(data){

			}
		});
		
	});






	$('#table_supplier').bootstrapTable({
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
                            return 	[  '<span  data-toggle="tooltip" title="Edit Data supplier" style="margin:1px;" ><a class="btn btn-info btn-xs edit_supplier" data-toggle="" data-target="" data-label="'+row.nama+'" data-id="'+row.supplier_id+'"><i class="fa fa-pencil" ></i></a></span>'
									];	
					} 
				}
				
				]
	});



    load_data_supplier();
    function load_data_supplier(){
		
		$.ajax({
			url         : "./kelas/supplier_get.php",
			type        : "GET",
			dataType    : "json",
			data        : {op:'supplier_tbl_list'},
			success     : function(data) {
				
					$('#table_supplier').bootstrapTable('load',{data: data['supplier_list'] });
					$('[data-toggle="tooltip"]').tooltip();
					$('.fixed-table-loading').fadeOut(100);
				
			},
			error: function(data){
					$('#table_supplier').bootstrapTable('removeAll');
					$('.fixed-table-loading').fadeOut(100);
					$('[data-toggle="tooltip"]').tooltip();
				
			}
		});
    }



});
</script>		