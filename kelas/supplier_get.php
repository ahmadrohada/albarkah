<?php
	//header("Content-Type:application/json");
	session_start();

	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../kelas/pustaka.php';
	require_once('../config/conn_pdo.php');
	
	
	$d 		= New FormatTanggal();
	$n 		= New Nota();
	$s 		= New selisih();
		
	
$op				= isset($_GET['op'])?$_GET['op']:null;

switch($op){
case"supplier_list":

		$nama =  isset($_GET['nama'])?$_GET['nama']:null;

		$query = $koneksi->prepare(" SELECT 	
								a.id as supplier_id,
								a.nama
								FROM supplier a
								WHERE nama LIKE '%$nama%'		
								ORDER by a.nama ASC ");

				
			$no = 0;
			$query->execute();
			while($x = $query->fetch(PDO::FETCH_OBJ)) {
						$no++;
						$item[] = array(
									'no'		=> $no,
									'id'		=> $x->supplier_id,
									'nama'		=> $x->nama,
						);

			}	
				
			if ($no!=0){
				header('HTTP/1.1 200 Sukses'); //if sukses
				echo json_encode($item);
				
			}else{
				header('HTTP/1.1 400 error'); //if error
			}

break;
case "supplier_tbl_list":
		
	$query = $koneksi->prepare(" SELECT 	
								a.id as supplier_id,
								a.nama,
								a.no_tlp,
								a.alamat,
								a.info_lain
								FROM supplier a
								ORDER by a.id DESC");
	
	$no = 0;
	$response = array();
	$response["supplier_list"] = array();

	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

		

			$no++;
			$h['no']				= $no;
			$h['supplier_id']		= $x->supplier_id;
			$h['nama']				= $x->nama;
			$h['no_tlp']			= $x->no_tlp;
			$h['alamat']			= $x->alamat;
			$h['keterangan']	    = $x->info_lain;

							
			array_push($response["supplier_list"], $h);
	}	
		  
	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case"detail_supplier":

	$supplier_id = $_GET['supplier_id'];


	$query = $koneksi->prepare(" SELECT 	
								a.id as supplier_id,
								a.nama,
								a.alamat,
								a.no_tlp,
								a.info_lain
								FROM supplier a 
								WHERE id = 	'$supplier_id'	
								
								LIMIT 1 ");

	
	$query->execute();
	$x = $query->fetch(PDO::FETCH_OBJ);

	if ($x){
		$detail_supplier = array(
							'id'			=> $x->supplier_id,
							'nama'			=> $x->nama,
							'alamat'		=> $x->alamat,
							'no_tlp'		=> $x->no_tlp,
							'info_lain'		=> $x->info_lain,
		);
		
	}else{
	$detail_supplier = array(
							'id'		=> "-",
							'nama'		=> "-",
							'alamat'	=> "-",
							'no_tlp'	=> "-",
							'info_lain'	=> "",
				);
		
	}
			
					
	if (mysql_errno() == 0){
		echo json_encode($detail_supplier);
		header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
default;
header('HTTP/1.1 400 request error');
break;
}
?>