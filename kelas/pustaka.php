<?php

date_default_timezone_set('Asia/Jakarta');


class FormatTanggal{

	function balik($data){
		$tanggal = substr($data,8,2); 
		$bulan = substr($data,5,2); 
		$tahun = substr($data,0,4); 

		//ubah angka ke nama bulan
				switch($bulan)
					{
				case 01 : $nm_bulan='Jan';
						break;
				case 02 : $nm_bulan='Feb';
						break;
				case 03 : $nm_bulan='Mar';
						break;
				case 04 : $nm_bulan='Apr';
						break;
				case 05 : $nm_bulan='Mei';
						break;
				case 06 : $nm_bulan='Jun';
						break;
				case 07 : $nm_bulan='Jul';
						break;
				case 8 : $nm_bulan='Agust';
						break;
				case 9 : $nm_bulan='Sept';
						break;
				case 10 : $nm_bulan='Okt';
						break;
				case 11 : $nm_bulan='Nov';
						break;
				case 12 : $nm_bulan='Des';
						break;
					}

					
		$tanggal = isset($tanggal) ? $tanggal : '';
		$nm_bulan = isset($nm_bulan) ? $nm_bulan : '';
		$tahun = isset($tahun) ? $tahun : '';
		
		$data=$tanggal.'   '.$nm_bulan.'  '.$tahun;
	return $data;

	}


	function tgl_jam($data){


		$x		= explode(' ', $data);
		$tgl	= $x[0];
		$jam 	= $x[1];

		$tanggal = substr($tgl,8,2); 
		$bulan = substr($tgl,5,2); 
		$tahun = substr($tgl,0,4); 
	
		$tanggal = isset($tanggal) ? $tanggal : '';
		$bulan = isset($bulan) ? $bulan : '';
		$tahun = isset($tahun) ? $tahun : '';
		
		$data=$tanggal.'   '.$bulan.'  '.$tahun;
	return $data . "&nbsp;[" .$jam. "]" ;

	}
	function jam($data){


		$x		= explode(' ', $data);
		$tgl	= $x[0];
		$jam 	= $x[1];

		$tanggal = substr($tgl,8,2); 
		$bulan = substr($tgl,5,2); 
		$tahun = substr($tgl,0,4); 
	
		$tanggal = isset($tanggal) ? $tanggal : '';
		$bulan = isset($bulan) ? $bulan : '';
		$tahun = isset($tahun) ? $tahun : '';
		
		$data=$tanggal.'   '.$bulan.'  '.$tahun;
	return $jam ;

	}
	function tgl($data){


		$x		= explode(' ', $data);
		$tgl	= $x[0];
		$jam 	= $x[1];

		$tanggal = substr($tgl,8,2); 
		$bulan = substr($tgl,5,2); 
		$tahun = substr($tgl,0,4); 
	
		$tanggal = isset($tanggal) ? $tanggal : '';
		$bulan = isset($bulan) ? $bulan : '';
		$tahun = isset($tahun) ? $tahun : '';
		
		$data=$tanggal.'   '.$bulan.'  '.$tahun;
	return $data;

	}


	

	function balik2($data){
		$tanggal = substr($data,8,2); 
		$bulan = substr($data,5,2); 
		$tahun = substr($data,0,4); 


		//ubah angka ke nama bulan
				switch($bulan)
					{
				case 01 : $nm_bulan='Januari';
						break;
				case 02 : $nm_bulan='Februari';
						break;
				case 03 : $nm_bulan='Maret';
						break;
				case 04 : $nm_bulan='April';
						break;
				case 05 : $nm_bulan='Mei';
						break;
				case 06 : $nm_bulan='Juni';
						break;
				case 07 : $nm_bulan='Juli';
						break;
				case 8 : $nm_bulan='Agustus';
						break;
				case 9 : $nm_bulan='September';
						break;
				case 10 : $nm_bulan='Oktober';
						break;
				case 11 : $nm_bulan='November';
						break;
				case 12 : $nm_bulan='Desember';
						break;
					}

		$tanggal = isset($tanggal) ? $tanggal : '';
		$nm_bulan = isset($nm_bulan) ? $nm_bulan : '';
		$tahun = isset($tahun) ? $tahun : '';
		$data=$tanggal.'   '.$nm_bulan.'  '.$tahun;
	return $data;
	}

