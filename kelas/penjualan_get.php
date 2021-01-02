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
case "penjualan_list":
		
	$query = $koneksi->prepare(" SELECT 	
								a.id as nota_id,
								a.no_nota,
								a.tgl_nota,
								a.user_id,
								a.pelanggan_id,
								a.total_belanja,
								a.total_diskon,
								a.bayar,
								a.type_bayar,
								b.nama,
								a.keterangan
								FROM penjualan a
								LEFT JOIN pelanggan b ON b.id = a.pelanggan_id
								
								ORDER by a.tgl_nota DESC");
	
	$no = 0;
	$response = array();
	$response["penjualan_list"] = array();

	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

		//cari data pembayaran
		$query_bayar = $koneksi->prepare(" SELECT SUM(jumlah_bayar) as bayar FROM bayar_piutang WHERE nota_id = '$x->nota_id' ");
		$query_bayar->execute();
		$byr = $query_bayar->fetch(PDO::FETCH_OBJ);

		if ( $byr ){
			$bayar_x = $byr->bayar;
		}else{
			$bayar_x = 0;
		}

		switch($x->type_bayar)
			{
			case 1 : $type = 'Cash';
				break;
			case 2 : $type = 'Hutang';
				break;
			}
	
		$keterangan = $x->keterangan;
		if ( $type == 'Hutang'){
			$sisa = (($x->total_belanja - $x->total_diskon)+$x->total_tambahan - $x->total_pengurangan )- ($x->bayar+$bayar_x);

			if ( $sisa == 0 ) {
				$type = "Lunas";
				$keterangan = "-";
			}

		}else{
			$sisa = 0;
		}
		

			$no++;
			$h['no']				= $no;
			$h['id']				= $x->nota_id;
			$h['tgl_nota']			= $d->tgl_jam($x->tgl_nota);
			$h['no_nota']			= $x->no_nota;
			$h['pelanggan']			= $x->nama;


			$h['total_belanja']		= number_format($x->total_belanja,'0',',','.');
			$h['total_diskon']		= number_format($x->total_diskon,'0',',','.');
			$h['bayar']				= number_format($x->bayar,'0',',','.');
			$h['type_bayar']		= $type;
			$h['sisa']				= number_format($sisa,'0',',','.');
			$h['keterangan']		= $keterangan;
							
			array_push($response["penjualan_list"], $h);
	}	
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "tmp_penjualan_list":
		

	$no = 0;
	$response = array();
	$response["tmp_penjualan_list"] = array();
	$response["detail_penjualan_list"] = array();
	$total					= 0;
	$total_diskon			= 0;

	$query = $koneksi->prepare(" SELECT 	
									a.id,
									a.harga_jual,
									a.quantity,
									a.diskon,
									b.nama_barang,
									b.merk,
									b.spesifikasi,
									b.satuan

									FROM tmp_transaksi a
									LEFT JOIN barang b ON b.id = a.id_barang

									WHERE jenis_transaksi = 'penjualan'

									ORDER by a.id ASC");

	

	$query->execute();

	while($x = $query->fetch(PDO::FETCH_OBJ)) {
			
			$jumlah	 		= $x->quantity*( $x->harga_jual - $x->diskon )  ;

			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['nama_barang']	= $x->nama_barang.' '.$x->merk.' '.$x->spesifikasi;
			$h['satuan']		= $x->satuan;
			$h['quantity']		= $x->quantity;
			$h['diskon']		= number_format($x->diskon,'0',',','.');
			$h['harga_jual']	= number_format($x->harga_jual,'0',',','.');
			$h['diskon']		= number_format($x->diskon,'0',',','.');
			
			$h['jumlah']		= number_format($jumlah,'0',',','.');
							
			array_push($response["tmp_penjualan_list"], $h);

			$total				= $total + $jumlah;
			$total_diskon		= $total_diskon + $x->diskon;
			
	}	

	$gt['total']				= number_format($total,'0',',','.');
	$gt['total_diskon']			= number_format($total_diskon,'0',',','.');


	array_push($response["detail_penjualan_list"], $gt);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "tmp_tambahan_list":
		

	$no = 0;
	$response = array();
	$response["tmp_tambahan_list"] = array();
	$response["detail_tambahan_list"] = array();
	$total_tambahan	= 0;

	$query = $koneksi->prepare(" SELECT 	
									a.id,
									a.no_nota,
									a.item_tambahan,
									a.qty,
									a.harga_satuan

									FROM tmp_tambahan a
									ORDER by a.id ASC");

	

	$query->execute();

	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			/* if ( $x->discount > 0 ){
				$diskon   = ($x->discount/100)*$x->harga;
				$jumlah		= ($x->harga-$diskon)*$x->qty;
			}else{
				$jumlah		= $x->harga*$x->qty;
			} */
			
			$jumlah	 		= $x->qty*$x->harga_satuan  ;

			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['item_tambahan']	= $x->item_tambahan;
			$h['qty']			= $x->qty;
			$h['harga_satuan']	= number_format($x->harga_satuan,'0',',','.');
			$h['jumlah']		= number_format($jumlah,'0',',','.');
			

			array_push($response["tmp_tambahan_list"], $h);

			$total_tambahan	= $total_tambahan + $jumlah;
			
	}	



	$gt['total_tambahan']				= number_format($total_tambahan,'0',',','.');


	array_push($response["detail_tambahan_list"], $gt);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "tmp_tambahan_list_beli":
		

	$no = 0;
	$response = array();
	$response["tmp_tambahan_list"] = array();
	$response["detail_tambahan_list"] = array();
	$total_tambahan	= 0;

	$query = $koneksi->prepare(" SELECT 	
									a.id,
									a.no_nota,
									a.item_tambahan,
									a.qty,
									a.harga_satuan

									FROM tmp_tambahan_beli a
									ORDER by a.id ASC");

	

	$query->execute();

	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			/* if ( $x->discount > 0 ){
				$diskon   = ($x->discount/100)*$x->harga;
				$jumlah		= ($x->harga-$diskon)*$x->qty;
			}else{
				$jumlah		= $x->harga*$x->qty;
			} */
			
			$jumlah	 		= $x->qty*$x->harga_satuan  ;

			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['item_tambahan']	= $x->item_tambahan;
			$h['qty']			= $x->qty;
			$h['harga_satuan']	= number_format($x->harga_satuan,'0',',','.');
			$h['jumlah']		= number_format($jumlah,'0',',','.');
			

			array_push($response["tmp_tambahan_list"], $h);

			$total_tambahan	= $total_tambahan + $jumlah;
			
	}	



	$gt['total_tambahan']				= number_format($total_tambahan,'0',',','.');


	array_push($response["detail_tambahan_list"], $gt);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "tmp_pengurangan_list":
		

	$no = 0;
	$response = array();
	$response["tmp_pengurangan_list"] = array();
	$response["detail_pengurangan_list"] = array();
	$total_pengurangan	= 0;

	$query = $koneksi->prepare(" SELECT 	
									a.id,
									a.no_nota,
									a.item_pengurangan,
									a.qty,
									a.harga_satuan

									FROM tmp_pengurangan a
									ORDER by a.id ASC");

	

	$query->execute();

	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			/* if ( $x->discount > 0 ){
				$diskon   = ($x->discount/100)*$x->harga;
				$jumlah		= ($x->harga-$diskon)*$x->qty;
			}else{
				$jumlah		= $x->harga*$x->qty;
			} */
			
			$jumlah	 		= $x->qty*$x->harga_satuan  ;

			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['item_pengurangan']	= $x->item_pengurangan;
			$h['qty']			= $x->qty;
			$h['harga_satuan']	= number_format($x->harga_satuan,'0',',','.');
			$h['jumlah']		= number_format($jumlah,'0',',','.');
			

			array_push($response["tmp_pengurangan_list"], $h);

			$total_pengurangan	= $total_pengurangan + $jumlah;
			
	}	



	$gt['total_pengurangan']				= number_format($total_pengurangan,'0',',','.');


	array_push($response["detail_pengurangan_list"], $gt);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "tmp_pengurangan_list_beli":
		

	$no = 0;
	$response = array();
	$response["tmp_pengurangan_list"] = array();
	$response["detail_pengurangan_list"] = array();
	$total_pengurangan	= 0;

	$query = $koneksi->prepare(" SELECT 	
									a.id,
									a.no_nota,
									a.item_pengurangan,
									a.qty,
									a.harga_satuan

									FROM tmp_pengurangan_beli a
									ORDER by a.id ASC");

	

	$query->execute();

	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			/* if ( $x->discount > 0 ){
				$diskon   = ($x->discount/100)*$x->harga;
				$jumlah		= ($x->harga-$diskon)*$x->qty;
			}else{
				$jumlah		= $x->harga*$x->qty;
			} */
			
			$jumlah	 		= $x->qty*$x->harga_satuan  ;

			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['item_pengurangan']	= $x->item_pengurangan;
			$h['qty']			= $x->qty;
			$h['harga_satuan']	= number_format($x->harga_satuan,'0',',','.');
			$h['jumlah']		= number_format($jumlah,'0',',','.');
			

			array_push($response["tmp_pengurangan_list"], $h);

			$total_pengurangan	= $total_pengurangan + $jumlah;
			
	}	



	$gt['total_pengurangan']				= number_format($total_pengurangan,'0',',','.');


	array_push($response["detail_pengurangan_list"], $gt);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "transaksi_penjualan_list_item":


	$no_nota =  $_GET['no_nota'];
	$query = $koneksi->prepare(" SELECT 	
								a.*,
								b.label AS jenis_beras

								FROM item_transaksi a
								LEFT JOIN jenis_beras b ON b.id = a.jenis_beras_id
								
								WHERE a.no_nota = '$no_nota' AND a.jenis_transaksi = 'penjualan'
								ORDER by a.id ASC");
	
	$no = 0;
	$response = array();
	$response["tmp_penjualan_list"] = array();
	$response["detail_penjualan_list"] = array();
	$total					= 0;
	$total_diskon			= 0;
	$total_retur			= 0;
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			

			$jumlah	 		= $x->qty*$x->tonase*$x->harga  ;
			$komisi 		= $x->qty*$x->tonase*$x->komisi ;
			$jumlah_retur 	= $x->retur*$x->tonase*$x->harga ;

			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['nama_karung']	= $x->nama_karung;
			$h['jenis_beras']	= $x->jenis_beras;
			$h['qty']			= $x->qty;
			$h['tonase']		= $d->tonase($x->tonase);
			$h['harga']			= number_format($x->harga,'0',',','.');
			$h['retur']			= $x->retur;
			$h['jumlah']		= number_format($jumlah,'0',',','.');
			$h['jumlah_retur']	= number_format($jumlah_retur,'0',',','.');
							
							
			array_push($response["tmp_penjualan_list"], $h);

			$total				= $total + $jumlah;
			$total_diskon		= $total_diskon + $komisi;
			$total_retur		= $total_retur + $jumlah_retur;
	}	



	$gt['total']				= number_format($total,'0',',','.');

	$gt['total_diskon']			= number_format($total_diskon,'0',',','.');
	$gt['total_retur']			= number_format($total_retur,'0',',','.');


	array_push($response["detail_penjualan_list"], $gt);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "transaksi_retur_penjualan_list_item":


	$no_nota =  $_GET['no_nota'];
	$query = $koneksi->prepare(" SELECT 	
								a.*,
								b.label AS jenis_beras

								FROM item_transaksi a
								LEFT JOIN jenis_beras b ON b.id = a.jenis_beras_id
								
								WHERE a.no_nota = '$no_nota' AND a.retur > 0
								ORDER by a.id ASC");
	
	$no = 0;
	$response = array();
	$response["retur_penjualan_list"] = array();
	$response["detail_penjualan_list"] = array();
	$total					= 0;
	$total_diskon			= 0;
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			/* if ( $x->discount > 0 ){
				$diskon   = ($x->discount/100)*$x->harga;
				$jumlah		= ($x->harga-$diskon)*$x->outcome;
			}else{
				$jumlah		= $x->harga*$x->outcome;
			} */

			$jumlah	 		= $x->retur*$x->tonase*$x->harga  ;
		
			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['nama_karung']	= $x->nama_karung;
			$h['jenis_beras']	= $x->jenis_beras;
			$h['qty']			= $x->retur;
			$h['tonase']		= $d->tonase($x->tonase);
			$h['harga']			= number_format($x->harga,'0',',','.');
			
			$h['jumlah']		= number_format($jumlah,'0',',','.');
							
							
			array_push($response["retur_penjualan_list"], $h);
	}	


		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case"detail_transaksi_penjualan":

	$penjualan_id = $_GET['penjualan_id'];
	$query = $koneksi->prepare(" SELECT 	
								a.id as penjualan_id,
								a.no_nota,
								a.tgl_nota,
								a.type_bayar,
								a.total_belanja,
								a.total_diskon,
								a.total_tambahan,
								a.total_pengurangan,
								a.bayar,
								a.keterangan,
								b.nama as nama_pelanggan,
								b.no_tlp,
								b.alamat,
								c.nama as nama_user,
								d.id AS retur_id,
								d.keterangan AS keterangan_retur

								
								FROM penjualan a 
								LEFT JOIN pelanggan b ON b.id = a.pelanggan_id
								LEFT JOIN users c ON c.id = a.user_id
								LEFT JOIN retur_penjualan d ON d.no_nota = a.no_nota


								WHERE a.id = 	'$penjualan_id'	
								
								
								LIMIT 1 ");


		
	$query->execute();
	$x = $query->fetch(PDO::FETCH_OBJ);

	if ($x){
		
		if ( $x->retur_id != null ){
			$status_retur = 1 ;
		}else{
			$status_retur = 0 ;
		}

		//cari data pembayaran
		$query_bayar = $koneksi->prepare(" SELECT SUM(jumlah_bayar) as bayar FROM bayar_piutang WHERE nota_id = '$x->penjualan_id' ");
		$query_bayar->execute();
		$byr = $query_bayar->fetch(PDO::FETCH_OBJ);

		if ( $byr ){
			$bayar_x = $byr->bayar +  $x->bayar;
		}else{
			$bayar_x = $x->bayar;
		}

		$total_bayar = ($x->total_belanja-$x->total_diskon)+$x->total_tambahan - $x->total_pengurangan;
		$kembali 	 = $bayar_x - $total_bayar;

		$detail_penjualan = array(
					'no_nota'		=> $x->no_nota,
					'tgl_nota'		=> $d->tgl($x->tgl_nota),
					'jam'			=> $d->jam($x->tgl_nota),
					'nama_pelanggan'=> $x->nama_pelanggan,
					'no_tlp'		=> $x->no_tlp,
					'status'		=> $x->type_bayar,
					'nama_user'		=> $x->nama_user,
					'total_belanja'	=> number_format($x->total_belanja,'0',',','.'),
					'total_diskon'	=> number_format($x->total_diskon,'0',',','.'),
					'total_tambahan'=> number_format($x->total_tambahan,'0',',','.'),
					'total_pengurangan'=> number_format($x->total_pengurangan,'0',',','.'),
					'total_bayar'   => number_format($total_bayar,'0',',','.'),
					'bayar'			=> number_format($bayar_x,'0',',','.'),
					'kembali'		=> number_format($kembali,'0',',','.'),
					'sisa'		    => number_format(str_replace('-','',$kembali),'0',',','.'),
					
					'keterangan'	=> $x->keterangan,
					'keterangan_retur'	=> $x->keterangan_retur,


					'status_retur'	=> $status_retur,

		);

	}else{
		
		$detail_penjualan = array(
			'no_nota'		=> "",
			'tgl_nota'		=> "",
			'jam'			=> "",
			'nama_pelanggan'=> "",
			'no_tlp'		=> "",
			'status'		=> "",
			'nama_user'		=> "",
			'grand_total'	=> "",
			'bayar'			=> "",
			'komisi'		=> "",
			'keterangan'	=> "",
			'sisa'			=> "",
			'kembali'		=> "",
			'besar_komisi'	=> ""
		);

	}
	
				
	if (mysql_errno() == 0){
		header('HTTP/1.1 200 Sukses'); //if sukses
		echo json_encode($detail_penjualan);
				
	}else{
				header('HTTP/1.1 400 error'); //if error
	}

break;
case "transaksi_tambahan_list_item":


	$no_nota =  $_GET['no_nota'];
	$query = $koneksi->prepare(" SELECT 	
								a.*
								FROM item_tambahan a
								
								WHERE a.no_nota = '$no_nota'
								ORDER by a.id ASC");
	
	$no = 0;
	$response = array();
	$response["tmp_tambahan_list"] = array();
	$response["tmp_tambahan_detail"] = array();
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			
			$no++;
			$h['no']			= $no;
			$h['item_tambahan']	= $x->item_tambahan;
			$h['qty']			= $x->qty;
			$h['harga_satuan']	= number_format($x->harga_satuan,'0',',','.');
			$h['qty']			= $x->qty;
			$h['jumlah']		= number_format($x->harga_satuan*$x->qty,'0',',','.');
							
							
			array_push($response["tmp_tambahan_list"], $h);
	}	

			if ( $no > 0){
				$x['data_table'] = 'show';
			}else{
				$x['data_table'] = 'hide';
			}
			array_push($response["tmp_tambahan_detail"], $x);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "transaksi_tambahan_list_item_beli":


	$no_nota =  $_GET['no_nota'];
	$query = $koneksi->prepare(" SELECT 	
								a.*
								FROM item_tambahan_beli a
								
								WHERE a.no_nota = '$no_nota'
								ORDER by a.id ASC");
	
	$no = 0;
	$response = array();
	$response["tmp_tambahan_list"] = array();
	$response["tmp_tambahan_detail"] = array();
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			
			$no++;
			$h['no']			= $no;
			$h['item_tambahan']	= $x->item_tambahan;
			$h['qty']			= $x->qty;
			$h['harga_satuan']	= number_format($x->harga_satuan,'0',',','.');
			$h['qty']			= $x->qty;
			$h['jumlah']		= number_format($x->harga_satuan*$x->qty,'0',',','.');
							
							
			array_push($response["tmp_tambahan_list"], $h);
	}	

			if ( $no > 0){
				$x['data_table'] = 'show';
			}else{
				$x['data_table'] = 'hide';
			}
			array_push($response["tmp_tambahan_detail"], $x);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "transaksi_pengurangan_list_item":


	$no_nota =  $_GET['no_nota'];
	$query = $koneksi->prepare(" SELECT 	
								a.*
								FROM item_pengurangan a
								
								WHERE a.no_nota = '$no_nota'
								ORDER by a.id ASC");
	
	$no = 0;
	$response = array();
	$response["tmp_pengurangan_list"] = array();
	$response["tmp_pengurangan_detail"] = array();
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			
			$no++;
			$h['no']			= $no;
			$h['item_pengurangan']	= $x->item_pengurangan;
			$h['qty']			= $x->qty;
			$h['harga_satuan']	= number_format($x->harga_satuan,'0',',','.');
			$h['qty']			= $x->qty;
			$h['jumlah']		= number_format($x->harga_satuan*$x->qty,'0',',','.');
							
							
			array_push($response["tmp_pengurangan_list"], $h);
	}	

			if ( $no > 0){
				$x['data_table'] = 'show';
			}else{
				$x['data_table'] = 'hide';
			}
			array_push($response["tmp_pengurangan_detail"], $x);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "transaksi_pengurangan_list_item_beli":


	$no_nota =  $_GET['no_nota'];
	$query = $koneksi->prepare(" SELECT 	
								a.*
								FROM item_pengurangan_beli a
								
								WHERE a.no_nota = '$no_nota'
								ORDER by a.id ASC");
	
	$no = 0;
	$response = array();
	$response["tmp_pengurangan_list"] = array();
	$response["tmp_pengurangan_detail"] = array();
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			
			$no++;
			$h['no']			= $no;
			$h['item_pengurangan']	= $x->item_pengurangan;
			$h['qty']			= $x->qty;
			$h['harga_satuan']	= number_format($x->harga_satuan,'0',',','.');
			$h['qty']			= $x->qty;
			$h['jumlah']		= number_format($x->harga_satuan*$x->qty,'0',',','.');
							
							
			array_push($response["tmp_pengurangan_list"], $h);
	}	

			if ( $no > 0){
				$x['data_table'] = 'show';
			}else{
				$x['data_table'] = 'hide';
			}
			array_push($response["tmp_pengurangan_detail"], $x);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "retur_penjualan_list":
		
	$query = $koneksi->prepare(" SELECT 	
								a.id as retur_penjualan_id,
								a.no_nota,
								a.total_retur,
								a.created_at AS tgl_retur,
								a.keterangan,
								b.tgl_nota,
								b.user_id,
								b.pelanggan_id,
								b.total_belanja,
								c.nama

								FROM retur_penjualan a
								LEFT JOIN penjualan b ON b.no_nota = a.no_nota
								LEFT JOIN pelanggan c ON c.id = b.pelanggan_id
								
								ORDER by a.created_at DESC");
	
	$no = 0;
	$response = array();
	$response["retur_penjualan_list"] = array();

	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

		

			$no++;
			$h['no']				= $no;
			$h['id']				= $x->retur_penjualan_id;
			$h['tgl_transaksi']		= $d->tgl_jam($x->tgl_nota);
			$h['tgl_retur']			= $d->tgl_jam($x->tgl_retur);
			$h['no_nota']			= $x->no_nota;
			$h['pelanggan']			= $x->nama;


			$h['total_belanja']		= number_format($x->total_belanja,'0',',','.');
			$h['total_retur']		= number_format($x->total_retur,'0',',','.');
			$h['keterangan']		= $x->keterangan;
							
			array_push($response["retur_penjualan_list"], $h);
	}	
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case"detail_retur_transaksi_penjualan":

	$retur_penjualan_id = $_GET['retur_penjualan_id'];
	$query = $koneksi->prepare(" SELECT 	
								a.id as retur_penjualan_id,
								a.no_nota,
								a.created_at AS tgl_retur,
								a.total_retur,
								a.keterangan,
								b.id AS penjualan_id,
								c.nama AS nama_user_retur

								
								FROM retur_penjualan a 
								LEFT JOIN penjualan b ON b.no_nota = a.no_nota
								LEFT JOIN users c ON c.id = a.user_id

								WHERE a.id = 	'$retur_penjualan_id'	
								
								
								LIMIT 1 ");


		
	$query->execute();
	$x = $query->fetch(PDO::FETCH_OBJ);


		$detail_retur_penjualan = array(
					'no_nota'			=> $x->no_nota,
					'penjualan_id'		=> $x->penjualan_id,
					'tgl_retur'			=> $d->tgl($x->tgl_retur),
					'jam_retur'			=> $d->jam($x->tgl_retur),
					'total_retur'		=> number_format($x->total_retur,'0',',','.'),
					'keterangan_retur'	=> $x->keterangan,
					'nama_user_retur'	=> $x->nama_user_retur

		);


	
	
				
	if (mysql_errno() == 0){
		header('HTTP/1.1 200 Sukses'); //if sukses
		echo json_encode($detail_retur_penjualan);
				
	}else{
				header('HTTP/1.1 400 error'); //if error
	}

break;
default;
header('HTTP/1.1 400 request error');
break;
}
?>