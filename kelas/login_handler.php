<?php

session_start();
require_once('../config/conn_pdo.php');

if ( isset($_POST['nip'])){

$username   = trim(addslashes($_POST['nip']));
$password 	= MD5(strtolower(trim($_POST['password'])));


$time = time();                 

				

$query =  $koneksi->prepare("SELECT * FROM users WHERE username='$username' and password='$password' ");
$query->execute();
	$count=$query->rowCount();
	$rs=$query->fetch(PDO::FETCH_ASSOC);
		if($count>0){
				$_SESSION['md_user_id']=$rs['id'];
				$_SESSION['md_user_group']=$rs['role'];
				$_SESSION['md_nama_user']=$rs['nama'];
				


				header('HTTP/1.1 200 Sukses'); //if sukses

			}else{
				
				header('HTTP/1.1 500 Internal Server Error'); //if error
	}	

//Connect::close();
}else if ( isset($_POST['logout'])){
	

	
	if(isset($_SESSION['md_user_id']))
		{
			//session_destroy();
			
			unset($_SESSION['md_user_id'],$_SESSION['md_user_group'],$_SESSION['md_nama_user']);
			
			header('HTTP/1.1 200 Sukses');
		}else{
			//session_destroy();
			
			unset($_SESSION['md_user_id'],$_SESSION['md_user_group'],$_SESSION['md_nama_user']);
		
			
			header('HTTP/1.1 200 Sukses');
		}
	

}
?>