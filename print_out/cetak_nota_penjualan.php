<?php
session_start();

	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../kelas/pustaka.php';
	require_once('../config/conn_pdo.php');

	date_default_timezone_set('Asia/Jakarta');
	$d 	= New FormatTanggal();
	$tgl = date('Y'."-".'m'."-".'d');
	$waktu = date('H'.":".'i'.":".'s');

	$penjualan_id 			= isset($_GET['penjualan_id'])?$_GET['penjualan_id']: 1;
	

	
		$query = $koneksi->prepare(" SELECT 	
				a.id as penjualan_id,
				a.no_nota,
				a.tgl_nota,
				a.type_bayar,
				a.total_belanja,
				a.bayar,
				a.total_diskon,
				a.keterangan,
				b.nama as nama_pelanggan,
				b.alamat,
				b.no_tlp,
				c.nama as nama_user

				
				FROM penjualan a 
				LEFT JOIN pelanggan b ON b.id = a.pelanggan_id
				LEFT JOIN users c ON c.id = a.user_id


				WHERE a.id = 	'$penjualan_id'	
				
				
				LIMIT 1 ");



		
	$query->execute();
	$x = $query->fetch(PDO::FETCH_OBJ);
	
	
?>


<div style="width:320px;">


	<table  border="0" style="width:100%">
		<tr>
			<td width="60%" align="left">
				<font style=" font-size:8pt; font-family:arial;">
					<?php  echo $d->tgl($x->tgl_nota); ?>
				</font>
			</td>
			<td width="40%" valign="top" align="right">
				<font style=" font-size:8pt; font-family:arial;">
					<?php  echo $x->nama_user; ?>
				</font>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<font style=" font-size:9pt; font-family:arial; letter-spacing:0.2pt;">
				<b>NOTA PENJUALAN</b>
				</font>
				<br>
				<font style=" font-size:11pt; font-family:arial; letter-spacing:0.2pt;">
				TOKO AL BARKAH
				</font>
			</td>
		</tr>
	</table>
	
	
	<table  border="0" style="width:100%; font-size:10pt;">
		<tr>
			<td width="30%" align="left">
				No. Nota
			</td>
			<td width="2%" align="center">
				:
			</td>
			<td align="left">
				<?php  echo $x->no_nota; ?>
			</td>
		</tr>
		<tr>
			<td width="30%" align="left">
				Pelanggan
			</td>
			<td width="2%" align="center">
				:
			</td>
			<td align="left">
				<?php  echo $x->nama_pelanggan; ?>
			</td>
		</tr>
	</table>

	====================================
	
	<table  border="0" style="width:100%">
	<thead>
		<tr style="font-size:11pt;">
            <th width="35%" align="left">Keterangan</th>
            <th width="30%" align="right">Harga</th>
            <th width="35%" align="right">Total</th>
		</tr>
	</thead>
		<tr>
			<td colspan="3" align='center'>
				====================================
			</td>
		</tr>
	<?php
	
	$query = $koneksi->prepare(" SELECT 	
									a.*,
									b.nama_barang,
									b.spesifikasi,
									b.merk,
									b.satuan

									FROM item_transaksi a
									LEFT JOIN barang b ON b.id = a.id_barang

									WHERE a.no_nota = '$x->no_nota'
									
									ORDER by a.id ASC");
		
		
		$query->execute();
		$no        = 0;
		while($dt = $query->fetch(PDO::FETCH_OBJ)) {
				echo "<tr>
						<td colspan='3' align='left'>
							<font style=' font-size:10pt; font-family:arial;'>".$dt->nama_barang." ".$dt->merk." ".$dt->spesifikasi."</font>
						</td>
					</tr>
					<tr>
						<td align='center'><font style=' font-size:10pt; font-family:arial;'>".$dt->quantity." ".$dt->satuan."</font></td>
						<td align='right'><font style=' font-size:10pt; font-family:arial;'>".number_format($dt->harga_jual,'0',',','.')."</font></td>
						<td align='right'><font style=' font-size:10pt; font-family:arial;'>".number_format(($dt->harga_jual)*$dt->quantity,'0',',','.')."</font></td>
					</tr>";	
		}

	?>
		<tr>
			<td colspan="3" align='center'>
				====================================
			</td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="45%" align='left'>
				<font style=" font-size:9pt;  font-family:arial;">
					SUB TOTAL
				</font>
			</td>
			<td width="35%" align='right'>
				<font style=" font-size:9pt;  font-family:arial;">
					<?php  echo number_format( $x->total_belanja,'0',',','.'); ?>
				</font>
			</td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="45%" align='left'>
				<font style=" font-size:9pt;  font-family:arial;">
					DISKON
				</font>
			</td>
			<td width="35%" align='right'>
				<font style=" font-size:9pt;  font-family:arial;">
					<?php  echo number_format( $x->total_diskon ,'0',',','.'); ?>
				</font>
			</td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="45%" align='left'>
				<font style=" font-size:9pt;  font-family:arial;">
					GRAND TOTAL
				</font>
			</td>
			<td width="35%" align='right'>
				<font style=" font-size:9pt;  font-family:arial;">
					<?php  echo number_format( ($x->total_belanja- $x->total_diskon ),'0',',','.'); ?>
				</font>
			</td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="45%" align='left'>
				<font style=" font-size:9pt;  font-family:arial;">
					TUNAI
				</font>
			</td>
			<td width="35%" align='right'>
				<font style=" font-size:9pt;  font-family:arial;">
					<?php  echo number_format( $x->bayar ,'0',',','.'); ?>
				</font>
			</td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="45%" align='left'>
				<font style=" font-size:9pt;  font-family:arial;">
					KEMBALI
				</font>
			</td>
			<td width="35%" align='right'>
				<font style=" font-size:9pt;  font-family:arial;">
					<?php  echo number_format( ( $x->bayar - ($x->total_belanja- $x->total_diskon ) ) ,'0',',','.'); ?>
				</font>
			</td>
		</tr>
	</table>

	<table  border="0" style="margin-top:10px; width:100%">
		<tr>
			<td width="60%">
				<font style=" font-size:10pt; font-family:arial;">
					Keterangan : 
				</font>
			</td>
		</tr>
		<tr>
			<td  style="padding-top:10px;">
				<p style="line-height:2em !important;">
				<font style=" font-size:10pt; font-family:arial;">
					<?php echo $x->keterangan; ?>
				</font>
				</p>
				
			</td>
		</tr>
		<tr>
			<td>
				====================================
			</td>
		</tr>
		<tr>
			<td align="center">
				TERIMA KASIH
			</td>
		</tr>
	</table>




</div>


		