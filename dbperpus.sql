-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2023 pada 06.45
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `loker_buku` varchar(25) NOT NULL,
  `no_rak` int(5) NOT NULL,
  `no_laci` int(5) NOT NULL,
  `no_buku` int(5) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `nama_pengarang` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `loker_buku`, `no_rak`, `no_laci`, `no_buku`, `judul_buku`, `nama_pengarang`, `tahun_terbit`, `penerbit`, `status`, `keterangan`) VALUES
(1, 'Fiksi', 1, 1, 1, 'The Moving Finger (Pena Beracun)', 'Agatha Christie', 2014, 'Gramedia Pustaka Utama', 'Dipinjam', '1'),
(2, 'Fiksi', 1, 1, 2, 'Hercule Poirot And The Greenshore Folly', 'Agatha Christie', 2016, 'Gramedia Pustaka Utama', 'Tersedia', '1'),
(3, 'Pengembangan Diri', 1, 2, 3, 'Belajar Memahami Diri', 'Awaludin', 2010, 'Media Nusantara Jaya', 'Dipinjam', '1'),
(4, 'Enterprenuership', 2, 2, 1, 'Sukses Mengelola Keuangan UMKM', 'Aries Heru Prasetyo', 2010, 'Elex Media Komputindo', 'Tersedia', '1'),
(5, 'Majalah', 3, 3, 82, 'Dinamika Edisi 82', 'Prianta Adi Wibawa, S.T, M.Eng, Yuliani Purwaningsih, S.Sos, Nur Afiyah Maizunati, S.Si, M.Ec.Dev', 2021, 'Dinas Komunikasi Informatika dan Statistik', 'Tersedia', '1'),
(6, 'Majalah', 3, 3, 83, 'Dinamika Edisi 83', 'Aan Budi Sulistya, S.Tr.I.Kom, Cecilia Bintang, S.Ikom, Ajwar Anas Eko Prasetyo, S.Pd', 2021, 'Dinas Komunikasi Informatika dan Statistik', 'Tersedia', '1'),
(7, 'Bisnis dan Ekonomi', 4, 4, 1, 'The Great Shifting', 'Rhenaldi Kasali', 2018, 'PT Gramedia Pustaka Utama', 'Tersedia', '1'),
(8, 'Pengembangan Diri', 5, 5, 1, 'Dari Apa Para Jenderal Hebat Terbuat (What Are Great Generals Made of)', 'Polsan Situmorang', 2016, 'Leutikaprio', 'Tersedia', '1'),
(9, 'Biografi', 6, 6, 1, 'Meniti Krisis Naluri Kepemimpinan Mustafa Abubakar', 'A. Bobby Pr', 2019, 'PT Kompas Media Nusantara', 'Tersedia', '1'),
(10, 'Sejarah', 7, 7, 1, 'Malang Tempo Doeloe', 'Dukut Imam Widodo', 2015, 'Dukut Publishing Surabaya', 'Tersedia', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapengembalian`
--

CREATE TABLE `datapengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapinjaman`
--

CREATE TABLE `datapinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(25) NOT NULL,
  `tgl_kembali` varchar(25) NOT NULL,
  `lama_pinjam` varchar(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datapinjaman`
--

INSERT INTO `datapinjaman` (`id_pinjaman`, `id_user`, `nama_peminjam`, `judul_buku`, `tgl_pinjam`, `tgl_kembali`, `lama_pinjam`, `status`, `denda`) VALUES
(23, 11, 'Ika Nurul Ikhsanti', 'Sukses Mengelola Keuangan UMKM', '16-04-2023', '23-04-2023', '7', 'Tersedia', '0'),
(25, 11, 'Ika Nurul Ikhsanti', 'Dinamika Edisi 83', '17-04-2023', '24-04-2023', '7', 'Tersedia', '0'),
(27, 17, 'coba', 'Dari Apa Para Jenderal Hebat Terbuat (What Are Great Generals Made of)', '17-04-2023', '24-04-2023', '7', 'Tersedia', '0'),
(28, 1, 'Alif Surya Aji', 'Sukses Mengelola Keuangan UMKM', '04-05-2023', '11-05-2023', '7', 'Tersedia', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `npm` int(20) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `npm`, `jurusan`, `fakultas`, `password`) VALUES
(1, 'Alif Surya Aji', 1610501020, 'Teknik Elektro', 'Teknik', '$2y$10$z92jpp8GbvLwzC1M7nPg1.qwqwRPncp4oiH/eTrthL1y/dX6i6qcS'),
(3, 'Virsha Nurul Adetya', 2010503089, 'Teknik Sipil', 'Teknik', '$2y$10$5YaV508v92V5Bs2GhhC0bu9Clv5RxOTGwKooCdUXNrXuXCwhU9OIe'),
(4, 'Muhammad Amrullah', 1610501061, 'Teknik Elektro', 'Teknik', '$2y$10$QPKba6863z2vv6bpk0rw9.1Sm2UUhqZPUsB2FdBOuCC8jnqmUYn3m'),
(11, 'Ika Nurul Ikhsanti', 1710302031, 'Pendidikan Bahasa Inggris', 'FKIP', '$2y$10$4Qn5Z4uvdJ6ADBAS9tnYJOpPDs/.Auss8/hFwlp4p3gRIU25znzla'),
(13, 'Agustriani', 2010501132, 'Teknik Elektro', 'Teknik', '$2y$10$19WW05fjGvN/YhH4SWlLsuB9E3CzyUOpnCY0a07E10axxDod3IMSa'),
(17, 'coba', 12345, 'Bahasa', 'FKIP', '$2y$10$P7rpKUIba1KxaeScCT1qTOuslUEftqQYJUwI1JjGizmCEzQ3xYXtK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `datapengembalian`
--
ALTER TABLE `datapengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `datapinjaman`
--
ALTER TABLE `datapinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `datapinjaman`
--
ALTER TABLE `datapinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
