-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Nov 2020 pada 10.19
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_barkah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` decimal(10,0) NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `diskon` decimal(8,0) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `spesifikasi`, `merk`, `satuan`, `harga_beli`, `harga_jual`, `diskon`, `stok`, `keterangan`) VALUES
(8, 'Kecap Manis', '2Liter ', 'ABS', 'Botol', '2000', '2500', '0', 14, ''),
(9, 'Minyak Sayur', '10Liter', 'Filna', 'Plastik', '13000', '15000', '0', 18, ''),
(10, 'Pandan Wangi', '', '', 'liter', '4500', '5000', '0', 20, ''),
(11, 'Ketan', '', '', '', '200', '230', '0', 20, ''),
(12, 'Ketan Item', '', '', 'pcs', '3400', '4000', '0', 20, ''),
(13, 'Beras Merah', '', '', 'Pack', '13400', '14500', '0', 19, ''),
(14, 'Muncul', '', '', 'kaleng', '2500', '2700', '0', 20, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_piutang`
--

CREATE TABLE `bayar_piutang` (
  `id` int(11) NOT NULL,
  `nota_id` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `jumlah_bayar` decimal(12,0) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_transaksi`
--

CREATE TABLE `item_transaksi` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(15) NOT NULL,
  `jenis_transaksi` enum('pembelian','penjualan') NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_beli` decimal(10,0) NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_transaksi`
--

INSERT INTO `item_transaksi` (`id`, `no_nota`, `jenis_transaksi`, `id_barang`, `harga_beli`, `harga_jual`, `diskon`, `quantity`, `created_at`) VALUES
(1, '32261120001', 'penjualan', 9, '13000', '15000', '0', 1, '2020-11-26 11:01:31'),
(2, '32261120002', 'penjualan', 8, '2000', '2500', '0', 1, '2020-11-26 11:02:42'),
(3, '32261120003', 'penjualan', 8, '2000', '2500', '0', 1, '2020-11-26 11:54:47'),
(4, '32261120004', 'penjualan', 13, '13400', '14500', '0', 1, '2020-11-26 11:56:26'),
(5, '32261120005', 'penjualan', 8, '2000', '2500', '0', 4, '2020-11-26 13:04:12'),
(6, '32261120006', 'penjualan', 9, '13000', '15000', '0', 1, '2020-11-26 16:18:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `info_lain` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `no_tlp`, `info_lain`) VALUES
(1, 'Cash', 'Karawang', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(12) NOT NULL,
  `tgl_nota` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_harga` decimal(12,0) NOT NULL,
  `type_bayar` enum('1','2') NOT NULL COMMENT '1:cash, 2:hutang',
  `jumlah_dp` decimal(12,0) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(12) NOT NULL,
  `tgl_nota` datetime NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_belanja` decimal(12,0) NOT NULL,
  `total_diskon` decimal(10,0) NOT NULL,
  `bayar` decimal(12,0) NOT NULL,
  `type_bayar` enum('1','2') NOT NULL COMMENT '1:cash, 2:hutang',
  `jatuh_tempo` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_nota`, `tgl_nota`, `pelanggan_id`, `user_id`, `total_belanja`, `total_diskon`, `bayar`, `type_bayar`, `jatuh_tempo`, `keterangan`, `created_at`) VALUES
(1, '32261120001', '2020-11-26 11:01:31', 1, 3, '15000', '0', '20000', '1', '0000-00-00', '', '2020-11-26 11:01:31'),
(2, '32261120002', '2020-11-26 11:02:43', 1, 3, '2500', '0', '4000', '1', '0000-00-00', '', '2020-11-26 11:02:43'),
(3, '32261120003', '2020-11-26 11:54:47', 1, 3, '2500', '0', '3000', '1', '0000-00-00', '', '2020-11-26 11:54:47'),
(4, '32261120004', '2020-11-26 11:56:26', 1, 3, '14500', '0', '15000', '1', '0000-00-00', '', '2020-11-26 11:56:26'),
(5, '32261120005', '2020-11-26 13:04:12', 1, 3, '10000', '0', '20000', '1', '0000-00-00', 'tes keterangan', '2020-11-26 13:04:12'),
(6, '32261120006', '2020-11-26 16:18:52', 1, 3, '15000', '0', '20000', '1', '0000-00-00', '', '2020-11-26 16:18:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `info_lain` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `no_tlp`, `info_lain`) VALUES
(1, 'Cash', 'Karawang', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_transaksi`
--

CREATE TABLE `tmp_transaksi` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(15) NOT NULL,
  `jenis_transaksi` enum('pembelian','penjualan') NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_beli` decimal(10,0) NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','kasir') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Budi Arief', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1', NULL, NULL),
(3, 'Abdu', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bayar_piutang`
--
ALTER TABLE `bayar_piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_transaksi`
--
ALTER TABLE `item_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `tmp_transaksi`
--
ALTER TABLE `tmp_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `bayar_piutang`
--
ALTER TABLE `bayar_piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_transaksi`
--
ALTER TABLE `item_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tmp_transaksi`
--
ALTER TABLE `tmp_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
