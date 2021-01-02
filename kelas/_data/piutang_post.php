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
case "bayar_piutang":
		
	
	$nota_id 			= $_POST['nota_id'];	
	$jumlah_bayar 		= preg_replace('/[^0-9]/', '', $_POST['jumlah_bayar']);	
	$keterangan 		= $_POST['keterangan'];	


	try{
		$query = $koneksi->prepare("INSERT INTO bayar_piutang  (nota_id, tgl_bayar, jumlah_bayar, keterangan)
									VALUES(:a, 	:b, :c , :d)");
			$query->execute(array(
			"a" => $nota_id,
			"b" => date('Y'."-".'m'."-".'d'." ".'H'.":".'i'.":".'s'),
			"c" => $jumlah_bayar,
			"d" => $keterangan,
			));	
	}
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}
		
	



break;
default;
header('HTTP/1.1 400 request error');
break;
}
?>