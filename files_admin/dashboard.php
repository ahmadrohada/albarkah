<section class="content">
  <div class="col-md-6">
    <div class="row">
      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua penjualan" style="cursor:pointer;">
            <div class="inner">
              <h3><span class="total_transaksi_penjualan">*</span></h3>
              <p>TRANSAKSI PENJUALAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
            <a href="./home.php?page=dashboard&chart=2" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow pembelian" style="cursor:pointer;">
            <div class="inner">
              <h3><span class="total_transaksi_pembelian">*</span></h3>
              <p> TRANSAKSI PEMBELIAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
              <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  </div>

<div class="row">
      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green piutang" style="cursor:pointer;">
            <div class="inner">
              <h3><span class="jm_piutang">*</span></h3>
              <p> PIUTANG</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-undo"></i>
            </div>
            <a href="./home.php?page=dashboard&chart=2" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue hutang" style="cursor:pointer;">
            <div class="inner">
              <h3><span class="jm_hutang">*</span></h3>
              <p> HUTANG</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-redo"></i>
            </div>
              <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple pelanggan" style="cursor:pointer;">
            <div class="inner">
             <h3><span class="jm_pelanggan">*</span></h3>

              <p>PELANGGAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-people"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red supplier" style="cursor:pointer;">
            <div class="inner">
              <h3><span class="jm_supplier">*</span></h3>

              <p>SUPPLIER</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-people"></i>
            </div>
            <a href="./home.php?page=dashboard&chart=6" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  </div>  
  <div class="row">
          <div class="col-lg-6 col-xs-6 stok" style="cursor:pointer;">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><span class="">*</span></h3>

                <p>STOK ( Kg )</p>
              </div>
              <div class="icon">
                <i class="ion ion-archive"></i>
              </div>
              <a href="./home.php?page=dashboard&chart=6" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-xs-6 retur_penjualan" style="cursor:pointer;">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><span class="">*</span></h3>

                <p>RETUR PENJUALAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-return-left"></i>
              </div>
              <a href="" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
  </div>

  
  <div class="row">
          <div class="col-lg-6 col-xs-6 retur_pembelian" style="cursor:pointer;">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><span class="">*</span></h3>

                <p>RETUR PEMBELIAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-archive"></i>
              </div>
              <a href="" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

         
  </div>
  
  </div>

  <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">GRAPH PD MUSTIKA DEWI</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        DATA PENJUALAN
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                      <?php  include './chart/penjualan_all.php'; ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        STOK BERAS
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                      <?php  include './chart/stok_beras.php'; ?>
                    </div>
                  </div>
                </div>
                
                  
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

    
    
     
  </div>
</section>




<script>
$(document).ready(function () {
	//alert();

  $.ajax({
    url     : "./kelas/dashboard.php",
    type    : "GET",
    dataType: "json",
    data    : { op  : "dashboard_detail"},
    success: function (data) {
            $(".total_transaksi_penjualan_today").html(data['dashboard'][0]['total_transaksi_penjualan_today']);
            $(".total_transaksi_penjualan").html(data['dashboard'][0]['total_transaksi_penjualan']);
            $(".total_transaksi_pembelian_today").html(data['dashboard'][0]['total_transaksi_pembelian_today']);
            $(".total_transaksi_pembelian").html(data['dashboard'][0]['total_transaksi_pembelian']);
            $(".jm_supplier").html(data['dashboard'][0]['jm_supplier']);
            $(".jm_pelanggan").html(data['dashboard'][0]['jm_pelanggan']);

            $(".jm_piutang").html(data['dashboard'][0]['jm_piutang']);
            $(".jm_hutang").html(data['dashboard'][0]['jm_hutang']);


            },
            error: function (data) {
                
            }

  }); 


  $(document).on('click','.penjualan',function(e){
		window.location.assign("home.php?page=penjualan");
	});

  $(document).on('click','.transaksi_penjualan',function(e){
		window.location.assign("home.php?page=transaksi_penjualan");
	});

  $(document).on('click','.piutang',function(e){
		window.location.assign("home.php?page=piutang");
	});

  $(document).on('click','.hutang',function(e){
		window.location.assign("home.php?page=hutang");
	});


  $(document).on('click','.pelanggan',function(e){
		window.location.assign("home.php?page=pelanggan");
	});

  $(document).on('click','.transaksi_pembelian',function(e){
		window.location.assign("home.php?page=transaksi_pembelian");
	});

  $(document).on('click','.pembelian',function(e){
		window.location.assign("home.php?page=pembelian");
	});

  $(document).on('click','.supplier',function(e){
		window.location.assign("home.php?page=supplier");
	});


  $(document).on('click','.stok',function(e){
		window.location.assign("home.php?page=stok");
	});


  $(document).on('click','.retur_penjualan',function(e){
		window.location.assign("home.php?page=retur_penjualan");
	});

  
  $(document).on('click','.retur_pembelian',function(e){
		window.location.assign("home.php?page=retur_pembelian");
	});


	
});
</script>		