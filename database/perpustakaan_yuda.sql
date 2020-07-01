-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Bulan Mei 2020 pada 10.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_yuda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(8, 'admin perpus', 'admin', '$2y$10$CWr.FjLOxoazPBAG98x8RepiQDL1F9SK0LeYBs1Mk34mB6zV5F6v2'),
(9, 'Riva Wahyuda', 'adminyuda', '$2y$10$MdrjNXbDSAqgdxSy0AdZqexZaY4H5D2TAFdO0vR43yt5ru29RD03y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(3) NOT NULL,
  `nm_anggota` varchar(32) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `ttl_anggota` text DEFAULT NULL,
  `status_anggota` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nm_anggota`, `alamat`, `ttl_anggota`, `status_anggota`) VALUES
(15, 'Muhammad Irfan', '  jl. Bhayangkara', 'Bagelen, 13-02-1993', '2'),
(19, 'Aryulianto', ' Bogor', 'Bogor, 13-05-1995', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kd_buku` int(5) NOT NULL,
  `judul_buku` varchar(32) DEFAULT NULL,
  `pengarang` varchar(32) DEFAULT NULL,
  `jenis_buku` varchar(32) DEFAULT NULL,
  `penerbit` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `pengarang`, `jenis_buku`, `penerbit`) VALUES
(8891, 'Pemrograman python', 'Irfan', 'Teknologi', 'Mandiri Jaya'),
(2, 'Desain Photoshop', 'Dicky', 'Karya Ilmiah', 'Yudhistira'),
(3, 'Pemrograman PHP', 'Irvan', 'Buku Cetak', 'Yudhistira');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meminjam`
--

CREATE TABLE `meminjam` (
  `id_pinjam` int(3) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `jumlah_pinjam` int(2) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `id_anggota` int(3) DEFAULT NULL,
  `kd_buku` varchar(5) DEFAULT NULL,
  `kembali` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meminjam`
--

INSERT INTO `meminjam` (`id_pinjam`, `tgl_pinjam`, `jumlah_pinjam`, `tgl_kembali`, `id_anggota`, `kd_buku`, `kembali`) VALUES
(1, '2015-02-03', 1, '2015-02-04', 2, '12', 2),
(22, '2018-12-11', 1, '2018-12-11', 10, '1', 2),
(12, '2015-02-02', 1, '2015-02-02', 3, '23', 2),
(11, '2015-02-02', 1, '2015-02-02', 6, '12', 2),
(10, '2015-02-02', 1, '2015-02-02', 6, '34', 2),
(9, '2015-02-02', 1, '2015-02-03', 5, '123', 2),
(13, '2015-02-03', 1, '2015-02-03', 3, '34', 2),
(14, '2015-02-03', 1, '2015-02-03', 3, '23', 2),
(24, '2018-12-11', 1, '2018-12-19', 10, '2', 2),
(16, '2015-02-17', 1, '2015-02-17', 8, '200', 2),
(17, '2015-04-28', 1, '2015-04-28', 4, '12', 2),
(18, '2015-04-28', 1, '2015-04-28', 5, '12', 2),
(23, '2018-12-11', 1, '2018-12-11', 11, '2', 2),
(20, '2015-05-11', 1, '2018-12-11', 2, '12', 2),
(28, '2020-05-05', 1, '0000-00-00', 12, '3', 1),
(25, '2018-12-11', 1, '2018-12-11', 11, '3', 2),
(27, '2018-12-11', 1, '2018-12-11', 14, '99', 2),
(29, '2020-05-05', 1, '2020-05-05', 15, '8891', 2),
(30, '2020-05-05', 1, '2020-05-05', 15, '2', 2),
(31, '2020-05-05', 1, '2020-05-05', 15, '3', 2),
(32, '2020-05-05', 1, NULL, 17, '882', 1),
(33, '2020-05-05', 1, NULL, 18, '3', 1),
(34, '2020-05-08', 1, NULL, 15, '8891', 1),
(35, '2020-05-08', 1, NULL, 17, '3', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indeks untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `kd_buku` (`kd_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  MODIFY `id_pinjam` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
