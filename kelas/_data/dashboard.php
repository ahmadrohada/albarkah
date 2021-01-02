<?php
	//header("Content-Type:application/json");
	session_start();

	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../kelas/pustaka.php';
	require_once('../config/conn_pdo.php');
	$tgl_now = date('Y'."-".'m'."-".'d');
	
	$d 		= New FormatTanggal();
	$n 		= New Nota();
	$s 		= New selisih();
		
	
$op				= isset($_GET['op'])?$_GET['op']:null;

switch($op){
case"dashboard_detail":

	$response["dashboard"] = array();

	//==========JUMLAH TRANSAKSI PENJUALAN HARI INI =============//
	$ttpt = $koneksi->prepare(" SELECT 	count(id) as jm FROM penjualan WHERE  date(created_at) ='$tgl_now' ");
	$ttpt->execute();
	$total_transaksi_penjualan_today  = $ttpt->fetch(PDO::FETCH_OBJ);
	
    $h['total_transaksi_penjualan_today']	    = $total_transaksi_penjualan_today->jm;

	
	//==========  JUMLAH TRANSAKSI PENJUALAN ALL  =============//
	$ttp = $koneksi->prepare(" SELECT 	count(id) as jm FROM penjualan ");
	$ttp->execute();
	$total_transaksi_penjualan  = $ttp->fetch(PDO::FETCH_OBJ);
	
	$h['total_transaksi_penjualan']	    = $total_transaksi_penjualan->jm;
	

	//==========JUMLAH PEMBELIAN PENJUALAN HARI INI =============//
	$ttpj = $koneksi->prepare(" SELECT 	count(id) as jm FROM pembelian WHERE  date(created_at) ='$tgl_now' ");
	$ttpj->execute();
	$total_transaksi_pembelian_today  = $ttpj->fetch(PDO::FETCH_OBJ);
	
    $h['total_transaksi_pembelian_today']	    = $total_transaksi_pembelian_today->jm;

	
	//==========  JUMLAH TRANSAKSI PENJUALAN ALL  =============//
	$tpj = $koneksi->prepare(" SELECT 	count(id) as jm FROM pembelian ");
	$tpj->execute();
	$total_transaksi_pembelian  = $tpj->fetch(PDO::FETCH_OBJ);
	
    $h['total_transaksi_pembelian']	    = $total_transaksi_pembelian->jm;

	//=========== S T O K Beras ===============//
	//pembelian 
	$stok    = '*';

	//======  PELANGGAN ===============//
	$pl = $koneksi->prepare(" SELECT 	count(id) as jm FROM pelanggan");
	$pl->execute();
	$jm_pelanggan  = $pl->fetch(PDO::FETCH_OBJ);
	
	$h['jm_pelanggan']	    = $jm_pelanggan->jm;
	
	//======  SUPPLIER ===============//
	$pl = $koneksi->prepare(" SELECT 	count(id) as jm FROM supplier");
	$pl->execute();
	$jm_supplier  = $pl->fetch(PDO::FETCH_OBJ);
	
    $h['jm_supplier']	    = $jm_supplier->jm;

	//==========  JUMLAH PIUTANG  =============//
	$piutang = $koneksi->prepare(" SELECT 	count(id) as jm FROM penjualan WHERE type_bayar = '2' ");
	$piutang->execute();
	$total_piutang  = $piutang->fetch(PDO::FETCH_OBJ);
	
	$h['jm_piutang']	    = $total_piutang->jm;

	//==========  JUMLAH HUTANG  =============//
	$hutang = $koneksi->prepare(" SELECT 	count(id) as jm FROM pembelian WHERE type_bayar = '2' ");
	$hutang->execute();
	$total_hutang  = $hutang->fetch(PDO::FETCH_OBJ);
	
	$h['jm_hutang']	    = $total_hutang->jm;
	
	array_push($response["dashboard"], $h);
	if (mysql_errno() == 0){
		header('HTTP/1.1 200 Sukses'); //if sukses
		echo json_encode($response);
				
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case"stok_beras":

	$query = $koneksi->prepare(" SELECT 	
							a.id as jenis_beras_id,
							a.label

							FROM jenis_beras a
							ORDER by a.id DESC");

							$no = 0;
							$response = array();
							$response["stok_beras"] = array();
							$total = 0;
							$query->execute();

			while($x = $query->fetch(PDO::FETCH_OBJ)) {

					$stok_beras = $koneksi->prepare(" SELECT * , SUM(qty_stok) AS stok FROM stok_beras WHERE jenis_beras_id = '$x->jenis_beras_id'   ");
					$stok_beras->execute();
					$z  = $stok_beras->fetch(PDO::FETCH_OBJ);

					$stok_beras = ( $z ? $z->stok : 0 );

					$no++;
					$h['no']				= $no;
					$h['jenis_beras']	= $x->label;
					$h['jumlah']	    = $stok_beras;
						
					array_push($response["stok_beras"], $h);

			}	

			

			
                
         


			if (mysql_errno() == 0){
				header('HTTP/1.1 200 Sukses'); //if sukses
				echo json_encode($response);
				
			}else{
				header('HTTP/1.1 400 error'); //if error
			}

break;
case"chart_penjualan_today":

		$query = $koneksi->prepare(" SELECT 	
								        a.id as jenis_beras_id,
								        a.label
								        FROM jenis_beras a

								        ORDER by a.label ASC ");

				
            $no = 0;
            $response["jenis_beras"] = array();
			$query->execute();
			while($x = $query->fetch(PDO::FETCH_OBJ)) {

				//cari jumlah kg nya dalam transaksi
				
                $stok_out_query = $koneksi->prepare(" SELECT sum(qty) AS jm FROM item_transaksi WHERE jenis_beras_id = '$x->jenis_beras_id' and date(created_at) ='$tgl_now' ");
				$stok_out_query->execute();
				$stok_total_out  = $stok_out_query->fetch(PDO::FETCH_OBJ);

                $h['jenis_beras']	= $x->label;
                $h['jumlah']	    = $stok_total_out->jm;

                array_push($response["jenis_beras"], $h);
			}	
                
         


			if (mysql_errno() == 0){
				header('HTTP/1.1 200 Sukses'); //if sukses
				echo json_encode($response);
				
			}else{
				header('HTTP/1.1 400 error'); //if error
			}

break;

case"chart_penjualan_setahun":

	$no = 0;
    $response["penjualan_all"] = array();
	


	$warna = [ "white","#FF0F00","#FF6600","#FF9E01","#FCD202","#F8FF01","#B0DE09","#04D215","#0D8ECF","#0D52D1","#2A0CD0","#8A0CCF","#CD0D74"];
	$thn = date('Y');

	for ( $i=1 ; $i <= 12 ; $i++) {

		$bulan = $i;

		$total_penjualan = $koneksi->prepare(" SELECT sum(id) AS jm FROM penjualan WHERE MONTH(created_at) = '$bulan' AND YEAR(created_at) = '$thn' ");
		$total_penjualan->execute();
		$total_out  = $total_penjualan->fetch(PDO::FETCH_OBJ);

				$h['bulan']	    			= $d->bulan($bulan);
				$h['total_penjualan']	    = $total_out->jm;
				$h['color']	    			= $warna[$i];

                array_push($response["penjualan_all"], $h );
	}	
                
         


			if (mysql_errno() == 0){
				header('HTTP/1.1 200 Sukses'); //if sukses
				echo json_encode($response);
				
			}else{
				header('HTTP/1.1 400 error'); //if error
			}

break;
}
?>