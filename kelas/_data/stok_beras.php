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
case "jenis_beras_tbl_list":
		
$query = $koneksi->prepare(" SELECT 	
a.id as jenis_beras_id,
a.label

FROM jenis_beras a
ORDER by a.id DESC");

$no = 0;
$response = array();
$response["jenis_beras_list"] = array();
$response["total"] = array();
$total = 0;
$query->execute();

while($x = $query->fetch(PDO::FETCH_OBJ)) {

$stok_beras = $koneksi->prepare(" SELECT * , SUM(qty_stok) AS stok FROM stok_beras WHERE jenis_beras_id = '$x->jenis_beras_id'   ");
$stok_beras->execute();
$z  = $stok_beras->fetch(PDO::FETCH_OBJ);

$stok_beras = ( $z ? $z->stok : 0 );

$no++;
$h['no']				= $no;
$h['jenis_beras_id']	= $x->jenis_beras_id;
$h['label']				= $x->label;
$h['stok']				= $stok_beras;

$total = $total + $stok_beras;
array_push($response["jenis_beras_list"], $h);



}	

$t['total']				= $total;
array_push($response["total"], $t);

if (mysql_errno() == 0){
echo json_encode($response);
//header('HTTP/1.1 200 Sukses'); //if sukses
}else{
header('HTTP/1.1 400 error'); //if error
}
break;

	case"stok_beras_list":

	$nama =  isset($_GET['nama'])?$_GET['nama']:null;

	$query = $koneksi->prepare(" SELECT 	
							a.id as stok_id,
							a.nama_karung,
							a.tonase,
							a.harga_beli,
							a.harga_jual,
							a.qty_stok
							FROM stok_beras a
							
							WHERE a.qty_stok > 0 AND nama_karung LIKE '%$nama%'
							ORDER by a.nama_karung ASC ");

			
		$no = 0;
		$query->execute();
		while($x = $query->fetch(PDO::FETCH_OBJ)) {
			
			$no++;
			$item[] = array(
					'no'		=> $no,
					'id'		=> $x->stok_id.'|'.$d->tonase($x->tonase).'|'.number_format($x->harga_jual,'0',',','.'),
					'nama'		=> $x->nama_karung.' [ Tonase '.$d->tonase($x->tonase).' Kg]  [ Harga Beli Rp. ' .number_format($x->harga_beli,'0',',','.'). ' ] [ Stok ' .$x->qty_stok. ']',
			);
	
		}	
			
		if ($no!=0){
			header('HTTP/1.1 200 Sukses'); //if sukses
			echo json_encode($item);
			
		}else{
			header('HTTP/1.1 400 error'); //if error
		}

break;
case "stok_jenis_beras":
		
	$query = $koneksi->prepare(" SELECT 	
								a.id as jenis_beras_id,
								a.label

								FROM jenis_beras a
								ORDER by a.id DESC");
	
	$no = 0;
	$response = array();
	$response["jenis_beras_list"] = array();
	$response["total"] = array();
	$total = 0;
	$query->execute();
	
	while($x = $query->fetch(PDO::FETCH_OBJ)) {

		$stok_beras = $koneksi->prepare(" SELECT * , SUM(qty_stok) AS stok FROM stok_beras WHERE jenis_beras_id = '$x->jenis_beras_id'   ");
		$stok_beras->execute();
		$z  = $stok_beras->fetch(PDO::FETCH_OBJ);

		$stok_beras = ( $z ? $z->stok : 0 );
		
			$no++;
			$h['no']				= $no;
			$h['jenis_beras_id']	= $x->jenis_beras_id;
			$h['label']				= $x->label;
			$h['stok']				= $stok_beras;

			$total = $total + $stok_beras;
			array_push($response["jenis_beras_list"], $h);


			
	}	

			$t['total']				= $total;
			array_push($response["total"], $t);

	if (mysql_errno() == 0){
		echo json_encode($response);
		//header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 400 error'); //if error
	}

break;
case"stok_karung":

		$jenis_beras_id =  isset($_GET['jenis_beras_id'])?$_GET['jenis_beras_id']:null;

		$query = $koneksi->prepare(" SELECT 	
									a.id,
									a.nama_karung,
									a.tonase,
									a.harga_beli AS harga_beli,
									a.qty_stok
									FROM stok_beras a
									WHERE  jenis_beras_id = '$jenis_beras_id'

									ORDER by a.id DESC ");

				
			$no = 0;
			$response["nama_karung_list"] = array();
			$query->execute();
			$stok = 0;
			while($x = $query->fetch(PDO::FETCH_OBJ)) {
				$stok = $x->qty_stok ;

				
					
				if ( $stok > 0 ){
					
					$no++;
					$h['no']			= $no;
					$h['nama_karung']	= $x->nama_karung;
					$h['tonase']		= $x->tonase;
					$h['harga_beli']	= number_format($x->harga_beli,'0',',','.');
					$h['stok']			= $stok;
					
					array_push($response["nama_karung_list"], $h);
				}
				
				
			}	
				
			if ($no!=0){
				header('HTTP/1.1 200 Sukses'); //if sukses
				echo json_encode($response);
				
			}else{
				header('HTTP/1.1 400 error'); //if error
			}

break;

}
?>