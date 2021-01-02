<section class="content">
  <div class="col-md-6">
    <div class="row">
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow transaksi_penjualan" style="cursor:pointer;">
            <div class="inner">
            <h3><span class="total_transaksi_penjualan_today">*</span></h3>
            <p>TRANSAKSI PENJUALAN</p>
          </div>
        <div class="icon">
          <i class="ion ion-android-cart"></i>
        </div>
          <a href="./home.php?page=dashboard&chart=1" class="small-box-footer">Transaksi hari ini <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!---   -->
      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua penjualan" style="cursor:pointer;">
            <div class="inner">
              <h3><span class="total_transaksi_penjualan">*</span></h3>
              <p>DATA PENJUALAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-filing"></i>
            </div>
            <a href="./home.php?page=dashboard&chart=2" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

  </div>
  <div class="row">
        <!-- col end -->

        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green transaksi_pembelian" style="cursor:pointer;">
            <div class="inner">
            <h3><span class="total_transaksi_pembelian_today">*</span></h3>

              <p>TRANSAKSI PEMBELIAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- col end -->

         <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow pembelian" style="cursor:pointer;">
            <div class="inner">
              <h3><span class="total_transaksi_pembelian">*</span></h3>
              <p> DATA PEMBELIAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-filing"></i>
            </div>
              <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua pelanggan" style="cursor:pointer;">
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
    </div>
  
  </div>

  <div class="col-md-6">


    <?php 
      $chart = isset($_GET['chart']) ? $_GET['chart'] : '';


      switch($chart)
					{
				case 1 : $chart_show='./chart/penjualan_today.php';
						break;
				case 2 : $chart_show='./chart/penjualan_all.php';
						break;
				case 3 : $chart_show='./chart/stok_beras.php';
						break;
				case 4 : $chart_show='./chart/stok_beras.php';
						break;
				case 5 : $chart_show='./chart/stok_beras.php';
						break;
				case 6 : $chart_show='./chart/stok_beras.php';
						break;
				default : $chart_show='./chart/penjualan_today.php';;
					}

			include $chart_show;
     
       
    ?>
    
     
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


	
});
</script>		