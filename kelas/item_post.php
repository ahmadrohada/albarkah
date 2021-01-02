<?php
	//header("Content-Type:application/json");
	session_start();

	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../kelas/pustaka.php';
	require_once('../config/conn_pdo.php');
	
	
	$d 	= New FormatTanggal();
	$n 	= New Nota();
	$s 	= New selisih();
		
	
	

	try {
		$data				= isset($_POST['op'])?$_POST['op']:null;
	}

	catch(Exception $e) {
		$data = null;
		echo 'Message: ' .$e->getMessage();
	}	
	
switch($data){
case "add_item_pembelian":
		

	$no_nota 			= $_POST['no_nota'];	
	$nama_karung 		= $_POST['nama_karung'];	
	$jenis_beras_id 	= preg_replace('/[^0-9]/', '', $_POST['jenis_beras']);	
	$harga 				= preg_replace('/[^0-9]/', '', $_POST['harga']);	
	$tonase 			= $_POST['tonase'];	
	$qty 				= preg_replace('/[^0-9]/', '', $_POST['qty']);	
	

	if ( ($nama_karung != "")&( $jenis_beras_id != "") ){
		try{
			$query = $koneksi->prepare("INSERT INTO tmp_transaksi  (no_nota, jenis_transaksi, jenis_beras_id,nama_karung,qty,tonase,harga,upah_kuli)
													VALUES(:a,:b,:c,:d,:e,:f,:g ,:h)");
			$query->execute(array(
								"a" => $no_nota,
								"b" => 'pembelian',
								"c" => $jenis_beras_id,
								"d" => $nama_karung,
								"e" => $qty,
								"f" => $tonase,
								"g" => $harga,
								"h" => 10
							));	
			  
						}
		catch ( PDOException $e)
		{
			header('HTTP/1.1 401 error'); //if error
		}
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

	

break;
case "add_item_penjualan":
		

	$no_nota 			= $_POST['no_nota'];
	$id_barang 			= $_POST['nama_barang'];
	$harga_satuan 		= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);
	$quantity 			= $_POST['qty'];
	
	
	try{
			$query = $koneksi->prepare("INSERT INTO tmp_transaksi  (no_nota,jenis_transaksi,id_barang,harga_satuan,quantity)
													VALUES(:a,:b,:c,:d,:e)");
			$query->execute(array(
								"a" => $no_nota,
								"b" => 'penjualan',
								"c" => $id_barang,
								"d" => $harga_satuan,
								"e" => $quantity
							));	
			  
	}
	catch ( PDOException $e)
	{
			header('HTTP/1.1 400 error'); //if error
	}
	
break;
case "add_item_penjualan_2":
		

	$no_nota 			= $_POST['no_nota'];
	$nama_karung 		= $_POST['nama_karung'];
	$harga 				= preg_replace('/[^0-9]/', '', $_POST['harga']);	
	$tonase 			= $_POST['tonase'];	
	$qty 				= preg_replace('/[^0-9]/', '', $_POST['qty']);	
	

	try{
			$query = $koneksi->prepare("INSERT INTO tmp_transaksi  (no_nota, jenis_transaksi, stok_beras_id,nama_karung,qty,tonase,harga)
													VALUES(:a,:b,:c,:d,:e,:f,:g)");
			$query->execute(array(
								"a" => $no_nota,
								"b" => 'penjualan',
								"c" => '',
								"d" => $nama_karung,
								"e" => $qty,
								"f" => $tonase,
								"g" => $harga
							));	
			  
						}
	catch ( PDOException $e)
	{
			header('HTTP/1.1 400 error'); //if error
	}
	
break;
case "update_qty_tmp":
		
	$qty  	= preg_replace('/[^0-9]/', '', $_POST['qty']);
	$id 	= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_transaksi
										SET 	qty			= :qty
										WHERE id		= :id ");
		$update->execute(array(
								"qty" 		=> $qty,
								"id" 		=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_tonase_tmp":
		
	$tonase  	= $_POST['tonase'];
	$id 		= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_transaksi
										SET 	tonase	= :tonase
										WHERE   id		= :id ");
		$update->execute(array(
								"tonase" 	=> $tonase,
								"id" 		=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_harga_tmp":
		
	$harga  	= preg_replace('/[^0-9]/', '', $_POST['harga']);
	$id 		= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_transaksi
										SET 	harga	= :harga
										WHERE   id		= :id ");
		$update->execute(array(
								"harga" 	=> $harga,
								"id" 		=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_upah_kuli_tmp":
		
	$upah_kuli  	= preg_replace('/[^0-9]/', '', $_POST['upah_kuli']);
	$id 		= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_transaksi
										SET 	upah_kuli	= :upah_kuli
										WHERE   id			= :id ");
		$update->execute(array(
								"upah_kuli" 	=> $upah_kuli,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_komisi_tmp":
		
	$komisi  	= preg_replace('/[^0-9]/', '', $_POST['komisi']);
	$id 		= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_transaksi
										SET 	komisi		= :komisi
										WHERE   id			= :id ");
		$update->execute(array(
								"komisi" 		=> $komisi,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "delete_from_tmp":
		

	$id = preg_replace('/[^0-9]/', '', $_POST['tmp_transaksi_id']);		
	
	try{
	$query = $koneksi->prepare("DELETE FROM tmp_transaksi  WHERE id = :a ");
	$query->execute(array(
						"a" => $id
					));	
		  
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "add_item_tambahan":
		

	$no_nota 			= $_POST['no_nota'];	
	$item_tambahan 		= $_POST['item_tambahan'];	
	$qty 				= preg_replace('/[^0-9]/', '', $_POST['qty']);	
	$harga_satuan		= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);	
	

	if ( $item_tambahan != ""){
		try{
			$query = $koneksi->prepare("INSERT INTO tmp_tambahan  (no_nota,item_tambahan,qty,harga_satuan)
													VALUES(:a,:b,:c,:d)");
			$query->execute(array(
								"a" => $no_nota,
								"b" => $item_tambahan,
								"c" => $qty,
								"d" => $harga_satuan
							));	
			  
						}
		catch ( PDOException $e)
		{
			header('HTTP/1.1 401 error'); //if error
		}
	}else{
		header('HTTP/1.1 402 error'); //if error
	}

	

break;
case "add_item_tambahan_beli":
		

	$no_nota 			= $_POST['no_nota'];	
	$item_tambahan 		= $_POST['item_tambahan'];	
	$qty 				= preg_replace('/[^0-9]/', '', $_POST['qty']);	
	$harga_satuan		= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);	
	

	if ( $item_tambahan != ""){
		try{
			$query = $koneksi->prepare("INSERT INTO tmp_tambahan_beli  (no_nota,item_tambahan,qty,harga_satuan)
													VALUES(:a,:b,:c,:d)");
			$query->execute(array(
								"a" => $no_nota,
								"b" => $item_tambahan,
								"c" => $qty,
								"d" => $harga_satuan
							));	
			  
						}
		catch ( PDOException $e)
		{
			header('HTTP/1.1 401 error'); //if error
		}
	}else{
		header('HTTP/1.1 402 error'); //if error
	}

	

break;
case "update_qty_tmp_tambahan":
		
	$qty  	= preg_replace('/[^0-9]/', '', $_POST['qty']);
	$id 			= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_tambahan
										SET 	qty		= :qty
										WHERE   id		= :id ");
		$update->execute(array(
								"qty" 			=> $qty,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_qty_tmp_tambahan_beli":
		
	$qty  	= preg_replace('/[^0-9]/', '', $_POST['qty']);
	$id 			= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_tambahan_beli
										SET 	qty		= :qty
										WHERE   id		= :id ");
		$update->execute(array(
								"qty" 			=> $qty,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_harga_satuan_tmp_tambahan":
		
	$harga_satuan  	= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);
	$id 			= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_tambahan
										SET 	harga_satuan		= :harga_satuan
										WHERE   id					= :id ");
		$update->execute(array(
								"harga_satuan" 	=> $harga_satuan,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_harga_satuan_tmp_tambahan_beli":
		
	$harga_satuan  	= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);
	$id 			= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_tambahan_beli
										SET 	harga_satuan		= :harga_satuan
										WHERE   id					= :id ");
		$update->execute(array(
								"harga_satuan" 	=> $harga_satuan,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "delete_from_tmp_tambahan":
		

	$id = preg_replace('/[^0-9]/', '', $_POST['tmp_transaksi_tambahan_id']);		
	
	try{
	$query = $koneksi->prepare("DELETE FROM tmp_tambahan  WHERE id = :a ");
	$query->execute(array(
						"a" => $id
					));	
		  
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "delete_from_tmp_tambahan_beli":
		

	$id = preg_replace('/[^0-9]/', '', $_POST['tmp_transaksi_tambahan_id']);		
	
	try{
	$query = $koneksi->prepare("DELETE FROM tmp_tambahan_beli  WHERE id = :a ");
	$query->execute(array(
						"a" => $id
					));	
		  
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;



case "add_item_pengurangan":
		

	$no_nota 			= $_POST['no_nota'];	
	$item_pengurangan 		= $_POST['item_pengurangan'];	
	$qty 				= preg_replace('/[^0-9]/', '', $_POST['qty']);	
	$harga_satuan		= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);	
	

	if ( $item_pengurangan != ""){
		try{
			$query = $koneksi->prepare("INSERT INTO tmp_pengurangan  (no_nota,item_pengurangan,qty,harga_satuan)
													VALUES(:a,:b,:c,:d)");
			$query->execute(array(
								"a" => $no_nota,
								"b" => $item_pengurangan,
								"c" => $qty,
								"d" => $harga_satuan
							));	
			  
						}
		catch ( PDOException $e)
		{
			header('HTTP/1.1 401 error'); //if error
		}
	}else{
		header('HTTP/1.1 402 error'); //if error
	}

	

break;
case "add_item_pengurangan_beli":
		

	$no_nota 			= $_POST['no_nota'];	
	$item_pengurangan 		= $_POST['item_pengurangan'];	
	$qty 				= preg_replace('/[^0-9]/', '', $_POST['qty']);	
	$harga_satuan		= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);	
	

	if ( $item_pengurangan != ""){
		try{
			$query = $koneksi->prepare("INSERT INTO tmp_pengurangan_beli  (no_nota,item_pengurangan,qty,harga_satuan)
													VALUES(:a,:b,:c,:d)");
			$query->execute(array(
								"a" => $no_nota,
								"b" => $item_pengurangan,
								"c" => $qty,
								"d" => $harga_satuan
							));	
			  
						}
		catch ( PDOException $e)
		{
			header('HTTP/1.1 401 error'); //if error
		}
	}else{
		header('HTTP/1.1 402 error'); //if error
	}

	

break;
case "update_qty_tmp_pengurangan":
		
	$qty  	= preg_replace('/[^0-9]/', '', $_POST['qty']);
	$id 			= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_pengurangan
										SET 	qty		= :qty
										WHERE   id		= :id ");
		$update->execute(array(
								"qty" 			=> $qty,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_qty_tmp_pengurangan_beli":
		
	$qty  	= preg_replace('/[^0-9]/', '', $_POST['qty']);
	$id 			= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_pengurangan_beli
										SET 	qty		= :qty
										WHERE   id		= :id ");
		$update->execute(array(
								"qty" 			=> $qty,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_harga_satuan_tmp_pengurangan":
		
	$harga_satuan  	= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);
	$id 			= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_pengurangan
										SET 	harga_satuan		= :harga_satuan
										WHERE   id					= :id ");
		$update->execute(array(
								"harga_satuan" 	=> $harga_satuan,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "update_harga_satuan_tmp_pengurangan_beli":
		
	$harga_satuan  	= preg_replace('/[^0-9]/', '', $_POST['harga_satuan']);
	$id 			= preg_replace('/[^0-9]/', '', $_POST['id']);		
	

	try{
		$update = $koneksi->prepare("UPDATE tmp_pengurangan_beli
										SET 	harga_satuan		= :harga_satuan
										WHERE   id					= :id ");
		$update->execute(array(
								"harga_satuan" 	=> $harga_satuan,
								"id" 			=> $id
							));	
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "delete_from_tmp_pengurangan":
		

	$id = preg_replace('/[^0-9]/', '', $_POST['tmp_transaksi_pengurangan_id']);		
	
	try{
	$query = $koneksi->prepare("DELETE FROM tmp_pengurangan  WHERE id = :a ");
	$query->execute(array(
						"a" => $id
					));	
		  
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "delete_from_tmp_pengurangan_beli":
		

	$id = preg_replace('/[^0-9]/', '', $_POST['tmp_transaksi_pengurangan_id']);		
	
	try{
	$query = $koneksi->prepare("DELETE FROM tmp_pengurangan_beli  WHERE id = :a ");
	$query->execute(array(
						"a" => $id
					));	
		  
	}	  
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}

break;

case "update_qty_retur_penjualan":
		
	$qty_retur  	= preg_replace('/[^0-9]/', '', $_POST['qty']);
	$keterangan  	= $_POST['keterangan'];
	$no_nota 		= preg_replace('/[^0-9]/', '', $_POST['no_nota']);		
	$status_retur   = $_POST['status_retur'];

	
		$update = $koneksi->prepare("UPDATE item_transaksi
										SET 	retur			= :qty_retur
										WHERE 	no_nota			= :no_nota  AND item_transaksi.qty >= :qty_retur ");
		$update->execute(array(
								"qty_retur"		=> $qty_retur,
								"no_nota" 		=> $no_nota
							));	


		//======================== UPDATE ======================//
		$total_retur = 0 ;
		$query_4 = $koneksi->prepare(" SELECT 	retur,harga,tonase FROM item_transaksi WHERE no_nota = '$no_nota' ");
		$query_4->execute();
		while($x = $query_4->fetch(PDO::FETCH_OBJ)) {
			$jumlah	 		= $x->retur * $x->tonase * $x->harga  ;

			$total_retur    = $total_retur + $jumlah ;
		}

		if ( $total_retur > 0 ){
			if ( $status_retur === '1' ){
				$update_2 = $koneksi->prepare("UPDATE retur_penjualan
								SET 	total_retur		= :total_retur,
										keterangan		= :keterangan,
										created_at      = :tgl_skarang
								WHERE 	no_nota			= :no_nota  ");
				$update_2->execute(array(
						"total_retur"	=> $total_retur,
						"keterangan"	=> $keterangan,
						"no_nota" 		=> $no_nota,
						"tgl_skarang"	=> date('Y'."-".'m'."-".'d'." ".'H'.":".'i'.":".'s'),
					));	
			}else{
				$query = $koneksi->prepare("INSERT INTO retur_penjualan  (no_nota, total_retur, user_id , keterangan )
													VALUES(:no_nota,:total_retur,:user_id,:keterangan)");
				$query->execute(array(
									"no_nota"	 	=> $no_nota,
									"total_retur"	=> $total_retur,
									"user_id" 		=> 1,
									"keterangan" 	=> $keterangan,
								));	

			}


		}else{

		}

break;
case "update_keterangan_retur_penjualan":
		
	$keterangan  	= $_POST['keterangan'];
	$no_nota 		= preg_replace('/[^0-9]/', '', $_POST['no_nota']);		
	$status_retur   = $_POST['status_retur'];

	
	

		//======================== UPDATE ======================//
		$total_retur = 0 ;
		$query_4 = $koneksi->prepare(" SELECT 	retur,harga,tonase FROM item_transaksi WHERE no_nota = '$no_nota' ");
		$query_4->execute();
		while($x = $query_4->fetch(PDO::FETCH_OBJ)) {
			$jumlah	 		= $x->retur * $x->tonase * $x->harga  ;

			$total_retur    = $total_retur + $jumlah ;
		}

		if ( $total_retur > 0 ){
			if ( $status_retur === '1' ){
				$update_2 = $koneksi->prepare("UPDATE retur_penjualan
								SET 	total_retur		= :total_retur,
										keterangan		= :keterangan,
										created_at      = :tgl_skarang
								WHERE 	no_nota			= :no_nota  ");
				$update_2->execute(array(
						"total_retur"	=> $total_retur,
						"keterangan"	=> $keterangan,
						"no_nota" 		=> $no_nota,
						"tgl_skarang"	=> date('Y'."-".'m'."-".'d'." ".'H'.":".'i'.":".'s'),
					));	
			}else{
				echo "status_retur 0";

				$query = $koneksi->prepare("INSERT INTO retur_penjualan  (no_nota, total_retur, user_id , keterangan )
													VALUES(:no_nota,:total_retur,:user_id,:keterangan)");
				$query->execute(array(
									"no_nota"	 	=> $no_nota,
									"total_retur"	=> $total_retur,
									"user_id" 		=> 1,
									"keterangan" 	=> $keterangan,
								));	

			}


		}else{
			echo "total_nol".$total_retur;
		}

break;

case "update_qty_retur_pembelian":
		
	$qty_retur  	= preg_replace('/[^0-9]/', '', $_POST['qty']);
	$keterangan  	= $_POST['keterangan'];
	$no_nota 		= preg_replace('/[^0-9]/', '', $_POST['no_nota']);		
	$status_retur   = $_POST['status_retur'];

	
		$update = $koneksi->prepare("UPDATE item_transaksi
										SET 	retur			= :qty_retur
										WHERE 	no_nota			= :no_nota  AND item_transaksi.qty >= :qty_retur ");
		$update->execute(array(
								"qty_retur"		=> $qty_retur,
								"no_nota" 		=> $no_nota
							));	


		//======================== UPDATE ======================//
		$total_retur = 0 ;
		$query_4 = $koneksi->prepare(" SELECT 	retur,harga,tonase FROM item_transaksi WHERE no_nota = '$no_nota' ");
		$query_4->execute();
		while($x = $query_4->fetch(PDO::FETCH_OBJ)) {
			$jumlah	 		= $x->retur * $x->tonase * $x->harga  ;

			$total_retur    = $total_retur + $jumlah ;
		}

		if ( $total_retur > 0 ){
			if ( $status_retur === '1' ){
				$update_2 = $koneksi->prepare("UPDATE retur_pembelian
								SET 	total_retur		= :total_retur,
										keterangan		= :keterangan,
										created_at      = :tgl_skarang
								WHERE 	no_nota			= :no_nota  ");
				$update_2->execute(array(
						"total_retur"	=> $total_retur,
						"keterangan"	=> $keterangan,
						"no_nota" 		=> $no_nota,
						"tgl_skarang"	=> date('Y'."-".'m'."-".'d'." ".'H'.":".'i'.":".'s'),
					));	
			}else{
				$query = $koneksi->prepare("INSERT INTO retur_pembelian  (no_nota, total_retur, user_id , keterangan )
													VALUES(:no_nota,:total_retur,:user_id,:keterangan)");
				$query->execute(array(
									"no_nota"	 	=> $no_nota,
									"total_retur"	=> $total_retur,
									"user_id" 		=> 1,
									"keterangan" 	=> $keterangan,
								));	

			}


		}else{

		}

break;
case "update_keterangan_retur_pembelian":
		
	$keterangan  	= $_POST['keterangan'];
	$no_nota 		= preg_replace('/[^0-9]/', '', $_POST['no_nota']);		
	$status_retur   = $_POST['status_retur'];

	
	

		//======================== UPDATE ======================//
		$total_retur = 0 ;
		$query_4 = $koneksi->prepare(" SELECT 	retur,harga,tonase FROM item_transaksi WHERE no_nota = '$no_nota' ");
		$query_4->execute();
		while($x = $query_4->fetch(PDO::FETCH_OBJ)) {
			$jumlah	 		= $x->retur * $x->tonase * $x->harga  ;

			$total_retur    = $total_retur + $jumlah ;
		}

		if ( $total_retur > 0 ){
			if ( $status_retur === '1' ){
				$update_2 = $koneksi->prepare("UPDATE retur_pembelian
								SET 	total_retur		= :total_retur,
										keterangan		= :keterangan,
										created_at      = :tgl_skarang
								WHERE 	no_nota			= :no_nota  ");
				$update_2->execute(array(
						"total_retur"	=> $total_retur,
						"keterangan"	=> $keterangan,
						"no_nota" 		=> $no_nota,
						"tgl_skarang"	=> date('Y'."-".'m'."-".'d'." ".'H'.":".'i'.":".'s'),
					));	
			}else{
				echo "status_retur 0";

				$query = $koneksi->prepare("INSERT INTO retur_pembelian  (no_nota, total_retur, user_id , keterangan )
													VALUES(:no_nota,:total_retur,:user_id,:keterangan)");
				$query->execute(array(
									"no_nota"	 	=> $no_nota,
									"total_retur"	=> $total_retur,
									"user_id" 		=> 1,
									"keterangan" 	=> $keterangan,
								));	

			}


		}else{
			echo "total_nol".$total_retur;
		}

break;
default;
header('HTTP/1.1 400 request error');
break;
}
?>