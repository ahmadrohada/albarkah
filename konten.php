<?php


if(isset($_GET['page'])){

switch($group){
case "admin":
	$page="files_admin/".$_GET['page'];

break;
case "pegawai":
	$page="files_pegawai/".$_GET['page'];

break;
}

	$file="$page.php";
	
	if (!file_exists($file)){
		include ("404.php");
		//echo "<h2 class='error'>ERROR file tidak ditemukan</h2>";
	}else{
		//define('hda', TRUE);
		include ("$page.php");
	}
	
	
}else{
	include ("404.php");
}

?>

