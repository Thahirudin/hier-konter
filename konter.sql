-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2023 pada 09.45
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kodebarang` int(9) NOT NULL,
  `namabarang` varchar(20) NOT NULL,
  `jumlahbarang` int(9) NOT NULL,
  `hargabarang` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `jumlahbarang`, `hargabarang`) VALUES
(110000001, 'axis 6gb 1month', 78, 35000),
(110000002, 'Tri unlimited', 38, 35000),
(110000003, 'axis', 0, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `password`) VALUES
(310000001, 'Thahirudin', 'Manager', 'hiernurul123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` varchar(9) NOT NULL,
  `kodebarang` varchar(9) NOT NULL,
  `namabarang` varchar(20) NOT NULL,
  `jumlahbarang` int(8) NOT NULL,
  `harga` int(8) NOT NULL,
  `id` int(9) NOT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `kodebarang`, `namabarang`, `jumlahbarang`, `harga`, `id`, `tanggal`) VALUES
('210000001', '110000002', 'axis 6gb 1month', 1, 10000, 53, '2022-11-05 16:43:46'),
('210000001', '110000001', 'axis 2GB 3day', 1, 8000, 54, '2022-11-05 16:43:46'),
('210000002', '110000001', 'axis 6gb 1month', 2, 70000, 65, '2022-11-07 21:25:04'),
('210000002', '110000002', 'axix 3day', 3, 30000, 66, '2022-11-07 21:25:04'),
('210000003', '110000001', 'axis 6gb 1month', 2, 70000, 67, '2022-11-07 21:30:24'),
('210000003', '110000003', 'Tri unlimited', 1, 35000, 69, '2022-11-07 21:30:24'),
('210000004', '110000001', 'axis 6gb 1month', 2, 70000, 70, '2022-11-07 21:38:11'),
('210000004', '110000003', 'Tri unlimited', 3, 105000, 71, '2022-11-07 21:38:11'),
('210000005', '110000001', 'axis 6gb 1month', 1, 35000, 72, '2022-11-08 11:10:50'),
('210000005', '110000003', 'Tri unlimited', 2, 70000, 73, '2022-11-08 11:10:50'),
('', '110000001', 'axis 6gb 1month', 1, 35000, 78, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `kodebarang` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110000005;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310000002;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
