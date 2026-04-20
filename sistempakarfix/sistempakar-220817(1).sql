-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Agu 2022 pada 01.05
-- Versi server: 10.2.44-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abuyabuy01_demo_sistempakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_kasus`
--

CREATE TABLE `basis_kasus` (
  `id_basis_kasus` int(11) NOT NULL,
  `kd_penyakit` varchar(5) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basis_kasus`
--

INSERT INTO `basis_kasus` (`id_basis_kasus`, `kd_penyakit`, `id_gejala`) VALUES
(4, 'P-02', 3),
(5, 'P-02', 5),
(7, 'P-02', 8),
(8, 'P-02', 11),
(9, 'P-03', 3),
(10, 'P-03', 7),
(11, 'P-03', 8),
(12, 'P-03', 10),
(13, 'P-04', 1),
(14, 'P-04', 2),
(15, 'P-04', 3),
(16, 'P-04', 4),
(17, 'P-04', 9),
(18, 'P-05', 2),
(19, 'P-05', 3),
(20, 'P-05', 4),
(21, 'P-05', 11),
(31, 'P-01', 2),
(32, 'P-01', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nm_lengkap` varchar(255) NOT NULL,
  `jns_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spesialis` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `username`, `password`, `nm_lengkap`, `jns_kelamin`, `alamat`, `no_hp`, `email`, `spesialis`) VALUES
('DTR-000001', 'dedydokter', 'dedydokter', 'Dedy Dokter S.GG', 'L', 'Bogor', '081281859561', 'dedy@c-software.id', 'GIGI'),
('DTR-000002', 'Sherly', 'rezza007', 'Sherly', 'P', 'Bip', '0819272828', 'Sherlgmail.com', 'Paru paru'),
('DTR-000003', 'Rezza ', 'makantai007', 'Rezza pebrian', 'L', 'Bip', '081828282', 'Rezza7@gmail.com', 'Paru paru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(5) NOT NULL,
  `kd_gejala` varchar(5) NOT NULL,
  `nm_gejala` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kd_gejala`, `nm_gejala`, `question`, `bobot`) VALUES