	function tgl_sql($data){
		
		if ( $data != null ){
			$x			= explode('-',$data);
		}else{
			$x = "00-00-0000";
		}
		

		$tanggal 	= $x[0];
		$nm_bulan 	= $x[1];
		$tahun 		= $x[2];

		$tanggal = isset($tanggal) ? $tanggal : '';
		$nm_bulan = isset($nm_bulan) ? $nm_bulan : '';
		$tahun = isset($tahun) ? $tahun : '';

		$data= $tahun."-".$nm_bulan."-".$tanggal;
	return $data;
	}

	

	function tgl_form($data){

		$x			= explode('-',$data);
		$tanggal 	= $x[2];
		$nm_bulan 	= $x[1];
		$tahun 		= $x[0];

		
		
		$tanggal = isset($tanggal) ? $tanggal : '';
		$nm_bulan = isset($nm_bulan) ? $nm_bulan : '';
		$tahun = isset($tahun) ? $tahun : '';

		$data= $tanggal.'-'.$nm_bulan.'-'.$tahun;
	return $data;
	}
	
	function bulan($data){
		
		$bulan = $data; 

		//ubah angka ke nama bulan
				switch($bulan)
					{
				case 01 : $nm_bulan='Jan';
						break;
				case 02 : $nm_bulan='Feb';
						break;
				case 03 : $nm_bulan='Mar';
						break;
				case 04 : $nm_bulan='Apr';
						break;
				case 05 : $nm_bulan='Mei';
						break;
				case 06 : $nm_bulan='Jun';
						break;
				case 07 : $nm_bulan='Jul';
						break;
				case 8 : $nm_bulan='Agst';
						break;
				case 9 : $nm_bulan='Sept';
						break;
				case 10 : $nm_bulan='Okt';
						break;
				case 11 : $nm_bulan='Nov';
						break;
				case 12 : $nm_bulan='Des';
						break;
					}

					
		
		$data=$nm_bulan;
	return $data;

	}

	function tonase($data){


		$x			= explode('.', $data);
		$tonase		= $x[0];
		$desimal 	= $x[1];

		if ( $desimal == 0 ){
			$dret  = $tonase;
		}else{
			$dret  = $data;
		}
		
		return $dret;

	}
	
	function namahari($tanggal){
    
		//fungsi mencari namahari
		//format $tgl YYYY-MM-DD
		//harviacode.com
		
		$tgl=substr($tanggal,8,2);
		$bln=substr($tanggal,5,2);
		$thn=substr($tanggal,0,4);
	 
		$info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
		
		switch($info){
			case '0': return "Minggu"; break;
			case '1': return "Senin"; break;
			case '2': return "Selasa"; break;
			case '3': return "Rabu"; break;
			case '4': return "Kamis"; break;
			case '5': return "Jumat"; break;
			case '6': return "Sabtu"; break;
		};
		
	}
}

	
class Nota{
	
	function new_nota($no_terakhir){
	

		$user_id				= substr($no_terakhir,0,1); 
		$jenis_transaksi		= substr($no_terakhir,1,1); 
		$date					= substr($no_terakhir,2,6);
		$id 					= substr($no_terakhir,8,3);
		$no						= $id+1;
		$jm						= strlen($no);
		
		switch($jm)
			{
			case 1 : $new_no='00'.$no;
				break;
			case 2 : $new_no='0'.$no;
				break;
			case 3 : $new_no=$no;
				break;
			}



		$new_no_nota = $user_id.$jenis_transaksi.$date.$new_no;
				
	return $new_no_nota;
	}

	
}	
	
	
	
class selisih{
	
	function adddate($vardate,$added){
	
	$data = explode('-', $vardate);
	$date = new DateTime();
	$date->setDate($data[0], $data[1] , $data[2]);
	$date->modify("".$added."");
	$day = $date->format("Y-m-d");
		
	return $day;
	}
	
	
}



class potongan{
	
	
	
