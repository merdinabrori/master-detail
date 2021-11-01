-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2021 pada 02.01
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master-detail`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan_mhs`
--

CREATE TABLE `bimbingan_mhs` (
  `id` int(11) NOT NULL,
  `nidn_dosen` varchar(10) NOT NULL,
  `npm_mhs` varchar(11) NOT NULL,
  `id_bimbingan` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `tempat` varchar(256) NOT NULL,
  `isi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bimbingan_mhs`
--

INSERT INTO `bimbingan_mhs` (`id`, `nidn_dosen`, `npm_mhs`, `id_bimbingan`, `waktu`, `tempat`, `isi`) VALUES
(1, '3091020100', '18081010115', 2, '2021-10-31 05:43:04', 'Daring', 'Meminta tanda tangan untuk KHS'),
(2, '3091020100', '18081010115', 1, '2021-11-02 09:43:04', 'Daring', 'Membahas rencana pengambilan mata kuliah untuk semester 7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nidn`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `fakultas`, `prodi`, `agama`) VALUES
(1, 'lambang gunawan S.Kom', '3091020100', 1, 'surabaya', '1973-12-08', 'jl wonorejo 45', 'Ilmu Komputer', 'Informatika', 'Kristen'),
(2, 'pablo escobar S.Kom', '3091020101', 1, 'sidoarjo', '1984-02-19', 'jl narcos 420', 'Ilmu Komputer', 'Informatika', 'Islam'),
(3, 'asmarani wijaya S.Kom', '3091020102', 0, 'jombang', '1996-12-24', 'jl megamendung 43', 'Ilmu Komputer', 'Informatika', 'Konghuchu'),
(4, 'lukmah sardi S.Kom', '3091020103', 1, 'gresik', '1989-01-31', 'jl kusuma bangsa 45', 'Ilmu Komputer', 'Informatika', 'Islam'),
(5, 'yani sitimah S.Kom', '3091020104', 0, 'malang', '1975-05-24', 'jl jawa 233', 'Ilmu Komputer', 'Informatika', 'Hindu'),
(6, 'joko prasetyo S.Kom', '3091020105', 1, 'madiun', '1987-03-03', 'jl sumatra 34\r\n', 'Ilmu Komputer', 'Informatika', 'Islam'),
(7, 'devi ratna S.Kom', '3091020106', 0, 'surabaya', '1984-09-28', 'jalan gisani 24', 'Ilmu Komputer', 'Informatika', 'Budha'),
(8, 'samsung oponi S.Kom', '3091020107', 1, 'beijing', '1978-12-23', 'jl seoul 45', 'Ilmu Komputer', 'Informatika', 'Katolik'),
(9, 'elon musk S.Kom', '3091020108', 1, 'boston', '1976-11-19', 'jl kentucky 233', 'Ilmu Komputer', 'Informatika', 'Kristen'),
(10, 'steve job S.Kom', '3091020109', 1, 'florida', '1981-09-10', 'jl queens 101', 'Ilmu Komputer', 'Informatika', 'Kristen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_bimbingan`
--

CREATE TABLE `list_bimbingan` (
  `id` int(11) NOT NULL,
  `bahasan` enum('krs/kprs','khs','transkip','lain-lain') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `list_bimbingan`
--

INSERT INTO `list_bimbingan` (`id`, `bahasan`) VALUES
(1, 'krs/kprs'),
(2, 'khs'),
(3, 'transkip'),
(4, 'lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` varchar(11) NOT NULL,
  `nidn_wali` varchar(10) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `npm`, `nidn_wali`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `fakultas`, `prodi`, `agama`) VALUES
(1, 'budi santoso', '18081010101', '3091020101', 1, 'Surabaya', '2000-12-21', 'jalan balung 6', 'Ilmu Komputer', 'Informatika', 'Islam'),
(2, 'heri hariono', '18081010102', '3091020101', 1, 'Surabaya', '2000-05-08', 'jalan kutisari 5', 'Ilmu Komputer', 'Informatika', 'Islam'),
(3, 'hamzah dimas', '18081010103', '3091020101', 1, 'Surabaya', '2000-05-13', 'jalan wiguna selatan 5\r\n', 'Ilmu Komputer', 'Informatika', 'Islam'),
(4, 'syafri firmasyah', '18081010104', '3091020101', 1, 'Surabaya', '2000-05-15', 'jalan hayam wuruk 4', 'Ilmu Komputer', 'Informatika', 'Islam'),
(5, 'reynaldi setiawan', '18081010105', '3091020101', 1, 'Bangkalan', '2000-09-14', 'jalan malioboro 5', 'Ilmu Komputer', 'Informatika', 'Islam'),
(6, 'nurisa rahma santika', '18081010106', '3091020101', 0, 'Surabaya', '2000-11-14', 'jalan bali 34', 'Ilmu Komputer', 'Informatika', 'Islam'),
(7, 'salsabila widya kirana', '18081010107', '3091020101', 0, 'Surabaya', '2000-05-18', 'jalan semolowari 4', 'Ilmu Komputer', 'Informatika', 'Islam'),
(8, 'nurmay farah ', '18081010108', '3091020101', 0, 'Surabaya', '2000-05-15', 'jalan wonorejo 6', 'Ilmu Komputer', 'Informatika', 'Islam'),
(9, 'dwi retno as', '18081010109', '3091020101', 0, 'Surabaya', '2000-05-08', 'jalan banyu urip 7', 'Ilmu Komputer', 'Informatika', 'Islam'),
(10, 'alvianty pramesti', '18081010110', '3091020101', 0, 'Surabaya', '2000-05-04', 'jalan kedondong 8', 'Ilmu Komputer', 'Informatika', 'Islam'),
(11, 'zahra nur', '18081010111', '3091020102', 0, 'Surabaya', '2000-05-18', 'jalan potlot 4\r\n', 'Ilmu Komputer', 'Informatika', 'Islam'),
(12, 'ayunda izza', '18081010112', '3091020102', 0, 'Surabaya', '2000-05-04', 'jalan bd 5 no 6', 'Ilmu Komputer', 'Informatika', 'Islam'),
(13, 'rega pratama', '18081010113', '3091020102', 1, 'Siduarjo', '2000-05-16', 'jalan kc 4 no 420', 'Ilmu Komputer', 'Informatika', 'Islam'),
(14, 'jafar shodiq', '18081010114', '3091020102', 1, 'Sumbawa', '2000-08-15', 'jalan wizkas 5 ', 'Ilmu Komputer', 'Informatika', 'Islam'),
(15, 'avri bojong', '18081010115', '3091020100', 1, 'Surabaya', '2000-07-14', 'jalan mac 5 no 4', 'Ilmu Komputer', 'Informatika', 'Islam'),
(16, 'shavira maya', '18081010116', '3091020100', 0, 'Surabaya', '2000-05-04', 'jalan mangga muda 5', 'Ilmu Komputer', 'Informatika', 'Islam'),
(17, 'ariska pramesti', '18081010119', '3091020100', 0, 'Gresik', '2000-05-02', 'jalan wonokoromo 45', 'Ilmu Komputer', 'Informatika', 'Islam'),
(18, 'tasyaan ', '18081010117', '3091020100', 0, 'Surabaya', '2000-05-06', 'jalan gan 34', 'Ilmu Komputer', 'Informatika', 'Islam'),
(19, 'ubdailah firdaus', '18081010118', '3091020100', 1, 'Surabaya', '2000-05-17', 'jalan hbse 34', 'Ilmu Komputer', 'Informatika', 'Islam'),
(20, 'almirah mahsa', '18081010120', '3091020100', 0, 'Surabaya', '2000-05-07', 'jalan sby merdeka 45', 'Ilmu Komputer', 'Informatika', 'Islam'),
(21, 'aryya nabil chaleta', '18081010121', '3091020108', 1, 'Surabaya', '2000-05-03', 'jalan sulawesi 456', 'Ilmu Komputer', 'Informatika', 'Islam'),
(22, 'bramntya winamukti', '18081010122', '3091020108', 1, 'Surabaya', '2000-05-08', 'jalan bungur 34', 'Ilmu Komputer', 'Informatika', 'Islam'),
(23, 'amalina fildzah', '18081010123', '3091020108', 0, 'Surabaya', '2000-05-11', 'jalan sumatra 3', 'Ilmu Komputer', 'Informatika', 'Islam'),
(24, 'ilham malik', '18081010124', '3091020106', 1, 'Lumajang', '2000-05-19', 'jalan kalisumo kanan 4', 'Ilmu Komputer', 'Informatika', 'Islam'),
(25, 'iksan malik', '18081010125', '3091020106', 1, 'Mojokerto', '2000-05-01', 'jalan kertajaya n0 8', 'Ilmu Komputer', 'Informatika', 'Islam'),
(26, 'satrya pradana', '18081010126', '3091020106', 1, 'Merauke', '2000-05-17', 'jalan kalimantan 21', 'Ilmu Komputer', 'Informatika', 'Islam'),
(27, 'putra arinato', '18081010127', '3091020105', 1, 'Surabaya', '2000-05-06', 'jalan semolowaru 420', 'Ilmu Komputer', 'Informatika', 'Islam'),
(28, 'merdin risau', '18081010128', '3091020105', 1, 'Surabaya', '2000-08-14', 'jalan rungkut sby no 56', 'Ilmu Komputer', 'Informatika', 'Islam'),
(29, 'chakra satrya', '18081010129', '3091020105', 1, 'Surabaya', '2000-05-10', 'jalan tangkur 42\r\n', 'Ilmu Komputer', 'Informatika', 'Islam'),
(30, 'rifky ahmad', '18081010130', '3091020105', 1, 'Bali', '2000-05-14', 'jalan arbali 56', 'Ilmu Komputer', 'Informatika', 'Islam'),
(31, 'shafa putri', '18081010131', '3091020109', 0, 'Surabaya', '2000-05-16', 'jalan bondowoso 42', 'Ilmu Komputer', 'Informatika', 'Islam'),
(32, 'indy ratna p', '18081010132', '3091020109', 0, 'Surabaya', '2000-05-18', 'jalan malang 45', 'Ilmu Komputer', 'Informatika', 'Islam'),
(33, 'made pande', '18081010133', '3091020109', 1, 'Surabaya', '2000-03-16', 'jalan tenggilis 78', 'Ilmu Komputer', 'Informatika', 'Islam'),
(34, 'rama shani', '18081010134', '3091020107', 1, 'Banyuwangi', '2000-05-16', 'jalan bondowoso 42', 'Ilmu Komputer', 'Informatika', 'Islam'),
(35, 'fahmi ad', '18081010135', '3091020107', 1, 'Surabaya', '2000-02-08', 'jalan wiguna stimur 3', 'Ilmu Komputer', 'Informatika', 'Islam'),
(36, 'ghiyat upayatno', '18081010136', '3091020107', 1, 'Surabaya', '2000-09-16', 'jalan pocan 78', 'Ilmu Komputer', 'Informatika', 'Islam'),
(37, 'yanto brajani', '18081010137', '3091020103', 1, 'Surabaya', '2000-05-06', 'jalan medokan asri 7', 'Ilmu Komputer', 'Informatika', 'Islam'),
(38, 'teguh tangkur', '18081010138', '3091020103', 1, 'Surabaya', '2000-01-08', 'jalan bungur bundani 43', 'Ilmu Komputer', 'Informatika', 'Islam'),
(39, 'arbal made', '18081010139', '3091020103', 1, 'Surabaya', '2000-10-26', 'jalan bali 435', 'Ilmu Komputer', 'Informatika', 'Islam'),
(40, 'tiara chikmah', '18081010140', '3091020103', 0, 'Surabaya', '2000-05-24', 'jalan rungkut asri utara', 'Ilmu Komputer', 'Informatika', 'Islam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingan_mhs`
--
ALTER TABLE `bimbingan_mhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dosen` (`nidn_dosen`,`npm_mhs`,`id_bimbingan`),
  ADD KEY `npm_mhs` (`npm_mhs`),
  ADD KEY `bimbingan_mhs_fk4` (`id_bimbingan`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`);

--
-- Indeks untuk tabel `list_bimbingan`
--
ALTER TABLE `list_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn_wali` (`nidn_wali`),
  ADD KEY `npm` (`npm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimbingan_mhs`
--
ALTER TABLE `bimbingan_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `list_bimbingan`
--
ALTER TABLE `list_bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bimbingan_mhs`
--
ALTER TABLE `bimbingan_mhs`
  ADD CONSTRAINT `bimbingan_mhs_fk1` FOREIGN KEY (`id_bimbingan`) REFERENCES `list_bimbingan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bimbingan_mhs_fk2` FOREIGN KEY (`nidn_dosen`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bimbingan_mhs_fk3` FOREIGN KEY (`npm_mhs`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bimbingan_mhs_fk4` FOREIGN KEY (`id_bimbingan`) REFERENCES `list_bimbingan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`nidn_wali`) REFERENCES `dosen` (`nidn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