(2, 'G02', 'Sesak nafas', 'Apakah anda merasa sesak nafas?', 1),
(3, 'G03', 'Lemas', 'Apakah anda sering merasa lemas?', 0.5),
(4, 'G04', 'Batuk', 'Apakah anda batuk?', 1),
(5, 'G05', 'Berkeringat dimalam hari', 'Apakah anda sering berkeringat dimalam hari?', 0.5),
(6, 'G06', 'Menggigil', 'Apakah anda merasa menggigil?', 0.5),
(7, 'G07', 'Diare', 'Apakah anda diare? ', 0.5),
(8, 'G08', 'Nyeri dada', 'Apakah anda merasa nyeri dibagian dada?\r\n', 1),
(9, 'G09', 'Kelelahan', 'Apakah anda merasa mudah lelah?', 0.5),
(10, 'G10', 'Mual', 'Apakah anda merasa mual?', 1),
(11, 'G11', 'Berat badan turun', 'Apakah berat badan anda turun?', 1),
(48, 'G01', 'Demam', 'Apakah anda merasakan demam?', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_konsultasi`
--

CREATE TABLE `hasil_konsultasi` (
  `id_konsultasi` int(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `konsultasi` varchar(10) NOT NULL,
  `id_gejala` int(3) NOT NULL,
  `bobot` float NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_konsultasi`
--

INSERT INTO `hasil_konsultasi` (`id_konsultasi`, `id_user`, `konsultasi`, `id_gejala`, `bobot`, `waktu`) VALUES
(1, 'PSN-000003', 'K-00000001', 1, 1, '2022-04-26 20:56:01'),
(2, 'PSN-000003', 'K-00000001', 2, 1, '2022-04-26 20:56:01'),
(3, 'PSN-000003', 'K-00000001', 9, 0.5, '2022-04-26 20:56:01'),
(4, 'PSN-000003', 'K-00000001', 10, 1, '2022-04-26 20:56:01'),
(5, 'PSN-000003', 'K-00000001', 11, 1, '2022-04-26 20:56:01'),
(6, 'PSN-000003', 'K-00000002', 4, 1, '2022-04-26 21:07:28'),
(7, 'PSN-000003', 'K-00000002', 5, 0.5, '2022-04-26 21:07:28'),
(8, 'PSN-000003', 'K-00000002', 6, 0.5, '2022-04-26 21:07:28'),
(9, 'PSN-000003', 'K-00000002', 7, 0.5, '2022-04-26 21:07:28'),
(55, 'PSN-000006', 'K-00000008', 6, 0.5, '2022-05-10 15:44:48'),
(54, 'PSN-000006', 'K-00000007', 9, 0.5, '2022-05-10 15:43:46'),
(53, 'PSN-000006', 'K-00000007', 8, 1, '2022-05-10 15:43:46'),
(52, 'PSN-000006', 'K-00000007', 6, 0.5, '2022-05-10 15:43:46'),
(51, 'PSN-000006', 'K-00000007', 5, 0.5, '2022-05-10 15:43:46'),
(50, 'PSN-000006', 'K-00000007', 2, 1, '2022-05-10 15:43:46'),
(49, 'PSN-000006', 'K-00000006', 9, 0.5, '2022-05-10 15:43:09'),
(48, 'PSN-000006', 'K-00000006', 7, 0.5, '2022-05-10 15:43:09'),
(47, 'PSN-000006', 'K-00000006', 6, 0.5, '2022-05-10 15:43:09'),
(46, 'PSN-000006', 'K-00000006', 5, 0.5, '2022-05-10 15:43:09'),
(45, 'PSN-000006', 'K-00000006', 3, 0.5, '2022-05-10 15:43:09'),
(44, 'PSN-000006', 'K-00000005', 10, 1, '2022-05-10 14:36:19'),
(43, 'PSN-000006', 'K-00000005', 9, 0.5, '2022-05-10 14:36:19'),
(42, 'PSN-000006', 'K-00000005', 2, 1, '2022-05-10 14:36:19'),
(41, 'PSN-000006', 'K-00000005', 1, 1, '2022-05-10 14:36:19'),
(40, 'PSN-000005', 'K-00000004', 8, 1, '2022-05-04 21:05:36'),
(39, 'PSN-000005', 'K-00000004', 7, 0.5, '2022-05-04 21:05:36'),
(38, 'PSN-000005', 'K-00000004', 3, 0.5, '2022-05-04 21:05:36'),
(37, 'PSN-000005', 'K-00000004', 2, 1, '2022-05-04 21:05:36'),
(36, 'PSN-000003', 'K-00000003', 11, 1, '2022-05-03 20:38:22'),
(35, 'PSN-000003', 'K-00000003', 10, 1, '2022-05-03 20:38:22'),
(34, 'PSN-000003', 'K-00000003', 2, 1, '2022-05-03 20:38:22'),
(33, 'PSN-000003', 'K-00000003', 1, 1, '2022-05-03 20:38:22'),
(56, 'PSN-000006', 'K-00000008', 7, 0.5, '2022-05-10 15:44:48'),
(57, 'PSN-000006', 'K-00000008', 8, 1, '2022-05-10 15:44:48'),
(58, 'PSN-000006', 'K-00000008', 9, 0.5, '2022-05-10 15:44:48'),
(59, 'PSN-000004', 'K-00000009', 5, 0.5, '2022-05-10 15:46:36'),
(60, 'PSN-000004', 'K-00000009', 6, 0.5, '2022-05-10 15:46:36'),
(61, 'PSN-000004', 'K-00000009', 7, 0.5, '2022-05-10 15:46:36'),
(62, 'PSN-000006', 'K-00000010', 4, 1, '2022-05-11 13:03:49'),
(63, 'PSN-000006', 'K-00000010', 5, 0.5, '2022-05-11 13:03:49'),
(64, 'PSN-000006', 'K-00000010', 6, 0.5, '2022-05-11 13:03:49'),
(65, 'PSN-000006', 'K-00000010', 8, 1, '2022-05-11 13:03:49'),
(66, 'PSN-000006', 'K-00000010', 10, 1, '2022-05-11 13:03:49'),
(67, 'PSN-000003', 'K-00000011', 2, 1, '2022-05-13 12:55:31'),
(68, 'PSN-000003', 'K-00000011', 3, 0.5, '2022-05-13 12:55:31'),
(69, 'PSN-000003', 'K-00000011', 4, 1, '2022-05-13 12:55:31'),
(70, 'PSN-000003', 'K-00000011', 9, 0.5, '2022-05-13 12:55:31'),
(71, 'PSN-000003', 'K-00000011', 48, 1, '2022-05-13 12:55:31'),
(72, 'PSN-000003', 'K-00000012', 2, 1, '2022-05-13 13:00:36'),
(73, 'PSN-000003', 'K-00000012', 3, 0.5, '2022-05-13 13:00:36'),
(74, 'PSN-000003', 'K-00000012', 4, 1, '2022-05-13 13:00:36'),
(75, 'PSN-000003', 'K-00000012', 6, 0.5, '2022-05-13 13:00:36'),
(76, 'PSN-000003', 'K-00000012', 48, 1, '2022-05-13 13:00:36'),
(77, 'PSN-000003', 'K-00000013', 2, 1, '2022-05-13 13:01:31'),
(78, 'PSN-000003', 'K-00000013', 3, 0.5, '2022-05-13 13:01:31'),
(79, 'PSN-000003', 'K-00000013', 4, 1, '2022-05-13 13:01:31'),
(80, 'PSN-000003', 'K-00000013', 9, 0.5, '2022-05-13 13:01:31'),
(81, 'PSN-000003', 'K-00000013', 48, 1, '2022-05-13 13:01:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int(10) NOT NULL,
  `id_konsultasi` varchar(10) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nilai` double NOT NULL,
  `kd_penyakit` varchar(5) NOT NULL,
  `tgl_konsultasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`, `id_konsultasi`, `id_pasien`, `nama`, `nilai`, `kd_penyakit`, `tgl_konsultasi`) VALUES
(11, 'K-00000011', 'PSN-000003', 'Dedy Koeswara', 1, 'P-01', '2022-05-13 12:55:33'),
(10, 'K-00000010', 'PSN-000006', 'shi shi lia putri ', 0.66666666666667, 'P-03', '2022-05-11 13:03:50'),
(6, 'K-00000006', 'PSN-000006', 'shi shi lia putri ', 0.33333333333333, 'S-01', '2022-05-10 15:43:11'),
(5, 'K-00000005', 'PSN-000006', 'shi shi lia putri ', 1, 'S-01', '2022-05-10 14:36:20'),
(7, 'K-00000007', 'PSN-000006', 'shi shi lia putri ', 1, 'S-01', '2022-05-10 15:43:47'),
(12, 'K-00000012', 'PSN-000003', 'Dedy Koeswara', 0.83333333333333, 'P-04', '2022-05-13 13:00:37'),
(13, 'K-00000013', 'PSN-000003', 'Dedy Koeswara', 1, 'P-01', '2022-05-13 13:01:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nm_lengkap` varchar(255) NOT NULL,
  `jns_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_user`, `username`, `password`, `nm_lengkap`, `jns_kelamin`, `alamat`, `no_hp`, `pekerjaan`) VALUES
('PSN-000001', 'ikhsan', 'ikhsan', 'ikhsan', 'L', 'padang', '0899', 'apa aja'),
('PSN-000002', 'amirul', 'ikhsan', 'amirul ikhsan', 'L', 'buayan', '089199999', 'mahasiswa'),
('PSN-000003', 'dedy', 'dedy', 'Dedy Koeswara', 'L', 'Bogor', '081281859501', 'Wiraswasta'),
('PSN-000004', 'rezzapebrian', 'makantai007', 'rezza pebrian', 'L', 'bumi indah pesona', '081213443731', 'kariawan swasta'),
('PSN-000005', 'sanwani', 'bidung', 'sanwani', 'L', 'bumi indah pesona', '08127762722', 'barista'),
('PSN-000006', 'shishi7', 'makantai007', 'shi shi lia putri ', 'P', 'bumi indah pesona', '08127736687', 'kariawan swasta'),
('PSN-000007', 'rezzapebrian', 'makantai007', 'rezza pebrian', 'L', 'bumi indah pesona', '081213443731', 'kariawan swasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(50) NOT NULL,
  `nm_penyakit` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nm_penyakit`, `ket`, `solusi`) VALUES
('P-01', 'Pneumonia', 'Infeksi yang menimbulkan peradangan pada kantung udara di salah satu atau kedua paru-paru yang dapat berisi cairan.', '1.	Menjalani vaksinasi<br>\r\n2.	Memperkuat daya tahan tubuh<br>\r\n3.	Tidak merokok<br>\r\n4.	Tidak mengkosumsi minuman yang beralkohol'),
('P-02', 'TBC (Tumberkulosis)', 'Penyakit paru-paru akibat kuman Mycobacterium tuberculosis. Kuman TBC hanya menyerang paru-paru tetapi juga bisa menyerang tulang, usus atau kelenjar.', '1.	Mengenakan masker<br>\r\n2.	Tutupi mulut saat bersin, batuk dan tertawa<br>\r\n3.	Tidak membuang dahak atau meludah sembarangan'),
('P-03', 'Brongkitis', 'Peradangan yang terjadi pada saluran utama pernapasan atau brokus. Brokus berfungsi sebagai saluran yang membawa udara dari dan menuju paru-paru.', '1.	Hindari merokok atau menghirup asap rokok\r\n<br>2.	Menerima vaksin flu dan pneumonia \r\n<br>3.	Istirahat yang cukup \r\n<br>4.	Mengkosumsi makanan yang bergizi.'),
('P-04', 'Asma', 'Kondisi ketika saluran udara meradang, sempit dan membengkak dan menghasilkan lendir berlebih sehingga menyulitkan bernapasan ', '1.	Berhenti merokok hindari paparan asap rokok, debu dan polusi udara\r\n<br>2.	Jangan memelihara hewan seperti kucing atau anjing \r\n<br>3.	Gunakan kasur yang sintesis'),
('P-05', 'PPOK (Penyakit Paru Obstruktif Kronis)', 'Kelompok penyakit paru-paru yang menghalangi aliran udara dan membuat sulit bernafas', '1.	Fisioterapi paru\r\n<br>2.	Operasi \r\n<br>3.	Menyarankan untuk berhenti merokok \r\n<br>4.	Memberikan obat-obatan ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `basis_kasus`
--
ALTER TABLE `basis_kasus`
  ADD PRIMARY KEY (`id_basis_kasus`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `hasil_konsultasi`
--
ALTER TABLE `hasil_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `basis_kasus`
--
ALTER TABLE `basis_kasus`
  MODIFY `id_basis_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `hasil_konsultasi`
--
ALTER TABLE `hasil_konsultasi`
  MODIFY `id_konsultasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