	function pot_masuk($jam_masuk){
		
		$masuk 	= $jam_masuk;
		$data 	= explode(':', $masuk);
		$h		= $data[0];
		$i 		= $data[1];
		$s 		= $data[2];
	

	
			if ( $masuk >= '07:46' )	{
				//hitung selisih untuk pot_masuk
				$jam_masuk_normal 	= mktime(7,46,0);
				$jam_masuk_aktual 	= mktime($h, $i, $s);
				$selisih_waktu 		= $jam_masuk_aktual - $jam_masuk_normal;
				$sisa 				= $selisih_waktu % 86400;
				$selisih_jam 		= floor($sisa/3600);
				
				$pot_masuk = 0.5 * ( $selisih_jam + 1 );
			}else{
				$pot_masuk = 0;
			}
	
	
	
		return $pot_masuk;
	}
	
	
	function pot_pulang($jam_pulang){
		$pulang = $jam_pulang;
		$data 	= explode(':', $pulang);
		$h		= $data[0];
		$i 		= $data[1];
		$s 		= $data[2];
	

	
			if ( $pulang <= '15:44' )	{
				//hitung selisih untuk potongan
				$jam_pulang_normal 	= mktime(15,45,0);
				$jam_pulang_aktual 	= mktime($h, $i, $s);
				$selisih_waktu 		= $jam_pulang_normal - $jam_pulang_aktual;
				$sisa 				= $selisih_waktu % 86400;
				$selisih_jam 		= floor($sisa/3600);
				
				$pot_pulang = 0.5 * ( $selisih_jam + 1 ) ; 
			}else{
				$pot_pulang = 0 ; 
			}
			
			
		return $pot_pulang;
	}
	
	function pot_masuk_6($jam_masuk){
		
		$masuk 	= $jam_masuk;
		$data 	= explode(':', $masuk);
		$h		= $data[0];
		$i 		= $data[1];
		$s 		= $data[2];
	

	
			if ( $masuk >= '07:31' )	{
				//hitung selisih untuk pot_masuk
				$jam_masuk_normal 	= mktime(7,31,0);
				$jam_masuk_aktual 	= mktime($h, $i, $s);
				$selisih_waktu 		= $jam_masuk_aktual - $jam_masuk_normal;
				$sisa 				= $selisih_waktu % 86400;
				$selisih_jam 		= floor($sisa/3600);
				
				$pot_masuk = 0.5 * ( $selisih_jam + 1 );
			}else{
				$pot_masuk = 0;
			}
	
	
	
		return $pot_masuk;
	}
	
	
	function pot_pulang_6($jam_pulang){
		$pulang = $jam_pulang;
		$data 	= explode(':', $pulang);
		$h		= $data[0];
		$i 		= $data[1];
		$s 		= $data[2];
	

	
			if ( $pulang <= '14:29' )	{
				//hitung selisih untuk potongan
				$jam_pulang_normal 	= mktime(14,30,0);
				$jam_pulang_aktual 	= mktime($h, $i, $s);
				$selisih_waktu 		= $jam_pulang_normal - $jam_pulang_aktual;
				$sisa 				= $selisih_waktu % 86400;
				$selisih_jam 		= floor($sisa/3600);
				
				$pot_pulang = 0.5 * ( $selisih_jam + 1 ) ; 
			}else{
				$pot_pulang = 0 ; 
			}
			
			
		return $pot_pulang;
	}
	
	function pot_masuk_6_sabtu($jam_masuk){
		
		$masuk 	= $jam_masuk;
		$data 	= explode(':', $masuk);
		$h		= $data[0];
		$i 		= $data[1];
		$s 		= $data[2];
	

	
			if ( $masuk >= '07:31' )	{
				//hitung selisih untuk pot_masuk
				$jam_masuk_normal 	= mktime(7,31,0);
				$jam_masuk_aktual 	= mktime($h, $i, $s);
				$selisih_waktu 		= $jam_masuk_aktual - $jam_masuk_normal;
				$sisa 				= $selisih_waktu % 86400;
				$selisih_jam 		= floor($sisa/3600);
				
				$pot_masuk = 0.5 * ( $selisih_jam + 1 );
			}else{
				$pot_masuk = 0;
			}
	
	
	
		return $pot_masuk;
	}
	
	
	function pot_pulang_6_sabtu($jam_pulang){
		$pulang = $jam_pulang;
		$data 	= explode(':', $pulang);
		$h		= $data[0];
		$i 		= $data[1];
		$s 		= $data[2];
	

	
			if ( $pulang <= '12:29' )	{
				//hitung selisih untuk potongan
				$jam_pulang_normal 	= mktime(12,30,0);
				$jam_pulang_aktual 	= mktime($h, $i, $s);
				$selisih_waktu 		= $jam_pulang_normal - $jam_pulang_aktual;
				$sisa 				= $selisih_waktu % 86400;
				$selisih_jam 		= floor($sisa/3600);
				
				$pot_pulang = 0.5 * ( $selisih_jam + 1 ) ; 
			}else{
				$pot_pulang = 0 ; 
			}
			
			
		return $pot_pulang;
	}
	
	
}

?>