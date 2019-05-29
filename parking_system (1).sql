-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2019 at 09:44 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(11) NOT NULL,
  `menit_g` time NOT NULL,
  `jam_p` time NOT NULL,
  `jam_b` time NOT NULL,
  `biaya_p` int(50) NOT NULL,
  `biaya_b` int(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `id_jenisk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `id` int(11) NOT NULL,
  `id_parkir` int(20) NOT NULL,
  `jam_keluar` time NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_masuk`
--

CREATE TABLE `detail_masuk` (
  `id` int(11) NOT NULL,
  `id_parkir` int(20) NOT NULL,
  `jam_masuk` time NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_member`
--

CREATE TABLE `detail_member` (
  `id_member` varchar(15) NOT NULL,
  `id_kendaraan` varchar(10) NOT NULL,
  `id_jenisk` int(11) NOT NULL,
  `no_plat` varchar(12) NOT NULL,
  `nama_kendaraan` varchar(60) NOT NULL,
  `tahun` int(5) NOT NULL,
  `no_rangka` varchar(50) DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_petugas`
--

CREATE TABLE `detail_petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `status` enum('menikah','single') NOT NULL,
  `jumlah_anak` int(5) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `jk` enum('-','L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlfn` varchar(15) NOT NULL,
  `pict` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_petugas`
--

INSERT INTO `detail_petugas` (`id_petugas`, `nik`, `nama`, `status`, `jumlah_anak`, `email`, `jk`, `agama`, `alamat`, `no_tlfn`, `pict`) VALUES
('2', '1111111111111111', 'Muhammad Hasby Ash', 'single', 0, 'hasby.ash@ib-synergy.co.id', 'L', 'Islam', 'Pamulang 2 blok A1', '081906044843', '037891.PNG'),
('4', '1215541241', 'Enny', 'single', 0, 'anggreyni.frisilia@ib-synergy.co.id', 'P', 'Kristen', 'Depok', '0827817212', ''),
('19051068', '1234', 'hasby as', 'single', 0, 'hasbyas16@gmail.com', 'L', 'Islam', 'maruga', '081906044842', '016782012-09-25_234308.png'),
('3', '832034893', 'Dindin', 'single', 0, 'diana.aulia@ib-synergy.co.id', 'P', 'Islam', 'Bangka 22', '738291839212', '');

-- --------------------------------------------------------

--
-- Table structure for table `header_member`
--

CREATE TABLE `header_member` (
  `id_member` varchar(15) NOT NULL,
  `nik` int(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `jk` enum('-','L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlfn` varchar(15) NOT NULL,
  `saldo` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header_parkir`
--

CREATE TABLE `header_parkir` (
  `id_parkir` int(20) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  `id_member` varchar(15) DEFAULT NULL,
  `id_jenisk` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL COMMENT 'member/non',
  `durasi` time NOT NULL,
  `no_plat` varchar(12) DEFAULT NULL,
  `biaya` int(200) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header_petugas`
--

CREATE TABLE `header_petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'MD5',
  `hakakses` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_petugas`
--

INSERT INTO `header_petugas` (`id_petugas`, `password`, `hakakses`, `status`) VALUES
('19051068', '161ebd7d45089b3446ee4e0d86dbcf92', 'admin', 'login'),
('2', '161ebd7d45089b3446ee4e0d86dbcf92', 'karyawan', 'login'),
('3', 'f0c6deb931656895e8a4f02f953ac39e', 'admin', 'login'),
('4', '6bd9edb8f603fa620141f7faf7c27b31', 'admin', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jenisk` int(11) NOT NULL,
  `jenis_k` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id_jenisk`, `jenis_k`) VALUES
(78, 'mobil'),
(269, 'motor');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `id_petugas`, `tanggal`, `jam`, `deskripsi`) VALUES
(15, '1', '2019-05-23', '09:57:43', 'Login'),
(16, '2', '2019-05-23', '10:17:05', 'Login'),
(17, '2', '2019-05-23', '10:26:57', 'Logout'),
(18, '2', '2019-05-23', '10:27:31', 'Login'),
(19, '3', '2019-05-23', '15:05:21', 'Login'),
(20, '1', '2019-05-24', '09:03:59', 'Login'),
(21, '2', '2019-05-24', '09:15:19', 'Login'),
(22, '1', '2019-05-24', '09:25:30', 'Logout'),
(23, '19051068', '2019-05-24', '09:25:42', 'Login'),
(24, '3', '2019-05-23', '16:36:13', 'Login'),
(25, '3', '2019-05-24', '10:05:04', 'Login'),
(26, '19051068', '2019-05-24', '10:30:11', 'Logout'),
(27, '4', '2019-05-24', '10:32:51', 'Login'),
(28, '19051068', '2019-05-24', '10:32:38', 'Login'),
(29, '2', '2019-05-24', '12:39:17', 'Login'),
(30, '19051068', '2019-05-24', '12:55:54', 'Logout'),
(31, '19051068', '2019-05-24', '12:58:45', 'Login'),
(32, '19051068', '2019-05-24', '13:02:03', 'Logout'),
(33, '19051068', '2019-05-24', '13:08:09', 'Login'),
(34, '19051068', '2019-05-24', '13:08:44', 'Logout'),
(35, '19051068', '2019-05-24', '13:10:20', 'Login'),
(36, '19051068', '2019-05-24', '13:10:26', 'Logout'),
(37, '19051068', '2019-05-24', '13:12:10', 'Login'),
(38, '19051068', '2019-05-24', '13:12:21', 'Hapus PetugasAnyun'),
(39, '19051068', '2019-05-24', '13:54:26', 'Update Karyawan Muhammad Hasby Ash'),
(40, '19051068', '2019-05-24', '13:56:26', 'Update Karyawan Muhammad Hasby Ash'),
(41, '19051068', '2019-05-24', '13:57:18', 'Update Karyawan Muhammad Hasby Ash'),
(42, '19051068', '2019-05-24', '13:57:52', 'Update Karyawan Muhammad Hasby Ash'),
(43, '19051068', '2019-05-24', '14:06:26', 'Logout'),
(44, '19051068', '2019-05-24', '14:06:34', 'Logout'),
(45, '2', '2019-05-24', '14:22:23', 'Login'),
(46, '19051068', '2019-05-27', '09:31:58', 'Login'),
(47, '19051068', '2019-05-27', '09:43:27', 'Update Karyawan Muhammad Hasby Ash'),
(48, '19051068', '2019-05-27', '09:43:35', 'Logout'),
(49, '2', '2019-05-27', '09:44:22', 'Login'),
(50, '2', '2019-05-27', '09:44:31', 'Logout'),
(51, '19051068', '2019-05-27', '09:44:50', 'Login'),
(52, '2', '2019-05-27', '09:55:00', 'Login'),
(53, '2', '2019-05-27', '10:21:39', 'Login'),
(54, '19051068', '2019-05-27', '10:43:02', 'Update Karyawan Dindin'),
(55, '19051068', '2019-05-27', '11:33:00', 'Tambah Data kendaraan merk Yamaha jenis Motor'),
(56, '4', '2019-05-27', '11:44:24', 'Login'),
(57, '19051068', '2019-05-27', '11:49:12', 'Menghapus Data Kendaraan Merk YamahaJenis Motor'),
(58, '19051068', '2019-05-27', '11:49:55', 'Tambah Data kendaraan merk honda jenis mobil'),
(59, '19051068', '2019-05-27', '11:51:04', 'Menghapus Data Kendaraan Merk hondaJenis mobil'),
(60, '19051068', '2019-05-27', '11:51:41', 'Tambah Data kendaraan merk honda jenis mobil'),
(61, '19051068', '2019-05-27', '11:51:52', 'Tambah Data kendaraan merk honda jenis truk'),
(62, '19051068', '2019-05-27', '11:53:13', 'Tambah Data kendaraan merk honda jenis trukaa'),
(63, '19051068', '2019-05-27', '11:55:33', 'Tambah Data kendaraan merk honda jenis trukaa'),
(64, '19051068', '2019-05-27', '11:55:38', 'Menghapus Data Kendaraan Merk hondaJenis trukaa'),
(65, '3', '2019-05-27', '12:38:45', 'Login'),
(66, '19051068', '2019-05-27', '13:03:31', 'Tambah Data kendaraan merk yamaha jenis mtorrr'),
(67, '19051068', '2019-05-27', '13:04:02', 'Merubah Data kendaraan Merk yamaha Jenis motor'),
(68, '19051068', '2019-05-27', '13:04:56', 'Merubah Data kendaraan Merk yamaha Jenis motor'),
(69, '19051068', '2019-05-27', '13:06:04', 'Tambah Data kendaraan merk honda jenis mobil'),
(70, '19051068', '2019-05-27', '13:16:17', 'Logout'),
(71, '19051068', '2019-05-27', '13:16:24', 'Login'),
(72, '19051068', '2019-05-27', '13:16:58', 'Update Karyawan hasby as'),
(73, '19051068', '2019-05-27', '13:17:47', 'Logout'),
(74, '19051068', '2019-05-27', '13:17:53', 'Login'),
(75, '19051068', '2019-05-27', '13:24:53', 'Logout'),
(76, '19051068', '2019-05-27', '13:25:16', 'Login'),
(77, '19051068', '2019-05-27', '13:27:11', 'Login'),
(78, '19051068', '2019-05-27', '13:29:51', 'Login'),
(79, '19051068', '2019-05-27', '13:30:21', 'Logout'),
(80, '19051068', '2019-05-27', '13:30:28', 'Login'),
(81, '19051068', '2019-05-27', '13:35:24', 'Logout'),
(82, '3', '2019-05-27', '13:35:57', 'Login'),
(83, '3', '2019-05-27', '14:27:42', 'Tambah Data kendaraan merk yamaha jenis motor'),
(84, '3', '2019-05-27', '14:28:48', 'Tambah Data kendaraan merk honda jenis motor'),
(85, '3', '2019-05-27', '14:31:09', 'Merubah Data kendaraan Merk honda Jenis mobil'),
(86, '3', '2019-05-27', '14:31:15', 'Menghapus Data Kendaraan Merk hondaJenis mobil'),
(87, '3', '2019-05-27', '14:36:35', 'Tambah Data kendaraan merk honda jenis motor'),
(88, '3', '2019-05-27', '14:48:31', 'Tambah Data kendaraan merk toyota jenis mobil'),
(89, '3', '2019-05-27', '14:48:56', 'Menghapus Data Kendaraan Merk toyotaJenis mobil'),
(90, '3', '2019-05-27', '14:50:15', 'Logout'),
(91, '19051068', '2019-05-27', '14:50:38', 'Login'),
(92, '19051068', '2019-05-27', '14:59:58', 'Logout'),
(93, '3', '2019-05-29', '09:31:48', 'Login');

-- --------------------------------------------------------

--
-- Table structure for table `merk_kendaraan`
--

CREATE TABLE `merk_kendaraan` (
  `id_merk` int(11) NOT NULL,
  `id_jenisk` int(11) NOT NULL,
  `merk_k` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk_kendaraan`
--

INSERT INTO `merk_kendaraan` (`id_merk`, `id_jenisk`, `merk_k`) VALUES
(1, 269, 'yamaha'),
(3, 269, 'honda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `detail_keluar`
--
ALTER TABLE `detail_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parkir` (`id_parkir`);

--
-- Indexes for table `detail_masuk`
--
ALTER TABLE `detail_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parkir` (`id_parkir`);

--
-- Indexes for table `detail_member`
--
ALTER TABLE `detail_member`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD UNIQUE KEY `no_plat` (`no_plat`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_jenisk` (`id_jenisk`);

--
-- Indexes for table `detail_petugas`
--
ALTER TABLE `detail_petugas`
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `no_tlfn` (`no_tlfn`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `header_member`
--
ALTER TABLE `header_member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `no_tlfn` (`no_tlfn`);

--
-- Indexes for table `header_parkir`
--
ALTER TABLE `header_parkir`
  ADD PRIMARY KEY (`id_parkir`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_jenisk` (`id_jenisk`);

--
-- Indexes for table `header_petugas`
--
ALTER TABLE `header_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenisk`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk_kendaraan`
--
ALTER TABLE `merk_kendaraan`
  ADD PRIMARY KEY (`id_merk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_keluar`
--
ALTER TABLE `detail_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_masuk`
--
ALTER TABLE `detail_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `merk_kendaraan`
--
ALTER TABLE `merk_kendaraan`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
