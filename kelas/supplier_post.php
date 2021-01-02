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
case "simpan_supplier":
		

	$nama 		= $_POST['nama'];		
	$alamat 	= $_POST['alamat'];	
	$tlp 		= preg_replace('/[^0-9]/', '', $_POST['tlp']);		
	$info 		= $_POST['info'];	

	$no = 1;
	if ( $nama != ""){

	try{
		$query = $koneksi->prepare("INSERT INTO supplier  (nama, alamat, no_tlp,info_lain)
									VALUES(:a, 	:b, :c, :d )");
			$query->execute(array(
			"a" => $nama,
			"b" => $alamat,
			"c" => $tlp,
			"d" => $info
			));	
	}
	catch ( PDOException $e)
	{
		header('HTTP/1.1 400 error'); //if error
	}
		
	}else{
		header('HTTP/1.1 400 error'); //if error
	}



break;
case "update_supplier":
		
	$id 		= $_POST['supplier_id'];	
	$nama 		= $_POST['nama'];		
	$alamat 	= $_POST['alamat'];	
	$tlp 		= preg_replace('/[^0-9]/', '', $_POST['tlp']);		
	$info 		= $_POST['info'];	

	$no = 1;
	if ( $nama != ""){

		try{
			$update = $koneksi->prepare("UPDATE supplier
											SET 	nama		= :a,
													alamat		= :b,
													no_tlp		= :c,
													info_lain	= :d

											WHERE   id			= :id ");
			$update->execute(array(
									"a" 		=> $nama,
									"b" 		=> $alamat,
									"c" 		=> $tlp,
									"d" 		=> $info,
									"id" 		=> $id
								));	
		}	  
		catch ( PDOException $e)
		{
			header('HTTP/1.1 400 error'); //if error
		}
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
default;
header('HTTP/1.1 400 request error');
break;
}
?>