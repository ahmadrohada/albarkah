<?php



$rn=chr(13).chr(10);
$esc=chr(27);
$cutpaper=$esc."m";
$bold_on=$esc."E1";
$bold_off=$esc."E0";
$reset=pack('n', 0x1B30);





//Kode di bawah ini, merupakan struktur nota yang akan tercetak ketika kita print
$string  = "Toko Jhacko Jaya 
";
$string .= "Jl. Sakura, Trirenggo, Bantul 
";
$string .= "=============================
";
$string .= "Kasir   : Aira 
";
$string .= "Invoice : 05122017001 
";
$string .= "Date    : 05 Desember 2017 
";
$string .= "          (16:16:00) 
";
$string .= "=============================
";

ob_start();
$tbl = "";
$total = '0';

$tbl .= "#Nama Barang    #Harga       
";
$tbl .= "=============================
";
$tbl .= " Susu Coklat                 
";
$tbl .= " 6 x Rp. 10.000   Rp. 60.000 
";
$tbl .= " Roti Tawar                  
";
$tbl .= " 2 x Rp. 15.000   Rp. 30.000 
";
echo $tbl;

$string .= ob_get_contents();
ob_end_clean();
$string .= "=============================  
";
$string .= "Sub Total :     Rp.  90.000    
";
$string .= "Taxes     :     Rp.       0    
";
$string .= "Diskon    :     Rp.       0    
";
$string .= "Total     :     Rp.  90.000    
";
$string .= "Pembayaran:     
Rp. 100.000    
";
$string .= "Kembalian :     Rp.  10.000    
";
$string .= "
";
$string .= "========*Terima Kasih*=======
";
$string .= "===*Selamat Datang Kembali*==
";



$printer = printer_open("xprinter");    
	printer_write($printer, $string);   
	/* exit printer */ 
	printer_close($printer);

?>