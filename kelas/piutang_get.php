<?php
	//header("Content-Type:application/json");
	session_start();

	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../kelas/pustaka.php';
	require_once('../config/conn_pdo.php');
	
	
	$d 	= New FormatTanggal();
	$s 	= New selisih();
		
	
	

	try {
		$data				= isset($_GET['data'])?$_GET['data']:null;
	}

	//catch exception
	catch(Exception $e) {
		$data = null;
		echo 'Message: ' .$e->getMessage();
	}	
	
switch($data){
case "piutang_list":
		
	$query = $koneksi->prepare(" SELECT 	
								a.id as nota_id,
								a.no_nota,
								a.tgl_nota,
								a.user_id,
								a.pelanggan_id,
								a.total_belanja,
								a.total_komisi,
								a.total_tambahan,
								a.bayar,
								b.nama,
								a.keterangan
								FROM penjualan a
								LEFT JOIN pelanggan b ON b.id = a.pelanggan_id
								

								WHERE a.type_bayar = '2'
								
								ORDER by a.tgl_nota DESC");
	
	$no = 0;
	$response = array();
	$response["piutang_list"] = array();

	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {


		$jumlah_belanja = (($x->total_belanja - $x->total_komisi)+$x->total_tambahan);

		
		
		//JUMLAH YANG SUDAH DIBAYAR
		$bayar = $koneksi->prepare(" SELECT sum(jumlah_bayar) as jm_bayar FROM bayar_piutang WHERE nota_id = '$x->nota_id'  ");
		$bayar->execute();
		$total_bayar  = $bayar->fetch(PDO::FETCH_OBJ);

		$sisa_piutang 	= (($x->total_belanja - $x->total_komisi)+$x->total_tambahan)-( $x->bayar + $total_bayar->jm_bayar );

		$no++;
			$h['no']				= $no;
			$h['id']				= $x->nota_id;
			$h['tgl_nota']			= $d->tgl_jam($x->tgl_nota);
			$h['no_nota']			= $x->no_nota;
			$h['pelanggan']			= $x->nama;


			$h['total_belanja']	= number_format($jumlah_belanja,'0',',','.');
			$h['total_bayar']	= number_format($x->bayar+$total_bayar->jm_bayar,'0',',','.');
			$h['sisa_piutang']		= number_format($sisa_piutang,'0',',','.');
							
			array_push($response["piutang_list"], $h);
	}	
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case"detail_piutang":

			$nota_id = $_GET['nota_id'];


			$query = $koneksi->prepare(" SELECT 	
								a.id as nota_id,
								a.no_nota,
								a.tgl_nota,
								a.user_id,
								a.pelanggan_id,
								a.total_belanja,
								a.total_komisi,
								a.total_tambahan,
								a.bayar,
								b.nama,
								a.keterangan
								FROM penjualan a
								LEFT JOIN pelanggan b ON b.id = a.pelanggan_id
								

								WHERE a.id = '$nota_id'	
								
								LIMIT 1 ");

				
			$no = 0;
			$query->execute();
			$x = $query->fetch(PDO::FETCH_OBJ);

			if ($x){
		

				$jumlah_belanja = (($x->total_belanja - $x->total_komisi)+$x->total_tambahan);
				

				//JUMLAH YANG SUDAH DIBAYAR
				$bayar = $koneksi->prepare(" SELECT sum(jumlah_bayar) as jm_bayar FROM bayar_piutang WHERE nota_id = '$x->nota_id'  ");
				$bayar->execute();
				$total_bayar  = $bayar->fetch(PDO::FETCH_OBJ);

				$sisa_piutang 	= (($x->total_belanja - $x->total_komisi)+$x->total_tambahan)-( $x->bayar + $total_bayar->jm_bayar );


				$detail_piutang = array(
							'id'			=> $x->nota_id,
							'nama'			=> $x->nama,
							'tgl_transaksi' => $d->tgl($x->tgl_nota),
							'total_belanja'	=> number_format($jumlah_belanja,'0',',','.'),
							'sisa_piutang'	=> number_format($sisa_piutang,'0',',','.'),
				);
		
			}else{
				
				$detail_piutang = array(
							'id'			=> "-",
							'nama'			=> "-",
							'tgl_transaksi'	=> "-",
							'total_belanja'	=> "-",
							'sisa_piutang'	=> "-",
				);
		
			}
			
					
			if (mysql_errno() == 0){
				echo json_encode($detail_piutang);
				header('HTTP/1.1 200 Sukses'); //if sukses
			}else{
				header('HTTP/1.1 400 error'); //if error
			}

break;
case "history_pembayaran":
		
	$nota_id = $_GET['nota_id'];
	$query = $koneksi->prepare(" SELECT 	
								a.tgl_nota,
								a.bayar,
								a.keterangan
							
								FROM penjualan a
								
								WHERE a.id = '$nota_id'
								
								ORDER by a.tgl_nota DESC");
	
	$no = 0;
	$response = array();
	$response["history_pembayaran"] = array();

	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {


		$no++;
			
			$h['tgl']		= $d->tgl($x->tgl_nota);
			$h['bayar']			= number_format($x->bayar,'0',',','.');
			$h['keterangan']	= $x->keterangan;
							
			array_push($response["history_pembayaran"], $h);
	}	


	//dari tabel bayar
	$query_2 = $koneksi->prepare(" SELECT 	
								a.tgl_bayar,
								a.jumlah_bayar,
								a.keterangan
							
								FROM bayar_piutang a
								
								WHERE a.nota_id = '$nota_id'
								
								ORDER by a.tgl_bayar ASC");
	
	
	$query_2->execute();
	
	while($x = $query_2->fetch(PDO::FETCH_OBJ)) {


		$no++;
			
			$h['tgl']			= $d->tgl($x->tgl_bayar);
			$h['bayar']			= number_format($x->jumlah_bayar,'0',',','.');
			$h['keterangan']	= $x->keterangan;
							
			array_push($response["history_pembayaran"], $h);
	}	
		  


	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
default;
header('HTTP/1.1 400 request error');
break;
}
?>