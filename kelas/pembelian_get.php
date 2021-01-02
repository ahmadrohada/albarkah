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
case "pembelian_list":
		
	$query = $koneksi->prepare(" SELECT 	
								a.id as nota_id,
								a.no_nota,
								a.tgl_nota,
								a.user_id,
								a.supplier_id,
								a.total_pembelian,
								a.total_tambahan,
								a.total_pengurangan,
								a.total_upah_kuli,
								a.type_bayar,
								a.jumlah_dp,
								a.keterangan,
								b.nama
								FROM pembelian a
								LEFT JOIN supplier b ON b.id = a.supplier_id
								
								ORDER by a.tgl_nota DESC");
	
	$no = 0;
	$response = array();
	$response["pembelian_list"] = array();

	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

		
		$jumlah_bayar  = ( $x->total_pembelian + $x->total_tambahan - $x->total_pengurangan) - $x->total_upah_kuli ;

		switch($x->type_bayar)
			{
			case 1 : $type = 'Cash';
				break;
			case 2 : $type = 'Hutang';
				break;
			}
	
		if ( $x->type_bayar == '2'){
			$sisa 	= $jumlah_bayar - $x->jumlah_dp ; 
		}else{
			$sisa   =  0 ;
		}

			$no++;
			$h['no']				= $no;
			$h['id']				= $x->nota_id;
			$h['tgl_nota']			= $d->tgl_jam($x->tgl_nota);
			$h['no_nota']			= $x->no_nota;
			$h['nama_supplier']		= $x->nama;


			$h['total_pembelian']	= number_format($x->total_pembelian,'0',',','.');
			$h['total_tambahan']	= number_format($x->total_tambahan,'0',',','.');
			$h['total_pengurangan']	= number_format($x->total_pengurangan,'0',',','.');
			$h['total_upah_kuli']	= number_format($x->total_upah_kuli,'0',',','.');
			$h['jumlah_bayar']		= number_format($jumlah_bayar,'0',',','.');
			$h['type_bayar']		= $type;
			$h['sisa']			    = number_format($sisa,'0',',','.');
			$h['keterangan']		= $x->keterangan;
							
			array_push($response["pembelian_list"], $h);
	}	
		  
	if ( $no != 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "tmp_pembelian_list":
	

	$no_nota =  $_GET['no_nota'];
	$query = $koneksi->prepare(" SELECT 	
								a.id,
								a.nama_karung,
								a.qty,
								a.tonase,
								a.harga,
								a.upah_kuli,
								b.label AS jenis_beras

								FROM tmp_transaksi a
								LEFT JOIN jenis_beras b ON b.id = a.jenis_beras_id

								WHERE jenis_transaksi = 'pembelian' AND no_nota = '$no_nota'
								
								ORDER by a.id ASC");
	
	$no = 0;
	$response = array();
	$response["tmp_pembelian_list"] = array();
	$response["detail_pembelian_list"] = array();
	$total					= 0;
	$total_upah_kuli		= 0;
	$total_bayar			= 0;
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			/* if ( $x->discount > 0 ){
				$potongan   = ($x->discount/100)*$x->harga;
				$jumlah		= ($x->harga-$potongan)*$x->qty;
			}else{
				$jumlah		= $x->harga*$x->qty;
			} */
			
			$jumlah	 		= $x->qty*$x->tonase*$x->harga  ;
			$upah 			= $x->qty*$x->tonase*$x->upah_kuli ;

			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['nama_karung']	= $x->nama_karung;
			$h['jenis_beras']	= $x->jenis_beras;
			$h['qty']			= $x->qty;
			$h['tonase']		= $d->tonase($x->tonase);
			$h['upah_kuli']		= $x->upah_kuli;
			$h['harga']			= number_format($x->harga,'0',',','.');
			
			$h['jumlah']		= number_format($jumlah,'0',',','.');
							
			array_push($response["tmp_pembelian_list"], $h);

			$total				= $total + $jumlah;
			$total_upah_kuli	= $total_upah_kuli + $upah;
			
	}	



	$gt['total']				= number_format($total,'0',',','.');

	$gt['total_upah_kuli']		= number_format($total_upah_kuli,'0',',','.');
	$gt['total_bayar']			= number_format($total-$total_upah_kuli,'0',',','.');


	array_push($response["detail_pembelian_list"], $gt);
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "transaksi_pembelian_list_item":

	$no_nota =  $_GET['no_nota'];
	$query = $koneksi->prepare(" SELECT 	
						a.*,
						b.label AS jenis_beras

						FROM item_transaksi a
						LEFT JOIN jenis_beras b ON b.id = a.jenis_beras_id

						WHERE a.no_nota = '$no_nota' AND a.jenis_transaksi = 'pembelian'

						ORDER by a.id ASC");

	$no = 0;
	$response = array();
	$response["tmp_pembelian_list"] = array();
	$response["detail_pembelian_list"] = array();
	$total					= 0;
	$total_upah_kuli		= 0;
	$total_bayar			= 0;
	$total_retur			= 0;
	$query->execute();

	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			/* if ( $x->discount > 0 ){
			$potongan   = ($x->discount/100)*$x->harga;
			$jumlah		= ($x->harga-$potongan)*$x->qty;
			}else{
			$jumlah		= $x->harga*$x->qty;
			} */

			$jumlah	 		= $x->qty*$x->tonase*$x->harga  ;
			$upah 			= $x->qty*$x->tonase*$x->upah_kuli ;
			$jumlah_retur 	= $x->retur*$x->tonase*$x->harga ;

			$no++;
			$h['no']			= $no;
			$h['id']			= $x->id;
			$h['nama_karung']	= $x->nama_karung;
			$h['jenis_beras']	= $x->jenis_beras;
			$h['qty']			= $x->qty;
			$h['tonase']		= $d->tonase($x->tonase);
			$h['upah_kuli']		= $x->upah_kuli;
			$h['harga']			= number_format($x->harga,'0',',','.');
			$h['retur']			= $x->retur;
			$h['jumlah']		= number_format($jumlah,'0',',','.');

			$h['jumlah_retur']	= number_format($jumlah_retur,'0',',','.');

			array_push($response["tmp_pembelian_list"], $h);

			$total_retur		= $total_retur + $jumlah_retur;
		
	}	

	$gt['total_retur']			= number_format($total_retur,'0',',','.');


	array_push($response["detail_pembelian_list"], $gt);


	if (mysql_errno() == 0){
		echo json_encode($response);
	}else{
		header('HTTP/1.1 400 error'); //if error
	}


break;
case"detail_transaksi_pembelian":

	$pembelian_id = $_GET['pembelian_id'];
	$query = $koneksi->prepare(" SELECT 	
								a.*,
								b.nama as nama_supplier,
								b.no_tlp,
								b.alamat,
								c.nama as nama_user,
								d.id AS retur_id,
								d.keterangan AS keterangan_retur

								
								FROM pembelian a 
								LEFT JOIN supplier b ON b.id = a.supplier_id
								LEFT JOIN users c ON c.id = a.user_id
								LEFT JOIN retur_pembelian d ON d.no_nota = a.no_nota


								WHERE a.id = 	'$pembelian_id'	
								
								
								LIMIT 1 ");


		
	$query->execute();
	$x = $query->fetch(PDO::FETCH_OBJ);

	if ($x){
		
		$total_bayar  = ( $x->total_pembelian + $x->total_tambahan - $x->total_pengurangan) - $x->total_upah_kuli ;

		if ( $x->type_bayar == 1 ){
			$sisa = 0 ;
		}else{
			$sisa = $total_bayar - $x->jumlah_dp;
		}
		
		if ( $x->retur_id != null ){
			$status_retur = 1 ;
		}else{
			$status_retur = 0 ;
		}

		$detail_pembelian = array(
					'no_nota'			=> $x->no_nota,
					'tgl_nota'			=> $d->tgl($x->tgl_nota),
					'jam'				=> $d->jam($x->tgl_nota),
					'nama_supplier' 	=> $x->nama_supplier,
					'no_tlp'			=> $x->no_tlp,
					'nama_user'			=> $x->nama_user,
					'type_bayar'		=> $x->type_bayar,
					'total_pembelian'	=> number_format($x->total_pembelian,'0',',','.'),
					'total_upah_kuli'	=> number_format($x->total_upah_kuli,'0',',','.'),
					'total_tambahan'	=> number_format($x->total_tambahan,'0',',','.'),
					'total_pengurangan'	=> number_format($x->total_pengurangan,'0',',','.'),
					'total_bayar'	    => number_format($total_bayar,'0',',','.'),
					'jumlah_dp'			=> number_format($x->jumlah_dp,'0',',','.'),
					'jumlah_sisa'	   	=> number_format($sisa,'0',',','.'),
					'keterangan_retur'	=> $x->keterangan_retur,
					'keterangan'		=> $x->keterangan,


					'status_retur'		=> $status_retur,
					

		);

	}else{
		
		$detail_pembelian = array(
			'no_nota'		=> "",
			'tgl_nota'		=> "",
			'jam'			=> "",
			'nama_supplier' => "",
			'no_tlp'		=> "",
			'nama_user'		=> "",
		);

	}
	
				
	if (mysql_errno() == 0){
		header('HTTP/1.1 200 Sukses'); //if sukses
		echo json_encode($detail_pembelian);
				
	}else{
				header('HTTP/1.1 400 error'); //if error
	}

break;
case "retur_pembelian_list":
		
	$query = $koneksi->prepare(" SELECT 	
								a.id as retur_pembelian_id,
								a.no_nota,
								a.total_retur,
								a.created_at AS tgl_retur,
								a.keterangan,
								b.tgl_nota,
								b.user_id,
								b.supplier_id,
								b.total_pembelian,
								c.nama

								FROM retur_pembelian a
								LEFT JOIN pembelian b ON b.no_nota = a.no_nota
								LEFT JOIN supplier c ON c.id = b.supplier_id
								
								ORDER by a.created_at DESC");
	
	$no = 0;
	$response = array();
	$response["retur_pembelian_list"] = array();

	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

		

			$no++;
			$h['no']				= $no;
			$h['id']				= $x->retur_pembelian_id;
			$h['tgl_transaksi']		= $d->tgl_jam($x->tgl_nota);
			$h['tgl_retur']			= $d->tgl_jam($x->tgl_retur);
			$h['no_nota']			= $x->no_nota;
			$h['pelanggan']			= $x->nama;


			$h['total_pembelian']		= number_format($x->total_pembelian,'0',',','.');
			$h['total_retur']		= number_format($x->total_retur,'0',',','.');
			$h['keterangan']		= $x->keterangan;
							
			array_push($response["retur_pembelian_list"], $h);
	}	
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "transaksi_retur_pembelian_list_item":


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
	$response["retur_pembelian_list"] = array();
	$response["detail_retur_pembelian_list"] = array();
	$total					= 0;
	$total_komisi			= 0;
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

			/* if ( $x->discount > 0 ){
				$potongan   = ($x->discount/100)*$x->harga;
				$jumlah		= ($x->harga-$potongan)*$x->outcome;
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
							
							
			array_push($response["retur_pembelian_list"], $h);
	}	


		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;

case"detail_retur_transaksi_pembelian":

	$retur_pembelian_id = $_GET['retur_pembelian_id'];
	$query = $koneksi->prepare(" SELECT 	
								a.id as retur_pembelian_id,
								a.no_nota,
								a.created_at AS tgl_retur,
								a.total_retur,
								a.keterangan,
								b.id AS pembelian_id,
								c.nama AS nama_user_retur

								
								FROM retur_pembelian a 
								LEFT JOIN pembelian b ON b.no_nota = a.no_nota
								LEFT JOIN users c ON c.id = a.user_id

								WHERE a.id = 	'$retur_pembelian_id'	
								
								
								LIMIT 1 ");


		
	$query->execute();
	$x = $query->fetch(PDO::FETCH_OBJ);


		$detail_retur_pembelian = array(
					'no_nota'			=> $x->no_nota,
					'pembelian_id'		=> $x->pembelian_id,
					'tgl_retur'			=> $d->tgl($x->tgl_retur),
					'jam_retur'			=> $d->jam($x->tgl_retur),
					'total_retur'		=> number_format($x->total_retur,'0',',','.'),
					'keterangan_retur'	=> $x->keterangan,
					'nama_user_retur'	=> $x->nama_user_retur

		);


	
	
				
	if (mysql_errno() == 0){
		header('HTTP/1.1 200 Sukses'); //if sukses
		echo json_encode($detail_retur_pembelian);
				
	}else{
				header('HTTP/1.1 400 error'); //if error
	}

break;

default;
header('HTTP/1.1 400 request error');
break;
}
?>