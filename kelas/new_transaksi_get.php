<?php
	//header("Content-Type:application/json");
	session_start();

	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../kelas/pustaka.php';
	require_once('../config/conn_pdo.php');
	
	
	$d 	= New FormatTanggal();
	$n 	= New Nota();
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
case "new_transaksi_penjualan":
		
	$user_id	= $_GET['user_id'];
	$now		= date('Y'."-".'m'."-".'d');

	//====== DETAIL USERS =================//
	$dt_users = $koneksi->prepare(" SELECT 	a.id,
											a.nama
											FROM users a
											WHERE a.id = '$user_id'
											");

	$dt_users->execute();
	$dt = $dt_users->fetch(PDO::FETCH_OBJ);

	if ($dt){
		$user_id   = $dt->id;
		$nama_user = $dt->nama;
	}else{
		$user_id   = "";
		$nama_user = "";
	}
	//== cari data nota an user id ini
	$query = $koneksi->prepare(" SELECT 	a.id,
								a.no_nota,
								DATE(a.tgl_nota) AS tgl_nota,
								a.user_id
								FROM penjualan a
								WHERE DATE(a.tgl_nota) = '$now'

								ORDER by a.id DESC
								LIMIT 1 ");

	
	

	$query->execute();
	$x = $query->fetch(PDO::FETCH_OBJ);

	if ($x){

		//== cari no nota terakhir ==//
		$no_nota_terakhir	= $x->no_nota;
		//== generate no nota =======//
		$no_nota_baru		= $n->new_nota($no_nota_terakhir);

		$detail_new_nota = array(
					'no_nota'		=> $no_nota_baru,
					'tgl_nota'		=> $d->balik2(date('Y'."-".'m'."-".'d')),
					'user_id'		=> $user_id,
					'nama_user'		=> $nama_user,
		);

	}else{
		
		$detail_new_nota = array(
			'no_nota'		=> $user_id.'2'.date('d'.'m'.'y').'001',
			'tgl_nota'		=> $d->balik2(date('Y'."-".'m'."-".'d')),
			'user_id'		=> $user_id,
			'nama_user'		=> $nama_user,
		);

		
		
	}
	
		  
	if (mysql_errno() == 0){
		echo json_encode($detail_new_nota);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case "new_transaksi_pembelian":
		
	$user_id	= $_GET['user_id'];
	$now		= date('Y'."-".'m'."-".'d');

	//====== DETAIL USERS =================//
	$dt_users = $koneksi->prepare(" SELECT 	a.id,
											a.nama
											FROM users a
											WHERE a.id = '$user_id'
											");

	$dt_users->execute();
	$dt = $dt_users->fetch(PDO::FETCH_OBJ);

	if ($dt){
		$user_id   = $dt->id;
		$nama_user = $dt->nama;
	}else{
		$user_id   = "";
		$nama_user = "";
	}
	//== cari data nota an user id ini
	$query = $koneksi->prepare(" SELECT 	a.id,
											a.no_nota,
											DATE(a.tgl_nota) AS tgl_nota,
											a.user_id

											FROM pembelian a
											WHERE DATE(a.tgl_nota) = '$now'

											ORDER by a.id DESC
											LIMIT 1 ");

	
	

	$query->execute();
	$x = $query->fetch(PDO::FETCH_OBJ);

	if ($x){

		//== cari no nota terakhir ==//
		$no_nota_terakhir	= $x->no_nota;
		//== generate no nota =======//
		$no_nota_baru		= $n->new_nota($no_nota_terakhir);

		$detail_new_nota = array(
					'no_nota'		=> $no_nota_baru,
					'tgl_nota'		=> $d->balik2(date('Y'."-".'m'."-".'d')),
					'user_id'		=> $user_id,
					'nama_user'		=> $nama_user,
		);

	}else{
		
		$detail_new_nota = array(
			'no_nota'		=> $user_id.'1'.date('d'.'m'.'y').'001',
			'tgl_nota'		=> $d->balik2(date('Y'."-".'m'."-".'d')),
			'user_id'		=> $user_id,
			'nama_user'		=> $nama_user,
		);

		
		
	}
	
		  
	if (mysql_errno() == 0){
		echo json_encode($detail_new_nota);
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